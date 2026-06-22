<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Payroll Management - <span style="font-size: 16px">Dashboard & Statistics</span></h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Payroll Management Dashboard</li>
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
        <div class="col-md-12">
            <?php
            $d = new DateTime('first day of this month');
            $from_date= $d->format('Y-m-d');
            $l=new DateTime('last day of this month');
            $from_date= $d->format('Y');
            $to_date=$l->format('Y-m-d');
//            $last= $d->format('Y-m-d');
//            $to_date=date('Y-m-d', strtotime($last. ' + 1 month'));
            ?>
            YEAR <input type="text" name="from_date" id="from_date"  class="year_select" placeholder="Year"  data-date-format="yyyy" style="width: 120px;text-align: center;"  value="<?php echo $from_date; ?>">

        </div>
        <div class="col-md-6">
            <div class="element-wrapper">
                <div class="element-actions">

                </div>
                <!--<h6 class="element-header">

                </h6>-->
                <div class="card-header bg-primary">
                    <h4 class="card-title  text-white" style="display: inline-block"> Salary</h4>
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
                <div class="card-header bg-primary">
                    <h4 class="card-title  text-white" style="display: inline-block"> ETF/EPF</h4>
                </div>
                <div class="element-box">
                    <div id="chartContainerM">
                        <canvas id="etf_epf"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="element-wrapper">
                <div class="element-actions">

                </div>
                <!--<h6 class="element-header">

                </h6>-->
                <div class="card-header bg-primary">
                    <h4 class="card-title  text-white" style="display: inline-block"> Total</h4>
                </div>
                <div class="element-box">
                    <div id="chartContainerT">
                        <canvas id="total"></canvas>
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
        singleDatePicker:true
//        "ranges": {
//            'Last 30 Days': [moment().subtract('days', 29), moment()],
//            'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')],
//            'This Month': [moment().startOf('month'), moment().endOf('month')]
//        }
    }, function(start,end, label) {
        var start_date = start.format('YYYY-MM-DD');
        $('#dashboard-report-range span').html(start_date );
        $('#from_date').val(start_date);
        //$('#to_date').val(end_date);
        //showBirthdays(start_date, end_date, label);
        //getAttendance(start, end, label, showAttendance);
        load_salary();
        load_etf_epf();
        load_total();
    });

    $(function()
    {   $(".year_select").datepicker({
        format: "yyyy",
        startView: "years",
        minViewMode: "years",
        autoclose:true
    });
    });

    $('.year_select').on('change',function(){
        load_salary();
        load_etf_epf();
        load_total();
    });


    $('a[data-action="reload-att"]').on('click',function(){
        var block_ele = $(this).closest('.card');
        load_salary();
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
        load_etf_epf();
        load_total();
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

        load_salary(); //this calls it on load
        load_etf_epf();
        load_total();

    });

    function load_salary()
    {
        var from_date = $('#from_date').val();
        var to_date = $('#to_date').val();
        $.ajax({
            url: "<?php echo site_url('dashboard/get_salary'); ?>",
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
                            label: 'Basic',
                            data: datos.basic,
                            fill: false,
                            backgroundColor: '#AB47BC',
                            borderColor: '#AB47BC',
                            borderWidth: 1
                        },
                            {
                                label: 'Allowance',
                                data: datos.allowance,
                                fill: false,
                                backgroundColor: '#26A69A',
                                borderColor: '#26A69A',
                                borderWidth: 1
                            },

                            {
                                label: 'OT',
                                data: datos.ot,
                                fill: false,
                                backgroundColor: '#FFCA28',
                                borderColor: '#FFCA28',
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
                                    labelString: 'payment'
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
                            text: 'Employee Salary Chart'
                        }
                    }
                };

                document.getElementById("chartContainer").innerHTML = '&nbsp;';
                document.getElementById("chartContainer").innerHTML = '<canvas id="mycanvas"></canvas>';
                var ctx = document.getElementById("mycanvas").getContext('2d');
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

    function load_etf_epf()
    {

        var from_date = $('#from_date').val();
        var to_date = $('#to_date').val();
        $.ajax({
            url: "<?php echo site_url('dashboard/get_etf_epf'); ?>",
            method: "POST",
            data: {
                "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash()?>",
                "from_date": from_date

            },
            success: function(data) {

                var datos = JSON.parse(data);

                var myChartepfData = {
                    type: 'bar',
                    data: {
                        labels: datos.da_num,
                        datasets: [{
                            label: 'ETF',
                            data: datos.etf,
                            fill: false,
                            backgroundColor: '#29B6F6',
                            borderColor: '#29B6F6',
                            borderWidth: 1
                        },
                            {
                                label: 'EPF',
                                data: datos.epf,
                                fill: false,
                                backgroundColor: '#EC407A',
                                borderColor: '#EC407A',
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
                                    labelString: 'payment'
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
                            text: 'Employee EPF/ETF Chart'
                        }
                    }
                };

                document.getElementById("chartContainerM").innerHTML = '&nbsp;';
                document.getElementById("chartContainerM").innerHTML = '<canvas id="etf_epf"></canvas>';
                var ctx = document.getElementById("etf_epf").getContext('2d');
                window.myBarCM = new Chart(ctx, myChartepfData);


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

    function load_total()
    {

        var from_date = $('#from_date').val();
        var to_date = $('#to_date').val();

        $.ajax({
            url: "<?php echo site_url('dashboard/get_total'); ?>",
            method: "POST",
            data: {
                "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash()?>",
                "from_date": from_date

            },
            success: function(data) {

                var datos = JSON.parse(data);

                var myCharttotData = {
                    type: 'bar',
                    data: {
                        labels: datos.da_num,
                        datasets: [{
                            label: 'Salary',
                            data: datos.salary,
                            fill: false,
                            backgroundColor: '#ef5350',
                            borderColor: '#ef5350',
                            borderWidth: 1
                        },
                            {
                                label: 'EPF/ETF',
                                data: datos.etf_epf,
                                fill: false,
                                backgroundColor: '#9CCC65',
                                borderColor: '#9CCC65',
                                borderWidth: 1
                            },
                            {
                                label: 'Advance',
                                data: datos.advances,
                                fill: false,
                                backgroundColor: '#8D6E63',
                                borderColor: '#8D6E63',
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
                                    labelString: 'payment'
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
                            text: 'Employee Total Payment Chart'
                        }
                    }
                };

                document.getElementById("chartContainerT").innerHTML = '&nbsp;';
                document.getElementById("chartContainerT").innerHTML = '<canvas id="total"></canvas>';
                var ctx = document.getElementById("total").getContext('2d');
                window.myBarCM = new Chart(ctx, myCharttotData);


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