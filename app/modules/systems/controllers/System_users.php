<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php
/**
 * Created by PhpStorm.
 * User: Kasun De Mel
 * Date: 8/3/2020
 * Time: 10:15 AM
 */
class System_users extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('ion_auth');

        if (!$this->ion_auth->logged_in()) {
            redirect('index.php/auth/login');
        }
        $this->load->model('system_users_model','system');
        $this->load->model('ion_auth_model');
        $this->load->library('datatables');
        $this->load->library('session');
        $this->load->library('system_log');
        $this->load->library('kcrud');

        date_default_timezone_set("Asia/Colombo");
        $this->currentTime = date('Y-m-d H:i:s');
        $this->currentDate = date('Y-m-d');
    }

    public function index()
    {
//        $this->permissions->check_permission('access');

        $data['all_list_pcv']=$this->system->getEmployeesFullData();
        $data['AllEmployees']=$this->system->getAllEmployees();
        $data['AllGroups']=$this->system->getAllGroups();

        $this->load->helper('url');

        $this->load->view('common/header');
        $this->load->view('employee_list/system_users/index',$data);
        $this->load->view('common/footer');

    }

    public function session_change_branch($company_id){

        $this->session->unset_userdata('COMPANY2');
        $this->session->unset_userdata('COMPANY2_ID');
        $this->session->unset_userdata('COMPANY2_CODE');
        $company=$this->system->session_change_branch($company_id);
        $value=array_shift($company);
        $this->session->set_userdata('COMPANY2',$value->name);
        $this->session->set_userdata('COMPANY2_ID',$value->id);
        $this->session->set_userdata('COMPANY2_CODE',$value->code);

        redirect($_SERVER['HTTP_REFERER']);
    }

    public function ajax_get_system_permissions_details_by_id(){

        $id = $this->input->post('sys_u_p_id');
        if (empty($id)) {
            echo json_encode(array(
                'status' => false,
                'message' => "Unable to get data. ID invalid."
            ));
        }

        $list_modules = $this->system->getModules();
        $list_sections = $this->system->getModuleSections();
        $sys_u_p_data = $this->system->get_sys_permission_data_by_userid($id);

        $list_buttons = $this->system->getButtons();
        $sys_p_buttons = $this->system->get_sys_permission_button($id);

        echo json_encode(array(
            'status' => true,
            'list_modules' => $list_modules,
            'list_sections' => $list_sections,
            'sys_u_p_data' => $sys_u_p_data,
            'list_buttons' => $list_buttons,
            'sys_p_buttons' => $sys_p_buttons
        ));
        exit;
    }

    public function  ajax_get_system_user_branch_stores_details_by_id(){
        $id = $this->input->post('sys_u_bs_id');
        if (empty($id)) {
            echo json_encode(array(
                'status' => false,
                'message' => "Unable to get data. ID invalid."
            ));
        }

        $list_BranchSubStores = $this->system->getBranchSubStores();
        $list_Branches = $this->system->getAllBranchesbyUser($id);
        $sys_u_bs_data = $this->system->get_sys_user_branch_stores_by_userid($id);

        echo json_encode(array(

            'status' => true,
            'list_BranchSubStores' => $list_BranchSubStores,
            'list_Branches' => $list_Branches,
            'sys_u_bs_data' => $sys_u_bs_data
        ));
        exit;
    }

    public function save_user_permissions(){

        $id = null;
        $message = null;
        $details = $this->input->post();

        $sys_u_p_id = $details['sys_u_p_id'];
        $data_main['sys_u_p_id'] = $sys_u_p_id;


        if (isset($details['userpermissions'])) {
            if ($this->system->delete_user_permissions($sys_u_p_id)) {
                $datasize = sizeof($details['userpermissions']);

                foreach ($details['userpermissions'] as $key => $value){

                    if (!empty($details['userpermissions'][$key])){

                        $insert_item_data = array(
                            'user_id' => $sys_u_p_id,
                            'module_id' => $details['userpermissions'][$key],
                            'access_permission ' => "YES"
                        );

                        $id = $this->db->insert('auth_system_permissions', $insert_item_data);
                        unset($insert_item_data);

                    }
                }
            }

            if ($this->kcrud->delete("auth_users_button_permission",array("user_id"=>$data_main['sys_u_p_id']))) {

                $datasize = sizeof($details['userbuttons']);

                foreach ($details['userbuttons'] as $key => $value) {
                    if (!empty($details['userbuttons'][$key])) {
                        $insert_item_data = array(
                            'user_id' => $sys_u_p_id,
                            'button' => $details['userbuttons'][$key]
                        );
                        $id = $this->db->insert('auth_users_button_permission', $insert_item_data);
                        unset($insert_item_data);
                    }
                }
            }

            $message = 'User Permissions Updated '.$data_main['sys_u_p_id'];

        } else{
            if ($this->system->delete_user_permissions($data_main['sys_u_p_id'])) {
                $id = 1;
            }
            $message = 'All User Permissions Removed for User #'.$data_main['sys_u_p_id'];
        }

        //if ($id = $this->db->insert('hr_pay_formula_settings', $data_main)) {

        //}

        if (!empty($id) && $id > 0) {
            echo json_encode(array(
                'status' => true,
                'message' => $message
            ));
            exit;
        } else {
            echo json_encode(array(
                'status' => false,
                'message' => 'Unable to save! Try again.',
            ));
            exit;
        }
    }

    public function save_user($method){

        if ($method == "add") {
            $this->form_validation->set_rules('epf_no','Epf Number','trim|required|alpha_numeric|is_unique[auth_users.epf_no]');
            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('first_name', 'First Name', 'required');
            $this->form_validation->set_rules('last_name', 'Last Name', 'required');
            $this->form_validation->set_rules('username', 'Username', 'required|is_unique[auth_users.username]');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[auth_users.email]');
            $this->form_validation->set_rules('password', 'Password','required|min_length[6]|max_length[15]|matches[password_confirm]');
            $this->form_validation->set_rules('password_confirm','Password Confirm', 'required');

            if ($this->form_validation->run() === FALSE) {
                $data = array();
                $data['error_string'] = array();
                $data['inputerror'] = array();
                $data['status'] = FALSE;
                $data['error'] = "validation_error";
                if (form_error('title')) {
                    $data['inputerror'][] = 'title';
                    $data['error_string'][] = form_error('title');
                }
                if (form_error('epf_no'))
                {
                    $data['inputerror'][] = 'epf_no';
                    $data['error_string'][] = form_error('epf_no');
                }
                if (form_error('first_name')) {
                    $data['inputerror'][] = 'first_name';
                    $data['error_string'][] = form_error('first_name');
                }
                if (form_error('last_name')) {
                    $data['inputerror'][] = 'last_name';
                    $data['error_string'][] = form_error('last_name');
                }
                if (form_error('username')) {
                    $data['inputerror'][] = 'username';
                    $data['error_string'][] = form_error('username');
                }
                if (form_error('email')) {
                    $data['inputerror'][] = 'email';
                    $data['error_string'][] = form_error('email');
                }
                if (form_error('password')) {
                    $data['inputerror'][] = 'password';
                    $data['error_string'][] = form_error('password');
                }
                if (form_error('password_confirm')) {
                    $data['inputerror'][] = 'password_confirm';
                    $data['error_string'][] = form_error('password_confirm');
                }

                echo json_encode($data);
                exit;
            }

            $id = null;
            $message = null;
            $details = $this->input->post();

            $title = $details['title'];
            $first_name = $details['first_name'];
            $last_name = $details['last_name'];

            $email = strtolower($details['email']);
            $identity = $details['username'];
            $password = $details['password'];
            $user_group = $details['user_group'];
            $mobile_password = $this->encrypt($details['password'], 'L0BFbkw41A7AFC75A7BB2219DiPQv9');


            $additional_data = array(
                'title'=>$title,
                'first_name'  => $first_name,
                'last_name'  => $last_name,
                'epf_no'=>$this->input->post('epf_no'),
                'mobile_password'=>$mobile_password,
                'activation_code'=>sha1(mt_rand(100000,999999))
            );

            $group = array($user_group);
            if ($insert=$this->ion_auth->register($identity, $password, $email,$additional_data,$group)) {

                $message = 'User Created -'.$identity;

                $message = 'Add New Employee - # : ' . $identity;
                $this->system_log->create_system_log("Employees", "Success", "New Employee Added ID #".$identity);


                echo json_encode(array(
                    'status' => true,
                    'message' => $message
                ));
                exit;
            }
            else {

                echo json_encode(array(
                    'status' => false,
                    'message' => 'Unable to save! Try again.',
                ));
                exit;
            }

        } elseif($method == "update") {


            $id = null;
            $message = null;
            $details = $this->input->post();
            $user_id = $details['user_id'];
            $q1 = $this->db->query("SELECT email FROM auth_users WHERE id = $user_id");
            $data = $q1->row();
            $original_value = $data->email;
            if($details['email'] != $original_value) {
                $is_unique =  '|is_unique[auth_users.email]';
            } else {
                $is_unique =  '';
            }

            if($details['password']!=""){

                $this->form_validation->set_rules('email', 'Email', 'required|valid_email'.$is_unique);
                //$this->form_validation->set_rules('email', 'Email', 'required|valid_email'.$is_unique);
                $this->form_validation->set_rules('password', 'Password','required|min_length[6]|max_length[15]|matches[password_confirm]');
                $this->form_validation->set_rules('password_confirm','Password Confirm', 'required');

                if ($this->form_validation->run() === FALSE) {
                    $data = array();
                    $data['error_string'] = array();
                    $data['inputerror'] = array();
                    $data['status'] = FALSE;
                    $data['error'] = "validation_error";
                    if (form_error('email')) {
                        $data['inputerror'][] = 'email';
                        $data['error_string'][] = form_error('email');
                    }
                    if (form_error('password')) {
                        $data['inputerror'][] = 'password';
                        $data['error_string'][] = form_error('password');
                    }
                    if (form_error('password_confirm')) {
                        $data['inputerror'][] = 'password_confirm';
                        $data['error_string'][] = form_error('password_confirm');
                    }

                    echo json_encode($data);
                    exit;
                }

                $email    = strtolower($details['email']);
                $password = $details['password'];
                $mobile_password = $this->encrypt($details['password'], 'L0BFbkw41A7AFC75A7BB2219DiPQv9');

                $title = $details['title'];
                $first_name = $details['first_name'];
                $last_name = $details['last_name'];

                $data= array(
                    'email' => $email ,
                    'password' => $password,
                    'mobile_password' => $mobile_password,
                    'repid'=>$this->input->post('repid'),
                    'epf_no'=>$this->input->post('epf_no'),
                    'title'=>$title,
                    'first_name'  => $first_name,
                    'last_name'  => $last_name,
                );

                if ($this->ion_auth_model->update($user_id, $data)) {



                    $data1['epf_no'] = $this->input->post('epf_no');
                    $data1['title'] = $this->input->post('title');
                    $data1['role'] = "A";
                    $data1['name'] = $details['first_name']." ".$details['last_name'];
                    $data1['repid'] = $this->input->post('repid');

                    if($details['password']!="") {
                        $data1['password'] = $details["password"];
                    }

                    if ($this->system->update_employee($data1,$user_id)) {

                        $message = 'Updated Employee - # : ' . $user_id;
                        $this->system_log->create_system_log("Employees", "Success", "Employee Updated ID #".$user_id);
                    }


                    //Update the groups user belongs to
                    $groupData = $this->input->post('user_group');

                    if (isset($groupData) && !empty($groupData)) {

                        $this->ion_auth->remove_from_group('', $user_id);
                        foreach ($groupData as $grp) {
                            $this->ion_auth->add_to_group($grp, $user_id);
                        }

                        $message = 'User Updated with new PW -'.$user_id;
                        echo json_encode(array(
                            'status' => true,
                            'message' => $message
                        ));
                        exit;
                    }
                } else {

                    echo json_encode(array(
                        'status' => false,
                        'message' => 'Unable to update! Try again.',
                    ));
                    exit;
                }

//                $this->ion_auth_model->delete_user_group($user_id);
//
//                $user_group = $details['user_group'];
//                $group = array($user_group);


            } else {
                $this->form_validation->set_rules('email', 'Email', 'required|valid_email'.$is_unique);

                if ($this->form_validation->run() === FALSE) {
                    $data = array();
                    $data['error_string'] = array();
                    $data['inputerror'] = array();
                    $data['status'] = FALSE;
                    $data['error'] = "validation_error";
                    if (form_error('email')) {
                        $data['inputerror'][] = 'email';
                        $data['error_string'][] = form_error('email');
                    }
                    echo json_encode($data);
                    exit;
                }

                $email    = strtolower($details['email']);

                $title = $details['title'];
                $first_name = $details['first_name'];
                $last_name = $details['last_name'];

                $data= array(
                    'email' => $email ,
                    'repid'=>$this->input->post('repid'),
                    'epf_no'=>$this->input->post('epf_no'),
                    'title'=>$title,
                    'first_name'  => $first_name,
                    'last_name'  => $last_name,
                );

                if ($this->ion_auth_model->update($user_id, $data)) {


                    $data1['epf_no'] = $this->input->post('epf_no');
                    $data1['title'] = $this->input->post('title');
                    $data1['role'] = "A";
                    $data1['name'] = $details['first_name']." ".$details['last_name'];
                    $data1['repid'] = $this->input->post('repid');

                    if($details['password']!="") {
                        $data1['password'] = $details["password"];
                    }

                    if ($this->system->update_employee($data1,$user_id)) {

                        $message = 'Updated Employee - # : ' . $user_id;
                        $this->system_log->create_system_log("Employees", "Success", "Employee Updated ID #".$user_id);
                    }



                    //Update the groups user belongs to
                    $groupData = $this->input->post('user_group');

                    if (isset($groupData) && !empty($groupData)) {

                        $this->ion_auth->remove_from_group('', $user_id);
                        foreach ($groupData as $grp) {
                            $this->ion_auth->add_to_group($grp, $user_id);
                        }

                        $message = 'User Updated -'.$user_id;
                        echo json_encode(array(
                            'status' => true,
                            'message' => $message
                        ));
                        exit;
                    }
                } else {

                    echo json_encode(array(
                        'status' => false,
                        'message' => 'Unable to update! Try again.',
                    ));
                    exit;
                }
            }
        }

    }

    function edit_unique($value, $params)  {
        $CI =& get_instance();
        $CI->load->database();

        $CI->form_validation->set_message('edit_unique', "Sorry, that %s is already being used.");

        list($table, $field, $current_id) = explode(".", $params);

        $query = $CI->db->select()->from($table)->where($field, $value)->limit(1)->get();

        if ($query->row() && $query->row()->id != $current_id)
        {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function save_user_stores(){

        $id = null;
        $message = null;
        $details = $this->input->post();

        $sys_u_bs_id = $details['sys_u_bs_id'];
        $data_main['sys_u_bs_id'] = $sys_u_bs_id;


        if (isset($details['userstores'])) {
            if ($this->system->delete_user_stores($data_main['sys_u_bs_id'])) {

                foreach ($details['userstores'] as $key => $value) {
                    if (!empty($details['userstores'][$key])) {

                        $bdata = $this->system->get_branchid_by_storeid($details['userstores'][$key]);
                        $insert_item_data = array(
                            'user_id' => $sys_u_bs_id,
                            'branch_id' => $bdata->b_id,
                            'store_id' => $details['userstores'][$key]
                        );
                        $id = $this->db->insert('hr_pay_system_user_branch_stores', $insert_item_data);
                        unset($insert_item_data);
                    }
                }
            }
            $message = 'User Stores Permissions Updated '.$data_main['sys_u_bs_id'];
        } else{
            if ($this->system->delete_user_stores($data_main['sys_u_bs_id'])) {
                $id = 1;
            }
            $message = 'All Stores Permissions Removed for User #'.$data_main['sys_u_bs_id'];
        }

        //if ($id = $this->db->insert('hr_pay_formula_settings', $data_main)) {

        //}

        if (!empty($id) && $id > 0) {
            echo json_encode(array(
                'status' => true,
                'message' => $message
            ));
            exit;
        } else {
            echo json_encode(array(
                'status' => false,
                'message' => 'Unable to save! Try again.',
            ));
            exit;
        }
    }


    //Edit & Save Sys Users
    public function  ajax_get_system_user_data_by_id(){
        $id = $this->input->post('sys_user_id');
        if (empty($id)) {
            echo json_encode(array(
                'status' => false,
                'message' => "Unable to get data. User ID invalid."
            ));
        }

        $user_data = $this->system->get_sys_user_data_by_userid($id);
        $user_group = $this->system->get_sys_user_group($id);

        echo json_encode(array(
            'status' => true,
            'user_data' => $user_data,
            'user_group' => $user_group
        ));
        exit;
    }

    public function ajax_get_user_branch_matrix()
    {
        $sys_users=$this->system->getEmployeesFullData();

        if(!empty($sys_users))
        {
            echo json_encode(array(
                'status' => true,
                'sys_users' => $sys_users,
            ));exit;
        }
        else
        {
            echo json_encode(array(
                'status' => false,
                'message' => "Unable to retrieve data."
            ));exit;
        }
    }

    public function ajax_update_user_branch_matrix()
    {

        $pieces = explode(',', $this->input->post('matrix'));
        $user_id = $pieces[0];
        $branch_id = $pieces[1];
        $user_name = $this->input->post('user_name');
        $branch_name = $this->input->post('branch_name');

        // A box was checked
        if ($this->input->post('action') == 'true') {
            $insert_data = array(
                'employee_id' => $user_id,
                'branch_id' => $branch_id
            );
            if ($this->db->insert('hr_pay_system_users', $insert_data)) {
                $msg = "$user_name and $branch_name successfully linked.";
                $status = true;
            } else {
                $msg = "Sorry! Failed to link $user_name and $branch_name";
                $status = false;
            }
        } else {
            // A box was unchecked
            $update_data = array(
                'employee_id' => $user_id,
                'branch_id' => $branch_id
            );
            if ($this->system->delete_data($update_data)) {
                $msg = "$user_name and $branch_name link successfully removed.";
                $status = true;
            } else {
                $msg = "Sorry! Failed to remove the link between $user_name and $branch_name.";
                $status = false;
            }
        }

        echo json_encode(array(
            'status' => $status,
            'message' => $msg
        ));exit;
    }


    // BEta function
    public function delete_user_l(){

        if (!$this->ion_auth->logged_in())
        {
            // redirect them to the login page
            redirect('index.php/auth/login', 'refresh');
        }
        elseif (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
        {
            // redirect them to the home page because they must be an administrator to view this
            return show_error('You must be an administrator to view this page.');
        } else {
            //$user_id=$this->input->post('user_id');

            if ($this->uri->segment(4)) {
                $user_id = $this->uri->segment(4);
            }
            //$user_id = "";

            if (!empty($user_id)) {
                $where_1 = array(
                    'user_id' => $user_id
                );
                $where_2 = array(
                    'employee_id' => $user_id
                );
                $where_3 = array(
                    'id' => $user_id
                );

                if ($this->db->delete('hr_pay_system_user_branch_stores', $where_1) && $this->db->delete('auth_system_permissions', $where_1) && $this->db->delete('auth_users_groups', $where_1) && $this->db->delete('hr_pay_system_users', $where_2)) {
                    $this->db->delete('auth_users', $where_3);
                    echo json_encode(array(
                        'status' => true,
                        'message' => "User Removed" . $user_id
                    ));
                    exit;
                } else {
                    echo json_encode(array(
                        'status' => false,
                        'message' => "Unable to Delete User."
                    ));
                    exit;
                }
            } else {
                echo json_encode(array(
                    'status' => false,
                    'message' => "Invalid User ID."
                ));
                exit;
            }
        }
    }

    //added for mobile password generates
    public function encrypt($plaintext, $password) {
        $method = "AES-256-CBC";
        $key = hash('sha256', $password, true);
        $iv = openssl_random_pseudo_bytes(16);

        $ciphertext = openssl_encrypt($plaintext, $method, $key, OPENSSL_RAW_DATA, $iv);
        $hash = hash_hmac('sha256', $ciphertext, $key, true);

        return base64_encode($iv . $hash . $ciphertext);
    }

}








