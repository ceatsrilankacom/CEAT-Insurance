<?php
/**
 * Created by PhpStorm.
 * User: kasun.demel
 * Date: 2/1/2021
 * Time: 11:47 AM
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

</style>

<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"></h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:;">Master</a></li>
                <li class="breadcrumb-item active">Sales Province</li>
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
    <h4 class="page-head-title card-title  text-white" style="display: inline-block"> Master - Sales Province</h4>
    <!--    <button type="button" onclick="bulk_approve()" class="btn btn-success pull-right" style="margin-left: 20px;"><i class="fa fa-check"></i> Bulk Approve</button>&nbsp;-->
<!--    <button type="button" onclick="add_master()" class="btn btn-success pull-right" style="margin-right: -10px;"><i class="fa fa-plus"></i> Add New</button>&nbsp;-->
</div>
<div class="element-box">

<div class="tab-content tabcontent-border">
<div class="tab-pane p-20 active" role="tabpanel" id="arrangement">
    <table class="table table-striped table-bordered table-hover table-header-fixed dt-responsive" id="masterInfo" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th class="all" style="width: 30px">#</th>
            <th class="all">Name English</th>
            <th class="all">NAME Sinhala</th>
            <th class="all">Name Tamil</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
        <tfoot>
        <tr>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        </tfoot>
    </table>
</div>




<div class="modal fade bs-example-modal-lg in" id="add_modal" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-full" style="max-width: 800px;max-height: 500px">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="udModalLabel"></h6>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body" style="max-height:500px !important;">
                <form id="master_form" class="form-horizontal">
                    <input type="hidden" name="id" id="id">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="control-label col-md-4" for="code" style='text-align: right;color:black;'><b>Expense Code</b></label>
                                    <div class="col-md-6">
                                        <input type="text" id="code" name="code" class="form-control" placeholder="Code">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-4" for="name" style='text-align: right;color:black;'><b>Expense Name</b></label>
                                    <div class="col-md-6">
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-4" for="status" style='text-align: right;color:black;'><b>Status</b></label>
                                    <div class="col-md-6">
                                        <select id="status" name="status" id="status" class="form-control">
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer" style="margin-top: 20px;margin:5px">
                <button type="button" onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade bs-example-modal-lg in" id="approve_modal" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-full" style="max-width: 400px;max-height: 200px">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="udModalLabel"></h6>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body" style="max-height:200px !important;">
                <form id="approve_itinerary_form" class="form-horizontal">
                    <input type="hidden" name="approve_id" id="approve_id">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group row">
                                    <label class="control-label col-md-6" for="itinerary" style='text-align: right;color:black;'><b>Select Status</b></label>
                                    <div class="col-md-6">
                                        <select name="approve_status" id="approve_status" class="form-control noSelect2">
                                            <option></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer" style="margin-top: 20px;margin:5px">
                <button type="button" onclick="approve_save()" class="btn btn-primary">Edit</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



<script type="text/javascript">

    var save_method;
    var masterInfo;

    $(document).ready(function(){

        $(".date-pick").datepicker();


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

        masterInfo = $('#masterInfo').DataTable({

            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            // Load data for the table's content from an Ajax source
            "ajax":{
                "data": {
                    "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
                },
                "url": "<?php echo base_url()?>index.php/master/master_con/get_master_sales_province",
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
                null
            ],
            rowCallback: function(row, data, index){

                if(data[3] == "0"){
                    $(row).find('td:eq(3)').html('<span style="background-color: #f1a20a;color: white;border-radius: 5px">&nbsp;&nbsp;Inactive&nbsp;&nbsp;</span>');
                }
                else if(data[3] == "1"){
                    $(row).find('td:eq(3)').html('<span style="background-color: #31CC7D;color: white;border-radius: 5px">&nbsp;&nbsp;Actived&nbsp;&nbsp;</span>');
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
            //responsive: true,
            "order": [
                [0, 'asc']
            ],
            "lengthMenu": [
                [5, 10, 15, 20, -1],
                [5, 10, 15, 20, "All"]
            ],
            "pageLength": 50,
            "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>" // horizobtal scrollable datatable
        });

        masterInfo.on('order.dt search.dt', function () {
            masterInfo.column(0, {search: 'applied', order: 'applied'}).nodes().each(function (cell, i) {
                cell.innerHTML = i + 1;
            });
        }).draw();

        yadcf.init(masterInfo, [{
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
            }],
            {
                filters_position: 'footer',
                cumulative_filtering: true
            });
    });

    function reload_table(masterInfo)
    {
        if(typeof masterInfo !== "undefined")
        {
            masterInfo.ajax.reload(null,false);
        }
    }
</script>

<script>



    function edit_master(id){

        save_method="edit";
        $("#master_form")[0].reset();

        $.ajax({

            url:"<?php echo base_url('index.php/master/master_con/get_expense_type/'); ?>"+id,
            dataType:"JSON",
            type:"POST",
            data:{
                "<?php echo $this->security->get_csrf_token_name(); ?>":"<?php echo $this->security->get_csrf_hash(); ?>"
            },
            success:function(data){

                $('[name="id"]').val(id);
                $('[name="code"]').val(data.master_data.code);
                $('[name="name"]').val(data.master_data.name);
                $('[name="status"]').val(data.master_data.status);

                $("#add_modal .modal-title").html("Edit Master Data");
                $("#add_modal").modal({backdrop: 'static', keyboard: false});
            },
            error:function(){
                console.log("error");
            }
        });
    }

    function save(){

        $("#loading_modal").modal({backdrop: 'static', keyboard: false});
        var url='';

        if(save_method == "add"){
            url="<?php echo base_url('index.php/master/master_con/save_expense'); ?>";
        }
        else if(save_method == "edit"){
            url="<?php echo base_url('index.php/master/master_con/edit_expense'); ?>";
        }

        var formData = new FormData();
        formData.append("<?php echo $this->security->get_csrf_token_name(); ?>", "<?php echo $this->security->get_csrf_hash(); ?>");
        var basic_data = $("#master_form").serializeArray();
        $.each(basic_data,function(key,input){

            formData.append(input.name,input.value);

        });

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
                if(data.status == true){
                    reload_table(masterInfo);
                    $('#add_modal').modal('hide');
                }
                $('#loading_modal').modal('hide');
            },
            error:function(){
                $('#loading_modal').modal('hide');
                reload_table(masterInfo);
            }
        });
    }

    function add_master(){

        $('.error-block').empty();
        save_method='add';
        $('#master_form')[0].reset();

        $('#add_modal .modal-title').html('Add New Master');
        $('#add_modal').modal({backdrop: 'static', keyboard: false});

    }

</script>

