<?php
/**
 * Created by PhpStorm.
 * User: Kasun De Mel
 * Date: 1/5/2019
 * Time: 11:58 AM
 */
?>

<style>
    .square_div{
        border: 1px solid black;
        width: auto;
    }

    input, select, textarea{
        color: #ff0000;
    }

    table, th, td{
        text-align: center;
    }

    #module_list label {
        padding-top: 0px !important;
        font-size: 11px!important;
    }
    #BranchSubStore_list label {
        padding-top: 0px !important;
        font-size: 11px!important;
        margin-bottom: 0px !important;
    }
    #table_user_branches label {
        width: auto!important;}
    .widthFix{
        width:auto !important;
    }
    .btn-success{
        background: transparent !important;
    }
</style>


<div class="page-content-wrapper">
    <div class="page-content">
        <!-- BEGIN BREADCRUMBS -->
        <div class="breadcrumbs">
            <div style="border-bottom:2px solid #285aff; font-size:12pt; padding: 5px 20px; margin-bottom: 10px;">
                <a  class="btn btn-success bt-add-v2 pull-right" onclick='add_user();' style="background: transparent !important;">Add New User</a>
                <ol class="breadcrumb">
                    <li style="font-size: 12px">
                        <a href="<?php echo base_url(); ?>">Home</a>
                    </li>
                    <li class="active" style="font-size: 14px;margin-left: 10px">System Users</li>
                </ol>
            </div>
        </div>

        <div class="box">
            <div class="box-body">
                <div id="system_div" class="table-responsive">
                    <div class="box">
                        <table id="table_user_branches"  class="table table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>TITLE</th>
                                <th>EPF NO</th>
                                <th>FULL NAME</th>
                                <th>USERNAME</th>
                                <th>Email</th>
                                <th>ACTION</th>
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



<div class="modal fade bs-example-modal-lg in" id="sys_u_bs_modal" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg"  style="width:100%; min-width: 400px; max-width: 1200px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="ubsModalLabel"></h4>
            </div>
            <div class="modal-body">
                <form id="sys_u_bs_form" class="form-horizontal" role="form">
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                    <input type="hidden" name="sys_u_bs_id" id="sys_u_bs_id" value="" />

                    <div class="Insert" style=" background-color:white; display: block; float: none;">
                        <div id="BranchSubStore_list" class="row">

                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btn_save_ubs">Save</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bs-example-modal-lg in" id="sys_u_p_modal" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg"  style="width:100%; min-width: 400px; max-width: 1200px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="sysModalLabel"></h4>
            </div>
            <div class="modal-body">
                <form id="sys_u_p_form" class="form-horizontal" role="form">
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                    <input type="hidden" name="sys_u_p_id" id="sys_u_p_id" value="" />

                    <div class="Insert" style=" background-color:white; display: block; float: none;">
                        <div id="module_list" class="row">

                        </div>
                    </div>
                    <div class="Insert" style=" background-color:white; display: block; float: none;margin-top: 10px !important;">
                        <div id="button_list" class="row">

                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btn_save_sys">Save</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade bs-example-modal-lg in" id="user_modal" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg"  style="min-width: 500px; max-width: 1000px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="userModalLabel"></h4>
            </div>
            <div class="modal-body">
                <form id="user_form" class="form-horizontal" role="form">
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                    <input type="hidden" id="user_id" name="user_id" value="" />
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label col-md-3 required" for="title">Title</label>
                                <div class="col-md-6">
                                    <select name="title" id="title" class="select2">

                                        <option value="">(--)</option>
                                        <option value="Mr">Mr</option>
                                        <option value="Mrs">Mrs</option>
                                        <option value="Ms">Ms</option>
                                    </select>
                                    <span class="error-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 required" for="title">EPF No</label>
                                <div class="col-md-6">
                                    <input type="text" name="epf_no" id="epf_no" class="form-control" placeholder="EPF Number">
                                    <span class="error-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 required" for="first_name">First Name</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" id="first_name" name="first_name" value="" />
                                    <span class="error-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 required" for="last_name">Last Name</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" id="last_name" name="last_name" value="" />
                                    <span class="error-block"></span>
                                </div>
                            </div>
                            <!--                            <div class="form-group">-->
                            <!--                                <label class="control-label col-md-3 required" for="last_name">JOB TITLE</label>-->
                            <!--                                <div class="col-md-6">-->
                            <!--                                    <select class="form-control" name="role" id="role">-->
                            <!--                                        <option></option>-->
                            <!--                                    </select>-->
                            <!--                                    <span class="error-block"></span>-->
                            <!--                                </div>-->
                            <!--                            </div>-->
                            <div class="form-group">
                                <label class="control-label col-md-3 required" for="user_group">User Group</label>
                                <div class="col-md-6">
                                    <select name="user_group[]" id="user_group" class="form-control">
                                        <?php foreach($AllGroups as $group){ ?>
                                            <option value="<?php echo $group->id ?>"><?php echo $group->name ?></option>
                                        <?php } ?>
                                    </select>

                                    <span class="error-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 required" for="email">Email</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" id="email" name="email" value="" />
                                    <span class="error-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 required" for="username">User Name</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" id="username" name="username" value="" />
                                    <span class="error-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 required" for="password">Password</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="password" id="password" name="password" value="" />
                                    <span class="error-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 required" for="password_confirm">Confirm Password</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="password" id="password_confirm" name="password_confirm" value="" />
                                    <span class="error-block"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btn_save_user">Save</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    var tr_html='';
    var tr_html1='';

    $(document).ready(function() {
        $(".data_container").hide();
        $("#site_securities_container").fadeIn();

        $.ajax({
            url: "<?php echo site_url('index.php/systems/system_users/ajax_get_user_branch_matrix'); ?>",
            data: {
                "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
            },
            type: 'POST',
            dataType: 'JSON',
            async: false,
            beforeSend: function () {
                //$.LoadingOverlay("show");
            },
            complete: function () {
                // $.LoadingOverlay("hide");
            },
            success: function (data) {
                console.log(data);
                if (data.status) {

                    $.each(data.sys_users, function (key, sys_user) {

                            var u_id = sys_user.id;
                            var user_name = sys_user.username;
                            var ename = sys_user.name;
                            var email = sys_user.email;
                            tr_html +=
                                "<tr title='" + user_name + "'>" +
                                "<td style='text-align: center; width: 10px !important;'>" + (key) + "</td>" +
                                "<td style='text-align: left; width: 120px !important;'>" + sys_user.title + "</td>" +
                                "<td style='text-align: left; width: 120px !important;'>" + sys_user.epf_no + "</td>" +
                                "<td style='text-align: left; width: 120px !important;'>" + ename + "</td>" +
                                "<td style='text-align: left; width: 120px !important;'>" + user_name + "</td>" +
                                "<td style='text-align: left; width: 140px !important;'>" + email + "</td>"+
                                "<td style='text-align: left; width: 20px !important;'>" +
                                "<a class='btn-success' style='margin-left: 5px;'  title='User Permissions' onclick='user_permissions(" + u_id + ")'><i class='fa fa-gears'></i> Permissions</a>" +
                                " <a class='btn-success' style='margin-left: 5px;'  title='Edit User' onclick='edit_user(" + u_id + ")'>" +
                                "<i class='fa fa-edit'></i> Edit</a>"+
                                "</td>";

                            tr_html += "</tr>";

                    });
                    $("#table_user_branches").find('tbody').html(tr_html);
                }
                else {
                    bootbox.alert(data.message);
                }
            },
            error: function (jqXHR, textStatus, errorMessage) {
                bootbox.alert("Error retrieving data.");
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorMessage);
            }
        });
    });

</script>

<script>

    var save_method;
    var counter = 1;
    $(document).ready(function(){

        $("#btn_save_sys").off('click');
        $("#btn_save_sys").on('click', function(e){
            e.preventDefault();
            save_permissions();
        });

        $('.modal').on('hidden.bs.modal', function(){
            if ($('select.select2').data('select2')) {
                $('select.select2').select2('destroy');
            }
//        $(this).find('form')[0].reset();
            $('.select2').select2();
        });

        $("#sys_u_p_form :input").change(function(){
            $(this).siblings("span.error-block").html("").hide();
            $("span.help-inline").hide();
        });

        $('#sys_u_p_modal').on('hidden.bs.modal', function() {
            $("#sys_u_p_form :input").siblings("span.error-block").html("").hide();
            $("span.help-inline").hide();
        });

        $("#btn_save_ubs").off('click');
        $("#btn_save_ubs").on('click', function(e){
            e.preventDefault();
            save_user_stores();
        });
    });


    function user_permissions(sys_u_p_id)
    {
        var tr_html1 = "";

        $('#module_list').empty();
        $('#sys_u_p_form')[0].reset(); // reset form on modals`
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string
        var url = "<?php echo site_url('index.php/systems/system_users/ajax_get_system_permissions_details_by_id'); ?>";
        //document.getElementById(".row_dyn").remove();
        var sys_u_p_id = sys_u_p_id;
        $.ajax({
            url: url,
            data: {
                sys_u_p_id : sys_u_p_id,
                "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
            },
            type: 'post',
            dataType: 'json',
            success: function(data){

                if(data.status){

                    $('#sys_u_p_id').val(sys_u_p_id);
                    var counter = 1;
                    var tr_html = "<div class='col-md-3'><ul style='list-style:none;'>";
                    tr_html1 = "<div class='col-md-3'><ul style='list-style:none;'>";

                    for(var i=0; i<data.list_sections.length; i++) {
                        tr_html += "<li><span style='width: auto;background: #1b8de1;color: #fff;display: block;padding: 2px;'>" + data.list_sections[i].title + "</span></li>";
                        for(var j=0; j<data.list_modules.length; j++) {

                            if(data.list_modules[j].section===data.list_sections[i].id) {

                                if (counter == 11 || counter == 23 || counter == 35 || counter == 47 || counter == 59) {
                                    tr_html += "</ul></div><div class='col-md-3'><ul style='list-style:none;'>";
                                }

                                tr_html += "<li><label for='val_" + data.list_modules[j].id + "' style='width: auto'><input type='checkbox' value='" + data.list_modules[j].id + "' id='val_" + data.list_modules[j].id + "' name='userpermissions[" + counter + "]' style='padding: 5px;'> " + data.list_modules[j].name + "</label></li>";

                                counter++;
                            }

                        }
                    }


                    $('#module_list').append(tr_html);

                    $.each(data.sys_u_p_data, function(id,module_id)
                    {
                        if(module_id != "")
                        {
                            $('#val_'+ module_id).prop('checked', true);
                        }
                    });

                    tr_html1 += "<li><span style='width: auto;background: #1b8de1;color: #fff;display: block;padding: 2px;'>Add Button Permission</span></li>";
                    for(var j=0; j<data.list_buttons.length; j++) {

                        tr_html1 += "" +
                            "<li>" +
                            "<label for='button_" + data.list_buttons[j].id + "' style='width: auto'>" +
                            "<input type='checkbox' value='" + data.list_buttons[j].id + "' id='button_" + data.list_buttons[j].id + "' name='userbuttons[" + counter + "]' style='padding: 5px;'> " + data.list_buttons[j].description + "" +
                            "</label>" +
                            "</li>";
                        counter++;

                    }

                    $('#button_list').html(tr_html1);

                    $.each(data.sys_p_buttons, function(id,button)
                    {
                        if(button != "")
                        {
                            $('#button_'+ button).prop('checked', true);
                        }
                    });

                    $('#sys_u_p_modal .modal-title').text('User Permissions');
                    $('#sys_u_p_modal').modal({backdrop: 'static', keyboard: false});
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


    function save_permissions()
    {
        var is_valid = true;

        $("#gen_pass").html("");
        $("#sys_u_p_form :input").siblings("span.error-block").hide().html("");


        if(!is_valid){return false;}

        var url = "<?php echo site_url('index.php/systems/system_users/save_user_permissions'); ?>/";
        $.ajax({
            url: url,
            data: $("#sys_u_p_form").serialize(),
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
                    $('#sys_u_p_modal').modal('hide');
                }
                else
                {
                    if(data.error)
                    {
                        for (var l = 0; l < data.inputerror.length; l++)
                        {
                            $('[name="'+data.inputerror[l]+'"]').siblings("span.error-block").html(data.error_string[l]).show();
                        }
                    }
                }
            },
            error: function(jqXHR, textStatus, errorThrown ){
                bootbox.alert(textStatus + " : " + errorThrown);
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
            }
        });
    }

    //USER ADD
    $(document).ready(function(){
        $("#btn_save_user").off('click');
        $("#btn_save_user").on('click', function(e){
            e.preventDefault();
            save_user();
        });

        $("#user_form :input").change(function(){
            $(this).siblings("span.error-block").html("").hide();
            $("span.help-inline").hide();
        });

        $('#user_modal').on('hidden.bs.modal', function() {
            $("#user_form :input").siblings("span.error-block").html("").hide();
            $("span.help-inline").hide();
        });
    });

    function add_user()
    {
        save_method = 'add';
        $("#user_form")[0].reset();
        $("#username").parent().parent().show();
        $('#username').attr('readonly', false);
        $('#employee').attr('disabled', false);
        $("#userModalLabel").html('Add New User');
        //$("#user_modal").modal('show');
        $('#user_modal').modal({backdrop: 'static', keyboard: false});
    }


    function edit_user(sys_user_id)
    {
        save_method = 'update';
        $("#user_form")[0].reset();
        $("#username").parent().parent().show();
        var url = "<?php echo site_url('index.php/systems/system_users/ajax_get_system_user_data_by_id'); ?>";
        var sys_user_id = sys_user_id;
        $.ajax({
            url: url,
            data: {
                sys_user_id: sys_user_id,
                "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
            },
            type: 'post',
            dataType: 'json',
            success: function(data){
                if(data.status)
                {
                    if ($('select.select2').data('select2')) {
                        $('select.select2').select2('destroy');
                    }

                    $('#user_id').val(data.user_data.id);
                    $('#repid').val(data.user_data.repid);
                    $('#epf_no').val(data.user_data.epf_no);
                    $('#first_name').val(data.user_data.first_name);
                    $('#last_name').val(data.user_data.last_name);
                    $('#title').val(data.user_data.title);
                    $('#email').val(data.user_data.email);
                    $('#username').val(data.user_data.username);
                    $('#user_group').val(data.user_group);
                    $('#username').attr('readonly', true);
                    $('.select2').select2();
                    $("#userModalLabel").html('Edit User');
                    $('#user_modal').modal({backdrop: 'static', keyboard: false});
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

    function save_user()
    {
        var url = "<?php echo site_url('index.php/systems/system_users/save_user'); ?>/" + save_method;
        $.ajax({
            url: url,
            data: $("#user_form").serialize(),
            type: "POST",
            dataType: "JSON",
            cache: false,
            success: function(data){
                if(data.message)
                {
                    bootbox.alert(data.message);
                }
                if(data.status) {
                    $("#user_modal").modal('hide');
                    window.location.reload(true);
                } else {
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
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
            }
        });
    }

</script>
