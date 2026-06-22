<style>
    .bootbox .modal-dialog{width: 1000px}
    .modal-body {
        word-wrap: break-word;}
</style>

<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"></h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Letter Generate</li>
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
                <h4 class="page-head-title card-title  text-white" style="display: inline-block"> Letter Generate</h4>
                <!--<button class="btn btn-success pull-right"  onclick="add_template()" id="add_btn"><i class="fa fa-plus-circle"></i> Add New Letter Template</button>-->
                <div style="pull-right">
                </div>
            </div>
            <div class="element-box">

                <form id="preview_form" class="" role="form">
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                    <table>
                        <tbody>
                        <tr>
                            <td style="text-align: right">Letter Template</td>
                            <td>
                                <select name="template" id="template" class="select2  form-control" style="\&quot;max-width:200px;\&quot;">
                                    <option value="">(---)</option>
                                    <?php foreach ($templates as $template) { ?>
                                        <option
                                                value="<?php echo $template->id ?>"><?php echo $template->title ?></option>
                                    <?php } ?>
                                </select>
                                <span class="error-block"></span>
                            </td>
                            <td style="text-align: right">Employee</td>
                            <td>
                                <select name="employee" id="employee" class="select2 form-control" style="\&quot;max-width:200px;\&quot;">
                                    <option value="">(---)</option>
                                    <?php foreach ($employees as $employee) { ?>
                                        <option
                                                value="<?php echo $employee->id ?>"><?php echo $employee->employee_id." ".$employee->first_name." ".$employee->last_name ?></option>
                                    <?php } ?>
                                </select>
                                <span class="error-block"></span>
                            </td>
                            <td>
                                <a class="btn btn-success"  onclick="preview()" style="color: #fff"><i class="fa fa-search"></i> Preview & Generate</a>
                            </td>
                        </tr>
                        </tbody>
                    </table>

                </form>
                <hr>

                <table id="letters_list" class="fresh-table table table-bordered table-hover order-column table-header-fixed" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Employee</th>
                        <th>Letter</th>
                        <th>Date </th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>[Employee]</th>
                        <th>[Letter]</th>
                        <th>[Date]</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>


<div class="modal fade bs-example-modal-lg in" id="letter_gen_modal" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg"  style="min-width: 600px; max-width: 1200px; width: 100%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="letterGenModalLabel"></h4>
               <!-- <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>-->
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            <div class="modal-body">
                <form id="letter_form" class="form-horizontal" role="form">
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                    <input type="hidden" name="template_id" id="template_id" value="" />
                    <input type="hidden" name="employee_id" id="employee_id" value="" />
                    <input type="hidden" name="letter_type" id="letter_type" value="" />
                    <textarea id="content" name="content" readonly style="display: none">
                    </textarea>
                </form>
                <div id="load_data"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btnSave">Save</button>
            </div>
        </div>
    </div>
</div>



<div class="modal fade bs-example-modal-lg in" id="letter_view_modal" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg"  style="min-width: 600px; max-width: 1200px; width: 100%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="letterViewModalLabel"></h4>
               <!-- <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>-->
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            <div class="modal-body">
                <input type="submit" id="save" value="Print" class="btn btn-primary btn-sm pull-right" onclick="PrintDiv()">
                <div id="load_saved_data"></div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

<script>
    var oTable;
    $(document).ready(function(){
        'use strict';
        oTable = $('#letters_list').DataTable({
            "processing": true,
            "serverSide": true,
            "stateSave": false,
            "ajax": {
                "data": {
                    "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
                },
                "url": "<?php echo site_url('systems/letters/ajax_list_gen_letters'); ?>",
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


        $("#btnSave").off('click');
        $("#btnSave").on('click', function(e){
            e.preventDefault();
            save_letter();
        });
    });

    function preview()
    {
        var template = $('#template').val();
        var department = $('#employee').val();
        if (template != "" && employee != "") {
            var url = "<?php echo site_url('systems/letters/view_tempalte_with_acc_no'); ?>/";
            $.ajax({
                url: url,
                data: $("#preview_form").serialize(),
                type: "POST",
                dataType: "JSON",
                cache: false,
                success: function (data) {
                    if (data.status) {
                        //bootbox.alert(data.preview_data);
                        $('#template_id').val(data.template_id);
                        $('#employee_id').val(data.employee_id);
                        $('#letter_type').val(data.template_name);
                        $('#content').val(data.preview_data);

                        $("#load_data").html(data.preview_data);

                        $('#letter_gen_modal').modal({backdrop: 'static', keyboard: false});
                        $('#letter_gen_modal .modal-title').html('Generated Letter for Template - <strong> ' + data.template_name + '</strong> Employee - <strong>' + data.employee_name + '</strong>');
                    }
                    else {
                        if (data.error) {
                            for (var l = 0; l < data.inputerror.length; l++) {
                                $('[name="' + data.inputerror[l] + '"]').siblings("span.error-block").html(data.error_string[l]).show();
                                //select parent twice to select div form-group class and add has-error class
                            }
                        }
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    bootbox.alert(textStatus + " : " + errorThrown);
                }
            });
        } else{
            bootbox.dialog({
                message: 'Please Select Employee & Template',
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


    function save_letter()
    {
        //bootbox.alert('Success');
        var url = "<?php echo site_url('systems/letters/save_gen_letter'); ?>";
        $.ajax({
            url: url,
            data: $("#letter_form").serialize(),
            type: "POST",
            dataType: "JSON",
            cache: false,
            success: function(data){
                reload_table(oTable);
                if(data.message)
                {
                    bootbox.alert(data.message);
                }
                if(data.status)
                {

                    $("#letter_gen_modal").modal('hide');
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


    function view_letter(id)
    {
        var url = "<?php echo site_url('systems/letters/ajax_view_gen_saved_letter_by_id'); ?>";
        var letter_id = id;
        $.ajax({
            url: url,
            data: {
                letter_id: letter_id,
                "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
            },
            type: 'post',
            dataType: 'json',
            success: function(data){
                if(data.status)
                {
                    /*$('#template_id').val(data.template_data.id);
                    $('#title').val(data.template_data.title);*/
                    $("#load_saved_data").html(data.letter_data);
                    $('#letter_view_modal').modal({backdrop: 'static', keyboard: false});
                    $('#letter_view_modal .modal-title').html('Letter View');
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



    function email_letter(id)
    {
        bootbox.dialog({
            message: "Are you sure, that you want to send email this letter to employee?",
            title: "Alert!",
            buttons: {
                ok: {
                    label: "Yes",
                    className: "btn-primary",
                    callback: function () {
                        $.ajax({
                            url : "<?php echo base_url()?>systems/letters/ajax_email_gen_saved_letter_by_id",
                            type: "POST",
                            data: {
                                "letter_id": id,
                                "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
                            },
                            dataType: "JSON",
                            success: function(data)
                            {
                                if(data.status)
                                {
                                    bootbox.alert(data.letter_data);
                                }
                            },
                            error: function (jqXHR, textStatus, errorThrown)
                            {
                                console.log(jqXHR);
                                console.log(textStatus);
                                console.log(errorThrown);
                                console.log('Error while send email');
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


    function PrintDiv() {
        var divToPrint = document.getElementById('load_saved_data');
        var popupWin = window.open('', '_blank', 'width=1000,height=1000');
        popupWin.document.open();
        popupWin.document.write('<html><head><link href="<?php echo base_url('assets/css/default_print.css'); ?>" rel="stylesheet" type="text/css" /></head><body onload="window.print()">');
        popupWin.document.write('');
        popupWin.document.write(divToPrint.innerHTML );
        popupWin.document.write('</html>');
        popupWin.document.close();
    }
</script>