<?php
/**
 * Created by PhpStorm.
 * User: kasun.demel
 * Date: 7/27/2021
 * Time: 12:32 PM
 */

class Expense_detail_report extends CI_Controller
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
        $this->load->view('expense_detail_index', $data);
        $this->load->view('common/footer');

    }

    public function get_expense_data(){

        $data=array();
        $expense_type="";
        $details = $this->input->post();
        $from_date = $details['from_date'];
        $to_date = $details['to_date'];
        $rep = $details['rep'];

        $expense_type = $details['expense_type'];

        if ((empty($from_date)) || (empty($to_date)) || (empty($rep))){
            /*echo json_encode(array(
                'status' => false,
                'message' => "Unable to get data."
            ));*/
            //redirect(site_url('reports/expense_summary_report'));
            echo json_encode(array('status'=>false,'message'=>'Please select Date range & Sales Executive'));
        }

        if($expense_type == "all"){
            $data['expense_type'] = $this->kcrud->getValueAll("tbl_master_expense_type", "id,code,name", "WHERE status=1", null, null, null, null);
        }
        else{
            $data['expense_type'] = $this->kcrud->getValueAll("tbl_master_expense_type", "id,code,name", "WHERE id=".$expense_type, null, null, null, null);
        }

        $data["from_date"]=$from_date;
        $data["to_date"]=$to_date;
        $data["rep"]=$rep;

        $where="";
       // $where="WHERE date >= '$from_date' AND date <= '$to_date' AND user='$rep' AND (sales_staff='Approved' AND sales_manager='Approved' AND accountant='Approved')";
        $where="WHERE date >= '$from_date' AND date <= '$to_date' AND user='$rep' AND (sales_staff='Approved')";
        $join="JOIN tbl_master_expense_type ON tbl_master_expense_type.code=tbl_expenses_list.expense_type";
        $data['summary_report'] = $this->kcrud->getValueAll("tbl_expenses_list", "expense_code,expense_type,month,date,CONCAT(expense_type,' - ',tbl_master_expense_type.name) AS expense_name,amount,description,opening_km,closing_km,cost_per_km,receipt_no", $where, null, $join, null, null);

        $this->load->view('load_expense_detail',$data);
    }

}