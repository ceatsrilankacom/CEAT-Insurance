<?php

class Events_mod extends CI_Model
{
    public function getAllEmployees()
    {
        $this->db->select('hr_pay_employees.*');
        $this->db->from('hr_pay_employees');

        $this->db->where('hr_pay_employees.status', "Active");
        $this->db->order_by("hr_pay_employees.employee_id", "asc");
        $q = $this->db->get();
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }

            return $data;
        }
    }

    public function get_emp_depts(){
        $sql = "select * from hr_pay_m_departments order by id ASC";
        $result = $this->db->query($sql);
        return $result->result();
    }

    public function get_employees(){
        $this->db->order_by("employee_id", "asc");
        $q = $this->db->get_where('hr_pay_employees', array('status' => 'Active'));
        return $q->result();
    }

    public function get_event_types(){
        $q = $this->db->get('hr_pay_m_event_types');
        return $q->result();
    }

    public function get_event_type($where){

        $this->db->select('type');
        $this->db->from('hr_pay_m_event_types');
        $this->db->where($where);
        $q=$this->db->get();

        if($q->num_rows() > 0){
            return $q->row();
        }

    }

    public function get_event($condition=null)
    {
        $this->db->select('id,datetime,emp_department,event_type,event_title,event_details,from_date,to_date');
        $this->db->from('hr_pay_events');
        if($condition !== null)
        {
            $this->db->where($condition);
        }
        $query = $this->db->get();
        return $query->row();
    }

    public function get_event_view($condition=null)
    {
        $this->db->select('hr_pay_events.datetime,hr_pay_m_event_types.type as event_type_name,hr_pay_events.event_title,hr_pay_events.event_details,hr_pay_events.from_date,hr_pay_events.to_date');
        $this->db->from('hr_pay_events');
        $this->db->join('hr_pay_m_event_types','hr_pay_m_event_types.id=hr_pay_events.event_type');
        if($condition !== null)
        {
            $this->db->where($condition);
        }
        $query = $this->db->get();
        return $query->row();
    }

    /*public function get_employee_projects_data_for_email($condition=null)
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
    }*/

    public function get_emp_department($where){

        $this->db->select('department,office_email,full_name,employee_id,first_name,last_name');
        $this->db->from('hr_pay_employees');
        $this->db->where($where);
        $q=$this->db->get();

        if($q->num_rows() > 0){
            return $q->row();
        }
    }

    public function get_events_emp($where){

        $this->db->select('employee');
        $this->db->from('hr_pay_event_list');
        $this->db->where($where);
        $q = $this->db->get();

        $data=array();

        foreach($q->result() as $row){
            $data[] = $row->employee;
        }
        return ($data);
    }

    public function get_events_department($where){

        $this->db->select('department');
        $this->db->from('hr_pay_event_list');
        $this->db->where($where);
        $q = $this->db->get();

        $data=array();

        foreach($q->result() as $row){
            $data[] = $row->department;
        }
        return ($data);
    }

    public function get_events_list_view($where){

        $this->db->select('hr_pay_m_departments.desc as department_name,hr_pay_employees.full_name');
        $this->db->from('hr_pay_event_list');
        $this->db->join('hr_pay_m_departments','hr_pay_m_departments.id=hr_pay_event_list.department');
        $this->db->join('hr_pay_employees','hr_pay_employees.id=hr_pay_event_list.employee');
        $this->db->where($where);
        $q = $this->db->get();

        return $q->result();
    }

    public function get_department_emp($where){

        $this->db->select('id');
        $this->db->from('hr_pay_employees');
        $this->db->where($where);
        $q=$this->db->get();

        if($q->num_rows() > 0){
            return $q->result();
        }
    }

    public function get_al_employees(){

        $this->db->from('hr_pay_employees');
        $this->db->where('status','Active');
        $q=$this->db->get();

        if($q->num_rows() > 0){
            return $q->result();
        }
    }

}