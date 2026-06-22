<div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Attendance Management -<span style="font-size: 16px"> Dashboard & Statistics </span></h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Attendance Management Dashboard</li>
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
    </div>
    <div class="row">
            <div class="col-md-6">
                <div class="element-wrapper">
                    <div class="element-actions">
                        <?php
                        $d = new DateTime('first day of this month');
                        $from_date= $d->format('Y-m-d');
                        $last= $d->format('Y-m-d');
                        $to_date=date('Y-m-d', strtotime($last. ' + 1 month'));
                        ?>

                        <input type="hidden" id="from_date" name="from_date" value="<?php echo $from_date; ?>">
                        <input type="hidden" id="to_date" name="to_date"  value="<?php echo $to_date; ?>">
                        <div id="dashboard-report-range" class="btn btn-sm pull-left" data-container="body" data-placement="bottom" data-original-title="Change dashboard date range" style=" background: #d46c20;color: #fff;margin-top: 10px;">
                            <i class="icon-calendar"></i>Period :
                            <span class="new thin uppercase hidden-xs"></span>&nbsp;
                            <i class="fa fa-angle-down"></i>
                        </div>
                    </div>
                    <!--<h6 class="element-header">

                    </h6>-->
                    <div class="card-header bg-cyan">
                        <h4 class="card-title  text-white" style="display: inline-block"> Employee Attendance - Daily</h4>
                    </div>
                    <div class="element-box">
                        <div id="chartContainer">
                            <canvas id="mycanvas"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="element-wrapper">
                    <div class="element-actions">
                    </div>
                    <!--<h6 class="element-header">

                    </h6>-->
                    <div class="card-header bg-cyan">
                        <h4 class="card-title  text-white" style="display: inline-block"> Employee Attendance - Monthly</h4>
                    </div>
                    <div class="element-box">
                        <div id="chartContainerM">
                            <canvas id="att_monthly"></canvas>
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
        load_attenedance();


    });


    $('a[data-action="reload-att"]').on('click',function(){
        var block_ele = $(this).closest('.card');
        load_attenedance();
        // Block Element
        block_ele.block({
            message: '<div class="ft-refresh-cw icon-spin font-medium-2"></div>',
            timeout: 2000, //unblock after 2 seconds
            overlayCSS: {
                backgroundColor: '#FFF',
                cursor: 'wait'
            },
            css: {
                border: 0,
                padding: 0,
                backgroundColor: 'none'
            }
        });
    });

    $('a[data-action="reload-monthly"]').on('click',function(){
        var block_ele = $(this).closest('.card');
        load_attenedance_monthly();
        // Block Element
        block_ele.block({
            message: '<div class="ft-refresh-cw icon-spin font-medium-2"></div>',
            timeout: 2000, //unblock after 2 seconds
            overlayCSS: {
                backgroundColor: '#FFF',
                cursor: 'wait'
            },
            css: {
                border: 0,
                padding: 0,
                backgroundColor: 'none'
            }
        });
    });

    $(document).ready(function() {
        load_attenedance(); //this calls it on load
        load_attenedance_monthly(); //this calls it on load

        //$("select#marca").change(load_attenedance);
    });

    function load_attenedance()
    {
        var from_date = $('#from_date').val();
        var to_date = $('#to_date').val();
        $.ajax({
            url: "<?php echo site_url('dashboard/getAttendanceData'); ?>",
            method: "POST",
            data: {
                "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash()?>",
                "from_date": from_date,
                "to_date": to_date
            },
            success: function(data) {
                //console.log(data);
                /*var pr_day = [];
                 var ab_day = [];
                 var da_num = [];

                 for(var i in data) {
                 pr_day.push(data[i].pr_day);
                 ab_day.push(data[i].ab_day);
                 da_num.push(data[i].da_num);
                 }*/

                var datos = JSON.parse(data);

                var myChartData = {
                    type: 'line',
                    data: {
                        labels: datos.da_num,
                        datasets: [{
                            label: 'Present',
                            data: datos.pr_day,
                           // backgroundColor: '#3e95cd',
                            borderColor: '#3e95cd',
                            borderWidth: 1
                        },
                            {
                                label: 'Absent',
                                data: datos.ab_day,
                               // backgroundColor: '#8e5ea2',
                                borderColor: '#8e5ea2',
                                borderWidth: 1
                            }]
                    },
                    options: {
                        scales: {
                            xAxes: [{
                                display: true,
                                scaleLabel: {
                                    display: true,
                                    labelString: 'Date'
                                }
                            }],
                            yAxes: [{
                                display: true,
                                scaleLabel: {
                                    display: true,
                                    labelString: 'Employee Count'
                                },
                                ticks: {
                                    beginAtZero: true,
                                    userCallback: function(label, index, labels) {
                                        if (Math.floor(label) === label) {
                                            return label;
                                        }

                                    },
                                }
                            }]
                        },
                        responsive: true,
                        legend: {
                            position: 'top'
                        },
                        title: {
                            display: true,
                            text: 'Employee Attendance Chart'
                        }
                    }
                };

                document.getElementById("chartContainer").innerHTML = '&nbsp;';
                document.getElementById("chartContainer").innerHTML = '<canvas id="mycanvas"></canvas>';
                var ctx = document.getElementById("mycanvas").getContext('2d');
                window.myBarC = new Chart(ctx, myChartData);


                var block_ele = $('#emp_data_reload').closest('.card');
                // Block Element
                block_ele.block({
                    message: '<div class="ft-refresh-cw icon-spin font-medium-2"><i class="fa fa-circle-o-notch fa-2x"></i></div>',
                    timeout: 2000, //unblock after 2 seconds
                    overlayCSS: {
                        backgroundColor: '#FFF',
                        cursor: 'wait'
                    },
                    css: {
                        border: 0,
                        padding: 0,
                        backgroundColor: 'none'
                    }
                });

            },
            error: function(data) {
                console.log(data);
            }
        });
    }

    function load_attenedance_monthly()
    {

        var from_date = $('#from_date').val();
        $.ajax({
            url: "<?php echo site_url('dashboard/getAttendanceDataMonthly'); ?>",
            method: "POST",
            data: {
                "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash()?>",
                "from_date": from_date
            },
            success: function(data) {

                var datos = JSON.parse(data);

                var myChartMData = {
                    type: 'bar',
                    data: {
                        labels: datos.da_num,
                        datasets: [{
                            label: 'Present',
                            data: datos.pr_day,
                            fill: false,
                            backgroundColor: '#96d277',
                            borderColor: '#96d277',
                            borderWidth: 1
                        },
                            {
                                label: 'Absent',
                                data: datos.ab_day,
                                fill: false,
                                backgroundColor: '#f7563d',
                                borderColor: '#f72158',
                                borderWidth: 1
                            }]
                    },
                    options: {
                        scales: {
                            xAxes: [{
                                display: true,
                                scaleLabel: {
                                    display: true,
                                    labelString: 'Month'
                                }
                            }],
                            yAxes: [{
                                display: true,
                                scaleLabel: {
                                    display: true,
                                    labelString: 'Employees Count'
                                },
                                ticks: {
                                    beginAtZero: true,
                                    userCallback: function(label, index, labels) {
                                        if (Math.floor(label) === label) {
                                            return label;
                                        }

                                    },
                                }
                            }]
                        },
                        responsive: true,
                        legend: {
                            position: 'top'
                        },
                        title: {
                            display: true,
                            text: 'Employee Attendance Chart'
                        }
                    }
                };

                document.getElementById("chartContainerM").innerHTML = '&nbsp;';
                document.getElementById("chartContainerM").innerHTML = '<canvas id="att_monthly"></canvas>';
                var ctx = document.getElementById("att_monthly").getContext('2d');
                window.myBarCM = new Chart(ctx, myChartMData);


                var block_ele = $('#emp_monthly_data_reload').closest('.card');
                // Block Element
                block_ele.block({
                    message: '<div class="ft-refresh-cw icon-spin font-medium-2"><i class="fa fa-circle-o-notch fa-2x"></i></div>',
                    timeout: 2000, //unblock after 2 seconds
                    overlayCSS: {
                        backgroundColor: '#FFF',
                        cursor: 'wait'
                    },
                    css: {
                        border: 0,
                        padding: 0,
                        backgroundColor: 'none'
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