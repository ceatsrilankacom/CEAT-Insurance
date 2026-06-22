<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"></h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Manage Document Types</li>
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
                <h4 class="page-head-title card-title  text-white" style="display: inline-block"> Manage Document Types</h4>
                <button class="btn btn-success pull-right" onclick="add_document_type()"><i class="fa fa-plus"></i> Add Document Type</button>
                <!--<button class="btn btn-default d-none d-lg-block m-l-15" onclick="reload_table(documentTypesDataTable)"><i class="fa fa-refresh"></i> Reload</button>-->
            </div>
            <div class="element-box">
                <div id="document_types">
                    <div class="tools"> </div>
                    <table class="table table-striped table-bordered table-hover table-header-fixed dt-responsive" id="documentTypesTable" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th class="all">Name</th>
                            <th class="desktop">Notify Expiry</th>
                            <th class="desktop">Notify Before 1 Month</th>
                            <th class="desktop">Notify Before 1 Week</th>
                            <th class="desktop">Notify Before 1 Day</th>
                            <th class="desktop">Details</th>
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

<!-- Bootstrap modal -->
<div class="modal fade" id="document_types_modal" role="dialog">
    <div class="modal-dialog  modal-full" style="max-width: 1000px">
        <div class="modal-content">
            <div class="modal-header">
                <h3 id="document_types_modal_title">Document Type</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body form">
                <form action="#" id="document_types_form" class="form-horizontal" role="form">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="hidden" name="document_type_id" id="document_type_id" value="">
                                <div class="form-group row">
                                    <label class="control-label col-md-4">Name</label>
                                    <div class="col-md-6">
                                        <input type="text" name="type_name" id="type_name" class="form-control" placeholder="Document Type Name" >
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-4" for="notify_expiry">Notify Expiry</label>
                                    <div class="col-md-6">
                                        <select name="notify_expiry" id='notify_expiry' class="form-control">
                                            <option value="NO">NO</option>
                                            <option value="YES">YES</option>
                                        </select>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-4" for="notify_before_1_month">Notify Before 1 Month</label>
                                    <div class="col-md-6">
                                        <select name="notify_before_1_month" id='notify_before_1_month' class="form-control">
                                            <option value="NO">NO</option>
                                            <option value="YES">YES</option>
                                        </select>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label col-md-4" for="notify_before_1_week">Notify Before 1 Week</label>
                                    <div class="col-md-6">
                                        <select name="notify_before_1_week" id='notify_before_1_week' class="form-control">
                                            <option value="NO">NO</option>
                                            <option value="YES">YES</option>
                                        </select>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-4" for="notify_before_1_day">Notify Before 1 Day</label>
                                    <div class="col-md-6">
                                        <select name="notify_before_1_day" id='notify_before_1_day' class="form-control">
                                            <option value="NO">NO</option>
                                            <option value="YES">YES</option>
                                        </select>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-md-4" for="details">Details</label>
                                    <div class="col-md-6">
                                        <textarea name="details" id="details" class="form-control input-optional"></textarea>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save('#btnSave','#document_types_form','#document_types_modal')" class="btn btn-success">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->

<script>
    var documentTypesDataTable,
        save_method,
        current_data_table;
    $(document).ready(function(){
        //dataTables
        documentTypesDataTable = $('#documentTypesTable').DataTable({
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            // Load data for the table's content from an Ajax source
            "ajax": {
                "data": {
                    "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
                },
                "url": "<?php echo base_url()?>hr_payroll/document_types_con/ajax_list_document_types_data",
                "type": "POST"
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
                [0, 'asc']
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
        $("select").change(function(){
            $(this).parent().removeClass('has-error');
            $(this).next("span").empty();
        });

        $("form :input:not(.input-optional, .input-hidden)").each(function(){
            $(this).siblings('label').append("<span class='required-mark' style='color: #c90054;'>*</span>");
        });

        $('.modal').on('hidden.bs.modal', function (e) {
            $(this).find("form")[0].reset();
            if($('.modal').hasClass('in')) {
                $('body').addClass('modal-open');
            }
        });
        
        $(".portlet.box .dataTables_wrapper .dt-buttons").css({"margin-top": "-78px"});
    });

    function reload_table(table_name)
    {
        if(typeof table_name !== "undefined")
        {
            table_name.ajax.reload(null,false); //reload datatable ajax
        }
    }

    function add_document_type()
    {
        save_method = 'add_document_type';
        current_data_table = documentTypesDataTable;
        $('#document_types_form')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string
        $('#document_types_modal').modal('show'); // show bootstrap modal
        $('#document_types_modal_title').text('Add New Document type'); // Set Title to Bootstrap modal title
    }
    function edit_document_type(id)
    {
        save_method = 'edit_document_type';
        current_data_table = documentTypesDataTable;
        $('#document_types_form')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string
        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo base_url()?>hr_payroll/document_types_con/ajax_get_document_type/" + id,
            type: "POST",
            data: {
                "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
            },
            dataType: "JSON",
            success: function(data)
            {
                $('#document_type_id').val(data.document_type_id);
                $('#type_name').val(data.document_type_name);
                $('#notify_expiry').val(data.notify_expiry);
                $('#notify_before_1_month').val(data.notify_before_1_month);
                $('#notify_before_1_week').val(data.notify_before_1_week);
                $('#notify_before_1_day').val(data.notify_before_1_day);
                $('#details').val(data.details);
                $('#document_types_modal').modal('show'); // show bootstrap modal when complete loaded
                $('#document_types_modal_title').text('Edit Document Type: ' + data.document_type_name); // Set title to Bootstrap basic modal title
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
        var url = "<?php echo base_url()?>hr_payroll/document_types_con/" + php_function + "/";
        // ajax adding data to database
        $.ajax({
            url : url,
            type: "POST",
            data: $(form_data).serialize() + "&<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>",
            dataType: "JSON",
            success: function(data)
            {
                if(data.status) //if success close modal and reload ajax table
                {
                    $(modal).modal('hide');
                    reload_table(current_data_table);
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
                            $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
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

    function delete_document_type(id)
    {
        if(confirm('Are you sure delete this data?'))
        {
            // ajax delete data to database
            $.ajax({
                url : "<?php echo base_url()?>hr_payroll/document_types_con/ajax_delete_document_type/" + id,
                type: "POST",
                dataType: "JSON",
                success: function(data)
                {
                    if(data.status)
                    {
                        //if success reload ajax table
                        $('#modal_form').modal('hide');
                        reload_table();
                    }
                    else
                    {
                        alert(data.message);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error deleting data');
                }
            });
        }
    }
</script>

