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
                <li class="breadcrumb-item active">Payroll Reports</li>

                <?php
                if($this->session->userdata('payroll_name')){
                    echo '<li class="breadcrumb-item active">'.$this->session->userdata('payroll_name').' - Payroll Reports</li>';
                }else{
                    echo '<li class="breadcrumb-item active">Main Payroll - Reports</li>';
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
                    echo ' <h4 class="page-head-title card-title  text-white" style="display: inline-block">'.$this->session->userdata('payroll_name').'- Reports</h4>';
                }else{
                    echo ' <h4 class="page-head-title card-title  text-white" style="display: inline-block">Main Payroll - Reports</h4>';
                }
                 ?>
            </div>
            <div class="element-box">
                <div style="text-align: center">
                    <img style="display: none;" id="loader_1" src="<?php echo base_url('assets/images/loading-spinner-blue.gif') ?>">
                </div>
                <hr>
                <h3>Monthly Reports : </h3>
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
                                <td>Employee Department</td>
                                <td>
                                    <select name="emp_department" id="emp_department" class="select2">
                                        <option value="">(---)</option>
                                        <?php foreach ($emp_departments as $emp_department){ ?>
                                            <option value="<?php echo $emp_department->id;?>"><?php echo $emp_department->desc ; ?></option>

                                        <?php }?>
                                    </select>
                                </td>
                                <td>Employee</td>
                                <td>
                                    <select name="employee" id="employee" class="select2">
                                        <option value="">(---)</option>
                                        <?php foreach ($employees as $emp){ ?>
                                            <option value="<?php echo $emp->id;?>"><?php echo $emp->employee_id." ".$emp->first_name." ".$emp->last_name; ?></option>

                                        <?php }?>
                                    </select>
                                </td>
                                <td>
                                    <div id="sub_button">
                                        <button onclick="getPaySheet()" class="btn btn-cyan">Pay Sheet</button>
                                        <button onclick="getAllSlips()" class="btn btn-success">All Slips</button>
                                        <button onclick="getepf()" class="btn btn-info">EPF</button>
                                        <button onclick="getetf()" class="btn btn-info">ETF</button>
                                        <button onclick="getpayee()" class="btn btn-info">PAYEE</button>
                                        <button onclick="sal_bank()" class="btn btn-purple">Bank</button>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>

                    </div>

                </div>

                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <h3>Six Month Report : </h3>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="tool" id="tools" style="position: static; visibility: visible;margin-top: -10px;">
                                    <?php  $year = date('Y'); ?>
                                    <tbody>
                                    <tr style="margin-top: 10px;">
                                        <td style="padding: 5px;" >Year:</td>
                                        <td class="date" ><input type="text" name="year" id="year"  class="year_select" placeholder="Year"  data-date-format="yyyy" style="width: 120px;text-align: center;"  value="<?php echo $year; ?>"></td>
                                        <td><select name="year_part" id="year_part" class="form-control">
                                                <option value="">(---)</option>
                                                <option value="1">Part I</option>
                                                <option value="2">Part II</option>
                                            </select></td>
                                        <td><input value="Show" name="btn_new" id="btn_new" class="btn btn-primary" type="button" ></td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div id="report" style="margin-top: 10px;">
                                    <div id="report_name" style="font-weight: 600;font-size: 18px;margin-left: 20px;margin-top: 20px;width: 100%"></div>
                                    <div id="message" style="font-weight: 600;font-size: 14px;margin-left: 20px;color: #ff0c03" ></div>
                                    <div id="report_datatable" style="margin-top: 20px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                    </div>
                </div>
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

    function getepf(){

        var month = $('#date_select').val();
        var employee = $('#employee').val();
        var emp_department = $('#emp_department').val();
        $('#loader_1').show();
        if(month!="") {
            $.ajax({
                type: "post",
                async: false,
                url: "<?php echo site_url('systems/salary_settings_con/get_epf'); ?>",
                data: {"<?php echo $this->security->get_csrf_token_name(); ?>":"<?php echo $this->security->get_csrf_hash()?>",
                "month": month, "employee": employee, "emp_department": emp_department},
                dataType: "html",
                success: function (data) {

                    $('#loader_1').hide();
                    $('#pay_report_modal').modal('show');
                    $('#pay_report_modal .modal-title').text('EPF REPORT');
                    $('#payeee_sheet').html(data);
                }
            });
        }else {
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

    function getetf(){

        var month = $('#date_select').val();
        var employee = $('#employee').val();
        var emp_department = $('#emp_department').val();
        $('#loader_1').show();
        if(month!="") {
            $.ajax({
                type: "post",
                async: false,
                url: "<?php echo site_url('systems/salary_settings_con/get_etf'); ?>",
                data: {"<?php echo $this->security->get_csrf_token_name(); ?>":"<?php echo $this->security->get_csrf_hash()?>",
                "month": month, "employee": employee, "emp_department": emp_department},
                dataType: "html",
                success: function (data) {

                    $('#loader_1').hide();
                    $('#pay_report_modal').modal('show');
                    $('#pay_report_modal .modal-title').text('EPF REPORT');
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

    function getpayee(){

        var month = $('#date_select').val();
        var employee = $('#employee').val();
        var emp_department = $('#emp_department').val();
        $('#loader_1').show();
        if(month!="") {
            $.ajax({
                type: "post",
                async: false,
                url: "<?php echo site_url('systems/salary_settings_con/get_payee'); ?>",
                data: {"<?php echo $this->security->get_csrf_token_name(); ?>":"<?php echo $this->security->get_csrf_hash()?>",
                    "month": month, "employee": employee, "emp_department": emp_department},
                dataType: "html",
                success: function (data) {

                    $('#loader_1').hide();
                    $('#pay_report_modal').modal('show');
                    $('#pay_report_modal .modal-title').text('PAYEE TAX SUMMARY');
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

    function getPaySheet(){

        var month = $('#date_select').val();
        var employee = $('#employee').val();
        var emp_department = $('#emp_department').val();
        $('#loader_1').show();
        if(month!=""){
            $.ajax({
                type: "post",
                async: false,
                url: "<?php echo site_url('systems/salary_settings_con/getAllPaySheet'); ?>",
                data: {"<?php echo $this->security->get_csrf_token_name(); ?>":"<?php echo $this->security->get_csrf_hash()?>",
                    "month": month, "employee": employee,  "emp_department": emp_department},
                dataType: "html",
                success: function (data) {
                    $('#loader_1').hide();
                    $('#pay_report_modal').modal('show');
                    $('#pay_report_modal .modal-title').text('Pay Sheet');

                    $('#payeee_sheet').html(data);
                }
            });
        }else {
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

    function getAllSlips(){
        var month = $('#date_select').val();
        var employee = $('#employee').val();
        var emp_department = $('#emp_department').val();
        $('#loader_1').show();
        if(month!="") {
            $.ajax({
                type: "post",
                async: false,
                url: "<?php echo site_url('systems/salary_settings_con/get_pay_slips'); ?>",
                data: {"<?php echo $this->security->get_csrf_token_name(); ?>":"<?php echo $this->security->get_csrf_hash()?>",
                "month": month, "employee": employee, "emp_department": emp_department},
                dataType: "html",
                success: function (data) {

                    $('#loader_1').hide();
                    $('#pay_report_modal').modal('show');
                    $('#pay_report_modal .modal-title').text('All Slips');
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


    function sal_bank(){
        var month = $('#date_select').val();
        var employee = $('#employee').val();
        var emp_department = $('#emp_department').val();
        $('#loader_1').show();
        if(month!=""){
            $.ajax({
                type: "post",
                async: false,
                url: "<?php echo site_url('systems/salary_settings_con/get_sal_bank'); ?>",
                data: {"month": month, "employee": employee, "emp_department": emp_department},
                dataType: "html",
                success: function (data) {

                    $('#loader_1').hide();
                    $('#pay_report_modal').modal('show');
                    $('#pay_report_modal .modal-title').text('Bank Transfer Details');

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

    function six_part_1(){
            $.ajax({
                type: "post",
                async: false,
                url: "<?php echo site_url('systems/salary_settings_con/sixMonthReportOne'); ?>",
                dataType: "html",
                success: function (data) {

                    $('#pay_report_modal').modal('show');
                    $('#pay_report_modal .modal-title').text('Six Month Report - Part I');

                    $('#payeee_sheet').html(data);

                }
            });
    }

    function six_part_2(){
            $.ajax({
                type: "post",
                async: false,
                url: "<?php echo site_url('systems/salary_settings_con/sixMonthReportTwo'); ?>",
                dataType: "html",
                success: function (data) {

                    $('#pay_report_modal').modal('show');
                    $('#pay_report_modal .modal-title').text('Six Month Report - Part II');

                    $('#payeee_sheet').html(data);

                }
            });
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
