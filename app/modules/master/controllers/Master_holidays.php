<?php
/**
 * Created by PhpStorm.
 * User: kasun.demel
 * Date: 2/1/2021
 * Time: 11:27 AM
 */

class Master_holidays extends CI_Controller
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

        $data=array();

        $title = "Master Holidays";
        $meta["title"] = $title;
        $data['master_title']= $title;
        $this->load->helper('url');

        $this->load->view('common/header',$meta);
        $this->load->view('holidays_index',$data);
        $this->load->view('common/footer');

    }

    public function sales_staff()
    {
        $this->permissions->check_permission('access');

        $meta["title"]="Sales Itinerary - Sales Staff";
        $this->load->helper('url');

        $data['sales_rep']=$this->kcrud->getValueAll("tbl_mas_rep","name,rep",null,null,null,null,null);

        $this->load->view('common/header',$meta);
        $this->load->view('sales_itinerary_sales_staff', $data);
        $this->load->view('common/footer');
    }

    public function get_master_holidays()
    {

        $this->load->library('datatables');

        $this->datatables->select("
            tbl_sales_holidays.id,
            tbl_sales_holidays.name,
            tbl_sales_holidays.date,
            tbl_sales_holidays.status,
            tbl_sales_holidays.id AS master_id
            ", FALSE);

        $this->datatables->from('tbl_sales_holidays');
        $this->datatables->add_column("Actions",
            "<a class='btn btn-sm btn-default tbl-action' target='javascript:;' onclick='edit_master(".'$1'.")' title='Edit Master'>
                <i class='fa fa-pencil'></i> Edit
            </a>","master_id");
        $this->datatables->unset_column('master_id');
        echo $this->datatables->generate();

    }

    public function get_expense_type($id){

        $master_data=$this->kcrud->getValueOne("tbl_sales_holidays","id,date,name,status","WHERE id='$id'",null,null,null,null);
        echo json_encode(array("status"=>true,"master_data"=>$master_data));
    }

    public function save_expense(){

        $val= $this->input->post();

        $code=$val["date"];
        $name=$val["name"];
        $status=$val["status"];

        $data = array(
            "date"=>$code,
            "name"=>$name,
            "status"=>$status
        );

        $this->kcrud->save("tbl_sales_holidays",$data);
        echo json_encode(array("status"=>true));

    }

    public function edit_expense(){

        $val= $this->input->post();

        $id=$val["id"];
        $code=$val["date"];
        $name=$val["name"];
        $status=$val["status"];

        $data = array(
            "date"=>$code,
            "name"=>$name,
            "status"=>$status
        );

        $this->kcrud->update("tbl_sales_holidays",$data,array("id"=>$id));
        echo json_encode(array("status"=>true));

    }

}