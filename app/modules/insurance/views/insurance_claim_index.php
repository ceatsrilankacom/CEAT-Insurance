<?php
/**
 * Created by PhpStorm.
 * User: kasun.demel
 * Date: 1/22/2021
 * Time: 4:32 PM
 */

?>

<style>
    .embedded-daterangepicker .daterangepicker::before,

    .embedded-daterangepicker .daterangepicker::after {
        display: none;
    }

    .embedded-daterangepicker .daterangepicker {
        position: relative !important;
        top: auto !important;
        left: auto !important;
        float: left;
        width: 100%;
        margin-top: 0;
    }

    .embedded-daterangepicker .daterangepicker .drp-calendar{
        width: 48% !important;
        max-width: 50%;
    }

    .select2-container .select2-selection--single {
        width: 315px !important;
        height: 35px !important;
    }

    .modal-body {
        max-height: calc(200vh - 250px);
        overflow-y: auto;
    }

</style>

<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"></h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:;">Insurance</a></li>
                <li class="breadcrumb-item active">Insurance Claim</li>
            </ol>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="element-wrapper">
            <div class="element-actions">
            </div>
            <div class="card-header bg-info page-head-title-wrap">
                <h4 class="page-head-title card-title  text-white" style="display: inline-block">Insurance Claim</h4>&nbsp;
                <?php

                $this->load->library('kcrud');
                $auth = $this->kcrud->getValueOne("auth_users_button_permission","id,button,user_id","WHERE user_id=".USER_ID." AND button=2",null,null,null,null);

                if($auth->button == 2){ ?>
                <button type="button" onclick="add_insurance()" class="btn btn-success pull-right" style="margin-right: -10px;"><i class="fa fa-plus"></i> Add New Claim</button>&nbsp;
                <?php } ?>
            </div>
            <div class="element-box">

                <div class="tab-content tabcontent-border">
                    <div class="tab-pane p-20 active" role="tabpanel" id="arrangement">
                        <table class="table table-striped table-bordered table-hover table-header-fixed dt-responsive" id="insuranceInfo" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th class="all" style="width: 30px">#</th>
                                <th class="all">EMP CODE</th>
                                <th class="all">NAME</th>
                                <th class="all">BILL AMOUNT</th>
                                <th class="all">PAYABLE AMOUNT</th>
                                <th class="all">REJECTED AMOUNT</th>
                                <th class="all">BILL DATE</th>
                                <th class="all">CLAIM DATE</th>
                                <th class="all"  style="width: 100px">REMARKS</th>
                                <th class="all">STATUS</th>
                                <th class="all">DESCRIPTION</th>
                                <th class="all">REASON</th>
                                <th class="all">USER</th>
                                <th class="all text-center" width="100px">ACTIONS</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>

                    <!-- Bootstrap modal -->
                    <div class="modal fade" id="insurance_modal" role="dialog">
                        <div class="modal-dialog modal-full" style="max-width: 700px;max-height: 500px">
                            <div class="modal-content">
                                <div class="modal-header bg-blue-steel bg-font-blue-steel">
                                    <h6 id="insurance_modal_title"></h6>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body form">
                                    <form id="insurance_form" class="form-horizontal">
                                        <div class="form-body">
                                            <div class="">
                                                <div class="form-group row" style="">
                                                    <label class="control-label col-md-4" for="employee" style='text-align: right;color:black;'><b>Select Employee</b></label>
                                                    <div class="col-md-6">
                                                        <select name="employee" id="employee" class="form-control select2">
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row" style="">
                                                    <div class="col-md-8 offset-md-4" id="claim_details" style="display: none">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="control-label col-md-4" for="" style='text-align: right;color:black;'><b>BILL DATE</b></label>
                                                    <div class="col-md-6">
                                                        <input type="text" id="bill_date" name="bill_date" class="form-control date date-pick" data-date-format="yyyy-mm-dd" autocomplete="off" placeholder="Bill Date">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="control-label col-md-4" for="" style='text-align: right;color:black;'><b>BILL AMOUNT</b></label>
                                                    <div class="col-md-6">
                                                        <input type="text" id="bill_amount" name="bill_amount" class="form-control numeric" placeholder="Bill Amount">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="control-label col-md-4" for="" style='text-align: right;color:black;'><b>DESCRIPTION</b></label>
                                                    <div class="col-md-6">
                                                        <textarea name="description" id="description" class="form-control" cols="3"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">

                                    <button type="button" id="arrangeBtn" onclick="save()" class="btn btn-primary">Save</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="modal fade bs-example-modal-lg in" id="edit_modal" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-full" style="max-width: 800px;max-height: 500px">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h6 class="modal-title" id="udModalLabel"></h6>
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body" style="max-height:500px !important;">
                                    <form enctype="multipart/form-data" id="edit_insurance_form" class="form-horizontal">
                                        <input type="hidden" name="insurance_id" id="insurance_id">
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group row" style="">
                                                        <div class="col-md-8 offset-md-4" id="edit_claim_details" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="control-label col-md-4" for="" style='text-align: right;color:black;'><b>Change Amount</b></label>
                                                        <div class="col-md-6">
                                                            <input type="text" id="edit_bill_amount" name="edit_bill_amount" class="form-control numeric">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="control-label col-md-4" for="" style='text-align: right;color:black;'><b>Reason</b></label>
                                                        <div class="col-md-6">
                                                            <textarea cols="3" name="reason" id="reason" class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer" style="margin-top: 20px;margin:5px">
                                    <button type="button" onclick="edit_save()" class="btn btn-primary">Edit</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="modal fade bs-example-modal-lg in" id="approve_modal" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-full" style="max-width: 400px;max-height: 200px">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h6 class="modal-title" id="udModalLabel"></h6>
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body" style="max-height:200px !important;">
                                    <form id="approve_insurance_form" class="form-horizontal">
                                        <input type="hidden" name="approve_id" id="approve_id">
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="form-group row">
                                                        <label class="control-label col-md-6" for="itinerary" style='text-align: right;color:black;'><b>Select Status</b></label>
                                                        <div class="col-md-6">
                                                            <select name="approve_status" id="approve_status" class="form-control noSelect2">
                                                                <option></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer" style="margin-top: 20px;margin:5px">
                                    <button type="button" onclick="approve_save()" class="btn btn-primary">Edit</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="modal fade bs-example-modal-lg in" id="add_new_modal" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-lg"  style="min-width: 100%; max-width: 100%;">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                    </button>
                                    <h4 class="modal-title" id="udModalLabel"></h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row" style="margin-right:5px;margin-left: 5px;margin-top: 10px">
                                        <h4  class="sub-head">Pending itinerary Information</h4>
                                        <div class="col-md-12" class="table-scrollable">
                                            <table style="width:100%" class="st-lumi-table" cellspacing="2" cellpadding="5" border="0">
                                                <tbody><tr>
                                                    <td style="text-align:center">
                                                        <form id="saved_form" class="form-horizontal" role="form">
                                                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                                                            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="fresh-table  table table-bordered order-column dataTable">
                                                                <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <table style="width:100%" class="st-lumi-table" cellspacing="2" cellpadding="5" border="1" id="dytable">
                                                                            <thead>
                                                                            <tr>
                                                                                <th class="all" style="width: 30px">#</th>
                                                                                <th class="all">Month</th>
                                                                                <th class="all">Sales Executive</th>
                                                                                <th class="all">AREA Manager</th>
                                                                                <th class="all">Sales Staff</th>
                                                                                <th class="all">Sales Manager</th>
                                                                                <th width="10" scope="col"><input type="checkbox" id="check_all"></th>
                                                                            </tr>
                                                                            </thead>
                                                                            <tbody id="filtered_data" class="st-lumi-table">

                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </form>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                                <div class="modal-footer" style="margin-top: 20px">
                                    <button type="button" class="btn btn-primary" onclick="save_bulk_approve()"> Approve </button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="modal fade bs-example-modal-lg in" id="bulk_upload_modal" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-lg"  style="min-width: 100%; max-width: 100%;">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                    </button>
                                    <h4 class="modal-title" id="udModalLabel"></h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row" style="margin-right:5px;margin-left: 5px;margin-top: 10px">
                                        <div class="col-md-12" class="table-scrollable">
                                            <form id="filter_form" class="form-horizontal" role="form">
                                                <table width="100%" cellspacing="4" cellpadding="0" border="0">
                                                    <tbody>
                                                    <tr>
                                                        <td>
                                                            <table class="st-lumi-table" id="tools" style="position:static;visibility: visible;background: #fffff !important; "border="1">
                                                                <thead>
                                                                <tr>
                                                                    <th>FROM DATE</th>
                                                                    <th>
                                                                        <input type="text" id="from_date" name="from_date" class="form-control date date-pick" data-date-format="yyyy-mm-dd" autocomplete="off" placeholder="From Date" value="<?php $time = strtotime('monday this week');echo date("Y-m-d",$time);?>">
                                                                    </th>
                                                                    <th>TO DATE</th>
                                                                    <th>
                                                                        <input type="text" id="to_date" name="to_date" class="form-control date date-pick" data-date-format="yyyy-mm-dd" autocomplete="off" placeholder="To Date" value="<?php $time = strtotime('monday next week');echo date("Y-m-d",$time);?>">
                                                                    </th>
                                                                    <th style="font-size: 12px !important;">EMPLOYEE</th>
                                                                    <th width="200px">
                                                                        <select name="filter_employee" id="filter_employee" class="form-control">
                                                                            <option></option>
                                                                        </select>
                                                                    </th>
                                                                    <th>EXPENSE TYPE</th>
                                                                    <th>
                                                                        <select name="filter_expense_type" id="filter_expense_type" class="form-control">
                                                                            <option></option>
                                                                        </select>
                                                                    </th>
                                                                    <th>
                                                                        <input value="Show" name="Show" class="btn btn-sm btn-primary" onclick="showReport()" type="button">
                                                                    </th>
                                                                    <th id="load" title="Loading Data....">
                                                                        <img src="<?php echo base_url(); ?>/assets/images/loading-spinner-blue.gif">
                                                                    </th>
                                                                </tr>
                                                                </thead>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </form>
                                            <div class="row">
                                                <div id="pnl_div" style="padding:10px" style="overflow-x:auto;"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer" style="margin-top: 20px">
                                    <button type="button" class="btn btn-primary" onclick="save_bulk_apporve()"> Approve </button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <script type="text/javascript">

                        var save_method;
                        var insuranceInfo;

                        $(document).ready(function(){

                            var today = new Date();
                            $('.date-pick').datepicker({
                                format: 'yyyy-mm-dd',
                                autoclose:true,
                                endDate: "today",
                                maxDate: today
                            }).on('changeDate', function (ev) {
                                $(this).datepicker('hide');
                            });


                            $('.date-pick').keyup(function () {
                                if (this.value.match(/[^0-9]/g)) {
                                    this.value = this.value.replace(/[^0-9^-]/g, '');
                                }
                            });


                            $(".modal :input").change(function(){
                                $(this).siblings("span.error-block").html("").hide();
                                $("span.help-inline").hide();
                            });

                            $('.modal').on('hidden.bs.modal', function(){

                                $("form :input").siblings("span.error-block").html("").hide();
                                $("span.help-inline").hide();

                            });

                            <?php if($this->session->flashdata('message')){?>

                            bootbox.alert({
                                message: "<b style='text-align:center'><?php echo $this->session->flashdata('message')?></b>",
                                size: 'small'
                            });

                            <?php } ?>

                            insuranceInfo = $('#insuranceInfo').DataTable({

                                "processing": true, //Feature control the processing indicator.
                                "serverSide": true, //Feature control DataTables' server-side processing mode.
                                // Load data for the table's content from an Ajax source
                                "ajax":{
                                    "data": {
                                        "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
                                    },
                                    "url": "<?php echo base_url()?>index.php/insurance/insurance_claim/get_all_claims",
                                    "type": "POST"
                                },
                                "columnDefs": [
                                    {
                                        "targets": [ -2 ], //last column
                                        "orderable": false //set not orderable
                                    }
                                ],"aoColumns": [
                                    null,
                                    null,
                                    null,
                                    null,
                                    null,
                                    null,
                                    null,
                                    null,
                                    null,
                                    null,
                                    null,
                                    null,
                                    null,
                                    { "bSortable": false,"bSearchable": false }
                                ],
                                rowCallback: function(row, data, index){

                                    if(data[8] == "Limit Exceed"){
                                        $(row).find('td:eq(8)').html('<span style="background-color:red;color: white;border-radius: 5px">&nbsp;&nbsp;Limit Exceed&nbsp;&nbsp;</span>');
                                    }

                                    if(data[9] == "Approved"){
                                        $(row).find('td:eq(9)').html('<span style="background-color: #0c7e43;color: white;border-radius: 5px">&nbsp;&nbsp;Approved&nbsp;&nbsp;</span>');
                                    }
                                    else if(data[9] == "Rejected"){
                                        $(row).find('td:eq(9)').html('<span style="background-color: red;color: white;border-radius: 5px">&nbsp;&nbsp;Rejected&nbsp;&nbsp;</span>');
                                    }

                                },
                                "language": {
                                    "aria": {
                                        "sortAscending": ": activate to sort column ascending",
                                        "sortDescending": ": activate to sort column descending"
                                    },
                                    "emptyTable": "No data available in table",
                                    "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                                    "infoEmpty": "No entries found",
                                    "infoFiltered": "(filtered1 from _MAX_ total entries)",
                                    "lengthMenu": "_MENU_ entries",
                                    "search": "Search:",
                                    "zeroRecords": "No matching records found"
                                },
                                "buttons": [
                                    { extend: 'print', text:      '<i class="fa fa-print"></i>',
                                        titleAttr: 'Print' },
                                    {
                                        extend:    'copyHtml5',
                                        text:      '<i class="fa fa-files-o"></i>',
                                        titleAttr: 'Copy'
                                    },
                                    {
                                        extend:    'excelHtml5',
                                        text:      '<i class="fa fa-file-excel-o"></i>',
                                        titleAttr: 'Excel'
                                    },
                                    {
                                        extend:    'csvHtml5',
                                        text:      '<i class="fa fa-file-text-o"></i>',
                                        titleAttr: 'CSV'
                                    },
                                    {
                                        extend:    'pdfHtml5',
                                        text:      '<i class="fa fa-file-pdf-o"></i>',
                                        titleAttr: 'PDF'
                                    }
                                ],
                                responsive: true,
                                //responsive: true,
                                "order": [
                                    [0, 'asc']
                                ],
                                "lengthMenu": [
                                    [5, 10, 15, 20, -1],
                                    [5, 10, 15, 20, "All"]
                                ],
                                "pageLength": 200,
                                "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>" // horizobtal scrollable datatable
                            });

                            insuranceInfo.on('order.dt search.dt', function () {
                                insuranceInfo.column(0, {search: 'applied', order: 'applied'}).nodes().each(function (cell, i) {
                                    cell.innerHTML = i + 1;
                                });
                            }).draw();

                            yadcf.init(insuranceInfo, [{
                                    filter_type: "text",
                                    filter_delay: 500,
                                    column_number: 1
                                },{
                                    filter_type: "text",
                                    filter_delay: 500,
                                    column_number: 2
                                },{
                                    filter_type: "text",
                                    filter_delay: 500,
                                    column_number: 3
                                },{
                                    filter_type: "text",
                                    filter_delay: 500,
                                    column_number: 4
                                },{
                                    filter_type: "text",
                                    filter_delay: 500,
                                    column_number: 5
                                },{
                                    filter_type: "text",
                                    filter_delay: 500,
                                    column_number: 6
                                },{
                                    filter_type: "text",
                                    filter_delay: 500,
                                    column_number: 7
                                },{
                                    filter_type: "text",
                                    filter_delay: 500,
                                    column_number: 8
                                },{
                                    filter_type: "text",
                                    filter_delay: 500,
                                    column_number: 9
                                },{
                                    filter_type: "text",
                                    filter_delay: 500,
                                    column_number: 10
                                },{
                                    filter_type: "text",
                                    filter_delay: 500,
                                    column_number: 11
                                }],
                                {
                                    cumulative_filtering: true
                                });
                        });

                        function reload_table(insuranceInfo)
                        {
                            if(typeof insuranceInfo !== "undefined")
                            {
                                insuranceInfo.ajax.reload(null,false);
                            }
                        }
                    </script>

                    <script>

                        function search_credit(){

                            $("#sales_executive_title").css('display','none');
                            $("#sales_executive_div").css('display','none');
                            $('#loading_modal').modal({backdrop: 'static', keyboard: false});

                            $.ajax({

                                url:"<?php echo base_url('index.php/insurance/insurance_claim/get_credit_limit'); ?>",
                                dataType:"JSON",
                                type:"POST",
                                data:$('#insurance_form').serialize()+"&<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>",
                                success:function(data){

                                    if(data.status == true) {

                                        var html="";
                                        $("#sales_executive_tbody").html("");

                                        for(var i=0;i<data.sales_executives.length;i++){
                                            html +='<tr>'+
                                                '<td style="text-align: center">'+(i+1)+'</td>'+
                                                '<td>'+data.sales_executives[i].rep+'</td>'+
                                                '<td>'+data.sales_executives[i].name+'</td>'+
                                                '<td>' +
                                                '<input type="text" class="form-control numeric" value="'+data.amount_array[data.sales_executives[i].rep]+'" name="amount['+data.sales_executives[i].rep+']">' +
                                                '</td>'+
                                                '</tr>';
                                        }

                                        $("#sales_executive_tbody").html(html);

                                        $("#sales_executive_title").show();
                                        $("#sales_executive_div").show();
                                    }
                                    console.log(data);
                                    $("#loading_modal").modal('hide');
                                },
                                error:function(){
                                    $("#loading_modal").modal('hide');
                                    reload_table(insuranceInfo);
                                }
                            });
                        }

                        function save(){

                            //$("#loading_modal").modal({backdrop: 'static', keyboard: false});
                            var url="<?php echo base_url('index.php/insurance/insurance_claim/save'); ?>";

                            var formData = new FormData();
                            formData.append("<?php echo $this->security->get_csrf_token_name(); ?>", "<?php echo $this->security->get_csrf_hash(); ?>");
                            var basic_data = $("#insurance_form").serializeArray();
                            $.each(basic_data,function(key,input){

                                formData.append(input.name,input.value);

                            });

                            // ajax adding data to database
                            $.ajax({
                                url : url,
                                type: "POST",
                                data: formData,
                                dataType: "JSON",
                                contentType: false,
                                cache: false,
                                processData: false,
                                success: function(data)
                                {
                                    if(data.status == true){
                                        reload_table(insuranceInfo);

                                        bootbox.dialog({
                                            message: data.message,
                                            title: "Success !",
                                            buttons: {
                                                danger: {
                                                    label: "OK",
                                                    className: "btn-primary",
                                                    callback: function() {
                                                        $("#backButton").click();
                                                    }
                                                }
                                            }
                                        });

                                        $('#insurance_modal').modal('hide');
                                    }
                                    else{

                                        bootbox.dialog({
                                            message: data.message,
                                            title: "Sorry!",
                                            buttons: {
                                                danger: {
                                                    label: "Close",
                                                    className: "btn-danger",
                                                    callback: function() {
                                                        $("#backButton").click();
                                                    }
                                                }
                                            }
                                        });

                                    }

                                },
                                error:function(){
                                    $('#loading_modal').modal('hide');
                                    reload_table(insuranceInfo);
                                }
                            });
                        }

                        function add_insurance(){

                            $("#claim_details").html('');

                            $("#sales_executive_title").css('display','none');
                            $("#sales_executive_div").css('display','none');

                            $('.error-block').empty();
                            save_method='add';
                            $('#insurance_form')[0].reset();

                            //get master employee
                            getEmployeeMaster();

                            $('#insurance_modal_title').html('Add New insurance');
                            $('#insurance_modal').modal({backdrop: 'static', keyboard: false});

                        }

                        function add_settings(){

                            $('#settings_modal_title').html('New Settings');
                            $('#settings_modal').modal({backdrop: 'static', keyboard: false});

                        }

                        function edit_save(){

                            var url="<?php echo base_url('index.php/insurance/insurance_claim/edit_save'); ?>";

                            var formData = new FormData();
                            formData.append("<?php echo $this->security->get_csrf_token_name(); ?>", "<?php echo $this->security->get_csrf_hash(); ?>");
                            var basic_data = $("#edit_insurance_form").serializeArray();
                            $.each(basic_data,function(key,input){

                                formData.append(input.name,input.value);

                            });

                            // ajax adding data to database
                            $.ajax({
                                url : url,
                                type: "POST",
                                data: formData,
                                dataType: "JSON",
                                contentType: false,
                                cache: false,
                                processData: false,
                                success: function(data)
                                {

                                    if(data.status == true){

                                        reload_table(insuranceInfo);
                                        $('#edit_modal').modal('hide');

                                        bootbox.dialog({
                                            message: data.message,
                                            title: "Success !",
                                            buttons: {
                                                danger: {
                                                    label: "OK",
                                                    className: "btn-primary",
                                                    callback: function() {
                                                        $("#backButton").click();
                                                    }
                                                }
                                            }
                                        });

                                    }
                                    else{

                                        bootbox.dialog({
                                            message: data.message,
                                            title: "Sorry!",
                                            buttons: {
                                                danger: {
                                                    label: "Close",
                                                    className: "btn-danger",
                                                    callback: function() {
                                                        $("#backButton").click();
                                                    }
                                                }
                                            }
                                        });

                                    }

                                },
                                error:function(){
                                    reload_table(insuranceInfo);
                                }
                            });
                        }

                        function approve_save(){

                            $("#loading_modal").modal({backdrop: 'static', keyboard: false});
                            var url="<?php echo base_url('index.php/insurance/insurance_claim/approve_save'); ?>";

                            var formData = new FormData();
                            formData.append("<?php echo $this->security->get_csrf_token_name(); ?>", "<?php echo $this->security->get_csrf_hash(); ?>");
                            var basic_data = $("#approve_insurance_form").serializeArray();
                            $.each(basic_data,function(key,input){

                                formData.append(input.name,input.value);

                            });

                            // ajax adding data to database
                            $.ajax({
                                url : url,
                                type: "POST",
                                data: formData,
                                dataType: "JSON",
                                contentType: false,
                                cache: false,
                                processData: false,
                                success: function(data)
                                {
                                    $('#loading_modal').modal('hide');
                                    if(data.status == true){

                                        bootbox.dialog({
                                            message: data.message,
                                            title: "Success !",
                                            buttons: {
                                                danger: {
                                                    label: "OK",
                                                    className: "btn-primary",
                                                    callback: function() {
                                                        $("#backButton").click();
                                                    }
                                                }
                                            }
                                        });
                                    }
                                    else{

                                        bootbox.dialog({
                                            message: data.message,
                                            title: "Sorry!",
                                            buttons: {
                                                danger: {
                                                    label: "Close",
                                                    className: "btn-danger",
                                                    callback: function() {
                                                        $("#backButton").click();
                                                    }
                                                }
                                            }
                                        });
                                    }

                                    reload_table(insuranceInfo);
                                    $('#approve_modal').modal('hide');
                                },
                                error:function(){
                                    $('#loading_modal').modal('hide');
                                    reload_table(insuranceInfo);
                                }
                            });
                        }

                    </script>

                    <script>

                        function edit_insurance(id){

                            $("#edit_insurance_form")[0].reset();

                            //get master employee
                            getEmployeeMaster();

                            $.ajax({

                                url: "<?php echo base_url('index.php/insurance/insurance_claim/edit_insurance'); ?>/"+id,
                                type: "POST",
                                dataType: "JSON",
                                data:{
                                    '<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>'
                                },
                                success:function(data){

                                    get_employee_usage(data.insurance.emp_code);

                                    $('[name="insurance_id"]').val(id);
                                    $('[name="edit_bill_amount"]').val(data.insurance.bill_amount);

                                    $('#edit_modal .modal-title').text("Edit Insurance Claim "+data.insurance.emp_code);
                                    $('#edit_modal').modal({backdrop:'static',keyboard:false});

                                },
                                error: function(jqXHR, textStatus, errorThrown){

                                    console.log(jqXHR);
                                    console.log(textStatus);
                                    console.log(errorThrown);
                                }

                            });
                        }

                        function approve_itinerary(rep_id,ref_month){

                            $("#approve_insurance_form")[0].reset();
                            $.ajax({

                                url: "<?php echo base_url('index.php/insurance/insurance_claim/edit_insurance'); ?>/"+rep_id+"/"+ref_month,
                                type: "POST",
                                dataType: "JSON",
                                data:{
                                    '<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>'
                                },
                                success:function(data){

                                    $('[name="approve_id"]').val(rep_id);
                                    $('[name="approve_status"]').val(data.itinerary.area_manager);

                                    $('#approve_modal .modal-title').text("Approval insurance "+rep_id+" - "+ref_month);
                                    $('#approve_modal').modal({backdrop:'static',keyboard:false});

                                },
                                error: function(jqXHR, textStatus, errorThrown){

                                    console.log(jqXHR);
                                    console.log(textStatus);
                                    console.log(errorThrown);
                                }

                            });
                        }


                        function getEmployeeMaster() {

                            $('#employee').html('<option value="">--Select Employee--</option>');

                            //employee list
                            $.ajax({
                                async: false,
                                url: "<?php echo site_url('index.php/insurance/insurance_claim/get_employee_info'); ?>",
                                type: "POST",
                                data: {
                                    "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash() ?>"
                                },
                                dataType: "JSON",
                                success: function (data) {

                                    $.each(data, function (id, name) {
                                        var opt = $('<option />');
                                        opt.val(id);
                                        opt.text(name);
                                        $('#employee').append(opt);
                                    });
                                },
                                error: function (jqXHR, textStatus, errorThrown) {
                                    alert('Error get data');
                                }
                            });

                        }


                        //medical year
                        $.ajax({
                            async: false,
                            url: "<?php echo site_url('index.php/insurance/insurance_claim/get_medical_year'); ?>",
                            type: "POST",
                            data: {
                                "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash() ?>"
                            },
                            dataType: "JSON",
                            success: function(data)
                            {

                                $.each(data, function(id,name)
                                {
                                    var opt = $('<option />');
                                    opt.val(id);
                                    opt.text(name);
                                    $('#medical_year').append(opt);
                                });
                            },
                            error: function (jqXHR, textStatus, errorThrown)
                            {
                                alert('Error get data');
                            }
                        });

                        function bulk_upload(){

                            $('#pnl_div').html("");
                            $('#saved_form :input').removeClass('has-error');
                            $('#bulk_upload_modal').modal({backdrop: 'static', keyboard: false});
                            $('#bulk_upload_modal .modal-title').text('Import Insurance Claim');

                        }

                        $("#employee").change(function(){
                            get_employee_usage($(this).val());
                        });

                        function get_employee_usage(id){
                            $.ajax({
                                async: false,
                                url: "<?php echo site_url('index.php/insurance/insurance_claim/get_employee_usage'); ?>",
                                type: "POST",
                                data: {
                                    "emp_code":id,
                                    "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash() ?>"
                                },
                                dataType: "JSON",
                                success: function(data)
                                {
                                    if(data.status == true){

                                        $("#claim_details").html('' +
                                            '<span style="background-color: #0c8841;color: white;border-radius: 5px">&nbsp;&nbsp;Limit : '+data.emp_limit+'&nbsp;&nbsp;</span>&nbsp;&nbsp;' +
                                            '<span style="background-color: #067088;color: white;border-radius: 5px">&nbsp;&nbsp;Balance : '+data.emp_balance+'&nbsp;&nbsp;</span>&nbsp;&nbsp;' +
                                            '<span style="background-color: #b60016;color: white;border-radius: 5px">&nbsp;&nbsp;Used : '+data.emp_used+'&nbsp;&nbsp;</span>' +
                                            '');

                                        $("#claim_details").show();

                                        $("#edit_claim_details").html('' +
                                            '<span style="background-color: #0c8841;color: white;border-radius: 5px">&nbsp;&nbsp;Limit : '+data.emp_limit+'&nbsp;&nbsp;</span>&nbsp;&nbsp;' +
                                            '<span style="background-color: #067088;color: white;border-radius: 5px">&nbsp;&nbsp;Balance : '+data.emp_balance+'&nbsp;&nbsp;</span>&nbsp;&nbsp;' +
                                            '<span style="background-color: #b60016;color: white;border-radius: 5px">&nbsp;&nbsp;Used : '+data.emp_used+'&nbsp;&nbsp;</span>' +
                                            '');

                                    }

                                },
                                error: function (jqXHR, textStatus, errorThrown)
                                {
                                    alert('Error get data');
                                }
                            });

                        }
                    </script>

