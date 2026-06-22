<?php

class Employee_list_model extends CI_Model
{
    var $table = 'hr_pay_employees';
    var $column = array('employee_id','name','job_title','department','section');
    var $order = array('employee_id' => 'asc');

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }



    public function get_by_id($id)
    {
        $this->db->select('hr_pay_employees.*');
        $this->db->from($this->table);
        $this->db->where('hr_pay_employees.id',$id);
        $query = $this->db->get();

        return $query->row();
    }

    public function get_bank_by_id($id)
    {

        $this->db->select('hr_pay_employees_bank_info.account_no,hr_pay_employees_bank_info.bank_name,hr_pay_employees_bank_info.branch_name AS branch_id,hr_pay_m_banks.name,hr_pay_m_banks.code AS bank_code,hr_pay_m_bank_branches.branch_name,hr_pay_m_bank_branches.branch_code');
        $this->db->from('hr_pay_employees_bank_info');
        $this->db->join('hr_pay_m_banks','hr_pay_m_banks.id=hr_pay_employees_bank_info.bank_name','left');
        $this->db->join('hr_pay_m_bank_branches','hr_pay_m_bank_branches.id=hr_pay_employees_bank_info.branch_name','left');
        $this->db->where('hr_pay_employees_bank_info.emp_id',$id);
        $query = $this->db->get();

        return $query->row();

    }

    public function ajax_get_emp_info($id)
    {

        $this->db->select('*');

        $this->db->from('hr_pay_employees');
        $this->db->where('hr_pay_employees.id',$id);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function ajax_get_emp_sal_info($id)
    {
        $this->db->select('*');
        $this->db->from('hr_pay_payroll_employee_salary');
        $this->db->where('hr_pay_payroll_employee_salary.emp_id',$id);
        $this->db->where('hr_pay_payroll_employee_salary.status',1);
        $query = $this->db->get();

        if($query->num_rows() > 0 ){
            return $query->result_array();
        }
        else{
            return "";
        }
    }

    public function update_bulk_salary_info($emp_id,$month,$data)
    {
        $this->db->where('hr_pay_payroll_employee_salary.emp_id',$emp_id);
        $this->db->where('hr_pay_payroll_employee_salary.month',$month);
        $this->db->update('hr_pay_payroll_employee_salary', $data);
        return TRUE;
    }

    public function insert_bulk_salary_info($data)
    {
        $this->db->insert('hr_pay_payroll_employee_salary', $data);
        return TRUE;
    }

    public function save_salary_info($emp_id,$data)
    {
        $this->db->where('hr_pay_payroll_employee_salary.emp_id',$emp_id);
        $this->db->where('hr_pay_payroll_employee_salary.status',1);
        $this->db->update('hr_pay_payroll_employee_salary', $data);
        return TRUE;
    }
    public function add_salary_info($data)
    {
        $this->db->insert('hr_pay_payroll_employee_salary', $data);
        return TRUE;
    }

    public function get_last_employee_id(){
        $this->db->select('employee_id');
        $this->db->from('hr_pay_employees');
        $this->db->order_by("employee_id", "desc");
        $this->db->limit(1);
        $query=$this->db->get();

        return $query->result_array();
    }

    public function save($data)
    {
        if($this->db->insert('hr_pay_employees', $data)){
            return $this->db->insert_id();
        } else {
            return false;
        }
    }
    public function save_bank_info($data)
    {
        $this->db->insert('hr_pay_employees_bank_info', $data);
        return $this->db->insert_id();
    }

    public function update($data,$where)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }

    public function update_employee($data,$where)
    {
        $this->db->where('hr_pay_employees.id',$where);
        $this->db->update('hr_pay_employees', $data);
        return TRUE;
    }

    public function update_bank_info($data,$where)
    {
        $this->db->update('hr_pay_employees_bank_info', $data, $where);
        return $this->db->affected_rows();
    }

    public function delete_by_id($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table);
    }


    public function GetEmpInfo($id)
    {
        $this->db->select('*');
        $this->db->from('hr_pay_employees');
        $this->db->where('hr_pay_employees.id',$id);
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

    public function GetEmployeeCategorybyID($id)
    {
        $this->db->from('hr_pay_m_employee_category');
        $this->db->where('id',$id);
        $query = $this->db->get();
        return $query->row();
    }

    public function GetEmployementStatusbyID($id)
    {
        $this->db->from('hr_pay_m_employmentstatus');
        $this->db->where('id',$id);
        $query = $this->db->get();
        return $query->row();
    }

    public function GetBranchbyID($id)
    {
        $this->db->from('m_org_branches');
        $this->db->where('id',$id);
        $query = $this->db->get();
        return $query->row();
    }

    public function GetReligionbyID($id)
    {
        $this->db->from('hr_pay_m_religions');
        $this->db->where('id',$id);
        $query = $this->db->get();
        return $query->row();
    }

    public function GetNationalitybyID($id)
    {
        $this->db->from('hr_pay_m_nationality');
        $this->db->where('id',$id);
        $query = $this->db->get();
        return $query->row();
    }

    public function getAllEmployees($condition = null)
    {
        $this->db->select('hr_pay_employees.*');
        $this->db->from('hr_pay_employees');

        if($condition != null) $this->db->where($condition);
        $this->db->order_by("hr_pay_employees.employee_id", "asc");
        $query = $this->db->get();
        return $query->result();
    }

    public function getDepartments($condition = null)
    {
        $this->db->from('hr_pay_m_departments');
        if($condition != null) $this->db->where($condition);
        $query = $this->db->get();
        return $query->result();
    }

    public function getEmployeeCategory($condition = null)
    {
        $this->db->from('hr_pay_m_employee_category');
        if($condition != null) $this->db->where($condition);
        $query = $this->db->get();
        return $query->result();
    }

    public function getBranches($condition = null)
    {
        $this->db->from('m_org_branches');
        if($condition != null) $this->db->where($condition);
        $query = $this->db->get();
        return $query->result();
    }

    public function getTypes($condition = null)
    {
        $this->db->from('m_org_branches');
        if($condition != null) $this->db->where($condition);
        $query = $this->db->get();
        return $query->result();
    }

    public function getDesignations($condition = null)
    {
        $this->db->from('hr_pay_m_jobtitles');
        if($condition != null) $this->db->where($condition);
        $query = $this->db->get();
        return $query->result();
    }

    public function getSupervisor($condition = null)
    {
        return $this->getAllEmployees($condition);
    }

    public function getPayGrade($condition = null)
    {
        $this->db->from('hr_pay_m_paygrades');
        if($condition != null) $this->db->where($condition);
        $query = $this->db->get();
        return $query->result();
    }
    public function getEmploymentStatus($condition = null)
    {
        $this->db->from('hr_pay_m_employmentstatus');
        if($condition != null)$this->db->where($condition);
        $query = $this->db->get();
        return $query->result();
    }

    public function getReligions($condition = null)
    {
        $this->db->from('hr_pay_m_religions');
        if($condition != null)$this->db->where($condition);
        $query = $this->db->get();
        return $query->result();
    }

    public function getNationality($condition = null)
    {
        $this->db->from('hr_pay_m_nationality');
        if($condition != null)$this->db->where($condition);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_emp_photo_by_emp_id($id)
    {
        $this->db->from('hr_pay_employees_photos');
        $this->db->where('empTableID',$id);
        $query = $this->db->get();
        return $query;
    }

    public function save_emp_photo($data)
    {
        $this->db->insert('hr_pay_employees_photos', $data);
        return $this->db->insert_id();
    }
    public function update_emp_photo($where, $data)
    {
        $this->db->update('hr_pay_employees_photos', $data, $where);
        return true;
    }

    public function get_emp_file($condition = null)
    {
        $this->db->select("hr_pay_employee_documents.document_id,
                                hr_pay_employee_documents.emp_table_id,
                                hr_pay_employees.full_name as employee_name,
                                hr_pay_employee_documents.document_name,
                                hr_pay_employee_documents.document_type as document_type_id,
                                hr_pay_m_document_types.type_name as document_type_name,
                                hr_pay_employee_documents.size_in_bytes,
                                hr_pay_employee_documents.path,
                                hr_pay_employee_documents.valid_until,
                                hr_pay_employee_documents.status,
                                hr_pay_employee_documents.details,
                                hr_pay_employee_documents._created_,
                                hr_pay_employee_documents._updated_", FALSE);
        $this->db->from('hr_pay_employee_documents');
        $this->db->join('hr_pay_employees', 'hr_pay_employee_documents.emp_table_id=hr_pay_employees.id', 'left');
        $this->db->join('hr_pay_m_document_types', 'hr_pay_employee_documents.document_type=hr_pay_m_document_types.id', 'left');
        if($condition != null)
        {
            $this->db->where($condition);
        }
        $query = $this->db->get();
        return $query;
    }
    public function save_emp_file($data)
    {
        $this->db->insert('hr_pay_employee_documents', $data);
        return $this->db->insert_id();
    }
    public function update_emp_file($where, $data)
    {
        $this->db->update('hr_pay_employee_documents', $data, $where);
        return $this->db->affected_rows();
    }
    public function delete_emp_file($where)
    {
        $this->db->where($where);
        $this->db->delete('hr_pay_employee_documents');
        return $this->db->affected_rows();
    }

    public function get_teachers_list(){

        $this->db->select('name,id');
        $this->db->where(array('login_group_id'=>3));
        $this->db->from($this->table);
        $query=$this->db->get();
        $data=array();

        foreach($query->result() as $row){
            $data[$row->id]=$row->name;
        }
        return ($data);
    }

    public function get_consult_all(){

        $this->db->select('id,employee_id');
        $this->db->where('section','9');
        $query = $this->db->get('hr_pay_employees');
        $data = array();

        foreach($query->result() as $row){

            $data[$row->id] = $row->employee_id;
        }
        return($data);
    }

    public function getEmployees($condition = null){

        $this->db->from('hr_pay_employees');
        if($condition != null) $this->db->where($condition);
        $query = $this->db->get();
        return $query->result();
    }



    public function check_image_availability($emp_id){

        $this->db->from('hr_pay_employees_photos');
        $this->db->where('empTableID',$emp_id);
        $query = $this->db->get();

        return $query;

    }

    public function get_last_id(){
        $this->db->select('id');
        $this->db->from('hr_pay_employees');
        $this->db->order_by('hr_pay_employees.id','desc');
        $this->db->limit(1);
        $query=$this->db->get() ;

        return $query->result();
    }

    public function get_bank_info($id){
        $this->db->select('*');
        $this->db->from('hr_pay_employees_bank_info');
        $this->db->where('hr_pay_employees_bank_info.emp_id',$id);
        $query=$this->db->get() ;

        return $query->result();
    }

    function check_last_job($emp_id){

        $this->db->select('job_title,emp_category,department,branch,epf_no,title,marital_status,bank_name,branch_name,nic_num,postal_address,emp_status,basic_salary,account_no');
        $this->db->from('hr_pay_employees');
        $this->db->join('hr_pay_employees_bank_info','hr_pay_employees.id=hr_pay_employees_bank_info.emp_id','left outer');
        $this->db->where('hr_pay_employees.id',$emp_id);
        $query=$this->db->get() ;

        return $query->result();
    }

    function check_info($emp_id,$type_name){

        $this->db->select('value');
        $this->db->from('hr_pay_employees_job_history');
        $this->db->where('employee',$emp_id);
        $this->db->where('type_name',$type_name);
        $query=$this->db->get() ;

        return array_shift($query->result());

    }

    function get_emp_history($type,$emp_id){

//        $this->db->select('hr_pay_m_employee_category.desc as cat,hr_pay_m_departments.desc as dept,m_org_branches.name as branch,
//                           hr_pay_m_jobtitles.desc as jobtitle,epf_no,basic_salary,employee,date,user');
//        $this->db->from('hr_pay_employees_job_history');
//        $this->db->join('hr_pay_m_employee_category ','hr_pay_m_employee_category.id=hr_pay_employees_job_history.emp_category','left outer');
//        $this->db->join('hr_pay_m_departments ','hr_pay_m_departments.id=hr_pay_employees_job_history.department','left outer');
//        $this->db->join('m_org_branches ','m_org_branches.id=hr_pay_employees_job_history.branch','left outer');
//        $this->db->join('hr_pay_m_jobtitles ','hr_pay_m_jobtitles.id=hr_pay_employees_job_history.job_title','left outer');
//        $this->db->where('employee',$emp_id);

        if($type=='Department') {
            $select='hr_pay_m_departments.desc as val,';
            $join=$this->db->join('hr_pay_m_departments ','hr_pay_m_departments.id=hr_pay_employees_job_history.value','left outer');
        }
        else if($type=='Emp Category'){
            $select ='hr_pay_m_employee_category.desc as val,';
            $join=$this->db->join('hr_pay_m_employee_category ','hr_pay_m_employee_category.id=hr_pay_employees_job_history.value','left outer');
        }
        else if($type=='Branch'){
            $select='m_org_branches.name as val,';
            $join=$this->db->join('m_org_branches ','m_org_branches.id=hr_pay_employees_job_history.value','left outer');
        }
        if($type=='Job Title'){
            $select ='hr_pay_m_jobtitles.desc as val,';
            $join=$this->db->join('hr_pay_m_jobtitles ','hr_pay_m_jobtitles.id=hr_pay_employees_job_history.value','left outer');
        }
        if($type=='Emp Status'){
            $select='hr_pay_m_employmentstatus.name as val,';
            $join= $this->db->join('hr_pay_m_employmentstatus',' hr_pay_m_employmentstatus.id=hr_pay_employees_job_history.value','left outer');
        }
        if($type=='Epf No'){
            $select='value as val,';
        }
        if($type=='Basic Salary'){
            $select='value as val,';
        }
        if($type=='Title'){
            $select='value as val,';
        }
        if($type=='Marital Status'){
            $select='value as val,';
        }
        if($type=='NIC'){
            $select='value as val,';
        }
        if($type=='Account No'){
            $select='value as val,';

        }
        if($type=='Bank Name'){
            $select ='hr_pay_m_banks.name as val,';
            $join=$this->db->join('hr_pay_m_banks','hr_pay_m_banks.id=hr_pay_employees_job_history.value','left outer');

        }
        if($type=='Branch Name'){
            $select ='hr_pay_m_bank_branches.branch_name as val,';
            $join=$this->db->join('hr_pay_m_bank_branches','hr_pay_m_bank_branches.id=hr_pay_employees_job_history.value','left outer');

        }
        if($type=='Postal Address'){
            $select='value as val,';

        }

        $select1='type_name,employee,date,user';

        $this->db->select($select.$select1);
        $this->db->from('hr_pay_employees_job_history');
        $join;
        $this->db->where('employee',$emp_id);
        $this->db->where('type_name',$type);

        $query=$this->db->get() ;

        return $query->result();

    }

    function get_type($emp_id){

        $this->db->select('type_name,employee,value,user,date');
        $this->db->from('hr_pay_employees_job_history');
        $this->db->where('employee',$emp_id);
        $this->db->group_by('type_name');

        $query=$this->db->get() ;
        return $query->result();


    }
    /*public function salary_fields($condition=null){
        $this->db->select('*');
        $this->db->from('hr_pay_emp_type_salary_field');
        if($condition){
            $this->db->where($condition);
        }
        $query=$this->db->get() ;

        return $query->result();
    }

    public function salary_fields_group(){
        $this->db->select('*');
        $this->db->from('hr_pay_emp_type_salary_field');
        $this->db->group_by('emp_type');
        $query=$this->db->get();

        return $query->result();
    }*/

    public function getEmpStatus($id)
    {
        $this->db->select('hr_pay_m_employmentstatus.name');
        $this->db->from('hr_pay_m_employmentstatus');
        $this->db->where('id',$id);
        $query=$this->db->get();

        if($query->num_rows() > 0 ){

            return $query->row();
        }
        /*else{
            return false;
        }*/
    }

    public function getBranch($id)
    {
        $this->db->select('m_org_branches.code');
        $this->db->from('m_org_branches');
        $this->db->where('id',$id);
        $query=$this->db->get();

        if($query->num_rows() > 0 ){

            return $query->row();
        }
        else{
            return false;
        }
    }

    public function getPassword($id)
    {
        $this->db->select('auth_users.password');
        $this->db->from('auth_users');
        $this->db->where('id',$id);
        $query=$this->db->get();

        if($query->num_rows() > 0 ){

            return $query->row();
        }
        else{
            return false;
        }
    }

    public function get_bank_available($where){

        $this->db->select('*');
        $this->db->from('hr_pay_employees_bank_info');
        $this->db->where($where);
        $query=$this->db->get();
        return $query->result();
    }

    public function GetDocTypes()
    {
        $this->db->from('hr_pay_m_document_types');
        $query = $this->db->get();
        return $query->result();
    }
    public function GetCertiTypes()
    {
        $this->db->from('hr_pay_m_certifications');
        $query = $this->db->get();
        return $query->result();
    }
    public function GetSkillTypes()
    {
        $this->db->from('hr_pay_m_skills');
        $query = $this->db->get();
        return $query->result();
    }
    public function GetEduTypes()
    {
        $this->db->from('hr_pay_m_educations');
        $query = $this->db->get();
        return $query->result();
    }

    public function GetExpTypes(){

        $this->db->from('hr_pay_m_experiences');
        $query = $this->db->get();
        return $query->result();
    }
    public function GetSportTypes(){

        $this->db->from('hr_pay_m_sports');
        $query = $this->db->get();
        return $query->result();
    }
    function GetExperience(){

        $this->db->from('hr_pay_m_experiences');
        $query = $this->db->get();
        return $query->result();

    }

    public function ajax_get_emp_certi_info($id)
    {
        $this->db->select('*');
        $this->db->from('hr_pay_employees_certifications');
        $this->db->where('hr_pay_employees_certifications.id',$id);
        $query = $this->db->get();

        if($query->num_rows() > 0 ){
            return $query->result_array();
        }
        else{
            return "";
        }
    }
    public function update_certi($data_main,$certi_id,$employee)
    {
        $this->db->where('hr_pay_employees_certifications.id',$certi_id);
        $this->db->where('hr_pay_employees_certifications.employee',$employee);
        $this->db->update('hr_pay_employees_certifications', $data_main);
        return true;
    }

    public function ajax_get_emp_skill_info($id)
    {
        $this->db->select('*');
        $this->db->from('hr_pay_employees_skills');
        $this->db->where('hr_pay_employees_skills.id',$id);
        $query = $this->db->get();

        if($query->num_rows() > 0 ){
            return $query->result_array();
        }
        else{
            return "";
        }
    }
    public function update_skill($data_main,$skill_id,$employee)
    {
        $this->db->where('hr_pay_employees_skills.id',$skill_id);
        $this->db->where('hr_pay_employees_skills.employee',$employee);
        $this->db->update('hr_pay_employees_skills', $data_main);
        return true;
    }


    public function ajax_get_emp_edu_info($id)
    {
        $this->db->select('*');
        $this->db->from('hr_pay_employees_educations');
        $this->db->where('hr_pay_employees_educations.id',$id);
        $query = $this->db->get();

        if($query->num_rows() > 0 ){
            return $query->result_array();
        }
        else{
            return "";
        }
    }
    public function update_edu($data_main,$edu_id,$employee)
    {
        $this->db->where('hr_pay_employees_educations.id',$edu_id);
        $this->db->where('hr_pay_employees_educations.employee',$employee);
        $this->db->update('hr_pay_employees_educations', $data_main);
        return true;
    }

    public function ajax_get_emp_sport_info($id)
    {
        $this->db->select('*');
        $this->db->from('hr_pay_employees_sports');
        $this->db->where('hr_pay_employees_sports.id',$id);
        $query = $this->db->get();

        if($query->num_rows() > 0 ){
            return $query->result_array();
        }
        else{
            return "";
        }
    }
    public function update_sport($data_main,$sport_id,$employee)
    {
        $this->db->where('hr_pay_employees_sports.id',$sport_id);
        $this->db->where('hr_pay_employees_sports.employee',$employee);
        $this->db->update('hr_pay_employees_sports', $data_main);
        return true;
    }
    public function ajax_get_emp_exp_info($id)
    {
        $this->db->select('*');
        $this->db->from('hr_pay_employees_experiences');
        $this->db->where('hr_pay_employees_experiences.id',$id);
        $query = $this->db->get();

        if($query->num_rows() > 0 ){
            return $query->result_array();
        }
        else{
            return "";
        }
    }
    public function update_exp($data_main,$exp_id,$employee)
    {
        $this->db->where('hr_pay_employees_experiences.id',$exp_id);
        $this->db->where('hr_pay_employees_experiences.employee',$employee);
        $this->db->update('hr_pay_employees_experiences', $data_main);
        return true;
    }

    //Update Allawances
    public function update_emp_allow($emp_id,$allow_id,$update_allowance_data)
    {
//        $this->db->where('employee_id', $emp_id);
//        $this->db->where('allowance_id', $allow_id);
//        $this->db->update('hr_pay_employees_allowances',$update_allowance_data);
//        return true;


        $this->db->where('employee_id', $emp_id);
        $this->db->where('id', $allow_id);
        $this->db->update('hr_pay_employees_allowances',$update_allowance_data);
        return true;
    }

    function get_allowance_emp_data($id)
    {
        $this->db->select('*');
        $this->db->from('hr_pay_employees_allowances');
        $this->db->where('hr_pay_employees_allowances.employee_id',$id);
        $q = $this->db->get();
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }

    function getallAllowances()
    {
        $this->db->where('type',"Employee");
        $q = $this->db->get('hr_pay_m_employee_allowance_types');
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }

    function get_allowances_list()
    {
        $this->db->where('type',"Employee");
        $query = $this->db->get_where('hr_pay_m_employee_allowance_types');
        $dts = array();

        if ($query->result()) {
            foreach ($query->result() as $dt) {
                $dts[$dt->id] = $dt->allowance;
            }
            return $dts;
        } else {
            return FALSE;
        }
    }

    //Salary Increments

    public function add_salary_record($data)
    {
        $this->db->insert('hr_pay_employees_salary_history', $data);
        return $this->db->insert_id();
    }

    function GetTerminateReason(){
        $this->db->from('hr_pay_m_terminate_reasons');
        $query = $this->db->get();
        return $query->result();
    }

    //TODO ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    public function get_banks(){

        $this->db->select('hr_pay_m_banks.id,hr_pay_m_banks.name,hr_pay_m_banks.code');
        $this->db->from('hr_pay_m_banks');
        $query=$this->db->get();

        if ($query->num_rows() > 0) {

            foreach (($query->result()) as $row){
                $data[] = array('value'=>$row->id,'label'=>$row->code.' - '.$row->name);
            }
            return $data;
        }

    }

    public function get_bank_branches($where){

        $this->db->select('hr_pay_m_bank_branches.id,hr_pay_m_bank_branches.branch_name,hr_pay_m_bank_branches.branch_code');
        $this->db->from('hr_pay_m_bank_branches');
        $this->db->where($where);
        $query=$this->db->get();

        if ($query->num_rows() > 0) {

            foreach (($query->result()) as $row){
                $data[] = array('value'=>$row->id,'label'=>$row->branch_code.' - '.$row->branch_name);
            }
            return $data;
        }

    }
    //TODO ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

    public function update_system_user_permission($id,$state)
    {
        $this->db->where('id', $id);
        if($state==1) {
            $this->db->update('auth_users', array('active' => 0));
        }else{
            $this->db->update('auth_users', array('active' => 1));
        }

    }

    public function update_system_user_details($first,$last,$id)
    {
        $this->db->where('id', $id);
        $this->db->update('auth_users', array('first_name' => $first,'last_name'=>$last));
    }

}