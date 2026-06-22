<?php

class Employee_list extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();
        $this->load->library('ion_auth');
        if (!$this->ion_auth->logged_in())
        {
            redirect('index.php/auth/login');
        }
        $this->load->model('employee_list_model','employees');
        $this->load->library('datatables');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('permissions');
        $this->load->library('system_log');

        $this->load->model('document_types_mod');
        date_default_timezone_set("Asia/Colombo");
        $this->currentTime = date('Y-m-d H:i:s');
        $this->currentDate = date('Y-m-d');

    }

    public function index()
    {
        $this->permissions->check_permission('access');

        $this->load->helper('url');

        $data['job_title']=$this->employees->getDesignations();
        $data['department']=$this->employees->getDepartments();
        $data['category']=$this->employees->getEmployeeCategory();
        $data['branch']=$this->employees->getBranches();
        $data['employment_status']=$this->employees->getEmploymentStatus();
        $data['supervisor']=$this->employees->getSupervisor();
        $data['employees']=$this->employees->getEmployees();
        $data['emp_doc_types']=$this->employees->GetDocTypes();
        $data['emp_certi_types']=$this->employees->GetCertiTypes();
        $data['emp_skill_types']=$this->employees->GetSkillTypes();
        $data['emp_edu_types']=$this->employees->GetEduTypes();
        $data['emp_exp_types']=$this->employees->GetExpTypes();
        $data['emp_sport_types']=$this->employees->GetSportTypes();
        $data['skill_ex']=$this->employees->GetExperience();
        $data['religions']=$this->employees->getReligions();
        $data['nationalities']=$this->employees->getNationality();

        $data['t_reason']=$this->employees->GetTerminateReason();

        $this->load->view('common/header');

        $groups=array('payroll');
        if ($this->ion_auth->in_group($groups)) {
            $this->load->view('employee_list/index_payroll', $data);
        }else{
            $this->load->view('employee_list/index', $data);
        }
        $this->load->view('common/footer');
    }

    public function terminated_employees()
    {
        $this->load->helper('url');
        $this->load->view('common/header');
        $this->load->view('employee_list/terminated_employees_index');
        $this->load->view('common/footer');
    }

    public function get_all_employees()
    {
        $this->load->library('datatables');

        $this->datatables->select("
            hr_pay_employees.id,
            hr_pay_employees.employee_id,
            hr_pay_employees.title,
            hr_pay_employees.initials,
            hr_pay_employees.first_name,
            hr_pay_employees.middle_name,
            hr_pay_employees.last_name,
            hr_pay_employees.mobile_phone,
            hr_pay_employees.office_phone,
            hr_pay_m_employee_category.desc as cdesc,
            hr_pay_m_departments.desc as ddsec,
            hr_pay_m_jobtitles.desc as jdesc,
            hr_pay_employees.id as emp_id,
            ", FALSE);

        $this->datatables->from('hr_pay_employees');
        $this->datatables->where(array('hr_pay_employees.status'=>'Active'));
        $this->datatables->join('hr_pay_m_employee_category','hr_pay_m_employee_category.id=hr_pay_employees.emp_category','left outer');
        $this->datatables->join('hr_pay_m_departments','hr_pay_m_departments.id=hr_pay_employees.department','left outer');
        $this->datatables->join('hr_pay_m_jobtitles','hr_pay_m_jobtitles.id=hr_pay_employees.job_title','left outer');
        $this->datatables->add_column("Actions",
            "<a class='btn btn-sm btn-default tbl-action' href='javascript:void(0);' title='View' onclick='view_emp(".'$1'.");'>
                <i class='fa fa-list'></i> View
            </a>
            <a class='btn btn-sm btn-default tbl-action' href='javascript:void(0);' title='Edit' onclick='edit_emp(".'$1'.")'>
                <i class='fa fa-edit'></i> Edit
            </a>
            <a class='btn btn-sm btn-default tbl-action' href='javascript:void(0);' title='Resign' onclick='terminate_emp(".'$1'.");'>
                <i class='fa fa-plug'></i>
            </a>", "emp_id");
        $this->datatables->unset_column('emp_id');
        echo $this->datatables->generate();
    }

    public function ajax_list_terminated_employees()
    {
        $this->load->library('datatables');

        $this->datatables->select("
                                hr_pay_employees.id as emp_id,
                                hr_pay_employees.id,
                                hr_pay_employees.employee_id,
                                hr_pay_employees.initials,
                                hr_pay_employees.first_name,
                                hr_pay_employees.middle_name,
                                hr_pay_employees.last_name,
                                hr_pay_m_jobtitles.desc as jdesc,
                                hr_pay_employees.nic_num,
                                hr_pay_employees.mobile_phone,
                                hr_pay_m_terminate_reasons.reason,
                                hr_pay_employees.termination_date,
                                ", FALSE);
        $this->datatables->from('hr_pay_employees');
        $this->datatables->join('hr_pay_m_terminate_reasons','hr_pay_m_terminate_reasons.id=hr_pay_employees.termination_reason');
        $this->datatables->join('hr_pay_m_jobtitles','hr_pay_m_jobtitles.id=hr_pay_employees.job_title','left');
        $this->datatables->where(array('hr_pay_employees.status'=>'Terminated'));
        $this->datatables->group_by("hr_pay_employees.id");

        $this->datatables->add_column("Actions",
            "<a class='btn btn-default' href='javascript:void();' title='Restore' onclick='restore_emp(" . '"$1"' . ")'>
                            <i class='fa fa-plug'></i> Restore
                        </a>", "emp_id");

        $this->datatables->unset_column("emp_id");
        echo $this->datatables->generate();
    }


    public function ajax_get_emp_info($id)
    {

        $data = $this->employees->GetEmpInfo($id);
        $data_job_title = $this->employees->GetJobTitlebyID($data->job_title);
        $data_department = $this->employees->GetDepartmentbyID($data->department);
        $data_employee_category = $this->employees->GetEmployeeCategorybyID($data->emp_category);
        $data_employment_status = $this->employees->GetEmployementStatusbyID($data->emp_status);
        $data_branch = $this->employees->GetBranchbyID($data->branch);
        $data_religion = $this->employees->GetReligionbyID($data->religion);
        $data_nationality = $this->employees->GetNationalitybyID($data->nationality);
        $data_supervisor = $this->employees->get_by_id($data->supervisor);
        $data_leave_cat = $data->leave_category;

        if(!isset($data_job_title)){$data_job_title = ""; }
        if(!isset($data_branch)){$data_branch = ""; }
        if(!isset($data_department)){$data_department = ""; }
        if(!isset($data_employee_category)){$data_employee_category = ""; }
        if(!isset($data_employment_status)){$data_employment_status = ""; }
        if(!isset($data_religion)){$data_religion = ""; }
        if(!isset($data_nationality)){$data_nationality = ""; }
        if(!isset($data_supervisor)){$data_supervisor = ""; }
        if(!isset($data_leave_cat)){$data_leave_cat = ""; }

        //echo json_encode($data);
        echo json_encode(array(
            'emp_info'=>$data,
            'data_job_title'=>$data_job_title,
            'data_department'=>$data_department,
            'data_employee_category'=>$data_employee_category,
            'data_employment_status'=>$data_employment_status,
            'data_branch'=>$data_branch,
            'data_religion'=>$data_religion,
            'data_nationality'=>$data_nationality,
            'data_supervisor'=>$data_supervisor,
            'data_leave_cat'=>$data_leave_cat,
        ));
    }

    private function _make_null($input)
    {
        $var = empty($input) ? NULL : $input;
        return $var;
    }

    public function edit_employee($id)
    {
        $data_marital=array();
        $data = $this->employees->get_by_id($id);
        $data_bank = $this->employees->get_bank_by_id($id);
        $allowance_data = $this->employees->get_allowance_emp_data($id);
        $allowance_main_data = $this->employees->getallAllowances();
        $this->session->set_flashdata('employee_details', $data);

        if($data->marital_info){
            $data_marital=unserialize($data->marital_info);
        }
        else{
            $data_marital='';
        }
        echo json_encode(array('emp_info'=>$data,'bank'=>$data_bank,'marital'=>$data_marital,'allowance_data'=>$allowance_data,'allowance_main_data'=>$allowance_main_data));
    }

    public function get_employee_id(){
        $output=$this->employees->get_last_employee_id();
        echo json_encode($output);
    }

    public function save_employee($method)
    {
        $data_marital=array();

        /* $required_data = $this->get_required_employee_data(true);
         $this->_validate_required($required_data);*/

        if ($method == "add"){
            $this->form_validation->set_rules('emp_no','Employee Number','trim|required|alpha_numeric|is_unique[hr_pay_employees.employee_id]');
            $this->form_validation->set_rules('full_name', 'Full Name', 'required');
            $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
            $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
//            $this->form_validation->set_rules('mobile_phone', 'Mobile Phone', 'trim|required|numeric');
            $this->form_validation->set_rules('permanent_address', 'Permanent Address', 'trim|required');
            $this->form_validation->set_rules('nic_num', 'NIC Number', 'trim|required|alpha_numeric');
            $this->form_validation->set_rules('personal_email', 'Personal Email', 'trim|valid_email');
            $this->form_validation->set_rules('office_email', 'Office Email', 'trim|valid_email');
            $this->form_validation->set_rules('emp_category', 'Employee Category', 'trim|required');
            $this->form_validation->set_rules('department', 'Department', 'trim|required');
            $this->form_validation->set_rules('job_title', 'Job Title', 'trim|required');
            $this->form_validation->set_rules('joined_date', 'Joined Date', 'trim|required');
            $this->form_validation->set_rules('emp_status', 'Employment Status', 'trim|required');
            $this->form_validation->set_rules('leave_category', 'Employment Leave Category', 'trim|required');

            $pcheck = $this->input->post('system_user');
            if ($pcheck == 'systemuser') {
                $this->form_validation->set_rules('password', 'Password', 'required');
                $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'required|matches[password]');
            }

            if($this->form_validation->run()===FALSE)
            {
                $data = array();
                $data['error_string'] = array();
                $data['inputerror'] = array();
                $data['status'] = FALSE;
                $data['error'] = "validation_error";
                if (form_error('emp_no'))
                {
                    $data['inputerror'][] = 'emp_no';
                    $data['error_string'][] = form_error('emp_no');
                }
                if (form_error('full_name'))
                {
                    $data['inputerror'][] = 'full_name';
                    $data['error_string'][] = form_error('full_name');
                }
                if (form_error('first_name'))
                {
                    $data['inputerror'][] = 'first_name';
                    $data['error_string'][] = form_error('first_name');
                }
                if (form_error('last_name'))
                {
                    $data['inputerror'][] = 'last_name';
                    $data['error_string'][] = form_error('last_name');
                }
//                if (form_error('mobile_phone'))
//                {
//                    $data['inputerror'][] = 'mobile_phone';
//                    $data['error_string'][] = form_error('mobile_phone');
//                }
                if (form_error('permanent_address'))
                {
                    $data['inputerror'][] = 'permanent_address';
                    $data['error_string'][] = form_error('permanent_address');
                }
                if (form_error('personal_email'))
                {
                    $data['inputerror'][] = 'personal_email';
                    $data['error_string'][] = form_error('personal_email');
                }
                if (form_error('office_email'))
                {
                    $data['inputerror'][] = 'office_email';
                    $data['error_string'][] = form_error('office_email');
                }
                if (form_error('nic_num'))
                {
                    $data['inputerror'][] = 'nic_num';
                    $data['error_string'][] = form_error('nic_num');
                }
                if (form_error('emp_category'))
                {
                    $data['inputerror'][] = 'emp_category';
                    $data['error_string'][] = form_error('emp_category');
                }
                if (form_error('department'))
                {
                    $data['inputerror'][] = 'department';
                    $data['error_string'][] = form_error('department');
                }
                if (form_error('job_title'))
                {
                    $data['inputerror'][] = 'job_title';
                    $data['error_string'][] = form_error('job_title');
                }
                if (form_error('joined_date'))
                {
                    $data['inputerror'][] = 'joined_date';
                    $data['error_string'][] = form_error('joined_date');
                }
                if (form_error('emp_status'))
                {
                    $data['inputerror'][] = 'emp_status';
                    $data['error_string'][] = form_error('emp_status');
                }
                if (form_error('leave_category'))
                {
                $data['inputerror'][] = 'leave_category';
                $data['error_string'][] = form_error('leave_category');
            }


                //SYS user
                if ($pcheck == 'systemuser') {
                    if (form_error('password')) {
                        $data['inputerror'][] = 'password';
                        $data['error_string'][] = form_error('password');
                    }
                    if (form_error('confirm_password')) {
                        $data['inputerror'][] = 'confirm_password';
                        $data['error_string'][] = form_error('confirm_password');
                    }
                }
                echo json_encode($data);
                exit;
            }
        }
        else {
            $this->form_validation->set_rules('emp_no', 'Employee Number', 'trim|required|alpha_numeric');
            $this->form_validation->set_rules('full_name', 'Full Name', 'trim|required');
            $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
            $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
//            $this->form_validation->set_rules('mobile_phone', 'Mobile Phone', 'trim|required|numeric');
            $this->form_validation->set_rules('nic_num', 'NIC Number', 'trim|required|alpha_numeric');
            $this->form_validation->set_rules('personal_email', 'Personal Email', 'trim|valid_email');
            $this->form_validation->set_rules('office_email', 'Office Email', 'trim|valid_email');
            $this->form_validation->set_rules('emp_category', 'Employee Category', 'trim|required');
            $this->form_validation->set_rules('department', 'Department', 'trim|required');
            $this->form_validation->set_rules('job_title', 'Job Title', 'trim|required');
            $this->form_validation->set_rules('joined_date', 'Joined Date', 'trim|required');
            $this->form_validation->set_rules('emp_status', 'Employment Status', 'trim|required');
            $this->form_validation->set_rules('leave_category', 'Employment Leave Category', 'trim|required');
            if($this->form_validation->run()===FALSE)
            {
                $data = array();
                $data['error_string'] = array();
                $data['inputerror'] = array();
                $data['status'] = FALSE;
                $data['error'] = "validation_error";
                if (form_error('emp_no'))
                {
                    $data['inputerror'][] = 'emp_no';
                    $data['error_string'][] = form_error('emp_no');
                }
                if (form_error('full_name'))
                {
                    $data['inputerror'][] = 'full_name';
                    $data['error_string'][] = form_error('full_name');
                }
                if (form_error('first_name'))
                {
                    $data['inputerror'][] = 'first_name';
                    $data['error_string'][] = form_error('first_name');
                }
                if (form_error('last_name'))
                {
                    $data['inputerror'][] = 'last_name';
                    $data['error_string'][] = form_error('last_name');
                }
//                if (form_error('mobile_phone'))
//                {
//                    $data['inputerror'][] = 'mobile_phone';
//                    $data['error_string'][] = form_error('mobile_phone');
//                }
                if (form_error('permanent_address'))
                {
                    $data['inputerror'][] = 'permanent_address';
                    $data['error_string'][] = form_error('permanent_address');
                }
                if (form_error('personal_email'))
                {
                    $data['inputerror'][] = 'personal_email';
                    $data['error_string'][] = form_error('personal_email');
                }
                if (form_error('office_email'))
                {
                    $data['inputerror'][] = 'office_email';
                    $data['error_string'][] = form_error('office_email');
                }
                if (form_error('nic_num'))
                {
                    $data['inputerror'][] = 'nic_num';
                    $data['error_string'][] = form_error('nic_num');
                }
                if (form_error('emp_category'))
                {
                    $data['inputerror'][] = 'emp_category';
                    $data['error_string'][] = form_error('emp_category');
                }
                if (form_error('department'))
                {
                    $data['inputerror'][] = 'department';
                    $data['error_string'][] = form_error('department');
                }
                if (form_error('job_title'))
                {
                    $data['inputerror'][] = 'job_title';
                    $data['error_string'][] = form_error('job_title');
                }
                if (form_error('joined_date'))
                {
                    $data['inputerror'][] = 'joined_date';
                    $data['error_string'][] = form_error('joined_date');
                }
                if (form_error('emp_status'))
                {
                    $data['inputerror'][] = 'emp_status';
                    $data['error_string'][] = form_error('emp_status');
                }
                if (form_error('leave_category'))
                {
                    $data['inputerror'][] = 'leave_category';
                    $data['error_string'][] = form_error('leave_category');
                }
                echo json_encode($data);
                exit;
            }
        }

        if($method == "add"){

            $password_check = $this->input->post('system_user');
            $data['employee_id'] = $this->input->post('emp_no');
            $data['epf_no'] = $this->input->post('epf_no');
            $data['title'] = $this->input->post('title');
            $data['initials'] = $this->input->post('initials');
            $data['full_name'] = $this->input->post('full_name');
            $data['first_name'] = $this->input->post('first_name');
            $data['middle_name'] = $this->input->post('middle_name');
            $data['last_name'] = $this->input->post('last_name');
            $data['gender'] = $this->input->post('gender');
            $data['nic_num'] = $this->input->post('nic_num');
            $data['driving_license'] = $this->input->post('driving_license');
            $data['other_id'] = $this->input->post('other_id');
            $data['birthday'] = $this->input->post('birthday');
            $data['marital_status'] = $this->input->post('marital_status');
            $data['blood_group'] = $this->input->post('blood_group');
            $data['religion'] = $this->input->post('religion');
            $data['nationality'] = $this->input->post('nationality');
            $data['permanent_address'] = $this->input->post('permanent_address');
            $data['postal_address'] = $this->input->post('postal_address');
            $data['mobile_phone'] = $this->input->post('mobile_phone');
            $data['mobile_phone_2'] = $this->input->post('mobile_phone_2');
            $data['home_phone'] = $this->input->post('home_phone');
            $data['office_phone'] = $this->input->post('office_phone');
            $data['personal_email'] = $this->input->post('personal_email');
            $data['office_email'] = $this->input->post('office_email');
            $data['emp_category'] = $this->input->post('emp_category');
            $data['department'] = $this->input->post('department');
            $data['job_title'] = $this->input->post('job_title');
            $data['branch'] = $this->input->post('branch');
            $data['emp_status'] = $this->input->post('emp_status');
            $data['supervisor'] = $this->input->post('supervisor');
            $data['joined_date'] = $this->input->post('joined_date');
            $data['confirmed_date'] = $this->input->post('confirmed_date');
            $data['basic_salary'] = $this->input->post('basic_salary');
            $data['leave_category'] = $this->input->post('leave_category');
            $data['salary_advance_state'] = $this->input->post('salary_advance_state');
            $data['festival_bonus'] = $this->input->post('festival_bonus');

            $data['epf_eligibility'] = $this->input->post('epf_eligibility');
            $data['etf_eligibility'] = $this->input->post('etf_eligibility');
            $data['b_card_eligibility'] = $this->input->post('b_card_eligibility');
            $data['payee'] = $this->input->post('payee');
            $data['payee_releif'] = $this->input->post('payee_releif');
            $data['coin_balance'] = $this->input->post('coin_balance');
            $data['anniversary_bonus'] = $this->input->post('anniversary_bonus');
            $data['salary_hold'] = $this->input->post('salary_hold');
            $data['payroll_cat'] = $this->input->post('payroll_cat');
            $data['service_year'] = $this->input->post('service_year');
            $data['pay_slip_state'] = $this->input->post('pay_slip_state');
            $data['increment_state'] = $this->input->post('increment_state');
            $data['anni_bonus'] = $this->input->post('anni_bonus_state');
            $data['anni_gift_state'] = $this->input->post('anni_gift_state');
            $data['festival_bonus_state'] = $this->input->post('festival_bonus_state');

            $data['gratuity_rep_state'] = $this->input->post('gratuity_rep_state');
            $data['incometax'] = $this->input->post('incometax');
            $data['gross_up'] = $this->input->post('gross_up');
            $data['date_tax'] = $this->input->post('date_tax');

            if ($this->input->post('marital_status') == 'Married') {
                $data_marital['spouse_name'] = $this->_make_null($this->input->post('spouse_name'));
                $data_marital['spouse_birthday'] = $this->_make_null($this->input->post('spouse_birthday'));
                $data_marital['spouse_nic'] = $this->_make_null($this->input->post('spouse_nic'));
                $data_marital['child_name1'] = $this->_make_null($this->input->post('child_name1'));
                $data_marital['child_birthday1'] = $this->_make_null($this->input->post('child_birthday1'));
                $data_marital['child_nic1'] = $this->_make_null($this->input->post('child_nic1'));
                $data_marital['child_name2'] = $this->_make_null($this->input->post('child_name2'));
                $data_marital['child_birthday2'] = $this->_make_null($this->input->post('child_birthday2'));
                $data_marital['child_nic2'] = $this->_make_null($this->input->post('child_nic2'));
            } else if ($this->input->post('marital_status') == 'Single') {
                $data_marital['parent_name1'] = $this->_make_null($this->input->post('parent_name1'));
                $data_marital['parent_birthday1'] = $this->_make_null($this->input->post('parent_birthday1'));
                $data_marital['parent_nic1'] = $this->_make_null($this->input->post('parent_nic1'));
                $data_marital['parent_name2'] = $this->_make_null($this->input->post('parent_name2'));
                $data_marital['parent_birthday2'] = $this->_make_null($this->input->post('parent_birthday2'));
                $data_marital['parent_nic2'] = $this->_make_null($this->input->post('parent_nic2'));
            }
            $data['marital_info'] = serialize($data_marital);

            if ($this->input->post('system_user') == 'systemuser') {
                $data['system_user'] = 1;
            }
            $data['_created_'] = date('Y-m-d h:i:s');
            $username = $this->input->post('emp_no');
            $password = $this->input->post('password');
            $email = $this->input->post('office_email');

            if ($this->db->insert('hr_pay_employees',$data)) {
                $emp_id = $this->db->insert_id();

//
//                $job_history= array(
//
//                    'employee'=>$emp_id,
//                    'epf_no'=>$this->input->post('epf_no'),
//                    'emp_category'=>$this->input->post('emp_category'),
//                    'department'=>$this->input->post('department'),
//                    'job_title'=>$this->input->post('job_title'),
//                    'branch'=>$this->input->post('branch'),
//                    'date'=>date('Y-m-d'),
//                );
//
//
//                $this->db->insert('hr_pay_employees_job_history',$job_history);
                if($this->input->post('epf_no')!=''){
                    $type[]='Epf No';
                    $value[]=$this->input->post('epf_no');
                }
                if($this->input->post('title')!=''){
                    $type[]='Title';
                    $value[]=$this->input->post('title');
                }
                if($this->input->post('nic_num')!=''){
                    $type[]='NIC';
                    $value[]=$this->input->post('nic_num');
                }
                if($this->input->post('marital_status')!=''){
                    $type[]='Marital Status';
                    $value[]=$this->input->post('marital_status');
                }
                if($this->input->post('postal_address')!=''){
                    $type[]='Postal Address';
                    $value[]=$this->input->post('postal_address');
                }
                if($this->input->post('emp_category')!=''){
                    $type[]='Emp Category';
                    $value[]=$this->input->post('emp_category');
                }
                if($this->input->post('department')!=''){
                    $type[]='Department';
                    $value[]=$this->input->post('department');
                }
                if($this->input->post('job_title')!=''){
                    $type[]='Job Title';
                    $value[]=$this->input->post('job_title');
                }
                if($this->input->post('branch')!=''){
                    $type[]='Branch';
                    $value[]=$this->input->post('branch');
                }
                if($this->input->post('emp_status')!=''){
                    $type[]='Emp Status';
                    $value[]=$this->input->post('emp_status');
                }
                if($this->input->post('basic_salary')!=''){
                    $type[]='Basic Salary';
                    $value[]=$this->input->post('basic_salary');
                }
                if($this->input->post('account_no_1')!=''){
                    $type[]='Account No';
                    $value[]=$this->input->post('account_no_1');
                }
                if($this->input->post('account_bn_1')!=''){
                    $type[]='Bank Name';
                    $value[]=$this->input->post('account_bn_1');
                }
                if($this->input->post('account_br_1')!=''){
                    $type[]='Bank Name';
                    $value[]=$this->input->post('account_br_1');
                }

                for($i=0;$i<sizeof($type);$i++){

                    $history=array(
                        'employee'=>$emp_id,
                        'type_name'=>$type[$i],
                        'value'=>$value[$i],
                        'user'=>USER_NAME,
                        'date'=>date('Y-m-d H:i:s'),

                    );


                    $this->db->insert('hr_pay_employees_job_history',$history);


                }

                $group = array('3');
                $employee_details = array(
                    'name' => ucfirst($this->input->post('last_name')),
                    'first_name' => ucfirst($this->input->post('first_name')),
                    'id' => $emp_id,
                );
                $account_no_1 = $this->input->post('account_no_1');
                $account_bn_1 = $this->input->post('account_bn_1');
                $account_br_1 = $this->input->post('account_br_1');

                $data_acc_1 = array(
                    'emp_id' => $emp_id,
                    'account_no' => $account_no_1,
                    'bank_name' => $account_bn_1,
                    'branch_name' => $account_br_1,
                    'type' => 1,
                );

                $this->employees->save_bank_info($data_acc_1);


                //Save Salry Record for Basic
                $basic_sal_data = array(
                    'employee_id' => $emp_id,
                    'type' => "Basic",
                    'type_id' => 0,
                    'amount' => $this->input->post('basic_salary'),
                    'date' => date('Y-m-d'),
                );
                $this->employees->add_salary_record($basic_sal_data);


                $details = $this->input->post();
                if (isset($details['allowance'])) {
                    foreach ($details['allowance'] as $key => $value) {
                        if (!empty($details['allowance'][$key])) {
                            $allow_id = $details['allowance'][$key];
                            $insert_allowance_data = array(
                                'employee_id' => $emp_id,
                                'allowance_id' => $details['allowance'][$key],
                                'amount' => $details['amount'][$key],
                                'status' => $details['a_status'][$key]
                            );
                            $this->db->insert('hr_pay_employees_allowances', $insert_allowance_data);
                            unset($insert_allowance_data);

                            //Save Salry Record for Other
                            $all_sal_data = array(
                                'employee_id' => $emp_id,
                                'type' => "Other",
                                'type_id' => $allow_id,
                                'amount' => $details['amount'][$key],
                                'date' => date('Y-m-d'),
                            );
                            $this->employees->add_salary_record($all_sal_data);

                        }
                    }
                }

                if ($password_check == 'systemuser') {
                    $user_id = $this->ion_auth->register($username, $password, $email, $employee_details, $group);
                    $this->system_log->create_system_log("System Users", "Success", "New System User #".$user_id." added for Employee ID #".$emp_id." from New Employee");
                }

                $message = 'Add New Employee - # : ' . $emp_id;
                $this->system_log->create_system_log("Employees", "Success", "New Employee Added ID #".$emp_id);
            }
        }
        else if ($method == "update"){

            $emp_id = $this->input->post('emp_id');
            $data['employee_id'] = $this->input->post('emp_no');
            $data['epf_no'] = $this->input->post('epf_no');
            $data['title'] = $this->input->post('title');
            $data['initials'] = $this->input->post('initials');
            $data['full_name'] = $this->input->post('full_name');
            $data['first_name'] = $this->input->post('first_name');
            $data['middle_name'] = $this->input->post('middle_name');
            $data['last_name'] = $this->input->post('last_name');
            $data['gender'] = $this->input->post('gender');
            $data['nic_num'] = $this->input->post('nic_num');
            $data['driving_license'] = $this->input->post('driving_license');
            $data['other_id'] = $this->input->post('other_id');
            $data['birthday'] = $this->input->post('birthday');
            $data['marital_status'] = $this->input->post('marital_status');
            $data['blood_group'] = $this->input->post('blood_group');
            $data['religion'] = $this->input->post('religion');
            $data['nationality'] = $this->input->post('nationality');
            $data['permanent_address'] = $this->input->post('permanent_address');
            $data['postal_address'] = $this->input->post('postal_address');
            $data['mobile_phone'] = $this->input->post('mobile_phone');
            $data['mobile_phone_2'] = $this->input->post('mobile_phone_2');
            $data['home_phone'] = $this->input->post('home_phone');
            $data['office_phone'] = $this->input->post('office_phone');
            $data['personal_email'] = $this->input->post('personal_email');
            $data['office_email'] = $this->input->post('office_email');
            $data['emp_category'] = $this->input->post('emp_category');
            $data['department'] = $this->input->post('department');
            $data['job_title'] = $this->input->post('job_title');
            $data['branch'] = $this->input->post('branch');
            $data['emp_status'] = $this->input->post('emp_status');
            $data['supervisor'] = $this->input->post('supervisor');
            $data['joined_date'] = $this->input->post('joined_date');
            $data['confirmed_date'] = $this->input->post('confirmed_date');
            $data['basic_salary'] = $this->input->post('basic_salary');
            $data['leave_category'] = $this->input->post('leave_category');

            $data['salary_advance_state'] = $this->input->post('salary_advance_state');
            $data['festival_bonus'] = $this->input->post('festival_bonus');

            $data['epf_eligibility'] = $this->input->post('epf_eligibility');
            $data['etf_eligibility'] = $this->input->post('etf_eligibility');
            $data['b_card_eligibility'] = $this->input->post('b_card_eligibility');
            $data['payee'] = $this->input->post('payee');
            $data['payee_releif'] = $this->input->post('payee_releif');
            $data['coin_balance'] = $this->input->post('coin_balance');
            $data['anniversary_bonus'] = $this->input->post('anniversary_bonus');
            $data['salary_hold'] = $this->input->post('salary_hold');
            $data['payroll_cat'] = $this->input->post('payroll_cat');
            $data['service_year'] = $this->input->post('service_year');
            $data['pay_slip_state'] = $this->input->post('pay_slip_state');
            $data['increment_state'] = $this->input->post('increment_state');
            $data['anni_bonus_state'] = $this->input->post('anni_bonus_state');
            $data['anni_gift_state'] = $this->input->post('anni_gift_state');
            $data['festival_bonus_state'] = $this->input->post('festival_bonus_state');

            $data['gratuity_rep_state'] = $this->input->post('gratuity_rep_state');
            $data['incometax'] = $this->input->post('incometax');
            $data['gross_up'] = $this->input->post('gross_up');
            $data['date_tax'] = $this->input->post('date_tax');

            $groups=array('admin','payroll'); if ($this->ion_auth->in_group($groups)) {
                $data['basic_salary'] = $this->input->post('basic_salary');
            }

            if ($this->input->post('marital_status') == 'Married') {
                $data_marital['spouse_name'] = $this->_make_null($this->input->post('spouse_name'));
                $data_marital['spouse_birthday'] = $this->_make_null($this->input->post('spouse_birthday'));
                $data_marital['spouse_nic'] = $this->_make_null($this->input->post('spouse_nic'));
                $data_marital['child_name1'] = $this->_make_null($this->input->post('child_name1'));
                $data_marital['child_birthday1'] = $this->_make_null($this->input->post('child_birthday1'));
                $data_marital['child_nic1'] = $this->_make_null($this->input->post('child_nic1'));
                $data_marital['child_name2'] = $this->_make_null($this->input->post('child_name2'));
                $data_marital['child_birthday2'] = $this->_make_null($this->input->post('child_birthday2'));
                $data_marital['child_nic2'] = $this->_make_null($this->input->post('child_nic2'));
            } else if ($this->input->post('marital_status') == 'Single') {
                $data_marital['parent_name1'] = $this->_make_null($this->input->post('parent_name1'));
                $data_marital['parent_birthday1'] = $this->_make_null($this->input->post('parent_birthday1'));
                $data_marital['parent_nic1'] = $this->_make_null($this->input->post('parent_nic1'));
                $data_marital['parent_name2'] = $this->_make_null($this->input->post('parent_name2'));
                $data_marital['parent_birthday2'] = $this->_make_null($this->input->post('parent_birthday2'));
                $data_marital['parent_nic2'] = $this->_make_null($this->input->post('parent_nic2'));
            }
            $data['marital_info'] = serialize($data_marital);
            $data['_updated_'] = date('Y-m-d h:i:s');
            $last_job_info = $this->employees->check_last_job($emp_id);

            if ($this->employees->update_employee($data,$emp_id)) {

                $this->employees->update_system_user_details($this->input->post('first_name'), $this->input->post('last_name'), $emp_id);

//                if($last_job_info[0]->job_title!=$this->input->post('job_title') || $last_job_info[0]->emp_category!=$this->input->post('emp_category') ||
//                    $last_job_info[0]->department!=$this->input->post('department') ||$last_job_info[0]->branch!=$this->input->post('branch')){
//
//                    $job_history= array(
//
//                        'employee'=>$emp_id,
//                        'epf_no'=>$this->input->post('epf_no'),
//                        'emp_category'=>$this->input->post('emp_category'),
//                        'department'=>$this->input->post('department'),
//                        'job_title'=>$this->input->post('job_title'),
//                        'branch'=>$this->input->post('branch'),
//                        'date'=>date('Y-m-d'),
//                    );
//
//                    $this->db->insert('hr_pay_employees_job_history',$job_history);
//
//
//                }

                if ($last_job_info[0]->job_title != $this->input->post('job_title')) {
                    $value[] = $this->input->post('job_title');
                    $type_name[] = 'Job Title';

                }
                if ($last_job_info[0]->emp_category != $this->input->post('emp_category')) {
                    $value[] = $this->input->post('emp_category');
                    $type_name[] = 'Emp Category';

                }
                if ($last_job_info[0]->department != $this->input->post('department')) {
                    $value[] = $this->input->post('department');
                    $type_name[] = 'Department';

                }
                if ($last_job_info[0]->branch != $this->input->post('branch')) {
                    $value[] = $this->input->post('branch');
                    $type_name[] = 'Branch';

                }
                if ($last_job_info[0]->epf_no != $this->input->post('epf_no')) {
                    $value[] = $this->input->post('epf_no');
                    $type_name[] = 'Epf No';

                }
                if ($last_job_info[0]->basic_salary != $this->input->post('basic_salary')) {
                    $value[] = $this->input->post('basic_salary');
                    $type_name[] = 'Basic Salary';

                }
                if ($last_job_info[0]->title != $this->input->post('title')) {
                    $value[] = $this->input->post('title');
                    $type_name[] = 'Title';

                }
                if ($last_job_info[0]->account_no != $this->input->post('account_no_1')) {
                    $value[] = $this->input->post('account_no_1');
                    $type_name[] = 'Account No';

                }
                if ($last_job_info[0]->bank_name != $this->input->post('account_bn_1')) {
                    $value[] = $this->input->post('account_bn_1');
                    $type_name[] = 'Bank Name';

                }
                if ($last_job_info[0]->branch_name != $this->input->post('account_br_1')) {
                    $value[] = $this->input->post('account_br_1');
                    $type_name[] = 'Branch Name';

                }
                if ($last_job_info[0]->nic_num != $this->input->post('nic_num')) {
                    $value[] = $this->input->post('nic_num');
                    $type_name[] = 'NIC';

                }
                if ($last_job_info[0]->emp_status != $this->input->post('emp_status')) {
                    $value[] = $this->input->post('emp_status');
                    $type_name[] = 'Emp Status';

                }
                if ($last_job_info[0]->marital_status != $this->input->post('marital_status')) {
                    $value[] = $this->input->post('marital_status');
                    $type_name[] = 'Marital Status';

                }
                if ($last_job_info[0]->postal_address != $this->input->post('postal_address')) {
                    $value[] = $this->input->post('postal_address');
                    $type_name[] = 'Postal Address';

                }

                for ($i = 0; $i < sizeof($type_name); $i++) {
                    $job_history = array(

                        'employee' => $emp_id,
                        'type_name' => $type_name[$i],
                        'value' => $value[$i],
                        'user' => USER_NAME,
                        'date' => date('Y-m-d H:i:s'),
                    );

                    $this->db->insert('hr_pay_employees_job_history', $job_history);
                }

                $account_no_1 = $this->input->post('account_no_1');
                $account_bn_1 = $this->input->post('account_bn_1');
                $account_br_1 = $this->input->post('account_br_1');
                if (count($this->employees->get_bank_available(array('type' => 1, 'emp_id' => $emp_id))) > 0) {
                    $data_acc_1 = array(

                        'account_no' => $account_no_1,
                        'bank_name' => $account_bn_1,
                        'branch_name' => $account_br_1,
                    );
                    $this->employees->update_bank_info($data_acc_1, array('type' => 1, 'emp_id' => $emp_id));
                } else {
                    $data_acc_1 = array(
                        'account_no' => $account_no_1,
                        'bank_name' => $account_bn_1,
                        'branch_name' => $account_br_1,
                        'type' => 1,
                        'emp_id' => $emp_id,
                    );
                    $this->employees->save_bank_info($data_acc_1);
                }

                $date = date('Y-m-d');
                $qz = $this->db->query("SELECT * FROM  hr_pay_employees_salary_history WHERE type='Basic' AND employee_id = '$emp_id' AND date = '$date' ");
                $exsist_sal_data = $qz->row();
                if ($exsist_sal_data->amount != $this->input->post('basic_salary')) {
                    //Save Salry Record for Basic
                    $basic_sal_data = array(
                        'employee_id' => $emp_id,
                        'type' => "Basic",
                        'type_id' => 0,
                        'amount' => $this->input->post('basic_salary'),
                        'date' => date('Y-m-d'),
                    );
                    $this->employees->add_salary_record($basic_sal_data);
                }

                $details = $this->input->post();
                $groups=array('admin','payroll'); if ($this->ion_auth->in_group($groups)) {
                if (isset($details['allowance'])) {
                    foreach ($details['allowance'] as $key => $value) {
                        if (!empty($details['allowance'][$key])) {
                            $allow_id = $details['allowance'][$key];
                            $q1 = $this->db->query("SELECT * FROM  hr_pay_employees_allowances WHERE allowance_id='$allow_id' AND employee_id = '$emp_id' ");
                            $exsist_allow_data = $q1->row();

//                            if ($q1->num_rows() > 0) {
                            if (isset($details['allow_hide'][$key])) {
                                $update_allowance_data = array(
                                    'allowance_id' => $details['allowance'][$key],
                                    'amount' => $details['amount'][$key],
                                    'status' => $details['a_status'][$key]
                                );
//                                $this->employees->update_emp_allow($emp_id,$allow_id,$update_allowance_data);
                                $this->employees->update_emp_allow($emp_id, $details['allow_hide'][$key], $update_allowance_data);
                                unset($update_allowance_data);

                                if ($exsist_allow_data->amount != $details['amount'][$key] && $exsist_allow_data->allowance_id == $allow_id) {
                                    //Save Salry Record for Other
                                    $all_sal_data = array(
                                        'employee_id' => $emp_id,
                                        'type' => "Other",
                                        'type_id' => $allow_id,
                                        'amount' => $details['amount'][$key],
                                        'date' => date('Y-m-d'),
                                    );
                                    $this->employees->add_salary_record($all_sal_data);
                                }
                            } else {
                                $insert_allowance_data = array(
                                    'employee_id' => $emp_id,
                                    'allowance_id' => $details['allowance'][$key],
                                    'amount' => $details['amount'][$key]
                                );
                                $this->db->insert('hr_pay_employees_allowances', $insert_allowance_data);
                                unset($insert_allowance_data);
                                //Save Salry Record for Other
                                $all_sal_data = array(
                                    'employee_id' => $emp_id,
                                    'type' => "Other",
                                    'type_id' => $allow_id,
                                    'amount' => $details['amount'][$key],
                                    'date' => date('Y-m-d'),
                                );
                                $this->employees->add_salary_record($all_sal_data);
                            }
                        }
                    }
                }

            }

                $message = 'Updated Employee - # : ' . $emp_id;
                $this->system_log->create_system_log("Employees", "Success", "Employee Updated ID #".$emp_id);
            }
        }

        if (!empty($emp_id) && $emp_id > 0) {
            echo json_encode(array(
                'status' => true,
                'message' => $message,
                'emp_id' => $emp_id
            ));
            exit;
        } else {
            echo json_encode(array(
                'status' => false,
                'message' => 'Unable to save! Try again.',
            ));
            exit;
        }
    }

    public function save_employee_payroll()
    {
        $data_marital=array();

            $emp_id = $this->input->post('emp_id');
            $data['employee_id'] = $this->input->post('emp_no');
            $data['epf_no'] = $this->input->post('epf_no');
            $data['title'] = $this->input->post('title');
            $data['initials'] = $this->input->post('initials');
            $data['full_name'] = $this->input->post('full_name');
            $data['first_name'] = $this->input->post('first_name');
            $data['middle_name'] = $this->input->post('middle_name');
            $data['last_name'] = $this->input->post('last_name');
            $data['gender'] = $this->input->post('gender');
            $data['nic_num'] = $this->input->post('nic_num');
            $data['driving_license'] = $this->input->post('driving_license');
            $data['other_id'] = $this->input->post('other_id');
            $data['birthday'] = $this->input->post('birthday');
            $data['marital_status'] = $this->input->post('marital_status');
            $data['blood_group'] = $this->input->post('blood_group');
            $data['religion'] = $this->input->post('religion');
            $data['nationality'] = $this->input->post('nationality');
            $data['permanent_address'] = $this->input->post('permanent_address');
            $data['postal_address'] = $this->input->post('postal_address');
            $data['mobile_phone'] = $this->input->post('mobile_phone');
            $data['mobile_phone_2'] = $this->input->post('mobile_phone_2');
            $data['home_phone'] = $this->input->post('home_phone');
            $data['office_phone'] = $this->input->post('office_phone');
            $data['personal_email'] = $this->input->post('personal_email');
            $data['office_email'] = $this->input->post('office_email');
            $data['emp_category'] = $this->input->post('emp_category');
            $data['department'] = $this->input->post('department');
            $data['job_title'] = $this->input->post('job_title');
            $data['branch'] = $this->input->post('branch');
            $data['emp_status'] = $this->input->post('emp_status');
            $data['supervisor'] = $this->input->post('supervisor');
            $data['joined_date'] = $this->input->post('joined_date');
            $data['confirmed_date'] = $this->input->post('confirmed_date');
            $data['basic_salary'] = $this->input->post('basic_salary');
            $data['leave_category'] = $this->input->post('leave_category');
            $data['salary_advance_state'] = $this->input->post('salary_advance_state');
            $data['advance_amount'] = $this->input->post('advance_amount');
            $data['festival_bonus'] = $this->input->post('festival_bonus');
            $data['other_deduction'] = $this->input->post('other_deduction');
            $data['epf_eligibility'] = $this->input->post('epf_eligibility');
            $data['etf_eligibility'] = $this->input->post('etf_eligibility');
            $data['b_card_eligibility'] = $this->input->post('b_card_eligibility');
            $data['payee'] = $this->input->post('payee');
            $data['payee_releif'] = $this->input->post('payee_releif');
            $data['coin_balance'] = $this->input->post('coin_balance');
            $data['anniversary_bonus'] = $this->input->post('anniversary_bonus');
            $data['salary_hold'] = $this->input->post('salary_hold');
            $data['payroll_cat'] = $this->input->post('payroll_cat');
            $data['service_year'] = $this->input->post('service_year');
            $data['pay_slip_state'] = $this->input->post('pay_slip_state');
            $data['increment_state'] = $this->input->post('increment_state');
            $data['anni_bonus_state'] = $this->input->post('anni_bonus_state');
            $data['anni_gift_state'] = $this->input->post('anni_gift_state');
            $data['festival_bonus_state'] = $this->input->post('festival_bonus_state');

            $data['gratuity_rep_state'] = $this->input->post('gratuity_rep_state');
            $data['incometax'] = $this->input->post('incometax');
            $data['gross_up'] = $this->input->post('gross_up');

            $groups=array('admin','payroll'); if ($this->ion_auth->in_group($groups)) {
                $data['basic_salary'] = $this->input->post('basic_salary');
            }

            if ($this->input->post('marital_status') == 'Married') {
                $data_marital['spouse_name'] = $this->_make_null($this->input->post('spouse_name'));
                $data_marital['spouse_birthday'] = $this->_make_null($this->input->post('spouse_birthday'));
                $data_marital['spouse_nic'] = $this->_make_null($this->input->post('spouse_nic'));
                $data_marital['child_name1'] = $this->_make_null($this->input->post('child_name1'));
                $data_marital['child_birthday1'] = $this->_make_null($this->input->post('child_birthday1'));
                $data_marital['child_nic1'] = $this->_make_null($this->input->post('child_nic1'));
                $data_marital['child_name2'] = $this->_make_null($this->input->post('child_name2'));
                $data_marital['child_birthday2'] = $this->_make_null($this->input->post('child_birthday2'));
                $data_marital['child_nic2'] = $this->_make_null($this->input->post('child_nic2'));
            } else if ($this->input->post('marital_status') == 'Single') {
                $data_marital['parent_name1'] = $this->_make_null($this->input->post('parent_name1'));
                $data_marital['parent_birthday1'] = $this->_make_null($this->input->post('parent_birthday1'));
                $data_marital['parent_nic1'] = $this->_make_null($this->input->post('parent_nic1'));
                $data_marital['parent_name2'] = $this->_make_null($this->input->post('parent_name2'));
                $data_marital['parent_birthday2'] = $this->_make_null($this->input->post('parent_birthday2'));
                $data_marital['parent_nic2'] = $this->_make_null($this->input->post('parent_nic2'));
            }
            $data['marital_info'] = serialize($data_marital);
            $data['_updated_'] = date('Y-m-d h:i:s');
            $last_job_info = $this->employees->check_last_job($emp_id);
            if ($this->employees->update_employee($data,$emp_id)) {

                $this->employees->update_system_user_details($this->input->post('first_name'), $this->input->post('last_name'), $emp_id);

                if($last_job_info[0]->job_title!=$this->input->post('job_title') || $last_job_info[0]->emp_category!=$this->input->post('emp_category') ||
                    $last_job_info[0]->department!=$this->input->post('department') ||$last_job_info[0]->branch!=$this->input->post('branch')){

                    $job_history= array(
                        'employee'=>$emp_id,
                        'epf_no'=>$this->input->post('epf_no'),
                        'emp_category'=>$this->input->post('emp_category'),
                        'department'=>$this->input->post('department'),
                        'job_title'=>$this->input->post('job_title'),
                        'branch'=>$this->input->post('branch'),
                        'date'=>date('Y-m-d'),
                    );
                    $this->db->insert('hr_pay_employees_job_history',$job_history);

                }

                if ($last_job_info[0]->job_title != $this->input->post('job_title')) {
                    $value[] = $this->input->post('job_title');
                    $type_name[] = 'Job Title';

                }
                if ($last_job_info[0]->emp_category != $this->input->post('emp_category')) {
                    $value[] = $this->input->post('emp_category');
                    $type_name[] = 'Emp Category';

                }
                if ($last_job_info[0]->department != $this->input->post('department')) {
                    $value[] = $this->input->post('department');
                    $type_name[] = 'Department';

                }
                if ($last_job_info[0]->branch != $this->input->post('branch')) {
                    $value[] = $this->input->post('branch');
                    $type_name[] = 'Branch';

                }
                if ($last_job_info[0]->epf_no != $this->input->post('epf_no')) {
                    $value[] = $this->input->post('epf_no');
                    $type_name[] = 'Epf No';

                }
                if ($last_job_info[0]->basic_salary != $this->input->post('basic_salary')) {
                    $value[] = $this->input->post('basic_salary');
                    $type_name[] = 'Basic Salary';

                }
                if ($last_job_info[0]->title != $this->input->post('title')) {
                    $value[] = $this->input->post('title');
                    $type_name[] = 'Title';

                }
                if ($last_job_info[0]->account_no != $this->input->post('account_no_1')) {
                    $value[] = $this->input->post('account_no_1');
                    $type_name[] = 'Account No';

                }
                if ($last_job_info[0]->bank_name != $this->input->post('account_bn_1')) {
                    $value[] = $this->input->post('account_bn_1');
                    $type_name[] = 'Bank Name';

                }
                if ($last_job_info[0]->branch_name != $this->input->post('account_br_1')) {
                    $value[] = $this->input->post('account_br_1');
                    $type_name[] = 'Branch Name';

                }
                if ($last_job_info[0]->nic_num != $this->input->post('nic_num')) {
                    $value[] = $this->input->post('nic_num');
                    $type_name[] = 'NIC';

                }
                if ($last_job_info[0]->emp_status != $this->input->post('emp_status')) {
                    $value[] = $this->input->post('emp_status');
                    $type_name[] = 'Emp Status';

                }
                if ($last_job_info[0]->marital_status != $this->input->post('marital_status')) {
                    $value[] = $this->input->post('marital_status');
                    $type_name[] = 'Marital Status';

                }
                if ($last_job_info[0]->postal_address != $this->input->post('postal_address')) {
                    $value[] = $this->input->post('postal_address');
                    $type_name[] = 'Postal Address';

                }

                for ($i = 0; $i < sizeof($type_name); $i++) {
                    $job_history = array(

                        'employee' => $emp_id,
                        'type_name' => $type_name[$i],
                        'value' => $value[$i],
                        'user' => USER_NAME,
                        'date' => date('Y-m-d H:i:s'),
                    );

                    $this->db->insert('hr_pay_employees_job_history', $job_history);
                }

                $account_no_1 = $this->input->post('account_no_1');
                $account_bn_1 = $this->input->post('account_bn_1');
                $account_br_1 = $this->input->post('account_br_1');
                if (count($this->employees->get_bank_available(array('type' => 1, 'emp_id' => $emp_id))) > 0) {
                    $data_acc_1 = array(

                        'account_no' => $account_no_1,
                        'bank_name' => $account_bn_1,
                        'branch_name' => $account_br_1,
                    );
                    $this->employees->update_bank_info($data_acc_1, array('type' => 1, 'emp_id' => $emp_id));
                } else {
                    $data_acc_1 = array(
                        'account_no' => $account_no_1,
                        'bank_name' => $account_bn_1,
                        'branch_name' => $account_br_1,
                        'type' => 1,
                        'emp_id' => $emp_id,
                    );
                    $this->employees->save_bank_info($data_acc_1);
                }

                $date = date('Y-m-d');
                $qz = $this->db->query("SELECT * FROM  hr_pay_employees_salary_history WHERE type='Basic' AND employee_id = '$emp_id' AND date = '$date' ");
                $exsist_sal_data = $qz->row();
                if ($exsist_sal_data->amount != $this->input->post('basic_salary')) {
                    //Save Salry Record for Basic
                    $basic_sal_data = array(
                        'employee_id' => $emp_id,
                        'type' => "Basic",
                        'type_id' => 0,
                        'amount' => $this->input->post('basic_salary'),
                        'date' => date('Y-m-d'),
                    );
                    $this->employees->add_salary_record($basic_sal_data);
                }

                $details = $this->input->post();
                $groups=array('admin','payroll'); if ($this->ion_auth->in_group($groups)) {
                    if (isset($details['allowance'])) {
                        foreach ($details['allowance'] as $key => $value) {
                            if (!empty($details['allowance'][$key])) {
                                $allow_id = $details['allowance'][$key];
                                $q1 = $this->db->query("SELECT * FROM  hr_pay_employees_allowances WHERE allowance_id='$allow_id' AND employee_id = '$emp_id' ");
                                $exsist_allow_data = $q1->row();

//                            if ($q1->num_rows() > 0) {
                                if (isset($details['allow_hide'][$key])) {
                                    $update_allowance_data = array(
                                        'allowance_id' => $details['allowance'][$key],
                                        'amount' => $details['amount'][$key],
                                        'status' => $details['a_status'][$key]
                                    );
//                                $this->employees->update_emp_allow($emp_id,$allow_id,$update_allowance_data);
                                    $this->employees->update_emp_allow($emp_id, $details['allow_hide'][$key], $update_allowance_data);
                                    unset($update_allowance_data);

                                    if ($exsist_allow_data->amount != $details['amount'][$key] && $exsist_allow_data->allowance_id == $allow_id) {
                                        //Save Salry Record for Other
                                        $all_sal_data = array(
                                            'employee_id' => $emp_id,
                                            'type' => "Other",
                                            'type_id' => $allow_id,
                                            'amount' => $details['amount'][$key],
                                            'date' => date('Y-m-d'),
                                        );
                                        $this->employees->add_salary_record($all_sal_data);
                                    }
                                } else {
                                    $insert_allowance_data = array(
                                        'employee_id' => $emp_id,
                                        'allowance_id' => $details['allowance'][$key],
                                        'amount' => $details['amount'][$key]
                                    );
                                    $this->db->insert('hr_pay_employees_allowances', $insert_allowance_data);
                                    unset($insert_allowance_data);
                                    //Save Salry Record for Other
                                    $all_sal_data = array(
                                        'employee_id' => $emp_id,
                                        'type' => "Other",
                                        'type_id' => $allow_id,
                                        'amount' => $details['amount'][$key],
                                        'date' => date('Y-m-d'),
                                    );
                                    $this->employees->add_salary_record($all_sal_data);
                                }
                            }
                        }
                    }

                }

                $message = 'Updated Employee - # : ' . $emp_id;
                $this->system_log->create_system_log("Employees", "Success", "Employee Updated ID #".$emp_id);
            }


        if (!empty($emp_id) && $emp_id > 0) {
            echo json_encode(array(
                'status' => true,
                'message' => $message,
                'emp_id' => $emp_id
            ));
            exit;
        } else {
            echo json_encode(array(
                'status' => false,
                'message' => 'Unable to save! Try again.',
            ));
            exit;
        }
    }

    public function ajax_terminate_employee()
    {
        /*if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }
        $this->permissions->check_permission('delete');*/
        $id=$this->input->post('emp_id');
        $date=$this->input->post('date');
        $reason=$this->input->post('reason');

        if($this->employees->update(array('termination_date' => $date,'termination_reason' => $reason,'status'=>'Terminated'),array('id' => $id))) {
            $this->system_log->create_system_log("Employees", "Success", "Employee  Resigned #".$id);
            echo json_encode(array(
                "status" => TRUE,
                "message" => 'Employee Resigned successfully! <br>' .
                    'You can find Resigned employee information under  Resigned Employees menu.'
            ));

            $this->employees->update_system_user_permission($id,1);
        } else {
            $this->system_log->create_system_log("Employees", "Failed", "Failed to  Resigned Employee #".$id);
            echo json_encode(array(
                "status" => FALSE,
                "message" => 'Failed to Resign the employee. <br>' .
                    'Try again!.'
            ));
        }
    }

    public function ajax_restore_employee($id)
    {
        if($this->employees->update( array('termination_date' => null,'status'=>'Active'),array('id' => $id)))
        {
            $this->system_log->create_system_log("Employees", "Success", "Resigned Employee Restored #".$id);
            echo json_encode(array(
                "status" => TRUE,
                "message" => 'Employee restored successfully! <br>'
            ));

            $this->employees->update_system_user_permission($id,2);
        }
        else
        {
            $this->system_log->create_system_log("Employees", "Failed", "Failed to Restore Employee #".$id);
            echo json_encode(array(
                "status" => FALSE,
                "message" => 'Failed restore the employee. <br>' .
                    'Try again!.'
            ));exit;
        }
    }

    public function ajax_list_employee_documents($emp_id)
    {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }

        $this->load->library('datatables');
        $this->datatables->select("hr_pay_employee_documents.document_id,
                                hr_pay_employee_documents.document_name,
                                hr_pay_m_document_types.type_name,
                                CONCAT(hr_pay_employee_documents.size_in_bytes / 1024, ' KB') as size,
                                hr_pay_employee_documents.valid_until,
                                hr_pay_employee_documents.status,
                                hr_pay_employee_documents.details,
                                hr_pay_employee_documents._created_,
                                hr_pay_employee_documents._updated_", FALSE);
        $this->datatables->from('hr_pay_employee_documents');
        $this->datatables->join('hr_pay_m_document_types', 'hr_pay_employee_documents.document_type=hr_pay_m_document_types.id', 'left');
        $this->datatables->where(array('hr_pay_employee_documents.emp_table_id' => $emp_id));
        $this->datatables->group_by("hr_pay_employee_documents.document_id");
        $this->datatables->add_column("Actions",
            "<a class='btn btn-default' href='javascript:void();' title='Edit' onclick='edit_file(" . '$1' . ")'>
                            <i class='fa fa-edit'></i> Edit
                        </a>
                        <a class='btn btn-default' href='javascript:void();' title='Delete' onclick='delete_file(" . '$1' . ")'>
                            <i class='fa fa-trash-o'></i> Delete
                        </a>", "document_id");
        $this->datatables->unset_column("document_id");
        echo $this->datatables->generate();
    }

    public function ajax_add_photo($id)
    {
        $baseURL = base_url();
        $ab_path =  $this->config->item('ab_path');
        $target_path = $ab_path."uploads/employee_photos/";

        $allowedExtensions = array("gif", "jpeg", "jpg", "png", "bmp");
        $allowedSizeMaximum = 2097152;
        $temp = explode(".", $_FILES["photo"]["name"]);
        $extension = end($temp);
        $imageName = "hrms_emp_" . $id;

        if (($_FILES["photo"]["size"] < $allowedSizeMaximum) && in_array(strtolower($extension), array_map('strtolower', $allowedExtensions)))
        {
            if ($_FILES["photo"]["error"] > 0)
            {
                echo json_encode(array("status" => FALSE, "message" => "Return Code: " . $_FILES["photo"]["error"] . " \n"));
            }
            else
            {
                foreach($allowedExtensions as $allowedType)
                {
                    if (file_exists($target_path . $imageName . "." . $allowedType))
                    {
                        rename($target_path . $imageName . "." . $allowedType, $target_path . $imageName . "." . $extension);
                    }
                }

                if(move_uploaded_file($_FILES["photo"]["tmp_name"], $target_path . $imageName . "." . $extension))
                {
                    $emp_photo_details = array(
                        'empTableID' => $id,
                        'photo' => $imageName . "." . $extension,
                        'photoPath' => $target_path . $imageName . "." . $extension,
                        'modifiedDateTime' => $this->currentTime
                    );
                    $query = $this->employees->get_emp_photo_by_emp_id($id);

                    if($query->num_rows() == 0)
                    {
                        $this->employees->save_emp_photo($emp_photo_details);
                        echo json_encode(array("status" => TRUE, "message" => "Photo uploaded successfully.", "photo" => $imageName . "." . $extension));
                        $this->system_log->create_system_log("Employee Photo", "Success", "Employee Photo uploaded successfully EMP ID #".$id);
                    }
                    else
                    {
                        $this->employees->update_emp_photo(array('empTableID' => $id), $emp_photo_details);
                        echo json_encode(array("status" => TRUE, "message" => "Photo uploaded successfully.", "photo" => $imageName . "." . $extension));
                        $this->system_log->create_system_log("Employee Photo", "Success", "Employee Photo Updated successfully EMP ID #".$id);
                    }

                }
                else
                {
                    $this->system_log->create_system_log("Employee Photo", "Failed", "Failed to save the Employee  photo EMP ID #".$id);
                    echo json_encode(array("status" => FALSE, "message" => "Sorry! Failed to save the photo."));
                }
            }
        }
        else
        {
            echo json_encode(array("status" => FALSE, "message" => "Invalid image type or image size. \nOnly " . join(", ", $allowedExtensions) . " image types are allowed. Also, maximum image size allowed is " . $allowedSizeMaximum / 1024 / 1024 . " MB."));
        }
    }

    public function ajax_save_file($emp_id)
    {
        $baseURL = base_url();
        $ab_path =  $this->config->item('ab_path');
        $saveMethod = $this->input->post('save_method');
        $target_path = $ab_path."uploads/documents/emp_".$emp_id . "/";

        $required_data = array(
            'document_type',
            'valid_until',
            'document_status'
        );
        $this->_validate_required($required_data);

        if($saveMethod != 'edit_file')
        {
            if(empty($_FILES["file"]["name"]))
            {
                $data = array();
                $data['inputerror'][] = 'file';
                $data['error_string'][] = 'This is required';
                $data['status'] = FALSE;
                echo json_encode($data);
                exit;
            }
        }

        if(!is_dir($target_path)){
            //Directory does not exist, so lets create it.
            mkdir($target_path, 0775, true);
        }

        $allowedExtensions = array("jpeg", "jpg", "png", "bmp", "pdf", "doc", "docx", "txt");
        $allowedSizeMaximum = 5242880;
        $temp = explode(".", $_FILES["file"]["name"]);
        $extension = end($temp);
        $documentType = $this->input->post('document_type');
        $validUntil = $this->input->post('valid_until');
        $status = $this->input->post('document_status');
        $details = $this->input->post('details');
        $fileName = $_FILES["file"]["name"];
        $isOverride = $this->input->post('override_file') === 'true' ? true : false;
        if($saveMethod == 'edit_file')
        {
            $documentId = $this->input->post('document_id');
            if(empty($_FILES["file"]["name"]))
            {
                $emp_file_details = array(
                    'document_type' => $documentType,
                    'valid_until' => $validUntil,
                    'status' => $status,
                    'details' => $details
                );
                $emp_file_details['_updated_'] = $this->currentTime;
                $this->employees->update_emp_file(array('document_id' => $documentId), $emp_file_details);

                $this->system_log->create_system_log("Employee Documents", "Success", "Employee Document details updated successfully EMP ID #".$emp_id);

                echo json_encode(array("status" => TRUE, "message" => "Document details updated successfully.", "file" => $fileName));
                exit;
            }
            else
            {
                if(file_exists($target_path . $fileName))
                {
                    $query = $this->employees->get_emp_file(array('document_id' => $documentId));
                    if($query->row()->document_name != $fileName)
                    {
                        $this->system_log->create_system_log("Employee Documents", "Failed", "Update - There is already a file existing with this file name for this employee, EMP ID #".$emp_id);

                        echo json_encode(array(
                            "status" => FALSE,
                            "type" => "file_exist",
                            "existing_file_detail" => $this->return_existing_file_info($emp_id, $fileName),
                            "message" => "There is already a file existing with this file name for this employee."
                        ));
                        exit;
                    }
                }
            }
        }

        if (($_FILES["file"]["size"] < $allowedSizeMaximum) && in_array(strtolower($extension), array_map('strtolower', $allowedExtensions)))
        {
            if ($_FILES["file"]["error"] > 0)
            {
                echo json_encode(array("status" => FALSE, "message" => "Return Code: " . $_FILES["file"]["error"] . " \n"));
            }
            else
            {
                if (file_exists($target_path . $fileName) && !$isOverride)
                {
                    $this->system_log->create_system_log("Employee Documents", "Failed", "Insert - There is already a file existing with this file name for this employee, EMP ID #".$emp_id);

                    echo json_encode(array(
                        "status" => FALSE,
                        "type" => "file_exist",
                        "existing_file_detail" => $this->return_existing_file_info($emp_id, $fileName),
                        "message" => "There is already a file existing with this file name for this employee."
                    ));
                    exit;
                }
                else
                {
                    if(move_uploaded_file($_FILES["file"]["tmp_name"], $target_path . $fileName))
                    {
                        $emp_file_details = array(
                            'document_name' => $fileName,
                            'document_type' => $documentType,
                            'valid_until' => $validUntil,
                            'status' => $status,
                            'details' => $details,
                            'path' => $target_path . $fileName,
                            'size_in_bytes' => $_FILES["file"]["size"]
                        );
                        if($saveMethod == 'add_file')
                        {
                            $query = $this->employees->get_emp_file(array('emp_table_id' => $emp_id, 'document_name' => $fileName));
                            if($query->num_rows() == 0)
                            {
                                $this->system_log->create_system_log("Employee Documents", "Success", "Employee Document Added successfully EMP ID #".$emp_id);

                                $emp_file_details['emp_table_id'] = $emp_id;
                                $emp_file_details['_created_'] = $this->currentTime;
                                $this->employees->save_emp_file($emp_file_details);
                                echo json_encode(array("status" => TRUE, "message" => "File uploaded successfully.", "file" => $fileName));
                                exit;
                            }
                            else
                            {
                                $this->system_log->create_system_log("Employee Documents", "Success", "Employee Document Added successfully EMP ID #".$emp_id);

                                $emp_file_details['_updated_'] = $this->currentTime;
                                $this->employees->update_emp_file(array('emp_table_id' => $emp_id, 'document_name' => $fileName), $emp_file_details);
                                echo json_encode(array("status" => TRUE, "message" => "File uploaded successfully.", "file" => $fileName));
                                exit;
                            }
                        }
                        elseif($saveMethod == 'edit_file')
                        {
                            $file = $this->employees->get_emp_file(array('document_id' => $documentId));
                            if(unlink($file->row()->path))
                            {
                                $this->system_log->create_system_log("Employee Documents", "Success", "Employee Document details updated successfully EMP ID #".$emp_id);

                                $emp_file_details['_updated_'] = $this->currentTime;
                                $this->employees->update_emp_file(array('document_id' => $documentId), $emp_file_details);
                                echo json_encode(array("status" => TRUE, "message" => "File uploaded successfully.", "file" => $fileName));
                                exit;
                            }
                        }
                        else
                        {
                            echo json_encode(array("status" => FALSE, "message" => "Unknown save method. Please contact system admin."));
                            exit;
                        }
                    }
                    else
                    {
                        $this->system_log->create_system_log("Employee Documents", "Failed", "Failed to save the file, EMP ID #".$emp_id);

                        echo json_encode(array("status" => FALSE, "message" => "Sorry! Failed to save the file."));
                        exit;
                    }
                }
            }
        }
        else
        {
            echo json_encode(array("status" => FALSE, "message" => "Invalid file type or file size. \nOnly " . join(", ", $allowedExtensions) . " file types are allowed. Also, maximum file size allowed is " . $allowedSizeMaximum / 1024 / 1024 . " MB."));
        }
    }

    private function return_existing_file_info($emp_id, $fileName)
    {
        $emp_file = $this->employees->get_emp_file(array('emp_table_id' => $emp_id,'document_name' => $fileName));
        return array(
            "Document Name" => $emp_file->row()->document_name,
            "Document Type" => $emp_file->row()->document_type_name,
            "Valid Until" => $emp_file->row()->valid_until,
            "File Size" => $emp_file->row()->size_in_bytes . ' bytes',
            "Status" => $emp_file->row()->status,
            "Date Added" => $emp_file->row()->_created_,
            "Date Updated" => empty($emp_file->row()->_updated_) ? "" : $emp_file->row()->_updated_
        );
    }

    public function ajax_delete_photo($id)
    {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }

        $ab_path =  $this->config->item('ab_path');
        $target_path = $ab_path."uploads/employee_photos/";

        $allowedExtensions = array("gif", "jpeg", "jpg", "png", "bmp");
        $imageName = "hrms_emp_" . $id;

        foreach($allowedExtensions as $allowedType)
        {
            if (file_exists($target_path . $imageName . "." . $allowedType))
            {
                unlink($target_path . $imageName . "." . $allowedType);
            }
        }
    }

    public function ajax_delete_file($document_id)
    {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }

        $emp_id = $this->input->post('emp_id');
        $query = $this->employees->get_emp_file(array('emp_table_id' => $emp_id,'document_id' => $document_id));
        $file = $query->row()->path;

        if (file_exists($file))
        {
            if(unlink($file))
            {
                $this->employees->delete_emp_file(array('emp_table_id' => $emp_id,'document_id' => $document_id));
                $message = $query->row()->document_name . " of Employee: " . $query->row()->employee_name . " has been deleted successfully.";

                $this->system_log->create_system_log("Employee Documents", "Success", $message);

                //$this->create_admin_log($action, "Success", $message);
                echo json_encode(array("status" => TRUE, "message" => $message));
            }
            else
            {
                $message = "Sorry! Failed to delete the file";
                $this->system_log->create_system_log("Employee Documents", "Failed", $message." EMP ID #".$emp_id);
                //$this->create_admin_log($action, "Failed", $message);
                echo json_encode(array("status" => FALSE, "message" => $message));
            }
        }
    }

    public function ajax_get_employee_photo($id)
    {
        $photo = $this->employees->get_emp_photo_by_emp_id($id);
        echo json_encode($photo->row());
    }

    public function ajax_get_employee_file_by_file_id($file_id)
    {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }
        $where = array(
            'document_id' => $file_id
        );
        $file = $this->employees->get_emp_file($where);

        echo json_encode($file->row());
    }

    private function _validate_required($required_data)
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        foreach($required_data as $key)
        {
            if ($this->input->post($key) == '')
            {
                $data['inputerror'][] = $key;
                $data['error_string'][] = 'This is required';
                $data['status'] = FALSE;
            }
        }

        if ($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

    public function image_available(){

        $emp_id=$this->input->post('id');


        $photo = $this->employees->check_image_availability($emp_id);

        echo json_encode($photo->row());
    }

    public function get_last_id(){
        $output=$this->employees->get_last_id();
        echo json_encode($output);
    }

    public function get_bank_info($id){
        $output=$this->employees->get_bank_info($id);
        echo json_encode($output);
    }

    //SAVE & LIST emp Qualifications

    public function ajax_list_employee_certi($emp_id)
    {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }

        $this->load->library('datatables');
        $this->datatables->select("hr_pay_employees_certifications.id,
                                hr_pay_m_certifications.name,
                                hr_pay_employees_certifications.institute,
                                hr_pay_employees_certifications.date_start,
                                hr_pay_employees_certifications.date_end", FALSE);
        $this->datatables->from('hr_pay_employees_certifications');
        $this->datatables->join('hr_pay_m_certifications', 'hr_pay_employees_certifications.certification_id=hr_pay_m_certifications.id', 'left');
        $this->datatables->where(array('hr_pay_employees_certifications.employee' => $emp_id));
        $this->datatables->group_by("hr_pay_employees_certifications.certification_id");
        $this->datatables->add_column("Actions",
            "<a class='btn btn-default' href='javascript:void();' title='Edit' onclick='edit_certi(" . '$1' . ")'>
                            <i class='fa fa-edit'></i> Edit
                        </a>
                        <a class='btn btn-default' href='javascript:void();' title='Delete' onclick='delete_certi(" . '$1' . ")'>
                            <i class='fa- fa-trash-o-'></i> Delete
                        </a>", "id");
        $this->datatables->unset_column("id");
        echo $this->datatables->generate();
    }

    public function get_certi_data($id)
    {
        $data = $this->employees->ajax_get_emp_certi_info($id);
        echo json_encode($data);
    }

    public function save_certi($method)
    {
        $this->form_validation->set_rules('certi_type', 'Type', 'required|trim');
        $this->form_validation->set_rules('institute_certi', 'Institute', 'required');
        $this->form_validation->set_rules('granted_on', 'Granted On', 'required');
        $this->form_validation->set_rules('valid_until_certi', 'Valid Until', 'required');
        if ($this->form_validation->run() === FALSE) {
            $data = array();
            $data['error_string'] = array();
            $data['inputerror'] = array();
            $data['status'] = FALSE;
            $data['error'] = "validation_error";
            if (form_error('certi_type')) {
                $data['inputerror'][] = 'certi_type';
                $data['error_string'][] = form_error('certi_type');
            }
            if (form_error('institute_certi')) {
                $data['inputerror'][] = 'institute_certi';
                $data['error_string'][] = form_error('institute_certi');
            }
            if (form_error('granted_on')) {
                $data['inputerror'][] = 'granted_on';
                $data['error_string'][] = form_error('granted_on');
            }
            if (form_error('valid_until_certi')) {
                $data['inputerror'][] = 'valid_until_certi';
                $data['error_string'][] = form_error('valid_until_certi');
            }
            echo json_encode($data);
            exit;
        }
        $id = null;
        $message = null;
        $details = $this->input->post();
        if ($method == "add_certi") {
            $data_main['employee'] = $details['emp_id_certi'];
            $data_main['certification_id'] = $details['certi_type'];
            $data_main['institute'] = $details['institute_certi'];
            $data_main['date_start'] = $details['granted_on'];
            $data_main['date_end'] = $details['valid_until_certi'];
            if ($id = $this->db->insert('hr_pay_employees_certifications',$data_main)) {
                $eid = $this->db->insert_id();
                $this->system_log->create_system_log("Employee Certifications", "Success", "Employee Certification Added ID #".$eid." EMP ID #".$details['emp_id_certi']);
                $message = 'Add New Certification - # : ' . $id;
            }
        } elseif ($method == "edit_certi") {
            $certi_id = $details['certi_id'];
            $employee = $details['emp_id_certi'];
            $data_main['certification_id'] = $details['certi_type'];
            $data_main['institute'] = $details['institute_certi'];
            $data_main['date_start'] = $details['granted_on'];
            $data_main['date_end'] = $details['valid_until_certi'];
            if ($id = $this->employees->update_certi($data_main,$certi_id,$employee)) {
                $this->system_log->create_system_log("Employee Certifications", "Success", "Employee Certification Updated ID #".$certi_id." EMP ID #".$employee);
                $message = 'Updated Certification - # : ' . $id;
            }
        }
        if (!empty($id) && $id > 0) {
            echo json_encode(array(
                'status' => true,
                'message' => $message
            ));
            exit;
        } else {
            echo json_encode(array(
                'status' => false,
                'message' => 'Unable to save! Try again.',
            ));
            exit;
        }
    }

    public function ajax_list_employee_skills($emp_id)
    {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }

        $this->load->library('datatables');
        $this->datatables->select("hr_pay_employees_skills.id,
                                hr_pay_m_skills.name,
                                hr_pay_employees_skills.details,hr_pay_m_experiences.name as experience", FALSE);
        $this->datatables->from('hr_pay_employees_skills');
        $this->datatables->join('hr_pay_m_skills', 'hr_pay_employees_skills.skill_id=hr_pay_m_skills.id', 'left');
        $this->datatables->join('hr_pay_m_experiences', 'hr_pay_employees_skills.experience=hr_pay_m_experiences.id', 'left');
        $this->datatables->where(array('hr_pay_employees_skills.employee' => $emp_id));
        $this->datatables->group_by("hr_pay_employees_skills.skill_id");
        $this->datatables->add_column("Actions",
            "<a class='btn btn-default' href='javascript:void()' title='Edit' onclick='edit_skill(" . '$1' . ")'>
        <i class='fa fa-edit'></i> Edit</a>
        <a class='btn btn-default' href='javascript:void()' title='Delete' onclick='delete_skill(" . '$1' . ")'>
        <i class='fa- fa-trash-o-'></i> Delete</a>", "id");
        $this->datatables->unset_column("id");
        echo $this->datatables->generate();
    }

    public function get_skill_data($id)
    {
        $data = $this->employees->ajax_get_emp_skill_info($id);
        echo json_encode($data);
    }

    public function save_skill($method)
    {
        $this->form_validation->set_rules('skill_type', 'Skill', 'required|trim');
        $this->form_validation->set_rules('skill_details', 'Details', 'required');
        //$this->form_validation->set_rules('skill_level', 'skill_level', 'required');
        if ($this->form_validation->run() === FALSE) {
            $data = array();
            $data['error_string'] = array();
            $data['inputerror'] = array();
            $data['status'] = FALSE;
            $data['error'] = "validation_error";
            if (form_error('skill_type')) {
                $data['inputerror'][] = 'skill_type';
                $data['error_string'][] = form_error('skill_type');
            }
            if (form_error('skill_details')) {
                $data['inputerror'][] = 'skill_details';
                $data['error_string'][] = form_error('skill_details');
            }
            if (form_error('skill_level')) {
                $data['inputerror'][] = 'skill_level';
                $data['error_string'][] = form_error('skill_level');
            }
            echo json_encode($data);
            exit;
        }
        $id = null;
        $message = null;
        $details = $this->input->post();
        if ($method == "add_skill") {
            $data_main['employee'] = $details['emp_id_skill'];
            $data_main['skill_id'] = $details['skill_type'];
            $data_main['details'] = $details['skill_details'];
            $data_main['experience'] = $details['ratingValue'];
            if ($id = $this->db->insert('hr_pay_employees_skills',$data_main)) {
                $eid = $this->db->insert_id();
                $this->system_log->create_system_log("Employee Skills", "Success", "Employee Skill Added ID #".$eid." EMP ID #".$details['emp_id_skill']);
                $message = 'Add New Skill - # : ' . $id;
            }
        } elseif ($method == "edit_skill") {
            $skill_id = $details['skill_id'];
            $employee = $details['emp_id_skill'];
            $data_main['skill_id'] = $details['skill_type'];
            $data_main['details'] = $details['skill_details'];
            $data_main['experience'] = $details['ratingValue'];
            if ($id = $this->employees->update_skill($data_main,$skill_id,$employee)) {
                $this->system_log->create_system_log("Employee Skills", "Success", "Updated Employee Skill ID #".$skill_id." EMP ID #".$employee);
                $message = 'Updated Skill - # : ' . $id;
            }
        }
        if (!empty($id) && $id > 0) {
            echo json_encode(array(
                'status' => true,
                'message' => $message
            ));
            exit;
        } else {
            echo json_encode(array(
                'status' => false,
                'message' => 'Unable to save! Try again.',
            ));
            exit;
        }
    }

    public function ajax_list_employee_edus($emp_id)
    {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }
        $this->load->library('datatables');
        $this->datatables->select("hr_pay_employees_educations.id,
                                hr_pay_m_educations.name,
                                hr_pay_employees_educations.institute,
                                hr_pay_employees_educations.date_start,
                                hr_pay_employees_educations.date_end", FALSE);
        $this->datatables->from('hr_pay_employees_educations');
        $this->datatables->join('hr_pay_m_educations', 'hr_pay_employees_educations.education_id=hr_pay_m_educations.id', 'left');
        $this->datatables->where(array('hr_pay_employees_educations.employee' => $emp_id));
        $this->datatables->group_by("hr_pay_employees_educations.education_id");
        $this->datatables->add_column("Actions",
            "<a class='btn btn-default'  href='javascript:void()' title='Edit' onclick='edit_edu(" . '$1' . ")'>
        <i class='fa fa-edit'></i> Edit</a>
        <a class='btn btn-default' href='javascript:void()' title='Delete' onclick='delete_edu(" . '$1' . ")'>
        <i class='fa- fa-trash-o-'></i> Delete</a>", "id");
        $this->datatables->unset_column("id");
        echo $this->datatables->generate();
    }

    public function get_edu_data($id)
    {
        $data = $this->employees->ajax_get_emp_edu_info($id);
        echo json_encode($data);
    }

    public function save_edu($method)
    {
        $this->form_validation->set_rules('edu_type', 'Education', 'required|trim');
        $this->form_validation->set_rules('institute_edu', 'Institute ', 'required');
        $this->form_validation->set_rules('start_date', 'Start Date ', 'required');
        $this->form_validation->set_rules('completed_date', 'Completed Date ', 'required');
        if ($this->form_validation->run() === FALSE) {
            $data = array();
            $data['error_string'] = array();
            $data['inputerror'] = array();
            $data['status'] = FALSE;
            $data['error'] = "validation_error";
            if (form_error('edu_type')) {
                $data['inputerror'][] = 'edu_type';
                $data['error_string'][] = form_error('edu_type');
            }
            if (form_error('institute_edu')) {
                $data['inputerror'][] = 'institute_edu';
                $data['error_string'][] = form_error('institute_edu');
            }
            if (form_error('start_date')) {
                $data['inputerror'][] = 'start_date';
                $data['error_string'][] = form_error('start_date');
            }
            if (form_error('completed_date')) {
                $data['inputerror'][] = 'completed_date';
                $data['error_string'][] = form_error('completed_date');
            }
            echo json_encode($data);
            exit;
        }
        $id = null;
        $message = null;
        $details = $this->input->post();
        if ($method == "add_edu") {
            $data_main['employee'] = $details['emp_id_edu'];
            $data_main['education_id'] = $details['edu_type'];
            $data_main['institute'] = $details['institute_edu'];
            $data_main['date_start'] = $details['start_date'];
            $data_main['date_end'] = $details['completed_date'];
            if ($id = $this->db->insert('hr_pay_employees_educations',$data_main)) {
                $eid = $this->db->insert_id();
                $this->system_log->create_system_log("Employee Educations", "Success", "Updated Employee Education ID #".$eid." EMP ID #".$details['emp_id_edu']);
                $message = 'Add New Education - # : ' . $id;
            }
        } elseif ($method == "edit_edu") {
            $edu_id = $details['edu_id'];
            $employee = $details['emp_id_edu'];
            $data_main['education_id'] = $details['edu_type'];
            $data_main['institute'] = $details['institute_edu'];
            $data_main['date_start'] = $details['start_date'];
            $data_main['date_end'] = $details['completed_date'];
            if ($id = $this->employees->update_edu($data_main,$edu_id,$employee)) {
                $this->system_log->create_system_log("Employee Educations", "Success", "Updated Employee Education ID #".$edu_id." EMP ID #".$employee);
                $message = 'Updated Education - # : ' . $id;
            }
        }
        if (!empty($id) && $id > 0) {
            echo json_encode(array(
                'status' => true,
                'message' => $message
            ));
            exit;
        } else {
            echo json_encode(array(
                'status' => false,
                'message' => 'Unable to save! Try again.',
            ));
            exit;
        }
    }

    // sports----------------------------

    public function ajax_list_employee_sport($emp_id)
    {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }

        $this->load->library('datatables');
        $this->datatables->select("hr_pay_employees_sports.id,
                                hr_pay_m_sports.name,hr_pay_employees_sports.level", FALSE);
        $this->datatables->from('hr_pay_employees_sports');
        $this->datatables->join('hr_pay_m_sports', 'hr_pay_employees_sports.sport_id=hr_pay_m_sports.id', 'left');
        $this->datatables->where(array('hr_pay_employees_sports.employee' => $emp_id));
        $this->datatables->group_by("hr_pay_employees_sports.sport_id");
        $this->datatables->add_column("Actions",
            "<a class='btn btn-default' href='javascript:void();' title='Edit' onclick='edit_sport(" . '$1' . ")'>
                            <i class='fa fa-edit'></i> Edit</a>
                       <a class='btn btn-default' href='javascript:void();' title='Delete' onclick='delete_sport(" . '$1' . ")'>
        <i class='fa- fa-trash-o-'></i> Delete</a>", "id");
        $this->datatables->unset_column("id");
        echo $this->datatables->generate();
    }

    public function get_sport_data($id)
    {
        $data = $this->employees->ajax_get_emp_sport_info($id);
        echo json_encode($data);
    }

    public function save_sport($method)
    {
        $this->form_validation->set_rules('sport_type', 'Type', 'required|trim');

        if ($this->form_validation->run() === FALSE) {
            $data = array();
            $data['error_string'] = array();
            $data['inputerror'] = array();
            $data['status'] = FALSE;
            $data['error'] = "validation_error";
            if (form_error('sport_type')) {
                $data['inputerror'][] = 'sport_type';
                $data['error_string'][] = form_error('sport_type');
            }
            if (form_error('level_sport')) {
                $data['inputerror'][] = 'level_sport';
                $data['error_string'][] = form_error('level_sport');
            }
//            if (form_error('start_date')) {
//                $data['inputerror'][] = 'start_date';
//                $data['error_string'][] = form_error('start_date');
//            }
//            if (form_error('end_date')) {
//                $data['inputerror'][] = 'end_date';
//                $data['error_string'][] = form_error('end_date');
//            }
            echo json_encode($data);
            exit;
        }
        $id = null;
        $message = null;
        $details = $this->input->post();
        if ($method == "add_sport") {
            $data_main['employee'] = $details['emp_id_sport'];
            $data_main['sport_id'] = $details['sport_type'];
            $data_main['level'] = $details['level_sport'];
//            $data_main['date_start'] = $details['start_date'];
//            $data_main['date_end'] = $details['end_date'];
            if ($id = $this->db->insert('hr_pay_employees_sports',$data_main)) {
                $eid = $this->db->insert_id();
                $this->system_log->create_system_log("Employee Sports", "Success", "Employee Sport Added ID #".$eid." EMP ID #".$details['emp_id_sport']);
                $message = 'Add New Sport - # : ' . $id;
            }
        } elseif ($method == "edit_sport") {
            $sport_id = $details['sport_id'];
            $employee = $details['emp_id_sport'];
            $data_main['sport_id'] = $details['sport_type'];
            $data_main['level'] = $details['level_sport'];
//            $data_main['date_start'] = $details['start_date'];
//            $data_main['date_end'] = $details['end_date'];
            if ($id = $this->employees->update_sport($data_main,$sport_id,$employee)) {
                $this->system_log->create_system_log("Employee Sports", "Success", "Employee Sport Updated ID #".$sport_id." EMP ID #".$employee);
                $message = 'Updated Sport - # : ' . $id;
            }
        }
        if (!empty($id) && $id > 0) {
            echo json_encode(array(
                'status' => true,
                'message' => $message
            ));
            exit;
        } else {
            echo json_encode(array(
                'status' => false,
                'message' => 'Unable to save! Try again.',
            ));
            exit;
        }
    }



// experience----------------
    public function ajax_list_employee_exp($emp_id)
    {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }

        $this->load->library('datatables');
        $this->datatables->select("hr_pay_employees_experiences.id,
                                hr_pay_m_experiences.name,
                                hr_pay_employees_experiences.company,hr_pay_employees_experiences.description,
                                CONCAT(hr_pay_employees_experiences.date_start,' - ',
                                hr_pay_employees_experiences.date_end) as period", FALSE);
        $this->datatables->from('hr_pay_employees_experiences');
        $this->datatables->join('hr_pay_m_experiences', 'hr_pay_employees_experiences.exp_id=hr_pay_m_experiences.id', 'left');
        $this->datatables->where(array('hr_pay_employees_experiences.employee' => $emp_id));
        $this->datatables->group_by("hr_pay_employees_experiences.exp_id");
        $this->datatables->add_column("Actions",
            "<a class='btn btn-default' href='javascript:void();' title='Edit' onclick='edit_exp(" . '$1' . ")'>
        <i class='fa fa-edit'></i> Edit</a>
        <a class='btn btn-default' href='javascript:void();' title='Delete' onclick='delete_exp(" . '$1' . ")'>
        <i class='fa- fa-trash-o-'></i> Delete</a>", "id");
        $this->datatables->unset_column("id");
        echo $this->datatables->generate();
    }

    public function get_exp_data($id)
    {
        $data = $this->employees->ajax_get_emp_exp_info($id);
        echo json_encode($data);
    }

    public function save_exp($method)
    {
        $this->form_validation->set_rules('exp_type', 'Type', 'required|trim');
        $this->form_validation->set_rules('company_exp', 'Company', 'required');
        $this->form_validation->set_rules('start_date', 'Start Date ', 'required');
        $this->form_validation->set_rules('end_date', 'End Date ', 'required');
        if ($this->form_validation->run() === FALSE) {
            $data = array();
            $data['error_string'] = array();
            $data['inputerror'] = array();
            $data['status'] = FALSE;
            $data['error'] = "validation_error";
            if (form_error('exp_type')) {
                $data['inputerror'][] = 'exp_type';
                $data['error_string'][] = form_error('exp_type');
            }
            if (form_error('company_exp')) {
                $data['inputerror'][] = 'company_exp';
                $data['error_string'][] = form_error('company_exp');
            }
            if (form_error('start_date')) {
                $data['inputerror'][] = 'start_date';
                $data['error_string'][] = form_error('start_date');
            }
            if (form_error('end_date')) {
                $data['inputerror'][] = 'end_date';
                $data['error_string'][] = form_error('end_date');
            }
            echo json_encode($data);
            exit;
        }
        $id = null;
        $message = null;
        $details = $this->input->post();
        if ($method == "add_exp") {
            $data_main['employee'] = $details['emp_id_exp'];
            $data_main['exp_id'] = $details['exp_type'];
            $data_main['company'] = $details['company_exp'];
            $data_main['description'] = $details['description'];
            $data_main['date_start'] = $details['start_date'];
            $data_main['date_end'] = $details['end_date'];
            if ($id = $this->db->insert('hr_pay_employees_experiences',$data_main)) {
                $eid = $this->db->insert_id();
                $this->system_log->create_system_log("Employee Certifications", "Success", "Employee Experience Added ID #".$eid." EMP ID #".$details['emp_id_exp']);
                $message = 'Add New Experience - # : ' . $id;
            }
        } elseif ($method == "edit_exp") {
            $exp_id = $details['exp_id'];
            $employee = $details['emp_id_exp'];
            $data_main['exp_id'] = $details['exp_type'];
            $data_main['company'] = $details['company_exp'];
            $data_main['description'] = $details['description'];
            $data_main['date_start'] = $details['start_date'];
            $data_main['date_end'] = $details['end_date'];
            if ($id = $this->employees->update_exp($data_main,$exp_id,$employee)) {
                $this->system_log->create_system_log("Employee Experiences", "Success", "Employee Experience Updated ID #".$exp_id." EMP ID #".$employee);
                $message = 'Updated Experience - # : ' . $id;
            }
        }
        if (!empty($id) && $id > 0) {
            echo json_encode(array(
                'status' => true,
                'message' => $message
            ));
            exit;
        } else {
            echo json_encode(array(
                'status' => false,
                'message' => 'Unable to save! Try again.',
            ));
            exit;
        }
    }
    //Allowances
    public function get_allowance_list()
    {
        $data = $this->employees->get_allowances_list();
        echo json_encode($data);
    }

    //Salary Increments
    public function employee_salary_history()
    {
        $this->permissions->check_permission('access');
        $this->load->view('common/header');
        $this->load->view('employee_list/salary_history');
        $this->load->view('common/footer');
    }

    public function get_emp_sal_data()
    {
        $this->load->library('datatables');
        $this->datatables->select("hr_pay_employees_salary_history.id,
                                hr_pay_employees.employee_id,
                                 CONCAT(hr_pay_employees.first_name,' ',hr_pay_employees.last_name),
                                hr_pay_m_employee_category.desc,                            
                                hr_pay_employees_salary_history.type,    
                                hr_pay_m_employee_allowance_types.allowance,
                                hr_pay_employees_salary_history.date,hr_pay_employees_salary_history.amount",False);
        $this->datatables->from('hr_pay_employees_salary_history');
        $this->datatables->join('hr_pay_employees','hr_pay_employees.id=hr_pay_employees_salary_history.employee_id', 'left');
        $this->datatables->join('hr_pay_m_employee_category','hr_pay_employees.emp_category=hr_pay_m_employee_category.id', 'left');
        $this->datatables->join('hr_pay_m_employee_allowance_types','hr_pay_m_employee_allowance_types.id=hr_pay_employees_salary_history.type_id', 'left');
        //$this->datatables->unset_column('id');
        echo $this->datatables->generate();
    }

//hr_pay_m_employee_allowance_types.allowance,

    function upload_profile(){

        $ab_path =  $this->config->item('ab_path');
        $saveMethod = $this->input->post('save_method');
        $target_path = $ab_path."uploads/documents/emp_".$emp_id . "/";
        $filepath = "images/" . $_FILES["file"]["name"];

        if(move_uploaded_file($_FILES["file"]["tmp_name"], $filepath))
        {
            echo json_encode($filepath);
        }
        else
        {
            echo json_encode("Error.. !!");
        }
    }

    //get master banks
    public function get_banks(){

        $bank=$this->employees->get_banks();
        echo json_encode(array('bank'=>$bank));
    }

    //get master branches
    public function get_bank_branches($id){

        $branch=$this->employees->get_bank_branches(array('hr_pay_m_bank_branches.bank_id'=>$id));
        echo json_encode(array('branch'=>$branch));
    }

    // employee history
    public function employee_history($emp_id)
    {
//        $emp_history['emp_hist'] = $this->employees->get_emp_history($emp_id);
//        $this->load->view('employee_list/history_view', $emp_history);
        $emp_history['type'] = $this->employees->get_type($emp_id);
        $this->load->view('employee_list/history_view', $emp_history);
    }


    //---------- performance Review--------------------//

    public function get_review_data()
    {

        $emp_id=USER_ID;

        $this->load->library('datatables');
        $this->datatables->select("hr_pay_emp_performance_review.id,
                                    CONCAT(emp.first_name ,' ', emp.last_name) AS employee,
                                    CONCAT(coord.first_name ,' ', coord.last_name) AS coordinator,
                                    hr_pay_emp_performance_review_q_main.name as template_name,
                                    hr_pay_emp_performance_review.status,
                                    hr_pay_emp_performance_review.review_datetime,
                                    hr_pay_emp_performance_review.review_period_start_date,
                                    hr_pay_emp_performance_review.review_period_end_date,
                                    hr_pay_emp_performance_review.self_assessment_due_date,
                                    hr_pay_emp_performance_review.note", FALSE);
        $this->datatables->from('hr_pay_emp_performance_review');
        $this->datatables->join('hr_pay_emp_performance_review_q_main', 'hr_pay_emp_performance_review_q_main.id=hr_pay_emp_performance_review.template', 'left');
        $this->datatables->join('hr_pay_employees emp', 'hr_pay_emp_performance_review.employee=emp.id', 'left');
        $this->datatables->join('hr_pay_employees coord', 'hr_pay_emp_performance_review.coordinator=coord.id', 'left');
        $this->datatables->where(array('emp.id' => $emp_id));
        $this->datatables->where(array('hr_pay_emp_performance_review_q_main.type' => 'employee'));
        $this->datatables->or_where(array('coord.id' => $emp_id));
        $this->datatables->where(array('hr_pay_emp_performance_review_q_main.type' => 'coordinator'));
        $this->datatables->add_column("Actions","
        <a class='btn btn-default tbl-action' href='javascript:void();' id='submit" . '$1' . "' title='Submit' onclick='show_quiz(" . '$1' . ")'>
        <i class='fa fa-file-o'></i> Submit</a>
        <a class='btn btn-default tbl-action' href='javascript:void();' id='edit" . '$1' . "' title='Edit' onclick='edit_submit(" . '$1' . ")''>
        <i class='fa fa-pencil' ></i> Edit</a>
        </a><a class='btn btn-default tbl-action' href='javascript:void();' title='View' onclick='view_submitted_form(" . '$1' . ")'>
        <i class='fa fa-eye'></i> View</a>", "id");
        //$this->datatables->unset_column('id');
        echo $this->datatables->generate();
    }



} 