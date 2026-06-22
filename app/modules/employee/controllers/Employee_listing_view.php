<?php

class employee_listing_view extends CI_Controller
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
        $this->load->view('employee_listing_view_index');
        $this->load->view('common/footer');
    }

    public function employee_list()
    {

        $this->load->library('datatables');

        $this->datatables->select("
            tbl_employee_listing.id,
            tbl_employee_listing.emp_code,
            CONCAT(tbl_employee_listing.title,' ',tbl_employee_listing.initials,' ',tbl_employee_listing.name) AS emp_name,
            master_designation.name AS designation_name,
            master_division.name AS division_name,
            master_organization.name AS organization_name,
            CONCAT(master_insurance_scheme.scheme_code,'- Rs.',master_insurance_scheme.max_amount) AS scheme_info,
            auth_users.first_name,
            tbl_employee_listing.status,
            tbl_employee_listing.id as emp_id,
            ", FALSE);

        $this->datatables->from('tbl_employee_listing');
        $this->datatables->join('master_designation','master_designation.id=tbl_employee_listing.designation','left');
        $this->datatables->join('master_division','master_division.id=tbl_employee_listing.division','left');
        $this->datatables->join('master_organization','master_organization.id=tbl_employee_listing.organization','left');
        $this->datatables->join('master_insurance_scheme','master_insurance_scheme.scheme_code=tbl_employee_listing.emp_scheme','left');
        $this->datatables->join('auth_users','auth_users.id=tbl_employee_listing.user','left');

        $this->datatables->add_column("Actions",
            "<a class='btn btn-sm btn-default tbl-action' href='javascript:void(0);' title='Edit' onclick='edit_emp(".'$1'.")'>
                <i class='fa fa-edit'></i> Edit
            </a>
            <a class='btn btn-sm btn-default tbl-action' href='javascript:void(0);' title='View Usage' onclick='usage_emp(".'$1'.")'>
                <i class='fa fa-pie-chart'></i> View Usage
            </a>", "emp_id");
        $this->datatables->unset_column('emp_id');
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

    public function usage_employee($id){

        $emp_limit=0.00;
        $emp_used=0.00;
        $emp_balance=0.00;

        //get employee info and family info
        $query=$this->db->query("SELECT tbl_employee_listing.emp_code,tbl_employee_listing.title,tbl_employee_listing.initials,tbl_employee_listing.name,tbl_employee_listing.emp_scheme,tbl_employee_listing.status,master_designation.name AS designation_name,master_division.name AS division_name,master_organization.name AS organization_name FROM tbl_employee_listing JOIN master_designation ON master_designation.id=tbl_employee_listing.designation JOIN master_division ON master_division.id=tbl_employee_listing.division JOIN master_organization ON master_organization.id=tbl_employee_listing.organization WHERE tbl_employee_listing.id=".$id);
        $employee=$query->row();
        $family_info = $this->kcrud->getValueAll("tbl_employee_family","emp_id,member,status","WHERE emp_id='$id'",null,null,null,null);

        $emp_code = $employee->emp_code;

        //get last medical year info
        $medical=$this->kcrud->getValueOne("master_medical_year","id,description,from_date,to_date",null,null,null,null,"ORDER BY master_medical_year.id DESC");

        //get employee limit info according to the medical year
        if($limits=$this->kcrud->getValueOne("tbl_employee_limit","emp_code,max_amount","WHERE emp_code='".$emp_code."' AND medical_year=".$medical->id,null,null,null,null)){
            $emp_limit = $limits->max_amount;
        }

        //get all payable amount
        $payable_amount = $this->kcrud->getValueAll("tbl_insurance_claims","id,payable_amount","WHERE emp_code='".$emp_code."' AND medical_year=".$medical->id,null,null,null,null);

        $total_payable=0.00;

        foreach($payable_amount as $payable1){

            $total_payable += $payable1->payable_amount;
        }

        $emp_used = number_format($total_payable,2,".","");
        $emp_balance = number_format(($emp_limit - $emp_used),2,".","");


        $usageLabels=['BALANCE','USED'];
        $usageAmount=[$emp_balance,$emp_used];


        echo json_encode(array("status"=>true,"emp_limit"=>$emp_limit,"emp_used"=>$emp_used,"emp_balance"=>$emp_balance,"employee"=>$employee,"family_info"=>$family_info,"usageLabels"=>$usageLabels,"usageAmount"=>$usageAmount));

    }

} 