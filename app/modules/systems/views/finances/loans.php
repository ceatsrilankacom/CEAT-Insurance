<style xmlns="http://www.w3.org/1999/html">
    .square_div{
        border: 1px solid black;
        width: auto;
    }

    input, select, textarea{
        color: #ff0000;
    }
    .yadcf-filter {
        max-width: 60px!important;
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
                <li class="breadcrumb-item active">Employee Loan Management</li>
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
                <h4 class="page-head-title card-title  text-white" style="display: inline-block"> Employee Loan Management</h4>
                <button type="button" class="btn btn-success pull-right" id="new_loans" ><i class="fa fa-plus-circle"></i> Add New Loan</button>
            </div>
            <div class="element-box">
                <div id="loans_div" class="table-responsive">
                    <div class="box">
                        <table id="loans_table" class="table table-bordered">
                            <thead>
                            <tr>
                                <th title="#" class="date_cell" style="text-align: center;padding: 0px;margin: 0px">#</th>
                                <th title="Department" class="date_cell" style="text-align: center;padding: 0px;margin: 0px">Department</th>
                                <th title="Employee ID" class="date_cell" style="text-align: center;padding: 0px;margin: 0px">Employee ID</th>
                                <th title="FName" class="date_cell" style="text-align: center;padding: 0px;margin: 0px">Name</th>
                                <th title="Date" class="date_cell" style="text-align: center;padding: 0px;margin: 0px">Date</th>
                                <th title="End" class="date_cell" style="text-align: center;padding: 0px;margin: 0px">End</th>
                                <th title="Term" class="date_cell" style="text-align: center;padding: 0px;margin: 0px">Term</th>
                                <th title="AmountX" class="date_cell" style="text-align: center;padding: 0px;margin: 0px">AmountX</th>
                                <th title="Opening" class="date_cell" style="text-align: center;padding: 0px;margin: 0px">Opening Date</th>
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

<!--modal-->
<div class="modal fade" id="loans_mod" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel"></h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="background-color: #000000">&times;</span></button>
            </div>
            <div class="modal-body">
                <form id="loans_schol_festi_form" method="post">
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group" style="display: none">
                                <label for="type">Type</label>
                                <select id="type" class="form-control" name="type" required="required">
                                    <!--<option value="" selected="">---</option>-->
                                    <option value="Staff_Loan" selected>Staff Loan</option>
                                    <option value="Scholarship">Scholarship</option>
                                    <option value="Festival_Advance">Festival Advance</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="employee_id">Select Employee</label>
                                <select id="employee_id" class="form-control select2" name="employee_id" required="required">
                                    <option value="">Select Employee</option>
                                    <?php
                                    foreach ($employeeData as $employees) {
                                        ?>
                                        <option
                                                value="<?php echo $employees->id; ?>"><?php echo $employees->employee_id . " - " . $employees->first_name. " " . $employees->last_name; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="start_date">From</label>
                                <input type="text" id="start_date" name="start_date" class="form-control date-pick" data-date-format="yyyy-mm-dd">
                            </div>
                            <div class="form-group">
                                <label for="end_date">To</label>
                                <input type="text" id="end_date" name="end_date" class="form-control date-pick" data-date-format="yyyy-mm-dd">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="term">Term / Installment </label>
                                <input type="text" class="form-control" id="term" name="term" placeholder="Term" required="required">
                            </div>
                            <div class="form-group">
                                <label for="amount">Amount</label>
                                <input type="text" class="form-control" id="amount" name="amount" placeholder="Amount" required="required">
                            </div>
                            <div class="form-group">
                                <label for="opening">Opening Date</label>
<!--                                <input type="text" class="form-control" id="opening" name="opening" placeholder="Opening" required="required">-->
                                <input type="text" id="opening" name="opening" class="form-control date-pick" data-date-format="yyyy-mm-dd">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" onclick="save_loan_register()" value="Save Loans">Save Loan</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url(); ?>assets/pages/scripts/table-edits.min.js" type="text/javascript"></script>
<script>
    var loans_table;
    $(document).ready(function() {
        'use strict';

        loans_table = $('#loans_table').DataTable({
            "processing": true,
            "serverSide": true,
            "stateSave": false,
            "ajax": {
                "data": {
                    "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
                },
                "url": "<?php echo site_url('systems/loans/get_employees_loan_data'); ?>",
                "type": "POST"
            },
            "columnDefs": [
                {
                    "targets": [ -1 ],
                    "orderable": false
                }
            ],
            "aoColumns": [
                null, null,  null, null, null, null, null, null, null
            ],
            //responsive: true,
            "order": [
                [0, 'asc']
            ],
            "lengthMenu": [
                [5, 10, 15, 20, -1],
                [5, 10, 15, 20, "All"]
            ],
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

            "pageLength": 50,
            "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>" // horizobtal scrollable datatable
        });

        /*$('table#salary_data').floatThead({
         position: 'fixed',
         top: 56
         });*/
    });


    $('#new_loans').on('click',function(){

        $('#loans_schol_festi_form')[0].reset();
        $('#myModalLabel').text('Add New Loan');

        $('#loans_mod').modal('show');
    });

    function save_loan_register(){
        var url = "<?php echo site_url('systems/loans/insert_loan'); ?>";
        $.ajax({
            url: url,
            type: "POST",
            data: $('#loans_schol_festi_form').serialize(),
            dataType: "JSON",
            success: function (data) {
                if(data.status)
                {
                    reload_table(loans_table);
                    bootbox.alert(data.message);
                    $('#loans_mod').modal('hide');
                } else {
                    bootbox.alert(data.message);
                }
            },
            error: function (jqXHR, textStatus, errorThrown){
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
            }
        });

    }

    function reload_table(loans_table)
    {
        if(typeof loans_table !== "undefined")
        {
            loans_table.ajax.reload(null,false);
        }
    }

</script>