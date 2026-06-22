<style>
    .table tr:hover {
        background: #e9f1e8;
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
                <li class="breadcrumb-item active">Attendance Register</li>
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
                <h4 class="page-head-title card-title  text-white" style="display: inline-block"> Attendance Register</h4>
            </div>
            <div class="element-box">
                <form id="att_filter_form" class="form-material">
                    <div class="row">
                        <div class="col-md-12">

                            <table class="tool" id="tools" style="width: 100%;position: static; visibility: visible;" border="0">
                                <tbody>
                                <tr>
                                    <td>Date</td>
                                    <td>
                                        <input type="hidden" id="from_date" name="from_date">
                                        <input type="hidden" id="to_date" name="to_date">
                                        <div id="dashboard-report-range" class="btn btn-sm" data-container="body" data-placement="bottom" data-original-title="Change dashboard date range" style=" background: #d46c20;color: #fff; margin-top: -5px;">
                                            <i class="icon-calendar"></i>Period :
                                            <span class="new thin uppercase hidden-xs"></span>&nbsp;
                                            <i class="fa fa-angle-down"></i>
                                        </div>
                                    </td>
                                    <td>Department</td>
                                    <td>
                                        <select name="department" id="department" class="select2">
                                            <option value="">(---)</option>
                                            <option value="ALL" selected>All</option>
                                            <?php foreach ($emp_departments as $emp_department){ ?>
                                                <option value="<?php echo $emp_department->id;?>"><?php echo $emp_department->desc ; ?></option>

                                            <?php }?>
                                        </select>
                                    </td>
                                    <td>Employee</td>
                                    <td>
                                        <select name="employee" id="employee" class="select2">
                                            <option value="">(---)</option>
                                            <?php foreach ($employee as $emp){ ?>
                                                <option value="<?php echo $emp->id;?>"><?php echo $emp->employee_id." - ".$emp->first_name." ".$emp->last_name; ?></option>

                                            <?php }?>
                                        </select>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <h6>Reference</h6>
                                        <span style='color:#fff; background: #FF0000; padding: 3px; border-radius: 5px;'>AB</span> - Absent <br>
                                        <span class="label label-warning" >HD</span> - Half day <br>
                                        <span style="color:#fff; background: #2ecc71; padding: 3px; border-radius: 5px; ">LA</span> - Late <br>
                                        <span style="color:#fff; background: #2ecc71; padding: 3px; border-radius: 5px; ">EL</span> - Early Leave<br>
                                        <span style="color:#fff; background: #9b59b6; padding: 3px; border-radius: 5px;">SLM</span> - Short Leave Morning<br>
                                        <span style="color:#fff; background: #9b59b6; padding: 3px; border-radius: 5px;">SLE</span> - Short Leave Evening<br>
                                    </td>
                                </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </form>
                <div id="outer_warp_load" style="display: none">
                    <h4 class="card-title m-t-40">Select Date:</h4>
                    <div id="paginator4"></div>
                    <hr>
                    <div id="load_att_report">
                    </div>
                </div>
                <div id="load_table">
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url(); ?>assets/node_modules/date-paginator/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/node_modules/date-paginator/bootstrap-datepaginator.min.js"></script>
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
    /*var datepaginator = function() {
     return {
     init: function() {
     $("#paginator4").datepaginator({
     startDate: '2018-10-01', endDate: '2018-10-10',
     onSelectedDateChanged: function(a, t) {
     alert("Selected date: " + moment(t).format("Do, MMM YYYY"))
     }
     })
     }
     }
     }();*/
    $(document).ready(function() {
        //datepaginator.init();
        //$('#paginator4').datepaginator('setSelectedDate', '2018-10-05');
        /*$("#paginator4").datepaginator({
         onSelectedDateChanged: function(a, t) {
         alert("Selected date: " + moment(t).format("Do, MMM YYYY"));
         }
         });*/
    });
</script>
<script>

    $(document).ready(function () {
        $('#dashboard-report-range').daterangepicker({
            "maxSpan": {
                "days": 31
            },
            "ranges": {
                'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'This Year': [moment().startOf('year'), moment().endOf('year')]
            },
            "opens": "right"
        }, function(start, end, label) {
            var start_date = start.format('YYYY-MM-DD'), end_date = end.format('YYYY-MM-DD');
            $('#dashboard-report-range span').html(start_date + ' - ' + end_date);
            $('#from_date').val(start_date);
            $('#to_date').val(end_date);
            //showBirthdays(start_date, end_date, label);
            //getAttendance(start, end, label, showAttendance);
            var emp = $('#employee').val();
            if (emp == "") {
                $('#outer_warp_load').show();
                search_att_full();
                $('#paginator4').datepaginator('setSelectedDate', start_date);
            }else{
                $('#outer_warp_load').hide();
                search_att_full_emp();
            }
            //var datepaginator = function() {
            //    return {
            //        init: function() {
            //            $("#paginator4").datepaginator({
            //                startDate: start_date,
            //                endDate: end_date,
            //                onSelectedDateChanged: function(a, t) {
            //                    //alert("Selected date: " + moment(t).format("YYYY-MM-DD"));
            //
            //
            //                    var select_date = moment(t).format("YYYY-MM-DD");
            //                    var department = $('#department').val();
            //                    if (select_date != "" && department != "") {
            //                        $.ajax({
            //                            type: "post",
            //                            url: "<?php //echo site_url('systems/attendance_con/attendance_search'); ?>//",
            //                            data: {
            //                                "<?php //echo $this->security->get_csrf_token_name(); ?>//": "<?php //echo $this->security->get_csrf_hash()?>//",
            //                                select_date:select_date,
            //                                department:department,
            //                            },
            //                            dataType: "html",
            //                            success: function (data) {
            //                                $('#load_table').html(data);
            //                            }
            //                        });
            //                    }else{
            //                        bootbox.dialog({
            //                            message: 'Please Select Department',
            //                            title: "Alert!",
            //                            buttons: {
            //                                cancel: {
            //                                    label: "OK",
            //                                    className: "btn-default"
            //                                }
            //                            }
            //                        });
            //                    }
            //
            //                }
            //            })
            //        }
            //    }
            //}();
            //datepaginator.init();
            //$('#paginator4').datepaginator('setSelectedDate',start_date);
        });
    });

    $("#employee").change(function () {
        var start_date = $('#from_date').val();
        var end_date = $('#to_date').val();
        var employee = this.value;
        if (employee != "" && start_date != "" && end_date != "") {
            $('#outer_warp_load').hide();
            search_att_full_emp();
        }
    });

    function search_att_full() {
        var start_date = $('#from_date').val();
        var end_date = $('#to_date').val();
        var datepaginator = function() {
            return {
                init: function() {
                    $("#paginator4").datepaginator({
                        startDate: start_date,
                        endDate: end_date,
                        onSelectedDateChanged: function(a, t) {
                            //alert("Selected date: " + moment(t).format("YYYY-MM-DD"));
                            var select_date = moment(t).format("YYYY-MM-DD");
                            var department = $('#department').val();
                            if (select_date != "" && department != "") {
                                $.ajax({
                                    type: "post",
                                    url: "<?php echo site_url('systems/attendance_con/attendance_search'); ?>",
                                    data: {
                                        "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash()?>",
                                        select_date:select_date,
                                        department:department,
                                    },
                                    dataType: "html",
                                    success: function (data) {
                                        $('#load_table').html(data);
                                        $('#att_datatable').DataTable({"pageLength": 40});
                                        $('#att_datatable').on('draw.dt', function () {
                                            $('.clockpicker').clockpicker({
                                                donetext: 'Done',
                                                autoclose: true
                                            });
                                            $(".time_clock").inputmask("datetime", {
                                                "clearIncomplete": true,
                                                inputFormat: "HH:MM"
                                            });
                                        });
                                    }
                                });
                            }else{
                                bootbox.dialog({
                                    message: 'Please Select Department',
                                    title: "Alert!",
                                    buttons: {
                                        cancel: {
                                            label: "OK",
                                            className: "btn-default"
                                        }
                                    }
                                });
                            }

                        }
                    })
                }
            }
        }();
        datepaginator.init();
        //$('#paginator4').datepaginator('setSelectedDate',start_date);
    }

    function search_att_full_emp() {
        $('#load_table').html('');
        $('#paginator4').html('');

        var start_date = $('#from_date').val();
        var end_date = $('#to_date').val();
        var employee = $('#employee').val();
        $.ajax({
            type: "post",
            url: "<?php echo site_url('systems/attendance_con/attendance_search_emp'); ?>",
            data: {
                "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash()?>",
                startDate: start_date,
                endDate: end_date,
                employee: employee
            },
            dataType: "html",
            success: function (data) {
                $('#load_table').html(data);
                $('#load_table').html(data);
                $('#att_datatable').DataTable({"pageLength": 40});
                $('#att_datatable').on('draw.dt', function () {
                    $('.clockpicker').clockpicker({
                        donetext: 'Done',
                        autoclose: true
                    });
                    $(".time_clock").inputmask("datetime", {
                        "clearIncomplete": true,
                        inputFormat: "HH:MM"
                    });
                });
            }
        });
    }


    function update_register() {
        var start_date = $('#today_date').val();
        var att_no_row = $('#att_no_row').val();
        var app_ot_array = [];
        for (var tt = 0; tt < att_no_row; tt++) {
            var row_m = $('#att_id' + tt).val() + "^" + $('#app_ot_hrs' + tt).val()+ "^" + $('#in_time' + tt).val()+"^"+ $('#out_time' + tt).val()+"^"+$('#epf_no' + tt).val()+"^"+$('#s_date' + tt).val()+"^"+$('#liu_leave' + tt).val()+"^"+$('#row_date' + tt).val();
            app_ot_array.push(row_m);
        }
        $.ajax({
            type: "post",
            async: false,
            url: "<?php echo site_url('systems/attendance_con/update_register'); ?>",
            data: {"app_ot_array": app_ot_array},
            dataType: "json",
            success: function (data) {

//                if (data.status == 'ok') {
//                    //$('#s_e_panel').html(' <div class="alert alert-success">Update Successfully</div>');
//                    bootbox.alert(data.message);
//                } else {
//                    bootbox.alert(data.message);
//                    //$('#s_e_panel').html(' <div class="alert alert-success">Something wrong</div>');
//                }
//                $("#s_e_panel").fadeTo(2000, 500).slideUp(500, function () {
//                    $("#success-alert").slideUp(500);
//                });
                var emp = $('#employee').val();
                if (emp == "") {
                    search_att_full();
                    $('#paginator4').datepaginator('setSelectedDate',start_date);
                }else{
                    search_att_full_emp();
                }
            }
        });
    }

    function arrow_go(row, col, event) {


        switch (event.keyCode) {
            case 37:
                --col;
                $('.current_index' + col + row).focus();

                if (col == 0) {
                    col = 5;
                    $('.current_index' + col + row).focus();
                }
                break;
            case 38:
                --row;
                $('.current_index' + col + row).focus();

                break;
            case 39:
                ++col;
                $('.current_index' + col + row).focus();

                if (col == 6) {
                    col = 1;
                    $('.current_index' + col + row).focus();
                }
                break;
            case 40:
                ++row;
                $('.current_index' + col + row).focus();

                break;
        }


    }
</script>