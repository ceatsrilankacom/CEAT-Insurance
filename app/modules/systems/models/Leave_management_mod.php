<?php
/**
 * Created by PhpStorm.
 * User: S.Priyadarshan
 * Date: 08-Jul-16
 * Time: 08:22 AM
 */

class leave_management_mod extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getAllEmployeesWhere($condition = null)
    {
        //TODO ~~~~~Techpack~~only
        $this->db->select('hr_pay_employees.*');
        $this->db->from('hr_pay_employees');

        $this->db->where('status', 'Active');
        if($condition != null) $this->db->where($condition);
        $this->db->order_by("hr_pay_employees.employee_id", "asc");
        $query = $this->db->get();
        return $query->result();
        //TODO ~~~~~Techpack~~only
    }

    public function get_leave_applications($condition=null)
    {
        $this->db->select("hr_pay_leave_applications.id as leave_application_id,
                        hr_pay_leave_applications.employee as employee_id,
                        hr_pay_leave_applications.leave_type as leave_type_id,
                        hr_pay_employees.employee_id as employee_epf_no,
                                hr_pay_employees.first_name,
                                hr_pay_employees.last_name,
                        hr_pay_leave_types.leave_type_name,
                        hr_pay_leave_applications.start_date,
                        hr_pay_leave_applications.end_date,
                        hr_pay_leave_applications.leave_reason,
                        hr_pay_leave_applications.status,
                        hr_pay_leave_applications._created_,
                        hr_pay_leave_applications._updated_,
                        hr_pay_leave_applications.relate_join");
        $this->db->from('hr_pay_leave_applications');
        $this->db->join('hr_pay_leave_types', 'hr_pay_leave_applications.leave_type=hr_pay_leave_types.leave_type_id', 'left');
        $this->db->join('hr_pay_employees', 'hr_pay_leave_applications.employee=hr_pay_employees.id', 'left');
        if($condition !== null)
        {
            $this->db->where($condition);
        }
        $query = $this->db->get();
        return $query;
    }
    public function count_leave_applications($condition=null, $groupby = null)
    {
        $select = $groupby == null ? "COUNT(*) AS 'leave_application_count'" : "$groupby, COUNT(*) AS 'leave_application_count'";
        $this->db->select($select);
        $this->db->from('hr_pay_leave_applications');
        if($condition !== null)
        {
            $this->db->where($condition);
        }
        if($groupby !== null)
        {
            $this->db->group_by($groupby);
        }
        $query = $this->db->get();
        return $query;
    }

    public function get_hr_pay_leave_days($condition=null)
    {
        $this->db->select("hr_pay_leave_days.leave_date, hr_pay_leave_days.leave_day_type");
        $this->db->from('hr_pay_leave_days');
        if($condition !== null)
        {
            $this->db->where($condition);
        }
        $query = $this->db->get();
        return $query;
    }

    public function get_leave_attachments($condition)
    {

        $this->db->select("hr_pay_leave_attachment.path");
        $this->db->from('hr_pay_leave_attachment');
        $this->db->where($condition);
        $query=$this->db->get();
        return $query->row();

    }

    public function count_hr_pay_leave_days($condition=null, $groupby = null)
    {
        $select = $groupby == null ? "COUNT(*) AS 'leave_day_count'" : "$groupby, COUNT(*) AS 'leave_day_count'";
        $this->db->select($select);
        $this->db->from('hr_pay_leave_days');
        if($condition !== null)
        {
            $this->db->where($condition);
        }
        if($groupby !== null)
        {
            $this->db->group_by($groupby);
        }
        $query = $this->db->get();
        return $query;
    }

    public function count_leave_days($condition=null, $groupby = null)
    {
        $select = $groupby == null ? "COUNT(*) AS 'leave_day_count'" : "$groupby, COUNT(*) AS 'leave_day_count'";
        $this->db->select($select);
        $this->db->from('hr_pay_leave_days');
        if($condition !== null)
        {
            $this->db->where($condition);
        }
        if($groupby !== null)
        {
            $this->db->group_by($groupby);
        }
        $query = $this->db->get();
        return $query;
    }
    public function apply_leave($data)
    {
        $this->db->insert('hr_pay_leave_applications', $data);
        return $this->db->insert_id();
    }
    public function create_leave_days($data)
    {
        $this->db->insert('hr_pay_leave_days', $data);
        return $this->db->insert_id();
    }
    public function update_leave_application($where, $data)
    {
        $this->db->update('hr_pay_leave_applications', $data, $where);
        return $this->db->affected_rows();
    }
    public function create_leave_log($data)
    {

        $this->db->insert('hr_pay_leave_log', $data);
        return $this->db->insert_id();
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

    //TODO ~~~~~~Common~not use~~for~~techpac~~~~~please uncomment below getLeaveTypes~~~~~~~~~
//    public function getLeaveTypes($condition = null)
//    {
//        $this->db->from('hr_pay_leave_types');
//        if($condition != null) $this->db->where($condition);
//        $query = $this->db->get();
//        return $query;
//    }

//TODO ~~~~~Techpack~~only
    public function getLeaveTypes($condition = null,$condition_2 = null)
    {
        $groups=array('admin','hr_manager'); if ($this->ion_auth->in_group($groups)) {

                $this->db->from('hr_pay_leave_types');
            if($condition == 'Female' and $condition_2=='Married'){
                $query = $this->db->get();
                return $query;
            }else{
                $this->db->where(array('leave_type_id!='=>'5'));
                $query = $this->db->get();
                return $query;
            }

        }else{
            $this->db->from('hr_pay_leave_types');
            if($condition == 'Female' and $condition_2=='Married'){
                $this->db->where(array('employee_can_apply'=>'Yes'));
            }else{
                $this->db->where(array('leave_type_id!='=>'5','employee_can_apply'=>'Yes'));
            }
            $query = $this->db->get();
            return $query;
        }
    }

    public function getLeaveTypes_self($condition = null,$condition_2 = null)
    {
        if($condition == 'Female' and $condition_2=='Married'){
            $query = $this->db->query("SELECT * FROM hr_pay_leave_types WHERE employee_can_apply='Yes'");
        }else{
            $query = $this->db->query("SELECT * FROM hr_pay_leave_types WHERE leave_type_id!='5' and employee_can_apply='Yes'");
        }
        return $query;
    }

//TODO ~~~~~Techpack~~only

    public function get_employess($condition = null)
    {
        $this->db->where('status', 'Active');
        $this->db->from('hr_pay_employees');
        $query = $this->db->get();
        return $query;
    }
    public function getAllEmployees($condition = null)
    {
        $this->db->select('hr_pay_employees.*');
        $this->db->from('hr_pay_employees');

        $this->db->where('status', 'Active');
        if($condition != null) $this->db->where($condition);
        $this->db->order_by("hr_pay_employees.employee_id", "asc");
        $query = $this->db->get();
        return $query->result();
    }


    //Leave Reports
    public function get_leave_details($from_date,$to_date,$emp_id,$supervisor)
    {
        $supervisor_qury = "";
        if($supervisor!=""){
            $supervisor_qury = "hr_pay_employees.supervisor='$supervisor' AND";
        }
        $employee_qury = "";
        if($emp_id!=""){
            $employee_qury = "hr_pay_employees.id='$emp_id' AND";
        }

        $sql = "select          hr_pay_leave_applications.id as leave_application_id,
                                hr_pay_employees.first_name,
                                hr_pay_employees.last_name,
                                hr_pay_employees.employee_id,
                                hr_pay_leave_applications.reason,
                                hr_pay_leave_types.leave_type_name,
                                hr_pay_leave_applications.start_date,
                                hr_pay_leave_applications.end_date,
                                SUM(CASE WHEN leave_day_type = 'Full Day' THEN 1 ELSE 0.5 END) as Days,
                                hr_pay_leave_applications.leave_reason,
CASE WHEN approve_user=1 THEN CONCAT(hr_pay_leave_applications.status,' - Admin') ELSE CONCAT(hr_pay_leave_applications.status,' - ',hpe.first_name) END AS status
                from hr_pay_leave_applications
                left outer join hr_pay_leave_types on hr_pay_leave_applications.leave_type=hr_pay_leave_types.leave_type_id
                left outer join hr_pay_leave_days on hr_pay_leave_applications.id=hr_pay_leave_days.leave_application
                left outer join hr_pay_employees on hr_pay_leave_applications.employee=hr_pay_employees.id
                left outer join hr_pay_employees as hpe on hr_pay_leave_applications.approve_user=hpe.id
                where 
                $supervisor_qury
                $employee_qury
                hr_pay_leave_days.leave_date  between '$from_date' and '$to_date'
                group by hr_pay_leave_applications.id
                order by hr_pay_leave_applications.id ASC";

        $q = $this->db->query($sql);
        //return $q->result_array();
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }

    //MAIN LOOP $data['emp_Data']
    public function get_attendance_details_emps($from_date,$to_date,$emp_id,$supervisor)
    {
        $supervisor_qury = "";
        if($supervisor!=""){
            $supervisor_qury = "hpe.supervisor='$supervisor' AND";
        }
        $employee_qury = "";
        if($emp_id!=""){
            $employee_qury = "hpe.id='$emp_id' AND";
        }

        $sql = "select hpe.id as id,
                       sum(hpad.work_day) as work_days,
                       hpad.date,
                       sum(hpad.late_count) as late_counts,
                       sum(hpad.LA_time) as LA_time,
                       sum(hpad.EL_time) as EL_time,
                       hpe.employee_id as emp_id,
                       hpe.first_name,
                       hpe.last_name,
                       hpe.emp_category as emp_category,
                       hpe.fingerprint_status as fp,
                       hpe.joined_date,
                       hpjt.desc as j_title
                from hr_pay_attendance_data hpad 
                left outer join hr_pay_employees hpe on hpad.employee_id=hpe.employee_id 
                left outer join hr_pay_m_jobtitles hpjt on hpjt.id=hpe.job_title 
                left outer join hr_pay_m_employee_category hpec on hpec.id=hpe.emp_category 
                where 
                $supervisor_qury
                $employee_qury
                hpec.fingerprint_status = 'YES' AND
                hpad.date between '$from_date' and '$to_date'
                group by hpe.id
                order by hpe.id ASC";

        $result = $this->db->query($sql);
        return $result->result_array();
    }

    //Sub loop
    public function get_attendance_details_by_data($from_date,$to_date,$emp_id,$supervisor)
    {

        $supervisor_qury = "";
        if($supervisor!=""){
            $supervisor_qury = "hpe.supervisor='$supervisor' AND";
        }
        $employee_qury = "";
        if($emp_id!=""){
            $employee_qury = "hpe.id='$emp_id' AND";
        }

        $sql = "select hpe.id as id,
                       hpe.first_name as name,
                       hpad.work_day,
                       hpad.in_time,
                       hpad.out_time,
                       hpad.day_cat,
                       hpad.date,
                       hpad.NL,
                       hpad.LA,
                       hpad.EL,
                       hpad.late_count,
                       hpad.LA_time,
                       hpad.EL_time,
                       hpe.employee_id as emp_id,
                       hpe.emp_category as emp_category,
                       hpe.first_name,
                       hpe.last_name,
                       hpjt.desc as j_title
                from hr_pay_attendance_data hpad 
                left outer join hr_pay_employees hpe on hpad.employee_id=hpe.employee_id 
                left outer join hr_pay_m_jobtitles hpjt on hpjt.id=hpe.job_title
                left outer join hr_pay_m_employee_category hpec on hpec.id=hpe.emp_category 
                where 
                $supervisor_qury
                $employee_qury
                hpec.fingerprint_status = 'YES' AND
                hpad.date between '$from_date' and '$to_date'
                order by hpad.date
                ";
        $result = $this->db->query($sql);
        return $result->result_array();
    }

    //Leave Email

    public function get_employee_data_for_email($condition=null)
    {
        $this->db->select('*');
        $this->db->from('hr_pay_employees');
        if($condition !== null)
        {
            $this->db->where($condition);
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        }
    }

    public function get_supervisor_data_y_emp($id)
    {
        $query = $this->db->query("SELECT hr_pay_employees.office_email,hr_pay_employees.id,hr_pay_employees.employee_id,hr_pay_employees.first_name,hr_pay_employees.last_name FROM hr_pay_employees WHERE hr_pay_employees.id='$id'");
        if ($query->num_rows() > 0) {
            return $query->row();
        }
    }


    function get_short_leave($id, $start, $end)
    {
        $q = $this->db->query("SELECT sum(SLM+SLE) as sls FROM hr_pay_attendance_data where ref_id='$id' and (date>='$start' and date<='$end') and work_day!='0.5'");
        if ($q->num_rows() > 0) {
            return $q->row();
        }
    }

    function saveUploadFile($data){

        $this->db->insert('hr_pay_leave_attachment', $data);
        return $this->db->insert_id();
    }

    function get_emp_details($id)
    {
        $q = $this->db->query("SELECT gender,marital_status,emp_status FROM hr_pay_employees where id='$id'");
        if ($q->num_rows() > 0) {
            return $q->row();
        }
    }
    //todo common only
    function get_short_leave_count($emp_id,$start,$end)
    {
        $q = $this->db->query("SELECT SUM(SLE+SLM) short FROM hr_pay_attendance_data where ref_id='$emp_id' and DATE>='$start' and DATE<='$end' and (SLM=1 or SLE=1) ORDER by DATE ASC");
        if ($q->num_rows() > 0) {
            return $q->row();
        }
    }
    //todo common only

    //todo teckpack only

    function get_liu_leave_count($emp_id,$start,$end)
    {
        $q = $this->db->query("SELECT SUM(liu_count) as liu FROM hr_pay_attendance_data where ref_id='$emp_id' and DATE>='$start' and DATE<='$end' and (liu_status=1) ORDER by DATE ASC");
        if ($q->num_rows() > 0) {
            return $q->row();
        }
    }

    function get_liu_leave_count_1($emp_id,$start,$end)
    {
        $q = $this->db->query("SELECT count(liu_count) as liu FROM hr_pay_attendance_data where ref_id='$emp_id' and DATE>='$start' and DATE<='$end' and (liu_status=2) ORDER by DATE ASC");
        if ($q->num_rows() > 0) {
            return $q->row();
        }
    }

    public function get_leave_leave($id)
    {

        $sql = "SELECT * FROM hr_pay_attendance_data WHERE ref_id ='$id' AND liu_status=1 order by date ASC";
        $q= $this->db->query($sql);
        if ($q->num_rows() > 0) {
            return $q->result();
        }
    }

    public function update_leave_leave($leave_id,$type)
    {

        if($type==1){
            $sql = "update hr_pay_attendance_data set liu_count=0,liu_status=2 where id='$leave_id'";
            $this->db->query($sql);
        }elseif($type==2){
            $sql = "update hr_pay_attendance_data set liu_count=0,liu_status=2 where id='$leave_id'";
            $this->db->query($sql);
        }else{
            $sql = "update hr_pay_attendance_data set liu_count=0.5 where id='$leave_id'";
            $this->db->query($sql);
        }

    }

    //todo teckpack only

    public function get_administration_leave($where){

        $this->db->select('setting_value');
        $this->db->from('hr_pay_admin_settings');
        $this->db->where($where);
        $query=$this->db->get();

        return $query->row();
    }


    function get_lates($id, $start, $end)
    {
        $q = $this->db->query("SELECT sum(LA+EL) as late FROM hr_pay_attendance_data where ref_id='$id' and (date>='$start' and date<='$end') and work_day!='0.5'");
        if ($q->num_rows() > 0) {
            return $q->row();
        }
    }

    function get_monthend()
    {
        $q = $this->db->query("SELECT id,max(month) as month FROM hr_pay_payroll_monthend_main where status=0");
        if ($q->num_rows() > 0) {
            return $q->row();
        }
    }
    function get_relate_id($id)
    {
        $old=$this->load->database('second',TRUE);

        $q = $old->query("SELECT * FROM hr_pay_leave_join where id='$id'");
        if ($q->num_rows() > 0) {
            return $q->row();
        }
    }

    public function update_relate_leave_application($where, $data)
    {
        $old=$this->load->database('second',TRUE);

        $old->update('hr_pay_leave_applications',$data,$where);
        return $old->affected_rows();
    }

    public function create_relate_leave_log($data)
    {
        $old=$this->load->database('second',TRUE);
        $old->insert('hr_pay_leave_log', $data);
        return $old->insert_id();
    }


    public function get_hr_pay_leave_days_new($condition=null)
    {
        $this->db->select("hr_pay_leave_days.leave_date, hr_pay_leave_days.leave_day_type");
        $this->db->from('hr_pay_leave_days');
        if($condition !== null)
        {
            $this->db->where($condition);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function get_leave_leave_new($id)
    {

        $sql = "SELECT * FROM hr_pay_attendance_data WHERE ref_id ='$id' AND (liu_status=2 || (liu_status=1 and liu_count=0.5)) order by date ASC";
        $q= $this->db->query($sql);
        if ($q->num_rows() > 0) {
            return $q->result();
        }
    }

    public function update_leave_leave_new($leave_id,$type)
    {

        if($type==1){
            $sql = "update hr_pay_attendance_data set liu_count=1,liu_status=1 where id='$leave_id'";
            $this->db->query($sql);
        }elseif($type==2){
            $sql = "update hr_pay_attendance_data set liu_count=1,liu_status=1 where id='$leave_id'";
            $this->db->query($sql);
        }else{
            $sql = "update hr_pay_attendance_data set liu_count=0.5,liu_status=1 where id='$leave_id'";
            $this->db->query($sql);
        }

    }

    //TODO kreston~~~only~~~~~~~~~~~~~~~~~~~~
    function check_attachment_status($id)
    {
        $q = $this->db->query("SELECT leave_type_name,attach_document FROM hr_pay_leave_types where leave_type_id=$id");
        if ($q->num_rows() > 0) {
            return $q->row();
        }
    }
    //TODO kreston~~~only~~~~~~~~~~~~~~~~~~~~

    function get_employee_info($id)
    {
        $q = $this->db->query("SELECT * FROM hr_pay_employees where id=$id");
        if ($q->num_rows() > 0) {
            return $q->row();
        }
    }
//
    function hr_pay_m_leave_entitlement($emp_category,$leave_type_id)
    {
        $q = $this->db->query("SELECT hr_pay_m_leave_entitlement.from,hr_pay_m_leave_entitlement.to,hr_pay_m_leave_entitlement.num_of_leaves FROM hr_pay_m_leave_entitlement where emp_category=$emp_category AND leave_type_id=$leave_type_id");
        if ($q->num_rows() > 0) {
            return $q->result();
        }
    }
//
//    function hr_pay_m_leave_proportionately($emp_category,$leave_type_id)
//    {
//        $q = $this->db->query("SELECT id,emp_category,description,max_leave,leave_type_id FROM hr_pay_m_leave_proportionately where emp_category=$emp_category AND leave_type_id=$leave_type_id");
//        if ($q->num_rows() > 0) {
//            return $q->row();
//        }
//    }
//
//    function get_monthly_leave($emp_id,$leave_id,$month)
//    {
//        $q = $this->db->query("SELECT COUNT(hr_pay_leave_days.leave_application) AS leave_count FROM hr_pay_leave_days JOIN hr_pay_leave_applications ON hr_pay_leave_applications.id=hr_pay_leave_days.leave_application WHERE hr_pay_leave_applications.employee=$emp_id AND leave_type=$leave_id AND DATE_FORMAT(leave_date,'%Y-%m')='$month'");
//        if ($q->num_rows() > 0) {
//            return $q->row();
//        }
//
//    }

    //TODO kreston~~only~~not~use~for~common~~~~~~~~~~~~~~~~~~~~~~~vkc~de~mel~~~~~~~~~~~~~~

}