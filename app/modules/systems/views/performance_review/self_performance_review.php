<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"></h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Self Performance Reviews</li>
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
                <h4 class="page-head-title card-title  text-white" style="display: inline-block"> Self Performance Reviews</h4>
            </div>
            <br>
            <div class="element-box">
                <table id="review_datatable" class="table" cellspacing="0" width="100%">
                    <thead style="background-color: #0e7eff;color: white;">
                    <tr>
                        <th>#</th>
                        <th>Employee</th>
                        <th>Coordinator</th>
                        <th>Template</th>
                        <th>Status</th>
                        <th>Review Date</th>
                        <th>Review Period Start Date</th>
                        <th>Review Period End Date</th>
                        <th>Self Assessment Due Date</th>
                        <th>Note</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!--- review question form modal
<!-- Bootstrap modal -->
<div class="modal fade" id="review_quiz_modal" role="dialog">
    <div class="modal-dialog modal-lg" >
        <div class="modal-content">
            <div class="modal-header bg-blue-steel bg-font-blue-steel">
                <h4 class="modal-title bold uppercase" style="height:10px">Add New Review</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body form">
                <form action="#" id="review_quiz_form" class="form-horizontal">
                    <div class="form-body" style="padding: 0px 10px;">
                        <input type="hidden" id="review_quiz_id" name="review_quiz_id"/>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" >Employee</label>
                                    <div id="lbl-employee"></div>
                                    <span class="error-block"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" >Coordinator</label>
                                    <div id="lbl-coordinator"></div>
                                    <span class="error-block"></span>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div id="load_quiz_form_data"></div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSaveRQuiz" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<!-- Bootstrap modal -->
<div class="modal fade" id="review_quiz_edit_modal" role="dialog">
    <div class="modal-dialog modal-lg" >
        <div class="modal-content">
            <div class="modal-header bg-blue-steel bg-font-blue-steel">
                <h4 class="modal-title bold uppercase" style="height:10px">Edit Review</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body form">
                <form action="#" id="review_quiz_form_edit" class="form-horizontal">
                    <div class="form-body" style="padding: 0px 10px;">
                        <input type="hidden" id="review_quiz_id_edit" name="review_quiz_id_edit"/>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" >Employee</label>
                                    <div id="lbl-employee"></div>
                                    <span class="error-block"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" >Coordinator</label>
                                    <div id="lbl-coordinator"></div>
                                    <span class="error-block"></span>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div id="load_quiz_form_data_edit"></div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnEditRQuiz" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<!-- Bootstrap modal -->
<div class="modal fade" id="review_quiz_view_modal" role="dialog">
    <div class="modal-dialog modal-lg" >
        <div class="modal-content">
            <div class="modal-header bg-blue-steel bg-font-blue-steel">
                <h4 class="modal-title bold uppercase" style="height:10px">Review Summary</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body form">
                <div class="form-body" style="padding: 0px 10px;">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" >Employee</label>
                                <div id="lbl-employee_view"></div>
                                <span class="error-block"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" >Coordinator</label>
                                <div id="lbl-coordinator_view"></div>
                                <span class="error-block"></span>
                            </div>
                        </div>
                        <hr>
                        <div class="col-md-12">
                            <div id="load_view_quiz_form_data"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>


<script>

$(document).ready(function() {


    $("#btnSaveRQuiz").off('click');
    $("#btnSaveRQuiz").on('click', function(e){
        e.preventDefault();
        save_review_form();
    });

    $("#btnEditRQuiz").off('click');
    $("#btnEditRQuiz").on('click', function(e){
        e.preventDefault();
        update_review_form();
    });

    $.ajax({
            url : "<?php echo site_url('systems/performance_review/check_self_assess_date/')?>/",
            type: "GET",
            "data": {
            "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
        },
        dataType: "JSON",
            success: function(data)
        {

            for(var i=0;i<data.length;i++){
        alert('#edit'+ data[i].id)
                $('#edit'+ data[i].id).hide();
                $('#submit'+ data[i].id).hide();

            }
        }

        });


    review_datatable = $('#review_datatable').DataTable({
        "processing": true,
        "serverSide": true,

        "ajax": {
            "data": {
                "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
            },
            "url": "<?=base_url()?>systems/employee_list/get_review_data/",
            "type": "POST"
        },

        "columnDefs": [
            {
                "targets": [-1],
                "orderable": false
            }
        ],

        "language": {
            "aria": {
                "sortAscending": ": activate to sort column ascending",
                "sortDescending": ": activate to sort column descending"
            },
            "allowancetyTable": "No data available in table",
            "info": "Showing _START_ to _END_ of _TOTAL_ entries",
            "infoallowancety": "No entries found",
            "infoFiltered": "(filtered1 from _MAX_ total entries)",
            "lengthMenu": "_MENU_ entries",
            "search": "Search:",
            "zeroRecords": "No matching records found"
        },
        "buttons": [
            {
                extend: 'print', text: '<i class="fa fa-print"></i>',
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

function edit_submit(id) {


    $.ajax({
        url : "<?php echo site_url('systems/performance_review/get_review_quiz_data_edit/')?>/" + id,
        type: "GET",
        "data": {
            "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
        },
        dataType: "JSON",
        success: function(data)
        {


            $('#lbl-employee').html(data.employee);
            $('#lbl-coordinator').html(data.coordinator);
            $('#review_quiz_id_edit').val(data.review_data.id)

            $('#load_quiz_form_data_edit').html('');
            quiz_string='';
            for(var i=0;i<data.QuizTemplateData.length;i++) {


                //  if (data.QuizTemplateData[i].code) {

                /*if(data.QuizTemplateData[i].min_val > 0 && data.QuizTemplateData[i].max_val > 0){
                 quiz_string='( '+data.QuizTemplateData[i].min_val+'km - '+data.QuizTemplateData[i].max_val+'km )';
                 }*/
                if (data.QuizTemplateData[i].field_type == "text") {

                    $('#load_quiz_form_data_edit').append('' +
                    '<div class="form-group">' +
                    '<label class="control-label col-md-12" for="question' + (i + 1) + '">' + data.QuizTemplateData[i].question + '</label>' +
                    '<div class="col-md-12">' +
                    '<input type="hidden" name="question[' + (i + 1) + ']" id="question' + (i + 1) + '" class="form-control" value="' + data.QuizTemplateData[i].id + '" >' +
                    '<input type="hidden" name="rid[' + (i + 1) + ']" id="rid' + (i + 1) + '" class="form-control" value="' + data.QuizTemplateData[i].rid + '" >' +
                    '<input type="text" name="field_type[' + (i + 1) + ']" id="field_type' + (i + 1) + '" class="form-control" value="' + data.QuizTemplateData[i].answer + '" >' +
                    '<span class="help-block"></span>' +
                    '</div>' +
                    '</div>' +
                    '');
                } else if (data.QuizTemplateData[i].field_type == "textarea") {
                    $('#load_quiz_form_data_edit').append('' +
                    '<div class="form-group">' +
                    '<label class="control-label col-md-12" for="question' + (i + 1) + '">' + data.QuizTemplateData[i].question + '</label>' +
                    '<div class="col-md-12">' +
                    '<input type="hidden" name="question[' + (i + 1) + ']" id="question' + (i + 1) + '" class="form-control" value="' + data.QuizTemplateData[i].id + '" >' +
                    '<input type="hidden" name="rid[' + (i + 1) + ']" id="rid' + (i + 1) + '" class="form-control" value="' + data.QuizTemplateData[i].rid + '" >' +
                    '<textarea name="field_type[' + (i + 1) + ']" id="field_type' + (i + 1) + '"  class=" form-control">' + data.QuizTemplateData[i].answer + '</textarea>' +
                    '<span class="help-block"></span>' +
                    '</div>' +
                    '</div>' +
                    '');
                } else if (data.QuizTemplateData[i].field_type == "date") {
                    $('#load_quiz_form_data_edit').append('' +
                    '<div class="form-group">' +
                    '<label class="control-label col-md-12" for="question' + (i + 1) + '">' + data.QuizTemplateData[i].question + '</label>' +
                    '<div class="col-md-12">' +
                    '<input type="hidden" name="question[' + (i + 1) + ']" id="question' + (i + 1) + '" class="form-control" value="' + data.QuizTemplateData[i].id + '" >' +
                    '<input type="hidden" name="rid[' + (i + 1) + ']" id="rid' + (i + 1) + '" class="form-control" value="' + data.QuizTemplateData[i].rid + '" >' +
                    '<input type="text" name="field_type[' + (i + 1) + ']" id="field_type' + (i + 1) + '" class="form-control date-pick" value="' + data.QuizTemplateData[i].answer + '" >' +
                    '<span class="help-block"></span>' +
                    '</div>' +
                    '</div>' +
                    '');
                } else if (data.QuizTemplateData[i].field_type == "select") {
                    var myarr = data.QuizTemplateData[i].options.split(",");
                    var selectdt = "<option value=''>--</option>";
                    for (var j = 0; j < myarr.length; j++) {
                        if(myarr[j]==data.QuizTemplateData[i].answer) {
                            selectdt += '<option value=' + myarr[j] + ' selected>' + myarr[j] + '</option>';
                        }else{
                            selectdt += '<option value=' + myarr[j] + '>' + myarr[j] + '</option>';
                        }
                    }

                    $('#load_quiz_form_data_edit').append('' +
                    '<div class="form-group">' +
                    '<label class="control-label col-md-12" for="question' + (i + 1) + '">' + data.QuizTemplateData[i].question + '</label>' +
                    '<div class="col-md-12">' +
                    '<input type="hidden" name="question[' + (i + 1) + ']" id="question' + (i + 1) + '" class="form-control" value="' + data.QuizTemplateData[i].id + '" >' +
                    '<input type="hidden" name="rid[' + (i + 1) + ']" id="rid' + (i + 1) + '" class="form-control" value="' + data.QuizTemplateData[i].rid + '" >' +
                    '<select name="field_type[' + (i + 1) + ']" id="field_type' + (i + 1) + '" class=" form-control select2">' + selectdt + '</select>' +
                    '<span class="help-block"></span>' +
                    '</div>' +
                    '</div>' +
                    '');
                } else if (data.QuizTemplateData[i].field_type == "select2multi") {
                    var myarr2 = data.QuizTemplateData[i].options.split(",");
                    var selectdt2 = "<option value=''>--</option>";
                    for (var q = 0; q < myarr2.length; q++) {
                        if(myarr2[j]==data.QuizTemplateData[i].answer) {
                            selectdt2 += '<option value=' + myarr2[j] + ' selected>' + myarr2[j] + '</option>';
                        }else{
                            selectdt2 += '<option value=' + myarr2[j] + '>' + myarr2[j] + '</option>';
                        }
                    }

                    $('#load_quiz_form_data_edit').append('' +
                    '<div class="form-group">' +
                    '<label class="control-label col-md-12" for="question' + (i + 1) + '">' + data.QuizTemplateData[i].question + '</label>' +
                    '<div class="col-md-12">' +
                    '<input type="hidden" name="question[' + (i + 1) + ']" id="question' + (i + 1) + '" class="form-control" value="' + data.QuizTemplateData[i].id + '" >' +
                    '<input type="hidden" name="rid[' + (i + 1) + ']" id="rid' + (i + 1) + '" class="form-control" value="' + data.QuizTemplateData[i].rid + '" >' +
                    '<select name="field_type[' + (i + 1) + ']" id="field_type' + (i + 1) + '" class=" form-control select2" multiple>' + selectdt2 + '</select>' +
                    '<span class="help-block"></span>' +
                    '</div>' +
                    '</div>' +
                    '');
                } else if (data.QuizTemplateData[i].field_type == "radio") {
                    var myarr3 = data.QuizTemplateData[i].options.split(",");
                    var selectdt3 = "";
                    for (var w = 0; w < myarr3.length; w++) {
                        if(myarr3[w]==data.QuizTemplateData[i].answer) {
                            selectdt3 += '<input type="radio" name="field_type[' + (i + 1) + ']" value=' + myarr3[w] + ' checked>' + '       ' + myarr3[w] + '       ' + '';
                        }else{
                            selectdt3 += '<input type="radio" name="field_type[' + (i + 1) + ']" value=' + myarr3[w] + ' >' + '       ' + myarr3[w] + '       ' + '';
                        }
                    }
                    $('#load_quiz_form_data_edit').append('' +
                    '<div class="form-group">' +
                    '<label class="control-label col-md-12" for="question' + (i + 1) + '">' + data.QuizTemplateData[i].question + '</label>' +
                    '<div class="col-md-12">' +
                    '<input type="hidden" name="question[' + (i + 1) + ']" id="question' + (i + 1) + '" class="form-control" value="' + data.QuizTemplateData[i].id + '" >' +
                    '<input type="hidden" name="rid[' + (i + 1) + ']" id="rid' + (i + 1) + '" class="form-control" value="' + data.QuizTemplateData[i].rid + '" >' +
                    '' + selectdt3 + '<span class="help-block"></span>' +
                    '</div>' +
                    '</div>' +
                    '');
                }else if (data.QuizTemplateData[i].field_type == "checkbox") {
                    var myarr3 = data.QuizTemplateData[i].options.split(",");
                    var selectdt3 = "";
                    for (var w = 0; w < myarr3.length; w++) {
                        if(myarr3[w]==data.QuizTemplateData[i].answer) {
                            selectdt3 += '<input type="checkbox" name="field_type[' + (i + 1) + ']" value=' + myarr3[w] + ' checked>' +'        '+myarr3[w] +'        '+ '';
                        }else{
                            selectdt3 += '<input type="checkbox" name="field_type[' + (i + 1) + ']" value=' + myarr3[w] + '>' +'        '+myarr3[w] +'        '+ '';
                        }
                    }
                    $('#load_quiz_form_data_edit').append('' +
                    '<div class="form-group">' +
                    '<label class="control-label col-md-12" for="question' + (i + 1) + '">' + data.QuizTemplateData[i].question + '</label>' +
                    '<div class="col-md-12">' +
                    '<input type="hidden" name="question[' + (i + 1) + ']" id="question' + (i + 1) + '" class="form-control" value="' + data.QuizTemplateData[i].id + '" >' +
                    '<input type="hidden" name="rid[' + (i + 1) + ']" id="rid' + (i + 1) + '" class="form-control" value="' + data.QuizTemplateData[i].rid + '" >' +
                    '' + selectdt3 + '<span class="help-block"></span>' +
                    '</div>' +
                    '</div>' +
                    '');
                }
                //  }
                $('.select2').select2({dropdownParent: $("#review_quiz_edit_modal")});
            }

            $('#review_quiz_edit_modal').modal({backdrop: 'static', keyboard: false});
            $('#review_quiz_edit_modal .modal-title').text('Review Quiz ' + id);

        },
        error: function ()
        {
            console.log('Error get Quiz data');
        }
    });


}

    function show_quiz(id) {


        $.ajax({
            url : "<?php echo site_url('systems/performance_review/get_review_quiz_data_by_id/')?>/" + id,
            type: "GET",
            "data": {
                "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
            },
            dataType: "JSON",
            success: function(data)
            {

                $('#review_quiz_id').val(data.review_data.id)
                $('#lbl-employee').html(data.employee);
                $('#lbl-coordinator').html(data.coordinator);

                $('#load_quiz_form_data').html('');
                quiz_string='';
                for(var i=0;i<data.QuizTemplateData.length;i++) {

                    //  if (data.QuizTemplateData[i].code) {

                    /*if(data.QuizTemplateData[i].min_val > 0 && data.QuizTemplateData[i].max_val > 0){
                     quiz_string='( '+data.QuizTemplateData[i].min_val+'km - '+data.QuizTemplateData[i].max_val+'km )';
                     }*/
                    if (data.QuizTemplateData[i].field_type == "text") {

                        $('#load_quiz_form_data').append('' +
                        '<div class="form-group">' +
                        '<label class="control-label col-md-12" for="question' + (i + 1) + '">' + data.QuizTemplateData[i].question + '</label>' +
                        '<div class="col-md-12">' +
                        '<input type="hidden" name="question[' + (i + 1) + ']" id="question' + (i + 1) + '" class="form-control" value="' + data.QuizTemplateData[i].id + '" >' +
                        '<input type="text" name="field_type[' + (i + 1) + ']" id="field_type' + (i + 1) + '" class="form-control" value="" >' +
                        '<span class="help-block"></span>' +
                        '</div>' +
                        '</div>' +
                        '');
                    } else if (data.QuizTemplateData[i].field_type == "textarea") {
                        $('#load_quiz_form_data').append('' +
                        '<div class="form-group">' +
                        '<label class="control-label col-md-12" for="question' + (i + 1) + '">' + data.QuizTemplateData[i].question + '</label>' +
                        '<div class="col-md-12">' +
                        '<input type="hidden" name="question[' + (i + 1) + ']" id="question' + (i + 1) + '" class="form-control" value="' + data.QuizTemplateData[i].id + '" >' +
                        '<textarea name="field_type[' + (i + 1) + ']" id="field_type' + (i + 1) + '"  class=" form-control"></textarea>' +
                        '<span class="help-block"></span>' +
                        '</div>' +
                        '</div>' +
                        '');
                    } else if (data.QuizTemplateData[i].field_type == "date") {
                        $('#load_quiz_form_data').append('' +
                        '<div class="form-group">' +
                        '<label class="control-label col-md-12" for="question' + (i + 1) + '">' + data.QuizTemplateData[i].question + '</label>' +
                        '<div class="col-md-12">' +
                        '<input type="hidden" name="question[' + (i + 1) + ']" id="question' + (i + 1) + '" class="form-control" value="' + data.QuizTemplateData[i].id + '" >' +
                        '<input type="text" name="field_type[' + (i + 1) + ']" id="field_type' + (i + 1) + '" class="form-control date-pick" value="" >' +
                        '<span class="help-block"></span>' +
                        '</div>' +
                        '</div>' +
                        '');
                    } else if (data.QuizTemplateData[i].field_type == "select") {
                        var myarr = data.QuizTemplateData[i].options.split(",");
                        var selectdt = "<option value=''>--</option>";
                        for (var j = 0; j < myarr.length; j++) {
                            selectdt += '<option value=' + myarr[j] + '>' + myarr[j] + '</option>';
                        }

                        $('#load_quiz_form_data').append('' +
                        '<div class="form-group">' +
                        '<label class="control-label col-md-12" for="question' + (i + 1) + '">' + data.QuizTemplateData[i].question + '</label>' +
                        '<div class="col-md-12">' +
                        '<input type="hidden" name="question[' + (i + 1) + ']" id="question' + (i + 1) + '" class="form-control" value="' + data.QuizTemplateData[i].id + '" >' +
                        '<select name="field_type[' + (i + 1) + ']" id="field_type' + (i + 1) + '" class=" form-control select2">' + selectdt + '</select>' +
                        '<span class="help-block"></span>' +
                        '</div>' +
                        '</div>' +
                        '');
                    } else if (data.QuizTemplateData[i].field_type == "select2multi") {
                        var myarr2 = data.QuizTemplateData[i].options.split(",");
                        var selectdt2 = "<option value=''>--</option>";
                        for (var q = 0; q < myarr2.length; q++) {
                            selectdt2 += '<option value=' + myarr2[j] + '>' + myarr2[j] + '</option>';
                        }

                        $('#load_quiz_form_data').append('' +
                        '<div class="form-group">' +
                        '<label class="control-label col-md-12" for="question' + (i + 1) + '">' + data.QuizTemplateData[i].question + '</label>' +
                        '<div class="col-md-12">' +
                        '<input type="hidden" name="question[' + (i + 1) + ']" id="question' + (i + 1) + '" class="form-control" value="' + data.QuizTemplateData[i].id + '" >' +
                        '<select name="field_type[' + (i + 1) + ']" id="field_type' + (i + 1) + '" class=" form-control select2" multiple>' + selectdt2 + '</select>' +
                        '<span class="help-block"></span>' +
                        '</div>' +
                        '</div>' +
                        '');
                    } else if (data.QuizTemplateData[i].field_type == "radio") {
                        var myarr3 = data.QuizTemplateData[i].options.split(",");
                        var selectdt3 = "";
                        for (var w = 0; w < myarr3.length; w++) {
                            selectdt3 += '<input type="radio" name="field_type[' + (i + 1) + ']" value=' + myarr3[w] + '>' +'       '+ myarr3[w] +'       '+ '';
                        }
                        $('#load_quiz_form_data').append('' +
                        '<div class="form-group">' +
                        '<label class="control-label col-md-12" for="question' + (i + 1) + '">' + data.QuizTemplateData[i].question + '</label>' +
                        '<div class="col-md-12">' +
                        '<input type="hidden" name="question[' + (i + 1) + ']" id="question' + (i + 1) + '" class="form-control" value="' + data.QuizTemplateData[i].id + '" >' +
                        '' + selectdt3 + '<span class="help-block"></span>' +
                        '</div>' +
                        '</div>' +
                        '');
                    }else if (data.QuizTemplateData[i].field_type == "checkbox") {
                        var myarr3 = data.QuizTemplateData[i].options.split(",");
                        var selectdt3 = "";
                        for (var w = 0; w < myarr3.length; w++) {
                            selectdt3 += '<input type="checkbox" name="field_type[' + (i + 1) + ']" value=' + myarr3[w] + '>' +'        '+myarr3[w] +'        '+ '';
                        }
                        $('#load_quiz_form_data').append('' +
                        '<div class="form-group">' +
                        '<label class="control-label col-md-12" for="question' + (i + 1) + '">' + data.QuizTemplateData[i].question + '</label>' +
                        '<div class="col-md-12">' +
                        '<input type="hidden" name="question[' + (i + 1) + ']" id="question' + (i + 1) + '" class="form-control" value="' + data.QuizTemplateData[i].id + '" >' +
                        '' + selectdt3 + '<span class="help-block"></span>' +
                        '</div>' +
                        '</div>' +
                        '');
                    }
                    //  }
                    $('.select2').select2({dropdownParent: $("#review_quiz_modal")});
                }

                $('#review_quiz_modal').modal({backdrop: 'static', keyboard: false});
                $('#review_quiz_modal .modal-title').text('Review Quiz ' + id);

            },
            error: function ()
            {
                console.log('Error get Quiz data');
            }
        });


    }



    function view_submitted_form(id)
    {
        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo site_url('systems/performance_review/get_quiz_form_data_by_id/')?>/" + id,
            type: "GET",
            "data": {
                "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
            },
            dataType: "JSON",
            success: function(data)
            {

                $('#lbl-employee_view').html(data.employee);
                $('#lbl-coordinator_view').html(data.coordinator);

                /*$('#template_name').val(data.main_data.name);
                 $('#description').val(data.main_data.description);*/


                $('#load_view_quiz_form_data').html('');
                for(var i=0;i<data.QuizTemplateData.length;i++) {
                    // if (data.QuizTemplateData[i].code) {
                    $('#load_view_quiz_form_data').append('' +
                    '<div class="form-group">' +
                    '<label class="control-label col-md-12" for="question' + (i + 1) + '">' + data.QuizTemplateData[i].question + '</label>' +
                    '<div class="col-md-12">' +
                    '' + data.QuizTemplateData[i].answer + '' +
                    '<span class="help-block"></span>' +
                    '</div>' +
                    '</div>' +
                    '');
                    //}
                }

                //$('.select2').select2({dropdownParent: $("#template_modal")});
            },
            error: function ()
            {
                console.log('Error get Quiz data');
            }
        });

        $('#review_quiz_view_modal').modal({backdrop: 'static', keyboard: false});
        $('#review_quiz_view_modal .modal-title').text('View Review ' + id);
    }

function save_review_form()
{

    var url = "<?php echo site_url('systems/performance_review/save_quiz_form')?>";
    $.ajax({
        url: url,
        type: "POST",
        data: $('#review_quiz_form').serialize() + "&<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>",
        dataType: "JSON",
        success: function (data) {
            if (data.status) {
                $('#review_quiz_modal').modal('hide');
                //reload_table(allowance_datatable);
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

function update_review_form()
{


    var url = "<?php echo site_url('systems/performance_review/update_quiz_form')?>";
    $.ajax({
        url: url,
        type: "POST",
        data: $('#review_quiz_form_edit').serialize() + "&<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>",
        dataType: "JSON",
        success: function (data) {
            if (data.status) {
                $('#review_quiz_edit_modal').modal('hide');
                //reload_table(allowance_datatable);
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

</script>