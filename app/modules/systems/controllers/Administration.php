<?php
/**
 * Created by PhpStorm.
 * User: kasun.demel
 * Date: 2/16/2021
 * Time: 3:34 PM
 */

class Administration extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();
        $this->load->library('ion_auth');
        if (!$this->ion_auth->logged_in())
        {
            redirect('index.php/auth/login');
        }

        $this->load->library('datatables');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('permissions');
        $this->load->library('system_log');
        $this->load->library('kcrud');

        date_default_timezone_set("Asia/Colombo");
        $this->currentTime = date('Y-m-d H:i:s');
        $this->currentDate = date('Y-m-d');

    }

    public function system_log()
    {
        $this->permissions->check_permission('access');

        $title="Administrator - System Log";
        $meta["title"]=$title;
        $data["title"]=$title;
        $this->load->helper('url');

        $this->load->view('common/header',$meta);
        $this->load->view('administration/index', $data);
        $this->load->view('common/footer');

    }

    public function get_all_logs()
    {

        $this->load->library('datatables');

        $this->datatables->select("
        auth_system_log.id,
        auth_users.first_name,
        auth_system_log.ip_address,
        auth_system_log.date_time,
        auth_system_log.action,
        auth_system_log.status,
        auth_system_log.log_message
            ", FALSE);

        $this->datatables->from('auth_system_log');
        $this->datatables->join('auth_users','auth_users.id=auth_system_log.user_id');
        echo $this->datatables->generate();

    }

}