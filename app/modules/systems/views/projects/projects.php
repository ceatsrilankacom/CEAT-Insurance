<style>
    .help-block{
        color:red;
    }
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
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"></h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Projects</li>
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
                <h4 class="page-head-title card-title  text-white" style="display: inline-block"> Projects Management</h4>
                <button class="btn btn-success pull-right" onclick="add_project()" style="margin-right: 10px"><i class="fa fa-plus-circle"></i> Add Project</button>
                <button class="btn btn-success pull-right" onclick="add_employee_project()" style="margin-right: 10px"><i class="fa fa-plus-circle"></i> Assign Employee</button>
            </div>
            <div class="element-box">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#projects" role="tab"><i class="fa fa-list"></i> Projects</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#employeeProjects" role="tab"><i class="fa fa-tasks"></i> Employee Projects</a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content tabcontent-border">
                    <div class="tab-pane active" id="projects" role="tabpanel">
                        <!--<div class="btn-group pull-right">
                            <button class="btn btm-sm btn-default" onclick="reload_table(projectsDataTable)"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
                        </div>-->

                        <div class="tools"> </div>
                        <table class="table table-striped table-bordered table-hover table-header-fixed dt-responsive" id="projectsTable" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th class="all">Project/Class Code</th>
                                <th class="all">Project/Class Name</th>
                                <th class="desktop">Type</th>
                                <th class="min-tablet">Status</th>
                                <th class="none">Start Date</th>
                                <th class="none">End Date (Estimate)</th>
                                <th class="none">Description</th>
                                <th class="all text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane" id="employeeProjects" role="tabpanel">
                        <!--<div class="btn-group pull-right">

                            <button class="btn btm-sm btn-default" onclick="reload_table(employeeProjectsDataTable)"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
                        </div>-->
                        <div class="tools"> </div>
                        <table class="table table-striped table-bordered table-hover table-header-fixed dt-responsive" id="employeeProjectsTable" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th class="all">#</th>
                                <th class="all">Employee - First Name</th>
                                <th class="all">Employee - Last Name</th>
                                <th class="all">Project</th>
                                <th class="all">Module</th>
                                <th class="all">Work Type</th>
                                <th class="all">Work Description</th>
                                <th class="min-tablet">Status</th>
                                <th class="min-tablet">Assign Date</th>
                                <th class="min-tablet">Expected Date</th>
                                <th class="min-tablet">Completed Date</th>
                                <th class="min-tablet">Description</th>
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
</div>

<!-- Bootstrap modal -->
<div class="modal fade" id="project_modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 id="project_modal_title">Project</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body form">
                <form action="#" id="project_form" class="form">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-12">
                                <?php foreach($form['hr_pay_employee_projects'] as $project)
                                {
                                    echo $project['hidden_field'];
                                    ?>
                                    <div class="form-group">
                                        <label class="control-label"><?php echo $project['label'] ?></label>
                                        <?php echo $project['form_field'] ?>
                                        <span class="help-block"></span>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save('#btnSave','#project_form','#project_modal')" class="btn btn-success">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->
<!-- Bootstrap modal -->
<div class="modal fade" id="employee_project_modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 id="employee_project_modal_title">Employee Project</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body form">
                <form action="#" id="employee_project_form" class="form">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-12">
                                <?php foreach($form['hr_pay_employee_projects_assign'] as $employee_project)
                                {
                                    ?>
                                    <div class="form-group">
                                        <label class="control-label"><?php echo $employee_project['label'] ?></label>
                                        <?php echo $employee_project['form_field'] ?>
                                        <span class="help-block"></span>
                                    </div>
                                <?php } ?>
                                <div class="form-group">
                                    <label class="control-label">Send Email</label>
                                    <input id="send_email" name="send_email" type="checkbox" value="1">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save('#btnSave','#employee_project_form','#employee_project_modal')" class="btn btn-success">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->




<script>
    var projectsDataTable,
        employeeProjectsDataTable,
        save_method,
        current_data_table;

    $(document).ready(function(){
        //dataTables

        projectsDataTable = $('#projectsTable').DataTable({
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo base_url()?>systems/projects/ajax_list_projects_data",
                "type": "POST",
                "data": {
                    "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
                }
            },
            //Set column definition initialisation properties.
            "columnDefs": [
                {
                    "targets": [ -1 ], //last column
                    "orderable": false //set not orderable
                }
            ],
            // Internationalisation. For more info refer to http://datatables.net/manual/i18n
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
            buttons: [
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
            // setup responsive extension: http://datatables.net/extensions/responsive/
            responsive: true,
            // setup rowreorder extension: http://datatables.net/extensions/fixedheader/
            "order": [
                [0, 'desc']
            ],
            "lengthMenu": [
                [5, 10, 15, 20, -1],
                [5, 10, 15, 20, "All"] // change per page values here
            ],
            // set the initial value
            "pageLength": 20,
            "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>" // horizobtal scrollable datatable
        });

        employeeProjectsDataTable = $('#employeeProjectsTable').DataTable({
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo base_url()?>systems/projects/ajax_list_employee_project_data",
                "type": "POST",
                "data": {
                    "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
                }
            },
            "aoColumns": [
            null,  null, null,  null, null, null, null, null, null, null,null,null,
                { "bSortable": false,"bSearchable": false }
            ],
            //Set column definition initialisation properties.
            "columnDefs": [
                {
                    "targets": [ -1 ], //last column
                    "orderable": false //set not orderable
                }
            ],
            // Internationalisation. For more info refer to http://datatables.net/manual/i18n
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
            buttons: [
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
            // setup responsive extension: http://datatables.net/extensions/responsive/
            responsive: true,
            // setup rowreorder extension: http://datatables.net/extensions/fixedheader/
            "order": [
                [1, 'desc']
            ],
            "lengthMenu": [
                [5, 10, 15, 20, -1],
                [5, 10, 15, 20, "All"] // change per page values here
            ],
            // set the initial value
            "pageLength": 20,
            "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>" // horizobtal scrollable datatable
        });

        //set input/textarea/select event when change value, remove class error and remove text help block
        $("input").change(function(){
            $(this).parent().removeClass('has-error');
            $(this).next("span").empty();
        });
        $("textarea").change(function(){
            $(this).parent().removeClass('has-error');
            $(this).next("span").empty();
        });
        /*$("select").change(function(){
            $(this).parent().removeClass('has-error');
            $(this).next("span").empty();
        });*/

        $("form :input:not(.input-optional, .input-hidden)").each(function(){
            $(this).siblings('label').append("<span class='required-mark' style='color: #c90054;'>*</span>");
        });

        $("form.form").each(function(){
            var form_id = $(this).prop('id');
            if($("#" + form_id + " div.form-group").size() > 4)
            {
                var divide_after = Math.ceil(($("#" + form_id + " div.form-group").size() - 1)/2);
                var html = "</div><div class='col-md-6'>";
                $("#" + form_id + " div.form-group:gt(" + divide_after + ")").detach().wrapAll("<div class='col-md-6'></div>").parent().insertAfter($("#" + form_id + " div.form-group:eq(" + divide_after + ")").parent());
            }
            $("#" + form_id + " input.input-hidden").parent().hide();
            $("#" + form_id + " input.date-input").datepicker({
                format: "yy-mm-dd"
            });
        });

        $('.modal').on('hidden.bs.modal', function (e) {
            $(this).find("form")[0].reset();
            if($('.modal').hasClass('in')) {
                $('body').addClass('modal-open');
            }
        });



    });

    $(function() {
        $('#start_date').datepicker({
            format: "yyyy-m-d",
            autoclose:true
        });
        $('#end_date').datepicker({
            format: "yyyy-m-d",
            autoclose:true
        });

        $("#start_date").on("changeDate", function (e) {
            $('#start_date').datepicker('setStartDate');
            $('#end_date').datepicker('setStartDate', e.date);
        });
        $("#end_date").on("changeDate", function (e) {
            $('#start_date').datepicker('setEndDate', e.date);
        });
        /*$(".date-input").datepicker({
            format: "yyyy-m-d",
            autoclose:true
        });*/
        $('#assign_date').datepicker({
            format: "yyyy-m-d",
            autoclose:true
        });
        $('#completed_date').datepicker({
            format: "yyyy-m-d",
            autoclose:true
        });
        $('#expected_date').datepicker({
            format: "yyyy-m-d",
            autoclose:true
        });

        $("#assign_date").on("changeDate", function (e) {
            $('#assign_date').datepicker('setStartDate');
            $('#completed_date').datepicker('setStartDate', e.date);
        });
        $("#completed_date").on("changeDate", function (e) {
            $('#assign_date').datepicker('setEndDate', e.date);
        });
    });

    function reload_table(table_name)
    {
        if(typeof table_name !== "undefined")
        {
            table_name.ajax.reload(null,false); //reload datatable ajax
        }
    }

    function add_project()
    {
        save_method = 'add_project';
        current_data_table = projectsDataTable;
        $('#project_form')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string
        $('#project_modal').modal('show'); // show bootstrap modal
        $('#project_modal_title').text('Add New Project'); // Set Title to Bootstrap modal title
    }
    function edit_project(id)
    {
        save_method = 'edit_project';
        current_data_table = projectsDataTable;
        $('#project_form')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string

        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo base_url()?>systems/projects/ajax_get_project/" + id,
            type: "POST",
            data: {
                "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
            },
            dataType: "JSON",
            success: function(data)
            {
                for(var key in data)
                {
                    $('[name="' + key + '"]').val(data[key]);
                }
                $('#project_modal').modal('show'); // show bootstrap modal when complete loaded
                $('#project_modal_title').text('Edit Project: Project ID: ' + data.project_id); // Set title to Bootstrap basic modal title
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                bootbox.alert('Error get data from ajax');
            }
        });
    }

    function add_employee_project()
    {
        save_method = 'add_employee_project';
        current_data_table = employeeProjectsDataTable;
        $('#employee_project_form')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string
        $('#employee_project_modal').modal('show'); // show bootstrap modal
        $('#employee_project_modal_title').text('Assign Employee to Project'); // Set Title to Bootstrap modal title
    }
    function edit_employee_project(id)
    {
        save_method = 'edit_employee_project';
        current_data_table = employeeProjectsDataTable;
        $('#employee_project_form')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string

        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo base_url()?>systems/projects/ajax_get_employee_project/" + id,
            type: "POST",
            data: {
                "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
            },
            dataType: "JSON",
            success: function(data)
            {
                for(var key in data)
                {
                    if(key == "id")
                    {
                        $('[name="employee_project_id"]').val(data[key]);
                    }
                    else
                    {
                        $('[name="' + key + '"]').val(data[key]);
                    }
                }
                $('#employee_project_modal').modal('show'); // show bootstrap modal when complete loaded
                $('#employee_project_modal_title').text('Edit Employee Project Assign: ID: ' + data.employee_project_id); // Set title to Bootstrap basic modal title
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    }

    function save(button, form_data, modal)
    {
        $(button).text('Saving...'); //change button text
        $(button).attr('disabled',true); //set button disable
        var arr = save_method.split(/_(.+)/);
        var php_function = "ajax_save_" + arr[1] + "/" + arr[0];
        var url = "<?php echo base_url()?>systems/projects/" + php_function + "/";
        // ajax adding data to database

        $.ajax({
            url : url,
            type: "POST",
            data: $(form_data).serialize() + "&<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>",
            dataType: "JSON",
            success: function(data)
            {
                console.log(data);
                if(data.status) //if success close modal and reload ajax table
                {
                    $(modal).modal('hide');
                    reload_table(current_data_table);
                    if(php_function == 'add_project' || php_function == 'edit_project'){
                        window.location = "<?php echo base_url('systems/projects')?>";
                    }
                }
                else
                {
                    if(data.message)
                    {
                        alert(data.message);
                    }
                    if(data.inputerror)
                    {
                        for (var i = 0; i < data.inputerror.length; i++)
                        {
                            $('[name="'+data.inputerror[i]+'"]').parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                            $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                        }
                    }
                }
                $(button).text('Save'); //change button text
                $(button).attr('disabled',false); //set button enable
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error saving data');
                $(button).text('Save'); //change button text
                $(button).attr('disabled',false); //set button enable
            }
        });
    }
</script>



