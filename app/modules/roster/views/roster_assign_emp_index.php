<?php
/**
 * Created by Earrow.
 * User:Kasun De Mel
 * Email:kasun@earrow.net
 * Date: 10/25/2019
 * Time: 1:56 PM
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

    #RosterInfo_filter{
        display: none;
    }

    .emp-tr:hover{
        background-color: #e3ffff;
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
                <li class="breadcrumb-item active">Assign Employees</li>
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
                <h4 class="page-head-title card-title  text-white" style="display: inline-block"> Assign Employees</h4>
                <button type="button" onclick="add_employee()" class="btn btn-success pull-right" ><i class="fa fa-plus"></i> Add Employees</button>

            </div>
            <div class="element-box">

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item"><a class="nav-link active" role="tab" href="#roster_emp" data-toggle="tab"> Assigned Employees</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content tabcontent-border">
                    <div class="tab-pane p-20 active" role="tabpanel" id="roster_emp">
                        <table class="table table-striped table-bordered table-hover table-header-fixed dt-responsive" id="RosterEmployees" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th class="all" style="width: 30px">#</th>
                                <th class="all">Month</th>
                                <th class="all">Department</th>
                                <th class="all">SUB Department</th>
                                <th class="all">Designation</th>
                                <th class="all">Employee Count</th>
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

                    <!-- Bootstrap modal -->
                    <div class="modal fade" id="employee_modal" role="dialog">
                        <div class="modal-dialog modal-full" style="max-width: 100%;margin:20px">
                            <div class="modal-content">
                                <div class="modal-header bg-blue-steel bg-font-blue-steel">
                                    <h6 id="employee_modal_title"></h6>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body form">
                                    <form action="#" id="employee_form" class="form-horizontal">
                                        <div class="row">
                                            <div class="col-md-12 table-responsive" style="overflow-x:auto;">
                                                <table class="tool" id="tools" style="width: 100%;position: static; visibility: visible;" border="0">
                                                    <tbody>
                                                    <tr>
                                                        <td>Month</td>
                                                        <td>
                                                            <input type="text" id="filter_month" name="filter_month" class="form-control month form-control-inline input-medium date-pick" size="16" data-date-format="yyyy-mm" style="width: 100px">
                                                            <span class="error-block"></span>
                                                        </td>
                                                        <td>Department</td>
                                                        <td>
                                                            <select name="filter_department" id="filter_department" class="form-control select2">
                                                                <option></option>
                                                            </select>
                                                            <span class="error-block"></span>
                                                        </td>
                                                        <td>Sub Department</td>
                                                        <td>
                                                            <select name="filter_sub_department" id="filter_sub_department" class="form-control select2">
                                                                <option></option>
                                                            </select>
                                                            <span class="error-block"></span>
                                                        </td>
                                                        <td>Designation</td>
                                                        <td>
                                                            <select name="filter_designation" id="filter_designation" class="form-control select2">
                                                                <option></option>
                                                            </select>
                                                            <span class="error-block"></span>
                                                        </td>
                                                        <td>Maximum Day Offs</td>
                                                        <td>
                                                            <input type="text" name="filter_loff" id="filter_loff" class="form-control numeric" placeholder="Local" title="Maximum Day off per Local Employee" style="width: 75px">
                                                            <span class="error-block"></span>
                                                        </td>
                                                        <td>
                                                            <input type="text" name="filter_foff" id="filter_foff" class="form-control numeric" placeholder="Foreign" title="Maximum Day off per Foreign Employee" style="width: 75px">
                                                            <span class="error-block"></span>
                                                        </td>
                                                        <td></td>
                                                        <td>
                                                            <button type="button" id="saveEmpBtn" onclick="get_employees()" class="btn btn-primary">Search</button>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </form>
                                    <form action="#" id="employee_save_form">

                                        <input type="hidden" name="emp_department">
                                        <input type="hidden" name="emp_sub_department">
                                        <input type="hidden" name="emp_designation">
                                        <input type="hidden" name="emp_month">

                                        <div id="view_employees_div" style="display: none">
                                            <table class="table" style="margin-top: 20px">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Gaming No</th>
                                                    <th>Name</th>
                                                    <th>Department</th>
                                                    <th>Designation</th>
                                                    <th>Nationality</th>
                                                    <th>Day Offs</th>
                                                    <th>
                                                        <input type="checkbox" id="emp-check" checked>
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody id="view_employees">

                                                </tbody>
                                            </table>
                                        </div>

                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" id="saveEmpBtn" onclick="save_employees()" class="btn btn-primary">Save</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="modal fade" id="edit_employees_modal" role="dialog">
                        <div class="modal-dialog modal-full" style="max-width: 1100px">
                            <div class="modal-content">
                                <div class="modal-header bg-blue-steel bg-font-blue-steel">
                                    <h6 id="employee_modal_title">Update Roster Employees</h6>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <form id="edit_employees_form" class="form-horizontal">
                                    <div class="modal-body form">
                                        <div class="row">
                                            <label class="control-label col-md-4" for="name" style='text-align: right;color:black;'><b>Month :</b></label>
                                            <div class="col-md-6" style="padding-left: 40px;padding-top: 5px">
                                                <span id="view_emp_month"></span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="control-label col-md-4" for="name" style='text-align: right;color:black;'><b>Department :</b></label>
                                            <div class="col-md-6" style="padding-left: 40px;padding-top: 5px">
                                                <span id="view_emp_department"></span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="control-label col-md-4" for="name" style='text-align: right;color:black;'><b>Sub Department :</b></label>
                                            <div class="col-md-6" style="padding-left: 40px;padding-top: 5px">
                                                <span id="view_emp_sub_department"></span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="control-label col-md-4" for="name" style='text-align: right;color:black;'><b>Designation :</b></label>
                                            <div class="col-md-6" style="padding-left: 40px;padding-top: 5px">
                                                <span id="view_emp_designation"></span>
                                            </div>
                                        </div>

                                        <input type="hidden" name="view_emp_department">
                                        <input type="hidden" name="view_emp_sub_department">
                                        <input type="hidden" name="view_emp_designation">
                                        <input type="hidden" name="view_emp_month">
                                        <input type="hidden" name="view_emp_ref_id">

                                        <div>
                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                <tbody>
                                                <tr>
                                                    <td>
                                                        <table id="dyTable" class="st-lumi-table table-bordered table-hover" width="100%">
                                                            <thead>
                                                            <th style="width: 20px;"><a  id="addButton" name="add_row" title="Add New Semester"><i class="fa fa-plus-circle" style="font-size: 15px"></i></a></th>
                                                            <th>Employee</th>
                                                            <th>Gaming No</th>
                                                            <th>Employee Name</th>
                                                            <th>Department</th>
                                                            <th>Sub Department</th>
                                                            <th>Designation</th>
                                                            <th>&nbsp;</th>
                                                            </thead>
                                                            <tbody id="emp-table-tbody"></tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <br>
                                        <div>
                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                <tbody>
                                                <tr>
                                                    <td>
                                                        <table class="st-lumi-table table-bordered table-hover" width="100%">
                                                            <thead>

                                                            <th style="width: 20px;">#</th>
                                                            <th>Gaming No</th>
                                                            <th>Name</th>
                                                            <th>Department</th>
                                                            <th>Sub Department</th>
                                                            <th>Designation</th>
                                                            <th>Nationality</th>
                                                            <th>Day Off</th>
                                                            <th>
                                                                <input type="checkbox" id="emp-check" checked>
                                                            </th>
                                                            </thead>
                                                            <tbody id="edit_employee_tbody">
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
                                    <button type="button" id="saveEmpBtn" onclick="update_employees()" class="btn btn-primary">Save</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <script type="text/javascript">

                        var save_method;
                        var RosterEmployees;

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

                            RosterEmployees = $('#RosterEmployees').DataTable({

                                "processing": true, //Feature control the processing indicator.
                                "serverSide": true, //Feature control DataTables' server-side processing mode.
                                // Load data for the table's content from an Ajax source
                                "ajax": {
                                    "data": {
                                        "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
                                    },
                                    "url": "<?php echo base_url()?>roster/roster_assign_emp_con/employees_list/",
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

                            RosterEmployees.on('order.dt search.dt', function () {
                                RosterEmployees.column(0, {search: 'applied', order: 'applied'}).nodes().each(function (cell, i) {
                                    cell.innerHTML = i + 1;
                                });
                            }).draw();

                            yadcf.init(RosterEmployees, [{
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

                        function add_employee(){

                            $('#view_employees_div').hide();
                            $('#view_employees').html('');

                            $('#filter_department').select2('destroy');

                            $('.error-block').empty();
                            save_method='add';
                            $('#employee_form')[0].reset();

                            //call department type function
                            get_master();

                            $('#filter_department').select2();

                            $('#employee_modal_title').html('Add Employee For Roster');
                            $('#employee_modal').modal({backdrop: 'static', keyboard: false});

                        }

                        function get_sub_departments(id){

                            $.ajax({

                                url: "<?php echo base_url('roster/roster_assign_emp_con/get_sub_department'); ?>/"+id,
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

                                    $('#filter_sub_department').html('<option value=" ">--Select Department--</option>');
                                    for(var i=0;i<data.sub_department.length;i++){
                                        $('#filter_sub_department').append('<option value="'+data.sub_department[i].id+'">'+data.sub_department[i].code+' - '+data.sub_department[i].desc+'</option>');
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

                                url: "<?php echo base_url('roster/roster_assign_emp_con/get_master'); ?>",
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

                                    $('#filter_department').html('<option value=" ">--Select Department--</option>');
                                    for(var i=0;i<data.department.length;i++){
                                        $('#filter_department').append('<option value="'+data.department[i].id+'">'+data.department[i].code+' - '+data.department[i].desc+'</option>');
                                    }

                                    $('#designation').html('<option value=" ">--Select Designation--</option>');
                                    for(var i=0;i<data.department.length;i++){
                                        $('#designation').append('<option value="'+data.designation[i].id+'">'+data.designation[i].code+' - '+data.designation[i].desc+'</option>');
                                    }

                                    $('#filter_designation').html('<option value=" ">--Select Designation--</option>');
                                    for(var i=0;i<data.department.length;i++){
                                        $('#filter_designation').append('<option value="'+data.designation[i].id+'">'+data.designation[i].code+' - '+data.designation[i].desc+'</option>');
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
                        $('#filter_department').change(function(){

                            get_sub_departments($(this).val());

                        });

                        $('#department').change(function(){

                            get_sub_departments($(this).val());

                        });
                    </script>

                    <script>

                        function view_roster(id){

                            $.ajax({

                                url: "<?php echo base_url('roster/roster_assign_emp_con/view_roster'); ?>/"+id,
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
                                callback: function (result) {

                                    if(result == true){

                                        $.ajax({

                                            url: "<?php echo base_url('roster/roster_assign_emp_con/delete_roster'); ?>/"+id,
                                            type: "POST",
                                            dataType: "JSON",
                                            data:{
                                                '<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>'
                                            },
                                            success:function(data){
                                                reload_table(RosterInfo);
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

                        function delete_employee(id){

                            bootbox.confirm({

                                title: "<h6>Delete Assigned Employee</h6>",
                                message: "" +
                                "<b>Do you want delete this assign ?</b>",
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

                                            url: "<?php echo base_url('roster/roster_assign_emp_con/delete_employee'); ?>/"+id,
                                            type: "POST",
                                            dataType: "JSON",
                                            data:{
                                                '<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>'
                                            },
                                            success:function(data){
                                                reload_table(RosterInfo);
                                                reload_table(RosterEmployees);
                                                if(data.status == true){
                                                    bootbox.alert("Assigned Roster deleted successfully !");
                                                }
                                                else{
                                                    bootbox.alert("Assigned Roster is Locked.Please reset selected department allocation & try!");
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

                    </script>

                    <script>

                        function get_employees(){

                            // $('#loading_modal').modal({backdrop:'static',keyboard:false});

                            $.ajax({

                                url: "<?php echo base_url('roster/roster_assign_emp_con/get_employees'); ?>",
                                type: "POST",
                                dataType: "JSON",
                                data:$("#employee_form").serialize()+ "&<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>",
                                success:function(data){

                                    $('#loading_modal').modal('hide');

                                    var html1='';

                                    $('[name="emp_department"]').val(data.other_info.department);
                                    $('[name="emp_sub_department"]').val(data.other_info.sub_department);
                                    $('[name="emp_designation"]').val(data.other_info.designation);
                                    $('[name="emp_month"]').val(data.other_info.month);

                                    if(data.employees){

                                        for(var i=0;i<data.employees.length;i++){

                                            html1 +='<tr class="emp-tr">'+
                                                '<td>' +
                                                '<input type="hidden" name="emp_id['+data.employees[i].emp_id+']" id="emp_id'+(i)+'" value="'+data.employees[i].emp_id+'">'+
                                                '<input type="hidden" name="employee_id['+data.employees[i].emp_id+']" id="employee_id'+(i)+'" value="'+data.employees[i].employee_id+'">'+
                                                '<input type="hidden" name="employee_name['+data.employees[i].emp_id+']" id="employee_name'+(i)+'" value="'+data.employees[i].employee_name+'">';
                                            if(data.employees[i].ref_id){
                                                html1+='<input type="hidden" name="emp_ref_id['+data.employees[i].emp_id+']" id="emp_ref_id'+(i)+'" value="'+data.employees[i].ref_id+'">';
                                            }
                                            else{
                                                html1+='<input type="hidden" name="emp_ref_id['+data.employees[i].emp_id+']" id="emp_ref_id'+(i)+'" value="0">';
                                            }
                                            html1+=''+(i+1)+''+
                                                '</td>' +
                                                '<td>'+(data.employees[i].employee_id ? data.employees[i].employee_id:"No Name")+'</td>'+
                                                '<td>'+(data.employees[i].employee_name ? data.employees[i].employee_name:"No Employee ID")+'</td>'+
                                                '<td>'+(data.employees[i].department_name ? data.employees[i].department_name:"No Department")+'</td>'+
                                                '<td>'+(data.employees[i].designation_name ? data.employees[i].designation_name:"No Designation")+'</td>';

                                            if(data.employees[i].nationality == 167){

                                                html1+='<td><span style="background-color: #31CC7D;color: white;border-radius: 5px">&nbsp;'+(data.employees[i].nationality_name ? data.employees[i].nationality_name:"No Nationality")+'&nbsp;</span></td>'+
                                                    '<td>'+(data.other_info.local_day ? data.other_info.local_day:"No Day Off")+'</td>'+
                                                    '<input type="hidden" name="emp_day_off['+data.employees[i].emp_id+']" id="emp_day_off'+(i)+'" value="'+data.other_info.local_day+'">';
                                            }
                                            else{
                                                html1+='<td><span style="background-color: #27c3ff;color: white;border-radius: 5px">&nbsp;'+(data.employees[i].nationality_name ? data.employees[i].nationality_name:"No Nationality")+'&nbsp;</span></td>'+
                                                    '<td>'+(data.other_info.foreign_day ? data.other_info.foreign_day:"No Day Off")+'</td>'+
                                                    '<input type="hidden" name="emp_day_off['+data.employees[i].emp_id+']" id="emp_day_off'+(i)+'" value="'+data.other_info.foreign_day+'">';
                                            }
                                            html1+='<td>'+
                                                '<input type="checkbox" class="emp-check" name="emp_check['+data.employees[i].emp_id+']" id="emp_check'+(i)+'" checked>' +
                                                '</td>'+
                                                '</tr>';
                                        }

                                        $('#view_employees').html(html1);
                                        $('#view_employees_div').show();

                                    }

                                    if(data.message !=""){

                                        bootbox.alert({
                                            message: "<b style='text-align:center;color: red'>"+data.message+"</b>"
                                        });

                                    }
                                },
                                error: function (jqXHR, textStatus, errorThrown){

                                    $('#loading_modal').modal('hide');
                                    console.log(jqXHR);
                                    console.log(textStatus);
                                    console.log(errorThrown);

                                }
                            });
                        }


                        $("#emp-check").click(function(){

                            $(".emp-check").prop('checked', $(this).prop('checked'));

                        });


                        function save_employees(){

                            $('#loading_modal').modal({backdrop:'static',keyboard:false});

                            $.ajax({

                                url: "<?php echo base_url('roster/roster_assign_emp_con/save_employees'); ?>",
                                type:"POST",
                                dataType: "JSON",
                                data:$("#employee_save_form").serialize()+ "&<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>",
                                success:function(data){

                                    $('#loading_modal').modal('hide');

                                    if(data.status == true){

                                        bootbox.alert({
                                            message: "<b style='text-align:center;color: #070a24'>"+data.message+"</b>"
                                        });

                                    }else{

                                        bootbox.alert({
                                            message: "<b style='text-align:center;color: red'>"+data.message+"</b>"
                                        });

                                    }

                                    reload_table(RosterEmployees);
                                    $('#employee_modal').modal('hide');

                                },
                                error: function (jqXHR, textStatus, errorThrown){

                                    bootbox.alert({
                                        message: "<b style='text-align:center;color: red'>"+data.message+"</b>"
                                    });

                                    reload_table(RosterEmployees);
                                    $('#loading_modal').modal('hide');
                                    console.log(jqXHR);
                                    console.log(textStatus);
                                    console.log(errorThrown);

                                }

                            });

                        }

                        var counter=0;

                        function edit_employees(id){

                            $('#emp-table-tbody').html('');
                            counter=0;

                            $.ajax({

                                url: "<?php echo base_url('roster/roster_assign_emp_con/edit_employees'); ?>/"+id,
                                type:"POST",
                                dataType: "JSON",
                                data:{
                                    "<?php echo $this->security->get_csrf_token_name(); ?>":"<?php echo $this->security->get_csrf_hash(); ?>"
                                },
                                success:function(data){

                                    $('[name="view_emp_ref_id"]').val(id);
                                    $('[name="view_emp_month"]').val(data.assign.month);
                                    $('[name="view_emp_department"]').val(data.assign.department);
                                    $('[name="view_emp_sub_department"]').val(data.assign.sub_department);
                                    $('[name="view_emp_designation"]').val(data.assign.designation);

                                    $('#view_emp_month').html(data.assign.month);
                                    $('#view_emp_department').html(data.assign.department_name);
                                    $('#view_emp_sub_department').html(data.assign.sub_department_name);
                                    $('#view_emp_designation').html(data.assign.designation_name);

                                    var html1='';

                                    for(var i=0;i<data.employees.length;i++){

                                        html1 +='<tr>'+
                                            '<td>' +
                                            '<input type="hidden" name="edit_emp_id['+data.employees[i].emp_id+']" id="edit_emp_id'+(i)+'" value="'+data.employees[i].emp_id+'">';
                                        html1+=''+(i+1)+''+
                                            '</td>' +
                                            '<td>'+(data.employees[i].employee_id ? data.employees[i].employee_id:"No Name")+'</td>'+
                                            '<td>'+(data.employees[i].employee_name ? data.employees[i].employee_name:"No Employee ID")+'</td>'+
                                            '<td>'+(data.assign.department_name ? data.assign.department_name:"No Department")+'</td>'+
                                            '<td>'+(data.assign.designation_name ? data.assign.designation_name:"No Designation")+'</td>';

                                        if(data.employees[i].nationality == 167){
                                            html1+='<td><span style="background-color:#31CC7D;color: white;border-radius: 5px">&nbsp;'+(data.employees[i].nationality_name ? data.employees[i].nationality_name:"No Nationality")+'&nbsp;</span></td>';
                                        }
                                        else{
                                            html1+='<td><span style="background-color:#27c3ff;color: white;border-radius: 5px">&nbsp;'+(data.employees[i].nationality_name ? data.employees[i].nationality_name:"No Nationality")+'&nbsp;</span></td>';
                                        }
                                        html1+='<td>'+(data.employees[i].day_offs ? data.employees[i].day_offs:"No Day Off")+'</td>'+
                                            '<td>'+
                                            '<input type="checkbox" class="emp-check" name=edit_emp_check['+data.employees[i].emp_id+']" id="emp_check'+(i)+'" checked>' +
                                            '</td>'+
                                            '</tr>';

                                    }

                                    $('#edit_employee_tbody').html(html1);
                                    $('#edit_employees_modal').modal({backdrop:'static',keyboard:false});

                                },
                                error: function (jqXHR, textStatus, errorThrown){

                                    console.log(jqXHR);
                                    console.log(textStatus);
                                    console.log(errorThrown);

                                }
                            });

                        }

                        $("#addButton").click(function(){

                            if(counter>500){
                                alert("Only 500 text boxes allowed");
                                return false;
                            }

                            var dyTable = $(document.createElement('tr')).attr("id", 'row_' + counter).attr("class", 'row_dyn');

                            dyTable.after().html(''+
                                '<td></td>' +
                                '<td style="width:200px">'+
                                '<select style="height: 35px;" name="add_emp_id['+counter+']" id="add_emp_id'+counter+'" class="employee-info form-control select2">'+
                                '</select>'+
                                '</td>'+
                                '<td>' +
                                '<input type="text" readonly name="add_emp_game['+counter+']" id="add_emp_game'+counter+'" class="form-control">' +
                                '</td>'+
                                '<td>' +
                                '<input type="text" readonly name="add_emp_name['+counter+']" id="add_emp_name'+counter+'" class="form-control">' +
                                '</td>'+
                                '<td>' +
                                '<input type="text" readonly name="add_emp_department['+counter+']" id="add_emp_department'+counter+'" class="form-control">' +
                                '</td>'+
                                '<td>' +
                                '<input type="text" readonly name="add_emp_sub_department['+counter+']" id="add_emp_sub_department'+counter+'" class="form-control">' +
                                '</td>'+
                                '<td>' +
                                '<input type="text" readonly name="add_emp_designation['+counter+']" id="add_emp_designation'+counter+'" class="form-control">' +
                                '<input type="hidden" readonly name="add_emp_nationality['+counter+']" id="add_emp_nationality'+counter+'" class="form-control">' +
                                '<input type="hidden" readonly name="add_emp_gender['+counter+']" id="add_emp_gender'+counter+'" class="form-control">' +
                                '</td>'+
                                '<td>' +
                                '<i class="icon-trash tip del" id="' +counter+ '" title="Remove This Item" style="cursor:pointer;" data-placement="right"></i>' +
                                '</td>' +
                                '');

                            dyTable.appendTo("#dyTable");
                            get_master_employees(counter,$('[name="view_emp_month"').val(),$('[name="view_emp_department"').val(),$('[name="view_emp_sub_department"').val(),$('[name="view_emp_designation"').val());

                            counter++;

                        });

                        $("table#dyTable").on("click", '.del', function()
                        {
                            var delID = $(this).attr('id');
                            row_id = $("#row_" + delID);
                            row_id.remove();
                        });

                        $("table#dyTable").on("change",'.employee-info',function(){

                            var emp_id=$(this).attr('id');
                            var last=emp_id.substr(emp_id.length - 1);

                            $.ajax({

                                url:"<?php echo base_url(); ?>roster/roster_assign_emp_con/get_employees_info",
                                type:"POST",
                                dataType:"JSON",
                                data:{

                                    id:$("#"+emp_id).val(),
                                    "<?php echo $this->security->get_csrf_token_name(); ?>":"<?php echo $this->security->get_csrf_hash(); ?>"

                                },
                                success:function(data){

                                    if(data.employees){

                                        console.log("#add_emp_game"+last);

                                        $("#add_emp_game"+last).val(data.employees.employee_id);
                                        $("#add_emp_name"+last).val(data.employees.employee_name);
                                        $("#add_emp_department"+last).val(data.employees.department_name);
                                        $("#add_emp_sub_department"+last).val(data.employees.sub_department_name);
                                        $("#add_emp_designation"+last).val(data.employees.designation_name);
                                        $("#add_emp_nationality"+last).val(data.employees.nationality);
                                        $("#add_emp_gender"+last).val(data.employees.gender);

                                    }
                                },
                                error:function (){

                                    console.log('error');
                                }

                            });

                        });

                        function get_master_employees(i,month,department,sub_department,designation){

                            $.ajax({

                                url:"<?php echo base_url(); ?>roster/roster_assign_emp_con/get_master_employees",
                                type:"POST",
                                dataType:"JSON",
                                data:{
                                    month:month,
                                    department:department,
                                    sub_department:sub_department,
                                    designation:designation,
                                    "<?php echo $this->security->get_csrf_token_name(); ?>":"<?php echo $this->security->get_csrf_hash(); ?>"
                                },
                                success:function(data){

                                    $('#add_emp_id'+i).html('<option value="">Select Employee</option>');
                                    for(var j=0;j<data.employees.length;j++){
                                        $('#add_emp_id'+i).append('<option value="'+data.employees[j].id+'">'+data.employees[j].employee_id+' - '+data.employees[j].employee_name+'</option>');
                                    }
                                },
                                error:function (){

                                    console.log('error');
                                }
                            });
                        }

                        function update_employees(){

                            $.ajax({

                                url: "<?php echo base_url('roster/roster_assign_emp_con/update_employees'); ?>",
                                type:"POST",
                                dataType: "JSON",
                                data:$("#edit_employees_form").serialize()+ "&<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>",
                                success:function(data){

                                    $('#loading_modal').modal('hide');

                                    if(data.status == true){

                                        bootbox.alert({
                                            message: "<b style='text-align:center;color: #070a24'>"+data.message+"</b>"
                                        });

                                    }else{

                                        bootbox.alert({
                                            message: "<b style='text-align:center;color: red'>"+data.message+"</b>"
                                        });

                                    }

                                    reload_table(RosterEmployees);
                                    $('#edit_employees_modal').modal('hide');

                                },
                                error: function (jqXHR, textStatus, errorThrown){

                                    bootbox.alert({
                                        message: "<b style='text-align:center;color: red'>"+data.message+"</b>"
                                    });


                                    reload_table(RosterEmployees);
                                    $('#loading_modal').modal('hide');
                                    console.log(jqXHR);
                                    console.log(textStatus);
                                    console.log(errorThrown);

                                }

                            });

                        }

                    </script>

