<?php

/**
 * Created by PhpStorm.
 * User: kasun.demel
 * Date: 1/20/2021
 * Time: 3:59 PM
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





    #myImg {
        border-radius: 5px;
        cursor: pointer;
        transition: 0.3s;
    }

    #myImg:hover {opacity: 0.7;}

    /* The Modal (background) */
    #myModal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        padding-top: 100px; /* Location of the box */
        left: -100px;
        top: 0;
        width: 1600px; /* Full width */
        height: 800px; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
    }

    /* Modal Content (image) */
    #myModal .modal-content {
        margin: auto;
        display: block;
        width: 100%;
        max-width: 1200px;
    }

    /* Caption of Modal Image */
    #myModal #caption {
        margin: auto;
        display: block;
        width: 100%;
        max-width: 900px;
        text-align: center;
        color: #ccc;
        padding: 10px 0;
        height: 150px;
    }

    /* Add Animation */
    #myModal .modal-content, #caption {
        -webkit-animation-name: zoom;
        -webkit-animation-duration: 0.6s;
        animation-name: zoom;
        animation-duration: 0.6s;
    }

    @-webkit-keyframes zoom {
        from {-webkit-transform:scale(0)}
        to {-webkit-transform:scale(1)}
    }

    @keyframes zoom {
        from {transform:scale(0)}
        to {transform:scale(1)}
    }

    /* The Close Button */
    #myModal .close {
        position: absolute;
        top: 15px;
        right: 35px;
        color: #f1f1f1;
        font-size: 40px;
        font-weight: bold;
        transition: 0.3s;
    }

    #myModal .close:hover,
    .close:focus {
        color: #bbb;
        text-decoration: none;
        cursor: pointer;
    }

    /* 100% Image Width on Smaller Screens */
    @media only screen and (max-width: 1200px){
        .modal-content {
            width: 100%;
        }
    }

</style>

<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"></h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:;">Expense</a></li>
                <li class="breadcrumb-item active">Expense List</li>
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
                <h4 class="page-head-title card-title  text-white" style="display: inline-block"> Dealer Sales Target</h4>
                <button type="button" onclick="add_target()" class="btn btn-success pull-right" style="margin-right: -10px;"><i class="fa fa-plus"></i> Add New Target</button>&nbsp;
            </div>
            <div class="element-box">

                <div class="tab-content tabcontent-border">
                    <div class="tab-pane p-20 active" role="tabpanel" id="arrangement">
                        <table class="table table-striped table-bordered table-hover table-header-fixed dt-responsive" id="TargetsInfo" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th class="all" style="width: 30px">#</th>
                                <th class="all">DEALER CODE</th>
                                <th class="all">DEALER NAME</th>
                                <th class="all">SDS AMOUNT</th>
                                <th class="all">DATE</th>
                                <th class="all">USER</th>
                                <th class="all text-center" width="200px">ACTIONS</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>

                    <!-- Bootstrap modal -->
                    <div class="modal fade" id="sales_modal" role="dialog">
                        <div class="modal-dialog modal-full" style="max-width: 800px;min-width:800px;max-height: 400px">
                            <div class="modal-content">
                                <div class="modal-header bg-blue-steel bg-font-blue-steel">
                                    <h6 id="sales_modal_title"></h6>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <form enctype="multipart/form-data" action="<?php echo base_url('index.php/sales/dealer_sales_target/upload_file_target'); ?>" method="post">
                                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                    <div class="modal-body form">
                                        <div class="modal-body">
                                            <p>
                                                Support only CSV file <a href="<?php echo base_url(); ?>assets/data/target_sample_file.txt" target="_blank" class="pull-right btn btn-sm btn-default">View Sample File</a>
                                            </p>
                                            <div class="form-group">
                                                <label for="file_upload">File input</label>
                                                <input type="file" id="file_upload" name="file">
                                            </div>
                                            <div class="form-group">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">

                                        <input type="submit" id="" name="submit" class="btn btn-success" value="Upload File">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="edit_sales_modal" role="dialog">
                        <div class="modal-dialog modal-full" style="max-width: 1400px;min-width:1200px;max-height: 900px">
                            <div class="modal-content">
                                <div class="modal-header bg-blue-steel bg-font-blue-steel">
                                    <h6 id="edit_sales_modal_title"></h6>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body form">
                                    <form enctype="multipart/form-data" id="edit_expense_form" class="form-horizontal">
                                        <input type="hidden" name="edit_id" id="edit_id">
                                        <div class="form-body">
                                            <div class="">
                                                <div class="form-group row" >
                                                    <label class="control-label col-md-4" for="user" style='text-align: right;color:black;'><b>SELECT EMPLOYEE</b></label>
                                                    <div class="col-md-6">
                                                        <select name="user1" id="user1" class="form-control">
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="control-label col-md-4" for="user" style='text-align: right;color:black;'><b>VEHICLE</b></label>
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control" name="vehicle1" id="vehicle1" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group row" style="margin: 20px">
                                                    <table style="width:100%;margin:5px" class="st-lumi-table" cellspacing="2" cellpadding="5" border="1">
                                                        <thead>
                                                        <tr>
                                                            <th style="text-align: center" rowspan="2">DAY</th>
                                                            <th style="text-align: center" rowspan="2">DATE</th>
                                                            <th style="text-align: center" rowspan="2">DESCRIPTION</th>
                                                            <th style="text-align: center" rowspan="2">OPENING<br>KM</th>
                                                            <th style="text-align: center" rowspan="2">CLOSING<br>KM</th>
                                                            <th style="text-align: center" colspan="2">KM</th>
                                                            <th style="text-align: center" rowspan="2">TOTAL KM</th>
                                                            <th style="text-align: center" rowspan="2">FUEL RS.</th>
                                                            <th style="text-align: center" rowspan="2">HOTEL BILLS</th>
                                                            <th style="text-align: center" rowspan="2">D/A/W</th>
                                                            <th style="text-align: center" rowspan="2">TELE/FAX</th>
                                                            <th style="text-align: center" rowspan="2">OTHERS</th>
                                                            <th style="text-align: center" rowspan="2">AMOUNT</th>
                                                            <th style="text-align: center" rowspan="2">ATTACHMENT</th>
                                                        </tr>
                                                        <tr>
                                                            <th style="text-align: center">OFFICE</th>
                                                            <th style="text-align: center">PRIVATE</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody id="edit_tbody"></tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">

                                    <button type="button" id="arrangeBtn" onclick="edit_save()" class="btn btn-primary">Save</button>
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
                                    <form enctype="multipart/form-data" id="edit_expense_form" class="form-horizontal">
                                        <input type="hidden" name="edit_id" id="edit_id">
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="form-group row">
                                                        <label class="control-label col-md-4" for="expense" style='text-align: right;color:black;'><b>Select Date</b></label>
                                                        <div class="col-md-6">
                                                            <input type="text" id="edit_date" name="edit_date" class="form-control date date-pick" data-date-format="yyyy-mm-dd" autocomplete="off" placeholder="Date">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="control-label col-md-4" for="expense" style='text-align: right;color:black;'><b>Select Expense Type</b></label>
                                                        <div class="col-md-6">
                                                            <select name="edit_expense_type" id="edit_expense_type" class="form-control noSelect2">
                                                                <option></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="control-label col-md-4" for="expense" style='text-align: right;color:black;'><b>Amount</b></label>
                                                        <div class="col-md-6">
                                                            <input type="text" id="edit_amount" name="edit_amount" class="form-control numeric" size="16">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="control-label col-md-4" for="expense" style='text-align: right;color:black;'><b>Description</b></label>
                                                        <div class="col-md-6">
                                                            <textarea cols="3" type="text" id="edit_description" name="edit_description" class="form-control" size="16"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <label class="control-label col-md-4" for="expense" style='text-align: right;color:black;'><b>Opening KM</b></label>
                                                        <div class="col-md-6">
                                                            <input type="text" id="edit_opening_km" name="edit_opening_km" class="form-control numeric" size="16">
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="form-group row">
                                                        <label class="control-label col-md-4" for="expense" style='text-align: right;color:black;'><b>Closing KM</b></label>
                                                        <div class="col-md-6">
                                                            <input type="text" id="edit_closing_km" name="edit_closing_km" class="form-control numeric" size="16">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="control-label col-md-4" for="expense" style='text-align: right;color:black;'><b>Receipt No</b></label>
                                                        <div class="col-md-6">
                                                            <input type="text" id="edit_receipt_no" name="edit_receipt_no" class="form-control" size="16">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row" id="selectAttachment">
                                                        <label class="control-label col-md-4" style='text-align: right;color:black;'><b>Attachment</b></label>
                                                        <div class="col-md-6" id="attachment">
                                                            <input type="file" name="edit_attachment" id="edit_attachment" class="form-control input-optional" placeholder="PDF,JPG,PNG">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div id="edit_image" style="border: 1px solid #808080;box-shadow: #808080;width: 200px;height: 300px"></div>

                                                    <!-- The Modal -->
                                                    <div id="myModal" class="modal" style="width: 1000px;">
                                                        <span class="close" id="mymodal_close">&times;</span>
                                                        <img class="modal-content" id="img01">
                                                        <div id="caption"></div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer" style="margin-top: 20px;margin:5px">
                                    <button type="button" onclick="edit_save()" class="btn btn-primary">Save</button>
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
                                    <form id="approve_expense_form" class="form-horizontal">
                                        <input type="hidden" name="approve_id" id="approve_id">
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="form-group row">
                                                        <label class="control-label col-md-6" for="expense" style='text-align: right;color:black;'><b>Select Status</b></label>
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
                                    <button type="button" onclick="approve_save()" class="btn btn-primary">Save</button>
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
                                        <h4  class="sub-head">Pending Expense Information</h4>
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
                        var TargetsInfo;

                        $(document).ready(function(){

                            $('#load').hide();

                            $(".date-pick").datepicker();


                            $(".modal :input").change(function(){
                                $(this).siblings("span.error-block").html("").hide();
                                $("span.help-inline").hide();
                            });

                            $('.modal').on('hidden.bs.modal', function(){

                                $("form :input").siblings("span.error-block").html("").hide();
                                $("span.help-inline").hide();

                            });

                            <?php if($this->session->flashdata('message')){ ?>

                            bootbox.alert({
                                message: "<b style='text-align:center'><?php echo $this->session->flashdata('message')?></b>",
                                size: 'small'
                            });

                            <?php } ?>

                            TargetsInfo = $('#TargetsInfo').DataTable({

                                "processing": true, //Feature control the processing indicator.
                                "serverSide": true, //Feature control DataTables' server-side processing mode.
                                // Load data for the table's content from an Ajax source
                                "ajax":{
                                    "data": {
                                        "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
                                    },
                                    "url": "<?php echo base_url()?>index.php/sales/dealer_sales_target/get_all_targets/",
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
                                    { "bSortable": false,"bSearchable": false }
                                ],
                                rowCallback: function(row, data, index){

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
                                    [0, 'desc']
                                ],
                                "lengthMenu": [
                                    [5, 10, 15, 20, -1],
                                    [5, 10, 15, 20, "All"]
                                ],
                                "pageLength": 50,
                                "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>" // horizobtal scrollable datatable
                            });

                            TargetsInfo.on('order.dt search.dt', function () {
                                TargetsInfo.column(0, {search: 'applied', order: 'applied'}).nodes().each(function (cell, i) {
                                    cell.innerHTML = i + 1;
                                });
                            }).draw();

                            yadcf.init(TargetsInfo, [{
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
                                }],
                                {
                                    filters_position: 'footer',
                                    cumulative_filtering: true
                                });
                        });

                        function reload_table(TargetsInfo)
                        {
                            if(typeof TargetsInfo !== "undefined")
                            {
                                TargetsInfo.ajax.reload(null,false);
                            }
                        }
                    </script>

                    <script>


                        function save(){

                            //$('#loading_modal').modal({backdrop: 'static', keyboard: false});
                            var url="<?php echo base_url('index.php/sales/dealer_sales_target/save'); ?>";

                            var formData = new FormData();
                            var file = $('#expense_form input[type=file]')[0].files[0];
                            formData.append("file", file);
                            formData.append("<?php echo $this->security->get_csrf_token_name(); ?>", "<?php echo $this->security->get_csrf_hash(); ?>");
                            var basic_data = $("#expense_form").serializeArray();
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

                                        reload_table(TargetsInfo);
                                        $('#sales_modal').modal('hide');

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
                                    //$('#loading_modal').modal('hide');
                                },
                                error:function(){
                                    //$('#loading_modal').modal('hide');
                                    reload_table(TargetsInfo);
                                }
                            });
                        }

                        function add_target(){

                            $('.error-block').empty();
                            save_method='add';

                            $('#sales_modal_title').html('Add New Target');
                            $('#sales_modal').modal({backdrop: 'static', keyboard: false});

                        }


                        function edit_save(){

                            //$('#loading_modal').modal({backdrop: 'static', keyboard: false});
                            var url="<?php echo base_url('index.php/sales/dealer_sales_target/edit_save'); ?>";

                            var formData = new FormData();
                            var file = $('#edit_expense_form input[type=file]')[0].files[0];
                            formData.append("file", file);
                            formData.append("<?php echo $this->security->get_csrf_token_name(); ?>", "<?php echo $this->security->get_csrf_hash(); ?>");
                            var basic_data = $("#edit_expense_form").serializeArray();
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
                                    //$('#loading_modal').modal('hide');
                                    reload_table(TargetsInfo);
                                    $('#edit_sales_modal').modal('hide');

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

                                },
                                error:function(){
                                    //$('#loading_modal').modal('hide');
                                    reload_table(TargetsInfo);
                                }
                            });
                        }




                    </script>

                    <script>

                        function edit_expense(id){

                            $("#edit_expense_form")[0].reset();
                            $.ajax({

                                url: "<?php echo base_url('index.php/sales/dealer_sales_target/edit_expense'); ?>/"+id,
                                type: "POST",
                                dataType: "JSON",
                                data:{
                                    '<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>'
                                },
                                success:function(data){

                                    console.log(data.expense[0].description);

                                    $('[name="edit_id"]').val(id);
                                    $('[name="vehicle1"]').val(data.expense_header.vehicle);
                                    $('[name="user1"]').val(data.user.id);

                                    var html='';

                                    var from_date = new Date(data.from_date);
                                    var to_date = new Date(data.to_date);

                                    var dayNames = new Array('Sun','Mon','Tue','Wed','Thu','Fri','Sat');
                                    const month = ["01","02","03","04","05","06","07","08","09","10","11","12"];

                                    var total_FE=0,total_NO= 0,total_ST= 0,total_TF= 0,total_OE= 0,total_total=0;

                                    for(var i=0;i< data.expense.length ;i++){

                                        html +='<tr>'+
                                            '<td>'+(dayNames[from_date.getDay()])+'</td>'+
                                            '<td>'+from_date.getFullYear()+'-'+month[from_date.getMonth()]+'-'+from_date.getDate()+'<input type="hidden" name="week['+i+']" id="week'+i+'" value="'+from_date.getFullYear()+'-'+month[from_date.getMonth()]+'-'+from_date.getDate()+'"></td>'+
                                            '<td style="width: 20%"><textarea type="text" id="description'+i+'" name="description['+i+']" class="form-control" size="16" style="height: 40px !important;">'+data.expense[i].description+'</textarea> </td>'+
                                            '<td><input type="text" id="opening_km'+i+'" name="opening_km['+i+']" class="form-control numeric" size="16" style="background: #ffff71 !important" placeholder="Opening KM" onkeyup="calculateTotalKM('+i+')" value="'+data.expense[i].opening_km+'"></td>'+
                                            '<td><input type="text" id="closing_km'+i+'" name="closing_km['+i+']" class="form-control numeric" size="16" style="background: #ffff71 !important" placeholder="Closing KM" onkeyup="calculateTotalKM('+i+')" value="'+data.expense[i].closing_km+'"></td>'+
                                            '<td><input type="text" id="office_km'+i+'" name="office_km['+i+']" class="form-control numeric" size="16" style="background: #ade4ff !important" placeholder="Office KM" onkeyup="calculateOfficeKM('+i+')" value="'+data.expense[i].office_km+'"></td>'+
                                            '<td><input type="text" id="private_km'+i+'" name="private_km['+i+']" class="form-control numeric" size="16" style="background: #ade4ff !important" placeholder="Private KM" onkeyup="calculatePrivateKM('+i+')" value="'+data.expense[i].private_km+'"></td>'+
                                            '<td> <input type="text" id="total_km'+i+'" name="total_km['+i+']" class="form-control numeric" size="16" style="background: #d8a39f !important" placeholder="Total KM" onkeyup="calculateTotalKM('+i+')" value="'+data.expense[i].total_km+'"> </td>'+
                                            '<td><input type="text" id="FE'+i+'" name="FE['+i+']" class="form-control numeric" size="16" onkeyup="calculateTotalAmount('+i+')" value="'+data.expense[i].FE+'"></td>'+
                                            '<td><input type="text" id="NO'+i+'" name="NO['+i+']" class="form-control numeric" size="16" onkeyup="calculateTotalAmount('+i+')" value="'+data.expense[i].NO+'"></td>'+
                                            '<td><input type="text" id="ST'+i+'" name="ST['+i+']" class="form-control numeric" size="16" onkeyup="calculateTotalAmount('+i+')" value="'+data.expense[i].ST+'"></td>'+
                                            '<td><input type="text" id="TF'+i+'" name="TF['+i+']" class="form-control numeric" size="16" onkeyup="calculateTotalAmount('+i+')" value="'+data.expense[i].TF+'"></td>'+
                                            '<td><input type="text" id="OE'+i+'" name="OE['+i+']" class="form-control numeric" size="16" onkeyup="calculateTotalAmount('+i+')" value="'+data.expense[i].OE+'"></td>'+
                                            '<td><input type="text" id="total'+i+'" name="total['+i+']" class="form-control numeric" size="16" readonly value="'+data.expense[i].total+'"></td>'+
                                            '<td><input type="file" name="attachment" id="attachment" class="form-control input-optional" placeholder="PDF,JPG,PNG"></td>'+
                                            '</tr>';

                                        from_date.setDate(from_date.getDate() + 1);

                                        total_FE += parseFloat(data.expense[i].FE);
                                        total_NO += parseFloat(data.expense[i].NO);
                                        total_ST += parseFloat(data.expense[i].ST);
                                        total_TF += parseFloat(data.expense[i].TF);
                                        total_OE += parseFloat(data.expense[i].OE);

                                    }

                                    total_total = total_FE + total_NO + total_ST + total_TF + total_OE;

                                    html +='<tr>'+
                                        '<td colspan="8" style="text-align: center"><b>TOTAL</b></td>'+
                                        '<td><input type="text" id="total_FE" name="total_FE" class="form-control numeric" size="16" readonly value="'+total_FE+'"></td>'+
                                        '<td><input type="text" id="total_NO" name="total_NO" class="form-control numeric" size="16" readonly value="'+total_NO+'"></td>'+
                                        '<td><input type="text" id="total_ST" name="total_ST" class="form-control numeric" size="16" readonly value="'+total_ST+'"></td>'+
                                        '<td><input type="text" id="total_TF" name="total_TF" class="form-control numeric" size="16" readonly value="'+total_TF+'"></td>'+
                                        '<td><input type="text" id="total_OE" name="total_OE" class="form-control numeric" size="16" readonly value="'+total_OE+'"></td>'+
                                        '<td><input type="text" id="total_total" name="total_total" class="form-control numeric" size="16" readonly value="'+total_total+'"></td>'+
                                        '<td>&nbsp;</td>'+
                                        '</tr>';

                                    $("#edit_tbody").html(html);

                                    $('#edit_sales_modal_title').text("Edit Sales Target  "+data.expense_header.user+ " | "+data.expense_header.week+" | "+data.expense_header.vehicle);
                                    $('#edit_sales_modal').modal({backdrop:'static',keyboard:false});

                                },
                                error: function(jqXHR, textStatus, errorThrown){

                                    console.log(jqXHR);
                                    console.log(textStatus);
                                    console.log(errorThrown);
                                }

                            });
                        }

                        function approve_expense(id){

                            $("#approve_expense_form")[0].reset();
                            $.ajax({

                                url: "<?php echo base_url('index.php/sales/dealer_sales_target/edit_expense'); ?>/"+id,
                                type: "POST",
                                dataType: "JSON",
                                data:{
                                    '<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>'
                                },
                                success:function(data){

                                    $('[name="approve_id"]').val(id);
                                    $('[name="approve_status"]').val(data.expense_header.sales_staff);

                                    $('#approve_modal .modal-title').text("Approval Expense "+data.expense_header.week+" - "+data.expense_header.vehicle);
                                    $('#approve_modal').modal({backdrop:'static',keyboard:false});

                                },
                                error: function(jqXHR, textStatus, errorThrown){

                                    console.log(jqXHR);
                                    console.log(textStatus);
                                    console.log(errorThrown);
                                }
                            });
                        }


                    </script>


