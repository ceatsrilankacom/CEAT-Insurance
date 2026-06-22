<?php

class Payroll_process extends CI_Controller{

    public function __construct()
    {
        parent::__construct();

//        ini_set('display_errors', 0);
//        error_reporting(0);


        $this->load->library('ion_auth');
        $this->load->library('permissions');
        $this->load->library('system_log');
        $this->load->model('payroll_process_mod','payroll');
        $this->load->model('leave_management_mod');
    }

    public function index(){

        $this->load->view('common/header');
        $this->load->view('payroll/payroll_index');
        $this->load->view('common/footer');

    }

    public function process_payroll(){

        $month = $this->payroll->get_monthend($this->session->userdata('payroll_id'));
        if($this->payroll->get_process_status($month->month)) {
            $this->payroll->update_process_status($month->month);

            function IFCON($condition, $true, $false)
            {
                if ($condition) {
                    return $true;
                } else {
                    return $false;
                }
            }


            /*$new_date = $month->month.'-20';*/
            $month_nw = $month->month;
            /*$d1 = new DateTime($new_date);
            $d2 = new DateTime($new_date);
            $d1->modify('first day of last month');
            $d2->modify('first day of this month');
            //last month 26th day
            $start_month=$d1->format('Y-m-26');
            //this month 25th day
            $end_month=$d2->format('Y-m-25');*/

            $monthly_pay = PAY_MONTHLY;
            $pay_month_start = PAY_FROM_DAY;
            $pay_month_end = PAY_UPTO_DAY;

            if ($monthly_pay == 'NO') {

                $date = new DateTime($month_nw . "-" . $pay_month_end);
//            $date->modify('+1 day');
                $edate = $date->format('Y-m-d');
                $end_month = $edate;
                $time = strtotime($month_nw . "-" . $pay_month_start);
                $start_month = date("Y-m-d", strtotime("-1 month", $time));

            } else {

                $start_month = $month_nw . "-01";
                $end_month = date("Y-m-t", strtotime($month_nw));

            }

            //get employee according to the branches
            $employees = $this->payroll->get_active_employees_by_terminate_date($start_month);

            //working days count
            $aryRange = array();
            $start = $start_month;

            //get date & push array from given month
            while (strtotime($start) <= strtotime($end_month)) {
                array_push($aryRange, $start);
                $start = date('Y-m-d', strtotime("+1 day", strtotime($start)));
            }

            //count number of working days per month
            $working_days = 0;
            foreach ($aryRange as $date) {
                $day_type = date('D', strtotime($date));
                $dtype = date('l', strtotime($date));
                $work_week_data = $this->payroll->check_work_week($dtype);
                if ($work_week_data->status == "Full Day" || $work_week_data->status == "Half Day") {
                    if (!$this->payroll->search_holiday($date)) {
                        $working_days += 1;
                    }
                }
            }

            //loop active employees
            foreach ($employees as $emp) {
                $EmpCatData = $this->payroll->getEmpCatDatabyEmp($emp->emp_category);
                if ($EmpCatData->attendance_only == "NO") {

                    //check employees by id
                    if ($emp->employee_id) {
                        //get employees attendance from given month
                        $getEmpAttendData = $this->payroll->getEmployeeAttendance($emp->employee_id, $start_month, $end_month);
                        //get formula for calculation salary
                        $variables = $this->payroll->get_formula_full();

                        //Define variables, and assign 0
                        foreach ($variables as $variable) {

                            $new_str1 = str_replace('$', '', $variable->code);
                            $new_str2 = $new_str1;
                            $$new_str2 = 0;

                        }

                        $EMPNi = $emp->initials;
                        $iiEMPNA = $emp->last_name;
                        $iEPF = $emp->epf_no;
                        $iDESIG = $this->payroll->get_job_title($emp->job_title)->desc;
                        $DEPT = $this->payroll->get_department($emp->department)->desc;
                        $iBACC = $this->payroll->get_acccount($emp->id)->acc;
                        $kBANAME = $this->payroll->get_acccount($emp->id)->bank_name;
                        $iBRANCH = $this->payroll->get_acccount($emp->id)->branch_name;
                        $iBACODE = $this->payroll->get_acccount($emp->id)->bank_code;
                        $iBRCODE = $this->payroll->get_acccount($emp->id)->branch_code;

                        //get formula according to the employee category
                        if ($empcatdata = $this->payroll->getEmpCatDatabyEmp($emp->emp_category)) {

                            //Monthly Allowances
                            if ($empcatallowdata = $this->payroll->getEmpCatAlloDatabyEmp($emp->emp_category)) {

                                foreach ($empcatallowdata as $empcallowdt) {
                                    if ($empcallowdt->a_status == 1) {
                                        $AllowData = $this->payroll->getCateAllownaceCodebyAID($empcallowdt->a_id);
                                        $amount_allow = $empcallowdt->rate;
                                        ${$AllowData->at_code} = $amount_allow;
                                        $ALL += $amount_allow;
                                        if ($AllowData->epf == "YES") {
                                            $SEPF += $amount_allow;
                                        }
                                        $catallowancearray[] = array(
                                            'f_id' => $AllowData->f_id,
                                            'master_ref_id' => $empcallowdt->a_id,
                                            'employee_id' => $emp->id,
                                            'code' => $AllowData->at_code,
                                            'name' => $AllowData->allowance,
                                            'amount' => $empcallowdt->rate,
                                            'epf' => $AllowData->epf,
                                            'type' => "ALL",
                                        );
                                    }
                                }
                            }

                            //EMPLOYEE SP Allowance
                            /*if($emp->special_allowance!=""){
                                $EMPSP = $emp->special_allowance;
                            }*/
                            //EMPLOYEE Allowances per Individual
                            if ($empallowdata = $this->payroll->getEmpAlloDatabyEmp($emp->id)) {
                                foreach ($empallowdata as $empallowdt) {
                                    if ($empallowdt->status == 1) {
                                        $AllowData = $this->payroll->getEmpAllownaceCodebyAID($empallowdt->allowance_id);
                                        $amount_allow_emp = $empallowdt->amount;
                                        ${$AllowData->at_code} = $amount_allow_emp;
                                        $ALL += $amount_allow_emp;
                                        if ($AllowData->epf == "YES") {
                                            $SEPF += $amount_allow_emp;
                                        }
                                        $empallowancearray[] = array(
                                            'f_id' => $AllowData->f_id,
                                            'master_ref_id' => $empallowdt->allowance_id,
                                            'employee_id' => $emp->id,
                                            'code' => $AllowData->at_code,
                                            'name' => $AllowData->allowance,
                                            'amount' => $empallowdt->amount,
                                            'epf' => $AllowData->epf,
                                            'type' => "ALL",
                                        );
                                    }
                                }
                            }

                            //MONTHLY PAYMENTS
                            if ($monthly_payment = $this->payroll->get_monthly_payments_by_type($month_nw, $emp->id)) {
                                foreach ($monthly_payment as $payment) {
                                    /*if($payment->status==1) {}*/
                                    $PayData = $this->payroll->getMonthlyPaymentTypeCodebyAID($payment->pay_type);
                                    $amount_pay = $payment->totamount;
                                    ${$PayData->mcode} = $amount_pay;
                                    $MPT += $amount_pay;
                                    $monthly_payment_array[] = array(
                                        'f_id' => $PayData->f_id,
                                        'master_ref_id' => $payment->pay_type,
                                        'employee_id' => $emp->id,
                                        'code' => $PayData->mcode,
                                        'name' => $PayData->name,
                                        'amount' => $payment->totamount,
                                        'epf' => "-",
                                        'type' => "PAY",
                                    );
                                }
                            }

                            //MONTHLY DeductionS
                            if ($monthly_deduction = $this->payroll->get_monthly_deductions_by_type($month_nw, $emp->id)) {
                                foreach ($monthly_deduction as $deduction) {
                                    /*if($deduction->status==1) {}*/
                                    $DeductionData = $this->payroll->getMonthlyDeductionTypeCodebyAID($deduction->deduction_type);
                                    $amount_pay = $deduction->totamount;
                                    ${$DeductionData->mcode} = $amount_pay;
                                    $DED += $amount_pay;
                                    $monthly_deduction_array[] = array(
                                        'f_id' => $DeductionData->f_id,
                                        'master_ref_id' => $deduction->deduction_type,
                                        'employee_id' => $emp->id,
                                        'code' => $DeductionData->mcode,
                                        'name' => $DeductionData->name,
                                        'amount' => $deduction->totamount,
                                        'epf' => "-",
                                        'type' => "DED",
                                    );
                                }
                            }

                            //get mobile bill data
                            $mobile_max = $this->payroll->get_emp_details_nw($emp->id)->max_limit;
                            $m_number = $this->payroll->get_emp_details_nw($emp->id)->office_phone;
                            $mobile_data = $this->payroll->getmonthly_mobile_bill($month_nw, $m_number);

                            if ($mobile_data) {
                                if ($mobile_data->amount > $mobile_max) {

                                    $iMOBILE = ($mobile_data->amount - $mobile_max);
                                }
                            }

                            //Monthly SALARY ADVANCES
                            if ($advances = $this->payroll->get_advances_by_type($month_nw, $emp->id)) {
                                foreach ($advances as $advance) {
                                    /*if($payment->status==1) {}*/
                                    $AdvData = $this->payroll->getAdvanceTypeCodebyAID($advance->adv_type);
                                    $amount_adv = $advance->totamount;
                                    ${$AdvData->acode} = $amount_adv;
                                    $ADi += $amount_adv;
                                    $advances_array[] = array(
                                        'f_id' => $AdvData->f_id,
                                        'master_ref_id' => $advance->adv_type,
                                        'employee_id' => $emp->id,
                                        'code' => $AdvData->acode,
                                        'name' => $AdvData->name,
                                        'amount' => $advance->totamount,
                                        'epf' => "-",
                                        'type' => "ADV",
                                    );
                                }
                            }

                            //Check rate per day or Basic
                            if ($empcatdata->rate_per_day == "YES") {
                                $RATED = $emp->rate_per_day_amount;
                            } else {
                                $BASIC = $emp->basic_salary;
                                if ($BASIC == "") {
                                    echo json_encode(array('status' => false));
                                    exit;
                                }
                            }

                            /*if($empcatdata->fingerprint_status=="YES"){
                                $ISHO = 1;
                            }else{
                                $ISHO = 0;
                            }*/
                            //Loan
//                  $loan = $this->payroll->loans_details($emp->id,$month_nw);
//                  foreach ($loan as $new_loans) {
//                      $loan = $this->payroll->month_inst($new_loans->id,$month_nw);
//                      $iATL += $loan->amount;
//                  }

                            if ($loan = $this->payroll->loans_details($emp->id, $month_nw)) {
                                $iATL = $loan->amount;
                            }

                            //get employee work day count   //TODO~~~Start~~~~~~Leave-day-count-Annual-Casual-Medical   CODE : LEAVE0001
//                    if($Attendances=$this->payroll->getEmployeeAttendance($emp->employee_id,$start_month,$end_month)){
//                        foreach($Attendances as $attendance){
//                            $timestamp = strtotime($attendance->date);
//                            $dtype = date('l', $timestamp);
//                            $work_week_data = $this->payroll->check_work_week($dtype);
//                            if($work_week_data->status=="Full Day" || $work_week_data->status=="Half Day" ){
//                                $Leaves = $this->payroll->getLeaveDays($emp->id, $attendance->date);
//                                //get annual or casual leave count
//                                foreach ($Leaves as $leave) {
//                                    if ($leave->leave_type == 2) {
//                                        if($leave->leave_day_type=='Full Day'){
//                                            $AD += 1;
//                                        }else{
//                                            $AD += 0.5;
//                                        }
//                                    } else if ($leave->leave_type == 4) {
//                                        if($leave->leave_day_type=='Full Day'){
//                                            $CD += 1;
//                                        }else{
//                                            $CD += 0.5;
//                                        }
//                                    }else if ($leave->leave_type == 1) {
//                                        if($leave->leave_day_type=='Full Day'){
//                                            $MD += 1;
//                                        }else{
//                                            $MD += 0.5;
//                                        }
//                                    }
//                                }
//                            }
//                        }
//                    }
                            //TODO~~~End~~~~~~Leave-day-count-Annual-Casual-Medical

                            $leave_days = 0;
                            $leave_days_new = $this->payroll->leave_dates($emp->id, $start_month, $end_month);
                            if (count($leave_days_new) > 0) {
                                foreach ($leave_days_new as $leave) {
                                    if ($leave->leave_type == 'Full Day') {
                                        $leave_days += 1;
                                    } else {
                                        $leave_days += 0.5;
                                    }
                                }
                            }
                            //get number of working days and OT
                            if ($empcatdata->fingerprint_status == "YES") {
                                if ($getEmpAttendData != NULL) {
                                    foreach ($getEmpAttendData as $attendance) {
                                        $timest = strtotime($attendance->date);
                                        $dty = date('l', $timest);
                                        $work_week_dt = $this->payroll->check_work_week($dty);
                                        if ($work_week_dt->status == "Full Day" || $work_week_dt->status == "Half Day") {
                                            $WD += $attendance->work_day;
                                            if ($empcatdata->ot_applicable == "YES") {
                                                $OTH += $attendance->app_ot;
                                            }
                                            if ($attendance->day_cat == 'WD' && $attendance->work_day == '0') {
                                                ++$AB_D;
                                            }
                                        }
                                    }
                                } else {
                                    $WD = 0;
                                    $OTH = 0;
                                }
                                if ($empcatdata->ot_applicable == "YES") {
                                    $OTR += $empcatdata->ot_rate;
                                }
                            } else {
                                $WD = $working_days - $leave_days;
                            }
                            if ($empcatdata->fingerprint_status == "YES") {

                                //get general leave options
                                $max_lates = $this->leave_management_mod->get_administration_leave(array('id' => 46))->setting_value;
                                $max_short_leave = $this->leave_management_mod->get_administration_leave(array('id' => 47))->setting_value;
                                $late_tot = $this->leave_management_mod->get_lates($emp->id, $start_month, $end_month);

                                if ($max_lates >= 1 && $late_tot->late >= $max_lates) {
                                    $late_nopay = ($late_tot->late - $max_lates);
//                            if ($late_tot % $max_lates) {
//                                $num = explode('.', $late_tot / $max_lates);
//                                $late_nopay = $num[0];
//                            } else {
//                                $late_nopay = $late_tot / $max_lates;
//                            }
                                } else {
                                    $late_nopay = 0;
                                }

                                $shot_leave_tot = $this->leave_management_mod->get_short_leave($emp->id, $start_month, $end_month);
                                if ($max_short_leave >= 1 && $shot_leave_tot > 0) {
                                    if (($shot_leave_tot->sls + $late_nopay) > $max_short_leave) {

                                        $short_leave_nopay = ((($shot_leave_tot->sls + $late_nopay)) - $max_short_leave) * 0.5;

                                    } else {
                                        $short_leave_nopay = 0;
                                    }
                                } else {
                                    $short_leave_nopay = 0;
                                }

                                $count = $working_days - (($WD + $leave_days) - ($short_leave_nopay));
                                if ($count > 0) {
                                    $ND = $working_days - (($WD + $leave_days) - ($short_leave_nopay));
                                } else {
                                    $ND = 0 + ($short_leave_nopay);
                                }
                            } else {
                                $ND = 0;
                            }
                        } else {
                            echo json_encode(array('status' => false));
                            exit;
                        }
                        $array = array();
                        $result = '';
                        //TODO need to add  $where for get_formula emp_categories JE 2018-10-03
                        $formulas = $this->payroll->get_formula_full();

                        foreach ($formulas as $key => $formula) {
                            if (!empty($formula->formula)) {
                                $list = '' . $formula->formula . '';
                                $Ktrack = $array;
                                $result_old = str_replace(array_keys($Ktrack), array_values($Ktrack), $list);
                                //$formula->code = $formula->formula;
                                eval('$result = (' . $result_old . ');');
//                        print_r($formula->code . '~~' . $result);
                                $array[$formula->code] = $result;
                                $data[$formula->id] = $result;
                                unset($data_new);
                            }
                        }

                        //PAYE
                        if ($PayeData = $this->payroll->getPAYEdata()) {
                            $final = 0;
                            //TODO tecpack only
                            $calculateTaxOnAmount = $data['62'];
                            //TODO tecpack only

                            //TODO common ~~~~~~~~~~~~~~~~~~
//                    $calculateTaxOnAmount = $data['74'];
                            //TODO common ~~~~~~~~~~~~~~~~~~

                            $percent = 0;
                            $subt = 0;
                            foreach ($PayeData as $key => $value) {
                                if (($calculateTaxOnAmount >= $value->min_val) && ($calculateTaxOnAmount <= $value->max_val)) {
                                    $percent = $value->rate;
                                    $subt = $value->less;
                                    $final = ($calculateTaxOnAmount * $percent) - $subt;
                                }
                            }

                            $data[75] = abs($final);
                            $data[78] += $final;
                        }

                        //STAMP
                        if ($StampData_1 = $this->payroll->getSTAMPdata()) {
                            $final_1 = 0;
                            $calculateTaxOnAmount_1 = $data['74'];
                            $percent_1 = 0;
                            $subt_1 = 0;
                            if ($calculateTaxOnAmount_1 > 0) {
                                foreach ($StampData_1 as $key => $value_1) {
                                    if (($calculateTaxOnAmount_1 >= $value_1->min_val) && ($calculateTaxOnAmount_1 <= $value_1->max_val)) {
                                        $percent_1 = $value_1->rate;
                                        $subt_1 = $value_1->less;
                                        $final_1 = ($percent_1 * $subt_1);
                                    }
                                }
                            }
                            $data[76] = abs($final_1);
                            $data[78] += $final_1;
                            $data[79] -= $final_1;
                        }

                        $month = $this->payroll->get_monthend($this->session->userdata('payroll_id'));
                        $data_items = array(
                            'pid' => $month->id,
                            'dep_id' => $emp->department,
                            'ref_id' => $emp->id,
                            'emp_id' => $emp->employee_id,
                            'emp_type' => $emp->emp_category,
                            'month' => $month->month,
                            'data' => json_encode($data)
                        );
                        if ($this->payroll->savemonthenditems($data_items)) {
                            $pid = $this->db->insert_id();
                            $mainid = array(
                                'pid' => $pid,
                                'pid_org' => $month->id,
                                'month' => $month->month,
                            );

                            /*foreach ($empallowancearray as $row) {
                                $data_empall [] = array_merge($mainid,$row);
                            }
                            foreach ($data_empall as $rd) {
                                var_dump($rd);
                            }*/
                            //unset($data_empall);

                            if ($catallowancearray) {
                                foreach ($catallowancearray as $row) {
                                    $data_catall [] = array_merge($mainid, $row);
                                }
                                foreach ($data_catall as $rd) {
                                    $this->db->insert('hr_pay_payroll_monthend_list_data', $rd);
                                    $this->db->trans_complete();
                                }
                                /*$data_catall = array_merge($mainid,$catallowancearray);
                                $this->db->insert('hr_pay_payroll_monthend_list_data',$data_catall);
                                $this->db->trans_complete();*/
                            }
                            if ($empallowancearray) {
                                foreach ($empallowancearray as $row) {
                                    $data_empall [] = array_merge($mainid, $row);
                                }
                                foreach ($data_empall as $rd) {
                                    $this->db->insert('hr_pay_payroll_monthend_list_data', $rd);
                                    $this->db->trans_complete();
                                }
                                /*$data_empall = array_merge($mainid,$empallowancearray);
                                $this->db->insert('hr_pay_payroll_monthend_list_data',$data_empall);
                                $this->db->trans_complete();*/
                            }
                            if ($monthly_payment_array) {
                                foreach ($monthly_payment_array as $row) {
                                    $data_monthly_payment [] = array_merge($mainid, $row);
                                }
                                foreach ($data_monthly_payment as $rd) {
                                    $this->db->insert('hr_pay_payroll_monthend_list_data', $rd);
                                    $this->db->trans_complete();
                                }
                                /*$data_monthly_payment = array_merge($mainid,$monthly_payment_array);
                                $this->db->insert('hr_pay_payroll_monthend_list_data',$data_monthly_payment);
                                $this->db->trans_complete();*/
                            }
                            if ($monthly_deduction_array) {
                                foreach ($monthly_deduction_array as $row) {
                                    $data_monthly_deduction [] = array_merge($mainid, $row);
                                }
                                foreach ($data_monthly_deduction as $rd) {
                                    $this->db->insert('hr_pay_payroll_monthend_list_data', $rd);
                                    $this->db->trans_complete();
                                }

                            }

                            if ($advances_array) {
                                foreach ($advances_array as $row) {
                                    $data_advances_array [] = array_merge($mainid, $row);
                                }
                                foreach ($data_advances_array as $rd) {
                                    $this->db->insert('hr_pay_payroll_monthend_list_data', $rd);
                                    $this->db->trans_complete();
                                }
                                /*$data_advances = array_merge($mainid,$advances_array);
                                $this->db->insert('hr_pay_payroll_monthend_list_data',$data_advances);
                                $this->db->trans_complete();*/
                            }
                        }
                        unset($data_catall, $data_empall, $data_monthly_payment, $data_advances_array,$data_monthly_deduction);
                        unset($array, $data, $catallowancearray, $empallowancearray, $monthly_payment_array, $advances_array,$monthly_deduction_array);
                    }
                }
            }



        $month = $this->payroll->get_monthend($this->session->userdata('payroll_id'));
        if($lid = $this->payroll->update_lock_status($month->month)){
            //TODO not working??
            if($this->payroll->update_monthend($month->id)) {
                $this->system_log->create_system_log("Payroll Management", "Success", "Month-end Salary Locked for  month ".$month->month." Ref ID #".$lid);
            }
        }
            echo json_encode(array('status' => 'yes'));
            exit;

        }else{
            echo json_encode(array('status' => 'no'));
            exit;
        }
    }

    function create_new_payroll(){

        // if( $this->permissions->check_permission('access')){
        $pay_data = $this->payroll->get_payroll_data($this->session->userdata('payroll_id'));

        $log = date('Y-m-d h:m:s');
        $month = $this->payroll->get_last_month($pay_data->id);
        //TODO if last month nulled set defualt month
        /*if($month==""){

        }*/
        $time = strtotime($month->month);
        $final = date("Y-m", strtotime("+1 month", $time));
        $this->payroll->update_last_month_main($log);

//        $monthly_pay = PAY_MONTHLY;
//        $pay_month_start = PAY_FROM_DAY;
//        $pay_month_end = PAY_UPTO_DAY;

        if($pay_data->payroll_type=='NO'){
            /*$date = new DateTime($final."-".$pay_month_end);
            $date->modify('+1 day');
            $edate =  $date->format('Y-m-d');
            $end_month= $edate;
            $time = strtotime($final."-".$pay_month_start);
            $start_month = date("Y-m-d", strtotime("-1 month", $time));*/
            $end_month = $final."-".$pay_data->period_end;
            $time = strtotime($final."-".$pay_data->period_start);
            $start_month = date("Y-m-d", strtotime("-1 month", $time));
        }else{
            $start_month= $final."-1";
//            $time = strtotime($final."-1");
//            $end_month = date("Y-m-d", strtotime("+1 month", $time));
            $end_month =  date("Y-m-t", strtotime($final));
        }


        $this->db->insert('hr_pay_payroll_monthend_main',array('month'=>$final,'from'=>$start_month,'upto'=>$end_month,'status'=>0,'log'=>$log,'user'=>USER_ID,'payroll_type'=>$pay_data->id));
        $monthendid =  $this->db->insert_id();
        $task = $this->payroll->task();
        $lock_type = $this->payroll->lock_type();

        foreach ($task as $new_task){
            $data_task = array(
                'pay_type'=>$new_task->id,
                'month'=>$final,
                'user'=>0,
                'payroll_type'=>$pay_data->id,
                'status'=>0,
                'log'=>date('Y-m-d h:m:s')
            );
            $this->db->insert('hr_pay_payroll_pay_lock',$data_task);
        }

        foreach ($lock_type as $new_lock_type){
            $data_lock = array(
                'lock_type'=>$new_lock_type->id,
                'month'=>$final,
                'payroll_type'=>$pay_data->id,
                'user'=>0,
                'status'=>0,
                'log'=>date('Y-m-d h:m:s')
            );
            $this->db->insert('hr_pay_payroll_lock_status',$data_lock);
        }

        unset($data,$data_task,$data_lock);

        $this->system_log->create_system_log("Payroll Management", "Success", "New Month-end Created for month ".$final." Ref ID #".$monthendid);

        echo json_encode(array('status'=>TRUE));
    }

    function get_monthly_summary_data(){
        $id_status = $this->payroll->get_latets_lock_status_for_monthend($this->session->userdata('payroll_id'));
        $this->payroll->update_lock_for_month($id_status->month,$this->session->userdata('payroll_id'));
    }

    /*function reverse_monthend(){
        $id_status = $this->payroll->get_latets_lock_status();
        //$this->payroll->clear_monthend_lock_status($id_status->id);
        $this->payroll->clear_monthend_list($id_status->month);

        $this->system_log->create_system_log("Payroll Management", "Success", "Month-end Revised for month ".$id_status->month);

        redirect(base_url('systems/salary_settings_con/dashboard'));
    }*/

    /*function lock_monthend(){
        $id_status = $this->payroll->get_latets_lock_status_for_monthend();
        $this->payroll->update_lock_for_month($id_status->month);
        $this->system_log->create_system_log("Payroll Management", "Success", "Month-end Final Locked for month ".$id_status->month);
        redirect(base_url('systems/salary_settings_con/dashboard'));
    }*/

    public function lock_monthend()
    {
        $id_status = $this->payroll->get_latets_lock_status_for_monthend($this->session->userdata('payroll_id'));
        if($this->payroll->update_lock_for_month($id_status->month,$this->session->userdata('payroll_id'))) {

            $this->system_log->create_system_log("Payroll Management", "Success", "Month-end Final Locked for month ".$id_status->month);
            echo json_encode(array(
                "status" => TRUE,
                "message" => 'Monthend Salary Successfully Locked!'
            ));
            exit;
        }
    }

    public function reverse_monthend()
    {
        $id_status = $this->payroll->get_latets_lock_status($this->session->userdata('payroll_id'));
        $month = $this->payroll->get_monthend($this->session->userdata('payroll_id'));
        if($this->payroll->clear_monthend_list($id_status->month,$month->id,$this->session->userdata('payroll_id'))) {
            //$this->payroll->clear_monthend_list_data($id_status->month);
            $this->system_log->create_system_log("Payroll Management", "Success", "Month-end Revised for month ".$id_status->month);
            echo json_encode(array(
                "status" => TRUE,
                "message" => 'Monthend Salary Data Cleared'
            ));
            exit;
        }
    }
}







