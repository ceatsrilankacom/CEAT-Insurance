<style>
    .clockpicker-popover {
        z-index: 999999;
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
                <li class="breadcrumb-item active">Shift Schedule Management</li>
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
                <h4 class="page-head-title card-title  text-white" style="display: inline-block"> Shift Schedule Management</h4>
                <button class="btn btn-success pull-right" onclick="add_new()"><i class="fa fa-plus"></i> Add New Schedule</button>
            </div>
            <div class="element-box">
                <div id="schedules">
                    <div class="tools"> </div>
                    <table class="table table-striped table-bordered table-hover table-header-fixed dt-responsive" id="schedulesTable" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th class="all">#</th>
                            <th class="all">Code</th>
                            <th class="all">Schedule Name</th>
                            <th class="all">Work Hours</th>
                            <th class="all">Start Time</th>
                            <th class="all">End Time</th>
                            <th class="desktop">Half Day - 1<sup>st</sup> Session</th>
                            <th class="desktop">Half Day - 2<sup>nd</sup> Session</th>
                            <th class="desktop">Late</th>
                            <th class="desktop">Early Leave</th>
                            <th class="all text-center">Actions</th>
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
<!-- Bootstrap modal -->
<div class="modal fade" id="schedule_modal" role="dialog">
    <div class="modal-dialog modal-full"  style="max-width: 1000px!important;">
        <div class="modal-content">
            <div class="modal-header">
                <h3 id="schedule_title">Shift Schedule</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body form">
                <form action="#" id="schedule_form" class="form-horizontal" role="form">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="hidden" name="schedule_id" id="schedule_id" value="">
                                <div class="form-group row">
                                    <label class="control-label col-md-6">Code</label>
                                    <div class="col-md-6">
                                        <input type="text" name="code" id="code" class="form-control" maxlength="10" placeholder="" value="" >
                                        <span class="error-block"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-6">Schedule Name</label>
                                    <div class="col-md-6">
                                        <input type="text" name="schedule_name" id="schedule_name" class="form-control" placeholder="" value="" >
                                        <span class="error-block"></span>
                                    </div>
                                </div>
                                <div class="form-group  row">
                                    <label class="control-label col-md-6">Work Hours</label>
                                    <div class="col-md-6">
                                        <input type="text" name="schedule_work_hours" id="schedule_work_hours" class="form-control" placeholder="" value="" >
                                        <span class="error-block"></span>
                                    </div>
                                </div>
                                <div class="form-group  row">
                                    <label class="control-label col-md-6">Schedule - Start Time</label>
                                    <div class="col-md-6">
                                        <input type="text" name="schedule_start_time" id="schedule_start_time" class="form-control clockpicker" placeholder="" value="" readonly>
                                        <span class="error-block"></span>
                                    </div>
                                </div>
                                <div class="form-group  row">
                                    <label class="control-label col-md-6">Schedule - End Time</label>
                                    <div class="col-md-6">
                                        <input type="text" name="schedule_end_time" id="schedule_end_time" class="form-control clockpicker" placeholder="" value=""  readonly>
                                        <span class="error-block"></span>
                                    </div>
                                </div>
                                <div class="form-group  row">
                                    <label class="control-label col-md-6">Maximum Days</label>
                                    <div class="col-md-6">
                                        <input type="text" name="max_days" id="max_days" class="form-control numeric">
                                        <span class="error-block"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group  row">
                                    <label class="control-label col-md-6">Half Day - 1<sup>st</sup> Session</label>
                                    <div class="col-md-6">
                                        <input type="text" name="halfday_time_mo" id="halfday_time_mo" class="form-control clockpicker" placeholder="" value=""  readonly>
                                        <span class="error-block"></span>
                                    </div>
                                </div>
                                <div class="form-group  row">
                                    <label class="control-label col-md-6">Half Day - 2<sup>nd</sup> Session</label>
                                    <div class="col-md-6">
                                        <input type="text" name="halfday_time_ev" id="halfday_time_ev" class="form-control clockpicker" placeholder="" value=""  readonly>
                                        <span class="error-block"></span>
                                    </div>
                                </div>
                                <div class="form-group  row">
                                    <label class="control-label col-md-6">Schedule - Late</label>
                                    <div class="col-md-6">
                                        <input type="text" name="late_time_LA" id="late_time_LA" class="form-control clockpicker" placeholder="" value=""  readonly>
                                        <span class="error-block"></span>
                                    </div>
                                </div>
                                <div class="form-group  row">
                                    <label class="control-label col-md-6">Schedule - Early Leave</label>
                                    <div class="col-md-6">
                                        <input type="text" name="late_time_EL" id="late_time_EL" class="form-control clockpicker" placeholder="" value=""  readonly>
                                        <span class="error-block"></span>
                                    </div>
                                </div>
                                <div class="form-group  row">
                                    <label class="control-label col-md-6">Schedule - Session</label>
                                    <div class="col-md-6">
                                        <select name="session" id="session" class="form-control">
                                            <option value="Day">Day</option>
                                            <option value="Night">Night</option>
                                        </select>
                                        <span class="error-block"></span>
                                    </div>
                                </div>
                                <div class="form-group  row">
                                    <label class="control-label col-md-6">Schedule - Type</label>
                                    <div class="col-md-6">
                                        <select name="shift_type" id="shift_type" class="form-control">
                                            <option value="Flexible">Flexible Hours</option>
                                            <option value="Fixed">Fixed Hours</option>
                                        </select>
                                        <span class="error-block"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <h4  class="sub-head">Roster Rules</h4>
                        <div class="row" style="margin-top: 10px">
                            <table style="width:100%;margin:5px" class="st-lumi-table" cellspacing="2" cellpadding="5" border="1">
                                <thead>
                                <tr>
                                    <th colspan="2" style="text-align: center">
                                        <label class="control-label" for="roster" style='color:#ffffff;text-align: center'><b>Local Employees</b></label>
                                    </th>
                                    <th colspan="2" style="text-align: center">
                                        <label class="control-label" for="roster" style='color:#ffffff;text-align: center'><b>Foreign Employees</b></label>
                                    </th>
                                </tr>
                                <tr>
                                    <th style="text-align: center">
                                        <label class="control-label" for="Male" style='color:#ffffff;text-align: center'><b>Male</b></label>
                                    </th>
                                    <th style="text-align: center">
                                        <label class="control-label" for="Female" style='color:#ffffff;text-align: center'><b>Female</b></label>
                                    </th>
                                    <th style="text-align: center">
                                        <label class="control-label" for="Male" style='color:#ffffff;text-align: center'><b>Male</b></label>
                                    </th>
                                    <th style="text-align: center">
                                        <label class="control-label" for="Female" style='color:#ffffff;text-align: center'><b>Female</b></label>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr style="height: 40px;">
                                    <td style="text-align: center">
                                        <input type="checkbox" id="LM" name="LM" class="form-control" title="Local Male For Shift">
                                    </td>
                                    <td style="text-align: center">
                                        <input type="checkbox" id="LF" name="LF" class="form-control" title="Local Female For Shift">
                                    </td>
                                    <td style="text-align: center">
                                        <input type="checkbox" id="FM" name="FM" class="form-control" title="Foreign Male For Shift">
                                    </td>
                                    <td style="text-align: center">
                                        <input type="checkbox" id="FF" name="FF" class="form-control" title="Foreign Female For Shift">
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" class="btn btn-success">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->

<!-- Bootstrap modal -->
<div class="modal fade" id="schedule_assign_modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 id="schedule_title">Shift Schedule Assignment</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body form">
                <form action="#" id="schedule_assign_form" class="form-horizontal" role="form">
                    <div class="form-body">
                        <input type="hidden" name="schedule_shift_id" id="schedule_shift_id" value="">
                        <h5>Assign Employee Categories to This Schedule</h5>
                        <div class="form-group  row">
                            <div id="categories_list_wrap">
                            </div>
                            <!-- <select multiple="multiple" size="10" name="categories_list[]" title="categories_list[]">
                                    <?php /*foreach ($EmpCategories as $data){ */?>
                                        <option value="<?php /*echo $data->id;*/?>"><?php /*echo $data->code." ".$data->desc; */?></option>
                                    <?php /*}*/?>
                                </select>-->
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSaveAssign" class="btn btn-success">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->

<script>
    $(document).ready(function () {
        $('.clockpicker').clockpicker({
            donetext: 'Done',
            autoclose: true
        });
    });

    var save_method;
    var schedulesTable;

    $(document).ready(function() {

        $("#btnSave").off('click');
        $("#btnSave").on('click', function(e){
            e.preventDefault();
            save_schedule(save_method);
        });

        $("#btnSaveAssign").off('click');
        $("#btnSaveAssign").on('click', function(e){
            e.preventDefault();
            save_assign();
        });

        schedulesTable = $('#schedulesTable').DataTable({
            "processing": true,
            "serverSide": true,

            "ajax": {
                "data": {
                    "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
                },
                "url": "<?php echo base_url()?>systems/shift_management/get_schedules_data",
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

    });

    function add_new()
    {
        $('#schedule_form')[0].reset();
        save_method = 'add';
        $('#schedule_modal').modal({backdrop: 'static', keyboard: false});
        $('#schedule_modal .modal-title').text('Add New Schedule');
    }

    function save_schedule(save_method)
    {
        var url = "<?php echo site_url('systems/shift_management/save_schedule')?>/"+save_method;
        $.ajax({
            url: url,
            type: "POST",
            data: $('#schedule_form').serialize() + "&<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>",
            dataType: "JSON",
            success: function (data) {
                if (data.status) {
                    $('#schedule_modal').modal('hide');
                    $('#schedule_form')[0].reset();
                    reload_table(schedulesTable);
                }
                else {
                    if (data.message) {
                        bootbox.alert(data.message);
                    }
                    if(data.error) {
                        for (var l = 0; l < data.inputerror.length; l++) {
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

    function reload_table(table)
    {
        if(typeof table !== "undefined")
        {
            table.ajax.reload(null,false);
        }
    }

    function edit_schedule(id)
    {
        $('#schedule_form')[0].reset();
        save_method = 'edit';
        $("#schedule_id").val(id);
        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo site_url('systems/shift_management/get_schedule_data_by_id/')?>/" + id,
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

                for(var key in data)
                {
                    $('[name="' + key + '"]').val(data[key]);

                    if(data[key] == "YES"){
                        $('[name="'+key+'"]').attr('checked',true);
                    }
                    else{
                        $('[name="'+key+'"]').attr('checked',false);
                    }
                }

                $('.select2').select2({dropdownParent: $("#schedule_modal")});
            },
            error: function ()
            {
                console.log('Error get schedule data');
            }
        });

        $('#schedule_modal').modal({backdrop: 'static', keyboard: false});
        $('#schedule_modal .modal-title').text('Edit Schedule ' + id);
    }

    function assign_categories(id)
    {
        $('#schedule_assign_form')[0].reset();
        $(".row_dyn").remove();
        counter = 1;
        $("#schedule_shift_id").val(id);
        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo site_url('systems/shift_management/get_schedule_assign_data/')?>/" + id,
            type: "GET",
            "data": {
                "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
            },
            dataType: "JSON",
            success: function(data)
            {

                /*if(data.main_data !== null){
                    for (i= 0; i< data.main_data.length; ++i) {
                        var j;
                        for (j= 0; j< data.emp_cate_data.length; ++j) {
                            if(data.emp_cate_data[j].id==data.main_data[i].c_id){
                                html_data += '<option value='+ data.emp_cate_data[j].id +' selected>'+ data.emp_cate_data[j].desc +'</option>';
                            } else {
                                html_data += '<option value='+ data.emp_cate_data[j].id +'>'+ data.emp_cate_data[j].desc +'</option>';
                            }
                        }
                    }
                }*/

                var html_data = '<select name="categories_list[]" id="categories_list" class="main_items" multiple>';

                var i;
                if(data.emp_cate_data !== null){
                    for (i= 0; i< data.emp_cate_data.length; ++i) {
                        html_data += '<option value='+ data.emp_cate_data[i].id +'>'+ data.emp_cate_data[i].desc +'</option>';
                    }
                }

                var j;
                if(data.main_data !== null) {
                    for (j = 0; j < data.main_data.length; ++j) {
                        html_data += '<option value=' + data.main_data[j].c_id + ' selected>' + data.main_data[j].desc + '</option>';
                    }
                }

                html_data += '</select>';

                $("#categories_list_wrap").html(html_data);
                $('select[name="categories_list[]"]').bootstrapDualListbox();
            },
            error: function ()
            {
                console.log('Error get schedule assign data');
            }
        });

        $('#schedule_assign_modal').modal({backdrop: 'static', keyboard: false});
        $('#schedule_assign_modal .modal-title').text('Add/Remove Employee Categories for this Shift' + id);
    }

    function save_assign()
    {
        var url = "<?php echo site_url('systems/shift_management/save_assign')?>";
        $.ajax({
            url: url,
            type: "POST",
            data: $('#schedule_assign_form').serialize() + "&<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>",
            dataType: "JSON",
            success: function (data) {
                if (data.status) {
                    $('#schedule_assign_modal').modal('hide');
                    //reload_table(allowance_datatable);
                }
                else {
                    if (data.message) {
                        bootbox.alert(data.message);
                    }
                    if(data.inputerror)
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
</script>

