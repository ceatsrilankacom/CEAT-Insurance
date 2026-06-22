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
    .btn_pay{
        padding: 2px !important;
        font-size: 11px !important;
    }
</style>


<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"></h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript:;">Payroll Management</a></li>
                <?php
                if($this->session->userdata('payroll_name')){
                    echo '<li class="breadcrumb-item active">'.$this->session->userdata('payroll_name').' Month-end Reports List</li>';
                }else{
                    echo ' <li class="breadcrumb-item active">Main Payroll Month-end Reports List</li>';
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
                    echo '<h4 class="page-head-title card-title  text-white" style="display: inline-block">'.$this->session->userdata('payroll_name').' Month-end Reports List</h4>';
                }else{
                    echo ' <h4 class="page-head-title card-title  text-white" style="display: inline-block">Main Payroll Month-end Reports List</h4>';
                }
                ?>
            </div>
            <div class="element-box">
                <div style="text-align: center">
                    <img style="width: 102px; height: 112px;display: none;" id="loader_1" src="<?php echo base_url('assets/global/img/input-spinner.gif')?>">
                </div>

                <table class="c" style="border-collapse: collapse; border: 1px solid #000000" width="100%" cellspacing="0"
                       border="1">

                    <tr>
                        <th class="w10">Month</th>
                        <th class="w8">From</th>
                        <th class="w8">Upto</th>
                        <th class="w8">Days</th>
                        <th>Prepared By</th>
                        <th class="w3">Reports</th>
                    </tr>
                    <!--<tr class="l">
                        <td colspan="999"><b><br>2018</b></td>
                    </tr>-->
                    <?php foreach ($all_month_end_data as $mdata){
                        if($mdata->month!="2018-09"){
                            $earlier = new DateTime($mdata->from);
                            $later = new DateTime($mdata->upto);

                            $diff = $later->diff($earlier)->format("%a");
                            ?>
                            <tr style="">
                                <td><?php echo $mdata->month ?></td>
                                <td><?php echo $mdata->from ?></td>
                                <td><?php echo $mdata->upto ?></td>
                                <td><?php echo $diff ?></td>
                                <td><?php echo $mdata->username ?></td>
                                <td style="width: 300px">
                                    <button onclick="getPaySheet('<?php echo $mdata->month ?>')" class="btn btn-cyan btn_pay">Pay Sheet</button>
                                    <button onclick="getAllSlips('<?php echo $mdata->month ?>')" class="btn btn-primary btn_pay">All Slips</button>
                                    <button onclick="getepf('<?php echo $mdata->month ?>')" class="btn btn-info btn_pay">EPF</button>

                                    <button onclick="getetf('<?php echo $mdata->month ?>')" class="btn btn-info btn_pay">ETF</button>
                                    <button onclick="sal_bank('<?php echo $mdata->month ?>')" class="btn btn-purple btn_pay" >Bank</button>
                                    <button onclick="getepf_con('<?php echo $mdata->month ?>')" class="btn btn-info btn_pay">EPF Con</button>

                                    <button onclick="getetf_con('<?php echo $mdata->month ?>')" class="btn btn-info btn_pay">ETF Con</button>
                                    <button onclick="getetf_deduct('<?php echo $mdata->month ?>')" class="btn btn-info btn_pay">DEDUCT </button>
                                    <button onclick="getetf_payee('<?php echo $mdata->month ?>')" class="btn btn-info btn_pay">PAYEE </button>
                                </td>
                            </tr>
                        <?php  }

                    }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="pay_report_modal" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-full" style="max-width: 100%">
        <div class="modal-content">
            <div class="modal-header"  style="padding: 1rem 1rem 0 1rem;">
                <h3 class="modal-title bold uppercase"></h3>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body" style="padding: 0;">
                <div id="payeee_sheet" style="overflow-x: scroll; max-width: 100%">
                </div>
            </div>
            <div class="modal-footer">
                <div>
                    <button type="button" class="btn btn-success pull-right" value="Print" onclick="PrintDiv()"  style="margin-right: 20px;"><i class="fa fa-print" ></i> Print</button>
                </div>
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
    {   $("#date_select").datepicker({
        format: "yyyy-mm",
        startView: "months",
        minViewMode: "months",
        autoclose:true
    });
    });

    function getepf(month){

        if(month!="") {
            $.ajax({
                type: "post",
                async: false,
                url: "<?php echo site_url('systems/salary_settings_con/get_epf'); ?>",
                data: {"<?php echo $this->security->get_csrf_token_name(); ?>":"<?php echo $this->security->get_csrf_hash()?>",
                    "month": month},
                dataType: "html",
                success: function (data) {

                    $('#pay_report_modal').modal('show');
                    $('#pay_report_modal .modal-title').text('EPF REPORT');
                    $('#payeee_sheet').html(data);
                }
            });
        }
    }

    function getepf_con(month){

        if(month!="") {
            $.ajax({
                type: "post",
                async: false,
                url: "<?php echo site_url('systems/salary_settings_con/get_epf_con'); ?>",
                data: {"<?php echo $this->security->get_csrf_token_name(); ?>":"<?php echo $this->security->get_csrf_hash()?>",
                    "month": month},
                dataType: "html",
                success: function (data) {

                    $('#pay_report_modal').modal('show');
                    $('#pay_report_modal .modal-title').text('EPF Contribution List');
                    $('#payeee_sheet').html(data);
                }
            });
        }
    }
    function getetf(month){
        if(month!="") {
            $.ajax({
                type: "post",
                async: false,
                url: "<?php echo site_url('systems/salary_settings_con/get_etf'); ?>",
                data: {"<?php echo $this->security->get_csrf_token_name(); ?>":"<?php echo $this->security->get_csrf_hash()?>",
                    "month": month},
                dataType: "html",
                success: function (data) {

                    $('#pay_report_modal').modal('show');
                    $('#pay_report_modal .modal-title').text('EPF REPORT');
                    $('#payeee_sheet').html(data);
                }
            });
        }
    }

    function getetf_con(month){
        if(month!="") {
            $.ajax({
                type: "post",
                async: false,
                url: "<?php echo site_url('systems/salary_settings_con/get_etf_con'); ?>",
                data: {"<?php echo $this->security->get_csrf_token_name(); ?>":"<?php echo $this->security->get_csrf_hash()?>",
                    "month": month},
                dataType: "html",
                success: function (data) {

                    $('#pay_report_modal').modal('show');
                    $('#pay_report_modal .modal-title').text('EPF Contribution List');
                    $('#payeee_sheet').html(data);
                }
            });
        }
    }

    function getetf_deduct(month){
        if(month!="") {
            $.ajax({
                type: "post",
                async: false,
                url: "<?php echo site_url('systems/salary_settings_con/get_deduct_con'); ?>",
                data: {"<?php echo $this->security->get_csrf_token_name(); ?>":"<?php echo $this->security->get_csrf_hash()?>",
                    "month": month},
                dataType: "html",
                success: function (data) {

                    $('#pay_report_modal').modal('show');
                    $('#pay_report_modal .modal-title').text('Deduction Detail List');
                    $('#payeee_sheet').html(data);
                }
            });
        }
    }

    function getetf_payee(month){
        if(month!="") {
            $.ajax({
                type: "post",
                async: false,
                url: "<?php echo site_url('systems/salary_settings_con/get_payee'); ?>",
                data: {"<?php echo $this->security->get_csrf_token_name(); ?>":"<?php echo $this->security->get_csrf_hash()?>",
                    "month": month},
                dataType: "html",
                success: function (data) {

                    $('#pay_report_modal').modal('show');
                    $('#pay_report_modal .modal-title').text('PAYEE TAX List');
                    $('#payeee_sheet').html(data);
                }
            });
        }
    }


    function getPaySheet(month){

        //var month = $('#date_select').val();

        if(month!=""){
            $.ajax({
                type: "post",
                async: false,
                url: "<?php echo site_url('systems/salary_settings_con/getAllPaySheet'); ?>",
                data: {"<?php echo $this->security->get_csrf_token_name(); ?>":"<?php echo $this->security->get_csrf_hash()?>",
                    "month": month},
                dataType: "html",
                success: function (data) {
                    $('#pay_report_modal').modal('show');
                    $('#pay_report_modal .modal-title').text('Pay Sheet');

                    $('#payeee_sheet').html(data);
                }
            });
        }
    }

    function getAllSlips(month){
        if(month!="") {
            $.ajax({
                type: "post",
                async: false,
                url: "<?php echo site_url('systems/salary_settings_con/get_pay_slips'); ?>",
                data: {"<?php echo $this->security->get_csrf_token_name(); ?>":"<?php echo $this->security->get_csrf_hash()?>",
                    "month": month},
                dataType: "html",
                success: function (data) {

                    $('#pay_report_modal').modal('show');
                    $('#pay_report_modal .modal-title').text('All Slips');
                    $('#payeee_sheet').html(data);
                }
            });
        }
    }

    function sal_bank(month){

        if(month!=""){
            $.ajax({
                type: "post",
                async: false,
                url: "<?php echo site_url('systems/salary_settings_con/get_sal_bank'); ?>",
                data: {"month": month},
                dataType: "html",
                success: function (data) {

                    $('#pay_report_modal').modal('show');
                    $('#pay_report_modal .modal-title').text('Bank Transfer Details');

                    $('#payeee_sheet').html(data);

                }
            });

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


</script>
