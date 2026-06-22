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
    .modal .select2-container {
        width: 100% !important;
        display: block;
        padding: 0.375rem 0.75rem;
        font-size: 0.9rem;
        line-height: 1.5;
        color: #495057;
        background-color: #fff;
        background-clip: padding-box;
        border: 2px solid #dde2ec;
        border-radius: 4px;
        -webkit-transition: border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
        transition: border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;

    }
    .modal .select2-container--default .select2-selection--single {
        border: none;
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
                <li class="breadcrumb-item active">Assets Management</li>
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
                <h4 class="page-head-title card-title  text-white" style="display: inline-block"> Assets Management</h4>
            </div>
            <div class="element-box">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item"><a class="nav-link active" role="tab" href="#tab_1" data-toggle="tab"> Allocation</a></li>
                    <li class="nav-item"><a class="nav-link" role="tab" href="#tab_4" data-toggle="tab"> Pending Return Items</a></li>
                    <li class="nav-item"><a class="nav-link" role="tab" href="#tab_5" data-toggle="tab"> Returned Items</a></li>
                    <li class="nav-item"><a class="nav-link" role="tab" href="#tab_7" data-toggle="tab"> Item In Stock</a></li>
                    <li class="nav-item"><a class="nav-link" role="tab" href="#tab_2" data-toggle="tab"> Item</a></li>
                    <li class="nav-item"><a class="nav-link" role="tab" href="#tab_3" data-toggle="tab"> Item Categories</a></li>
                    <li class="nav-item"><a class="nav-link" role="tab" href="#tab_6" data-toggle="tab"> Item Brands</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content tabcontent-border">
                    <div class="tab-pane p-20 active" role="tabpanel" id="tab_1">
                        <button type="button" class="btn btn-success pull-right" onclick='add_allocation();' style="margin-right: 10px" ><i class="fa fa-plus-circle"></i> Add Allocation</button>
                        <table id="asset_allocation_datatable" class="table" cellspacing="0" width="100%">
                            <thead style="background-color: #912fa6;color: white;">
                            <tr>
                                <th>#</th>
                                <th>ALLOCATION NO</th>
                                <th>Employee</th>
                                <th>Item Category</th>
                                <th>Item Name</th>
                                <th style="max-width:100px;">Issued Date</th>
                                <th style="max-width:100px;">Qty</th>
                                <th style="max-width:100px;">Returnable</th>
                                <th style="max-width:100px;">Return Status</th>
                                <th style="max-width:200px;">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane p-20" role="tabpanel" id="tab_2">
                        <button type="button" class="btn btn-success pull-right" onclick='add_item();' style="margin-right: 10px" ><i class="fa fa-plus-circle"></i> Add Item </button>
                        <table id="items_table" class="table" cellspacing="0" width="100%">
                            <thead style="background-color: #912fa6;color: white;">
                            <tr>
                                <th>#</th>
                                <th>Serial</th>
                                <th>Code</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Brand</th>
                                <th>Assigned Qty</th>
                                <th>Status</th>
                                <th style="max-width:200px;">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane p-20" role="tabpanel" id="tab_3">
                        <button type="button" class="btn btn-success pull-right" onclick='add_item_category();' style="margin-right: 10px" ><i class="fa fa-plus-circle"></i> Add Category </button>
                        <table id="items_categories_table" class="table" cellspacing="0" width="100%">
                            <thead style="background-color: #912fa6;color: white;">
                            <tr>
                                <th>#</th>
                                <th>Code</th>
                                <th>Name</th>
                                <th width="100">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane p-20" role="tabpanel" id="tab_6">
                        <button type="button" class="btn btn-success pull-right" onclick='add_item_brand();' style="margin-right: 10px" ><i class="fa fa-plus-circle"></i> Add Brand </button>
                        <table id="items_brands_table" class="table" cellspacing="0" width="100%">
                            <thead style="background-color: #912fa6;color: white;">
                            <tr>
                                <th>#</th>
                                <th>Code</th>
                                <th>Name</th>
                                <th width="100">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane p-20" role="tabpanel" id="tab_4">
                        <table id="pending_return_datatable" class="table" cellspacing="0" width="100%">
                            <thead style="background-color: #912fa6;color: white;">
                            <tr>
                                <th>#</th>
                                <th>ALLOCATION NO</th>
                                <th>Employee</th>
                                <th>Item Category</th>
                                <th>Item Name</th>
                                <th style="max-width:100px;">Issued Date</th>
                                <th style="max-width:100px;">Qty</th>
                                <th style="max-width:200px;">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane p-20" role="tabpanel" id="tab_5">
                        <table id="returned_datatable" class="table" cellspacing="0" width="100%">
                            <thead style="background-color: #912fa6;color: white;">
                            <tr>
                                <th>#</th>
                                <th>ALLOCATION NO</th>
                                <th>Employee</th>
                                <th>Item Category</th>
                                <th>Item Name</th>
                                <th style="max-width:100px;">Qty</th>
                                <th style="max-width:100px;">Issued Date</th>
                                <th style="max-width:100px;">Returned Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane p-20" role="tabpanel" id="tab_7">
                        <table id="stock_datatable" class="table" cellspacing="0" width="100%">
                            <thead style="background-color: #912fa6;color: white;">
                            <tr>
                                <th>#</th>
                                <th>Serial No</th>
                                <th>Item</th>
                                <th>Item Category</th>
                                <th>Item Brand</th>
                                <th style="max-width:100px;">Total Items</th>
                                <th style="max-width:100px;">Issued Items</th>
                                <th style="max-width:100px;">Balance Items</th>
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
<div class="modal fade" id="asset_allocation_modal" role="dialog">
    <div class="modal-dialog modal-full" style="max-width: 500px">
        <div class="modal-content">
            <div class="modal-header bg-blue-steel bg-font-blue-steel">
                <h4 class="modal-title bold uppercase" style="height:10px"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body form">
                <form action="#" id="asset_allocations" class="form-horizontal">
                    <input type="hidden" id="asset_allocation_id" name="asset_allocation_id"/>
                    <div class="form-body" style="padding: 0px 10px;">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label" >Item Category</label>
                                    <select id="allocation_item_category" name="allocation_item_category" class="form-control select2" required="required">
                                        <option value="">--</option>
                                        <?php foreach ($item_categories as $category){ ?>
                                            <option value="<?php echo $category->id; ?>"><?php echo $category->code . " - " . $category->name; ?></option>
                                        <?php } ?>
                                    </select>
                                    <span class="error-block"></span>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" >Item</label>
                                    <select id="allocation_item" name="allocation_item" class="form-control select2" required="required">
                                        <option value="">--</option>
                                    </select>
                                    <span class="error-block"></span>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" >Employee</label>
                                    <select id="employee_id" name="employee_id" class="form-control select2" required="required">
                                        <option value="">--</option>
                                        <?php foreach ($employees as $employee) { ?>
                                            <option value="<?php echo $employee->id; ?>"><?php echo $employee->employee_id . " - " . $employee->initials. " " . $employee->last_name; ?></option>
                                        <?php } ?>
                                    </select>
                                    <span class="error-block"></span>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" >Quantity</label>
                                    <input type="text" name="allocation_qty" id="allocation_qty" class="form-control">
                                    <span class="error-block"></span>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" >Date Issued</label>
                                    <input type="text" name="date_issued" id="date_issued" class="form-control date-pick">
                                    <span class="error-block"></span>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" >Is returnable?</label>
                                    <input id="is_returnable" name="is_returnable" type="checkbox" value="1">
                                    <span class="error-block"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>


<!-- Bootstrap modal -->
<div class="modal fade" id="asset_return_modal" role="dialog">
    <div class="modal-dialog modal-full" style="max-width: 500px">
        <div class="modal-content">
            <div class="modal-header bg-blue-steel bg-font-blue-steel">
                <h4 class="modal-title bold uppercase" style="height:10px"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body form">
                <form action="#" id="asset_returns" class="form-horizontal">
                    <input type="hidden" id="asset_return_id" name="asset_return_id"/>
                    <div class="form-body" style="padding: 0px 10px;">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label" >Status</label>
                                    <select id="return_status" name="return_status" class="form-control select2" required="required">
                                        <option value="">--</option>
                                        <option value="0">Not Return</option>
                                        <option value="1">Returned</option>
                                    </select>
                                    <span class="error-block"></span>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" >Date Returned</label>
                                    <input type="text" name="returned_date" id="returned_date" class="form-control date-pick">
                                    <span class="error-block"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSaveReturn" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap modal -->
<div class="modal fade" id="item_modal" role="dialog">
    <div class="modal-dialog modal-full" style="max-width: 500px">
        <div class="modal-content">
            <div class="modal-header bg-blue-steel bg-font-blue-steel">
                <h4 class="modal-title bold uppercase" style="height:10px"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body form">
                <form action="#" id="item_form" class="form-horizontal">
                    <input type="hidden" id="item_id" name="item_id"/>
                    <div class="form-body" style="padding: 0px 10px;">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label" >Category</label>
                                    <select id="item_category" name="item_category" class="form-control select2" required="required">
                                        <option value="">--</option>
                                        <?php foreach ($item_categories as $item) { ?>
                                            <option value="<?php echo $item->id; ?>"><?php echo $item->code . " - " . $item->name; ?></option>
                                        <?php } ?>
                                    </select>
                                    <span class="error-block"></span>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" >Brand</label>
                                    <select id="item_brand" name="item_brand" class="form-control select2" required="required">
                                        <option value="">--</option>
                                        <?php foreach ($item_brands as $brand) { ?>
                                            <option value="<?php echo $brand->id; ?>"><?php echo $brand->code . " - " . $brand->name; ?></option>
                                        <?php } ?>
                                    </select>
                                    <span class="error-block"></span>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" >Serial</label>
                                    <input type="text" name="item_serial" id="item_serial" class="form-control ">
                                    <span class="error-block"></span>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" >Code</label>
                                    <input type="text" name="item_code" id="item_code" class="form-control ">
                                    <span class="error-block"></span>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" >Name</label>
                                    <input type="text" name="item_name" id="item_name" class="form-control ">
                                    <span class="error-block"></span>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" >Qty</label>
                                    <input type="text" name="item_qty" id="item_qty" class="form-control ">
                                    <span class="error-block"></span>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" >Active</label>
                                    <input id="is_active" name="is_active" type="checkbox" value="1">
                                    <span class="error-block"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSaveItem" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>


<!-- Bootstrap modal -->
<div class="modal fade" id="item_category_modal" role="dialog">
    <div class="modal-dialog modal-full" style="max-width: 500px">
        <div class="modal-content">
            <div class="modal-header bg-blue-steel bg-font-blue-steel">
                <h4 class="modal-title bold uppercase" style="height:10px"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body form">
                <form action="#" id="item_category_form" class="form-horizontal">
                    <input type="hidden" id="item_category_id" name="item_category_id"/>
                    <div class="form-body" style="padding: 0px 10px;">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label" >Code</label>
                                    <input type="text" name="item_category_code" id="item_category_code" class="form-control ">
                                    <span class="error-block"></span>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" >Name</label>
                                    <input type="text" name="item_category_name" id="item_category_name" class="form-control ">
                                    <span class="error-block"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSaveItemCategory" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>


<!-- Bootstrap modal -->
<div class="modal fade" id="item_brand_modal" role="dialog">
    <div class="modal-dialog modal-full" style="max-width: 500px">
        <div class="modal-content">
            <div class="modal-header bg-blue-steel bg-font-blue-steel">
                <h4 class="modal-title bold uppercase" style="height:10px"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body form">
                <form action="#" id="item_brand_form" class="form-horizontal">
                    <input type="hidden" id="item_brand_id" name="item_brand_id"/>
                    <div class="form-body" style="padding: 0px 10px;">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label" >Code</label>
                                    <input type="text" name="item_brand_code" id="item_brand_code" class="form-control ">
                                    <span class="error-block"></span>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" >Name</label>
                                    <input type="text" name="item_brand_name" id="item_brand_name" class="form-control ">
                                    <span class="error-block"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSaveItemBrand" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    var save_method;

    $(document).ready(function() {
        $("#btnSave").off('click');
        $("#btnSave").on('click', function(e){
            e.preventDefault();
            save_allocation(save_method);
        });
        $("#btnSaveItemCategory").off('click');
        $("#btnSaveItemCategory").on('click', function(e){
            e.preventDefault();
            save_item_category(save_method);
        });
        $("#btnSaveItemBrand").off('click');
        $("#btnSaveItemBrand").on('click', function(e){
            e.preventDefault();
            save_item_brand(save_method);
        });
        $("#btnSaveItem").off('click');
        $("#btnSaveItem").on('click', function(e){
            e.preventDefault();
            save_item(save_method);
        });
        $("#btnSaveReturn").off('click');
        $("#btnSaveReturn").on('click', function(e){
            e.preventDefault();
            save_item_return();
        });

        $(".modal :input").change(function(){
            $(this).siblings("span.error-block").html("").hide();
            $("span.help-inline").hide();
        });

        $('.modal').on('hidden.bs.modal', function(){

            $("form :input").siblings("span.error-block").html("").hide();
            $("span.help-inline").hide();
            $("select").select2("destroy").select2();

        });

    });


    var table;


    function reload_table(table)
    {
        if(typeof table !== "undefined")
        {
            table.ajax.reload(null,false);
        }
    }


    //Allocation
    var asset_allocation_datatable;
    var pending_return_datatable;
    var returned_datatable;
    var stock_datatable;

    $(document).ready(function() {

        asset_allocation_datatable = $('#asset_allocation_datatable').DataTable({
            "processing": true,
            "serverSide": true,

            "ajax": {
                "data": {
                    "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
                },
                "url": "<?=base_url()?>systems/assets_management/get_assets_allocation_data",
                "type": "POST"
            },

            "columnDefs": [
                {
                    "targets": [ -1 ],
                    "orderable": false
                }
            ],
            rowCallback: function(row, data, index) {

                if (data[7] == 0){
                    $(row).find('td:eq(7)').html('<span style="background-color: #188066;color: white;border-radius: 5px">&nbsp;&nbsp;NO&nbsp;&nbsp;</span>');
                }
                else if (data[7] == 1) {
                    $(row).find('td:eq(7)').html('<span style="background-color: #11caff;color: white;border-radius: 5px">&nbsp;&nbsp;YES&nbsp;&nbsp;</span>');
                }

                if (data[8] == 0){
                    $(row).find('td:eq(8)').html('<span style="background-color: #ff1d17;color: white;border-radius: 5px">&nbsp;&nbsp;NO&nbsp;&nbsp;</span>');
                }
                else if (data[8] == 1) {
                    $(row).find('td:eq(8)').html('<span style="background-color: #34acff;color: white;border-radius: 5px">&nbsp;&nbsp;YES&nbsp;&nbsp;</span>');
                }
            },
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
        asset_allocation_datatable.on( 'order.dt search.dt', function () {
            asset_allocation_datatable.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i){
                cell.innerHTML = i+1;
            } );
        } ).draw();

    });

    $(document).ready(function() {

        stock_datatable = $('#stock_datatable').DataTable({
            "processing": true,
            "serverSide": true,

            "ajax": {
                "data": {
                    "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
                },
                "url": "<?=base_url()?>systems/assets_management/get_assets_stock_data",
                "type": "POST"
            },

            "columnDefs": [
                {
                    "targets": [ -1 ],
                    "orderable": false
                }
            ],
            rowCallback: function(row, data, index) {

                if (data[7] == 0){
                    $(row).css({'background-color':'#ff1d17','color': 'white','border-radius': '5px'});
                }
            },
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
        stock_datatable.on( 'order.dt search.dt', function () {
            stock_datatable.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i){
                cell.innerHTML = i+1;
            } );
        } ).draw();

    });

    $(document).ready(function() {

        pending_return_datatable = $('#pending_return_datatable').DataTable({
            "processing": true,
            "serverSide": true,

            "ajax": {
                "data": {
                    "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
                },
                "url": "<?=base_url()?>systems/assets_management/get_pending_return_datatable",
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
        pending_return_datatable.on( 'order.dt search.dt', function () {
            pending_return_datatable.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i){
                cell.innerHTML = i+1;
            } );
        } ).draw();

    });

    $(document).ready(function() {

        returned_datatable = $('#returned_datatable').DataTable({
            "processing": true,
            "serverSide": true,

            "ajax": {
                "data": {
                    "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
                },
                "url": "<?=base_url()?>systems/assets_management/get_returned_datatable",
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
        returned_datatable.on( 'order.dt search.dt', function () {
            returned_datatable.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i){
                cell.innerHTML = i+1;
            } );
        } ).draw();

    });

    function add_allocation()
    {
        $.ajax({
            url : "<?php echo site_url('systems/assets_management/get_last_allocation_number')?>",
            type: "POST",
            "data": {
                "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
            },
            dataType: "JSON",
            success: function(data)
            {

                $('#asset_allocations')[0].reset();
                save_method = 'add';
                $('#asset_allocation_modal').modal({backdrop: 'static', keyboard: false});
                $('#asset_allocation_modal .modal-title').text('Add New Allocation - '+data.allocation_no);

            },
            error: function ()
            {
                console.log('Error Get Item Data');
            }
        });
    }


    function save_allocation(save_method)
    {

        var url = "<?php echo site_url('systems/assets_management/save_allocation')?>/" + save_method;

        $.ajax({
            url: url,
            type: "POST",
            data: $('#asset_allocations').serialize() + "&<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>",
            dataType: "JSON",
            success: function (data) {

                if (data.status) {

                    reload_table(asset_allocation_datatable);
                    reload_table(pending_return_datatable);
                    reload_table(returned_datatable);
                    $('#asset_allocation_modal').modal('hide');
                }
                else{

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

    function save_item_return()
    {

        var url = "<?php echo site_url('systems/assets_management/save_item_return')?>";

        $.ajax({
            url: url,
            type: "POST",
            data: $('#asset_returns').serialize() + "&<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>",
            dataType: "JSON",
            success: function (data) {

                if (data.status) {
                    reload_table(asset_allocation_datatable);
                    reload_table(pending_return_datatable);
                    reload_table(returned_datatable);
                    $('#asset_return_modal').modal('hide');
                }
                else{

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

    function edit_allocation(id)
    {

        $('#asset_allocations')[0].reset();
        save_method = 'edit';
        $('.help-block').empty();

        $("#asset_allocation_id").val(id);

        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo site_url('systems/assets_management/edit_get_allocation_data')?>/" + id,
            type: "POST",
            "data": {
                "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
            },
            dataType: "JSON",
            success: function(data)
            {

                if(data.status == 0){

                    $('[name="allocation_item"]').val(data.item_id);
                    $('[name="allocation_item_category"]').val(data.item_category_id);

                    get_item_by_category(data.item_category_id);

                    $('[name="employee_id"]').val(data.employee_id);
                    $('[name="allocation_qty"]').val(data.qty);
                    $('[name="date_issued"]').val(data.date_issued);
                    $('[name="allocation_qty"]').val(data.allocation_qty);

                    if(data.is_returnable == 1){
                        $('#is_returnable').prop('checked',true);
                    }

                    $('.select2').select2();

                    $('#asset_allocation_modal').modal({backdrop: 'static', keyboard: false});
                    $('#asset_allocation_modal .modal-title').text('Edit Allocation : #' + data.allocation_no);

                }
                else{
                    bootbox.dialog({
                        message: "This Items have Already Returned",
                        title: "Alert!",
                        buttons: {
                            cancel: {
                                label: "OK",
                                className: "btn-primary",
                            }
                        }
                    });
                }

            },
            error: function ()
            {
                console.log('Error get Allocation data');
            }
        });

    }


    function return_item(id)
    {

        $('#asset_returns')[0].reset();
        save_method = 'edit';
        $('.help-block').empty();

        $("#asset_return_id").val(id);
        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo site_url('systems/assets_management/edit_get_allocation_data')?>/" + id,
            type: "POST",
            "data": {
                "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
            },
            dataType: "JSON",
            success: function(data)
            {

                if(data.is_returnable == 1){

                    $('[name="return_status"]').val(data.status);
                    $('.select2').select2();

                    $('#asset_return_modal').modal({backdrop: 'static', keyboard: false});
                    $('#asset_return_modal .modal-title').text('Return Assets : #' + data.allocation_no);

                }
                else{
                    bootbox.dialog({
                        message: "This is not Returnable Item",
                        title: "Alert!",
                        buttons: {
                            cancel: {
                                label: "OK",
                                className: "btn-primary",
                            }
                        }
                    });
                }

            },
            error: function ()
            {
                console.log('Error get Return data');
            }
        });

    }

    function delete_allocation(id)
    {
        bootbox.dialog({
            message: "Are you sure, that you want to delete this Allocation record?",
            title: "Alert!",
            buttons: {
                ok: {
                    label: "Yes",
                    className: "btn-primary",
                    callback: function () {
                        $.ajax({
                            url : "<?=base_url()?>systems/assets_management/delete_allocation",
                            type: "POST",
                            data: {
                                "allocation_id": id,
                                "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
                            },
                            dataType: "JSON",
                            success: function(data)
                            {
                                reload_table(asset_allocation_datatable);
                                bootbox.alert(data.message);
                                //data.status ? console.log("Delete successful!") : console.log("Delete failed!");
                            },
                            error: function (jqXHR, textStatus, errorThrown)
                            {
                                console.log(jqXHR);
                                console.log(textStatus);
                                console.log(errorThrown);
                                console.log('Error while Delete Allocation record');
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



    //Item Categories
    //////////////////////////////////////////////////////***********************************************************
    var items_categories_table;
    var items_brands_table;

    $(document).ready(function() {

        items_categories_table = $('#items_categories_table').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "data": {
                    "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
                },
                "url": "<?=base_url()?>systems/assets_management/get_items_categories_data",
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
                { extend: 'print', text:      '<i class="fa fa-print"></i>', titleAttr: 'Print' },
                { extend:    'copyHtml5', text:      '<i class="fa fa-files-o"></i>', titleAttr: 'Copy' },
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


        items_brands_table = $('#items_brands_table').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "data": {
                    "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
                },
                "url": "<?=base_url()?>systems/assets_management/get_items_brands_data",
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
                { extend: 'print', text:      '<i class="fa fa-print"></i>', titleAttr: 'Print' },
                { extend:    'copyHtml5', text:      '<i class="fa fa-files-o"></i>', titleAttr: 'Copy' },
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


    });

    function add_item_category()
    {
        $('#item_category_form')[0].reset();
        save_method = 'add_item_category';
        $('#item_category_modal').modal({backdrop: 'static', keyboard: false});
        $('#item_category_modal .modal-title').text('Add Item category');
    }

    function add_item_brand()
    {
        $('#item_brand_form')[0].reset();
        save_method = 'add_item_brand';
        $('#item_brand_modal').modal({backdrop: 'static', keyboard: false});
        $('#item_brand_modal .modal-title').text('Add Item Brand');
    }


    function save_item_category(save_method)
    {
        var url = "<?php echo site_url('systems/assets_management/save_items_category')?>/" + save_method;
        $.ajax({
            url: url,
            type: "POST",
            data: $('#item_category_form').serialize() + "&<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>",
            dataType: "JSON",
            success: function (data) {
                if (data.status) {
                    $('#item_category_modal').modal('hide');
                    reload_table(items_categories_table);
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


    function save_item_brand(save_method)
    {
        var url = "<?php echo site_url('systems/assets_management/save_items_brand')?>/" + save_method;
        $.ajax({
            url: url,
            type: "POST",
            data: $('#item_brand_form').serialize() + "&<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>",
            dataType: "JSON",
            success: function (data) {
                if (data.status) {
                    $('#item_brand_modal').modal('hide');
                    reload_table(items_brands_table);
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

    function edit_item_category(id)
    {
        $('#item_category_form')[0].reset();
        save_method = 'edit_item_category';
        $('.help-block').empty();
        $("#item_category_id").val(id);
        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo site_url('systems/assets_management/get_item_category_data')?>/" + id,
            type: "GET",
            "data": {
                "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
            },
            dataType: "JSON",
            success: function(data)
            {
                $('#item_category_code').val(data.code);
                $('#item_category_name').val(data.name);

                $('#item_category_modal').modal({backdrop: 'static', keyboard: false});
                $('#item_category_modal .modal-title').text('Edit Item Category : ' + data.name);
            },
            error: function ()
            { console.log('Error Get Item Category Data'); }
        });
    }


    function edit_item_brand(id)
    {
        $('#item_brand_form')[0].reset();
        save_method = 'edit_item_brand';
        $('.help-block').empty();
        $("#item_brand_id").val(id);
        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo site_url('systems/assets_management/get_item_brand_data')?>/" + id,
            type: "GET",
            "data": {
                "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
            },
            dataType: "JSON",
            success: function(data)
            {
                $('#item_brand_code').val(data.code);
                $('#item_brand_name').val(data.name);

                $('#item_brand_modal').modal({backdrop: 'static', keyboard: false});
                $('#item_brand_modal .modal-title').text('Edit Item Brand : ' + data.name);
            },
            error: function ()
            { console.log('Error Get Item brand Data'); }
        });
    }


    //Items
    //////////////////////////////////////////////////////***********************************************************
    var items_table;

    $(document).ready(function() {

        items_table = $('#items_table').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "data": {
                    "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
                },
                "url": "<?=base_url()?>systems/assets_management/get_items_data",
                "type": "POST"
            },

            "columnDefs": [
                {
                    "targets": [ -1 ],
                    "orderable": false
                }
            ],
            rowCallback: function(row, data, index) {

                if (data[7] == 0){
                    $(row).find('td:eq(7)').html('<span style="background-color: #ff1d17;color: white;border-radius: 5px">&nbsp;&nbsp;INACTIVE&nbsp;&nbsp;</span>');
                }
                else if (data[7] == 1) {
                    $(row).find('td:eq(7)').html('<span style="background-color: #11caff;color: white;border-radius: 5px">&nbsp;&nbsp;ACTIVE&nbsp;&nbsp;</span>');
                }
            },
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
                { extend: 'print', text:      '<i class="fa fa-print"></i>', titleAttr: 'Print' },
                { extend:    'copyHtml5', text:      '<i class="fa fa-files-o"></i>', titleAttr: 'Copy' },
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


    });

    function add_item()
    {
        $('#item_form')[0].reset();
        save_method = 'add_item';
        $('#item_modal').modal({backdrop: 'static', keyboard: false});
        $('#item_modal .modal-title').text('Add Item');
    }


    function save_item(save_method)
    {
        var url = "<?php echo site_url('systems/assets_management/save_item')?>/" + save_method;
        $.ajax({
            url: url,
            type: "POST",
            data: $('#item_form').serialize() + "&<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>",
            dataType: "JSON",
            success: function (data) {

                if (data.status) {
                    $('#item_modal').modal('hide');
                    reload_table(items_table);
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

    function edit_item(id)
    {
        $('#item_form')[0].reset();
        save_method = 'edit_item';
        $('.help-block').empty();
        $("#item_id").val(id);
        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo site_url('systems/assets_management/get_item_data/')?>/" + id,
            type: "GET",
            "data": {
                "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
            },
            dataType: "JSON",
            success: function(data)
            {
                $('#item_brand').val(data.brand);
                $('#item_serial').val(data.serial);
                $('#item_qty').val(data.qty);
                if(data.status == 1){
                    $('#is_active').prop('checked',true);
                }
                $('#item_code').val(data.code);
                $('#item_name').val(data.name);
                $('#item_category').val(data.item_category_id);

                $('.select2').select2();

                $('#item_modal').modal({backdrop: 'static', keyboard: false});
                $('#item_modal .modal-title').text('Edit Item : ' + data.code);

            },
            error: function ()
            {
                console.log('Error Get Item Data');
            }
        });

    }


    //when select item category retrive items
    $('#allocation_item_category').change(function(){
        get_item_by_category($(this).val());
    });


    function get_item_by_category(id) {

        $.ajax({
            url : "<?php echo site_url('systems/assets_management/getItemByCategory')?>/" + id,
            type: "POST",
            "data": {
                "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
            },
            dataType: "JSON",
            success: function(data)
            {
                $('#allocation_item').html('');
                for(var i=0;i<data.length;i++){
                    $('#allocation_item').append('<option value="'+data[i].id+'">'+data[i].code+' - '+data[i].name+'</option>');
                }
            },
            error: function ()
            {
                console.log('Error Get Item Data');
            }
        });

    }


</script>

