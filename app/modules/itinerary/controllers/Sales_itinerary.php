<?php
/**
 * Created by PhpStorm.
 * User: kasun.demel
 * Date: 1/22/2021
 * Time: 4:20 PM
 */

class Sales_itinerary extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();
        $this->load->library('ion_auth');
        if (!$this->ion_auth->logged_in())
        {
            redirect('index.php/auth/login');
        }

        $this->load->library('datatables');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('permissions');
        $this->load->library('system_log');
        $this->load->library('kcrud');

        date_default_timezone_set("Asia/Colombo");
        $this->currentTime = date('Y-m-d H:i:s');
        $this->currentDate = date('Y-m-d');

    }

    public function index()
    {
        $this->permissions->check_permission('access');

        $title="Sales Itinerary - Area Manager";
        $meta["title"]=$title;
        $data["title"]=$title;
        $this->load->helper('url');

        $data['sales_rep']=$this->kcrud->getValueAll("tbl_mas_rep","name,rep",null,null,null,null,null);

        $this->load->view('common/header',$meta);
        $this->load->view('sales_itinerary_index', $data);
        $this->load->view('common/footer');

    }

    public function get_all_itinerary()
    {

        $this->load->library('datatables');

        $this->datatables->select("
            tbl_sales_itinerary.id,
            tbl_sales_itinerary.month,
            CONCAT(tbl_users.epf_no,'-',tbl_users.name) AS employee_name,
            tbl_sales_itinerary.night_outs,
            tbl_sales_itinerary.note,
            tbl_sales_itinerary.area_manager,
            tbl_sales_itinerary.sales_staff,
            tbl_sales_itinerary.sales_manager,
            tbl_sales_itinerary.month AS ref_month,
            tbl_users.epf_no AS user_id
            ", FALSE);

        $this->datatables->from('tbl_sales_itinerary');
        $this->datatables->join('tbl_users','tbl_users.epf_no=tbl_sales_itinerary.rep','LEFT');
        $this->datatables->group_by('month');
        $this->datatables->group_by('rep');

        if(USER_ID != 1){
            $this->datatables->join('auth_view_users','auth_view_users.down_users=tbl_sales_itinerary.rep','INNER');
            $this->datatables->where('auth_view_users.user',EPF_NO);
        }

        $this->datatables->add_column("Actions",
            "<a class='btn btn-sm btn-default tbl-action' target='_blank' href='".base_url('index.php/itinerary/sales_itinerary/sales_itinerary_redirect/$1/$2/AM')."' title='Edit Sales Itinerary'>
                <i class='fa fa-calendar'></i> View
            </a>
            <a class='btn btn-sm btn-default tbl-action' target='_blank' href='".base_url('index.php/itinerary/sales_itinerary/print_itinerary_redirect/$1/$2')."' title='Print Sales Itinerary'>
                <i class='fa fa-print'></i> Print
            </a>","user_id,ref_month");
        $this->datatables->unset_column('ref_month');
        $this->datatables->unset_column('user_id');
        echo $this->datatables->generate();

    }

    public function get_sales_rep()
    {
        $data = $this->kcrud->getValueAll("tbl_users","name,epf_no,role,id",null,null,null,null,null);
        $dts = array();

        foreach ($data as $dt) {
            $dts[$dt->id] = $dt->epf_no." - ".$dt->name." - ".$dt->role;
        }
        echo json_encode($dts);
    }

    public function sales_itinerary_redirect($epf_no,$month,$user_type){

        $this->session->set_userdata('EDIT_ITINERARY','0');
        redirect(base_url()."index.php/itinerary/sales_itinerary_calendar/index/".$epf_no."/".$month."/".$user_type);
    }

    public function print_itinerary_redirect($epf_no,$month){

        $this->session->set_userdata('EDIT_ITINERARY','0');
        redirect(base_url()."index.php/itinerary/sales_itinerary/print_sales_itinerary/".$epf_no."/".$month);
    }

    public function print_sales_itinerary($epf_no,$month){


        $this->load->helper('url');

        $data=array();

        $data["month"]=$month;
        $data["epf_no"]=$epf_no;

        $user = $this->kcrud->getValueOne("tbl_users","id,name,epf_no,title","WHERE epf_no='$epf_no'",null,null,null,null);

        $data["days"]=date("t",strtotime($month));

        for($i=1;$i<=$data["days"];$i++){

            $date=date("Y-m-d",strtotime($month."-".$i));
            $sales_itinerary=$this->kcrud->getValueAll("tbl_sales_itinerary_history","routes,dealers,dealer_name","WHERE rep='".$epf_no."' AND month='".$month."' AND date='".$date."'",null,null,null,null);
            foreach($sales_itinerary as $sales){

                if($sales->dealers == "CLIENT"){
                    $data["routes"][$i] .= $sales->dealer_name;
                }
                else{
                    $data["routes"][$i] .= $sales->routes."-".$sales->dealers." ,";
                }

            }
        }

        $data["user"]=$user;

        $this->load->view('common/header');
        $this->load->view('sales_itinerary_print', $data);
        $this->load->view('common/footer');
    }

    public function edit_enable_itinerary(){
        $this->session->set_userdata('EDIT_ITINERARY','1');
        echo json_encode(array('status'=>true));
    }

    public function edit_disable_itinerary(){
        $this->session->set_userdata('EDIT_ITINERARY','0');
        echo json_encode(array('status'=>true));
    }

    public function approve_save()
    {
        $val= $this->input->post();

        $epf_no=$val["approve_id"];
        $status=$val["approve_status"];
        $user_type=$val["user_type"];

        $data_rr=array();
        $where="";
        $message1="";
        $message2="";

        if($user_type == "AM"){

            $data_rr["area_manager"]=$status;
            $where="WHERE sales_staff !='Pending' AND rep='$epf_no'";
            $message1="Sales Staff status isn't Pending !.You Can't Change";
            $message2="This itinerary is sent to the Sales Staff";

        }
        else if($user_type == "SS"){

            $data_rr["sales_staff"]=$status;
            $where="WHERE sales_manager !='Pending' AND rep='$epf_no'";
            $message1="Sales Manager status isn't Pending !.You Can't Change";
            $message2="This itinerary is sent to the Sales Manager";

        }
        else if($user_type == "SM"){

            $data_rr["sales_manager"]=$status;
            $where="WHERE sales_staff !='Pending' AND rep='$epf_no'";
            $message1="Sales Staff status is Pending !";
            $message2="This itinerary has been saved";

        }

        if($data=$this->kcrud->getValueOne("tbl_sales_itinerary","sales_staff,sales_manager",$where,null,null,null,null)){
            echo json_encode(array("status"=>false,"message"=>$message1));
        }
        else{
            $this->kcrud->update("tbl_sales_itinerary",$data_rr,array('rep'=>$epf_no));
            echo json_encode(array("status"=>true,"message"=>$message2));
        }

    }

    public function save()
    {
        $val= $this->input->post();

        if($val["date"]=="" || $val["employee"]==""){
            echo json_encode(array("status"=>false,"message"=>"Please Insert Data"));
            exit();
        }
        //get rep id
        $employee=$this->kcrud->getValueOne("tbl_users","epf_no","WHERE id=".$val["employee"],null,null,null,null);

        $data_rr=array(
            'month'=>$val["date"],
            'date'=>$val["date"]."-01",
            'night_outs'=>" ",
            'note'=>" ",
            'rep'=>$employee->epf_no,
            'area_manager'=>'Pending',
            'sales_staff'=>'Pending',
            'sales_manager'=>'Pending',
            'created_at'=>date("Y-m-d H:i:s"),
            'updated_at'=>date("Y-m-d H:i:s"),
            'user_id'=>USER_ID
        );

        $where="WHERE month='".$val["month"]."' AND rep='".$val["employee"]."'";

        if($data=$this->kcrud->getValueOne("tbl_sales_itinerary","sales_staff,sales_manager",$where,null,null,null,null)){
            echo json_encode(array("status"=>false,"message"=>"Already Added"));
        }
        else{
            $this->kcrud->save("tbl_sales_itinerary",$data_rr);
            echo json_encode(array("status"=>true,"message"=>"Sales Itinerary Added Successfully !"));
        }
    }


    public function edit_itinerary(){

        $val=$this->input->post();
        $epf_no=$val["epf_no"];
        $month=$val["rep_month"];

        $itinerary = $this->kcrud->getValueOne("tbl_sales_itinerary","area_manager,sales_staff,sales_manager","WHERE rep='$epf_no' AND month='$month'",null,null,null,null);
        echo json_encode(array("itinerary"=>$itinerary,"status"=>true));

    }


    public function get_work_flow_status()
    {
        $data = $this->kcrud->getValueAll("tbl_master_status","name",null,null,null,null,null);
        $dts = array();

        foreach ($data as $dt) {
            $dts[$dt->name] = $dt->name;
        }
        echo json_encode($dts);
    }

}