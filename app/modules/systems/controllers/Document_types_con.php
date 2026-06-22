<?php
/**
 * Created by PhpStorm.
 * User: S.Priyadarshan
 * Date: 05-Jul-16
 * Time: 10:00 AM
 */
// Created by S.Priyadarshan on 05-07-2016 //

class document_types_con extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library('ion_auth');
        // check if user logged in
        if (!$this->ion_auth->logged_in())
        {
            redirect('index.php/auth/login');
        }
        //$this->permissions->check_permission('access');
        $this->load->database();
        $this->load->model('document_types_mod');
        date_default_timezone_set("Asia/Colombo");
        $this->currentTime = date('Y-m-d H:i:s');
        $this->load->library('system_log');
    }

    public function index()
    {
        $this->load->view('common/header');
        $this->load->view('master/document_types');
        $this->load->view('common/footer');
    }

    public function ajax_list_document_types_data()
    {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }

        $this->load->library('datatables');
        $this->datatables->select("hr_pay_m_document_types.id as document_type_id,
                                hr_pay_m_document_types.type_name as document_type_name,
                                hr_pay_m_document_types.notify_expiry,
                                hr_pay_m_document_types.notify_before_1_month,
                                hr_pay_m_document_types.notify_before_1_week,
                                hr_pay_m_document_types.notify_before_1_day,
                                hr_pay_m_document_types.details", FALSE);
        $this->datatables->from('hr_pay_m_document_types');
        $this->datatables->group_by("hr_pay_m_document_types.id");
        $this->datatables->add_column("Actions",
            "<a class='btn btn-default tbl-action' href='javascript:void()' title='Edit' onclick='edit_document_type(" . '$1' . ")'>
                            <i class='fa fa-edit'></i> Edit
                        </a>
                        <a class=''  href='javascript:void()' title='Delete' onclick='delete_document_type(" . '$1' . ")'>
                            <i class='fa- fa-trash-o-'></i>
                        </a>", "document_type_id");
        $this->datatables->unset_column("document_type_id");
        echo $this->datatables->generate();
    }

    public function ajax_get_document_type($for)
    {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }

        $where = array(
            'id' => $for
        );
        $document_type_data = $this->document_types_mod->get_document_type($where);
        echo json_encode($document_type_data->row());
    }
    public function ajax_save_document_type($save_method)
    {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }

        $required_data = array(
            'type_name',
            'notify_expiry',
            'notify_before_1_month',
            'notify_before_1_week',
            'notify_before_1_day'
        );
        $this->_validate_required($required_data);
        $document_type_details = array(
            'type_name' => ucfirst($this->input->post('type_name')),
            'notify_expiry' => $this->input->post('notify_expiry'),
            'notify_before_1_month' => $this->input->post('notify_before_1_month'),
            'notify_before_1_week' => $this->input->post('notify_before_1_week'),
            'notify_before_1_day' => $this->input->post('notify_before_1_day'),
            'details' => $this->_make_null($this->input->post('details'))
        );
        if($save_method == "add")
        {
            $document_type_details['_created_'] = $this->currentTime;
            $document_type_id = $this->document_types_mod->insert_document_type($document_type_details);
            $this->system_log->create_system_log("Master Document Types", "Success", "Document Type Added ID #".$document_type_id);
        }
        elseif($save_method == "edit")
        {
            $document_type_details['_updated_'] = $this->currentTime;
            $where = array(
                'id' => $this->input->post('document_type_id')
            );
            $document_type_id = $this->document_types_mod->update_document_type($where, $document_type_details);
            $this->system_log->create_system_log("Master Document Types", "Success", "Document Type Updated ID #".$this->input->post('document_type_id'));
        }
        if($document_type_id > 0)
        {
            echo json_encode(array("status" => TRUE));
        }
        else
        {
            echo json_encode(array("status" => FALSE));
        }
    }
    public function ajax_delete_document_type($id)
    {
        $result = $this->document_types_mod->search_employee("category", $id);
        if($result->num_rows() == 0)
        {
            $result = $this->document_types_mod->delete_document_type_by_id($id);
            if($result > 0)
            {
                echo json_encode(array("status" => TRUE, "message" => "Deleted successfully."));
            }
            else
            {
                echo json_encode(array("status" => FALSE, "message" => "Sorry! Deletion failed."));
            }
        }
        else
        {
            echo json_encode(array("status" => FALSE, "message" => "Sorry! Cannot delete because there are documents existing of this type."));
        }
    }

    private function _make_null($input)
    {
        $var = empty($input) ? NULL : $input;
        return $var;
    }

    private function _validate_required($required_data)
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        foreach($required_data as $key)
        {
            if ($this->input->post($key) == '')
            {
                $data['inputerror'][] = $key;
                $data['error_string'][] = 'This is required';
                $data['status'] = FALSE;
            }
        }

        if ($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }
}