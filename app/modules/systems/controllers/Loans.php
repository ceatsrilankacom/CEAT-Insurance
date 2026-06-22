<?php

class Loans extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('ion_auth');
         $groups=array('admin');
        // check if user logged in
        if (!$this->ion_auth->logged_in()) {
            redirect('index.php/auth/login');
        }
        $this->load->model('leave_management_mod','leave_mod');
        $this->load->model('employee_list_model','emp_list');
        $this->load->model('attendance_mod');
        $this->load->model('loans_mod');
        $this->load->library('system_log');
    }

    function index()
    {
        $data['employeeData'] = $this->loans_mod->getAllEmployees();
        $data['list_loans'] = $this->loans_mod->listAllLoans();

        $this->load->view('common/header');
        $this->load->view('finances/loans', $data);
        $this->load->view('common/footer');
    }

    public function get_employees_loan_data()
    {

        /*$monthly_pay = PAY_MONTHLY;
        $pay_month_start = PAY_FROM_DAY;

        if($monthly_pay=='NO'){
            $date = date("Y-m-d", strtotime(date("Y-m-"), $pay_month_start));
        }else{
            $date = date("Y-m-d", strtotime(date("Y-m-"), "1"));
        }*/

        $this->load->library('datatables');
        $this->datatables->select("
            hr_pay_loan_main.id as loan_id,
            hr_pay_m_employee_category.desc as department_name,
            hr_pay_employees.employee_id emp_ids,
            hr_pay_employees.first_name as f_name,
            hr_pay_loan_main.start_date,
            hr_pay_loan_main.end_date,
            hr_pay_loan_main.term,
            hr_pay_loan_main.amount,
            hr_pay_loan_main.opening,
        ", FALSE);
        $this->datatables->from('hr_pay_loan_main');
        //$this->datatables->join('hr_pay_loan_data','hr_pay_loan_data.l_id=hr_pay_loan_main.id', 'inner');
        $this->datatables->join('hr_pay_employees','hr_pay_employees.id=hr_pay_loan_main.employee_id', 'inner');
        $this->datatables->join('hr_pay_m_employee_category','hr_pay_m_employee_category.id=hr_pay_employees.emp_category', 'left');
        //$this->datatables->group_by("hr_pay_loan_main.id");
        //$this->datatables->where('hr_pay_loan_data.date <',$date);
        echo $this->datatables->generate();
    }

    public function insert_loan(){

        $var = $this->input->post();
        if (empty($var['employee_id'])&&empty($var['type'])&&empty($var['witness1'])&&empty($var['witness2'])&&empty($var['term'])&&empty($var['amount'])&&empty($var['start_date'])) {
            echo json_encode(array(
                'status' => false,
                'message' => "Enter Required Data"
            ));
            exit;
        }
        $data = array(
            'employee_id'=>$var['employee_id'],
            'type'=>$var['type'],
            'term'=>$var['term'],
            'amount'=>$var['amount'],
            'opening'=>$var['opening'],
            'start_date'=>$var['start_date'],
            'end_date'=>$var['end_date'],
            'status'=> 1
        );
        if($id = $this->loans_mod->insert_loan_info($data)){
            $installments = round(($var['amount'])/($var['term']));
            if (isset($installments)) {
                $start_date = $var['start_date'];
                $amount = $var['amount'];
                $t_term = 0;
                $term = $var['term'];
                for ($i = 1; $i <= $installments; $i++) {
                        $due_dates[] = $start_date;
//                        $time = date('Y-m-d', strtotime('+1 month', strtotime($start_date)));
//                        $start_date = $time;
                    if($t_term==0){
                        $start_date = $start_date;
                    }
                        $t_term = $t_term + $term;
                        $bal = $amount-$t_term;
                        if($bal<$term){
                            $term_d = $bal;
                        } else {
                            $term_d = $term;
                        }
                        $insert_loan_list_data = array(
                            'l_id' => $id,
                            'date' => $start_date,
                            'amount' => $term,
                            'status' => 0,
                        );
                        $this->db->insert('hr_pay_loan_data', $insert_loan_list_data);
                        $time = date('Y-m-d', strtotime('+1 month', strtotime($start_date)));
                        $start_date = $time;
                        unset($insert_loan_list_data);
                }
                $this->system_log->create_system_log("Loans", "Success", "New Loan Added ID #".$id." for Employee ID #".$var['employee_id']);
                echo json_encode(array(
                    'status' => true,
                    'message' => "Save Done"
                ));
                exit;
            }
        } else {
            echo json_encode(array(
                'status' => false,
                'message' => "Save Error"
            ));
            exit;
        }
    }
}