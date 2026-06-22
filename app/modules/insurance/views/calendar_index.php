<?php
/**
 * Created by PhpStorm.
 * User: kasun.demel
 * Date: 1/25/2021
 * Time: 11:24 AM
 */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<head>
<title>CEAT SALES - Itinerary Calendar</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>

<style>
    label {
        width: 500px !important;
    }
</style>

<style>
    .embedded-daterangepicker .daterangepicker::before,

    .embedded-daterangepicker .daterangepicker::after {
        display: none;
    }

    .embedded-daterangepicker .daterangepicker {
        position: relative !important;
        top: auto !important;
        left: auto !important;
        float: left;
        width: 100%;
        margin-top: 0;
    }

    .embedded-daterangepicker .daterangepicker .drp-calendar{
        width: 48% !important;
        max-width: 50%;
    }

    .select2-container .select2-selection--single {
        width: 315px !important;
        height: 35px !important;
    }

    .modal-body {
        max-height: calc(200vh - 250px);
        overflow-y: auto;
    }

    #myImg {
        border-radius: 5px;
        cursor: pointer;<b style="text-align: center;font-size: 3mm !important;margin-top: -5mm !important;"><?php echo $qr->qr_code; ?></b>
    transition: 0.3s;
    }

    #myImg:hover {opacity: 0.7;}

    /* The Modal (background) */
    #myModal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        padding-top: 100px; /* Location of the box */
        left: -100px;
        top: 0;
        width: 1600px; /* Full width */
        height: 800px; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
    }

    /* Modal Content (image) */
    #myModal .modal-content {
        margin: auto;
        display: block;
        width: 100%;
        max-width: 1200px;
    }

    /* Caption of Modal Image */
    #myModal #caption {
        margin: auto;
        display: block;
        width: 100%;
        max-width: 900px;
        text-align: center;
        color: #ccc;
        padding: 10px 0;
        height: 150px;
    }

    /* Add Animation */
    #myModal .modal-content, #caption {
        -webkit-animation-name: zoom;
        -webkit-animation-duration: 0.6s;
        animation-name: zoom;
        animation-duration: 0.6s;
    }

    @-webkit-keyframes zoom {
        from {-webkit-transform:scale(0)}
        to {-webkit-transform:scale(1)}
    }

    @keyframes zoom {
        from {transform:scale(0)}
        to {transform:scale(1)}
    }

    /* The Close Button */
    #myModal .close {
        position: absolute;
        top: 15px;
        right: 35px;
        color: #f1f1f1;
        font-size: 40px;
        font-weight: bold;
        transition: 0.3s;
    }

    #myModal .close:hover,
    .close:focus {
        color: #bbb;
        text-decoration: none;
        cursor: pointer;
    }

    /* 100% Image Width on Smaller Screens */
    @media only screen and (max-width: 1200px){
        .modal-content {
            width: 100%;
        }
    }

    .btn-success {
        color: #fff;
        background-color: #4b7aeb;
        border-color: #4b7aeb;
    }
</style>


<div class="modal fade bs-example-modal-lg in" id="edit_modal" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg"  style="width:100%; min-width: 1400px; max-width: 1500px;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="sysModalLabel">Dealers Info</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="calendar_form" class="form-horizontal" role="form">
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                    <input type="hidden" name="rep" id="rep" value="" />
                    <input type="hidden" name="date" id="date" value="" />

                    <div class="Insert" style=" background-color:white; display: block; float: none;">
                        <div id="module_list" class="row">

                        </div>
                        <div>
                            <ul>
                                <div class='col-md-3'>
                                    <li>
                                        <label>Remarks</label><textarea cols="3" id="more_details" name="more_details" width="200px" style="width: 300px !important;"></textarea>
                                    </li>
                                </div>
                            </ul>
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


<script>
    $(document).ready(function(){

        var calendar = $('#calendar').fullCalendar({
            editable:true,
            header:{
                left:'prev,next today',
                center:'title',
                right: ''
            },
            events:{
                url:"<?php echo base_url(); ?>index.php/itinerary/sales_itinerary_calendar/load",
                data:{
                    rep_id: <?php echo $rep_id; ?>
                }
            },
            selectable:true,
            selectHelper:true,
            select:function(start, end, allDay)
            {

                var current_date = $.fullCalendar.formatDate(start, "Y-MM-DD");

                $('#module_list').html('');
                $.ajax({

                    url: "<?php echo base_url('index.php/insurance/sales_itinerary_calendar/get_itinerary_info/'.$rep_id); ?>",
                    type: "POST",
                    dataType: "JSON",
                    data:{
                        "start_date":current_date,
                        '<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>'
                    },
                    success:function(data){

                        if(data.status)
                        {
                            $('#rep').val(<?php echo $rep_id; ?>);
                            $('#date').val(current_date);
                            var counter = 1;
                            var tr_html = "<div class='col-md-3'><ul style='list-style:none;'>";


                            for(var j=0; j<data.dealers.length; j++){

                                if(counter == 15 || counter == 30 || counter == 45 || counter == 60 || counter == 75) {
                                    tr_html += "</ul></div><div class='col-md-3'><ul style='list-style:none;'>";
                                }

                                tr_html += "<li><label for='val_" + data.dealers[j].zsDelCode + "' style='width: auto'><input type='checkbox' value='" + data.dealers[j].zsDelCode + "~"+ data.dealers[j].zsAddress3 +"~"+ data.dealers[j].zsName +"' id='val_" + data.dealers[j].zsDelCode + "' name='dealers[" + counter + "]' style='padding: 5px;'> " + data.dealers[j].zsDelCode + "-"+data.dealers[j].zsName+"</label></li>";
                                counter++;

                            }

                            if(data.more_details){
                                $("#more_details").val(data.more_details);
                            }
                            else{
                                $("#more_details").val("");
                            }


                            $('#module_list').append(tr_html);

                            $.each(data.selected_dealers, function(id,module_id)
                            {
                                if(module_id != "")
                                {
                                    $('#val_'+ module_id).prop('checked', true);
                                }
                            });

                            $("#sysModalLabel").html('Edit Dealers For '+current_date);
                            $('#edit_modal').modal({backdrop: 'static', keyboard: false});
                        }
                        else
                        {
                            bootbox.alert(data.message);
                        }

                        var title = '';
                        if(title)
                        {
                            var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                            var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
                            $.ajax({
                                url:"<?php echo base_url(); ?>index.php/itinerary/sales_itinerary_calendar/insert",
                                type:"POST",
                                data:{title:title, start:start, end:end},
                                success:function()
                                {
                                    calendar.fullCalendar('refetchEvents');
                                    bootbox.alert("Added Successfully");
                                }
                            })
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown){

                        console.log(jqXHR);
                        console.log(textStatus);
                        console.log(errorThrown);
                    }

                });

            },
            editable:true,
            eventResize:function(event)
            {
                var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                var title = event.title;
                var id = event.id;

                $.ajax({
                    url:"<?php echo base_url(); ?>index.php/itinerary/sales_itinerary_calendar/update",
                    type:"POST",
                    data:{
                        title:title,
                        start:start,
                        end:end,
                        id:id,
                        "<?php echo $this->security->get_csrf_token_name(); ?>":"<?php echo $this->security->get_csrf_hash(); ?>"
                    },
                    success:function()
                    {
                        calendar.fullCalendar('refresh Events');
                        bootbox.alert("Update");
                    }
                })
            },
            eventDrop:function(event)
            {

                var date = event.start._d.getFullYear()+"-"+(event.start._d.getMonth()+1)+"-"+event.start._d.getDate();
                var id=event.id;

                $.ajax({
                    url:"<?php echo base_url(); ?>index.php/itinerary/sales_itinerary_calendar/update",
                    type:"POST",
                    dataType:"JSON",
                    data:{
                        date:date,
                        id:id,
                        "<?php echo $this->security->get_csrf_token_name(); ?>":"<?php echo $this->security->get_csrf_hash(); ?>"
                    },
                    success:function(data)
                    {
                        if(data.status==true){
                            bootbox.alert("Itinerary Plan Updated");
                        }
                        else{
                            bootbox.alert(data.message);
                        }
                        calendar.fullCalendar('refetchEvents');
                    }
                })
            },
            eventClick:function(event)
            {
                if(confirm("Do you want to delete this dealer?"))
                {
                    var id = event.id;
                    $.ajax({
                        url:"<?php echo base_url(); ?>index.php/itinerary/sales_itinerary_calendar/delete",
                        type:"POST",
                        data:{
                            id:id,
                            "<?php echo $this->security->get_csrf_token_name(); ?>":"<?php echo $this->security->get_csrf_hash(); ?>"
                        },
                        success:function()
                        {
                            calendar.fullCalendar('refetchEvents');
                            bootbox.alert('Successfully Removed');
                        }
                    })
                }
            }
        });

        $("#btn_save_sys").on('click',function(){

            $.ajax({

                url: "<?php echo base_url('index.php/insurance/sales_itinerary_calendar/save'); ?>",
                type: "POST",
                dataType: "JSON",
                data:$("#calendar_form").serialize()+"&<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>",
                success:function(data){
                    if(data.status == true){
                        $("#edit_modal").modal("hide");
                        calendar.fullCalendar('refetchEvents');
                        bootbox.alert('Successfully Added !');
                    }
                },
                error: function(jqXHR, textStatus, errorThrown){

                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);
                }

            });
        });
    });

</script>
</head>
<style>
    label{
        font-size: 10px !important;
    }
    .fc-event, .fc-event-dot {
        background-color: #2a6f47 !important;
    }

    .fc-event:hover, .fc-event-dot:hover{
        background-color: #1577ff !important;
    }

    .fc-event {
        position: relative;
        display: block;
        font-size: .85em;
        line-height: 1.3;
        border-radius: 5px;
        border: 1px solid #2a6f4766666;
        font-weight: normal;
    }
    .content-w {
        background: #fffff !important;
    }
</style>
<body>
<br />
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="element-wrapper">
                <div class="element-actions">
                </div>
                <div class="card-header bg-info page-head-title-wrap">
                    <h4 class="page-head-title card-title  text-white" style="display: inline-block"> Sales Itinerary - <?php echo $epf_no." - ".$month; ?></h4>
                    <button type="button" onclick="PrintDiv()" class="btn btn-danger pull-right" style="margin-left: 10px;"><i class="fa fa-print"></i> Print</button>&nbsp;
                    <button type="button" onclick="approve_itinerary(<?php echo $rep_id; ?>,'<?php echo $month; ?>')" class="btn btn-primary pull-right" style="margin-left: 20px;"><div id="approve_status_title"><?php echo $itinerary_status->itinerary_status; ?></div></button>&nbsp;
                    <button id="edit_btn" type="button" onclick="edit_itinerary(<?php echo $rep_id; ?>)" class="btn btn-success pull-right" style="margin-right: -10px;"><div id="edit"><i class="fa fa-pencil"></i> Edit</div></button>&nbsp;
                </div>
            </div>
        </div>
    </div>
    <div id="calendar"></div>
</div>

<div class="modal fade bs-example-modal-lg in" id="approve_modal" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-full" style="max-width: 500px;max-height: 200px">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="udModalLabel"></h6>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body" style="max-height:200px !important;">
                <form id="approve_itinerary_form" class="form-horizontal">
                    <input type="hidden" name="approve_id" id="approve_id" value="<?php echo $approve_id; ?>">
                    <input type="hidden" name="user_type" id="user_type" value="<?php echo $user_type; ?>">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group row">
                                    <label class="control-label col-md-6" for="itinerary" style='text-align: right;color:black;'><b>Select Status</b></label>
                                    <div class="col-md-6">
                                        <select name="approve_status" id="approve_status" class="form-control noSelect2">
                                            <?php foreach($approve_status as $approve1){ ?>
                                                <?php if($approve1->name == $itinerary_status->itinerary_status){ ?>
                                                    <option value="<?php echo $approve1->name; ?>" selected><?php echo $approve1->name; ?></option>
                                                <?php }else{ ?>
                                                    <option value="<?php echo $approve1->name; ?>"><?php echo $approve1->name; ?></option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer" style="margin-top: 20px;margin:5px">
                <button type="button" onclick="approve_save()" class="btn btn-primary">Edit</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<script>

    $(document).ready(function() {

        $("#approve_itinerary_form")[0].reset();

        var rep_id=<?php echo $rep_id; ?>;
        var rep_month='<?php echo $month; ?>';

    });

    function approve_itinerary(rep_id,rep_month){

        $('#approve_modal .modal-title').text("Approval Itinerary "+rep_id+" - "+rep_month);
        $('#approve_modal').modal({backdrop:'static',keyboard:false});
    }

    function edit_itinerary(){

        $.ajax({

            url: "<?php echo base_url('index.php/insurance/sales_itinerary/edit_enable_itinerary'); ?>",
            type: "POST",
            dataType: "JSON",
            data:{
                '<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>'
            },
            success:function(data){
                if(data.status == true){
                    bootbox.alert("Edit Mode Enabled !");
                    window.location.reload();
                }
            },
            error: function(jqXHR, textStatus, errorThrown){

                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
            }

        });
    }

    function edit_disable_itinerary(){

        $.ajax({

            url: "<?php echo base_url('index.php/insurance/sales_itinerary/edit_disable_itinerary'); ?>",
            type: "POST",
            dataType: "JSON",
            data:{
                '<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>'
            },
            success:function(data){
                if(data.status == true){
                    bootbox.alert("Edit Mode Disabled !");
//                    window.location.reload();
                }
            },
            error: function(jqXHR, textStatus, errorThrown){

                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
            }

        });
    }

    function approve_save(){

        var url="<?php echo base_url('index.php/insurance/sales_itinerary/approve_save'); ?>";

        var formData = new FormData();
        formData.append("<?php echo $this->security->get_csrf_token_name(); ?>", "<?php echo $this->security->get_csrf_hash(); ?>");
        var basic_data = $("#approve_itinerary_form").serializeArray();
        $.each(basic_data,function(key,input){

            formData.append(input.name,input.value);

        });

        // ajax adding data to database
        $.ajax({

            url : url,
            type: "POST",
            data: formData,
            dataType: "JSON",
            contentType: false,
            cache: false,
            processData: false,
            success: function(data)
            {

                if(data.status == true){

                    bootbox.dialog({
                        message: data.message,
                        title: "Success !",
                        buttons: {
                            danger: {
                                label: "OK",
                                className: "btn-primary",
                                callback: function() {
                                    window.location.reload();
                                    $("#backButton").click();
                                }
                            }
                        }
                    });
                }
                else{

                    bootbox.dialog({
                        message: data.message,
                        title: "Sorry!",
                        buttons: {
                            danger: {
                                label: "Close",
                                className: "btn-danger",
                                callback: function() {
                                    $("#backButton").click();
                                }
                            }
                        }
                    });
                }
                $('#approve_modal').modal('hide');
            },
            error:function(){
                window.location.reload();

            }

        });
    }

    //get master work flow status



    function PrintDiv() {
        var divToPrint = document.getElementById('calendar');
        var popupWin = window.open('', '_blank', 'width=800,height=1000');
        popupWin.document.open();
        popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
    }

</script>
</body>
</html>



