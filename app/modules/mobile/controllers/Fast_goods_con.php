<?php
/**
 * Created by PhpStorm.
 * User: kasun.demel
 * Date: 4/27/2021
 * Time: 12:01 PM
 */
class Fast_goods_con extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();
        $this->load->library('ion_auth');
        if(!$this->ion_auth->logged_in()){
            redirect('index.php/auth/login');
        }

        $this->load->library('datatables');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('permissions');
        $this->load->library('system_log');
        $this->load->library('kcrud');
        $this->load->library('kcrudthird');

        date_default_timezone_set("Asia/Colombo");
        $this->currentTime = date('Y-m-d H:i:s');
        $this->currentDate = date('Y-m-d');

    }

    public function index()
    {

        $this->permissions->check_permission('access');

        $title = "Fast Goods - Block";
        $meta["title"] = $title;
        $data["title"] = $title;
        $this->load->helper('url');

        $data['material'] = $this->kcrudthird->getValueAll("tbl_mas_material", "*", null, null, null, null, null);

        $this->load->view('common/header', $meta);
        $this->load->view('fast_goods_index', $data);
        $this->load->view('common/footer');

    }

    public function get_all_fastgoods()
    {
        $this->load->library('datatables');
        $this->datatables->select("
            tbl_fast_goods.material,
            tbl_mas_material.des,
            tbl_mas_material.matgrp,
            tbl_fast_goods.sorg
            ", FALSE);

        $this->datatables->from('tbl_fast_goods');
        $this->datatables->join('tbl_mas_material','tbl_mas_material.material=tbl_fast_goods.material');
        $this->datatables->add_column("Actions",
            "<a class='btn btn-sm btn-default tbl-action' target='_blank' href='javascript:;' title='Remove Blocking'>
                <i class='fa fa-trash'></i> View
            </a>","rep_id");
        echo $this->datatables->generate();
    }

    
}