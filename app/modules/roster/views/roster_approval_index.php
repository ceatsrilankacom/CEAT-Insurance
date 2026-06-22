<?php
/**
 * Created by Earrow.
 * User:Kasun De Mel
 * Email:kasun@earrow.net
 * Date: 12/2/2019
 * Time: 9:37 AM
 */
?>

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

    /*#RosterInfo_filter{*/
    /*display: none;*/
    /*}*/

</style>

<style>
    .label-primary {
        background-color: #000000;
    }
    .label-info {
        background-color: #ff6f32;
    }
    .label-danger {
        background-color: #ff150c;
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
                <li class="breadcrumb-item active">Roster Approval</li>
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
                <h4 class="page-head-title card-title  text-white" style="display: inline-block"> Roster Approval</h4>
            </div>
            <div class="element-box">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item"><a class="nav-link active" role="tab" href="#summary" data-toggle="tab"> Approval</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content tabcontent-border">
                    <div class="tab-pane p-20 active" role="tabpanel" id="summary">
                        <div class="element-box">
                            <form id="search_form" class="form-material">
                                <div class="row">
                                    <div class="col-md-10">
                                        <table style="width: 100%;position: static; visibility: visible;" border="0">
                                            <tbody>
                                            <tr style="margin-top: 5px;">
                                                <td>&nbsp;Month</td>
                                                <td>
                                                    <select name="search_month" id="search_month" class="select2">
                                                        <option value="">(---)</option>
                                                    </select>
                                                </td>
                                                <td>&nbsp;Roster</td>
                                                <td>
                                                    <select name="search_roster" id="search_roster" class="select2">
                                                        <option value="">(---)</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <button type="button" onclick="filter_roster()" class="btn btn-success pull-left" style="margin-right: 5px;"><i class="fa fa-filter"></i> Search</button>&nbsp;
                                                </td>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr style="margin-top: 5px;">
                                                <td colspan="7"><span class="label label-primary"></span> - Pending &nbsp; <span class="label label-success"></span> - Lock &nbsp; <span class="label label-danger"></span> - Locked &nbsp; <span class="label label-info"></span> - Unlock</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                            </form>
                        </div>
                        <table id="load_table" width="75%" class="table2excel table2excel_with_colors">

                        </table>
                    </div>

                    <script type="text/javascript">

                        var save_method;
                        var RosterInfo;

                        $(document).ready(function(){

                            $(".date-pick").datepicker({
                                format:"yyyy-mm",
                                startView:"months",
                                minViewMode: "months",
                                autoclose:true
                            });

                            $('.error-block').empty();

                            $('#search_form')[0].reset();

                            //call month type function
                            $.ajax({
                                url:"<?php echo base_url(); ?>roster/roster_approval_con/get_rosters_month",
                                type:"POST",
                                dataType:"JSON",
                                data:{
                                    "<?php echo $this->security->get_csrf_token_name(); ?>":"<?php echo $this->security->get_csrf_hash(); ?>"
                                },
                                success:function(data){

                                    if(data.month){

                                        $('#search_month').html('<option value="">--Select Month--</option>');
                                        for(var i=0;i<data.month.length;i++){
                                            $('#search_month').append('<option value="'+data.month[i].month+'">'+data.month[i].month+'</option>');
                                        }

                                    }

                                    $('#search_month').select2();

                                },
                                error:function(){

                                }
                            });

                        });

                    </script>

                    <script>

                        $("#search_month").change(function(){

                            $.ajax({

                                url:"<?php echo base_url(); ?>roster/roster_approval_con/get_rosters/"+$(this).val(),
                                type:"POST",
                                dataType:"JSON",
                                data:{
                                    "<?php echo $this->security->get_csrf_token_name(); ?>":"<?php echo $this->security->get_csrf_hash(); ?>"
                                },
                                success:function(data){

                                    if(data.roster){

                                        $('#search_roster').html('<option value="">--Select Roster--</option>');
                                        for(var i=0;i<data.roster.length;i++){
                                            $('#search_roster').append('<option value="'+data.roster[i].id+'">'+data.roster[i].name+' - '+data.roster[i].description+'</option>');
                                        }

                                    }

                                    $('#search_roster').select2();
                                },
                                error:function(){

                                }
                            });
                        });

                        function filter_roster(){

                            $.ajax({

                                url:"<?php echo base_url(); ?>roster/roster_approval_con/get_filter_rosters",
                                dataType:"HTML",
                                type:"POST",
                                data:$('#search_form').serialize()+"&<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>",
                                success:function(data){

                                    if(data == "Please Select Month"){

                                        bootbox.alert({
                                            message: "<b style='text-align:center;color: red'>Please Select Month</b>"
                                        });
                                    }
                                    else{
                                        $('#load_table').html(data);
                                    }

                                },
                                error:function(){

                                    bootbox.alert({
                                        message: "<b style='text-align:center;color: red'>"+data.message+"</b>"
                                    });

                                }

                            });

                        }
                    </script>


                    <script>

                        //excel
                        function excel_generator() {

                            window.open('data:application/vnd.ms-excel,' + encodeURIComponent($('table[id$=load_table]').html()));
                            e.preventDefault();

                        }

                        //word
                        function word_generator() {

                            window.open('data:application/msword,' + encodeURIComponent($('table[id$=load_table]').html()));
                            e.preventDefault();
                        }

                        // print
                        function PrintDiv(){

                            var divToPrint = document.getElementById('load_table');
                            var popupWin = window.open('', '_blank', 'width=800,height=1000');
                            popupWin.document.open();
                            popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
                            popupWin.document.close();
                        }

                        //preview
                        function PrintPreview() {

                            var toPrint = document.getElementById('load_table');
                            var popupWin = window.open('', '_blank', 'width=1000,height=800,location=no,left=500px');
                            popupWin.document.open();
                            popupWin.document.write('<html><head><title>::Print Preview::</title>' +
                                '<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/default_print.css'); ?>" media="screen"/></head><body>')
                            popupWin.document.write(toPrint.innerHTML);
                            popupWin.document.write('</html>');
                            popupWin.document.close();

                        }

                    </script>


