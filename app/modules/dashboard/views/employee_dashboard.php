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
        <h4 class="text-themecolor">Employee Management - <span style="font-size: 16px">Dashboard & Statistics</span></h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
                <li class="breadcrumb-item active">Employee Management Dashboard</li>
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
            <div class="element-wrapper">
                <!--<div class="element-actions">
                </div>
                <h6 class="element-header">
                    Sales Dashboard
                </h6>-->
                <div class="element-content">
                    <div class="row">
                        <div class="col-sm-3 col-xxxl-3">
                            <a class="element-box el-tablo cta-w cta-with-media purple dashboard-stat" href="<?php echo base_url('dashboard/employee_dashboard');?>">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <i class="fa fa-users"></i>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="cta-content">
                                            <!--<div class="highlight-header">

                                            </div>-->
                                            <h3 class="cta-header">
                                                Employee Management
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-3 col-xxxl-3">
                            <a class="element-box el-tablo cta-w cta-with-media purple dashboard-stat" href="<?php echo site_url('dashboard/attendance_dashboard'); ?>">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <i class="fa fa-calendar-check-o"></i>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="cta-content">
                                            <!--<div class="highlight-header">

                                            </div>-->
                                            <h3 class="cta-header">
                                                Attendance Management
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-3 col-xxxl-3">
                            <a class="element-box el-tablo cta-w cta-with-media purple dashboard-stat" href="<?php echo base_url('dashboard/leave_dashboard');?>">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="cta-content">
                                            <!--<div class="highlight-header">

                                            </div>-->
                                            <h3 class="cta-header">
                                                Leave Management
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-3 col-xxxl-3">
                            <a class="element-box el-tablo cta-w cta-with-media purple dashboard-stat" href="<?php echo base_url('dashboard/payroll_dashboard');?>">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <i class="fa fa-money"></i>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="cta-content">
                                            <!--<div class="highlight-header">

                                            </div>-->
                                            <h3 class="cta-header">
                                                Payroll Management
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4">
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
                                $i=0;
                                foreach($bday as $b){

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
                                <?php }?>
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
                                <?php foreach($events as $event){ ?>
                                    <div class="m-widget4__item" style="border-bottom: 1px silver dashed; width: 100%">
                                        <div>
                                            <span class="pull-left">
                                            <?php echo $event->event_title; ?>
                                                <br><span class="label label-info"> <?php echo $event->datetime ; ?></span>
                                            </span>
                                            <button class="mr-2 mb-2 btn btn-primary btn-sm pull-right" data-target="#moreinfo_<?php echo $event->id; ?>" data-toggle="modal" type="button" style="margin-top: 10px;"><i class="fa fa-envelope-o"></i></button>
                                            <div aria-hidden="true" class="onboarding-modal modal fade animated" id="moreinfo_<?php echo $event->id; ?>" role="dialog" tabindex="-1">
                                                <div class="modal-dialog modal-lg modal-centered" role="document">
                                                    <div class="modal-content text-center">
                                                        <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span class="close-label">Close</span><span class="os-icon os-icon-close"></span></button>
                                                        <div class="onboarding-side-by-side">
                                                            <div class="onboarding-media">
                                                                <img alt="" src="<?php echo base_url(''); ?>assets/img/dash/event<?php echo $event->event_type; ?>.png" width="100px">
                                                            </div>
                                                            <div class="onboarding-content with-gradient">
                                                                <h4 class="onboarding-title">
                                                                    <?php echo $event->event_title; ?>
                                                                    <br> <span class="label label-info"> <?php echo $event->datetime ; ?></span>
                                                                </h4>
                                                                <div class="onboarding-text" style="color: #0A0A0A;font-size: 20px;">
                                                                    <b><?php echo $event->event_details; ?></b>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                <?php }?>
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
                        <div class="card-header bg-primary">
                            <!--<h4 class="card-title  text-white" style="display: inline-block"> Daily Attendance By Departments</h4>--><ul class="nav nav-pills" role="tablist">
                                <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#tab_1" role="tab" aria-selected="true"><span class="hidden-xs-down">Employees By Department</span></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tab_2" role="tab" aria-selected="false"><span class="hidden-xs-down">Employees By Category</span></a> </li>
                            </ul>
                        </div>
                        <div class="element-box">
                            <div class="tab-content" style="height: 218px;">
                                <div class="tab-pane active show p-20" id="tab_1" role="tabpanel">
                                    <canvas id="pieChartDept"></canvas>
                                </div>
                                <div class="tab-pane p-20" id="tab_2" role="tabpanel">
                                    <canvas id="pieChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url(); ?>assets/js/charts/chart.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/charts/chart.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/charts/chart.PieceLabel.js" type="text/javascript"></script>

<script>
    $(document).ready(function () {
        $('#dashboard-report-range').daterangepicker({
            "ranges": {
                'Last 30 Days': [moment().subtract('days', 29), moment()],
                'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')],
                'This Month': [moment().startOf('month'), moment().endOf('month')]
            }
        }, function(start, end, label) {
            var start_date = start.format('YYYY-MM-DD'), end_date = end.format('YYYY-MM-DD');
            $('#dashboard-report-range span').html(start_date + ' - ' + end_date);
            $('#from_date').val(start_date);
            $('#to_date').val(end_date);
            //showBirthdays(start_date, end_date, label);
            //getAttendance(start, end, label, showAttendance);

        });

        $(document).ready(function() {


            load_emp_status();
            load_birtday_list();
            load_emp_dept();
            //$("select#marca").change(load_attenedance);
        });

        function load_birtday_list()
        {

            var from_date = $('#from_date').val();
            var to_date = $('#to_date').val();

            $.ajax({
                url: "<?php echo site_url('dashboard/getBirthdays'); ?>",
                method: "POST",
                data: {
                    "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash()?>",
                    "from_date": from_date,
                    "to_date": to_date
                },
                success: function(data) {
                    console.log(data);
                },
                error: function(data) {
                    console.log(data);
                }
            });
        }

        function load_emp_status(){

            $.ajax({

                url: "<?php echo site_url('dashboard/emp_status'); ?>",
                method: "POST",
                data: {
                    "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash()?>"
                },
                success: function(data) {

                    var datos = JSON.parse(data);

                    var ctxP = document.getElementById("pieChart").getContext('2d');

                    var myPieChart = new Chart(ctxP, {


                        type: 'pie',
                        data: {
                            datasets: [
                                {
                                    data:datos.cat_count,
                                    // data: [80, 150,30],
                                    backgroundColor: ["#F06292","#BA68C8","#81C784","#FFD54F","#4FC3F7","#FF8A65","#12CBC4","#A1887F","#FFB74D",],
                                    hoverBackgroundColor: ["#F06292","#BA68C8","#81C784","#FFD54F","#4FC3F7","#FF8A65","#12CBC4","#A1887F","#FFB74D"]

                                }
                            ],
                            //labels: ["Management Staff", "Office Staff", "Skilled And Unskilled"]
                            labels: datos.cde
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

                                    boxWidth: 20,
                                    padding: 20
                                }
                            }
                        }
                    });


                },
                error: function(data) {
                    console.log(data);
                }
            });


        }

        function load_emp_dept(){


            $.ajax({

                url: "<?php echo site_url('dashboard/emp_dept'); ?>",
                method: "POST",
                data: {
                    "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash()?>"
                },
                success: function(data) {

                    var datos = JSON.parse(data);

                    var ctxP = document.getElementById("pieChartDept").getContext('2d');

                    var myPieChart = new Chart(ctxP, {


                        type: 'pie',
                        data: {
                            datasets: [
                                {
                                    data:datos.dep_count,
                                    // data: [80, 150,30],
                                    backgroundColor: ["#BA68C8","#81C784","#F06292","#FFD54F","#4FC3F7","#FF8A65","#12CBC4","#A1887F","#FFB74D"],
                                    hoverBackgroundColor: ["#BA68C8","#81C784","#F06292","#FFD54F","#4FC3F7","#FF8A65","#12CBC4","#A1887F","#FFB74D"]

                                }
                            ],
                            // labels: ["Management Staff", "Office Staff", "Skilled And Unskilled"]
                            labels: datos.cde
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

                                    boxWidth: 20,
                                    padding: 20
                                }
                            }
                        }
                    });

                },
                error: function(data) {
                    console.log(data);
                }
            });

        }

    });

</script>