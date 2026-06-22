<?php

class Events extends CI_Controller
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

        $this->load->model('events_mod');
        $this->load->library('system_log');
    }

    function index()
    {
        $data['employees'] = $this->events_mod->get_employees();
        $data['emp_departments'] = $this->events_mod->get_emp_depts();
        $data['event_types'] = $this->events_mod->get_event_types();


        $this->load->view('common/header');
        $this->load->view('administration/events', $data);
        $this->load->view('common/footer');
    }

    public function get_events_data()
    {
        $this->load->library('datatables');
        $this->datatables->select("
        ev.id as event_id,
        ev.id,
        ev.datetime,
        evt.type,
        ev.event_title
        ", FALSE);
        $this->datatables->from('hr_pay_events ev');
        $this->datatables->join('hr_pay_m_event_types evt', 'evt.id=ev.event_type', 'left outer');
        $this->datatables->add_column("Actions", "
        <a class='btn btn-default tbl-action' href='javascript:;' title='Edit' onclick='edit_event(" . '$1' . ")'>
                <i class='fa fa-pencil'></i> Edit
            </a>
              <a class='btn btn-default tbl-action' href='javascript:;' title='Delete' onclick='delete_event(" . '$1' . ")'>
                <i class='fa fa-trash'></i> Delete
            </a>
            <a class='btn btn-default tbl-action' href='javascript:;' title='View' onclick='view_event(" . '$1' . ")'>
                <i class='fa fa-file'></i> View
            </a>
            ", "event_id");
        $this->datatables->unset_column('event_id');
        echo $this->datatables->generate();
    }

    public function get_event_data_by_id($id)
    {
        $data=array();

        $data['events'] = $this->events_mod->get_event(array('id'=>$id));
        $data['employees'] = $this->events_mod->get_events_emp(array('event_id'=>$id));
        $data['departments'] = $this->events_mod->get_events_department(array('event_id'=>$id));

        echo json_encode($data);

    }

    public function get_event_view_by_id($id)
    {
        $data=array();

        $data['events'] = $this->events_mod->get_event_view(array('hr_pay_events.id'=>$id));
        $data['lists'] = $this->events_mod->get_events_list_view(array('hr_pay_event_list.event_id'=>$id));

        echo json_encode($data);
    }

    public function save_event($method)
    {
        if ($method == "add") {

            $this->form_validation->set_rules('event_title', 'Event Title', 'trim|required');
            $this->form_validation->set_rules('datetime', 'Event Date and Time', 'trim|required');
//            $this->form_validation->set_rules('event_from', 'Notify From Date', 'trim|required');
//            $this->form_validation->set_rules('event_to', 'Notify To Date', 'trim|required');
            $this->form_validation->set_rules('event_type', 'Event Type', 'trim|required');

            $data = array();
            $data['error_string'] = array();
            $data['inputerror'] = array();
            $data['status'] = FALSE;
            $data['error'] = "validation_error";

            if($this->form_validation->run() === FALSE) {

                if (form_error('event_title')) {
                    $data['inputerror'][] = 'event_title';
                    $data['error_string'][] = form_error('event_title');
                }
                if (form_error('datetime')) {
                    $data['inputerror'][] = 'datetime';
                    $data['error_string'][] = form_error('datetime');
                }
//                if (form_error('event_from')) {
//                    $data['inputerror'][] = 'event_from';
//                    $data['error_string'][] = form_error('event_from');
//                }
//                if (form_error('event_to')) {
//                    $data['inputerror'][] = 'event_to';
//                    $data['error_string'][] = form_error('event_to');
//                }
                if (form_error('event_type')) {
                    $data['inputerror'][] = 'event_type';
                    $data['error_string'][] = form_error('event_type');
                }

                echo json_encode($data);
                exit;

            }
            else{

                $details = $this->input->post();

                //check assign employees or department
                if(isset($details['employee'])){

                    $data1=array(

                        'datetime'=> $details['datetime'],
                        'emp_department'=>1,
                        'event_type'=> $details['event_type'],
                        'event_title'=> $details['event_title'],
                        'event_details'=> $details['event_details'],
                        'from_date'=> $details['event_from'],
                        'to_date'=> $details['event_to'],
                    );

                    if($this->db->insert('hr_pay_events', $data1)){

                        $qid = $this->db->insert_id();

                        foreach ($this->input->post('employee') as $emp1){

                            if($emp_info=$this->events_mod->get_emp_department(array('id'=>$emp1))) {
                                $department=$emp_info->department;
                            }
                            else {
                                $department=0;
                            }

                            $data2=array(

                                'employee'=>$emp1,
                                'department'=>$department,
                                'event_id'=>$qid,
                                'from_date'=>$details['event_from'],
                                'to_date'=>$details['event_to'],

                            );

                            $this->db->insert('hr_pay_event_list', $data2);

                            //send email -----start------
                            if($this->input->post('send_email')==1){

                                $data = array(
                                    'baseurl'	=> base_url(),
                                    'employee_name'	=> $emp_info->first_name.' '. $emp_info->last_name,
                                    'datetime'	=> $details['datetime'],
                                    'event_title'	=> $details['event_title'],
                                    'event_details'	=> $details['event_details'],
                                    'event_type'=> $this->events_mod->get_event_type(array('id'=>$details['event_type']))->type,
                                );

                                $message = $this->load->view('email/index', $data, true);
                                $this->email->clear();
                                $this->email->from($this->config->item('admin_email', 'ion_auth'), $this->config->item('site_title', 'ion_auth'));
                                $this->email->to($emp_info->office_email);
                                $this->email->subject("Arrow HRMS - New Event - ".$details['event_title']);
                                $this->email->set_mailtype("html");
                                $this->email->message($message);

                                if($this->email->send()){
                                    $this->system_log->create_system_log("Events & Announcements-Email", "Success", "Employee vise-New Event Added to employee ID ".$emp_info->employee_id.'-Event ID #'.$qid);
                                    echo json_encode(array("status" => TRUE));

                                }
                            }
                            //send email -----end------
                            $this->system_log->create_system_log("Events & Announcements", "Success", "Employee vise-New Event Added to employee ID ".$emp_info->employee_id.'-Event ID #'.$qid);
                        }
                        echo json_encode(array("status" => TRUE));
                    }
                    else {
                        echo json_encode(array('status'=>FALSE));
                    }

                }
                //check assign department
                else if(isset($details['department'])){
                    $data1=array(

                        'datetime'=> $details['datetime'],
                        'emp_department'=>2,
                        'event_type'=> $details['event_type'],
                        'event_title'=> $details['event_title'],
                        'event_details'=> $details['event_details'],
                        'from_date'=> $details['event_from'],
                        'to_date'=> $details['event_to'],
                    );

                    if($this->db->insert('hr_pay_events', $data1)){

                        $qid = $this->db->insert_id();

                        foreach ($this->input->post('department') as $dep1){

                            if($this->events_mod->get_department_emp(array('department'=>$dep1))) {

                                foreach ($this->events_mod->get_department_emp(array('department'=>$dep1)) as $dep2){

                                    $data2=array(

                                        'employee'=>$dep2->id,
                                        'department'=>$dep1,
                                        'event_id'=>$qid,
                                        'from_date'=>$details['event_from'],
                                        'to_date'=>$details['event_to'],

                                    );
                                    $this->db->insert('hr_pay_event_list', $data2);

                                //send email -----start------
                                if($this->input->post('send_email')==1){

                                    $emp_info=$this->events_mod->get_emp_department(array('id'=>$dep2->id));

                                    $data = array(
                                        'baseurl'	=> base_url(),
                                        'employee_name'	=> $emp_info->first_name.' '. $emp_info->last_name,
                                        'datetime'	=> $details['datetime'],
                                        'event_title'	=> $details['event_title'],
                                        'event_details'	=> $details['event_details'],
                                        'event_type'=> $this->events_mod->get_event_type(array('id'=>$details['event_type']))->type,
                                    );

                                    $message = $this->load->view('email/index', $data, true);
                                    $this->email->clear();
                                    $this->email->from($this->config->item('admin_email', 'ion_auth'), $this->config->item('site_title', 'ion_auth'));
                                    $this->email->to($emp_info->office_email);
                                    $this->email->subject("Arrow HRMS - New Event - ".$details['event_title']);
                                    $this->email->set_mailtype("html");
                                    $this->email->message($message);

                                    if($this->email->send()){

                                        $this->system_log->create_system_log("Events & Announcements-Email", "Success", "Department vise-New Event Added to Employee ID #".$emp_info->employee_id.'-Department ID'.$dep1.'-Event ID #'.$qid);
                                        }
                                    }
                                }
                                //send email -----end------
                                $this->system_log->create_system_log("Events & Announcements", "Success", "Department vise-New Event Added ID #".$qid.'-Department ID#'.$dep1);
                            }
                        }
                        echo json_encode(array("status" => TRUE));
                    }
                    else {

                        echo json_encode(array('status'=>FALSE));

                    }

                }
                else {
                    //todo teckpack only

                    $data1 = array(

                        'datetime'=> $details['datetime'],
                        'emp_department'=>3,
                        'event_type'=> $details['event_type'],
                        'event_title'=> $details['event_title'],
                        'event_details'=> $details['event_details'],
                        'from_date'=> $details['event_from'],
                        'to_date'=> $details['event_to'],
                    );

                    if ($this->db->insert('hr_pay_events', $data1)) {

                        $qid = $this->db->insert_id();

                        $all_employees = $this->events_mod->get_al_employees();
                        foreach ($all_employees as $employees) {

                            $data2 = array(
                                'employee' => $employees->id,
                                'department' => $employees->department,
                                'event_id' => $qid,
                                'from_date' => $details['event_from'],
                                'to_date' => $details['event_to'],

                            );

                            $this->db->insert('hr_pay_event_list', $data2);
                            //send email -----start------
                            if ($this->input->post('send_email') == 1) {

                                $data = array(
                                    'baseurl' => base_url(),
                                    'employee_name' => $employees->first_name.' '. $employees->last_name,
                                    'datetime' => $details['datetime'],
                                    'event_title' => $details['event_title'],
                                    'event_details' => $details['event_details'],
                                    'event_type' => $this->events_mod->get_event_type(array('id' => $details['event_type']))->type,
                                );

                                $message = $this->load->view('email/index', $data, true);
                                $this->email->clear();
                                $this->email->from($this->config->item('admin_email', 'ion_auth'), $this->config->item('site_title', 'ion_auth'));
                                $this->email->to($employees->office_email);
                                $this->email->subject("Arrow HRMS - New Event - ".$details['event_title']);
                                $this->email->set_mailtype("html");
                                $this->email->message($message);

                                if ($this->email->send()) {

                                    $this->system_log->create_system_log("Events & Announcements-Email", "Success", "All employees-New Event Added to Employee ID #".$employees->employee_id.'-Event ID #'.$qid);
                                    echo json_encode(array("status" => TRUE));

                                }
                                //send email -----end------
                            }
                            $this->system_log->create_system_log("Events & Announcements", "Success", "New Event Added to All Employees - Event ID #" . $qid);
                        }
//                        $this->system_log->create_system_log("Events & Announcements", "Success", "New Event Added  ID #".$qid);
                        echo json_encode(array("status" => TRUE));
                    }



                        //todo teckpack only

                        //todo common
//                    if (form_error('employee')) {
//                                       $data['inputerror'][] = 'employee';
//                    $data['error_string'][] = form_error('employee');
//                }
//                if (form_error('department')) {
//                    $data['inputerror'][] = 'department';
//                    $data['error_string'][] = form_error('department');
//                }
//
//                echo json_encode($data);
//                exit;

                        //todo common

                }
            }
        }
        else if ($method == "edit"){

            $this->form_validation->set_rules('event_title', 'Event Title', 'trim|required');
            $this->form_validation->set_rules('datetime', 'Event Date and Time', 'trim|required');
         /* $this->form_validation->set_rules('event_from', 'Notify From Date', 'trim|required');
            $this->form_validation->set_rules('event_to', 'Notify To Date', 'trim|required');*/
            $this->form_validation->set_rules('event_type', 'Event Type', 'trim|required');

            $data = array();
            $data['error_string'] = array();
            $data['inputerror'] = array();
            $data['status'] = FALSE;
            $data['error'] = "validation_error";

            if($this->form_validation->run() === FALSE){


                if (form_error('event_title')) {
                    $data['inputerror'][] = 'event_title';
                    $data['error_string'][] = form_error('event_title');
                }
                if (form_error('datetime')) {
                    $data['inputerror'][] = 'datetime';
                    $data['error_string'][] = form_error('datetime');
                }
//                if (form_error('event_from')) {
//                    $data['inputerror'][] = 'event_from';
//                    $data['error_string'][] = form_error('event_from');
//                }
//                if (form_error('event_to')) {
//                    $data['inputerror'][] = 'event_to';
//                    $data['error_string'][] = form_error('event_to');
//                }
                if (form_error('event_type')) {
                    $data['inputerror'][] = 'event_type';
                    $data['error_string'][] = form_error('event_type');
                }

                echo json_encode($data);
                exit;

            }
            else{

                $details = $this->input->post();

                //check assign employees or department
                if(isset($details['employee'])){

                    $data1=array(

                        'datetime'=> $details['datetime'],
                        'emp_department'=>1,
                        'event_type'=> $details['event_type'],
                        'event_title'=> $details['event_title'],
                        'event_details'=> $details['event_details'],
                        'from_date'=> $details['event_from'],
                        'to_date'=> $details['event_to'],
                    );

                    if($this->db->update('hr_pay_events', $data1,array('id'=>$details['event_id']))){

                        if($this->db->delete('hr_pay_event_list',array('event_id'=>$details['event_id']))){

                            foreach ($this->input->post('employee') as $emp1){

                                if($this->events_mod->get_emp_department(array('id'=>$emp1))) {
                                    $department=$this->events_mod->get_emp_department(array('id'=>$emp1))->department;
                                }
                                else {
                                    $department=0;
                                }

                                $data2=array(

                                    'employee'=>$emp1,
                                    'department'=>$department,
                                    'event_id'=>$details['event_id'],
                                    'from_date'=>$details['event_from'],
                                    'to_date'=>$details['event_to'],

                                );

                                $this->db->insert('hr_pay_event_list', $data2);

                            }

                            $this->system_log->create_system_log("Events & Announcements", "Success", "New Event Added  ID #".$details['event_id']);
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

                        'datetime'=> $details['datetime'],
                        'emp_department'=>2,
                        'event_type'=> $details['event_type'],
                        'event_title'=> $details['event_title'],
                        'event_details'=> $details['event_details'],
                        'from_date'=> $details['event_from'],
                        'to_date'=> $details['event_to'],
                    );

                    if($this->db->update('hr_pay_events', $data1,array('id'=>$details['event_id']))){

                        if($this->db->delete('hr_pay_event_list',array('event_id'=>$details['event_id']))) {

                            foreach ($this->input->post('department') as $dep1) {

                                if ($this->events_mod->get_department_emp(array('department' => $dep1))) {

                                    foreach ($this->events_mod->get_department_emp(array('department' => $dep1)) as $dep2) {

                                        $data2 = array(

                                            'employee' => $dep2->id,
                                            'department' => $dep1,
                                            'event_id' => $details['event_id'],
                                            'from_date' => $details['event_from'],
                                            'to_date' => $details['event_to'],

                                        );

                                        $this->db->insert('hr_pay_event_list', $data2);
                                    }

                                }

                            }

                            $this->system_log->create_system_log("Events & Announcements", "Success", "New Event Added  ID #" . $details['event_id']);
                            echo json_encode(array("status" => TRUE));
                        }
                    }
                    else {

                        echo json_encode(array('status'=>FALSE));

                    }

                }
                else{

                    //todo teckpack

                    $data1=array(

                        'datetime'=> $details['datetime'],
                        'emp_department'=>3,
                        'event_type'=> $details['event_type'],
                        'event_title'=> $details['event_title'],
                        'event_details'=> $details['event_details'],
                        'from_date'=> $details['event_from'],
                        'to_date'=> $details['event_to'],
                    );

                    if($this->db->update('hr_pay_events', $data1,array('id'=>$details['event_id']))){

                        if($this->db->delete('hr_pay_event_list',array('event_id'=>$details['event_id']))) {

                            $all_employees = $this->events_mod->get_al_employees();

                            foreach ($all_employees as $employees) {

                                        $data2 = array(

                                            'employee' => $employees->id,
                                            'department' => $employees->department,
                                            'event_id' => $details['event_id'],
                                            'from_date' => $details['event_from'],
                                            'to_date' => $details['event_to'],

                                        );

                                        $this->db->insert('hr_pay_event_list', $data2);

                            }

                            $this->system_log->create_system_log("Events & Announcements", "Success", "New Event Added  ID #" . $details['event_id']);
                            echo json_encode(array("status" => TRUE));
                        }
                    }
                    else {

                        echo json_encode(array('status'=>FALSE));

                    }

               //todo teckpack

              //todo common
//                    if (form_error('employee')) {
//                        $data['inputerror'][] = 'employee';
//                        $data['error_string'][] = form_error('employee');
//                    }
//                    if (form_error('department')) {
//                        $data['inputerror'][] = 'department';
//                        $data['error_string'][] = form_error('department');
//                    }
//
//                    echo json_encode($data);
//                    exit;

              //todo common

                }


                /*if($this->input->post('send_email')==1){
                    if($project_data =  $this->projects_mod->get_employee_projects_data_for_email($where_proj)){
                        $data = array(
                            'baseurl'	=> base_url(),
                            'employee_name'	=> $project_data->employee_name,
                            'employee_id'	=> $project_data->employee_id,
                            'project_code'	=> $project_data->project_code,
                            'project_name'	=> $project_data->project_name,
                            'module'	=> $project_data->module_name,
                            'work_name'	=> $project_data->name,
                            'work_description'	=> $project_data->work_description,
                            'project_status'	=> $project_data->project_status,
                            'assign_date'	=> $project_data->assign_date,
                            'expected_date'	=> $project_data->expected_date,
                            'completed_date'	=> $project_data->completed_date,
                        );
                        $message = $this->load->view($this->config->item('email_templates', 'ion_auth').$this->config->item('project_mail', 'ion_auth'), $data, true);
                        $this->email->clear();
                        $this->email->from($this->config->item('admin_email', 'ion_auth'), $this->config->item('site_title', 'ion_auth'));
                        $this->email->to($project_data->emp_email);
                        $this->email->subject("Arrow HRMS - New Project Assignment");
                        $this->email->set_mailtype("html");
                        $this->email->message($message);
                        if ($this->email->send()) {
                            $message = 'Project Assignment Updated Email Sent - EMP ID #' . $emp_id.' Project Assign ID #'.$employee_project_id;
                            $this->system_log->create_system_log("Project Management", "Success", $message);
                        }
                    }
                }*/

            }

        }

    }

    public function delete_event_data(){

        $event_id = $this->input->post('id');
        $this->db->trans_start();
        $this->db->where('event_id', $event_id);
        $this->db->delete('hr_pay_event_list');


        $this->db->where('id', $event_id);
        $this->db->delete('hr_pay_events');
        $this->db->trans_complete();


        $this->system_log->create_system_log("Events & Announcements", "Success", "New Event Delete  ID #" . $event_id);
        echo json_encode(array("status" => TRUE));

    }

} 