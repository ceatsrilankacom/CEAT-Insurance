<?php

class payroll_settings extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();
        $this->load->database();
        $this->load->library('ion_auth');
        // check if user logged in
        if (!$this->ion_auth->logged_in()) {
            redirect('index.php/auth/login');
        }
        $this->load->database();
        $this->load->model('payroll_settings_mod');
        $this->load->helper('url');
        $this->load->library('permissions');
        $this->load->library('system_log');

        ini_set('display_errors', 0);
        error_reporting(0);
    }

    public function index()
    {
        if (!$this->ion_auth->logged_in()) {
            redirect('index.php/auth/login');
        }
        $data['pay_data'] = $this->payroll_settings_mod->get_all_pay_data();
        $data['get_groups'] = $this->payroll_settings_mod->get_groups();
        $data['EmpCategories'] = $this->payroll_settings_mod->getEmpCategories();
        $this->load->view('common/header');
        $this->load->view('pay/pay_settings', $data);
        $this->load->view('common/footer');
    }

    public function ajax_get_pay_details_by_id()
    {
        $id = $this->input->post('pay_id');
        if (empty($id)) {
            echo json_encode(array('status' => false, 'message' => "Unable to get data. ID invalid."));
        }
        $pay_data = $this->payroll_settings_mod->get_pay_details_by_id($id);
        $pay_cat_data = $this->payroll_settings_mod->get_pay_cat_details_by_id($id);
        echo json_encode(array('status' => true, 'pay_data' => $pay_data, 'pay_cat_data' => $pay_cat_data));
        exit;
    }

    public function save_new_pay() //used
    {
        $this->form_validation->set_rules('code', 'Code', 'required|trim|max_length[70]|is_unique[hr_pay_formula_settings.code]');
        $this->form_validation->set_rules('name', 'Name', 'required');
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
        }
        $id = null;
        $message = null;
        $details = $this->input->post();
        $str_code = $string = str_replace(' ', '', $details['code']);
        $str_for = $string = str_replace(' ', '', $details['formula']);
        $new_str1 = str_replace('{', '$', $str_for);
        $formula = str_replace('}', ' ', $new_str1);
        $code = str_replace($str_code, '$' . $str_code, $str_code);
        $str_code = str_replace($str_code, '$' . $str_code, $str_code);

        $data_main['code'] = $code;
        $data_main['name'] = $details['name'];
        $data_main['description'] = $details['description'];
        $data_main['order'] = $details['order'];
        $data_main['group'] = $details['group'];
        $data_main['formula'] = $formula;
        $data_main['decoration'] = $details['decoration'];

        if (isset($details['hide_summary'])) {
            $hide_summary = $details['hide_summary'];
        } else {
            $hide_summary = 0;
        }
        $data_main['hide_summary'] = $hide_summary;
        if (isset($details['hide_slips'])) {
            $hide_slips = $details['hide_slips'];
        } else {
            $hide_slips = 0;
        }
        $data_main['hide_slips'] = $hide_slips;


        if ($id = $this->db->insert('hr_pay_formula_settings', $data_main)) {
            $f_id = $this->db->insert_id();
            if (isset($details['categories'])) {
                foreach ($details['categories'] as $key => $value) {
                    if (!empty($details['categories'][$key])) {
                        $insert_f_data = array(
                            'f_id' => $f_id,
                            'c_id' => $details['categories'][$key],
                        );
                        $this->db->insert('hr_pay_formula_emp_cate', $insert_f_data);
                        unset($insert_f_data);
                    }
                }

            }
            $this->system_log->create_system_log("Payroll Settings", "Success", "New Salary Formula Added ID #".$f_id);
            $message = 'New Formula Added - # : ' . $f_id;
        }

        if ($details['group'] == 6) {
            $sql = "SHOW COLUMNS FROM hr_pay_payroll_monthly_advances LIKE '%$code%'";
            $result = $this->db->query($sql);
            if ($result->num_rows() == null) {
                $query2 = "ALTER TABLE hr_pay_payroll_monthly_advances ADD " . $str_code . " INT NOT NULL";
                $this->db->query($query2);
                $this->system_log->create_system_log("Payroll Settings", "Success", "New Monthly Advance Column Added Name - ".$str_code);
            }

        } elseif ($details['group'] == 8) {
            $sql2 = "SHOW COLUMNS FROM hr_pay_payroll_monthly_payments LIKE '%$code%'";
            $result2 = $this->db->query($sql2);
            if ($result2->num_rows() == null) {
                $query3 = "ALTER TABLE hr_pay_payroll_monthly_payments ADD " . $str_code . " INT NOT NULL";
                $this->db->query($query3);
                $this->system_log->create_system_log("Payroll Settings", "Success", "New Monthly Payment Column Added Name - ".$str_code);
            }
        }

        if (!empty($id) && $id > 0) {
            echo json_encode(array('status' => true, 'message' => $message));
            exit;
        } else {
            echo json_encode(array('status' => false, 'message' => 'Unable to save! Try again.',));
            exit;
        }
    }

    public function edit_new_pay() //used
    {

        $this->db->trans_start();
        $this->form_validation->set_rules('code', 'Code', 'required|trim|max_length[70]');
        $this->form_validation->set_rules('name', 'Name', 'required');
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
        }
        $id = null;
        $message = null;
        $details = $this->input->post();
        $str_code = $string = str_replace(' ', '', $details['code']);
        $str_for = $string = str_replace(' ', '', $details['formula']);
        $new_str1 = str_replace('{', '$', $str_for);
        $formula = str_replace('}', ' ', $new_str1);
        $code = str_replace($str_code, '$' . $str_code, $str_code);
        $data_main['code'] = $code;
        $data_main['name'] = $details['name'];
        $data_main['description'] = $details['description'];
        $data_main['order'] = $details['order'];
        $data_main['group'] = $details['group'];
        $data_main['formula'] = $formula;
        $data_main['decoration'] = $details['decoration'];
        $pay_id = $details['pay_id'];

        if (isset($details['hide_summary'])) {
            $hide_summary = $details['hide_summary'];
        } else {
            $hide_summary = 0;
        }
        $data_main['hide_summary'] = $hide_summary;
        if (isset($details['hide_slips'])) {
            $hide_slips = $details['hide_slips'];
        } else {
            $hide_slips = 0;
        }
        $data_main['hide_slips'] = $hide_slips;


        if (isset($details['categories'])) {
            if ($this->payroll_settings_mod->delete_f_categories($pay_id)) {
                foreach ($details['categories'] as $key => $value) {
                    if (!empty($details['categories'][$key])) {
                        $insert_f_data = array('f_id' => $pay_id, 'c_id' => $details['categories'][$key]);
                        $this->db->insert('hr_pay_formula_emp_cate', $insert_f_data);
                        unset($insert_f_data);
                    }
                }
            }
        }

        $this->db->where('id', $pay_id);
        $this->db->update('hr_pay_formula_settings', $data_main);
        $this->db->trans_complete();
        $this->system_log->create_system_log("Payroll Settings", "Success", "Salary Formula Updated ID #".$pay_id);

        if ($this->db->trans_status() === FALSE) {

            echo json_encode(array('status' => false, 'message' => 'Unable to Update! Try again.',));
            exit;

        } else {

            echo json_encode(array('status' => true, 'message' => 'Successfully Updated!.'));
            exit;

        }
    }

    //Salary Emp Cat Fields
    public function emp_cat_sal_fields()
    {
        $this->permissions->check_permission('access');
        $this->load->view('common/header');
        $this->load->view('pay/settings/category_fields');
        $this->load->view('common/footer');
    }

    //Salary Emp Cat Fields type
    public function emp_cat_sal_fields_type()
    {
        $this->permissions->check_permission('access');
        $this->load->view('common/header');
        $this->load->view('pay/category_fields_type');
        $this->load->view('common/footer');
    }

    public function get_emp_cate_data()
{
    $this->load->library('datatables');
    $this->datatables->select("hr_pay_m_employee_category.id,hr_pay_m_employee_category.code,hr_pay_m_employee_category.desc,hr_pay_m_employee_category.ot_applicable,hr_pay_m_employee_category.fingerprint_status,hr_pay_m_employee_category.show_att,hr_pay_m_employee_category.attendance_incentive,hr_pay_m_employee_category.rate_per_day,hr_pay_m_employee_category.attendance_only", FALSE);
    $this->datatables->from('hr_pay_m_employee_category');
    $this->datatables->add_column("Actions", "<a class='btn btn-default tbl-action' href='javascript:void();' title='Add/Remove Allowances' onclick='add_remove_allowances(" . '$1' . ")'>
                <i class='fa fa-plus-circle'></i> Assign Allowances
            </a><a class='btn btn-default tbl-action' href='javascript:void();' title='Edit' onclick='edit_emp_cate(" . '$1' . ")'>
                <i class='fa fa-pencil'></i> Edit Category
            </a>", "id");
    //$this->datatables->unset_column('id');
    echo $this->datatables->generate();
}

    public function save_emp_category($method)
    {
        if ($method == "add_cate") {
            $this->form_validation->set_rules('category_code', 'Category Name', 'trim|required|is_unique[hr_pay_m_employee_category.code]');
            $this->form_validation->set_rules('category_name', 'Category Name', 'trim|required|is_unique[hr_pay_m_employee_category.desc]');
            if ($this->form_validation->run() === FALSE) {
                $data = array();
                $data['error_string'] = array();
                $data['inputerror'] = array();
                $data['status'] = FALSE;
                $data['error'] = "validation_error";
                if (form_error('category_code')) {
                    $data['inputerror'][] = 'category_code';
                    $data['error_string'][] = form_error('category_code');
                }
                if (form_error('category_name')) {
                    $data['inputerror'][] = 'category_name';
                    $data['error_string'][] = form_error('category_name');
                }
                echo json_encode($data);
                exit;
            } else {

                $data['code'] = $this->input->post('category_code');
                $data['desc'] = $this->input->post('category_name');
                $data['ot_applicable'] = $this->input->post('ot_applicable');
                if($data['ot_applicable']=="YES"){
                    $data['ot_rate'] = $this->input->post('ot_rate');
                }
                $data['rate_per_day'] = $this->input->post('rate_per_day');
                if($data['rate_per_day']=="YES"){
                    $data['rate_per_day_amount'] = $this->input->post('rate_per_day_amount');
                }
                $data['show_att'] = $this->input->post('show_att');
                $data['attendance_only'] = $this->input->post('attendance_only');
                $data['fingerprint_status'] = $this->input->post('fingerprint_status');
                $data['attendance_incentive'] = $this->input->post('attendance_incentive');

                if ($this->db->insert('hr_pay_m_employee_category', $data)) {
                    $empcatid =  $this->db->insert_id();
                    $this->system_log->create_system_log("Employee Category Management", "Success", "New Employee Category Added ID #".$empcatid);
                    echo json_encode(array("status" => TRUE));
                } else {
                    echo json_encode(array("status" => FALSE));
                }
            }
        } else if ($method == "edit_cates"){
            $this->form_validation->set_rules('category_code', 'Category Code', 'trim|required');
            $this->form_validation->set_rules('category_name', 'Category Name', 'trim|required');
            if ($this->form_validation->run() === FALSE) {
                $data = array();
                $data['error_string'] = array();
                $data['inputerror'] = array();
                $data['status'] = FALSE;
                $data['error'] = "validation_error";
                if (form_error('category_code')) {
                    $data['inputerror'][] = 'category_code';
                    $data['error_string'][] = form_error('category_code');
                }
                if (form_error('category_name')) {
                    $data['inputerror'][] = 'category_name';
                    $data['error_string'][] = form_error('category_name');
                }
                echo json_encode($data);
                exit;
            } else {
                $emp_cat_id = $this->input->post('e_cat_id');
                $data['code'] = $this->input->post('category_code');
                $data['desc'] = $this->input->post('category_name');
                $data['ot_applicable'] = $this->input->post('ot_applicable');
                if($data['ot_applicable']=="YES"){
                    $data['ot_rate'] = $this->input->post('ot_rate');
                }
                $data['rate_per_day'] = $this->input->post('rate_per_day');
                if($data['rate_per_day']=="YES"){
                    $data['rate_per_day_amount'] = $this->input->post('rate_per_day_amount');
                }
                $data['show_att'] = $this->input->post('show_att');
                $data['attendance_only'] = $this->input->post('attendance_only');
                $data['fingerprint_status'] = $this->input->post('fingerprint_status');
                $data['attendance_incentive'] = $this->input->post('attendance_incentive');

                if ($this->payroll_settings_mod->update_emp_cat($data,$emp_cat_id)) {
                    $this->system_log->create_system_log("Employee Category Management", "Success", "Employee Category Updated ID #".$emp_cat_id);
                    echo json_encode(array("status" => TRUE));
                } else {
                    echo json_encode(array("status" => FALSE));
                }
            }
        }

    }

    public function get_emp_cat_data($id)
    {
        $data = $this->payroll_settings_mod->get_emp_cat_data($id);
        echo json_encode($data);
    }

    public function get_allow_data()
    {
        $this->load->library('datatables');
        $this->datatables->select("hr_pay_m_employee_allowance_types.id,hr_pay_m_employee_allowance_types.code,hr_pay_m_employee_allowance_types.allowance,hr_pay_m_employee_allowance_types.epf,hr_pay_m_employee_allowance_types.details,hr_pay_m_employee_allowance_types.type", FALSE);
        $this->datatables->from('hr_pay_m_employee_allowance_types');
        $this->datatables->add_column("Actions", "<a class='btn btn-default tbl-action' href='javascript:void();' title='Edit' onclick='edit_allowance(" . '$1' . ")'>
                <i class='fa fa-pencil'></i> Edit Allowance
            </a>", "id");
        //$this->datatables->unset_column('id');
        echo $this->datatables->generate();
    }

    public function save_allowance($method)
    {
        if($method == "add_allowance") {
            $this->form_validation->set_rules('allowance_code', 'Allowance Name', 'trim|required|is_unique[hr_pay_m_employee_allowance_types.code]');
            $this->form_validation->set_rules('allowance_name', 'Allowance Name', 'trim|required|is_unique[hr_pay_m_employee_allowance_types.allowance]');

            if ($this->form_validation->run() === FALSE) {
                $data = array();
                $data['error_string'] = array();
                $data['inputerror'] = array();
                $data['status'] = FALSE;
                $data['error'] = "validation_error";
                if (form_error('allowance_code')) {
                    $data['inputerror'][] = 'allowance_code';
                    $data['error_string'][] = form_error('allowance_code');
                }
                if (form_error('allowance_name')) {
                    $data['inputerror'][] = 'allowance_name';
                    $data['error_string'][] = form_error('allowance_name');
                }
                echo json_encode($data);
                exit;
            }
            else {

                $data['code'] = $this->input->post('allowance_code');
                $data['allowance'] = $this->input->post('allowance_name');
                $data['epf'] = $this->input->post('epf');
                $data['type'] = $this->input->post('allowance_type');
                $data['details'] = $this->input->post('allowance_details');


                $str_code = 'j'.$string = str_replace(' ', '', $this->input->post('allowance_code'));
                $code = str_replace($str_code, '$' . $str_code, $str_code);
                $data_main['code'] = $code;
                $data_main['name'] = $data['allowance'];
                $data_main['group'] = 4;
                $data_main['formula'] = $code.' ';

                if($this->db->insert('hr_pay_formula_settings', $data_main)){
                    $data['f_id'] = $this->db->insert_id();
                    if ($this->db->insert('hr_pay_m_employee_allowance_types', $data)){
                        $aid = $this->db->insert_id();
                        $this->system_log->create_system_log("Allowances Management", "Success", "New Allowance Added ID #".$aid);
                        echo json_encode(array("status" => TRUE));
                    } else {
                        echo json_encode(array("status" => FALSE));
                    }
                }
            }
        }
        else if ($method == "edit_allowance"){
            $this->form_validation->set_rules('allowance_code', 'Allowance Code', 'trim|required');
            $this->form_validation->set_rules('allowance_name', 'Allowance Name', 'trim|required');
            if ($this->form_validation->run() === FALSE) {
                $data = array();
                $data['error_string'] = array();
                $data['inputerror'] = array();
                $data['status'] = FALSE;
                $data['error'] = "validation_error";
                if (form_error('allowance_code')) {
                    $data['inputerror'][] = 'allowance_code';
                    $data['error_string'][] = form_error('allowance_code');
                }
                if (form_error('allowance_name')) {
                    $data['inputerror'][] = 'allowance_name';
                    $data['error_string'][] = form_error('allowance_name');
                }
                echo json_encode($data);
                exit;
            } else {
                $allowance_id = $this->input->post('allowance_id');
                $data['code'] = $this->input->post('allowance_code');
                $data['allowance'] = $this->input->post('allowance_name');
                $data['type'] = $this->input->post('allowance_type');
                $data['epf'] = $this->input->post('epf');
                $data['details'] = $this->input->post('allowance_details');
                $f_id = $this->input->post('f_id');

                $str_code = 'j'.$string = str_replace(' ', '', $this->input->post('allowance_code'));
                $code = str_replace($str_code, '$' . $str_code, $str_code);
                $data_main['code'] = $code;
                $data_main['name'] = $data['allowance'];
                $data_main['group'] = 4;
                $data_main['formula'] = $code.' ';

                $this->db->where('id', $f_id);
                $this->db->update('hr_pay_formula_settings', $data_main);
                $this->db->trans_complete();

                if ($this->payroll_settings_mod->update_allowance($data,$allowance_id)) {
                    $this->system_log->create_system_log("Allowances Management", "Success", "Allowance Updated ID #".$allowance_id);
                    echo json_encode(array("status" => TRUE));
                } else {
                    echo json_encode(array("status" => FALSE));
                }
            }
        }

    }

    public function get_allowance_data($id)
    {
        $data = $this->payroll_settings_mod->get_allowance_data($id);
        echo json_encode($data);
    }

    public function get_allowance_emp_cat_data($id)
    {
        $main_data = $this->payroll_settings_mod->get_allowance_emp_cat_data($id);
        $allowance_data = $this->payroll_settings_mod->getallAllowances();
        echo json_encode(array(
            'status' => true,
            'main_data' => $main_data,
            'allowance_data' => $allowance_data,
        ));
        exit;
    }

    public function get_allowance_list()
    {
        $data = $this->payroll_settings_mod->get_allowances_list();
        echo json_encode($data);
    }

    public function save_allowance_emp_cat()
    {

        $details = $this->input->post();
        $emp_cat_id = $details['emp_cat_id_for_allowance'];
        if (isset($details['allowance'])) {
                foreach ($details['allowance'] as $key => $value) {
                    if (!empty($details['allowance'][$key])) {
                        $allow_id = $details['allowance'][$key];
                        $q1 = $this->db->query("SELECT * FROM  hr_pay_m_employee_allow_assigned_cate WHERE a_id='$allow_id' AND c_id = '$emp_cat_id' ");
                        if ($q1->num_rows() > 0) {
                            $update_allowance_data = array(
                                'rate' => $details['rate'][$key],
                                'a_status' => $details['a_status'][$key]
                            );
                            $this->payroll_settings_mod->update_emp_cat_allow($emp_cat_id,$allow_id,$update_allowance_data);
                            unset($update_allowance_data);
                            if($delete_det=$this->payroll_settings_mod->delete_cat_employees_adata($allow_id,$emp_cat_id)) {
                                if ($details['a_status'][$key]) {
                                    if ($cat_emp = $this->payroll_settings_mod->get_cat_employees($emp_cat_id)) {
                                        foreach ($cat_emp as $emp_det) {
                                            $insert_emp_allowance = array(
                                                'cat_allow_id' => $delete_det,
                                                'employee_id' => $emp_det->id,
                                                'amount' => $details['rate'][$key],
                                                'status' => $details['a_status'][$key]
                                            );
                                            $this->db->insert('hr_pay_m_employee_allow_assigned_cate_emp_details', $insert_emp_allowance);
                                            unset($insert_emp_allowance);
                                        }
                                    }

                                }
                            }


                        } else {
                            $insert_allowance_data = array(
                                'c_id' => $details['emp_cat_id_for_allowance'],
                                'a_id' => $details['allowance'][$key],
                                'rate' => $details['rate'][$key],
                                'a_status' => $details['a_status'][$key]
                            );
                            $this->db->insert('hr_pay_m_employee_allow_assigned_cate', $insert_allowance_data);
                            $insert_id = $this->db->insert_id();
                            unset($insert_data);
                            if ($details['a_status'][$key]) {
                                if ($cat_emp = $this->payroll_settings_mod->get_cat_employees($emp_cat_id)) {
                                    foreach ($cat_emp as $emp_det) {
                                        $insert_emp_allowance = array(
                                            'cat_allow_id' => $insert_id,
                                            'employee_id' => $emp_det->id,
                                            'amount' => $details['rate'][$key],
                                            'status' => $details['a_status'][$key]
                                        );
                                        $this->db->insert('hr_pay_m_employee_allow_assigned_cate_emp_details', $insert_emp_allowance);
                                        unset($insert_emp_allowance);
                                    }
                                }
                            }
                        }
                    }
                }
            $this->system_log->create_system_log("Employee Category Management", "Success", "Allowances Updated for Employee Category ID #".$emp_cat_id);
                echo json_encode(array("status" => TRUE));
        }
    }


    //Salary PAYE Settings
    public function emp_sal_paye_settings()
    {
        $this->permissions->check_permission('access');
        $this->load->view('common/header');
        $this->load->view('pay/settings/paye_settings');
        $this->load->view('common/footer');
    }


    public function get_paye_data()
    {
        $this->load->library('datatables');
        $this->datatables->select("id,code,min_val,max_val,rate,less", FALSE);
        $this->datatables->from('hr_pay_m_employee_paye_types');
        $this->datatables->add_column("Actions", "
        <a class='btn btn-default tbl-action' href='javascript:void();' title='Edit' onclick='edit_PAYE(" . '$1' . ")'>
                <i class='fa fa-pencil'></i> Edit
            </a><a class='btn btn-default tbl-action' href='javascript:void();' title='Delete' onclick='delete_PAYE(" . '$1' . ")'>
                <i class='fa fa-pencil'></i> Remove
            </a>", "id");
        //$this->datatables->unset_column('id');
        echo $this->datatables->generate();
    }


    public function save_paye($method)
    {
        if ($method == "add_paye") {
            $this->form_validation->set_rules('paye_code', 'PAYE Code', 'trim|required|is_unique[hr_pay_m_employee_paye_types.code]');

            if ($this->form_validation->run() === FALSE) {
                $data = array();
                $data['error_string'] = array();
                $data['inputerror'] = array();
                $data['status'] = FALSE;
                $data['error'] = "validation_error";
                if (form_error('paye_code')) {
                    $data['inputerror'][] = 'paye_code';
                    $data['error_string'][] = form_error('paye_code');
                }
                echo json_encode($data);
                exit;
            } else {

                $data['code'] = $this->input->post('paye_code');
                $data['min_val'] = $this->input->post('min');
                $data['max_val'] = $this->input->post('max');
                $data['rate'] = $this->input->post('rate');
                $data['less'] = $this->input->post('less');

                    if ($this->db->insert('hr_pay_m_employee_paye_types', $data)){
                        $pid = $this->db->insert_id();
                        $this->system_log->create_system_log("PAYE Management", "Success", "New PAYE Added ID #".$pid);
                        echo json_encode(array("status" => TRUE));
                    } else {
                        echo json_encode(array("status" => FALSE));
                    }
            }
        } else if ($method == "edit_paye"){
            $this->form_validation->set_rules('paye_code', 'PAYE Code', 'trim|required');
            if ($this->form_validation->run() === FALSE) {
                $data = array();
                $data['error_string'] = array();
                $data['inputerror'] = array();
                $data['status'] = FALSE;
                $data['error'] = "validation_error";
                if (form_error('allowance_code')) {
                    $data['inputerror'][] = 'allowance_code';
                    $data['error_string'][] = form_error('allowance_code');
                }
                echo json_encode($data);
                exit;
            } else {
                $paye_id = $this->input->post('paye_id');
                $data['code'] = $this->input->post('paye_code');
                $data['min_val'] = $this->input->post('min');
                $data['max_val'] = $this->input->post('max');
                $data['rate'] = $this->input->post('rate');
                $data['less'] = $this->input->post('less');

                if ($this->payroll_settings_mod->update_paye($data,$paye_id)) {
                    $this->system_log->create_system_log("PAYE Management", "Success", "PAYE Updated ID #".$paye_id);
                    echo json_encode(array("status" => TRUE));
                } else {
                    echo json_encode(array("status" => FALSE));
                }
            }
        }
    }


    public function edit_get_paye_data($id)
    {
        $data = $this->payroll_settings_mod->get_paye_data_by_id($id);
        echo json_encode($data);
    }

    public function delete_paye()
    {
        $paye_id = $this->input->post('paye_id');

        if($this->payroll_settings_mod->delete_paye($paye_id)) {
            $this->system_log->create_system_log("PAYE Management", "Success", "PAYE Record Deleted #".$paye_id);
            echo json_encode(array(
                "status" => TRUE,
                "message" => 'PAYE Record Deleted '.$paye_id
            ));
        } else {
            $this->system_log->create_system_log("PAYE Management", "Failed", "Fail to Delete PAYE Record #".$paye_id);
            echo json_encode(array(
                "status" => FALSE,
                "message" => 'Failed to delete PAYE Record <br>'.$paye_id.'Try again!.'
            ));
        }

    }


    //Salary STAMP Settings

    public function emp_stamp_datatable()
    {
        $this->load->library('datatables');
        $this->datatables->select("id,code,min_val,max_val,rate,less", FALSE);
        $this->datatables->from('hr_pay_m_employee_stamp_types');
        $this->datatables->add_column("Actions","
        <a class='btn btn-default tbl-action' href='javascript:;' title='Edit' onclick='edit_STAMP(" . '$1' . ")'>
                <i class='fa fa-pencil'></i> Edit
            </a><a class='btn btn-default tbl-action' href='javascript:;' title='Delete' onclick='delete_STAMP(" . '$1' . ")'>
                <i class='fa fa-pencil'></i> Remove
            </a>", "id");
        //$this->datatables->unset_column('id');
        echo $this->datatables->generate();
    }


    public function save_stamp($method)
    {
        if ($method == "add_stamp") {
            $this->form_validation->set_rules('stamp_code', 'STAMP Code', 'trim|required|is_unique[hr_pay_m_employee_stamp_types.code]');

            if ($this->form_validation->run() === FALSE) {
                $data = array();
                $data['error_string'] = array();
                $data['inputerror'] = array();
                $data['status'] = FALSE;
                $data['error'] = "validation_error";
                if (form_error('stamp_code')) {
                    $data['inputerror'][] = 'stamp_code';
                    $data['error_string'][] = form_error('stamp_code');
                }
                echo json_encode($data);
                exit;
            } else {

                $data['code'] = $this->input->post('stamp_code');
                $data['min_val'] = $this->input->post('min_st');
                $data['max_val'] = $this->input->post('max_st');
                $data['rate'] = $this->input->post('rate_st');
                $data['less'] = $this->input->post('less_st');

                if ($this->db->insert('hr_pay_m_employee_stamp_types', $data)){
                    $pid = $this->db->insert_id();
                    $this->system_log->create_system_log("STAMP DUTY Management", "Success", "New STAMP DUTY Added ID #".$pid);
                    echo json_encode(array("status" => TRUE));
                } else {
                    echo json_encode(array("status" => FALSE));
                }
            }
        } else if ($method == "edit_stamp"){
            $this->form_validation->set_rules('stamp_code', 'STAMP Code', 'trim|required');
            if ($this->form_validation->run() === FALSE) {
                $data = array();
                $data['error_string'] = array();
                $data['inputerror'] = array();
                $data['status'] = FALSE;
                $data['error'] = "validation_error";
                if (form_error('allowance_code')) {
                    $data['inputerror'][] = 'allowance_code';
                    $data['error_string'][] = form_error('allowance_code');
                }
                echo json_encode($data);
                exit;
            } else {
                $paye_id = $this->input->post('stamp_id');
                $data['code'] = $this->input->post('stamp_code');
                $data['min_val'] = $this->input->post('min_st');
                $data['max_val'] = $this->input->post('max_st');
                $data['rate'] = $this->input->post('rate_st');
                $data['less'] = $this->input->post('less_st');

                if ($this->payroll_settings_mod->update_stamp($data,$paye_id)) {
                    $this->system_log->create_system_log("STAMP DUTY Management", "Success", "STAMP DUTY Updated ID #".$paye_id);
                    echo json_encode(array("status" => TRUE));
                } else {
                    echo json_encode(array("status" => FALSE));
                }
            }
        }
    }

    public function edit_get_stamp_data($id)
    {
        $data = $this->payroll_settings_mod->get_stamp_data_by_id($id);
        echo json_encode($data);
    }



    public function delete_stamp()
    {
        $paye_id = $this->input->post('stamp_id');

        if($this->payroll_settings_mod->delete_stamp($paye_id)) {
            $this->system_log->create_system_log("STAMP DYTY Management", "Success", "STAMP DUTY Record Deleted #".$paye_id);
            echo json_encode(array(
                "status" => TRUE,
                "message" => 'STAMP DUTY Record Deleted '.$paye_id
            ));
        } else {
            $this->system_log->create_system_log("STAMP DUTY Management", "Failed", "Fail to Delete STAMP DUTY Record #".$paye_id);
            echo json_encode(array(
                "status" => FALSE,
                "message" => 'Failed to delete STAMP DUTY Record <br>'.$paye_id.'Try again!.'
            ));
        }
    }

    public function get_emp_cat_details($id)
    {
        $data['lists'] = $this->payroll_settings_mod->get_allowance_list_view(array('hr_pay_m_employee_allow_assigned_cate_emp_details.cat_allow_id'=>$id));

        echo json_encode($data);
    }

}