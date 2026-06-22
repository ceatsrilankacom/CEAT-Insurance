<?php

class Performance_review extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('ion_auth');
        $groups=array('admin','manager','employee');
        // check if user logged in
        if (!$this->ion_auth->logged_in()||!$this->ion_auth->in_group($groups)) {
            redirect('index.php/auth/login');
        }

        $this->load->model('employee_list_model');
        $this->load->model('performance_review_mod');
        $this->load->library('system_log');
    }

    function review_questionnaire()
    {
        $data['employeeData'] = $this->performance_review_mod->getAllEmployees();
        $this->load->view('common/header');
        $this->load->view('performance_review/review_questionnaire', $data);
        //$this->load->view('performance_review/review_ques_template', $data);
        //$this->load->view('performance_review/index', $data);
        $this->load->view('common/footer');
    }


    public function create_review_questionnaire(){

        $data['employeeData'] = $this->performance_review_mod->getAllEmployees();
        $this->load->view('common/header');
        $this->load->view('performance_review/review_ques_template', $data);
        $this->load->view('common/footer');
    }

    public function save_quiz($method)
    {
        if ($method == "add") {
            $this->form_validation->set_rules('template_name', 'Template Name', 'trim|required|is_unique[hr_pay_emp_performance_review_q_main.name]');
            if ($this->form_validation->run() === FALSE) {
                $data = array();
                $data['error_string'] = array();
                $data['inputerror'] = array();
                $data['status'] = FALSE;
                $data['error'] = "validation_error";
                if (form_error('template_name')) {
                    $data['inputerror'][] = 'template_name';
                    $data['error_string'][] = form_error('template_name');
                }
                echo json_encode($data);
                exit;
            } else {
                $details = $this->input->post();
                $data2['name'] = $this->input->post('template_name');
                $data2['description'] = $this->input->post('description');
                $data2['type'] = $this->input->post('type');


                    if ($this->db->insert('hr_pay_emp_performance_review_q_main', $data2)){
                        $qid = $this->db->insert_id();

                        if (isset($details['question'])) {
                            foreach ($details['question'] as $key => $value) {

                                if (!empty($details['question'][$key])) {

                                    if($details['field_validation'][$key]=='on'){

                                        $details['field_validation'][$key]='required';
                                    }else{

                                        $details['field_validation'][$key]='none';
                                    }
                                        $insert_data = array(
                                            'q_id' => $qid,
                                            'code' => $details['code'][$key],
                                            'question' => $details['question'][$key],
                                            'field_type' => $details['field_type'][$key],
                                            'field_validation' => $details['field_validation'][$key],
                                            'options' => $details['options'][$key],
                                            'help' => $details['help'][$key],
                                            'group' => $details['group'][$key]
                                        );
                                        $this->db->insert('hr_pay_emp_performance_review_q_data', $insert_data);
                                        unset($insert_data);
                                }
                            }
                            $this->system_log->create_system_log("Performance Review Management", "Success", "New Questionnaire Template Added  ID #".$qid);
                            echo json_encode(array("status" => TRUE, "id"=>$qid));
                        }
                    } else {
                        echo json_encode(array("status" => FALSE));
                    }
            }
        } else if ($method == "edit"){
            $this->form_validation->set_rules('template_name', 'Template Name', 'trim|required');
            if ($this->form_validation->run() === FALSE) {
                $data = array();
                $data['error_string'] = array();
                $data['inputerror'] = array();
                $data['status'] = FALSE;
                $data['error'] = "validation_error";
                if (form_error('template_name')) {
                    $data['inputerror'][] = 'template_name';
                    $data['error_string'][] = form_error('template_name');
                }
                echo json_encode($data);
                exit;
            } else {

                $template_id = $this->input->post('template_id');
                $details = $this->input->post();
                $data2['name'] = $this->input->post('template_name');
                $data2['description'] = $this->input->post('description');
                $data2['type'] = $this->input->post('type');

                $this->db->where('id', $template_id);
                if ($this->db->update('hr_pay_emp_performance_review_q_main', $data2)){
                    $this->db->trans_complete();

                    if (isset($details['question'])) {
                        foreach ($details['question'] as $key => $value) {
                            if (!empty($details['question'][$key])) {
                                $q_id = $details['quiz_id'][$key];

                                $q1 = $this->db->query("SELECT * FROM  hr_pay_emp_performance_review_q_data WHERE q_id='$template_id' AND id = '$q_id'");
                                if ($q1->num_rows() > 0) {

                                    if($details['field_validation'][$key]=='on'){

                                        $details['field_validation'][$key]='required';
                                    }else{

                                        $details['field_validation'][$key]='none';
                                    }
                                    $update_data = array(
                                        'code' => $details['code'][$key],
                                        'question' => $details['question'][$key],
                                        'field_type' => $details['field_type'][$key],
                                        'field_validation' => $details['field_validation'][$key],
                                        'options' => $details['options'][$key],
                                        'help' => $details['help'][$key],
                                        'group' => $details['group'][$key]
                                    );
                                    $this->db->where('id', $q_id);
                                    $this->db->where('q_id', $template_id);
                                    $this->db->update('hr_pay_emp_performance_review_q_data', $update_data);
                                    $this->db->trans_complete();
                                    unset($update_data);
                                } else {

                                    if($details['field_validation'][$key]=='on'){

                                        $details['field_validation'][$key]='required';
                                    }else{

                                        $details['field_validation'][$key]='none';
                                    }
                                    $insert_data = array(
                                        'q_id' => $template_id,
                                        'code' => $details['code'][$key],
                                        'question' => $details['question'][$key],
                                        'field_type' => $details['field_type'][$key],
                                        'field_validation' => $details['field_validation'][$key],
                                        'options' => $details['options'][$key],
                                        'help' => $details['help'][$key],
                                        'group' => $details['group'][$key]
                                    );
                                    $this->db->insert('hr_pay_emp_performance_review_q_data', $insert_data);
                                    unset($insert_data);
                                }
                            }
                        }
                        $this->system_log->create_system_log("Performance Review Management", "Success", "Updated Questionnaire Template Added  ID #".$template_id);
                        echo json_encode(array("status" => TRUE));
                    }
                } else {
                    echo json_encode(array("status" => FALSE));
                }
            }
        }

    }

    public function get_review_questionnaire_data()
    {
        $this->load->library('datatables');
        $this->datatables->select("id,name,description,type", FALSE);
        $this->datatables->from('hr_pay_emp_performance_review_q_main');
        $this->datatables->add_column("Actions",
        "<a class='btn btn-default tbl-action' href='javascript:void();' title='Edit' onclick='edit_quiz(" . '$1' . ")'>
         <i class='fa fa-pencil'></i> Edit</a>", "id");
        //<a class='btn btn-default tbl-action' href='javascript:void();' title='View' onclick='show_quiz(" . '$1' . ")'>
//        <i class='fa fa-eye'></i> View</a>
        //$this->datatables->unset_column('id');
        echo $this->datatables->generate();
    }

    public function get_quiz_data_by_id($id)
    {
        $main_data = $this->performance_review_mod->GetReviewQuizMainData($id);
        $sub_data = $this->performance_review_mod->GetReviewQuizSubData($id);
        echo json_encode(array(
            'status' => true,
            'main_data' => $main_data,
            'sub_data' => $sub_data,
        ));
        exit;
    }

    public function get_quiz_data_to_show($id){

        $data['main_data'] = $this->performance_review_mod->GetReviewQuizMainData($id);
        $data['sub_data'] = $this->performance_review_mod->GetReviewQuizSubData($id);
        $this->load->view('performance_review/review_ques_form', $data);

    }


    function performance_review()
    {
        $data['employeeData'] = $this->performance_review_mod->getAllEmployees();
        $data['QuizTemplateData'] = $this->performance_review_mod->getAllReviewQuizTemplates();
        $this->load->view('common/header');
        $this->load->view('performance_review/performance_reviews', $data);
        $this->load->view('common/footer');
    }


    public function save_review($method)
    {
        if ($method == "add") {

            $this->form_validation->set_rules('employee', 'Employee', 'trim|required');
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
                echo json_encode($data);
                exit;
            } else {

                $details = $this->input->post();
                $data2['employee'] = $this->input->post('employee');
                $data2['coordinator'] = $this->input->post('coordinator');
                $data2['template'] = $this->input->post('template');
                $data2['status'] = $this->input->post('status');
                $data2['review_datetime'] = $this->input->post('review_datetime');
                $data2['review_period_start_date'] = $this->input->post('review_period_start_date');
                $data2['review_period_end_date'] = $this->input->post('review_period_end_date');
                $data2['self_assessment_due_date'] = $this->input->post('self_assessment_due_date');
                $data2['note'] = $this->input->post('note');

                if ($this->db->insert('hr_pay_emp_performance_review', $data2)){
                    $qid = $this->db->insert_id();

                        $this->system_log->create_system_log("Performance Review Management", "Success", "New Review Added  ID #".$qid);
                        echo json_encode(array("status" => TRUE));
                } else {
                    echo json_encode(array("status" => FALSE));
                }
            }
        } else if ($method == "edit"){
            $this->form_validation->set_rules('employee', 'Employee', 'trim|required');
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
                echo json_encode($data);
                exit;
            } else {
                $review_id = $this->input->post('review_id');
                $details = $this->input->post();
                $data2['employee'] = $this->input->post('employee');
                $data2['coordinator'] = $this->input->post('coordinator');
                $data2['template'] = $this->input->post('template');
                $data2['status'] = $this->input->post('status');
                $data2['review_datetime'] = $this->input->post('review_datetime');
                $data2['review_period_start_date'] = $this->input->post('review_period_start_date');
                $data2['review_period_end_date'] = $this->input->post('review_period_end_date');
                $data2['self_assessment_due_date'] = $this->input->post('self_assessment_due_date');
                $data2['note'] = $this->input->post('note');

                $this->db->where('id', $review_id);
                if ($this->db->update('hr_pay_emp_performance_review', $data2)){
                    $this->db->trans_complete();
                    $this->system_log->create_system_log("Performance Review Management", "Success", "Updated  Review ID #".$review_id);
                    echo json_encode(array("status" => TRUE));
                } else {
                    echo json_encode(array("status" => FALSE));
                }
            }
        }

    }

    public function get_review_data()
    {
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
                                    hr_pay_emp_performance_review_q_main.type,
                                    hr_pay_emp_performance_review.note", FALSE);
        $this->datatables->from('hr_pay_emp_performance_review');
        $this->datatables->join('hr_pay_emp_performance_review_q_main', 'hr_pay_emp_performance_review_q_main.id=hr_pay_emp_performance_review.template', 'left');
        $this->datatables->join('hr_pay_employees emp', 'hr_pay_emp_performance_review.employee=emp.id', 'left');
        $this->datatables->join('hr_pay_employees coord', 'hr_pay_emp_performance_review.coordinator=coord.id', 'left');
        $this->datatables->add_column("Actions", "<a class='btn btn-default tbl-action' href='javascript:void();' title='Edit' onclick='edit_review(" . '$1' . ")'>
        <i class='fa fa-pencil'></i> Edit</a>

        </a><a class='btn btn-default tbl-action' href='javascript:void();' title='View' onclick='view_submitted_form(" . '$1' . ")'>
        <i class='fa fa-eye'></i> View</a>", "id");
        //$this->datatables->unset_column('id');
        echo $this->datatables->generate();
    }

    public function get_review_data_by_id($id)
    {
        $review_data = $this->performance_review_mod->GetReviewData($id);
        echo json_encode(array(
            'status' => true,
            'review_data' => $review_data,
        ));
        exit;
    }


    public function get_review_quiz_data_by_id($id)
    {

        $review_data = $this->performance_review_mod->GetReviewData($id);
        $employee = $this->performance_review_mod->GetEmpDataByID($review_data->employee);
        $coordinator = $this->performance_review_mod->GetEmpDataByID($review_data->coordinator);
        $QuizTemplateData = $this->performance_review_mod->getAllReviewQuizTemplateByID($review_data->template);
       // $QuizTemplateData = $this->performance_review_mod->getAllReviewQuizwithAnswersByID($review_data->id,$review_data->template);


        echo json_encode(array(
            'status' => true,
            'review_data' => $review_data,
            'employee' => $employee->first_name." ".$employee->last_name,
            'coordinator' => $coordinator->first_name." ".$coordinator->last_name,
            'QuizTemplateData' => $QuizTemplateData
        ));


        exit;
    }

    public function get_review_quiz_data_edit($id)
    {

        $review_data = $this->performance_review_mod->GetReviewData($id);
        $employee = $this->performance_review_mod->GetEmpDataByID($review_data->employee);
        $coordinator = $this->performance_review_mod->GetEmpDataByID($review_data->coordinator);
        //$QuizTemplateData = $this->performance_review_mod->getAllReviewQuizTemplateByID($review_data->template);


        $QuizTemplateData = $this->performance_review_mod->getAllReviewQuizwithAnswersByID($review_data->id,$review_data->template);


        echo json_encode(array(
            'status' => true,
            'review_data' => $review_data,
            'employee' => $employee->first_name." ".$employee->last_name,
            'coordinator' => $coordinator->first_name." ".$coordinator->last_name,
            'QuizTemplateData' => $QuizTemplateData
        ));


        exit;
    }

    public function save_quiz_form()
    {
        $review_quiz_id = $this->input->post('review_quiz_id');
        $details = $this->input->post();
//
//        $q1 = $this->db->query("SELECT * FROM  hr_pay_emp_performance_review_form_data WHERE r_id='$review_quiz_id' ");
//        if ($q1->num_rows() > 0) {
//            $this->db->query("DELETE FROM  hr_pay_emp_performance_review_form_data WHERE r_id='$review_quiz_id' ");
//        }

            if (isset($details['question'])) {
                foreach ($details['question'] as $key => $value) {
                    if (!empty($details['question'][$key])) {
                            $insert_data = array(
                                'r_id' => $review_quiz_id,
                                'q_id' => $details['question'][$key],
                                'answer' => $details['field_type'][$key]
                            );

                            $this->db->insert('hr_pay_emp_performance_review_form_data', $insert_data);
                            unset($insert_data);
                    }
                }
                $this->system_log->create_system_log("Performance Review Management", "Success", "Questionnaire Form  Added  ID #".$review_quiz_id);
                echo json_encode(array("status" => TRUE));
            } else {
                echo json_encode(array("status" => FALSE));
            }
    }

    public function update_quiz_form()
    {
        $review_quiz_id = $this->input->post('review_quiz_id_edit');
        $details = $this->input->post();
//
//        $q1 = $this->db->query("SELECT * FROM  hr_pay_emp_performance_review_form_data WHERE r_id='$review_quiz_id' ");
//        if ($q1->num_rows() > 0) {
//            $this->db->query("DELETE FROM  hr_pay_emp_performance_review_form_data WHERE r_id='$review_quiz_id' ");
//        }

        if (isset($details['question'])) {
            foreach ($details['question'] as $key => $value) {
                if (!empty($details['question'][$key])) {
                    $update_data = array(

                        'q_id' => $details['question'][$key],
                        'answer' => $details['field_type'][$key]
                    );
                    $this->db->where('hr_pay_emp_performance_review_form_data.r_id', $review_quiz_id);
                    $this->db->where('hr_pay_emp_performance_review_form_data.id', $details['rid'][$key]);
                    $this->db->update('hr_pay_emp_performance_review_form_data', $update_data);

                    unset($update_data);
                }
            }
            $this->system_log->create_system_log("Performance Review Management", "Success", "Questionnaire Form  updated  ID #".$review_quiz_id);
            echo json_encode(array("status" => TRUE));
        } else {
            echo json_encode(array("status" => FALSE));
        }
    }

    //View QuiZ Submitted data
    public function get_quiz_form_data_by_id($id)
    {
        $review_data = $this->performance_review_mod->GetReviewData($id);
        $employee = $this->performance_review_mod->GetEmpDataByID($review_data->employee);
        $coordinator = $this->performance_review_mod->GetEmpDataByID($review_data->coordinator);
        $QuizTemplateData = $this->performance_review_mod->getAllReviewQuizwithAnswersByID($review_data->id,$review_data->template);
        echo json_encode(array(
            'status' => true,
            'review_data' => $review_data,
            'employee' => $employee->first_name." ".$employee->last_name,
            'coordinator' => $coordinator->first_name." ".$coordinator->last_name,
            'QuizTemplateData' => $QuizTemplateData
        ));
        exit;
    }


    function final_performance_review()
    {
        $data['employeeData'] = $this->performance_review_mod->getAllEmployees();
        $data['QuizTemplateData'] = $this->performance_review_mod->getAllReviewQuizTemplates();
        $this->load->view('common/header');
        $this->load->view('performance_review/final_performance_review', $data);
        $this->load->view('common/footer');
    }

    public function get_review_data_summary()
    {
        $this->load->library('datatables');
        $this->datatables->select("hr_pay_emp_performance_review.id,
                                    CONCAT(emp.first_name ,' ', emp.last_name) AS employee,
                                    CONCAT(coord.first_name ,' ', coord.last_name) AS coordinator,
                                    hr_pay_emp_performance_review.review_datetime,
                                    hr_pay_emp_performance_review.review_period_start_date,
                                    hr_pay_emp_performance_review.review_period_end_date", FALSE);
        $this->datatables->from('hr_pay_emp_performance_review');
        $this->datatables->join('hr_pay_emp_performance_review_q_main', 'hr_pay_emp_performance_review_q_main.id=hr_pay_emp_performance_review.template', 'left');
        $this->datatables->join('hr_pay_employees emp', 'hr_pay_emp_performance_review.employee=emp.id', 'left');
        $this->datatables->join('hr_pay_employees coord', 'hr_pay_emp_performance_review.coordinator=coord.id', 'left');
        $this->datatables->group_by('emp.id,coord.id');
        $this->datatables->add_column("Actions", "</a><a class='btn btn-default tbl-action' href='javascript:void();' title='View' onclick='view_submitted_form(" . '$1' . ")'>
        <i class='fa fa-eye'></i> View</a>", "id");

       //$this->datatables->unset_column('hr_pay_emp_performance_review.employee');
        echo $this->datatables->generate();
    }

    public function get_review_quiz_data_by_id_final($id)
    {

        $review_data = $this->performance_review_mod->GetReviewData($id);
        $employee = $this->performance_review_mod->GetEmpDataByID($review_data->employee);
        $coordinator = $this->performance_review_mod->GetEmpDataByID($review_data->coordinator);
        $all_forms=$this->performance_review_mod->GetAllForms($review_data->employee,$review_data->coordinator,$review_data->review_period_start_date,$review_data->review_period_end_date);


        for($i=0;$i<sizeof($all_forms);$i++){

            $QuizTemplateData[] = $this->performance_review_mod->getAllReviewQuizwithAnswersByID($all_forms[$i]->id,$all_forms[$i]->template);

        }

        echo json_encode(array(
            'status' => true,
            'review_data' => $review_data,
            'employee' => $employee->first_name." ".$employee->last_name,
            'coordinator' => $coordinator->first_name." ".$coordinator->last_name,
            'QuizTemplateData' => $QuizTemplateData
        ));


    }

    // ----------------- Self Performance Review ------------------


    function performance_review_self()
    {

      //$this->permissions->check_permission('access');
        $data['employeeData'] = $this->performance_review_mod->getAllEmployees();

        $this->load->view('common/header');
        $this->load->view('performance_review/self_performance_review', $data);
        $this->load->view('common/footer');
    }

    function check_self_assess_date(){

        $emp_id = USER_ID;

        $self_assess_date = $this->performance_review_mod->GetSelfAssessDate($emp_id);


        for($i=0;$i<sizeof($self_assess_date);$i++){

        $data[]=$self_assess_date[$i];

        }


        echo json_encode($data);
    }

}