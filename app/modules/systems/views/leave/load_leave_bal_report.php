<?php
//ini_set('display_errors', 1);
$begin = new DateTime($pay_month_start_date);
$end = clone $begin;
$end->modify($pay_month_end_date);
$end = $end->modify('+1 day');

$interval = new DateInterval('P1D');
$period = new DatePeriod($begin, $interval ,$end);
?>
<?php
$this->load->model('systems/leave_management_mod');
$this->load->model('systems/leave_settings_mod');
$this->load->model('reports/hr_pay_report_mod');
?>
<table id="report_1" class="" style="border-collapse: collapse; text-align:center" width="100%" cellspacing="0" bordercolor="#000000" border="1">
    <thead>
    <tr>
        <th class="w50" rowspan="2">Code</th>
        <th class="l" rowspan="2">Name</th>
        <th class="l" rowspan="2">Designation</th>
        <th class="w6" rowspan="2"> Joined Date</th>
        <th class="w6" colspan="3">Entitlement</th>
        <th class="w6" colspan="3">This Date Range</th>
        <th class="w6" colspan="3">Total Balance (Per Leave Year)</th>
        <th class="w6" rowspan="2">No. of Leave</th>
        <th class="w6" rowspan="2">No Pay Leave</th>
    </tr>
    <tr>
        <th class="w6">Annual</th>
        <th class="w6">Casual</th>
        <th class="w6">Medical</th>
        <th class="w6">Annual</th>
        <th class="w6">Casual</th>
        <th class="w6">Medical</th>
        <th class="w6">Annual</th>
        <th class="w6">Casual</th>
        <th class="w6">Medical</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $TOT_NP = 0;
    $TOT_AB = 0;
    $TOT_LD = 0;
    foreach ($emp_Data as $edata){
        $AB_D = 0;
        $PR_D  = 0;
        $working_days = 0;
        $NIWD = 0;
        foreach ($att_data as $attendance) {
            if($attendance['id']==$edata['id']){
                $timestamp = strtotime($attendance['date']);
                $dtype = date('l', $timestamp);
                $work_week_data = $this->hr_pay_report_mod->check_work_week($dtype);
                if($work_week_data->status=="Full Day" || $work_week_data->status=="Half Day") {
                    if (!$this->hr_pay_report_mod->search_holiday($attendance['date'])) {
                        $working_days += 1;
                        if ($attendance['work_day'] != 0) {
                            $PR_D = $PR_D + $attendance['work_day'];
                        }
                    }
                }
                //$NPayD = ($working_days-$PR_D)-$leave_days;
            }
        }


        $AB_D = number_format((float)($working_days-$PR_D), 1, '.', '');

        $leave_days_new = $this->hr_pay_report_mod->leave_dates($edata['id'],$pay_month_start_date,$pay_month_end_date);
        $leave_days = 0;
        if(count($leave_days_new)>0) {
            foreach ($leave_days_new as $leave) {
                if($leave->leave_type=='Full Day'){
                    $leave_days += 1;
                }else{
                    $leave_days += 0.5;
                }
            }

        }

        $NPayD = $AB_D-$leave_days;

        $emp_data = $this->leave_settings_mod->getSingleEmployeeData($edata['id']);
        //JE-2018-12-12 for Leave rule work

        $leave_ent = $this->hr_pay_report_mod->GetLeaveEntFull();
        foreach ($leave_ent as $le) {
            $leave_type_id = $le->leave_type_id;
            $where_rules = array(
                'leave_type_id' => $leave_type_id,
                'employee_category' => $emp_data->emp_category,
                'employment_status' => $emp_data->emp_status
            );
            if($leave_rule_type_details = $this->leave_settings_mod->get_leave_rule($where_rules)->row()){
                //With Leave Rule
                $leave_type_details = $leave_rule_type_details;
            }else{
                //Data Without Rule
                $leave_type_details = $this->leave_settings_mod->get_leave_type(array('hr_pay_leave_types.leave_type_id' => $leave_type_id))->row();
            }

            if ($le->leave_type_id== 2) {
                $ALE = $leave_type_details->leaves_per_period;
            } elseif ($le->leave_type_id == 4) {
                $CLE = $leave_type_details->leaves_per_period;
            }elseif ($le->leave_type_id == 1) {
                $MLE = $leave_type_details->leaves_per_period;
            }
        }



        ?>





        <tr>
            <td class="l"><?php echo $edata['emp_id']; ?></td>
            <td style="width: auto;text-align: left; padding: 2px; font-weight: bold"><?php echo $edata['first_name']." ".$edata['last_name'];?></td>
            <td class="l"><?php echo $edata['j_title']; ?></td>
            <td class="l"><?php echo $edata['joined_date']; ?></td>
            <td>
                <?php
                if(isset($ALE)){
                    echo $ALE;
                } else {
                    echo "0";
                }
                ?>
            </td>
            <td>
                <?php
                if(isset($CLE)){
                    echo $CLE;
                } else {
                    echo "0";
                }
                ?>
            </td>
            <td>
                <?php
                if(isset($MLE)){
                    echo $MLE;
                } else {
                    echo "0";
                }
                ?>
            </td>
            <td>
                <?php
                $AD = 0;
                $CD = 0;
                $MD = 0;
                foreach ($att_data as $atdt) {
                    if($atdt['id']==$edata['id']) {
                        $Leaves=$this->hr_pay_report_mod->getLeaveData($atdt['id'],$atdt['date']);
                        if(count($Leaves)>0) {
                            //get annual or casual leave count
                            foreach ($Leaves as $leave) {
                                if ($leave->leave_type == 2) {
                                    if($leave->leave_day_type=='Full Day'){
                                        $AD += 1;
                                    }else{
                                        $AD += 0.5;
                                    }
                                } else if ($leave->leave_type == 4) {
                                    if($leave->leave_day_type=='Full Day'){
                                        $CD += 1;
                                    }else{
                                        $CD += 0.5;
                                    }
                                }else if ($leave->leave_type == 1) {
                                    if($leave->leave_day_type=='Full Day'){
                                        $MD += 1;
                                    }else{
                                        $MD += 0.5;
                                    }
                                }
                            }
                        }
                    }
                }
                echo $AD;
                ?>
            </td>
            <td>
                <?php
                echo $CD;
                ?>
            </td>
            <td>
                <?php
                echo $MD;
                ?>
            </td>

            <td>
                <?php
                $leave_type_id = 2;
                $leave_employee_id = $edata['id'];

                $emp_data = $this->leave_settings_mod->getSingleEmployeeData($leave_employee_id);
                //JE-2018-12-12 for Leave rule work
                $where_rules = array(
                    'leave_type_id' => $leave_type_id,
                    'employee_category' => $emp_data->emp_category,
                    'employment_status' => $emp_data->emp_status
                );
                if($leave_rule_type_details = $this->leave_settings_mod->get_leave_rule($where_rules)->row()){
                    //With Leave Rule
                    $leave_type_details = $leave_rule_type_details;
                    if($leave_type_details->propotionate_on_joined_date == "Yes"){
                        $emp_joined_date = $emp_data->joined_date;
                        $end_date = date('Y-m-d', strtotime("+1 year", strtotime($emp_joined_date)));
                        $period_start = $emp_joined_date;
                        $period_end = $end_date;
                    }
                }else{
                    //Data Without Rule
                    $leave_type_details = $this->leave_settings_mod->get_leave_type(array('hr_pay_leave_types.leave_type_id' => 2))->row();
                    $ldata = $this->leave_settings_mod->get_leave_period_data($pay_month_start_date);
                    $leave_period_of_leave_start_day = $this->leave_settings_mod->get_leave_period(array('period_start <=' => $ldata->period_start, 'period_end >=' => $ldata->period_end), "month")->row();

                    $period_start = $leave_period_of_leave_start_day->period_start;
                    $period_end = $leave_period_of_leave_start_day->period_end;

                    $leave_period = $leave_period_of_leave_start_day;
                }

                //$leave_type_details  = "";

                $where = "employee = '$leave_employee_id' AND
                leave_type = '$leave_type_id' AND
                (start_date BETWEEN CAST('$period_start' AS DATE) AND CAST('$period_end' AS DATE)) AND
                (hr_pay_leave_applications.status <> 'Cancelled' AND hr_pay_leave_applications.status <> 'Rejected')";
                $leave_application_details = $this->leave_management_mod->get_leave_applications($where)->result();

                $total_existing_leave_count = 0;
                foreach($leave_application_details as $leave_application)
                {
                    $where = array("leave_application" => $leave_application->leave_application_id);
                    $groupby = "leave_day_type";
                    $leave_day_count = $this->leave_management_mod->count_leave_days($where, $groupby)->result();
                    foreach($leave_day_count as $leave_count)
                    {
                        if($leave_count->leave_day_type == "Full Day")
                        {
                            $total_existing_leave_count += $leave_count->leave_day_count * 1;
                        }
                        elseif(preg_match("/^Half Day/", $leave_count->leave_day_type))
                        {
                            $total_existing_leave_count += $leave_count->leave_day_count * 0.5;
                        }
                        else
                        {
                            $total_existing_leave_count += 0;
                        }
                    }
                }
                ?>
                <?php
                echo $avail_leave_bal = $leave_type_details->leaves_per_period - $total_existing_leave_count;;
                ?>
            </td>
            <td>
                <?php
                $leave_type_id = 4;
                $leave_employee_id = $edata['id'];

                $emp_data = $this->leave_settings_mod->getSingleEmployeeData($leave_employee_id);
                //JE-2018-12-12 for Leave rule work
                $where_rules = array(
                    'leave_type_id' => $leave_type_id,
                    'employee_category' => $emp_data->emp_category,
                    'employment_status' => $emp_data->emp_status
                );
                if($leave_rule_type_details = $this->leave_settings_mod->get_leave_rule($where_rules)->row()){
                    //With Leave Rule
                    $leave_type_details = $leave_rule_type_details;
                    if($leave_type_details->propotionate_on_joined_date == "Yes"){
                        $emp_joined_date = $emp_data->joined_date;
                        $end_date = date('Y-m-d', strtotime("+1 year", strtotime($emp_joined_date)));
                        $period_start = $emp_joined_date;
                        $period_end = $end_date;
                    }
                }else{
                    //Data Without Rule
                    $leave_type_details = $this->leave_settings_mod->get_leave_type(array('hr_pay_leave_types.leave_type_id' => 4))->row();
                    $ldata = $this->leave_settings_mod->get_leave_period_data($pay_month_start_date);
                    $leave_period_of_leave_start_day = $this->leave_settings_mod->get_leave_period(array('period_start <=' => $ldata->period_start, 'period_end >=' => $ldata->period_end), "month")->row();

                    $period_start = $leave_period_of_leave_start_day->period_start;
                    $period_end = $leave_period_of_leave_start_day->period_end;

                    $leave_period = $leave_period_of_leave_start_day;
                }
                //$leave_type_details  = "";


                $where = "employee = '$leave_employee_id' AND
                leave_type = '$leave_type_id' AND
                (start_date BETWEEN CAST('$period_start' AS DATE) AND CAST('$period_end' AS DATE)) AND
                (hr_pay_leave_applications.status <> 'Cancelled' AND hr_pay_leave_applications.status <> 'Rejected')";
                $leave_application_details = $this->leave_management_mod->get_leave_applications($where)->result();

                $total_existing_leave_count = 0;
                foreach($leave_application_details as $leave_application)
                {
                    $where = array("leave_application" => $leave_application->leave_application_id);
                    $groupby = "leave_day_type";
                    $leave_day_count = $this->leave_management_mod->count_leave_days($where, $groupby)->result();
                    foreach($leave_day_count as $leave_count)
                    {
                        if($leave_count->leave_day_type == "Full Day")
                        {
                            $total_existing_leave_count += $leave_count->leave_day_count * 1;
                        }
                        elseif(preg_match("/^Half Day/", $leave_count->leave_day_type))
                        {
                            $total_existing_leave_count += $leave_count->leave_day_count * 0.5;
                        }
                        else
                        {
                            $total_existing_leave_count += 0;
                        }
                    }
                }
                ?>
                <?php echo $avail_leave_bal = $leave_type_details->leaves_per_period - $total_existing_leave_count;
                ?>
            </td>
            <td>
                <?php
                $leave_type_id = 1;
                $leave_employee_id = $edata['id'];

                $emp_data = $this->leave_settings_mod->getSingleEmployeeData($leave_employee_id);
                //JE-2018-12-12 for Leave rule work
                $where_rules = array(
                    'leave_type_id' => $leave_type_id,
                    'employee_category' => $emp_data->emp_category,
                    'employment_status' => $emp_data->emp_status
                );
                if($leave_rule_type_details = $this->leave_settings_mod->get_leave_rule($where_rules)->row()){
                    //With Leave Rule
                    $leave_type_details = $leave_rule_type_details;
                    if($leave_type_details->propotionate_on_joined_date == "Yes"){
                        $emp_joined_date = $emp_data->joined_date;
                        $end_date = date('Y-m-d', strtotime("+1 year", strtotime($emp_joined_date)));
                        $period_start = $emp_joined_date;
                        $period_end = $end_date;
                    }
                }else{
                    //Data Without Rule
                    $leave_type_details = $this->leave_settings_mod->get_leave_type(array('hr_pay_leave_types.leave_type_id' => 1))->row();
                    $ldata = $this->leave_settings_mod->get_leave_period_data($pay_month_start_date);
                    $leave_period_of_leave_start_day = $this->leave_settings_mod->get_leave_period(array('period_start <=' => $ldata->period_start, 'period_end >=' => $ldata->period_end), "month")->row();

                    $period_start = $leave_period_of_leave_start_day->period_start;
                    $period_end = $leave_period_of_leave_start_day->period_end;

                    $leave_period = $leave_period_of_leave_start_day;
                }
                //$leave_type_details  = "";


                $where = "employee = '$leave_employee_id' AND
                leave_type = '$leave_type_id' AND
                (start_date BETWEEN CAST('$period_start' AS DATE) AND CAST('$period_end' AS DATE)) AND
                (hr_pay_leave_applications.status <> 'Cancelled' AND hr_pay_leave_applications.status <> 'Rejected')";
                $leave_application_details = $this->leave_management_mod->get_leave_applications($where)->result();

                $total_existing_leave_count = 0;
                foreach($leave_application_details as $leave_application)
                {
                    $where = array("leave_application" => $leave_application->leave_application_id);
                    $groupby = "leave_day_type";
                    $leave_day_count = $this->leave_management_mod->count_leave_days($where, $groupby)->result();
                    foreach($leave_day_count as $leave_count)
                    {
                        if($leave_count->leave_day_type == "Full Day")
                        {
                            $total_existing_leave_count += $leave_count->leave_day_count * 1;
                        }
                        elseif(preg_match("/^Half Day/", $leave_count->leave_day_type))
                        {
                            $total_existing_leave_count += $leave_count->leave_day_count * 0.5;
                        }
                        else
                        {
                            $total_existing_leave_count += 0;
                        }
                    }
                }
                ?>
                <?php echo $avail_leave_bal = $leave_type_details->leaves_per_period - $total_existing_leave_count;
                ?>
            </td>
            <td><?php echo $CD+$AD+$MD; ?>
            </td>
            <td>
                <?php
                echo $NPayD;
                ?>
            </td>
        </tr>
    <?php } ?>
    </tbody>
    <tfoot>
    <tr>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
    </tr>
    </tfoot>
</table>
<hr>
<hr>