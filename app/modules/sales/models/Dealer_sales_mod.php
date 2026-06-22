<?php

class Dealer_sales_mod extends CI_Model{

    function checkSameRecord($dealer_code,$date){

        $q = $this->db->get_where('tbl_dealer_sales_target', array('dealer_code' => $dealer_code,'month' => date("Y-m",strtotime($date))));
        if ($q->num_rows() > 0) {
            return true;
        }else{
            return false;
        }

    }

}
