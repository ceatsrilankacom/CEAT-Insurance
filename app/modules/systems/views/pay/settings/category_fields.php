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
                <li class="breadcrumb-item active">Employee Category Management</li>
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
                <h4 class="page-head-title card-title  text-white" style="display: inline-block"> Employee Category Management</h4>
            </div>
            <div class="element-box">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item"><a class="nav-link active" role="tab" href="#emp_cate" data-toggle="tab">Employee Categories</a></li>
<!--                    <li class="nav-item"><a class="nav-link" role="tab" href="#all_types" data-toggle="tab"> Allowance Types</a></li>-->
                </ul>
                <!-- Tab panes -->
                <div class="tab-content tabcontent-border">
                    <div class="tab-pane p-20 active" role="tabpanel" id="emp_cate">
                        <button type="button" class="btn btn-success pull-right" onclick='add_new_cate();' ><i class="fa fa-plus-circle"></i> Add New Category</button>
                        <table id="emp_cate_datatable" class="table" cellspacing="0" width="100%">
                            <thead style="background-color: #0e7eff;color: white;">
                            <tr>
                                <th>#</th>
                                <th>Code</th>
                                <th>Category</th>
                                <th style="max-width:100px;">OT</th>
                                <th style="max-width:100px;">FP</th>
                                <th style="max-width:100px;">Show Att</th>
                                <th style="max-width:100px;">Attendance Incentive</th>
                                <th style="max-width:100px;">Rate Per Day</th>
                                <th style="max-width:100px;">Exclude From Payroll</th>
                                <th style="width:auto;">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
<!--                    <div class="tab-pane p-20" role="tabpanel" id="all_types">-->
<!--                        <button type="button" class="btn btn-success pull-right" onclick='add_allowance();' ><i class="fa fa-plus-circle"></i> Add New Allowance</button>-->
<!--                        <table id="allowance_datatable" class="table" cellspacing="0" width="100%">-->
<!--                            <thead style="background-color: #0e7eff;color: white;">-->
<!--                            <tr>-->
<!--                                <th>#</th>-->
<!--                                <th>Code</th>-->
<!--                                <th>Allowance</th>-->
<!--                                <th style="max-width:100px;">EPF</th>-->
<!--                                <th>Details</th>-->
<!---->
<!--                                <th>Type</th>-->
<!--                                <th style="width:150px;">Action</th>-->
<!--                            </tr>-->
<!--                            </thead>-->
<!--                            <tbody>-->
<!--                            </tbody>-->
<!--                        </table>-->
<!--                    </div>-->
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Bootstrap modal -->
<div class="modal fade" id="cate_form_modal" role="dialog">
    <div class="modal-dialog modal-full" style="max-width: 1000px">
        <div class="modal-content">
            <div class="modal-header bg-blue-steel bg-font-blue-steel">
                <h4 class="modal-title bold uppercase" style="height:10px"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body form">
                <form action="#" id="cate_form" class="form-horizontal">
                    <input type="hidden" id="e_cat_id" name="e_cat_id"/>
                    <div class="form-body" style="padding: 0px 10px;">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label" >Category Code</label>
                                        <input type="text" name="category_code" id="category_code" class="form-control ">
                                        <span class="error-block"></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label" >Category Name</label>
                                        <input type="text" name="category_name" id="category_name" class="form-control ">
                                        <span class="error-block"></span>
                                </div>
                            </div>
                            <div class="col-md-3" >
                                <div class="form-group">
                                    <label class="control-label" >Fingerprint Status</label>
                                        <select name="fingerprint_status" id="fingerprint_status" class="form-control nOselect2">
                                            <option value="YES">YES</option>
                                            <option value="NO">NO</option>
                                        </select>
                                        <span class="error-block"></span>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label" >Attendance Incentive</label>
                                        <select name="attendance_incentive" id="attendance_incentive" class="form-control nOselect2">
                                            <option value="NO">NO</option>
                                            <option value="YES">YES</option>
                                        </select>
                                        <span class="error-block"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label" >OT Applicable</label>
                                    <select name="ot_applicable" id="ot_applicable" class="form-control nOselect2">
                                        <option value="NO">NO</option>
                                        <option value="YES">YES</option>
                                    </select>
                                    <span class="error-block"></span>
                                </div></div>
                            <div class="col-md-3" id="ot_rate_group" style="display: none">
                                <div class="form-group">
                                    <label class="control-label" >OT  Rate</label>
                                    <input type="text" name="ot_rate" id="ot_rate" class="form-control ">
                                    <span class="error-block"></span>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label" >Rate Per Day</label>
                                    <select name="rate_per_day" id="rate_per_day" class="form-control nOselect2">
                                        <option value="NO">NO</option>
                                        <option value="YES">YES</option>
                                    </select>
                                    <span class="error-block"></span>
                                </div>
                            </div>
                            <div class="col-md-3" id="show_att_res" style="display: none">
                                <div class="form-group" >
                                    <label class="control-label" >Show Attendance</label>
                                    <select name="show_att" id="show_att_res_val" class="form-control nOselect2">
                                        <option value="NO">NO</option>
                                        <option value="YES">YES</option>
                                    </select>
                                    <span class="error-block"></span>
                                </div>
                            </div>
                            <div class="col-md-3" id="rate_per_day_group" style="display: none">
                                <div class="form-group">
                                    <label class="control-label" >Rate Per Day Amount</label>
                                    <input type="text" name="rate_per_day_amount" id="rate_per_day_amount" class="form-control ">
                                    <span class="error-block"></span>
                                </div>
                            </div>
                            <div class="col-md-3" id="attendance_only_res" >
                                <div class="form-group" >
                                    <label class="control-label" >Exclude From Payroll</label>
                                    <select name="attendance_only" id="attendance_only" class="form-control nOselect2">
                                        <option value="NO">NO</option>
                                        <option value="YES">YES</option>
                                    </select>
                                    <span class="error-block"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSaveEmpCat" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap modal -->
<div class="modal fade" id="allowance_modal" role="dialog">
    <div class="modal-dialog modal-full" style="max-width: 1000px">
        <div class="modal-content">
            <div class="modal-header bg-blue-steel bg-font-blue-steel">
                <h4 class="modal-title bold uppercase" style="height:10px">Add Allowance</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body form">
                <form action="#" id="allowance_form" class="form-horizontal">
                        <div class="form-body" style="padding: 0px 10px;">
                            <input type="hidden" id="allowance_id" name="allowance_id"/>
                            <input type="hidden" id="f_id" name="f_id"/>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label" >Allowance Code</label>
                                        <input type="text" name="allowance_code" id="allowance_code" class="form-control ">
                                        <span class="error-block"></span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label" >Allowance Name</label>
                                        <input type="text" name="allowance_name" id="allowance_name" class="form-control ">
                                        <span class="error-block"></span>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label" >Allowance Type</label>
                                        <select name="allowance_type" id="allowance_type" class="form-control">
                                            <option value="Employee">Employee</option>
                                            <option value="Category">Category</option>
                                        </select>
                                        <span class="error-block"></span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label" >EPF</label>
                                        <select name="epf" id="epf" class="form-control nOselect2">
                                            <option value="YES">YES</option>
                                            <option value="NO">NO</option>
                                        </select>
                                        <span class="error-block"></span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label" >Details</label>
                                        <input type="text" name="allowance_details" id="allowance_details" class="form-control">
                                        <span class="error-block"></span>
                                    </div>
                                </div>
                                <div class="col-md-3"></div>
                            </div>
                        </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSaveAllowance" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap modal -->
<div class="modal fade" id="allowance_emp_cat_assign_modal" role="dialog">
    <div class="modal-dialog modal-full" style="max-width: 1000px">
        <div class="modal-content">
            <div class="modal-header bg-blue-steel bg-font-blue-steel">
                <h4 class="modal-title bold uppercase" style="height:10px">Add Allowance</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body form">
                <form action="#" id="allowance_emp_cat_assign_form" class="form-horizontal">
                        <div class="form-body" style="padding: 0px 10px;">
                            <a  id="addButton" name="add_row" class="btn btn-success d-none d-lg-block m-l-15 pull-right" style="color: #fff"><i class="fa fa-plus-circle"></i>  Assign Allowance</a>
                            <input type="hidden" id="emp_cat_id_for_allowance" name="emp_cat_id_for_allowance"/>
                            <table id="dyTable" class="table items table-striped table-bordered table-condensed table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 20px;"></th>
                                        <th class="">Allowance</th>
                                        <th class="">Rate</th>
                                        <th>Status ( Active / Inactive )</th>
                                        <th>Employees</th>
                                        <th style="width: 20px;"></th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSaveAllowEmpCat" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
var save_method;
var emp_cate_datatable;
var allow_datatable;
var counter = 1;

$(document).ready(function() {

    emp_cate_datatable = $('#emp_cate_datatable').DataTable({
        "processing": true,
        "serverSide": true,

        "ajax": {
            "data": {
                "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
            },
            "url": "<?php echo base_url()?>systems/payroll_settings/get_emp_cate_data",
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

    allowance_datatable = $('#allowance_datatable').DataTable({
        "processing": true,
        "serverSide": true,

        "ajax": {
            "data": {
                "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
            },
            "url": "<?=base_url()?>systems/payroll_settings/get_allow_data",
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
            "allowancetyTable": "No data available in table",
            "info": "Showing _START_ to _END_ of _TOTAL_ entries",
            "infoallowancety": "No entries found",
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


    $("#btnSaveEmpCat").off('click');
    $("#btnSaveEmpCat").on('click', function(e){
        e.preventDefault();
        save_emp_category(save_method);
    });

    $("#btnSaveAllowance").off('click');
    $("#btnSaveAllowance").on('click', function(e){
        e.preventDefault();
        save_allowance(save_method);
    });

    $("#btnSaveAllowEmpCat").off('click');
    $("#btnSaveAllowEmpCat").on('click', function(e){
        e.preventDefault();
        save_allowance_emp_cat();
    });

    $("#btnSave").off('click');
    $("#btnSave").on('click', function(e){
        e.preventDefault();
        save_allowance_emp_cat_details();
    });

    /*$('#cate_form_modal').on('hidden.bs.modal', function() {
        cate_table.destroy();
    });*/

    $("#cate_form :input").change(function(){
        $(this).siblings("span.error-block").html("").hide();
        //$(this).removeClass('error_input_lumi');
        //$(this).addClass('good_input_lumi');
        $("span.help-inline").hide();
    });

    $('#cate_form_modal').on('hidden.bs.modal', function() {
        $("#cate_form :input").siblings("span.error-block").html("").hide();
        $("span.help-inline").hide();
    });

    $('#ot_applicable').on('change', function() {
        var selection = $(this).val();
        switch(selection){
            case "YES":
                $("#ot_rate_group").show()
                break;
            default:
                $("#ot_rate_group").hide()
        }
    });
    $('#rate_per_day').on('change', function() {
        var selection = $(this).val();
        switch(selection){
            case "YES":
                $("#rate_per_day_group").show()
                break;
            default:
                $("#rate_per_day_group").hide()
        }
    });

    $('#fingerprint_status').on('change', function() {
        var show_finger = $(this).val();

        switch(show_finger){
            case "NO":
                $("#show_att_res").show()
                break;
            default:
                $("#show_att_res").hide()
        }
//        if(show_finger=='YES'){
//            $('#show_att_res').show()
//        }else{
//            $('#show_att_res').hide()
//        }
    });
});

function reload_table(table)
{
    if(typeof table !== "undefined")
    {
        table.ajax.reload(null,false);
    }
}

function add_new_cate()
{
    $('#cate_form')[0].reset();
    save_method = 'add_cate';
    $("#ot_rate_group").hide();
    $("#rate_per_day_group").hide();
    $("#show_att_res").hide();
    $('#ot_rate').empty();
    $('#cate_form_modal').modal({backdrop: 'static', keyboard: false});
    $('#cate_form_modal .modal-title').text('Add New Category');
}

function save_emp_category(save_method)
{
    var url = "<?php echo site_url('systems/payroll_settings/save_emp_category')?>/" + save_method;
    $.ajax({
        url: url,
        type: "POST",
        data: $('#cate_form').serialize() + "&<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>",
        dataType: "JSON",
        success: function (data) {
            if (data.status) {
                $('#cate_form_modal').modal('hide');
                reload_table(emp_cate_datatable);
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

function edit_emp_cate(id)
{

    $('#cate_form')[0].reset();
    save_method = 'edit_cates';
    $("#ot_rate_group").hide();
    $("#rate_per_day_group").hide();
    $("#show_att_res").hide();
    $('.help-block').empty();
    $("#e_cat_id").val(id);
    $('#ot_rate').empty();
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('systems/payroll_settings/get_emp_cat_data/')?>/" + id,
        type: "GET",
        "data": {
            "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
        },
        dataType: "JSON",
        success: function(data)
        {
            $('#category_code').val(data[0].code);
            $('#category_name').val(data[0].desc);
            $('#ot_applicable').val(data[0].ot_applicable);
            if(data[0].ot_applicable=="YES"){
                $('#ot_rate').val(data[0].ot_rate);
                $("#ot_rate_group").show()
            }
            $('#rate_per_day').val(data[0].rate_per_day);
            if(data[0].rate_per_day=="YES"){
                $('#rate_per_day_amount').val(data[0].rate_per_day_amount);
                $("#rate_per_day_group").show()
            }

            $('#fingerprint_status').val(data[0].fingerprint_status);
            if(data[0].fingerprint_status=="NO"){
                $('#show_att_res_val').val(data[0].show_att);
                $("#show_att_res").show()
            }
            $('#show_att').val(data[0].show_att);

            $('#attendance_only').val(data[0].attendance_only);

            $('#attendance_incentive').val(data[0].attendance_incentive);

            $('#cate_form_modal').modal({backdrop: 'static', keyboard: false});
            $('#cate_form_modal .modal-title').text('Edit Employee Category: #' + data[0].id);


        },
        error: function ()
        {
            console.log('Error get edit cat data');
        }
    });

}


//Allownces
function add_allowance()
{
    $('#allowance_form')[0].reset();
    save_method = 'add_allowance';
    $('#allowance_modal').modal({backdrop: 'static', keyboard: false});
    $('#allowance_modal .modal-title').text('Add Allowance');
}


function save_allowance(save_method)
{
    var url = "<?php echo site_url('systems/payroll_settings/save_allowance')?>/" + save_method;
    $.ajax({
        url: url,
        type: "POST",
        data: $('#allowance_form').serialize() + "&<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>",
        dataType: "JSON",
        success: function (data) {
            if (data.status) {
                $('#allowance_modal').modal('hide');
                reload_table(allowance_datatable);
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

function edit_allowance(id)
{
    $('#allowance_form')[0].reset();
    save_method = 'edit_allowance';
    $('.help-block').empty();
    $("#allowance_id").val(id);
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('systems/payroll_settings/get_allowance_data/')?>/" + id,
        type: "GET",
        "data": {
            "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
        },
        dataType: "JSON",
        success: function(data)
        {
            $('#allowance_code').val(data[0].code);
            $('#allowance_name').val(data[0].allowance);
            $('#allowance_details').val(data[0].details);
            $('#allowance_type').val(data[0].type);

            $('#epf').val(data[0].epf);
            $('#f_id').val(data[0].f_id);

            $('#allowance_modal').modal({backdrop: 'static', keyboard: false});
            $('#allowance_modal .modal-title').text('Edit Allowance : #' + data[0].id);
        },
        error: function ()
        {
            console.log('Error get allowance data');
        }
    });

}


//Assign Allowanaces

function add_remove_allowances(id)
{
    $('#allowance_emp_cat_assign_form')[0].reset();
    $(".row_dyn").remove();
    counter = 1;
    save_method = 'add_remove_allowances';
    $("#emp_cat_id_for_allowance").val(id);
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('systems/payroll_settings/get_allowance_emp_cat_data/')?>/" + id,
        type: "GET",
        "data": {
            "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
        },
        dataType: "JSON",
        success: function(data)
        {
            if ($('select.select2').data('select2')) {
                $('select.select2').select2('destroy');
            }

            var i;
            var html_data = "";
            if(data.main_data !== null){
                for (i= 0; i< data.main_data.length; ++i) {
                    html_data += '<tr id="row_' + counter +'" class="row_dyn">' +
                        '<td></td>' + '' +
                        '<td style="width:300px"><select name="allowance[' + counter + ']" id="allowance' + counter + '" class="main_items select2"><option value="">...</option>';

                    //html_data += '<option value='+ data.main_data[i].a_id +' selected>'+ data.main_data[i].allowance +'</option>';
                    var j;
                    for (j= 0; j< data.allowance_data.length; ++j) {
                        if(data.allowance_data[j].id==data.main_data[i].a_id){
                            html_data += '<option value='+ data.allowance_data[j].id +' selected>'+ data.allowance_data[j].allowance +'</option>';
                        } else {
                            html_data += '<option value='+ data.allowance_data[j].id +'>'+ data.allowance_data[j].allowance +'</option>';
                        }
                    }

                    html_data += '</select></td><td><input class="rate form-control" type="text" name="rate[' + counter + ']" id="rate[' + counter + ']" value="'+ data.main_data[i].rate +'" style="width:120px" /></td>';


                    if(data.main_data[i].a_status==1){
                        html_data += '<td><input id="a_status' + counter + '" name="a_status[' + counter + ']" value="1" type="checkbox" checked></td>';
                    } else {
                        html_data += '<td><input id="a_status' + counter + '" name="a_status[' + counter + ']" value="1" type="checkbox"></td>';
                    }
                    html_data += '<td><a class="btn btn-default tbl-action" href="javascript:void();" title="Add/Remove Allowances" onclick="get_employee_list('+data.main_data[i].id+')"><i class="fa fa-list"></i> Employee List</td>';

                    html_data += '<td></td></tr>';

                    counter++;
                }
                $("#dyTable tbody").html(html_data);
            }
            $('.select2').select2({dropdownParent: $("#allowance_emp_cat_assign_modal")});
        },
        error: function ()
        {
            console.log('Error get allowance data');
        }
    });

    $('#allowance_emp_cat_assign_modal').modal({backdrop: 'static', keyboard: false});
    $('#allowance_emp_cat_assign_modal .modal-title').text('Add/Remove Allowance for this Category' + id);
}

$(document).ready(function() {
    $("#addButton").click(function () {
        if(counter>50){
            alert("Only 50 textboxes allowed");
            return false;
        }
        $.ajax({
            async: false,
            url: "<?php echo site_url('systems/payroll_settings/get_allowance_list'); ?>",
            type: "POST",
            data: {<?php echo $this->security->get_csrf_token_name(); ?>:"<?php echo $this->security->get_csrf_hash() ?>"},
        dataType: "JSON",
            success: function(data)
        {
            if ($('select.select2').data('select2')) {
                $('select.select2').select2('destroy');
            }

            var dyTable = $(document.createElement('tr')).attr("id", 'row_' + counter).attr("class", 'row_dyn');

            dyTable.after().html('<td></td>' + '<td style="width:300px"><select name="allowance[' + counter + ']" id="allowance' + counter + '" class="main_items select2"><option value="">...</option></select></td><td><input class="rate form-control " type="text" name="rate[' + counter + ']" id="rate' + counter + '" style="width:120px" /></td><td><input id="a_status' + counter + '" name="a_status[' + counter +']" value="1" type="checkbox"><td><i class="fa fa-trash tip del" id="' + counter + '" title="Remove This Item" style="cursor:pointer;" data-placement="right"></i></td>');

            dyTable.appendTo("#dyTable");
            $.each(data, function(id,name)
            {
                var opt = $('<option />');
                opt.val(id);
                opt.text(name);
                $('#allowance'+counter).append(opt);
            });

            $('.select2').select2({dropdownParent: $("#allowance_emp_cat_assign_modal")});
        },
        error:function (jqXHR, textStatus, errorThrown)
        {
            console.log('Error get data');
        }
    });
        counter++;
    });

    $("table#dyTable").on("click", '.del', function()
    {
        var delID = $(this).attr('id');
        row_id = $("#row_" + delID);
        row_id.remove();
    });
});

function save_allowance_emp_cat()
{
    var url = "<?php echo site_url('systems/payroll_settings/save_allowance_emp_cat')?>";
    $.ajax({
        url: url,
        type: "POST",
        data: $('#allowance_emp_cat_assign_form').serialize() + "&<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>",
        dataType: "JSON",
        success: function (data) {
            if (data.status) {
                $('#allowance_emp_cat_assign_modal').modal('hide');
                //reload_table(allowance_datatable);
                counter = 1;
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

function save_allowance_emp_cat_details()
{
    var url = "<?php echo site_url('systems/payroll_settings/save_allowance_emp_cat_details')?>";
    $.ajax({
        url: url,
        type: "POST",
        data: $('#allowance_emp_cat_assign_form_details').serialize() + "&<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>",
        dataType: "JSON",
        success: function (data) {
            if (data.status) {
                $('#view_modal').modal('hide');
                //reload_table(allowance_datatable);
                counter = 1;
            }
            else {
                if (data.message) {
                    bootbox.alert(data.message);
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



function get_employee_list(id)
{

    //Ajax Load data from ajax
    counter = 1;
    $.ajax({
        url : "<?php echo site_url('systems/payroll_settings/get_emp_cat_details/')?>" + id,
        type: "POST",
        "data":{
            "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
        },
        dataType: "JSON",
        success: function(data)
        {

            console.log(data);

            var html1='';

            if(data.lists){

                for(var i=0; i<data.lists.length; i++){

                    html1 +='' +
                        '<tr id="row_' + counter +'">' +
                        '<td>'+(i+1)+'</td>' +
                        '<td>'+data.lists[i].first_name+' '+data.lists[i].last_name+'</td>'+
                        '<td style="text-align: left">'+data.lists[i].amount+'</td>';
                    if(data.lists[i].emp_state==1){
                        html1 += '<td><input id="a_status' + counter + '" name="a_status[' + counter + ']" value="1" type="checkbox" checked></td>';
                    } else {
                        html1 += '<td><input id="a_status' + counter + '" name="a_status[' + counter + ']" value="1" type="checkbox"></td>';
                    }
                    html1 +='</tr>';
                    counter++;
                }

                $('#view_employee_div').html(html1);

            }

            $('#view_modal').modal({backdrop: 'static', keyboard: false});

        },
        error: function ()
        {
            console.log('Error Get Employee List');
        }
    });
}
</script>


<div class="modal fade" id="view_modal" role="dialog">
    <div class="modal-dialog" >
        <div class="modal-content" style="width: 500px">
            <div class="modal-header">
                <h3>Employee List</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form class="modal-body form">
                <form action="#" id="allowance_emp_cat_assign_form_details" class="form-horizontal">
                <div class="form-body">
<!--                    <div class="row" style="margin-right:5px;margin-left: 5px;margin-top: 10px">-->
<!--                        <div class="col-md-12 col-sm-12">-->
<!--                            <table style="width:100%" class="st-lumi-table" cellspacing="2" cellpadding="5" border="0">-->
<!--                                <tbody id="view_event_info">-->
<!---->
<!--                                </tbody>-->
<!--                            </table>-->
<!--                        </div>-->
<!--                    </div>-->
                    <div class="row" style="margin-right:5px;margin-left: 5px;margin-top: 10px">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tbody>
                            <tr>
                                <td>
                                    <table class="st-lumi-table table-bordered table-hover" width="100%">
                                        <thead>
                                        <th style="text-align:center;" align="center" scope="col">#</th>
                                        <th style="text-align:center;" align="center" scope="col">EMPLOYEE</th>
                                        <th style="text-align:center;" align="center" scope="col">Amount</th>
                                        <th style="text-align:center;" align="center" scope="col">Status ( Active / Inactive )</th>
                                        </thead>
                                        <tbody id="view_employee_div">
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </form>
                <div class="modal-footer">
                    <button type="button" id="btnSave" class="btn btn-success">Save</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>

        </div>
    </div>
</div>


