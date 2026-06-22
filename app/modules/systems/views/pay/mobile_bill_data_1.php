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
                <li class="breadcrumb-item active">Mobile Bill Data</li>
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
                <h4 class="page-head-title card-title  text-white" style="display: inline-block"> Mobile Bill Data</h4>
                <button type="button" class="btn btn-success pull-right" onclick='add_new();' style="margin-right: 10px" ><i class="fa fa-plus-circle"></i> Add Monthly Mobile Bill</button>
            </div>
            <div class="element-box">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item"><a class="nav-link active" role="tab" href="javascript:;" data-toggle="tab"> Mobile Bill Data</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content tabcontent-border">
                    <div class="tab-pane p-20 active" role="tabpanel" id="sal_pay">
                        <table id="salary_deduction_datatable" class="table" cellspacing="0" width="100%">
                            <thead style="background-color: #912fa6;color: white;">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Mobile Number</th>
                                <th style="max-width:100px;">Month</th>
                                <th style="max-width:100px;">Amount</th>
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
    <div class="modal-dialog modal-full" style="max-width: 1000px">
        <div class="modal-content">
            <div class="modal-header bg-blue-steel bg-font-blue-steel">
                <h4 class="modal-title bold uppercase" style="height:10px"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body form">
                <form action="<?php echo base_url('systems/salary_settings_con/insert_mobile_bulk'); ?>" id="salary_deduction" class="form-horizontal" method="post">
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <input type="hidden" name="deduction_id"/>
                    <div class="form-body" style="padding: 0px 10px;">
                        <div class="form-group hide_btn_modal">
                            <label for="sun_all_mass">Select Month: </label>
                            <input type="text" class="month_select" name="date_select" id="date_select">
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Please Copy and Past Hire Your .XLS Data</label>
                            <div class="col-md-12">
                                <textarea name="excel_text_area" id="excel_text_area" style="width:100%;height:60px;"></textarea><br><br>
                                <input type="button" id="btnSave" onclick="javascript:generateTable()" value="Import Data"/>

                            </div>

                                <img style="width: 30px; height: 30px;margin-top: 30px; display: none"  id="loader" src="<?php echo base_url('assets/images/loading-spinner-blue.gif') ?>">

                        </div>

                    </div>

                <div style="margin-top: 20px; class="table-responsive">
<!--                <form id="" action="--><?php //echo base_url('systems/salary_settings_con/inset_mobile_bulk'); ?><!--" method="post" />-->
                <div id="excel_table" style="margin-top: 20px;margin-bottom: 20px;" class="table-responsive" hidden>

                </div>

                </form>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">

    $('#btnSave').on('click', generateTable);

    function generateTable() {

        $('#submit_but').show();
        $('#loader').show();
        $('#btnSave').hide();

        var data = $('textarea[name=excel_text_area]').val();
        var rows = data.split("\n");

        var table = $('<table>');
        var count = 0;

        for(var y in rows) {

            var number=1;
            var cells = rows[y].split("\t");
            var row = $('<tr><td style="padding-right: 5px;">'+
                '<span id="alert_field_'+count+'"></span></td>');

            for(var x in cells) {

                row.append('<td><input type="text" id="field'+number+'_'+count+'" name="field'+number+'[]" value="'+cells[x]+'"></td>');
                number++;

            }
            table.append(row);
            count++;
        }
        $('#excel_table').html(table);
        post_data();
    }

    function post_data(){

        var form=$("#salary_deduction");
        $.ajax({
            type: "POST",
            url: form.attr("action"),
            data: $("#salary_deduction").serialize()+"&<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash();?>",
            dataType: "json",
            success: function (response) {

                $('#success-alert').show();
                $("#success-alert").fadeTo(2000, 500).slideUp(500, function () {

                    $('#excel_table').html('');
                    $("#success-alert").slideUp(500);

                });
                $('#loader').hide();
//                window.location.reload('systems/salary_settings_con/add_mobile_bill');
            }
        });


    }

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
                "url": "<?php echo base_url()?>systems/salary_settings_con/get_mobile_data",
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

        yadcf.init(salary_deduction_datatable, [
                {
                    filter_type: "text",
                    filter_delay: 100,
                    column_number: 1
                },{
                    filter_type: "text",
                    filter_delay: 100,
                    column_number: 2
                },{
                    filter_type: "text",
                    filter_delay: 100,
                    column_number: 3
                }],
            {
                cumulative_filtering: false
            });


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
        $('#salary_deduction_modal .modal-title').text('Add Monthly Mobile Bill');
    }

    $(function()
    {
        $(".month_select").datepicker( {
            format: "yyyy-mm",
            startView: "months",
            minViewMode: "months",
            autoclose:true
        });
    });
    $('.month_select').datepicker({autoclose:true});
</script>

