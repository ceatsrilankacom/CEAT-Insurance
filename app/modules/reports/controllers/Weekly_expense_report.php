<?php
/**
 * Created by PhpStorm.
 * User: kasun.demel
 * Date: 7/30/2021
 * Time: 8:37 AM
 */

class Weekly_expense_report extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('ion_auth');
        if (!$this->ion_auth->logged_in()) {
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

        $title = "Expense - Detail Report";
        $meta["title"] = $title;
        $data["title"] = $title;
        $this->load->helper('url');

        $data['expense_type'] = $this->kcrud->getValueAll("tbl_master_expense_type", "id,code,name", "WHERE status=1", null, null, null, null);

        if(USER_ID == 1){
            $data['sales_rep'] = $this->kcrud->getValueAll("tbl_mas_rep", "name,rep", null, null, null, null, null);
        }
        else{
            $data['sales_rep'] = $this->kcrud->getValueAll("tbl_mas_rep", "name,rep", "WHERE rep=".USER_ID, null, null, null, null);
        }

        $this->load->view('common/header', $meta);
        $this->load->view('weekly_expense_index', $data);
        $this->load->view('common/footer');

    }

    public function get_expense_data(){

        $data=array();
        $expense_type="";
        $details = $this->input->post();
        $from_date = $details['from_date'];
        $to_date = $details['to_date'];

        if ((empty($from_date)) || (empty($to_date))){
            echo json_encode(array('status'=>false,'message'=>'Please select Date range & Sales Executive'));
            exit();
        }


        $data["from_date"]=$from_date;
        $data["to_date"]=$to_date;

        $where="";
        $where="WHERE tbl_expenses_list.date >= '$from_date' AND tbl_expenses_list.date <= '$to_date' AND (tbl_expenses_list.sales_staff='Approved')";
        $join="JOIN tbl_users ON tbl_users.epf_no=tbl_expenses_list.user JOIN tbl_master_expense_type ON tbl_master_expense_type.code=tbl_expenses_list.expense_type";

        $expense_list = $this->kcrud->getValueAll("tbl_expenses_list", "tbl_users.epf_no,tbl_users.name AS emp_name,user,expense_code,expense_type,month,date,CONCAT(expense_type,' - ',tbl_master_expense_type.name) AS expense_name,amount,description,opening_km,closing_km,cost_per_km,receipt_no", $where, null, $join, null, null);

        $fuel_total=array();
        $other_total=array();

        foreach($expense_list as $expense1){

            $data["expense_list"][$expense1->user] = $expense1->user;
            $data["epf_no"][$expense1->user] = $expense1->epf_no;
            $data["emp_name"][$expense1->user] = $expense1->emp_name;
            $data["date"][$expense1->user] = $expense1->date;

            if($expense1->expense_type == "FE"){
                $data["fuel_total"][$expense1->user] += $expense1->amount;
            }
            else{
                $data["other_total"][$expense1->user] += $expense1->amount;
            }
        }

        $this->load->view('load_weekly_expense',$data);
    }

}