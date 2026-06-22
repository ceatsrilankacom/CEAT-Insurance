<?php
/**
 * Created by PhpStorm.
 * User: kasun.demel
 * Date: 1/22/2021
 * Time: 4:20 PM
 */

class Insurance_claim extends CI_Controller
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
        $this->load->model('Search_m');


        date_default_timezone_set("Asia/Colombo");
        $this->currentTime = date('Y-m-d H:i:s');
        $this->currentDate = date('Y-m-d');

    }

    public function index()
    {
        $this->permissions->check_permission('access');

        $title="Insurance Claim";
        $meta["title"]=$title;
        $data["title"]=$title;
        $this->load->helper('url');

        $this->load->view('common/header',$meta);
        $this->load->view('insurance_claim_index', $data);
        $this->load->view('common/footer');

    }

    public function get_all_claims()
    {

        $this->load->library('datatables');

        $this->datatables->select("
            tbl_insurance_claims.id,
            tbl_insurance_claims.emp_code,
            tbl_insurance_claims.emp_name,
            tbl_insurance_claims.bill_amount,
            tbl_insurance_claims.payable_amount,
            tbl_insurance_claims.rejected_amount,
            tbl_insurance_claims.bill_date,
            tbl_insurance_claims.claim_date,
            tbl_insurance_claims.remarks,
            tbl_insurance_claims.status,
            tbl_insurance_claims.description,
            tbl_insurance_claims.reason,
            auth_users.first_name,
            tbl_insurance_claims.id as insurance_id,
            ", FALSE);

        $this->datatables->from('tbl_insurance_claims');
        //$this->datatables->join('tbl_employee_listing','tbl_employee_listing.emp_code=tbl_insurance_claims.emp_code','left');
        $this->datatables->join('auth_users','auth_users.id=tbl_insurance_claims.user','left');

        // $this->datatables->add_column("Actions",
        //     "<a class='btn btn-sm btn-default tbl-action' href='javascript:void(0);' title='Edit' onclick='edit_insurance(".'$1'.")'>
        //         <i class='fa fa-edit'></i> Edit
        //     </a>","insurance_id");
        $this->datatables->unset_column('insurance_id');
        echo $this->datatables->generate();

    }

// public function get_all_claims_by_dates(){
//     $this->form_validation ->set_rules('key','key','trim|required|min_length[2]|max_length[25]');
//     $this->form_validation->set_rules('Date1','first date','trim|required');
//     $this->form_validation->set_rules('Date2','last date','trim|required');
//     if($this->form_validation->run()==FALSE)
//     {
//         $this->load->view('insurance_claim_index');
//     }else{
//         $key=$this->input->post('key');
//         $Date1=$this->input->post('Date1');
//         $Date2=$this->input->post('Date2');
//         $store=$this->Search_m->set($key,$Date1,$Date2);
//         echo json_encode($store);
//     }

// }



    public function get_all_claims_by_date()
    {
        $val=$this->input->post();
        // echo $this->input->post();

        $this->load->library('datatables');

        $this->datatables->select("
            tbl_insurance_claims.id,
            tbl_insurance_claims.emp_code,
            tbl_insurance_claims.emp_name,
            tbl_insurance_claims.bill_amount,
            tbl_insurance_claims.payable_amount,
            tbl_insurance_claims.rejected_amount,
            tbl_insurance_claims.bill_date,
            tbl_insurance_claims.claim_date,
            tbl_insurance_claims.remarks,
            tbl_insurance_claims.status,
            tbl_insurance_claims.description,
            tbl_insurance_claims.reason,
            auth_users.first_name,
            tbl_insurance_claims.id,
            ", FALSE);

        $this->datatables->from('tbl_insurance_claims');
        //$this->datatables->join('tbl_employee_listing','tbl_employee_listing.emp_code=tbl_insurance_claims.emp_code','left');
        $this->datatables->join('auth_users','auth_users.id=tbl_insurance_claims.user','left');

        // $this->datatables->add_column("Actions",
        //     "<a class='btn btn-sm btn-default tbl-action' href='javascript:void(0);' title='Edit' onclick='edit_insurance(".'$1'.")'>
        //         <i class='fa fa-edit'></i> Edit
        //     </a>","insurance_id");

            // $q = $val['bill_from_date'];
            // $r = $val['bill_to_date'];

        $this->datatables->where('tbl_insurance_claims.bill_date BETWEEN "'.$val['billFromDate'].'" AND "'.$val['billToDate'].'"');
      // $this->datatables->where('tbl_insurance_claims.bill_date BETWEEN "2023-03-01" AND "2023-03-30"');
        //$this->datatables->unset_column(' tbl_insurance_claims.id');
        $dataJson = $this->datatables->generate();
        // $dataJson = json_encode($dataJson);

        // $dataJson = preg_replace('Array ', '', $dataJson);

        // header('Content-Type: application/json');

        echo $dataJson;
        

        /*$dataTableJson = $this->datatables->generate();
        
        $script = "<script>";
        $script = "var data = " . $dataTableJson . ";";
        $script = "console.log(data)";
        $script = "</script>";

        return $script;*/

    }
    

    public function get_employee_info()
    {
        $data = $this->kcrud->getValueAll("tbl_employee_listing","emp_code,title,initials,name","WHERE status='Active'",null,null,null,null);
        $dts = array();

        $dts[0] = "--Select Employee--";
        foreach ($data as $dt) {
            $dts[$dt->emp_code] = $dt->emp_code." - ".$dt->title.". ".$dt->initilas." ".$dt->name;
        }
        echo json_encode($dts);
    }

    public function get_medical_year()
    {

        $data = $this->kcrud->getValueAll("master_medical_year","id,description,from_date,to_date",null,null,null,null,null);
        $dts = array();

        foreach ($data as $dt) {
            $dts[$dt->id] = $dt->description."  ".$dt->from_date." - ".$dt->to_date;
        }
        echo json_encode($dts);

    }

    // public function get_employee_usage(){

    //     $date=date("Y-m-d");
    //     $val=$this->input->post();

    //     $medical=$this->kcrud->getValueOne("master_medical_year","id,description,from_date,to_date",null,null,null,null,"ORDER BY master_medical_year.id DESC");

    //     $emp_limit=0.00;
    //     $emp_used=0.00;
    //     $emp_balance=0.00;

    //     if($limits=$this->kcrud->getValueOne("tbl_employee_limit","emp_code,max_amount","WHERE emp_code='".$val["emp_code"]."' AND medical_year=".$medical->id,null,null,null,null)){
    //         $emp_limit = $limits->max_amount;
    //     }

    //     $payable_amount = $this->kcrud->getValueAll("tbl_insurance_claims","payable_amount","WHERE emp_code='".$val["emp_code"]."' AND medical_year=".$medical->id,null,null,null,null);

    //     $total_payable=0.00;
    //     foreach($payable_amount as $payable1){
    //         $total_payable += $payable1->payable_amount;
    //     }

    //     $emp_used = number_format($total_payable,2,".","");
    //     $emp_balance = number_format(($emp_limit - $total_payable),2,".","");;

    //     echo json_encode(array("status"=>true,"emp_limit"=>$emp_limit,"emp_balance"=>$emp_balance,"emp_used"=>$emp_used));

    // }

    // public function sales_itinerary_redirect($epf_no,$month,$user_type){

    //     $this->session->set_userdata('EDIT_ITINERARY','0');
    //     redirect(base_url()."index.php/insurance/sales_itinerary_calendar/index/".$epf_no."/".$month."/".$user_type);
    // }

    // public function print_itinerary_redirect($epf_no,$month){

    //     $this->session->set_userdata('EDIT_ITINERARY','0');
    //     redirect(base_url()."index.php/insurance/sales_itinerary/print_sales_itinerary/".$epf_no."/".$month);
    // }

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
            $message2="This insurance is sent to the Sales Staff";

        }
        else if($user_type == "SS"){

            $data_rr["sales_staff"]=$status;
            $where="WHERE sales_manager !='Pending' AND rep='$epf_no'";
            $message1="Sales Manager status isn't Pending !.You Can't Change";
            $message2="This insurance is sent to the Sales Manager";

        }
        else if($user_type == "SM"){

            $data_rr["sales_manager"]=$status;
            $where="WHERE sales_staff !='Pending' AND rep='$epf_no'";
            $message1="Sales Staff status is Pending !";
            $message2="This insurance has been saved";

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

        $emp_limit=0.00;
        $emp_used=0.00;
        $emp_balance=0.00;

        $medical=$this->kcrud->getValueOne("master_medical_year","id,description,from_date,to_date",null,null,null,null,"ORDER BY master_medical_year.id DESC");

        if($limits=$this->kcrud->getValueOne("tbl_employee_limit","emp_code,max_amount","WHERE emp_code='".$val["employee"]."' AND medical_year=".$medical->id,null,null,null,null)){
            $emp_limit = $limits->max_amount;
        }

        $current_date = date("Y-m-d");

        if(strtotime($val["bill_date"]) > strtotime($current_date)){
            echo json_encode(array("status"=>false,"message"=>"Can't enter future date for bill date"));
            exit();
        }

        if(strtotime($val["bill_date"]) > strtotime($medical->to_date)){
            echo json_encode(array("status"=>false,"message"=>"Bill Date is not in the medical year!.  Medical Year Range from ".$medical->from_date." to ".$medical->to_date));
            exit();
        }

        if(strtotime($val["bill_date"]) < strtotime($medical->from_date)){
            echo json_encode(array("status"=>false,"message"=>"Bill Date is not in the medical year !!.  Medical Year Range from ".$medical->from_date." to ".$medical->to_date));
            exit();
        }


        $payable_amount = $this->kcrud->getValueAll("tbl_insurance_claims","payable_amount","WHERE emp_code='".$val["employee"]."' AND medical_year=".$medical->id,null,null,null,null);

        $total_payable=0.00;
        foreach($payable_amount as $payable1){
            $total_payable += $payable1->payable_amount;
        }

        $emp_used = number_format($total_payable,2,".","");
        $emp_balance = number_format(($emp_limit - $total_payable),2,".","");

        $emp_bill_amount=0;
        $emp_rejected_amount=0;
        $emp_payable_amount=0;
        $remarks="";

        $emp_bill_amount = $val["bill_amount"];
        if(($emp_balance - $emp_bill_amount) >= 0){
            $emp_payable_amount = $val["bill_amount"];
        }
        else{
            $emp_payable_amount = $emp_balance;
            $emp_rejected_amount = $emp_bill_amount - $emp_balance;
            $remarks="Limit Exceed";
        }

        $employee1 = $this->kcrud->getValueOne("tbl_employee_listing","id,emp_code,emp_scheme,status,title,initials,name","WHERE emp_code='".$val["employee"]."'",null,null,null,null);

        $data=array(
            "emp_code"=>$val["employee"],
            "emp_name"=>$employee1->title.". ".$employee1->initials." ".$employee1->name,
            "medical_year"=>$medical->id,
            "bill_amount"=>$emp_bill_amount,
            "payable_amount"=>$emp_payable_amount,
            "rejected_amount"=>$emp_rejected_amount,
            "bill_date"=>$val["bill_date"],
            "claim_date"=>date("Y-m-d H:i:s"),
            "remarks"=>$remarks,
            "description"=>$val["description"],
            "reason"=>"",
            "user"=>USER_ID
        );

        if($emp_balance == 0){
            $data["status"]='Rejected';
            echo json_encode(array("status"=>false,"message"=>"Your Balance is 0"));
            exit();
        }
        else{
            $data["status"]='Approved';
        }



        $this->kcrud->save("tbl_insurance_claims",$data);
        echo json_encode(array("status"=>true,"message"=>"Claim Added Successfully !"));
    }

    public function edit_save()
    {
        $val= $this->input->post();

        $insurance_id=$val["insurance_id"];

        $emp_limit=0.00;
        $emp_used=0.00;
        $emp_balance=0.00;

        //get employee insurance record
        $emp_medical=$this->kcrud->getValueOne("tbl_insurance_claims","id,medical_year,emp_code,bill_amount,payable_amount,rejected_amount","WHERE tbl_insurance_claims.id=".$insurance_id,null,null,null,null);
        //get last medical year info
        $medical=$this->kcrud->getValueOne("master_medical_year","id,description,from_date,to_date",null,null,null,null,"ORDER BY master_medical_year.id DESC");

        //validate reason
        if($val["reason"] ==""){
            echo json_encode(array("status"=>false,"message"=>"Please enter reason !"));
            exit();
        }

        //validate current medical year and added medical year
        if($emp_medical->medical_year != $medical->id){
            echo json_encode(array("status"=>false,"message"=>"You can't edit old records !"));
            exit();
        }

        //get employee limit info according to the medical year
        if($limits=$this->kcrud->getValueOne("tbl_employee_limit","emp_code,max_amount","WHERE emp_code='".$emp_medical->emp_code."' AND medical_year=".$medical->id,null,null,null,null)){
            $emp_limit = $limits->max_amount;
        }

        //get all payable amount
        $payable_amount = $this->kcrud->getValueAll("tbl_insurance_claims","id,payable_amount","WHERE emp_code='".$emp_medical->emp_code."' AND medical_year=".$medical->id." AND id !=".$insurance_id,null,null,null,null);

        $total_payable=0.00;
        foreach($payable_amount as $payable1){

            if($emp_medical->id != $payable1->id){
                $total_payable += $payable1->payable_amount;
            }

        }

        $emp_used = number_format($total_payable,2,".","");
        $emp_balance = number_format(($emp_limit - $emp_used),2,".","");

        $emp_bill_amount=0;
        $emp_rejected_amount=0;
        $emp_payable_amount=0;
        $remarks="";

        //emp_bill_amount = 4700
        $emp_bill_amount = $val["edit_bill_amount"];

        if(($emp_balance - $emp_bill_amount) >= 0){
            $emp_payable_amount = $val["edit_bill_amount"];
        }
        else{

            $emp_payable_amount = $emp_balance;
            $emp_rejected_amount = $emp_bill_amount - $emp_balance;
            $remarks="Limit Exceed";
        }

        $data=array(
            "bill_amount"=>$emp_bill_amount,
            "payable_amount"=>$emp_payable_amount,
            "rejected_amount"=>$emp_rejected_amount,
            "remarks"=>$remarks,
            "reason"=>$val["reason"]." (Change by ".USER_NAME.")",
            "user"=>USER_ID

        );

        if($emp_balance == 0){
            $data["status"]='Rejected';
            echo json_encode(array("status"=>false,"message"=>"Your Balance is 0"));
            exit();
        }
        else{
            $data["status"]='Approved';
        }

        $this->kcrud->update("tbl_insurance_claims",$data,array("id"=>$insurance_id));
        echo json_encode(array("status"=>true,"message"=>"Claim Updated Successfully !"));

    }


    public function edit_insurance($id){

        $insurance = $this->kcrud->getValueOne("tbl_insurance_claims","emp_code,medical_year,bill_amount,payable_amount,rejected_amount,bill_date,claim_date,remarks","WHERE id='$id'",null,null,null,null);
        echo json_encode(array("insurance"=>$insurance,"status"=>true));

    }


    public function update_employee_usage()
    {

        $date=date("Y-m-d");

        $medical_year = $this->kcrud->getValueOne("master_medical_year","id,from_date,to_date","WHERE from_date <= '".$date."' AND to_date >= '".$date."'",null,null,null,null);

        //get active employees
        $employees = $this->kcrud->getValueAll("tbl_employee_listing","id,emp_code,emp_scheme,status,title,initials,name","WHERE usage_status='0'",null,null,null,null);

        foreach ($employees as $employee1){

            $max_amount = $this->kcrud->getValueOne("master_insurance_scheme","scheme_code,max_amount","WHERE scheme_code='".$employee1->emp_scheme."'",null,null,null,null);

            //check available data to usage table
            if(!$this->kcrud->getValueOne("tbl_employee_limit","emp_code,medical_year","WHERE emp_code='".$employee1->emp_code."' AND medical_year=".$medical_year->id,null,null,null,null)){

                //data insert
                $data=array(
                    "emp_code"=>$employee1->emp_code,
                    "emp_name"=>$employee1->title.". ".$employee1->initials." ".$employee1->name,
                    "medical_year"=>$medical_year->id,
                    "from_date"=>$medical_year->from_date,
                    "to_date"=>$medical_year->to_date,
                    "max_amount"=>$max_amount->max_amount,
                    "scheme_code"=>$employee1->emp_scheme,
                    "emp_status"=>$employee1->status,
                );

                $this->kcrud->save("tbl_employee_limit",$data);

            }
            else{

                //data insert
                $data=array(
                    "emp_name"=>$employee1->title.". ".$employee1->initials." ".$employee1->name,
                    "max_amount"=>$max_amount->max_amount,
                    "scheme_code"=>$employee1->emp_scheme,
                    "emp_status"=>$employee1->status,
                );

                $this->kcrud->update("tbl_employee_limit",$data,array("emp_code"=>$employee1->emp_code,"medical_year"=>$medical_year->id));
            }

            $data_emp=array(
                "usage_status"=>1
            );

            $this->kcrud->update("tbl_employee_listing",$data_emp,array("emp_code"=>$employee1->emp_code));


        }

        echo json_encode(array("status"=>true,"message"=>"update employee usage !"));
    }


//    public function change_claim_date(){
//
//        $claims = $this->kcrud->getValueAll("tbl_insurance_claims","id,bill_date,claim_date",null,null,null,null,null);
//
//        foreach ($claims as $claim1){
//
//            $data=array(
//                'bill_date'=>date("Y-m-d",strtotime($claim1->bill_date)),
//                'claim_date'=>date("Y-m-d",strtotime($claim1->claim_date))
//            );
//
//            $this->kcrud->update("tbl_insurance_claims",$data,array("id"=>$claim1->id));
//        }
//
//        echo json_encode(array("status"=>TRUE));
//    }

}