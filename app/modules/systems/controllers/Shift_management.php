<?php

class Shift_management extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('ion_auth');
        $groups=array('admin','manager');
        // check if user logged in
        if (!$this->ion_auth->logged_in()||!$this->ion_auth->in_group($groups)) {
            redirect('index.php/auth/login');
        }

        $this->load->model('shift_management_mod');
        $this->load->library('system_log');
    }

    function shift_schedule()
    {

        $data['employees'] = $this->shift_management_mod->getAllEmployees();
        $data['EmpCategories'] = $this->shift_management_mod->getAllEmpCategories();
        $data['ShiftSchedules'] = $this->shift_management_mod->getShiftSchedules();

        $this->load->view('common/header');
        $this->load->view('shift/schedule', $data);
        $this->load->view('common/footer');

    }

    public function get_schedules_data()
    {
        $this->load->library('datatables');
        $this->datatables->select("id,code,schedule_name,schedule_work_hours,schedule_start_time,schedule_end_time,halfday_time_mo,	halfday_time_ev,late_time_LA,late_time_EL", FALSE);
        $this->datatables->from('hr_pay_m_shift_schedules');
        $this->datatables->add_column("Actions", "<a class='btn btn-default tbl-action' href='javascript:;' title='Add' onclick='assign_categories(" . '$1' . ")'>
                <i class='fa fa-plus-circle'></i> Assign Categories
            </a><a class='btn btn-default tbl-action' href='javascript:;' title='Edit' onclick='edit_schedule(" . '$1' . ")'>
                <i class='fa fa-pencil'></i> Edit
            </a>
            ", "id");
        //$this->datatables->unset_column('id');
        echo $this->datatables->generate();
    }

    public function save_schedule($method)
    {
        if ($method == "add"){
            $this->form_validation->set_rules('schedule_name', 'Schedule Name', 'trim|required');
            $this->form_validation->set_rules('code', 'Code', 'trim|required|is_unique[hr_pay_m_shift_schedules.code]');
            if($this->form_validation->run() === FALSE){

                $data = array();
                $data['error_string'] = array();
                $data['inputerror'] = array();
                $data['status'] = FALSE;
                $data['error'] = "validation_error";
                if (form_error('schedule_name')) {
                    $data['inputerror'][] = 'schedule_name';
                    $data['error_string'][] = form_error('schedule_name');
                }
                if (form_error('code')) {
                    $data['inputerror'][] = 'code';
                    $data['error_string'][] = form_error('code');
                }
                echo json_encode($data);
                exit;

            }
            else{

                $details = $this->input->post();
                $data2['code'] = $this->input->post('code');
                $data2['schedule_name'] = $this->input->post('schedule_name');
                $data2['schedule_work_hours'] = $this->input->post('schedule_work_hours');
                $data2['schedule_start_time'] = $this->input->post('schedule_start_time');
                $data2['schedule_end_time'] = $this->input->post('schedule_end_time');
                $data2['halfday_time_mo'] = $this->input->post('halfday_time_mo');
                $data2['halfday_time_ev'] = $this->input->post('halfday_time_ev');
                $data2['late_time_LA'] = $this->input->post('late_time_LA');
                $data2['late_time_EL'] = $this->input->post('late_time_EL');

                $data2['session'] = $this->input->post('session');
                $data2['max_days'] = $this->input->post('max_days');
                $data2['shift_type'] = $this->input->post('shift_type');

                if($this->input->post('LM')){
                    $data2['LM'] = "YES";
                }
                else{
                    $data2['LM'] = "NO";
                }
                if($this->input->post('LF')){
                    $data2['LF'] = "YES";
                }
                else{
                    $data2['LF'] = "NO";
                }
                if($this->input->post('FM')){
                    $data2['FM'] = "YES";
                }
                else{
                    $data2['FM'] = "NO";
                }
                if($this->input->post('FF')){
                    $data2['FF'] = "YES";
                }
                else{
                    $data2['FF'] = "NO";
                }

                if ($this->db->insert('hr_pay_m_shift_schedules', $data2)){
                    $sid = $this->db->insert_id();
                    $this->system_log->create_system_log("Shift Management", "Success", "New Shift Schedule Added  ID #".$sid);
                    echo json_encode(array("status" => TRUE));
                } else {
                    echo json_encode(array("status" => FALSE));
                }
            }
        }
        else if ($method == "edit"){
            $this->form_validation->set_rules('schedule_name', 'Schedule Name', 'trim|required');
            $this->form_validation->set_rules('code', 'Code', 'trim|required');
            if ($this->form_validation->run() === FALSE) {
                $data = array();
                $data['error_string'] = array();
                $data['inputerror'] = array();
                $data['status'] = FALSE;
                $data['error'] = "validation_error";
                if (form_error('schedule_name')) {
                    $data['inputerror'][] = 'schedule_name';
                    $data['error_string'][] = form_error('schedule_name');
                }
                if (form_error('code')) {
                    $data['inputerror'][] = 'code';
                    $data['error_string'][] = form_error('code');
                }
                echo json_encode($data);
                exit;
            } else {
                $schedule_id = $this->input->post('schedule_id');
                $details = $this->input->post();
                $data2['code'] = $this->input->post('code');
                $data2['schedule_name'] = $this->input->post('schedule_name');
                $data2['schedule_work_hours'] = $this->input->post('schedule_work_hours');
                $data2['schedule_start_time'] = $this->input->post('schedule_start_time');
                $data2['schedule_end_time'] = $this->input->post('schedule_end_time');
                $data2['halfday_time_mo'] = $this->input->post('halfday_time_mo');
                $data2['halfday_time_ev'] = $this->input->post('halfday_time_ev');
                $data2['late_time_LA'] = $this->input->post('late_time_LA');
                $data2['late_time_EL'] = $this->input->post('late_time_EL');

                $data2['session'] = $this->input->post('session');
                $data2['max_days'] = $this->input->post('max_days');
                $data2['shift_type'] = $this->input->post('shift_type');

                if($this->input->post('LM')){
                    $data2['LM'] = "YES";
                }
                else{
                    $data2['LM'] = "NO";
                }
                if($this->input->post('LF')){
                    $data2['LF'] = "YES";
                }
                else{
                    $data2['LF'] = "NO";
                }
                if($this->input->post('FM')){
                    $data2['FM'] = "YES";
                }
                else{
                    $data2['FM'] = "NO";
                }
                if($this->input->post('FF')){
                    $data2['FF'] = "YES";
                }
                else{
                    $data2['FF'] = "NO";
                }

                $this->db->where('id', $schedule_id);
                if ($this->db->update('hr_pay_m_shift_schedules', $data2)){
                    $this->db->trans_complete();
                    $this->system_log->create_system_log("Shift Management", "Success", "Updated  Shift Schedule ID #".$schedule_id);
                    echo json_encode(array("status" => TRUE));
                } else {
                    echo json_encode(array("status" => FALSE));
                }
            }
        }

    }

    public function get_schedule_data_by_id($for)
    {
        $where = array(
            'id' => $for
        );
        $data = $this->shift_management_mod->get_shift_schedule($where);
        echo json_encode($data->row());
    }

    public function get_schedule_assign_data($id)
    {
        $main_data = $this->shift_management_mod->schedule_assign_data($id);
        $emp_cate_data = $this->shift_management_mod->getAllEmpCategories();
        echo json_encode(array(
            'status' => true,
            'main_data' => $main_data,
            'emp_cate_data' => $emp_cate_data
        ));
        exit;
    }

    public function save_assign()
    {

        $details = $this->input->post();
        $schedule_shift_id = $details['schedule_shift_id'];

        //var_dump($details);

        if (isset($details['categories_list'])) {
            $q1 = $this->db->query("SELECT * FROM  hr_pay_employee_schedule_assignments WHERE s_id='$schedule_shift_id' ");
            if ($q1->num_rows() > 0) {
                if($this->shift_management_mod->delete_shift_assigned($schedule_shift_id)){
                    foreach ($details['categories_list'] as $key => $value) {
                        if (!empty($details['categories_list'][$key])) {
                            $insert_assign_data = array('s_id' => $schedule_shift_id, 'c_id' => $details['categories_list'][$key]);
                            $this->db->insert('hr_pay_employee_schedule_assignments', $insert_assign_data);
                            unset($insert_assign_data);
                        }
                    }
                }
            } else{
                foreach ($details['categories_list'] as $key => $value) {
                    if (!empty($details['categories_list'][$key])) {
                        $insert_assign_data = array('s_id' => $schedule_shift_id, 'c_id' => $details['categories_list'][$key]);
                        $this->db->insert('hr_pay_employee_schedule_assignments', $insert_assign_data);
                        unset($insert_assign_data);
                    }
                }
            }



            $this->system_log->create_system_log("Shift Management", "Success", "Employee Categories Updated for Shift ID #".$schedule_shift_id);
            echo json_encode(array("status" => TRUE));
        }else{
            //
            if($this->shift_management_mod->delete_shift_assigned($schedule_shift_id)){

                $this->system_log->create_system_log("Shift Management", "Success", "Removed All Employee Categories Updated for Shift ID #".$schedule_shift_id);
                echo json_encode(array("status" => TRUE));
            }
        }
    }
} 