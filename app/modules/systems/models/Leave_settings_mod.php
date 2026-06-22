<?php
/**
 * Created by PhpStorm.
 * User: S.Priyadarshan
 * Date: 01-Jun-16
 * Time: 11:21 AM
 */

class leave_settings_mod extends CI_Model
{
    private $leave_types_table = 'hr_pay_leave_types';
    private $leave_periods_table = 'hr_pay_leave_periods';
    private $work_week_table = 'hr_pay_m_work_week';
    private $holidays_table = 'hr_pay_holidays';
    private $leave_rules_table = 'hr_pay_leave_rules';
    private $paid_time_off_table = 'hr_pay_leave_paid_time_off';
    //private $leave_groups_table = 'hr_pay_leave_groups';
    //private $employee_leave_groups_table = 'hr_pay_employee_leave_groups';

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_leave_type($condition=null)
    {
        //TODO ~~~~~Techpack~~only
        $this->db->select('hr_pay_leave_types.leave_type_name as leave_type_name,
                            hr_pay_leave_types.leave_type_id as leave_type_id,
                            hr_pay_leave_types.leaves_per_period,
                            hr_pay_leave_types.employee_can_apply');
        //TODO ~~~~~Techpack~~only
        $this->db->from($this->leave_types_table);
        if($condition !== null)
        {
            $this->db->where($condition);
        }
        $query = $this->db->get();
        return $query;

    }
    public function insert_leave_type($data)
    {
        $this->db->insert($this->leave_types_table, $data);
        return $this->db->insert_id();
    }
    public function update_leave_type($where, $data)
    {
        $this->db->update($this->leave_types_table, $data, $where);
        return $this->db->affected_rows();
    }

    public function get_leave_period($condition=null, $unit_count=null)
    {
        $select = 'hr_pay_leave_periods.period_id,
                            hr_pay_leave_periods.period_name,
                            hr_pay_leave_periods.period_start,
                            hr_pay_leave_periods.period_end';
        $select = !empty($unit_count) ? $select . ",TIMESTAMPDIFF($unit_count, period_start, DATE_ADD(period_end, INTERVAL 1 $unit_count)) AS no_of_" . $unit_count ."s" : $select;
        $this->db->select($select, false);
        $this->db->from($this->leave_periods_table);
        if($condition !== null)
        {
            $this->db->where($condition);
        }
        $query = $this->db->get();
        return $query;
    }

    public function check_leave_period($leave_start_date,$leave_end_date)
    {
        $sql = "SELECT * FROM hr_pay_leave_periods WHERE ('$leave_start_date' between period_start and period_end) or  ('$leave_end_date' between period_start and period_end)";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return true;
        } else{
            return false;
        }
    }

    public function get_leave_period_data($date)
    {
        $curr_year = date('Y', strtotime($date));
        //$curr_year = date('Y');
        $sql = "SELECT * FROM hr_pay_leave_periods WHERE period_start LIKE '$curr_year%'";
        $query = $this->db->query($sql);
        if($query->num_rows() > 0 ){
            return $query->row();
        }
    }
    public function insert_leave_period($data)
    {
        $this->db->insert($this->leave_periods_table, $data);
        return $this->db->insert_id();
    }
    public function update_leave_period($where, $data)
    {
        $this->db->update($this->leave_periods_table, $data, $where);
        return $this->db->affected_rows();
    }

    public function get_work_week($condition=null)
    {
        $this->db->select('hr_pay_m_work_week.work_week_id,
                            hr_pay_m_work_week.day,
                            hr_pay_m_work_week.status,
                            hr_pay_m_country.id as country');
        $this->db->from($this->work_week_table);
        $this->db->join('hr_pay_m_country', 'hr_pay_m_work_week.country=hr_pay_m_country.id', 'left');
        if($condition !== null)
        {
            $this->db->where($condition);
        }
        $query = $this->db->get();
        return $query;
    }
    public function insert_work_week($data)
    {
        $this->db->insert($this->work_week_table, $data);
        return $this->db->insert_id();
    }
    public function update_work_week($where, $data)
    {
        $this->db->update($this->work_week_table, $data, $where);
        return $this->db->affected_rows();
    }

    public function get_holiday($condition=null)
    {
        $this->db->select('hr_pay_holidays.holiday_id,
                            hr_pay_holidays.holiday_name,
                            hr_pay_holidays.date,
                            hr_pay_holidays.status,
                            hr_pay_m_country.id as country');
        $this->db->from($this->holidays_table);
        $this->db->join('hr_pay_m_country', 'hr_pay_holidays.country=hr_pay_m_country.id', 'left');
        if($condition !== null)
        {
            $this->db->where($condition);
        }
        $query = $this->db->get();
        return $query;
    }
    public function insert_holiday($data)
    {
        $this->db->insert($this->holidays_table, $data);
        return $this->db->insert_id();
    }
    public function update_holiday($where, $data)
    {
        $this->db->update($this->holidays_table, $data, $where);
        return $this->db->affected_rows();
    }

    public function get_leave_rule($condition=null)
    {
        $this->db->select('hr_pay_leave_types.leave_type_id as leave_type,
                            hr_pay_leave_rules.leave_rule_id as leave_rule_id,
                            hr_pay_leave_rules.leaves_per_period,
                            hr_pay_leave_rules.leave_accrue,
                            hr_pay_leave_rules.propotionate_on_joined_date,
                            hr_pay_leave_rules.leave_act,
                            hr_pay_m_employee_category.id as employee_category,
                            hr_pay_m_employmentstatus.id as employment_status');
        $this->db->from($this->leave_rules_table);
        $this->db->join('hr_pay_leave_types', 'hr_pay_leave_rules.leave_type=hr_pay_leave_types.leave_type_id', 'left');
        $this->db->join('hr_pay_m_employee_category', 'hr_pay_leave_rules.employee_category=hr_pay_m_employee_category.id', 'left');
        $this->db->join('hr_pay_m_employmentstatus', 'hr_pay_leave_rules.employment_status=hr_pay_m_employmentstatus.id', 'left');
        if($condition !== null)
        {
            $this->db->where($condition);
        }
        $query = $this->db->get();
        return $query;
    }
    public function insert_leave_rule($data)
    {
        $this->db->insert($this->leave_rules_table, $data);
        return $this->db->insert_id();
    }
    public function update_leave_rule($where, $data)
    {
        $this->db->update($this->leave_rules_table, $data, $where);
        return $this->db->affected_rows();
    }

    public function get_paid_time_off($condition=null)
    {
        $this->db->select('hr_pay_leave_paid_time_off.paid_time_off_id,
                            hr_pay_leave_types.leave_type_id as leave_type,
                            hr_pay_employees.id as employee,
                            hr_pay_leave_periods.period_id as leave_period,
                            hr_pay_leave_paid_time_off.leave_amount,
                            hr_pay_leave_paid_time_off.note');
        $this->db->from($this->paid_time_off_table);
        $this->db->join('hr_pay_leave_types', 'hr_pay_leave_paid_time_off.leave_type=hr_pay_leave_types.leave_type_id', 'left');
        $this->db->join('hr_pay_employees', 'hr_pay_leave_paid_time_off.employee=hr_pay_employees.id', 'left');
        $this->db->join('hr_pay_leave_periods', 'hr_pay_leave_paid_time_off.leave_period=hr_pay_leave_periods.period_id', 'left');
        if($condition !== null)
        {
            $this->db->where($condition);
        }
        $query = $this->db->get();
        return $query;
    }
    public function insert_paid_time_off($data)
    {
        $this->db->insert($this->paid_time_off_table, $data);
        return $this->db->insert_id();
    }
    public function update_paid_time_off($where, $data)
    {
        $this->db->update($this->paid_time_off_table, $data, $where);
        return $this->db->affected_rows();
    }
    //L Group
    /*public function get_leave_group($condition=null)
    {
        $this->db->select('hr_pay_leave_groups.group_name,
                                hr_pay_leave_groups.group_id,
                                hr_pay_leave_groups.details');
        $this->db->from($this->leave_groups_table);
        if($condition !== null)
        {
            $this->db->where($condition);
        }
        $query = $this->db->get();
        return $query;
    }
    public function insert_leave_group($data)
    {
        $this->db->insert($this->leave_groups_table, $data);
        return $this->db->insert_id();
    }
    public function update_leave_group($where, $data)
    {
        $this->db->update($this->leave_groups_table, $data, $where);
        return $this->db->affected_rows();
    }

    public function get_employee_leave_group($condition=null)
    {
        $this->db->select('hr_pay_employees.id as employee,
                                hr_pay_employees.name as employee_name,
                                hr_pay_leave_groups.group_id as leave_group,
                                hr_pay_leave_groups.group_name as leave_group_name,
                                hr_pay_employee_leave_groups.employee_leave_group_id as employee_leave_group_id');
        $this->db->from('hr_pay_employee_leave_groups');
        $this->db->join('hr_pay_employees', 'hr_pay_employee_leave_groups.employee=hr_pay_employees.id', 'left');
        $this->db->join('hr_pay_leave_groups', 'hr_pay_employee_leave_groups.leave_group=hr_pay_leave_groups.group_id', 'left');
        if($condition !== null)
        {
            $this->db->where($condition);
        }
        $query = $this->db->get();
        return $query;
    }
    public function insert_employee_leave_group($data)
    {
        $this->db->insert($this->employee_leave_groups_table, $data);
        return $this->db->insert_id();
    }
    public function update_employee_leave_group($where, $data)
    {
        $this->db->update($this->employee_leave_groups_table, $data, $where);
        return $this->db->affected_rows();
    }*/

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
        //$this->db->join('login_users', 'login_users.id = employees.id');
        ///if($if_active_only) $this->db->where('login_users.active', 1);
        $this->db->where('status', 'Active');
        if($condition != null) $this->db->where($condition);
        $this->db->order_by("employee_id", "asc");
        $query = $this->db->get();
        return $query;
    }

    public function getSingleEmployeeData($id)
    {
        $this->db->select('*');
        $this->db->from('hr_pay_employees');
        $this->db->where('id',$id);
        $query = $this->db->get();
        return $query->row();
    }
}