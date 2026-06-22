<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Letters extends MX_Controller{

	function __construct()
	{
		parent::__construct();
		$this->load->library('ion_auth');
		// check if user logged in
		if (!$this->ion_auth->logged_in()) {
			redirect('index.php/auth/login', 'refresh');
		}

        $this->load->database();
        $this->load->helper('url');
		$this->load->model('letters_mod');
	}


     //////////////////////
    /// TEMAPLTEs
    /////////////////////////

    public function templates()
    {

        if (!$this->ion_auth->logged_in())
        {
            // redirect them to the login page
            redirect('index.php/auth/login', 'refresh');
        }

        $this->load->view('common/header');
        $this->load->view('letters/templates');
        $this->load->view('common/footer');
    }

    public function ajax_list()
    {
        $this->load->library('datatables');
        $this->datatables->select("id,title,subject,created,modified", FALSE);
        $this->datatables->from('hr_pay_letter_templates');
        $this->datatables->add_column("Actions",
            "<a href='javascript:' class=' btn tbl-action' style='padding:4px' title='Edit PO' onclick='edit_template(".'$1'.")'>
                <i class='fa fa-edit'></i>
            </a>
           ", "id");
        echo $this->datatables->generate();
    }

    public function ajax_list_gen_letters()
    {
        $this->load->library('datatables');
        $this->datatables->select("id,employee,letter_type,created", FALSE);
        $this->datatables->from('hr_pay_letter_gen');
        $this->datatables->add_column("Actions",
            "<a href='javascript:' class='btn tbl-action' style='padding:4px' title='Edit PO' onclick='view_letter(".'$1'.")'>
                <i class='fa fa-print'></i>
            </a>
            <a href='javascript:' class='btn tbl-action' style='padding:4px' title='Edit PO' onclick='email_letter(".'$1'.")'>
                <i class='fa fa-envelope-o'></i>
            </a>
           ", "id");
        echo $this->datatables->generate();
    }

    public function save_template($method)
    {

            //$this->form_validation->set_rules('date', 'date', 'required|trim');
        if($method == "add") {
            $this->form_validation->set_rules('title', 'title', 'required|trim|max_length[20]|is_unique[hr_pay_letter_templates.title]');
        } else {
            $this->form_validation->set_rules('title', 'title', 'required|trim|max_length[20]');
        }
            if($this->form_validation->run()===FALSE)
            {
                $data = array();
                $data['error_string'] = array();
                $data['inputerror'] = array();
                $data['status'] = FALSE;
                $data['error'] = "validation_error";
                if (form_error('title'))
                {
                    $data['inputerror'][] = 'title';
                    $data['error_string'][] = form_error('title');
                }
                if (form_error('subject'))
                {
                    $data['inputerror'][] = 'subject';
                    $data['error_string'][] = form_error('subject');
                }
                if (form_error('content'))
                {
                    $data['inputerror'][] = 'content';
                    $data['error_string'][] = form_error('content');
                }

                echo json_encode($data);
                exit;
            }

        $id = null;
        $message = null;
        $details = $this->input->post();

        $data_main['title']=$details['title'];
        $data_main['subject']=$details['subject'];
        $data_main['content']=$details['content'];

        if($method == "add") {
            $data_main['created']=date('Y-m-d H:i:s');
            if ($id = $this->db->insert('hr_pay_letter_templates', $data_main)) {
                $message = 'New Template  Added - # : ' . $id;
            }
        } elseif ($method == "edit"){
            $tid = $details['template_id'];
            $data_main['modified']=date('Y-m-d H:i:s');
            $this->db->where('id',$tid);
            if ($id = $this->db->update('hr_pay_letter_templates', $data_main)) {
                $message = 'Template Edited- # : ' . $tid;
            }
        }

        if(!empty($id) && $id >0)
        {
            echo json_encode(array(
                'status' => true,
                'message' => $message
            ));
            exit;
        }
        else
        {
            echo json_encode(array(
                'status' => false,
                'message' => 'Unable to save! Try again.',
            ));
            exit;
        }
    }//end


    public function ajax_get_template_details_by_id()
    {
        $id = $this->input->post('template_id');
        if(empty($id))
        {
            echo json_encode(array(
                'status' => false,
                'message' => "Unable to get data. ID invalid."
            ));
        }

        $template_data = $this->letters_mod->get_template_details_by_id($id);

        echo json_encode(array(
            'status' => true,
            'template_data' => $template_data,
        ));
        exit;
    }


    public function gen_letters()
    {
        if (!$this->ion_auth->logged_in())
        {
            // redirect them to the login page
            redirect('index.php/auth/login', 'refresh');
        }
        $data['templates'] =  $this->letters_mod->get_all_templates();
        $data['employees'] =  $this->letters_mod->get_all_acc_numbers();

        $this->load->view('common/header');
        $this->load->view('letters/preview',$data);
        $this->load->view('common/footer');
    }

    public function view_tempalte_with_acc_no()
    {
            $details = $this->input->post();
            $employee = $details['employee'];
            $tid = $details['template'];

            $data= $this->letters_mod->get_employee_details_by_id($employee);
            $template_data= $this->letters_mod->get_template_details_by_id($tid);

            if($data->first_name!=""){
                /*print_r($bill_data);
                die();*/
                function replace_tags($template, $placeholders){
                    $placeholders = array_merge($placeholders, array('<?php'=>'', '?>'=>''));
                    return str_replace(array_keys($placeholders), $placeholders, $template);
                }
                $vars = array(
                    '[EMPLOYEE_ID]'=>$data->employee_id,
                    '[EPF_NO]'=>$data->epf_no,
                    '[TITLE]'=>$data->title,
                    '[INITIALS]'=>$data->initials,
                    '[FIRST_NAME]'=>$data->first_name,
                    '[MIDDLE_NAME]'=>$data->middle_name,
                    '[LAST_NAME]'=>$data->last_name,
                    '[BIRTHDAY]'=>$data->birthday,
                    '[GENDER]'=>$data->gender,
                    '[MARITAL_STATUS]'=>$data->marital_status,
                    '[NIC_NUM]'=>$data->nic_num,
                    '[DRIVING_LICENSE]'=>$data->driving_license,
                    '[OTHER_ID]'=>$data->other_id,
                    '[BLOOD_GROUP]'=>$data->blood_group,
                    '[PERMANENT_ADDRESS]'=>$data->permanent_address,
                    '[POSTAL_ADDRESS]'=>$data->postal_address,
                    '[POSTAL_CODE]'=>$data->postal_code,
                    '[MOBILE_PHONE]'=>$data->mobile_phone,
                    '[MOBILE_PHONE_2]'=>$data->mobile_phone_2,
                    '[HOME_PHONE]'=>$data->home_phone,
                    '[OFFICE_PHONE]'=>$data->office_phone,
                    '[PERSONAL_EMAIL]'=>$data->personal_email,
                    '[OFFICE_EMAIL]'=>$data->office_email,
                    '[BASIC_SALARY]'=>$data->basic_salary,
                    '[JOINED_DATE]'=>$data->joined_date,
                    '[CONFIRMED_DATE]'=>$data->confirmed_date,
                    '[TERMINATION_DATE]'=>$data->termination_date
                );

                $template = $template_data->content;

                $preview_data = replace_tags($template, $vars);
                echo json_encode(array(
                    'status' => true,
                    'template_id' => $template_data->id,
                    'template_name' => $template_data->title,
                    'employee_id' => $data->id,
                    'employee_name' => $data->first_name." ".$data->last_name,
                    'preview_data' => $preview_data,
                ));
                //$this->load->view('preview/preview_mail',$data,false);
            }
    }


    public function save_gen_letter()
    {
        $id = null;
        $message = null;
        $details = $this->input->post();

        $data_main['employee']=$details['employee_id'];
        $data_main['letter_type']=$details['letter_type'];
        $data_main['content']=$details['content'];

        if ($id = $this->db->insert('hr_pay_letter_gen', $data_main)) {
            $message = 'Letter Generated';
        }

        if(!empty($id) && $id >0)
        {
            echo json_encode(array(
                'status' => true,
                'message' => $message
            ));
            exit;
        }
        else
        {
            echo json_encode(array(
                'status' => false,
                'message' => 'Unable to save! Try again.',
            ));
            exit;
        }
    }//end


    public function ajax_view_gen_saved_letter_by_id()
    {
        $id = $this->input->post('letter_id');
        if(empty($id))
        {
            echo json_encode(array(
                'status' => false,
                'message' => "Unable to get data. ID invalid."
            ));
        }
        $letter_data = $this->letters_mod->get_gen_letter_details_by_id($id);
        echo json_encode(array(
            'status' => true,
            'letter_data' => $letter_data->content,
        ));
        exit;
    }


    public function ajax_email_gen_saved_letter_by_id()
    {
        $id = $this->input->post('letter_id');
        if(empty($id))
        {
            echo json_encode(array(
                'status' => false,
                'message' => "Unable to get data. ID invalid."
            ));
        }
        $letter_data = $this->letters_mod->get_gen_letter_details_by_id($id);
        $where= array(
            'hr_pay_employees.id' => $letter_data->employee,
        );
        if($emp_data =  $this->letters_mod->get_employee_data_for_email($where)){
            $data = array(
                'baseurl'	=> base_url(),
                'employee_name'	=> $emp_data->employee_name,
                'employee_id'	=> $emp_data->employee_id,
                'letter_content'	=> $letter_data->content,
            );
            $message = $this->load->view($this->config->item('email_templates', 'ion_auth').$this->config->item('hr_letter_mail', 'ion_auth'), $data, true);
            $this->email->clear();
            $this->email->from($this->config->item('admin_email', 'ion_auth'), $this->config->item('site_title', 'ion_auth'));
            $this->email->to($emp_data->emp_email);
            $this->email->subject("Arrow HRMS - Letter - ");
            $this->email->set_mailtype("html");
            $this->email->message($message);

            if ($this->email->send()) {
                $message = 'Email sent to '.$emp_data->employee_name." Employee #".$emp_data->employee_id;
                echo json_encode(array(
                    'status' => true,
                    'letter_data' => $message,
                ));
                exit;
            }
        }




    }
    //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    //END Template GEN
    //***********************************



    //***********************************
    //SEND BILLS
    //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~


    public function send_reminders()
    {

        if (!$this->ion_auth->logged_in())
        {
            // redirect them to the login page
            redirect('index.php/auth/login', 'refresh');
        }

        $data['user_data'] = $this->letters_mod->get_user_details();
        $data['templates'] =  $this->letters_mod->get_all_templates();

        $this->load->view('common/header');
        $this->load->view('send/send_reminders',$data);
        $this->load->view('common/footer');
    }

    public function send_reminders_fg()
    {
        $details = $this->input->post();
        $tid = $details['template'];

        if ($tid !="") {

            exec("/usr/bin/php -f /var/www/html/e_reminder/index.php admin start_send_process_bg {$tid} &");
            sleep(2);
            //$this->start_send_process_bg($tid);
            echo json_encode(array(
                'status' => true,
                'message' => "eReminders Dispatch Started"
            ));
            exit();
        } else {
            $this->session->set_userdata('error_msg', "Error No template Selected");
            redirect('admin/send_reminders', 'refresh');
        }
    }


    public function start_send_process_bg($tid)
    {
        /*$details = $this->input->post();
        $tid = $details['template'];*/
        //$tid = 1;
        if ($tid != "") {
            $template_data= $this->letters_mod->get_template_details_by_id($tid);
            $reminder_dispatch_data = $this->letters_mod->get_all_acc_numbers();

            $i =0;
            $this->load->library('email');
            $this->letters_mod->lock_run_status_user_details();

            function replace_tags($template, $placeholders){
                $placeholders = array_merge($placeholders, array('<?php'=>'', '?>'=>''));
                return str_replace(array_keys($placeholders), $placeholders, $template);
            }
            foreach ($reminder_dispatch_data as $er_data) {
                if($er_data->email!=""){
                    $vars = array(
                        '[MOBILE_NO]'=>$er_data->contact_no,
                        '[TOTAL_CREDIT_LIMIT]'=>$er_data->c_limit,
                        '[PROPOSED_LIMIT]'=>$er_data->p_limit,
                        '[EFFECTIVE_DATE]'=>$er_data->effect_date,
                        '[GET_BACK_DATE]'=>$er_data->back_to_date,
                        '[CONTRACT_ID]'=>$er_data->contract_id,
                        '[OUTSTANDING_AMOUNT]'=>$er_data->outstanding_amount,
                        '[UPLOAD_DATE]'=>$er_data->upload_date,
                        '[DUE_DATE]'=>$er_data->due_date,
                        '[CURRENT_STATUS_DATE]'=>$er_data->current_status_date,
                        '[SUB_PROVIDER]'=>$er_data->sub_provider,
                        '[EXTRA_1]'=>$er_data->extra_1,
                        '[EXTRA_2]'=>$er_data->extra_2,
                        '[EXTRA_3]'=>$er_data->extra_3,
                        '[EXTRA_4]'=>$er_data->extra_4,
                        '[EXTRA_5]'=>$er_data->extra_5
                    );
                    $template = $template_data->content;
                    $preview_data = replace_tags($template, $vars);

                    $this->email
                        ->from('DialogCreditManagement@dialog.lk', 'Dialog Credit Management')
                        ->reply_to('DialogCreditManagement@dialog.lk', 'Dialog Credit Management')    // Optional, an account where a human being reads.
                        ->to($er_data->email)
                        ->subject($template_data->subject)
                        ->message($preview_data)
                        // ->attach($ab_path.'uploads/pdfs/'.$bill_run_data->year.'/'.$bill_run_data->month.'/'.$bill_run_data->bill_run.'/'.$pdf, 'attachment', $pdf)
                        ->send();

                    /*$now = new DateTime();
                    $now_time = $now->format('Y-m-d H:i:s');*/
                    /*$lcount = ++$counter;
                    $qur="UPDATE MsgCountEbill SET lcount = $lcount WHERE msgid = 'ebill'";
                    mysql_query($qur) or die(mysql_error());*/

                    $reminder_run_email_log = array(
                        "acc_number" => $er_data->contact_no,
                        "email" => $er_data->email,
                        "template_id" => $template_data->id,
                        "status" => 1
                    );
                    $this->db->insert('reminder_run_email_log',$reminder_run_email_log);

                    $i++;
                    unset($reminder_run_email_log);
                    $this->email->clear(TRUE);
                }
                sleep(2);
            }

            $reminder_run_log = array(
                "subject" => $template_data->subject,
                "body" => $template_data->content,
                "msg_count" => $i,
                "template_ref_id" => $template_data->id,
                "status" => 1
            );
            $this->db->insert('reminder_run_log',$reminder_run_log);
            unset($reminder_run_log);
            $this->letters_mod->unlock_run_status_user_details();
            /*$this->db->query("TRUNCATE TABLE `bill_dispatch_data`");*/

            echo json_encode(array(
                'status' => true,
                'message' => "eReminders Dispatch Completed"
            ));
            exit;
            //redirect(site_url('admin/bill_pdf_gen_done'));
        } else {
            echo "No Template Selected";
        }
    }


    public function send_process()
    {

        if (!$this->ion_auth->logged_in())
        {
            // redirect them to the login page
            redirect('index.php/auth/login', 'refresh');
        }

        $this->load->view('common/header');
        $this->load->view('send/send_processing');
        $this->load->view('common/footer');
    }

    public function send_status()
    {

        if (!$this->ion_auth->logged_in())
        {
            // redirect them to the login page
            redirect('index.php/auth/login', 'refresh');
        }

        $this->load->view('common/header');
        $this->load->view('send/send_done');
        $this->load->view('common/footer');
    }

    //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    //END SEND BILLS
    //************************************


    //***********************************
    //Reports
    //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    /*public function report_upload_csv_stats()
    {

        if (!$this->ion_auth->logged_in())
        {
            // redirect them to the login page
            redirect('index.php/auth/login', 'refresh');
        }
        elseif (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
        {
            // redirect them to the home page because they must be an administrator to view this
            return show_error('You must be an administrator to view this page.');
        }
        else {
            $crud = new grocery_CRUD();

            $crud->set_table('bill_dispatch_upload_files');
            $crud->display_as('name','CSV file name');
            $crud->display_as('row_count','Records');
            $crud->display_as('date','Upload Date');
            $crud->unset_add();
            $crud->unset_edit();
            $crud->unset_delete();
            $crud->unset_read();

            $crud->unset_columns(array('posting'));
            $crud->set_subject('Report - Upload CSV data');

            $output = $crud->render();
            $this->load->view('common/header');
            $this->_master_output($output);
            $this->load->view('common/footer');
        }

    }*/


    /*public function report_bill_run_stats()
    {

        if (!$this->ion_auth->logged_in())
        {
            // redirect them to the login page
            redirect('index.php/auth/login', 'refresh');
        }
        elseif (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
        {
            // redirect them to the home page because they must be an administrator to view this
            return show_error('You must be an administrator to view this page.');
        }
        else {
            $crud = new grocery_CRUD();

            $crud->set_table('bill_run_log');
            $crud->set_relation('pdf_ref_id','bill_pdf_gen_info','pdf_count');
            //$crud->display_as('name','CSV file name');
            $crud->unset_add();
            $crud->unset_edit();
            $crud->unset_delete();
            //$crud->unset_read();

            $crud->unset_columns(array('status','complete_path'));
            $crud->set_subject('Report - Bill Run Stats');

            $output = $crud->render();
            $this->load->view('common/header');
            $this->_master_output($output);
            $this->load->view('common/footer');
        }

    }*/

    //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    //END Reports
    //************************************


}
