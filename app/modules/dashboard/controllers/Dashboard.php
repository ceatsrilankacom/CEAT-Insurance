<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard extends MX_Controller{

    function __construct()
    {
        parent::__construct();
        if (!$this->ion_auth->logged_in()) {
            redirect('index.php/auth/login', 'refresh');
        }
        ini_set('display_errors', 0);
        $this->load->model('dash_mod');
        $this->load->library('permissions');
        $this->load->library('kcrud');
    }

    public function index()
    {
        $data=array();

        $date1=date("Y-m-d");
        $date2=date('Y-m-d', strtotime('-1 day', strtotime(date("Y-m-d"))));
        $date3=date('Y-m-d', strtotime('-2 day', strtotime(date("Y-m-d"))));
        $date4=date('Y-m-d', strtotime('-3 day', strtotime(date("Y-m-d"))));
        $date5=date('Y-m-d', strtotime('-4 day', strtotime(date("Y-m-d"))));

        $monthly_kelaniya= $this->kcrud->getValueOne("tbl_insurance_claims","SUM(payable_amount) AS net_total","WHERE emp_code LIKE '%K%' AND claim_date LIKE '".date("Y-m-d")."%'",null,null,null,null)->net_total;
        $monthly_kalutara= $this->kcrud->getValueOne("tbl_insurance_claims","SUM(payable_amount) AS net_total","WHERE emp_code LIKE '%A%' AND claim_date LIKE '".date("Y-m-d")."%'",null,null,null,null)->net_total;
        $monthly_radial= $this->kcrud->getValueOne("tbl_insurance_claims","SUM(payable_amount) AS net_total","WHERE emp_code LIKE '%R%' AND claim_date LIKE '".date("Y-m-d")."%'",null,null,null,null)->net_total;

        $data["claim_kelaniya"]=$monthly_kelaniya;
        $data["claim_kalutara"]=$monthly_kalutara;
        $data["claim_radial"]=$monthly_radial;

        $total = $monthly_kelaniya + $monthly_kalutara + $monthly_radial;

        $data["kelaniya"] = $total ? number_format(($monthly_kelaniya / $total) * 100, 0, "", "") : 0;
        $data["kalutara"] = $total ? number_format(($monthly_kalutara / $total) * 100, 0, "", "") : 0;
        $data["radial"]   = $total ? number_format(($monthly_radial / $total) * 100, 0, "", "") : 0;

        $claim_day1= number_format($this->kcrud->getValueOne("tbl_insurance_claims","SUM(payable_amount) AS net_total","WHERE claim_date LIKE '".$date1."%'",null,null,null,null)->net_total ? : 0,"0","","");
        $claim_day2= number_format($this->kcrud->getValueOne("tbl_insurance_claims","SUM(payable_amount) AS net_total","WHERE claim_date LIKE '".$date2."%'",null,null,null,null)->net_total ? : 0,"0","","");
        $claim_day3= number_format($this->kcrud->getValueOne("tbl_insurance_claims","SUM(payable_amount) AS net_total","WHERE claim_date LIKE '".$date3."%'",null,null,null,null)->net_total ? : 0,"0","","");
        $claim_day4= number_format($this->kcrud->getValueOne("tbl_insurance_claims","SUM(payable_amount) AS net_total","WHERE claim_date LIKE '".$date4."%'",null,null,null,null)->net_total ? : 0,"0","","");
        $claim_day5= number_format($this->kcrud->getValueOne("tbl_insurance_claims","SUM(payable_amount) AS net_total","WHERE claim_date LIKE '".$date5."%'",null,null,null,null)->net_total ? : 0,"0","","");


        $fiveDaysLabels="['".date('y-m-d',strtotime($date5))."','".date('y-m-d',strtotime($date4))."','".date('y-m-d',strtotime($date3))."','".date('y-m-d',strtotime($date2))."','".date('y-m-d',strtotime($date1))."']";
        $fiveDaysAmount="[".$claim_day5.",".$claim_day4.",".$claim_day3.",".$claim_day2.",".$claim_day1."]";

        $data["fiveDaysLabels"]=$fiveDaysLabels;
        $data["fiveDaysAmount"]=$fiveDaysAmount;

        $this->load->view('common/header');
        $this->load->view('main',$data);
        $this->load->view('common/footer');
    }

    public function getExpenseSummaryData(){

        $approved=0;
        $rejected=0;
        $total=0;
        $pending=0;

        $month=date("Y-03");

        $approved = (int)$this->dash_mod->getApprovedExpenseData($month)->approved;
        $rejected = (int)$this->dash_mod->getRejectedExpenseData($month)->rejected;
        $total = (int)$this->dash_mod->getTotalExpenseData($month)->total;
        $pending = (int)($total - ($approved+$rejected));

        echo json_encode(array("status"=>TRUE,'approved'=>$approved,'rejected'=>$rejected,'pending'=>$pending,'total'=>$total));

    }

    public function test(){
        $this->load->view('index');
    }

}














