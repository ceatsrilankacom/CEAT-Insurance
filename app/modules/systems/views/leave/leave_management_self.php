
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
    .embedded-daterangepicker .daterangepicker .drp-calendar {
        width: 48% !important;
        max-width: 50%;
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
                <li class="breadcrumb-item active">Leave Management - Self</li>
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
                <h4 class="page-head-title card-title  text-white" style="display: inline-block">Leave Management</h4>
                <button type="button" class="btn btn-success pull-right" onclick='apply_leave();' ><i class="fa fa-plus-circle"></i> Apply Leave</button>
            </div>
            <div class="element-box">
                <table class="table table-striped table-bordered table-hover table-header-fixed dt-responsive" id="allLeavesTable" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th class="all" style="width: 30px">Leave Application ID</th>
                        <th class="desktop">Leave Reason</th>
                        <th class="all">Leave Type</th>
                        <th class="desktop">Leave Start Date</th>
                        <th class="desktop">Leave End Date</th>
                        <th class="desktop">Days</th>
                        <th class="all">Reason :</th>
                        <th class="desktop">Leave Status</th>
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

<!-- Bootstrap modal -->
<div class="modal fade" id="leave_apply_modal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-blue-steel bg-font-blue-steel">
                <h3 class="modal_title" id="leave_apply_modal_title">Apply Leave</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row" id="leave_form_1">
                    <div class="col-md-12">
                        <form enctype="multipart/form-data" id="leave_apply_form" class="form-horizontal">
                            <div class="form-body">
                                <input type="hidden"  name="employee_name" id="employee_name" value="<?php echo USER_ID ?>">
                                <div class="form-group row">
                                    <label class="control-label col-md-4" for="leave_type_id">Leave Type</label>
                                    <div class="col-md-8">
                                        <select name="leave_type" id="leave_type_id" class="form-control noSelect2">
                                        </select>
                                        <span class="help-block"></span>
                                        <div id="leave_details">
                                            <span  class="label label-sm label-megna">Leave  Period</span> <span id="leave_period"></span> <hr style="margin: 5px 0;">
                                            <span class="label label-sm label-info">Leave Entitlement</span> <span id="leave_entitlement"></span> <span  class="label label-sm label-success">Leave  Taken</span> <span id="leave_taken"></span> <span  class="label label-sm label-warning">Leave Balance</span> <span id="leave_balanace"></span></div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-4" for="leave_end_date">Leave Day(s)</label>
                                    <div class="col-md-8">
                                        <input id="leave_date_range" type="hidden">
                                        <div id="leave_date_range-container" class="embedded-daterangepicker"></div>

                                        <input type="hidden" name="start_date" id="leave_start_date" class="form-control form-control-inline input-medium" size="16" data-date-format="yyyy-mm-dd">
                                        <input type="hidden" name="end_date" id="leave_end_date" class="form-control form-control-inline input-medium" size="16" data-date-format="yyyy-mm-dd">

                                        <span id="daterangepicker-result" style="padding: 10px;display: block;font-weight: 700;color: #fff;background: #537770;"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-4" for="leave_reason">Reason for Leave</label>
                                    <div class="col-md-8">
                                        <textarea name="leave_reason" id="leave_reason" class="form-control"></textarea>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group row" id="selectAttachment">
                                    <label class="control-label col-md-4" for="leave_attachment">Attachment<br><p style="font-size: 10px">(If you wish to submit any document related to your leave, attach it here. If not leave blank.)</p></label>
                                    <div class="col-md-8" id="attachment">
                                        <input type="file" name="attachment" id="leave_attachment" class="form-control input-optional" placeholder="PDF,JPG,PNG">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row" id="leave_form_2" style="display: none;">
                    <div class="col-md-8">
                        <div class="form-body">
                            <div id="leave_summary_detail">
                                <h4>Leave Summary</h4>
                                <div id="leave_summary"></div>
                            </div>
                            <div id="selected_leave_dates">
                                <h4>Selected Leave Dates</h4>
                                <form action="#" id="leave_day_types_form" class="form-horizontal">
                                    <table class="table table-striped table-bordered table-advance table-hover">
                                        <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Leave Type of Day</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSaveLeave" class="btn btn-success">Continue</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->
<!-- Bootstrap modal -->
<div class="modal fade" id="show_leave_days_modal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-blue-steel bg-font-blue-steel">
                <h3 class="modal_title" id="show_leave_days_modal_title">Leave Days</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <table id="leave_days" class="table table-striped table-bordered table-advance table-hover">
                            <thead>
                            <tr>
                                <th>Leave Date</th>
                                <th>Leave Day Type</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6 col-sm-12" id="attachment_div" style="margin-top: 10px">

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->

<script>

    $(document).ready(function () {

        // init daterangepicker
        var picker = $('#leave_date_range').daterangepicker({
            "parentEl": "#leave_date_range-container",
            "autoApply": true,
            locale: {
                format: 'YYYY-MM-DD'
            }
        });

        // range update listener
        picker.on('apply.daterangepicker', function (ev, picker) {
            //var from_date = start.format('YYYY-MM-DD'), upto_date = end.format('YYYY-MM-DD');
            $('#leave_start_date').val(picker.startDate.format('YYYY-MM-DD'));
            $('#leave_end_date').val(picker.endDate.format('YYYY-MM-DD'));
            $("#daterangepicker-result").html('' + picker.startDate.format('YYYY-MM-DD') + ' to ' + picker.endDate.format('YYYY-MM-DD'));
        });
// prevent hide after range selection
        picker.data('daterangepicker').hide = function () {
        };
// show picker on load
        picker.data('daterangepicker').show();



        $('#leave_type_id').change(function () {
            $('#leave_entitlement').html('');
            $('#leave_taken').html('');
            $('#leave_balanace').html('');
            $('#leave_period').html('');
            $('#leave_leave').html('');
            var emp_id = $('#employee_name').val();
            var leave_id = $('#leave_type_id').val();
            $.ajax({
                url: "<?php echo site_url('systems/leave_management_con/load_leave_balances'); ?>",
                type: "POST",
                data: {
                    "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash()?>",
                    "emp_id": emp_id,"leave_id":leave_id
                },
                dataType: "JSON",
                success: function (data) {
                    if(data.status=='true') {
                        $('#leave_entitlement').html(data.leave_entitlement);
                        $('#leave_taken').html(data.leave_taken);
                        $('#leave_balanace').html(data.leave_balance);
                        $('#leave_period').html(data.leave_period);
                    }else{

                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    //bootbox.alert('Error Retrieve');
                }
            });
            $('#loader').hide();
            $('#button').show();
            //$('#tableData').paging({limit: 10});
        });

    });

    var allLeavesDataTable,
        current_data_table,
        form_validation = true;
    file_validation = true;

    $(document).ready(function(){
        //dataTables

        allLeavesDataTable = $('#allLeavesTable').DataTable({
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            // Load data for the table's content from an Ajax source
            "ajax": {
                "data": {
                    "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
                },
                "url": "<?php echo base_url()?>systems/leave_self_management/ajax_list_all_leaves/",
                "type": "POST"
            },
            //Set column definition initialisation properties.

            "columnDefs": [
                {
                    "targets": [ -1 ], //last column
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

        //load_list
        $.ajax({
            async: false,
            url: "<?php echo site_url('systems/leave_self_management/load_leave_type_list'); ?>",
            type: "POST",
            data: {
                "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash() ?>"
            },
            dataType: "JSON",
            success: function(data)
            {
                $('#leave_type_id').html("<option value=''></option>");
                $.each(data, function(id,name)
                {
                    var opt = $('<option />');
                    opt.val(id);
                    opt.text(name);
                    $('#leave_type_id').append(opt);
                });
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from Leave Types');
            }
        });

        //set input/textarea/select event when change value, remove class error and remove text help block
        $("input").change(function(){
            $(this).parent().parent().removeClass('has-error');
            $(this).next("span").empty();
        });
        $("textarea").change(function(){
            $(this).parent().parent().removeClass('has-error');
            $(this).next("span").empty();
        });
        $("select").change(function(){
            $(this).parent().parent().removeClass('has-error');
            $(this).next("span").empty();
        });

        $("form :input:not(.input-optional, .input-hidden)").each(function(){
            $(this).parent().siblings('label').append("<span class='required-mark' style='color: #c90054;'>*</span>");
        });

        $("form.form").each(function(){
            var form_id = $(this).prop('id');

            $("#" + form_id + " input.date-input").datepicker();
        });

        $('.modal').on('hidden.bs.modal', function (e) {
            if($(this).find("form")[0])
            {
                $(this).find("form")[0].reset();
            }
            if($('.modal').hasClass('in')) {
                $('body').addClass('modal-open');
            }
        });
        $('#leave_apply_modal').on('click', '#backButton', function (e) {
            $("#backButton").remove();
            $("#leave_form_2").hide();
            $("#leave_day_types_form table tbody").html("");
            $("#leave_form_1").show();
        });
        $('#leave_apply_modal').on('hidden.bs.modal', function (e) {
            $("#backButton").remove();
            $("#leave_form_2").hide();
            $("#leave_day_types_form table tbody").html("");
            $("#leave_form_1").show();
        });

        $(".portlet.box .dataTables_wrapper .dt-buttons").css({"margin-top": "-78px"});

        $("#leave_attachment").on('change', function() {
            $("#leave_attachment").siblings('span').html(""); // To remove the previous error message
            $("#leave_attachment").siblings('span').removeClass('alert alert-success alert-danger fade in');
            file_validation = true;
            var file = this.files[0];
            if(this.value == "")
            {
                $("#leave_attachment").siblings('span').html("");
                $("#leave_attachment").siblings('span').removeClass('alert alert-success alert-danger fade in');
                file_validation = true;
            }
            else
            {
                $.fn.hasExtension = function(exts) {
                    return (new RegExp('(' + exts.join('|').replace(/\./g, '\\.') + ')$', "i")).test($(this).val());
                };
                var allowedExts = [".jpeg", ".jpg", ".png", ".bmp", ".pdf", ".doc", ".docx", ".txt", ".zip"];
                if (!$("#leave_attachment").hasExtension(allowedExts) || this.files[0].size > 5242880)
                {
                    $("#leave_attachment").siblings('span').html("Invalid file type or file size. <br> " + allowedExts.join(", ") + " file types only are allowed. <br> Also, maximum file size allowed is " + 5242880 / 1024 / 1024 + " MB.");
                    $("#leave_attachment").siblings('span').addClass('alert alert-danger fade in');
                    file_validation = false;
                }
            }
        });

        $('#leave_start_date').datepicker();
        $('#leave_end_date').datepicker();
        $("#leave_start_date").on("changeDate", function (e) {
            $('#leave_start_date').datepicker('setStartDate');
            $('#leave_end_date').datepicker('setStartDate', e.date);
        });
        $("#leave_end_date").on("changeDate", function (e) {
            $('#leave_start_date').datepicker('setEndDate', e.date);
        });

        $("#btnSaveLeave").on('click', function(){
            save_leave_application('#btnSaveLeave','#leave_apply_form','#leave_apply_modal');
        })
    });

    function reload_table(table_name)
    {
        if(typeof table_name !== "undefined")
        {
            table_name.ajax.reload(null,false); //reload datatable ajax
        }
    }

    function apply_leave()
    {
        current_data_table = allLeavesDataTable;
        $('#leave_apply_form')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $("#leave_attachment").addClass('input-optional');
        $('.help-block').empty(); // clear error string
        //$('#employee_name').select2();
        $('#leave_apply_modal').modal('show'); // show bootstrap modal
        $('#leave_apply_modal_title').text('Apply Leave'); // Set Title to Bootstrap modal title
    }


    function show_leave_days(id)
    {
        current_data_table = allLeavesDataTable;
        $('.form-group').removeClass('has-error'); // clear error class
        $("#show_leave_days_modal_title").html("Leave Days");
        $('.help-block').empty(); // clear error string

        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo base_url()?>systems/leave_self_management/ajax_get_leave_days_by_leave_application_id/" + id,
            type: "POST",
            data: {
                "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
            },
            dataType: "JSON",
            success: function(data)
            {
                var leave_days_html = "";

                $.each(data.leave_days, function(key, leave_day){
                    leave_days_html+= "<tr>";
                    leave_days_html+= "<td>" + leave_day.leave_date + "</td>";
                    leave_days_html+= "<td>" + leave_day.leave_day_type + "</td>";
                    leave_days_html+= "</tr>";
                });
                $("#leave_days tbody").html(leave_days_html);

                //Start Leave attachment view code
                var html1='';

                if(data.leave_attachment != 0){

                    html1 +='<table id="leave_days" class="table table-striped table-bordered table-advance table-hover">'+
                        '<thead>' +
                        '<tr>' +
                        '<th style="text-align:center;">Leave Attachment</th>' +
                        '</tr>' +
                        '</thead>' +
                        '<tbody>' +
                        '<tr>' +
                        '<td style="text-align:center;"><a class="btn btn-sm btn-success" target="_blank" href="<?php echo base_url();?>uploads/leave/'+data.leave_attachment.path+'">VIEW LEAVE ATTACHMENT</a></td>' +
                        '</tr>' +
                        '</tbody>' +
                        '</table>';

                    $("#attachment_div").html(html1);
                }
                else{
                    $("#attachment_div").html('');
                }
                //end Leave attachment view code

                $("#show_leave_days_modal_title").html("Leave Days of Leave Application ID: " + data.leave_application_id);
                $("#show_leave_days_modal").modal('show');
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    }

    function validate(form){

        $(form + " :input:not(.input-optional, :disabled)").each(function (){

            if ($(this).val() == "") {
                $(this).parent().parent().addClass('has-error');
                if($(this).prop('id') == 'leave_attachment')
                {
                    $(this).next("span.help-block").text("For Sick-Leave, if the number of leave days is more than 2 days, you are required to attach medical certificate.");
                }
                else
                {
                    $(this).next("span.help-block").text("Please fill this field");
                }
                form_validation = false; // Must be false
            }
            else
            {
                form_validation = true;
            }
        });
    }

    function save_leave_application(button, form_data, modal)
    {

        var num_leave_days =
            moment($("#leave_end_date").val()).diff(moment($("#leave_start_date").val()), 'd') + 1;
        if($("#leave_type_id").val() == 1 && num_leave_days > 2)
        {
            $("#leave_attachment").removeClass('input-optional');
        }
        else
        {
            $("#leave_attachment").addClass('input-optional');
        }
        validate(form_data);
        if(file_validation && form_validation)
        {
            $(button).text('Saving...'); //change button text
            $(button).attr('disabled',true); //set button disable


            var url = "<?php echo base_url()?>systems/leave_self_management/ajax_apply_leave/";
            var formData = new FormData();
            var file = $('#leave_apply_form input[type=file]')[0].files[0];
            formData.append("file", file);
            formData.append("<?php echo $this->security->get_csrf_token_name(); ?>", "<?php echo $this->security->get_csrf_hash(); ?>");
            var basic_data = $("#leave_apply_form").serializeArray();
            $.each(basic_data,function(key,input){

                formData.append(input.name,input.value);

            });
            var leave_day_types_data = $("#leave_day_types_form").serializeArray();
            leave_day_types_data != undefined ? formData.append("leave_day_types",JSON.stringify(leave_day_types_data)) : formData.append("leave_day_types","");
            formData.append("applicant", "employee"); // To state employee himself applies leave

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
//                    console.log(data);
                    if(data.status) //if success close modal and reload ajax table
                    {
                        $(modal).modal('hide');
                        reload_table(current_data_table);
                    }
                    else if(data.result)
                    {
                        if($("#backButton").length == 0)
                        {
                            $("#leave_apply_modal .modal-footer").prepend("<button type='button' id='backButton' class='btn btn-default'>Back</button>");
                        }
                        var html = "";
                        for(var z=0; z<data.result.length; z++)
                        {
                            var leave_day_type = "";
                            if(data.result[z].day_status != "Full Day")
                            {
                                leave_day_type = "<input type='hidden' name='" + data.result[z].date + "' id='" + data.result[z].date + "' value='" + data.result[z].day_status + "'>" +
                                    "<span class='label label-info'>" + data.result[z].day_status + "</span>";
                            }
                            else
                            {
                                leave_day_type = "<select name='" + data.result[z].date + "' id='" + data.result[z].date + "'>" +
                                    "<option value='Full Day'>Full Day</option>" +
                                    "<option value='Half Day - Morning'>Half Day - Morning</option>" +
                                    "<option value='Half Day - Afternoon'>Half Day - Afternoon</option>" +
                                    "</select>";
                            }

                            html += "<tr>" +
                                "<td>" + data.result[z].date + " (" + data.result[z].day_name + ") " + "</td>" +
                                "<td>" + leave_day_type + "</td>" +
                                "</tr>";
                        }
                        $("#leave_day_types_form table tbody").html(html);
                        $("#leave_form_2").show();
                        $("#leave_form_1").hide();
                    }
                    else if(data.inputerror)
                    {
                        console.log(true);
                        for (var i = 0; i < data.inputerror.length; i++)
                        {
                            console.log(data.inputerror[i]);
                            $('[name="'+data.inputerror[i]+'"]').parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                            $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                        }
                    }
                    else if(data.eligibility_error)
                    {
                        bootbox.dialog({
                            message: data.eligibility_error,
                            title: "Sorry!",
                            buttons: {
                                danger: {
                                    label: "Back",
                                    className: "btn-danger",
                                    callback: function() {
                                        $("#backButton").click();
                                    }
                                }
                            }
                        });
                    }
                    $(button).text('Continue'); //change button text
                    $(button).attr('disabled',false); //set button enable
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error saving data');
                    $(button).text('Continue'); //change button text
                    $(button).attr('disabled',false); //set button enable
                }
            });
        }
    }

    function change_leave_status(id)
    {
        console.log(id);
        $.ajax({
            url: "<?php echo base_url()?>systems/leave_self_management/ajax_get_leave_application/" + id,
            type: "POST",
            data: {
                "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
            },
            dataType: "JSON",
            success: function(data)
            {
                var html = "<select name='approval_status' id='approval_status' class='form-control'>" +
                    "<option value='Approved'";
                html += data.status == 'Approved' ? " selected='selected'" : "";
                html += ">Approved</option>" +
                    "<option value='Rejected'";
                html += data.status == 'Rejected' ? " selected='selected'" : "";
                html += ">Rejected</option>" +
                    "<option value='Cancelled'";
                html += data.status == 'Cancelled' ? " selected='selected'" : "";
                html += ">Cancelled</option>" +
                    "</select>" +
                    "<br>" +
                    "<label for='reason'>Reason:</label> " +
                    "<input type='text' id='reason' class='form-control'>";

                bootbox.dialog({
                    message: html,
                    title: "Employee ID: " + data.employee_epf_no +  "<br>" +
                    "Leave ID: " + data.leave_application_id +  "<br>" +
                    "Change Leave Status to,",
                    buttons: {
                        OK: {
                            label: "Submit!",
                            className: "green",
                            callback: function() {
                                var approval_status = $("#approval_status").val();
                                var reason = $("#reason").val();
                                $.ajax({
                                    url: "<?php echo base_url()?>systems/leave_self_management/process_leave_approval/" + id,
                                    type: "POST",
                                    data: {
                                        approval_status: approval_status,
                                        reason: reason,
                                        "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
                                    },
                                    dataType: "JSON",
                                    success: function (data)
                                    {
                                        console.log(data);
                                        bootbox.alert(data.message);
                                        if(data.status)
                                        {
                                            reload_table(allLeavesDataTable);
                                        }
                                    },
                                    error: function (jqXHR, textStatus, errorThrown)
                                    {
                                        console.log(jqXHR);
                                        console.log(textStatus);
                                        console.log(errorThrown);
                                    }
                                });
                            }
                        },
                        Cancel: {
                            label: "Cancel",
                            className: "red"
                        }
                    }
                });
            },
            error: function(jqXHR, textStatus, errorThrown)
            {
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
            }
        });
    }
</script>

