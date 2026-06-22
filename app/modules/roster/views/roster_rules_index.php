<?php
/**
 * Created by Earrow.
 * User:Kasun De Mel
 * Email:kasun@earrow.net
 * Date: 10/18/2019
 * Time: 3:26 PM
 */
?>

<?php
/**
 * Created by Earrow.
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

    #rosterInfo_filter{
        display: none;
    }
</style>

<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"></h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:;">Roster</a></li>
                <li class="breadcrumb-item active">Roster Rules</li>
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
                <h4 class="page-head-title card-title  text-white" style="display: inline-block"> Roster Rules</h4>
                <button type="button" onclick="reset_allocation()" class="btn btn-success pull-right" style="margin-left: 5px;"><i class="fa fa-refresh"></i> Reset Allocation</button>&nbsp;
                <button type="button" onclick="add_allocation()" class="btn btn-success pull-right"><i class="fa fa-plus"></i> New Allocation</button>&nbsp;
                <button type="button" onclick="add_arrangement()" class="btn btn-success pull-right" style="margin-right: -10px;"><i class="fa fa-plus"></i> New Roster</button>&nbsp;
            </div>
            <div class="element-box">

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item"><a class="nav-link active" role="tab" href="#arrangement" data-toggle="tab"> Roster Arrangement</a></li>
                    <li class="nav-item"><a class="nav-link" role="tab" href="#allocation" data-toggle="tab"> Roster Allocation</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content tabcontent-border">
                    <div class="tab-pane p-20 active" role="tabpanel" id="arrangement">
                        <table class="table table-striped table-bordered table-hover table-header-fixed dt-responsive" id="rosterInfo" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th class="all" style="width: 30px">#</th>
                                <th class="all">Name</th>
                                <th class="all">Description</th>
                                <th class="all">Department</th>
                                <th class="all">Designation</th>
                                <th class="all">Month</th>
                                <th class="all">Created Date</th>
                                <th class="all">Updated Date</th>
                                <th class="all">User</th>
                                <th class="all text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane p-20" role="tabpanel" id="allocation">
                        <button type="button" onclick="add_student()" class="btn btn-success pull-right" style="margin-right: -10px;"><i class="fa fa-plus"></i> New Student</button>
                        <table class="table table-striped table-bordered table-hover table-header-fixed dt-responsive" id="allocationInfo" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th class="all" style="width: 30px">#</th>
                                <th class="all">Department</th>
                                <th class="all">Roster</th>
                                <th class="all">Roster Name</th>
                                <th class="all">Student</th>
                                <th class="all">Created Date</th>
                                <th class="all text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
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
                                                    <label class="control-label col-md-4" for="roster" style='text-align: right;color:black;'><b>Month :</b></label>
                                                    <div class="col-md-6">
                                                        <input type="text" id="month" name="month" class="form-control month form-control-inline input-medium date-pick" size="16" data-date-format="yyyy-mm">
                                                        <span class="error-block"></span>
                                                    </div>
                                                </div>
                                                <h5 class="form-title" style="display: block; background: #838c94;color: #fff; padding: 3px 5px;">Roster Rules</h5>
                                                <div class="row">
                                                    <div class="col-md-4">&nbsp;</div>
                                                    <div class="col-md-3">
                                                        <label class="control-label" for="roster" style='color:black;text-align: center'><b>Day</b></label><input type="text" id="day" name="day" class="form-control numeric">
                                                        <span class="error-block"></span>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="control-label" for="roster" style='color:black;text-align: center'><b>Night</b></label><input type="text" id="night" name="night" class="form-control numeric">
                                                        <span class="error-block"></span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">&nbsp;</div>
                                                    <div class="col-md-1">
                                                        <label class="control-label" for="A" style='color:black;'><b style="margin-left: 25px">A</b><input style="width: 60px" type="text" id="A" name="A" class="form-control numeric">
                                                            <span class="error-block"></span>
                                                    </div>
                                                    &nbsp;
                                                    <div class="col-md-1">
                                                        <label class="control-label" for="B" style='color:black;'><b style="margin-left: 25px">B</b>&nbsp;<input style="width: 60px" type="text" id="B" name="B" class="form-control numeric">
                                                            <span class="error-block"></span>
                                                    </div>
                                                    &nbsp;
                                                    <div class="col-md-1">&nbsp;</div>
                                                    <div class="col-md-1">
                                                        <label class="control-label" for="C" style='color:black;'><b style="margin-left: 25px">C</b><input style="width: 60px" type="text" id="C" name="C" class="form-control numeric">
                                                            <span class="error-block"></span>
                                                    </div>
                                                    &nbsp;
                                                    <div class="col-md-1">
                                                        <label class="control-label" for="D" style='color:black;'><b style="margin-left: 25px">D</b>&nbsp;<input style="width: 60px" type="text" id="D" name="D" class="form-control numeric">
                                                            <span class="error-block"></span>
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

                    <!-- Bootstrap modal -->
                    <div class="modal fade" id="student_modal" role="dialog">
                        <div class="modal-dialog modal-full" style="max-width: 700px">
                            <div class="modal-content">
                                <div class="modal-header bg-blue-steel bg-font-blue-steel">
                                    <h6 id="student_modal_title"></h6>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body form">
                                    <form action="#" id="student_form" class="form-horizontal">
                                        <div class="form-body">
                                            <div class="">
                                                <div class="row">
                                                    <label class="control-label col-md-4" for="roster_type" style='text-align: right;color:black;'><b>Department :</b></label>
                                                    <div class="col-md-6">
                                                        <select name="std_department" id="std_department" class="form-control select2">
                                                            <option></option>
                                                        </select>
                                                        <span class="error-block"></span>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <label class="control-label col-md-4" for="designation" style='text-align: right;color:black;'><b>Student :</b></label>
                                                    <div class="col-md-6">
                                                        <select name="student" id="student" class="form-control select2">
                                                            <option></option>
                                                        </select>
                                                        <span class="error-block"></span>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <label class="control-label col-md-4" for="std_roster" style='text-align: right;color:black;'><b>Roster :</b></label>
                                                    <div class="col-md-6">
                                                        <select name="std_roster" id="std_roster" class="form-control select2">
                                                            <option></option>
                                                        </select>
                                                        <span class="error-block"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" id="studentBtn" onclick="save_student()" class="btn btn-primary">Save</button>
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
                                                <input type="hidden" name="allocation_id" id="allocation_id">
                                                <br>
                                                <div class="row">
                                                    <label class="control-label col-md-4" for="allocation_department" style='text-align: right;color:black;'><b>Department :</b></label>
                                                    <div class="col-md-6">
                                                        <select name="allocation_department" id="allocation_department" class="form-control select2">
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
                                                    <label class="control-label col-md-4" for="reset_department" style='text-align: right;color:black;'><b>Department :</b></label>
                                                    <div class="col-md-6">
                                                        <select name="reset_department" id="reset_department" class="form-control select2">
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

                    <script type="text/javascript">

                        var save_method;
                        var rosterInfo;
                        var allocationInfo;

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

                            rosterInfo = $('#rosterInfo').DataTable({

                                "processing": true, //Feature control the processing indicator.
                                "serverSide": true, //Feature control DataTables' server-side processing mode.
                                // Load data for the table's content from an Ajax source
                                "ajax": {
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
                                    null,
                                    { "bSortable": false,"bSearchable": false }
                                ],
                                rowCallback: function(row, data, index){

                                    if(data[6] == 0){
                                        $(row).find('td:eq(6)').html('<span style="background-color: red;color: white;border-radius: 5px">&nbsp;&nbsp;NO SEATS&nbsp;&nbsp;</span>');
                                    }
                                    if(data[6] == 1){
                                        $(row).find('td:eq(6)').html('<span style="background-color: #11CAFF;color: white;border-radius: 5px">&nbsp;&nbsp;ONE SEAT&nbsp;&nbsp;</span>');
                                    }
                                    if(data[6] > 1){
                                        $(row).find('td:eq(6)').html('<span style="background-color: #31CC7D;color: white;border-radius: 5px">&nbsp;&nbsp;'+data[6]+' SEATS&nbsp;&nbsp;</span>');
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

                            rosterInfo.on('order.dt search.dt', function () {
                                rosterInfo.column(0, {search: 'applied', order: 'applied'}).nodes().each(function (cell, i) {
                                    cell.innerHTML = i + 1;
                                });
                            }).draw();

                            yadcf.init(rosterInfo, [{
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

                            $('#loading_modal').modal({backdrop: 'static', keyboard: false});
                            $('#arrangeBtn').attr('disabled',true);

                            var url;
                            if(save_method == 'add'){
                                url="<?php echo base_url('roster/roster_con/save'); ?>";
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

                                        reload_table(rosterInfo);
                                        reload_table(allocationInfo);
                                        $('#roster_modal').modal('hide');
                                        bootbox.alert({
                                            message: "<b style='text-align:center'>"+data.message+"</b>"
                                        });
                                    }
                                    else{

                                        reload_table(rosterInfo);
                                        reload_table(allocationInfo);
                                        bootbox.alert({
                                            message: "<b style='text-align:center;color: red'>"+data.message+"</b>"
                                        });
                                    }
                                },
                                error:function(){

                                    $('#arrangeBtn').attr('disabled',false);
                                    $('#loading_modal').modal('hide');
                                    reload_table(rosterInfo);
                                    reload_table(allocationInfo);

                                }
                            });
                        }


                        function save_student(){

                            $('#studentBtn').attr('disabled',true);

                            var url;
                            if(save_method == 'add'){
                                url="<?php echo base_url('roster/roster_con/save_student'); ?>";
                            }

                            $.ajax({

                                url:url,
                                dataType:"JSON",
                                type:"POST",
                                data:$('#student_form').serialize()+"&<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>",
                                success:function(data){

                                    $('#studentBtn').attr('disabled',false);

                                    if(data.input_error)
                                    {
                                        for (var i = 0; i < data.input_error.length; i++)
                                        {
                                            $('[name="'+data.input_error[i]+'"]').siblings("span.error-block").html(data.error_string[i]).show();
                                        }
                                    }
                                    else if(data.status == true){

                                        reload_table(rosterInfo);
                                        reload_table(allocationInfo);
                                        $('#student_modal').modal('hide');
                                        bootbox.alert({
                                            message: "<b style='text-align:center'>"+data.message+"</b>"
                                        });
                                    }
                                    else{

                                        reload_table(rosterInfo);
                                        reload_table(allocationInfo);
                                        bootbox.alert({
                                            message: "<b style='text-align:center;color: red'>"+data.message+"</b>"
                                        });
                                    }
                                },
                                error:function(){
                                    $('#studentBtn').attr('disabled',false);
                                    reload_table(rosterInfo);
                                    reload_table(allocationInfo);
                                }

                            });

                        }

                        function add_arrangement(){


                            $('#department').select2('destroy');
                            $('#designation').select2('destroy');

                            $('.error-block').empty();
                            save_method='add';
                            $('#roster_form')[0].reset();

                            //call department type function
                            get_master();

                            $('#department').select2();
                            $('#designation').select2();

                            $('#roster_modal_title').html('Add New Roster Arrangement');
                            $('#roster_modal').modal({backdrop: 'static', keyboard: false});

                        }

                        function add_student(){

                            $('#std_department').select2('destroy');
                            $('#std_roster').select2('destroy');

                            $('.error-block').empty();
                            save_method='add';
                            $('#student_form')[0].reset();

                            //call department type function
                            get_master();

                            $('#std_department').select2();
                            $('#std_roster').select2();

                            $('#student_modal_title').html('New Student Arrangement');
                            $('#student_modal').modal({backdrop: 'static', keyboard: false});

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

                                },
                                error: function (jqXHR, textStatus, errorThrown) {
                                    bootbox.alert(textStatus + " : " + errorThrown);
                                    console.log(jqXHR);
                                    console.log(textStatus);
                                    console.log(errorThrown);
                                }

                            });
                        }

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
                                    bootbox.alert(textStatus + " : " + errorThrown);
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
                                callback: function (result) {

                                    if(result == true){

                                        $.ajax({

                                            url: "<?php echo base_url('roster/roster_con/delete_roster'); ?>/"+id,
                                            type: "POST",
                                            dataType: "JSON",
                                            data:{
                                                '<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>'
                                            },
                                            success:function(data){
                                                reload_table(rosterInfo);
                                                if(data.status == true){
                                                    bootbox.alert("Roster Arrangement info deleted successfully !");
                                                }
                                                else{
                                                    bootbox.alert("Roster arrangement is Locked.Please reset selected department allocation & try!");
                                                }
                                            },
                                            error: function(jqXHR, textStatus, errorThrown){
                                                bootbox.alert("Roster Arrangement is Locked");
                                            }

                                        });
                                    }
                                }
                            });
                        }

                        function delete_student(id){

                            bootbox.confirm({
                                title: "<h6>Delete Student Arrangement</h6>",
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
                                callback: function (result) {

                                    if(result == true){

                                        $.ajax({

                                            url: "<?php echo base_url('roster/roster_con/delete_student'); ?>/"+id,
                                            type: "POST",
                                            dataType: "JSON",
                                            data:{
                                                '<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>'
                                            },
                                            success:function(data){
                                                reload_table(rosterInfo);
                                                reload_table(allocationInfo);
                                                if(data.status == true){
                                                    bootbox.alert("Roster Arrangement deleted successfully !");
                                                }
                                                else{
                                                    bootbox.alert("Roster arrangement is Locked.Please reset selected department allocation & try!");
                                                }
                                            },
                                            error: function(jqXHR, textStatus, errorThrown){
                                                bootbox.alert("Roster Arrangement is Locked");
                                            }

                                        });
                                    }
                                }
                            });
                        }


                        function add_allocation(){

                            $('#allocation_department').select2('destroy');

                            $('.error-block').empty();
                            save_method='add';
                            $('#allocation_form')[0].reset();

                            //call department type function
                            get_master();

                            $('#allocation_department').select2();

                            $('#allocation_modal_title').html('Add New Roster Allocation');
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

                                    if(data.status == true){

                                        reload_table(allocationInfo);
                                        reload_table(rosterInfo);
                                        $('#allocation_modal').modal('hide');
                                        bootbox.alert({
                                            message: "<b style='text-align:center'>"+data.message+"</b>"
                                        });

                                    }
                                    else{

                                        reload_table(allocationInfo);
                                        reload_table(rosterInfo);
                                        bootbox.alert({
                                            message: "<b style='text-align:center;color: red'>"+data.message+"</b>"
                                        });
                                    }
                                },
                                error:function(){
                                    reload_table(allocationInfo);
                                    reload_table(rosterInfo);
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

                                        reload_table(allocationInfo);
                                        reload_table(rosterInfo);
                                        $('#reset_modal').modal('hide');
                                        bootbox.alert({
                                            message: "<b style='text-align:center'>"+data.message+"</b>"
                                        });

                                    }
                                    else{

                                        reload_table(allocationInfo);
                                        reload_table(rosterInfo);
                                        bootbox.alert({
                                            message: "<b style='text-align:center;color: red'>"+data.message+"</b>"
                                        });
                                    }
                                },
                                error:function(){
                                    reload_table(allocationInfo);
                                    reload_table(rosterInfo);
                                }

                            });

                        }


                        function reset_allocation(){

                            $('#reset_department').select2('destroy');

                            $('.error-block').empty();
                            save_method='add';
                            $('#reset_form')[0].reset();

                            //call department type function
                            get_master();

                            $('#reset_department').select2();

                            $('#reset_modal_title').html('Reset Allocation');
                            $('#reset_modal').modal({backdrop: 'static', keyboard: false});
                        }


                    </script>

                    <script>

                        $('#day').on('keyup',function(){

                            if($(this).val() > 100 || $(this).val() < 0){
                                $('#day').val(0);
                                $('#night').val(0);
                            }
                            else{
                                $('#night').val(100 - $(this).val());
                            }

                        });

                        $('#night').on('keyup',function(){

                            if($(this).val() > 100 || $(this).val() < 0){
                                $('#day').val(0);
                                $('#night').val(0);
                            }
                            else{
                                $('#day').val(100 - $(this).val());
                            }

                        });


                        $('#A').on('keyup',function(){

                            if($(this).val() > 100 || $(this).val() < 0){
                                $('#A').val(0);
                                $('#B').val(0);
                            }
                            else{
                                $('#B').val(100 - $(this).val());
                            }

                        });

                        $('#B').on('keyup',function(){

                            if($(this).val() > 100 || $(this).val() < 0){
                                $('#B').val(0);
                                $('#A').val(0);
                            }
                            else{
                                $('#A').val(100 - $(this).val());
                            }

                        });

                        $('#C').on('keyup',function(){

                            if($(this).val() > 100 || $(this).val() < 0){
                                $('#C').val(0);
                                $('#D').val(0);
                            }
                            else{
                                $('#D').val(100 - $(this).val());
                            }

                        });

                        $('#D').on('keyup',function(){

                            if($(this).val() > 100 || $(this).val() < 0){
                                $('#D').val(0);
                                $('#C').val(0);
                            }
                            else{
                                $('#C').val(100 - $(this).val());
                            }

                        });

                    </script>

