<?php
/**
 * Created by PhpStorm.
 * User: S.Priyadarshan
 * Date: 08-Jul-16
 * Time: 09:06 AM
 */
// Created by

class Leave_management_con extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library('ion_auth');

        // check if user logged in
        if (!$this->ion_auth->logged_in()) {
            redirect('index.php/auth/login');
        }
//        $this->permissions->check_permission('access');

//        error_reporting(-1);
//        ini_set('display_errors', 1);

        $this->load->database();
        $this->load->model('leave_settings_mod');
        $this->load->model('employee_list_model');
        $this->load->model('leave_management_mod');
        date_default_timezone_set("Asia/Colombo");
        $this->currentTime = date('Y-m-d H:i:s');

        $this->load->library('permissions');
        $this->load->library('system_log');
    }

    public function index()
    {
        $this->permissions->check_permission('access');

        $data = '';
        $groups = array('admin', 'hr_manager');
        $groups_emp = array('employee_user');


        if ($this->ion_auth->in_group($groups)) {
            $data['employees'] = $this->leave_management_mod->getAllEmployeesWhere();
        } else {
            $where = array(
                'supervisor' => USER_ID
            );
            $data['employees'] = $this->leave_management_mod->getAllEmployeesWhere($where);
        }

        $this->load->view('common/header');
        $this->load->view('leave/leave_management', $data);
        $this->load->view('common/footer');

    }

    public function ajax_list_all_leaves_full()
    {

        $dt = 0;
        $groups = array('admin', 'hr_manager');
        if ($this->ion_auth->in_group($groups)) {
            $dt = 1;
        }

        $this->load->library('datatables');
        $this->datatables->select("hr_pay_leave_applications.id as leave_application_id,
                                hr_pay_employees.first_name,
                                hr_pay_employees.last_name,
                                hr_pay_employees.employee_id,                               
                                hr_pay_leave_types.leave_type_name,
                                hr_pay_leave_applications.start_date,
                                hr_pay_leave_applications.end_date,
                                SUM(CASE WHEN leave_day_type = 'Full Day' THEN 1 ELSE 0.5 END) as Days,
                                hr_pay_leave_applications.leave_reason,
                                hr_pay_leave_applications.status,hr_pay_leave_applications.reason", FALSE);
        $this->datatables->from('hr_pay_leave_applications');
        $this->datatables->join('hr_pay_leave_types', 'hr_pay_leave_applications.leave_type=hr_pay_leave_types.leave_type_id', 'left');
        $this->datatables->join('hr_pay_leave_days', 'hr_pay_leave_applications.id=hr_pay_leave_days.leave_application', 'left');
        $this->datatables->join('hr_pay_employees', 'hr_pay_leave_applications.employee=hr_pay_employees.id', 'left');

        if ($dt == 0) {
            $this->datatables->where('hr_pay_employees.supervisor', USER_ID);
        }

        $this->datatables->group_by("hr_pay_leave_applications.id");
        $actions = "<a class='btn btn-default' href='javascript:;' title='Show Leave Days' onclick='show_leave_days(" . '$1' . ")'><i class='fa fa-eye'></i> Show Leave Days </a>";
        $actions .= "<a class='btn btn-default' href='javascript:;' title='Approve Leave or Change Leave Status' onclick='change_leave_status(" . '$1' . ")'><i class='fa fa-edit'></i> Change Leave Status</a>";

        $this->datatables->add_column("Actions", $actions, "leave_application_id");

        echo $this->datatables->generate();
    }

    public function ajax_list_all_leaves_pending()
    {

        $dt = 0;
        $groups = array('admin', 'hr_manager');
        if ($this->ion_auth->in_group($groups)) {
            $dt = 1;
        }

        $this->load->library('datatables');
        $this->datatables->select("hr_pay_leave_applications.id as leave_application_id,
                                hr_pay_employees.first_name,
                                hr_pay_employees.last_name,
                                hr_pay_employees.employee_id,
                                hr_pay_leave_applications.leave_reason,
                                hr_pay_leave_types.leave_type_name,
                                hr_pay_leave_applications.start_date,
                                hr_pay_leave_applications.end_date,
                                SUM(CASE WHEN leave_day_type = 'Full Day' THEN 1 ELSE 0.5 END) as Days,
                                hr_pay_leave_applications.status, hr_pay_leave_applications.reason", FALSE);
        $this->datatables->from('hr_pay_leave_applications');
        $this->datatables->join('hr_pay_leave_types', 'hr_pay_leave_applications.leave_type=hr_pay_leave_types.leave_type_id', 'left');
        $this->datatables->join('hr_pay_leave_days', 'hr_pay_leave_applications.id=hr_pay_leave_days.leave_application', 'left');
        $this->datatables->join('hr_pay_employees', 'hr_pay_leave_applications.employee=hr_pay_employees.id', 'left');

        if ($dt == 0) {
            $this->datatables->where('hr_pay_employees.supervisor', USER_ID);
        }

        $this->datatables->where('hr_pay_leave_applications.status', "Pending");

        $this->datatables->group_by("hr_pay_leave_applications.id");
        $actions = "<a class='btn btn-default' href='javascript:;' title='Show Leave Days' onclick='show_leave_days(" . '$1' . ")'><i class='fa fa-eye'></i> Show Leave Days </a>";
        $actions .= "<a class='btn btn-default' href='javascript:;' title='Approve Leave or Change Leave Status' onclick='change_leave_status(" . '$1' . ")'><i class='fa fa-edit'></i> Change Leave Status</a>";

        $this->datatables->add_column("Actions", $actions, "leave_application_id");
        //$this->datatables->unset_column("leave_application_id");
        echo $this->datatables->generate();
    }

    public function ajax_list_all_leaves_completed()
    {

        $dt = 0;
        $groups = array('admin', 'hr_manager');
        if ($this->ion_auth->in_group($groups)) {
            $dt = 1;
        }

        $this->load->library('datatables');
        $this->datatables->select("hr_pay_leave_applications.id as leave_application_id,
                                 hr_pay_employees.first_name,
                                hr_pay_employees.last_name,
                                hr_pay_employees.employee_id,
                                hr_pay_leave_applications.leave_reason, 
                                hr_pay_leave_types.leave_type_name,
                                hr_pay_leave_applications.start_date,
                                hr_pay_leave_applications.end_date,
                                SUM(CASE WHEN leave_day_type = 'Full Day' THEN 1 ELSE 0.5 END) as Days,
                                hr_pay_leave_applications.reason,
                                hr_pay_leave_applications.status,
                                hpe.first_name as app_person", FALSE);
        $this->datatables->from('hr_pay_leave_applications');
        $this->datatables->join('hr_pay_leave_types', 'hr_pay_leave_applications.leave_type=hr_pay_leave_types.leave_type_id', 'left');
        $this->datatables->join('hr_pay_leave_days', 'hr_pay_leave_applications.id=hr_pay_leave_days.leave_application', 'left');
        $this->datatables->join('hr_pay_employees', 'hr_pay_leave_applications.employee=hr_pay_employees.id', 'left');
//        $this->datatables->join('hr_pay_leave_log', 'hr_pay_leave_applications.id=hr_pay_leave_log.leave_application', 'left outer join');
        $this->datatables->join('hr_pay_employees as hpe', 'hr_pay_leave_applications.approve_user=hpe.id', 'left');
//        $this->datatables->where('hr_pay_leave_applications.status=hr_pay_leave_log.status_to');

        if ($dt == 0) {
            $this->datatables->where('hr_pay_employees.supervisor', USER_ID);
        }

        //$this->datatables->where('hr_pay_leave_applications.status !=',"Pending");

        $this->datatables->group_by("hr_pay_leave_applications.id");
        $actions = "<a class='btn btn-default' href='javascript:;' title='Show Leave Days' onclick='show_leave_days(" . '$1' . ")'><i class='fa fa-eye'></i> Show Leave Days </a>";
        $actions .= "<a class='btn btn-default' href='javascript:;' title='Approve Leave or Change Leave Status' onclick='change_leave_status(" . '$1' . ")'><i class='fa fa-edit'></i> Change Leave Status</a>";

        $this->datatables->add_column("Actions", $actions, "leave_application_id");
        //$this->datatables->unset_column("leave_application_id");
        echo $this->datatables->generate();
    }

    public function load_leave_type_list()
    {
        //TODO ~~~~~Techpack~~only

        $emp_id = $this->input->post('emp_id');
        $emp_details = $this->leave_management_mod->get_emp_details($emp_id);
        $data = $this->leave_management_mod->getLeaveTypes($emp_details->gender, $emp_details->marital_status);
        //TODO ~~~~~Techpack~~only

        //TODO ~~~~~Common~~~~~~~~~~~
//        $data = $this->leave_management_mod->getLeaveTypes();
        //TODO ~~~~~Common~~~~~~~~~~~
        $dts = array();

        foreach ($data->result() as $dt) {
            $dts[$dt->leave_type_id] = $dt->leave_type_name;
        }
        echo json_encode($dts);
    }

    public function load_all_employess()
    {
        $data = $this->leave_management_mod->get_employess();
        $dts = array();

        foreach ($data->result() as $dt) {
            $dts[$dt->id] = $dt->employee_id . " - " . $dt->name;
        }
        echo json_encode($dts);
    }

    public function ajax_get_leave_application($for)
    {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }

        $where = array(
            'hr_pay_leave_applications.id' => $for
        );
        $leave_application_data = $this->leave_management_mod->get_leave_applications($where);
        echo json_encode($leave_application_data->row());
    }

    //.............. Leave Application Process - Start .....................//
    public function ajax_apply_leave()
    {


        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }
        $required_data = array(
            'leave_type',
            'start_date',
            'end_date',
            'leave_reason'
        );
        /*if($this->input->post('applicant') != 'employee') // To check who applies leave
        {
            $required_data[] = 'employee';
        }*/
        $this->_validate_required($required_data);

        $leave_type_id = $this->input->post('leave_type');
        $leave_start_date = $this->input->post('start_date');
        $leave_end_date = $this->input->post('end_date');
        $leave_reason = $this->input->post('leave_reason');
        $leave_day_types = json_decode($this->input->post('leave_day_types'), true);
        $leave_employee_id = $this->input->post('employee_name');
        //$leave_employee_id = empty($leave_employee_id) ? $this->ion_auth->user()->row()->id : $leave_employee_id;
        $country = "Sri Lanka"; //TODO: Country should not be hardcoded. Make it dynamic to allow any country.
        $work_week = $this->leave_settings_mod->get_work_week(array('hr_pay_m_country.name' => $country));
        $emp_data = $this->leave_settings_mod->getSingleEmployeeData($leave_employee_id);
//      if (!$this->ion_auth->in_group(999, $leave_employee_id))
//        {
//            echo json_encode(array(
//                'status' => false,
//                "eligibility_error" => "Sorry! Leaves can be applied only to Employees."
//            ));
//            exit;
//        }
        //JE-2018-12-12 for Leave rule work
        $where_rules = array(
            'leave_type_id' => $leave_type_id,
            'employee_category' => $emp_data->emp_category,
            'employment_status' => $emp_data->emp_status,
            'leave_act' => ($emp_data->leave_category==1)?'Shop and Office':'Wages Board'
        );

        //employee joined date
        $emp_joined_date = $emp_data->joined_date;
        $confirmed = $emp_data->confirmed_date;

        //check if have leave rule or added default leave type
        if($leave_rule_type_details = $this->leave_settings_mod->get_leave_rule($where_rules)->row()) {

            //With Leave Rule
            $leave_type_details = $leave_rule_type_details;

            if($leave_type_details->propotionate_on_joined_date == "Yes") {
                //check employee joined date in current year
                if(date('Y') == date('Y',strtotime($emp_joined_date))){
                    $period_start = $emp_joined_date;
                    $period_end = date('Y').'-12-31';
                }
                else{
                    $period_start = date('Y').'-01-01';
                    $period_end = date('Y').'-12-31';
                }
            }else{
                $period_start = date('Y').'-01-01';
                $period_end = date('Y').'-12-31';
            }

        }else {
            //Data Without Rule
            $leave_type_details = $this->leave_settings_mod->get_leave_type(array('hr_pay_leave_types.leave_type_id' => $leave_type_id))->row();
            $q1 = $this->db->query("SELECT * FROM hr_pay_leave_periods WHERE ('$leave_start_date' between period_start and period_end) or  ('$leave_end_date' between period_start and period_end)");
            if ($q1->num_rows() == 0) {
                echo json_encode(array("status" => FALSE, "eligibility_error" => "Need to assign leave period for current year."));
                exit;
            }
            //check leave applying date between leave period eg:- 2019-01-01 and 2019-12-31 leave period
            $leave_period_of_leave_start_day = $this->leave_settings_mod->get_leave_period(array('period_start <=' => $leave_start_date, 'period_end >=' => $leave_start_date), "month")->row();
            $leave_period_of_leave_end_day = $this->leave_settings_mod->get_leave_period(array('period_start <=' => $leave_end_date, 'period_end >=' => $leave_end_date))->row();
            if ($leave_period_of_leave_start_day->period_id != $leave_period_of_leave_end_day->period_id) {
                // Due to time restrictions, leave application is restricted to a single leave period.
                echo json_encode(array(
                    "status" => FALSE,
                    "eligibility_error" => "It is not possible to apply leaves in two leave periods. <br> You may apply leaves till $leave_period_of_leave_start_day->period_end. Rest you have to apply separately."
                ));
                exit;
            }
            $period_start = $leave_period_of_leave_start_day->period_start;
            $period_end = $leave_period_of_leave_start_day->period_end;
        }

        if ($leave_start_date > $leave_end_date) {
            $data = array();
            $data['inputerror'][] = 'end_date';
            $data['error_string'][] = 'Selected date range is invalid.';
            $data['status'] = FALSE;
            echo json_encode($data);
            exit;
        }

        if ($leave_type_id == 1 && ((int)date_diff(date_create($leave_end_date), date_create($leave_start_date))->format("%a") + 1 > 2) && !$_FILES["file"]['name']) {
            echo json_encode(array(
                "status" => FALSE,
                "inputerror" => array("attachment"),
                "error_string" => array("For Medical-Leave, if the number of leave days is more than 2 days, you are required to attach medical certificate.")
            ));
            exit;
        }

        //TODO~~############~~kreston~~~only~~~please~comment~other~projects~~~~~~~~~~~~~
//        $attachment = $this->leave_management_mod->check_attachment_status($leave_type_id);

//        if ($attachment->attach_document == "YES" && !$_FILES["file"]['name']){
//            echo json_encode(array(
//                "status" => FALSE,
//                "inputerror" => array("attachment"),
//                "error_string" => array("Proof Document Should be attached for " . $attachment->leave_type_name)
//            ));
//            exit;
//        }
        //TODO~~############~~kreston~~~only~~~please~comment~other~projects~~~~~~~~~~~~~

        $where = "employee = '$leave_employee_id' AND
                (hr_pay_leave_applications.start_date <= CAST('$leave_end_date' AS DATE) AND hr_pay_leave_applications.end_date >= CAST('$leave_start_date' AS DATE)) AND
                (hr_pay_leave_applications.status <> 'Cancelled')";
        $overlapping_leave_days = $this->leave_management_mod->count_leave_applications($where)->row();
        if ($overlapping_leave_days->leave_application_count > 0) {
            echo json_encode(array(
                "status" => FALSE,
                "eligibility_error" => "The selected leave period is overlapping with another leave you have already applied which might be approved or rejected or still pending. <br> Please check your leave history."
            ));
            exit;
        }

        $holiday = $this->leave_settings_mod->get_holiday(array('date >=' => $leave_start_date, 'date <=' => $leave_end_date, 'hr_pay_m_country.name' => $country));

        $diff = date_diff(date_create($leave_start_date), date_create($leave_end_date), TRUE);

        if(empty($leave_day_types)) {
            $date_obj = date_create($leave_start_date);
            $date_info = array();
            for ($i = 1; $i <= (int)$diff->format('%a') + 1; $i++) {
                if ($i != 1){
                    date_add($date_obj, date_interval_create_from_date_string("1 day"));
                }
                $date = date_format($date_obj, "Y-m-d");
                $day_name = date_format($date_obj, "l");

                $date_arr = array(
                    'date' => $date,
                    'day_name' => $day_name,
                    'day_status' => '',
                    'holiday' => FALSE,
                    'holiday_name' => ''
                );

                foreach ($work_week->result() as $work_week_result) {
                    if ($work_week_result->day == $day_name){
                        $date_arr['day_status'] = $work_week_result->status;
                    }
                }

                foreach ($holiday->result() as $holiday_result) {

                    if($holiday_result->date == $date) {

                        $date_arr['holiday'] = TRUE;
                        $date_arr['holiday_name'] = $holiday_result->holiday_name;
                        if ($holiday_result->status == "Full Day") {
                            $date_arr['day_status'] = "Holiday";
                        } elseif ($holiday_result->status == "Half Day") {
                            $date_arr['day_status'] = "Half Day - Holiday";
                        }
                    }
                }
                array_push($date_info, $date_arr);
            }

            echo json_encode(array("result" => $date_info));
            exit;
        }

        $total_new_leave_count = 0;
        //todo teckpack only
        $total_count = array();
        //todo teckpack only
        foreach ($leave_day_types as $leave_days) {
            if ($leave_days['value'] == "Full Day") {
                $total_new_leave_count += 1;
                //todo teckpack only
                $total_count[]=1;
                //todo teckpack only
            } elseif ($leave_days['value'] == "Half Day - Morning" || $leave_days['value'] == "Half Day - Afternoon" || $leave_days['value'] == "Half Day - Holiday") {
                $total_new_leave_count += 0.5;
                //todo teckpack only
                $total_count[]=0.5;
                //todo teckpack only
            } else {
                $total_new_leave_count += 0;
            }
        }

//TODO~~############~~kreston~~only~~not~use~for~common~~~~~~~~~~~~~~~~~~~~~~~vkc~de~mel~~~~~~~~~~~~~~
        //Leave settings for Permanent & Branch Staff / Out Audit Staff Entitlement need to be linked to Date of joined
        $emp = $this->leave_management_mod->get_employee_info($leave_employee_id);
        $previous_year=date('Y',strtotime($period_start))- 1;
        $joined_year = date('Y',strtotime($emp_joined_date));
        $confirmed_year = date('Y',strtotime($confirmed));

        if($leave_rule_type_details) {
            if($emp->leave_category==1){
            if ($leave_type_details->leave_accrue == "Yes" && $leave_type_details->propotionate_on_joined_date == "Yes") {
//                $remaining_month=date('m',strtotime($period_end)) - date('m',strtotime($period_start));
//                $leaves_entitled_per_month = ($leave_type_details->leaves_per_period / 12)*$remaining_month;

                $leave_month_arr = array();
                $prev = null;
                foreach ($leave_day_types as $leave_days) {
                    if (date_format(date_create($leave_days['name']), "m") !== $prev) {
                        $leave_month_arr[] = date_format(date_create($leave_days['name']), "m");
                    }
                    $prev = date_format(date_create($leave_days['name']), "m");
                }
                if ($leave_type_id != 8) {

                    $where = "employee = '$leave_employee_id' AND
                        leave_type = '$leave_type_id' AND
                        (start_date BETWEEN CAST('$period_start' AS DATE) AND CAST('$period_end' AS DATE)) AND
                (hr_pay_leave_applications.status <> 'Cancelled' AND hr_pay_leave_applications.status <> 'Rejected')";

                    $leave_application_details = $this->leave_management_mod->get_leave_applications($where)->result();
                    $total_existing_leave_count = 0;
                    foreach ($leave_application_details as $leave_application) {
                        $where = array("leave_application" => $leave_application->leave_application_id);
                        $groupby = "leave_day_type";
                        $leave_day_count = $this->leave_management_mod->count_leave_days($where, $groupby)->result();
                        foreach ($leave_day_count as $leave_count) {
                            if ($leave_count->leave_day_type == "Full Day") {
                                $total_existing_leave_count += $leave_count->leave_day_count * 1;
                            } elseif (preg_match("/^Half Day/", $leave_count->leave_day_type)) {
                                $total_existing_leave_count += $leave_count->leave_day_count * 0.5;
                            } else {
                                $total_existing_leave_count += 0;
                            }
                        }
                    }
                    $avail_leave_bal = $leave_type_details->leaves_per_period - $total_existing_leave_count;

                } else {

                    $dateeee = date('Y-m-d', strtotime('first day of january this year'));
                    $ldata = $this->leave_settings_mod->get_leave_period_data($dateeee);

                    $leave_period_of_leave_start_day = $this->leave_settings_mod->get_leave_period(array('period_start <=' => $ldata->period_start, 'period_end >=' => $ldata->period_end), "month")->row();

                    $leave_period = $leave_period_of_leave_start_day;
                    $avail_leave_bal = $this->leave_management_mod->get_liu_leave_count($leave_employee_id, $leave_period->period_start, $leave_period->period_end)->liu;
                    $total_existing_leave_count = $avail_leave_bal;
                }

                $total_new_leave_count = 0;
                //todo teckpack only
                $total_count = array();
                //todo teckpack only
                foreach ($leave_day_types as $leave_days) {
                    if ($leave_days['value'] == "Full Day") {
                        $total_new_leave_count += 1;
                        //todo teckpack only
                        $total_count[] = 1;
                        //todo teckpack only
                    } elseif ($leave_days['value'] == "Half Day - Morning" || $leave_days['value'] == "Half Day - Afternoon" || $leave_days['value'] == "Half Day - Holiday") {
                        $total_new_leave_count += 0.5;
                        //todo teckpack only
                        $total_count[] = 0.5;
                        //todo teckpack only
                    } else {
                        $total_new_leave_count += 0;
                    }
                }
                //echo json_encode((date('z', date_create('2016-07-01')->getTimestamp()) + 1) / (date('z', date_create('2016-12-31')->getTimestamp()) + 1));exit;


                if ($avail_leave_bal < $total_new_leave_count) {
                    $error_message = "You are trying to apply $total_new_leave_count day(s) of $leave_type_details->leave_type_name leave. <br>
                                      But, this employee's available balance of $leave_type_details->leave_type_name leave in this period is only $avail_leave_bal day(s).";

                    echo json_encode(array(
                        "status" => FALSE,
                        "eligibility_error" => $error_message
                    ));
                    exit;
                }
            } elseif ($leave_type_details->leave_accrue == "Yes" && $leave_type_details->propotionate_on_joined_date == "No") {

                $where = "employee = '$leave_employee_id' AND
                        leave_type = '$leave_type_id' AND
                        (start_date BETWEEN CAST('$period_start' AS DATE) AND CAST('$period_end' AS DATE)) AND
                (hr_pay_leave_applications.status <> 'Cancelled' AND hr_pay_leave_applications.status <> 'Rejected')";

                $leave_application1 = $this->leave_management_mod->get_leave_applications($where)->result();
                $total_existing_leave1 = 0;
                foreach ($leave_application1 as $leave1) {

                    $where = array("leave_application" => $leave1->leave_application_id);
                    $groupby = "leave_day_type";
                    $leave_day_count = $this->leave_management_mod->count_leave_days($where, $groupby)->result();

                    foreach ($leave_day_count as $leave_count) {
                        if ($leave_count->leave_day_type == "Full Day") {
                            $total_existing_leave1 += $leave_count->leave_day_count * 1;
                        } elseif (preg_match("/^Half Day/", $leave_count->leave_day_type)) {
                            $total_existing_leave1 += $leave_count->leave_day_count * 0.5;
                        } else {
                            $total_existing_leave1 += 0;
                        }
                    }
                }

                if ($leave_type_id == 4) {

                    if ($leave_type_details->employment_status == 1) {

//                        $leave_type_details = $this->leave_settings_mod->get_leave_type(array('hr_pay_leave_types.leave_type_id' => $leave_type_id))->row();

                        $total_existing_casual = $this->calculate_existing_leave_count($leave_employee_id, $leave_type_id, $period_start, $period_end, $leave_type_details);

                        $diff2 = round(round(strtotime(date('Y-m')) - strtotime(date('Y-m', strtotime($emp->joined_date)))) / 60 / 60 / 60 / 12);
                        $month_diff2 = explode('.', $diff2);

                        $temp_casual = (0.5 * ($month_diff2[0])) + 0.5;
                        $avail_leave_bal = $temp_casual - $total_existing_casual;
//                        $entitlement_for_joined = 500;

                        if ($total_new_leave_count > $avail_leave_bal) {

                            $error_message = "you are trying to apply $total_new_leave_count day(s) of $leave_type_details->leave_type_name leave. <br>
                                      But, this employee's available balance of $leave_type_details->leave_type_name leave in " . date('Y-M', strtotime($leave_start_date)) . " is " . $avail_leave_bal . " day(s).";

                            echo json_encode(array(
                                "status" => FALSE,
                                "eligibility_error" => $error_message
                            ));
                            exit;

                        }
                    } elseif ($leave_type_details->employment_status == 4) {

                        $leave_entitlement = $leave_type_details->leaves_per_period;
                        $total_existing_casual = $this->calculate_existing_leave_count($leave_employee_id, $leave_type_id, $period_start, $period_end, $leave_type_details);

                        $avail_leave_bal = $leave_entitlement - $total_existing_casual;

                        if ($total_new_leave_count > $avail_leave_bal) {

                            $error_message = "For " . date('Y-M', strtotime($leave_start_date)) . ", you are trying to apply $total_new_leave_count day(s) of $leave_type_details->leave_type_name leave. <br>
                                      But, this employee's available balance of $leave_type_details->leave_type_name leave in " . date('Y-M', strtotime($leave_start_date)) . " is " . $avail_leave_bal . " day(s).";

                            echo json_encode(array(
                                "status" => FALSE,
                                "eligibility_error" => $error_message
                            ));
                            exit;

                        }

                    }
                } elseif ($leave_type_id == 2) {

                    if ($leave_type_details->employment_status == 4) {
                        $total_existing_casual = $this->calculate_existing_leave_count($leave_employee_id, $leave_type_id, $period_start, $period_end, $leave_type_details);
                        if ($previous_year == $confirmed_year && $emp->confirmed_date != '0000-00-00') {
                            if ($ent = $this->leave_management_mod->hr_pay_m_leave_entitlement($emp->emp_category, $leave_type_id)) {

                                //check joined date
                                //1st Jan - 31st Mar ----> 14 days Annual
                                //1st Jan - 31st Mar ----> 10 days Annual
                                //1st Jan - 31st Mar ----> 07 days Annual
                                //1st Oct - 31st Dec ----> 04 days Annual
                                foreach ($ent as $ent1) {

                                    if (strtotime($previous_year . "-" . $ent1->from) <= strtotime($emp->confirmed_date) && strtotime($previous_year . "-" . $ent1->to) >= strtotime($emp->confirmed_date)) {
                                        $leave_entitlement = $ent1->num_of_leaves;
                                    }
                                }
                            }
                        } elseif ($previous_year > $confirmed_year && $emp->confirmed_date != '0000-00-00') {

                            $leave_entitlement = $leave_type_details->leaves_per_period;
                        }
                        $avail_leave_bal = $leave_entitlement - $total_existing_casual;

                        if ($total_new_leave_count > $avail_leave_bal && $emp->confirmed_date != '0000-00-00') {

                            $error_message = "For " . date('Y-M', strtotime($leave_start_date)) . ", you are trying to apply $total_new_leave_count day(s) of $leave_type_details->leave_type_name leave. <br>
                                      But, this employee's available balance of $leave_type_details->leave_type_name leave in " . date('Y-M', strtotime($leave_start_date)) . " is " . $avail_leave_bal . " day(s).";

                            echo json_encode(array(
                                "status" => FALSE,
                                "eligibility_error" => $error_message
                            ));
                            exit;
                        } elseif ($emp->confirmed_date == '0000-00-00') {

                            echo json_encode(array(
                                "status" => FALSE,
                                "eligibility_error" => "Sorry! This Employee's Confirmation date is Invalid "
                            ));
                            exit;
                        }
                    } elseif ($leave_type_details->employment_status == 1) {

                        echo json_encode(array(
                            "status" => FALSE,
                            "eligibility_error" => "Sorry! This Employee's status is 'PROBATION'. So You can't apply " . $leave_type_details->leave_type_nam
                        ));
                        exit;
                    }
                } else {

                    if ($leave_type_details->employment_status == 4) {

                        $leave_entitlement = $leave_type_details->leaves_per_period;
                        $total_existing_casual = $this->calculate_existing_leave_count($leave_employee_id, $leave_type_id, $period_start, $period_end, $leave_type_details);
                        $avail_leave_bal = $leave_entitlement - $total_existing_casual;
//                    $total_existing_casual = $avail_leave_bal;

                        if ($total_new_leave_count > $avail_leave_bal) {

                            $error_message = "For " . date('Y-M', strtotime($leave_start_date)) . ", you are trying to apply $total_new_leave_count day(s) of $leave_type_details->leave_type_name leave. <br>
                                      But, this employee's available balance of $leave_type_details->leave_type_name leave in " . date('Y-M', strtotime($leave_start_date)) . " is " . $avail_leave_bal . " day(s).";

                            echo json_encode(array(
                                "status" => FALSE,
                                "eligibility_error" => $error_message
                            ));
                            exit;

                        }

                    } else {
                        echo json_encode(array(
                            "status" => FALSE,
                            "eligibility_error" => "Sorry! Your Employee status is 'PROBATION'. So You can't apply " . $leave_type_details->leave_type_nam
                        ));
                        exit;
                    }
                }
            }
        }else{

                $leave_entitlement = $leave_type_details->leaves_per_period;
                $total_existing_casual = $this->calculate_existing_leave_count($leave_employee_id, $leave_type_id, $period_start, $period_end, $leave_type_details);
                $avail_leave_bal = $leave_entitlement - $total_existing_casual;
//                    $total_existing_casual = $avail_leave_bal;

                if ($total_new_leave_count > $avail_leave_bal) {

                    $error_message = "For " . date('Y-M', strtotime($leave_start_date)) . ", you are trying to apply $total_new_leave_count day(s) of $leave_type_details->leave_type_name leave. <br>
                                      But, this employee's available balance of $leave_type_details->leave_type_name leave in " . date('Y-M', strtotime($leave_start_date)) . " is " . $avail_leave_bal . " day(s).";

                    echo json_encode(array(
                        "status" => FALSE,
                        "eligibility_error" => $error_message
                    ));
                    exit;

                }
            }
        }else {
            if($emp->leave_category==1){
            $where = "employee = '$leave_employee_id' AND
                        leave_type = '$leave_type_id' AND
                        (start_date BETWEEN CAST('$period_start' AS DATE) AND CAST('$period_end' AS DATE)) AND
                (hr_pay_leave_applications.status <> 'Cancelled' AND hr_pay_leave_applications.status <> 'Rejected')";

            $leave_application1 = $this->leave_management_mod->get_leave_applications($where)->result();
            $total_existing_leave1 = 0;
            foreach ($leave_application1 as $leave1) {

                $where = array("leave_application" => $leave1->leave_application_id);
                $groupby = "leave_day_type";
                $leave_day_count = $this->leave_management_mod->count_leave_days($where, $groupby)->result();

                foreach ($leave_day_count as $leave_count) {
                    if ($leave_count->leave_day_type == "Full Day") {
                        $total_existing_leave1 += $leave_count->leave_day_count * 1;
                    } elseif (preg_match("/^Half Day/", $leave_count->leave_day_type)) {
                        $total_existing_leave1 += $leave_count->leave_day_count * 0.5;
                    } else {
                        $total_existing_leave1 += 0;
                    }
                }
            }

            if ($leave_type_id == 4) {

                if ($emp->emp_status == 1) {

//                        $leave_type_details = $this->leave_settings_mod->get_leave_type(array('hr_pay_leave_types.leave_type_id' => $leave_type_id))->row();

                    $total_existing_casual = $this->calculate_existing_leave_count($leave_employee_id, $leave_type_id, $period_start, $period_end, $leave_type_details);

                    $diff2 = round(round(strtotime(date('Y-m')) - strtotime(date('Y-m', strtotime($emp->joined_date)))) / 60 / 60 / 60 / 12);
                    $month_diff2 = explode('.', $diff2);

                    $temp_casual = (0.5 * ($month_diff2[0])) + 0.5;
                    $avail_leave_bal = $temp_casual - $total_existing_casual;
//                        $entitlement_for_joined = 500;

                    if ($total_new_leave_count > $avail_leave_bal) {

                        $error_message = "you are trying to apply $total_new_leave_count day(s) of $leave_type_details->leave_type_name leave. <br>
                                      But, this employee's available balance of $leave_type_details->leave_type_name leave in " . date('Y-M', strtotime($leave_start_date)) . " is " . $avail_leave_bal . " day(s).";

                        echo json_encode(array(
                            "status" => FALSE,
                            "eligibility_error" => $error_message
                        ));
                        exit;

                    }
                } elseif ($emp->emp_status == 4) {

                    $leave_entitlement = $leave_type_details->leaves_per_period;
                    $total_existing_casual = $this->calculate_existing_leave_count($leave_employee_id, $leave_type_id, $period_start, $period_end, $leave_type_details);

                    $avail_leave_bal = $leave_entitlement - $total_existing_casual;

                    if ($total_new_leave_count > $avail_leave_bal) {

                        $error_message = "For " . date('Y-M', strtotime($leave_start_date)) . ", you are trying to apply $total_new_leave_count day(s) of $leave_type_details->leave_type_name leave. <br>
                                      But, this employee's available balance of $leave_type_details->leave_type_name leave in " . date('Y-M', strtotime($leave_start_date)) . " is " . $avail_leave_bal . " day(s).";

                        echo json_encode(array(
                            "status" => FALSE,
                            "eligibility_error" => $error_message
                        ));
                        exit;

                    }

                }
            } elseif ($leave_type_id == 2) {

                if ($emp->emp_status == 4) {
                    $total_existing_casual = $this->calculate_existing_leave_count($leave_employee_id, $leave_type_id, $period_start, $period_end, $leave_type_details);
                    if ($previous_year == $confirmed_year && $emp->confirmed_date != '0000-00-00') {
                        if ($ent = $this->leave_management_mod->hr_pay_m_leave_entitlement($emp->emp_category, $leave_type_id)) {

                            //check joined date
                            //1st Jan - 31st Mar ----> 14 days Annual
                            //1st Jan - 31st Mar ----> 10 days Annual
                            //1st Jan - 31st Mar ----> 07 days Annual
                            //1st Oct - 31st Dec ----> 04 days Annual
                            foreach ($ent as $ent1) {

                                if (strtotime($previous_year . "-" . $ent1->from) <= strtotime($emp->confirmed_date) && strtotime($previous_year . "-" . $ent1->to) >= strtotime($emp->confirmed_date)) {
                                    $leave_entitlement = $ent1->num_of_leaves;
                                }
                            }
                        }
                    } elseif ($previous_year > $confirmed_year && $emp->confirmed_date != '0000-00-00') {

                        $leave_entitlement = $leave_type_details->leaves_per_period;
                    }
                    $avail_leave_bal = $leave_entitlement - $total_existing_casual;

                    if ($total_new_leave_count > $avail_leave_bal && $emp->confirmed_date != '0000-00-00') {

                        $error_message = "For " . date('Y-M', strtotime($leave_start_date)) . ", you are trying to apply $total_new_leave_count day(s) of $leave_type_details->leave_type_name leave. <br>
                                      But, this employee's available balance of $leave_type_details->leave_type_name leave in " . date('Y-M', strtotime($leave_start_date)) . " is " . $avail_leave_bal . " day(s).";

                        echo json_encode(array(
                            "status" => FALSE,
                            "eligibility_error" => $error_message
                        ));
                        exit;
                    } elseif ($emp->confirmed_date == '0000-00-00') {

                        echo json_encode(array(
                            "status" => FALSE,
                            "eligibility_error" => "Sorry! This Employee's Confirmation date is Invalid "
                        ));
                        exit;
                    }
                } elseif ($emp->emp_status == 1) {

                    echo json_encode(array(
                        "status" => FALSE,
                        "eligibility_error" => "Sorry! Your Employee status is 'PROBATION'. So You can't apply " . $leave_type_details->leave_type_nam
                    ));
                    exit;
                }
            } else {

                if ($emp->emp_status == 4) {

                    $leave_entitlement = $leave_type_details->leaves_per_period;
                    $total_existing_casual = $this->calculate_existing_leave_count($leave_employee_id, $leave_type_id, $period_start, $period_end, $leave_type_details);
                    $avail_leave_bal = $leave_entitlement - $total_existing_casual;
//                    $total_existing_casual = $avail_leave_bal;

                    if ($total_new_leave_count > $avail_leave_bal) {

                        $error_message = "For " . date('Y-M', strtotime($leave_start_date)) . ", you are trying to apply $total_new_leave_count day(s) of $leave_type_details->leave_type_name leave. <br>
                                      But, this employee's available balance of $leave_type_details->leave_type_name leave in " . date('Y-M', strtotime($leave_start_date)) . " is " . $avail_leave_bal . " day(s).";

                        echo json_encode(array(
                            "status" => FALSE,
                            "eligibility_error" => $error_message
                        ));
                        exit;

                    }

                } else {
                    echo json_encode(array(
                        "status" => FALSE,
                        "eligibility_error" => "Sorry! Your Employee status is 'PROBATION'. So You can't apply " . $leave_type_details->leave_type_nam
                    ));
                    exit;
                }
            }
        }else{
                $leave_entitlement = $leave_type_details->leaves_per_period;
                $total_existing_casual = $this->calculate_existing_leave_count($leave_employee_id, $leave_type_id, $period_start, $period_end, $leave_type_details);
                $avail_leave_bal = $leave_entitlement - $total_existing_casual;
//                    $total_existing_casual = $avail_leave_bal;

                if ($total_new_leave_count > $avail_leave_bal) {

                    $error_message = "For " . date('Y-M', strtotime($leave_start_date)) . ", you are trying to apply $total_new_leave_count day(s) of $leave_type_details->leave_type_name leave. <br>
                                      But, this employee's available balance of $leave_type_details->leave_type_name leave in " . date('Y-M', strtotime($leave_start_date)) . " is " . $avail_leave_bal . " day(s).";

                    echo json_encode(array(
                        "status" => FALSE,
                        "eligibility_error" => $error_message
                    ));
                    exit;

                }
            }
        }


        //define variable for joined date entitlement
        $entitlement_for_joined = 0;

        //define remaining months variable
        $remain_months = '';
//        if($emp->emp_category){
//
//            //previous year get from leave period start date
//            $current_year=date('Y',strtotime($period_start));
//            $previous_year=date('Y',strtotime($period_start))- 1;
//            $joined_year = date('Y',strtotime($emp_joined_date));
//
//            //check joined date with current leave period
//            //if true assign half day per month
//            if($current_year == $joined_year){
//
//                $where = "employee = '$leave_employee_id' AND
//                        leave_type = '$leave_type_id' AND
//                        (start_date BETWEEN CAST('$period_start' AS DATE) AND CAST('$period_end' AS DATE)) AND
//                (hr_pay_leave_applications.status <> 'Cancelled' AND hr_pay_leave_applications.status <> 'Rejected')";
//
//                $leave_application1=$this->leave_management_mod->get_leave_applications($where)->result();
//
//                $total_existing_leave1=0;
//
//                foreach($leave_application1 as $leave1){
//
//                    $where = array("leave_application" => $leave1->leave_application_id);
//                    $groupby = "leave_day_type";
//                    $leave_day_count = $this->leave_management_mod->count_leave_days($where, $groupby)->result();
//
//                    foreach ($leave_day_count as $leave_count) {
//                        if ($leave_count->leave_day_type == "Full Day") {
//                            $total_existing_leave1 += $leave_count->leave_day_count * 1;
//                        } elseif (preg_match("/^Half Day/", $leave_count->leave_day_type)) {
//                            $total_existing_leave1 += $leave_count->leave_day_count * 0.5;
//                        } else {
//                            $total_existing_leave1 += 0;
//                        }
//                    }
//                }
//
//                //check annual leave
//                if($leave_type_id ==2 && $emp->emp_category!=7){
//
//                    $error_message = "Your joined date is " . $emp_joined_date . " , then you can't apply annual leave for this year.";
//
//                    echo json_encode(array(
//                        "status" => FALSE,
//                        "eligibility_error" => $error_message
//                    ));
//                    exit;
//                }
//
//                //check casual leave
//                else if($leave_type_id ==4){
//
//                    $diff2 = round(round(strtotime($current_year.'12-31')-strtotime($emp_joined_date))/60/60/60/12);
//                    $month_diff2 = explode('.',$diff2);
//
//                    $temp_casual = ((0.5*($month_diff2[0])))-$total_existing_leave1;
//                    if($total_new_leave_count>$temp_casual){
//
//                        $error_message = "For ".date('Y-M',strtotime($leave_start_date)).", you are trying to apply $total_new_leave_count day(s) of $leave_type_details->leave_type_name leave. <br>
//                                      But, this employee's available balance of $leave_type_details->leave_type_name leave in ".date('Y-M',strtotime($leave_start_date))." is ".$temp_casual." day(s).";
//
//                        echo json_encode(array(
//                            "status" => FALSE,
//                            "eligibility_error" => $error_message
//                        ));
//                        exit;
//                    }
//
//                }
//            }
//            //if true assign annual leave according to the joined date
//            else if(($current_year > $joined_year) && ($joined_year == $previous_year)){
//
//                if ($ent = $this->leave_management_mod->hr_pay_m_leave_entitlement($emp->emp_category, $leave_type_id)) {
//
//                    //check joined date
//                    //1st Jan - 31st Mar ----> 14 days Annual
//                    //1st Apr - 31st June ----> 10 days Annual
//                    //1st Jul - 31st Sep ----> 07 days Annual
//                    //1st Oct - 31st Dec ----> 04 days Annual
//                    foreach ($ent as $ent1){
//
//                        if(strtotime($previous_year . "-" . $ent1->from) <= strtotime($emp->joined_date) && strtotime($previous_year . "-" . $ent1->to) >= strtotime($emp->joined_date)){
//                            $entitlement_for_joined = $ent1->num_of_leaves;
//                        }
//                    }
//                }
//
//            }
//            //if true assign full annual leave
//            else if(($current_year > $joined_year) && ($joined_year < $previous_year)){
//
//
//            }
//
//        }
        //TODO kreston~~only~~not~use~for~common~~~~~~~~~~~~~~~~~~~~~~~vkc~de~mel~~~~~~~~~~~~~~~

//        if($leave_type_id!=8) {
//
//            $total_existing_leave_count = $this->calculate_existing_leave_count($leave_employee_id, $leave_type_id, $period_start, $period_end, $leave_type_details);
//
//            //TODO kreston~~only~~not~use~for~common~~~~~~~~~~~~~~~~~~~~~~~vkc~de~mel~~~~~~~~~~~~~~~
//            if ($entitlement_for_joined > 0) {
//                $avail_leave_bal = $entitlement_for_joined - $total_existing_leave_count;
//            } else {
//                $avail_leave_bal = $leave_type_details->leaves_per_period - $total_existing_leave_count;
//            }
//            //TODO kreston~~only~~not~use~for~common~~~~~~~~~~~~~~~~~~~~~~~vkc~de~mel~~~~~~~~~~~~~~~
//
//        }else{
//
//            $dateeee = date('Y-m-d', strtotime('first day of january this year'));
//            $ldata = $this->leave_settings_mod->get_leave_period_data($dateeee);
//
//            $leave_period_of_leave_start_day = $this->leave_settings_mod->get_leave_period(array('period_start <=' => $ldata->period_start, 'period_end >=' => $ldata->period_end), "month")->row();
//
//            $leave_period = $leave_period_of_leave_start_day;
//
//            $avail_leave_bal = $this->leave_management_mod->get_liu_leave_count($leave_employee_id, $leave_period->period_start, $leave_period->period_end)->liu;
//            $total_existing_leave_count = $avail_leave_bal;
//
//        }

        /* Leave Accrue (if set to 'Yes') - START */
//        if ($leave_rule_type_details) {
//
//            if($leave_type_details->leave_accrue == "Yes" && $leave_type_details->propotionate_on_joined_date == "Yes"){
//
//                if(($current_year > $joined_year) && (($joined_year == $previous_year) || ($joined_year <= $previous_year))){
//
//                    $leaves_entitled_per_month = $leave_type_details->leaves_per_period;
//
//                }else{
//
//                    $remaining_month = date('m', strtotime($period_end)) - date('m', strtotime($period_start));
//                    $leaves_entitled_per_month = ceil(($leave_type_details->leaves_per_period  / 12) * ($remaining_month+1));
//                }
//
//
//
//                //todo teckpack only
////                $leaves_entitled_per_month = $leave_type_details->leaves_per_period ;
//                //todo teckpack only
//
//                $leave_month_arr = array();
//                $prev = null;
//                foreach ($leave_day_types as $leave_days) {
//                    if (date_format(date_create($leave_days['name']), "m") !== $prev) {
//                        $leave_month_arr[] = date_format(date_create($leave_days['name']), "m");
//                    }
//                    $prev = date_format(date_create($leave_days['name']), "m");
//                }
//
//                if($leave_type_id!=8) {
//                    $where = "employee = '$leave_employee_id' AND
//                        leave_type = '$leave_type_id' AND
//                        (start_date BETWEEN CAST('$period_start' AS DATE) AND CAST('$period_end' AS DATE)) AND
//                (hr_pay_leave_applications.status <> 'Cancelled' AND hr_pay_leave_applications.status <> 'Rejected')";
//
//                    $leave_application_details = $this->leave_management_mod->get_leave_applications($where)->result();
//                    $total_existing_leave_count = 0;
//                    foreach ($leave_application_details as $leave_application) {
//                        $where = array("leave_application" => $leave_application->leave_application_id);
//                        $groupby = "leave_day_type";
//                        $leave_day_count = $this->leave_management_mod->count_leave_days($where, $groupby)->result();
//                        foreach ($leave_day_count as $leave_count) {
//                            if ($leave_count->leave_day_type == "Full Day") {
//                                $total_existing_leave_count += $leave_count->leave_day_count * 1;
//                            } elseif (preg_match("/^Half Day/", $leave_count->leave_day_type)) {
//                                $total_existing_leave_count += $leave_count->leave_day_count * 0.5;
//                            } else {
//                                $total_existing_leave_count += 0;
//                            }
//                        }
//                    }
//
//                    $avail_leave_bal = $leaves_entitled_per_month - $total_existing_leave_count;
//                }else{
//
//                    $dateeee = date('Y-m-d', strtotime('first day of january this year'));
//                    $ldata = $this->leave_settings_mod->get_leave_period_data($dateeee);
//
//                    $leave_period_of_leave_start_day = $this->leave_settings_mod->get_leave_period(array('period_start <=' => $ldata->period_start, 'period_end >=' => $ldata->period_end), "month")->row();
//
//                    $leave_period = $leave_period_of_leave_start_day;
//                    $avail_leave_bal = $this->leave_management_mod->get_liu_leave_count($leave_employee_id,$leave_period->period_start,$leave_period->period_end)->liu;
//
//                }
//
//                $total_new_leave_count = 0;
//                //todo teckpack only
//                $total_count = array();
//                //todo teckpack only
//                foreach($leave_day_types as $leave_days)
//                {
//                    if($leave_days['value'] == "Full Day")
//                    {
//                        $total_new_leave_count += 1;
//                        //todo teckpack only
//                        $total_count[]=1;
//                        //todo teckpack only
//                    }
//                    elseif($leave_days['value'] == "Half Day - Morning" || $leave_days['value'] == "Half Day - Afternoon" || $leave_days['value'] == "Half Day - Holiday")
//                    {
//                        $total_new_leave_count += 0.5;
//                        //todo teckpack only
//                        $total_count[]=0.5;
//                        //todo teckpack only
//                    }
//                    else
//                    {
//                        $total_new_leave_count += 0;
//                    }
//                }
//                //echo json_encode((date('z', date_create('2016-07-01')->getTimestamp()) + 1) / (date('z', date_create('2016-12-31')->getTimestamp()) + 1));exit;
//
//                if ($avail_leave_bal < $total_new_leave_count) {
//                    $error_message = "You are trying to apply $total_new_leave_count day(s) of $leave_type_details->leave_type_name leave. <br>
//                                      But, this employee's available balance of $leave_type_details->leave_type_name leave in this period is only $avail_leave_bal day(s).";
//
//                    echo json_encode(array(
//                        "status" => FALSE,
//                        "eligibility_error" => $error_message
//                    ));
//                    exit;
//                }
//            }
//        }
        /* Leave Accrue (if set to 'Yes') - END */

//        if ($avail_leave_bal < $total_new_leave_count) {
//            $error_message = "You are trying to apply $total_new_leave_count day(s) of $leave_type_details->leave_type_name leaves. <br>
//                                      But this employee's available balance of $leave_type_details->leave_type_name leaves are only $avail_leave_bal day(s) for this period.";
//            echo json_encode(array(
//                "status" => FALSE,
//                "eligibility_error" => $error_message
//            ));
//            exit;
//        }

        //Max Leave Check
        if (MAX_LEAVE != "" || MAX_LEAVE != 0) {
            $tot_leave_for_apply = $total_existing_leave_count + $total_new_leave_count;
            $max_leave = MAX_LEAVE;
            if ($tot_leave_for_apply > $max_leave) {
                $error_message = "You are trying to apply $total_new_leave_count day(s)<br>
                                      But this employee's available balance exceeding total max $max_leave day(s) for this period.";
                echo json_encode(array(
                    "status" => FALSE,
                    "eligibility_error" => $error_message
                ));
                exit;
            }
        }

        $leave_application_details = array(
            'employee' => $leave_employee_id,
            'leave_type' => $leave_type_id,
            'start_date' => $leave_start_date,
            'end_date' => $leave_end_date,
            'leave_reason' => $leave_reason,
            'reason' => 'No Action',
            'applied_by' => $this->ion_auth->user()->row()->id,
            '_created_' => $this->currentTime
        );

        $leave_application_id = $this->leave_management_mod->apply_leave($leave_application_details);

        if($leave_type_id==8) {
            $leave_leave_n = $this->leave_management_mod->get_leave_leave($leave_employee_id);

            for ($j = 0; $j < count($total_count); $j++) {
                if ($leave_leave_n[$j]->liu_count == 1 && $total_count[$j] == 1) {
                    $this->leave_management_mod->update_leave_leave($leave_leave_n[$j]->id, 1);
                } else {
                    if ($leave_leave_n[$j]->liu_count == 0.5) {
                        $this->leave_management_mod->update_leave_leave($leave_leave_n[$j]->id, 2);
                    } else {
                        $this->leave_management_mod->update_leave_leave($leave_leave_n[$j]->id, 3);
                    }
                }
            }
        }

        if ($leave_application_id > 0) {
            foreach ($leave_day_types as $val) {
                if ($val['value'] == "Full Day" || $val['value'] == "Half Day - Morning" || $val['value'] == "Half Day - Afternoon" || $val['value'] == "Half Day - Holiday") {
                    $leave_day_arr = array(
                        "leave_application" => $leave_application_id,
                        "leave_date" => $val['name'],
                        "leave_day_type" => $val['value']
                    );
                    $this->leave_management_mod->create_leave_days($leave_day_arr);
                }
            }
            //Upload Leave attachments area
            if (isset($_FILES["file"]['name'])) {

                $file_name = $leave_application_id;
                $config['upload_path'] = "./uploads/leave/";
                $config['allowed_types'] = 'jpg|pdf';
                $config['file_name'] = $file_name;
                $this->load->library('upload');
                $this->upload->initialize($config);

                if ($this->upload->do_upload("file")) {

                    $ext = explode(".", $_FILES["file"]['name']);
                    $data_rr = array(
                        "path" => $file_name . "." . $ext[1],
                        "leave_id" => $leave_application_id
                    );

                    $this->leave_management_mod->saveUploadFile($data_rr);
                }
            }
            //End of Upload Leave attachments area

            $this->system_log->create_system_log("Leave Management", "Success", "New Leave Application Added " . $leave_application_id);
            echo json_encode(array("status" => TRUE));
        } else {
            echo json_encode(array("status" => FALSE));
        }

//        if (!$this->input->is_ajax_request()) {
//            exit('No direct script access allowed');
//        }
//        $required_data = array(
//            'leave_type',
//            'start_date',
//            'end_date',
//            'leave_reason'
//        );
//        /*if($this->input->post('applicant') != 'employee') // To check who applies leave
//        {
//            $required_data[] = 'employee';
//        }*/
//        $this->_validate_required($required_data);
//
//        $leave_type_id = $this->input->post('leave_type');
//        $leave_start_date = $this->input->post('start_date');
//        $leave_end_date = $this->input->post('end_date');
//        $leave_reason = $this->input->post('leave_reason');
//        $leave_day_types = json_decode($this->input->post('leave_day_types'), true);
//        $leave_employee_id = $this->input->post('employee_name');
//        //$leave_employee_id = empty($leave_employee_id) ? $this->ion_auth->user()->row()->id : $leave_employee_id;
//        $country = "Sri Lanka"; //TODO: Country should not be hardcoded. Make it dynamic to allow any country.
//        $work_week = $this->leave_settings_mod->get_work_week(array('hr_pay_m_country.name' => $country));
//        $emp_data = $this->leave_settings_mod->getSingleEmployeeData($leave_employee_id);
////      if (!$this->ion_auth->in_group(999, $leave_employee_id))
////        {
////            echo json_encode(array(
////                'status' => false,
////                "eligibility_error" => "Sorry! Leaves can be applied only to Employees."
////            ));
////            exit;
////        }
//        //JE-2018-12-12 for Leave rule work
//        $where_rules = array(
//            'leave_type_id' => $leave_type_id,
//            'employee_category' => $emp_data->emp_category,
//            'employment_status' => $emp_data->emp_status
//        );
//
//        if($leave_rule_type_details = $this->leave_settings_mod->get_leave_rule($where_rules)->row()) {
//
//            //With Leave Rule
//            $leave_type_details = $leave_rule_type_details;
//
//            if($leave_type_details->propotionate_on_joined_date == "Yes"){
//
//                $emp_joined_date = $emp_data->joined_date;
//
//                //check employee joined date in current year
//                if(date('Y') == date('Y',strtotime($emp_joined_date))){
//                    $period_start = $emp_joined_date;
//                    $period_end = date('Y-12-31');
//                }
//                else{
//                    $period_start = date('Y-01-01');
//                    $period_end = date('Y-12-31');
//                }
//            }
//
//        }else {
//            //Data Without Rule
//            $leave_type_details = $this->leave_settings_mod->get_leave_type(array('hr_pay_leave_types.leave_type_id' => $leave_type_id))->row();
//            $q1 = $this->db->query("SELECT * FROM hr_pay_leave_periods WHERE ('$leave_start_date' between period_start and period_end) or  ('$leave_end_date' between period_start and period_end)");
//            if ($q1->num_rows() == 0) {
//                echo json_encode(array("status" => FALSE, "eligibility_error" => "Need to assign leave period for current year."));
//                exit;
//            }
//            $leave_period_of_leave_start_day = $this->leave_settings_mod->get_leave_period(array('period_start <=' => $leave_start_date, 'period_end >=' => $leave_start_date), "month")->row();
//            $leave_period_of_leave_end_day = $this->leave_settings_mod->get_leave_period(array('period_start <=' => $leave_end_date, 'period_end >=' => $leave_end_date))->row();
//            if ($leave_period_of_leave_start_day->period_id != $leave_period_of_leave_end_day->period_id) {
//                // Due to time restrictions, leave application is restricted to a single leave period.
//                echo json_encode(array(
//                    "status" => FALSE,
//                    "eligibility_error" => "It is not possible to apply leaves in two leave periods. <br> You may apply leaves till $leave_period_of_leave_start_day->period_end. Rest you have to apply separately."
//                ));
//                exit;
//            }
//            $period_start = $leave_period_of_leave_start_day->period_start;
//            $period_end = $leave_period_of_leave_start_day->period_end;
//
//        }
//
//
//        if ($leave_start_date > $leave_end_date) {
//            $data = array();
//            $data['inputerror'][] = 'end_date';
//            $data['error_string'][] = 'Selected date range is invalid.';
//            $data['status'] = FALSE;
//            echo json_encode($data);
//            exit;
//        }
//
//        if ($leave_type_id == 1 && ((int)date_diff(date_create($leave_end_date), date_create($leave_start_date))->format("%a") + 1 > 2) && !$_FILES["file"]['name']) {
//            echo json_encode(array(
//                "status" => FALSE,
//                "inputerror" => array("attachment"),
//                "error_string" => array("For Medical-Leave, if the number of leave days is more than 2 days, you are required to attach medical certificate.")
//            ));
//            exit;
//        }
//
//        //TODO~~~kreston~~~only~~~please~comment~other~projects~~~~~~~~~~~~~
////        $attachment=$this->leave_management_mod->check_attachment_status($leave_type_id);
////
////        if($attachment->attach_document=="YES" && !$_FILES["file"]['name'])
////        {
////            echo json_encode(array(
////                "status" => FALSE,
////                "inputerror" => array("attachment"),
////                "error_string" => array("Proof Document Should be attached for ".$attachment->leave_type_name)
////            ));
////            exit;
////        }
//        //TODO~~~kreston~~~only~~~please~comment~other~projects~~~~~~~~~~~~~
//
//        $where = "employee = '$leave_employee_id' AND
//                (hr_pay_leave_applications.start_date <= CAST('$leave_end_date' AS DATE) AND hr_pay_leave_applications.end_date >= CAST('$leave_start_date' AS DATE)) AND
//                (hr_pay_leave_applications.status <> 'Cancelled')";
//        $overlapping_leave_days = $this->leave_management_mod->count_leave_applications($where)->row();
//        if ($overlapping_leave_days->leave_application_count > 0) {
//            echo json_encode(array(
//                "status" => FALSE,
//                "eligibility_error" => "The selected leave period is overlapping with another leave you have already applied which might be approved or rejected or still pending. <br> Please check your leave history."
//            ));
//            exit;
//        }
//
//        $holiday = $this->leave_settings_mod->get_holiday(array('date >=' => $leave_start_date, 'date <=' => $leave_end_date, 'hr_pay_m_country.name' => $country));
//
//
//        $diff = date_diff(date_create($leave_start_date), date_create($leave_end_date), TRUE);
//        if (empty($leave_day_types)) {
//            $date_obj = date_create($leave_start_date);
//            $date_info = array();
//            for ($i = 1; $i <= (int)$diff->format('%a') + 1; $i++) {
//                if ($i != 1) {
//                    date_add($date_obj, date_interval_create_from_date_string("1 day"));
//                }
//                $date = date_format($date_obj, "Y-m-d");
//                $day_name = date_format($date_obj, "l");
//
//                $date_arr = array(
//                    'date' => $date,
//                    'day_name' => $day_name,
//                    'day_status' => '',
//                    'holiday' => FALSE,
//                    'holiday_name' => ''
//                );
//
//                foreach ($work_week->result() as $work_week_result) {
//                    if ($work_week_result->day == $day_name) {
//                        $date_arr['day_status'] = $work_week_result->status;
//                    }
//                }
//                foreach ($holiday->result() as $holiday_result) {
//                    if ($holiday_result->date == $date) {
//                        $date_arr['holiday'] = TRUE;
//                        $date_arr['holiday_name'] = $holiday_result->holiday_name;
//                        if ($holiday_result->status == "Full Day") {
//                            $date_arr['day_status'] = "Holiday";
//                        } elseif ($holiday_result->status == "Half Day") {
//                            $date_arr['day_status'] = "Half Day - Holiday";
//                        }
//                    }
//                }
//                array_push($date_info, $date_arr);
//            }
//
//            echo json_encode(array("result" => $date_info));
//            exit;
//        }
//
//
//        $total_new_leave_count = 0;
//        //todo teckpack only
//        $total_count = array();
//        //todo teckpack only
//        foreach ($leave_day_types as $leave_days) {
//            if ($leave_days['value'] == "Full Day") {
//                $total_new_leave_count += 1;
//                //todo teckpack only
//                $total_count[]=1;
//                //todo teckpack only
//            } elseif ($leave_days['value'] == "Half Day - Morning" || $leave_days['value'] == "Half Day - Afternoon" || $leave_days['value'] == "Half Day - Holiday") {
//                $total_new_leave_count += 0.5;
//                //todo teckpack only
//                $total_count[]=0.5;
//                //todo teckpack only
//            } else {
//                $total_new_leave_count += 0;
//            }
//        }
//
//        //TODO kreston~~only~~not~use~for~common~~~~~~~~~~~~~~~~~~~~~~~vkc~de~mel~~~~~~~~~~~~~~
//        //Leave settings for Permanent & Branch Staff / Out Audit Staff Entitlement need to be linked to Date of joined
////
////        $emp=$this->leave_management_mod->get_employee_info($leave_employee_id);
////
////        //define variable for joined date entitlement
////        $entitlement_for_joined=0;
////
////        //define remaining months variable
////        $remain_months='';
////
////        if($emp->emp_category){
////
////            //get current year
////            $current_year=date('Y');
////
////            //Permanent & Branch Staff
////            //check employee category condition for entitlement
////            if($ent=$this->leave_management_mod->hr_pay_m_leave_entitlement($emp->emp_category,$leave_type_id)){
////
////                //check joined date
////                //1st Jan - 31st Mar ----> 14 days Annual
////                //1st Jan - 31st Mar ----> 10 days Annual
////                //1st Jan - 31st Mar ----> 7 days Annual
////                foreach ($ent as $ent1){
////
////                    if(strtotime($current_year."-".$ent1->from) <= strtotime($emp->joined_date) && strtotime($current_year."-".$ent1->to) >= strtotime($emp->joined_date)){
////
////                        $entitlement_for_joined=$ent1->num_of_leaves;
////
////                    }
////                }
////            }
////        }
//
//        //TODO kreston~~only~~not~use~for~common~~~~~~~~~~~~~~~~~~~~~~~vkc~de~mel~~~~~~~~~~~~~~~
//
//
//        //todo common
////        $total_existing_leave_count = $this->calculate_existing_leave_count($leave_employee_id, $leave_type_id, $period_start, $period_end, $leave_type_details);
////        $avail_leave_bal = $leave_type_details->leaves_per_period - $total_existing_leave_count;
//
//        //todo common
//
//
//        //TODO kreston~~only~~not~use~for~common~~~~~~~~~~~~~~~~~~~~~~~vkc~de~mel~~~~~~~~~~~~~~~
////        if($entitlement_for_joined > 0){
////            $avail_leave_bal = $entitlement_for_joined - $total_existing_leave_count;
////        }
////        else{
////            $avail_leave_bal = $leave_type_details->leaves_per_period - $total_existing_leave_count;
////        }
//        //TODO kreston~~only~~not~use~for~common~~~~~~~~~~~~~~~~~~~~~~~vkc~de~mel~~~~~~~~~~~~~~~
//
//        //todo teckpack only
//        if($leave_type_id!=8) {
//
//            $total_existing_leave_count = $this->calculate_existing_leave_count($leave_employee_id, $leave_type_id, $period_start, $period_end, $leave_type_details);
//            $avail_leave_bal = $leave_type_details->leaves_per_period - $total_existing_leave_count;
//
//        }else{
//
//            $dateeee = date('Y-m-d', strtotime('first day of january this year'));
//            $ldata = $this->leave_settings_mod->get_leave_period_data($dateeee);
//
//            $leave_period_of_leave_start_day = $this->leave_settings_mod->get_leave_period(array('period_start <=' => $ldata->period_start, 'period_end >=' => $ldata->period_end), "month")->row();
//
//            $leave_period = $leave_period_of_leave_start_day;
//
//            $avail_leave_bal = $this->leave_management_mod->get_liu_leave_count($leave_employee_id, $leave_period->period_start, $leave_period->period_end)->liu;
//            $total_existing_leave_count = $avail_leave_bal;
//
//        }
//
//        //todo teckpack only
//
//
//        /* Leave Accrue (if set to 'Yes') - START */
//        if ($leave_rule_type_details) {
//            if($leave_type_details->leave_accrue == "Yes" && $leave_type_details->propotionate_on_joined_date == "Yes"){
//                $remaining_month=date('m',strtotime($period_end)) - date('m',strtotime($period_start));
//                $leaves_entitled_per_month = ($leave_type_details->leaves_per_period / 12)*$remaining_month;
//
//
//                $leave_month_arr = array();
//                $prev = null;
//                foreach($leave_day_types as $leave_days) {
//                    if (date_format(date_create($leave_days['name']), "m") !== $prev) {
//                        $leave_month_arr[] = date_format(date_create($leave_days['name']), "m");
//                    }
//                    $prev = date_format(date_create($leave_days['name']), "m");
//                }
////                foreach ($leave_month_arr as $leave_month) {
//
//                    //todo common
////                    $where = "employee = '$leave_employee_id' AND
////                        leave_type = '$leave_type_id' AND
////                        (MONTH(start_date) = $leave_month OR MONTH(end_date) = $leave_month) AND
////                        (hr_pay_leave_applications.status <> 'Cancelled' AND hr_pay_leave_applications.status <> 'Rejected')";
////                    $leave_application_details = $this->leave_management_mod->get_leave_applications($where)->result();
////                    $total_existing_leave_count = 0;
////                    foreach ($leave_application_details as $leave_application) {
////                        $where = array("leave_application" => $leave_application->leave_application_id, "MONTH(leave_date)" => $leave_month);
////                        $groupby = "leave_day_type";
////                        $leave_day_count = $this->leave_management_mod->count_leave_days($where, $groupby)->result();
////                        foreach ($leave_day_count as $leave_count) {
////                            if ($leave_count->leave_day_type == "Full Day") {
////                                $total_existing_leave_count += $leave_count->leave_day_count * 1;
////                            } elseif (preg_match("/^Half Day/", $leave_count->leave_day_type)) {
////                                $total_existing_leave_count += $leave_count->leave_day_count * 0.5;
////                            } else {
////                                $total_existing_leave_count += 0;
////                            }
////                        }
////                    }
////                    $avail_leave_bal = $leaves_entitled_per_month - $total_existing_leave_count;
//                    //todo common
//
//                    //todo tecpack only
//                    if($leave_type_id!=8) {
//                        $where = "employee = '$leave_employee_id' AND
//                        leave_type = '$leave_type_id' AND
//                        (start_date BETWEEN CAST('$period_start' AS DATE) AND CAST('$period_end' AS DATE)) AND
//                (hr_pay_leave_applications.status <> 'Cancelled' AND hr_pay_leave_applications.status <> 'Rejected')";
//
//                        $leave_application_details = $this->leave_management_mod->get_leave_applications($where)->result();
//                        $total_existing_leave_count = 0;
//                        foreach ($leave_application_details as $leave_application) {
//                            $where = array("leave_application" => $leave_application->leave_application_id);
//                            $groupby = "leave_day_type";
//                            $leave_day_count = $this->leave_management_mod->count_leave_days($where, $groupby)->result();
//                            foreach ($leave_day_count as $leave_count) {
//                                if ($leave_count->leave_day_type == "Full Day") {
//                                    $total_existing_leave_count += $leave_count->leave_day_count * 1;
//                                } elseif (preg_match("/^Half Day/", $leave_count->leave_day_type)) {
//                                    $total_existing_leave_count += $leave_count->leave_day_count * 0.5;
//                                } else {
//                                    $total_existing_leave_count += 0;
//                                }
//                            }
//                        }
//                        $avail_leave_bal = $leaves_entitled_per_month - $total_existing_leave_count;
//                    }else{
//
//                        $dateeee = date('Y-m-d', strtotime('first day of january this year'));
//                        $ldata = $this->leave_settings_mod->get_leave_period_data($dateeee);
//
//                        $leave_period_of_leave_start_day = $this->leave_settings_mod->get_leave_period(array('period_start <=' => $ldata->period_start, 'period_end >=' => $ldata->period_end), "month")->row();
//
//                        $leave_period = $leave_period_of_leave_start_day;
//                        $avail_leave_bal = $this->leave_management_mod->get_liu_leave_count($leave_employee_id,$leave_period->period_start,$leave_period->period_end)->liu;
//
//                    }
//                    //todo tecpack only
//
//                $total_new_leave_count = 0;
//                //todo teckpack only
//                $total_count = array();
//                //todo teckpack only
//                foreach($leave_day_types as $leave_days)
//                {
//                    if($leave_days['value'] == "Full Day")
//                    {
//                        $total_new_leave_count += 1;
//                        //todo teckpack only
//                        $total_count[]=1;
//                        //todo teckpack only
//                    }
//                    elseif($leave_days['value'] == "Half Day - Morning" || $leave_days['value'] == "Half Day - Afternoon" || $leave_days['value'] == "Half Day - Holiday")
//                    {
//                        $total_new_leave_count += 0.5;
//                        //todo teckpack only
//                        $total_count[]=0.5;
//                        //todo teckpack only
//                    }
//                    else
//                    {
//                        $total_new_leave_count += 0;
//                    }
//                }
//                    //echo json_encode((date('z', date_create('2016-07-01')->getTimestamp()) + 1) / (date('z', date_create('2016-12-31')->getTimestamp()) + 1));exit;
//
//                    if ($avail_leave_bal < $total_new_leave_count) {
//                        $error_message = "You are trying to apply $total_new_leave_count day(s) of $leave_type_details->leave_type_name leave. <br>
//                                      But, this employee's available balance of $leave_type_details->leave_type_name leave in this period is only $avail_leave_bal day(s).";
//
//                        echo json_encode(array(
//                            "status" => FALSE,
//                            "eligibility_error" => $error_message
//                        ));
//                        exit;
//                    }
////                }
//            }
//        }
//        /* Leave Accrue (if set to 'Yes') - END */
//
//        if ($avail_leave_bal < $total_new_leave_count) {
//            $error_message = "You are trying to apply $total_new_leave_count day(s) of $leave_type_details->leave_type_name leaves. <br>
//                                      But this employee's available balance of $leave_type_details->leave_type_name leaves are only $avail_leave_bal day(s) for this period.";
//            echo json_encode(array(
//                "status" => FALSE,
//                "eligibility_error" => $error_message
//            ));
//            exit;
//        }
//
//        //Max Leave Check
//        if (MAX_LEAVE != "" || MAX_LEAVE != 0) {
//            $tot_leave_for_apply = $total_existing_leave_count + $total_new_leave_count;
//            $max_leave = MAX_LEAVE;
//            if ($tot_leave_for_apply >= $max_leave) {
//                $error_message = "You are trying to apply $total_new_leave_count day(s)<br>
//                                      But this employee's available balance exceeding total max $max_leave day(s) for this period.";
//                echo json_encode(array(
//                    "status" => FALSE,
//                    "eligibility_error" => $error_message
//                ));
//                exit;
//            }
//        }
//
//        $leave_application_details = array(
//            'employee' => $leave_employee_id,
//            'leave_type' => $leave_type_id,
//            'start_date' => $leave_start_date,
//            'end_date' => $leave_end_date,
//            'leave_reason' => $leave_reason,
//            'reason' => 'No Action',
//            'applied_by' => $this->ion_auth->user()->row()->id,
//            '_created_' => $this->currentTime
//        );
//
//        $leave_application_id = $this->leave_management_mod->apply_leave($leave_application_details);
//
//        //todo teckpack
//        if($leave_type_id==8) {
//            $leave_leave_n = $this->leave_management_mod->get_leave_leave($leave_employee_id);
//
//            for ($j = 0; $j < count($total_count); $j++) {
//                if ($leave_leave_n[$j]->liu_count == 1 && $total_count[$j] == 1) {
//                    $this->leave_management_mod->update_leave_leave($leave_leave_n[$j]->id, 1);
//                } else {
//                    if ($leave_leave_n[$j]->liu_count == 0.5) {
//                        $this->leave_management_mod->update_leave_leave($leave_leave_n[$j]->id, 2);
//                    } else {
//                        $this->leave_management_mod->update_leave_leave($leave_leave_n[$j]->id, 3);
//                    }
//                }
//            }
//        }
//        //todo teckpack
//
//
//        if ($leave_application_id > 0) {
//            foreach ($leave_day_types as $val) {
//                if ($val['value'] == "Full Day" || $val['value'] == "Half Day - Morning" || $val['value'] == "Half Day - Afternoon" || $val['value'] == "Half Day - Holiday") {
//                    $leave_day_arr = array(
//                        "leave_application" => $leave_application_id,
//                        "leave_date" => $val['name'],
//                        "leave_day_type" => $val['value']
//                    );
//                    $this->leave_management_mod->create_leave_days($leave_day_arr);
//                }
//            }
//
//            //Upload Leave attachments area
//            if (isset($_FILES["file"]['name'])) {
//
//                $file_name = $leave_application_id;
//                $config['upload_path'] = "./uploads/leave/";
//                $config['allowed_types'] = 'jpg|pdf';
//                $config['file_name'] = $file_name;
//                $this->load->library('upload');
//                $this->upload->initialize($config);
//
//                if ($this->upload->do_upload("file")) {
//
//                    $ext = explode(".", $_FILES["file"]['name']);
//                    $data_rr = array(
//                        "path" => $file_name . "." . $ext[1],
//                        "leave_id" => $leave_application_id
//                    );
//                    $this->leave_management_mod->saveUploadFile($data_rr);
//                }
//            }
//            //End of Upload Leave attachments area
//
//            $this->system_log->create_system_log("Leave Management", "Success", "New Leave Application Added " . $leave_application_id);
//            echo json_encode(array("status" => TRUE));
//        } else {
//            echo json_encode(array("status" => FALSE));
//        }
    }

    //.............. Leave Application Process - End .....................//

    public function process_leave_approval($id)
    {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }

        $user = $this->ion_auth->user()->row();
        $approval_status = $this->input->post('approval_status');
        $status_change_reason = $this->input->post('reason');
        $status_change_reason = !empty($status_change_reason) ? $status_change_reason : null;
        $where = array(
            'hr_pay_leave_applications.id' => $id
        );
        $data = array(
            'status' => $approval_status,
            '_updated_' => $this->currentTime,
            'reason' => $status_change_reason,
            'approve_user'=> $user->id

        );
        $leave_application_data = $this->leave_management_mod->get_leave_applications($where);
        $affected_rows = $this->leave_management_mod->update_leave_application($where, $data);

        if($leave_application_data->row()->leave_type_id==8 && ($approval_status=='Rejected' || $approval_status=='Cancelled')){
            $where_1 = array(
                'hr_pay_leave_days.leave_application' => $leave_application_data->row()->leave_application_id
            );
            $total_count_nw = array();
            $leave_application_days = $this->leave_management_mod->get_hr_pay_leave_days_new($where_1);

            foreach($leave_application_days as $leave_days)
            {
                if($leave_days->leave_day_type == "Full Day")
                {
                    $total_count_nw[]=1;
                }
                elseif($leave_days->leave_day_type  == "Half Day - Morning" || $leave_days->leave_day_type  == "Half Day - Afternoon" || $leave_days->leave_day_type  == "Half Day - Holiday")
                {
                    $total_count_nw[]=0.5;
                }
            }
            $leave_leave_n = $this->leave_management_mod->get_leave_leave_new($leave_application_data->row()->employee_id);

            for ($j = 0; $j < count($total_count_nw); $j++) {
                $this->leave_management_mod->update_leave_leave($leave_leave_n[$j]->id, 1);
                if ($leave_leave_n[$j]->liu_count == 0 && $total_count_nw[$j] == 1) {
                    $this->leave_management_mod->update_leave_leave_new($leave_leave_n[$j]->id, 1);
                } else {
                    if ($leave_leave_n[$j]->liu_count == 0.5 && $total_count_nw[$j] == 0.5) {
                        $this->leave_management_mod->update_leave_leave_new($leave_leave_n[$j]->id, 2);
                    } else {
                        $this->leave_management_mod->update_leave_leave_new($leave_leave_n[$j]->id, 3);
                    }
                }
            }
        }

        if($leave_application_data->row()->relate_join!=0){
            $get_relate_id = $this->leave_management_mod->get_relate_id($leave_application_data->row()->relate_join);

            $where_relate = array(
                'hr_pay_leave_applications.id' => $get_relate_id->hu_l_id
            );

            if($get_relate_id) {
                $data_relate = array(
                    'status' => $approval_status,
                    '_updated_' => $this->currentTime,
                    'reason' => $status_change_reason,
                    'approve_user' => $user->id

                );
                $affected_rows_relate = $this->leave_management_mod->update_relate_leave_application($where_relate, $data_relate);
                if ($affected_rows_relate == 1) {
                    $data = array(
                        'leave_application' => $get_relate_id->hu_l_id,
                        'user_id' => $user->id,
                        'status_from' => $leave_application_data->row()->status,
                        'status_to' => $approval_status,
                        'status_change_reason' => $status_change_reason,
                        '_created_' => $this->currentTime
                    );
                    $this->leave_management_mod->create_relate_leave_log($data);
                }
            }
        }

        if ($affected_rows == 1) {
            $data = array(
                'leave_application' => $id,
                'user_id' => $user->id,
                'status_from' => $leave_application_data->row()->status,
                'status_to' => $approval_status,
                'status_change_reason' => $status_change_reason,
                '_created_' => $this->currentTime
            );

            $leave_log_id = $this->leave_management_mod->create_leave_log($data);
            $this->system_log->create_system_log("Leave Management", "Success", "Leave application - #" . $id . "  Status " . $approval_status . " updated successfully Ref ID #" . $leave_log_id);

            $where1= array(
                'hr_pay_employees.id' => $leave_application_data->row()->employee_id,
            );

            $emp_data =  $this->leave_management_mod->get_employee_data_for_email($where1);
            $sup_data = $this->leave_management_mod->get_supervisor_data_y_emp(USER_ID);
//            if($sup_data = $this->leave_management_mod->get_supervisor_data_y_emp($emp_data->supervisor)) {
//
//
//                $data_2 = array(
//                    'leave_application' => $id,
//                    'leave_status' => $approval_status,
//                    'applied_person_first_name' => $emp_data->first_name,
//                    'applied_person_last_name' => $emp_data->last_name,
//                    'applied_person_employee_id' => $emp_data->employee_id,
//                    'status_change_person' => $sup_data->first_name.' '.$sup_data->last_name,
//                    'status_reason' => $status_change_reason
//                );
//
//                $message = $this->load->view($this->config->item('email_templates', 'ion_auth') . $this->config->item('hr_leave_approval_mail', 'ion_auth'), $data_2, true);
//                $this->email->clear();
//                $this->email->from($this->config->item('admin_email', 'ion_auth'), $this->config->item('site_title', 'ion_auth'));
//                $this->email->to($emp_data->office_email);
//                $this->email->cc($this->config->item('hr_email', 'ion_auth'),$sup_data->office_email);
//                $this->email->subject("Arrow HRMS - New Leave Approval Status - $emp_data->first_name $emp_data->last_name-$emp_data->employee_id");
//                $this->email->set_mailtype("html");
//                $this->email->message($message);
//
//                if ($this->email->send()) {
//
//                    $this->system_log->create_system_log("Leave Management", "Success", "Leave application - #" . $id . "  Status " . $approval_status . " updated successfully Ref ID #" . $leave_log_id."Send Email");
//
//                    echo json_encode(array(
//                        'status' => TRUE,
//                        'message' => "Leave application - $id $approval_status successfully.",
//                    ));
//                    exit;
//                }
//            }  else {

                $data_2 = array(
                    'leave_application' => $id,
                    'leave_status' => $approval_status,
                    'applied_person_first_name' => $emp_data->first_name,
                    'applied_person_last_name' => $emp_data->last_name,
                    'applied_person_employee_id' => $emp_data->employee_id,
                    'status_change_person' => $sup_data->first_name.' '.$sup_data->last_name,
                    'status_reason' => $status_change_reason
                );

                $message = $this->load->view($this->config->item('email_templates', 'ion_auth') . $this->config->item('hr_leave_approval_mail', 'ion_auth'), $data_2, true);
                $this->email->clear();
                $this->email->from($this->config->item('admin_email', 'ion_auth'), $this->config->item('site_title', 'ion_auth'));
                $this->email->to($emp_data->office_email);
                $this->email->cc($this->config->item('hr_email', 'ion_auth'));
                $this->email->subject("Arrow HRMS - Leave Status Update - $emp_data->first_name $emp_data->last_name-$emp_data->employee_id");
                $this->email->set_mailtype("html");
                $this->email->message($message);
                $this->email->send();

                $this->system_log->create_system_log("Leave Management", "Success", "Leave application - #" . $id . "  Status " . $approval_status . " updated successfully Ref ID #" . $leave_log_id."Send Email");

                echo json_encode(array(
                    'status' => TRUE,
                    'message' => "Leave application - $id $approval_status successfully.",
                ));
                exit;
//            }

        } else {
            $this->system_log->create_system_log("Leave Management", "Failed", "Failed to change the leave status of leave application " . $id);

            echo json_encode(array(
                'status' => FALSE,
                'message' => "Sorry, Failed to change the leave status of leave application - $id.",
            ));
            exit;
        }
    }

    public function ajax_get_leave_days_by_leave_application_id($leave_application_id)
    {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }

        $where = array(
            'hr_pay_leave_days.leave_application' => $leave_application_id
        );
        $leave_days_result = $this->leave_management_mod->get_hr_pay_leave_days($where);
        if ($this->leave_management_mod->get_leave_attachments(array('hr_pay_leave_attachment.leave_id' => $leave_application_id))) {
            $leave_attachment = $this->leave_management_mod->get_leave_attachments(array('hr_pay_leave_attachment.leave_id' => $leave_application_id));
        } else {
            $leave_attachment = 0;
        }

        if (!empty($leave_days_result)) {
            $leave_days = $leave_days_result->result();
            echo json_encode(array(
                'status' => true,
                'leave_application_id' => $leave_application_id,
                'leave_days' => $leave_days,
                'leave_attachment' => $leave_attachment
            ));
            exit;
        }
        echo json_encode(array(
            'status' => FALSE,
            'message' => "Sorry! Unable to find leave days."
        ));
        exit;
    }

    private function calculate_existing_leave_count($leave_employee_id, $leave_type_id, $period_start, $period_end, $leave_type_details)
    {

        //todo common only

//        $where = "employee = '$leave_employee_id' AND
//                leave_type = '$leave_type_id' AND
//                (start_date BETWEEN CAST('$period_start' AS DATE) AND CAST('$period_end' AS DATE)) AND
//                (hr_pay_leave_applications.status <> 'Cancelled' AND hr_pay_leave_applications.status <> 'Rejected')";
//        $leave_application_details = $this->leave_management_mod->get_leave_applications($where)->result();
//
//        $total_existing_leave_count = 0;
//        foreach ($leave_application_details as $leave_application) {
//            $where = array("leave_application" => $leave_application->leave_application_id);
//            $groupby = "leave_day_type";
//            $leave_day_count = $this->leave_management_mod->count_leave_days($where, $groupby)->result();
//            foreach ($leave_day_count as $leave_count) {
//                if ($leave_count->leave_day_type == "Full Day") {
//                    $total_existing_leave_count += $leave_count->leave_day_count * 1;
//                } elseif (preg_match("/^Half Day/", $leave_count->leave_day_type)) {
//                    $total_existing_leave_count += $leave_count->leave_day_count * 0.5;
//                } else {
//                    $total_existing_leave_count += 0;
//                }
//            }
//        }

        //todo common only

        //todo teckpack only
     if($leave_type_id!=8) {
         $where = "employee = '$leave_employee_id' AND
                leave_type = '$leave_type_id' AND
                (start_date BETWEEN CAST('$period_start' AS DATE) AND CAST('$period_end' AS DATE)) AND
                (hr_pay_leave_applications.status <> 'Cancelled' AND hr_pay_leave_applications.status <> 'Rejected')";
         $leave_application_details = $this->leave_management_mod->get_leave_applications($where)->result();

         $total_existing_leave_count = 0;
         foreach ($leave_application_details as $leave_application) {
             $where = array("leave_application" => $leave_application->leave_application_id);
             $groupby = "leave_day_type";
             $leave_day_count = $this->leave_management_mod->count_leave_days($where, $groupby)->result();
             foreach ($leave_day_count as $leave_count) {
                 if ($leave_count->leave_day_type == "Full Day") {
                     $total_existing_leave_count += $leave_count->leave_day_count * 1;
                 } elseif (preg_match("/^Half Day/", $leave_count->leave_day_type)) {
                     $total_existing_leave_count += $leave_count->leave_day_count * 0.5;
                 } else {
                     $total_existing_leave_count += 0;
                 }
             }
         }
     }else{

         $dateeee = date('Y-m-d', strtotime('first day of january this year'));
         $ldata = $this->leave_settings_mod->get_leave_period_data($dateeee);

         $leave_period_of_leave_start_day = $this->leave_settings_mod->get_leave_period(array('period_start <=' => $ldata->period_start, 'period_end >=' => $ldata->period_end), "month")->row();

         $leave_period = $leave_period_of_leave_start_day;
         $total_existing_leave_count = $this->leave_management_mod->get_liu_leave_count($leave_employee_id,$leave_period->period_start,$leave_period->period_end)->liu;

     }
        //todo teckpack only

        return $total_existing_leave_count;
    }

//todo teckpack only
    private function calculate_taken_liue($leave_employee_id)
    {

            $dateeee = date('Y-m-d', strtotime('first day of january this year'));
            $ldata = $this->leave_settings_mod->get_leave_period_data($dateeee);

            $leave_period_of_leave_start_day = $this->leave_settings_mod->get_leave_period(array('period_start <=' => $ldata->period_start, 'period_end >=' => $ldata->period_end), "month")->row();

            $leave_period = $leave_period_of_leave_start_day;
        $total_taken_liue_count = $this->leave_management_mod->get_liu_leave_count_1($leave_employee_id,$leave_period->period_start,$leave_period->period_end)->liu;


        return $total_taken_liue_count;
    }
    //todo teckpack only

    private function _validate_required($required_data)
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        foreach ($required_data as $key) {
            $post = $this->input->post($key);
            if (empty($post)) {
                $data['inputerror'][] = $key;
                $data['error_string'][] = 'This is required';
                $data['status'] = FALSE;
            }
        }

        if ($data['status'] === FALSE) {
            echo json_encode($data);
            exit();
        }
    }


    //Leave Report Data
    public function filter_leave_data()
    {

        $details = $this->input->post();
        $from_date = $details['from_date'];
        $to_date = $details['to_date'];
        $emp_id = $details['emp_id'];

        if ((empty($from_date)) && (empty($to_date))) {
            echo json_encode(array(
                'status' => false,
                'message' => "Unable to get data."
            ));
        }

        $supervisor = USER_ID;
//        $groups = array('admin,');
        $groups = array('admin', 'hr_manager');
        if ($this->ion_auth->in_group($groups)) {
            $supervisor = 0;
        }

        $data['from_date'] = $from_date;
        $data['to_date'] = $to_date;
        $data['emp_id'] = $emp_id;

        $data['Leave_data'] = $this->leave_management_mod->get_leave_details($from_date, $to_date, $emp_id, $supervisor);


        $this->load->view('leave/load_leave_filter_data', $data);

    }

    public function get_bal_leave_data()
    {

        $details = $this->input->post();
        $from_date = $details['from_date'];
        $to_date = $details['to_date'];
        $emp_id = $details['emp_id'];

        if ((empty($from_date)) && (empty($to_date))) {
            echo json_encode(array(
                'status' => false,
                'message' => "Unable to get data."
            ));
        }

        $supervisor = USER_ID;
        $groups = array('admin');
        if ($this->ion_auth->in_group($groups)) {
            $supervisor = 0;
        }

        $data['from_date'] = $from_date;
        $data['to_date'] = $to_date;
        $data['emp_id'] = $emp_id;


        $data['pay_month_start_date'] = $from_date;
        $data['pay_month_end_date'] = $to_date;

        //$data['Leave_data'] = $this->leave_management_mod->get_leave_details($from_date,$to_date,$emp_id,$supervisor);
        $data['att_data'] = $this->leave_management_mod->get_attendance_details_by_data($from_date, $to_date, $emp_id, $supervisor);
        $data['emp_Data'] = $this->leave_management_mod->get_attendance_details_emps($from_date, $to_date, $emp_id, $supervisor);

        $this->load->view('leave/load_leave_bal_report', $data);

    }

    //Leave Balance Display

    public function load_leave_balances()
    {

        $id = $this->input->post('emp_id');
        $leave_id = $this->input->post('leave_id');

        $emp = $this->leave_management_mod->get_employee_info($id);

        //define variable for joined date entitlement
        $entitlement_for_joined = 0;
        $state = 0;

//        if($emp->emp_category) {

            //previous year get from leave period start date
            $current_year=date('Y');
            $previous_year=date('Y',strtotime($current_year))- 1;
            $joined_year = date('Y',strtotime($emp->joined_date));
            $confirmed_year = date('Y',strtotime($emp->confirmed_date));

        $emp_data = $this->leave_settings_mod->getSingleEmployeeData($id);
        $where_rules = array(
            'leave_type_id' => $leave_id,
            'employee_category' => $emp_data->emp_category,
            'employment_status' => $emp_data->emp_status,
            'leave_act' => ($emp_data->leave_category==1)?'Shop and Office':'Wages Board'
        );

        if ($leave_rule_type_details = $this->leave_settings_mod->get_leave_rule($where_rules)->row()) {
            $leave_type_details = $leave_rule_type_details;
            $state =1;
        } else {
            $leave_type_details = $this->leave_settings_mod->get_leave_type(array('hr_pay_leave_types.leave_type_id' => $leave_id))->row();
            $state =2;
        }


        if($leave_type_details->propotionate_on_joined_date == "Yes"){

            //check employee joined date in current year
            if(date('Y') == date('Y',strtotime($emp->joined_date))){
                $period_start = $emp->joined_date;
                $period_end = date('Y').'-12-31';
            }
            else{
                $period_start = date('Y').'-01-01';
                $period_end = date('Y').'-12-31';
            }
        }else{

            $period_start = date('Y').'-01-01';
            $period_end = date('Y').'-12-31';
        }

        if($state==1) {

            if ($leave_type_details->propotionate_on_joined_date == 'No') {
                if($emp_data->leave_category==1){

//                $period_start = date('Y') . '-01-01';
//                $period_end = date('Y') . '-12-31';

                if ($leave_id == 4) {

                    if ($leave_type_details->employment_status == 1) {

                        $total_existing_casual = $this->calculate_existing_leave_count($id, $leave_id, $period_start, $period_end, $leave_type_details);

                        $diff2 = round(round(strtotime(date('Y-m')) - strtotime(date('Y-m', strtotime($emp->joined_date)))) / 60 / 60 / 60 / 12);
                        $month_diff2 = explode('.', $diff2);
                        $temp_casual = (0.5 * ($month_diff2[0])) + 0.5;

                        $leave_entitlement = $temp_casual;
                        $avail_leave_bal = $leave_entitlement - $total_existing_casual;

                    } elseif ($leave_type_details->employment_status == 4) {

                        $leave_entitlement = $leave_type_details->leaves_per_period;
                        $total_existing_casual = $this->calculate_existing_leave_count($id, $leave_id, $period_start, $period_end, $leave_type_details);
                        $avail_leave_bal = $leave_entitlement - $total_existing_casual;

                    }

                } elseif ($leave_id == 2) {

                    if ($leave_type_details->employment_status == 4) {
                        $total_existing_casual = $this->calculate_existing_leave_count($id, $leave_id, $period_start, $period_end, $leave_type_details);
                        if ($previous_year == $confirmed_year && $emp->confirmed_date != '0000-00-00') {

                            if ($ent = $this->leave_management_mod->hr_pay_m_leave_entitlement($emp->emp_category, $leave_id)) {

                                //check joined date
                                //1st Jan - 31st Mar ----> 14 days Annual
                                //1st Jan - 31st Mar ----> 10 days Annual
                                //1st Jan - 31st Mar ----> 07 days Annual
                                //1st Oct - 31st Dec ----> 04 days Annual
                                foreach ($ent as $ent1) {

                                    if (strtotime($previous_year . "-" . $ent1->from) <= strtotime($emp->confirmed_date) && strtotime($previous_year . "-" . $ent1->to) >= strtotime($emp->confirmed_date)) {
                                        $entitlement_for_joined = $ent1->num_of_leaves;
                                    }
                                }
                                $leave_entitlement = $entitlement_for_joined;
                            }
                        } elseif ($previous_year > $confirmed_year && $emp->confirmed_date != '0000-00-00') {

                            $leave_entitlement = $leave_type_details->leaves_per_period;
                        }
                        $avail_leave_bal = $leave_entitlement - $total_existing_casual;
                    }
                } else {
                    if ($leave_type_details->employment_status == 4) {

                        $leave_entitlement = $leave_type_details->leaves_per_period;
                        $total_existing_leave_count = $this->calculate_existing_leave_count($id, $leave_id, $period_start, $period_end, $leave_type_details);
                        $avail_leave_bal = $leave_entitlement - $total_existing_leave_count;
                        $total_existing_casual = $total_existing_leave_count;
                    }
                }
            }else{
//                    $period_start = date('Y') . '-01-01';
//                    $period_end = date('Y') . '-12-31';
                    $total_existing_casual = $this->calculate_existing_leave_count($id, $leave_id, $period_start, $period_end, $leave_type_details);

                    $avail_leave_bal = $leave_type_details->leaves_per_period - $total_existing_casual;
                    $leave_entitlement = $leave_type_details->leaves_per_period;

                }

            } elseif ($leave_type_details->propotionate_on_joined_date == 'Yes') {

//                $period_start = date('Y') . '-01-01';
//                $period_end = date('Y') . '-12-31';
                $total_existing_casual = $this->calculate_existing_leave_count($id, $leave_id, $period_start, $period_end, $leave_type_details);

                $avail_leave_bal = $leave_type_details->leaves_per_period - $total_existing_casual;
                $leave_entitlement = $leave_type_details->leaves_per_period;
            }

        }elseif ($state==2) {
//            $period_start = date('Y') . '-01-01';
//            $period_end = date('Y') . '-12-31';
            if($emp_data->leave_category==1){

            if ($leave_id == 4) {

                if ($emp->emp_status == 1) {

                    $total_existing_casual = $this->calculate_existing_leave_count($id, $leave_id, $period_start, $period_end, $leave_type_details);

                    $diff2 = round(round(strtotime(date('Y-m')) - strtotime(date('Y-m', strtotime($emp->joined_date)))) / 60 / 60 / 60 / 12);
                    $month_diff2 = explode('.', $diff2);
                    $temp_casual = (0.5 * ($month_diff2[0])) + 0.5;

                    $leave_entitlement = $temp_casual;
                    $avail_leave_bal = $leave_entitlement - $total_existing_casual;

                } elseif ($emp->emp_status == 4) {

                    $leave_entitlement = $leave_type_details->leaves_per_period;
                    $total_existing_casual = $this->calculate_existing_leave_count($id, $leave_id, $period_start, $period_end, $leave_type_details);
                    $avail_leave_bal = $leave_entitlement - $total_existing_casual;

                }

            } elseif ($leave_id == 2) {

                if ($emp->emp_status == 4) {
                    $total_existing_casual = $this->calculate_existing_leave_count($id, $leave_id, $period_start, $period_end, $leave_type_details);
                    if ($previous_year == $confirmed_year && $emp->confirmed_date != '0000-00-00') {

                        if ($ent = $this->leave_management_mod->hr_pay_m_leave_entitlement($emp->emp_category, $leave_id)) {

                            //check joined date
                            //1st Jan - 31st Mar ----> 14 days Annual
                            //1st Jan - 31st Mar ----> 10 days Annual
                            //1st Jan - 31st Mar ----> 07 days Annual
                            //1st Oct - 31st Dec ----> 04 days Annual
                            foreach ($ent as $ent1) {

                                if (strtotime($previous_year . "-" . $ent1->from) <= strtotime($emp->confirmed_date) && strtotime($previous_year . "-" . $ent1->to) >= strtotime($emp->confirmed_date)) {
                                    $entitlement_for_joined = $ent1->num_of_leaves;
                                }
                            }
                            $leave_entitlement = $entitlement_for_joined;
                        }
                    } elseif ($previous_year > $confirmed_year && $emp->confirmed_date != '0000-00-00') {

                        $leave_entitlement = $leave_type_details->leaves_per_period;
                    }
                    $avail_leave_bal = $leave_entitlement - $total_existing_casual;
                }
            } else {

                $total_existing_leave_count = $this->calculate_existing_leave_count($id, $leave_id, $period_start, $period_end, $leave_type_details);
                $total_taken_leave = $this->calculate_taken_liue($id);
                if ($leave_id != 8) {
                    if ($emp->emp_status == 4) {
                        $leave_entitlement = $leave_type_details->leaves_per_period;
                        $avail_leave_bal = $leave_entitlement - $total_existing_leave_count;
                        $total_existing_casual = $total_existing_leave_count;
                    }
                } else {
                    $avail_leave_bal = $total_existing_leave_count;
                    $total_existing_casual = $total_taken_leave;
                    $leave_entitlement = 0;
                }

            }
        }else{
                $total_existing_leave_count = $this->calculate_existing_leave_count($id, $leave_id, $period_start, $period_end, $leave_type_details);
                $total_taken_leave = $this->calculate_taken_liue($id);
                if ($leave_id != 8) {
                        $leave_entitlement = $leave_type_details->leaves_per_period;
                        $avail_leave_bal = $leave_entitlement - $total_existing_leave_count;
                        $total_existing_casual = $total_existing_leave_count;
                } else {
                    $avail_leave_bal = $total_existing_leave_count;
                    $total_existing_casual = $total_taken_leave;
                    $leave_entitlement = 0;
                }
            }

        }

            //check joined date with current leave period
            //if true assign half day per month
//            if($current_year == $joined_year){
//                //TODO~~~~~kreston~~~~only~~~~~~~##############
//                if($leave_id == 4){
//
//                    $period_start = date('Y').'-01-01';
//                    $period_end = date('Y').'-12-31';
//
//                    $leave_type_details = $this->leave_settings_mod->get_leave_type(array('hr_pay_leave_types.leave_type_id' => $leave_id))->row();
//
//                    $total_existing_casual = $this->calculate_existing_leave_count($id, $leave_id, $period_start, $period_end, $leave_type_details);
//
//                    $diff2 = round(round(strtotime(date('Y-m'))-strtotime(date('Y-m',strtotime($emp->joined_date))))/60/60/60/12);
//                    $month_diff2 = explode('.',$diff2);
//
//                    $temp_casual = (0.5*($month_diff2[0]))+0.5;
//
//                    $temp_casual_new = $temp_casual-$total_existing_casual;
//
//                    $entitlement_for_joined = 500;
//                    $entitlement_casual_temp = $temp_casual;
//
//                }
//                //TODO~~~~~kreston~~~~only~~~~~~~##############
//
//            }
//            //if true assign annual leave according to the joined date
//            else if(($current_year > $confirmed_year) && ($confirmed_year == $previous_year)){
//
//                if($ent = $this->leave_management_mod->hr_pay_m_leave_entitlement($emp->emp_category, $leave_id)) {
//
//                    //check joined date
//                    //1st Jan - 31st Mar ----> 14 days Annual
//                    //1st Jan - 31st Mar ----> 10 days Annual
//                    //1st Jan - 31st Mar ----> 07 days Annual
//                    //1st Oct - 31st Dec ----> 04 days Annual
//                    foreach ($ent as $ent1){
//
//                        if(strtotime($previous_year . "-" . $ent1->from) <= strtotime($emp->confirmed_date) && strtotime($previous_year . "-" . $ent1->to) >= strtotime($emp->confirmed_date)){
//                            $entitlement_for_joined = $ent1->num_of_leaves;
//                        }
//                    }
//                }
//
//            }
//            //if true assign full annual leave
//            else if(($current_year > $joined_year) && ($joined_year < $previous_year)){
//
//            }
//        }

//        $emp_data = $this->leave_settings_mod->getSingleEmployeeData($id);
//        $where_rules = array(
//            'leave_type_id' => $leave_id,
//            'employee_category' => $emp_data->emp_category,
//            'employment_status' => $emp_data->emp_status
//        );
//
//        if ($leave_rule_type_details = $this->leave_settings_mod->get_leave_rule($where_rules)->row()) {
//            $leave_type_details = $leave_rule_type_details;
//        } else {
//            $leave_type_details = $this->leave_settings_mod->get_leave_type(array('hr_pay_leave_types.leave_type_id' => $leave_id))->row();
//        }

        $leave_start_date = date('Y-m-d', strtotime('first day of january this year'));
        $leave_end_date = date('Y-m-d', strtotime('last day of december this year'));

        $leave_period_data = $this->leave_settings_mod->get_leave_period(array('period_start <=' => $leave_start_date, 'period_end >=' => $leave_end_date), "month")->row();

        $period_start = $leave_period_data->period_start;
        $period_end = $leave_period_data->period_end;

        //TODO Kreston~~~~only~~~~~~~~~~~~~~~~~
//        if ($entitlement_for_joined > 0 && $entitlement_for_joined < 500) {
//            $leave_entitlement = $entitlement_for_joined;
//        }
//        else if($entitlement_for_joined == 500){
//            $leave_entitlement = $entitlement_casual_temp;
//        }
//        else {
//            if($current_year == $joined_year){
//            $leave_entitlement = 0;
//            }else{
//                $leave_entitlement = $leave_type_details->leaves_per_period;
//            }
//        }
        //TODO Kreston~~~~only~~~~~~~~~~~~~~~~~

//        $leave_entitlement = $leave_type_details->leaves_per_period;
//        $total_existing_leave_count = $this->calculate_existing_leave_count($id, $leave_id, $period_start, $period_end, $leave_type_details);
////
//        $total_taken_leave = $this->calculate_taken_liue($id);
////
//        if($leave_id!=8) {
//            $avail_leave_bal = $leave_entitlement - $total_existing_leave_count;
//            $total_existing_casual = $total_existing_leave_count;
//        }else{
//
//            $avail_leave_bal = $total_existing_leave_count;
//            $total_existing_casual = $total_taken_leave;
//        }


        $output = array(
            "leave_entitlement" => $leave_entitlement,
            "leave_taken" => $total_existing_casual,
            "leave_balance" => $avail_leave_bal,
            "leave_period" => $period_start . " - " . $period_end,
            "status" => 'true',
        );

//        if ($leave_entitlement) {
//            if($entitlement_for_joined > 200){
//
//                $output = array(
//                    "leave_entitlement" => $entitlement_casual_temp,
//                    "leave_taken" => $total_existing_casual,
//                    "leave_balance" => $temp_casual_new,
//                    "leave_period" => $leave_period_data->period_start . " - " . $leave_period_data->period_end,
//                    "status" => 'true',
//                );
//            }
//            else {
//
//                $output = array(
//                    "leave_entitlement" => $leave_entitlement,
//                    "leave_taken" => $taken_leave,
//                    "leave_balance" => $avail_leave_bal,
//                    "leave_period" => $leave_period_data->period_start . " - " . $leave_period_data->period_end,
//                    "status" => 'true',
//                );
//            }
//
//
//        } else {
//
//            $output = array(
//                "leave_entitlement" => $leave_entitlement,
//                "leave_taken" => $taken_leave,
//                "leave_balance" => $avail_leave_bal,
//                "leave_period" => $leave_period_data->period_start . " - " . $leave_period_data->period_end,
//                "status" => 'false',
//            );
//
//        }

        echo json_encode($output);
    }

    public function run_past_leave_balance()
    {
        $all_emp = $this->leave_settings_mod->get_employess();
        foreach ($all_emp as $emp) {
            $leave_days = $this->leave_settings_mod->get_relavant_leave($emp->id);
            foreach ($leave_days as $leave) {
                if($leave->anual>0){
                    $date_1 ='2019-06-01';
                    $number1 = explode(".",$leave->anual);

                    $date_11 = $date_1;
                    if($number1[0]>0) {
                        for ($i = 1; $i < $number1[0]; $i++) {
                            $date_1 = date('Y-m-d',strtotime("+1 day", strtotime($date_1)));
                        }

                        if($number1[1]>0){
                            $date_1 = date('Y-m-d',strtotime("+1 day", strtotime($date_1)));
                        }
                        $data = array(
                            'employee'=>$emp->id,
                            'leave_type'=>2,
                            'start_date'=>$date_11,
                            'end_date'=>$date_1,
                            'applied_by'=>$emp->id,
                            'status'=>'Approved'
                            );
                        $this->db->insert('hr_pay_leave_applications', $data);
                        $first_id_1 = $this->db->insert_id();

                        for ($i = 0; $i < $number1[0]; $i++) {
                            $data = array(
                                'leave_application'=>$first_id_1,
                                'leave_date'=>$date_11,
                                'leave_day_type'=>'Full Day'
                            );
                            $this->db->insert('hr_pay_leave_days', $data);
                            $date_11 = date('Y-m-d',strtotime("+1 day", strtotime($date_11)));
                        }
                        if($number1[1]>0){

                            $data = array(
                                'leave_application'=>$first_id_1,
                                'leave_date'=>$date_11,
                                'leave_day_type'=>'Half Day - Morning'
                            );
                            $this->db->insert('hr_pay_leave_days', $data);
                        }
                    }else{
                        $data = array(
                            'employee'=>$emp->id,
                            'leave_type'=>2,
                            'start_date'=>$date_11,
                            'end_date'=>$date_11,
                            'applied_by'=>$emp->id,
                            'status'=>'Approved'
                        );
                        $this->db->insert('hr_pay_leave_applications', $data);
                        $first_id_1 = $this->db->insert_id();
                            $data = array(
                                'leave_application'=>$first_id_1,
                                'leave_date'=>$date_11,
                                'leave_day_type'=>'Half Day - Morning'
                            );
                            $this->db->insert('hr_pay_leave_days', $data);
                    }
                }
                if ($leave->casual>0){
                    $date_2 ='2019-07-01';
                    $number2 = explode(".",$leave->casual);
                    $date_22 = $date_2;
                    if($number2[0]>0) {
                        for ($t = 1; $t < $number2[0]; $t++) {
                            $date_2 = date('Y-m-d',strtotime("+1 day", strtotime($date_2)));
                        }

                        if($number2[1]>0){
                            $date_2 = date('Y-m-d',strtotime("+1 day", strtotime($date_2)));
                        }
                        $data = array(
                            'employee'=>$emp->id,
                            'leave_type'=>4,
                            'start_date'=>$date_22,
                            'end_date'=>$date_2,
                            'applied_by'=>$emp->id,
                            'status'=>'Approved'
                        );
                        $this->db->insert('hr_pay_leave_applications', $data);
                        $first_id_2 = $this->db->insert_id();

                        for ($t = 0; $t < $number2[0]; $t++) {
                            $data = array(
                                'leave_application'=>$first_id_2,
                                'leave_date'=>$date_22,
                                'leave_day_type'=>'Full Day'
                            );
                            $this->db->insert('hr_pay_leave_days', $data);
                            $date_22 = date('Y-m-d',strtotime("+1 day", strtotime($date_22)));
                        }
                        if($number2[1]>0){

                            $data = array(
                                'leave_application'=>$first_id_2,
                                'leave_date'=>$date_22,
                                'leave_day_type'=>'Half Day - Morning'
                            );
                            $this->db->insert('hr_pay_leave_days', $data);
                        }
                    }else{
                        $data = array(
                            'employee'=>$emp->id,
                            'leave_type'=>4,
                            'start_date'=>$date_22,
                            'end_date'=>$date_22,
                            'applied_by'=>$emp->id,
                            'status'=>'Approved'
                        );
                        $this->db->insert('hr_pay_leave_applications', $data);
                        $first_id_2 = $this->db->insert_id();
                        $data = array(
                            'leave_application'=>$first_id_2,
                            'leave_date'=>$date_22,
                            'leave_day_type'=>'Half Day - Morning'
                        );
                        $this->db->insert('hr_pay_leave_days', $data);
                    }

                }
                if ($leave->maternity>0){
                    $date_3 ='2019-03-01';
                    $number3 = explode(".",$leave->maternity);
                    $date_33 = $date_3;
                    if($number3[0]>0) {
                        for ($s = 1; $s < $number3[0]; $s++) {
                            $date_3 = date('Y-m-d',strtotime("+1 day", strtotime($date_3)));
                        }

                        if($number3[1]>0){
                            $date_3 = date('Y-m-d',strtotime("+1 day", strtotime($date_3)));
                        }
                        $data = array(
                            'employee'=>$emp->id,
                            'leave_type'=>5,
                            'start_date'=>$date_33,
                            'end_date'=>$date_3,
                            'applied_by'=>$emp->id,
                            'status'=>'Approved'
                        );
                        $this->db->insert('hr_pay_leave_applications', $data);
                        $first_id_3 = $this->db->insert_id();

                        for ($s = 0; $s < $number3[0]; $s++) {
                            $data = array(
                                'leave_application'=>$first_id_3,
                                'leave_date'=>$date_33,
                                'leave_day_type'=>'Full Day'
                            );
                            $this->db->insert('hr_pay_leave_days', $data);
                            $date_33 = date('Y-m-d',strtotime("+1 day", strtotime($date_33)));
                        }
                        if($number2[1]>0){

                            $data = array(
                                'leave_application'=>$first_id_3,
                                'leave_date'=>$date_33,
                                'leave_day_type'=>'Half Day - Morning'
                            );
                            $this->db->insert('hr_pay_leave_days', $data);
                        }
                    }else{
                        $data = array(
                            'employee'=>$emp->id,
                            'leave_type'=>5,
                            'start_date'=>$date_33,
                            'end_date'=>$date_33,
                            'applied_by'=>$emp->id,
                            'status'=>'Approved'
                        );
                        $this->db->insert('hr_pay_leave_applications', $data);
                        $first_id_3 = $this->db->insert_id();
                        $data = array(
                            'leave_application'=>$first_id_3,
                            'leave_date'=>$date_33,
                            'leave_day_type'=>'Half Day - Morning'
                        );
                        $this->db->insert('hr_pay_leave_days', $data);
                    }

                }

            }

        }

    }

}