<?php
/**
 * Created by PhpStorm.
 * User: S.Priyadarshan
 * Date: 01-Jun-16
 * Time: 11:21 AM
 */

class Document_types_mod extends CI_Model
{
    private $document_types_table = 'hr_pay_m_document_types';

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_document_type($condition=null)
    {
        $this->db->select('hr_pay_m_document_types.id as document_type_id,
                                hr_pay_m_document_types.type_name as document_type_name,
                                hr_pay_m_document_types.notify_expiry,
                                hr_pay_m_document_types.notify_before_1_month,
                                hr_pay_m_document_types.notify_before_1_week,
                                hr_pay_m_document_types.notify_before_1_day,
                                hr_pay_m_document_types.details');
        $this->db->from($this->document_types_table);
        if($condition !== null)
        {
            $this->db->where($condition);
        }
        $query = $this->db->get();
        return $query;
    }
    public function insert_document_type($data)
    {
        $this->db->insert($this->document_types_table, $data);
        return $this->db->insert_id();
    }
    public function update_document_type($where, $data)
    {
        $this->db->update($this->document_types_table, $data, $where);
        return $this->db->affected_rows();
    }

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
}