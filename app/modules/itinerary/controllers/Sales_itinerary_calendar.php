<?php
/**
 * Created by PhpStorm.
 * User: kasun.demel
 * Date: 1/25/2021
 * Time: 10:51 AM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Sales_itinerary_calendar extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('ion_auth');
        if (!$this->ion_auth->logged_in())
        {
            redirect('index.php/auth/login');
        }
        $this->load->model('sales_itinerary_mod','calendar_mod');
        $this->load->library('kcrud');
        $this->load->library('datatables');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('permissions');
        $this->load->library('system_log');

        date_default_timezone_set("Asia/Colombo");
        $this->currentTime = date('Y-m-d H:i:s');
        $this->currentDate = date('Y-m-d');
    }

    function index($rep_id=null,$month=null,$user_type=null)
    {

        //$this->permissions->check_permission('access');
        $employee=$this->kcrud->getValueOne("tbl_users","epf_no,name","WHERE epf_no='$rep_id'",null,null,null,null);
        $approve_status=$this->kcrud->getValueAll("tbl_master_status","name",null,null,null,null,null);

        $itinerary_status="Pending";
        if($user_type=="AM"){
            $itinerary_status=$this->kcrud->getValueOne("tbl_sales_itinerary","area_manager AS itinerary_status","WHERE rep='$rep_id' AND month='".$month."'",null,null,null,null);
        }
        else if($user_type=="SS"){
            $itinerary_status=$this->kcrud->getValueOne("tbl_sales_itinerary","sales_staff AS itinerary_status","WHERE rep='$rep_id' AND month='".$month."'",null,null,null,null);
        }
        else if($user_type=="SM"){
            $itinerary_status=$this->kcrud->getValueOne("tbl_sales_itinerary","sales_manager AS itinerary_status","WHERE rep='$rep_id' AND month='".$month."'",null,null,null,null);
        }

        $data=array();


        $data["rep_id"]=$rep_id;
        $data["approve_status"]=$approve_status;

        $data["epf_no"]=$employee->epf_no." - ".$employee->name;
        $data["approve_id"]=$employee->epf_no;
        $data["month"]=$month;
        $data["user_type"]=$user_type;
        $data["itinerary_status"]=$itinerary_status;

        $this->load->view("common/header");
        $this->load->view('calendar_index',$data);
        $this->load->view("common/footer");

    }

    public function get_itinerary_info($id){

        $val=$this->input->post();
        $date=date("Y-m-d",strtotime($val["start_date"]));

        $employee=$this->kcrud->getValueOne("tbl_users","repid","WHERE epf_no=".$id,null,null,null,null);

        //according to the rep get all dealers
        $dealers=$this->calendar_mod->get_dealers($employee->repid);
        $selected_dealers=$this->calendar_mod->get_checked_dealers($employee->repid,$date);

        $remark_dealers="";
        if($this->calendar_mod->get_remark_dealers($id,$date)){
            $remark_dealers=$this->calendar_mod->get_remark_dealers($id,$date)->dealer_name;
        }

        $itinerary=$this->session->userdata('EDIT_ITINERARY');

        if($itinerary == 1){
            echo json_encode(array("status"=>true,"dealers"=>$dealers,"selected_dealers"=>$selected_dealers,"more_details"=>$remark_dealers));
        }
        else{
            echo json_encode(array("status"=>false,"message"=>"Please Enable Edit Mode!"));
        }
    }

    function load()
    {

        $rep_id=$this->input->get("rep_id");
        $selected_dealers= $this->calendar_mod->get_selected_dealers($rep_id);

        $data=array();

        foreach($selected_dealers->result_array() as $row)
        {
            $data[] = array(
                'id' => $row['id'],
                'title' => $row['dealers'].'-'.$row["dealer_name"],
                'start' => $row['date'],
                'end' => $row['date'],
                'user_id'=>$row['id']
            );
        }
        echo json_encode($data);
    }

    function insert()
    {
        if($this->input->post('title'))
        {
            $data = array(
                'title'  => $this->input->post('title'),
                'start_event'=> $this->input->post('start'),
                'end_event' => $this->input->post('end')
            );
            $this->calendar_mod->insert_event($data);
        }
    }

    function update()
    {
        $itinerary=$this->session->userdata('EDIT_ITINERARY');

        if($itinerary == 1){

            if($this->input->post('id'))
            {

                $data = array(
                    'date'=>date("Y-m-d",strtotime($this->input->post('date'))),
                    'month'=>date("Y-m",strtotime($this->input->post('date')))
                );

                $this->kcrud->update("tbl_sales_itinerary_history",$data, array("id"=>$this->input->post('id')));
                echo json_encode(array("status"=>true));
            }
            else{
                echo json_encode(array("status"=>false));
            }
        }
        else{
            echo json_encode(array("status"=>false,"message"=>"Please Enable Edit Mode!"));
        }
    }

    function delete()
    {
        if($this->input->post('id'))
        {
            $this->kcrud->delete("tbl_sales_itinerary_history",array("id"=>$this->input->post('id')));
        }
    }

    public function save(){

        $val= $this->input->post();
        $rep=$val["rep"];

        //delete dealers data
        if($this->kcrud->delete("tbl_sales_itinerary_history",array("date"=>$val["date"],"rep"=>$rep))){

            foreach($val["dealers"] as $dealers){

                $city="";
                $name="";
                $dealer="";
                $exp=explode("~",$dealers);
                $dealer=$exp[0];
                $name=$exp[2];
                if($exp[1]){
                    $city=$exp[1];
                }

                $select="tbl_master_sales_districts.name_en AS district,tbl_master_sales_provinces.name_en AS province,tbl_master_sales_cities.name_en AS city";
                $join="JOIN tbl_master_sales_districts ON tbl_master_sales_districts.id=tbl_master_sales_cities.district_id JOIN tbl_master_sales_provinces ON tbl_master_sales_provinces.id=tbl_master_sales_districts.province_id";
                $where="WHERE tbl_master_sales_cities.name_en='".$city."'";

                $province="";
                $district="";
                if($get_province = $this->kcrud->getValueOne("tbl_master_sales_cities",$select,$where,null,$join,null,null)){
                    $province=$get_province->province;
                    $district=$get_province->district;
                }

                $data=array(
                    'province'=>$province,
                    'district'=>$district,
                    'month'=>date("Y-m",strtotime($val["date"])),
                    'date'=>$val["date"],
                    'routes'=>$city,
                    'dealers'=>$dealer,
                    'dealer_name'=>$name,
                    'rep'=>$rep,
                    'created_at'=>date("Y-m-d H:i:s"),
                    'updated_at'=>date("Y-m-d H:i:s"),
                    'user_id'=>USER_ID
                );

                $this->kcrud->save("tbl_sales_itinerary_history",$data);

            }

            if($val["more_details"] != ""){
                $data1=array(
                    'province'=>'',
                    'district'=>'',
                    'month'=>date("Y-m",strtotime($val["date"])),
                    'date'=>$val["date"],
                    'routes'=>'',
                    'dealers'=>'CLIENT',
                    'dealer_name'=>$val["more_details"],
                    'rep'=>$rep,
                    'created_at'=>date("Y-m-d H:i:s"),
                    'updated_at'=>date("Y-m-d H:i:s"),
                    'user_id'=>USER_ID
                );

                $this->kcrud->save("tbl_sales_itinerary_history",$data1);
            }

        }

        echo json_encode(array("status"=>true));

    }

}

?>
