<?php

class Asset_management_mod extends CI_Model
{
    public function getAllEmployees()
    {

        $this->db->select('hr_pay_employees.*');
        $this->db->from('hr_pay_employees');

        $this->db->where('hr_pay_employees.status', "Active");
        $this->db->order_by("hr_pay_employees.employee_id", "asc");
        $q = $this->db->get();

        if($q->num_rows() > 0){

            foreach (($q->result()) as $row){
                $data[] = $row;
            }

            return $data;

        }

    }
    public function getAllItemCategories()
    {
        $this->db->select('hr_pay_m_assets_item_categories.*');
        $this->db->from('hr_pay_m_assets_item_categories');
        $q = $this->db->get();
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }

            return $data;
        }
    }

    public function getAllItemBrands()
    {
        $this->db->select('hr_pay_m_assets_item_brands.*');
        $this->db->from('hr_pay_m_assets_item_brands');
        $q = $this->db->get();
        if ($q->num_rows() > 0) {
            foreach (($q->result()) as $row) {
                $data[] = $row;
            }

            return $data;
        }
    }

    public function getItemByCategory($cat_id)
    {

        $this->db->select('hr_pay_m_assets_items.*');
        $this->db->from('hr_pay_m_assets_items');
        $this->db->where(array('hr_pay_m_assets_items.item_category_id'=>$cat_id,'hr_pay_m_assets_items.status'=>1));
        $q = $this->db->get();

        if ($q->num_rows() > 0) {

            return $q->result();
        }

    }

    public function get_item_category_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('hr_pay_m_assets_item_categories');
        $this->db->where('id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        }
    }

    public function get_item_brand_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('hr_pay_m_assets_item_brands');
        $this->db->where('id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        }
    }

    public function edit_get_allocation_data($id)
    {
        $this->db->select('*');
        $this->db->from('hr_pay_employee_asset_allocation');
        $this->db->where('id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        }
    }


public function get_allocation_data($id)
    {
        $query=$this->db->query("SELECT t_asset.id,t_asset.allocation_no,CONCAT(t_category.code,' - ',t_category.name) AS cat_info,CONCAT(t_item.code,' - ',t_item.name) AS item_info,CONCAT(t_brand.code,' - ',t_brand.name) AS brand_info,CONCAT(hr_pay_employees.employee_id,' - ',hr_pay_employees.full_name) AS emp_info,t_item.serial,t_asset.date_issued,t_asset.is_returnable,t_asset.allocation_qty FROM hr_pay_employee_asset_allocation t_asset JOIN hr_pay_m_assets_item_categories t_category ON t_category.id=t_asset.item_category_id JOIN hr_pay_m_assets_items t_item ON t_item.id=t_asset.item_id JOIN hr_pay_m_assets_item_brands t_brand ON t_brand.id=t_item.brand JOIN hr_pay_employees ON hr_pay_employees.id=t_asset.employee_id WHERE t_asset.id='$id'",FALSE);
        if ($query->num_rows() > 0) {
            return $query->row();
        }
    }

    public function get_item_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('hr_pay_m_assets_items');
        $this->db->where('id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        }
    }

    function get_last_allocation_number()
    {
        $this->db->select('id');
        $this->db->from('hr_pay_employee_asset_allocation');
        $query=$this->db->get();

        return $query->result();
    }

    function get_allocation_item($where)
    {
        $this->db->select('id,allocation_qty,item_id');
        $this->db->from('hr_pay_employee_asset_allocation');
        $this->db->where($where);
        $query=$this->db->get();

        return $query->row();
    }

    function get_issued_qty($where)
    {
        $this->db->select('issued,qty');
        $this->db->from('hr_pay_m_assets_items');
        $this->db->where($where);
        $query=$this->db->get();

        return $query->row();
    }

    function get_previous_qty($where)
    {
        $this->db->select('allocation_qty');
        $this->db->from('hr_pay_employee_asset_allocation');
        $this->db->where($where);
        $query=$this->db->get();

        return $query->row();
    }

    function get_administration_info($where){
        $this->db->select('setting_value');
        $this->db->from('hr_pay_admin_settings');
        $this->db->where($where);
        $query=$this->db->get();

        return $query->row();
    }

}