<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class dash_mod extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function getApprovedExpenseData($month){

        $sql = "SELECT COUNT(*) AS approved FROM tbl_expenses_list WHERE MONTH='$month' AND (sales_staff='Approved' AND sales_manager='Approved' AND accountant='Approved')";
        $result = $this->db->query($sql);
        return $result->row();

    }

    function getRejectedExpenseData($month){

        $sql = "SELECT COUNT(*) AS rejected FROM tbl_expenses_list WHERE MONTH='$month' AND (sales_staff='Rejected' OR sales_manager='Rejected' OR accountant='Rejected')";
        $result = $this->db->query($sql);
        return $result->row();

    }

    function getTotalExpenseData($month){

        $sql = "SELECT COUNT(*) AS total FROM tbl_expenses_list WHERE MONTH='$month'";
        $result = $this->db->query($sql);
        return $result->row();
    }

    function get_pending_sales_expenses($month){

        $sql="SELECT user,SUM(FE) AS total_amount FROM tbl_expenses_list WHERE MONTH='$month' AND accountant='Approved' GROUP BY USER";
        $result=$this->db->query($sql);
        return $result->result();
    }

}