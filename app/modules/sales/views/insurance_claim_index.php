<?php

/**
 * Created by PhpStorm.
 * User: kasun.demel
 * Date: 1/22/2021
 * Time: 4:32 PM
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

    .embedded-daterangepicker .daterangepicker .drp-calendar {
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
</style>

<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"></h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:;">Reports</a></li>
                <li class="breadcrumb-item active">Insurance Claim Report</li>
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
                <h4 class="page-head-title card-title  text-white" style="display: inline-block">Insurance Claim Report</h4>&nbsp;
            </div>


            <div class="row">
                <div class="col-12">
                    <div class="element-wrapper">
                        <div class="element-box">

                            <table class="tool" id="tools" style="position: static; visibility: visible;" border="0">
                                <tbody>
                                    <tr>CLAIM DATE</tr>
                                    <tr>
                                        <td>FROM DATE</td>
                                        <td>
                                            <input type="text" id="claim_from_date" name="claim_from_date" class="form-control date date-pick" autocomplete="off" placeholder="From Date">
                                        </td>
                                        <td>TO DATE</td>
                                        <td>
                                            <input type="text" id="claim_to_date" name="claim_to_date" class="form-control date date-pick" data-date-format="yyyy-mm-dd" autocomplete="off" placeholder="To Date">
                                        </td>
                                        <td><button name="btnBillShow" id="btnBillShow" class="btn btn-success" style="color: #fff"><i class="ti-search"></i> Show</button></td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>


            <div class="tab-content tabcontent-border">
                <div class="tab-pane p-20 active" role="tabpanel" id="arrangement">
                    <table class="table table-striped table-bordered table-hover table-header-fixed dt-responsive" id="insuranceInfo" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="all" style="width: 30px">#</th>
                                <th class="all">EMP CODE</th>
                                <th class="all">NAME</th>
                                <th class="all">BILL AMOUNT</th>
                                <th class="all">PAYABLE AMOUNT</th>
                                <th class="all">REJECTED AMOUNT</th>
                                <th class="all">BILL DATE</th>
                                <th class="all">CLAIM DATE</th>
                                <th class="all" style="width: 100px">REMARKS</th>
                                <th class="all">STATUS</th>
                                <th class="all">DESCRIPTION</th>
                                <th class="all">REASON</th>
                                <th class="all">USER</th>
                                <th class="all">DESIGNATION</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>





                <script type="text/javascript">
                    var save_method;
                    var insuranceInfo;

                    $(document).ready(function() {

                        var today = new Date();
                        $('.date-pick').datepicker({
                            format: 'yyyy-mm-dd',
                            autoclose: true,
                            endDate: "today",
                            maxDate: today
                        }).on('changeDate', function(ev) {
                            $(this).datepicker('hide');
                        });


                        $('.date-pick').keyup(function() {
                            if (this.value.match(/[^0-9]/g)) {
                                this.value = this.value.replace(/[^0-9^-]/g, '');
                            }
                        });


                        $(".modal :input").change(function() {
                            $(this).siblings("span.error-block").html("").hide();
                            $("span.help-inline").hide();
                        });

                        $('.modal').on('hidden.bs.modal', function() {

                            $("form :input").siblings("span.error-block").html("").hide();
                            $("span.help-inline").hide();

                        });

                        <?php if ($this->session->flashdata('message')) { ?>

                            bootbox.alert({
                                message: "<b style='text-align:center'><?php echo $this->session->flashdata('message') ?></b>",
                                size: 'small'
                            });

                        <?php } ?>

                        $('#btnBillShow').on('click', function() {
                            // alert($("#bill_from_date").datepicker({ dateFormat: "yy-mm-dd" }).val());
                            reload_table(insuranceInfo);
                        });

                        function loadReportclaim() {
                            // console.log( $('bill_from_date').datepicker( "getDate" ));
                            // alert( $('#bill_from_date').datepicker( "getDate" ));

                        }

                        insuranceInfo = $('#insuranceInfo').DataTable({

                            "processing": true, //Feature control the processing indicator.
                           "serverSide": true, //Feature control DataTables' server-side processing mode.
                            // Load data for the table's content from an Ajax source
                            "ajax": {
                               
                            
                                "data": function(d){
                                    
                                    d.<?php echo $this->security->get_csrf_token_name(); ?>= "<?php echo $this->security->get_csrf_hash(); ?>",
                                    //d.billFromDate = $('#bill_from_date').datepicker({ dateFormat: "yyyy-MM-dd" }).val(),
                                    //d.billToDate = $('#bill_to_date').datepicker({ dateFormat: "yyyy-MM-dd" }).val()
                                    d.claimFromDate = $('#claim_from_date').datepicker({ dateFormat: "Y-m-d H:i:s" }).val(),
                                    d.claimToDate = $('#claim_to_date').datepicker({ dateFormat: "Y-m-d H:i:s" }).val()
                                },
                                
                                "url": "<?php echo base_url() ?>index.php/sales/insurance_claim/get_all_claims_by_claimdate",
                                "type": "POST",
                               
                                
                            },
                            "columnDefs": [{
                                "targets": [-2], //last column
                                "orderable": false //set not orderable
                            }],
                            "aoColumns": [
                                null,
                                null,
                                null,
                                null,
                                null,
                                null,
                                null,
                                null,
                                null,
                                null,
                                null,
                                null,
                                null,

                                {
                                    "bSortable": false,
                                    "bSearchable": false
                                }
                            ],
                            rowCallback: function(row, data, index) {

                                if (data[8] == "Limit Exceed") {
                                    $(row).find('td:eq(8)').html('<span style="background-color:red;color: white;border-radius: 5px">&nbsp;&nbsp;Limit Exceed&nbsp;&nbsp;</span>');
                                }

                                if (data[9] == "Approved") {
                                    $(row).find('td:eq(9)').html('<span style="background-color: #0c7e43;color: white;border-radius: 5px">&nbsp;&nbsp;Approved&nbsp;&nbsp;</span>');
                                } else if (data[9] == "Rejected") {
                                    $(row).find('td:eq(9)').html('<span style="background-color: red;color: white;border-radius: 5px">&nbsp;&nbsp;Rejected&nbsp;&nbsp;</span>');
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
                            "buttons": [{
                                    extend: 'print',
                                    text: '<i class="fa fa-print"></i>',
                                    titleAttr: 'Print'
                                },
                                {
                                    extend: 'copyHtml5',
                                    text: '<i class="fa fa-files-o"></i>',
                                    titleAttr: 'Copy'
                                },
                                {
                                    extend: 'excelHtml5',
                                    text: '<i class="fa fa-file-excel-o"></i>',
                                    titleAttr: 'Excel'
                                },
                                {
                                    extend: 'csvHtml5',
                                    text: '<i class="fa fa-file-text-o"></i>',
                                    titleAttr: 'CSV'
                                },
                                {
                                    extend: 'pdfHtml5',
                                    text: '<i class="fa fa-file-pdf-o"></i>',
                                    titleAttr: 'PDF'
                                }
                            ],
                           // responsive: true,
                            //responsive: true,
                            "order": [
                                [0, 'asc']
                            ],
                            "lengthMenu": [
                                [5, 10, 15, 20, -1],
                                [5, 10, 15, 20, "All"]
                            ],
                            "pageLength": 200,
                            "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>" // horizobtal scrollable datatable
                        });

                        insuranceInfo.on('order.dt search.dt', function() {
                            insuranceInfo.column(0, {
                                search: 'applied',
                                order: 'applied'
                            }).nodes().each(function(cell, i) {
                                cell.innerHTML = i + 1;
                            });
                        }).draw();

                        yadcf.init(insuranceInfo, [{
                            filter_type: "text",
                            filter_delay: 500,
                            column_number: 1
                        }, {
                            filter_type: "text",
                            filter_delay: 500,
                            column_number: 2
                        }, {
                            filter_type: "text",
                            filter_delay: 500,
                            column_number: 3
                        }, {
                            filter_type: "text",
                            filter_delay: 500,
                            column_number: 4
                        }, {
                            filter_type: "text",
                            filter_delay: 500,
                            column_number: 5
                        }, {
                            filter_type: "text",
                            filter_delay: 500,
                            column_number: 6
                        }, {
                            filter_type: "text",
                            filter_delay: 500,
                            column_number: 7
                        }, {
                            filter_type: "text",
                            filter_delay: 500,
                            column_number: 8
                        }, {
                            filter_type: "text",
                            filter_delay: 500,
                            column_number: 9
                        }, {
                            filter_type: "text",
                            filter_delay: 500,
                            column_number: 10
                        }], {
                            cumulative_filtering: true
                        });
                    });

                    function reload_table(insuranceInfo) {
                        // insuranceInfo.draw();
                        if (typeof insuranceInfo !== "undefined") {
                            insuranceInfo.ajax.reload(null, true);
                        }
                    }
                </script>

                <script>
                    function getEmployeeMaster() {

                        $('#employee').html('<option value="">--Select Employee--</option>');

                        //employee list
                        $.ajax({
                            async: false,
                            url: "<?php echo site_url('index.php/insurance/insurance_claim/get_employee_info'); ?>",
                            type: "POST",
                            data: {
                                "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash() ?>"
                            },
                            dataType: "JSON",
                            success: function(data) {

                                $.each(data, function(id, name) {
                                    var opt = $('<option />');
                                    opt.val(id);
                                    opt.text(name);
                                    $('#employee').append(opt);
                                });
                            },
                            error: function(jqXHR, textStatus, errorThrown) {
                                alert('Error get data');
                            }
                        });

                    }


                    //medical year
                    $.ajax({
                        async: false,
                        url: "<?php echo site_url('index.php/insurance/insurance_claim/get_medical_year'); ?>",
                        type: "POST",
                        data: {
                            "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash() ?>"
                        },
                        dataType: "JSON",
                        success: function(data) {

                            $.each(data, function(id, name) {
                                var opt = $('<option />');
                                opt.val(id);
                                opt.text(name);
                                $('#medical_year').append(opt);
                            });
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            alert('Error get data');
                        }
                    });

                    function bulk_upload() {

                        $('#pnl_div').html("");
                        $('#saved_form :input').removeClass('has-error');
                        $('#bulk_upload_modal').modal({
                            backdrop: 'static',
                            keyboard: false
                        });
                        $('#bulk_upload_modal .modal-title').text('Import Insurance Claim');

                    }

                    $("#employee").change(function() {
                        get_employee_usage($(this).val());
                    });

                    function get_employee_usage(id) {
                        $.ajax({
                            async: false,
                            url: "<?php echo site_url('index.php/insurance/insurance_claim/get_employee_usage'); ?>",
                            type: "POST",
                            data: {
                                "emp_code": id,
                                "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash() ?>"
                            },
                            dataType: "JSON",
                            success: function(data) {
                                if (data.status == true) {

                                    $("#claim_details").html('' +
                                        '<span style="background-color: #0c8841;color: white;border-radius: 5px">&nbsp;&nbsp;Limit : ' + data.emp_limit + '&nbsp;&nbsp;</span>&nbsp;&nbsp;' +
                                        '<span style="background-color: #067088;color: white;border-radius: 5px">&nbsp;&nbsp;Balance : ' + data.emp_balance + '&nbsp;&nbsp;</span>&nbsp;&nbsp;' +
                                        '<span style="background-color: #b60016;color: white;border-radius: 5px">&nbsp;&nbsp;Used : ' + data.emp_used + '&nbsp;&nbsp;</span>' +
                                        '');

                                    $("#claim_details").show();

                                    $("#edit_claim_details").html('' +
                                        '<span style="background-color: #0c8841;color: white;border-radius: 5px">&nbsp;&nbsp;Limit : ' + data.emp_limit + '&nbsp;&nbsp;</span>&nbsp;&nbsp;' +
                                        '<span style="background-color: #067088;color: white;border-radius: 5px">&nbsp;&nbsp;Balance : ' + data.emp_balance + '&nbsp;&nbsp;</span>&nbsp;&nbsp;' +
                                        '<span style="background-color: #b60016;color: white;border-radius: 5px">&nbsp;&nbsp;Used : ' + data.emp_used + '&nbsp;&nbsp;</span>' +
                                        '');

                                }

                            },
                            error: function(jqXHR, textStatus, errorThrown) {
                                alert('Error get data');
                            }
                        });

                    }
                </script>