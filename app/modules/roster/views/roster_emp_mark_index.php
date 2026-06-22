<?php
/**
 * Created by Earrow.
 * User:Kasun De Mel
 * Email:kasun@earrow.net
 * Date: 11/4/2019
 * Time: 9:33 AM
 */
?>

<style>
    .calendar-base {
        width: 90%;
        margin-left: 5%;
        height: 600px;
        border-radius: 20px;
        background-color: white;
        position: relative;
        z-index: 1;
        color: black;
    }

    .year{
        color: #6f6363;
        font-size: 20px;
        font-weight: bold;
    }

    .month-color {
        color: #27AE60;
    }

    .month-hover:hover{
        color:#27e879 !important;
    }

    .months {
        color: #AAAAAA;
        position: relative;
        left: 350px;
        top: 90px;
        word-spacing: 10px;
    }

    .month-line {
        border-color: #E8E8E8;
        position: relative;
        top: 85px;
        width: 57%;
        left: 178px;
    }

    .days {
        color: #1a3a5b;
        position: relative;
        font-size: 15px;
        text-align: center;
        font-weight: 600;
    }

    .num-dates {
        float: right;
        position: relative;
        top: 110px;
        z-index: 1;
    }

    .first-week {
        margin-bottom: 25px;
        word-spacing: 55px;
    }

    .second-week {
        margin-bottom: 25px;
        word-spacing: 53px;
    }

    .third-week {
        margin-bottom: 25px;
        word-spacing: 58px;
    }

    .fourth-week {
        margin-bottom: 25px;
        word-spacing: 58px;
    }

    .fifth-week {
        margin-bottom: 25px;
        word-spacing: 56px;
    }

    .sixth-week {
        margin-bottom: 25px;
        word-spacing: 55px;
    }

    .active-day {
        width: 35px;
        height: 35px;
        border-radius: 50%;
        background-color: #2ECC71;
        position: relative;
        top: 295px;
        left: 661px;
    }

    .white {
        color: white;
    }

    .event-indicator {
        width: 5px;
        height: 5px;
        border-radius: 50%;
        background-color: #2980B9;
        position: relative;
        top: 304px;
        left: 695px;
    }

    .two {
        position: relative;
        top: 168px;
        left: 535px;
    }

    .grey {
        color: #AAAAB1;
    }

    .calendar-left {
        width: 100%;
        height: 500px;
        border-radius: 20px 0px 0px 20px;
        background-color: #323c58;
        position: relative;
        z-index: 1;
        color: white;
    }

    .hamburger {
        position: relative;
        top: 25px;
        left: 25px;
        width: 25px;
    }

    .burger-line {
        width: 10%;
        height: 3px;
        background-color: white;
        border-radius: 15%;
        margin-bottom: 3px;
    }

    .num-date {
        font-size: 100px;
        text-align: center;
        margin: 0 auto;
        font-weight: 700;
    }

    .day {
        text-align: center;
        margin: 0px auto;
        font-size: 25px;
        position: relative;
        margin-top: 5px;
    }

    .current-events {
        font-size: 15px;
        position: relative;
        margin-left: 25px;
        bottom: 30px;
    }

    .posts {
        text-decoration: underline dotted;
    }
    .posts:hover{
        color:#27e879 !important;
    }

    .create-event {
        font-size: 18px;
        position: relative;
        margin-top: 30px;
        margin-left: 25px;
    }

    .event-line {
        width: 90%;
    }

    .add-event {
        width: 20px;
        height: 20px;
        padding: 0px;
        border-radius: 50%;
        border: solid white 2px;
        position: relative;
        bottom: 42px;
        left: 260px;
    }

    .add {
        font-size: 25px;
        position: relative;
        left: 4px;
        bottom: 10px;
    }

    .add:hover, .create-event:hover, .add-event:hover{
        color:#27e879 !important;
        border-color: #27e879 !important;
    }
    .day-margin{
        margin-left: -25%;
    }
    .text-info-hr{
        color: white;
    }
    .card{
        margin: 10px;
    }
    .text-muted{
        color: #ddf1ff !important;
    }
    .img-thumbnail {
        max-height: 150px !important;
        max-width: 150px !important;
    }
</style>

<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"></h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:;">Roster</a></li>
                <li class="breadcrumb-item active">Day Off Marking Sheet</li>
            </ol>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="element-wrapper">
            <div class="element-actions">
            </div>
            <div class="element-box">
                <!-- Nav tabs -->
                <div class="tab-content tabcontent-border" style="margin-top: 10px">

                    <div class="calendar-base">

                        <?php if(date('Y-m',strtotime($allocations->month)) !="1970-01"){ ?>
                            <table border="0" width="100%">
                                <tr>
                                    <td width="25%" height="40px" rowspan="8" style="">
                                        <div class="calendar-left">
                                            <div class="hamburger">
                                                <i class="fa fa-align-justify"></i>
                                            </div>
                                            <div id="profile_picture_preview" class="thumbnail" style="width: 150px;text-align: center;margin-left: 25%">
                                                <div id="profile_picture_div"></div>
                                                <img id="profile_picture" class="img-responsive img-thumbnail" style="width:150px;"/>
                                                <input type="hidden" id="stu_profile_picture_id" value="">
                                            </div>
                                            <div class="card">
                                                <div class="card-body">
                                                    <small class="text-muted">Employee ID</small>
                                                    <h6 id='emp_view_id' class="text-info-hr"></h6>
                                                    <small class="text-muted">EPF Number</small>
                                                    <h6 id='emp_view_epf_no' class="text-info-hr"></h6>
                                                    <small class="text-muted">Full Name</small>
                                                    <h6 id="emp_view_fullname" class="text-info-hr"></h6>
                                                    <small class="text-muted p-t-30 db">Birthday</small>
                                                    <h6 id="emp_view_birthday" class="text-info-hr"></h6>
                                                    <small class="text-muted p-t-30 db">Gender</small>
                                                    <h6 id="emp_view_gender" class="text-info-hr"></h6>
                                                    <small class="text-muted p-t-30 db">NIC Number</small>
                                                    <h6 id="emp_view_nic_num" class="text-info-hr"></h6>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td width="75%" colspan="10" style="border: 3px solid white;background-color: #92d2ff;box-shadow: 5px 5px 10px #92d2ff;">
                                        <table border="0" width="100%">
                                            <tr>
                                                <td style="text-align: center">DEPARTMENT&nbsp;</td>
                                                <td>&nbsp;<b><?php echo strtoupper($allocations->department_name); ?></b></td>
                                                <td style="text-align: right">DESIGNATION&nbsp;</td>
                                                <td>&nbsp;<b><?php echo strtoupper($allocations->designation_name); ?></b></td>
                                                <td style="text-align: right">MONTH&nbsp;</td>
                                                <td>&nbsp;<b><?php echo date('Y-M',strtotime($allocations->month)); ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="6">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: left" colspan="2">
                                                    &nbsp;&nbsp;<a title="Poya Day" href="javascript:;" style="width: 10px;height: 10px;border-radius: 50%;background-color: #e1db1c;position: relative;color: #f71423;padding: 5px">&nbsp;&nbsp;&nbsp;&nbsp;</a> - Poya Day/s
                                                    &nbsp;&nbsp;<a title="Day Off" href="javascript:;" style="width: 10px;height: 10px;border-radius: 50%;background-color: #f71618;position: relative;color: #ffffff;padding: 5px;display: inline">&nbsp;&nbsp;&nbsp;&nbsp;</a> - Day Offs
                                                </td>
                                                <td colspan="4">
                                                    <span class="label label-sm label-info">Day Off Entitlement</span>
                                                    <span id="entitlement"></span>
                                                    <span  class="label label-sm label-success">Day Off  Taken</span>
                                                    <span id="taken"></span>
                                                    <span  class="label label-sm label-danger">Day Off Balance</span>
                                                    <span id="balance"></span>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td style="text-align: center;width: 100px;height: 100px">
                                        <a href="javascript:;" onclick="view_day_night()" class="label label-sm label-success" style="height: 40px;padding: 10px 10px;"><i class="fa fa-cog"></i></a>
                                    </td>
                                </tr>
                                <tr style="background-color: #deedff;">
                                    <td width="2%"></td>
                                    <td width="8%" style="text-align: center"><span class="days">WEEKS</span></td>
                                    <td width="8%" style="text-align: center;"><span class="days" style="color: red">SUN</span></td>
                                    <td width="8%" style="text-align: center"><span class="days">MON</span></td>
                                    <td width="8%" style="text-align: center"><span class="days">TUE</span></td>
                                    <td width="8%" style="text-align: center"><span class="days">WED</span></td>
                                    <td width="8%" style="text-align: center"><span class="days">THU</span></td>
                                    <td width="8%" style="text-align: center"><span class="days">FRI</span></td>
                                    <td width="8%" style="text-align: center"><span class="days">SAT</span></td>
                                    <td width="3%"></td>
                                </tr>
                                <?php for($i=1;$i<=$weekNumber;$i++){ ?>
                                    <tr style="background-color: #deedff;">
                                        <td>&nbsp;</td>
                                        <td style="text-align: center">
                                            <?php if($i == 1){ ?>
                                                <span class="days"><?php echo '0'.$i; ?><sup>st</sup></span>
                                            <?php }else if($i == 2){ ?>
                                                <span class="days"><?php echo '0'.$i; ?><sup>nd</sup></span>
                                            <?php }else if($i == 3){ ?>
                                                <span class="days"><?php echo '0'.$i; ?><sup>rd</sup></span>
                                            <?php }else{ ?>
                                                <span class="days"><?php echo '0'.$i; ?><sup>th</sup></span>
                                            <?php } ?>
                                        </td>
                                        <?php for($j=1;$j<=7;$j++){ ?>
                                            <td style="text-align: center" id="TD<?php echo $allocations->id."".ltrim($weeks[$i][$j],"0");?>">
                                                <?php if($weeks[$i][$j]){ $day="D".ltrim($weeks[$i][$j],"0"); ?>
                                                    <?php if($poya_days[$weeks[$i][$j]] == "POYA"){
                                                        if($allocations->$day == "X"){ ?>
                                                            <a class="context-menu-one" title="Poya Day" href="javascript:;" style="width: 50px;height: 50px;border-radius: 50%;background-color: #e16a35;position: relative;color: #ffffff;padding: 20px;border:1px solid red" onclick="openPopupMenu(<?php echo $allocations->id; ?>,<?php echo $weeks[$i][$j]; ?>,'<?php echo $allocations->month; ?>')"><?php echo $weeks[$i][$j]; ?></a>
                                                        <?php }else{ ?>
                                                            <a class="context-menu-one" title="Poya Day" href="javascript:;" style="width: 50px;height: 50px;border-radius: 50%;background-color: #e1db1c;position: relative;color: #f71423;padding: 20px" onclick="openPopupMenu(<?php echo $allocations->id; ?>,<?php echo $weeks[$i][$j]; ?>,'<?php echo $allocations->month; ?>')"><?php echo $weeks[$i][$j]; ?></a>
                                                        <?php } ?>
                                                    <?php }else{
                                                        if($allocations->$day == "X"){?>
                                                            <a class="context-menu-one" href="javascript:;" style="width: 50px;height: 50px;border-radius: 50%;background-color: #f71618;position: relative;color: #ffffff;padding: 20px;border:1px solid #f71b14" onclick="openPopupMenu(<?php echo $allocations->id; ?>,<?php echo $weeks[$i][$j]; ?>,'<?php echo $allocations->month; ?>')"><?php echo $weeks[$i][$j]; ?></a>
                                                        <?php }else{ ?>
                                                            <a class="context-menu-one" href="javascript:;" onclick="openPopupMenu(<?php echo $allocations->id; ?>,<?php echo $weeks[$i][$j]; ?>,'<?php echo $allocations->month; ?>')" style="color:<?php if($j == 1){ echo 'red'; }?>;"><?php echo $weeks[$i][$j]; ?></a>
                                                        <?php } ?>
                                                    <?php } ?>
                                                <?php } ?>
                                            </td>
                                        <?php } ?>
                                        <td>&nbsp;</td>
                                    </tr>
                                <?php } ?>
                            </table>
                        <?php }else{ ?>
                            <div style="text-align: center;margin-top: 15%">
                                <a href="javascript:;" style="height: 50px;border-radius: 50%;background-color: #f71b14;position: relative;color: #ffffff;padding: 20px;border:1px solid red" >Month is Locked</a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Bootstrap modal -->
<div class="modal fade" id="day_night_modal" role="dialog">
    <div class="modal-dialog modal-full" style="max-width: 500px;text-align: center;margin-top: 10%">
        <div class="modal-content">
            <div class="modal-header bg-blue-steel bg-font-blue-steel" style="background: #ffffff">
                <h6 id="employee_modal_title"></h6>
            </div>
            <div class="modal-body form" style="background: #ffffff">
                <form action="#" id="day_night_form" class="form-horizontal">
                    <input type="hidden" name="allocation_id" value="<?php echo $allocations->id; ?>">
                    <div class="row">
                        <div class="col-md-12 table-responsive" style="overflow-x:auto;">
                            <table class="tool" id="tools" style="width: 100%;position: static; visibility: visible;" border="0">
                                <thead>
                                <tr>
                                    <th colspan="2" style="text-align: center;border: 1px #ffff solid;">
                                        <b><?php echo date('Y-M',strtotime($allocations->month)); ?> Month </b>
                                    </th>
                                </tr>
                                <tr>
                                    <th style="border: 1px #ffff solid;"><b>First Half Month</b></th>
                                    <th style="border: 1px #ffff solid;"><b>Second Half Month</b></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td style="border: 1px #ffff solid;">
                                        <select class="form-control" id="half1" name="half1">
                                            <option value=""></option>
                                            <option value="Day" <?php if($allocations->first_half == "Day"){echo "selected"; }?>>Day</option>
                                            <option value="Night" <?php if($allocations->first_half == "Night"){echo "selected"; }?>>Night</option>
                                        </select>
                                    </td>
                                    <td style="border: 1px #ffff solid;">
                                        <select class="form-control" id="half2" name="half2">
                                            <option value=""></option>
                                            <option value="Day" <?php if($allocations->second_half == "Day"){echo "selected"; }?>>Day</option>
                                            <option value="Night" <?php if($allocations->second_half == "Night"){echo "selected"; }?>>Night</option>
                                        </select>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="saveEmpBtn" onclick="update_day_night()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-contextmenu/2.7.1/jquery.contextMenu.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-contextmenu/2.7.1/jquery.contextMenu.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-contextmenu/2.7.1/jquery.ui.position.js"></script>

<script>

    $(document).ready(function () {
        check_entitlement('<?php echo $allocations->month; ?>');
    });

    var val_ref_id=0;
    var val_click_day=0;
    var val_month=0;

    function openPopupMenu(ref_id,click_day,month){

        val_ref_id=0;
        val_click_day=0;

        val_ref_id=ref_id;
        val_click_day=click_day;
        val_month="'"+month+"'";

        $.contextMenu({

            selector: '.context-menu-one',
            trigger: 'left',
            callback: function (key, options){

                $.ajax({

                    url: "<?php echo base_url('roster/roster_emp_mark_con/change_roster'); ?>",
                    type: "POST",
                    dataType: "JSON",
                    data:{
                        ref_id:val_ref_id,
                        day:val_click_day,
                        roster:key,
                        "month":month,
                        '<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>'
                    },
                    success:function(data){

                        if(data.status == true){

                            if(data.roster == "X"){

                                if(val_click_day< 10){
                                    $("#TD"+val_ref_id+""+val_click_day).html('' +
                                        '<a class="context-menu-one" title="Day Off" onclick="openPopupMenu('+val_ref_id+','+val_click_day+','+val_month+')" href="javascript:;" style="width: 50px;height: 50px;border-radius: 50%;background-color: #f71618;position: relative;color: #ffffff;padding: 20px">0'+val_click_day+'</a>');
                                }
                                else{
                                    $("#TD"+val_ref_id+""+val_click_day).html('' +
                                        '<a class="context-menu-one" title="Day Off" onclick="openPopupMenu('+val_ref_id+','+val_click_day+','+val_month+')" href="javascript:;" style="width: 50px;height: 50px;border-radius: 50%;background-color: #f71618;position: relative;color: #ffffff;padding: 20px">'+val_click_day+'</a>');
                                }
                            }
                            else if(data.roster == "NO"){

                                if(val_click_day< 10){
                                    $("#TD"+val_ref_id+""+val_click_day).html('' +
                                        '<a class="context-menu-one" href="javascript:;" onclick="openPopupMenu('+val_ref_id+','+val_click_day+','+val_month+')">0'+val_click_day+'</a>');
                                }
                                else{
                                    $("#TD"+val_ref_id+""+val_click_day).html('' +
                                        '<a class="context-menu-one" href="javascript:;" onclick="openPopupMenu('+val_ref_id+','+val_click_day+','+val_month+')">'+val_click_day+'</a>');
                                }

                            }
                        }
                        else{
                            bootbox.alert(data.message);
                        }
                        //update entitlement
                        check_entitlement(val_month);
                    },
                    error: function(jqXHR, textStatus, errorThrown){
                        bootbox.alert(data.message);
                    }

                });
            },
            items:{
                "X": {name: "Day Off", icon: "edit"},
                "NO": {name: "Remove Day Off", icon: "delete"}
            }

        });
    }

</script>

<script>

    //session id for get user image
    var id=<?php echo USER_ID; ?>;

    $('#profile_picture').attr("src","<?php echo base_url('uploads/employee_photos/noprofile-pic.jpg')?>");

    $.ajax({
        url : "<?php echo base_url('systems/employee_list/ajax_get_emp_info')?>/" + id,
        type: "POST",
        "data": {
            "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
        },
        dataType: "JSON",
        success: function(data)
        {
            $.ajax({
                url:"<?php echo site_url('systems/employee_list/image_available')?>",
                dataType:"JSON",
                type:"POST",
                data:{
                    id:id,
                    "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
                },
                success:function(data){

                    var d = new Date();
                    var n = d.getTime();

                    if(data.photo)
                    {
                        $('#profile_picture').attr("src","<?php echo base_url('uploads/employee_photos'); ?>" + "/" + data.photo + "?" + n);
                    }
                    else
                    {
                        $('#profile_picture').attr("src","<?php echo base_url('uploads/employee_photos/noprofile-pic.jpg')?>");
                    }
                },
                error:function(){
                    $('#profile_picture').attr('src', '');
                    console.log("error retrieve image");
                }
            });

            $('#emp_view_id').html(data.emp_info.employee_id);
            $('#emp_view_epf_no').html(data.emp_info.epf_no);
            $('#emp_view_fullname').html(data.emp_info.full_name);
            $('#emp_view_name').html(data.emp_info.initials+" "+data.emp_info.last_name);
            $('#emp_view_birthday').html(data.emp_info.birthday);
            $('#emp_view_gender').html(data.emp_info.gender);
            $('#emp_view_nic_num').html(data.emp_info.nic_num);

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            console.log('Error retrieve data from ajax');
        }

    });


    function check_entitlement(month){

        $.ajax({

            url:"<?php echo site_url('roster/roster_emp_mark_con/check_entitlement')?>",
            dataType:"JSON",
            type:"POST",
            data:{
                "month":month,
                "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
            },
            success:function(data){

                if(data.status==true){

                    $("#entitlement").html(data.entitle);
                    $("#taken").html(data.taken);
                    $("#balance").html(data.balance);
                }

            },
            error:function(){
                $('#profile_picture').attr('src', '');
                console.log("error retrieve image");
            }
        });

    }


    function view_day_night(){

        $('#day_night_modal').modal({backdrop:'static',keyboard:false});
    }

    $('#half1').change(function(){

        if($(this).val() == "Day"){
            $('#half2').val("Night");
        }
        else if($(this).val() == "Night"){
            $('#half2').val("Day");
        }
        else{
            $('#half2').val("");
        }
    });

    $('#half2').change(function(){

        if($(this).val() == "Day"){
            $('#half1').val("Night");
        }
        else if($(this).val() == "Night"){
            $('#half1').val("Day");
        }
        else{
            $('#half1').val("");
        }
    });

    function update_day_night(){

        $.ajax({

            url: "<?php echo base_url('roster/roster_emp_mark_con/request_day_night'); ?>",
            type: "POST",
            dataType: "JSON",
            data: $("#day_night_form").serialize()+'&<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>',
            success:function(data){

                if(data.status == true){
                    bootbox.alert(data.message);
                    $("#day_night_modal").modal('hide');
                }
                else if(data.status == false){
                    bootbox.alert("<b style='color: red'>"+data.message+"</b>");
                }
            },
            error: function(jqXHR, textStatus, errorThrown){
                bootbox.alert("<b style='color: red'>"+data.message+"</b>");
            }

        });

    }
</script>