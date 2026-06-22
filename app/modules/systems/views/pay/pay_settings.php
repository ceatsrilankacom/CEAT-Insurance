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
    .table td {
        font-size: 14px !important;
    }
    .textcomplete-dropdown {
        z-index: 999999999!important;
    }
</style>
<script src="<?php echo base_url(); ?>assets/js/jquery.textcomplete.min.js"></script>

<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Pay Formula Management</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Payroll Management</a></li>
                <li class="breadcrumb-item active">Pay Formulas</li>
            </ol>
            <button class="btn btn-info d-none d-lg-block m-l-15"  onclick="add_pay()" id="add_btn"><i class="fa fa-plus-circle"></i> Add New Formula</button>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"></h4>
                <h6 class="card-subtitle"></h6>
                <div class="tools"> </div>
                <table id="pay_data" class="fresh-table  table table-bordered table-hover order-column" cellspacing="0" style="width:100% !important;">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>SHORTCODE</th>
                        <th class="w200" width="180px">Formula</th>
                        <th width="40px">Order</th>
                        <th class="w2"></th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    foreach ($get_groups as $groups){ ?>

                        <tr><td colspan="10"><b style="background: #3e4660;color: #fff;display: block;padding: 5px;"><?php echo $groups->code ?></b></td></tr>

                        <?php foreach($pay_data as $paydata){
                            if($groups->id==$paydata->group){

                                $string = $paydata->code;
                                $code = str_replace('$','', $string);

                                $string = $paydata->code;
                                $code = str_replace('$','', $string);


                                $str_for = $paydata->formula;

                                $new_str1 = str_replace('$','{', $str_for);
                                $formula = str_replace(' ','}', $new_str1);

                                ?>
                                <tr>
                                    <td><?php echo $paydata->id; ?></td>
                                    <td><?php echo $paydata->name; ?></td>
                                    <td><?php echo $code; ?></td>
                                    <td width="300px"><?php echo $formula; ?></td>
                                    <td><?php echo $paydata->order; ?></td>
                                    <td style="width: 200px;text-align: center;">
                                        <a class="btn-success" title="EDIT" onclick="edit_pay(<?php echo $paydata->id; ?>)">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </td>
                                </tr>

                            <?php }
                        }
                    }?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bs-example-modal-lg in" id="pay_modal" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg"  style="min-width: 400px; max-width: 800px;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="payModalLabel"></h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="pay_form" class="form-horizontal" role="form">
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                    <input type="hidden" name="pay_id" id="pay_id" value="" />

                            <div class="Insert" style=" background-color:white;">
                                <div class="row">
                                    <div class="col-md-12">

                                        <table  class="df">
                                            <tbody>
                                            <tr>
                                                <th>Shortcode</th>
                                                <td><input name="code" id="code" size="10" maxlength="20" value=""
                                                           type="text" >
                                                    <span class="error-block" style="font-size: 9px; color: #ff0015"></span>
                                                </td>
                                                <th>Name</th>
                                                <td><input name="name" id="name" size="30" maxlength="200" value=""
                                                           type="text"><span class="error-block" style="font-size: 9px; color: #ff0015"></span>
                                                </td>
                                                <th>Description</th>
                                                <td><input name="description" id="description" size="30" maxlength="200"
                                                           value="" type="text"></td>
                                            </tr>
                                            <tr>
                                                <th>Order</th>
                                                <td><input name="order" id="order" size="10" maxlength="10" value=""
                                                           type="text">
                                                </td>
                                                <th>Group</th>
                                                <td>
                                                    <select name="group" id="group" style="\&quot;max-width:200px;\&quot;">
                                                        <option></option>

                                                        <?php foreach ($get_groups as $groups){ ?>

                                                            <option value="<?php echo $groups->id ?>"><?php echo $groups->code ?></option>
                                                        <?php } ?>

                                                    </select>
                                                </td>
                                                <th>Decoration</th>
                                                <td>
                                                    <select name="decoration" id="decoration"
                                                            style="\&quot;max-width:200px;\&quot;">
                                                        <option value="Normal">Normal</option>
                                                        <option value="Total_1">Total 1</option>
                                                        <option value="Total_2">Total 2</option>
                                                        <option value="Hidden">Hidden</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th><label style="display: block;
background: #b6934e;
color: #fff;
padding: 2px 5px !important;
width: 100%; margin-top: 5px;">Category</label></th>
                                                <td colspan="5">
                                                    <select name="categories[]" id="categories" class="form-control type select2" multiple>
                                                        <option value="">...</option>
                                                        <?php foreach ($EmpCategories as $EmpCategory):?>
                                                            <option value="<?php echo $EmpCategory->id;?>"><?php echo $EmpCategory->desc;?></option>
                                                        <?php endforeach?>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th><label style="display: block;
background: #b6934e;
color: #fff;
padding: 2px 5px !important;
width: 100%; margin-top: 5px;">Hide From</label></th>
                                                <td colspan="5">
                                                    <label style="width:100px; display:inline"><input name="hide_summary" id="hide_summary"  value="4096" type="checkbox"> Branch Summary</label>
                                                    <label style="width:100px; display:inline"><input name="hide_slips" id="hide_slips" value="8192" type="checkbox"> Executives Slips</label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th><label style="display: block;
background: #b6934e;
color: #fff;
padding: 2px 5px !important;
width: 100%; margin-top: 5px;">Formula</label></th>
                                                <td colspan="5">
                                                    <p style="font-size: 10px; padding: 0 !important; margin: 0 !important;"> Usable Tags - IF {} () * - + =   </p>
                                                    <textarea cols="30" name="formula" id="formula"></textarea>
                                                </td>
                                            </tr>

                                        </table>
                                    </div>
                                </div>

                            </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btn_save_pay">Save</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>

    var save_method;
    var counter = 1;
    $(document).ready(function(){


        $("#btn_save_pay").off('click');
        $("#btn_save_pay").on('click', function(e){
            e.preventDefault();
            save_pay(save_method);
        });

        $('.modal').on('hidden.bs.modal', function(){
            if ($('select.select2').data('select2')) {
                $('select.select2').select2('destroy');
            }
            $(this).find('form')[0].reset();
            $('.select2').select2();
        });

        $("#pay_form :input").change(function(){
            $(this).siblings("span.error-block").html("").hide();
            $("span.help-inline").hide();
        });

        $('#pay_modal').on('hidden.bs.modal', function() {
            $("#pay_form :input").siblings("span.error-block").html("").hide();
            $("span.help-inline").hide();
        });

        $('.modal').on('hidden.bs.modal', function(){
            if ($('select.select2').data('select2')) {
                $('select.select2').select2('destroy');
            }
            $(this).find('form')[0].reset();
            $('.select2').select2({dropdownParent: $("#pay_modal")});
        });

        $('select.select2').select2();

    });

    function add_pay()
    {
        save_method = 'add';
        //get_required_fields(true); // pass true to make password fields required
        $('#pay_form')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string
        $('#pay_modal').modal({backdrop: 'static', keyboard: false}); // show bootstrap modal
        //$('#emp_form_modal').modal({backdrop: 'static', keyboard: false});
        $('#pay_modal .modal-title').text('Add Pay'); // Set Title to Bootstrap modal title
    }



    function edit_pay(pay_id)
    {
        save_method = 'edit';

        $('#pay_form')[0].reset(); // reset form on modals`
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string
        var url = "<?php echo site_url('systems/payroll_settings/ajax_get_pay_details_by_id'); ?>";
        //document.getElementById(".row_dyn").remove();
        var pay_id = pay_id;
        $.ajax({
            url: url,
            data: {
                pay_id : pay_id,
                "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
            },
            type: 'post',
            dataType: 'json',
            success: function(data){
                //console.log(data);
                //console.log(data.ud_data);
                if(data.status)
                {

                    if ($('select.select2').data('select2')) {
                        $('select.select2').select2('destroy');
                    }

                    var code = data.pay_data.code;
                    var res = code.replace('$'," ");
                    var res3 = res.replace(/ /g,'');

                    var form = data.pay_data.formula;
                    var res1 =  form.replace(/\$/g,'{');
                    var res2 = res1.replace(/ /g,'}');

                    $('#pay_id').val(data.pay_data.id);
                    $('#code').val(res3);
                    $('#name').val(data.pay_data.name);
                    $('#description').val(data.pay_data.description);
                    $('#order').val(data.pay_data.order);
                    $('#group').val(data.pay_data.group);
                    $('#formula').val(res2);
                    $('#decoration').val(data.pay_data.decoration);
                    $('#categories').val(data.pay_cat_data);

                    if(data.pay_data.v_staff == 1)
                    {
                        $('#v_staff').prop('checked', true);
                    }

                    if(data.pay_data.hide_b_summary == 1)
                    {
                        $('#hide_b_summary').prop('checked', true);
                    }

                    if(data.pay_data.hide_ex_slips == 1)
                    {
                        $('#hide_ex_slips').prop('checked', true);
                    }

                    $('.select2').select2({dropdownParent: $("#pay_modal")});

                    //console.log(data.u_types);
                    //$("#udModalLabel").html('Edit Group');
                    $('#pay_modal .modal-title').text('Edit Pay');
                    $('#pay_modal').modal('show');
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


    function save_pay(save_method)
    {
        var is_valid = true;

        $("#gen_pass").html("");
        $("#pay_form :input").siblings("span.error-block").hide().html("");

        if(save_method == "add")
        {
             /*if($("#name").val().length == 0)
             {
             is_valid = false;
             $("#name").siblings("span.error-block").show().html("Group Name cannot be empty!");
             }
             else
             {
             $("#name").siblings("span.error-block").hide().html("");
             }*/

             var regexp = /^[a-zA-Z0-9_]+$/;
             if ($("#code").val().search(regexp) == -1)
             {
             is_valid = false;
             $("#code").siblings("span.error-block").show().html("Shortcode must be Alphanumeric!");
             }
             else
             {
             $("#code").siblings("span.error-block").hide().html("");
             }


            if(!is_valid){return false;}

            var url = "<?php echo site_url('systems/payroll_settings/save_new_pay'); ?>/";
            $.ajax({
                url: url,
                data: $("#pay_form").serialize(),
                type: "POST",
                dataType: "JSON",
                cache: false,
                success: function(data){
                    if(data.message)
                    {
                        $('#pay_modal').modal('hide');
                        if(data.message)
                        {
                            bootbox.alert(data.message);
                            window.location="<?php echo base_url('systems/payroll_settings')?>";
                        }
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
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);
                }
            });

        }else if(save_method == "edit"){


            /*if($("#name").val().length == 0)
             {
             is_valid = false;
             $("#name").siblings("span.error-block").show().html("Group Name cannot be empty!");
             }
             else
             {
             $("#name").siblings("span.error-block").hide().html("");
             }*/

            var regexp = /^[a-zA-Z0-9_]+$/;
            if ($("#code").val().search(regexp) == -1)
            {
                is_valid = false;
                $("#code").siblings("span.error-block").show().html("Shortcode must be Alphanumeric!");
            }
            else
            {
                $("#code").siblings("span.error-block").hide().html("");
            }


            if(!is_valid){return false;}

            var url = "<?php echo site_url('systems/payroll_settings/edit_new_pay'); ?>/";
            $.ajax({
                url: url,
                data: $("#pay_form").serialize(),
                type: "POST",
                dataType: "JSON",
                cache: false,
                success: function(data){

                    $('#pay_modal').modal('hide');
                    if(data.message)
                    {
                        bootbox.alert(data.message);
                        window.location="<?php echo base_url('systems/payroll_settings')?>";
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
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);
                }
            });

        }


    }

    $(document).ready(function() {
        var elements = [
            <?php
            foreach($pay_data as $pdata){
                $new_str1 = str_replace('$','', $pdata->code);
                echo "'".$new_str1."',";
            }
            ?>
        ];
        $('#formula').textcomplete([
            { // html
                //match: /\b(\w{2,})$/,
                match: /{(\w*)$/,
                search: function (term, callback) {
                    callback($.map(elements, function (element) {
                        return element.indexOf(term) === 0 ? element : null;
                    }));
                },
                index: 1,
                replace: function (element) {
                    return '{' + element + '}';
                }
            }
        ]);
    });
</script>