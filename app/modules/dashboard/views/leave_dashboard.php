<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Leave Management - <span style="font-size: 16px"> Dashboard & Statistics</span></h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Leave Management Dashboard</li>
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
    //var_dump($state);
    $pending=0;
    $approve=0;
    $reject=0;
    $cancel=0;
    foreach($state as $st){

        if($st->status=="Pending"){
            $pending=$st->lv_status;
        }

        if($st->status=="Approved"){
            $approve=$st->lv_status;
        }

        if($st->status=="Rejected"){
            $reject=$st->lv_status;
        }

        if($st->status=="Cancelled"){
            $cancel=$st->lv_status;
        }
    }
    ?>
</div>

<div id="hr">
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

    <div class="element-content">
        <div class="row">
            <div class="col-sm-3 col-xxxl-3">
                <a class="element-box el-tablo" href="<?php echo base_url('systems/leave_management_con');?>" >
                    <div class="d-flex no-block align-items-center row">
                        <div class="col-sm-9">
                            <div class="label" style="font-size: 1.2rem">
                                <i class="icon-hourglass"></i>
                                Pending
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="value">
                                <h2 class="counter text-primary"><?php echo $pending; ?></h2>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-3 col-xxxl-3">
                <a class="element-box el-tablo" href="<?php echo base_url('systems/leave_management_con');?>" >
                    <div class="d-flex no-block align-items-center row">
                        <div class="col-sm-9">
                            <div class="label" style="font-size: 1.2rem">
                                <i class="icon-check"></i>
                                Approved
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="value">
                                <h2 class="counter text-primary"><?php echo $approve; ?></h2>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-3 col-xxxl-3">
                <a class="element-box el-tablo" href="<?php echo base_url('systems/leave_management_con');?>" >
                    <div class="d-flex no-block align-items-center row">
                        <div class="col-sm-9">
                            <div class="label" style="font-size: 1.2rem">
                                <i class="icon-close"></i>
                                Rejected
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="value">
                                <h2 class="counter text-primary"><?php echo $reject; ?></h2>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-3 col-xxxl-3">
                <a class="element-box el-tablo" href="<?php echo base_url('systems/leave_management_con');?>" >
                    <div class="d-flex no-block align-items-center row">
                        <div class="col-sm-9">
                            <div class="label" style="font-size: 1.2rem">
                                <i class="icon-ban"></i>
                                Cancelled
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="value">
                                <h2 class="counter text-primary"><?php echo $cancel; ?></h2>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <?php
            $d = new DateTime('first day of this month');
            $from_date= $d->format('Y-m-d');
            $last= $d->format('Y-m-d');
            $to_date=date('Y-m-d', strtotime($last. ' + 1 month'));
            ?>

            <input type="hidden" id="from_date" name="from_date" value="<?php echo $from_date; ?>">
            <input type="hidden" id="to_date" name="to_date"  value="<?php echo $to_date; ?>">

        </div>
        <div class="col-md-6">
            <div class="element-wrapper">
                <div class="element-actions">
                </div>
                <!--<h6 class="element-header">

                </h6>-->
                <div class="card-header bg-info">
                    <h4 class="card-title  text-white" style="display: inline-block"> Employee Leaves - Monthly</h4>
                </div>
                <div class="element-box">
                    <div id="chartContainer1">
                        <canvas id="lev_monthly"></canvas>
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
                <div class="card-header bg-danger">
                    <h4 class="card-title  text-white" style="display: inline-block"> Employee Leaves by Type - Monthly</h4>
                </div>
                <div class="element-box">
                    <div id="chartContainer2">
                        <canvas id="lev_type_monthly"></canvas>
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


            leave_monthly();
            leave_by_type_monthly();
        });


        $('a[data-action="reload-att"]').on('click',function(){
            var block_ele = $(this).closest('.card');
            leave_monthly();

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
            leave_by_type_monthly();
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

            leave_monthly();
            leave_by_type_monthly();

        });


        function leave_monthly(){

            var from_date = $('#from_date').val();
            $.ajax({
                url: "<?php echo site_url('dashboard/get_leave_monthly'); ?>",
                method: "POST",
                data: {
                    "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash()?>",
                    "from_date": from_date
                },
                success: function(data) {

                    var datos = JSON.parse(data);

                    var myChartLData = {
                        type: 'bar',
                        data: {
                            labels: datos.da_num,
                            datasets: [{
                                label: 'Leave',
                                data: datos.lv_day,
                                fill: false,
                                backgroundColor: '#FF5722',
                                borderColor: '#FF5722',
                                borderWidth: 1
                            }
                            ]
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
                                        labelString: 'Leave Count'
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
                                text: 'Employee Leave Chart'
                            }
                        }
                    };

                    document.getElementById("chartContainer1").innerHTML = '&nbsp;';
                    document.getElementById("chartContainer1").innerHTML = '<canvas id="lev_monthly"></canvas>';
                    var ctx = document.getElementById("lev_monthly").getContext('2d');
                    window.myBarCM = new Chart(ctx, myChartLData);


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

        function leave_by_type_monthly(){

            var from_date = $('#from_date').val();
            $.ajax({
                url: "<?php echo site_url('dashboard/get_leave_by_type_monthly'); ?>",
                method: "POST",
                data: {
                    "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash()?>",
                    "from_date": from_date
                },
                success: function(data) {

                    var datos = JSON.parse(data);



                    var myChartLTData = {
                        type: 'bar',
                        data: {
                            labels: datos.da_num,
                            datasets: [{
                                label: 'Casual',
                                data: datos.cas_lv,
                                fill: false,
                                backgroundColor: '#9C27B0',
                                borderColor: '#9C27B0',
                                borderWidth: 1
                            },
                                {
                                    label: 'Annual',
                                    data: datos.ann_lv,
                                    fill: false,
                                    backgroundColor: '#009688',
                                    borderColor: '#009688',
                                    borderWidth: 1
                                },

                                {
                                    label: 'Medical',
                                    data: datos.med_lv,
                                    fill: false,
                                    backgroundColor: '#FF9800',
                                    borderColor: '#FF9800',
                                    borderWidth: 1
                                }
                            ]
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
                                        labelString: 'Leave Count'
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
                                text: 'Employee Leave by Type Chart'
                            }
                        }
                    };

                    document.getElementById("chartContainer2").innerHTML = '&nbsp;';
                    document.getElementById("chartContainer2").innerHTML = '<canvas id="lev_type_monthly"></canvas>';
                    var ctx = document.getElementById("lev_type_monthly").getContext('2d');
                    window.myBarCM = new Chart(ctx, myChartLTData);


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