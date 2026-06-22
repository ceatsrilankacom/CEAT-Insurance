<?php

class Loans_mod extends CI_Model
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

    public function getLoans(){

        $q = $this->db->get('hr_pay_loan_main');
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }

            return $data;
        }
    }

    public function listAllLoans(){
        $this->db->select('
            hr_pay_loan_main.id as loan_id,
            hr_pay_employees.employee_id emp_ids,
            hr_pay_employees.first_name as f_name,
            hr_pay_employees.last_name as l_name,
            hr_pay_m_employee_category.desc as department_name,
            start_date,
            end_date,
            term,
            amount,
            opening,
        ',false);

        $this->db->from('hr_pay_loan_main');
        $this->db->join('hr_pay_employees','hr_pay_employees.employee_id=hr_pay_loan_main.employee_id', 'inner');
        $this->db->join('hr_pay_m_employee_category','hr_pay_m_employee_category.id=hr_pay_employees.emp_category', 'inner');

        $query=$this->db->get();
        return $query->result();
    }

    public function update_loan_info($data,$id){
        $this->db->update('hr_pay_loan_main',$data,array('hr_pay_loan_main.id'=>$id));
        return $this->db->affected_rows();
    }


    public function insert_loan_info($data){
        $this->db->insert('hr_pay_loan_main',$data);
        return $this->db->insert_id();
    }
}