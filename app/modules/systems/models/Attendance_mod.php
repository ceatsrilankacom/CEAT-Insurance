<?php


class Attendance_mod extends CI_Model
{
    function getAllEmployee()
    {

        $this->db->order_by("employee_id", "asc");
        $q = $this->db->get_where('hr_pay_employees', array('status' => 'Active'));
        if($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }

            return $data;
        }

    }

    function getEmployeeById($employee_id){

        $this->db->select('id,emp_category');
        $this->db->from('hr_pay_employees');
        $this->db->where(array('employee_id' => $employee_id,'status' => 'Active'));
        $q = $this->db->get();
        if ($q->num_rows() > 0){
            return $q->row();
        }

    }

    function getEmployeeByMainId($employee_id){

        $q = $this->db->get_where('hr_pay_employees', array('id' => $employee_id,'status' => 'Active'));
        if ($q->num_rows() > 0) {
            return $q->row();
        }
    }

    function getAttendanceByDate($select_date,$dept)
    {
        if($dept=="ALL"){
            $sql = "select hpe.id as empid, hpad.id as id,hpad.LA as LA,hpad.EL as EL,hpad.SLM,hpad.SLE,hpad.NL as NL,hpad.late_count as late_count,hpad.work_day as work_day,hpe.emp_category,hpad.employee_id as employee_id,hpe.first_name as first_name,hpe.last_name as last_name,hpad.day_type as daytype,hpad.date as `date`,hpad.in_time as in_time,hpad.out_time as out_time,hpad.ot_hrs as ot_hrs,hpad.app_ot as app_ot,hpad.LA_time ,hpad.EL_time,hpad.liu_leave as liu_leave from hr_pay_attendance_data hpad left outer join hr_pay_employees hpe on hpad.employee_id=hpe.employee_id where hpad.date = '$select_date'order by hpad.employee_id asc, hpad.date asc ";
        }else {
            $sql = "select hpe.id as empid, hpad.id as id,hpad.LA as LA,hpad.EL as EL,hpad.SLM,hpad.SLE,hpad.NL as NL,hpad.late_count as late_count,hpad.work_day as work_day,hpe.emp_category,hpad.employee_id as employee_id,hpe.first_name as first_name,hpe.last_name as last_name,hpad.day_type as daytype,hpad.date as `date`,hpad.in_time as in_time,hpad.out_time as out_time,hpad.ot_hrs as ot_hrs,hpad.app_ot as app_ot,hpad.LA_time ,hpad.EL_time,hpad.liu_leave as liu_leave from hr_pay_attendance_data hpad left outer join hr_pay_employees hpe on hpad.employee_id=hpe.employee_id where hpad.date = '$select_date' AND hpe.department = '$dept' order by hpad.employee_id  asc, hpad.date asc";
        }

        $res = $this->db->query($sql);
        if ($res->num_rows() > 0) {
            foreach (($res->result()) as $row) {
                $data[] = array(
                    "id" => $row->id,
                    "work_day" => $row->work_day,
                    "employee_id" => $row->employee_id,
                    "empid" => $row->empid,
                    "emp_category" => $row->emp_category,
                    "first_name" => $row->first_name,
                    "last_name" => $row->last_name,
                    "day_type" => $row->daytype,
                    "date" => $row->date,
                    "in_time" => $row->in_time,
                    "out_time" => $row->out_time,
                    "late_count" => $row->late_count,
                    "LA_time" => $row->LA_time,
                    "EL_time" => $row->EL_time,
                    "LA" => $row->LA,
                    "EL" => $row->EL,
                    "NL" => $row->NL,
                    "SLM" => $row->SLM,
                    "SLE" => $row->SLE,
                    "ot_hrs" => $row->ot_hrs,
                    "app_ot" => $row->app_ot,
                    "liu_leave" => $row->liu_leave,
                    "leave_day" => $this->getLeaveDaysforAtt($row->empid, $row->date)->leave_day_type,
                    "leave_id" => $this->getLeaveDaysforAtt($row->empid, $row->date)->app_id,
                    "leave_type" => $this->getLeaveDaysforAtt($row->empid, $row->date)->leave_type_name
                );
            }
            return $data;
        }
    }

    function getEmpAttendanceByDateRange($startDate,$endDate,$employee)
    {

        $sql = "select hpe.id as empid, hpad.id as id,hpad.LA as LA,hpad.EL as EL,hpad.SLM,hpad.SLE,hpad.NL as NL,hpad.late_count as late_count,hpad.work_day as work_day,hpe.emp_category,hpad.employee_id as employee_id,hpe.first_name as first_name,hpe.last_name as last_name,hpad.day_type as daytype,hpad.date as `date`,hpad.in_time as in_time,hpad.out_time as out_time,hpad.ot_hrs as ot_hrs,hpad.app_ot as app_ot,hpad.LA_time ,hpad.EL_time,hpad.liu_leave as liu_leave from hr_pay_attendance_data hpad left outer join hr_pay_employees hpe on hpad.employee_id=hpe.employee_id where hpad.ref_id = '$employee' AND hpad.date between '$startDate' AND '$endDate' order by hpad.employee_id asc, hpad.date asc ";

        $res = $this->db->query($sql);

        if ($res->num_rows() > 0) {
            foreach (($res->result()) as $row) {
                $data[] = array(
                    "id" => $row->id,
                    "work_day" => $row->work_day,
                    "employee_id" => $row->employee_id,
                    "empid" => $row->empid,
                    "emp_category" => $row->emp_category,
                    "first_name" => $row->first_name,
                    "last_name" => $row->last_name,
                    "day_type" => $row->daytype,
                    "date" => $row->date,
                    "in_time" => $row->in_time,
                    "out_time" => $row->out_time,
                    "late_count" => $row->late_count,
                    "LA_time" => $row->LA_time,
                    "EL_time" => $row->EL_time,
                    "LA" => $row->LA,
                    "EL" => $row->EL,
                    "NL" => $row->NL,
                    "SLM" => $row->SLM,
                    "SLE" => $row->SLE,
                    "ot_hrs" => $row->ot_hrs,
                    "app_ot" => $row->app_ot,
                    "liu_leave" => $row->liu_leave,
                    "leave_day" => $this->getLeaveDaysforAtt($row->empid, $row->date)->leave_day_type,
                    "leave_id" => $this->getLeaveDaysforAtt($row->empid, $row->date)->app_id,
                    "leave_type" => $this->getLeaveDaysforAtt($row->empid, $row->date)->leave_type_name
                );
            }
            return $data;
        }
    }

    function getDesignationByCode($code)
    {
        $q = $this->db->get_where('hr_pay_m_jobtitles', array("code" => $code));
        if ($q->num_rows() > 0) {
            return $q->row();
        }
    }

    function getLeaveDaysforAtt($employee_id, $date)
    {
        //        $q = $this->db->get_where('hr_pay_leave_days', array("leave_date" => $date, "employee_id" => $employee_id));
        $q = $this->db->query("SELECT hpld.leave_day_type, hpla.id as app_id, hplt.leave_type_name
                                FROM hr_pay_leave_days hpld 
                                left outer join hr_pay_leave_applications hpla on hpld.leave_application=hpla.id  
                                left outer join hr_pay_leave_types hplt on hplt.leave_type_id = hpla.leave_type
                                WHERE hpld.leave_date ='$date' AND hpla.employee='$employee_id' AND hpla.`status`='Approved' ");
        if ($q->num_rows() > 0) {
            return $q->row();
        }
    }

    function getLeaveDays($employee_id, $date)
    {
//        $q = $this->db->get_where('hr_pay_leave_days', array("leave_date" => $date, "employee_id" => $employee_id));
        $q = $this->db->query("SELECT * FROM hr_pay_leave_days hpld left outer join hr_pay_leave_applications hpla on hpld.leave_application=hpla.id  WHERE hpld.leave_date ='$date' AND hpla.status = 'Approved' AND hpla.employee='$employee_id' ");
        if ($q->num_rows() > 0) {
            return $q->row();
        }
    }

    function getAttendance()
    {
        $q = $this->db->get('hr_pay_attendance_data');
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }

    function updateAppRegister($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('hr_pay_attendance_data', $data);
    }

    function checkInTime($epf, $date)
    {
        $q = $this->db->get_where('hr_pay_attendance_data', array('employee_id' => $epf, 'date' => $date, 'in_time' => NULL));
        if ($q->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function getAttendanceTempByDate($date, $employee_id)
    {
        $q = $this->db->get_where('hr_pay_attendance_raw_data', array("date" => $date, "employee_id" => $employee_id));
        if ($q->num_rows() > 0) {
            return $q->row();
        }
    }

    function saveAttendance($data)
    {
        $this->db->insert('hr_pay_attendance_data', $data);
    }


    function getDepartment_id($code)
    {
        $q = $this->db->get_where('hr_pay_m_departments',array('code'=>$code));
        if ($q->num_rows() > 0) {
            return $q->row();
        }
    }

    function getDepartment_code($id)
    {
        $q = $this->db->get_where('hr_pay_m_departments',array('id'=>$id));
        if ($q->num_rows() > 0) {
            return $q->row();
        }
    }

    function getDepartment()
    {
        $q = $this->db->get('hr_pay_m_departments');
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }


    function getEmpcategories()
    {
        $q = $this->db->get('hr_pay_m_employee_category');
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }

    function getDailyPresentAttReportPrint($date, $id)
    {
        $this->db->order_by("id", "asc");
        $dep = $this->getDepartment_code($id)->code;
        $q = $this->db->query("SELECT * FROM `hr_pay_attendance_data` WHERE date ='$date' AND in_time!='' AND department='$dep'");
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = array(
                    "id" => $row->id,
                    "employee_id" => $row->employee_id,
                    "name" => $row->name,
                    "day_type" => $row->day_type,
                    "date" => $row->date,
                    "in_time" => $row->in_time,
                    "out_time" => $row->out_time,
                    "ot_hrs" => $row->ot_hrs,
                    "app_ot" => $row->app_ot,
                    "department" => $row->department,
                    "job_title" => $this->getDesignationByCode($row->code)->desc,
                    "leave_day" => $this->getLeaveDays($row->employee_id, $row->date)->day,
                    "leave_id" => $this->getLeaveDays($row->employee_id, $row->date)->app_id,
                    "leave_type" => $this->getLeaveDays($row->employee_id, $row->date)->leave_type,
                );
            }
            return $data;
        }
    }

    function getDailyAbsenceAttReportPrint($date, $id)
    {
        $this->db->order_by("id", "asc");
        $dep = $this->getDepartment_code($id)->code;
        $q = $this->db->query("SELECT * FROM `hr_pay_attendance_data` WHERE date ='$date' AND name!='' AND in_time='' AND out_time='' AND department='$dep' ");
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = array(
                    "id" => $row->id,
                    "employee_id" => $row->employee_id,
                    "name" => $row->name,
                    "day_type" => $row->day_type,
                    "date" => $row->date,
                    "in_time" => $row->in_time,
                    "out_time" => $row->out_time,
                    "ot_hrs" => $row->ot_hrs,
                    "app_ot" => $row->app_ot,
                    "department" => $row->department,
                    "job_title" => $this->getDesignationByCode($row->code)->desc,
                    "leave_day" => $this->getLeaveDays($row->employee_id, $row->date)->day,
                    "leave_id" => $this->getLeaveDays($row->employee_id, $row->date)->app_id,
                    "leave_type" => $this->getLeaveDays($row->employee_id, $row->date)->leave_type,
                );
            }
            return $data;
        }
    }

    public function get_ot_details($fromdate,$todate){
        $q = $this->db->query("SELECT employee_id,name,SUM(app_ot) AS ot_count FROM `hr_pay_attendance_data` WHERE date BETWEEN '$fromdate' AND '$todate' GROUP BY employee_id");
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = array(
                    "employee_id" => $row->employee_id,
                    "name" => $row->name,
                    "ot_count" => $row->ot_count
                    );
            }
            return $data;
        }
    }


     public function emp_cat(){
        $this->db->select('*');
        $sql = $this->db->get('hr_pay_m_employee_category');
        if($sql->num_rows()>0){
            foreach ($sql->result() as $row){
                $data []=$row;
            }
            return $data;
        }
    }

    public function getEmpCatDatabyEmp($emp_type)
    {
        $sql = $this->db->query("SELECT * FROM hr_pay_m_employee_category WHERE id='$emp_type'");
        /*return array_shift($sql->result());*/
        if ($sql->num_rows() > 0) {
            return $sql->row();
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

    function search_holiday($date)
    {
        $q = $this->db->query("SELECT * FROM hr_pay_holidays where date='$date'");
        if ($q->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
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

    public function getDeptDatabyID($dept)
    {
        $sql = $this->db->query("SELECT * FROM hr_pay_m_departments WHERE id='$dept'");
        if ($sql->num_rows() > 0) {
            return $sql->row();
        }
    }

    function getTotoalEmps($dept)
    {
        if($dept=="ALL") {
            $q = $this->db->query("SELECT count(*) as tot FROM hr_pay_employees hpe left outer join hr_pay_m_employee_category ec on ec.id=hpe.emp_category WHERE hpe.status = 'Active' AND (ec.fingerprint_status = 'YES' ||  ec.show_att = 'YES')");
        }else {
            $q = $this->db->query("SELECT count(*) as tot FROM hr_pay_employees hpe left outer join hr_pay_m_employee_category ec on ec.id=hpe.emp_category WHERE hpe.status = 'Active' AND hpe.department = '$dept' AND (ec.fingerprint_status = 'YES' ||  ec.show_att = 'YES') ");
        }

        return $q->row();
    }

    function getDailyPresentAttReport($select_date,$dept)
    {
        if($dept=="ALL") {
            $q = $this->db->query("SELECT count(*) as pr FROM hr_pay_attendance_data hpad left outer join hr_pay_employees hpe on hpad.employee_id=hpe.employee_id left outer join hr_pay_m_employee_category ec on ec.id=hpe.emp_category WHERE hpad.date = '$select_date' AND hpad.work_day!=0 AND hpad.day_cat = 'WD' AND (ec.fingerprint_status = 'YES' ||  ec.show_att = 'YES') ");
        } else {
            $q = $this->db->query("SELECT count(*) as pr FROM hr_pay_attendance_data hpad left outer join hr_pay_employees hpe on hpad.employee_id=hpe.employee_id left outer join hr_pay_m_employee_category ec on ec.id=hpe.emp_category WHERE hpad.date = '$select_date' AND hpad.work_day!=0 AND hpad.day_cat = 'WD'  AND hpe.department = '$dept' AND (ec.fingerprint_status = 'YES' || ec.show_att = 'YES')");
        }
        return $q->row();
    }

    function getDailyAbsentAttReport($select_date,$dept)
    {
        if($dept=="ALL") {
            $q = $this->db->query("SELECT count(*) as ab FROM hr_pay_attendance_data hpad left outer join hr_pay_employees hpe on hpad.employee_id=hpe.employee_id left outer join hr_pay_m_employee_category ec on ec.id=hpe.emp_category WHERE hpad.date = '$select_date' and hpad.work_day=0  AND hpad.day_cat = 'WD' AND (ec.fingerprint_status = 'YES' ||  ec.show_att = 'YES') ");
        } else {
            $q = $this->db->query("SELECT count(*) as ab FROM hr_pay_attendance_data hpad left outer join hr_pay_employees hpe on hpad.employee_id=hpe.employee_id left outer join hr_pay_m_employee_category ec on ec.id=hpe.emp_category WHERE hpad.date = '$select_date' AND hpad.work_day=0 AND hpad.day_cat = 'WD'  AND hpe.department = '$dept' AND (ec.fingerprint_status = 'YES' ||  ec.show_att = 'YES') ");
        }
        return $q->row();
    }

    function check_for_leave_application($emp,$date)
    {

        $q = $this->db->query("SELECT * FROM hr_pay_leave_days hpld inner join hr_pay_leave_applications hpla on hpld.leave_application=hpla.id where hpla.employee='$emp' and hpld.leave_date = '$date' AND status='Approved'");
        if ($q->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }

    }


    function check_leave_data($emp,$date)
    {
        $q = $this->db->query("SELECT * FROM hr_pay_leave_days hpld inner join hr_pay_leave_applications hpla on hpld.leave_application=hpla.id where hpla.employee='$emp' and hpld.leave_date = '$date' AND status='Approved'");
        if ($q->num_rows() > 0) {
            return $q->row();
        }
    }


//    function check_resign($id,$date)
//    {
//        $q = $this->db->query("SELECT * FROM hr_pay_employees where (termination_date>='$date' || termination_date='') and id='$id'");
//        if ($q->num_rows() > 0) {
//            return TRUE;
//        } else {
//            return FALSE;
//        }
//    }

}