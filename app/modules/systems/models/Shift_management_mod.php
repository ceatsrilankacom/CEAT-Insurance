<?php

class Shift_management_mod extends CI_Model
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


    public function getAllEmpCategories()
    {
        $this->db->select('*');
        $this->db->from('hr_pay_m_employee_category');
        $this->db->where('hr_pay_m_employee_category.id NOT IN(SELECT c_id FROM hr_pay_employee_schedule_assignments)');
        $q = $this->db->get();
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }

            return $data;
        }
    }


    public function getShiftSchedules()
    {
        $this->db->select('*');
        $this->db->from('hr_pay_m_shift_schedules');
        $this->db->where('hr_pay_m_shift_schedules.id NOT IN(SELECT s_id FROM hr_pay_employee_schedule_assignments)');
        $q = $this->db->get();
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }

            return $data;
        }
    }


    public function get_shift_schedule($condition=null)
    {
        $this->db->select('*');
        $this->db->from('hr_pay_m_shift_schedules');
        if($condition !== null)
        {
            $this->db->where($condition);
        }
        $query = $this->db->get();
        return $query;
    }


    public function schedule_assign_data($sid)
    {
        $this->db->select('hr_pay_employee_schedule_assignments.id as id,hr_pay_employee_schedule_assignments.s_id,hr_pay_employee_schedule_assignments.c_id,hr_pay_m_employee_category.desc,hr_pay_m_employee_category.code');
        $this->db->from('hr_pay_employee_schedule_assignments');
        $this->db->join('hr_pay_m_employee_category', 'hr_pay_m_employee_category.id=hr_pay_employee_schedule_assignments.c_id', 'left');
        $this->db->where('hr_pay_employee_schedule_assignments.s_id',$sid);
        $q = $this->db->get();
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }

    public function delete_shift_assigned($where)
    {
        $this->db->where('s_id', $where);
        $this->db->delete('hr_pay_employee_schedule_assignments');
        return true;
    }

}