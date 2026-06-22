<style>
    .collapse {
        display: none;
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
            <div class="card-header bg-info page-head-title-wrap">
                <h4 class="page-head-title card-title  text-white" style="display: inline-block"> Evaluation Questionnaire</h4>
            </div>
            <div class="element-box" >
                <form id="question_form">
                    <div class="radio">
                        <label><input type="radio" name="type" id="employee" value="employee">    For Employee</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="type" id="coordinator" value="coordinator">    For Coordinator</label>
                    </div>

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

                    <div class="row">
                        <div class="col-md-3">
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
<!--                                <li id="selectmulti" class="list-group-item">Multiple Select Drop Down Questions-->
<!--                                    <a  id="selectmulti" name="add_row" class="m-l-15 pull-right addButton" style="color: #e63131">-->
<!--                                        <i class="fa fa-plus-circle" style="padding-top: 4px;font-size: 20px;"></i>-->
<!--                                    </a>-->
<!--                                </li>-->

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

                        <div class="col-md-8">
                            <table id="perform">
                                <thead></thead>
                                <tbody></tbody>
                            </table>
                        </div>
                        <div class="col-md-1">
                            <button type="button" id="btnSave" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-12" id="review_quiz" hidden="hidden">
                <form action="#" id="review_quiz_form" class="form-horizontal">
                    <div class="form-body" style="padding: 0px 10px;">
                        <input type="hidden" id="review_quiz_id" name="review_quiz_id"/>

                            <hr>
                            <div class="col-md-12">
                                <div id="load_quiz_form_data"></div>
                            </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

var counter = 1;
$(document).ready(function(){

    $(".addButton").click(function () {

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
        '<a data-toggle="collapse" href="#collapse' + counter + '" aria-expanded="false"><i class="fa fa-pencil "  style="cursor:pointer;float:right;padding:8px" data-placement="right" id="edit' + counter + '"></i></a>' +
        '</h5>' +
        '</div>' +

        '<div class="panel-body">' +
        '<input type="text" name="field_type[' + counter + ']" id="field_type' + counter + '" class="form control tt" value="text">' +
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
        '<h5 class="panel-title">Text Area' +
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
        '<h5 class="panel-title">Select' +
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
        '<h5 class="panel-title">Multiple Select' +
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
        '<h5 class="panel-title">Radio Button' +
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
        '<h5 class="panel-title">Check Box' +
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

    function save_quiz(save_method)
    {


        var url = "<?php echo site_url('systems/performance_review/save_quiz')?>/"+save_method;
        $.ajax({
            url: url,
            type: "POST",
            data: $('#question_form').serialize() + "&<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>",
            dataType: "JSON",
            success: function (data) {

                if (data.status) {
                   //$('#template_modal').modal('hide');
                    //reload_table(allowance_datatable);
                  window.location.href = "<?php echo site_url('systems/performance_review/review_questionnaire') ?>";
                    counter = 1;
                    //show_quiz(data.id);
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
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
            }
        });
    }

});

$("#perform").on("click", '.del', function(e) {

    $(this).closest ('tr').remove ();


});

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
                $('#lbl-employee').html(data.employee);
                $('#lbl-coordinator').html(data.coordinator);

                $('#load_quiz_form_data').html('');
                quiz_string='';
                for(var i=0;i<data.QuizTemplateData.length;i++) {
                   // if (data.QuizTemplateData[i].code) {

                        /*if(data.QuizTemplateData[i].min_val > 0 && data.QuizTemplateData[i].max_val > 0){
                         quiz_string='( '+data.QuizTemplateData[i].min_val+'km - '+data.QuizTemplateData[i].max_val+'km )';
                         }*/
                        if (data.QuizTemplateData[i].field_type == "text") {

                            $('#load_quiz_form_data').append('' +
                            '<div class="form-group">' +
                            '<label class="control-label col-md-5" for="question' + (i + 1) + '">' + data.QuizTemplateData[i].question + '</label>' +
                            '<div class="col-md-7">' +
                            '<input type="hidden" name="question[' + (i + 1) + ']" id="question' + (i + 1) + '" class="form-control" value="' + data.QuizTemplateData[i].id + '" >' +
                            '<input type="text" name="field_type[' + (i + 1) + ']" id="field_type' + (i + 1) + '" class="form-control" value="" >' +
                            '<span class="help-block"></span>' +
                            '</div>' +
                            '</div>' +
                            '');
                        } else if (data.QuizTemplateData[i].field_type == "textarea") {
                            $('#load_quiz_form_data').append('' +
                            '<div class="form-group">' +
                            '<label class="control-label col-md-5" for="question' + (i + 1) + '">' + data.QuizTemplateData[i].question + '</label>' +
                            '<div class="col-md-7">' +
                            '<input type="hidden" name="question[' + (i + 1) + ']" id="question' + (i + 1) + '" class="form-control" value="' + data.QuizTemplateData[i].id + '" >' +
                            '<textarea name="field_type[' + (i + 1) + ']" id="field_type' + (i + 1) + '"  class=" form-control"></textarea>' +
                            '<span class="help-block"></span>' +
                            '</div>' +
                            '</div>' +
                            '');
                        } else if (data.QuizTemplateData[i].field_type == "date") {
                            $('#load_quiz_form_data').append('' +
                            '<div class="form-group">' +
                            '<label class="control-label col-md-5" for="question' + (i + 1) + '">' + data.QuizTemplateData[i].question + '</label>' +
                            '<div class="col-md-7">' +
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
                            '<label class="control-label col-md-5" for="question' + (i + 1) + '">' + data.QuizTemplateData[i].question + '</label>' +
                            '<div class="col-md-7">' +
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
                            '<label class="control-label col-md-5" for="question' + (i + 1) + '">' + data.QuizTemplateData[i].question + '</label>' +
                            '<div class="col-md-7">' +
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
                                selectdt3 += '<input type="radio" name="field_type[' + (i + 1) + ']" value=' + myarr3[w] + '>' +'    '+ myarr3[w] +'    '+ '';
                            }
                            $('#load_quiz_form_data').append('' +
                            '<div class="form-group">' +
                            '<label class="control-label col-md-5" for="question' + (i + 1) + '">' + data.QuizTemplateData[i].question + '</label>' +
                            '<div class="col-md-7">' +
                            '<input type="hidden" name="question[' + (i + 1) + ']" id="question' + (i + 1) + '" class="form-control" value="' + data.QuizTemplateData[i].id + '" >' +
                            '' + selectdt3 + '<span class="help-block"></span>' +
                            '</div>' +
                            '</div>' +
                            '');
                        }else if (data.QuizTemplateData[i].field_type == "checkbox") {
                            var myarr3 = data.QuizTemplateData[i].options.split(",");
                            var selectdt3 = "";
                            for (var w = 0; w < myarr3.length; w++) {
                                selectdt3 += '<input type="checkbox" name="field_type[' + (i + 1) + ']" value=' + myarr3[w] + '>' +'    '+ myarr3[w] +'    '+ '';
                            }
                            $('#load_quiz_form_data').append('' +
                            '<div class="form-group">' +
                            '<label class="control-label col-md-5" for="question' + (i + 1) + '">' + data.QuizTemplateData[i].question + '</label>' +
                            '<div class="col-md-7">' +
                            '<input type="hidden" name="question[' + (i + 1) + ']" id="question' + (i + 1) + '" class="form-control" value="' + data.QuizTemplateData[i].id + '" >' +
                            '' + selectdt3 + '<span class="help-block"></span>' +
                            '</div>' +
                            '</div>' +
                            '');
                        }
                   // }
                  //  $('.select2').select2({dropdownParent: $("#review_quiz_modal")});
                }


                    $('#review_quiz').show();
                    $('#question_form').hide();
//                $('#review_quiz_modal').modal({backdrop: 'static', keyboard: false});
//                $('#review_quiz_modal .modal-title').text('Review Quiz ' + id);

            },
            error: function ()
            {
                console.log('Error get Quiz data');
            }
        });


    }
</script>




































































































































































































































































