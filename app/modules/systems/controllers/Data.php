<?php

class Data extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library('ion_auth');

         $groups=array('admin','manager');
        // check if user logged in
        if (!$this->ion_auth->logged_in()) {
            redirect('index.php/auth/login');
        }

        $this->load->database();
        $this->load->helper('url');
        $this->load->library('grocery_CRUD');
        $this->load->library('system_log');
    }

    function index()
    {
        /*if ($this->session->userdata('logged_in') == false) {
            redirect(site_url('home'), 'refresh');
            exit();
        }*/
        $this->load->view('common/header');
        $this->load->view('master/master');
        $this->load->view('common/footer');
    }

    public function _master_output($output = null)
    {
        $this->load->view('master/master.php',$output);
    }

    public function m_jobtitles()
    {
        $crud = new grocery_CRUD();

        $crud->set_table('hr_pay_m_jobtitles');
        $crud->set_subject('Job Titles');
        $crud->required_fields('code');
        $crud->unique_fields('code');
        //$crud->unset_delete();
        $crud->unset_jquery();
        $crud->unset_bootstrap();

        $crud->callback_after_insert(array($this, 'log_jobtitles_after_insert'));
        $crud->callback_after_update(array($this, 'log_jobtitles_after_update'));

        //$crud->set_rules('code','Job Title is Unique','is_unique[master_companystructures.code]');

        //$crud->unset_columns('productDescription');
        //$crud->callback_column('buyPrice',array($this,'valueToEuro'));

        $output = $crud->render();
        $this->load->view('common/header');
        $this->_master_output($output);
        $this->load->view('common/footer');
    }

    function log_jobtitles_after_insert($post_array,$primary_key)
    {
        $this->system_log->create_system_log("Master Job Titles", "Success", "New Job Title Added ID #".$primary_key);
        return true;
    }
    function log_jobtitles_after_update($post_array,$primary_key)
    {
        $this->system_log->create_system_log("Master Job Titles", "Success", "Job Title Updated ID #".$primary_key);
        return true;
    }

    public function m_departments()
    {
        $crud = new grocery_CRUD();

        $crud->set_table('hr_pay_m_departments');
        $crud->set_subject('Job Sections');
        $crud->required_fields('code');
        $crud->unique_fields('code');
        $crud->set_relation('parent', 'hr_pay_m_departments', 'desc');
        //$crud->unset_delete();
        $crud->unset_jquery();
        $crud->unset_bootstrap();

        $crud->callback_after_insert(array($this, 'log_departments_after_insert'));
        $crud->callback_after_update(array($this, 'log_departments_after_update'));
        //$crud->set_rules('code','Job Title is Unique','is_unique[master_companystructures.code]');

        //$crud->unset_columns('productDescription');
        //$crud->callback_column('buyPrice',array($this,'valueToEuro'));

        $output = $crud->render();
        $this->load->view('common/header');
        $this->_master_output($output);
        $this->load->view('common/footer');

    }

    function log_departments_after_insert($post_array,$primary_key)
    {
        $this->system_log->create_system_log("Master Departments", "Success", "New Department Added ID #".$primary_key);
        return true;
    }
    function log_departments_after_update($post_array,$primary_key)
    {
        $this->system_log->create_system_log("Master Departments", "Success", "Department Updated ID #".$primary_key);
        return true;
    }



    public function m_org_branches()
    {
        $crud = new grocery_CRUD();

        $crud->set_table('m_org_branches');
        $crud->set_subject('Branches');
        $crud->required_fields('name');
        $crud->unique_fields('code');
        $crud->unset_delete();
        $crud->unset_jquery();
        $crud->unset_bootstrap();

        $crud->unset_columns('address_2','phone_2','phone_3','web','email','fax','fax_2','fax_3','manager','designation');
        $crud->callback_after_insert(array($this, 'log_m_org_branches_after_insert'));
        $crud->callback_after_update(array($this, 'log_m_org_branches_after_update'));
        //$crud->set_rules('code','Job Title is Unique','is_unique[master_companystructures.code]');
        //$crud->unset_columns('productDescription');
        //$crud->callback_column('buyPrice',array($this,'valueToEuro'));

        $output = $crud->render();
        $this->load->view('common/header');
        $this->_master_output($output);
        $this->load->view('common/footer');
    }

    function log_m_org_branches_after_insert($post_array,$primary_key)
    {
        $this->system_log->create_system_log("Master Branches", "Success", "New Master Branch Added ID #".$primary_key);
        return true;
    }
    function log_m_org_branches_after_update($post_array,$primary_key)
    {
        $this->system_log->create_system_log("Master Branches", "Success", "Master Branch Updated ID #".$primary_key);
        return true;
    }


    public function m_empstatus()
    {
        $crud = new grocery_CRUD();

        $crud->set_table('hr_pay_m_employmentstatus');
        $crud->set_subject('Employment Status ');
        $crud->required_fields('name');
        $crud->unique_fields('name');
        $crud->unset_delete();
        $crud->unset_jquery();
        $crud->unset_bootstrap();

        $crud->callback_after_insert(array($this, 'log_empstatus_after_insert'));
        $crud->callback_after_update(array($this, 'log_empstatus_after_update'));

        $output = $crud->render();
        $this->load->view('common/header');
        $this->_master_output($output);
        $this->load->view('common/footer');
    }


    function log_empstatus_after_insert($post_array,$primary_key)
    {
        $this->system_log->create_system_log("Master Employment Status", "Success", "New Employment Status Added ID #".$primary_key);
        return true;
    }
    function log_empstatus_after_update($post_array,$primary_key)
    {
        $this->system_log->create_system_log("Master Employment Status", "Success", "Employment Status Updated ID #".$primary_key);
        return true;
    }

    public function m_certifications()
    {
        $crud = new grocery_CRUD();

        $crud->set_table('hr_pay_m_certifications');
        $crud->set_subject('Certifications');
        $crud->required_fields('name');
        $crud->unique_fields('name');
        $crud->unset_delete();
        $crud->unset_jquery();
        $crud->unset_bootstrap();

        $crud->callback_after_insert(array($this, 'log_certifications_after_insert'));
        $crud->callback_after_update(array($this, 'log_certifications_after_update'));

        $output = $crud->render();
        $this->load->view('common/header');
        $this->_master_output($output);
        $this->load->view('common/footer');
    }

    function log_certifications_after_insert($post_array,$primary_key)
    {
        $this->system_log->create_system_log("Master Certifications", "Success", "New Certification Added ID #".$primary_key);
        return true;
    }
    function log_certifications_after_update($post_array,$primary_key)
    {
        $this->system_log->create_system_log("Master Certifications", "Success", "Certification Updated ID #".$primary_key);
        return true;
    }

    public function m_sports()
    {
        $crud = new grocery_CRUD();

        $crud->set_table('hr_pay_m_sports');
        $crud->set_subject('Sports');
        $crud->required_fields('name');
        $crud->unique_fields('name');
        $crud->unset_delete();
        $crud->unset_jquery();
        $crud->unset_bootstrap();

        $crud->callback_after_insert(array($this, 'log_sports_after_insert'));
        $crud->callback_after_update(array($this, 'log_sports_after_update'));

        $output = $crud->render();
        $this->load->view('common/header');
        $this->_master_output($output);
        $this->load->view('common/footer');
    }

    function log_sports_after_insert($post_array,$primary_key)
    {
        $this->system_log->create_system_log("Master Sports", "Success", "New Sport Added ID #".$primary_key);
        return true;
    }
    function log_sports_after_update($post_array,$primary_key)
    {
        $this->system_log->create_system_log("Master Sports", "Success", "Sport Updated ID #".$primary_key);
        return true;
    }

    public function m_experiences()
    {
        $crud = new grocery_CRUD();

        $crud->set_table('hr_pay_m_experiences');
        $crud->set_subject('Experiences');
        $crud->required_fields('name');
        $crud->unique_fields('name');
        $crud->unset_delete();
        $crud->unset_jquery();
        $crud->unset_bootstrap();

        $crud->callback_after_insert(array($this, 'log_experiences_after_insert'));
        $crud->callback_after_update(array($this, 'log_experiences_after_update'));

        $output = $crud->render();
        $this->load->view('common/header');
        $this->_master_output($output);
        $this->load->view('common/footer');
    }

    function log_experiences_after_insert($post_array,$primary_key)
    {
        $this->system_log->create_system_log("Master Experiences", "Success", "New Experience Added ID #".$primary_key);
        return true;
    }
    function log_experiences_after_update($post_array,$primary_key)
    {
        $this->system_log->create_system_log("Master Experiences", "Success", "Experience Updated ID #".$primary_key);
        return true;
    }

    public function m_skill_levels()
    {
        $crud = new grocery_CRUD();

        $crud->set_table('hr_pay_m_skill_levels');
        $crud->set_subject('Skill Levels');
        $crud->required_fields('skill_level');
        $crud->unique_fields('skill_level');
        $crud->unset_delete();
        $crud->unset_jquery();
        $crud->unset_bootstrap();

        $crud->callback_after_insert(array($this, 'log_skill_level_after_insert'));
        $crud->callback_after_update(array($this, 'log_skill_level_after_update'));

        $output = $crud->render();
        $this->load->view('common/header');
        $this->_master_output($output);
        $this->load->view('common/footer');
    }

    function log_skill_level_after_insert($post_array,$primary_key)
    {
        $this->system_log->create_system_log("Master Skill Levels", "Success", "New skill_level Added ID #".$primary_key);
        return true;
    }
    function log_skill_level_after_update($post_array,$primary_key)
    {
        $this->system_log->create_system_log("Master Skill Levels", "Success", "skill_level Updated ID #".$primary_key);
        return true;
    }

    public function m_skills()
    {
        $crud = new grocery_CRUD();

        $crud->set_table('hr_pay_m_skills');
        $crud->set_subject('Skills');
        $crud->required_fields('name');
        $crud->unique_fields('name');
        $crud->unset_delete();
        $crud->unset_jquery();
        $crud->unset_bootstrap();

        $crud->callback_after_insert(array($this, 'log_skills_after_insert'));
        $crud->callback_after_update(array($this, 'log_skills_after_update'));

        $output = $crud->render();
        $this->load->view('common/header');
        $this->_master_output($output);
        $this->load->view('common/footer');
    }

    function log_skills_after_insert($post_array,$primary_key)
    {
        $this->system_log->create_system_log("Master Skills", "Success", "New Skill Added ID #".$primary_key);
        return true;
    }
    function log_skills_after_update($post_array,$primary_key)
    {
        $this->system_log->create_system_log("Master Skills", "Success", "Skill Updated ID #".$primary_key);
        return true;
    }



    public function m_educations()
    {
        $crud = new grocery_CRUD();

        $crud->set_table('hr_pay_m_educations');
        $crud->set_subject('Educations');
        $crud->required_fields('name');
        $crud->unique_fields('name');
        $crud->unset_delete();
        $crud->unset_jquery();
        $crud->unset_bootstrap();

        $crud->callback_after_insert(array($this, 'log_educations_after_insert'));
        $crud->callback_after_update(array($this, 'log_educations_after_update'));
        //$crud->set_rules('code','Job Title is Unique','is_unique[master_companystructures.code]');
        //$crud->unset_columns('productDescription');
        //$crud->callback_column('buyPrice',array($this,'valueToEuro'));

        $output = $crud->render();
        $this->load->view('common/header');
        $this->_master_output($output);
        $this->load->view('common/footer');
    }

    function log_educations_after_insert($post_array,$primary_key)
    {
        $this->system_log->create_system_log("Master Educations", "Success", "New Education Added ID #".$primary_key);
        return true;
    }
    function log_educations_after_update($post_array,$primary_key)
    {
        $this->system_log->create_system_log("Master Educations", "Success", "Education Updated ID #".$primary_key);
        return true;
    }

    public function m_nationality()
    {
        $crud = new grocery_CRUD();

        $crud->set_table('hr_pay_m_nationality');
        $crud->set_subject('Nationality');
        $crud->required_fields('name');
        $crud->unique_fields('name');
        $crud->unset_delete();
        $crud->unset_jquery();
        $crud->unset_bootstrap();

        $crud->callback_after_insert(array($this, 'log_nationality_after_insert'));
        $crud->callback_after_update(array($this, 'log_nationality_after_update'));
        //$crud->set_rules('code','Job Title is Unique','is_unique[master_companystructures.code]');
        //$crud->unset_columns('productDescription');
        //$crud->callback_column('buyPrice',array($this,'valueToEuro'));

        $output = $crud->render();
        $this->load->view('common/header');
        $this->_master_output($output);
        $this->load->view('common/footer');
    }

    function log_nationality_after_insert($post_array,$primary_key)
    {
        $this->system_log->create_system_log("Master Nationality", "Success", "New Nationality Added ID #".$primary_key);
        return true;
    }
    function log_nationality_after_update($post_array,$primary_key)
    {
        $this->system_log->create_system_log("Master Nationality", "Success", "Nationality Updated ID #".$primary_key);
        return true;
    }

    public function m_religions()
    {
        $crud = new grocery_CRUD();

        $crud->set_table('hr_pay_m_religions');
        $crud->set_subject('Religion');
        $crud->required_fields('name');
        $crud->unique_fields('name');
        $crud->unset_delete();
        $crud->unset_jquery();
        $crud->unset_bootstrap();

        $crud->callback_after_insert(array($this, 'log_religions_after_insert'));
        $crud->callback_after_update(array($this, 'log_religions_after_update'));
        //$crud->set_rules('code','Job Title is Unique','is_unique[master_companystructures.code]');
        //$crud->unset_columns('productDescription');
        //$crud->callback_column('buyPrice',array($this,'valueToEuro'));

        $output = $crud->render();
        $this->load->view('common/header');
        $this->_master_output($output);
        $this->load->view('common/footer');
    }

    function log_religions_after_insert($post_array,$primary_key)
    {
        $this->system_log->create_system_log("Master Religions", "Success", "New Religion Added ID #".$primary_key);
        return true;
    }
    function log_religions_after_update($post_array,$primary_key)
    {
        $this->system_log->create_system_log("Master Religions", "Success", "Religion Updated ID #".$primary_key);
        return true;
    }

    public function m_project_types()
    {
        $crud = new grocery_CRUD();

        $crud->set_table('hr_pay_m_project_types');
        $crud->set_subject('Project Types');
        $crud->required_fields('name');
        $crud->unique_fields('name');
        $crud->unset_delete();
        $crud->unset_jquery();
        $crud->unset_bootstrap();

        $crud->callback_after_insert(array($this, 'log_project_types_after_insert'));
        $crud->callback_after_update(array($this, 'log_project_types_after_update'));
        //$crud->set_rules('code','Job Title is Unique','is_unique[master_companystructures.code]');
        //$crud->unset_columns('productDescription');
        //$crud->callback_column('buyPrice',array($this,'valueToEuro'));

        $output = $crud->render();
        $this->load->view('common/header');
        $this->_master_output($output);
        $this->load->view('common/footer');
    }

    function log_project_types_after_insert($post_array,$primary_key)
    {
        $this->system_log->create_system_log("Master Project Types", "Success", "New Master Project Type Added ID #".$primary_key);
        return true;
    }
    function log_project_types_after_update($post_array,$primary_key)
    {
        $this->system_log->create_system_log("Master Project Types", "Success", "Master Project Type Updated ID #".$primary_key);
        return true;
    }

    public function m_project_work_types()
    {
        $crud = new grocery_CRUD();

        $crud->set_table('hr_pay_m_project_work_types');
        $crud->set_subject('Project Work Types');
        $crud->required_fields('name');
        $crud->unique_fields('name');
        $crud->unset_delete();
        $crud->unset_jquery();
        $crud->unset_bootstrap();

        $crud->callback_after_insert(array($this, 'log_work_project_types_after_insert'));
        $crud->callback_after_update(array($this, 'log_work_project_types_after_update'));
        //$crud->set_rules('code','Job Title is Unique','is_unique[master_companystructures.code]');
        //$crud->unset_columns('productDescription');
        //$crud->callback_column('buyPrice',array($this,'valueToEuro'));

        $output = $crud->render();
        $this->load->view('common/header');
        $this->_master_output($output);
        $this->load->view('common/footer');
    }

    function log_work_project_types_after_insert($post_array,$primary_key)
    {
        $this->system_log->create_system_log("Master Project Work Types", "Success", "New Master Work Project Type Added ID #".$primary_key);
        return true;
    }
    function log_work_project_types_after_update($post_array,$primary_key)
    {
        $this->system_log->create_system_log("Master Project Work Types", "Success", "Master Work Project Type Updated ID #".$primary_key);
        return true;
    }


    public function m_event_types()
    {
        $crud = new grocery_CRUD();

        $crud->set_table('hr_pay_m_event_types');
        $crud->set_subject('Event Types');
        $crud->required_fields('type');
        $crud->unique_fields('type');
        $crud->unset_delete();
        $crud->unset_jquery();
        $crud->unset_bootstrap();

        $crud->callback_after_insert(array($this, 'log_event_type_after_insert'));
        $crud->callback_after_update(array($this, 'log_event_type_after_update'));
        //$crud->set_rules('code','Job Title is Unique','is_unique[master_companystructures.code]');
        //$crud->unset_columns('productDescription');
        //$crud->callback_column('buyPrice',array($this,'valueToEuro'));

        $output = $crud->render();
        $this->load->view('common/header');
        $this->_master_output($output);
        $this->load->view('common/footer');
    }

    function log_event_type_after_insert($post_array,$primary_key)
    {
        $this->system_log->create_system_log("Master Event Types", "Success", "New Master Event Type Added ID #".$primary_key);
        return true;
    }
    function log_event_type_after_update($post_array,$primary_key)
    {
        $this->system_log->create_system_log("Master Event Types", "Success", "Master Event Type Updated ID #".$primary_key);
        return true;
    }

    public function m_project_modules()
    {
        $crud = new grocery_CRUD();

        $crud->set_table('hr_pay_m_project_modules');
        $crud->set_subject('Project Modules');
        $crud->required_fields('name');
        $crud->unique_fields('name');
        $crud->unset_delete();
        $crud->unset_jquery();
        $crud->unset_bootstrap();

        $crud->callback_after_insert(array($this, 'log_project_modules_after_insert'));
        $crud->callback_after_update(array($this, 'log_project_modules_after_update'));
        //$crud->set_rules('code','Job Title is Unique','is_unique[master_companystructures.code]');
        //$crud->unset_columns('productDescription');
        //$crud->callback_column('buyPrice',array($this,'valueToEuro'));

        $output = $crud->render();
        $this->load->view('common/header');
        $this->_master_output($output);
        $this->load->view('common/footer');
    }

    function log_project_modules_after_insert($post_array,$primary_key)
    {
        $this->system_log->create_system_log("Master Project Modules", "Success", "New Master Project Module Added ID #".$primary_key);
        return true;
    }
    function log_project_modules_after_update($post_array,$primary_key)
    {
        $this->system_log->create_system_log("Master Project Modules", "Success", "Master Project Module Updated ID #".$primary_key);
        return true;
    }


    public function m_advance_types()
    {
        $crud = new grocery_CRUD();

        $crud->set_table('hr_pay_m_employee_monthly_advance_types');
        $crud->set_subject('Salary - Advance Types');
        $crud->required_fields('name');
        $crud->unique_fields('name');
        $crud->unset_delete();
        $crud->unset_jquery();
        $crud->unset_bootstrap();

        $crud->callback_after_insert(array($this, 'log_advance_type_after_insert'));
        $crud->callback_after_update(array($this, 'log_advance_type_after_update'));

        $output = $crud->render();
        $this->load->view('common/header');
        $this->_master_output($output);
        $this->load->view('common/footer');
    }

    function log_advance_type_after_insert($post_array,$primary_key)
    {
        $this->system_log->create_system_log("Master Advance Types", "Success", "New Master Advance Types Module Added ID #".$primary_key);
        return true;
    }
    function log_advance_type_after_update($post_array,$primary_key)
    {
        $this->system_log->create_system_log("Master Advance Types", "Success", "Master Advance Types Module Updated ID #".$primary_key);
        return true;
    }

    public function m_monthly_payment_types()
    {
        $crud = new grocery_CRUD();

        $crud->set_table('hr_pay_m_employee_monthly_payment_types');
        $crud->set_subject('Salary - Monthly Payment Types ');
        $crud->required_fields('name');
        $crud->unique_fields('name');
        $crud->unset_delete();
        $crud->unset_jquery();
        $crud->unset_bootstrap();

        $crud->callback_after_insert(array($this, 'log_monthly_payment_after_insert'));
        $crud->callback_after_update(array($this, 'log_monthly_payment_after_update'));

        $output = $crud->render();
        $this->load->view('common/header');
        $this->_master_output($output);
        $this->load->view('common/footer');
    }

    function log_monthly_payment_after_insert($post_array,$primary_key)
    {
        $this->system_log->create_system_log("Master Monthly Payment Types", "Success", "New Master Monthly Payment Types Module Added ID #".$primary_key);
        return true;
    }
    function log_monthly_payment_after_update($post_array,$primary_key)
    {
        $this->system_log->create_system_log("Master Monthly Payment Types", "Success", "Master Monthly Payment Types Module Updated ID #".$primary_key);
        return true;
    }




    /******************************************************************************************
     * EXTRA
     ***************************************************************************************
     * */


    public function m_timezones()
    {
        $crud = new grocery_CRUD();

        $crud->set_table('hr_pay_m_timezones');
        $crud->set_subject('Timezones');
        $crud->required_fields('name');
        $crud->unique_fields('name');
        $crud->unset_delete();
        $crud->unset_jquery();
        $crud->unset_bootstrap();
        //$crud->set_rules('code','Job Title is Unique','is_unique[master_companystructures.code]');
        //$crud->unset_columns('productDescription');
        //$crud->callback_column('buyPrice',array($this,'valueToEuro'));

        $output = $crud->render();
        $this->load->view('common/header');
        $this->_master_output($output);
        $this->load->view('common/footer');
    }

    public function m_workdays()
    {
        $crud = new grocery_CRUD();

        $crud->set_table('hr_pay_m_workdays');
        $crud->set_subject('Workdays');
        $crud->required_fields('name','status');
        $crud->unique_fields('name');
        $crud->unset_delete();
        $crud->unset_jquery();
        $crud->unset_bootstrap();
        //$crud->set_rules('code','Job Title is Unique','is_unique[master_companystructures.code]');
        //$crud->unset_columns('productDescription');
        //$crud->callback_column('buyPrice',array($this,'valueToEuro'));

        $output = $crud->render();
        $this->load->view('common/header');
        $this->_master_output($output);
        $this->load->view('common/footer');
    }

    public function m_paygrades()
    {
        $crud = new grocery_CRUD();

        $crud->set_table('hr_pay_m_paygrades');
        $crud->set_subject('Pay Grades');
        $crud->required_fields('name');
        $crud->unique_fields('name');
        $crud->unset_delete();
        $crud->unset_jquery();
        $crud->unset_bootstrap();
        //$crud->set_rules('code','Job Title is Unique','is_unique[master_companystructures.code]');
        //$crud->unset_columns('productDescription');
        //$crud->callback_column('buyPrice',array($this,'valueToEuro'));

        $output = $crud->render();
        $this->load->view('common/header');
        $this->_master_output($output);
        $this->load->view('common/footer');
    }

    public function m_salarycomponenttypes()
    {
        $crud = new grocery_CRUD();

        $crud->set_table('hr_pay_salary_component_types');
        $crud->set_subject('Salary Component Types');
        $crud->required_fields('name', 'code');
        $crud->unique_fields('name', 'code');
        $crud->unset_delete();
        $crud->unset_jquery();
        $crud->unset_bootstrap();

        $output = $crud->render();
        $this->load->view('common/header');
        $this->_master_output($output);
        $this->load->view('common/footer');
    }

    public function m_salarycomponents()
    {
        $crud = new grocery_CRUD();

        $crud->set_table('hr_pay_salary_components');
        $crud->set_subject('Salary Components');
        $crud->required_fields('name', 'componentType');
        $crud->unique_fields('name');
        $crud->display_as('componentType','Salary Component Type');
        $crud->set_relation('componentType','pay_salary_component_types','{name}');
        $crud->unset_delete();
        $crud->unset_jquery();
        $crud->unset_bootstrap();

        $output = $crud->render();
        $this->load->view('common/header');
        $this->_master_output($output);
        $this->load->view('common/footer');
    }

    public function m_payfrequency()
    {
        $crud = new grocery_CRUD();

        $crud->set_table('hr_pay_m_payfrequency');
        $crud->set_subject('Pay Frequency');
        $crud->required_fields('name');
        $crud->unique_fields('name');
        $crud->unset_delete();
        $crud->unset_jquery();
        $crud->unset_bootstrap();
        $output = $crud->render();
        $this->load->view('common/header');
        $this->_master_output($output);
        $this->load->view('common/footer');
    }

    public function m_emp_categories()
    {
        $crud = new grocery_CRUD();

        $crud->set_table('hr_pay_m_employee_category');
        $crud->set_subject('Employee Categories');
        $crud->required_fields('name');
        $crud->unique_fields('name');
        $crud->unset_delete();
        $crud->unset_jquery();
        $crud->unset_bootstrap();

        $output = $crud->render();
        $this->load->view('common/header');
        $this->_master_output($output);
        $this->load->view('common/footer');
    }

    public function m_companystructures()
    {
        $crud = new grocery_CRUD();

        $crud->set_table('hr_pay_m_departments');

        $crud->display_as('parent','Parent Structure');

        $crud->set_subject('Company Structure');

        $crud->required_fields('title');
        //$crud->unique_fields('title');
        $crud->set_relation('country','hr_pay_m_country','{code} - {name}',array('status' => 'Active'));
        $crud->set_relation('parent','hr_pay_m_departments','{title}');
        $crud->unset_delete();
        $crud->unset_jquery();
        $crud->unset_bootstrap();
        //$crud->set_rules('code','Job Title is Unique','is_unique[master_companystructures.code]');
        //$crud->unset_columns('productDescription');
        //$crud->callback_column('buyPrice',array($this,'valueToEuro'));

        $output = $crud->render();
        $this->load->view('common/header');
        $this->_master_output($output);
        $this->load->view('common/footer');
    }

    public function m_country()
    {
        $crud = new grocery_CRUD();

        $crud->set_table('hr_pay_m_country');
        $crud->set_subject('Countries');
        $crud->required_fields('code','name');
        $crud->unique_fields('code');
        $crud->unset_delete();
        $crud->unset_jquery();
        $crud->unset_bootstrap();
        //$crud->set_rules('code','Job Title is Unique','is_unique[master_companystructures.code]');
        //$crud->unset_columns('productDescription');
        //$crud->callback_column('buyPrice',array($this,'valueToEuro'));

        $output = $crud->render();
        $this->load->view('common/header');
        $this->_master_output($output);
        $this->load->view('common/footer');
    }

    public function m_province()
    {
        $crud = new grocery_CRUD();

        $crud->set_table('hr_pay_m_province');
        $crud->set_subject('Province');
        $crud->required_fields('code','name');
        $crud->unique_fields('code');
        $crud->unset_delete();
        $crud->unset_jquery();
        $crud->unset_bootstrap();
        //$crud->set_rules('code','Job Title is Unique','is_unique[master_companystructures.code]');
        //$crud->unset_columns('productDescription');
        //$crud->callback_column('buyPrice',array($this,'valueToEuro'));

        $output = $crud->render();
        $this->load->view('common/header');
        $this->_master_output($output);
        $this->load->view('common/footer');
    }

    public function m_currencytypes()
    {
        $crud = new grocery_CRUD();

        $crud->set_table('hr_pay_m_currencytypes');
        $crud->set_subject('Currency Types');
        $crud->required_fields('code','name');
        $crud->unique_fields('code');
        $crud->unset_delete();
        $crud->unset_jquery();
        $crud->unset_bootstrap();
        //$crud->set_rules('code','Job Title is Unique','is_unique[master_companystructures.code]');
        //$crud->unset_columns('productDescription');
        //$crud->callback_column('buyPrice',array($this,'valueToEuro'));

        $output = $crud->render();
        $this->load->view('common/header');
        $this->_master_output($output);
        $this->load->view('common/footer');
    }

    public function m_ethnicity()
    {
        $crud = new grocery_CRUD();

        $crud->set_table('hr_pay_m_ethnicity');
        $crud->set_subject('Ethnicity');
        $crud->required_fields('name');
        $crud->unique_fields('name');
        $crud->unset_delete();
        $crud->unset_jquery();
        $crud->unset_bootstrap();
        //$crud->set_rules('code','Job Title is Unique','is_unique[master_companystructures.code]');
        //$crud->unset_columns('productDescription');
        //$crud->callback_column('buyPrice',array($this,'valueToEuro'));

        $output = $crud->render();
        $this->load->view('common/header');
        $this->_master_output($output);
        $this->load->view('common/footer');
    }

    public function m_immigrationstatus()
    {
        $crud = new grocery_CRUD();

        $crud->set_table('hr_pay_m_immigrationstatus');
        $crud->set_subject('Immigration Status');
        $crud->required_fields('name');
        $crud->unique_fields('name');
        $crud->unset_delete();
        $crud->unset_jquery();
        $crud->unset_bootstrap();
        //$crud->set_rules('code','Job Title is Unique','is_unique[master_companystructures.code]');
        //$crud->unset_columns('productDescription');
        //$crud->callback_column('buyPrice',array($this,'valueToEuro'));

        $output = $crud->render();
        $this->load->view('common/header');
        $this->_master_output($output);
        $this->load->view('common/footer');
    }

    public function m_languages()
    {
        $crud = new grocery_CRUD();

        $crud->set_table('hr_pay_m_languages');
        $crud->set_subject('Languages');
        $crud->required_fields('name');
        $crud->unique_fields('name');
        $crud->unset_delete();
        $crud->unset_jquery();
        $crud->unset_bootstrap();
        //$crud->set_rules('code','Job Title is Unique','is_unique[master_companystructures.code]');
        //$crud->unset_columns('productDescription');
        //$crud->callback_column('buyPrice',array($this,'valueToEuro'));

        $output = $crud->render();
        $this->load->view('common/header');
        $this->_master_output($output);
        $this->load->view('common/footer');
    }

}