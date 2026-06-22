<?php
/**
 * Created by PhpStorm.
 * User: kasun
 * Date: 9/13/2021
 * Time: 3:30 PM
 */

class Sales_itinerary_employee extends CI_Controller
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
            tbl_sales_itinerary.area_manager,
            tbl_sales_itinerary.sales_staff,
            tbl_sales_itinerary.sales_manager,
            tbl_sales_itinerary.month AS ref_month,
            tbl_sales_itinerary.rep AS rep_id
            ", FALSE);

        $this->datatables->from('tbl_sales_itinerary');
        $this->datatables->join('tbl_users','tbl_users.epf_no=tbl_sales_itinerary.rep','LEFT');
        $this->datatables->group_by('month');
        $this->datatables->group_by('rep');
        $this->datatables->add_column("Actions",
            "<a class='btn btn-sm btn-default tbl-action' target='_blank' href='".base_url('index.php/insurance/sales_itinerary/sales_itinerary_redirect/$1/$2/AM')."' title='Edit Sales Itinerary'>
                <i class='fa fa-calendar'></i> View
            </a>","rep_id,ref_month");
        $this->datatables->unset_column('ref_month');
        $this->datatables->unset_column('rep_id');
        echo $this->datatables->generate();

    }

    public function get_sales_rep()
    {
        $data = $this->kcrud->getValueAll("tbl_users","name,epf_no,role",null,null,null,null,null);
        $dts = array();

        foreach ($data as $dt) {
            $dts[$dt->epf_no] = $dt->epf_no." - ".$dt->name." - ".$dt->role;
        }
        echo json_encode($dts);
    }

    public function sales_itinerary_redirect($rep_id,$month,$user_type){

        $this->session->set_userdata('EDIT_ITINERARY','0');
        redirect(base_url()."index.php/insurance/sales_itinerary_calendar/index/".$rep_id."/".$month."/".$user_type);
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

        $rep_id=$val["approve_id"];
        $status=$val["approve_status"];
        $user_type=$val["user_type"];

        $data_rr=array();
        $where="";
        $message1="";
        $message2="";
        if($user_type == "AM"){
            $data_rr["area_manager"]=$status;
            $where="WHERE sales_staff !='Pending' AND rep='$rep_id'";
            $message1="Sales Staff status isn't Pending !.You Can't Change";
            $message2="This insurance is sent to the Sales Staff";
        }
        else if($user_type == "SS"){
            $data_rr["sales_staff"]=$status;
            $where="WHERE sales_manager !='Pending' AND rep='$rep_id'";
            $message1="Sales Manager status isn't Pending !.You Can't Change";
            $message2="This insurance is sent to the Sales Manager";
        }
        else if($user_type == "SM"){
            $data_rr["sales_manager"]=$status;
            $where="WHERE sales_staff=='Pending' AND rep='$rep_id'";
            $message1="Sales Staff status is Pending !";
            $message2="This insurance has been saved";
        }

        if($data=$this->kcrud->getValueOne("tbl_sales_itinerary","sales_staff,sales_manager",$where,null,null,null,null)){
            echo json_encode(array("status"=>false,"message"=>$message1));
        }
        else{
            $this->kcrud->update("tbl_sales_itinerary",$data_rr,array('rep'=>$rep_id));
            echo json_encode(array("status"=>true,"message"=>$message2));
        }
    }

    public function save()
    {
        $val= $this->input->post();

        $data_rr=array(
            'month'=>$val["date"],
            'date'=>$val["date"]."-01",
            'night_outs'=>" ",
            'note'=>" ",
            'rep'=>$val["employee"],
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
        $rep_id=$val["rep_id"];
        $month=$val["rep_month"];

        $itinerary = $this->kcrud->getValueOne("tbl_sales_itinerary","area_manager,sales_staff,sales_manager","WHERE rep='$rep_id' AND month='$month'",null,null,null,null);
        echo json_encode(array("insurance"=>$itinerary,"status"=>true));

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