<?php
/**
 * Created by PhpStorm.
 * User: kasun.demel
 * Date: 1/25/2021
 * Time: 10:52 AM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales_itinerary_mod extends CI_Model
{
    function __construct(){
        parent::__construct();
    }

    function fetch_all_event(){
        $this->db->order_by('id');
        return $this->db->get('events');

    }

    function insert_event($data)
    {
        $this->db->insert('events', $data);
    }

    function update_event($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('events', $data);
    }

    function delete_event($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('events');
    }

    function get_dealers($rep_id){

        $db2=$this->load->database("second",true);
        $query=$db2->query("SELECT zsDelCode,zsName,zsAddress1,zsAddress2,zsAddress3 FROM tbldealermaster WHERE zsSRepNo='".$rep_id."'");
        return $query->result();

    }

    function get_checked_dealers($rep_id,$date){

        $this->db->where(array('rep'=>$rep_id,"date"=>$date));
        $q = $this->db->get('tbl_sales_itinerary_history');

        $dts = array();
        if ($q->result()) {
            foreach ($q->result() as $dt) {
                $dts[$dt->dealers] = $dt->dealers;
            }
            return $dts;
        }

    }

    function get_remark_dealers($rep_id,$date){

        $query=$this->db->query("SELECT dealer_name FROM tbl_sales_itinerary_history WHERE rep='".$rep_id."' AND date='".$date."' AND dealers='CLIENT'");
        return $query->row();

    }

    function get_selected_dealers($rep_id){

        $this->db->order_by('id');
        $this->db->where('rep',$rep_id);
        return $this->db->get('tbl_sales_itinerary_history');

    }

}
