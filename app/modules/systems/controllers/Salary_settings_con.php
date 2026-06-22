<?php

class Salary_settings_con extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();

        ini_set('display_errors', 0);
        error_reporting(0);


        $this->load->library('ion_auth');
        $this->load->library('numbertowords');
        // check if user logged in
        if (!$this->ion_auth->logged_in()) {

            redirect('index.php/auth/login');

        }
        $this->load->database();
        $this->load->model('file_upload_mod');
        $this->load->model('payroll_process_mod', 'payroll');
        $this->load->model('salary_settings_mod');
        $this->load->helper('url');
        $this->load->library('grocery_CRUD');
        $this->load->library('system_log');

    }

    public function _salary_settings_output($output = null)
    {
        $this->load->view('pay/salary_setting', (array)$output);
    }

    public function index()
    {
        $this->load->view('common/header');
        $this->load->view('pay/salary_setting');
        $this->load->view('common/footer');
        $this->_master_output((object)array('output' => '', 'js_files' => array(), 'css_files' => array()));
    }

    //Salry Adv
    public function salary_advances()
    {
        $data['employees'] = $this->salary_settings_mod->getAllEmployees();
        $data['AdvanceTypes'] = $this->salary_settings_mod->getAdvanceTypes();
        $data['emp_type'] = $this->salary_settings_mod->getemploye_type();
        $this->load->view('common/header');
        $this->load->view('pay/salary_advance', $data);
        $this->load->view('common/footer');
    }
    //Salry Adv types
    public function salary_advances_type()
    {
        $data['employees'] = $this->salary_settings_mod->getAllEmployees();
        $data['AdvanceTypes'] = $this->salary_settings_mod->getAdvanceTypes();
        $data['emp_type'] = $this->salary_settings_mod->getemploye_type();
        $this->load->view('common/header');
        $this->load->view('pay/salary_advance_type', $data);
        $this->load->view('common/footer');
    }

    public function get_salary_advance_data()
    {
        $this->load->library('datatables');
        $this->datatables->select("hr_pay_payroll_monthly_advances.id,
        hr_pay_employees.employee_id,
        CONCAT(hr_pay_employees.initials,' ',hr_pay_employees.last_name) AS employee_name,
        hr_pay_m_employee_monthly_advance_types.name,
        hr_pay_payroll_monthly_advances.month,
        hr_pay_payroll_monthly_advances.amount", FALSE);
        $this->datatables->from('hr_pay_payroll_monthly_advances');
        $this->datatables->join('hr_pay_employees', 'hr_pay_payroll_monthly_advances.employee=hr_pay_employees.id', 'left');
        $this->datatables->join('hr_pay_m_employee_monthly_advance_types', 'hr_pay_payroll_monthly_advances.adv_type=hr_pay_m_employee_monthly_advance_types.id', 'left');
        $this->datatables->add_column("Actions", "
        <a class='btn btn-default tbl-action' href='javascript:void();' title='Edit' onclick='edit_advance(" . '$1' . ")'>
                <i class='fa fa-pencil'></i> Edit
            </a><a class='btn btn-default tbl-action' href='javascript:void();' title='Delete' onclick='delete_advance(" . '$1' . ")'>
                <i class='fa fa-pencil'></i> Remove
            </a>", "id");
        //$this->datatables->unset_column('id');
        echo $this->datatables->generate();
    }

    public function save_advance($method)
    {
        if ($method == "add") {
            $this->form_validation->set_rules('employee', 'Employee', 'trim|required');
            $this->form_validation->set_rules('month', 'Month', 'trim|required');

            if ($this->form_validation->run() === FALSE) {
                $data = array();
                $data['error_string'] = array();
                $data['inputerror'] = array();
                $data['status'] = FALSE;
                $data['error'] = "validation_error";
                if (form_error('employee')) {
                    $data['inputerror'][] = 'employee';
                    $data['error_string'][] = form_error('employee');
                }
                if (form_error('month')) {
                    $data['inputerror'][] = 'month';
                    $data['error_string'][] = form_error('month');
                }
                echo json_encode($data);
                exit;
            } else {
                $data['employee'] = $this->input->post('employee');
                $data['adv_type'] = $this->input->post('adv_type');
                $data['month'] = $this->input->post('month');
                $data['amount'] = $this->input->post('amount');

                if ($this->db->insert('hr_pay_payroll_monthly_advances', $data)){
                    $pid = $this->db->insert_id();
                    $this->system_log->create_system_log("Salary Advance Management", "Success", "New Advance Added ID #".$pid);
                    echo json_encode(array("status" => TRUE));
                } else {
                    echo json_encode(array("status" => FALSE));
                }
            }
        } else if ($method == "edit"){
            $this->form_validation->set_rules('employee', 'Employee', 'trim|required');
            $this->form_validation->set_rules('month', 'Month', 'trim|required');

            if ($this->form_validation->run() === FALSE) {
                $data = array();
                $data['error_string'] = array();
                $data['inputerror'] = array();
                $data['status'] = FALSE;
                $data['error'] = "validation_error";
                if (form_error('employee')) {
                    $data['inputerror'][] = 'employee';
                    $data['error_string'][] = form_error('employee');
                }
                if (form_error('month')) {
                    $data['inputerror'][] = 'month';
                    $data['error_string'][] = form_error('month');
                }
                echo json_encode($data);
                exit;
            } else {
                $advance_id = $this->input->post('advance_id');
                $data['employee'] = $this->input->post('employee');
                $data['adv_type'] = $this->input->post('adv_type');
                $data['month'] = $this->input->post('month');
                $data['amount'] = $this->input->post('amount');

                if ($this->salary_settings_mod->update_advance($data,$advance_id)) {
                    $this->system_log->create_system_log("Salary Advance Management", "Success", "Advance Updated ID #".$advance_id);
                    echo json_encode(array("status" => TRUE));
                } else {
                    echo json_encode(array("status" => FALSE));
                }
            }
        }
    }

    public function edit_get_advance_data($id)
    {
        $data = $this->salary_settings_mod->get_advance_data_by_id($id);
        echo json_encode($data);
    }

    public function delete_advance()
    {
        $advance_id = $this->input->post('advance_id');

        if($this->salary_settings_mod->delete_advance($advance_id)) {
            $this->system_log->create_system_log("Salary Advance Management", "Success", "Salary Advance Record Deleted #".$advance_id);
            echo json_encode(array(
                "status" => TRUE,
                "message" => 'Salary Advance Record Deleted '.$advance_id
            ));
        } else {
            $this->system_log->create_system_log("Salary Advance Management", "Failed", "Fail to Delete Salary Advance Record #".$advance_id);
            echo json_encode(array(
                "status" => FALSE,
                "message" => 'Failed to delete Salary Advance Record <br>'.$advance_id.'Try again!.'
            ));
        }

    }


    //Master Advance Types
    public function get_salary_advance_types_data()
    {
        $this->load->library('datatables');
        $this->datatables->select("hr_pay_m_employee_monthly_advance_types.id,hr_pay_m_employee_monthly_advance_types.code,hr_pay_m_employee_monthly_advance_types.name", FALSE);
        $this->datatables->from('hr_pay_m_employee_monthly_advance_types');
        $this->datatables->add_column("Actions", "<a class='btn btn-default tbl-action' href='javascript:;' title='Edit' onclick='edit_advance_type(" . '$1' . ")'>
                <i class='fa fa-pencil'></i> Edit
            </a>", "id");
        //$this->datatables->unset_column('id');
        echo $this->datatables->generate();
    }

    public function save_advance_type($method)
    {
        if ($method == "add_type") {
            $this->form_validation->set_rules('code', 'Advance Code','trim|required|is_unique[hr_pay_m_employee_monthly_advance_types.code]');
            $this->form_validation->set_rules('name', 'Advance Name','trim|required|is_unique[hr_pay_m_employee_monthly_advance_types.name]');
            if ($this->form_validation->run() === FALSE) {
                $data = array();
                $data['error_string'] = array();
                $data['inputerror'] = array();
                $data['status'] = FALSE;
                $data['error'] = "validation_error";
                if (form_error('code')) {
                    $data['inputerror'][] = 'code';
                    $data['error_string'][] = form_error('code');
                }
                if (form_error('name')) {
                    $data['inputerror'][] = 'name';
                    $data['error_string'][] = form_error('name');
                }
                echo json_encode($data);
                exit;
            } else {

                $data['code'] = $this->input->post('code');
                $data['name'] = $this->input->post('name');

                $str_code = 'k'.$string = str_replace(' ', '', $this->input->post('code'));
                $code = str_replace($str_code, '$' . $str_code, $str_code);
                $data_main['code'] = $code;
                $data_main['name'] = $data['name'];
                $data_main['group'] = 6;
                $data_main['formula'] = $code.' ';

                if($this->db->insert('hr_pay_formula_settings', $data_main)){
                    $data['f_id'] = $this->db->insert_id();
                    if ($this->db->insert('hr_pay_m_employee_monthly_advance_types', $data)){
                        $aid = $this->db->insert_id();
                        $this->system_log->create_system_log("Advance Types Management", "Success", "New Advance Type Added ID #".$aid);
                        echo json_encode(array("status" => TRUE));
                    } else {
                        echo json_encode(array("status" => FALSE));
                    }
                }
            }
        } else if ($method == "edit_type"){
            $this->form_validation->set_rules('code', 'Advance Code', 'trim|required');
            $this->form_validation->set_rules('name', 'Advance Name', 'trim|required');
            if ($this->form_validation->run() === FALSE) {
                $data = array();
                $data['error_string'] = array();
                $data['inputerror'] = array();
                $data['status'] = FALSE;
                $data['error'] = "validation_error";
                if (form_error('code')) {
                    $data['inputerror'][] = 'code';
                    $data['error_string'][] = form_error('code');
                }
                if (form_error('name')) {
                    $data['inputerror'][] = 'name';
                    $data['error_string'][] = form_error('name');
                }
                echo json_encode($data);
                exit;
            } else {
                $advance_type_id = $this->input->post('advance_type_id');

                $data['code'] = $this->input->post('code');
                $data['name'] = $this->input->post('name');
                $f_id = $this->input->post('f_id');

                $str_code = 'k'.$string = str_replace(' ', '', $this->input->post('code'));
                $code = str_replace($str_code, '$' . $str_code, $str_code);
                $data_main['code'] = $code;
                $data_main['name'] = $data['name'];
                $data_main['group'] = 6;
                $data_main['formula'] = $code.' ';

                $this->db->where('id', $f_id);
                $this->db->update('hr_pay_formula_settings', $data_main);
                $this->db->trans_complete();

                if ($this->salary_settings_mod->update_advance_type($data,$advance_type_id)) {
                    $this->system_log->create_system_log("Advance Types Management", "Success", "Advance Type Updated ID #".$advance_type_id);
                    echo json_encode(array("status" => TRUE));
                } else {
                    echo json_encode(array("status" => FALSE));
                }
            }
        }

    }

    public function get_advance_type_data($id)
    {
        $data = $this->salary_settings_mod->get_advance_type_data_by_id($id);
        echo json_encode($data);
    }

    //////////////
    ////////////////////////////////////////////////////
    ///
    ///
    //END Sal Adv.
    //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~**************************************************************************
    //Monthly Payments
    public function salary_monthly_payments()
    {
        $data['employees'] = $this->salary_settings_mod->getAllEmployees();
        $data['PaymentTypes'] = $this->salary_settings_mod->getPaymentTypes();
        $data['emp_type'] = $this->salary_settings_mod->getemploye_type();
        //get employees departments
        $data['emp_departments'] = $this->salary_settings_mod->get_emp_depts();

        $this->load->view('common/header');
        $this->load->view('pay/salary_payment', $data);
        $this->load->view('common/footer');
    }

    //Monthly Payments types
    public function salary_monthly_payments_type()
    {
        $data['employees'] = $this->salary_settings_mod->getAllEmployees();
        $data['PaymentTypes'] = $this->salary_settings_mod->getPaymentTypes();
        $data['emp_type'] = $this->salary_settings_mod->getemploye_type();
        $this->load->view('common/header');
        $this->load->view('pay/salary_payment_type', $data);
        $this->load->view('common/footer');
    }

    public function get_payment_data()
    {
        $this->load->library('datatables');
        $this->datatables->select("
        hr_pay_payroll_main_monthly_payments.id,
        hr_pay_payroll_main_monthly_payments.name,
        hr_pay_m_employee_monthly_payment_types.name as type_name,
        hr_pay_payroll_main_monthly_payments.month,
        hr_pay_payroll_main_monthly_payments.amount,
        hr_pay_payroll_main_monthly_payments.id as pay_id
        ", FALSE);

        $this->datatables->from('hr_pay_payroll_main_monthly_payments');
        $this->datatables->join('hr_pay_m_employee_monthly_payment_types', 'hr_pay_payroll_main_monthly_payments.pay_type=hr_pay_m_employee_monthly_payment_types.id', 'left');
        $this->datatables->add_column("Actions", "
        <a class='btn btn-default tbl-action' href='javascript:;' title='Edit' onclick='edit_payment(" . '$1' . ")'>
                <i class='fa fa-pencil'></i> Edit
            </a><a class='btn btn-default tbl-action' href='javascript:;' title='Delete' onclick='delete_payment(" . '$1' . ")'>
                <i class='fa fa-pencil'></i> Remove
            </a>", "pay_id");
        $this->datatables->unset_column('pay_id');
        echo $this->datatables->generate();

    }

    public function save_payment($method)
    {
        if ($method == "add") {
            $this->form_validation->set_rules('name', 'Name', 'trim|required');
            $this->form_validation->set_rules('month', 'Month', 'trim|required');

            if ($this->form_validation->run() === FALSE) {
                $data = array();
                $data['error_string'] = array();
                $data['inputerror'] = array();
                $data['status'] = FALSE;
                $data['error'] = "validation_error";
                if (form_error('month')){
                    $data['inputerror'][] = 'month';
                    $data['error_string'][] = form_error('month');
                }
                if (form_error('name')){
                    $data['inputerror'][] = 'name';
                    $data['error_string'][] = form_error('name');
                }
                echo json_encode($data);
                exit;

            }
            else{

                $details = $this->input->post();

                //check assign employees or department
                if(isset($details['employee'])){

                    $data1=array(

                        'emp_department'=>1,
                        'name'=>$details['name'],
                        'pay_type'=> $details['pay_type'],
                        'month'=> $details['month'],
                        'amount'=> $details['amount']
                    );

                    if($this->db->insert('hr_pay_payroll_main_monthly_payments', $data1)){

                        $qid = $this->db->insert_id();

                        foreach ($this->input->post('employee') as $emp1){

                            if($emp_info=$this->salary_settings_mod->get_emp_department(array('id'=>$emp1))){
                                $department=$emp_info->department;
                            }
                            else{
                                $department=0;
                            }

                            $data2=array(

                                'employee'=>$emp1,
                                'department'=>$department,
                                'ref_id'=>$qid,
                                'pay_type'=>$details['pay_type'],
                                'month'=>$details['month'],
                                'amount'=>$details['amount'],
                                'user'=>USER_ID,
                            );

                            $this->salary_settings_mod->save('hr_pay_payroll_monthly_payments',$data2);

                        }
                        $this->system_log->create_system_log("Salary Monthly Payment Management", "Success", "New Payment Added ID #".$qid);
                        echo json_encode(array("status" => TRUE));
                    }
                    else {
                        echo json_encode(array('status'=>FALSE));
                    }
                }
                //check assign department
                else if(isset($details['department'])){

                    $data1=array(

                        'emp_department'=>2,
                        'pay_type'=> $details['pay_type'],
                        'month'=> $details['month'],
                        'amount'=> $details['amount']
                    );

                    if($this->db->insert('hr_pay_payroll_main_monthly_payments', $data1)){

                        $qid = $this->db->insert_id();

                        foreach ($this->input->post('department') as $dep1){

                            if($this->salary_settings_mod->get_department_emp(array('department'=>$dep1))) {

                                foreach ($this->salary_settings_mod->get_department_emp(array('department'=>$dep1)) as $dep2){

                                    $data2=array(

                                        'employee'=>$dep2->id,
                                        'department'=>$dep1,
                                        'ref_id'=>$qid,
                                        'pay_type'=>$details['pay_type'],
                                        'month'=>$details['month'],
                                        'amount'=>$details['amount'],
                                        'user'=>USER_ID,
                                    );

                                    $this->db->insert('hr_pay_payroll_monthly_payments', $data2);
                                }
                            }

                        }

                        $this->system_log->create_system_log("Salary Monthly Payment Management", "Success", "New Payment Added ID #".$qid);
                        echo json_encode(array("status" => TRUE));

                    }
                    else {

                        echo json_encode(array('status'=>FALSE));

                    }
                }
            }
        }
        else if ($method == "edit"){

            $this->form_validation->set_rules('name', 'Name', 'trim|required');
            $this->form_validation->set_rules('month', 'Month', 'trim|required');

            if ($this->form_validation->run() === FALSE) {

                $data = array();
                $data['error_string'] = array();
                $data['inputerror'] = array();
                $data['status'] = FALSE;
                $data['error'] = "validation_error";
                if (form_error('month')){
                    $data['inputerror'][] = 'month';
                    $data['error_string'][] = form_error('month');
                }
                if (form_error('name')){
                    $data['inputerror'][] = 'name';
                    $data['error_string'][] = form_error('name');
                }
                echo json_encode($data);
                exit;

            }
            else{

                $details=$this->input->post();

                //check assign employees or department
                if(isset($details['employee'])){

                    $data1=array(

                        'emp_department'=>1,
                        'name'=>$details['name'],
                        'pay_type'=> $details['pay_type'],
                        'month'=> $details['month'],
                        'amount'=> $details['amount']
                    );

                    if($this->db->update('hr_pay_payroll_main_monthly_payments', $data1,array('id'=>$details['payment_id']))){

                        if($this->db->delete('hr_pay_payroll_monthly_payments',array('ref_id'=>$details['payment_id']))){

                            foreach ($this->input->post('employee') as $emp1){

                                if($emp_info=$this->salary_settings_mod->get_emp_department(array('id'=>$emp1))){
                                    $department=$emp_info->department;
                                }
                                else{
                                    $department=0;
                                }

                                $data2=array(

                                    'employee'=>$emp1,
                                    'department'=>$department,
                                    'ref_id'=>$details['payment_id'],
                                    'pay_type'=>$details['pay_type'],
                                    'month'=>$details['month'],
                                    'amount'=>$details['amount'],
                                    'user'=>USER_ID,
                                );

                                $this->salary_settings_mod->save('hr_pay_payroll_monthly_payments',$data2);

                            }

                            $this->system_log->create_system_log("Monthly Payment Management", "Success", "Payment Updated ID #".$details['payment_id']);
                            echo json_encode(array("status" => TRUE));
                        }

                    }
                    else {
                        echo json_encode(array('status'=>FALSE));
                    }

                }
                //check assign department
                else if(isset($details['department'])){

                    $data1=array(

                        'emp_department'=>2,
                        'name'=>$details['name'],
                        'pay_type'=> $details['pay_type'],
                        'month'=> $details['month'],
                        'amount'=> $details['amount']
                    );

                    if($this->db->update('hr_pay_payroll_main_monthly_payments', $data1,array('id'=>$details['payment_id']))){

                        if($this->db->delete('hr_pay_payroll_monthly_payments',array('ref_id'=>$details['payment_id']))){

                            foreach ($this->input->post('department') as $dep1) {

                                if ($this->events_mod->get_department_emp(array('department' => $dep1))) {

                                    foreach ($this->events_mod->get_department_emp(array('department' => $dep1)) as $dep2) {

                                        $data2 = array(

                                            'employee' => $dep2->id,
                                            'department' => $dep1,
                                            'pay_type'=> $details['pay_type'],
                                            'month'=> $details['month'],
                                            'amount'=> $details['amount'],
                                            'ref_id'=>$details['payment_id'],
                                            'user'=>USER_ID,
                                        );

                                        $this->salary_settings_mod->save('hr_pay_payroll_monthly_payments',$data2);

                                    }
                                }
                            }

                            $this->system_log->create_system_log("Monthly Payment Management", "Success", "Payment Updated ID #".$details['payment_id']);
                            echo json_encode(array("status" => TRUE));
                        }
                    }
                    else {

                        echo json_encode(array('status'=>FALSE));

                    }
                }
            }
        }
    }

    public function edit_get_payment_data($id)
    {
        $data['payments'] = $this->salary_settings_mod->get_payments(array('id'=>$id));
        $data['employees'] = $this->salary_settings_mod->get_payments_emp(array('ref_id'=>$id));
        $data['departments'] = $this->salary_settings_mod->get_payments_department(array('ref_id'=>$id));
        echo json_encode($data);
    }

    public function delete_payment()
    {
        $payment_id = $this->input->post('payment_id');

        if($this->salary_settings_mod->delete_monthly_payment($payment_id)) {
            $this->system_log->create_system_log("Monthly Payment Management", "Success", "Payment Record Deleted #".$payment_id);
            echo json_encode(array(
                "status" => TRUE,
                "message" => 'Salary Payment Record Deleted '.$payment_id
            ));
        } else {
            $this->system_log->create_system_log("Monthly Payment Management", "Failed", "Fail to Delete Payment Record #".$payment_id);
            echo json_encode(array(
                "status" => FALSE,
                "message" => 'Failed to delete Salary Payment Record <br>'.$payment_id.'Try again!.'
            ));
        }

    }

    //Master Monthly payments
    public function get_salary_payment_types_data()
    {
        $this->load->library('datatables');
        $this->datatables->select("hr_pay_m_employee_monthly_payment_types.id,hr_pay_m_employee_monthly_payment_types.code,hr_pay_m_employee_monthly_payment_types.name", FALSE);
        $this->datatables->from('hr_pay_m_employee_monthly_payment_types');
        $this->datatables->add_column("Actions", "<a class='btn btn-default tbl-action' href='javascript:;' title='Edit' onclick='edit_payment_type(" . '$1' . ")'>
                <i class='fa fa-pencil'></i> Edit
            </a>", "id");
        //$this->datatables->unset_column('id');
        echo $this->datatables->generate();
    }

    public function save_payment_type($method)
    {
        if ($method == "add_type") {
            $this->form_validation->set_rules('code', 'Payment Code','trim|required|is_unique[hr_pay_m_employee_monthly_payment_types.code]');
            $this->form_validation->set_rules('name', 'Payment Name','trim|required|is_unique[hr_pay_m_employee_monthly_payment_types.name]');
            if ($this->form_validation->run() === FALSE) {
                $data = array();
                $data['error_string'] = array();
                $data['inputerror'] = array();
                $data['status'] = FALSE;
                $data['error'] = "validation_error";
                if (form_error('code')) {
                    $data['inputerror'][] = 'code';
                    $data['error_string'][] = form_error('code');
                }
                if (form_error('name')) {
                    $data['inputerror'][] = 'name';
                    $data['error_string'][] = form_error('name');
                }
                echo json_encode($data);
                exit;
            } else {

                $data['code'] = $this->input->post('code');
                $data['name'] = $this->input->post('name');

                $str_code = 'y'.$string = str_replace(' ', '', $this->input->post('code'));
                $code = str_replace($str_code, '$' . $str_code, $str_code);
                $data_main['code'] = $code;
                $data_main['name'] = $data['name'];
                $data_main['group'] = 6;
                $data_main['formula'] = $code.' ';

                if($this->db->insert('hr_pay_formula_settings', $data_main)){
                    $data['f_id'] = $this->db->insert_id();
                    if ($this->db->insert('hr_pay_m_employee_monthly_payment_types', $data)){
                        $aid = $this->db->insert_id();
                        $this->system_log->create_system_log("Payment Types Management", "Success", "New Payment Type Added ID #".$aid);
                        echo json_encode(array("status" => TRUE));
                    } else {
                        echo json_encode(array("status" => FALSE));
                    }
                }
            }
        } else if ($method == "edit_type"){
            $this->form_validation->set_rules('code', 'Payment Code', 'trim|required');
            $this->form_validation->set_rules('name', 'Payment Name', 'trim|required');
            if ($this->form_validation->run() === FALSE) {
                $data = array();
                $data['error_string'] = array();
                $data['inputerror'] = array();
                $data['status'] = FALSE;
                $data['error'] = "validation_error";
                if (form_error('code')) {
                    $data['inputerror'][] = 'code';
                    $data['error_string'][] = form_error('code');
                }
                if (form_error('name')) {
                    $data['inputerror'][] = 'name';
                    $data['error_string'][] = form_error('name');
                }
                echo json_encode($data);
                exit;
            } else {
                $payment_type_id = $this->input->post('payment_type_id');

                $data['code'] = $this->input->post('code');
                $data['name'] = $this->input->post('name');
                $f_id = $this->input->post('f_id');

                $str_code = 'y'.$string = str_replace(' ', '', $this->input->post('code'));
                $code = str_replace($str_code, '$' . $str_code, $str_code);
                $data_main['code'] = $code;
                $data_main['name'] = $data['name'];
                $data_main['group'] = 6;
                $data_main['formula'] = $code.' ';

                $this->db->where('id', $f_id);
                $this->db->update('hr_pay_formula_settings', $data_main);
                $this->db->trans_complete();

                if ($this->salary_settings_mod->update_payment_type($data,$payment_type_id)) {
                    $this->system_log->create_system_log("Payment Types Management", "Success", "Payment Type Updated ID #".$payment_type_id);
                    echo json_encode(array("status" => TRUE));
                } else {
                    echo json_encode(array("status" => FALSE));
                }
            }
        }

    }

    public function get_payment_type_data($id)
    {
        $data = $this->salary_settings_mod->get_payment_type_data_by_id($id);
        echo json_encode($data);
    }

    //////////////
    ////////////////////////////////////////////////////
    ///

    //END monthly payments
    //
    ///
    ///  //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~**************************************************************************
    //Monthly Deductions
    public function salary_monthly_deductions()
    {
        $data['employees'] = $this->salary_settings_mod->getAllEmployees();
        $data['emp_departments'] = $this->salary_settings_mod->getAllDepartments();
        $data['DeductionTypes'] = $this->salary_settings_mod->getDeductionTypes();
        $data['emp_type'] = $this->salary_settings_mod->getemploye_type();
        $this->load->view('common/header');
        $this->load->view('pay/salary_deduction', $data);
        $this->load->view('common/footer');
    }


    //Monthly mobile bill
    public function add_mobile_bill()
    {
//        $data['employees'] = $this->salary_settings_mod->getAllEmployees();
//        $data['emp_departments'] = $this->salary_settings_mod->getAllDepartments();
//        $data['DeductionTypes'] = $this->salary_settings_mod->getDeductionTypes();
//        $data['emp_type'] = $this->salary_settings_mod->getemploye_type();
        $this->load->view('common/header');
        $this->load->view('pay/mobile_bill_data');
        $this->load->view('common/footer');
    }

    //insert Monthly mobile bill
    public function insert_mobile_bulk()
    {
        $data = $this->input->post();

        if (isset($data['field1']) && is_array($data['field1'])) {

//            $this->db->trans_start();
            foreach ($data['field1'] as $key => $value) {
                if (!empty($data['field1'][$key])) {
                   $mobile_data =  $this->salary_settings_mod->get_employee_id($data['field1'][$key]);
                    if($mobile_data) {
                        $insert_data = array(
                            'emp_id'=>$mobile_data->id,
                            'tel' => $data['field1'][$key],
                            'month' => $data['date_select'],
                            'amount' => $data['field47'][$key],
                            'user'=>USER_ID,
                        );
                        $this->db->insert('hr_pay_mobile_bill', $insert_data);
                    }

                }
                unset($insert_data);
            }
            echo json_encode(array('status'=>TRUE));
        }

    }

    function upload_file()
    {
        $ab_path = $this->config->item('ab_path');
        $month = $this->input->post('raw_upload_month');
        $org_name = explode('.',$_FILES["file_upload"]['name']);
        $org_name = $org_name[0];
        $file_name = str_replace(' ', '',$org_name).date('_Y-m-d_h-i-s');
        $config['upload_path'] = $ab_path."/uploads/mobile_bill/";
        $config['allowed_types'] = '*';
        $config['file_name'] = $file_name;
        $this->load->library('upload');
        $this->upload->initialize($config);
        if ($this->upload->do_upload("file_upload")) {
            $ext = explode(".", $_FILES["file_upload"]['name']);
            $data_rr = array(
                "name" => $file_name . ".txt",
                "date" => date('Y-m-d h:i:s')
            );
            $this->file_upload_mod->saveUploadFile($data_rr);
            $file = fopen("./uploads/mobile_bill/$file_name." . $ext[1], "r+") or exit("Unable to open file!");
            file($file, FILE_SKIP_EMPTY_LINES);
            $contents = file_get_contents($_FILES["file_upload"]['name']);
            $contents = str_replace(fgets($file), '', $contents);
            $contents = str_replace(fgets($file), '', $contents);
            file_put_contents($_FILES["file_upload"]['name'], $contents);
            while (!feof($file)) {
                $buffer = trim(fgets($file)); // Read a line.
                $buffer = preg_replace('/\s+/', ' ', trim($buffer));
                $data_tt = explode(",", trim($buffer));
                $data_tel_no = str_replace('"', '', $data_tt[0]);
                $data_amount = str_replace('"', '', $data_tt[46]);

                $mobile_data = $this->salary_settings_mod->get_employee_id(trim($data_tel_no));
                if($mobile_data){
                    $data_fp_temp = array(
                        'emp_id'=>$mobile_data->id,
                        'tel' => $data_tel_no,
                        'month' => $month,
                        'amount' => $data_amount,
                        'user'=>USER_ID,
                    );
                    $this->db->insert('hr_pay_mobile_bill', $data_fp_temp);
                 }
            }
            fclose($file);
            $this->system_log->create_system_log("FP File Management", "Success", "FP File Upload successfully File ".$file_name . ".txt");
            echo json_encode(array(
                'status' => true,
                'message' => 'File upload successfully.'
            ));
            exit;
        } else {
            $this->system_log->create_system_log("FP File Management", "Failed", "FP File Upload Failed File ".$file_name . ".txt");
            echo json_encode(array(
                'status' => false,
                'message' => $this->upload->display_errors()
            ));
            exit;
        }
    }

    //get Monthly mobile bill
    public function get_mobile_data()
    {
        $this->load->library('datatables');
        $this->datatables->select("
        hr_pay_mobile_bill.id,
        hr_pay_employees.first_name,
        hr_pay_mobile_bill.tel,
        hr_pay_mobile_bill.month,
        hr_pay_mobile_bill.amount,
         hr_pay_mobile_bill.id as ded_id,
        ", FALSE);

        $this->datatables->from('hr_pay_mobile_bill');
        $this->datatables->join('hr_pay_employees', 'hr_pay_mobile_bill.tel=hr_pay_employees.office_phone', 'left');
        $this->datatables->add_column("Actions", "
        <a class='btn btn-default tbl-action' href='javascript:;' title='Edit' onclick='edit_deduction(" . '$1' . ")'>
                <i class='fa fa-pencil'></i> Edit
            </a><a class='btn btn-default tbl-action' href='javascript:;' title='Delete' onclick='delete_deduction(" . '$1' . ")'>
                <i class='fa fa-trash'></i> Remove
            </a>", "ded_id");

        $this->datatables->unset_column('ded_id');
        echo $this->datatables->generate();

    }


//    public function get_mobile_data_edit($id)
//    {
//        $mo_data = $this->salary_settings_mod->get_mobile_data($id);
//        echo json_encode($mo_data);
//    }

    //Monthly Deductions type
    public function salary_monthly_deductions_type()
    {
        $data['employees'] = $this->salary_settings_mod->getAllEmployees();
        $data['emp_departments'] = $this->salary_settings_mod->getAllDepartments();
        $data['DeductionTypes'] = $this->salary_settings_mod->getDeductionTypes();
        $data['emp_type'] = $this->salary_settings_mod->getemploye_type();
        $this->load->view('common/header');
        $this->load->view('pay/salary_deduction_type', $data);
        $this->load->view('common/footer');
    }

    public function get_deduction_data()
    {
        $this->load->library('datatables');
        $this->datatables->select("
        hr_pay_payroll_main_monthly_deductions.id,
        hr_pay_payroll_main_monthly_deductions.name,
        hr_pay_m_employee_monthly_deduction_types.name as type_name,
        hr_pay_payroll_main_monthly_deductions.month,
        hr_pay_payroll_main_monthly_deductions.amount,
        hr_pay_payroll_main_monthly_deductions.id as ded_id
        ", FALSE);

        $this->datatables->from('hr_pay_payroll_main_monthly_deductions');
        $this->datatables->join('hr_pay_m_employee_monthly_deduction_types', 'hr_pay_payroll_main_monthly_deductions.deduction_type=hr_pay_m_employee_monthly_deduction_types.id', 'left');
        $this->datatables->add_column("Actions", "
        <a class='btn btn-default tbl-action' href='javascript:;' title='Edit' onclick='edit_deduction(" . '$1' . ")'>
                <i class='fa fa-pencil'></i> Edit
            </a><a class='btn btn-default tbl-action' href='javascript:;' title='Delete' onclick='delete_deduction(" . '$1' . ")'>
                <i class='fa fa-pencil'></i> Remove
            </a>", "ded_id");
        $this->datatables->unset_column('ded_id');
        echo $this->datatables->generate();
    }

    public function get_deduction_data_detail()
    {
        $this->load->library('datatables');
        $this->datatables->select("
        hr_pay_payroll_monthly_deductions.id,
        hr_pay_payroll_main_monthly_deductions.name,
        hr_pay_m_employee_monthly_deduction_types.name as type_name,
        hr_pay_employees.employee_id as employee_id,   
        CONCAT(hr_pay_employees.first_name,' ',hr_pay_employees.last_name) AS emp_name,
        hr_pay_payroll_monthly_deductions.month,
        hr_pay_payroll_monthly_deductions.amount,
        hr_pay_payroll_monthly_deductions.id as ded_id
        ", FALSE);
        $this->datatables->from('hr_pay_payroll_main_monthly_deductions');
        $this->datatables->join('hr_pay_payroll_monthly_deductions', 'hr_pay_payroll_main_monthly_deductions.id=hr_pay_payroll_monthly_deductions.deduction_type');
        $this->datatables->join('hr_pay_employees', 'hr_pay_employees.id=hr_pay_payroll_monthly_deductions.employee');
        $this->datatables->join('hr_pay_m_employee_monthly_deduction_types', 'hr_pay_m_employee_monthly_deduction_types.id=hr_pay_payroll_main_monthly_deductions.deduction_type');
//        $this->datatables->group_by('hr_pay_payroll_monthly_deductions.employee');
        $this->datatables->add_column("Actions","
        <a class='btn btn-default tbl-action' href='javascript:;' title='Delete' onclick='delete_deduction_detail(" . '$1' . ")'>
                <i class='fa fa-pencil'></i> Remove
            </a>", "id");
        $this->datatables->unset_column('ded_id');
        echo $this->datatables->generate();
    }

    public function save_deduction($method)
    {
        if ($method == "add") {
            $this->form_validation->set_rules('name', 'Name', 'trim|required');
            $this->form_validation->set_rules('month', 'Month', 'trim|required');

            if ($this->form_validation->run() === FALSE){
                $data = array();
                $data['error_string'] = array();
                $data['inputerror'] = array();
                $data['status'] = FALSE;
                $data['error'] = "validation_error";
                if (form_error('month')){
                    $data['inputerror'][] = 'month';
                    $data['error_string'][] = form_error('month');
                }
                if (form_error('name')){
                    $data['inputerror'][] = 'name';
                    $data['error_string'][] = form_error('name');
                }
                echo json_encode($data);
                exit;

            }
            else{

                $details = $this->input->post();

                //check assign employees or department
                if(isset($details['employee'])){

                    $data1=array(

                        'emp_department'=>1,
                        'name'=>$details['name'],
                        'deduction_type'=> $details['deduction_type'],
                        'month'=> $details['month'],
                        'amount'=> $details['amount']
                    );

                    if($this->db->insert('hr_pay_payroll_main_monthly_deductions', $data1)){

                        $qid = $this->db->insert_id();

                        foreach ($this->input->post('employee') as $emp1){

                            if($emp_info=$this->salary_settings_mod->get_emp_department(array('id'=>$emp1))){
                                $department=$emp_info->department;
                            }
                            else{
                                $department=0;
                            }

                            $data2=array(

                                'employee'=>$emp1,
                                'department'=>$department,
                                'ref_id'=>$qid,
                                'deduction_type'=>$details['deduction_type'],
                                'month'=>$details['month'],
                                'amount'=>$details['amount'],
                                'user'=>USER_ID,
                            );

                            $this->salary_settings_mod->save('hr_pay_payroll_monthly_deductions',$data2);

                        }
                        $this->system_log->create_system_log("Salary Monthly Deduction Management", "Success", "New Deduction Added ID #".$qid);
                        echo json_encode(array("status" => TRUE));
                    }
                    else {
                        echo json_encode(array('status'=>FALSE));
                    }
                }
                //check assign department
                else if(isset($details['department'])){

                    $data1=array(

                        'emp_department'=>2,
                        'name'=>$details['name'],
                        'deduction_type'=> $details['deduction_type'],
                        'month'=> $details['month'],
                        'amount'=> $details['amount']
                    );

                    if($this->db->insert('hr_pay_payroll_main_monthly_deductions', $data1)){

                        $qid = $this->db->insert_id();

                        foreach ($this->input->post('department') as $dep1){

                            if($this->salary_settings_mod->get_department_emp(array('department'=>$dep1))) {

                                foreach ($this->salary_settings_mod->get_department_emp(array('department'=>$dep1)) as $dep2){

                                    $data2=array(

                                        'employee'=>$dep2->id,
                                        'department'=>$dep1,
                                        'ref_id'=>$qid,
                                        'deduction_type'=>$details['deduction_type'],
                                        'month'=>$details['month'],
                                        'amount'=>$details['amount'],
                                        'user'=>USER_ID,
                                    );

                                    $this->db->insert('hr_pay_payroll_monthly_deductions', $data2);
                                }
                            }

                        }

                        $this->system_log->create_system_log("Salary Monthly Deduction Management", "Success", "New Deduction Added ID #".$qid);
                        echo json_encode(array("status" => TRUE));

                    }
                    else {

                        echo json_encode(array('status'=>FALSE));

                    }
                }
            }
        }
        else if ($method == "edit"){

            $this->form_validation->set_rules('name', 'Name', 'trim|required');
            $this->form_validation->set_rules('month', 'Month', 'trim|required');

            if ($this->form_validation->run() === FALSE) {

                $data = array();
                $data['error_string'] = array();
                $data['inputerror'] = array();
                $data['status'] = FALSE;
                $data['error'] = "validation_error";
                if (form_error('month')){
                    $data['inputerror'][] = 'month';
                    $data['error_string'][] = form_error('month');
                }
                if (form_error('name')){
                    $data['inputerror'][] = 'name';
                    $data['error_string'][] = form_error('name');
                }
                echo json_encode($data);
                exit;

            }
            else{

                $details=$this->input->post();

                //check assign employees or department
                if(isset($details['employee'])){

                    $data1=array(

                        'emp_department'=>1,
                        'name'=>$details['name'],
                        'deduction_type'=> $details['deduction_type'],
                        'month'=> $details['month'],
                        'amount'=> $details['amount']
                    );

                    if($this->db->update('hr_pay_payroll_main_monthly_deductions', $data1,array('id'=>$details['deduction_id']))){

                        if($this->db->delete('hr_pay_payroll_monthly_deductions',array('ref_id'=>$details['deduction_id']))){

                            foreach ($this->input->post('employee') as $emp1){

                                if($emp_info=$this->salary_settings_mod->get_emp_department(array('id'=>$emp1))){
                                    $department=$emp_info->department;
                                }
                                else{
                                    $department=0;
                                }

                                $data2=array(

                                    'employee'=>$emp1,
                                    'department'=>$department,
                                    'ref_id'=>$details['deduction_id'],
                                    'deduction_type'=>$details['deduction_type'],
                                    'month'=>$details['month'],
                                    'amount'=>$details['amount'],
                                    'user'=>USER_ID,
                                );

                                $this->salary_settings_mod->save('hr_pay_payroll_monthly_deductions',$data2);

                            }

                            $this->system_log->create_system_log("Monthly Deduction Management", "Success", "Deduction Updated ID #".$details['payment_id']);
                            echo json_encode(array("status" => TRUE));
                        }

                    }
                    else {
                        echo json_encode(array('status'=>FALSE));
                    }

                }
                //check assign department
                else if(isset($details['department'])){

                    $data1=array(

                        'emp_department'=>2,
                        'name'=>$details['name'],
                        'deduction_type'=> $details['deduction_type'],
                        'month'=> $details['month'],
                        'amount'=> $details['amount']
                    );

                    if($this->db->update('hr_pay_payroll_main_monthly_deductions', $data1,array('id'=>$details['deduction_id']))){

                        if($this->db->delete('hr_pay_payroll_monthly_deductions',array('ref_id'=>$details['deduction_id']))){

                            foreach ($this->input->post('department') as $dep1) {

                                if ($this->events_mod->get_department_emp(array('department' => $dep1))) {

                                    foreach ($this->events_mod->get_department_emp(array('department' => $dep1)) as $dep2) {

                                        $data2 = array(

                                            'employee' => $dep2->id,
                                            'department' => $dep1,
                                            'deduction_type'=> $details['deduction_type'],
                                            'month'=> $details['month'],
                                            'amount'=> $details['amount'],
                                            'ref_id'=>$details['deduction_id'],
                                            'user'=>USER_ID,
                                        );

                                        $this->salary_settings_mod->save('hr_pay_payroll_monthly_deductions',$data2);

                                    }
                                }
                            }

                            $this->system_log->create_system_log("Monthly Deduction Management", "Success", "Deduction Updated ID #".$details['payment_id']);
                            echo json_encode(array("status" => TRUE));
                        }
                    }
                    else {

                        echo json_encode(array('status'=>FALSE));

                    }
                }
            }
        }
    }

    public function edit_get_deduction_data($id)
    {
        $data['deductions'] = $this->salary_settings_mod->get_deductions(array('id'=>$id));
        $data['employees'] = $this->salary_settings_mod->get_deductions_emp(array('ref_id'=>$id));
        $data['departments'] = $this->salary_settings_mod->get_deductions_department(array('ref_id'=>$id));
        echo json_encode($data);
    }

    public function delete_deduction()
    {
        $deduction_id = $this->input->post('deduction_id');

        if($this->salary_settings_mod->delete_monthly_deduction($deduction_id)) {
            $this->system_log->create_system_log("Monthly Deduction Management", "Success", "Deduction Record Deleted #".$deduction_id);
            echo json_encode(array(
                "status" => TRUE,
                "message" => 'Salary Deduction Record Deleted '.$deduction_id
            ));
        } else {
            $this->system_log->create_system_log("Monthly Deduction Management", "Failed", "Fail to Delete Deduction Record #".$deduction_id);
            echo json_encode(array(
                "status" => FALSE,
                "message" => 'Failed to delete Salary Deduction Record <br>'.$deduction_id.'Try again!.'
            ));
        }

    }

    public function delete_deduction_detail()
    {
        $deduction_id = $this->input->post('deduction_id');

        if($this->salary_settings_mod->delete_monthly_deduction_detail($deduction_id)) {
            $this->system_log->create_system_log("Monthly Deduction Management Delete-Employee vise", "Success", "Deduction Record Deleted #".$deduction_id);
            echo json_encode(array(
                "status" => TRUE,
                "message" => 'Salary Deduction Employee Record Deleted '.$deduction_id
            ));
        } else {
            $this->system_log->create_system_log("Monthly Deduction Management", "Failed", "Fail to Delete Deduction Record #".$deduction_id);
            echo json_encode(array(
                "status" => FALSE,
                "message" => 'Failed to delete Salary Deduction Record <br>'.$deduction_id.'Try again!.'
            ));
        }

    }


    //Master Monthly Deductions
    public function get_salary_deduction_types_data()
    {
        $this->load->library('datatables');
        $this->datatables->select("hr_pay_m_employee_monthly_deduction_types.id,hr_pay_m_employee_monthly_deduction_types.code,hr_pay_m_employee_monthly_deduction_types.name", FALSE);
        $this->datatables->from('hr_pay_m_employee_monthly_deduction_types');
        $this->datatables->add_column("Actions", "<a class='btn btn-default tbl-action' href='javascript:void();' title='Edit' onclick='edit_deduction_type(" . '$1' . ")'>
                <i class='fa fa-pencil'></i> Edit
            </a>", "id");
        //$this->datatables->unset_column('id');
        echo $this->datatables->generate();
    }

    public function save_deduction_type($method)
    {
        if ($method == "add_type") {
            $this->form_validation->set_rules('code', 'Deduction Code','trim|required|is_unique[hr_pay_m_employee_monthly_deduction_types.code]');
            $this->form_validation->set_rules('name', 'Deduction Name','trim|required|is_unique[hr_pay_m_employee_monthly_deduction_types.name]');
            if ($this->form_validation->run() === FALSE) {
                $data = array();
                $data['error_string'] = array();
                $data['inputerror'] = array();
                $data['status'] = FALSE;
                $data['error'] = "validation_error";
                if (form_error('code')) {
                    $data['inputerror'][] = 'code';
                    $data['error_string'][] = form_error('code');
                }
                if (form_error('name')) {
                    $data['inputerror'][] = 'name';
                    $data['error_string'][] = form_error('name');
                }
                echo json_encode($data);
                exit;
            } else {

                $data['code'] = $this->input->post('code');
                $data['name'] = $this->input->post('name');

                $str_code = 'z'.$string = str_replace(' ', '', $this->input->post('code'));
                $code = str_replace($str_code, '$' . $str_code, $str_code);
                $data_main['code'] = $code;
                $data_main['name'] = $data['name'];
                $data_main['group'] = 5;
                $data_main['formula'] = $code.' ';

                if($this->db->insert('hr_pay_formula_settings', $data_main)){
                    $data['f_id'] = $this->db->insert_id();
                    if ($this->db->insert('hr_pay_m_employee_monthly_deduction_types', $data)){
                        $aid = $this->db->insert_id();
                        $this->system_log->create_system_log("Deduction Types Management", "Success", "New Deduction Type Added ID #".$aid);
                        echo json_encode(array("status" => TRUE));
                    } else {
                        echo json_encode(array("status" => FALSE));
                    }
                }
            }
        } else if ($method == "edit_type"){
            $this->form_validation->set_rules('code', 'Deduction Code', 'trim|required');
            $this->form_validation->set_rules('name', 'Deduction Name', 'trim|required');
            if ($this->form_validation->run() === FALSE) {
                $data = array();
                $data['error_string'] = array();
                $data['inputerror'] = array();
                $data['status'] = FALSE;
                $data['error'] = "validation_error";
                if (form_error('code')) {
                    $data['inputerror'][] = 'code';
                    $data['error_string'][] = form_error('code');
                }
                if (form_error('name')) {
                    $data['inputerror'][] = 'name';
                    $data['error_string'][] = form_error('name');
                }
                echo json_encode($data);
                exit;
            } else {
                $deduction_type_id = $this->input->post('deduction_type_id');

                $data['code'] = $this->input->post('code');
                $data['name'] = $this->input->post('name');
                $f_id = $this->input->post('f_id');

                $str_code = 'z'.$string = str_replace(' ', '', $this->input->post('code'));
                $code = str_replace($str_code, '$' . $str_code, $str_code);
                $data_main['code'] = $code;
                $data_main['name'] = $data['name'];
                $data_main['group'] = 5;
                $data_main['formula'] = $code.' ';

                $this->db->where('id', $f_id);
                $this->db->update('hr_pay_formula_settings', $data_main);
                $this->db->trans_complete();

                if ($this->salary_settings_mod->update_deduction_type($data,$deduction_type_id)) {
                    $this->system_log->create_system_log("Deduction Types Management", "Success", "Deduction Type Updated ID #".$deduction_type_id);
                    echo json_encode(array("status" => TRUE));
                } else {
                    echo json_encode(array("status" => FALSE));
                }
            }
        }

    }

    public function get_deduction_type_data($id)
    {
        $data = $this->salary_settings_mod->get_deduction_type_data_by_id($id);
        echo json_encode($data);
    }

    //////////////
    ////////////////////////////////////////////////////
    ///

    //END monthly payments

    public function dashboard()
    {
        $data['branch_task'] = $this->payroll->task();
        $data['lock_type'] = $this->payroll->lock_type();

        if($this->session->userdata('payroll_id')!=5) {
            $this->load->view('common/header');
            $this->load->view('pay/dashboard', $data);
            $this->load->view('common/footer');
        }else{
            redirect(base_url());
        }

    }

    public function reports()
    {
        $data['pay_category'] = $this->payroll->pay_category();
        $data['emp_categories'] = $this->payroll->emp_type();
        $data['dep_type'] = $this->payroll->department();

        $data['employees'] = $this->payroll->get_employees_all();
        $data['emp_departments'] = $this->payroll->get_emp_depts();
        $data['emp_statuses'] = $this->payroll->get_emp_status();

        $this->load->view('common/header');
        $this->load->view('pay/payroll_reports', $data);
        $this->load->view('common/footer');

    }

    public function monthend_reports_list()
    {
        $data['pay_category'] = $this->payroll->pay_category();
        $data['emp_categories'] = $this->payroll->emp_type();
        $data['dep_type'] = $this->payroll->department();

        $data['employees'] = $this->payroll->get_employees_all();
        $data['emp_departments'] = $this->payroll->get_emp_depts();
        $data['emp_statuses'] = $this->payroll->get_emp_status();

        if($this->session->userdata('payroll_id')!=5){

            $data['all_month_end_data'] = $this->payroll->get_all_monthend_list($this->session->userdata('payroll_id'));

        }else{
            $data['all_month_end_data'] = $this->payroll->get_all_monthend_list();
        }

        $this->load->view('common/header');
        $this->load->view('pay/monthend_list', $data);
        $this->load->view('common/footer');

    }

    function get_epf()
    {

        $post_data = $this->input->post();
        $month = $post_data['month'];
        $employee = $post_data['employee'];
        $emp_department = $post_data['emp_department'];
        if ($emp_department == 0) {
            $eData = $this->payroll->get_salary_details($month,$employee,$emp_department);
            $data['dep_mod'] = '0';
        } else {
            $eData = $this->payroll->get_salary_details($month,$employee,$emp_department);
            $data['dep_mod'] = $emp_department;
            $data['dep_name'] = $this->payroll->department_details($emp_department)->desc;
        }
        foreach ($eData as $allEmp) {

            $emp_sal = json_decode($allEmp['data'], true);
            $sheet_data[] = array("employee_id" => $allEmp['emp_id'], "epf_no" => $this->payroll->get_emp_details($allEmp['emp_id'])->epf_no,"nic" => $this->payroll->get_emp_details($allEmp['emp_id'])->nic_num, "name" => $this->payroll->get_emp_details($allEmp['emp_id'])->initials." ".$this->payroll->get_emp_details($allEmp['emp_id'])->last_name, "designation" => $this->payroll->get_emp_type($allEmp['emp_type'])->name, "dep" => $allEmp['dep_id'], "emp_type" => $allEmp['emp_type'], "gross" => $emp_sal['74'], "epf" => $emp_sal['77'], "etf" => $emp_sal['82'], "epf12" => $emp_sal['83']);
            $data['sheet_data'] = $sheet_data;

        }
        $data['month'] = $month;
        $data['dep_type'] = $this->payroll->department();
        $this->load->view('pay/epf_sheet', $data);

    }

    function get_etf()
    {

        $post_data = $this->input->post();
        $month = $post_data['month'];
        $employee = $post_data['employee'];
        $emp_department = $post_data['emp_department'];
        if ($emp_department == 0) {
            $eData = $this->payroll->get_salary_details($month,$employee,$emp_department);
            $data['dep_mod'] = '0';
        } else {
            $eData = $this->payroll->get_salary_details($month,$employee,$emp_department);
            $data['dep_mod'] = $emp_department;
            $data['dep_name'] = $this->payroll->department_details($emp_department)->desc;
        }
        foreach ($eData as $allEmp) {

            $emp_sal = json_decode($allEmp['data'], true);
            $sheet_data[] = array("employee_id" => $allEmp['emp_id'], "epf_no" => $this->payroll->get_emp_details($allEmp['emp_id'])->epf_no,"nic" => $this->payroll->get_emp_details($allEmp['emp_id'])->nic_num, "name" => $this->payroll->get_emp_details($allEmp['emp_id'])->initials." ".$this->payroll->get_emp_details($allEmp['emp_id'])->last_name, "designation" => $this->payroll->get_emp_type($allEmp['emp_type'])->name, "dep" => $allEmp['dep_id'], "emp_type" => $allEmp['emp_type'], "gross" => $emp_sal['74'], "epf" => $emp_sal['77'], "etf" => $emp_sal['82'], "epf12" => $emp_sal['83']);
            $data['sheet_data'] = $sheet_data;

        }
        $data['month'] = $month;
        $data['dep_type'] = $this->payroll->department();
        $this->load->view('pay/etf_sheet', $data);

    }

    function get_payee()
    {

        $post_data = $this->input->post();
        $month = $post_data['month'];
        $employee = $post_data['employee'];
        $emp_department = $post_data['emp_department'];
        if ($emp_department == 0) {
            $eData = $this->payroll->get_salary_details($month,$employee,$emp_department);
            $data['dep_mod'] = '0';
        } else {
            $eData = $this->payroll->get_salary_details($month,$employee,$emp_department);
            $data['dep_mod'] = $emp_department;
            $data['dep_name'] = $this->payroll->department_details($emp_department)->desc;
        }
        foreach ($eData as $allEmp) {

            $emp_sal = json_decode($allEmp['data'], true);
            $sheet_data[] = array("employee_id" => $allEmp['emp_id'], "epf_no" => $this->payroll->get_emp_details($allEmp['emp_id'])->epf_no,"nic" => $this->payroll->get_emp_details($allEmp['emp_id'])->nic_num, "name" => $this->payroll->get_emp_details($allEmp['emp_id'])->initials." ".$this->payroll->get_emp_details($allEmp['emp_id'])->last_name, "designation" => $this->payroll->get_emp_type($allEmp['emp_type'])->name, "dep" => $this->payroll->department_details($allEmp['dep_id'])->desc, "cat" => $this->payroll->emp_type_1($this->payroll->get_emp_details($allEmp['emp_id'])->emp_category)->desc, "emp_type" => $allEmp['emp_type'], "payee" => $emp_sal['75']);
            $data['sheet_data'] = $sheet_data;

        }
        $data['month'] = $month;
        $data['dep_type'] = $this->payroll->department();
        $this->load->view('pay/payee_sheet', $data);

    }

    function getAllPaySheet()
    {
        $post_data = $this->input->post();
        $month = $post_data['month'];
        $employee = $post_data['employee'];
        $emp_department = $post_data['emp_department'];

        if ($emp_department == 0) {
            $eData = $this->payroll->get_salary_details($month,$employee,$emp_department);
            $data['dep_mod'] = '0';
        } else {
            $eData = $this->payroll->get_salary_details($month,$employee,$emp_department);
            $data['dep_mod'] = $emp_department;
            $data['dep_name'] = $this->payroll->department_details($emp_department)->desc;
        }

        $monthData = $this->payroll->get_salary_main_data($month);
        $listData = $this->payroll->get_salary_extra_data($month);
        // $eData = $this->payroll->get_salary_details($branch,$month,$emp_type);
        foreach ($eData as $allEmp) {
            $emppdata = $this->payroll->GetEmpInfo($allEmp['ref_id']);
            $emp_sal = json_decode($allEmp['data'], true);
            $sheet_data[] = array(
                "emp_all_Data" => $allEmp['data'],
                "emp_Cat" => $allEmp['emp_type'],
                "employee_id" => $allEmp['emp_id'],
                "ref_id" => $allEmp['ref_id'],
                "epf_no" => $this->payroll->get_emp_details($allEmp['emp_id'])->epf_no,
//              "initials" => $this->payroll->get_emp_details($allEmp['emp_id'])->initials,
//              "last_name" => $this->payroll->get_emp_details($allEmp['emp_id'])->last_name,
//              "designation" => $this->payroll->GetJobTitlebyID($emppdata->job_title)->desc,
//              "account" => $this->payroll->get_emp_account($allEmp['ref_id'])->account_no,
//              "bank" => $this->payroll->get_emp_account($allEmp['ref_id'])->bank_name,
                "initials" => $emp_sal['100'],
                "last_name" => $emp_sal['109'],
                "designation" => $emp_sal['102'],
                "department" => $emp_sal['103'],
                "account" => $emp_sal['104'],
                "bank" => $emp_sal['105'],
                "sex" => $this->payroll->get_emp_details($allEmp['emp_id'])->gender,
                "dep" => $allEmp['dep_id'],
                "monthly_payments" => $emp_sal['9'],
                "monthly_deductions" => $emp_sal['13'],
                "all_allowance" => $emp_sal['10'],
                "basic" => $emp_sal['28'],
                "gross" => $emp_sal['62'],
                "loan_ins" => $emp_sal['63'],
                "advance" => $emp_sal['3'],
                "nopay_day" => $emp_sal['141'],
                "nopay_amount" => $emp_sal['67'],
                "late_attendance" => $emp_sal['69'],
                "late_amount" => $emp_sal['70'],
                "ex_deduct" => $emp_sal['71'],
                "sal_mgr_ded" => $emp_sal['72'],
                "sal_for_epf" => $emp_sal['74'],
                "payee" => $emp_sal['75'],
                "epf" => $emp_sal['77'],
                "nopay_amount" => $emp_sal['67'],
                "stamp" => $emp_sal['76'],
                "total_deduction" => $emp_sal['78'],
                "net" => $emp_sal['79']-$emp_sal['75'],
                "amt_payee" => $emp_sal['81'],
                "etf" => $emp_sal['82'],
                "epf12" => $emp_sal['83'],
                "ot_h" => $emp_sal['84'],
                "ot_r" => $emp_sal['85'],
                "ot_amount" => $emp_sal['88'],
                "mobile" => $emp_sal['68'],
                "work_day" => $emp_sal['140'],
                "rate_per_day" => $emp_sal['2022'],
            );
            $data['sheet_data'] = $sheet_data;

        }
        $data['dep_type'] = $this->payroll->department();
        $data['main_data']  = $monthData;
        $data['listData']  = $listData;

        $this->load->view('pay/pay_sheet', $data);
        /*$baseURL = base_url();
        if($baseURL=="http://mx5.earrow.net/demo/hrcustomer/"){
            $this->load->view('pay/pay_sheet_kreston', $data);
        } else {

        }*/
    }

    public function get_pay_slips()
    {
        $data = $this->input->post();
        $month = $data['month'];
        $employee = $data['employee'];
        $emp_department = $data['emp_department'];

        $listData = $this->payroll->get_salary_extra_data($month);
        $eData = $this->payroll->get_salary_details($month,$employee,$emp_department);
        $monthData = $this->payroll->get_salary_main_data($month);

        foreach ($eData as $allEmp) {
            $emppdata = $this->payroll->GetEmpInfo($allEmp['ref_id']);
            $emp_sal = json_decode($allEmp['data'], true);
            $sheet_data[] = array(
                "emp_all_Data" => $allEmp['data'],
                "emp_Cat" => $allEmp['emp_type'],
                "employee_id" => $allEmp['emp_id'],
                "epf_no" => $this->payroll->get_emp_details($allEmp['emp_id'])->epf_no,
                "ref_id" => $allEmp['ref_id'],
//                "initials" => $this->payroll->get_emp_details($allEmp['emp_id'])->initials,
//                "last_name" => $this->payroll->get_emp_details($allEmp['emp_id'])->last_name,
//                "designation" => $this->payroll->GetJobTitlebyID($emppdata->job_title)->desc,
//                "department" => $this->payroll->GetDepartmentbyID($allEmp['dep_id'])->desc,
//                "account" => $this->payroll->get_emp_account($allEmp['ref_id'])->account_no,
//                "bank" => $this->payroll->get_emp_account($allEmp['ref_id'])->bank_name,
                "initials" => $emp_sal['100'],
                "last_name" => $emp_sal['109'],
                "designation" => $emp_sal['102'],
                "department" => $emp_sal['103'],
                "account" => $emp_sal['104'],
                "bank" => $emp_sal['105'],
                "sex" => $this->payroll->get_emp_details($allEmp['emp_id'])->gender,
                "dep" => $allEmp['dep_id'],
                "monthly_payments" => $emp_sal['9'],
                "monthly_deductions" => $emp_sal['13'],
                "monthly_advances" => $emp_sal['3'],
                "all_allowance" => $emp_sal['10'],
                "basic" => $emp_sal['28'],
                "gross" => $emp_sal['62'],
                "loan_ins" => $emp_sal['63'],
                "nopay_day" => $emp_sal['66'],
                "nopay_amount" => $emp_sal['67'],
                "late_attendance" => $emp_sal['69'],
                "late_amount" => $emp_sal['70'],
                "ex_deduct" => $emp_sal['71'],
                "sal_mgr_ded" => $emp_sal['72'],
                "all_allowance" => ($emp_sal['10']!=$emp_sal['2024'] && $emp_sal['10']>$emp_sal['2024'])?$emp_sal['10']-$emp_sal['2024']:$emp_sal['10'],
                "payee" => $emp_sal['75'],
                "epf" => $emp_sal['77'],
                "total_deduction" => $emp_sal['78'],
                "net" => $emp_sal['79']-$emp_sal['75'],
                "amt_payee" => $emp_sal['81'],
                "etf" => $emp_sal['82'],
                "epf12" => $emp_sal['83'],
                "ot_h" => $emp_sal['84'],
                "ot_r" => $emp_sal['85'],
                "ot_amount" => $emp_sal['88'],
                "work_day" => $emp_sal['140'],
                "stamp" => $emp_sal['76'],
                "mobile" => $emp_sal['68'],
                "rate_per_day" => $emp_sal['2022'],
                "budget_allowance" => $emp_sal['2024'],
                "total_basic" => ($emp_sal['28']+$emp_sal['2024']),
                "total_basic_epf"=>($emp_sal['28']+$emp_sal['2024']),
                "epf_8"=>(($emp_sal['28']+$emp_sal['2024'])*8)/100
            );
            $data['sheet_data'] = $sheet_data;
        }
        $data['main_data']  = $monthData;
        $data['listData']  = $listData;
        $data['dep_type'] = $this->payroll->department();
        $this->load->view('pay/pay_slips', $data);
    }


    public function get_emp_pay_slips()
    {
        $data = $this->input->post();
        $month = $data['month'];
        $employee = USER_ID;

        $listData = $this->payroll->get_salary_extra_data($month);
        $eData = $this->payroll->get_salary_emp_details($month,$employee);
        $monthData = $this->payroll->get_salary_main_data($month);

        foreach ($eData as $allEmp) {
            $emppdata = $this->payroll->GetEmpInfo($allEmp['ref_id']);
            $emp_sal = json_decode($allEmp['data'], true);
            $sheet_data[] = array(
                "emp_all_Data" => $allEmp['data'],
                "emp_Cat" => $allEmp['emp_type'],
                "employee_id" => $allEmp['emp_id'],
                "epf_no" => $this->payroll->get_emp_details($allEmp['emp_id'])->epf_no,
                "ref_id" => $allEmp['ref_id'],
//              "initials" => $this->payroll->get_emp_details($allEmp['emp_id'])->initials,
//              "last_name" => $this->payroll->get_emp_details($allEmp['emp_id'])->last_name,
//              "designation" => $this->payroll->GetJobTitlebyID($emppdata->job_title)->desc,
//              "department" => $this->payroll->GetDepartmentbyID($allEmp['dep_id'])->desc,
//              "account" => $this->payroll->get_emp_account($allEmp['ref_id'])->account_no,
//              "bank" => $this->payroll->get_emp_account($allEmp['ref_id'])->bank_name,
                "initials" => $emp_sal['100'],
                "last_name" => $emp_sal['109'],
                "designation" => $emp_sal['102'],
                "department" => $emp_sal['103'],
                "account" => $emp_sal['104'],
                "bank" => $emp_sal['105'],
                "sex" => $this->payroll->get_emp_details($allEmp['emp_id'])->gender,
                "dep" => $allEmp['dep_id'],
                "monthly_payments" => $emp_sal['9'],
                "monthly_deductions" => $emp_sal['13'],
                "monthly_advances" => $emp_sal['3'],
                "all_allowance" => ($emp_sal['10']!=$emp_sal['2024'] && $emp_sal['10']>$emp_sal['2024'])?$emp_sal['10']-$emp_sal['2024']:$emp_sal['10'],
                "basic" => $emp_sal['28'],
                "gross" => $emp_sal['62'],
                "loan_ins" => $emp_sal['63'],

                "nopay_day" => $emp_sal['66'],
                "nopay_amount" => $emp_sal['67'],
                "late_attendance" => $emp_sal['69'],
                "late_amount" => $emp_sal['70'],
                "ex_deduct" => $emp_sal['71'],
                "sal_mgr_ded" => $emp_sal['72'],
                "payee" => $emp_sal['75'],
                "epf" => $emp_sal['77'],
                "total_deduction" => $emp_sal['78'],
                "net" => $emp_sal['79']-$emp_sal['75'],
                "amt_payee" => $emp_sal['81'],
                "etf" => $emp_sal['82'],
                "epf12" => $emp_sal['83'],
                "ot_h" => $emp_sal['84'],
                "ot_r" => $emp_sal['85'],
                "work_day" => $emp_sal['140'],
                "stamp" => $emp_sal['76'],
                "mobile" => $emp_sal['68'],
                "rate_per_day" => $emp_sal['2022'],
                "budget_allowance" => $emp_sal['2024'],
                "total_basic" => ($emp_sal['28']+$emp_sal['2024']),
                "total_basic_epf"=>($emp_sal['28']+$emp_sal['2024']),
                "epf_8"=>((($emp_sal['28']+$emp_sal['2024']))*8)/100
            );
            $data['sheet_data'] = $sheet_data;
        }
        $data['main_data']  = $monthData;
        $data['listData']  = $listData;
        $data['dep_type'] = $this->payroll->department();
        $this->load->view('pay/pay_emp_slips', $data);
    }

    function get_sal_bank()
    {

        $post_data = $this->input->post();
        $month = $post_data['month'];
        $employee = $post_data['employee'];
        $emp_department = $post_data['emp_department'];

        $eData = $this->payroll->get_salary_bank_details($month,$employee,$emp_department);
        //$eData = $this->payroll->get_salary_bank_details($month);

        foreach ($eData as $allEmp){

            $emp_sal = json_decode($allEmp['data'],true);

            $sheet_data_2[] = array(
                "employee_id" => $allEmp['emp_id'],
                "ref_id" => $allEmp['ref_id'],
                "epf_no" => $this->payroll->get_emp_details($allEmp['emp_id'])->epf_no,
                "name" => $this->payroll->get_emp_details($allEmp['emp_id'])->initials." ".$this->payroll->get_emp_details($allEmp['emp_id'])->last_name,
                "account_no" => $this->payroll->get_emp_account($allEmp['ref_id'])->account_no,
                "bank_name" => $this->payroll->get_emp_account($allEmp['ref_id'])->bank_name,
                "branch_name" => $this->payroll->get_emp_account($allEmp['ref_id'])->branch_name,
                "designation" => $this->payroll->get_emp_type($allEmp['emp_type'])->name,
                "amount_payable" => $emp_sal['81']

            );

            $data['sheet_data_2'] = $sheet_data_2;
        }

        $data['month'] = $post_data['month'];
        $this->load->view('pay/report/sal_bank',$data);
    }

    public function get_six_month_report(){

        $details = $this->input->post();
        $year = $details['year'];
        $year_part = $details['year_part'];

        if($year_part==1){
            $month_1 = $year.'-01-01';
            $month_22 = $year.'-06-01';
            $month_2 =  date("Y-m-t", strtotime($month_22));
        }else if($year_part==2){
            $month_1 = $year.'-07-01';
            $month_22 = $year.'-12-01';
            $month_2 =  date("Y-m-t", strtotime($month_22));
        }

        $r1 = $month_1;
        $r2 = $month_2;

        $all_employees = $this->payroll->get_all_employee();
        $rows = $all_employees->row_count;
        $aryRange = array();

        while (strtotime($month_1) <= strtotime($month_2)) {

            $d1 = new DateTime($month_1);
            $d2 = new DateTime($month_1);
            $d1->modify('first day of next month');
            $d2->modify('first day of this month');
            $month_3=$d2->format('Y-m');
            array_push($aryRange, $month_3);
            $month_1=$d1->format('Y-m');

        }

        $count_t =1;
        $emp_count =0;
        $loop_count = 1;

        $data_epf = array();
        foreach ($all_employees as $employees) {
            $emp_count++;
            $total_cont = 0;
            foreach ($aryRange as $range){
                $select_data = $this->payroll->salary_summary_data($employees->id, $range);
                if ($select_data) {
                    $new_data = json_decode($select_data['data'],true);
                    //Total contribution,Earnings and contribution
                    $total_cont += $new_data['82'];
                    $monthly_amount[$range][0] = $new_data['74'];
                    $monthly_amount[$range][1] = $new_data['82'];
                }
            }
            if ($count_t < 27) {
                $data_epf[] = array(
                    "name" => $employees->initials." ".$employees->last_name,
                    "code" => $employees->epf_no,
                    "nic" => $employees->nic_num,
                    "amount" => $monthly_amount,
                    "total_cont"=>$total_cont
                );
                unset($monthly_amount);
                $count_t++;
            } else {
                $all_data_epf[] = $data_epf;
                $count_t = 0;
                unset($data_epf);

                $data_epf[] = array(
                    "name" => $employees->initials." ".$employees->last_name,
                    "code" => $employees->epf_no,
                    "nic" => $employees->nic_num,
                    "amount" => $monthly_amount,
                    "total_cont"=>$total_cont
                );
                unset($monthly_amount);
            }
        }
        if(!isset($all_data_epf)){
            $all_data_epf[] = $data_epf;
        }

        $data["all_data_epf"] = $all_data_epf;
        $data["month_range"] = $aryRange;
        $data["date_range"] = $r1.' To '.$r2;
        $data["employee_count"] = $emp_count;
        $this->load->view('pay/report/result_etf_report',$data);
    }

    function sixMonthReportOne()
    {
        $year = date('Y');
        $date = $year.'-01-01';

        foreach ($this->payroll->getAllEmployeesFORsixM($date) as $allEmp) {

            $emp = $allEmp->id;
            $date_data = explode("-", date('Y-m-d'));
            $month_data = array('01','02','03','04','05','06');

            $month_epf = array();
            $month_contribution = array();
            $total_contribution = 0;

            foreach ($month_data as $month_num) {

                $month = $date_data[0] . "-" . $month_num;
                $select_data = $this->payroll->salary_summary_data_byID($emp, $month);
                if(($this->payroll->get_relavant_employee($emp,$month)) && $month==$select_data->month) {

                    if ($this->payroll->salary_summary_data_byID($emp, $month)) {

                        $select_data = $this->payroll->salary_summary_data_byID($emp, $month);

                        if($select_data) {

                            $new_data = json_decode($select_data['data'],true);

                            $emp_name = $allEmp->initials." ".$allEmp->last_name;
                            $nic = $allEmp->nic_num;

                            $month_epf[] = number_format($new_data['74'], 2);
                            $month_contribution[] = number_format($new_data['74'] * 3 / 100, 2);
                            $total_contribution = $total_contribution + ($new_data['74'] * 3 / 100);
                        }

                    }
                }
                else{

                    $month_epf[] = 0;
                    $month_contribution[] = 0;

                }
            }
            $sheet_data[] = array(
                "epfno" => $emp,
                "name" => $emp_name,
                "nic" => $nic,
                "total_contribution" => number_format($total_contribution, 2),
                "month_gross" => $month_epf,
                "month_contribution" => $month_contribution
            );
            if (count($sheet_data) > 30) {
                $all_sheet_data[] = $sheet_data;
                unset($sheet_data);
            }
        }
        $all_sheet_data[] = $sheet_data;
        $data['all_sixmonth_sheet'] = $all_sheet_data;
        $data['year'] = $date_data[0];
        $data["month"] = $date_data[1];
        $this->load->view('pay/six_month/sixmonth_report_one', $data);

    }


    function sixMonthReportTwo()
    {
        $year = date('Y');
        $date = $year.'-01-01';

        foreach ($this->payroll->getAllEmployeesFORsixM($date) as $allEmp) {

            $emp = $allEmp->id;
            $date_data = explode("-", date('Y-m-d'));
            $month_data = array('07','08','09','10','11','12');

            $month_epf = array();
            $month_contribution = array();
            $total_contribution = 0;

            foreach ($month_data as $month_num) {

                $month = $date_data[0] . "-" . $month_num;

                $select_data = $this->payroll->salary_summary_data_byID($emp, $month);
                //var_dump($select_data);

                if(($this->payroll->get_relavant_employee($emp,$month)) && $month==$select_data['month']) {

                    if ($this->payroll->salary_summary_data_byID($emp, $month)) {
                        if($select_data = $this->payroll->salary_summary_data_byID($emp, $month)) {
                            $new_data = json_decode($select_data['data'],true);
                            $emp_name = $allEmp->initials." ".$allEmp->last_name;
                            $nic = $allEmp->nic_num;

                            $month_epf[] = number_format($new_data['74'], 2);
                            $month_contribution[] = number_format($new_data['74'] * 3 / 100, 2);
                            $total_contribution = $total_contribution + ($new_data['74'] * 3 / 100);
                        }

                    }
                }
                else{

                    $month_epf[] = 0;
                    $month_contribution[] = 0;

                }
            }
            $sheet_data[] = array(
                "epfno" => $emp,
                "name" => $emp_name,
                "nic" => $nic,
                "total_contribution" => number_format($total_contribution, 2),
                "month_gross" => $month_epf,
                "month_contribution" => $month_contribution
            );
            if (count($sheet_data) > 30) {
                $all_sheet_data[] = $sheet_data;
                unset($sheet_data);
            }
        }
        $all_sheet_data[] = $sheet_data;
        $data['all_sixmonth_sheet'] = $all_sheet_data;
        $data['year'] = $date_data[0];
        $data["month"] = $date_data[1];
        $this->load->view('pay/six_month/sixmonth_report_two', $data);
    }

    public function get_payslips()
    {

        $this->load->view('common/header');
        $this->load->view('pay/payroll_slips');
        $this->load->view('common/footer');

    }



    //retrieve data for view payment
    public function get_payment_view_by_id($id)
    {
        $data=array();

        $data['events'] = $this->salary_settings_mod->get_payment_view(array('hr_pay_payroll_main_monthly_payments.id'=>$id));
        $data['lists'] = $this->salary_settings_mod->get_payment_list_view(array('hr_pay_payroll_monthly_payments.ref_id'=>$id));

        echo json_encode($data);
    }
}