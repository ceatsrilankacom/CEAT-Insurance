<?php $this->load->model('payroll_process_mod', 'payroll'); ?>

<style>
    #dyTable tbody {
        counter-reset: rowNumber;
    }
    #dyTable tbody tr {
        counter-increment: rowNumber;
    }
    #dyTable tbody tr td:first-child::before {
        content: counter(rowNumber);
    }
    .table td {
        font-size: 14px !important;
    }
    .textcomplete-dropdown {
        z-index: 999999999 !important;
    }
    .datepicker table {
        width: 100%;
    }
    .font_color {
        color: #c68626;
    }
    .datepicker.dropdown-menu {
        z-index: 99999999 !important
    }
    .paging-nav {
        text-align: right;
        padding-top: 2px;
    }
    .paging-nav a {
        margin: auto 1px;
        text-decoration: none;
        display: inline-block;
        padding: 1px 7px;
        background: #91b9e6;
        color: white;
        border-radius: 3px;
    }
    .paging-nav .selected-page {
        background: #187ed5;
        font-weight: bold;
    }
    .paging-nav,
    #report_datatable {

        margin: 0 auto;
        font-family: Arial, sans-serif;
    }
</style>

<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"></h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Payroll Management</a></li>
                <?php
                    if($this->session->userdata('payroll_name')){
                        echo ' <li class="breadcrumb-item active">'.$this->session->userdata('payroll_name').'- Month End Dashboard</li>';
                    }
                    else {

                    echo '<li class="breadcrumb-item active">Main Payroll- Month End Dashboard</li>';
                }
                ?>
            </ol>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="element-wrapper">
            <div class="element-actions">
            </div>
            <!--<h6 class="element-header">
            </h6>-->
            <div class="card-header bg-info page-head-title-wrap">
                <?php
                if($this->session->userdata('payroll_name')){
                    echo '<h4 class="page-head-title card-title  text-white" style="display: inline-block">'.$this->session->userdata('payroll_name').'- Month End Dashboard</h4>';
                }
                else {
                    echo '<h4 class="page-head-title card-title  text-white" style="display: inline-block">Main Payroll</h4>';
                }
                ?>
            </div>
            <div class="element-box">
                <?php
                $pay_data = $this->payroll->get_payroll_data($this->session->userdata('payroll_id'));
                $month = $this->payroll->get_last_month($pay_data->id);
                $p_month = $month->month;

//                $monthly_pay_t = PAY_MONTHLY;
//                $pay_month_start_t = PAY_FROM_DAY;
//                $pay_month_end_t = PAY_UPTO_DAY;

                if($pay_data->payroll_type=='NO'){
                    $pay_month_end_date_t = $p_month."-".$pay_data->period_end;
                    $time_t = strtotime($p_month."-".$pay_data->period_start);
                    $pay_month_start_date_t = date("Y-m-d", strtotime("-1 month", $time_t));
                }else{
                    $pay_month_start_date_t= $p_month."-1";
                    $time_t = strtotime($p_month."-1");
//                    $pay_month_end_date_t = date("Y-m-d", strtotime("+1 month", $time_t));
                    $pay_month_end_date_t =  date("Y-m-t", strtotime($p_month));
                }

                ?>
                <h4 class="card-title"></h4>
                <h6 class="card-subtitle"></h6>
                <div style="width: 100%; display: block;clear: both;height: 50px">
                    <?php
                    $lock_data_month = $this->payroll->get_latets_lock_status_for_monthend_locked($month->month,$pay_data->id);
                    if($lock_data_month->main_lock == 1) {?>
                        <button class="btn btn-sm btn-success d-none d-lg-block m-l-15 pull-right"
                                onclick="create_payroll_month_modal()"><i class="fa fa-arrow-circle-right"></i>
                            Create Payroll Month
                        </button>
                    <?php } ?>
                </div>
                <!--<div style="text-align: center">
                    <img style="width: 40px; height: 40px; display: none" id="loader_1" src="<?php /*echo base_url('assets/images/loading-spinner-blue.gif') */?>">
                </div>-->

                <div class="alert alert-success" id="success-alert" style="margin-bottom: 20px;" hidden="true">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <strong>Month End Salary Processed Successfully !</strong>
                </div>

                <div class="row widget-row" id="content">
                    <div class="col-lg-12" style="margin-bottom: 20px;">

                        <table style="width: 100%; border: 1px black solid ; border-collapse:collapse; text-align:center"
                               border="1">
                            <tbody>
                            <tr>
                                <th class="w15" style="text-align: center;"><?php echo date('Y-M', strtotime($month->month)) ?></th>
                                <th class="w15" style="text-align: center;"><strong><?php echo $p_month; ?></strong><span style="font-size: 15px;"> (<?php echo $pay_month_start_date_t; ?> - <?php echo $pay_month_end_date_t; ?>) </span></th>
                                <th class="w15" style="text-align: center;"></th>
                            </tr>
                            <?php foreach ($lock_type as $type) { ?>
                                <tr>
                                    <td class="l" colspan="1"><b><?php echo $type->title ?></b></td>
                                    <?php
                                    $last_month = $this->payroll->get_last_month($pay_data->id);
                                    //Summary Data
                                    $tot_active_emp = $this->payroll->getTotalEmps();

                                    $lock_task_status = $this->payroll->lock_task_status($last_month->month, $type->id,$this->session->userdata('payroll_id'));
                                    foreach ($lock_task_status as $lock_status) {
                                        if ($type->id == $lock_status->lock_type) { ?>

                                            <td>
                                                <?php
                                                if ($lock_status->status == '0') {
                                                    ?>
                                                    <?php
                                                    echo '<div id="month_end_1"><button  type="button" class="btn btn-sm btn-warning bt-add-v2 " name="month_end" id="month_end" onclick="process_month_end()" style="">Process Salary</button></div><div id="loader_sal_2" style="display: none">
                    <i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i>
                    <span class="sr-only">Loading...</span>
                </div>';
                                                } else {
                                                    echo '<span class="label label-info">Saved</span>'; ?>
                                                    <hr>
                                                    <table border="1" style="width: 100%">
                                                        <thead>
                                                        <tr>
                                                            <th>Section</th>
                                                            <th>Summary</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td>Total Employees Processed</td>
                                                            <td><?php echo $tot_active_emp->tot; ?></td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                    <?php if ($lock_status->lock == '0') { ?>
                                                        <button id="clear_m_end_full" class="btn btn-sm btn-warning m-l-15 pull-right" onclick="reverse_monthend()"><i class="fa fa-trash"></i> Clear Payroll Month</button><div id="loader_sal_3" style="display: none">
                                                            <i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i>
                                                            <span class="sr-only">Loading...</span>
                                                        </div>
                                                    <?php } else { ?>

                                                    <?php } ?>
                                                    <?php
                                                }
                                                ?>
                                            </td>
                                        <?php } else {
                                            ?>
                                            <td></td>
                                        <?php } ?>

                                        <td>
                                            <?php if ($lock_status->status == '1') { ?>
                                                <?php if ($lock_status->lock == '0') { ?>
                                                    <button id="clear_m_end" class="btn btn-sm btn-danger d-none d-lg-block m-l-15 pull-right" onclick="lock_monthend_final()"><i class="fa fa-lock"></i>
                                                        Lock Payroll Month </button>

                                                <?php } else { ?>
                                                    <span class="label label-success">Locked</span>
                                                <?php } ?>
                                            <?php } ?>
                                        </td>
                                    <?php } ?>
                                </tr>
                            <?php } ?>
                            <tr>
                                <td class="l" colspan="5">
                                    <span style="font-size: 11px;">Note: Please make sure to lock the salary process after the confirmation.</span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div style="text-align: center">
                            <img style="width: 20px; height: 20px;margin-top: 20px; display: none;" id="loader" src="<?php echo base_url('assets/images/loading-spinner-blue.gif') ?>">
                        </div>
                        <div id="result"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="create_monthend" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel"></h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="javascript:window.location.reload()"><span
                            aria-hidden="true">&times;</span></button>
            </div>


            <div class="modal-body">
                <div class="alert alert-success" id="success-alert-md" style="margin-bottom: 20px;" hidden="true">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <strong>Payroll Month Successfully Created!</strong>
                </div>
                <?php
                $pay_data = $this->payroll->get_payroll_data($this->session->userdata('payroll_id'));

                $month = $this->payroll->get_last_month($pay_data->id);
                $time = strtotime($month->month);
                $pay_month = date("Y-m", strtotime("+1 month", $time));

//                $monthly_pay = PAY_MONTHLY;
//                $pay_month_start = PAY_FROM_DAY;
//                $pay_month_end = PAY_UPTO_DAY;

                if($monthly_pay=='NO'){
                    $pay_month_end_date = $pay_month."-".$pay_data->period_end;
                    $time = strtotime($pay_month."-".$pay_data->period_start);
                    $pay_month_start_date = date("Y-m-d", strtotime("-1 month", $time));
                }else{
                    $pay_month_start_date= $pay_month."-1";
                    $time = strtotime($pay_month."-1");
                    $pay_month_end_date =  date("Y-m-t", strtotime($pay_month));
//                  $pay_month_end_date = date("Y-m-d", strtotime("+1 month", $time));

                }
                ?>

                <h4>Payroll Month - <strong><?php echo $pay_month; ?></strong><span style="font-size: 15px;"> (<?php echo $pay_month_start_date; ?> - <?php echo $pay_month_end_date; ?>) </span>  </h4>

                <div id="loader_sal" style="display: none">
                    <i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i>
                    <span class="sr-only">Loading...</span>
                </div>

                <div class="alert alert-danger" role="alert" id="error_msg11" style="display: none;"></div>
                <div class="alert alert-success" id="success_msg1" style="display: none;"></div>
            </div>

            <div class="modal-footer">
                <input type="button" class="btn btn-primary" id="save_btn" onclick="create_payroll_month()" value="Create"/>
                <button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>
            </div>

        </div>
    </div>
</div>



<script>
    $(document).ready(function () {

        $('#sub_button').hide();
    });
    $(function () {
        $("#date_select").datepicker({
            format: "yyyy-mm",
            startView: "months",
            minViewMode: "months",
            autoclose: true
        });
    });

    //$('#month_end').on('click', process_month_end);

    function create_payroll_month_modal()
    {
        $('#error_msg11').hide();
        $('#success_msg1').hide();
        $('#create_monthend').modal('show');
        $('.modal-title').text('Create Payroll Month');
    }

    function process_month_end() {

        //TODO Please uncomment when production mode
         $('#month_end').hide();
         $('#loader_1').show();
         $('#loader_sal_2').show();
        //todo ~~~~~~~~~~~~~~~~~~~~~~~~~~
        $.ajax({
            url: "<?php echo site_url('systems/payroll_process/process_payroll');?>",
            type: "POST",
            dataType: "JSON",
            data: {
                "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash()?>"
            },
            success: function (data) {
                if (data.status) {
                    //TODO Please uncomment when production mode
                     $('#loader_1').hide();
                     $('#success-alert').show();
                     $("#success-alert").fadeTo(3000, 500).slideUp(500, function () {
                         $("#success-alert").slideUp(500);

                     });
                    window.location = "<?php echo base_url('systems/salary_settings_con/dashboard')?>";
                    //todo ~~~~~~~~~~~~~~~~~~~~~~~~~~~~
                }

                //$('#month_end_1').html('<span class="label label-info">Saved</span>');
               //$('#clear_m_end').show();
               //$('#result').html(data);

            },
            error: function (jqXHR, textStatus, errorThrown) {

                //TODO Please uncomment when production mode
                window.location = "<?php echo base_url('systems/salary_settings_con/dashboard')?>";
                //todo ~~~~~~~~~~~~~~~~~~~~~~~~~~~~

            }
        });
    }

    function create_payroll_month() {
        $('#content').hide();
        $('#loader_1').show();
        $.ajax({
            url: "<?php echo site_url('systems/payroll_process/create_new_payroll');?>",
            type: "POST",
            dataType: "JSON",
            data: {
                "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash()?>"
            },
            success: function (data) {
                if (data.status == true) {
                    $('#loader_1').hide();
                    $('#save_btn').hide();
                    $('#loader_sal').show();
                    $('#success-alert-md').show();
                    $("#success-alert-md").fadeTo(3000, 2500).slideUp(500, function () {
                        $("#success-alert-md").slideUp(500);
                        $('#create_monthend').modal('hide');
                        window.location = "<?php echo base_url('systems/salary_settings_con/dashboard')?>";
                    });
                } else {
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert('Error get data');
            }
        });
    }


    function reverse_monthend()
    {
        bootbox.dialog({
            message: 'Are you sure, This will remove this month end salary data',
            title: "Alert!",
            buttons: {
                ok: {
                    label: "Yes",
                    className: "btn-primary",
                    callback: function () {
                        $('#clear_m_end_full').hide();
                        $('#loader_sal_3').show();
                        $.ajax({
                            url : "<?php echo base_url()?>systems/payroll_process/reverse_monthend",
                            type: "POST",
                            data: {
                                "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
                            },
                            dataType: "JSON",
                            success: function(data)
                            {
                                bootbox.alert(data.message);
                                /*setTimeout(function() {

                                }, 2000);*/
                                window.location = "<?php echo base_url('systems/salary_settings_con/dashboard')?>";
                                //data.status ? console.log("Employee termination successful!") : console.log("Termination failed!");
                            },
                            error: function (jqXHR, textStatus, errorThrown)
                            {
                                console.log('Error Reverse Monthend');
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

    function lock_monthend_final()
    {
        bootbox.dialog({
            message: 'Are you sure, This will lock the final salary process for this month',
            title: "Alert!",
            buttons: {
                ok: {
                    label: "Yes",
                    className: "btn-primary",
                    callback: function () {
                        $.ajax({
                            url : "<?php echo base_url()?>systems/payroll_process/lock_monthend",
                            type: "POST",
                            data: {
                                "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
                            },
                            dataType: "JSON",
                            success: function(data)
                            {
                                bootbox.alert(data.message);
                                /*setTimeout(function() {

                                }, 2000);*/
                                window.location = "<?php echo base_url('systems/salary_settings_con/dashboard')?>";
                                //data.status ? console.log("Employee termination successful!") : console.log("Termination failed!");
                            },
                            error: function (jqXHR, textStatus, errorThrown)
                            {
                                console.log('Error Lock Monthend');
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
