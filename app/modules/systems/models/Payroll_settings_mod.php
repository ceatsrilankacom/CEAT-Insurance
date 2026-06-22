<?php

class payroll_settings_mod extends CI_Model
{
    public function get_groups()
    {
        $this->db->order_by('order', 'asc');
        $sql = $this->db->get('hr_pay_formula_settings_groups');
        if ($sql->num_rows() > 0) {
            return $sql->result();
        }
    }

    function get_working_days($new_month, $employee)
    {
        $sql = "SELECT COUNT(date) as count,DATE_FORMAT(date,'%Y-%M') as date FROM pay_attendance WHERE emp_id = '" . $employee . "' AND DATE_FORMAT(date,'%Y-%m') = '" . $new_month . "'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function get_all_pay_data()
    {
        $q = $this->db->get('hr_pay_formula_settings');
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }

    public function get_pay_details_by_id($id = null)
    {
        $this->db->select('*');
        $this->db->from('hr_pay_formula_settings');
        $this->db->where('id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        }
    }

    public function get_pay_cat_details_by_id($id = null)
    {
        $this->db->select('*');
        $this->db->from('hr_pay_formula_emp_cate');
        $this->db->where('f_id', $id);
        $query = $this->db->get();
        $data=array();
        foreach($query->result() as $row){
            $data[] = $row->c_id;
        }
        return ($data);
    }

    function get_employees()
    {
        if ($this->session->userdata('BRANCH2_ID')) {
            $br = $this->session->userdata('BRANCH2_ID');
        } else {
            $br = BRANCH1_ID;
        }
        $sql = "SELECT id,employee_id,name  from hr_pay_employees where emp_category='2' and branch='$br'";
        $result = $this->db->query($sql);
        return $result->result();
    }

    function exist_data($month)
    {
        if ($this->session->userdata('BRANCH2_ID')) {
            $br = $this->session->userdata('BRANCH2_ID');
        } else {
            $br = BRANCH1_ID;
        }
        $sql = "SELECT hpe.id as t_id,hpe.employee_id as epid,hpep.name as epname,hpe.nc as nc, hpe.osp as osp,
hpep.employee_id as employee_id,hpe.`status` as 'status' FROM hr_pay_employees hpep left outer join hr_pay_employee_points hpe on hpep.id=hpe.employee_id where hpe.month='$month' and hpe.branch='$br' union select '' as t_id, hpep.id as epid,hpep.name as epname,
'' as nc,'' as osp,hpep.employee_id as employee_id,'' as 'status' from hr_pay_employees hpep left outer join hr_pay_employee_points hpe on hpep.id=hpe.employee_id where hpep.employee_type='2' and hpep.branch='$br'
and NOT EXISTS (SELECT * from hr_pay_employee_points hp where month='$month' and branch='$br' and hpep.id=hp.employee_id)";
        $result = $this->db->query($sql);
        return $result->result();
    }

    public function delete_f_categories($where)
    {
        $this->db->where('f_id', $where);
        $this->db->delete('hr_pay_formula_emp_cate');
        return true;
    }

    public function update_emp_cat_allow($emp_cat_id,$allow_id,$update_allowance_data)
    {
        $this->db->where('c_id', $emp_cat_id);
        $this->db->where('a_id', $allow_id);
        $this->db->update('hr_pay_m_employee_allow_assigned_cate',$update_allowance_data);
        return true;
    }

    //HR PAY SETTINGS FOR CATEGORIES
    function get_emp_cat_data($id)
    {
        $this->db->select('*');
        $this->db->from('hr_pay_m_employee_category');
        $this->db->where('hr_pay_m_employee_category.id',$id);
        $query = $this->db->get();

        if($query->num_rows() > 0 ){
            return $query->result_array();
        }
        else{
            return "";
        }
    }

    function update_emp_cat($data,$id)
    {
        $this->db->where('hr_pay_m_employee_category.id',$id);
        $this->db->update('hr_pay_m_employee_category', $data);
        return true;
    }

    function get_allowance_data($id)
    {
        $this->db->select('*');
        $this->db->from('hr_pay_m_employee_allowance_types');
        $this->db->where('hr_pay_m_employee_allowance_types.id',$id);
        $query = $this->db->get();

        if($query->num_rows() > 0 ){
            return $query->result_array();
        }
        else{
            return "";
        }
    }

    function update_allowance($data,$id)
    {
        $this->db->where('hr_pay_m_employee_allowance_types.id',$id);
        $this->db->update('hr_pay_m_employee_allowance_types', $data);
        return true;
    }

    function get_allowances_list()
    {
        $this->db->where('type',"Category");
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

    function getallAllowances()
    {
        $this->db->where('type',"Category");
        $q = $this->db->get('hr_pay_m_employee_allowance_types');
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }

    function get_allowance_emp_cat_data($id)
    {
        $this->db->select('hr_pay_m_employee_allow_assigned_cate.id as id,hr_pay_m_employee_allow_assigned_cate.c_id,hr_pay_m_employee_allow_assigned_cate.a_id,hr_pay_m_employee_allowance_types.allowance,hr_pay_m_employee_allow_assigned_cate.rate,hr_pay_m_employee_allow_assigned_cate.a_status');
        $this->db->from('hr_pay_m_employee_allow_assigned_cate');
        $this->db->join('hr_pay_m_employee_allowance_types', 'hr_pay_m_employee_allowance_types.id=hr_pay_m_employee_allow_assigned_cate.a_id', 'left');
        $this->db->where('hr_pay_m_employee_allow_assigned_cate.c_id',$id);
        $this->db->where('type',"Category");
        $q = $this->db->get();
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }

    public function delete_allowance_emp_cat($where)
    {
        $this->db->where('c_id', $where);
        $this->db->delete('hr_pay_m_employee_allow_assigned_cate');
        return true;
    }

    public function getEmpCategories()
    {
        $this->db->from('hr_pay_m_employee_category');
        $query = $this->db->get();
        return $query->result();
    }

    //PAYE data
    //HR PAY SETTINGS FOR CATEGORIES
    function get_paye_data_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('hr_pay_m_employee_paye_types');
        $this->db->where('hr_pay_m_employee_paye_types.id',$id);
        $query = $this->db->get();

        if($query->num_rows() > 0 ){
            return $query->result_array();
        }
        else{
            return "";
        }
    }



    public function update_paye($data,$id)
    {
        $this->db->where('id', $id);
        $this->db->update('hr_pay_m_employee_paye_types',$data);
        return true;
    }


    public function delete_paye($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('hr_pay_m_employee_paye_types');
        return true;
    }

    //STAMP data
    //HR STAMP SETTINGS FOR CATEGORIES
    function get_stamp_data_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('hr_pay_m_employee_stamp_types');
        $this->db->where('hr_pay_m_employee_stamp_types.id',$id);
        $query = $this->db->get();

        if($query->num_rows() > 0 ){
            return $query->result_array();
        }
        else{
            return "";
        }
    }

    public function update_stamp($data,$id)
    {
        $this->db->where('id', $id);
        $this->db->update('hr_pay_m_employee_stamp_types',$data);
        return true;
    }

    public function delete_stamp($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('hr_pay_m_employee_stamp_types');
        return true;
    }


    function get_cat_employees($id)
    {
        $this->db->select('*');
        $this->db->from('hr_pay_employees');
        $this->db->where('emp_category',$id);
        $query = $this->db->get();

        if($query->num_rows() > 0 ){
            return $query->result();
        }

    }

    function delete_cat_employees_adata($a_id,$cat_id)
    {
        $this->db->select('*');
        $this->db->from('hr_pay_m_employee_allow_assigned_cate');
        $this->db->where(array('a_id'=>$a_id,'c_id'=>$cat_id));
        $query = $this->db->get();

        if($query->num_rows() > 0 ){
            foreach ($query->result() as $row){
                $this->db->where('cat_allow_id', $row->id);
                $this->db->delete('hr_pay_m_employee_allow_assigned_cate_emp_details');
                return $row->id;
            }
        }
    }

    public function get_allowance_list_view($condition=null)
    {
        $this->db->select('hr_pay_m_employee_allow_assigned_cate_emp_details.id as id,hr_pay_employees.employee_id as emp_id,hr_pay_employees.first_name,hr_pay_employees.last_name,hr_pay_m_employee_allow_assigned_cate_emp_details.status as emp_state,hr_pay_m_employee_allow_assigned_cate_emp_details.amount');
        $this->db->from('hr_pay_m_employee_allow_assigned_cate_emp_details');
        $this->db->join('hr_pay_employees','hr_pay_employees.id=hr_pay_m_employee_allow_assigned_cate_emp_details.employee_id');
        if($condition !== null)
        {
            $this->db->where($condition);
        }
        $query = $this->db->get();
        return $query->result();
    }

}