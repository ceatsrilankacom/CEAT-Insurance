<?php
$this->load->model('attendance_mod');
?>
<style>
    .in_out_time_war {
        border:1px solid #FF0000;
    }
</style>
<script src="<?php echo base_url(); ?>assets/js/jquery.inputmask.bundle.min.js" type="text/javascript"></script>
<link href="<?php echo base_url(); ?>assets/node_modules/clockpicker/dist/bootstrap-clockpicker.min.css" rel="stylesheet">
<script>
    $(document).ready(function(){

        $('.clockpicker').clockpicker({
            donetext: 'Done',
            autoclose: true
        });
        /*$(".form_meridian_datetime").datetimepicker({
         format: "yyyy-mm-dd hh:ii",
         showMeridian: true,
         autoclose: true,
         //startView : 1,
         //maxView :1,
         //minDate:new Date(),
         //disabledDates: [new Date()]
         });*/
        /*$(".date-pikk").datepicker({
         format: "yyyy-mm-dd",
         showMeridian: true,
         autoclose: true,
         });
         $('.clockpicker').clockpicker({
         donetext: 'Done',
         autoclose: true
         });*/
        //$(".clockpicker").inputmask("datetime", { "clearIncomplete": true, inputFormat: "HH:MM" });
        //$(".date-pikk").inputmask("datetime", { "clearIncomplete": true, inputFormat: "yyyy-mm-dd" });
        //$(".clockpicker").inputmask("date", { "clearIncomplete": true });
//        $(".form_meridian_datetime").inputmask("datetime", { "clearIncomplete": true, inputFormat: "yyyy-mm-dd HH:MM" });
//
//        $("[rel=tooltip]").tooltip({ placement: 'right'});

        $(".time_clock").inputmask("datetime", { "clearIncomplete": true, inputFormat: "HH:MM" });
        $("[rel=tooltip]").tooltip({ placement: 'right'});
    });
</script>
<?php

if($department=='ALL'){
    $deptt = 'ALL';
} else {
    $dpt_Data = $this->attendance_mod->getDeptDatabyID($department);
    $deptt = $dpt_Data->desc;
}

$present = $this->attendance_mod->getDailyPresentAttReport($select_date,$department);
$holiday = $this->attendance_mod->search_holiday_1($select_date);

if($holiday && $holiday->status=="None Working Day" ){
    $state_1 = 1;
}else{
    $state_1 = 2;
}

$absence = $this->attendance_mod->getDailyAbsentAttReport($select_date,$department);
$totl = $this->attendance_mod->getTotoalEmps($department);

?>
<div class='callout callout-danger'>
    <input type="hidden" id="today_date" value="<?php echo $select_date; ?>">
    <h4>Daily Attendance - <?php

        echo $select_date; ?></h4>

     <?php  if($holiday = $this->attendance_mod->search_holiday_1($select_date)){

         echo '<h5 style="color:orangered;">'.$holiday->holiday_name.'</h5>';

        }

        ?>
    </h4>
    <p><?php echo $deptt ?> -  Employees : <?php echo $totl->tot ?> | Present : <?php echo $present->pr ?> | Absence :
        <?php
        if($state_1==2) {
            echo  $absence->ab;
        }else{
            echo '0';
        }

        ?>  </p>
</div>

<form action="#" method="post">
    <a id="update_reg" title="Update Register" onclick="update_register()" class="btn btn-sm  btn-success pull-right" style="color: #fff; display: block">Update Register</a>
    <table id="att_datatable" class="table table-bordered" style="display: block; clear: both;">
        <thead>
        <tr>
            <th>#</th>
            <th>Date</th>
            <th>Day</th>
            <th>EPF No</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Time In</th>
            <th>Time Out</th>
            <th>Work Day</th>
            <th>AB</th>
            <th>LA</th>
            <th>EL</th>
            <th>SLM</th>
            <th>SLE</th>
            <th>Late Count</th>
            <th>Late Time (Mins)</th>
            <th>Early Leave Time (Mins)</th>
            <th>Total Work Hours</th>
            <th>OT Hours</th>
            <th>Approve OT Hours</th>
            <th>liue leave</th>
            <th>Leave Type</th>
            <th>Leave Day Type</th>
            <th>Leave ID</th>
            <th>Shift Info</th>
        </tr>
        </thead>
        <tbody>

        <?php
        $ii = 0;
        $count = 1;
        $diff1 = 0;

        /*$work_hours = WORK_HOURS;
        $start_time_hed = START_TIME;
        $end_time = END_TIME;
        $late_time_hed = LATE_LA;
        $late_time_er = LATE_EL;
        $halfday_time_mo = HALF_D_TIME_MO;
        $halfday_time_ev = HALF_D_TIME_EV;*/

        foreach ($attendance as $value) {
//            if($this->attendance_mod->check_resign($value['empid'],$value['date'])){
            if ($shift_data = $this->file_upload_mod->get_emp_cate_shift_schedule($value['emp_category'])) {
                $work_hours = $shift_data->schedule_work_hours;
                $start_time_hed = $shift_data->schedule_start_time;
                $end_time = $shift_data->schedule_end_time;
                $late_time_hed = $shift_data->late_time_LA;
                $late_time_er = $shift_data->late_time_EL;
                $halfday_time_mo = $shift_data->halfday_time_mo;
                $halfday_time_ev = $shift_data->halfday_time_ev;
                $s_code = $shift_data->code;
            } else {
                $work_hours = WORK_HOURS;
                $start_time_hed = START_TIME;
                $end_time = END_TIME;
                $late_time_hed = LATE_LA;
                $late_time_er = LATE_EL;
                $halfday_time_mo = HALF_D_TIME_MO;
                $halfday_time_ev = HALF_D_TIME_EV;
                $s_code = "-";
            }
            $EmpCatData = $this->attendance_mod->getEmpCatDatabyEmp($value['emp_category']);
            if ($EmpCatData->fingerprint_status == "YES" || $EmpCatData->show_att == "YES") {
                $timestamp = strtotime($value['date']);
                $dtype = date('l', $timestamp);
                $work_week_data = $this->attendance_mod->check_work_week($dtype);

                $ot = 0;
                if ($value['out_time'] != "" && $value['in_time'] != "") {
                    $diff1 = (strtotime($value['out_time']) - strtotime($value['in_time'])) / 3600;
                }
                //TODO chk holiday
                /*if(!$this->hr_pay_report_mod->search_holiday($value['date'])) {
                }*/
                $holiday = $this->attendance_mod->search_holiday_1($value['date']);
                if ($holiday && $holiday->status == "None Working Day") {
                    $state = 1;
                } else {
                    $state = 2;
                }

                //TODO ~~~~~if common please uncomment
//                if(($work_week_data->status=="Full Day" || $work_week_data->status=="Half Day") && $state==2) {
                //TODO ~~~~~common please uncomment
                $color = '';
                if ($holiday->status == "Full Day" || $value['day_type'] == "Sat") {
                    $color = '#6cddd3';
                } elseif ($holiday->status == "Full Day" || $value['day_type'] == "Sun") {
                    $color = '#eaeaea';
                }
                ?>
                <tr style="<?php if ($diff1 < $work_hours && ($value['day_type'] != "Sat" || $value['work_day'] == "0.5") && ($holiday->status != "Half Day Morning" || $holiday->status != "Half Day Evening") && (empty($value['leave_id']))) {
                    echo "color: red;";
                } ?> background-color: <?php echo $color; ?>">
                    <td>
                        <input type="hidden" id="att_id<?php echo $ii; ?>" value="<?php if ($value['id'] == "") {
                            echo 0;
                        } else {
                            echo $value['id'];
                        }; ?>" size="8">
                        <input type="hidden" id="epf_no<?php echo $ii; ?>"
                               value="<?php if ($value['empid'] == "") {
                                   echo 0;
                               } else {
                                   echo $value['empid'];
                               }; ?>" size="8">
                        <input type="hidden" id="s_date<?php echo $ii; ?>"
                               value="<?php echo $select_date ?>" size="8">
                        <?php echo $count; ?>
                    </td>
                    <td><?php echo $value['date']; ?></td>
                    <td><?php echo $value['day_type']; ?></td>
                    <td><?php echo $value['employee_id']; ?></td>

                    <!--              TODO teckpack only-->
                    <td><?php echo $value['first_name']; ?></td>
                    <!--                          TODO teckpack only-->

                    <!--                            TODO COMMON    -- >-->
                    <!--                        <td>--><?php //echo $value['initials'];
                    ?><!--</td>-->
                    <!--                            TODO COMMON-->
                    <td><?php echo $value['last_name']; ?></td>
                    <td>
                        <input type="hidden" id="row_date<?php echo $ii; ?>" value="<?php echo $value['date']; ?>" >

                        <?php
//                        $intime = explode(' ',$value['in_time']);
                        if($value['in_time']){
                            $in_time_var = date('H:i',strtotime($value['in_time']));
                        }else{

                            $in_time_var = '';
                        }

                        ?>
                        <input type="text" onkeyup="arrow_go('<?php echo $ii; ?>','1',event)"
                               class="time_clock clockpicker current_index1<?php echo $ii; ?>"
                               id="in_time<?php echo $ii; ?>" value="<?php echo $in_time_var; ?>"
                               style="width: 40px ;"  data-placement="left" data-align="top" data-autoclose="true">
                        <script>
                            $("#in_time<?php echo $ii; ?>").val("<?php echo $in_time_var; ?>").change();
                        </script>
                        <script>
//                            $(document).ready(function () {
//                                $("#in_time<?php //echo $ii; ?>//").datetimepicker({
//                                    format: "yyyy-mm-dd hh:ii",
//                                    showMeridian: true,
//                                    autoclose: true,
//                                    defaultDate: <?php //echo $value['date']; ?>
//                                });
//                            });
                        </script>
                    </td>
                    <td>

                        <?php

                        if($value['out_time']){
                            $out_time_var = date('H:i',strtotime($value['out_time']));
                        }else{

                            $out_time_var = '';
                        }

                        ?>
                        <input type="text" onkeyup="arrow_go('<?php echo $ii; ?>','2',event)"
                               class="clockpicker clockpicker  current_index2<?php echo $ii; ?>"
                               id="out_time<?php echo $ii; ?>" value="<?php echo $out_time_var; ?>"
                               style="width: 40px ;"  data-placement="left" data-align="top" data-autoclose="true">
                        <script>
                            $("#out_time<?php echo $ii; ?>").val("<?php echo $out_time_var; ?>").change();
                        </script>
                        <script>
//                            $(document).ready(function () {
//                                $("#out_time<?php //echo $ii; ?>//").datetimepicker({
//                                    format: "yyyy-mm-dd hh:ii",
//                                    showMeridian: true,
//                                    autoclose: true,
//                                    setDate: <?php //echo $value['date']; ?>
//                                });
//                            });
                        </script>
                    </td>
                    <td style="background: #ffe4bb;text-align: center"><?php echo $value['work_day']; ?></td>
                    <td>
                        <?php
                        $tday = date("Y-m-d");
                        $today = strtotime($tday);
                        $date = strtotime($value['date']);

                        if ($today > $date) {
                            if (!$this->attendance_mod->search_holiday($value['date'])) {
                                if ($work_week_data->status == "Full Day" || $work_week_data->status == "Half Day") {
                                    if ($value['work_day'] == 0) {
//                                        if (!$this->attendance_mod->check_for_leave_application($value['empid'], $value['date'])) {
//                                            echo "<span style='color:#fff; background: #FF0000; padding: 2px; border-radius: 5px; display: block'>AB</span>";
//                                            $t_ab = $t_ab + 1;
//                                        }

                                        if (!$this->attendance_mod->check_for_leave_application($value['empid'], $value['date'])) {
                                            echo "<span style='color:#fff; background: #FF0000; padding: 2px; border-radius: 5px; display: block'>AB</span>";
                                            $t_ab = $t_ab + 1;
                                        }else{
                                            $leave_data = $this->attendance_mod->check_leave_data($value['empid'], $value['date'])->leave_day_type;

                                            if($leave_data!='Full Day'){
                                                echo "<span style='color:#fff; background: #ffad33; padding: 2px; border-radius: 5px; display: block'>AB/HD</span>";
                                            }
                                        }
                                    } elseif ($value['work_day'] == 0.5) {
                                        echo "<span style='color:#fff; background: #ffad33; padding: 2px; border-radius: 5px; display: block'>HD</span>";
                                    }
                                }
                            } else {
                                echo "<span style='color:#fff; background: #6cddd3; padding: 2px; border-radius: 5px; display: block'>--</span>";
                            }
                        }

                        ?>
                    </td>
                    <td>
                        <?php
                        if ($value['LA'] != 0) {
                            echo "<span style='color:#fff; background: #2ecc71; padding: 3px; border-radius: 5px;'>LA</span>";
                        } else {
                            echo "-";
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        if ($value['EL'] != 0) {
                            echo "<span style='color:#fff; background: #2ecc71; padding: 3px; border-radius: 5px;'>EL</span>";
                        } else {
                            echo "-";
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        if ($value['SLM'] != 0) {
                            echo "<span style='color:#fff; background: #9b59b6; padding: 3px; border-radius: 5px;'>SLM</span>";
                        } else {
                            echo "-";
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        if ($value['SLE'] != 0) {
                            echo "<span style='color:#fff; background: #9b59b6; padding: 3px; border-radius: 5px;'>SLE</span>";
                        } else {
                            echo "-";
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        if ($value['late_count'] != 0) {
                            echo "<span style='color:red'>" . $value['late_count'] . "</span>";
                        } else {
                            echo "-";
                        }
                        ?>
                    </td>
                    <td style="font-size: 10px">
                        <?php
                        if ($value['LA_time'] != 0) {
                            echo "<span style='color:red'>" . $value['LA_time'] . " Mins</span>";
                        } else {
                            echo "-";
                        }
                        ?>
                    </td>
                    <td style="font-size: 10px">
                        <?php
                        if ($value['EL_time'] != 0) {
                            echo "<span style='color:red'>" . $value['EL_time'] . " Mins</span>";
                        } else {
                            echo "-";
                        }
                        ?>
                    </td>
                    <td style="font-size: 10px"><?php
                        if ($value['out_time'] != "" && $value['in_time'] != "") {

                            $dateDiff = intval((strtotime($value['out_time']) - strtotime($value['in_time'])) / 60);

                            $hours = intval($dateDiff / 60);
                            $minutes = $dateDiff % 60;

                            echo $hours . " Hours " . $minutes . " Mins";
                        }
                        ?></td>
                    <?php
                    if ($EmpCatData->ot_applicable == "YES") { ?>
                        <td><?php echo $value['ot_hrs']; ?></td>
                        <td>
                            <select id="app_ot_hrs<?php echo $ii; ?>" class="current_index3<?php echo $ii; ?>">
                                <?php if (empty($value['app_ot']) || $value['app_ot'] == 0) { ?>
                                    <option value="0"></option>
                                    <option>0.5</option>
                                    <option>1</option>
                                    <option>1.5</option>
                                    <option>2</option>
                                    <option>2.5</option>
                                    <option>3</option>
                                    <option>3.5</option>
                                    <option>4</option>
                                    <option>4.5</option>
                                    <option>5</option>
                                    <option>5.5</option>
                                    <option>6</option>
                                    <option>6.5</option>
                                    <option>7</option>
                                    <option>7.5</option>
                                    <option>8</option>
                                <?php } else { ?>
                                    <option <?php echo $value['app_ot'] == '0.5' ? 'selected' : '' ?>>0.5</option>
                                    <option <?php echo $value['app_ot'] == '1' ? 'selected' : '' ?>>1</option>
                                    <option <?php echo $value['app_ot'] == '1.5' ? 'selected' : '' ?>>1.5</option>
                                    <option <?php echo $value['app_ot'] == '2' ? 'selected' : '' ?>>2</option>
                                    <option <?php echo $value['app_ot'] == '2.5' ? 'selected' : '' ?>>2.5</option>
                                    <option <?php echo $value['app_ot'] == '3' ? 'selected' : '' ?>>3</option>
                                    <option <?php echo $value['app_ot'] == '3.5' ? 'selected' : '' ?>>3.5</option>
                                    <option <?php echo $value['app_ot'] == '4' ? 'selected' : '' ?>>4</option>
                                    <option <?php echo $value['app_ot'] == '4.5' ? 'selected' : '' ?>>4.5</option>
                                    <option <?php echo $value['app_ot'] == '5' ? 'selected' : '' ?>>5</option>
                                    <option <?php echo $value['app_ot'] == '5.5' ? 'selected' : '' ?>>5.5</option>
                                    <option <?php echo $value['app_ot'] == '6' ? 'selected' : '' ?>>6</option>
                                    <option <?php echo $value['app_ot'] == '6.5' ? 'selected' : '' ?>>6.5</option>
                                    <option <?php echo $value['app_ot'] == '7' ? 'selected' : '' ?>>7</option>
                                    <option <?php echo $value['app_ot'] == '7.5' ? 'selected' : '' ?>>7.5</option>
                                    <option <?php echo $value['app_ot'] == '8' ? 'selected' : '' ?>>8</option>
                                <?php } ?>
                            </select>
                        </td>
                    <?php } else { ?>
                        <td></td>
                        <td></td>
                    <?php } ?>
                    <td>
                        <select id="liu_leave<?php echo $ii; ?>">
                            <option <?php echo $value['liu_leave'] == '0' ? 'selected' : '' ?> value="0">No</option>
                            <option <?php echo $value['liu_leave'] == '1' ? 'selected' : '' ?> value="1">Yes</option>
                        </select>
                    </td>
                    <td><?php echo $value['leave_type']; ?></td>
                    <td><?php echo $value['leave_day']; ?></td>
                    <td><?php echo $value['leave_id']; ?></td>
                    <td>
                        <a title="
                        <ul style='text-align:left;'>
                        <li><b>Work Hours</b> <em><?php echo $work_hours; ?></em></li>
                        <li><b>Start Time</b> <em><?php echo $start_time_hed; ?></em></li>
                        <li><b>End Time</b> <em><?php echo $end_time; ?></em></li>
                        <li><b>Late LA</b> <em><?php echo $late_time_hed; ?></em></li>
                        <li><b>Early Leave</b> <em><?php echo $late_time_er; ?></em></li>
                        <li><b>Half Day 1</b> <em><?php echo $halfday_time_mo; ?></em></li>
                        <li><b>Half Day 2</b> <em><?php echo $halfday_time_ev; ?></em></li>
                        </ul>" data-html="true" rel="tooltip" href="#"><i class="fa fa-info-circle"
                                                                          id="blah"></i> <?php echo $s_code; ?></a>
                    </td>
                </tr>
                <?php
//                }
                $ii++;
                ++$count;
            }
//        }
        }
        ?>
        </tbody>
    </table>
    <input type="hidden" name="att_no_row"  id="att_no_row"  value="<?php echo $ii; ?>"/>
</form>