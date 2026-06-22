<?php
$this->load->model('payroll_process_mod','payroll');
?>
<style>
    #dyTable tbody{
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
        z-index: 999999999!important;
    }
    .datepicker table {
        width: 100%;
    }
    .font_color{
        color: #c68626;
    }
    .datepicker.dropdown-menu {z-index: 99999999 !important}
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
    label{
        width: auto !important;
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
                <li class="breadcrumb-item active">Pay Slips</li>
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
                <h4 class="page-head-title card-title  text-white" style="display: inline-block">Pay Slips</h4>
            </div>
            <div class="element-box">
                <div style="text-align: center">
                    <img style="display: none;" id="loader_1" src="<?php echo base_url('assets/images/loading-spinner-blue.gif') ?>">
                </div>
                <hr>
                <h3>Monthly Pay Slips : </h3>
                <div class="row">
                    <div class="col-md-12">
                        <table class="tool" id="tools" style="position: static; visibility: visible;" border="0">
                            <tbody>
                            <tr>
                                <td class="date"  style="padding: 5px;"><label >Year And Month</label>
                                </td>
                                <td class="date">
                                    <input type="text" name="date_select" id="date_select" class="form-control" style="margin-right: 5px;text-align: center; width: 90px"/>
                                </td>
                                <td>
                                    <div id="sub_button">
                                        <button onclick="getAllSlips()" class="btn btn-success">Generate Pay Slip</button>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <hr>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="pay_report_modal" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-full" style="max-width: 100%">
        <div class="modal-content">
            <div class="modal-header" style="padding: 1rem 1rem 0 1rem;">
                <h3 class="modal-title bold uppercase"></h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body" style="padding: 0;">
                        <div id="payeee_sheet" style="overflow-x: scroll; max-width: 1200px">
                        </div>
            </div>
            <div class="modal-footer">
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<script>

    $('#emp_department').change(function(){
        var emp_department=$('#emp_department').val();
        if(emp_department !=""){
            $('#employee').attr('disabled',true)
        }
        else{
            $('#employee').attr('disabled',false)
        }
    });

    $('#employee').change(function(){
        var emp=$('#employee').val();
        if(emp !=""){
            $('#emp_department').attr('disabled',true)
        }
        else{
            $('#emp_department').attr('disabled',false)
        }
    });

    /* $(document).ready(function() {

         $('#sub_button').hide();
     });*/

    $(function()
    {   $(".year_select").datepicker({
        format: "yyyy",
        startView: "years",
        minViewMode: "years",
        autoclose:true
    });
    });

    $(function()
    {   $("#date_select").datepicker({
        format: "yyyy-mm",
        startView: "months",
        minViewMode: "months",
        autoclose:true
    });
    });

    function getAllSlips(){
        var month = $('#date_select').val();
        $('#loader_1').show();
        if(month!="") {
            $.ajax({
                type: "post",
                async: false,
                url: "<?php echo site_url('systems/salary_settings_con/get_emp_pay_slips'); ?>",
                data: {"<?php echo $this->security->get_csrf_token_name(); ?>":"<?php echo $this->security->get_csrf_hash()?>",
                "month": month},
                dataType: "html",
                success: function (data) {

                    $('#loader_1').hide();
                    $('#pay_report_modal').modal('show');
                    $('#pay_report_modal .modal-title').text('Pay Slip');
                    $('#payeee_sheet').html(data);
                }
            });
        } else {
            bootbox.dialog({
                message: 'Please Select Month',
                title: "Alert!",
                buttons: {
                    cancel: {
                        label: "OK",
                        className: "btn-default"
                    }
                }
            });
            $('#loader_1').hide();
        }
    }

    $('#payroll').change(function(){
        var employee = $('#employee').val();
        var emp_department = $('#emp_department').val();
        var month = $('#date_select').val();
        if(payroll_id=='5'){
            $('#sub_button').show();
        }else{
            if(month!="") {
                $('#sub_button').hide();
                if (payroll_id == '1') {
                    $.ajax({
                        type: "post",
                        async: false,
                        url: "<?php echo site_url('systems/salary_settings_con/get_particulars'); ?>",
                        data: {"month": month, "employee": employee,  "emp_department": emp_department},
                        dataType: "html",
                        success: function (data) {

                            $('#pay_report_modal').modal('show');
                            $('#pay_report_modal .modal-title').text('Salary Particulars');
                            $('#payeee_sheet').html(data);
                        }
                    });
                } else if (payroll_id == '2') {
                    $.ajax({
                        type: "post",
                        async: false,
                        url: "<?php echo site_url('systems/salary_settings_con/get_advance'); ?>",
                        data: {"month": month, "employee": employee, "emp_department": emp_department},
                        dataType: "html",
                        success: function (data) {

                            $('#pay_report_modal').modal('show');
                            $('#pay_report_modal .modal-title').text('Salary Advances');
                            $('#payeee_sheet').html(data);
                        }
                    });
                } else if (payroll_id == '3') {
                    $.ajax({
                        type: "post",
                        async: false,
                        url: "<?php echo site_url('systems/salary_settings_con/get_cutoff'); ?>",
                        data: {"month": month, "employee": employee, "emp_department": emp_department},
                        dataType: "html",
                        success: function (data) {

                            $('#pay_report_modal').modal('show');
                            $('#pay_report_modal .modal-title').text('Cutoff Data');
                            $('#payeee_sheet').html(data);
                        }
                    });
                } else if (payroll_id == '4') {
                    $.ajax({
                        type: "post",
                        async: false,
                        url: "<?php echo site_url('systems/salary_settings_con/get_payments'); ?>",
                        data: {"month": month, "employee": employee,  "emp_department": emp_department},
                        dataType: "html",
                        success: function (data) {

                            $('#pay_report_modal').modal('show');
                            $('#pay_report_modal .modal-title').text('Salary Payments');
                            $('#payeee_sheet').html(data);
                        }
                    });
                }
            }else{
                bootbox.dialog({
                    message: 'Please Select Month,Employee Type and Branch',
                    title: "Alert!",
                    buttons: {
                        cancel: {
                            label: "OK",
                            className: "btn-default"
                        }
                    }
                });
            }
        }
    });


    $(document).ready(function() {

        $('.date-picker2').datepicker({
            orientation: "bottom",
            autoclose: true,
            todayHighlight: true,

        });

        $('#btn_new').on('click', generate);

        function generate() {

//              $('#report_name').html('');
            $('#message').html('');
            $('#report_datatable').html('');
            $('#loader_1').show();

            var year = $('#year').val();
            var year_part = $('#year_part').val();
            if(year !="" && year_part!= "") {
                $.ajax({
                    type: "post",
                    async: false,
                    url: "<?php echo site_url('systems/salary_settings_con/get_six_month_report');  ?>",
                    data: {
                        "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash()?>",
                        "year": year,
                        "year_part": year_part
                    },
                    dataType: "html",
                    success: function (data) {

                        $('#loader_1').hide();

                        if (data == false) {

                            $('#message').html('NO DATA SELECTED');
//                          $('#report_name').text(re_text);
                        }
                        else {

                            $('#pay_report_modal').modal('show');
                            $('#pay_report_modal .modal-title').text('Six Months Report');

                            $('#payeee_sheet').html(data);
                            //$('#report_datatable').html(data);
                        }
                    }
                });
            } else{
                bootbox.dialog({
                    message: 'Please Select Year & Part',
                    title: "Alert!",
                    buttons: {
                        cancel: {
                            label: "OK",
                            className: "btn-default"
                        }
                    }
                });
                $('#loader_1').hide();
            }

        }

    });
</script>
