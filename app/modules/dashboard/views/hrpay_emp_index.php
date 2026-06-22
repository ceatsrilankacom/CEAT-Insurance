
<?php

//todo 2019-07-23 few updates for kreston.Please comment kreston update before assign other projects
$this->load->model('systems/leave_management_mod');
$this->load->model('systems/leave_settings_mod');
$this->load->model('dash_mod');
?>


<style>

    .m-widget4 .m-widget4__item {
        display: table;
        padding-top: 0.012rem;
        padding-bottom: 0.25rem;
    }
</style>
<?php
?>
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">HR PAYROLL - Dashboard & Statistics</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div>
    </div>
    <?php
    $message = $this->session->flashdata('message');
    if(!empty($message))
    {
        if($message == "access_denied")
        { ?>
            <div class="alert alert-danger"><?php echo "You are not authorized to access this page."; ?></div>
        <?php }
    }
    ?>
</div>

<div id="hr">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3">


                </div>
                <div class="col-md-3">


                </div>
            </div>
        </div>
        <!--~~~~~~~~~~~~~~~~~~~~~This update for kreston only code~~DBK001~~~~~~-->
<!--                <div class="col-md-12 col-sm-12" id="check-div">-->
<!--                    <div class="row">-->
<!--                        <div class="col-md-12 col-sm-12">-->
<!---->
<!--                            <div class="element-wrapper">-->
<!--                                <div class="element-actions">-->
<!--                                </div>-->
<!--                                <div class="card-header bg-primary">-->
<!--                                    <button class="btn btn-info" onclick="onPunchIn()" id="punch-in"><i class="fa fa-hand-o-up"></i> PUNCH IN</button>-->
<!--                                    <button class="btn btn-success" onclick="onPunchOut()" id="punch-out"><i class="fa fa-hand-o-down"></i> PUNCH OUT</button>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
        <!--~~~~~~~~~~~~~~~~~~~~~~end kreston update~~~~~~~~~~~~~~~~~-->
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4" >
                    <div class="element-wrapper">
                        <div class="element-actions">
                        </div>
                        <!--<h6 class="element-header">

                        </h6>-->
                        <div class="card-header bg-success">
                            <h4 class="card-title  text-white" style="display: inline-block"> <i class="fa fa-birthday-cake"></i> Upcoming Birthdays</h4>
                        </div>
                        <div class="element-box" style='background-image: url("<?php echo base_url(''); ?>assets/images/background/birthday.png");'>
                            <div class="m-widget4" style="height: 220px; overflow-y: scroll">
                                <!--begin::Widget 14 Item-->
                                <?php

                                foreach($bday as $b){
                                   for($i=0; $i<count($b); $i++) {
                                    $tod = new DateTime('today');
                                    $tom = new DateTime('tomorrow');
                                    $today= $tod->format('m-d');
                                    $tomorrow= $tom->format('m-d');

                                    if($b[$i]->bday==$today){
                                        $bday='Today';
                                    }else if($b[$i]->bday==$tomorrow){
                                        $bday='Tomorrow';
                                    }else{
                                        $date =new DateTime();
                                        $Y= $date->format('Y');
                                        $bday=$b[$i]->bday;
                                    }
                                    $empphotodata = $this->dash_mod->get_employee_photo_details_by_id($b[$i]->id);
                                    ?>
                                    <div class="m-widget4__item" style="border-bottom: 2px silver">
                                        <div class="m-widget4__img m-widget4__img--pic">
                                            <img src="<?php echo base_url(''); ?>uploads/employee_photos/<?php echo $empphotodata->photo; ?>" alt="employee" alt="" style="border-radius: 50%;border-style: none;width: 40px;">
                                        </div>
                                        <div class="m-widget4__info">
                                            <span class="m-widget4__title">
                                            <?php echo $b[$i]->first_name." ".$b[$i]->last_name; ?>
                                            </span>
                                        </div>
                                        <div class="m-widget4__ext">
                                            <a href="#" class="m-btn m-btn--pill m-btn--hover-brand btn btn-sm btn-secondary"><?php echo $bday?></a>
                                        </div>
                                    </div>
                                <?php }} ?>
                                <div id="load_birthdays" class="mt-actions">
                                </div>
                                <!--end::Widget 14 Item-->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" >
                    <div class="element-wrapper">
                        <div class="element-actions">
                        </div>
                        <!--<h6 class="element-header">

                        </h6>-->
                        <div class="card-header bg-info">
                            <h4 class="card-title  text-white" style="display: inline-block"> Events & Announcements</h4>
                        </div>
                        <div class="element-box" style='background-image: url("<?php echo base_url(''); ?>assets/images/background/event.png");'>
                            <div class="m-widget4" style="height: 220px; overflow-y: scroll">
                                <?php foreach($events as $event){

//                                   $dep_id = $this->dash_mod->get_employee(array('id'=>USER_ID))->department;
                                   if($this->dash_mod->user_view_perm(USER_ID,$event->emp_department,$event->id)) {
                                       ?>
                                       <div class="m-widget4__item"
                                            style="border-bottom: 1px silver dashed; width: 100%">
                                           <div>
                                            <span class="pull-left">
                                            <?php echo $event->event_title; ?>
                                                <br><span
                                                        class="label label-info"> <?php echo $event->datetime; ?></span>
                                            </span>
                                               <button class="mr-2 mb-2 btn btn-primary btn-sm pull-right"
                                                       data-target="#moreinfo_<?php echo $event->id; ?>"
                                                       data-toggle="modal" type="button" style="margin-top: 10px;"><i
                                                           class="fa fa-envelope-o"></i></button>
                                               <div aria-hidden="true" class="onboarding-modal modal fade animated"
                                                    id="moreinfo_<?php echo $event->id; ?>" role="dialog" tabindex="-1">
                                                   <div class="modal-dialog modal-lg modal-centered" role="document">
                                                       <div class="modal-content text-center">
                                                           <button aria-label="Close" class="close" data-dismiss="modal"
                                                                   type="button"><span
                                                                       class="close-label">Close</span><span
                                                                       class="os-icon os-icon-close"></span></button>
                                                           <div class="onboarding-side-by-side">
                                                               <div class="onboarding-media">
                                                                   <img alt=""
                                                                        src="<?php echo base_url(''); ?>assets/img/dash/alert.png"
                                                                        width="100px">
                                                               </div>
                                                               <div class="onboarding-content with-gradient">
                                                                   <h4 class="onboarding-title">
                                                                       <?php echo $event->event_title; ?>
                                                                       <br><span
                                                                               class="label label-info"> <?php echo $event->datetime; ?></span>
                                                                   </h4>
                                                                   <div class="onboarding-text"
                                                                        style="color: #0A0A0A;font-size: 20px;">
                                                                       <b><?php echo $event->event_details; ?></b>

                                                                   </div>
                                                               </div>
                                                           </div>
                                                       </div>
                                                   </div>
                                               </div>

                                           </div>
                                       </div>
                                       <?php

                                   }}?>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                $liu_details = 0;
                $short_leave =0;
                $leave_employee_id = USER_ID;

                $this_month = date('Y-m');

                $monthly_pay = PAY_MONTHLY;
                $pay_month_start = PAY_FROM_DAY;
                $pay_month_end = PAY_UPTO_DAY;

                if($monthly_pay=='NO'){
                    $date = new DateTime($this_month."-".$pay_month_end);
                    $edate =  $date->format('Y-m-d');
                    $end_month= $edate;
                    $time = strtotime($this_month."-".$pay_month_start);
                    $start_month = date("Y-m-d", strtotime("-1 month", $time));
                }else{
                    $start_month = $this_month."-01";
                    $end_month = date("Y-m-t", strtotime($this_month));
                }

                $short_leave_details = $this->leave_management_mod->get_short_leave_count($leave_employee_id,$start_month,$end_month)->short;

                if(!$short_leave_details){
                    $short_leave = 2;
                }else{
                    if($short_leave_details>0 && $short_leave_details<=2) {
                        $short_leave = 2 - $short_leave_details;
                    }else{
                        $short_leave = 0;
                    }
                }

                $dateeee = date('Y-m-d', strtotime('first day of january this year'));
                $ldata = $this->leave_settings_mod->get_leave_period_data($dateeee);

                $leave_period_of_leave_start_day = $this->leave_settings_mod->get_leave_period(array('period_start <=' => $ldata->period_start, 'period_end >=' => $ldata->period_end), "month")->row();

                $leave_period = $leave_period_of_leave_start_day;


                $short_liu_details = $this->leave_management_mod->get_liu_leave_count($leave_employee_id,$leave_period->period_start,$leave_period->period_end)->liu;

                if($short_liu_details>0){

                    $liu_details = $short_liu_details;
                }
                ?>
                <div class="col-md-4" >
                    <div class="element-wrapper" >
                        <div class="element-actions">
                        </div>
                        <div class="card-header bg-primary">
                            <h4 class="card-title  text-white" style="display: inline-block"> Leave Balance</h4>
                        </div>
                        <div class="element-box">
                            <div class="d-flex no-block align-items-center">
                                <div style="height: 172px;">
                                    <canvas id="pieChart"></canvas>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                       <span style="display:block;text-align: center">Short Leave (Monthly) </span>   <h6 style="text-align: center" > <span style="color: #047bf8"><?php echo $short_leave; ?></span>
                                    </h6>
                                </div>
                                <div class="col-md-6">

                                    <span style="display:block;text-align: center"> Liue Leave</span><h6  style="text-align: center" > <span style="color: #047bf8"><?php echo $liu_details; ?></span>
                                    </h6>
                                </div>
                            </div>
<!--                            <div class="project-info">-->
<!--                                <div class="row align-items-center">-->
<!--                                -->
<!--                                        <div class="row">-->
<!--                                            <div class="col-6">-->
<!--                                                <div class="el-tablo highlight">-->
<!--                                                    <div class="label">-->
<!--                                                        SH Leaves-->
<!--                                                    </div>-->
<!--                                                    <div class="value">-->
<!--                                                        --><?php //echo $short_leave; ?>
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                            <div class="col-6">-->
<!--                                                <div class="el-tablo highlight">-->
<!--                                                    <div class="label">-->
<!--                                                        Liue  Leave-->
<!--                                                    </div>-->
<!--                                                    <div class="value">-->
<!--                                                        --><?php //echo $liu_details; ?>
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!---->
<!---->
<!--                                </div>-->
<!--                            </div>-->
                        </div>
                    </div>
                </div>
<!--                <div class="col-md-4" >-->
<!---->
<!--                    <div class="element-wrapper" >-->
<!--                        <div class="element-actions">-->
<!--                        </div>-->
<!--                        <div class="card-header bg-primary">-->
<!--                            <h4 class="card-title  text-white" style="display: inline-block"> Other Leave Blance</h4>-->
<!--                        </div>-->
<!--                        <div class="element-box">-->
<!--                            <div class="padded m-b">-->
<!---->
<!--                                <div class="row">-->
<!--                                    <div class="col-6 b-r b-b">-->
<!--                                        <div class="el-tablo centered padded-v-big highlight bigger">-->
<!--                                            <div class="label">-->
<!--                                                SH Leaves-->
<!--                                            </div>-->
<!--                                            <div class="value">-->
<!--                                                --><?php //echo $short_leave; ?>
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="col-6 b-b">-->
<!--                                        <div class="el-tablo centered padded-v-big highlight bigger">-->
<!--                                            <div class="label">-->
<!--                                                Liue  Leave-->
<!--                                            </div>-->
<!--                                            <div class="value">-->
<!--                                                --><?php //echo $liu_details; ?>
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!---->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
            </div>
        </div>
    </div>
</div>

<?php

$title=$leave_title;

?>

<script src="<?php echo base_url(); ?>assets/js/charts/chart.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/charts/chart.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/charts/chart.PieceLabel.js" type="text/javascript"></script>

<script>
    $(document).ready(function() {
        var ctxP = document.getElementById("pieChart").getContext('2d');
        var myPieChart = new Chart(ctxP, {


            type: 'pie',
            data: {
                datasets: [
                    {
                        //data: datos.pr_day,
                        data: [<?php echo $leave_count; ?>],
                        backgroundColor: [<?php echo $leave_color; ?>],
                        hoverBackgroundColor: [<?php echo $leave_color; ?>]

                    }
                ],
                labels: [<?php echo $leave_title; ?>]
                //labels: datos.dept
            },
            options: {
                pieceLabel: {
                    mode: 'value',
                    fontColor: '#fff',
                    fontSize: 14,
                    fontFamily: "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif",
                    fontStyle: 'bold',
                    showZero: true,
                    overlap: true,
                    position: 'default'
                },
                responsive: true,
                legend: {
                    position: 'right',
                    labels: {

                        boxWidth: 10,
                        padding: 10
                    }
                }
            }
        });
    });

</script>



<!--update for kreston only code DBKV001-->
<script>

    $(document).ready(function(){
        check_in_out();
    });

    function check_in_out(){

        $.ajax({

            url :"<?php echo base_url()?>dashboard/dashboard/check_in_out",
            type:"POST",
            data:{
                "<?php echo $this->security->get_csrf_token_name(); ?>":"<?php echo $this->security->get_csrf_hash(); ?>"
            },
            dataType: "JSON",
            success: function(data){

                if(data.count == 1){
                    $('#punch-in').prop('disabled',true);
                    $('#punch-out').prop('disabled',false);
                }
                else if(data.count >= 2){
                    $('#punch-in').prop('disabled',true);
                    $('#punch-out').prop('disabled',true);
                }
                else{
                    $('#punch-in').prop('disabled',false);
                    $('#punch-out').prop('disabled',false);
                }

                if(data.emp_category == 7){
                    $('#check-div').show();
                }
                else{
                    $('#check-div').css('display','none');
                }

            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
                console.log('Error Check IN');
            }
        });
    }

    function BootboxContent() {

        var frm_str ='<div class="form-group">'
            + '<label style="width:80%">Are Sure Confirm this Date & Time ?</label>'
            + '<input class="form-control" disabled value="<?php echo date('Y-m-d h:i:s'); ?>">'
            + '</div>';

        var object = $('<div/>').html(frm_str).contents();

        return object
    }

    function onPunchIn(){

        bootbox.dialog({
            message: BootboxContent,
            title: "Confirmation",
            buttons: {
                ok: {

                    label: "Yes",
                    className: "btn-primary",
                    callback: function () {

                        $.ajax({

                            url :"<?php echo base_url()?>dashboard/dashboard/get_employee_attendance",
                            type:"POST",
                            data:{
                                "check":"ckeck_in",
                                "<?php echo $this->security->get_csrf_token_name(); ?>":"<?php echo $this->security->get_csrf_hash(); ?>"
                            },
                            dataType: "JSON",
                            success: function(data){

                                check_in_out();
                                bootbox.alert(data.message);
                                data.status ? console.log("Check IN/OUT Confirmed!") : console.log("Confirmation failed.Please Try Again");

                            },
                            error: function (jqXHR, textStatus, errorThrown)
                            {
                                console.log(jqXHR);
                                console.log(textStatus);
                                console.log(errorThrown);
                                console.log('Error Check IN');
                            }
                        });
                    }
                },
                cancel: {
                    label: "No",
                    className: "btn-default"
                }
            }
        });
    }

    function onPunchOut(){

        bootbox.dialog({
            message: BootboxContent,
            title: "Confirmation",
            buttons: {
                ok: {

                    label: "Yes",
                    className: "btn-primary",
                    callback: function () {

                        $.ajax({

                            url :"<?php echo base_url()?>dashboard/dashboard/get_employee_attendance",
                            type:"POST",
                            data:{
                                "check":"ckeck_out",
                                "<?php echo $this->security->get_csrf_token_name(); ?>":"<?php echo $this->security->get_csrf_hash(); ?>"
                            },
                            dataType: "JSON",
                            success: function(data){

                                check_in_out();
                                bootbox.alert(data.message);
                                data.status ? console.log("Check IN/OUT Confirmed!") : console.log("Confirmation failed.Please Try Again");

                            },
                            error: function (jqXHR, textStatus, errorThrown)
                            {
                                console.log(jqXHR);
                                console.log(textStatus);
                                console.log(errorThrown);
                                console.log('Error Check IN');
                            }
                        });
                    }
                },
                cancel: {
                    label: "No",
                    className: "btn-default"
                }
            }
        });
    }

</script>
<!--update for kreston only code DBKV001-->

