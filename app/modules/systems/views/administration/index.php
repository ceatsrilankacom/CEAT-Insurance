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
                <li class="breadcrumb-item"><a href="javascript:;">Itinerary</a></li>
                <li class="breadcrumb-item active"><?php echo $title; ?></li>
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
    <h4 class="page-head-title card-title  text-white" style="display: inline-block"><?php echo $title; ?></h4>
</div>
<div class="element-box">

<div class="tab-content tabcontent-border">
<div class="tab-pane p-20 active" role="tabpanel" id="arrangement">
    <table class="table table-striped table-bordered table-hover table-header-fixed dt-responsive" id="itineraryInfo" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th class="all" style="width: 30px">#</th>
            <th class="all">USER</th>
            <th class="all">IP ADDRESS</th>
            <th class="all">DATE TIME</th>
            <th class="all">ACTION</th>
            <th class="all">STATUS</th>
            <th class="all text-center" width="150px">LOG MESSAGE</th>
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
            <th></th>
            <th></th>
            <th></th>
        </tr>
        </tfoot>
    </table>
</div>

<!-- Bootstrap modal -->
<div class="modal fade" id="itinerary_modal" role="dialog">
    <div class="modal-dialog modal-full" style="max-width: 700px;max-height: 500px">
        <div class="modal-content">
            <div class="modal-header bg-blue-steel bg-font-blue-steel">
                <h6 id="itinerary_modal_title"></h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body form">
                <form enctype="multipart/form-data" id="itinerary_form" class="form-horizontal">
                    <div class="form-body">
                        <div class="">
                            <div class="form-group row">
                                <label class="control-label col-md-4" for="itinerary" style='text-align: right;color:black;'><b>Select Sales Executive</b></label>
                                <div class="col-md-6">
                                    <select name="user" id="user" class="form-control">
                                        <option></option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-4" for="itinerary" style='text-align: right;color:black;'><b>Select Date</b></label>
                                <div class="col-md-6">
                                    <input type="text" id="date" name="date" class="form-control date date-pick" data-date-format="yyyy-mm-dd" autocomplete="off" placeholder="Date">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-4" for="itinerary" style='text-align: right;color:black;'><b>Select itinerary Type</b></label>
                                <div class="col-md-6">
                                    <select name="itinerary_type" id="itinerary_type" class="form-control noSelect2">
                                        <option></option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-4" for="itinerary" style='text-align: right;color:black;'><b>Amount</b></label>
                                <div class="col-md-6">
                                    <input type="text" id="amount" name="amount" class="form-control numeric" size="16">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-4" for="itinerary" style='text-align: right;color:black;'><b>Description</b></label>
                                <div class="col-md-6">
                                    <textarea cols="3" type="text" id="description" name="description" class="form-control" size="16"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <label class="control-label col-md-4" for="itinerary" style='text-align: right;color:black;'><b>Opening KM</b></label>
                                <div class="col-md-6">
                                    <input type="text" id="opening_km" name="opening_km" class="form-control numeric" size="16">
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label class="control-label col-md-4" for="itinerary" style='text-align: right;color:black;'><b>Closing KM</b></label>
                                <div class="col-md-6">
                                    <input type="text" id="closing_km" name="closing_km" class="form-control numeric" size="16">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-4" for="itinerary" style='text-align: right;color:black;'><b>Receipt No</b></label>
                                <div class="col-md-6">
                                    <input type="text" id="receipt_no" name="receipt_no" class="form-control" size="16">
                                </div>
                            </div>
                            <div class="form-group row" id="selectAttachment">
                                <label class="control-label col-md-4" style='text-align: right;color:black;'><b>Attachment</b></label>
                                <div class="col-md-6" id="attachment">
                                    <input type="file" name="attachment" id="attachment" class="form-control input-optional" placeholder="PDF,JPG,PNG">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">

                <button type="button" id="arrangeBtn" onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade bs-example-modal-lg in" id="edit_modal" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-full" style="max-width: 800px;max-height: 500px">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="udModalLabel"></h6>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body" style="max-height:500px !important;">
                <form enctype="multipart/form-data" id="edit_itinerary_form" class="form-horizontal">
                    <input type="hidden" name="edit_id" id="edit_id">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group row">
                                    <label class="control-label col-md-4" for="itinerary" style='text-align: right;color:black;'><b>Select Date</b></label>
                                    <div class="col-md-6">
                                        <input type="text" id="edit_date" name="edit_date" class="form-control date date-pick" data-date-format="yyyy-mm-dd" autocomplete="off" placeholder="Date">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-4" for="itinerary" style='text-align: right;color:black;'><b>Select itinerary Type</b></label>
                                    <div class="col-md-6">
                                        <select name="edit_itinerary_type" id="edit_itinerary_type" class="form-control noSelect2">
                                            <option></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-4" for="itinerary" style='text-align: right;color:black;'><b>Amount</b></label>
                                    <div class="col-md-6">
                                        <input type="text" id="edit_amount" name="edit_amount" class="form-control numeric" size="16">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-4" for="itinerary" style='text-align: right;color:black;'><b>Description</b></label>
                                    <div class="col-md-6">
                                        <textarea cols="3" type="text" id="edit_description" name="edit_description" class="form-control" size="16"></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="control-label col-md-4" for="itinerary" style='text-align: right;color:black;'><b>Opening KM</b></label>
                                    <div class="col-md-6">
                                        <input type="text" id="edit_opening_km" name="edit_opening_km" class="form-control numeric" size="16">
                                    </div>
                                </div>
                                <br>
                                <div class="form-group row">
                                    <label class="control-label col-md-4" for="itinerary" style='text-align: right;color:black;'><b>Closing KM</b></label>
                                    <div class="col-md-6">
                                        <input type="text" id="edit_closing_km" name="edit_closing_km" class="form-control numeric" size="16">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-4" for="itinerary" style='text-align: right;color:black;'><b>Receipt No</b></label>
                                    <div class="col-md-6">
                                        <input type="text" id="edit_receipt_no" name="edit_receipt_no" class="form-control" size="16">
                                    </div>
                                </div>
                                <div class="form-group row" id="selectAttachment">
                                    <label class="control-label col-md-4" style='text-align: right;color:black;'><b>Attachment</b></label>
                                    <div class="col-md-6" id="attachment">
                                        <input type="file" name="edit_attachment" id="edit_attachment" class="form-control input-optional" placeholder="PDF,JPG,PNG">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div id="edit_image" style="border: 1px solid #808080;box-shadow: #808080;width: 200px;height: 300px"></div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer" style="margin-top: 20px;margin:5px">
                <button type="button" onclick="edit_save()" class="btn btn-primary">Edit</button>
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


<div class="modal fade bs-example-modal-lg in" id="add_new_modal" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg"  style="min-width: 100%; max-width: 100%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="udModalLabel"></h4>
            </div>
            <div class="modal-body">
                <div class="row" style="margin-right:5px;margin-left: 5px;margin-top: 10px">
                    <h4  class="sub-head">Pending itinerary Information</h4>
                    <div class="col-md-12" class="table-scrollable">
                        <table style="width:100%" class="st-lumi-table" cellspacing="2" cellpadding="5" border="0">
                            <tbody><tr>
                                <td style="text-align:center">
                                    <form id="saved_form" class="form-horizontal" role="form">
                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="fresh-table  table table-bordered order-column dataTable">
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <table style="width:100%" class="st-lumi-table" cellspacing="2" cellpadding="5" border="1" id="dytable">
                                                        <thead>
                                                        <tr>
                                                            <th class="all" style="width: 30px">#</th>
                                                            <th class="all">Month</th>
                                                            <th class="all">Sales Executive</th>
                                                            <th class="all">AREA Manager</th>
                                                            <th class="all">Sales Staff</th>
                                                            <th class="all">Sales Manager</th>
                                                            <th width="10" scope="col"><input type="checkbox" id="check_all"></th>
                                                        </tr>
                                                        </thead>
                                                        <tbody id="filtered_data" class="st-lumi-table">

                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </form>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                </form>
            </div>
            <div class="modal-footer" style="margin-top: 20px">
                <button type="button" class="btn btn-primary" onclick="save_bulk_approve()"> Approve </button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>





<script type="text/javascript">

    var save_method;
    var itineraryInfo;

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

        itineraryInfo = $('#itineraryInfo').DataTable({

            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            // Load data for the table's content from an Ajax source
            "ajax":{
                "data": {
                    "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
                },
                "url": "<?php echo base_url()?>systems/administration/get_all_logs",
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
                { "bSortable": false,"bSearchable": false }
            ],
            rowCallback: function(row, data, index){

                if(data[3] == "Pending"){
                    $(row).find('td:eq(3)').html('<span style="background-color: #f1a20a;color: white;border-radius: 5px">&nbsp;&nbsp;Pending&nbsp;&nbsp;</span>');
                }
                else if(data[3] == "Approved"){
                    $(row).find('td:eq(3)').html('<span style="background-color: #31CC7D;color: white;border-radius: 5px">&nbsp;&nbsp;Approved&nbsp;&nbsp;</span>');
                }
                else if(data[3] == "Rejected"){
                    $(row).find('td:eq(3)').html('<span style="background-color: red;color: white;border-radius: 5px">&nbsp;&nbsp;Rejected&nbsp;&nbsp;</span>');
                }

                if(data[4] == "Pending"){
                    $(row).find('td:eq(4)').html('<span style="background-color: #f1a20a;color: white;border-radius: 5px">&nbsp;&nbsp;Pending&nbsp;&nbsp;</span>');
                }
                else if(data[4] == "Approved"){
                    $(row).find('td:eq(4)').html('<span style="background-color: #31CC7D;color: white;border-radius: 5px">&nbsp;&nbsp;Approved&nbsp;&nbsp;</span>');
                }
                else if(data[4] == "Rejected"){
                    $(row).find('td:eq(4)').html('<span style="background-color: red;color: white;border-radius: 5px">&nbsp;&nbsp;Rejected&nbsp;&nbsp;</span>');
                }

                if(data[5] == "Pending"){
                    $(row).find('td:eq(5)').html('<span style="background-color: #f1a20a;color: white;border-radius: 5px">&nbsp;&nbsp;Pending&nbsp;&nbsp;</span>');
                }
                else if(data[5] == "Approved"){
                    $(row).find('td:eq(5)').html('<span style="background-color: #31CC7D;color: white;border-radius: 5px">&nbsp;&nbsp;Approved&nbsp;&nbsp;</span>');
                }
                else if(data[5] == "Rejected"){
                    $(row).find('td:eq(5)').html('<span style="background-color: red;color: white;border-radius: 5px">&nbsp;&nbsp;Rejected&nbsp;&nbsp;</span>');
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

        itineraryInfo.on('order.dt search.dt', function () {
            itineraryInfo.column(0, {search: 'applied', order: 'applied'}).nodes().each(function (cell, i) {
                cell.innerHTML = i + 1;
            });
        }).draw();

        yadcf.init(itineraryInfo, [{
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
            }],
            {
                filters_position: 'footer',
                cumulative_filtering: true
            });
    });

    function reload_table(itineraryInfo)
    {
        if(typeof itineraryInfo !== "undefined")
        {
            itineraryInfo.ajax.reload(null,false);
        }
    }
</script>

<script>

function search_credit(){

    $("#sales_executive_title").css('display','none');
    $("#sales_executive_div").css('display','none');
    $('#loading_modal').modal({backdrop: 'static', keyboard: false});

    $.ajax({

        url:"<?php echo base_url('insurance/sales_itinerary/get_credit_limit'); ?>",
        dataType:"JSON",
        type:"POST",
        data:$('#itinerary_form').serialize()+"&<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>",
        success:function(data){

            if(data.status == true) {

                var html="";
                $("#sales_executive_tbody").html("");

                for(var i=0;i<data.sales_executives.length;i++){
                    html +='<tr>'+
                    '<td style="text-align: center">'+(i+1)+'</td>'+
                    '<td>'+data.sales_executives[i].rep+'</td>'+
                    '<td>'+data.sales_executives[i].name+'</td>'+
                    '<td>' +
                    '<input type="text" class="form-control numeric" value="'+data.amount_array[data.sales_executives[i].rep]+'" name="amount['+data.sales_executives[i].rep+']">' +
                    '</td>'+
                    '</tr>';
                }

                $("#sales_executive_tbody").html(html);

                $("#sales_executive_title").show();
                $("#sales_executive_div").show();
            }
            console.log(data);
            $("#loading_modal").modal('hide');
        },
        error:function(){
            $("#loading_modal").modal('hide');
            reload_table(itineraryInfo);
        }
    });
}

function save(){

    $("#loading_modal").modal({backdrop: 'static', keyboard: false});
    var url="<?php echo base_url('insurance/sales_itinerary/save'); ?>";

    var formData = new FormData();
    var file = $('#itinerary_form input[type=file]')[0].files[0];
    formData.append("file", file);
    formData.append("<?php echo $this->security->get_csrf_token_name(); ?>", "<?php echo $this->security->get_csrf_hash(); ?>");
    var basic_data = $("#itinerary_form").serializeArray();
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
                reload_table(itineraryInfo);
                $('#itinerary_modal').modal('hide');
            }
            $('#loading_modal').modal('hide');
        },
        error:function(){
            $('#loading_modal').modal('hide');
            reload_table(itineraryInfo);
        }
    });
}

function add_itinerary(){

    $("#sales_executive_title").css('display','none');
    $("#sales_executive_div").css('display','none');

    $('.error-block').empty();
    save_method='add';
    $('#itinerary_form')[0].reset();

    $('#itinerary_modal_title').html('Add New insurance');
    $('#itinerary_modal').modal({backdrop: 'static', keyboard: false});

}

function add_settings(){

    $('#settings_modal_title').html('New Settings');
    $('#settings_modal').modal({backdrop: 'static', keyboard: false});

}

function edit_save(){

    $("#loading_modal").modal({backdrop: 'static', keyboard: false});
    var url="<?php echo base_url('insurance/sales_itinerary/edit_save'); ?>";

    var formData = new FormData();
    var file = $('#edit_itinerary_form input[type=file]')[0].files[0];
    formData.append("file", file);
    formData.append("<?php echo $this->security->get_csrf_token_name(); ?>", "<?php echo $this->security->get_csrf_hash(); ?>");
    var basic_data = $("#edit_itinerary_form").serializeArray();
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
            $('#loading_modal').modal('hide');
            reload_table(itineraryInfo);
            $('#edit_modal').modal('hide');

            if(data.status == true){

                bootbox.dialog({
                    message: data.message,
                    title: "Success !",
                    buttons: {
                        danger: {
                            label: "OK",
                            className: "btn-primary",
                            callback: function() {
                                $("#backButton").click();
                            }
                        }
                    }
                });

            }
            else{

                bootbox.dialog({
                    message: data.message,
                    title: "Sorry!",
                    buttons: {
                        danger: {
                            label: "Close",
                            className: "btn-danger",
                            callback: function() {
                                $("#backButton").click();
                            }
                        }
                    }
                });

            }

        },
        error:function(){
            $('#loading_modal').modal('hide');
            reload_table(itineraryInfo);
        }
    });
}

function approve_save(){

    $("#loading_modal").modal({backdrop: 'static', keyboard: false});
    var url="<?php echo base_url('insurance/sales_itinerary/approve_save'); ?>";

    var formData = new FormData();
    formData.append("<?php echo $this->security->get_csrf_token_name(); ?>", "<?php echo $this->security->get_csrf_hash(); ?>");
    var basic_data = $("#approve_itinerary_form").serializeArray();
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
            $('#loading_modal').modal('hide');
            if(data.status == true){

                bootbox.dialog({
                    message: data.message,
                    title: "Success !",
                    buttons: {
                        danger: {
                            label: "OK",
                            className: "btn-primary",
                            callback: function() {
                                $("#backButton").click();
                            }
                        }
                    }
                });
            }
            else{

                bootbox.dialog({
                    message: data.message,
                    title: "Sorry!",
                    buttons: {
                        danger: {
                            label: "Close",
                            className: "btn-danger",
                            callback: function() {
                                $("#backButton").click();
                            }
                        }
                    }
                });
            }

            reload_table(itineraryInfo);
            $('#approve_modal').modal('hide');
        },
        error:function(){
            $('#loading_modal').modal('hide');
            reload_table(itineraryInfo);
        }
    });
}

</script>

<script>

    function edit_itinerary(id){

        $("#edit_itinerary_form")[0].reset();
        $.ajax({

            url: "<?php echo base_url('insurance/sales_itinerary/edit_itinerary'); ?>/"+id,
            type: "POST",
            dataType: "JSON",
            data:{
                '<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>'
            },
            success:function(data){

                $('[name="edit_id"]').val(id);
                $('[name="edit_date"]').val(data.itinerary.date);
                $('[name="edit_itinerary_type"]').val(data.itinerary.itinerary_type);
                $('[name="edit_amount"]').val(data.itinerary.amount);
                $('[name="edit_description"]').val(data.itinerary.description);
                $('[name="edit_opening_km"]').val(data.itinerary.opening_km);
                $('[name="edit_closing_km"]').val(data.itinerary.closing_km);
                $("#itinerary_code").val(data.itinerary.itinerary_code);
                $('[name="edit_receipt_no"]').val(data.itinerary.receipt_no);
                $("#edit_image").html('');
                if(data.itinerary.path != null){
                    $("#edit_image").html('<img src="<?php echo base_url(); ?>uploads/insurance/'+data.itinerary.path+'" style="width: 200px;height: 300px;padding:5px"/>');
                }
                else{
                    $("#edit_image").html('<img src="<?php echo base_url(); ?>uploads/insurance/no_image.jpg" style="width: 200px;height: 300px;"/>');
                }

                $('#edit_modal .modal-title').text("Edit insurance "+data.itinerary.itinerary_code+" - "+data.itinerary.date);
                $('#edit_modal').modal({backdrop:'static',keyboard:false});

            },
            error: function(jqXHR, textStatus, errorThrown){

                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
            }

        });
    }

    function approve_itinerary(rep_id,ref_month){

        $("#approve_itinerary_form")[0].reset();
        $.ajax({

            url: "<?php echo base_url('insurance/sales_itinerary/edit_itinerary'); ?>/"+rep_id+"/"+ref_month,
            type: "POST",
            dataType: "JSON",
            data:{
                '<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>'
            },
            success:function(data){

                $('[name="approve_id"]').val(rep_id);
                $('[name="approve_status"]').val(data.itinerary.area_manager);

                $('#approve_modal .modal-title').text("Approval insurance "+rep_id+" - "+ref_month);
                $('#approve_modal').modal({backdrop:'static',keyboard:false});

            },
            error: function(jqXHR, textStatus, errorThrown){

                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
            }

        });
    }



    //get master work flow status
    $.ajax({
        async: false,
        url: "<?php echo site_url('insurance/sales_itinerary/get_work_flow_status'); ?>",
        type: "POST",
        data: {
            "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash() ?>"
        },
        dataType: "JSON",
        success: function(data)
        {
            $('#approve_status').html("<option value=''></option>");
            $.each(data, function(id,name)
            {
                var opt = $('<option />');
                opt.val(id);
                opt.text(name);
                $('#approve_status').append(opt);
            });
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data3');
        }
    });

</script>




