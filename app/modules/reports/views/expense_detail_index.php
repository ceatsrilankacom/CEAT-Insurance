<?php
/**
 * Created by PhpStorm.
 * User: kasun.demel
 * Date: 7/27/2021
 * Time: 12:33 PM
 */
?>

<style>
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
    table td {
        font-size: 11px !important;
    }
</style>

<style>

    .glyphicon { cursor: pointer; }

    /*input,*/
    /*select { width: 100%; }*/

</style>

<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"></h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Expense Detail Report</li>
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
                <h4 class="page-head-title card-title  text-white" style="display: inline-block">Expense Detail Report</h4>
            </div>
            <div class="element-box">
                <div class="pull-right">
                    <div class="dt-buttons">
                        <a class="dt-button buttons-excel buttons-html5"
                           href="#" title="Excel"  onClick="javascript:fnExcelReport();"><span><i class="fa fa-file-excel-o"></i></span></a><a
                            class="dt-button buttons-csv buttons-html5" href="#" title="Preview"  onClick="javascript:PrintPreview();"><span><i class="fa fa-search-plus"></i></span></a>
                        <a class="dt-button buttons-print buttons-html5" onClick="javascript:PrintDiv();" href="#"><span><i class="fa fa-print"></i></span></a>
                    </div>
                </div>
                <table class="tool" id="tools" style="position: static; visibility: visible;" border="0">
                    <tbody>
                    <tr>
                        <td>FROM DATE</td>
                        <td>
                            <input type="text" id="from_date" name="from_date" class="form-control date date-pick" data-date-format="yyyy-mm-dd" autocomplete="off" placeholder="From Date" value="<?php $time = strtotime('sunday last week');echo date("Y-m-d",$time);?>">
                        </td>
                        <td>TO DATE</td>
                        <td>
                            <input type="text" id="to_date" name="to_date" class="form-control date date-pick" data-date-format="yyyy-mm-dd" autocomplete="off" placeholder="To Date" value="<?php $time = strtotime('saturday this week');echo date("Y-m-d",$time);?>">
                        </td>
                        <td style="font-size: 12px !important;">EMPLOYEE</td>
                        <td>
                            <select name="rep" id="rep" class="select2">
                            </select>
                        </td>
                        <td>EXPENSE TYPE</td>
                        <td>
                            <select name="expense_type" id="expense_type" class="form-control">
                            </select>
                        </td>
                        <td><a name="btn_new" id="btn_new" class="btn btn-success" style="color: #fff"><i class="ti-search"></i> Show</a></td>
                    </tr>
                    </tbody>
                </table>
                <div id="report_body" class="box-body box-bordered" >
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {

        $(".date-pick").datepicker();

        $('#dashboard-report-range').daterangepicker({
            "maxSpan": {
                "days": 31
            },
            "ranges": {
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'This Year': [moment().startOf('year'), moment().endOf('year')]
            }
        }, function(start, end, label) {
            var start_date = start.format('YYYY-MM-DD'), end_date = end.format('YYYY-MM-DD');
            $('#dashboard-report-range span').html(start_date + ' - ' + end_date);
            $('#from_date').val(start_date);
            $('#to_date').val(end_date);
            //showBirthdays(start_date, end_date, label);
            //getAttendance(start, end, label, showAttendance);
        });
    });

    $('#emp_department').change(function(){
        var emp_department=$('#emp_department').val();
        if(emp_department !=""){
            $('#emp_status').attr('disabled',true)
            $('#employee').attr('disabled',true)
        }
        else{
            $('#emp_status').attr('disabled',false)
            $('#employee').attr('disabled',false)
        }
    });

    $('#emp_status').change(function(){
        var emp_status=$('#emp_status').val();
        if(emp_status !=""){
            $('#emp_department').attr('disabled',true)
            $('#employee').attr('disabled',true)
        }
        else{
            $('#emp_department').attr('disabled',false)
            $('#employee').attr('disabled',false)
        }
    });

    $('#employee').change(function(){
        var emp=$('#employee').val();
        if(emp !=""){
            $('#emp_department').attr('disabled',true)
            $('#emp_status').attr('disabled',true)
        }
        else{
            $('#emp_department').attr('disabled',false)
            $('#emp_status').attr('disabled',false)
        }
    });


    $(function()
    {   $(".date-picker-year").datepicker({
        format: "yyyy-mm",
        startView: "months",
        minViewMode: "months",
        autoclose:true
    });
    });

    $('#btn_new').on('click', gen_report);

    function gen_report() {
        var from_date = $('#from_date').val();
        var to_date = $('#to_date').val();
        var rep = $('#rep').val();
        var expense_type = $('#expense_type').val();

        $('#report_body').html('');
        $('#loading').show();
        $.ajax({
            type: "post",
            async: false,
            url: "<?php echo site_url('index.php/reports/expense_detail_report/get_expense_data');  ?>",
            data: {
                "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash()?>",
                "from_date": from_date,
                "to_date": to_date,
                "rep":rep,
                "expense_type":expense_type
            },
            dataType: "html",
            success: function (data) {
                $('#loading').hide();
                $('#report_body').html(data);
            }
        });
    }

    function fnExcelReport() {
        var file = new Blob([$('#report_body').html()], {type:"application/vnd.ms-excel"});
        var url = URL.createObjectURL(file);
        var a = $("<a />", {
            href: url,
            download: "Expense_Summary.xls"}).appendTo("body").get(0).click();
        e.preventDefault();
    }

    function PrintDiv() {
        var divToPrint = document.getElementById('report_body');
        var popupWin = window.open('', '_blank', 'width=1000,height=1000');
        popupWin.document.open();
        popupWin.document.write('<html><head><title>Print</title><link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/default_print.css" media="screen"/></head><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
    }

    function PrintPreview() {
        var toPrint = document.getElementById('report_body');
        var popupWin = window.open('', '_blank', 'width=1000,height=800,location=no,left=1000px');
        popupWin.document.open();
        popupWin.document.write('<html><head><title>::Print Preview::</title><link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/default_print.css" media="screen"/></head><body">');
        popupWin.document.write(toPrint.innerHTML);
        popupWin.document.write('</html>');
        popupWin.document.close();
    }

    $.ajax({
        async: false,
        url: "<?php echo site_url('index.php/reports/expense_summary_report/get_sales_rep'); ?>",
        type: "POST",
        data: {
            "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash() ?>"
        },
        dataType: "JSON",
        success: function(data)
        {


            <?php if(USER_ID == 1){ ?>

            $.each(data, function(id,name)
            {
                var opt = $('<option />');
                opt.val(id);
                opt.text(name);
                $('#rep').append(opt);
            });

            <?php }else{ ?>

            $.each(data, function(id,name)
            {
                if(id == <?php echo EPF_NO; ?>){

                    var opt = $('<option />');
                    opt.val(id);
                    opt.text(name);
                    $('#rep').append(opt);
                }

            });

            <?php } ?>

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data');
        }
    });

    //get expenses type
    $.ajax({
        async: false,
        url: "<?php echo site_url('index.php/expense/expense_list/get_expense_type'); ?>",
        type: "POST",
        data: {
            "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash() ?>"
        },
        dataType: "JSON",
        success: function(data)
        {

            $('#expense_type').html("<option value='all'>All</option>");
            $.each(data, function(id,name)
            {
                var opt = $('<option />');
                opt.val(id);
                opt.text(name);
                $('#expense_type').append(opt);
            });

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data');
        }
    });
</script>

