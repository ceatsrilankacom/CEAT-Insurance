<?php
/**
 * Created by PhpStorm.
 * User: kasun.demel
 * Date: 2/16/2021
 * Time: 9:52 AM
 */

class Sales_itinerary_sales_staff extends CI_Controller
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

    public function index()
    {
        $this->permissions->check_permission('access');

        $title="Sales Itinerary - Sales Staff";
        $meta["title"]=$title;
        $data["title"]=$title;
        $this->load->helper('url');

        $data['sales_rep']=$this->kcrud->getValueAll("tbl_mas_rep","name,rep",null,null,null,null,null);

        $this->load->view('common/header',$meta);
        $this->load->view('sales_itinerary_sales_staff', $data);
        $this->load->view('common/footer');

    }

    public function get_all_itinerary()
    {
        $this->load->library('datatables');

        $this->datatables->select("
            tbl_sales_itinerary.id,
            tbl_sales_itinerary.month,
            CONCAT(tbl_users.epf_no,'-',tbl_users.name) AS employee_name,
            tbl_sales_itinerary.night_outs,
            tbl_sales_itinerary.note,
            tbl_sales_itinerary.area_manager,
            tbl_sales_itinerary.sales_staff,
            tbl_sales_itinerary.sales_manager,
            tbl_sales_itinerary.month AS ref_month,
            tbl_users.epf_no AS user_id
            ", FALSE);

        $this->datatables->from('tbl_sales_itinerary');
        $this->datatables->join('tbl_users','tbl_users.epf_no=tbl_sales_itinerary.rep','LEFT');
        $this->datatables->where(array('tbl_sales_itinerary.area_manager'=>'Approved'));
        $this->datatables->group_by('month');
        $this->datatables->group_by('rep');

        if(USER_ID != 1){
            $this->datatables->join('auth_view_users','auth_view_users.down_users=tbl_sales_itinerary.rep','INNER');
            $this->datatables->where('auth_view_users.user',EPF_NO);
        }

        $this->datatables->add_column("Actions",
            "<a class='btn btn-sm btn-default tbl-action' target='_blank' href='".base_url('index.php/insurance/sales_itinerary/sales_itinerary_redirect/$1/$2/SS')."' title='Edit Sales Itinerary'>
                <i class='fa fa-calendar'></i> View
            </a>
            <a class='btn btn-sm btn-default tbl-action' target='_blank' href='".base_url('index.php/insurance/sales_itinerary/print_itinerary_redirect/$1/$2')."' title='Print Sales Itinerary'>
                <i class='fa fa-print'></i> Print
            </a>","user_id,ref_month");
        $this->datatables->unset_column('ref_month');
        $this->datatables->unset_column('user_id');
        echo $this->datatables->generate();

    }

}