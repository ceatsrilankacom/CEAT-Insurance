<?php
/**
 * Created by PhpStorm.
 * User: kasun.demel
 * Date: 4/22/2021
 * Time: 10:52 AM
 */
?>


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
                                                Itinerary Management
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
                                                Expense Management
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
                                                Reports Management
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
                            <h4 class="card-title text-white" style="display: inline-block"> Expense Summary</h4>
                        </div>
                        <div class="element-box">
                            <div class="m-widget4" style="height:220px;">
                                <div id="doughnutChart"></div>
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
<script src="<?php echo base_url(); ?>assets/js/jquery.mask.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/material-charts.js" type="text/javascript"></script>



<script>

    var approved_val= 0;
    var pending_val= 0;
    var rejected_val=0;

    $.ajax({

        url:"<?php echo site_url('index.php/dashboard/getExpenseSummaryData'); ?>",
        type: "POST",
        dataType:"JSON",
        data: {
            "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash()?>"
        },
        success: function(data){

            approved_val = data.approved;
            pending_val = data.pending;
            rejected_val = data.rejected;

        },
        error: function(data){
            console.log(data);
        }

    });

    $(document).ready(function() {
        var ctxD = document.getElementById("doughnutChart").getContext('2d');
        var myLineChart = new Chart(ctxD, {
            type: 'doughnut',
            data: {

                datasets: [
                    {
                        data: [10,20,30],
                        backgroundColor: ["#00c853", "#ff4081", "#ff0000"],
                        hoverBackgroundColor: ["#00c853", "#ff4081", "#ff0000"]
                    }
                ],
                labels: [
                    'Approved',
                    'Pending',
                    'Rejected'
                ]
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
                responsive: true
            }

        });
    });
</script>
