<?php

/**
 * Created by CEAT.
 * User:Kasun De Mel
 * Email:kasun@earrow.net
 * Date: 9/27/2019
 * Time: 10:10 AM
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

    /*#RosterInfo_filter{*/
    /*display: none;*/
    /*}*/

</style>

<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"></h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:;">Roster</a></li>
                <li class="breadcrumb-item active">Roster Management</li>
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
                <h4 class="page-head-title card-title  text-white" style="display: inline-block"> Roster Management</h4>
                <button type="button" onclick="reset_allocation()" class="btn btn-success pull-right" style="margin-left: 5px;"><i class="fa fa-refresh"></i> Reset Allocation</button>&nbsp;
                <button type="button" onclick="add_allocation()" class="btn btn-success pull-right"><i class="fa fa-plus"></i> New Allocation</button>&nbsp;
                <button type="button" onclick="add_arrangement()" class="btn btn-success pull-right" style="margin-right: -10px;"><i class="fa fa-plus"></i> New Roster</button>&nbsp;
            </div>
            <div class="element-box">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item"><a class="nav-link active" role="tab" href="#arrangement" data-toggle="tab"> Roster Arrangement</a></li>
                    <li class="nav-item"><a class="nav-link" role="tab" href="#summary" data-toggle="tab" onclick="get_rosters()"> Absent Summary</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content tabcontent-border">
                    <div class="tab-pane p-20 active" role="tabpanel" id="arrangement">
                        <table class="table table-striped table-bordered table-hover table-header-fixed dt-responsive" id="RosterInfo" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th class="all" style="width: 30px">#</th>
                                <th class="all">Name</th>
                                <th class="all">Description</th>
                                <th class="all">Department</th>
                                <th class="all">Designation</th>
                                <th class="all">Month</th>
                                <th class="all">Day Offs</th>
                                <th class="all">Status</th>
                                <th class="all text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane p-20" role="tabpanel" id="summary">
                        <div class="element-box">
                            <form id="search_form" class="form-material">
                                <div class="row">
                                    <div class="col-md-10">

                                        <table class="tool" id="tools" style="width: 100%;position: static; visibility: visible;" border="0">
                                            <tbody>
                                            <tr>
                                                <td>&nbsp;Roster</td>
                                                <td>
                                                    <select name="search_roster" id="search_roster" class="select2">
                                                        <option value="">(---)</option>
                                                    </select>
                                                </td>
                                                <td>&nbsp;Employee</td>
                                                <td>
                                                    <select name="search_employee" id="search_employee" class="select2">
                                                        <option value="">(---)</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <button type="button" onclick="filter_roster()" class="btn btn-success pull-left" style="margin-right: -10px;"><i class="fa fa-filter"></i> Search</button>&nbsp;
                                                </td>
                                                <td>&nbsp;</td>
                                                <td>
                                                    <h6>Reference</h6>
                                                    <span class="label label-success">AB</span> - Absent <br>
                                                    <span class="label label-info">LE</span> - Leave<br><br>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div id="load_table">
                        </div>
                    </div>

                    <!-- Bootstrap modal -->
                    <div class="modal fade" id="roster_modal" role="dialog">
                        <div class="modal-dialog modal-full" style="max-width: 700px">
                            <div class="modal-content">
                                <div class="modal-header bg-blue-steel bg-font-blue-steel">
                                    <h6 id="roster_modal_title"></h6>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body form">
                                    <form action="#" id="roster_form" class="form-horizontal">
                                        <div class="form-body">
                                            <div class="">
                                                <input type="hidden" name="arrangement_id" id="arrangement_id">
                                                <br>
                                                <div class="row">
                                                    <label class="control-label col-md-4" for="roster" style='text-align: right;color:black;'><b>Month :</b></label>
                                                    <div class="col-md-6">
                                                        <input type="text" id="month" name="month" class="form-control month form-control-inline input-medium date-pick" size="16" data-date-format="yyyy-mm">
                                                        <span class="error-block"></span>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <label class="control-label col-md-4" for="roster_type" style='text-align: right;color:black;'><b>Department :</b></label>
                                                    <div class="col-md-6">
                                                        <select name="department" id="department" class="form-control select2">
                                                            <option></option>
                                                        </select>
                                                        <span class="error-block"></span>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <label class="control-label col-md-4" for="roster_type" style='text-align: right;color:black;'><b>Sub Department :</b></label>
                                                    <div class="col-md-6">
                                                        <select name="sub_department" id="sub_department" class="form-control select2">
                                                            <option></option>
                                                        </select>
                                                        <span class="error-block"></span>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <label class="control-label col-md-4" for="designation" style='text-align: right;color:black;'><b>Designation :</b></label>
                                                    <div class="col-md-6">
                                                        <select name="designation" id="designation" class="form-control select2">
                                                            <option></option>
                                                        </select>
                                                        <span class="error-block"></span>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <label class="control-label col-md-4" for="name" style='text-align: right;color:black;'><b>Roster Name :</b></label>
                                                    <div class="col-md-6">
                                                        <input type="text" name="name" id="name" class="form-control">
                                                        <span class="error-block"></span>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <label class="control-label col-md-4" for="description" style='text-align: right;color:black;'><b>Roster Description :</b></label>
                                                    <div class="col-md-6">
                                                        <textarea name="description" id="description" class="form-control"></textarea>
                                                        <span class="error-block"></span>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <label class="control-label col-md-4" for="description" style='text-align: right;color:black;'><b>1<sup>st</sup> Half Of Month (Day) :</b></label>
                                                    <div class="col-md-6">
                                                        <textarea name="first_half_day" id="first_half_day" class="form-control numeric"></textarea>
                                                        <span class="error-block"></span>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <label class="control-label col-md-4" for="description" style='text-align: right;color:black;'><b>1<sup>st</sup> Half Of Month (Night) :</b></label>
                                                    <div class="col-md-6">
                                                        <input type="text" name="first_half_night" id="first_half_night" class="form-control numeric">
                                                        <span class="error-block"></span>
                                                    </div>
                                                </div>
                                                <br>
                                                <h4  class="sub-head">Roster Rules</h4>
                                                <div class="row" style="margin-top: 20px">
                                                    <table style="width:100%;margin:5px" class="st-lumi-table" cellspacing="2" cellpadding="5" border="1">
                                                        <thead>
                                                        <tr>
                                                            <?php foreach ($main_days as $days){ ?>
                                                                <th colspan="<?php echo $days->session_count; ?>" style="text-align: center">
                                                                    <label class="control-label" for="roster" style='color:#ffffff;text-align: center'><b><?php echo $days->session; ?>&nbsp;(%)</b></label>
                                                                </th>
                                                            <?php } ?>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <?php foreach($main_days as $days){ ?>
                                                                <td colspan="<?php echo $days->session_count; ?>">
                                                                    <input type="text" id="<?php echo strtolower($days->session);?>" name="<?php echo strtolower($days->session);?>" class="form-control numeric" value="<?php echo strtolower($days->percentage);?>">
                                                                    <span class="error-block"></span>
                                                                </td>
                                                            <?php } ?>
                                                        </tr>
                                                        </tbody>
                                                        <thead>
                                                        <tr>
                                                            <?php foreach($rosters as $key1 => $roster1){ ?>
                                                                <th style="text-align: center">
                                                                    <label class="control-label" for="<?php echo $roster1->code; ?>" style='color:#ffffff;'><b style="margin-left: 25px"><?php echo $roster1->code; ?>&nbsp;(%)</b></label>
                                                                </th>
                                                            <?php } ?>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <?php foreach($rosters as $key1 => $roster1){ ?>
                                                                <td>
                                                                    <input type="text" id="<?php echo $roster1->code; ?>" name="<?php echo $roster1->code; ?>" class="form-control numeric" value="<?php echo $roster1->percentage; ?>">
                                                                    <span class="error-block"></span>
                                                                </td>
                                                            <?php } ?>
                                                        </tr>
                                                        </tbody>
                                                    </table>
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

                    <!-- Bootstrap modal -->
                    <div class="modal fade" id="allocation_modal" role="dialog">
                        <div class="modal-dialog modal-full" style="max-width: 700px">
                            <div class="modal-content">
                                <div class="modal-header bg-blue-steel bg-font-blue-steel">
                                    <h6 id="allocation_modal_title"></h6>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body form">
                                    <form action="#" id="allocation_form" class="form-horizontal">
                                        <div class="form-body">
                                            <div class="">
                                                <br>
                                                <div class="row">
                                                    <label class="control-label col-md-4" for="roster_allocation" style='text-align: right;color:black;'><b>Select Roster :</b></label>
                                                    <div class="col-md-6">
                                                        <select name="roster_allocation" id="roster_allocation" class="form-control select2">
                                                            <option></option>
                                                        </select>
                                                        <span class="error-block"></span>
                                                    </div>
                                                    <div style="padding: 5px;">
                                                        <img style="width: 24px; height: 24px; display:none ;" id="loader_1" src="<?php echo base_url('assets/images/loading-spinner-blue.gif') ?>" >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" onclick="allocation_save()" class="btn btn-primary">Process Allocation</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Bootstrap modal -->
                    <div class="modal fade" id="reset_modal" role="dialog">
                        <div class="modal-dialog modal-full" style="max-width: 700px">
                            <div class="modal-content">
                                <div class="modal-header bg-blue-steel bg-font-blue-steel">
                                    <h6 id="reset_modal_title"></h6>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body form">
                                    <form action="#" id="reset_form" class="form-horizontal">
                                        <div class="form-body">
                                            <div class="">
                                                <br>
                                                <div class="row">
                                                    <label class="control-label col-md-4" for="reset_roster" style='text-align: right;color:black;'><b>Roster Name:</b></label>
                                                    <div class="col-md-6">
                                                        <select name="reset_roster" id="reset_roster" class="form-control select2">
                                                            <option></option>
                                                        </select>
                                                        <span class="error-block"></span>
                                                    </div>
                                                    <div style="padding: 5px;">
                                                        <img style="width: 24px; height: 24px; display:none ;" id="loader_1" src="<?php echo base_url('assets/images/loading-spinner-blue.gif') ?>" >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" onclick="reset_save()" class="btn btn-primary">Reset Allocation</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade bs-example-modal-lg in" id="view_modal" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-lg"  style="min-width: 100px; max-width: 800px;">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="udModalLabel"></h4>
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="vendor_form" class="form-horizontal" role="form">
                                        <div class="row" style="margin-right:5px;margin-left: 5px;margin-top: 10px">
                                            <h4  class="sub-head">Roster Arrangement Information</h4>
                                            <div class="col-md-12 col-sm-12">
                                                <table style="width:100%" class="st-lumi-table" cellspacing="2" cellpadding="5" border="0" id="view_roster">
                                                </table>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer" style="margin-top: 20px;margin:5px">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="add_day_off_modal" role="dialog">
                        <div class="modal-dialog modal-full" style="max-width: 1100px">
                            <div class="modal-content">
                                <div class="modal-header bg-blue-steel bg-font-blue-steel">
                                    <h6 id="day_off_modal_title">Assign Day Offs Per Day</h6>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <form id="day_offs_form" class="form-horizontal">
                                    <div class="modal-body form">
                                        <div class="row">
                                            <label class="control-label col-md-3" for="name" style='text-align: right;color:black;'><b>Roster Name :</b></label>
                                            <div class="col-md-3" style="padding-left: 40px;padding-top: 5px">
                                                <span id="view_off_roster"></span>
                                            </div>
                                            <label class="control-label col-md-3" for="name" style='text-align: right;color:black;'><b>Roster Description :</b></label>
                                            <div class="col-md-3" style="padding-left: 40px;padding-top: 5px">
                                                <span id="view_off_description"></span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="control-label col-md-3" for="name" style='text-align: right;color:black;'><b>Month :</b></label>
                                            <div class="col-md-3" style="padding-left: 40px;padding-top: 5px">
                                                <span id="view_off_month"></span>
                                            </div>
                                            <label class="control-label col-md-3" for="name" style='text-align: right;color:black;'><b>Department :</b></label>
                                            <div class="col-md-3" style="padding-left: 40px;padding-top: 5px">
                                                <span id="view_off_department"></span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="control-label col-md-3" for="name" style='text-align: right;color:black;'><b>Sub Department :</b></label>
                                            <div class="col-md-3" style="padding-left: 40px;padding-top: 5px">
                                                <span id="view_off_sub_department"></span>
                                            </div>
                                            <label class="control-label col-md-3" for="name" style='text-align: right;color:black;'><b>Designation :</b></label>
                                            <div class="col-md-3" style="padding-left: 40px;padding-top: 5px">
                                                <span id="view_off_designation"></span>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <label class="control-label col-md-3 col-md-offset-3" for="name" style='text-align: right;color:black;'><b>Bulk Assign Day Offs :</b></label>
                                            <div class="col-md-3" style="padding-left: 40px;">
                                                <input type="text" class="form-control numeric" id="all_day_offs">
                                            </div>
                                        </div>
                                        <input type="hidden" name="view_off_ref_id">
                                    </div>
                                    <div class="table-responsive" style="overflow-x: auto;margin:2%;width:96%">
                                        <table class="st-lumi-table table-bordered table-hover">
                                            <thead id="day_off_thead">

                                            </thead>
                                        </table>
                                    </div>
                                </form>
                                <div class="modal-footer">
                                    <button type="button" onclick="update_day_offs()" class="btn btn-primary">Save</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <script type="text/javascript">

                        var save_method;
                        var RosterInfo;

                        $(document).ready(function(){

                            $(".date-pick").datepicker({
                                format:"yyyy-mm",
                                startView:"months",
                                minViewMode: "months",
                                autoclose:true
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

                            RosterInfo = $('#RosterInfo').DataTable({

                                "processing": true, //Feature control the processing indicator.
                                "serverSide": true, //Feature control DataTables' server-side processing mode.
                                // Load data for the table's content from an Ajax source
                                "ajax":{
                                    "data": {
                                        "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
                                    },
                                    "url": "<?php echo base_url()?>roster/roster_con/rosters_list/",
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
                                    { "bSortable": false,"bSearchable": false }
                                ],
                                rowCallback: function(row, data, index){

                                    if(data[6] == 0){
                                        $(row).find('td:eq(6)').html('<span style="background-color: red;color: white;border-radius: 5px">&nbsp;&nbsp;NOT ADDED&nbsp;&nbsp;</span>');
                                    }
                                    else if(data[6] >= 1){
                                        $(row).find('td:eq(6)').html('<span style="background-color: #31CC7D;color: white;border-radius: 5px">&nbsp;&nbsp;ADDED&nbsp;&nbsp;</span>');
                                    }
                                    if(data[7] == 0){
                                        $(row).find('td:eq(7)').html('<span style="background-color: red;color: white;border-radius: 5px">&nbsp;&nbsp;NOT ALLOCATED&nbsp;&nbsp;</span>');
                                    }
                                    else if(data[6] == 1){
                                        $(row).find('td:eq(7)').html('<span style="background-color: #31CC7D;color: white;border-radius: 5px">&nbsp;&nbsp;ALLOCATED&nbsp;&nbsp;</span>');
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
                                "order": [
                                    [0, 'asc']
                                ],
                                "lengthMenu": [
                                    [5, 10, 15, 20, -1],
                                    [5, 10, 15, 20, "All"] // change per page values here
                                ],
                                "pageLength": 20,
                                "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>" // horizobtal scrollable datatable
                            });

                            RosterInfo.on('order.dt search.dt', function () {
                                RosterInfo.column(0, {search: 'applied', order: 'applied'}).nodes().each(function (cell, i) {
                                    cell.innerHTML = i + 1;
                                });
                            }).draw();

                            yadcf.init(RosterInfo, [{
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
                                }],
                                {
                                    cumulative_filtering: false
                                });
                        });

                        function reload_table(table)
                        {
                            if(typeof table !== "undefined")
                            {
                                table.ajax.reload(null,false);
                            }
                        }
                    </script>

                    <script>

                        function save(){

                            // $('#loading_modal').modal({backdrop: 'static', keyboard: false});
                            $('#arrangeBtn').attr('disabled',true);

                            var url;
                            if(save_method == 'add'){
                                url="<?php echo base_url('roster/roster_con/save'); ?>";
                            }
                            else if(save_method == 'update'){
                                url="<?php echo base_url('roster/roster_con/update'); ?>";
                            }

                            $.ajax({

                                url:url,
                                dataType:"JSON",
                                type:"POST",
                                data:$('#roster_form').serialize()+"&<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>",
                                success:function(data){

                                    $('#arrangeBtn').attr('disabled',false);
                                    $('#loading_modal').modal('hide');

                                    if(data.input_error)
                                    {
                                        for (var i = 0; i < data.input_error.length; i++)
                                        {
                                            $('[name="'+data.input_error[i]+'"]').siblings("span.error-block").html(data.error_string[i]).show();
                                        }
                                    }
                                    else if(data.status == true){

                                        reload_table(RosterInfo);
                                        $('#roster_modal').modal('hide');
                                        bootbox.alert({
                                            message: "<b style='text-align:center'>"+data.message+"</b>"
                                        });
                                    }
                                    else{

                                        reload_table(RosterInfo);
                                        bootbox.alert({
                                            message: "<b style='text-align:center;color: red'>"+data.message+"</b>"
                                        });
                                    }
                                },
                                error:function(){

                                    $('#arrangeBtn').attr('disabled',false);
                                    $('#loading_modal').modal('hide');
                                    reload_table(RosterInfo);
                                }
                            });
                        }


                        function add_arrangement(){


                            $('#department').select2('destroy');
                            $('#sub_department').select2('destroy');
                            $('#designation').select2('destroy');

                            $('.error-block').empty();
                            save_method='add';
                            $('#roster_form')[0].reset();

                            //call department type function
                            get_master();

                            $('#department').select2();
                            $('#sub_department').select2();
                            $('#designation').select2();

                            $('#roster_modal_title').html('Add New Roster Arrangement');
                            $('#roster_modal').modal({backdrop: 'static', keyboard: false});

                        }

                        function get_sub_departments(id){

                            $.ajax({

                                url: "<?php echo base_url('roster/roster_con/get_sub_department'); ?>/"+id,
                                type: "POST",
                                dataType: "JSON",
                                data:{
                                    "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
                                },
                                success:function(data){

                                    $('#sub_department').html('<option value=" ">--Select Department--</option>');
                                    for(var i=0;i<data.sub_department.length;i++){
                                        $('#sub_department').append('<option value="'+data.sub_department[i].id+'">'+data.sub_department[i].code+' - '+data.sub_department[i].desc+'</option>');
                                    }
                                },
                                error: function (jqXHR, textStatus, errorThrown) {

                                    console.log(jqXHR);
                                    console.log(textStatus);
                                    console.log(errorThrown);
                                }
                            });
                        }

                        function get_master(){

                            $.ajax({

                                url: "<?php echo base_url('roster/roster_con/get_master'); ?>",
                                type: "POST",
                                dataType: "JSON",
                                data:{
                                    "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
                                },
                                success:function(data){

                                    $('#department').html('<option value=" ">--Select Department--</option>');
                                    for(var i=0;i<data.department.length;i++){
                                        $('#department').append('<option value="'+data.department[i].id+'">'+data.department[i].code+' - '+data.department[i].desc+'</option>');
                                    }

                                    $('#designation').html('<option value=" ">--Select Designation--</option>');
                                    for(var i=0;i<data.department.length;i++){
                                        $('#designation').append('<option value="'+data.designation[i].id+'">'+data.designation[i].code+' - '+data.designation[i].desc+'</option>');
                                    }

                                    $('#roster_allocation').html('<option value=" ">--Select Roster--</option>');
                                    for(var i=0;i<data.roster.length;i++){
                                        $('#roster_allocation').append('<option value="'+data.roster[i].id+'">'+data.roster[i].name+' - '+data.roster[i].description+'</option>');
                                    }

                                },
                                error: function (jqXHR, textStatus, errorThrown) {

                                    console.log(jqXHR);
                                    console.log(textStatus);
                                    console.log(errorThrown);
                                }
                            });
                        }

                        //get sub departments according to the selected department
                        $('#department').change(function(){

                            get_sub_departments($(this).val());

                        });

                    </script>

                    <script>

                        function view_roster(id){

                            $.ajax({

                                url: "<?php echo base_url('roster/roster_con/view_roster'); ?>/"+id,
                                type: "POST",
                                dataType: "JSON",
                                data:{
                                    '<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>'
                                },
                                success:function(data){

                                    var html='';

                                    html +='</td>'+
                                        '</tr>' +
                                        '<tr>' +
                                        '<td><label>NAME</label></td>' +
                                        '<td>'+(data.roster[0].cls_name ? data.roster[0].cls_name:"No Name")+'</td>'+
                                        '</tr>' +
                                        '<tr>' +
                                        '<td><label>BATCH</label></td>'+
                                        '<td>'+(data.roster[0].department_name ? data.roster[0].department_name:"No Department")+'</td>'+
                                        '</tr>' +
                                        '<tr>' +
                                        '<td valign="top"><label>HALL</label></td>' +
                                        '<td>' +(data.roster[0].designation_name ? data.roster[0].designation_name:"No Hall")+'</td>' +
                                        '</tr>' +
                                        '<tr>' +
                                        '<td valign="top"><label>CLASS</label></td>' +
                                        '<td>' +(data.roster[0].roster_name ? data.roster[0].roster_name:"No Roster")+'</td>' +
                                        '</tr>' +
                                        '<tr>' +
                                        '<td><label>SEAT CAPACITY</label></td>' +
                                        '<td>' +(data.roster[0].actual_capacity ? data.roster[0].actual_capacity:"No Seat Capacity")+'</td>' +
                                        '</tr>' +
                                        '<tr>' +
                                        '<td valign="top"><label>CREATED AT</label></td>' +
                                        ' <td>' +(data.roster[0].created_at ? data.roster[0].created_at:"No Date")+'</td>' +
                                        '</tr>' +
                                        '<tr>' +
                                        '<td valign="top"><label>UPDATED AT</label></td>' +
                                        ' <td>' +(data.roster[0].updated_at ? data.roster[0].updated_at:"No Date")+'</td>' +
                                        '</tr>' +
                                        '<tr>' +
                                        '<td valign="top"><label>USER</label></td>' +
                                        ' <td>' +(data.roster[0].first_name ? data.roster[0].first_name:"No User")+'</td>' +
                                        '</tr>' +
                                        '</tbody>';

                                    $('#view_roster').html(html);

                                    $('#view_modal .modal-title').text("View Roster Arrangement Info "+data.roster[0].roster_name);
                                    $('#view_modal').modal({backdrop:'static',keyboard:false});

                                },
                                error: function(jqXHR, textStatus, errorThrown){

                                    console.log(jqXHR);
                                    console.log(textStatus);
                                    console.log(errorThrown);
                                }

                            });
                        }


                        function delete_roster(id){

                            bootbox.confirm({
                                title: "<h6>Delete Arrangement</h6>",
                                message: "" +
                                "<b>Do you want delete this arrangement ?</b>",
                                buttons: {
                                    cancel: {
                                        label: '<i class="fa fa-times"></i> Cancel'
                                    },
                                    confirm: {
                                        label: '<i class="fa fa-check"></i> Confirm'
                                    }
                                },
                                callback: function (result){

                                    if(result == true){

                                        $.ajax({

                                            url: "<?php echo base_url('roster/roster_con/delete_roster'); ?>/"+id,
                                            type: "POST",
                                            dataType: "JSON",
                                            data:{
                                                '<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>'
                                            },
                                            success:function(data){

                                                reload_table(RosterInfo);

                                                if(data.status == true){
                                                    bootbox.alert('<b>'+data.message+'</b>');
                                                }
                                                else{
                                                    bootbox.alert('<b style="color: red">'+data.message+'</b>');
                                                }

                                            },
                                            error: function(jqXHR, textStatus, errorThrown){
                                                bootbox.alert('<b style="color: red">'+data.message+'</b>');
                                            }

                                        });
                                    }
                                }
                            });
                        }

                        function add_allocation(){

                            $("#roster_allocation").select2('destroy');

                            $('.error-block').empty();
                            save_method='add';
                            $('#allocation_form')[0].reset();

                            get_master();

                            $("#roster_allocation").select2();

                            $('#allocation_modal_title').html('New Roster Allocation');
                            $('#allocation_modal').modal({backdrop: 'static', keyboard: false});

                        }

                        function allocation_save(){

                            $('#loader_1').show();

                            $.ajax({

                                url:"<?php echo base_url('roster/roster_con/allocation_save'); ?>",
                                dataType:"JSON",
                                type:"POST",
                                data:$('#allocation_form').serialize()+"&<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>",
                                success:function(data){

                                    $('#loader_1').css('display','none');
                                    reload_table(RosterInfo);
                                    $('#allocation_modal').modal('hide');

                                    if(data.status == true){

                                        bootbox.alert({
                                            message: "<b style='text-align:center'>"+data.message+"</b>"
                                        });

                                    }
                                    else{

                                        bootbox.alert({
                                            message: "<b style='text-align:center;color: red'>"+data.message+"</b>"
                                        });
                                    }
                                },
                                error:function(){
                                    reload_table(RosterInfo);
                                    bootbox.alert({
                                        message: "<b style='text-align:center;color: red'>"+data.message+"</b>"
                                    });
                                }

                            });

                        }


                        function reset_save(){

                            $('#loader_1').show();

                            $.ajax({

                                url:"<?php echo base_url('roster/roster_con/reset_save'); ?>",
                                dataType:"JSON",
                                type:"POST",
                                data:$('#reset_form').serialize()+"&<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>",
                                success:function(data){

                                    $('#loader_1').css('display','none');

                                    if(data.status == true){

                                        reload_table(RosterInfo);
                                        $('#reset_modal').modal('hide');
                                        bootbox.alert({
                                            message: "<b style='text-align:center'>"+data.message+"</b>"
                                        });

                                    }
                                    else{

                                        reload_table(RosterInfo);
                                        bootbox.alert({
                                            message: "<b style='text-align:center;color: red'>"+data.message+"</b>"
                                        });

                                    }
                                },
                                error:function(){
                                    reload_table(RosterInfo);
                                }
                            });

                        }


                        function reset_allocation(){

                            $('#reset_roster').select2('destroy');

                            $('.error-block').empty();
                            save_method='add';
                            $('#reset_form')[0].reset();

                            //call department type function
                            get_master();

                            $.ajax({
                                url:"<?php echo base_url(); ?>roster/roster_con/get_rosters",
                                type:"POST",
                                dataType:"JSON",
                                data:{
                                    "<?php echo $this->security->get_csrf_token_name(); ?>":"<?php echo $this->security->get_csrf_hash(); ?>"
                                },
                                success:function(data){

                                    if(data.roster){

                                        $('#reset_roster').html('<option value="">--Select Roster--</option>');
                                        for(var i=0;i<data.roster.length;i++){
                                            $('#reset_roster').append('<option value="'+data.roster[i].id+'">'+data.roster[i].name+' - '+data.roster[i].description+'</option>');
                                        }

                                    }

                                    $('#reset_roster').select2();

                                },
                                error:function(){

                                }
                            });

                            $('#reset_modal_title').html('Reset Allocation');
                            $('#reset_modal').modal({backdrop: 'static', keyboard: false});
                        }

                    </script>

                    <script>

                        $('#day').on('keyup',function(){
                            if($(this).val() > 100 || $(this).val() < 0){
                                $('#day').val("");
                                $('#night').val("");
                            }
                            else{
                                $('#night').val(100 - $(this).val());
                            }
                        });

                        $('#night').on('keyup',function(){

                            if($(this).val() > 100 || $(this).val() < 0){
                                $('#day').val("");
                                $('#night').val("");
                            }
                            else{
                                $('#day').val(100 - $(this).val());
                            }

                        });

                        $('#A').on('keyup',function(){
                            if($(this).val() > 100 || $(this).val() < 0){
                                $('#A').val("");
                                $('#B').val("");
                            }
                            else{
                                $('#B').val(100 - $(this).val());
                            }
                        });

                        $('#B').on('keyup',function(){
                            if($(this).val() > 100 || $(this).val() < 0){
                                $('#B').val("");
                                $('#A').val("");
                            }
                            else{
                                $('#A').val(100 - $(this).val());
                            }
                        });

                        $('#C').on('keyup',function(){
                            if($(this).val() > 100 || $(this).val() < 0){
                                $('#C').val("");
                                $('#D').val("");
                            }
                            else{
                                $('#D').val(100 - $(this).val());
                            }
                        });

                        $('#D').on('keyup',function(){

                            if($(this).val() > 100 || $(this).val() < 0){
                                $('#D').val("");
                                $('#C').val("");
                            }
                            else{
                                $('#C').val(100 - $(this).val());
                            }

                        });

                        function edit_roster(id){

                            save_method="update";

                            $('#department').select2('destroy');
                            $('#designation').select2('destroy');

                            get_master();

                            $.ajax({
                                url:"<?php echo base_url(); ?>roster/roster_con/edit_roster/"+id,
                                type:"POST",
                                dataType:"JSON",
                                data:{
                                    "<?php echo $this->security->get_csrf_token_name(); ?>":"<?php echo $this->security->get_csrf_hash(); ?>"
                                },
                                success:function(data){

                                    $('[name="arrangement_id"]').val(id);
                                    $('[name="name"]').val(data.roster.name);
                                    $('[name="description"]').val(data.roster.description);
                                    $('[name="department"]').val(data.roster.department);
                                    $('[name="designation"]').val(data.roster.designation);
                                    $('[name="month"]').val(data.roster.month);

                                    $('[name="day"]').val(data.roster.day);
                                    $('[name="night"]').val(data.roster.night);

                                    $('[name="A"]').val(data.roster.A);
                                    $('[name="B"]').val(data.roster.B);
                                    $('[name="C"]').val(data.roster.C);
                                    $('[name="D"]').val(data.roster.D);

                                    $('#department').attr('disabled',true);
                                    $('#designation').attr('disabled',true);

                                    $('#department').select2();
                                    $('#designation').select2();

                                    $('#month').attr('disabled',true);

                                    $('#roster_modal').modal({backdrop:'static',keyboard:false});

                                },
                                error:function(){
                                    console.log("error");
                                }
                            });
                        }

                        function add_day_offs(id){

                            $.ajax({
                                url:"<?php echo base_url(); ?>roster/roster_con/add_day_offs/"+id,
                                type:"POST",
                                dataType:"JSON",
                                data:{
                                    "<?php echo $this->security->get_csrf_token_name(); ?>":"<?php echo $this->security->get_csrf_hash(); ?>"
                                },
                                success:function(data){

                                    $('[name="view_off_ref_id"]').val(id);
                                    $('#view_off_roster').html(data.arrangements.name);
                                    $('#view_off_description').html(data.arrangements.description);
                                    $('#view_off_month').html(data.arrangements.month);
                                    $('#view_off_department').html(data.arrangements.department_name);
                                    $('#view_off_sub_department').html(data.arrangements.sub_department_name);
                                    $('#view_off_designation').html(data.arrangements.designation_name);

                                    $('#add_day_off_modal').modal({backdrop:'static',keyboard:false});

                                    var html='';
                                    var day='';

                                    html +='<tr>';
                                    for(i=1;i<=data.count_days;i++){
                                        html +='<th style="text-align: center;">'+i+'</th>';
                                    }
                                    html +='</tr><tr>';
                                    for(i=1;i<=data.count_days;i++){
                                        html +='<th style="text-align: center;">'+data.days[i]+'</th>';
                                    }
                                    html +='</tr><tr>';
                                    for(i=1;i<=data.count_days;i++){
                                        day='D'+i;
                                        html +='<td style="text-align: center;">' +
                                            '<input name="'+day+'" style="width: 50px !important;" type="text" class="form-control numeric all-day-offs" value="'+data.day_value[i]+'">'+
                                            '</td>';
                                    }
                                    html +='</tr>';

                                    $('#day_off_thead').html(html);

                                },
                                error:function(){
                                    console.log("error");
                                }
                            });

                        }

                        $('#all_day_offs').on('keyup',function(){
                            $(".all-day-offs").val($(this).val());
                        });


                        function update_day_offs(){

                            $.ajax({

                                url:"<?php echo base_url('roster/roster_con/update_day_offs'); ?>",
                                dataType:"JSON",
                                type:"POST",
                                data:$('#day_offs_form').serialize()+"&<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>",
                                success:function(data){

                                    reload_table(RosterInfo);

                                    $('#add_day_off_modal').modal('hide');
                                    bootbox.alert({
                                        message: "<b style='text-align:center;'>"+data.message+"</b>"
                                    });
                                },
                                error:function(){
                                    reload_table(RosterInfo);
                                }
                            });
                        }


                        function get_rosters(){

                            $('#search_roster').select2('destroy');

                            $('.error-block').empty();

                            $('#search_form')[0].reset();

                            //call department type function
                            $.ajax({
                                url:"<?php echo base_url(); ?>roster/roster_con/get_rosters",
                                type:"POST",
                                dataType:"JSON",
                                data:{
                                    "<?php echo $this->security->get_csrf_token_name(); ?>":"<?php echo $this->security->get_csrf_hash(); ?>"
                                },
                                success:function(data){

                                    if(data.roster){

                                        $('#search_roster').html('<option value="">--Select Roster--</option>');
                                        for(var i=0;i<data.roster.length;i++){
                                            $('#search_roster').append('<option value="'+data.roster[i].id+'">'+data.roster[i].name+' - '+data.roster[i].description+'</option>');
                                        }

                                    }

                                    $('#search_roster').select2();

                                },
                                error:function(){

                                }
                            });

                        }

                        $('#search_roster').change(function(){

                            $.ajax({

                                url:"<?php echo base_url(); ?>roster/roster_con/get_roster_employees/"+$(this).val(),
                                type:"POST",
                                dataType:"JSON",
                                data:{
                                    "<?php echo $this->security->get_csrf_token_name(); ?>":"<?php echo $this->security->get_csrf_hash(); ?>"
                                },
                                success:function(data){

                                    if(data.emp_roster){

                                        $('#search_employee').html('<option value="">--Select Employee--</option>');
                                        for(var i=0;i<data.emp_roster.length;i++){
                                            $('#search_employee').append('<option value="'+data.emp_roster[i].employee+'">'+data.emp_roster[i].employee_id+' - '+data.emp_roster[i].employee_name+'</option>');
                                        }

                                    }
                                },
                                error:function(){

                                }
                            });
                        });

                        function filter_roster(){


                            $.ajax({

                                url:"<?php echo base_url(); ?>roster/roster_con/get_absent_summary",
                                dataType:"HTML",
                                type:"POST",
                                data:$('#search_form').serialize()+"&<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>",
                                success:function(data){

                                    $('#load_table').html(data);
                                },
                                error:function(){

                                    bootbox.alert({
                                        message: "<b style='text-align:center;color: red'>"+data.message+"</b>"
                                    });

                                }
                            });

                        }
                    </script>
