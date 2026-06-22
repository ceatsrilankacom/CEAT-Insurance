<style>
    #dyTable tbody{
        counter-reset: rowNumber;
    }
    #dyTable tbody tr {
        counter-increment: rowNumber;
    }
    #dyTable tbody tr td:first-child::before {
        content: counter(rowNumber);
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
                <li class="breadcrumb-item active">Evaluation Questionnaire</li>
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
                <h4 class="page-head-title card-title  text-white" style="display: inline-block"> Evaluation Questionnaire</h4>
<!--                <button type="button" class="btn btn-success pull-right" onclick=""><i class="fa fa-plus-circle"></i> Add New Questionnaire Template</button>-->
                <a href ='create_review_questionnaire' class="btn btn-success pull-right"><i class='fa fa-plus-circle'></i> Add New Questionnaire Template</a>
            </div>
            <div class="element-box">
                <table id="templates_datatable" class="table" cellspacing="0" width="100%">
                    <thead style="background-color: #0e7eff;color: white;">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Form Type</th>
                        <th style="max-width:100px;">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="review_quiz_modal" role="dialog">
    <div class="modal-dialog modal-full" style="max-width: 600px">
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
                            <hr>
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
<div class="modal fade" id="template_modal" role="dialog">
    <div class="modal-dialog modal-full" style="max-width: 1000px">
        <div class="modal-content">
            <div class="modal-header bg-blue-steel bg-font-blue-steel">
                <h4 class="modal-title bold uppercase" style="height:10px">Add New Questionnaire Template</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body form">
                <form action="#" id="template_form" class="form-horizontal">
                    <div class="form-body" style="padding: 0px 10px;">
                        <input type="hidden" id="template_id" name="template_id"/>
                        <div class="row">
                            <div class="col-md-3">
                            <div class="radio">
                                <label><input type="radio" name="type" id="employee" value="employee">    For Employee</label>
                            </div>
                            </div>
                            <div class="col-md-3">
                            <div class="radio">
                                <label><input type="radio" name="type" id="coordinator" value="coordinator">    For Coordinator</label>
                            </div>
                            </div>
                            </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" >Template Name</label>
                                    <input type="text" name="template_name" id="template_name" class="form-control ">
                                    <span class="error-block"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" >Template Description</label>
                                    <input type="text" name="description" id="description" class="form-control ">
                                    <span class="error-block"></span>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-5">
                                <ul class="list-group">
                                    <li id="tf" class="list-group-item">Text Field
                                        <a  id="tf" name="add_row" class="m-l-15 pull-right addButton" style="color: #e63131">
                                            <i class="fa fa-plus-circle" style="padding-top: 4px;font-size: 20px;"></i>
                                        </a>
                                    </li>
                                    <li id="ta" class="list-group-item">Paragraph Type Questions
                                        <a id="ta" name="add_row" class="m-l-15 pull-right addButton" style="color: #e63131">
                                            <i class="fa fa-plus-circle" style="padding-top: 4px;font-size: 20px;"></i>
                                        </a>
                                    </li>
                                    <li id="select" class="list-group-item">Drop Down Type Questions
                                        <a  id="select" name="add_row" class="m-l-15 pull-right addButton" style="color: #e63131">
                                            <i class="fa fa-plus-circle" style="padding-top: 4px;font-size: 20px;"></i>
                                        </a>
                                    </li>
<!--                                    <li id="selectmulti" class="list-group-item">Multiple Select Drop Down Type Questions-->
<!--                                        <a  id="selectmulti" name="add_row" class="m-l-15 pull-right addButton" style="color: #e63131">-->
<!--                                            <i class="fa fa-plus-circle" style="padding-top: 4px;font-size: 20px;"></i>-->
<!--                                        </a>-->
<!--                                    </li>-->

                                    <li id="date" class="list-group-item">Date
                                        <a  id="date" name="add_row" class="m-l-15 pull-right addButton" style="color: #e63131">
                                            <i class="fa fa-plus-circle" style="padding-top: 4px;font-size: 20px;"></i>
                                        </a>
                                    </li>

                                    <li id="radio" class="list-group-item">check only one type Questions
                                        <a id="radio" name="add_row" class="m-l-15 pull-right addButton" style="color: #e63131">
                                            <i class="fa fa-plus-circle" style="padding-top: 4px;font-size: 20px;"></i>
                                        </a>
                                    </li>
                                    <li id="check" class="list-group-item">Checkbox Type Questions
                                        <a  id="check" name="add_row" class="m-l-15 pull-right addButton" style="color: #e63131">
                                            <i class="fa fa-plus-circle" style="padding-top: 4px;font-size: 20px;"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-md-7">
                                <table id="perform">
                                    <thead></thead>
                                    <tbody></tbody>
                                </table>
                            </div>

                        </div>

<!--                        <a id="addButton" name="add_row" class="btn btn-success d-none d-lg-block m-l-15 pull-right" style="color: #fff"><i class="fa fa-plus-circle"></i>  Add Question</a>-->
<!--                        <table id="dyTable" class="table items table-striped table-bordered table-condensed table-hover">-->
<!--                            <thead>-->
<!--                                <tr>-->
<!--                                    <th style="width: 20px;"></th>-->
<!--                                    <th>Q.Code</th>-->
<!--                                    <th>Question</th>-->
<!--                                    <th>Field Type</th>-->
<!--                                    <th>Validation</th>-->
<!--                                    <th>Options (Add Comma Separate)</th>-->
<!--                                    <th>Help</th>-->
<!--                                    <th>Group</th>-->
<!--                                    <th style="width: 20px;"></th>-->
<!--                                </tr>-->
<!--                            </thead>-->
<!--                            <tbody></tbody>-->
<!--                        </table>-->
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



<script>
    var save_method;
    var templates_datatable;
    var counter = 1;

    function add_new()
    {
        $('#template_form')[0].reset();
        save_method = 'add';
        $(".row_dyn").remove();
        $('#template_modal').modal({backdrop: 'static', keyboard: false});
        $('#template_modal .modal-title').text('Add New Questionnaire Template');
    }

//    $(document).ready(function() {
//        $("#addButton").click(function () {
//            if(counter>50){
//                alert("Only 50 textboxes allowed");
//                return false;
//            }
//            var dyTable = $(document.createElement('tr')).attr("id", 'row_' + counter).attr("class", 'row_dyn');
//
//            dyTable.after().html('<td></td>' + '<td><input class="code form-control" type="text" name="code[' + counter + ']" id="code' + counter + '" style="width: 60px" /></td><td><input class=" form-control" type="text" name="question[' + counter + ']" id="question' + counter + '" style="width: 100px" /></td><td><select type="select-one" class="form-control" id="field_type' + counter + '" name="field_type[' + counter + ']"><option value="">--</option><option value="text">Text Field</option><option value="textarea">Text Area</option><option value="select">Select</option><option value="select2multi">Multi Select</option><option value="radio">Radio</option><option value="date">Date</option></select></td><td style=""><select type="select-one" class="form-control" id="field_validation' + counter + '" name="field_validation[' + counter + ']" ><option value="">--</option> <option value="required">Required</option><option value="none">None</option> </select></td><td><textarea name="options[' + counter + ']" id="options' + counter + '"  class="form-control"></textarea></td><td><textarea name="help[' + counter + ']" id="help' + counter + '"  class="form-control"></textarea></td><td><input class="group form-control" type="text" name="group[' + counter + ']" id="group' + counter + '" style="width: 60px"  /></td><td><i class="fa fa-trash tip del" id="' + counter + '" title="Remove This Item" style="cursor:pointer;" data-placement="right"></i></td>');
//            counter++;
//            dyTable.appendTo("#dyTable");
//        });


    $(document).ready(function(){

        $(".addButton").click(function () {
            var counter=$('#perform tr').length+1;

            if(counter>500){
                alert("Only 500 textboxes allowed");
                return false;
            }

            var sk = $(document.createElement('tr')).attr("id", 'row_' + counter).attr("class", 'row_dyn');

            if($(this).attr('id')=='tf')

            sk.after().html('<td>' +
                '<div class="panel panel-default">' +
                '<div class="panel-heading">' +
                '<h5 class="panel-title">Text Field' +
                '<i class="fa fa-times del"  style="cursor:pointer;float:right;padding:8px" data-placement="right" id="del' + counter + '"></i>' +
                '<a data-toggle="collapse" href="#collapse' + counter + '"><i class="fa fa-pencil "  style="cursor:pointer;float:right;padding:8px" data-placement="right" id="edit' + counter + '"></i></a>' +
                '</h5>' +
                '</div>' +
                '<div class="panel-body">' +
                '<input type="text" name="field_type[' + counter + ']" id="field_type' + counter + '" class="form control" value="text">' +
                '<div id="collapse' + counter + '" class="panel-collapse collapse">' +
                '<label class="col-md-5">Question</label><input type="text" name="question[' + counter + ']" style="width:500px" id="question' + counter + '" class="form control">' +
                '<label class="col-md-5">Required</label><input type="checkbox" name="field_validation[' + counter + ']"  id="field_validation' + counter + '" class="form control col-md-1">' +
                '<label class="col-md-5">Group</label><input type="text" name="group[' + counter + ']" style="width:200px" id="group' + counter + '" class="form control">' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</td>');

            sk.appendTo("#perform");

            if($(this).attr('id')=='ta')

            sk.after().html('<td>' +
                '<div class="panel panel-default">' +
                '<div class="panel-heading">' +
                '<h5 class="panel-title">Paragraph Type Questions' +
                '<i class="fa fa-times del"  style="cursor:pointer;float:right;padding:8px" data-placement="right" id="del' + counter + '"></i>' +
                '<a data-toggle="collapse" href="#collapse' + counter + '"><i class="fa fa-pencil "  style="cursor:pointer;float:right;padding:8px" data-placement="right" id="edit' + counter + '"></i></a>' +
                '</h5>' +
                '</div>' +
                '<div class="panel-body">' +
                '<textarea rows="3" cols="50" class="form control"  name="field_type[' + counter + ']" id="field_type' + counter + '" >textarea</textarea>' +
                '<div id="collapse' + counter + '" class="panel-collapse collapse">' +
                '<label class="col-md-5">Question</label><input type="text" name="question[' + counter + ']" style="width:500px" id="question' + counter + '" class="form control">' +
                '<label class="col-md-5">Required</label><input type="checkbox" name="field_validation[' + counter + ']"  id="field_validation' + counter + '" class="form control col-md-1">' +
                '<label class="col-md-5">Group</label><input type="text" name="group[' + counter + ']" style="width:200px" id="group' + counter + '" class="form control">' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</td>');


            sk.appendTo("#perform");

            if($(this).attr('id')=='select')

            sk.after().html('<td>' +
                '<div class="panel panel-default">' +
                '<div class="panel-heading">' +
                '<h5 class="panel-title">Drop Down Type Questions' +
                '<i class ="fa fa-times del"  style="cursor:pointer;float:right;padding:8px" data-placement="right" id="del' + counter + '"></i>' +
                '<a data-toggle="collapse" href="#collapse' + counter + '"><i class="fa fa-pencil "  style="cursor:pointer;float:right;padding:8px" data-placement="right" id="edit' + counter + '"></i></a>' +
                '</h5>' +
                '</div>' +
                '<div class="panel-body">' +
                '<input type="hidden" name="field_type[' + counter + ']" id="field_type' + counter + '" class="form control" value="select">' +
                '<select class="form control select2" style="width:500px">' +
                '<option value="">...</option>' +
                '</select>' +
                '<div id="collapse' + counter + '" class="panel-collapse collapse">' +
                '<label class="col-md-5">Question</label><input type="text" name="question[' + counter + ']" style="width:500px" id="question' + counter + '" class="form control">' +
                '<label class="col-md-5">Required</label><input type="checkbox" name="field_validation[' + counter + ']"  id="field_validation' + counter + '" class="form control col-md-1">' +
                '<label class="col-md-5">Options(Add Comma Separate)</label><input type="text" name="options[' + counter + ']" style="width:500px" id="options' + counter + '" class="form control">' +
                '<label class="col-md-5">Group</label><input type="text" name="group[' + counter + ']" style="width:200px" id="group' + counter + '" class="form control">' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</td>');

            sk.appendTo("#perform");

            if($(this).attr('id')=='selectmulti')

            sk.after().html('<td>' +
                '<div class="panel panel-default">' +
                '<div class="panel-heading">' +
                '<h5 class="panel-title">Multiple Select Drop Down Questions' +
                '<i class="fa fa-times del"  style="cursor:pointer;float:right;padding:8px" data-placement="right" id="del' + counter + '"></i>' +
                '<a data-toggle="collapse" href="#collapse' + counter + '"><i class="fa fa-pencil "  style="cursor:pointer;float:right;padding:8px" data-placement="right" id="edit' + counter + '"></i></a>' +
                '</h5>' +
                '</div>' +
                '<div class="panel-body">' +
                '<input type="hidden" name="field_type[' + counter + ']" id="field_type' + counter + '" class="form control" value="select2multi">' +
                '<select class="form-control select2" multiple>'+
                '<option value="">...</option>' +
                '</select>' +
                '<div id="collapse' + counter + '" class="panel-collapse collapse">' +
                '<label class="col-md-5">Question</label><input type="text" name="question[' + counter + ']" style="width:500px" id="question' + counter + '" class="form control">' +
                '<label class="col-md-5">Required</label><input type="checkbox" name="field_validation[' + counter + ']"  id="field_validation' + counter + '" class="form control col-md-1">' +
                '<label class="col-md-5">Options(Add Comma Separate)</label><input type="text" name="options[' + counter + ']" style="width:500px" id="options' + counter + '" class="form control">' +
                '<label class="col-md-5">Group</label><input type="text" name="group[' + counter + ']" style="width:200px" id="group' + counter + '" class="form control">' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</td>');

            sk.appendTo("#perform");

            if($(this).attr('id')=='date')

            sk.after().html('<td>' +
                '<div class="panel panel-default">' +
                '<div class="panel-heading">' +
                '<h5 class="panel-title">Date' +
                '<i class="fa fa-times del"  style="cursor:pointer;float:right;padding:8px" data-placement="right" id="del' + counter + '"></i>' +
                '<a data-toggle="collapse" href="#collapse' + counter + '"><i class="fa fa-pencil "  style="cursor:pointer;float:right;padding:8px" data-placement="right" id="edit' + counter + '"></i></a>' +
                '</h5>' +
                '</div>' +
                '<div class="panel-body">' +
                '<input type="hidden" name="field_type[' + counter + ']" id="field_type' + counter + '" class="form control" value="date">' +
                '<input type="text" class="form-control date-pick" value="" >' +
                '<div id="collapse' + counter + '" class="panel-collapse collapse">' +
                '<label class="col-md-5">Question</label><input type="text" name="question[' + counter + ']" style="width:500px" id="question' + counter + '" class="form control">' +
                '<label class="col-md-5">Required</label><input type="checkbox" name="field_validation[' + counter + ']"  id="field_validation' + counter + '" class="form control col-md-1">' +
                '<label class="col-md-5">Group</label><input type="text" name="group[' + counter + ']" style="width:200px" id="group' + counter + '" class="form control">' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</td>');


            sk.appendTo("#perform");

            if($(this).attr('id')=='radio')

            sk.after().html('<td>' +
                '<div class="panel panel-default">' +
                '<div class="panel-heading">' +
                '<h5 class="panel-title">check only one type Questions' +
                '<i class="fa fa-times del"  style="cursor:pointer;float:right;padding:8px" data-placement="right" id="del' + counter + '"></i>' +
                '<a data-toggle="collapse" href="#collapse' + counter + '"><i class="fa fa-pencil "  style="cursor:pointer;float:right;padding:8px" data-placement="right" id="edit' + counter + '"></i></a>' +
                '</h5>' +
                '</div>' +
                '<div class="panel-body">' +
                '<input type="radio" class="form control">' +
                '<input type="hidden" name="field_type[' + counter + ']" id="field_type' + counter + '" class="form control" value="radio">' +
                '<div id="collapse' + counter + '" class="panel-collapse collapse">' +
                '<label class="col-md-5">Question</label><input type="text" name="question[' + counter + ']" style="width:500px" id="question' + counter + '" class="form control">' +
                '<label class="col-md-5">Required</label><input type="checkbox" name="field_validation[' + counter + ']"  id="field_validation' + counter + '" class="form control col-md-1">' +
                '<label class="col-md-5">Option(Add Comma Separate)</label><input type="text" name="options[' + counter + ']" style="width:500px" id="options' + counter + '" class="form control">' +
                '<label class="col-md-5">Group</label><input type="text" name="group[' + counter + ']" style="width:200px" id="group' + counter + '" class="form control">' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</td>');

            sk.appendTo("#perform");

            if($(this).attr('id')=='check')

            sk.after().html('<td>' +
                '<div class="panel panel-default">' +
                '<div class="panel-heading">' +
                '<h5 class="panel-title">Check Box Type Questions' +
                '<i class="fa fa-times del"  style="cursor:pointer;float:right;padding:8px" data-placement="right" id="del' + counter + '"></i>' +
                '<a data-toggle="collapse" href="#collapse' + counter + '"><i class="fa fa-pencil "  style="cursor:pointer;float:right;padding:8px" data-placement="right" id="edit' + counter + '"></i></a>' +
                '</h5>' +
                '</div>' +
                '<div class="panel-body">' +
                '<input type="checkbox"  class="form control">' +
                '<input type="hidden" name="field_type[' + counter + ']" id="field_type' + counter + '" class="form control" value="checkbox">' +
                '<div id="collapse' + counter + '" class="panel-collapse collapse">' +
                '<label class="col-md-5">Question</label><input type="text" name="question[' + counter + ']" style="width:500px" id="question' + counter + '" class="form control">' +
                '<label class="col-md-5">Required</label><input type="checkbox" name="field_validation[' + counter + ']"  id="field_validation' + counter + '" class="form control col-md-1">' +
                '<label class="col-md-5">Option(Add Comma Separate)</label><input type="text" name="options[' + counter + ']" style="width:500px" id="options' + counter + '" class="form control">' +
                '<label class="col-md-5">Group</label><input type="text" name="group[' + counter + ']" style="width:200px" id="group' + counter + '" class="form control">' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</td>');

            sk.appendTo("#perform");

            counter++;

        });


        $("#btnSave").off('click');
        $("#btnSave").on('click', function(e){
            e.preventDefault();
            save_method = 'add';
            save_quiz(save_method);
        });




        $("table#dyTable").on("click", '.del', function()
        {
            var delID = $(this).attr('id');
            row_id = $("#row_" + delID);
            row_id.remove();
        });


        $("#btnSave").off('click');
        $("#btnSave").on('click', function(e){
            e.preventDefault();
            save_quiz(save_method);
        });

        templates_datatable = $('#templates_datatable').DataTable({
            "processing": true,
            "serverSide": true,

            "ajax": {
                "data": {
                    "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
                },
                "url": "<?=base_url()?>systems/performance_review/get_review_questionnaire_data",
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
                "allowancetyTable": "No data available in table",
                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                "infoallowancety": "No entries found",
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

    });


    function save_quiz(save_method)
    {

        var url = "<?php echo site_url('systems/performance_review/save_quiz')?>/"+save_method;
        $.ajax({
            url: url,
            type: "POST",
            data: $('#template_form').serialize() + "&<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>",
            dataType: "JSON",
            success: function (data) {
                if (data.status) {
                   $('#template_modal').modal('hide');

                   reload_table(templates_datatable);
                    counter = 1;
                }
                else {
                    if (data.message) {
                        bootbox.alert(data.message);
                    }
                    if(data.error) {
                        for (var l = 0; l < data.inputerror.length; l++) {
                            $('[name="'+data.inputerror[l]+'"]').siblings("span.error-block").html(data.error_string[l]).show();
                        }
                    }
                }
                $('#review_quiz_modal').modal({backdrop: 'static', keyboard: false});
                $('#review_quiz_modal .modal-title').text('Review Quiz ' + id);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
            }
        });
    }

    function edit_quiz(id)
    {

        $('#template_form')[0].reset();
        $(".row_dyn").remove();
        counter = 1;
        save_method = 'edit';
        $("#template_id").val(id);
        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo site_url('systems/performance_review/get_quiz_data_by_id/')?>/" + id,
            type: "GET",
            "data": {

                "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
            },
            dataType: "JSON",
            success: function(data)
            {
                if ($('select.select2').data('select2')) {
                    $('select.select2').select2('destroy');
                }

                $('#template_name').val(data.main_data.name);
                $('#description').val(data.main_data.description);
                $("input:radio[name=type][value=" + data.main_data.type + "]").prop( 'checked', true );

                var obj = [
                    {'id' : 'text', 'field_type' : 'Text Field'},
                    {'id' : 'textarea', 'field_type' : 'Text Area'},
                    {'id' : 'select', 'field_type' : 'Select'},
                    {'id' : 'select2multi', 'field_type' : 'Multi Select'},
                    {'id' : 'radio', 'field_type' : 'Radio'},
                    {'id' : 'checkbox', 'field_type' : 'Checkbox'},
                    {'id' : 'date', 'field_type' : 'Date'}
                ];

                var validd = [
                    {'id' : 'required', 'field_validation' : 'Required'},
                    {'id' : 'none', 'field_validation' : 'None'},
                ];

                var i;
                var html_data = "";
                if(data.sub_data !== null){

                    for (i= 0; i< data.sub_data.length; ++i) {

                    var j=i+1;
                    var sk = $(document.createElement('tr')).attr("id", 'row_' + j).attr("class", 'row_dyn');

                        if (data.sub_data[i].field_type == "text")

                        sk.after().html('<td>' +
                            '<div class="panel panel-default">' +
                            '<div class="panel-heading">' +
                            '<h5 class="panel-title">Text Field' +
                            '<i class="fa fa-times del"  style="cursor:pointer;float:right;padding:8px" data-placement="right" id="del' + j + '"></i>' +
                            '<a data-toggle="collapse" href="#collapse' + j + '"><i class="fa fa-pencil "  style="cursor:pointer;float:right;padding:8px" data-placement="right" id="edit' + j + '"></i></a>' +
                            '</h5>' +
                            '</div>' +
                            '<div class="panel-body">' +
                            '<input type="hidden" name="quiz_id[' + j + ']" id="quiz_id' + j + '" value="'+ data.sub_data[i].id +'" />' +
                            '<input type="text" name="field_type[' + j + ']" id="field_type' + j + '" class="form control" value="text">' +
                            '<div id="collapse' + j + '" class="panel-collapse collapse">' +
                            '<label class="col-md-5">Question</label><input type="text" name="question[' + j + ']" style="width:500px" id="question' + j + '" class="form control" value="' + data.sub_data[i].question + '">' +
                            '<label class="col-md-5">Required</label><input type="checkbox" name="field_validation[' + j + ']"  id="field_validation' + j + '" class="form control col-md-1">' +
                            '<label class="col-md-5">Group</label><input type="text" name="group[' + j + ']" style="width:200px" id="group' + j + '" class="form control">' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</td>');

                        sk.appendTo("#perform");

                        if (data.sub_data[i].field_type == "textarea")

                        sk.after().html('<td>' +
                            '<div class="panel panel-default">' +
                            '<div class="panel-heading">' +
                            '<h5 class="panel-title">Paragraph Type Questions' +
                            '<i class="fa fa-times del"  style="cursor:pointer;float:right;padding:8px" data-placement="right" id="del' + j + '"></i>' +
                            '<a data-toggle="collapse" href="#collapse' + j + '"><i class="fa fa-pencil "  style="cursor:pointer;float:right;padding:8px" data-placement="right" id="edit' + j + '"></i></a>' +
                            '</h5>' +
                            '</div>' +
                            '<div class="panel-body">' +
                            '<textarea rows="3" cols="50" class="form control"  name="field_type[' + j + ']" id="field_type' + j + '" >textarea</textarea>' +
                            '<div id="collapse' + j + '" class="panel-collapse collapse">' +
                            '<input type="hidden" name="quiz_id[' + j + ']" id="quiz_id' + j + '" value="'+ data.sub_data[i].id +'" />' +
                            '<label class="col-md-5">Question</label><input type="text" name="question[' + j + ']" style="width:500px" id="question' + j + '" class="form control" value="' + data.sub_data[i].question + '">' +
                            '<label class="col-md-5">Required</label><input type="checkbox" name="field_validation[' + j + ']"  id="field_validation' + j + '" class="form control col-md-1">' +
                            '<label class="col-md-5">Group</label><input type="text" name="group[' + j + ']" style="width:200px" id="group' + j + '" class="form control">' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</td>');

                        sk.appendTo("#perform");

                        if (data.sub_data[i].field_type == "select")

                        sk.after().html('<td>' +
                            '<div class="panel panel-default">' +
                            '<div class="panel-heading">' +
                            '<h5 class="panel-title">Drop Down Type Questions' +
                            '<i class ="fa fa-times del"  style="cursor:pointer;float:right;padding:8px" data-placement="right" id="del' + j + '"></i>' +
                            '<a data-toggle="collapse" href="#collapse' + j + '"><i class="fa fa-pencil "  style="cursor:pointer;float:right;padding:8px" data-placement="right" id="edit' + j + '"></i></a>' +
                            '</h5>' +
                            '</div>' +
                            '<div class="panel-body">' +
                            '<input type="hidden" name="field_type[' + j + ']" id="field_type' + j + '" class="form control" value="select">' +
                            '<select class="form control select2" style="width:500px">' +
                            '<option value="">...</option>' +
                            '</select>' +
                            '<div id="collapse' + j + '" class="panel-collapse collapse">' +
                            '<input type="hidden" name="quiz_id[' + j + ']" id="quiz_id' + j + '" value="'+ data.sub_data[i].id +'" />' +
                            '<label class="col-md-5">Question</label><input type="text" name="question[' + j + ']" style="width:500px" id="question' + j+ '" class="form control" value="' + data.sub_data[i].question + '">' +
                            '<label class="col-md-5">Required</label><input type="checkbox" name="field_validation[' + j + ']"  id="field_validation' + j + '" class="form control col-md-1">' +
                            '<label class="col-md-5">Options(Add Comma Separate)</label><input type="text" name="options[' + j + ']" style="width:500px" id="options' + j + '" class="form control" value="' + data.sub_data[i].options + '">' +
                            '<label class="col-md-5">Group</label><input type="text" name="group[' + j + ']" style="width:200px" id="group' + j + '" class="form control">' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</td>');

                        sk.appendTo("#perform");

                        if (data.sub_data[i].field_type == "selectmulti")

                        sk.after().html('<td>' +
                            '<div class="panel panel-default">' +
                            '<div class="panel-heading">' +
                            '<h5 class="panel-title">Multiple Select Drop Down Questions' +
                            '<i class="fa fa-times del"  style="cursor:pointer;float:right;padding:8px" data-placement="right" id="del' + j + '"></i>' +
                            '<a data-toggle="collapse" href="#collapse' + j + '"><i class="fa fa-pencil "  style="cursor:pointer;float:right;padding:8px" data-placement="right" id="edit' + j + '"></i></a>' +
                            '</h5>' +
                            '</div>' +
                            '<div class="panel-body">' +
                            '<input type="hidden" name="field_type[' + j + ']" id="field_type' + j + '" class="form control" value="select2multi">' +
                            '<select class="form-control select2" multiple>' +
                            '<option value="">...</option>' +
                            '</select>' +
                            '<div id="collapse' + j + '" class="panel-collapse collapse">' +
                            '<input type="hidden" name="quiz_id[' + j + ']" id="quiz_id' + j + '" value="'+ data.sub_data[i].id +'" />' +
                            '<label class="col-md-5">Question</label><input type="text" name="question[' + j + ']" style="width:500px" id="question' + j + '" class="form control" value="' + data.sub_data[i].question + '">' +
                            '<label class="col-md-5">Required</label><input type="checkbox" name="field_validation[' + j + ']"  id="field_validation' + j + '" class="form control col-md-1">' +
                            '<label class="col-md-5">Options(Add Comma Separate)</label><input type="text" name="options[' + j + ']" style="width:500px" id="options' + j + '" class="form control" value="' + data.sub_data[i].options + '">' +
                            '<label class="col-md-5">Group</label><input type="text" name="group[' + j + ']" style="width:200px" id="group' + j + '" class="form control">' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</td>');

                        sk.appendTo("#perform");

                        if (data.sub_data[i].field_type == "date")

                        sk.after().html('<td>' +
                            '<div class="panel panel-default">' +
                            '<div class="panel-heading">' +
                            '<h5 class="panel-title">Date' +
                            '<i class="fa fa-times del"  style="cursor:pointer;float:right;padding:8px" data-placement="right" id="del' + j + '"></i>' +
                            '<a data-toggle="collapse" href="#collapse' + j + '"><i class="fa fa-pencil "  style="cursor:pointer;float:right;padding:8px" data-placement="right" id="edit' + j + '"></i></a>' +
                            '</h5>' +
                            '</div>' +
                            '<div class="panel-body">' +
                            '<input type="hidden" name="quiz_id[' + j + ']" id="quiz_id' + j + '" value="'+ data.sub_data[i].id +'" />' +
                            '<input type="hidden" name="field_type[' + j + ']" id="field_type' + j + '" class="form control" value="date">' +
                            '<input type="text" class="form-control date-pick" value="" >' +
                            '<div id="collapse' + j + '" class="panel-collapse collapse">' +
                            '<label class="col-md-5">Question</label><input type="text" name="question[' + j + ']" style="width:500px" id="question' +  j + '" class="form control" value="' + data.sub_data[i].question + '">' +
                            '<label class="col-md-5">Required</label><input type="checkbox" name="field_validation[' + j + ']"  id="field_validation' + j + '" class="form control col-md-1">' +
                            '<label class="col-md-5">Group</label><input type="text" name="group[' + j + ']" style="width:200px" id="group' + j + '" class="form control">' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</td>');


                        sk.appendTo("#perform");

                        if (data.sub_data[i].field_type == "radio")

                        sk.after().html('<td>' +
                            '<div class="panel panel-default">' +
                            '<div class="panel-heading">' +
                            '<h5 class="panel-title">check only one type Questions' +
                            '<i class="fa fa-times del"  style="cursor:pointer;float:right;padding:8px" data-placement="right" id="del' + j + '"></i>' +
                            '<a data-toggle="collapse" href="#collapse' + j + '"><i class="fa fa-pencil "  style="cursor:pointer;float:right;padding:8px" data-placement="right" id="edit' + j + '"></i></a>' +
                            '</h5>' +
                            '</div>' +
                            '<div class="panel-body">' +
                            '<input type="radio" class="form control">' +
                            '<input type="hidden" name="field_type[' + j + ']" id="field_type' + j + '" class="form control" value="radio">' +
                            '<div id="collapse' + j + '" class="panel-collapse collapse">' +
                            '<input type="hidden" name="quiz_id[' + j + ']" id="quiz_id' + j + '" value="'+ data.sub_data[i].id +'" />' +
                            '<label class="col-md-5">Question</label><input type="text" name="question[' + j + ']" style="width:500px" id="question' + j + '" class="form control" value="' + data.sub_data[i].question + '">' +
                            '<label class="col-md-5">Required</label><input type="checkbox" name="field_validation[' + j + ']"  id="field_validation' + j + '" class="form control col-md-1">' +
                            '<label class="col-md-5">Option(Add Comma Separate)</label><input type="text" name="options[' + j + ']" style="width:500px" id="options' + j + '" class="form control" value="' + data.sub_data[i].options + '">' +
                            '<label class="col-md-5">Group</label><input type="text" name="group[' + j + ']" style="width:200px" id="group' + j + '" class="form control">' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</td>');

                        sk.appendTo("#perform");

                        if (data.sub_data[i].field_type == "checkbox")

                            sk.after().html('<td>' +
                            '<div class="panel panel-default">' +
                            '<div class="panel-heading">' +
                            '<h5 class="panel-title">Check Box Type Questions' +
                            '<i class="fa fa-times del"  style="cursor:pointer;float:right;padding:8px" data-placement="right" id="del' + j + '"></i>' +
                            '<a data-toggle="collapse" href="#collapse' + j + '"><i class="fa fa-pencil "  style="cursor:pointer;float:right;padding:8px" data-placement="right" id="edit' + j + '"></i></a>' +
                            '</h5>' +
                            '</div>' +
                            '<div class="panel-body">' +
                            '<input type="checkbox"  class="form control">' +
                            '<input type="hidden" name="field_type[' + j + ']" id="field_type' + j + '" class="form control" value="checkbox">' +
                            '<div id="collapse' + j + '" class="panel-collapse collapse">' +
                            '<input type="hidden" name="quiz_id[' + j + ']" id="quiz_id' + j + '" value="'+ data.sub_data[i].id +'" />' +
                            '<label class="col-md-5">Question</label><input type="text" name="question[' + j + ']" style="width:500px" id="question' + j + '" class="form control" value="' + data.sub_data[i].question + '">' +
                            '<label class="col-md-5">Required</label><input type="checkbox" name="field_validation[' + j + ']"  id="field_validation' + j + '" class="form control col-md-1">' +
                            '<label class="col-md-5">Option(Add Comma Separate)</label><input type="text" name="options[' + j + ']" style="width:500px" id="options' + j + '" class="form control"  value="' + data.sub_data[i].options + '">' +
                            '<label class="col-md-5">Group</label><input type="text" name="group[' + j + ']" style="width:200px" id="group' + j + '" class="form control">' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</td>');

                        sk.appendTo("#perform");


                    }
                    counter++;
                    j++;

//                    for (i= 0; i< data.sub_data.length; ++i) {
//                        html_data += '<tr id="row_' + counter +'" class="row_dyn">' +
//                            '<td><input type="hidden" name="quiz_id[' + counter + ']" id="quiz_id' + counter + '" value="'+ data.sub_data[i].id +'" /></td>' + '' +
//                            '<td><input class="code form-control" type="text" name="code[' + counter + ']" id="code' + counter + '" style="width: 60px"  value="'+ data.sub_data[i].code +'" /></td>' +
//                            '<td><input class=" form-control" type="text" name="question[' + counter + ']" id="question' + counter + '" style="width: 100px"   value="'+ data.sub_data[i].question +'" /></td>' + '' +
//                            '<td><select name="field_type[' + counter + ']" id="field_type' + counter + '" class=" form-control"><option value="">...</option>';
//                        var j;
//                        for (j= 0; j < obj.length; ++j) {
//                            if(obj[j].id==data.sub_data[i].field_type){
//                                html_data += '<option value='+ obj[j].id +' selected>'+ obj[j].field_type +'</option>';
//                            } else {
//                                html_data += '<option value='+ obj[j].id +'>'+ obj[j].field_type +'</option>';
//                            }
//                        }
//                        html_data += '</select></td>';
//
//                        html_data += '<td><select name="field_validation[' + counter + ']" id="field_validation' + counter + '" class=" form-control"><option value="">...</option>';
//                        var z;
//                        for (z= 0; z < validd.length; ++z) {
//
//                            if(validd[z].id==data.sub_data[i].field_validation){
//                                html_data += '<option value='+ validd[z].id +' selected>'+ validd[z].field_validation +'</option>';
//                            } else {
//                                html_data += '<option value='+ validd[z].id +'>'+ validd[z].field_validation +'</option>';
//                            }
//                        }
//                        html_data += '</select></td><td><textarea name="options[' + counter + ']" id="options' + counter + '"  class="form-control">'+ data.sub_data[i].options +'</textarea></td>' +
//                        '<td><textarea name="help[' + counter + ']" id="help' + counter + '"  class="form-control">'+ data.sub_data[i].help +'</textarea></td>' +
//                        '<td><input class="group form-control" type="text" name="group[' + counter + ']" id="group' + counter + '" style="width: 60px"  value="'+ data.sub_data[i].group +'" /></td>';
//                        html_data += '<td></td></tr>';
//                        counter++;
//                    }

                   // $("#perform").html(html_data);
                }
                //$('.select2').select2({dropdownParent: $("#template_modal")});
            },
            error: function ()
            {
                console.log('Error get Quiz data');
            }
        });

        $('#template_modal').modal({backdrop: 'static', keyboard: false});
        $('#template_modal .modal-title').text('Edit Review Quiz ' + id);
    }

    $("#perform").on("click", '.del', function(e) {

        $(this).closest ('tr').remove ();


    });


</script>

