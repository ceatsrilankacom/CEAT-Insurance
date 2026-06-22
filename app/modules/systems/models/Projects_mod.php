<?php
/**
 * Created by PhpStorm.
 * User: S.Priyadarshan
 * Date: 01-Jun-16
 * Time: 11:21 AM
 */

class Projects_mod extends CI_Model
{
    private $projects_table = 'hr_pay_employee_projects';
    private $employee_project_table = 'hr_pay_employee_projects_assign';

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_project($condition=null)
    {
        $this->db->select('hr_pay_employee_projects.project_id,
                            hr_pay_employee_projects.project_code,
                            hr_pay_employee_projects.project_name,
                            hr_pay_employee_projects.project_type,
                            hr_pay_employee_projects.project_status,
                            hr_pay_employee_projects.start_date,
                            hr_pay_employee_projects.end_date,
                            hr_pay_employee_projects.description');
        $this->db->from($this->projects_table);
        if($condition !== null)
        {
            $this->db->where($condition);
        }
        $query = $this->db->get();
        return $query;
    }
    public function insert_project($data)
    {
        $this->db->insert($this->projects_table, $data);
        return $this->db->insert_id();
    }
    public function update_project($where, $data)
    {
        $this->db->update($this->projects_table, $data, $where);
        return $this->db->affected_rows();
    }

    public function get_employee_projects_data($condition=null)
    {
        $this->db->select('hr_pay_employee_projects_assign.project as project_id,
                            hr_pay_employee_projects_assign.employee as emp_table_id,
                            hr_pay_employee_projects.project_code,
                            hr_pay_employee_projects.project_name,
                            hr_pay_employee_projects.project_status,
                            hr_pay_m_project_modules.module,
                            hr_pay_m_project_work_types.name,
                            hr_pay_employee_projects_assign.work_description,
                            hr_pay_employee_projects_assign.assign_date,
                            hr_pay_employee_projects_assign.expected_date,
                            hr_pay_employee_projects_assign.completed_date,
                            hr_pay_employees.employee_id,
                            hr_pay_employees.first_name as employee_name,
                            hr_pay_employee_projects_assign.status as employee_project_status');
        $this->db->from($this->employee_project_table);
        $this->db->join('hr_pay_employees', 'hr_pay_employee_projects_assign.employee=hr_pay_employees.id', 'left');
        $this->db->join('hr_pay_employee_projects', 'hr_pay_employee_projects_assign.project=hr_pay_employee_projects.project_id', 'left');
        $this->db->join('hr_pay_m_project_work_types', 'hr_pay_employee_projects_assign.work_type=hr_pay_m_project_work_types.id', 'left');
        $this->datatables->join('hr_pay_m_project_modules', 'hr_pay_employee_projects_assign.module=hr_pay_m_project_modules.id', 'left');
        if($condition !== null)
        {
            $this->db->where($condition);
        }
        $query = $this->db->get();
        return $query;
    }

    public function get_employee_projects_data_for_email($condition=null)
    {
        $this->db->select('hr_pay_employee_projects_assign.project as project_id,
                            hr_pay_employee_projects_assign.employee as emp_table_id,
                            hr_pay_employee_projects.project_code,
                            hr_pay_employee_projects.project_name,
                            hr_pay_employee_projects.project_status,
                            hr_pay_m_project_modules.name as module,
                            hr_pay_m_project_work_types.name,
                            hr_pay_employee_projects_assign.work_description,
                            hr_pay_employee_projects_assign.assign_date,
                            hr_pay_employee_projects_assign.expected_date,
                            hr_pay_employee_projects_assign.completed_date,
                            hr_pay_employees.employee_id,
                            hr_pay_employees.first_name as employee_name,
                            auth_users.email as emp_email,
                            hr_pay_employee_projects_assign.status as employee_project_status');
        $this->db->from($this->employee_project_table);
        $this->db->join('hr_pay_employees', 'hr_pay_employee_projects_assign.employee=hr_pay_employees.id', 'left');
        $this->db->join('auth_users', 'auth_users.id=hr_pay_employees.id', 'left');
        $this->db->join('hr_pay_employee_projects', 'hr_pay_employee_projects_assign.project=hr_pay_employee_projects.project_id', 'left');
        $this->db->join('hr_pay_m_project_work_types', 'hr_pay_employee_projects_assign.work_type=hr_pay_m_project_work_types.id', 'left');
        $this->datatables->join('hr_pay_m_project_modules', 'hr_pay_employee_projects_assign.module=hr_pay_m_project_modules.id', 'left');
        if($condition !== null)
        {
            $this->db->where($condition);
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        }
    }
    public function get_employee_project($condition=null)
    {
        $this->db->select('hr_pay_employee_projects_assign.id,
                            hr_pay_employee_projects_assign.employee,
                            hr_pay_employee_projects_assign.project,
                            hr_pay_employee_projects_assign.status,
                            hr_pay_employee_projects_assign.module,
                            hr_pay_employee_projects_assign.work_type,
                            hr_pay_employee_projects_assign.work_description,
                            hr_pay_employee_projects_assign.assign_date,
                            hr_pay_employee_projects_assign.expected_date,
                            hr_pay_employee_projects_assign.completed_date,
                            hr_pay_employee_projects_assign.description');
        $this->db->from($this->employee_project_table);
        if($condition !== null)
        {
            $this->db->where($condition);
        }
        $query = $this->db->get();
        return $query;
    }
    public function insert_employee_project($data)
    {
        $this->db->insert($this->employee_project_table, $data);
        return $this->db->insert_id();
    }
    public function update_employee_project($where, $data)
    {
        $this->db->update($this->employee_project_table, $data, $where);
        return $this->db->affected_rows();
    }

    function get_table_structure($table_name)
    {
        $query = null;
        if($table_name != null)
        {
            $sql = "DESCRIBE $table_name";
            $query = $this->db->query($sql);
        }
        return $query;
    }

    function select_all_data($table_name, $condition=null)
    {
        $this->db->select('*');
        $this->db->from($table_name);
        if($condition !== null)
        {
            $this->db->where($condition);
        }
        $query = $this->db->get();
        return $query;
    }


    public function getAllEmployees($condition = null, $if_active_only = true)
    {
        $this->db->select('hr_pay_employees.*');
        $this->db->from('hr_pay_employees');
        $this->db->where('hr_pay_employees.status', 'Active');
        if($condition != null) $this->db->where($condition);
        $this->db->order_by("hr_pay_employees.employee_id", "asc");
        $query = $this->db->get();
        return $query;
    }

}