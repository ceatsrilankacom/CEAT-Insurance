<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Search_m extends CI_Model{
    public function __construct(){
        parent::__construct();
    }



public function set($key,$Date1,$Date2){

    $this->db->select('*');
    $this->db->where('tbl_insurance_claims.bill_date>=',$Date1);
    $this->db->where('tbl_insurance_claims.bill_date<=',$Date2);
    $this->db->like('name',$key);

    $this->db->from('tbl_insurance_claims');
    $this->db->group_by('id','desc');

    $query = $this->db->get();
    return $query->result();
}
}