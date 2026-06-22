<?php
/**
 * Created by PhpStorm.
 * User: S.Priyadarshan
 * Date: 01-Jun-16
 * Time: 11:08 AM
 */
// Created by S.Priyadarshan on 01-06-2016 //

class Projects extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library('ion_auth');

        // check if user logged in
        if (!$this->ion_auth->logged_in())
        {
            redirect('index.php/auth/login');
        }

        if(PROJECTS==0) {
            $this->session->set_flashdata('message', "Module not enabled");
            redirect('/');
        }

        ini_set('display_errors', 0);
        error_reporting(0);

        $this->load->database();
        $this->load->model('projects_mod');
        $this->load->model('employee_list_model');
        date_default_timezone_set("Asia/Colombo");
        $this->currentTime = date('Y-m-d H:i:s');

        $this->load->library('system_log');
    }

    public function index()
    {
        $projects_structure_arr = $this->get_table_structure('hr_pay_employee_projects');
        $data['form']['hr_pay_employee_projects'] = array();
        foreach($projects_structure_arr->result() as $project_structure)
        {
            $class = "form-control ";
            if (!($project_structure->Field == "_created_" || $project_structure->Field == "_updated_"))
            {
                $output = array();
                if($project_structure->Null == "YES")
                {
                    $class .= "input-optional ";
                }

                if($project_structure->Field == "project_id")
                {
                    $class .= "input-hidden ";
                    $output['form_field'] = '<input name="' . $project_structure->Field . '"  id="' . $project_structure->Field . '" type="hidden" class="' . $class . '" value="" />';
                }
                else
                {
                    $output['label'] = ucfirst(str_replace("_", " ", $project_structure->Field));
                    if($project_structure->Key !== "MUL")
                    {
                        if(preg_match("/^varchar/i", $project_structure->Type))
                        {
                            $output['form_field'] = '<input name="' . $project_structure->Field . '" id="' . $project_structure->Field . '" placeholder="' . ucfirst(str_replace("_", " ", $project_structure->Field)) . '" class="' . $class . '" type="text">';
                        }
                        if(preg_match("/^int/i", $project_structure->Type) || preg_match("/^bigint/i", $project_structure->Type))
                        {
                            $output['form_field'] = '<input name="' . $project_structure->Field . '" id="' . $project_structure->Field . '" placeholder="' . ucfirst(str_replace("_", " ", $project_structure->Field)) . '" class="' . $class . '" type="number">';
                        }
                        if(preg_match("/^decimal/i", $project_structure->Type) || preg_match("/^float/i", $project_structure->Type) || preg_match("/^double/i", $project_structure->Type))
                        {
                            $output['form_field'] = '<input name="' . $project_structure->Field . '" id="' . $project_structure->Field . '" placeholder="' . ucfirst(str_replace("_", " ", $project_structure->Field)) . '" class="' . $class . '" type="number" step="any" min="0">';
                        }
                        if(preg_match("/^date/i", $project_structure->Type))
                        {
                            $output['form_field'] = '<input name="' . $project_structure->Field . '" id="' . $project_structure->Field . '" placeholder="' . ucfirst(str_replace("_", " ", $project_structure->Field)) . '" class="' . $class . ' date-input" type="text">';
                        }
                        if(preg_match("/^enum/i", $project_structure->Type))
                        {
                            $output['form_field'] = '<select name="' . $project_structure->Field . '" id="' . $project_structure->Field . '" class="' . $class . '">';
                            //$output['form_field'] .= '<option value="">-- SELECT --</option>';
                            $enum = explode(",",substr($project_structure->Type,5,-1));
                            foreach($enum as $val)
                            {
                                $output['form_field'] .= '<option value="' . trim($val, "'") . '">' . trim($val, "'") . '</option>';
                            }
                            $output['form_field'] .= '</select>';
                        }
                        if(preg_match("/^text/i", $project_structure->Type))
                        {
                            $output['form_field'] = '<textarea name="' . $project_structure->Field . '" id="' . $project_structure->Field . '" class="' . $class . '"></textarea>';
                        }
                    }
                    else
                    {
                        if($project_structure->Field == "project_type")
                        {
                            //$where = "status = 'Active'";
                            $project_type_arr = $this->projects_mod->select_all_data('hr_pay_m_project_types');
                            $output['form_field'] = '<select name="' . $project_structure->Field . '" id="' . $project_structure->Field . '" class="' . $class . '">';
                            $output['form_field'] .= '<option value="">-- SELECT --</option>';
                            foreach($project_type_arr->result() as $project_type)
                            {
                                $output['form_field'] .= '<option value="' . $project_type->id . '">' . $project_type->name . '</option>';
                            }
                            $output['form_field'] .= '</select>';
                        }
                    }
                }
                array_push($data['form']['hr_pay_employee_projects'], $output);
            }
        }

        $employee_project_structure_arr = $this->get_table_structure('hr_pay_employee_projects_assign');
        $data['form']['hr_pay_employee_projects_assign'] = array();
        foreach($employee_project_structure_arr->result() as $employee_project_structure)
        {
            $class = "form-control ";
            if (!($employee_project_structure->Field == "_created_" || $employee_project_structure->Field == "_updated_"))
            {
                $output = array();
                if($employee_project_structure->Null == "YES")
                {
                    $class .= "input-optional ";
                }

                if($employee_project_structure->Field == "id")
                {
                    $class .= "input-hidden ";
                    $id_prefix = "employee_project_";
                    $output['form_field'] = '<input name="' . $id_prefix . $employee_project_structure->Field . '" id="' . $id_prefix . $employee_project_structure->Field . '" type="hidden" class="' . $class . '" value="" />';
                }
                else
                {
                    $output['label'] = ucfirst(str_replace("_", " ", $employee_project_structure->Field));
                    if(!($employee_project_structure->Key == "MUL" || $employee_project_structure->Key == "PRI"))
                    {
                        if(preg_match("/^varchar/i", $employee_project_structure->Type))
                        {
                            $output['form_field'] = '<input name="' . $employee_project_structure->Field . '" id="' . $employee_project_structure->Field . '" placeholder="' . ucfirst(str_replace("_", " ", $employee_project_structure->Field)) . '" class="' . $class . '" type="text">';
                        }
                        if(preg_match("/^int/i", $employee_project_structure->Type) || preg_match("/^bigint/i", $employee_project_structure->Type))
                        {
                            $output['form_field'] = '<input name="' . $employee_project_structure->Field . '" id="' . $employee_project_structure->Field . '" placeholder="' . ucfirst(str_replace("_", " ", $employee_project_structure->Field)) . '" class="' . $class . '" type="number">';
                        }
                        if(preg_match("/^enum/i", $employee_project_structure->Type))
                        {
                            $output['form_field'] = '<select name="' . $employee_project_structure->Field . '" id="' . $employee_project_structure->Field . '" class="' . $class . '">';
                            //$output['form_field'] .= '<option value="">-- SELECT --</option>';
                            $enum = explode(",",substr($employee_project_structure->Type,5,-1));
                            foreach($enum as $val)
                            {
                                $output['form_field'] .= '<option value="' . trim($val, "'") . '">' . trim($val, "'") . '</option>';
                            }
                            $output['form_field'] .= '</select>';
                        }
                        if(preg_match("/^date/i", $employee_project_structure->Type))
                        {
                            $output['form_field'] = '<input name="' . $employee_project_structure->Field . '" id="' . $employee_project_structure->Field . '" placeholder="' . ucfirst(str_replace("_", " ", $employee_project_structure->Field)) . '" class="' . $class . ' date-input" type="text">';
                        }
                        if(preg_match("/^text/i", $employee_project_structure->Type))
                        {
                            $output['form_field'] = '<textarea name="' . $employee_project_structure->Field . '" id="' . $employee_project_structure->Field . '" class="' . $class . '"></textarea>';
                        }
                    }
                    else
                    {
                        if($employee_project_structure->Field == "employee")
                        {
                            $employee_arr = $this->projects_mod->getAllEmployees();
                            $output['form_field'] = '<select name="' . $employee_project_structure->Field . '" id="' . $employee_project_structure->Field . '" class="' . $class . '">';
                            $output['form_field'] .= '<option value="">-- SELECT --</option>';
                            foreach($employee_arr->result() as $employee)
                            {
                                $output['form_field'] .= '<option value="' . $employee->id . '">' . $employee->first_name.' '.$employee->last_name . '</option>';
                            }
                            $output['form_field'] .= '</select>';
                        }
                        if($employee_project_structure->Field == "project")
                        {
                            $project_arr = $this->projects_mod->select_all_data('hr_pay_employee_projects');
                            $output['form_field'] = '<select name="' . $employee_project_structure->Field . '" id="' . $employee_project_structure->Field . '" class="' . $class . '">';
                            $output['form_field'] .= '<option value="">-- SELECT --</option>';
                            foreach($project_arr->result() as $project)
                            {
                                $output['form_field'] .= '<option value="' . $project->project_id . '">' . $project->project_code.' - '.$project->project_name . '</option>';
                            }
                            $output['form_field'] .= '</select>';
                        }
                        if($employee_project_structure->Field == "module")
                        {
                            $project_module_arr = $this->projects_mod->select_all_data('hr_pay_m_project_modules');
                            $output['form_field'] = '<select name="' . $employee_project_structure->Field . '" id="' . $employee_project_structure->Field . '" class="' . $class . '">';
                            $output['form_field'] .= '<option value="">-- SELECT --</option>';
                            foreach($project_module_arr->result() as $project)
                            {
                                $output['form_field'] .= '<option value="' . $project->id . '">'.$project->name .'</option>';
                            }
                            $output['form_field'] .= '</select>';
                        }
                        if($employee_project_structure->Field == "work_type")
                        {
                            $project_work_arr = $this->projects_mod->select_all_data('hr_pay_m_project_work_types');
                            $output['form_field'] = '<select name="' . $employee_project_structure->Field . '" id="' . $employee_project_structure->Field . '" class="' . $class . '">';
                            $output['form_field'] .= '<option value="">-- SELECT --</option>';
                            foreach($project_work_arr->result() as $project)
                            {
                                $output['form_field'] .= '<option value="' . $project->id . '">'.$project->name .'</option>';
                            }
                            $output['form_field'] .= '</select>';
                        }
                    }
                }
                array_push($data['form']['hr_pay_employee_projects_assign'], $output);
            }
        }


        $this->load->view('common/header');
        $this->load->view('projects/projects', $data);
        $this->load->view('common/footer');
    }

    public function ajax_list_projects_data()
    {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }

        $this->load->library('datatables');
        $this->datatables->select("hr_pay_employee_projects.project_code,
                                hr_pay_employee_projects.project_name,
                                hr_pay_m_project_types.name,
                                hr_pay_employee_projects.project_status,
                                hr_pay_employee_projects.start_date,
                                hr_pay_employee_projects.end_date,
                                hr_pay_employee_projects.description,
                                hr_pay_employee_projects.project_id", FALSE);
        $this->datatables->from('hr_pay_employee_projects');
        $this->datatables->join('hr_pay_m_project_types', 'hr_pay_employee_projects.project_type=hr_pay_m_project_types.id', 'left');
        $this->datatables->group_by("hr_pay_employee_projects.project_id");
        $this->datatables->add_column("Actions",
            "<a href='javascript:void()'  class='btn btn-default tbl-action' title='Edit' onclick='edit_project(" . '$1' . ")'>
                            <i class='fa fa-edit'></i> Edit
                        </a>
                        <a href='javascript:void()'  class='' title='Delete' onclick='delete_project(" . '$1' . ")'>
                            <i class='fa fa-trash-o-'></i>
                        </a>", "project_id");
        $this->datatables->unset_column("project_id");
        echo $this->datatables->generate();
    }

    public function ajax_list_employee_project_data()
    {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }
        $this->load->library('datatables');
        //$this->load->helper('My_datatable_helper');

        $this->datatables->select("hr_pay_employee_projects_assign.id,
                                hr_pay_employees.first_name,
                                hr_pay_employees.last_name,
                                hr_pay_employee_projects.project_code,
                                hr_pay_m_project_modules.name as module,
                                hr_pay_m_project_work_types.name,
                                hr_pay_employee_projects_assign.work_description,
                                hr_pay_employee_projects_assign.status,
                                hr_pay_employee_projects_assign.assign_date,
                                hr_pay_employee_projects_assign.expected_date,
                                hr_pay_employee_projects_assign.completed_date,
                                hr_pay_employee_projects_assign.description", FALSE);
        $this->datatables->from('hr_pay_employee_projects_assign');
        $this->datatables->join('hr_pay_employees', 'hr_pay_employee_projects_assign.employee=hr_pay_employees.id', 'left');
        $this->datatables->join('hr_pay_m_project_work_types', 'hr_pay_employee_projects_assign.work_type=hr_pay_m_project_work_types.id', 'left');
        $this->datatables->join('hr_pay_m_project_modules', 'hr_pay_employee_projects_assign.module=hr_pay_m_project_modules.id', 'left');
        $this->datatables->join('hr_pay_employee_projects', 'hr_pay_employee_projects_assign.project=hr_pay_employee_projects.project_id', 'left');
        $this->datatables->group_by("hr_pay_employee_projects_assign.id");

        //$this->datatables->edit_column('status', '$1', 'check_status(status)');

        $this->datatables->add_column("Actions",
            "<a href='javascript:void()'  class='btn btn-default tbl-action' title='Edit' onclick='edit_employee_project(" . '$1' . ")'>
                            <i class='fa fa-edit'></i> Edit
                        </a>
                        <a href='javascript:void()'  class='' title='Delete' onclick='delete_employee_project(" . '$1' . ")'>
                            <i class='fa fa-trash-o-'></i>
                        </a>", "id");
        //$this->datatables->unset_column("id");
        echo $this->datatables->generate();
    }


    public function get_table_structure($table_name)
    {
        $table_structure = $this->projects_mod->get_table_structure($table_name);
        return $table_structure;
    }

    public function ajax_get_project($for)
    {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }

        $where = array(
            'project_id' => $for
        );
        $project_data = $this->projects_mod->get_project($where);
        echo json_encode($project_data->row());
    }
    public function ajax_save_project($save_method)
    {

        $required_data = array(
            'project_code',
            'project_name',
            'project_status'
        );
        $this->_validate_required($required_data);
        $project_type = $this->input->post('project_type');
        $project_type = empty($project_type) ? null : $project_type;
        $start_date = $this->input->post('start_date');
        $start_date = empty($start_date) ? null : $start_date;
        $end_date = $this->input->post('end_date');
        $end_date = empty($end_date) ? null : $end_date;
        $description = $this->input->post('description');
        $description = empty($description) ? null : $description;
        $project_details = array(
            'project_code' => $this->input->post('project_code'),
            'project_name' => ucfirst($this->input->post('project_name')),
            'project_status' => $this->input->post('project_status'),
            'project_type' => $project_type,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'description' => $description
        );
        if($save_method == "add")
        {
            $project_details['_created_'] = $this->currentTime;
            $project_id = $this->projects_mod->insert_project($project_details);
        }
        elseif($save_method == "edit")
        {
            $project_details['_updated_'] = $this->currentTime;
            $where = array(
                'project_id' => $this->input->post('project_id')
            );
            $project_id = $this->projects_mod->update_project($where, $project_details);
        }
        if($project_id > 0)
        {
            echo json_encode(array("status" => TRUE));
        }
        else
        {
            echo json_encode(array("status" => FALSE));
        }
    }

    public function ajax_get_employee_project($for)
    {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }

        $where = array(
            'id' => $for
        );
        $employee_project_data = $this->projects_mod->get_employee_project($where);
        echo json_encode($employee_project_data->row());
    }
    public function ajax_save_employee_project($save_method)
    {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }
        $required_data = array(
            'employee',
            'project',
            'status'
        );
        $this->_validate_required($required_data);
        $employee_project_details = array(
            'employee' => $this->input->post('employee'),
            'project' => $this->input->post('project'),
            'module' => $this->input->post('module'),
            'work_type' => $this->input->post('work_type'),
            'work_description' => $this->input->post('work_description'),
            'status' => ucfirst($this->input->post('status')),
            'assign_date' => ucfirst($this->input->post('assign_date')),
            'expected_date' => ucfirst($this->input->post('expected_date')),
            'completed_date' => ucfirst($this->input->post('completed_date')),
            'description' => $this->input->post('description')
        );
        if($save_method == "add")
        {
            $emp_id = $this->input->post('employee');
            $employee_project_details['_created_'] = $this->currentTime;
            $employee_project_id = $this->projects_mod->insert_employee_project($employee_project_details);


            //Email & Log Data
            $where_proj = array(
                'hr_pay_employee_projects_assign.id' => $employee_project_id,
            );
            if($this->input->post('send_email')==1){
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
                    //$this->email->send();
                    /*echo $this->db->last_query();
                    var_dump($_POST);exit;*/
                    if ($this->email->send()) {
                        $message = 'New Project Assigned - EMP ID #' . $emp_id.' Project Assign ID #'.$employee_project_id;
                        $this->system_log->create_system_log("Project Management", "Success", $message);
                    }
                }
            }

            $message = 'New Project Assigned - EMP ID #' . $emp_id.' Project Assign ID #'.$employee_project_id;
            $this->system_log->create_system_log("Project Management", "Success", $message);
        }
        elseif($save_method == "edit")
        {
            $employee_project_details['_updated_'] = $this->currentTime;
            $where = array(
                'id' => $this->input->post('employee_project_id')
            );
            $employee_project_id = $this->projects_mod->update_employee_project($where, $employee_project_details);

            $emp_id = $this->input->post('employee');
            //Email & Log Data
            $where_proj = array(
                'hr_pay_employee_projects_assign.id' => $this->input->post('employee_project_id'),
            );
            if($this->input->post('send_email')==1){
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
                    //$this->email->send();
                    /*echo $this->db->last_query();
                    var_dump($_POST);exit;*/
                    if ($this->email->send()) {
                        $message = 'Project Assignment Updated Email Sent - EMP ID #' . $emp_id.' Project Assign ID #'.$employee_project_id;
                        $this->system_log->create_system_log("Project Management", "Success", $message);
                    }
                }
            }

            $message = 'Project Assignment Updated - EMP ID #' . $emp_id.' Project Assign ID #'.$employee_project_id;
            $this->system_log->create_system_log("Project Management", "Success", $message);

        }
        if($employee_project_id > 0)
        {
            echo json_encode(array("status" => TRUE));
        }
        else
        {
            echo json_encode(array("status" => FALSE));
        }
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


}