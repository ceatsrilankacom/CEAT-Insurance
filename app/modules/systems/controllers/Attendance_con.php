<?php

class Attendance_con extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library('ion_auth');

        // check if user logged in
        if (!$this->ion_auth->logged_in()) {
            redirect('index.php/auth/login');
        }
//        ini_set('display_errors', 0);
        /*ini_set('display_startup_errors',1);
        ini_set('display_errors',1);
        error_reporting(-1);*/

        $this->load->model('leave_settings_mod');
        $this->load->model('file_upload_mod');
        $this->load->model('attendance_mod');
        $this->load->library('permissions');
        $this->load->library('system_log');
    }
    function index()
    {
        $this->permissions->check_permission('access');

        $data['department'] = $this->attendance_mod->getEmpcategories();
        $data['employee'] = $this->attendance_mod->getAllEmployee();
        $data['leave_type'] = $this->leave_settings_mod->get_leave_type();
        $data['attendance'] = $this->attendance_mod->getAttendance();
        $data['employee_cat'] = $this->attendance_mod->emp_cat();
        $data['emp_departments'] = $this->attendance_mod->getDepartment();

        $this->load->view('common/header');
        $this->load->view('attendance/attendance', $data);
        $this->load->view('common/footer');
    }


    /*function attendance_search_bkp()
    {

        if ($this->input->post('from_date')&&$this->input->post('to_date')&&$this->input->post('department')) {
            $datendept = $this->input->post();
            $data['employee'] = $this->attendance_mod->getAllEmployee();
            $data['leave_type'] = $this->leave_settings_mod->get_leave_type();
            $data['attendance'] = $this->attendance_mod->getAttendanceByDate($datendept['from_date'],$datendept['to_date'],$datendept['department']);

            $data['from_date'] = $this->input->post('from_date');
            $data['to_date'] = $this->input->post('to_date');
            $data['department'] = $this->input->post('department');

            $this->load->view('attendance/load_att', $data);
        }
    }*/

    function attendance_search()
    {

        if ($this->input->post('select_date')&&$this->input->post('department')) {
            $datendept = $this->input->post();
            $data['employee'] = $this->attendance_mod->getAllEmployee();
            $data['leave_type'] = $this->leave_settings_mod->get_leave_type();
            $data['attendance'] = $this->attendance_mod->getAttendanceByDate($datendept['select_date'],$datendept['department']);

            $data['select_date'] = $this->input->post('select_date');
            $data['department'] = $this->input->post('department');

            $this->load->view('attendance/load_att', $data);
        }
    }

    function attendance_search_emp()
    {
        if ($this->input->post('startDate')&&$this->input->post('endDate')&&$this->input->post('employee')) {
            $datendept = $this->input->post();
            $data['leave_type'] = $this->leave_settings_mod->get_leave_type();
            $data['attendance'] = $this->attendance_mod->getEmpAttendanceByDateRange($datendept['startDate'],$datendept['endDate'],$datendept['employee']);
            $data['startDate'] = $this->input->post('startDate');
            $data['endDate'] = $this->input->post('endDate');
            $data['employee'] = $this->attendance_mod->getEmployeeByMainId($datendept['employee']);
            $this->load->view('attendance/load_att_emp', $data);
        }
    }

    function update_register()
    {
        /*$work_hour_head = WORK_HOURS;
        $start_time_hed = START_TIME;
        $end_time = END_TIME;
        $late_time_hed = LATE_LA;
        $late_time_er = LATE_EL;
        $halfday_time_mo = HALF_D_TIME_MO;
        $halfday_time_ev = HALF_D_TIME_EV;*/

        if ($this->input->post('app_ot_array')) {
            $app_ot_array = $this->input->post('app_ot_array');

                for ($oo = 0; $oo < sizeof($app_ot_array); $oo++) {

                        $late_count = 0;
                        $LA_time = 0;
                        $EL_time = 0;
                        $LA = 0;
                        $EL = 0;
                        $NL = 0;
                        $HD = 0;
                        $SLM = 0;
                        $SLE = 0;
                        $ot = 0;
                        $wd = 0;

                    $data_app = explode("^", $app_ot_array[$oo]);
                    $update_date = date('Y-m-d', strtotime($data_app[7].' '.$data_app[2]));

                    $app_ot = $data_app[1];
                    $day_type = date('l', strtotime($data_app[7].' '.$data_app[2]));
//                    $new_in_time = explode(' ',$data_app[2]);
//                    $new_out_time = explode(' ',$data_app[3]);
                    $new_in_time = $data_app[7];
                    $new_out_time =$data_app[7];
                    $select_date = explode(' ',$data_app[5]);
                    $work_week_data = $this->file_upload_mod->check_work_week($day_type);
                    $emp_Data = $this->attendance_mod->getEmployeeByMainId($data_app[4]);
                    $EmpCatData = $this->attendance_mod->getEmpCatDatabyEmp($emp_Data->emp_category);

                    if($shift_data = $this->file_upload_mod->get_emp_cate_shift_schedule($emp_Data->emp_category)){
                        $work_hour_head = $shift_data->schedule_work_hours;
                        $start_time_hed = $shift_data->schedule_start_time;
                        $end_time = $shift_data->schedule_end_time;
                        $late_time_hed = $shift_data->late_time_LA;
                        $late_time_er = $shift_data->late_time_EL;

                        //start holiday morning end, early late and evening start,late
                        $start_time_hed_hol = $shift_data->holiday_evening_start;
                        $end_time_hol = $shift_data->holiday_morning_end;
                        $late_time_hed_hol = $shift_data->holiday_evening_late;
                        $late_time_er_hol = $shift_data->holiday_morning_er_late;
                        //end holiday morning end, early late and evening start,late

                        $halfday_time_mo = $shift_data->halfday_time_mo;
                        $halfday_time_ev = $shift_data->halfday_time_ev;
                    } else{
                        $work_hour_head = WORK_HOURS;
                        $work_hour_halfday = HALF_WORK_HOURS;
                        $start_time_hed = START_TIME;
                        $end_time = END_TIME;
                        $late_time_hed = LATE_LA;
                        $late_time_er = LATE_EL;
                        $halfday_time_mo = HALF_D_TIME_MO;
                        $halfday_time_ev = HALF_D_TIME_EV;

                        //start holiday morning end, early late and evening start,late
                        $start_time_hed_hol = holiday_evening_start;
                        $end_time_hol = holiday_morning_end;
                        $late_time_hed_hol = holiday_evening_late;
                        $late_time_er_hol = holiday_morning_er_late;
                        //end holiday morning end, early late and evening start,late

                        // halfday time check
                        $halfday_work_end = HALF_WORK_STEND;
                    }

                    $halfday_check_time = strtotime($new_in_time . ' ' . $halfday_work_end);

                    $att_new_in_time = strtotime($data_app[7].' '.$data_app[2]);  //in time
                    $att_new_out_time = strtotime($data_app[7].' '.$data_app[3]); //out time
                    $att_new_settings_start_time = strtotime($new_in_time. ' ' . $start_time_hed); // start time
                    $att_new_settings_end_time = strtotime($new_out_time . ' ' . $end_time); // end time
                    $att_new_settings_late_time = strtotime($new_out_time . ' ' . $late_time_hed); // late time
                    $att_new_settings_late_time_el = strtotime($new_out_time . ' ' . $late_time_er); // late time early

                    $att_new_settings_start_time_hol = strtotime($new_in_time . ' ' . $start_time_hed_hol); // start time holiday evening
                    $att_new_settings_end_time_hol = strtotime($new_in_time . ' ' . $end_time_hol); // end time holiday morning
                    $att_new_settings_late_time_hol = strtotime($new_out_time . ' ' . $late_time_hed_hol); // late time holiday
                    $att_new_settings_late_time_el_hol = strtotime($new_out_time . ' ' . $late_time_er_hol); // late time early holiday

                    $att_new_settings_half_time_er = strtotime($new_out_time . ' ' . $halfday_time_ev);
                    $new_late_time_date_time = strtotime($new_in_time.' '.$late_time_hed);
                    $new_halfday_time_mo_date_time = strtotime($new_in_time.' '.$halfday_time_mo);
                    $new_halfday_time_ev_date_time = strtotime($new_in_time.' '.$halfday_time_ev);

                        //get date different
                        $diff = explode('.',($att_new_out_time-$att_new_settings_start_time)/3600);
                        $diff1 = ($att_new_out_time - $att_new_settings_start_time)/3600;
                        $diff2 = ($att_new_settings_end_time - $att_new_in_time)/3600;
                    $morning_halfday_count = ($halfday_check_time - $att_new_settings_start_time)/3600;
                    $evening_halfday_count = ($att_new_settings_end_time - $halfday_check_time)/3600;
                    $min = explode('.',(($att_new_out_time-$att_new_settings_start_time)%3600)/60);

                        $working_hour = ($att_new_out_time-$att_new_in_time)/3600;

                    if($work_week_data->status=="Full Day" || $work_week_data->status=="Half Day" ) {

                        if (!$this->file_upload_mod->check_date($new_out_time)) {

                            if(($att_new_in_time>$att_new_settings_start_time)&&($att_new_in_time<=$new_halfday_time_mo_date_time)&&($att_new_in_time>$new_late_time_date_time)){
                                //SHORT LEAVE MO
                                $SLM = "1";
                            }
                            if(($att_new_out_time<$att_new_settings_end_time)&&($att_new_out_time>$new_halfday_time_ev_date_time)&&($att_new_out_time<$att_new_settings_late_time_el)){
                                //SHORT LEAVE EV
                                $SLE = "1";
                            }
                            if(($att_new_in_time>$att_new_settings_start_time)&&($att_new_in_time<=$new_late_time_date_time)){
                                //Late MO
                                $LA_time += (($att_new_in_time-$att_new_settings_start_time)%3600)/60;
                                $LA = '1';
                                $late_count++;
                            }
                            if(($att_new_out_time<$att_new_settings_end_time)&&($att_new_out_time>=$att_new_settings_late_time_el)){
                                //Late EV
                                $EL_time += (($att_new_settings_end_time-$att_new_out_time)%3600)/60;
                                $EL = '1';
                                $late_count++;
                            }
                            if((($att_new_in_time>$att_new_settings_start_time)&&($att_new_in_time>$new_halfday_time_mo_date_time))){
                                //HalfDay MO
                                $HD_M =1;
                            }
                            if((($att_new_out_time<$att_new_settings_end_time)&&($att_new_out_time<=$new_halfday_time_ev_date_time)&&($att_new_out_time>$new_halfday_time_mo_date_time))){
                                //HalfDay EV
                                $HD_E =1;
                            }

                            if ((float)$working_hour >= $work_hour_head && (float)$diff2 > $work_hour_head ) {
                                //OT
                                if($EmpCatData->ot_applicable=="YES") {
                                    if ($min[0] >= 30) {
                                        if (((float)($diff[0] + 0.5) - $work_hour_head) >= 1) {
                                            $ot = ((float)($diff[0] + 0.5) - $work_hour_head);
                                        } else if (((float)($diff[0] + 0.5) - $work_hour_head) >= 0.5) {
                                            $ot = 0.5;
                                        } else {
                                            $ot = 0;
                                        }
                                    } else {
                                        if (((float)($diff[0]) - $work_hour_head) >= 1) {
                                            $ot = ((float)($diff[0]) - $work_hour_head);
                                        } elseif (((float)($diff[0]) - $work_hour_head) >= 0.5) {
                                            $ot = 0.5;
                                        } else {
                                            $ot = 0;
                                        }
                                    }
                                }
                                //WD
                                if (($att_new_in_time<$att_new_settings_late_time) && ($att_new_out_time>$att_new_settings_late_time_el)) {
                                    $wd = 1;
                                    $NL = '1';
                                }else{

                                        if ($SLM == 0 && $LA == 0 && $SLE == 0 && $EL == 0 && ($HD_M ||$HD_E) >= 1) {
                                            $wd = 0.5;
                                            $NL = '1';
                                        } else {
                                            $wd = 1;
                                        }
                                }
                            } else if((float)$working_hour >= $work_hour_halfday ){

                                $ot = 0;
                                if(!empty($data_app[3])){
                                    if($HD_M==1 && $HD_E!=1) {

                                        if($diff2 >= $evening_halfday_count){

                                            if ($HD_M == 1 && ($SLM != 1 || $SLE != 1)) {
                                                $wd = 0.5;
                                                $NL = '1';
                                            } elseif ($SLM == 1 && $SLE == 1) {
                                                $wd = 0.5;
                                                $NL = '1';
                                            } elseif (($SLM == 1 || $SLE == 1) && ($LA == 1 || $EL == 1)) {
                                                $wd = 0.5;
                                                $NL = '1';
                                            } elseif ($LA == 0 && $EL == 0 && $HD_M == 0 && ($SLM == 1 || $SLE == 1)) {
                                                $wd = 1;
                                                $NL = '1';
                                            } elseif (($LA == 1 || $EL == 1) && $HD_M == 0 && $SLM == 0 && $SLE == 0) {
                                                $wd = 1;
                                                $NL = '1';
                                            } else {
                                                $wd = 0;
                                            }

                                        }else{
                                            $wd = 0;
                                        }

                                    }else{

                                        if((float)$diff1 >= $morning_halfday_count) {

                                            if ($HD_E == 1 && ($SLM != 1 || $SLE != 1)) {
                                                $wd = 0.5;
                                                $NL = '1';
                                            } elseif ($SLM == 1 && $SLE == 1) {
                                                $wd = 0.5;
                                                $NL = '1';
                                            } elseif (($SLM == 1 || $SLE == 1) && ($LA == 1 || $EL == 1)) {
                                                $wd = 0.5;
                                                $NL = '1';
                                            } elseif ($LA == 0 && $EL == 0 && $HD_E == 0 && ($SLM == 1 || $SLE == 1)) {
                                                $wd = 1;
                                                $NL = '1';
                                            } elseif (($LA == 1 || $EL == 1) && $HD_E == 0 && $SLM == 0 && $SLE == 0) {
                                                $wd = 1;
                                                $NL = '1';
                                            } else {
                                                $wd = 0;
                                            }
                                        }else{
                                            $wd = 0;
                                        }
                                    }

                                }else{
                                    $wd = 0;
                                }

                            }else{
                                $wd = 0;
                            }
//                            if($EmpCatData->ot_applicable=="YES") {
                                //EArrow Setting for Mahi
//                                if (($new_in_time[1] < "08:30") && ("08:00" >= $new_in_time[1])) {
//                                    $ot += 0.5;
//                                }
//                            }
                        }else{ //newly added line for holiday working

                            $holiday = $this->attendance_mod->search_holiday_1($new_in_time);
                                if ($holiday->status=='Half Day Morning'){
                                    $ot = 0;
                                    if(!empty($data_app[3])){
                                        if(($att_new_in_time>$att_new_settings_start_time_hol)&&($att_new_in_time<$att_new_settings_late_time_hol)){
                                            //Late MO
                                            $LA_time += (($att_new_in_time-$att_new_settings_start_time_hol)%3600)/60;
                                            $LA = '1';
                                            $late_count++;
                                        }
                                        if(($att_new_out_time<$att_new_settings_end_time)&&($att_new_out_time>$att_new_settings_late_time_el)){
                                            //Late EV
                                            $EL_time += (($att_new_settings_end_time-$att_new_out_time)%3600)/60;
                                            $EL = '1';
                                            $late_count++;
                                        }
                                       if(($diff.'.'.$diff1)>=$morning_halfday_count){
                                            $wd = 0.5;
                                           if(($diff.'.'.$diff1)>$morning_halfday_count) {
                                               if ($EmpCatData->ot_applicable == "YES") {
                                                   if ($min[0] >= 30) {
                                                       if(((float)($diff[0] + 0.5) - $morning_halfday_count) >= 1) {
                                                           $ot = ((float)($diff[0] + 0.5) - $morning_halfday_count);
                                                       }
                                                       else if(((float)($diff[0] + 0.5) - $morning_halfday_count) >= 0.5) {
                                                           $ot = 0.5;
                                                       } else {
                                                           $ot = 0;
                                                       }
                                                   } else {
                                                       if (((float)($diff[0]) - $morning_halfday_count) >= 1) {
                                                           $ot = ((float)($diff[0]) - $morning_halfday_count);
                                                       } elseif (((float)($diff[0]) - $morning_halfday_count) >= 0.5) {
                                                           $ot = 0.5;
                                                       } else {
                                                           $ot = 0;
                                                       }
                                                   }
                                               }
                                           }
                                            }else{
                                                $wd = 0;
                                            }
                                        }else{
                                            $wd = 0;
                                        }
                                    if($EmpCatData->ot_applicable=="YES") {
                                        //EArrow Setting for Mahi
                                        if (($new_in_time < "08:30") && ("08:00" >= $new_in_time)) {
                                            $ot += 0.5;
                                        }
                                    }
                                    }elseif ($holiday->status=='Half Day Evening'){
                                    $ot = 0;
                                    if(!empty($data_app[3])){
                                        if(($att_new_out_time<$att_new_settings_end_time_hol)&&($att_new_out_time>$att_new_settings_late_time_el_hol)){
                                            //Late EV
                                            $EL_time += (($att_new_settings_end_time_hol-$att_new_out_time)%3600)/60;
                                            $EL = '1';
                                            $late_count++;
                                        }
                                        if(($att_new_in_time>$att_new_settings_start_time)&&($att_new_in_time<$new_late_time_date_time)){
                                            //Late MO
                                            $LA_time += (($att_new_in_time-$att_new_settings_start_time)%3600)/60;
                                            $LA = '1';
                                            $late_count++;
                                        }
                                        if(($diff[0].'.'.$diff1)>=$evening_halfday_count){

                                            $wd = 0.5;
                                            if(($diff[0].'.'.$diff1)>$evening_halfday_count) {

                                                if ($EmpCatData->ot_applicable == "YES") {
                                                    if ($min[0] >= 30) {
                                                        if (((float)($diff[0] + 0.5) - $evening_halfday_count) >= 1) {
                                                            $ot = ((float)($diff[0] + 0.5) - $evening_halfday_count);
                                                        } else if (((float)($diff[0] + 0.5) - $evening_halfday_count) >= 0.5) {
                                                            $ot = 0.5;
                                                        } else {
                                                            $ot = 0;
                                                        }
                                                    } else {
                                                        if (((float)($diff[0]) - $evening_halfday_count) >= 1) {
                                                            $ot = ((float)($diff[0]) - $evening_halfday_count);
                                                        } elseif (((float)($diff[0]) - $evening_halfday_count) >= 0.5) {
                                                            $ot = 0.5;
                                                        } else {
                                                            $ot = 0;
                                                        }
                                                    }
                                                }
                                            }

                                        }else{
                                            $wd = 0;
                                        }
                                    }else{
                                        $wd = 0;
                                    }
                                    if($EmpCatData->ot_applicable=="YES") {
                                        //EArrow Setting for Mahi
//                                        if (($new_in_time[1] < "08:30") && ("08:00" >= $new_in_time[1])) {
//                                            $ot += 0.5;
//                                        }
                                    }
                                }

                        }
                        $sp_cat = 'WD';
                    } else {
                        //TODO if not working day work
                        $sp_cat = 'NWD';
                    }
                    if ($data_app[0] != "") {

                        if($data_app[2]!=""){

                            $data_up = array(
                                "app_ot" => $app_ot,
                                "in_time" => $data_app[7].' '.$data_app[2],
                                "out_time" => $data_app[7].' '.$data_app[3],
                                "ot_hrs" => $ot,
                                "late_count"=>($wd==0)?0:$late_count,
                                "LA_time"=>($wd==0)?0:$LA_time,
                                "EL_time"=>($wd==0)?0:$EL_time,
                                'SLM'=>($wd==0)?0:$SLM,
                                'SLE'=>($wd==0)?0:$SLE,
                                'LA'=>($wd==0)?0:$LA,
                                'EL'=>($wd==0)?0:$EL,
                                'NL'=>($wd==0)?0:$NL,
                                "work_day"=>$wd,
                                'day_cat'=>$sp_cat,
                                'liu_leave'=>$data_app[6],
                                'liu_status'=>($data_app[6]==1)?1:0,
                                'liu_count'=>($data_app[6]==1)?1:0
                            );
                            $this->attendance_mod->updateAppRegister($data_app[0], $data_up);

                        }else{

                            $data_up_2 = array(
                                "app_ot" => 0,
                                "in_time" => "",
                                "out_time" => "",
                                "ot_hrs" => 0,
                                "late_count"=>0,
                                "LA_time"=>0,
                                "EL_time"=>0,
                                'LA'=>0,
                                'EL'=>0,
                                'NL'=>0,
                                "work_day"=>0,
                                'day_cat'=>$sp_cat,
                                'liu_leave'=>$data_app[6],
                                'liu_status'=>($data_app[6]==1)?1:0,
                                'liu_count'=>($data_app[6]==1)?1:0
                            );

                            $this->attendance_mod->updateAppRegister($data_app[0], $data_up_2);

                        }
                    }

                    /*unset($LA);
                    unset($EL);
                    unset($NL);
                    unset($late_mins);
                    unset($late_count);*/
                    $late_count = 0;
                    $LA_time = 0;
                    $EL_time = 0;
                    $LA = 0;
                    $EL = 0;
                    $NL = 0;
                    $SLM = 0;
                    $SLE = 0;
                    $HD_M= 0;
                    $HD_E =0;
                    $wd =0;
                }
            $this->system_log->create_system_log("Attendance", "Success", "Attendance Register Updated for Date -".$update_date);
            echo json_encode(array(
                "status" => "ok",
                "updated_date" => $update_date,
                "message" => 'Successfully Updated!'
            ));
            exit;
        } else {
            echo json_encode(array(
                "status" => "error",
                "message" => 'Error Saving Update'
            ));
            exit;
        }
    }

}