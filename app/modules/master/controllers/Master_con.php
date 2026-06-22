<?php
/**
 * Created by PhpStorm.
 * User: kasun.demel
 * Date: 1/22/2021
 * Time: 4:20 PM
 */

class Master_con extends CI_Controller
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

    /* master organization */
    public function organization()
    {
        $this->permissions->check_permission('access');

        $data=array();

        $title = "Master Organization";
        $meta["title"] = $title;
        $data['master_title']= $title;
        $this->load->helper('url');

        $this->load->view('common/header',$meta);
        $this->load->view('organization_index',$data);
        $this->load->view('common/footer');

    }

    public function get_master_organization()
    {

        $this->load->library('datatables');

        $this->datatables->select("
            master_organization.id,
            master_organization.name,
            master_organization.id AS master_id
            ", FALSE);

        $this->datatables->from('master_organization');
        $this->datatables->add_column("Actions",
            "<a class='btn btn-sm btn-default tbl-action' target='javascript:;' onclick='edit_master(".'$1'.")' title='Edit Master'>
                <i class='fa fa-pencil'></i> Edit
            </a>","master_id");
        $this->datatables->unset_column('master_id');
        echo $this->datatables->generate();

    }

    public function get_organization($id){

        $master_data=$this->kcrud->getValueOne("master_organization","id,name","WHERE id='$id'",null,null,null,null);
        echo json_encode(array("status"=>true,"master_data"=>$master_data));
    }

    public function save_organization(){

        $val= $this->input->post();

        $name=$val["name"];

        $data = array(
            "name"=>$name,
        );

        $this->kcrud->save("master_organization",$data);
        echo json_encode(array("status"=>true));

    }

    public function edit_organization(){

        $val= $this->input->post();

        $id=$val["id"];
        $name=$val["name"];

        $data = array(
            "name"=>$name,
        );

        $this->kcrud->update("master_organization",$data,array("id"=>$id));
        echo json_encode(array("status"=>true));

    }
    /* master organization */

    /* master division*/
    public function division()
    {
        $this->permissions->check_permission('access');

        $data=array();

        $title = "Master Division";
        $meta["title"] = $title;
        $data['master_title']= $title;
        $this->load->helper('url');

        $this->load->view('common/header',$meta);
        $this->load->view('division_index',$data);
        $this->load->view('common/footer');

    }

    public function get_master_division()
    {

        $this->load->library('datatables');

        $this->datatables->select("
            master_division.id,
            master_division.name,
            master_division.id AS master_id
            ", FALSE);

        $this->datatables->from('master_division');
        $this->datatables->add_column("Actions",
            "<a class='btn btn-sm btn-default tbl-action' target='javascript:;' onclick='edit_master(".'$1'.")' title='Edit Master'>
                <i class='fa fa-pencil'></i> Edit
            </a>","master_id");
        $this->datatables->unset_column('master_id');
        echo $this->datatables->generate();

    }

    public function get_division($id){

        $master_data=$this->kcrud->getValueOne("master_division","id,name","WHERE id='$id'",null,null,null,null);
        echo json_encode(array("status"=>true,"master_data"=>$master_data));
    }

    public function save_division(){

        $val= $this->input->post();

        $name=$val["name"];

        $data = array(
            "name"=>$name,
        );

        $this->kcrud->save("master_division",$data);
        echo json_encode(array("status"=>true));

    }

    public function edit_division(){

        $val= $this->input->post();

        $id=$val["id"];
        $name=$val["name"];

        $data = array(
            "name"=>$name,
        );

        $this->kcrud->update("master_division",$data,array("id"=>$id));
        echo json_encode(array("status"=>true));

    }
    /* master division*/

    /* master designation*/
    public function designation()
    {
        $this->permissions->check_permission('access');

        $data=array();

        $title = "Master Designation";
        $meta["title"] = $title;
        $data['master_title']= $title;
        $this->load->helper('url');

        $this->load->view('common/header',$meta);
        $this->load->view('designation_index',$data);
        $this->load->view('common/footer');

    }

    public function get_master_designation()
    {

        $this->load->library('datatables');

        $this->datatables->select("
            master_designation.id,
            master_designation.name,
            master_designation.id AS master_id
            ", FALSE);

        $this->datatables->from('master_designation');
        $this->datatables->add_column("Actions",
            "<a class='btn btn-sm btn-default tbl-action' target='javascript:;' onclick='edit_master(".'$1'.")' title='Edit Master'>
                <i class='fa fa-pencil'></i> Edit
            </a>","master_id");
        $this->datatables->unset_column('master_id');
        echo $this->datatables->generate();

    }

    public function get_designation($id){

        $master_data=$this->kcrud->getValueOne("master_designation","id,name","WHERE id='$id'",null,null,null,null);
        echo json_encode(array("status"=>true,"master_data"=>$master_data));
    }

    public function save_designation(){

        $val= $this->input->post();

        $name=$val["name"];

        $data = array(
            "name"=>$name,
        );

        $this->kcrud->save("master_designation",$data);
        echo json_encode(array("status"=>true));

    }

    public function edit_designation(){

        $val= $this->input->post();

        $id=$val["id"];
        $name=$val["name"];

        $data = array(
            "name"=>$name,
        );

        $this->kcrud->update("master_designation",$data,array("id"=>$id));
        echo json_encode(array("status"=>true));

    }
    /* master designation*/


    /* master insurance scheme*/
    public function insurance_scheme()
    {
        $this->permissions->check_permission('access');

        $data=array();

        $title = "Master Insurance Scheme";
        $meta["title"] = $title;
        $data['master_title']= $title;
        $this->load->helper('url');

        $this->load->view('common/header',$meta);
        $this->load->view('insurance_scheme_index',$data);
        $this->load->view('common/footer');

    }

    public function get_master_insurance_scheme()
    {

        $this->load->library('datatables');

        $this->datatables->select("
            master_insurance_scheme.id,
            master_insurance_scheme.scheme_code,
            master_insurance_scheme.max_amount,
            master_insurance_scheme.id AS master_id
            ", FALSE);

        $this->datatables->from('master_insurance_scheme');
        $this->datatables->add_column("Actions",
            "<a class='btn btn-sm btn-default tbl-action' target='javascript:;' onclick='edit_master(".'$1'.")' title='Edit Master'>
                <i class='fa fa-pencil'></i> Edit
            </a>","master_id");
        $this->datatables->unset_column('master_id');
        echo $this->datatables->generate();

    }

    public function get_insurance_scheme($id){

        $master_data=$this->kcrud->getValueOne("master_insurance_scheme","id,scheme_code,max_amount","WHERE id='$id'",null,null,null,null);
        echo json_encode(array("status"=>true,"master_data"=>$master_data));
    }

    public function save_insurance_scheme(){

        $val= $this->input->post();

        $scheme_code=$val["scheme_code"];
        $max_amount=$val["max_amount"];

        $data = array(
            "scheme_code"=>$scheme_code,
            "max_amount"=>$max_amount
        );

        $this->kcrud->save("master_insurance_scheme",$data);
        echo json_encode(array("status"=>true));

    }

 public function edit_insurance_scheme() {
    $val = $this->input->post();

    $id = $val["id"];
    $scheme_code = $val["scheme_code"];
    $max_amount = $val["max_amount"];

    $data = array(
        "scheme_code" => $scheme_code,
        "max_amount" => $max_amount
    );

    // 1. Update the insurance scheme
    $this->kcrud->update("master_insurance_scheme", $data, array("id" => $id));

    // 2. Update tbl_employee_limit for the latest medical year
    $this->load->database();
    $db = $this->db;

    // Get the latest medical year
    $medical = $db->select('id')
                  ->from('master_medical_year')
                  ->order_by('id', 'DESC')
                  ->limit(1)
                  ->get()
                  ->row();

    if ($medical) {
        $medical_year_id = $medical->id;

        // Update only existing rows (no inserts)
        $db->where('medical_year', $medical_year_id)
           ->where('scheme_code', $scheme_code)
           ->update('tbl_employee_limit', ['max_amount' => $max_amount]);
    }

    echo json_encode(array("status" => true));
}

    /* master insurance scheme*/

    /* master medical year*/
    public function medical_year()
    {
        $this->permissions->check_permission('access');

        $data=array();

        $title = "Master Medical Year";
        $meta["title"] = $title;
        $data['master_title']= $title;
        $this->load->helper('url');

        $this->load->view('common/header',$meta);
        $this->load->view('medical_year_index',$data);
        $this->load->view('common/footer');

    }

    public function get_master_medical_year()
    {

        $this->load->library('datatables');

        $this->datatables->select("
            master_medical_year.id,
            master_medical_year.description,
            master_medical_year.from_date,
            master_medical_year.to_date
            ", FALSE);

        $this->datatables->from('master_medical_year');
//        $this->datatables->add_column("Actions",
//            "<a class='btn btn-sm btn-default tbl-action' target='javascript:;' onclick='edit_master(".'$1'.")' title='Edit Master'>
//                <i class='fa fa-pencil'></i> Edit
//            </a>","master_id");
//        $this->datatables->unset_column('master_id');
        echo $this->datatables->generate();

    }

    public function get_medical_year($id){

        $master_data=$this->kcrud->getValueOne("master_medical_year","id,description,from_date,to_date","WHERE id='$id'",null,null,null,null);
        echo json_encode(array("status"=>true,"master_data"=>$master_data));
    }

    public function save_medical_year(){

        $val= $this->input->post();

        $from_date=$val["from_date"];
        $to_date=$val["to_date"];

        $data = array(
            "description"=>date("Y-M-d",strtotime($from_date))." - ".date("Y-M-d",strtotime($to_date)),
            "from_date"=>$from_date,
            "to_date"=>$to_date
        );

        $this->kcrud->save("master_medical_year",$data);

        $data_emp=array(
            "usage_status"=>0
        );

        $this->kcrud->update("tbl_employee_listing",$data_emp,array("status"=>"Active"));

        echo json_encode(array("status"=>true));

    }

    public function edit_medical_year(){

        $val= $this->input->post();

        $id=$val["id"];

        $from_date=$val["from_date"];
        $to_date=$val["to_date"];

        $data = array(
            "description"=>date("Y-M-d",strtotime($from_date))." - ".date("Y-M-d",strtotime($to_date)),
            "from_date"=>$from_date,
            "to_date"=>$to_date
        );

        $this->kcrud->update("master_medical_year",$data,array("id"=>$id));
        echo json_encode(array("status"=>true));

    }
    /* master medical year*/


}