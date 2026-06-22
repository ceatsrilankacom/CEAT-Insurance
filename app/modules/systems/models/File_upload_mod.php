<?php


class File_upload_mod extends CI_Model
{
    public function saveUploadFile($data)
    {
        $this->db->insert('hr_pay_attendance_upload_files', $data);
    }
    function getAllFiles()
    {
        $q = $this->db->get('hr_pay_attendance_upload_files');
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }

            return $data;
        }
    }

    function getAttAdminSettings()
    {
        $this->db->where('t_id',2);
        $q = $this->db->get('hr_pay_admin_settings');
        return $q->result();
        /*if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }

            return $data;
        }*/
    }

    function saveTempAtt($data)
    {
        if ($this->db->insert('hr_pay_attendance_raw_data', $data)) {
            return true;
        } else {
            return false;
        }
    }
    function saveWorkDays($data)
    {
        if ($this->db->insert('pay_setting', $data)) {
            return true;
        } else {
            return false;
        }
    }

    function check_month($date_working)
    {
        $date = substr($date_working,0,7);
        $SQL = "SELECT * From pay_setting where month like '$date%'";
        $result = $this->db->query($SQL);
        return array_shift($result->result());
    }

    function updateWorkDays($id,$data)
    {
        $this->db->where('id',$id);
        $this->db->update('pay_setting', $data);
    }


    function getAllAtt()
    {
        $q = $this->db->get('hr_pay_attendance_raw_data');
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }

    function getDateTempAtt(){
        $this->db->select('*');
        $this->db->from('hr_pay_attendance_raw_data');
        $q = $this->db->get();
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row->Date;
            }
            return $data;
        }
    }

    function getAttByEpfDate($employee_id,$date){
        $q = $this->db->get_where('hr_pay_attendance_raw_data', array('employee_id' => $employee_id,"Date"=>$date));
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }

            return $data;
        }
    }
    function checkAvailabilityAtt()
    {
        $q = $this->db->get('hr_pay_attendance_raw_data');
        if ($q->num_rows() > 0) {
            return true;
        }else{
            return false;
        }
    }
    function updateAttenTemp($id, $data)
    {
        $this->db->where('id', $id);
        if ($this->db->update('hr_pay_attendance_raw_data', $data)) {
            return true;
        } else {
            return false;
        }
    }
    function saveAttendance($data)
    {
        if ($this->db->insert('pay_attendance', $data)) {
            return true;
        } else {
            return false;
        }
    }
    function deletePostingAttenTemp(){
        $this->db->where('action', 0);
        if($this->db->delete('hr_pay_attendance_raw_data')){
            return true;
        }else{
            return false;
        }
    }
    function updateAttZero(){
        $data=array(
            "action"=>0
        );
        $this->db->update('hr_pay_attendance_raw_data', $data);
    }
    function checkAttUpdate($date){
        $q = $this->db->get_where('pay_attendance', array('Date' => $date));
        if ($q->num_rows() > 0) {
            return true;
        }else{
            return false;
        }
    }
    function checkSameRecord($date,$time,$epf){
        $q = $this->db->get_where('hr_pay_attendance_raw_data', array('Date' => $date,'time' => $time,'employee_id' => $epf));
        if ($q->num_rows() > 0) {
            return true;
        }else{
            return false;
        }
    }
    function checkSameRecordByOnlyDate($date,$epf){
        $q = $this->db->get_where('pay_attendance', array('date' => $date,'employee_id' => $epf));
        if ($q->num_rows() > 0) {
            return true;
        }else{
            return false;
        }
    }
    function updateAppRegister($epf,$date,$data){
        $this->db->where('employee_id', $epf);
        $this->db->where('date', $date);
        if($this->db->update('pay_attendance', $data)){
            return true;
        }else{
            return false;
        }
    }

    function checkInTime($employee_id,$date){
        //$this->db->order_by("date", "asc");
        $q = $this->db->get_where('pay_attendance', array('employee_id' => $employee_id,'date'=>$date));
        if ($q->num_rows() > 0) {
            return $q->row();
        }
    }

    public function getEmpCatDatabyEmp($emp_type)
    {
        $q = $this->db->query("SELECT * FROM hr_pay_m_employee_category WHERE id='$emp_type'");
        if ($q->num_rows() > 0) {
            return $q->row();
        }
    }

    function getAllWorkDays()
    {
        $q = $this->db->get('pay_setting');
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }

    function getAllAtt_work($date_range_start,$date_range_end)
    {

        $to_date = date('Y-m-d');
        $this->db->where('action', 0);
        $this->db->where('Date >=', $date_range_start);
        $this->db->where('Date <=', $date_range_end);
        $this->db->where('Date <', $to_date);
        $this->db->order_by('Date');
        $this->db->order_by('employee_id');
        $this->db->order_by('time');
        $q = $this->db->get('hr_pay_attendance_raw_data');
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }else{
            return false;
        }

    }


    function chec_latest_data($emp_id,$att_date)
    {
        $this->db->where('employee_id', $emp_id);
        $this->db->where('date', $att_date);
        $q = $this->db->get('hr_pay_attendance_data');
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }else{
            return false;
        }
    }

    function check_data($emp_id){
        $this->db->where('employee_id', $emp_id);
        $q = $this->db->get('hr_pay_attendance_data');
        if ($q->num_rows() > 0) {
            return true;
        } else{
            return false;
        }
    }

    function check_end_data($temp_gen_emp,$temp_gen_id,$att_date){
        $this->db->select('out_time');
        $this->db->where(array('employee_id'=>$temp_gen_emp,'id'=>$temp_gen_id,'date'=>$att_date));
        $q = $this->db->get('hr_pay_attendance_data');

        if ($q->num_rows() > 0) {

            foreach (($q->result()) as $row) {
                $data = $row->out_time;
            }
            if($data==null){
                return true;
            }
            else{
                return false;
            }
        }
    }

    function save_hr_pay_attendance_data($data)
    {
        $this->db->insert('hr_pay_attendance_data', $data);
        return $this->db->insert_id();
    }

    function update_hr_pay_attendance_data_new($id,$emp,$data){
        $this->db->where('id', $id);
        $this->db->where('employee_id', $emp);
        $this->db->update('hr_pay_attendance_data', $data);
    }

    function update_hr_pay_attendance_data($temp_gen_emp,$temp_gen_id,$data_gen_up){
        $this->db->where('id', $temp_gen_id);
        $this->db->where('employee_id', $temp_gen_emp);
        $this->db->update('hr_pay_attendance_data', $data_gen_up);
    }

    function getAll_gen_data($emp_id,$date_month){

        $to_date = date('Y-m-d');
        $this->db->where('employee_id', $emp_id);
        $this->db->where('month', $date_month);
        $this->db->where('date <',$to_date);
        $this->db->where('in_time !=','');
        $this->db->order_by('in_time','DESC');
        $this->db->limit('1');
        $q = $this->db->get('hr_pay_attendance_data');
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }


    function getAll_same_data($emp_id,$att_date){
        $this->db->where(array('employee_id'=>$emp_id,'date'=>$att_date,'in_time'=>'','out_time'=>''));
        $q = $this->db->get('hr_pay_attendance_data');
        if ($q->num_rows() > 0) {
            return $q->row();
        }
    }

    function Check_All_same_data($emp_id,$att_date){
        $this->db->where(array('employee_id'=>$emp_id,'date'=>$att_date,'in_time'=>'','out_time'=>''));
        $q = $this->db->get('hr_pay_attendance_data');
        if ($q->num_rows() > 0) {
            return true;
        } else{
            return false;
        }
    }


    function getAll_notempty_in_data($emp_id,$att_date){
        $this->db->where('employee_id', $emp_id);
        $this->db->where('date', $att_date);
        $this->db->where('in_time !=','');
        $q = $this->db->get('hr_pay_attendance_data');
        if ($q->num_rows() > 0) {
            return true;
        } else{
            return false;
        }
    }

    function check_same_data($emp_id,$id,$att_date){
        $this->db->select('out_time');
        $this->db->where(array('employee_id'=> $emp_id,'id'=>$id,'date'=>$att_date));
        $q = $this->db->get('hr_pay_attendance_data');
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data = $row->out_time;
            }
            if($data!=null){
                return true;
            }
            else{
                return false;
            }
        }
    }

    function get_absent_employee($date){
        $sql = "SELECT * FROM hr_pay_employees WHERE hr_pay_employees.status='active' and NOT EXISTS (SELECT * FROM hr_pay_attendance_data WHERE  hr_pay_attendance_data.employee_id = hr_pay_employees.employee_id AND date='$date')";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function update_action($id,$data_action){
        $this->db->where('id',$id);
        $this->db->update('hr_pay_attendance_raw_data',$data_action);
    }

    function select_time_card($o_date,$o_time,$end_date,$epf){
        $this->db->where('Date >', $o_date);
        $this->db->where('time >', $o_time);
        $this->db->where('Date <=', $end_date);
        $this->db->where('employee_id',$epf);
        $this->db->order_by('Date');
        $this->db->order_by('time');
        $q = $this->db->get('hr_pay_attendance_raw_data');
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }else{
            return false;
        }
    }

    function update_temp_generate($epf,$date,$end_date,$data_gen){
        $this->db->where('employee_id',$epf);
        $this->db->where('date >=',$date);
        $this->db->where('date <=',$end_date);
        $this->db->update('hr_pay_attendance_data',$data_gen);
        return true;
    }

    function update_data($epf, $id, $data_gen_up){
        $this->db->where('id', $id);
        $this->db->where('employee_id', $epf);
        $this->db->update('hr_pay_attendance_data', $data_gen_up);
    }

    function getAll_gen_attendance_data($emp_id,$date_month,$date){
        $this->db->where('employee_id', $emp_id);
        $this->db->where('month', $date_month);
        $this->db->where('date', $date);
        $q = $this->db->get('hr_pay_attendance_data');
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }

    function save_temp_generate_data($data)
    {
        $this->db->insert('hr_pay_attendance_data', $data);
        return $this->db->insert_id();
    }

    function update_temp_generate_data($temp_gen_id,$temp_gen_emp,$data_gen_up){
        $this->db->where('id', $temp_gen_id);
        $this->db->where('employee_id', $temp_gen_emp);
        $this->db->update('hr_pay_attendance_data', $data_gen_up);
    }

    function check_employee($emp_id){

        $this->db->select('employee_id');
        $this->db->where(array('employee_id'=> $emp_id,'branch'=>1));
        $q = $this->db->get('hr_pay_employees');
        if ($q->num_rows() > 0) {
            return true;
        } else{
            return false;
        }
    }

    function check_date($date){
        $this->db->select('sp_category');
        $this->db->where(array('date'=> $date));
        $q = $this->db->get('hr_pay_holidays');
        if ($q->num_rows() > 0) {
            return $q->row();
        }
    }

    function get_check_date_holiday($date){
        $this->db->select('sp_category');
        $this->db->where(array('date'=> $date));
        $q = $this->db->get('hr_pay_holidays');
        if ($q->num_rows() > 0) {
            return $q->row();
        }
    }

    function emp_type($id){
        $this->db->where('employee_id',$id);
        $q = $this->db->get('hr_pay_employees');
        if ($q->num_rows() > 0) {
            return array_shift($q->result());
        }
    }

    function update_payment($month){

        $date = date('Y-m-d');

        $sql = "update hr_pay_payroll_pay_lock set status='$date' where pay_type=8 and month='$month'";
        $this->db->query($sql);
    }

    function update_advanced($month){
        $date = date('Y-m-d');
        $sql = "update hr_pay_payroll_pay_lock set status='$date' where pay_type=2 and month='$month'";
        $this->db->query($sql);

    }

    function get_emp_cate_shift_schedule($cate){

        $this->db->select('hr_pay_employee_schedule_assignments.id as id,
        hr_pay_employee_schedule_assignments.s_id,
        hr_pay_employee_schedule_assignments.c_id,
        hr_pay_m_shift_schedules.code,
        hr_pay_m_shift_schedules.schedule_name,
        hr_pay_m_shift_schedules.schedule_work_hours,
        hr_pay_m_shift_schedules.schedule_start_time,
        hr_pay_m_shift_schedules.schedule_end_time,
        hr_pay_m_shift_schedules.halfday_time_mo,
        hr_pay_m_shift_schedules.halfday_time_ev,
        hr_pay_m_shift_schedules.late_time_LA,
        hr_pay_m_shift_schedules.late_time_EL');
        $this->db->from('hr_pay_employee_schedule_assignments');
        $this->db->join('hr_pay_m_shift_schedules', 'hr_pay_m_shift_schedules.id=hr_pay_employee_schedule_assignments.s_id', 'left');
        $this->db->where('hr_pay_employee_schedule_assignments.c_id',$cate);
        $q = $this->db->get();
        if ($q->num_rows() > 0) {
            return $q->row();
        }

    }

    function get_roster_assigned_employees($emp_id){

        $this->db->select('hr_pay_employee_schedule_assignments.id as id,
        hr_pay_employee_schedule_assignments.s_id,
        hr_pay_employee_schedule_assignments.c_id,
        hr_pay_m_shift_schedules.code,
        hr_pay_m_shift_schedules.schedule_name,
        hr_pay_m_shift_schedules.schedule_work_hours,
        hr_pay_m_shift_schedules.schedule_start_time,
        hr_pay_m_shift_schedules.schedule_end_time,
        hr_pay_m_shift_schedules.halfday_time_mo,
        hr_pay_m_shift_schedules.halfday_time_ev,
        hr_pay_m_shift_schedules.late_time_LA,
        hr_pay_m_shift_schedules.late_time_EL');
        $this->db->from('hr_pay_employee_schedule_assignments');
        $this->db->join('hr_pay_m_shift_schedules', 'hr_pay_m_shift_schedules.id=hr_pay_employee_schedule_assignments.s_id', 'left');
        $this->db->where('hr_pay_employee_schedule_assignments.c_id',$emp_id);
        $q = $this->db->get();
        if ($q->num_rows() > 0) {
            return $q->row();
        }

    }

    function search_holiday_1($date)
    {
        $q = $this->db->query("SELECT * FROM hr_pay_holidays where date='$date'");
        if ($q->num_rows() > 0) {
            return $q->row();
        } else {
            return $q->row();
        }
    }

}