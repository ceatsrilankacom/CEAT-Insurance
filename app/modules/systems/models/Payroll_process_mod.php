<?php
/**
 * Created by PhpStorm.
 * User: Kasun
 * Date: 3/23/2018
 * Time: 10:16 AM
 */

class Payroll_process_mod extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_employees($emp_type){

        $this->db->select('*');
        $this->db->from('hr_pay_employees');
        $this->db->where(array('status'=>'Active','emp_category'=>$emp_type));
        $query=$this->db->get();

        return $query->result();

    }


    public function get_active_employees()
    {
        $this->db->select('*');
        $this->db->from('hr_pay_employees');
        $this->db->where(array('status' => 'Active'));
        $query = $this->db->get();
        return $query->result();
    }

    public function get_active_employees_by_terminate_date($start_month)
    {
        $q = $this->db->query("SELECT * FROM hr_pay_employees WHERE (termination_date > '$start_month' OR termination_date IS NULL) ");
        return $q->result();
    }

    public function get_employees_attendance($employee,  $start_month, $end_month)
    {

        $query = $this->db->query("SELECT * FROM hr_pay_attendance_data WHERE employee_id='$employee' AND DATE_FORMAT(date,'%Y-%m-%d') >= '" . $start_month . "' AND DATE_FORMAT(date,'%Y-%m-%d') <= '" . $end_month . "'");
        return $query->result();

    }

    public function get_formula($where)
    {

        $this->db->select('*');
        $this->db->from('hr_pay_formula_settings');
        if ($where) {
            $this->db->where($where);
        }
        $this->db->order_by('order', 'ASC');
        $query = $this->db->get();

        return $query->result();

    }

    public function get_formula_full()
    {

        $this->db->select('*');
        $this->db->from('hr_pay_formula_settings');
        $this->db->order_by('hr_pay_formula_settings.order', 'ASC');
        $query = $this->db->get();

        return $query->result();

    }

//    public function getAdvances($employee, $start_month, $end_month)
//    {
//
//        $query = $this->db->query("SELECT * FROM hr_pay_payroll_monthly_advances WHERE employee_id='$employee' AND DATE_FORMAT(date,'%Y-%m-%d') >= '$start_month' AND DATE_FORMAT(date,'%Y-%m-%d') <= '$end_month'");
//
//        if ($query->num_rows() > 0) {
//            return $query->result_array();
//        } else {
//            return false;
//        }
//    }

    public function getEmployeeAttendance($id, $start_month, $end_month)
    {
        $query = $this->db->query("SELECT * FROM hr_pay_attendance_data WHERE employee_id='$id' AND DATE_FORMAT(date,'%Y-%m-%d') >= '$start_month' AND DATE_FORMAT(date,'%Y-%m-%d') <= '$end_month'");

        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    function check_work_week($day_type){
        $this->db->select('status');
        $this->db->where(array('day'=> $day_type));
        $q = $this->db->get('hr_pay_m_work_week');
        if ($q->num_rows() > 0) {
            return $q->row();
        }
    }
    function getAttAdminSettings()
    {
        $this->db->where('t_id',2);
        $q = $this->db->get('hr_pay_admin_settings');
        return $q->result();
    }

//    public function getLeaves($employee,$date){
//
//        $query=$this->db->query("SELECT * FROM hr_pay_leave WHERE employee_id='$employee' AND DATE_FORMAT(date,'%Y-%m-%d') >= '$start_month' AND DATE_FORMAT(date,'%Y-%m-%d') <= '$end_month'");
//
//        if($query->num_rows() > 0){
//            return $query->result();
//        }
//        else{
//            return false;
//        }
//    }

    function getLeaveDays($employee_id, $date)
    {
        //        $q = $this->db->get_where('hr_pay_leave_days', array("leave_date" => $date, "employee_id" => $employee_id));
        $q = $this->db->query("SELECT * FROM hr_pay_leave_days hpld left outer join hr_pay_leave_applications hpla on hpld.leave_application=hpla.id  WHERE hpld.leave_date ='$date' AND hpla.status = 'Approved' AND hpla.employee='$employee_id' ");
        if ($q->num_rows() > 0) {
            return $q->row();
        }
    }

    public function get_advance_details($emp_id, $new_date)
    {
        $query = $this->db->query("SELECT * FROM hr_pay_payroll_monthly_advances WHERE employee_id='$emp_id' AND month='$new_date'");
        return $query->row();
    }

    public function get_payment_details_all($emp_id,$new_date)
    {
        $query = $this->db->query("SELECT * FROM hr_pay_payroll_monthly_payments WHERE employee_id='$emp_id' AND month='$new_date'");
        return $query->row();
    }

    public function get_br_code($br)
    {
        $query = $this->db->query("SELECT * FROM m_org_branches WHERE id='$br'");
        return $query->row();
    }


    public function get_emp_type_code($emp_type)
    {
        $query = $this->db->query("SELECT * FROM hr_pay_m_employee_category WHERE id='$emp_type'");
        return $query->row();
    }

    public function getEmpCatDatabyEmp($emp_type)
    {
        $sql = $this->db->query("SELECT * FROM hr_pay_m_employee_category WHERE id='$emp_type'");
        if ($sql->num_rows() > 0) {
            return $sql->row();
        }
    }

    public function getEmpCatAlloDatabyEmp($emp_type)
    {
        $sql = $this->db->query("SELECT * FROM hr_pay_m_employee_allow_assigned_cate WHERE c_id='$emp_type'");
        if ($sql->num_rows() > 0) {
            foreach (($sql->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }else{
            return false;
        }
    }

    public function getEmpAlloDatabyEmp($emp)
    {
        $sql = $this->db->query("SELECT * FROM hr_pay_employees_allowances WHERE employee_id='$emp'");
        if ($sql->num_rows() > 0) {
            foreach (($sql->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }else{
            return false;
        }
    }

    public function getCateAllownaceCodebyAID($a_id)
    {
        $sql = $this->db->query("SELECT at.code as at_code,at.allowance,at.details,at.f_id,fs.code as fcode,epf FROM hr_pay_m_employee_allowance_types at, hr_pay_formula_settings fs WHERE at.f_id=fs.id AND at.id='$a_id' AND at.type = 'Category' ");
        if ($sql->num_rows() > 0) {
            return $sql->row();
        }
    }

    public function getEmpAllownaceCodebyAID($a_id)
    {
        $sql = $this->db->query("SELECT at.code as at_code,at.allowance,at.details,at.f_id,fs.code as fcode,epf FROM hr_pay_m_employee_allowance_types at, hr_pay_formula_settings fs WHERE at.f_id=fs.id AND at.id='$a_id' AND at.type = 'Employee' ");
        if ($sql->num_rows() > 0) {
            return $sql->row();
        }
    }

    public function getMonthlyPaymentTypeCodebyAID($id)
    {
        $sql = $this->db->query("SELECT mt.code as mcode,mt.name,mt.f_id,fs.code as fcode FROM hr_pay_m_employee_monthly_payment_types mt, hr_pay_formula_settings fs WHERE mt.f_id=fs.id AND mt.id='$id'");
        if ($sql->num_rows() > 0) {
            return $sql->row();
        }
    }

    public function getMonthlyDeductionTypeCodebyAID($id)
    {
        $sql = $this->db->query("SELECT mt.code as mcode,mt.name,mt.f_id,fs.code as fcode FROM hr_pay_m_employee_monthly_deduction_types mt, hr_pay_formula_settings fs WHERE mt.f_id=fs.id AND mt.id='$id'");
        if ($sql->num_rows() > 0) {
            return $sql->row();
        }
    }

    public function getAdvanceTypeCodebyAID($id)
    {
        $sql = $this->db->query("SELECT at.code as acode,at.name,at.f_id,fs.code as fcode FROM hr_pay_m_employee_monthly_advance_types at, hr_pay_formula_settings fs WHERE at.f_id=fs.id AND at.id='$id'");
        if ($sql->num_rows() > 0) {
            return $sql->row();
        }
    }

    public function getAllAllowanceTypeswithEPF()
    {
        $sql = $this->db->query("SELECT * FROM hr_pay_m_employee_allowance_types WHERE epf='YES'");
        if ($sql->num_rows() > 0) {
            foreach (($sql->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }else{
            return false;
        }
    }

    public function getAllAllowanceTypeswithoutEPF()
    {
        $sql = $this->db->query("SELECT * FROM hr_pay_m_employee_allowance_types WHERE epf='NO'");
        if ($sql->num_rows() > 0) {
            foreach (($sql->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }else{
            return false;
        }
    }

    public function getAllAllowanceTypes()
    {
        $sql = $this->db->query("SELECT * FROM hr_pay_m_employee_allowance_types WHERE 1=1 ORDER BY id");
        if ($sql->num_rows() > 0) {
            foreach (($sql->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }else{
            return false;
        }
    }

    public function getAllAdvancesTypes()
    {
        $sql = $this->db->query("SELECT * FROM hr_pay_m_employee_monthly_advance_types WHERE 1=1 ORDER BY id");
        if ($sql->num_rows() > 0) {
            foreach (($sql->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }else{
            return false;
        }
    }


    public function update_advnced($id, $data)
    {

        $this->db->where('id', $id);
        $this->db->update('hr_pay_payroll_monthly_advances', $data);
        return $this->db->affected_rows();

    }

    public function update_payment($id, $data)
    {

        $this->db->where('id', $id);
        $this->db->update('hr_pay_payroll_monthly_payments', $data);
        return $this->db->affected_rows();
    }

    public function get_emp_account($id)
    {
        $query = $this->db->query("SELECT * FROM hr_pay_employees_bank_info WHERE emp_id='$id'");
        return $query->row();
    }


    function get_columns($emp_type, $group)
    {
        $sql = "SELECT * FROM hr_pay_formula_settings where  `group`='$group' ";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function get_advanced_details()
    {

        $sql = "SHOW COLUMNS FROM hr_pay_payroll_monthly_advances LIKE '%$%'";
        $query = $this->db->query($sql);
        return $query->result_array();

    }

    function get_payment_details()
    {

        $sql = "SHOW COLUMNS FROM hr_pay_payroll_monthly_payments LIKE '%$%'";
        $query = $this->db->query($sql);
        return $query->result_array();

    }

    function get_code_availability($code, $group,$staff)
    {

        $sql = "SELECT * FROM hr_pay_formula_settings where  `group`='$group' and code='$code'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function task()
    {

        $q = $this->db->query("SELECT * FROM hr_pay_payroll_pay_types order by id");
        if ($q->num_rows() > 0) {
            return $q->result();
        }

    }

    function lock_type()
    {

        $q = $this->db->query("SELECT * FROM hr_pay_payroll_lock_type order by id");
        if ($q->num_rows() > 0) {
            return $q->result();
        }

    }

    function task_status($month, $type)
    {

        $q = $this->db->query("SELECT * FROM hr_pay_payroll_pay_lock where month='$month' and pay_type='$type' order by id ");
        if ($q->num_rows() > 0) {
            return $q->result();
        }

    }

    function lock_task_status($month, $type,$id)
    {

        $q = $this->db->query("SELECT * FROM hr_pay_payroll_lock_status where month='$month' and lock_type='$type' and payroll_type='$id' order by id");
        if ($q->num_rows() > 0) {
            return $q->result();
        }

    }


    function get_last_month($id)
    {

        $q = $this->db->query("SELECT id, max(month) as month FROM hr_pay_payroll_monthend_main where (status=0 or status=1 or status=2) and payroll_type='$id' ");
        /*if ($q->num_rows() > 0) {
            return array_shift($q->result());
        }*/
        if ($q->num_rows() > 0) {
            return $q->row();
        }

    }

    function update_monthend($id)
    {
        $date = date('Y-m-d h:m:s');
        $this->db->where(array('id' => $id));
        $this->db->update('hr_pay_payroll_monthend_main', array('status' => 1, 'log' => $date, 'user' => USER_ID));
    }

    function update_lock_status($month)
    {
        $date = date('Y-m-d h:m:s');

        $this->db->where(array('month' => $month, 'lock_type' => 3));
        $this->db->update('hr_pay_payroll_lock_status', array('status' => 1, 'log' => $date, 'user' => USER_ID));
        return $this->db->insert_id();
    }

    function get_monthend($id)
    {
        $q = $this->db->query("SELECT id,max(month) as month FROM hr_pay_payroll_monthend_main where status=0 and payroll_type='$id'");
        if ($q->num_rows() > 0) {
            return $q->row();
        }
    }


    public function savemonthenditems($data_items)
    {

        $this->db->insert('hr_pay_payroll_monthend_list', $data_items);

       return $this->db->insert_id();

    }


    function pay_category()
    {

        $q = $this->db->query("SELECT * FROM hr_pay_payroll_category");
        if ($q->num_rows() > 0) {
            return $q->result();
        }

    }

    function branch()
    {

        $q = $this->db->query("SELECT * FROM m_org_branches");
        if ($q->num_rows() > 0) {
            return $q->result();
        }

    }

    function emp_type()
    {

        $q = $this->db->query("SELECT * FROM hr_pay_m_employee_category");
        if ($q->num_rows() > 0) {
            return $q->result();
        }

    }

    function emp_type_1($id)
    {

        $q = $this->db->query("SELECT * FROM hr_pay_m_employee_category where id='$id'");
        if ($q->num_rows() > 0) {
            return $q->row();
        }

    }

      function department()
    {

//        $groups_emp = array('manager');
//        if($this->ion_auth->in_group($groups_emp)) {
//            if ($this->session->userdata('COMPANY2_ID')) {
//                $company = $company = $this->session->userdata('COMPANY2_ID');
//            } else {
//                $company = COMPANY1_ID;
//            }
//
//            if($company!=""){
//                $emp_company_qury = "company='$company' AND ";
//            }
//
//            $q = $this->db->query("SELECT hr_pay_m_departments.id,hr_pay_m_departments.desc,hr_pay_m_departments.code FROM hr_pay_employees JOIN hr_pay_m_departments ON hr_pay_m_departments.id=hr_pay_employees.department WHERE hr_pay_employees.company='$company' GROUP BY hr_pay_employees.department");
//            if ($q->num_rows() > 0) {
//                return $q->result();
//            }
//        }
//        else{

            $q = $this->db->query("SELECT * FROM hr_pay_m_departments");
            if ($q->num_rows() > 0) {
                return $q->result();
            }
//        }


    }

    function department_details($id)
    {
        $q = $this->db->query("SELECT * FROM hr_pay_m_departments where id='$id'");
        if ($q->num_rows() > 0) {
            return $q->row();
        }
    }


 function get_salary_details($month,$employee,$emp_department)
    {

//        $emp_company_qury = "";
//        //TODO***Kreston**only***********
//        $groups_emp = array('manager');
//        if($this->ion_auth->in_group($groups_emp)) {
//            if ($this->session->userdata('COMPANY2_ID')) {
//                $company = $company = $this->session->userdata('COMPANY2_ID');
//            } else {
//                $company = COMPANY1_ID;
//            }
//
//            if($company!=""){
//                $emp_company_qury = "company='$company' AND ";
//            }
//        }
//        //TODO***Kreston**only***********

        $emp_department_qury = "";
        if($emp_department!=""){
//            $emp_department_qury = "dep_id='$emp_department' AND ";
            $emp_department_qury = "hppml.dep_id='$emp_department' AND ";
        }
        $employee_qury = "";
        if($employee!=""){
//            $employee_qury = "ref_id='$employee' AND ";
            $employee_qury = "hppml.ref_id='$employee' AND ";
        }

//        if($this->ion_auth->in_group($groups_emp)){
//
//            $sql = "select *
//                from hr_pay_payroll_monthend_list
//                JOIN hr_pay_employees ON hr_pay_employees.id=hr_pay_payroll_monthend_list.ref_id
//                WHERE
//                $emp_department_qury
//                $employee_qury
//                $emp_company_qury
//                month = '$month'
//                order by dep_id,emp_id";
//            $query = $this->db->query($sql);
//            if ($query->num_rows() > 0) {
//                return $query->result_array();
//            }
//
//        }
//        else{

//            $sql = "select *
//                from hr_pay_payroll_monthend_list
//                where
//                $emp_department_qury
//                $employee_qury
//                month = '$month'
//                order by cast(emp_id as UNSIGNED) ASC";

     $sql = "SELECT hppml.* from hr_pay_payroll_monthend_list hppml LEFT OUTER JOIN hr_pay_employees hpe on hpe.id=hppml.ref_id WHERE  $emp_department_qury  $employee_qury  hppml.month = '$month' order by CAST(hpe.epf_no as UNSIGNED) ASC";

            $query = $this->db->query($sql);
            if ($query->num_rows() > 0) {
                return $query->result_array();
            }
//        }
    }


    function get_salary_extra_data($month)
    {

        $sql = "select *
                from hr_pay_payroll_monthend_list_data
                where
                month = '$month'
                order by employee_id,master_ref_id,type";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            foreach (($query->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }

    function get_salary_month_end_allowances_with_epf($month,$allow,$employee)
    {

        $sql = "select *
                from hr_pay_payroll_monthend_list_data
                where
                month = '$month' AND employee_id = '$employee' AND master_ref_id = '$allow' AND type = 'ALL' AND epf = 'YES'
                order by employee_id,master_ref_id,type";
        $q = $this->db->query($sql);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
    }

    function get_salary_month_end_allowances_without_epf($month,$allow,$employee)
    {

        $sql = "select *
                from hr_pay_payroll_monthend_list_data
                where
                month = '$month' AND employee_id = '$employee' AND master_ref_id = '$allow' AND type = 'ALL' AND epf = 'NO'
                order by employee_id,master_ref_id,type";
        $q = $this->db->query($sql);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
    }

    function get_salary_month_end_allowances($month,$allow)
    {

        $sql = "select *
                from hr_pay_payroll_monthend_list_data
                where
                month = '$month' AND master_ref_id = '$allow' AND type = 'ALL' AND epf = 'NO'
                order by employee_id,master_ref_id,type";
        $q = $this->db->query($sql);
        if ($q->num_rows() > 0) {
            return $q->row();
        }
    }

    function get_salary_main_data($month)
    {
        $q = $this->db->query("SELECT * FROM hr_pay_payroll_monthend_main where month='$month'");
        if ($q->num_rows() > 0) {
            return $q->row();
        }
    }

    // function get_salary_details($br_id, $month,$emp_type)
    // {

    //     if ($this->session->userdata('BRANCH2_ID')) {
    //         $branch = $this->session->userdata('BRANCH2_ID');
    //     } else {
    //         $branch = BRANCH1_ID;
    //     }
    //     if($branch=='1'){

    //         $q = $this->db->query("SELECT * FROM hr_pay_payroll_monthend_list where branch='$br_id' and month='$month' and emp_type='$emp_type' order by emp_id");
    //         if ($q->num_rows() > 0) {
    //             return $q->result_array();
    //         }
    //     }
    //     else{

    //         $q = $this->db->query("SELECT * FROM hr_pay_payroll_monthend_list where branch='$branch' and month='$month' and emp_type='$emp_type' order by emp_id");
    //         if ($q->num_rows() > 0) {
    //             return $q->result_array();
    //         }

    //     }



    // }

    function  get_salary_bank_details($month,$employee,$emp_department){

        $emp_department_qury = "";
        if($emp_department!=""){
            $emp_department_qury = "hrpml.dep_id='$emp_department' AND";
        }
        $employee_qury = "";
        if($employee!=""){
            $employee_qury = "hrpml.ref_id='$employee' AND";
        }

            $q = $this->db->query("SELECT * FROM hr_pay_payroll_monthend_list hrpml inner join hr_pay_employees hrpe on hrpml.ref_id=hrpe.id where $emp_department_qury
               $employee_qury hrpml.month='$month'");

        if ($q->num_rows() > 0) {
            return $q->result_array();
        }

    }


    function get_emp_details($id)
    {
        $q = $this->db->query("SELECT * FROM hr_pay_employees where employee_id='$id'");
        if ($q->num_rows() > 0) {
            return $q->row();
        }
    }


    function get_emp_details_nw($id)
    {
        $q = $this->db->query("SELECT * FROM hr_pay_employees where id='$id'");
        if ($q->num_rows() > 0) {
            return $q->row();
        }
    }

    function get_emp_type($id)
    {
        $q = $this->db->query("SELECT * FROM hr_pay_m_employee_category where id='$id'");
        if ($q->num_rows() > 0) {
            return $q->row();
        }
    }

    public function get_emp_depts(){
        $sql = "select * from hr_pay_m_departments order by id ASC";
        $result = $this->db->query($sql);
        return $result->result();
    }

    public function get_emp_status(){
        $sql = "select * from hr_pay_m_employmentstatus order by id ASC";
        $result = $this->db->query($sql);
        return $result->result();
    }

    public function get_employees_all(){

        //TODO***Kreston**only***********
//        $groups_emp = array('manager');
//        if($this->ion_auth->in_group($groups_emp)) {
//            if ($this->session->userdata('COMPANY2_ID')) {
//                $company = $company = $this->session->userdata('COMPANY2_ID');
//            } else {
//                $company = COMPANY1_ID;
//            }
//        }
        //TODO***Kreston**only***********

        $this->db->order_by("employee_id", "asc");
//        if($this->ion_auth->in_group($groups_emp)) {
//            $this->db->where(array('company'=>$company));
//        }
        $q = $this->db->get_where('hr_pay_employees', array('status' => 'Active'));
        return $q->result();
    }

    public function GetEmpInfo($id)
    {
        $this->db->select('*');
        $this->db->from('hr_pay_employees');
        $this->db->where('hr_pay_employees.id',$id);
        $query = $this->db->get();
        return $query->row();

        //TODO***Kreston**only***********
//        $groups_emp = array('manager');
//        if($this->ion_auth->in_group($groups_emp)) {
//            if ($this->session->userdata('COMPANY2_ID')) {
//                $company = $company = $this->session->userdata('COMPANY2_ID');
//            } else {
//                $company = COMPANY1_ID;
//            }
//        }
        //TODO***Kreston**only***********

        $this->db->select('*');
        $this->db->from('hr_pay_employees');
        $this->db->where('hr_pay_employees.id',$id);
//        if($this->ion_auth->in_group($groups_emp)) {
//            $this->db->where(array('company'=>$company));
//        }
        $query = $this->db->get();
        return $query->row();
    }

    public function GetJobTitlebyID($id)
    {
        $this->db->from('hr_pay_m_jobtitles');
        $this->db->where('id',$id);
        $query = $this->db->get();
        return $query->row();
    }

    public function GetDepartmentbyID($id)
    {
        $this->db->from('hr_pay_m_departments');
        $this->db->where('id',$id);
        $query = $this->db->get();
        return $query->row();
    }

    function loans_details($id,$month)
    {
        $q = $this->db->query("SELECT SUM(hpld.amount) AS amount FROM hr_pay_loan_data hpld LEFT OUTER JOIN hr_pay_loan_main hplm ON hplm.id=hpld.l_id WHERE hplm.employee_id='$id' and hplm.`type`='Staff_Loan' and DATE_FORMAT(hpld.date,'%Y-%m') = '$month' ");
        if ($q->num_rows() > 0) {
            return $q->row();
        }
    }

    function festival_details($id,$month)
    {

        $q = $this->db->query("SELECT * FROM hr_pay_loan_main where TRIM(employee_id)='$id' and type='Festival_Advance' and DATE_FORMAT(start_date,'%Y-%m') <= '$month' and DATE_FORMAT(end_date,'%Y-%m') >= '$month'");
        if ($q->num_rows() > 0) {
            return $q->result();
        }


    }

    function month_inst($id,$date)
    {

        $q = $this->db->query("SELECT * FROM hr_pay_loan_data where l_id='$id' and DATE_FORMAT(date,'%Y-%m') = '$date'");
        if ($q->num_rows() > 0) {
            return $q->row();
        }

    }


    function pettycash_details($start_date,$end_date)
    {
          $q = $this->db->query("SELECT * FROM hr_pay_pettycash where DATE_FORMAT(date,'%Y-%m-%d') >= '$start_date' and DATE_FORMAT(date,'%Y-%m-%d') <= '$end_date'");
        if ($q->num_rows() > 0) {
            return $q->result();
        }

    }

    function month_petty($pet_id,$emp_id)
    {

        $q = $this->db->query("SELECT * FROM hr_pay_pettycash_particulars where p_id='$pet_id' and emp_id='$emp_id'");
        if ($q->num_rows() > 0) {
            return $q->result();
        }

    }


    function festival_adv($id)
    {
        $q = $this->db->query("SELECT * FROM hr_pay_festival where employee_id='$id' and status=1");
        if ($q->num_rows() > 0) {
            return $q->row();
        }
    }


    function monthly_adv($id, $month)
    {
        $q = $this->db->query("SELECT * FROM hr_pay_payroll_monthly_advances where employee='$id' and month='$month'");
        if ($q->num_rows() > 0) {
            return $q->row();
        }
    }

        function sal_mgr_add($id, $month)
    {

        $q = $this->db->query("SELECT * FROM hr_pay_monthly_adjustment where employee_id='$id' and 
DATE_FORMAT(date,'%Y-%m') = '$month'");
        if ($q->num_rows() > 0) {
            return $q->row();
        }
    }




    public function update_last_month_main($log)
    {
        $this->db->where('status', 0);
        $this->db->update('hr_pay_payroll_monthend_main', array('status' => 2, 'log' => $log));
    }


    function emp_salary_details($id)
    {
        $q = $this->db->query("SELECT * FROM hr_pay_payroll_employee_salary where emp_id='$id' and status=0");
        if ($q->num_rows() > 0) {
            return $q->row();
        }
    }

    function search_holiday($date)
    {

        $q = $this->db->query("SELECT * FROM hr_pay_holidays where date='$date'");
        if ($q->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }


    }


  function leave_dates($id, $start, $end)
    {

        $q = $this->db->query("SELECT hpld.leave_application as leave_id,hpld.leave_date as date,hpld.leave_day_type as leave_type FROM hr_pay_leave_days hpld inner join hr_pay_leave_applications hpla on hpld.leave_application=hpla.id where hpla.employee='$id' and (hpld.leave_date>='$start' and hpld.leave_date<='$end') and hpla.status='Approved'");
        if ($q->num_rows() > 0) {
            return $q->result();
        }

    }

     function salary_details($id)
    {
        $q = $this->db->query("SELECT * FROM hr_pay_payroll_employee_salary where emp_id='$id'");
        if ($q->num_rows() > 0) {
            return $q->row();
        }
    }


    /*public function clear_monthend_lock_status($id)
    {

        $this->db->where('id', $id);
        $this->db->update('hr_pay_payroll_lock_status',array('status'=>0,'user'=>0));

    }*/

    function get_latets_lock_status_for_monthend_locked($month,$id)
    {
        $q = $this->db->query("SELECT * FROM hr_pay_payroll_monthend_main where month = '$month' and payroll_type='$id'");
        if ($q->num_rows() > 0) {
            return $q->row();
        }
    }

    function get_latets_lock_status_for_monthend($id)
    {
        $q = $this->db->query("SELECT max(hrd.id) as id,max(hrd.month) as month FROM hr_pay_payroll_lock_status hrd where hrd.lock_type='3' and payroll_type='$id'");
        if ($q->num_rows() > 0) {
            return $q->row();
        }
    }


    public function update_lock_for_month($month,$id)
    {
        $this->db->where(array('month'=>$month,'payroll_type'=>$id));
        $this->db->update('hr_pay_payroll_lock_status',array('lock'=>1));

        $this->db->where(array('month'=>$month,'payroll_type'=>$id));
        if($this->db->update('hr_pay_payroll_monthend_main',array('main_lock'=>1))){
            return TRUE;
        }
    }

    function get_latets_lock_status($id)
    {
        $q = $this->db->query("SELECT max(id) as id,max(month) as month FROM hr_pay_payroll_lock_status where lock_type='3' and payroll_type='$id'");
        if ($q->num_rows() > 0) {
            return $q->row();
        }
    }

    public function clear_monthend_list($month,$id,$pay_id)
    {
        $this->db->where(array('month'=>$month,'pid_org'=>$id));
        $this->db->delete('hr_pay_payroll_monthend_list_data');

        $this->db->where(array('month'=>$month,'pid'=>$id));
        $this->db->delete('hr_pay_payroll_monthend_list');

        $this->db->where(array('month'=>$month,'payroll_type'=>$pay_id));
        $this->db->delete('hr_pay_payroll_pay_lock');

        $this->db->where(array('month'=>$month,'payroll_type'=>$pay_id));
        $this->db->delete('hr_pay_payroll_lock_status');

        $this->db->where(array('month'=>$month,'payroll_type'=>$pay_id));
        if($this->db->delete('hr_pay_payroll_monthend_main')){

         return TRUE;

        }
    }

    public function get_monthly_payments($month,$id)
    {
        $q = $this->db->query("SELECT * FROM hr_pay_payroll_monthly_payments where employee='$id' and month='$month'");
        if ($q->num_rows() > 0) {
            return $q->row();
        }
    }

    public function get_monthly_payments_by_type($month,$id)
    {
        $q = $this->db->query("SELECT id,employee,pay_type,month,sum(amount) as totamount,status FROM hr_pay_payroll_monthly_payments where employee='$id' and month='$month' group by pay_type");
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }

    //Deductions q starts
    public function get_monthly_deductions_by_type($month,$id)
    {
        $q = $this->db->query("SELECT id,employee,deduction_type,month,sum(amount) as totamount,status FROM hr_pay_payroll_monthly_deductions where employee='$id' and month='$month' group by deduction_type");
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }
    //Deductions q end

    public function get_advances_by_type($month,$id)
    {
        $q = $this->db->query("SELECT id,employee,adv_type,month,sum(amount) as totamount,status FROM hr_pay_payroll_monthly_advances where employee='$id' and month='$month' group by adv_type");
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }

    //Monthend info summary
    function getTotalEmps()
    {
        $q = $this->db->query("SELECT count(*) as tot FROM hr_pay_employees hpe WHERE hpe.status = 'Active'");
        if ($q->num_rows() > 0) {
            return $q->row();
        }
    }

    function getTotalPendingLeaves()
    {
        $q = $this->db->query("SELECT count(*) as tot FROM hr_pay_employees hpe WHERE hpe.status = 'Active'");
        if ($q->num_rows() > 0) {
            return $q->row();
        }
    }

    //Monthend reports
    function get_all_monthend_list($id=null)
    {
        if($id!=null) {
            $q = $this->db->query("SELECT * FROM hr_pay_payroll_monthend_main inner join auth_users  on auth_users.id=hr_pay_payroll_monthend_main.user where upto != '0000-00-00' and payroll_type='$id'");

        }else{

            $q = $this->db->query("SELECT * FROM hr_pay_payroll_monthend_main inner join auth_users  on auth_users.id=hr_pay_payroll_monthend_main.user where upto != '0000-00-00' ");
        }

        //$q = $this->db->query("SELECT * FROM hr_pay_payroll_monthend_main where upto != '0000-00-00'");
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }

    //ETF report

    function get_all_employee()
    {
//        $groups_emp = array('manager');
//        if($this->ion_auth->in_group($groups_emp)) {
//            if ($this->session->userdata('COMPANY2_ID')) {
//                $company = $company = $this->session->userdata('COMPANY2_ID');
//            } else {
//                $company = COMPANY1_ID;
//            }
//
//            $q = $this->db->query("SELECT * FROM hr_pay_employees WHERE company='$company' ORDER BY id");
//        }
//        else{
            $q = $this->db->query("SELECT * FROM hr_pay_employees ORDER BY id");
//        }

        if ($q->num_rows() > 0) {
            return $q->result();
        }
    }

    function salary_summary_data($id,$month)
    {
        $q = $this->db->query("SELECT * FROM hr_pay_payroll_monthend_list where ref_id='$id' and month='$month'");
        if ($q->num_rows() > 0) {
            return array_shift($q->result_array());
        }
    }

    function get_employer_details()
    {
        $q = $this->db->query("SELECT * FROM m_org_branches where id=1 ");
        if ($q->num_rows() > 0) {
            return $q->row();
        }
    }

    //PAYE data
    public function getPAYEdata()
    {
        $sql = $this->db->query("SELECT * FROM hr_pay_m_employee_paye_types WHERE 1=1");
        if ($sql->num_rows() > 0) {
            /*foreach (($sql->result()) as $row) {
                $data[] = $row;
            }*/
           //return $data;
            return $sql->result();
        }else{
            return false;
        }
    }

    //STAMP data
    public function getSTAMPdata()
    {
        $sql = $this->db->query("SELECT * FROM hr_pay_m_employee_stamp_types WHERE 1=1");
        if ($sql->num_rows() > 0) {
            /*foreach (($sql->result()) as $row) {
                $data[] = $row;
            }*/
            //return $data;
            return $sql->result();
        }else{
            return false;
        }
    }

    //FOR  6months
    function getAllEmployeesFORsixM($date)
    {
        $q = $this->db->query("select * from hr_pay_employees where status='Active' union (select * from hr_pay_employees where  DATE_FORMAT(termination_date,'%Y-%m-%d') >= '$date') order by employee_id ");
        if($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }

    public function salary_summary_data_byID($emp,$month){
        $q = $this->db->query("SELECT * FROM hr_pay_payroll_monthend_list WHERE ref_id='$emp' AND month='$month'");
        if ($q->num_rows() > 0) {
            return array_shift($q->result_array());
        }
    }

    public function get_relavant_employee($emp,$date){
        $q = $this->db->query("SELECT * FROM hr_pay_employees WHERE DATE_FORMAT(joined_date,'%Y-%m') <= '$date' and id='$emp'");
        if($q->num_rows() > 0) {
            return true;
        }
        return false;
    }

    function get_salary_emp_details($month,$employee)
    {
        $employee_qury = "";
        if($employee!=""){
            $employee_qury = "ref_id='$employee' AND";
        }

        $sql = "select * from hr_pay_payroll_monthend_list where $employee_qury month = '$month'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }

    public function get_job_title($id)
    {
        $sql = $this->db->query("SELECT * FROM hr_pay_m_jobtitles WHERE id='$id'");
        if ($sql->num_rows() > 0) {
            return $sql->row();
        }
    }

    public function get_department($id)
    {
        $sql = $this->db->query("SELECT * FROM hr_pay_m_departments WHERE id='$id'");
        if ($sql->num_rows() > 0) {
            return $sql->row();
        }
    }

    public function get_acccount($id)
    {
        $sql = $this->db->query("SELECT hpebi.account_no AS acc,hpmb.NAME AS bank_name,hpmbb.branch_name AS branch_name,hpmb.CODE AS bank_code,hpmb.CODE AS branch_code FROM hr_pay_employees_bank_info hpebi LEFT OUTER JOIN hr_pay_m_banks hpmb ON hpebi.bank_name=hpmb.id LEFT OUTER JOIN hr_pay_m_bank_branches hpmbb ON hpebi.branch_name=hpmbb.id  WHERE hpebi.emp_id='$id' AND TYPE=1");
        if ($sql->num_rows() > 0) {
            return $sql->row();
        }
    }

    public function getmonthly_mobile_bill($month_nw,$m_number)
    {
        $sql = $this->db->query("SELECT * FROM hr_pay_mobile_bill WHERE month='$month_nw' and tel='$m_number'");
        if ($sql->num_rows() > 0) {
            return $sql->row();
        }
    }

    function get_process_status($month)
    {
        $q = $this->db->query("SELECT * FROM hr_pay_payroll_lock_status where month='$month' and process_lock=0");
        if ($q->num_rows() > 0) {
            return $q->row();
        }
    }

    function update_process_status($month)
    {
        $this->db->query("update hr_pay_payroll_lock_status set process_lock=1 where month='$month' ");

    }

    public function get_payroll_data($id)
    {
        $query = $this->db->query("SELECT * FROM hr_pay_payroll_types WHERE id='$id'");
        return $query->row();
    }

}