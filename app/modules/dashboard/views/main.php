<style>
    .m-widget4 .m-widget4__item {
        display: table;
        padding-top: 0.012rem;
        padding-bottom: 0.25rem;
    }

    #lol-graphify-button-linear{
        background: #2090ff !important;
        border: #2090ff !important;
        color: #FFFFFF !important;
    }

    #lol-graphify-button-bar{
        background: #2090ff !important;
        border: #2090ff !important;
        color: #FFFFFF !important;
    }

    #lol-graphify-button-donut{
        background: #2090ff !important;
        border: #2090ff !important;
        color: #FFFFFF !important;
    }
</style>

<div class="row page-titles">
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">

        </div>
    </div>
    <?php
    $message = $this->session->flashdata('message');
    if(!empty($message))
    {
        if($message == "access_denied")
        {
            ?>
            <div class="alert alert-danger"><?php echo "You are not authorized to access this page."; ?></div>
            <?php
        }
    }
    ?>
</div>

<div id="hr">
    <div class="row">
        <div class="col-md-12">
            <div class="element-wrapper">
                <div class="element-content">
                    <div class="row">
                        <div class="col-sm-3 col-xxxl-3">
                            <a class="element-box el-tablo cta-w cta-with-media purple dashboard-stat" href="javascript:;">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="cta-content">
                                            <h3 class="cta-header">
                                                Employee Management
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-3 col-xxxl-3">
                            <a class="element-box el-tablo cta-w cta-with-media purple dashboard-stat" href="javascript:;">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <i class="fa fa-calculator"></i>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="cta-content">
                                            <h3 class="cta-header">
                                                Scheme Management
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-3 col-xxxl-3">
                            <a class="element-box el-tablo cta-w cta-with-media purple dashboard-stat" href="javascript:;">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <i class="fa fa-file"></i>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="cta-content">
                                            <h3 class="cta-header">
                                                Claim Management
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-3 col-xxxl-3">
                            <a class="element-box el-tablo cta-w cta-with-media purple dashboard-stat" href="javascript:;">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <i class="fa fa-cog"></i>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="cta-content">
                                            <h3 class="cta-header">
                                                User Management
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
                        <div class="card-header bg-info">
                            <h4 class="card-title text-white" style="display: inline-block">Last Five Days Claims</h4>
                        </div>
                        <div class="element-box" style="height: 300px">
                            <div class="m-widget4">
                                <canvas id="myChart1"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" >
                    <div class="element-wrapper">
                        <div class="element-actions">
                        </div>
                        <div class="card-header bg-info">
                            <h4 class="card-title  text-white" style="display: inline-block"> Monthly Claims <?php echo date("Y-F"); ?></h4>
                        </div>
                        <div class="element-box" style="height: 300px">
                            <canvas id="doughnutChart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" >
                    <div class="element-wrapper">
                        <div class="element-actions">
                        </div>
                        <div class="card-header bg-info">
                            <h4 class="card-title  text-white" style="display: inline-block"> Claims Overview <?php echo date("Y-F"); ?></h4>
                        </div>
                        <div class="element-box" style="height: 300px">
                            <div class="col-md-12 m--align-right">
                                <div class="m-widget1__list">
                                    <ul>
                                        <li style="font-size: 20px">Total CLaims Kelaniya <?php echo $claim_kelaniya; ?><br></li>
                                        <li style="font-size: 20px">Total CLaims Kalutara <?php echo $claim_kalutara; ?><br></li>
                                        <li style="font-size: 20px">Total CLaims Radial <?php echo $claim_radial; ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modernizer JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>

<!-- Bar Chart JS -->
<script src="<?php echo base_url(); ?>assets/js/plugins.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bar-chart.js"></script>
<script src="<?php echo base_url(); ?>assets/js/graph.js"></script>



<script src="<?php echo base_url(); ?>assets/js/charts/chart.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/charts/chart.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/charts/chart.PieceLabel.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.mask.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/material-charts.js" type="text/javascript"></script>

<script>

    $(document).ready(function(){

        var ctx = document.getElementById("myChart1").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels:<?php echo $fiveDaysLabels; ?>,
                datasets: [{
                    label: <?php echo $fiveDaysLabels; ?>,
                    data: <?php echo $fiveDaysAmount; ?>,
                    backgroundColor: ['#b80032','#00e5ff','#2380ff','#42bf13','#c8b511'],
                    borderColor: ['#b80032','#00e5ff','#2380ff','#42bf13','#c8b511'],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {

                            beginAtZero: true
                        }
                    }],
                    xAxes: [{
                        ticks: {


                        }
                    }]
                }
            }
        });

        //var ctx = document.getElementById("myChart2").getContext('2d');
        //var myChart = new Chart(ctx, {
        //    type: 'bar',
        //    data: {
        //        labels: <?php //echo $most_invoiced_labels; ?>//,
        //        datasets: [{
        //            label: <?php //echo $most_invoiced_labels; ?>//,
        //            //data: <?php ////json_encode($grn);?>//,
        //            data: <?php //echo $most_invoiced_amount; ?>//,
        //            backgroundColor: ['#248fc8','#248fc8','#248fc8','#248fc8','#248fc8'],
        //            borderColor: ['#248fc8','#248fc8','#248fc8','#248fc8','#248fc8'],
        //            borderWidth: 1
        //        }]
        //    },
        //    options: {
        //        scales: {
        //            yAxes: [{
        //                ticks: {
        //                    beginAtZero: true
        //                }
        //            }]
        //        }
        //    }
        //});
        //
        var ctxD = document.getElementById("doughnutChart").getContext('2d');
        var myLineChart = new Chart(ctxD, {
            type: 'doughnut',
            data: {

                datasets: [
                    {
                        data: ['<?php echo $kelaniya; ?>', '<?php echo $kalutara; ?>','<?php echo $radial; ?>'],
                        backgroundColor: ["#215ac8", "#c8004e" , "#12cc49"],
                        hoverBackgroundColor: ["#215ac8", "#c8004e", "#12cc49"]
                    }
                ],
                labels: [
                    'Kelaniya',
                    'Kalutara',
                    'Radial'

                ]
            },
            options: {
                pieceLabel: {
                    mode: 'percentage',
                    fontColor: '#fff',
                    fontSize: 14,
                    fontFamily: "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif",
                    fontStyle: 'bold',
                    showZero: true,
                    overlap: true,
                    position: 'default'
                },
                responsive: true
            }

        });
    });
</script>
