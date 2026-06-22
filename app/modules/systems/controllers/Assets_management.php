<?php

class Assets_management extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('ion_auth');
        $groups=array('admin');
        // check if user logged in
        if (!$this->ion_auth->logged_in()||!$this->ion_auth->in_group($groups)) {
            redirect('index.php/auth/login');
        }

        $this->load->model('asset_management_mod');

        $this->load->library('permissions');
        $this->load->library('datatables');
        $this->load->library('grocery_CRUD');
        $this->load->library('system_log');
    }

    function index()
    {
        $this->permissions->check_permission('access');
        $this->load->view('common/header');
        $this->load->view('assets/assets_manage');
        $this->load->view('common/footer');
    }

    ///Item Category
    public function save_items_category($method)
    {
        if ($method == "add_item_category") {
            $this->form_validation->set_rules('item_category_code', 'Code', 'trim|required');
            if ($this->form_validation->run() === FALSE) {
                $data = array();
                $data['error_string'] = array();
                $data['inputerror'] = array();
                $data['status'] = FALSE;
                $data['error'] = "validation_error";
                if (form_error('item_category_code')) {
                    $data['inputerror'][] = 'item_category_code';
                    $data['error_string'][] = form_error('item_category_code');
                }
                echo json_encode($data);
                exit;
            } else {
                $details = $this->input->post();
                $data2['code'] = $this->input->post('item_category_code');
                $data2['name'] = $this->input->post('item_category_name');

                if ($this->db->insert('hr_pay_m_assets_item_categories', $data2)){
                    $qid = $this->db->insert_id();
                    $this->system_log->create_system_log("Asset Management", "Success", "New Item Category Added  ID #".$qid);
                    echo json_encode(array("status" => TRUE));
                } else {
                    echo json_encode(array("status" => FALSE));
                }
            }
        } else if ($method == "edit_item_category"){
            $this->form_validation->set_rules('item_category_code', 'Code', 'trim|required');
            if ($this->form_validation->run() === FALSE) {

                $data = array();
                $data['error_string'] = array();
                $data['inputerror'] = array();
                $data['status'] = FALSE;

                $data['error'] = "validation_error";
                if (form_error('item_category_code')) {
                    $data['inputerror'][] = 'item_category_code';
                    $data['error_string'][] = form_error('item_category_code');
                }
                echo json_encode($data);
                exit;
            } else {
                $item_category_id = $this->input->post('item_category_id');
                $details = $this->input->post();
                $data2['code'] = $this->input->post('item_category_code');
                $data2['name'] = $this->input->post('item_category_name');

                $this->db->where('id', $item_category_id);
                if ($this->db->update('hr_pay_m_assets_item_categories', $data2)){
                    $this->db->trans_complete();
                    $this->system_log->create_system_log("Asset Management", "Success", "Updated  Item Category ID #".$item_category_id);
                    echo json_encode(array("status" => TRUE));
                } else {
                    echo json_encode(array("status" => FALSE));
                }
            }
        }

    }


    public function save_items_brand($method)
    {
        if ($method == "add_item_brand") {
            $this->form_validation->set_rules('item_brand_code', 'Code', 'trim|required');
            if ($this->form_validation->run() === FALSE) {
                $data = array();
                $data['error_string'] = array();
                $data['inputerror'] = array();
                $data['status'] = FALSE;
                $data['error'] = "validation_error";
                if (form_error('item_brand_code')) {
                    $data['inputerror'][] = 'item_brand_code';
                    $data['error_string'][] = form_error('item_brand_code');
                }
                echo json_encode($data);
                exit;
            } else {
                $details = $this->input->post();
                $data2['code'] = $this->input->post('item_brand_code');
                $data2['name'] = $this->input->post('item_brand_name');

                if ($this->db->insert('hr_pay_m_assets_item_brands', $data2)){
                    $qid = $this->db->insert_id();
                    $this->system_log->create_system_log("Asset Management", "Success", "New Item Brand Added  ID #".$qid);
                    echo json_encode(array("status" => TRUE));
                } else {
                    echo json_encode(array("status" => FALSE));
                }
            }
        } else if ($method == "edit_item_brand"){
            $this->form_validation->set_rules('item_brand_code', 'Code', 'trim|required');
            if ($this->form_validation->run() === FALSE) {

                $data = array();
                $data['error_string'] = array();
                $data['inputerror'] = array();
                $data['status'] = FALSE;

                $data['error'] = "validation_error";
                if (form_error('item_brand_code')) {
                    $data['inputerror'][] = 'item_brand_code';
                    $data['error_string'][] = form_error('item_brand_code');
                }
                echo json_encode($data);
                exit;
            } else {
                $item_brand_id = $this->input->post('item_brand_id');
                $details = $this->input->post();
                $data2['code'] = $this->input->post('item_brand_code');
                $data2['name'] = $this->input->post('item_brand_name');

                $this->db->where('id', $item_brand_id);
                if ($this->db->update('hr_pay_m_assets_item_brands', $data2)){
                    $this->db->trans_complete();
                    $this->system_log->create_system_log("Asset Management", "Success", "Updated  Item Brand ID #".$item_brand_id);
                    echo json_encode(array("status" => TRUE));
                } else {
                    echo json_encode(array("status" => FALSE));
                }
            }
        }

    }

    public function save_item_return()
    {
        $this->form_validation->set_rules('return_status', 'Return Status', 'trim|required');
        $this->form_validation->set_rules('returned_date', 'Return Date', 'trim|required');

        if ($this->form_validation->run() === FALSE) {

            $data = array();
            $data['error_string'] = array();
            $data['inputerror'] = array();
            $data['status'] = FALSE;
            $data['error'] = "validation_error";

            if(form_error('return_status')) {
                $data['inputerror'][] = 'return_status';
                $data['error_string'][] = form_error('return_status');
            }

            if(form_error('returned_date')) {
                $data['inputerror'][] = 'returned_date';
                $data['error_string'][] = form_error('returned_date');
            }

            echo json_encode($data);
            exit;

        }
        else {
            $details = $this->input->post();

            $data=array(

                'status'=>$details['return_status'],
                'returned_date'=>$details['returned_date'],
            );

            if ($this->db->update('hr_pay_employee_asset_allocation', $data,array('id'=>$details['asset_return_id']))){

                $this->system_log->create_system_log("Asset Management", "Success", "Return Item ID #".$details['asset_return_id']);

                $allocation=$this->asset_management_mod->get_allocation_item(array('id'=>$details['asset_return_id']));
                $issued_qty=(($this->asset_management_mod->get_issued_qty(array('id'=>$allocation->item_id))->qty - $allocation->allocation_qty));

                $data1=array(
                    'issued'=>$issued_qty
                );

                if($this->db->update('hr_pay_m_assets_items',$data1,array('id'=>$allocation->item_id))){
                    echo json_encode(array("status" => TRUE));
                }

            } else {
                echo json_encode(array("status" => FALSE));
            }
        }
    }

    public function get_item_category_data($for)
    {
        $data = $this->asset_management_mod->get_item_category_by_id($for);
        echo json_encode($data);
    }

    public function get_item_brand_data($for)
    {
        $data = $this->asset_management_mod->get_item_brand_by_id($for);
        echo json_encode($data);
    }

    ///Item
    public function save_item($method)
    {
        if ($method == "add_item") {
            $this->form_validation->set_rules('item_code', 'Code', 'trim|required');
            if ($this->form_validation->run() === FALSE) {
                $data = array();
                $data['error_string'] = array();
                $data['inputerror'] = array();
                $data['status'] = FALSE;
                $data['error'] = "validation_error";
                if (form_error('item_code')) {
                    $data['inputerror'][] = 'item_code';
                    $data['error_string'][] = form_error('item_code');
                }
                echo json_encode($data);
                exit;
            }
            else {
                $details = $this->input->post();
                $data2['brand'] = $this->input->post('item_brand');
                $data2['serial'] = $this->input->post('item_serial');
                $data2['qty'] = $this->input->post('item_qty');
                $data2['status'] = $this->input->post('is_active');
                $data2['code'] = $this->input->post('item_code');
                $data2['name'] = $this->input->post('item_name');
                $data2['item_category_id'] = $this->input->post('item_category');

                if ($this->db->insert('hr_pay_m_assets_items', $data2)){
                    $qid = $this->db->insert_id();
                    $this->system_log->create_system_log("Asset Management", "Success", "New Item Added  ID #".$qid);
                    echo json_encode(array("status" => TRUE));
                } else {
                    echo json_encode(array("status" => FALSE));
                }
            }

        }
        else if ($method == "edit_item"){
            $this->form_validation->set_rules('item_code', 'Code', 'trim|required');
            if ($this->form_validation->run() === FALSE) {
                $data = array();
                $data['error_string'] = array();
                $data['inputerror'] = array();
                $data['status'] = FALSE;
                $data['error'] = "validation_error";
                if (form_error('item_code')) {
                    $data['inputerror'][] = 'item_code';
                    $data['error_string'][] = form_error('item_code');
                }
                echo json_encode($data);
                exit;
            } else {
                $item_id = $this->input->post('item_id');
                $details = $this->input->post();
                $data2['brand'] = $this->input->post('item_brand');
                $data2['serial'] = $this->input->post('item_serial');
                $data2['qty'] = $this->input->post('item_qty');
                $data2['status'] = $this->input->post('is_active');
                $data2['code'] = $this->input->post('item_code');
                $data2['name'] = $this->input->post('item_name');
                $data2['item_category_id'] = $this->input->post('item_category');

                $this->db->where('id', $item_id);
                if ($this->db->update('hr_pay_m_assets_items', $data2)){
                    $this->db->trans_complete();
                    $this->system_log->create_system_log("Asset Management", "Success", "Updated  Item ID #".$item_id);
                    echo json_encode(array("status" => TRUE));
                } else {
                    echo json_encode(array("status" => FALSE));
                }
            }
        }

    }

    public function get_items_data()
    {
        $this->load->library('datatables');
        $this->datatables->select("
        hr_pay_m_assets_items.id AS item_id,
        hr_pay_m_assets_items.id,
        hr_pay_m_assets_items.serial,
        hr_pay_m_assets_items.code,
        hr_pay_m_assets_items.name,
        CONCAT(hr_pay_m_assets_item_categories.code,' - ',hr_pay_m_assets_item_categories.name) AS item_cat_code,
        CONCAT(hr_pay_m_assets_item_brands.code,' - ',hr_pay_m_assets_item_brands.name) AS item_brand,
        hr_pay_m_assets_items.qty,
        hr_pay_m_assets_items.status,
        ", FALSE);

        $this->datatables->from('hr_pay_m_assets_items');
        $this->datatables->join('hr_pay_m_assets_item_categories','hr_pay_m_assets_item_categories.id=hr_pay_m_assets_items.item_category_id');
        $this->datatables->join('hr_pay_m_assets_item_brands','hr_pay_m_assets_item_brands.id=hr_pay_m_assets_items.brand');
        $this->datatables->add_column("Actions", "<a class='btn btn-default tbl-action' href='javascript:;' title='Edit' onclick='edit_item(" . '$1' . ")'>
                <i class='fa fa-pencil'></i> Edit
            </a>
            ", "item_id");
        $this->datatables->unset_column('item_id');
        echo $this->datatables->generate();
    }

    public function get_assets_allocation_data()
    {
        $this->load->library('datatables');
        $this->datatables->select("
        hr_pay_employee_asset_allocation.id AS asset_id,
        hr_pay_employee_asset_allocation.id,
        hr_pay_employee_asset_allocation.allocation_no,
        CONCAT(hr_pay_employees.employee_id,'-',hr_pay_employees.first_name) AS emp,
        CONCAT(hr_pay_m_assets_item_categories.code,' - ',hr_pay_m_assets_item_categories.name) AS item_cat_code,
        CONCAT(hr_pay_m_assets_items.code,' - ',hr_pay_m_assets_items.name) AS item_code,
        hr_pay_employee_asset_allocation.date_issued,
        hr_pay_employee_asset_allocation.allocation_qty,
        hr_pay_employee_asset_allocation.is_returnable,
        hr_pay_employee_asset_allocation.status,
        ", FALSE);
        $this->datatables->from('hr_pay_employee_asset_allocation');
        $this->datatables->join('hr_pay_employees','hr_pay_employees.id=hr_pay_employee_asset_allocation.employee_id');
        $this->datatables->join('hr_pay_m_assets_item_categories','hr_pay_m_assets_item_categories.id=hr_pay_employee_asset_allocation.item_category_id');
        $this->datatables->join('hr_pay_m_assets_items','hr_pay_m_assets_items.id=hr_pay_employee_asset_allocation.item_id');
        $this->datatables->add_column("Actions", "
        <a class='btn btn-default tbl-action' href='javascript:;' title='Edit' onclick='edit_allocation(" . '$1' . ")'>
                <i class='fa fa-pencil'></i> Edit
            </a>
            <a class='btn-sm ' target='_blank' title='Print Assets Allocation' href='".base_url('systems/assets_management/print_asset_allocation/$1')."'>
                <i class='fa fa-print'> </i>
            </a>
            ", "asset_id");
        $this->datatables->unset_column('asset_id');
        echo $this->datatables->generate();
    }

    public function get_pending_return_datatable()
    {
        $this->load->library('datatables');
        $this->datatables->select("
       hr_pay_employee_asset_allocation.id AS asset_id,
        hr_pay_employee_asset_allocation.id,
        hr_pay_employee_asset_allocation.allocation_no,
        CONCAT(hr_pay_employees.employee_id,'-',hr_pay_employees.first_name) AS emp,
        CONCAT(hr_pay_m_assets_item_categories.code,' - ',hr_pay_m_assets_item_categories.name) AS item_cat_code,
        CONCAT(hr_pay_m_assets_items.code,' - ',hr_pay_m_assets_items.name) AS item_code,
        hr_pay_employee_asset_allocation.date_issued,
        hr_pay_employee_asset_allocation.allocation_qty,
        ", FALSE);

        $this->datatables->from('hr_pay_employee_asset_allocation');
        $this->datatables->join('hr_pay_employees','hr_pay_employees.id=hr_pay_employee_asset_allocation.employee_id');
        $this->datatables->join('hr_pay_m_assets_item_categories','hr_pay_m_assets_item_categories.id=hr_pay_employee_asset_allocation.item_category_id');
        $this->datatables->join('hr_pay_m_assets_items','hr_pay_m_assets_items.id=hr_pay_employee_asset_allocation.item_id');
        $this->datatables->where('hr_pay_employee_asset_allocation.status','0');
        $this->datatables->where('hr_pay_employee_asset_allocation.is_returnable','1');

        $this->datatables->add_column("Actions", "
        <a class='btn btn-default tbl-action' href='javascript:;' title='Return' onclick='return_item(" . '$1' . ")'>
                <i class='fa fa-cog'></i> Return
            </a>", "asset_id");
        $this->datatables->unset_column('asset_id');
        echo $this->datatables->generate();

    }

    public function get_returned_datatable()
    {
        $this->load->library('datatables');
        $this->datatables->select("
        hr_pay_employee_asset_allocation.id AS asset_id,
        hr_pay_employee_asset_allocation.id,
        hr_pay_employee_asset_allocation.allocation_no,
        CONCAT(hr_pay_employees.employee_id,'-',hr_pay_employees.first_name) AS emp,
        CONCAT(hr_pay_m_assets_item_categories.code,' - ',hr_pay_m_assets_item_categories.name) AS item_cat_code,
        CONCAT(hr_pay_m_assets_items.code,' - ',hr_pay_m_assets_items.name) AS item_code,
        hr_pay_employee_asset_allocation.allocation_qty,
        hr_pay_employee_asset_allocation.date_issued,
        hr_pay_employee_asset_allocation.returned_date,
        ", FALSE);

        $this->datatables->from('hr_pay_employee_asset_allocation');
        $this->datatables->join('hr_pay_employees','hr_pay_employees.id=hr_pay_employee_asset_allocation.employee_id');
        $this->datatables->join('hr_pay_m_assets_item_categories','hr_pay_m_assets_item_categories.id=hr_pay_employee_asset_allocation.item_category_id');
        $this->datatables->join('hr_pay_m_assets_items','hr_pay_m_assets_items.id=hr_pay_employee_asset_allocation.item_id');
        $this->datatables->where('hr_pay_employee_asset_allocation.status','1');
        $this->datatables->where('hr_pay_employee_asset_allocation.is_returnable','1');

        $this->datatables->unset_column('asset_id');
        echo $this->datatables->generate();
    }

    public function get_assets_stock_data()
    {
        $this->load->library('datatables');
        $this->datatables->select("
        hr_pay_m_assets_items.id AS item_id,
        hr_pay_m_assets_items.id,
        hr_pay_m_assets_items.serial,
        CONCAT(hr_pay_m_assets_items.code,'',hr_pay_m_assets_items.name) AS item_name_code,
        CONCAT(hr_pay_m_assets_item_categories.code,' - ',hr_pay_m_assets_item_categories.name) AS item_cat_code,
        CONCAT(hr_pay_m_assets_item_brands.code,' - ',hr_pay_m_assets_item_brands.name) AS item_brand,
        hr_pay_m_assets_items.qty,
        hr_pay_m_assets_items.issued,
        (hr_pay_m_assets_items.qty - hr_pay_m_assets_items.issued) AS balance_qty,
        ", FALSE);

        $this->datatables->from('hr_pay_m_assets_items');
        $this->datatables->join('hr_pay_m_assets_item_categories','hr_pay_m_assets_item_categories.id=hr_pay_m_assets_items.item_category_id');
        $this->datatables->join('hr_pay_m_assets_item_brands','hr_pay_m_assets_item_brands.id=hr_pay_m_assets_items.brand');
        $this->datatables->unset_column('item_id');
        echo $this->datatables->generate();
    }

    public function get_items_categories_data()
    {
        $this->load->library('datatables');
        $this->datatables->select("
        hr_pay_m_assets_item_categories.id AS cat_id,
        hr_pay_m_assets_item_categories.id,
        code,
        name
        ", FALSE);
        $this->datatables->from('hr_pay_m_assets_item_categories');
        $this->datatables->add_column("Actions", "<a class='btn btn-default tbl-action' href='javascript:;' title='Edit' onclick='edit_item_category(" . '$1' . ")'>
                <i class='fa fa-pencil'></i> Edit
            </a>
            ", "cat_id");
        $this->datatables->unset_column('cat_id');
        echo $this->datatables->generate();
    }

    public function get_items_brands_data()
    {
        $this->load->library('datatables');
        $this->datatables->select("
        hr_pay_m_assets_item_brands.id AS cat_id,
        hr_pay_m_assets_item_brands.id,
        code,
        name
        ", FALSE);
        $this->datatables->from('hr_pay_m_assets_item_brands');
        $this->datatables->add_column("Actions", "<a class='btn btn-default tbl-action' href='javascript:;' title='Edit' onclick='edit_item_brand(" . '$1' . ")'>
                <i class='fa fa-pencil'></i> Edit
            </a>
            ", "cat_id");
        $this->datatables->unset_column('cat_id');
        echo $this->datatables->generate();
    }

    public function get_item_data($for)
    {
        $data = $this->asset_management_mod->get_item_by_id($for);
        echo json_encode($data);
    }

    public function getItemByCategory($id){

        $output=$this->asset_management_mod->getItemByCategory($id);
        echo json_encode($output);
    }

    public function edit_get_allocation_data($id){

        $output=$this->asset_management_mod->edit_get_allocation_data($id);
        echo json_encode($output);
    }

    public function save_allocation($save_method){

        if($save_method == "add"){

            $this->form_validation->set_rules('allocation_item_category','Item Category','trim|required');
            $this->form_validation->set_rules('allocation_item','Item','required|trim');
            $this->form_validation->set_rules('employee_id','Employee','required|trim');
            $this->form_validation->set_rules('date_issued','Issue Date','required|trim');
            $this->form_validation->set_rules('allocation_qty','Issue Qty','required|trim');

            if($this->form_validation->run() === FALSE){

                $data=array();
                $data['status'] = FALSE;
                $data['error'] = "validation_error";

                $data['inputerror']=array();
                $data['error_string']=array();

                if(form_error('allocation_item_category')){
                    $data['inputerror'][] = 'allocation_item_category';
                    $data['error_string'][] = form_error('allocation_item_category');
                }

                if(form_error('allocation_item')){
                    $data['inputerror'][] = 'allocation_item';
                    $data['error_string'][] = form_error('allocation_item');
                }

                if(form_error('employee_id')){
                    $data['inputerror'][] = 'employee_id';
                    $data['error_string'][] = form_error('employee_id');
                }

                if(form_error('date_issued')){
                    $data['inputerror'][] = 'date_issued';
                    $data['error_string'][] = form_error('date_issued');
                }

                if(form_error('allocation_qty')){
                    $data['inputerror'][] = 'allocation_qty';
                    $data['error_string'][] = form_error('allocation_qty');
                }

                echo json_encode($data);
                exit;

            }
            else{

                $val=$this->input->post();

                $issued_stock_qty=$this->asset_management_mod->get_issued_qty(array('id'=>$val['allocation_item']))->issued;
                $stock_qty=$this->asset_management_mod->get_issued_qty(array('id'=>$val['allocation_item']))->qty;

                if($val['allocation_qty'] > ($stock_qty - $issued_stock_qty)){
                    echo json_encode(array(
                        "status" => FALSE,
                        "eligibility_error" => "Can't issue item.Available ".($stock_qty - $issued_stock_qty)." quantities in the stock."
                    ));
                    exit;
                }

                $count=count($this->asset_management_mod->get_last_allocation_number());

                if($count > 0){
                    $allocation_no='ASM'.date("y").date("m").(sprintf('%04d',(int)$count+1));
                }
                else{
                    $allocation_no='ASM'.date("y").date("m").'0001';
                }


                if(isset($val['is_returnable'])){
                    $returnable=1;
                }
                else{
                    $returnable=0;
                }

                $data=array(
                    'allocation_no'=>$allocation_no,
                    'item_id'=>$val['allocation_item'],
                    'item_category_id'=>$val['allocation_item_category'],
                    'employee_id'=>$val['employee_id'],
                    'date_issued'=>$val['date_issued'],
                    'allocation_qty'=>$val['allocation_qty'],
                    'is_returnable'=>$returnable,
                    '_created_'=>date('Y-m-d h:i:s'),
                    '_updated_'=>date('Y-m-d h:i:s'),
                    'status'=>0,

                );

                if ($this->db->insert('hr_pay_employee_asset_allocation', $data)){
                    $qid = $this->db->insert_id();
                    $this->system_log->create_system_log("Asset Management", "Success", "New Allocate Item Added ID #".$qid);

                    $issued_qty=(($this->asset_management_mod->get_issued_qty(array('id'=>$val['allocation_item']))->issued + $val['allocation_qty']));

                    $data1=array(
                        'issued'=>$issued_qty
                    );

                    if($this->db->update('hr_pay_m_assets_items',$data1,array('id'=>$val['allocation_item']))){
                        echo json_encode(array("status" => TRUE));
                    }

                }
                else {

                    echo json_encode(array("status" => FALSE));

                }
            }
        }
        else if($save_method == "edit"){

            $this->form_validation->set_rules('allocation_item_category', 'Item Category', 'trim|required');
            $this->form_validation->set_rules('allocation_item', 'Item', 'required|trim');
            $this->form_validation->set_rules('employee_id', 'Employee', 'required|trim');
            $this->form_validation->set_rules('allocation_qty', 'Qty', 'required|trim');
            $this->form_validation->set_rules('date_issued', 'Issue Date', 'required|trim');

            if ($this->form_validation->run() === FALSE) {

                $data = array();
                $data['status'] = FALSE;
                $data['error'] = "validation_error";

                $data['inputerror'] = array();
                $data['error_string'] = array();

                if (form_error('allocation_item_category')) {
                    $data['inputerror'][] = 'allocation_item_category';
                    $data['error_string'][] = form_error('allocation_item_category');
                }

                if (form_error('allocation_item')) {
                    $data['inputerror'][] = 'allocation_item';
                    $data['error_string'][] = form_error('allocation_item');
                }

                if (form_error('employee_id')) {
                    $data['inputerror'][] = 'employee_id';
                    $data['error_string'][] = form_error('employee_id');
                }

                if (form_error('date_issued')) {
                    $data['inputerror'][] = 'date_issued';
                    $data['error_string'][] = form_error('date_issued');
                }

                if (form_error('allocation_qty')) {
                    $data['inputerror'][] = 'allocation_qty';
                    $data['error_string'][] = form_error('allocation_qty');
                }

                echo json_encode($data);
                exit;

            } else {

                $val = $this->input->post();

                $issued_stock_qty=$this->asset_management_mod->get_issued_qty(array('id'=>$val['allocation_item']))->issued;
                $stock_qty=$this->asset_management_mod->get_issued_qty(array('id'=>$val['allocation_item']))->qty;
                $previous_qty=$this->asset_management_mod->get_previous_qty(array('id' => $val['asset_allocation_id'],'item_id'=>$val['allocation_item']))->allocation_qty;

                if($val['allocation_qty'] > (($stock_qty - $issued_stock_qty) + $previous_qty)){
                    echo json_encode(array(
                        "status" => FALSE,
                        "eligibility_error" => "Can't issue item.Available ".($stock_qty - $issued_stock_qty)." quantities in the stock."
                    ));
                    exit;
                }

                $issued_qty=0;
                if($previous_qty > $val['allocation_qty']){
                    $issued_qty = $issued_stock_qty - ($previous_qty - $val['allocation_qty']);
                }
                else if($previous_qty < $val['allocation_qty']){
                    $issued_qty = $issued_stock_qty + ($val['allocation_qty'] - $previous_qty);
                }
                else if($previous_qty == $val['allocation_qty']){
                    $issued_qty = $issued_stock_qty;
                }

                if (isset($val['is_returnable'])){
                    $returnable = 1;
                } else {
                    $returnable = 0;
                }

                $data = array(
                    'item_id' => $val['allocation_item'],
                    'item_category_id' => $val['allocation_item_category'],
                    'employee_id' => $val['employee_id'],
                    'date_issued' => $val['date_issued'],
                    'allocation_qty' => $val['allocation_qty'],
                    'is_returnable' => $returnable,
                    '_updated_' => date('Y-m-d h:i:s'),
                    'status' => 0,
                );

                if($this->db->update('hr_pay_employee_asset_allocation', $data, array('id' => $val['asset_allocation_id']))) {

                    $this->system_log->create_system_log("Asset Management", "Success", "Update Allocate Item Added ID #".$val['asset_allocation_id']);

                    $data1=array(
                        'issued'=>$issued_qty
                    );

                    if($this->db->update('hr_pay_m_assets_items',$data1,array('id'=>$val['allocation_item']))){
                        echo json_encode(array("status" => TRUE));
                    }

                }
                else{
                    echo json_encode(array('status'=>FALSE));
                }
            }
        }
    }


    public function get_last_allocation_number(){

        $count=count($this->asset_management_mod->get_last_allocation_number());

        if($count > 0){
            $allocation_no='ASM'.date("y").date("m").(sprintf('%04d',(int)$count+1));
        }
        else{
            $allocation_no='ASM'.date("y").date("m").'0001';
        }

        echo json_encode(array('allocation_no'=>$allocation_no));

    }

    public function print_asset_allocation($id){

        $meta['title'] = 'Print Asset Allocation';
        $data=array();

        $data['asset'] = $this->asset_management_mod->get_allocation_data($id);
        $data['company_name'] = $this->asset_management_mod->get_administration_info(array('setting_key'=>'company_name'))->setting_value;
        $data['address'] = $this->asset_management_mod->get_administration_info(array('setting_key'=>'company_address'))->setting_value;

        $this->load->view('common/header',$meta);
        $this->load->view('assets/print_asset',$data);
        $this->load->view('common/footer');

    }

    public function get_master_data(){

        $data=array();

        $data['employees'] = $this->asset_management_mod->getAllEmployees();
        $data['item_categories'] = $this->asset_management_mod->getAllItemCategories();
        $data['item_brands'] = $this->asset_management_mod->getAllItemBrands();

        echo json_encode($data);

    }

}