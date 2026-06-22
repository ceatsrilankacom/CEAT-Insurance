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
                <li class="breadcrumb-item active">Payroll Settings</li>
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
                <h4 class="page-head-title card-title  text-white" style="display: inline-block"> Payroll Settings</h4>
                <button class="btn btn-success pull-right" onclick="save();" style="margin-right: 10px"><i class="fa fa-save"></i> Save Main Settings </button>
            </div>
            <div class="element-box">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item"><a class="nav-link active" role="tab" href="#main_settings" data-toggle="tab"> Main Settings</a></li>
                    <li class="nav-item"><a class="nav-link" role="tab" href="#paye_settings" data-toggle="tab"> PAYE Tax</a></li>
                    <li class="nav-item"><a class="nav-link" role="tab" href="#paye_stamp" data-toggle="tab"> Stamp Duty</a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content tabcontent-border">
                    <div class="tab-pane p-20 active" role="tabpanel" id="main_settings">
                        <form action="#" id="payroll_settings_form" class="form-horizontal" role="form">
                            <div class="form-body">
                                <div class="row">
                                        <?php foreach ($payroll_setting as $pay_settings){ ?>
                                        <div class="col-md-3">
                                            <div class="form-group" style="margin-top: 20px;">
                                                <h6 style="text-align: center;"><?php echo $pay_settings->name; ?></h6>
                                                <label class="control-label" >Monthly</label>
                                                <input type="hidden" name="p_id[]" value="<?php echo $pay_settings->id; ?>">
                                                <select name="monthly[]" id="monthly" class="form-control nOselect2">
                                                    <option value="YES" <?php echo ($pay_settings->payroll_type=='YES')?'selected':''; ?>>YES</option>
                                                    <option value="NO" <?php echo ($pay_settings->payroll_type=='NO')?'selected':''; ?>>NO</option>
                                                </select>

                                                <label class="control-label" >From</label>
                                                <input type="text" name=m_from[] class="form-control" value="<?php echo $pay_settings->period_start ?>">

                                                <label class="control-label" >Up To</label>
                                                <input type="text" name="m_to[]" class="form-control"  value="<?php echo $pay_settings->period_end ?>">
                                            </div>
                                        </div>
                                        <?php } ?>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane p-20" role="tabpanel" id="paye_settings">
                        <button type="button" class="btn btn-success pull-right" onclick='add_new_paye();'  style="margin-right: 10px" ><i class="fa fa-plus-circle"></i> Add PAYE Tax Range</button>
                        <table id="emp_paye_datatable" class="table" cellspacing="0" width="100%">
                            <thead style="background-color: #0e7eff;color: white;">
                            <tr>
                                <th>#</th>
                                <th>Code</th>
                                <th>Min</th>
                                <th style="max-width:100px;">Max</th>
                                <th style="max-width:100px;">Rate</th>
                                <th style="max-width:100px;">Less</th>
                                <th style="max-width:100px;">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane p-20" role="tabpanel" id="paye_stamp">
                        <button type="button" class="btn btn-success pull-right" onclick='add_new_stamp();'  style="margin-right: 10px" ><i class="fa fa-plus-circle"></i> Add Stamp Duty Tax Range</button>
                        <table id="emp_stamp_datatable" class="table" cellspacing="0" width="100%">
                            <thead style="background-color: #0e7eff;color: white;">
                            <tr>
                                <th>#</th>
                                <th>Code</th>
                                <th>Min</th>
                                <th style="max-width:100px;">Max</th>
                                <th style="max-width:100px;">Rate</th>
                                <th style="max-width:100px;">Less</th>
                                <th style="max-width:100px;">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"></h4>
                <h6 class="card-subtitle"></h6>
            </div>
        </div>
    </div>
</div>
<!-- Bootstrap modal -->
<div class="modal fade" id="paye_form_modal" role="dialog">
    <div class="modal-dialog modal-full" style="max-width: 500px">
        <div class="modal-content">
            <div class="modal-header bg-blue-steel bg-font-blue-steel">
                <h4 class="modal-title bold uppercase" style="height:10px"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body form">
                <form action="#" id="paye_form" class="form-horizontal">
                    <input type="hidden" id="paye_id" name="paye_id"/>
                    <div class="form-body" style="padding: 0px 10px;">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label" >Code</label>
                                    <input type="text" name="paye_code" id="paye_code" class="form-control ">
                                    <span class="error-block"></span>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" >Min</label>
                                    <input type="text" name="min" id="min" class="form-control ">
                                    <span class="error-block"></span>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" >Max</label>
                                    <input type="text" name="max" id="max" class="form-control ">
                                    <span class="error-block"></span>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" >Rate (0.00)</label>
                                    <input type="text" name="rate" id="rate" class="form-control ">
                                    <span class="error-block"></span>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" >Less</label>
                                    <input type="text" name="less" id="less" class="form-control ">
                                    <span class="error-block"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSavePAYE" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="stamp_form_modal" role="dialog">
    <div class="modal-dialog modal-full" style="max-width: 500px">
        <div class="modal-content">
            <div class="modal-header bg-blue-steel bg-font-blue-steel">
                <h4 class="modal-title bold uppercase" style="height:10px"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body form">
                <form action="#" id="stamp_form" class="form-horizontal">
                    <input type="hidden" id="stamp_id" name="stamp_id"/>
                    <div class="form-body" style="padding: 0px 10px;">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label" >Code</label>
                                    <input type="text" name="stamp_code" id="stamp_code" class="form-control ">
                                    <span class="error-block"></span>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" >Min</label>
                                    <input type="text" name="min_st" id="min_st" class="form-control ">
                                    <span class="error-block"></span>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" >Max</label>
                                    <input type="text" name="max_st" id="max_st" class="form-control ">
                                    <span class="error-block"></span>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" >Rate (0.00)</label>
                                    <input type="text" name="rate_st" id="rate_st" class="form-control ">
                                    <span class="error-block"></span>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" >Less</label>
                                    <input type="text" name="less_st" id="less_st" class="form-control ">
                                    <span class="error-block"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSaveSTAMP" onclick="save_STAMP()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url(); ?>assets/js/jquery.inputmask.bundle.min.js" type="text/javascript"></script>
<script>
    $('#monthly').on('change', function() {
        var selection = $(this).val();
        switch(selection){
            case "NO":
                $("#dt_range_group").show();
                break;
            default:
                $("#dt_range_group").hide();
                $("#from_day").val('');
                $("#upto_day").val('');
        }
    });

    $(document).ready(function(){
        $("#from_day").inputmask('integer',{min:1, max:28});
        $("#upto_day").inputmask('integer',{min:1, max:28});
        //set input/textarea/select event when change value, remove class error and remove text help block
        $("input").change(function(){
            $(this).parent().removeClass('has-error');
            $(this).next("span").empty();
        });
        $("textarea").change(function(){
            $(this).parent().removeClass('has-error');
            $(this).next("span").empty();
        });
        $("select").change(function(){
            $(this).parent().removeClass('has-error');
            $(this).next("span").empty();
        });
        $("form :input:not(.input-optional, .input-hidden)").each(function(){
            $(this).siblings('label').append("<span class='required-mark' style='color: #c90054;'>*</span>");
        });
    });

    function save()
    {
        var url = "<?php echo site_url('systems/administration/save_payroll_multiple')?>";
        $.ajax({
            url: url,
            type: "POST",
            data: $('#payroll_settings_form').serialize() + "&<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>",
            dataType: "JSON",
            success: function (data) {
                if (data.status) {
                    //reload_table(allowance_datatable);
                    window.location = "<?php echo base_url('systems/administration/hr_payroll_settings')?>";
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
</script>

<script type="text/javascript">

    var save_method;
    var emp_paye_datatable;
    var emp_stamp_datatable;
    var counter = 1;

    $(document).ready(function() {

        emp_paye_datatable = $('#emp_paye_datatable').DataTable({
            "processing": true,
            "serverSide": true,

            "ajax": {
                "data": {
                    "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
                },
                "url": "<?=base_url()?>systems/payroll_settings/get_paye_data",
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

        $("#btnSavePAYE").off('click');
        $("#btnSavePAYE").on('click', function(e){
            e.preventDefault();
            save_PAYE(save_method);
        });

        $("#paye_form :input").change(function(){
            $(this).siblings("span.error-block").html("").hide();
            //$(this).removeClass('error_input_lumi');
            //$(this).addClass('good_input_lumi');
            $("span.help-inline").hide();
        });

        $('#paye_form_modal').on('hidden.bs.modal', function() {
            $("#paye_form :input").siblings("span.error-block").html("").hide();
            $("span.help-inline").hide();
        });


        emp_stamp_datatable = $('#emp_stamp_datatable').DataTable({
            "processing": true,
            "serverSide": true,

            "ajax": {
                "data": {
                    "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
                },
                "url": "<?=base_url()?>systems/payroll_settings/emp_stamp_datatable",
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


//        $("#btnSaveStamp").off('click');
//        $("#btnSaveStamp").on('click', function(e){
//            //e.preventDefault();
//            save_STAMP(save_method);
//        });

        $("#stamp_form :input").change(function(){
            $(this).siblings("span.error-block").html("").hide();
            //$(this).removeClass('error_input_lumi');
            //$(this).addClass('good_input_lumi');
            $("span.help-inline").hide();
        });

        $('#stamp_form_modal').on('hidden.bs.modal', function() {
            $("#stamp_form :input").siblings("span.error-block").html("").hide();
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


    //PAYE
    function add_new_paye()
    {
        $('#paye_form')[0].reset();
        save_method = 'add_paye';
        $('#paye_form_modal').modal({backdrop: 'static', keyboard: false});
        $('#paye_form_modal .modal-title').text('Add PAYE');
    }

     function save_PAYE(save_method)
        {
        var url = "<?php echo site_url('systems/payroll_settings/save_paye')?>/" + save_method;
        $.ajax({
            url: url,
            type: "POST",
            data: $('#paye_form').serialize() + "&<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>",
            dataType: "JSON",
            success: function (data) {
                if (data.status) {
                    $('#paye_form_modal').modal('hide');
                    reload_table(emp_paye_datatable);
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

    function edit_PAYE(id)
    {
        $('#paye_form')[0].reset();
        save_method = 'edit_paye';
        $('.help-block').empty();
        $("#paye_id").val(id);
        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo site_url('systems/payroll_settings/edit_get_paye_data/')?>/" + id,
            type: "GET",
            "data": {
                "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
            },
            dataType: "JSON",
            success: function(data)
            {
                $('#paye_code').val(data[0].code);
                $('#min').val(data[0].min_val);
                $('#max').val(data[0].max_val);
                $('#rate').val(data[0].rate);
                $('#less').val(data[0].less);

                $('#paye_form_modal').modal({backdrop: 'static', keyboard: false});
                $('#paye_form_modal .modal-title').text('Edit PAYE : #' + data[0].id);
            },
            error: function ()
            {
                console.log('Error get paye data');
            }
        });

    }

    function delete_PAYE(id)
    {
        bootbox.dialog({
            message: "Are you sure, that you want to delete this PAYE record?",
            title: "Alert!",
            buttons: {
                ok: {
                    label: "Yes",
                    className: "btn-primary",
                    callback: function () {
                        $.ajax({
                            url : "<?=base_url()?>systems/payroll_settings/delete_paye",
                            type: "POST",
                            data: {
                                "paye_id": id,
                                "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
                            },
                            dataType: "JSON",
                            success: function(data)
                            {
                                reload_table(emp_paye_datatable);
                                bootbox.alert(data.message);
                                //data.status ? console.log("Delete successful!") : console.log("Delete failed!");
                            },
                            error: function (jqXHR, textStatus, errorThrown)
                            {
                                console.log(jqXHR);
                                console.log(textStatus);
                                console.log(errorThrown);
                                console.log('Error while Delete PAYE record');
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


    //STAMP
    function add_new_stamp()
    {
        $('#stamp_form')[0].reset();
        save_method = 'add_stamp';
        $('#stamp_form_modal').modal({backdrop: 'static', keyboard: false});
        $('#stamp_form_modal .modal-title').text('Add Stamp Duty');
    }


    function edit_STAMP(id)
    {
        $('#paye_form')[0].reset();
        save_method = 'edit_stamp';
        $('.help-block').empty();
        $("#paye_id").val(id);
        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo site_url('systems/payroll_settings/edit_get_stamp_data/')?>/" + id,
            type: "GET",
            "data": {
                "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
            },
            dataType: "JSON",
            success: function(data)
            {
                $('#stamp_id').val(data[0].id);
                $('#stamp_code').val(data[0].code);
                $('#min_st').val(data[0].min_val);
                $('#max_st').val(data[0].max_val);
                $('#rate_st').val(data[0].rate);
                $('#less_st').val(data[0].less);

                $('#stamp_form_modal').modal({backdrop: 'static', keyboard: false});
                $('#stamp_form_modal .modal-title').text('Edit STAMP : #' + data[0].id);
            },
            error: function ()
            {
                console.log('Error get paye data');
            }
        });

    }

    function delete_STAMP(id)
    {
        bootbox.dialog({
            message: "Are you sure, that you want to delete this PAYE record?",
            title: "Alert!",
            buttons: {
                ok: {
                    label: "Yes",
                    className: "btn-primary",
                    callback: function () {
                        $.ajax({
                            url : "<?=base_url()?>systems/payroll_settings/delete_stamp",
                            type: "POST",
                            data: {
                                "stamp_id": id,
                                "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
                            },
                            dataType: "JSON",
                            success: function(data)
                            {
                                reload_table(emp_stamp_datatable);
                                bootbox.alert(data.message);
                                //data.status ? console.log("Delete successful!") : console.log("Delete failed!");
                            },
                            error: function (jqXHR, textStatus, errorThrown)
                            {
                                console.log(jqXHR);
                                console.log(textStatus);
                                console.log(errorThrown);
                                console.log('Error while Delete STAMP record');
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

    function save_STAMP()
    {

        var url = "<?php echo site_url('systems/payroll_settings/save_stamp')?>/" + save_method;
        $.ajax({
            url: url,
            type: "POST",
            data: $('#stamp_form').serialize() + "&<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>",
            dataType: "JSON",
            success: function (data) {
                if (data.status) {
                    $('#stamp_form_modal').modal('hide');
                    reload_table(emp_stamp_datatable);
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

</script>

