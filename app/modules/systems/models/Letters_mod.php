<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Letters_mod extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_reminder_dispatch_data()
    {
        $this->db->select('*');
        $q = $this->db->get('reminder_dispatch_data');
        if($q->num_rows() > 0){
            foreach (($q->result())  as $row){
                $data[] = $row;
            }
            return $data;
        }
    }

    public function get_bill_dispatch_data()
    {
        $this->db->select('*');
        $q = $this->db->get('reminder_dispatch_data');
        if($q->num_rows() > 0){
            foreach (($q->result())  as $row){
                $data[] = $row;
            }
            return $data;
        }
    }

    public function get_all_templates()
    {
        $this->db->select('*');
        $q = $this->db->get('hr_pay_letter_templates');
        if($q->num_rows() > 0){
            foreach (($q->result())  as $row){
                $data[] = $row;
            }
            return $data;
        }
    }

    public function get_all_acc_numbers()
    {
        $this->db->select('*');
        $q = $this->db->get('hr_pay_employees');
        if($q->num_rows() > 0){
            foreach (($q->result())  as $row){
                $data[] = $row;
            }
            return $data;
        }
    }


    public function get_employee_details_by_id($id)
    {
        //$this->db->select('*');
        $this->db->where('id',$id);
        $q = $this->db->get('hr_pay_employees');
        if($q->num_rows() > 0){

            return $q->row();

        }
        return FALSE;
    }

    public function get_user_details()
    {
        //Uncomment for chk current login user
        //$this->db->where('user_id',USER_ID);
        $this->db->where('run_status',1);
        $q = $this->db->get('auth_users');
        if($q->num_rows() > 0){
            return 1;
        } else {
            return 0;
        }
    }

    public function get_template_details_by_id($id)
    {
        $q = $this->db->get_where('hr_pay_letter_templates', array('id' => $id));
        if($q->num_rows() > 0){

            return $q->row();

        }
        return FALSE;
    }

    public function get_gen_letter_details_by_id($id)
    {
        $q = $this->db->get_where('hr_pay_letter_gen', array('id' => $id));
        if($q->num_rows() > 0){

            return $q->row();

        }
        return FALSE;
    }
    //TEmplates

    public function lock_run_status_user_details()
    {
        $data =  array(
            'run_status' => 1
        );
        $this->db->where('id',USER_ID);
        $this->db->update('auth_users',$data);
        return true;
    }
    public function unlock_run_status_user_details()
    {
        $data = array(
            'run_status' => 0
        );
        $this->db->where('id',USER_ID);
        $this->db->update('auth_users',$data);
        return true;
    }


    public function get_employee_data_for_email($condition=null)
    {
        $this->db->select('hr_pay_employees.employee_id,
                            hr_pay_employees.first_name as employee_name,
                            auth_users.email as emp_email');
        $this->db->from('hr_pay_letter_gen');
        $this->db->join('hr_pay_employees', 'hr_pay_letter_gen.employee=hr_pay_employees.id', 'left');
        $this->db->join('auth_users', 'auth_users.id=hr_pay_employees.id', 'left');
        if($condition !== null)
        {
            $this->db->where($condition);
        }
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        }
    }



}