<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"></h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Letter Templates</li>
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
                <h4 class="page-head-title card-title  text-white" style="display: inline-block"> Letter Templates</h4>
                <button class="btn btn-success pull-right"  onclick="add_template()" id="add_btn"><i class="fa fa-plus-circle"></i> Add New Letter Template</button>
            </div>
            <div class="element-box">
                <table id="templates_data" class="fresh-table table table-bordered table-hover order-column  table-header-fixed" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <!--<th class="all">Group ID</th>-->
                        <th>#</th>
                        <th>Template Name</th>
                        <th>Email Subject</th>
                        <th>Created </th>
                        <th>Modified</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>[Template Name]</th>
                        <th>[Email Subject]</th>
                        <th>[Created ]</th>
                        <th>[Modified ]</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>




<div class="modal fade bs-example-modal-lg in" id="template_modal" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg"  style="min-width: 600px; max-width: 1200px; width: 100%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="templateModalLabel"></h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="template_form" class="form-horizontal" role="form">
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                    <input type="hidden" name="template_id" id="template_id" value="" />

                    <div class="row">
                        <div class="col-md-12">
                            <h4  class="sub-head">Template Information</h4>
                            <table  class="df">
                                <tbody>
                                <tr>
                                    <th style="width: 200px">Template Name</th>
                                    <td><input id="title" name="title" value="">
                                        <span class="error-block"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width: 200px">Letter Subject</th>
                                    <td><input class="form-control" id="subject" name="subject" type="text">
                                        <span class="error-block"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width: 200px;vertical-align: top;">Letter Body
                                        <p style="font-size: 12px; line-height: 20px; color: #0f74a8"><br> <span style="color: #1d2833; font-size: 12px;">You can use following placeholders </span> <br>
                                            <br>[EMPLOYEE_ID]
                                            <br>[EPF_NO]
                                            <br>[TITLE]
                                            <br>[INITIALS]
                                            <br>[FIRST_NAME]
                                            <br>[MIDDLE_NAME]
                                            <br>[LAST_NAME]
                                            <br>[BIRTHDAY]
                                            <br>[GENDER]
                                            <br>[MARITAL_STATUS]
                                            <br>[NIC_NUM]
                                            <br>[DRIVING_LICENSE]
                                            <br>[OTHER_ID]
                                            <br>[BLOOD_GROUP]
                                            <br>[PERMANENT_ADDRESS]
                                            <br>[POSTAL_ADDRESS]
                                            <br>[POSTAL_CODE]
                                            <br>[MOBILE_PHONE]
                                            <br>[MOBILE_PHONE_2]
                                            <br>[HOME_PHONE]
                                            <br>[OFFICE_PHONE]
                                            <br>[PERSONAL_EMAIL]
                                            <br>[OFFICE_EMAIL]
                                            <br>[BASIC_SALARY]
                                            <br>[JOINED_DATE]
                                            <br>[CONFIRMED_DATE]
                                            <br>[TERMINATION_DATE]
                                            <br>
                                            <br><span style="color: #1d2833; font-size: 12px;"></span></p>
                                    </th>
                                    <td colspan="7">
                                        <textarea id="editor" name="content" rows="8" style="max-height: 300px"></textarea>
                                    </td>
                                </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btn_save">Save</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<script>
    var oTable;
    $(document).ready(function() {
        'use strict';
        oTable = $('#templates_data').DataTable({
            "processing": true,
            "serverSide": true,
            "stateSave": false,
            "ajax": {
                "data": {
                    "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
                },
                "url": "<?php echo site_url('systems/letters/ajax_list'); ?>",
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
                "emptyTable": "No data available in table",
                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                "infoEmpty": "No entries found",
                "infoFiltered": "(filtered1 from _MAX_ total entries)",
                "lengthMenu": "_MENU_ entries",
                "search": "Search:",
                "zeroRecords": "No matching records found"
            },
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
    });



    var save_method;
    $(document).ready(function(){

        $("#btn_save").off('click');
        $("#btn_save").on('click', function(e){
            e.preventDefault();
            save_template(save_method);
        });

        $('#template_modal').on('hidden.bs.modal', function(){
            if ($('select.select2').data('select2')) {
                $('select.select2').select2('destroy');
            }
            $(this).find(form)[0].reset();
            $('.select2').select2();
        });

        $("#template_form :input").change(function(){
            $(this).siblings("span.error-block").html("").hide();
            $(this).removeClass('error_input_lumi');
            $(this).addClass('good_input_lumi');
            $("span.help-inline").hide();
        });

        $('#template_modal').on('hidden.bs.modal', function() {
            $("#template_form :input").siblings("span.error-block").html("").hide();
            $("#template_form :input").removeClass('error_input_lumi');
            $("#template_form :input").addClass('good_input_lumi');
            $("span.help-inline").hide();
        });
    });

    function add_template()
    {
        save_method = 'add';
        //get_required_fields(true); // pass true to make password fields required
        $("#template_form")[0].reset(); // reset form on modals
        CKEDITOR.replaceAll( 'editor' );
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string
        $('#template_modal').modal({backdrop: 'static', keyboard: false}); // show bootstrap modal
        //$('#emp_form_modal').modal({backdrop: 'static', keyboard: false});
        $('#template_modal .modal-title').text('Add New Letter Template'); // Set Title to Bootstrap modal title
    }


    function edit_template(template_id)
    {

        save_method = 'edit';
        var url = "<?php echo site_url('systems/letters/ajax_get_template_details_by_id'); ?>";
        $("#template_form")[0].reset();
        //document.getElementById(".row_dyn").remove();
        var template_id = template_id;
        $.ajax({
            url: url,
            data: {
                template_id: template_id,
                "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
            },
            type: 'post',
            dataType: 'json',
            success: function(data){
                //console.log(data);
                //console.log(data.po_data);
                if(data.status)
                {
                    if (CKEDITOR.instances.editor) {
                        CKEDITOR.instances.editor.destroy();
                    }
                    $('#template_id').val(data.template_data.id);
                    $('#title').val(data.template_data.title);
                    $('#subject').val(data.template_data.subject);
                    $('#editor').val(data.template_data.content);

                    $('#editor').ckeditor();

                    //console.log(data.u_types);
                    $("#templateModalLabel").html('Edit Letter Template #'+data.template_data.id);
                    $('#template_modal').modal('show');

                }
                else
                {
                    bootbox.alert(data.message);
                }
            },
            error: function(jqXHR, textStatus, errorThrown){
                bootbox.alert(textStatus + " : " + errorThrown);
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
            }
        });
    }



    function save_template()
    {
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
        }
        //bootbox.alert('Success');
        var url = "<?php echo site_url('systems/letters/save_template'); ?>/"+save_method;
        $.ajax({
            url: url,
            data: $("#template_form").serialize(),
            type: "POST",
            dataType: "JSON",
            cache: false,
            success: function(data){
                if(data.message)
                {
                    bootbox.alert(data.message);
                }
                if(data.status)
                {
                    $("#template_modal").modal('hide');
                    reload_table(oTable);
                }
                else
                {
                    if(data.error)
                    {
                        for (var l = 0; l < data.inputerror.length; l++)
                        {
                            $('[name="'+data.inputerror[l]+'"]').siblings("span.error-block").html(data.error_string[l]).show();
                            //select parent twice to select div form-group class and add has-error class
                        }
                    }
                }
            },
            error: function(jqXHR, textStatus, errorThrown ){
                bootbox.alert(textStatus + " : " + errorThrown);
            }
        });

    }

    function reload_table(data_table)
    {
        data_table.ajax.reload(); //reload datatable ajax
    }




</script>

<script src="<?php echo base_url(); ?>assets/node_modules/ckeditor/ckeditor.js"></script>
<script src="<?php echo base_url(); ?>assets/node_modules/ckeditor/adapters/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/node_modules/ckeditor/js/main.js"></script>
<script>
    initSample();
</script>