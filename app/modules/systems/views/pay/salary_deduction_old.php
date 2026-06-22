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
                <li class="breadcrumb-item active">Salary Monthly Deductions Management</li>
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
                <h4 class="page-head-title card-title  text-white" style="display: inline-block"> Salary Monthly Deductions Management</h4>
                <button type="button" class="btn btn-success pull-right" onclick='add_new();' style="margin-right: 10px" ><i class="fa fa-plus-circle"></i> Add deduction </button>
            </div>
            <div class="element-box">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item"><a class="nav-link active" role="tab" href="javascript:;" data-toggle="tab"> Salary Monthly deductions</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content tabcontent-border">
                    <div class="tab-pane p-20 active" role="tabpanel" id="sal_pay">
                        <table id="salary_deduction_datatable" class="table" cellspacing="0" width="100%">
                            <thead style="background-color: #912fa6;color: white;">
                            <tr>
                                <th>#</th>
                                <th>Deduction Name</th>
                                <th>Deductions Type</th>
                                <th style="max-width:100px;">Month</th>
                                <th style="max-width:100px;">Amount</th>
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
<div class="modal fade" id="salary_deduction_modal" role="dialog">
    <div class="modal-dialog modal-full" style="max-width: 500px">
        <div class="modal-content">
            <div class="modal-header bg-blue-steel bg-font-blue-steel">
                <h4 class="modal-title bold uppercase" style="height:10px"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body form">
                <form action="#" id="salary_deduction" class="form-horizontal">
                    <input type="hidden" id="deduction_id" name="deduction_id"/>
                    <div class="form-body" style="padding: 0px 10px;">
                        <div class="form-group">
                            <label class="control-label col-md-4">Deduction Name</label>
                            <div class="col-md-8">
                                <input type="text" name="name" id="name" class="form-control">
                                <span class="error-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Employees</label>
                            <div class="col-md-8">
                                <select id="employee" name="employee[]" class="form-control select2" required="required" multiple>
                                    <option value="">--</option>
                                    <?php foreach ($employees as $employee) { ?>
                                        <option value="<?php echo $employee->id; ?>"><?php echo $employee->employee_id . " - " . $employee->initials. " " . $employee->last_name; ?></option>
                                    <?php } ?>
                                </select>
                                <span class="error-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Departments</label>
                            <div class="col-md-8">
                                <select name="department[]" id="department" class="select2" multiple>
                                    <option value="">(---)</option>
                                    <?php foreach ($emp_departments as $emp_department){ ?>
                                        <option value="<?php echo $emp_department->id;?>"><?php echo $emp_department->desc ; ?></option>

                                    <?php }?>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Type</label>
                            <div class="col-md-8">
                                <select id="deduction_type" name="deduction_type" class="form-control select2" required="required">
                                    <option value="">--</option>
                                    <?php foreach ($DeductionTypes as $type) { ?>
                                        <option value="<?php echo $type->id; ?>"><?php echo $type->code . " - " . $type->name; ?></option>
                                    <?php } ?>
                                </select>
                                <span class="error-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Month</label>
                            <div class="col-md-8">
                                <input type="text" name="month" id="month" class="form-control month-pick">
                                <span class="error-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Amount</label>
                            <div class="col-md-8">
                                <input type="text" name="amount" id="amount" class="form-control ">
                                <span class="error-block"></span>
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
<div class="modal fade" id="salary_deduction_type_modal" role="dialog">
    <div class="modal-dialog modal-full" style="max-width: 500px">
        <div class="modal-content">
            <div class="modal-header bg-blue-steel bg-font-blue-steel">
                <h4 class="modal-title bold uppercase" style="height:10px"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body form">
                <form action="#" id="salary_deduction_type" class="form-horizontal">
                    <input type="hidden" id="deduction_type_id" name="deduction_type_id"/>
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

    $('#department').change(function(){
        var department=$('#department').val();
        if(department !=""){
            $('#employee').attr('disabled',true)
        }
        else{
            $('#employee').attr('disabled',false)
        }
    });

    $('#employee').change(function(){
        var emp=$('#employee').val();
        if(emp !=""){
            $('#department').attr('disabled',true)
        }
        else{
            $('#department').attr('disabled',false)
        }
    });

    var save_method;
    var salary_deduction_datatable;
    var counter = 1;

    $(document).ready(function() {

        $('#employee').attr('disabled',false);
        $('#department').attr('disabled',false);

        salary_deduction_datatable = $('#salary_deduction_datatable').DataTable({
            "processing": true,
            "serverSide": true,

            "ajax": {
                "data": {
                    "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
                },
                "url": "<?php echo base_url()?>systems/salary_settings_con/get_deduction_data",
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

        salary_deduction_datatable.on('order.dt search.dt', function () {
            salary_deduction_datatable.column(0, {search: 'applied', order: 'applied'}).nodes().each(function (cell, i) {
                cell.innerHTML = i + 1;
            });
        }).draw();


        $("#btnSave").off('click');
        $("#btnSave").on('click', function(e){
            e.preventDefault();
            save_deduction(save_method);
        });

        $("#salary_deduction :input").change(function(){
            $(this).siblings("span.error-block").html("").hide();
            //$(this).removeClass('error_input_lumi');
            //$(this).addClass('good_input_lumi');
            $("span.help-inline").hide();
        });

        $('#salary_deduction_modal').on('hidden.bs.modal', function() {
            $("#salary_deduction :input").siblings("span.error-block").html("").hide();
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


    //Salary Monthly deduction
    function add_new()
    {
        $('#salary_deduction')[0].reset();
        $('.select2').select2();
        save_method = 'add';
        $('#salary_deduction_modal').modal({backdrop: 'static', keyboard: false});
        $('#salary_deduction_modal .modal-title').text('Add Salary Monthly Deduction');
    }


    function save_deduction(save_method)
    {
        var url = "<?php echo site_url('systems/salary_settings_con/save_deduction')?>/" + save_method;
        $.ajax({
            url: url,
            type: "POST",
            data: $('#salary_deduction').serialize() + "&<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>",
            dataType: "JSON",
            success: function (data) {
                if (data.status) {
                    $('#salary_deduction_modal').modal('hide');
                    reload_table(salary_deduction_datatable);
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

    function edit_deduction(id)
    {
        $('#salary_deduction')[0].reset();
        save_method = 'edit';
        $('.help-block').empty();
        $("#deduction_id").val(id);
        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo site_url('systems/salary_settings_con/edit_get_deduction_data/')?>/" + id,
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

                if(data.deductions.emp_department == 1){
                    $('#employee').val(data.employees);
                }
                else if(data.deductions.emp_department == 2){
                    $('#department').val(data.departments);
                }

                $('#deduction_type').val(data.deductions.deduction_type);
                $('#month').val(data.deductions.month);
                $('#amount').val(data.deductions.amount);
                $('#name').val(data.deductions.name);

                $('.select2').select2({dropdownParent: $("#salary_deduction_modal")});
                $('#salary_deduction_modal').modal({backdrop: 'static', keyboard: false});
                $('#salary_deduction_modal .modal-title').text('Edit Salary Monthly Deduction : #' + data.deductions.name);
            },
            error: function ()
            {
                console.log('Error get Salary Monthly Deduction data');
            }
        });

    }

    function delete_deduction(id)
    {
        bootbox.dialog({
            message: "Are you sure, that you want to delete this Salary Monthly Deduction record?",
            title: "Alert!",
            buttons: {
                ok: {
                    label: "Yes",
                    className: "btn-primary",
                    callback: function () {
                        $.ajax({
                            url : "<?php echo base_url()?>systems/salary_settings_con/delete_deduction",
                            type: "POST",
                            data: {
                                "deduction_id": id,
                                "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
                            },
                            dataType: "JSON",
                            success: function(data)
                            {
                                reload_table(salary_deduction_datatable);
                                bootbox.alert(data.message);
                                //data.status ? console.log("Delete successful!") : console.log("Delete failed!");
                            },
                            error: function (jqXHR, textStatus, errorThrown)
                            {
                                console.log(jqXHR);
                                console.log(textStatus);
                                console.log(errorThrown);
                                console.log('Error while Delete Salary Monthly Deduction record');
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



    //deduction Type
    var salary_deduction_types_datatable;

    $(document).ready(function() {

        salary_deduction_types_datatable = $('#salary_deduction_types_datatable').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "data": {
                    "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
                },
                "url": "<?php echo base_url()?>systems/salary_settings_con/get_salary_deduction_types_data",
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
            save_deduction_type(save_method);
        });

        $("#salary_deduction_type :input").change(function(){
            $(this).siblings("span.error-block").html("").hide();
            //$(this).removeClass('error_input_lumi');
            //$(this).addClass('good_input_lumi');
            $("span.help-inline").hide();
        });

        $('#salary_deduction_type_modal').on('hidden.bs.modal', function() {
            $("#salary_deduction_type :input").siblings("span.error-block").html("").hide();
            $("span.help-inline").hide();
        });

    });

    function add_new_type()
    {
        $('#salary_deduction_type')[0].reset();
        $('.select2').select2();
        save_method = 'add_type';
        $('#salary_deduction_type_modal').modal({backdrop: 'static', keyboard: false});
        $('#salary_deduction_type_modal .modal-title').text('Add Salary Monthly Deduction Type');
    }


    function save_deduction_type(save_method)
    {
        var url = "<?php echo site_url('systems/salary_settings_con/save_deduction_type')?>/" + save_method;
        $.ajax({
            url: url,
            type: "POST",
            data: $('#salary_deduction_type').serialize() + "&<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>",
            dataType: "JSON",
            success: function (data) {
                if (data.status) {
                    $('#salary_deduction_type_modal').modal('hide');
                    reload_table(salary_deduction_types_datatable);
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

    function edit_deduction_type(id)
    {
        $('#salary_deduction_type')[0].reset();
        $('.select2').select2();
        save_method = 'edit_type';
        $('.help-block').empty();
        $("#deduction_type_id").val(id);
        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo site_url('systems/salary_settings_con/get_deduction_type_data/')?>/" + id,
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

                $('#salary_deduction_type_modal').modal({backdrop: 'static', keyboard: false});
                $('#salary_deduction_type_modal .modal-title').text('Edit Monthly Deduction Type : ' + data[0].name);
            },
            error: function ()
            {
                console.log('Error get Monthly Deduction Type data');
            }
        });

    }


    function view_deduction(id)
    {
        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo site_url('systems/salary_settings_con/get_deduction_view_by_id/')?>" + id,
            type: "POST",
            "data":{
                "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
            },
            dataType: "JSON",
            success: function(data)
            {

                $('#view_event_info').html('<tr>' +
                    '<td valign="top"><label>DATE & TIME</label></td>' +
                    '<td>' +
                    '<span>'+data.events.datetime+'</span>'+
                    '</td>' +
                    '</tr>' +
                    '<tr>' +
                    '<td valign="top"><label>EVENT TYPE</label></td>'+
                    '<td>'+
                    '<span>'+data.events.event_type_name+'</span>'+
                    '</td>'+
                    '</tr>'+
                    '<tr>' +
                    '<td valign="top"><label>EVENT TITLE</label></td>'+
                    '<td>'+
                    '<span>'+data.events.event_title+'</span>'+
                    '</td>'+
                    '</tr>'+
                    '<tr>' +
                    '<td valign="top"><label>EVENT DETAILS</label></td>'+
                    '<td>'+
                    '<span>'+data.events.event_details+'</span>'+
                    '</td>'+
                    '</tr>'+
                    '<tr>'+
                    '<td valign="top"><label>NOTIFY DATE</label></td>'+
                    '<td>' +
                    '<span>FROM '+data.events.from_date+' TO '+data.events.to_date+'</span>' +
                    '</td>' +
                    '</tr>' +
                    '');

                var html1='';

                if(data.lists){

                    for(var i=0;i<data.lists.length;i++){

                        html1 +='' +
                            '<tr>' +
                            '<td>'+(i+1)+'</td>' +
                            '<td>'+data.lists[i].full_name+'</td>'+
                            '<td style="text-align: left">'+data.lists[i].department_name+'</td>' +
                            '</tr>';
                    }

                    $('#view_employee_div').html(html1);

                }

                $('#view_modal').modal({backdrop: 'static', keyboard: false});

            },
            error: function ()
            {
                console.log('Error get event data');
            }
        });
    }
</script>

