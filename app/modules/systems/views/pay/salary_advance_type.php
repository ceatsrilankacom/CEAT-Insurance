<style>
    #datatable1 tbody td {
        padding: 2px 5px;
    }
    #datatable1 .btn {
        margin-left: 0;
        margin-right: 5px;
        padding: 2px 5px;
    }
    .dataTables_filter{
        text-align: right;
        margin-top: 5px;
    }

    .input-medium {
        width: 200px !important;
    }
    .error-block{
        color:red;
        font-size: 9px;
        text-transform: capitalize;
    }
    #dyTable tbody{
         counter-reset: rowNumber;
    }
    #dyTable tbody tr {
        counter-increment: rowNumber;
    }
    #dyTable tbody tr td:first-child::before {
        content: counter(rowNumber);
    }
    label {
        width: 220px;}
    .modal-open .select2-container--open { z-index: 99999999999 !important; width:100% !important; }
</style>
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"></h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Salary Advance Types</li>
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
                <h4 class="page-head-title card-title  text-white" style="display: inline-block"> Salary Advance Types</h4>

                <button type="button" class="btn btn-success pull-right" onclick='add_new_type();' style="margin-right: 10px"><i class="fa fa-plus-circle"></i> Add Salary Advance Type</button>
            </div>
            <div class="element-box">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">

                    <li class="nav-item"><a class="nav-link active" role="tab" href="#all_types" data-toggle="tab">Salary Advance Types</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content tabcontent-border">

                    <div class="tab-pane p-20 active" role="tabpanel" id="all_types">
                        <table id="salary_advance_types_datatable" class="table" cellspacing="0" width="100%">
                            <thead style="background-color: #912fa6;color: white;">
                            <tr>
                                <th>#</th>
                                <th>Code</th>
                                <th>Name</th>
                                <th style="max-width:200px;">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Bootstrap modal -->
<div class="modal fade" id="salary_advance_modal" role="dialog">
    <div class="modal-dialog modal-full" style="max-width: 500px">
        <div class="modal-content">
            <div class="modal-header bg-blue-steel bg-font-blue-steel">
                <h4 class="modal-title bold uppercase" style="height:10px"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body form">
                <form action="#" id="salary_advance" class="form-horizontal">
                    <input type="hidden" id="advance_id" name="advance_id"/>
                    <div class="form-body" style="padding: 0px 10px;">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label" >Employee</label>
                                    <select id="employee" name="employee" class="form-control select2" required="required">
                                        <option value="">--</option>
                                        <?php foreach ($employees as $employee) { ?>
                                            <option value="<?php echo $employee->id; ?>"><?php echo $employee->employee_id . " - " . $employee->first_name. " " . $employee->last_name; ?></option>
                                        <?php } ?>
                                    </select>
                                        <span class="error-block"></span>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" >Type</label>
                                    <select id="adv_type" name="adv_type" class="form-control select2" required="required">
                                        <option value="">--</option>
                                        <?php foreach ($AdvanceTypes as $type) { ?>
                                            <option value="<?php echo $type->id; ?>"><?php echo $type->code . " - " . $employees->name; ?></option>
                                        <?php } ?>
                                    </select>
                                        <span class="error-block"></span>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" >Month</label>
                                        <input type="text" name="month" id="month" class="form-control month-pick">
                                        <span class="error-block"></span>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" >Amount</label>
                                        <input type="text" name="amount" id="amount" class="form-control ">
                                        <span class="error-block"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap modal -->
<div class="modal fade" id="salary_advance_type_modal" role="dialog">
    <div class="modal-dialog modal-full" style="max-width: 500px">
        <div class="modal-content">
            <div class="modal-header bg-blue-steel bg-font-blue-steel">
                <h4 class="modal-title bold uppercase" style="height:10px"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body form">
                <form action="#" id="salary_advance_type" class="form-horizontal">
                    <input type="hidden" id="advance_type_id" name="advance_type_id"/>
                    <input type="hidden" id="f_id" name="f_id"/>
                    <div class="form-body" style="padding: 0px 10px;">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label" >Code</label>
                                        <input type="text" name="code" id="code" class="form-control ">
                                        <span class="error-block"></span>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" >Name</label>
                                        <input type="text" name="name" id="name" class="form-control ">
                                        <span class="error-block"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSaveType" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>



<script type="text/javascript">

var save_method;
var salary_advance_datatable;
var counter = 1;

$(document).ready(function() {

    salary_advance_datatable = $('#salary_advance_datatable').DataTable({
        "processing": true,
        "serverSide": true,

        "ajax": {
            "data": {
                "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
            },
            "url": "<?php echo base_url()?>systems/salary_settings_con/get_salary_advance_data",
            "type": "POST"
        },

        "columnDefs": [
            {
                "targets": [ -1 ],
                "orderable": false
            }
        ],

        "language": {
            "aria": {
                "sortAscending": ": activate to sort column ascending",
                "sortDescending": ": activate to sort column descending"
            },
            "catetyTable": "No data available in table",
            "info": "Showing _START_ to _END_ of _TOTAL_ entries",
            "infocatety": "No entries found",
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
            [5, 10, 15, 20, "All"]
        ],

        "pageLength": 20,
        "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>" // horizobtal scrollable datatable
    });


    $("#btnSave").off('click');
    $("#btnSave").on('click', function(e){
        e.preventDefault();
        save_advance(save_method);
    });

    $("#salary_advance :input").change(function(){
        $(this).siblings("span.error-block").html("").hide();
        //$(this).removeClass('error_input_lumi');
        //$(this).addClass('good_input_lumi');
        $("span.help-inline").hide();
    });

    $('#salary_advance_modal').on('hidden.bs.modal', function() {
        $("#salary_advance :input").siblings("span.error-block").html("").hide();
        $("span.help-inline").hide();
    });

});


function reload_table(table)
{
    if(typeof table !== "undefined")
    {
        table.ajax.reload(null,false);
    }
}


//Advance
function add_new()
{
    $('#salary_advance')[0].reset();
    save_method = 'add';
    $('#salary_advance_modal').modal({backdrop: 'static', keyboard: false});
    $('#salary_advance_modal .modal-title').text('Add Salary Advance');
}


function save_advance(save_method)
{
    var url = "<?php echo site_url('systems/salary_settings_con/save_advance')?>/" + save_method;
    $.ajax({
        url: url,
        type: "POST",
        data: $('#salary_advance').serialize() + "&<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>",
        dataType: "JSON",
        success: function (data) {
            if (data.status) {
                $('#salary_advance_modal').modal('hide');
                reload_table(salary_advance_datatable);
            }
            else {
                if (data.message) {
                    bootbox.alert(data.message);
                }
                if(data.error)
                {
                    for (var l = 0; l < data.inputerror.length; l++)
                    {
                        $('[name="'+data.inputerror[l]+'"]').siblings("span.error-block").html(data.error_string[l]).show();
                    }
                }
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);
        }
    });
}

function edit_advance(id)
{
    $('#salary_advance')[0].reset();
    save_method = 'edit';
    $('.help-block').empty();
    $("#advance_id").val(id);
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('systems/salary_settings_con/edit_get_advance_data/')?>/" + id,
        type: "GET",
        "data": {
            "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
        },
        dataType: "JSON",
        success: function(data)
        {
            $('#employee').val(data[0].employee);
            $('#adv_type').val(data[0].adv_type);
            $('#month').val(data[0].month);
            $('#amount').val(data[0].amount);

            $('#salary_advance_modal').modal({backdrop: 'static', keyboard: false});
            $('#salary_advance_modal .modal-title').text('Edit Advance : #' + data[0].id);
        },
        error: function ()
        {
            console.log('Error get Advance data');
        }
    });

}

function delete_advance(id)
{
    bootbox.dialog({
        message: "Are you sure, that you want to delete this Advance record?",
        title: "Alert!",
        buttons: {
            ok: {
                label: "Yes",
                className: "btn-primary",
                callback: function () {
                    $.ajax({
                        url : "<?php echo base_url()?>systems/salary_settings_con/delete_advance",
                        type: "POST",
                        data: {
                            "advance_id": id,
                            "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
                        },
                        dataType: "JSON",
                        success: function(data)
                        {
                            reload_table(salary_advance_datatable);
                            bootbox.alert(data.message);
                            //data.status ? console.log("Delete successful!") : console.log("Delete failed!");
                        },
                        error: function (jqXHR, textStatus, errorThrown)
                        {
                            console.log(jqXHR);
                            console.log(textStatus);
                            console.log(errorThrown);
                            console.log('Error while Delete Advance record');
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


//ADV TYPEs
var salary_advance_types_datatable;

$(document).ready(function() {

    salary_advance_types_datatable = $('#salary_advance_types_datatable').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "data": {
                "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
            },
            "url": "<?php echo base_url()?>systems/salary_settings_con/get_salary_advance_types_data",
            "type": "POST"
        },

        "columnDefs": [
            {
                "targets": [ -1 ],
                "orderable": false
            }
        ],

        "language": {
            "aria": {
                "sortAscending": ": activate to sort column ascending",
                "sortDescending": ": activate to sort column descending"
            },
            "catetyTable": "No data available in table",
            "info": "Showing _START_ to _END_ of _TOTAL_ entries",
            "infocatety": "No entries found",
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
            [5, 10, 15, 20, "All"]
        ],

        "pageLength": 20,
        "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>" // horizobtal scrollable datatable
    });


    $("#btnSaveType").off('click');
    $("#btnSaveType").on('click', function(e){
        e.preventDefault();
        save_advance_type(save_method);
    });

    $("#salary_advance_type :input").change(function(){
        $(this).siblings("span.error-block").html("").hide();
        //$(this).removeClass('error_input_lumi');
        //$(this).addClass('good_input_lumi');
        $("span.help-inline").hide();
    });

    $('#salary_advance_type_modal').on('hidden.bs.modal', function() {
        $("#salary_advance_type :input").siblings("span.error-block").html("").hide();
        $("span.help-inline").hide();
    });

});

function add_new_type()
{
    $('#salary_advance_type')[0].reset();
    save_method = 'add_type';
    $('#salary_advance_type_modal').modal({backdrop: 'static', keyboard: false});
    $('#salary_advance_type_modal .modal-title').text('Add Salary Advance');
}


function save_advance_type(save_method)
{
    var url = "<?php echo site_url('systems/salary_settings_con/save_advance_type')?>/" + save_method;
    $.ajax({
        url: url,
        type: "POST",
        data: $('#salary_advance_type').serialize() + "&<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>",
        dataType: "JSON",
        success: function (data) {
            if (data.status) {
                $('#salary_advance_type_modal').modal('hide');
                reload_table(salary_advance_types_datatable);
            }
            else {
                if (data.message) {
                    bootbox.alert(data.message);
                }
                if(data.error)
                {
                    for (var l = 0; l < data.inputerror.length; l++)
                    {
                        $('[name="'+data.inputerror[l]+'"]').siblings("span.error-block").html(data.error_string[l]).show();
                    }
                }
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);
        }
    });
}

function edit_advance_type(id)
{
    $('#salary_advance_type')[0].reset();
    save_method = 'edit_type';
    $('.help-block').empty();
    $("#advance_type_id").val(id);
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('systems/salary_settings_con/get_advance_type_data/')?>/" + id,
        type: "GET",
        "data": {
            "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
        },
        dataType: "JSON",
        success: function(data)
        {
            $('#code').val(data[0].code);
            $('#name').val(data[0].name);
            $('#f_id').val(data[0].f_id);

            $('#salary_advance_type_modal').modal({backdrop: 'static', keyboard: false});
            $('#salary_advance_type_modal .modal-title').text('Edit Advance Type : ' + data[0].name);
        },
        error: function ()
        {
            console.log('Error get Advance Type data');
        }
    });

}
</script>

