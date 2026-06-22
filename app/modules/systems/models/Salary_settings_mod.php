<?php

class Salary_settings_mod extends CI_Model
{
    function getAdvanceByMonthEpf($epf, $month)
    {
        $q = $this->db->get_where('hr_pay_payroll_monthly_advances', array('employee_id' => $epf, "month" => $month));
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }

            return $data;
        }
    }

    function getFestivalByMonthEpf($epf, $month)
    {
        $q = $this->db->get_where('hr_pay_festival', array('employee_id' => $epf, "month" => $month));
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }

            return $data;
        }
    }

    function getLoanByMonthEpf($epf, $month)
    {
        $q = $this->db->get_where('hr_pay_loans', array('employee_id' => $epf, "month" => $month));
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }

    function getDesignation($designation)
    {
        $q = $this->db->get_where('hr_pay_m_jobtitles', array('code' => $designation));
        if ($q->num_rows() > 0) {
            return $q->row();
        }
    }

    function getLeaveByMonthEpf($epf, $month)
    {
        $q = $this->db->query("SELECT * FROM hr_pay_leave_days WHERE employee_id='$epf' AND day LIKE '$month%'");
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }
    function getOtByMonthEpf($epf, $month)
    {
        $q = $this->db->query("SELECT * FROM hr_pay_attendance WHERE employee_id='$epf' AND date LIKE '$month%'");
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }
    function getLeaveExits($epf)
    {
        $q = $this->db->query("SELECT * FROM hr_pay_leave WHERE employee_id='$epf'");
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }

    //JE add 2015_11_11
    function getLeaveAnnualForMonthEpf($epf,$month)
    {
        $q = $this->db->query("SELECT * FROM hr_pay_leave_application WHERE employee_id='$epf' AND leave_type='Annual'  AND date_from LIKE '$month%'");
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }
    //JE add

    function getProductionIncentiveByMonthEpf($epf, $month)
    {
        $q = $this->db->query("SELECT * FROM hr_pay_production_incentive WHERE employee_id='$epf' AND date LIKE '$month%'");
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }

    function getSpecialDays($month)
    {
        $q = $this->db->query("SELECT * FROM hr_pay_special_days WHERE day ='$month'");
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }
    function checkSpecialDays($month)
    {
        $q = $this->db->query("SELECT * FROM hr_pay_special_days WHERE day ='$month'");
        if ($q->num_rows() > 0) {
            return true;
        }else{
            return false;
        }
    }
    function getLeave($emp)
    {
        $q = $this->db->query("SELECT * FROM hr_pay_leave WHERE employee_id ='$emp'");
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }
    function getSetting($month)
    {
        $q = $this->db->query("SELECT * FROM hr_pay_setting WHERE month LIKE '$month%'",1);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
    }

    function getemploye_type()
    {
        $q = $this->db->query("SELECT * FROM hr_pay_m_employee_category");
        if ($q->num_rows() > 0) {
            return $q->result();
        }
    }

     function get_branch()
    {
        $q = $this->db->query("SELECT * FROM m_org_branches");
        if ($q->num_rows() > 0) {
            return $q->result();
        }
    }

    function update_payment($month){
        $date = date('Y-m-d');
        $sql = "update hr_pay_payroll_pay_lock set status='$date' where pay_type=8 and month='$month'";
        $this->db->query($sql);
        return true;
    }

    function update_advanced($month){
        $date = date('Y-m-d');
        $sql = "update hr_pay_payroll_pay_lock set status='$date' where pay_type=2 and month='$month'";
        $this->db->query($sql);
        return true;
    }


    //ADv
    function get_advance_data_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('hr_pay_payroll_monthly_advances');
        $this->db->where('hr_pay_payroll_monthly_advances.id',$id);
        $query = $this->db->get();

        if($query->num_rows() > 0 ){
            return $query->result_array();
        }
        else{
            return "";
        }
    }

    public function update_advance($data,$id)
    {
        $this->db->where('id', $id);
        $this->db->update('hr_pay_payroll_monthly_advances',$data);
        return true;
    }

    public function delete_advance($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('hr_pay_payroll_monthly_advances');
        return true;
    }

    public function getAllEmployees()
    {
        $this->db->select('*');
        $this->db->from('hr_pay_employees');
        $this->db->where('status', "Active");
        $this->db->order_by("employee_id", "asc");
        $q = $this->db->get();
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }

            return $data;
        }
    }

    public function getAllDepartments()
    {
        $this->db->select('*');
        $this->db->from('hr_pay_m_departments');
        $this->db->order_by("id", "asc");
        $q = $this->db->get();
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }

            return $data;
        }
    }


    public function getAdvanceTypes()
    {
        $this->db->select('*');
        $this->db->from('hr_pay_m_employee_monthly_advance_types');
        $q = $this->db->get();
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }

    //M paym
    function get_payment_data_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('hr_pay_payroll_monthly_payments');
        $this->db->where('hr_pay_payroll_monthly_payments.id',$id);
        $query = $this->db->get();

        if($query->num_rows() > 0 ){
            return $query->result_array();
        }
        else{
            return "";
        }
    }

    public function update_monthly_payment($data,$id)
    {
        $this->db->where('id', $id);
        $this->db->update('hr_pay_payroll_monthly_payments',$data);
        return true;
    }

    public function delete_monthly_payment($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('hr_pay_payroll_monthly_payments');
        return true;
    }


    public function getPaymentTypes()
    {
        $this->db->select('*');
        $this->db->from('hr_pay_m_employee_monthly_payment_types');
        $q = $this->db->get();
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }


    //M paym
    function get_deduction_data_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('hr_pay_payroll_monthly_deductions');
        $this->db->where('hr_pay_payroll_monthly_deductions.id',$id);
        $query = $this->db->get();

        if($query->num_rows() > 0 ){
            return $query->result_array();
        }
        else{
            return "";
        }
    }

    public function update_monthly_deduction($data,$id)
    {
        $this->db->where('id', $id);
        $this->db->update('hr_pay_payroll_monthly_deductions',$data);
        return true;
    }

//    public function delete_monthly_deduction($id)
//    {
//        $this->db->where('id', $id);
//        $this->db->delete('hr_pay_payroll_monthly_deductions');
//        return true;
//    }


    public function delete_monthly_deduction($id)
    {
        $this->db->where('ref_id', $id);
        $this->db->delete('hr_pay_payroll_monthly_deductions');
        $this->db->where('id', $id);
        $this->db->delete('hr_pay_payroll_main_monthly_deductions');
        return true;
    }

    public function delete_monthly_deduction_detail($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('hr_pay_payroll_monthly_deductions');
        return true;
    }


    public function getDeductionTypes()
    {
        $this->db->select('*');
        $this->db->from('hr_pay_m_employee_monthly_deduction_types');
        $q = $this->db->get();
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }

    //ADv Type
    function get_advance_type_data_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('hr_pay_m_employee_monthly_advance_types');
        $this->db->where('hr_pay_m_employee_monthly_advance_types.id',$id);
        $query = $this->db->get();

        if($query->num_rows() > 0 ){
            return $query->result_array();
        }
        else{
            return "";
        }
    }

    public function update_advance_type($data,$id)
    {
        $this->db->where('id', $id);
        $this->db->update('hr_pay_m_employee_monthly_advance_types',$data);
        return true;
    }

    //PAyment Type
    function get_payment_type_data_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('hr_pay_m_employee_monthly_payment_types');
        $this->db->where('hr_pay_m_employee_monthly_payment_types.id',$id);
        $query = $this->db->get();

        if($query->num_rows() > 0 ){
            return $query->result_array();
        } else {
            return "";
        }
    }

    public function update_payment_type($data,$id)
    {
        $this->db->where('id', $id);
        $this->db->update('hr_pay_m_employee_monthly_payment_types',$data);
        return true;
    }



    //Deduction Type
    function get_deduction_type_data_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('hr_pay_m_employee_monthly_deduction_types');
        $this->db->where('hr_pay_m_employee_monthly_deduction_types.id',$id);
        $query = $this->db->get();

        if($query->num_rows() > 0 ){
            return $query->result_array();
        } else {
            return "";
        }
    }

    public function update_deduction_type($data,$id)
    {
        $this->db->where('id', $id);
        $this->db->update('hr_pay_m_employee_monthly_deduction_types',$data);
        return true;
    }



    //get departments
    public function get_emp_depts(){
        $sql = "select * from hr_pay_m_departments order by id ASC";
        $result = $this->db->query($sql);
        return $result->result();
    }

    //get departments from employee
    public function get_emp_department($where){

        $this->db->select('department,office_email,full_name,employee_id');
        $this->db->from('hr_pay_employees');
        $this->db->where($where);
        $q=$this->db->get();

        if($q->num_rows() > 0){
            return $q->row();
        }
    }

    //get employee by department
    public function get_department_emp($where){

        $this->db->select('id');
        $this->db->from('hr_pay_employees');
        $this->db->where($where);
        $q=$this->db->get();

        if($q->num_rows() > 0){
            return $q->result();
        }

    }

    //save
    function save($table,$data){

        $this->db->insert($table,$data);
        return $this->db->insert_id();

    }

    public function get_payments_emp($where){

        $this->db->select('employee');
        $this->db->from('hr_pay_payroll_monthly_payments');
        $this->db->where($where);
        $q = $this->db->get();

        $data=array();

        foreach($q->result() as $row){
            $data[] = $row->employee;
        }
        return ($data);
    }

    public function get_deductions_emp($where){

        $this->db->select('employee');
        $this->db->from('hr_pay_payroll_monthly_deductions');
        $this->db->where($where);
        $q = $this->db->get();

        $data=array();

        foreach($q->result() as $row){
            $data[] = $row->employee;
        }
        return ($data);
    }

    public function get_payments_department($where){

        $this->db->select('department');
        $this->db->from('hr_pay_payroll_monthly_payments');
        $this->db->where($where);
        $q = $this->db->get();

        $data=array();

        foreach($q->result() as $row){
            $data[] = $row->department;
        }
        return ($data);
    }

    public function get_deductions_department($where){

        $this->db->select('department');
        $this->db->from('hr_pay_payroll_monthly_deductions');
        $this->db->where($where);
        $q = $this->db->get();

        $data=array();

        foreach($q->result() as $row){
            $data[] = $row->department;
        }
        return ($data);
    }

    public function get_payments($condition=null)
    {
        $this->db->select('id,name,emp_department,pay_type,month,amount');
        $this->db->from('hr_pay_payroll_main_monthly_payments');
        if($condition !== null)
        {
            $this->db->where($condition);
        }
        $query = $this->db->get();
        return $query->row();
    }

    public function get_deductions($condition=null)
    {
        $this->db->select('id,name,emp_department,deduction_type,month,amount');
        $this->db->from('hr_pay_payroll_main_monthly_deductions');
        if($condition !== null)
        {
            $this->db->where($condition);
        }
        $query = $this->db->get();
        return $query->row();
    }

    public function get_payment_view($condition=null)
    {
        $this->db->select('hr_pay_payroll_main_monthly_payments.name,hr_pay_payroll_main_monthly_payments.month,hr_pay_payroll_main_monthly_payments.amount,hr_pay_m_employee_monthly_payment_types.name');
        $this->db->from('hr_pay_payroll_main_monthly_payments');
        $this->db->join('hr_pay_m_employee_monthly_payment_types','hr_pay_m_employee_monthly_payment_types.id=hr_pay_payroll_main_monthly_payments.pay_type');
        if($condition !== null)
        {
            $this->db->where($condition);
        }
        $query = $this->db->get();
        return $query->row();
    }

    function get_employee_id($off_mobile)
    {
        $mobile = trim($off_mobile);
        $q = $this->db->query("SELECT * FROM hr_pay_employees where office_phone='$mobile' and office_phone!=0");
        if ($q->num_rows() > 0) {
            return $q->row();
        }
    }


//    function get_mobile_data($id)
//    {
//        $q = $this->db->query("SELECT hr_pay_employees.first_name,hr_pay_mobile_bill.tel,hr_pay_mobile_bill.month,hr_pay_mobile_bill.amount FROM hr_pay_mobile_bill left outer join hr_pay_employees on hr_pay_mobile_bill.emp_id=hr_pay_employees.id where hr_pay_mobile_bill.id='$id'");
//        if ($q->num_rows() > 0) {
//            return $q->row();
//        }
//    }


}