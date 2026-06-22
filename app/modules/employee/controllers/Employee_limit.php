<?php

class Employee_limit extends CI_Controller
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

    }

    public function index()
    {
        $this->permissions->check_permission('access');
        $this->load->helper('url');

        $this->load->view('common/header');
        $this->load->view('employee_limit_index');
        $this->load->view('common/footer');
    }

    public function employee_limit_info()
    {

        $this->load->library('datatables');

        $this->datatables->select("
            tbl_employee_limit.id,
            tbl_employee_limit.emp_code AS employee_code,
            tbl_employee_limit.emp_name,
            master_medical_year.description,
            tbl_employee_limit.from_date,
            tbl_employee_limit.to_date,
            tbl_employee_limit.max_amount,
            tbl_employee_limit.scheme_code,
                      ", FALSE);

        $this->datatables->from('tbl_employee_limit');
       // $this->datatables->join('tbl_employee_listing','tbl_employee_listing.emp_code=tbl_employee_limit.emp_code','left');
        $this->datatables->join('master_medical_year','master_medical_year.id=tbl_employee_limit.medical_year','left');

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



    public function save_employee($method)
    {
        $data_marital=array();

        if ($method == "add"){

            $this->form_validation->set_rules('emp_code','EMP Code','trim|required|alpha_numeric|is_unique[tbl_employee_listing.emp_code]');
            $this->form_validation->set_rules('initials', 'Initials', 'required');
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('title', 'Title', 'required');

            if($this->form_validation->run()===FALSE)
            {
                $data = array();
                $data['error_string'] = array();
                $data['inputerror'] = array();
                $data['status'] = FALSE;
                $data['error'] = "validation_error";
                if (form_error('emp_code'))
                {
                    $data['inputerror'][] = 'emp_code';
                    $data['error_string'][] = form_error('emp_code');
                }
                if (form_error('name'))
                {
                    $data['inputerror'][] = 'name';
                    $data['error_string'][] = form_error('name');
                }
                if (form_error('title'))
                {
                    $data['inputerror'][] = 'title';
                    $data['error_string'][] = form_error('title');
                }

                if (form_error('initials'))
                {
                    $data['inputerror'][] = 'initials';
                    $data['error_string'][] = form_error('initials');
                }

                echo json_encode($data);
                exit;
            }
        }
        else {

            $this->form_validation->set_rules('emp_code','EMP Code','trim|required|alpha_numeric');
            $this->form_validation->set_rules('initials', 'Initials', 'required');
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('title', 'Title', 'required');

            if($this->form_validation->run()===FALSE)
            {
                $data = array();
                $data['error_string'] = array();
                $data['inputerror'] = array();
                $data['status'] = FALSE;
                $data['error'] = "validation_error";
                if (form_error('emp_code'))
                {
                    $data['inputerror'][] = 'emp_code';
                    $data['error_string'][] = form_error('emp_code');
                }
                if (form_error('initials'))
                {
                    $data['inputerror'][] = 'initials';
                    $data['error_string'][] = form_error('initials');
                }
                if (form_error('name'))
                {
                    $data['inputerror'][] = 'name';
                    $data['error_string'][] = form_error('name');
                }

                if (form_error('title'))
                {
                    $data['inputerror'][] = 'title';
                    $data['error_string'][] = form_error('title');
                }

                echo json_encode($data);
                exit;
            }
        }

        if($method == "add"){

            $data['emp_code'] = $this->input->post('emp_code');
            $data['initials'] = $this->input->post('initials');
            $data['title'] = $this->input->post('title');
            $data['name'] = $this->input->post('name');
            $data['designation'] = $this->input->post('designation');
            $data['division'] = $this->input->post('division');
            $data['organization'] = $this->input->post('organization');
            $data['emp_scheme'] = $this->input->post('emp_scheme');
            $data['status'] = $this->input->post('status');
            $data['created_at'] = date("Y-m-d H:i:s");
            $data['updated_at'] = date("Y-m-d H:i:s");
            $data['user'] = USER_ID;


            if ($this->db->insert('tbl_employee_listing',$data)) {
                $emp_id = $this->db->insert_id();

                $message = 'Add New Employee - # : ' . $emp_id;

                foreach ($this->input->post("member") as $key1 => $member1) {

                    $data_family=array(
                        "emp_id"=>$emp_id,
                        "member"=>$this->input->post("member")[$key1],
                        "status"=>$this->input->post("member_status")[$key1]
                    );

                    $this->db->insert('tbl_employee_family',$data_family);
                }


                $this->system_log->create_system_log("Employees", "Success", "New Employee Added ID #".$emp_id);
            }
        }
        else if ($method == "update"){


            $data['initials'] = $this->input->post('initials');
            $data['title'] = $this->input->post('title');
            $data['name'] = $this->input->post('name');
            $data['designation'] = $this->input->post('designation');
            $data['division'] = $this->input->post('division');
            $data['organization'] = $this->input->post('organization');
            $data['emp_scheme'] = $this->input->post('emp_scheme');
            $data['status'] = $this->input->post('status');
            $data['updated_at'] = date("Y-m-d H:i:s");
            $data['user'] = USER_ID;
            $data['usage_status'] = 0;

            $emp_id = $this->input->post('emp_id');

            if ($this->db->update('tbl_employee_listing', $data,array("id"=>$emp_id))) {


                if($this->db->delete("tbl_employee_family",array("emp_id"=>$emp_id))){

                    foreach ($this->input->post("member") as $key1 => $member1) {

                        $data_family=array(
                            "emp_id"=>$emp_id,
                            "member"=>$this->input->post("member")[$key1],
                            "status"=>$this->input->post("member_status")[$key1]
                        );

                        $this->db->insert('tbl_employee_family',$data_family);
                    }

                }

                $message = 'Updated Employee - # : ' . $emp_id;
                $this->system_log->create_system_log("Employees", "Success", "Employee Updated ID #".$emp_id);
            }
        }

        echo json_encode(array(
            'status' => true,
            'message' => $message,
            'emp_id' => $emp_id
        ));
    }


    //get master designation
    public function get_master_data(){

        $designation= $this->kcrud->getValueAll("master_designation","id,name",null,null,null,null,null);
        $division= $this->kcrud->getValueAll("master_division","id,name",null,null,null,null,null);
        $organization= $this->kcrud->getValueAll("master_organization","id,name",null,null,null,null,null);
        $emp_scheme= $this->kcrud->getValueAll("master_insurance_scheme","id,scheme_code,max_amount",null,null,null,null,null);

        echo json_encode(array('designation'=>$designation,'division'=>$division,'organization'=>$organization,'emp_scheme'=>$emp_scheme));

    }

    public function edit_employee($id){

        $employee = $this->kcrud->getValueOne("tbl_employee_listing","emp_code,title,initials,name,designation,division,organization,emp_scheme,status","WHERE id='$id'",null,null,null,null);
        $family_info = $this->kcrud->getValueAll("tbl_employee_family","emp_id,member,status","WHERE emp_id='$id'",null,null,null,null);
        echo json_encode(array("employee"=>$employee,"family_info"=>$family_info,"status"=>true));

    }

}