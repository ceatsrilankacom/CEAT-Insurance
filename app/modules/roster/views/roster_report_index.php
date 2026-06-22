<?php
/**
 * Created by Earrow.
 * User:Kasun De Mel
 * Email:kasun@earrow.net
 * Date: 11/29/2019
 * Time: 11:47 AM
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

<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"></h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:;">Roster</a></li>
                <li class="breadcrumb-item active">Roster Report</li>
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
                <h4 class="page-head-title card-title  text-white" style="display: inline-block"> Roster Report</h4>
            </div>
            <div class="element-box">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item"><a class="nav-link active" role="tab" href="#summary" data-toggle="tab"> Absent Summary</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content tabcontent-border">
                    <div class="tab-pane p-20 active" role="tabpanel" id="summary">
                        <div class="element-box">
                            <form id="search_form" class="form-material">
                                <div class="row">
                                    <div class="col-md-10">

                                        <table class="tool" id="tools" style="width: 100%;position: static; visibility: visible;" border="0">
                                            <tbody>
                                            <tr>
                                                <td>&nbsp;Roster</td>
                                                <td>
                                                    <select name="search_roster" id="search_roster" class="select2">
                                                        <option value="">(---)</option>
                                                    </select>
                                                </td>
                                                <td>&nbsp;Employee</td>
                                                <td>
                                                    <select name="search_employee" id="search_employee" class="select2">
                                                        <option value="">(---)</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <button type="button" onclick="filter_roster()" class="btn btn-success pull-left" style="margin-right: -10px;"><i class="fa fa-filter"></i> Search</button>&nbsp;
                                                </td>
                                                <td>&nbsp;</td>
                                                <td>
                                                    <h6>Reference</h6>
                                                    <span class="label label-success">AB</span> - Absent <br>
                                                    <span class="label label-info">LE</span> - Leave<br><br>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-md-2">
                                        <a href="javascript:;" class="btn-sm btn-primary" style="color:black;border-color:transparent;background-color: #fff !important;" onClick="javascript:PrintPreview();"><i class="fa fa-search"></i></a>
                                        <a href="javascript:;" class="btn-sm btn-primary" style="color:black;border-color:transparent;background-color: #fff !important;" onClick="javascript:PrintDiv();"><i class="fa fa-print"></i></a>
                                        <a href="javascript:;" class="btn-sm btn-primary exportToExcel" style="color:black;border-color:transparent;background-color: #fff !important;" id="myButtonControlID"><i class="fa fa-file-excel-o"></i></a>
                                        <a href="javascript:;" class="btn-sm btn-primary" style="color:black;border-color:transparent;background-color: #fff !important;" onClick="javascript:word_generator();"><i class="fa fa-file-word-o"></i></a>
                                    </div>
                            </form>
                        </div>
                        <table id="load_table" width="100%" class="table2excel table2excel_with_colors">

                        </table>
                    </div>

                    <script type="text/javascript">

                        var save_method;
                        var RosterInfo;

                        $(document).ready(function(){

                            $('.error-block').empty();

                            $('#search_form')[0].reset();

                            //call department type function
                            $.ajax({
                                url:"<?php echo base_url(); ?>roster/roster_con/get_rosters",
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

                    </script>

                    <script>

                        function get_sub_departments(id){

                            $.ajax({

                                url: "<?php echo base_url('roster/roster_con/get_sub_department'); ?>/"+id,
                                type: "POST",
                                dataType: "JSON",
                                data:{
                                    "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
                                },
                                success:function(data){

                                    $('#sub_department').html('<option value=" ">--Select Department--</option>');
                                    for(var i=0;i<data.sub_department.length;i++){
                                        $('#sub_department').append('<option value="'+data.sub_department[i].id+'">'+data.sub_department[i].code+' - '+data.sub_department[i].desc+'</option>');
                                    }
                                },
                                error: function (jqXHR, textStatus, errorThrown) {

                                    console.log(jqXHR);
                                    console.log(textStatus);
                                    console.log(errorThrown);
                                }
                            });
                        }

                        function get_master(){

                            $.ajax({

                                url: "<?php echo base_url('roster/roster_con/get_master'); ?>",
                                type: "POST",
                                dataType: "JSON",
                                data:{
                                    "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
                                },
                                success:function(data){

                                    $('#department').html('<option value=" ">--Select Department--</option>');
                                    for(var i=0;i<data.department.length;i++){
                                        $('#department').append('<option value="'+data.department[i].id+'">'+data.department[i].code+' - '+data.department[i].desc+'</option>');
                                    }

                                    $('#designation').html('<option value=" ">--Select Designation--</option>');
                                    for(var i=0;i<data.department.length;i++){
                                        $('#designation').append('<option value="'+data.designation[i].id+'">'+data.designation[i].code+' - '+data.designation[i].desc+'</option>');
                                    }

                                    $('#roster_allocation').html('<option value=" ">--Select Roster--</option>');
                                    for(var i=0;i<data.roster.length;i++){
                                        $('#roster_allocation').append('<option value="'+data.roster[i].id+'">'+data.roster[i].name+' - '+data.roster[i].description+'</option>');
                                    }

                                },
                                error: function (jqXHR, textStatus, errorThrown) {

                                    console.log(jqXHR);
                                    console.log(textStatus);
                                    console.log(errorThrown);
                                }
                            });
                        }

                        //get sub departments according to the selected department
                        $('#department').change(function(){

                            get_sub_departments($(this).val());

                        });

                    </script>

                    <script>

                        $('#search_roster').change(function(){

                            $.ajax({

                                url:"<?php echo base_url(); ?>roster/roster_con/get_roster_employees/"+$(this).val(),
                                type:"POST",
                                dataType:"JSON",
                                data:{
                                    "<?php echo $this->security->get_csrf_token_name(); ?>":"<?php echo $this->security->get_csrf_hash(); ?>"
                                },
                                success:function(data){

                                    if(data.emp_roster){

                                        $('#search_employee').html('<option value="">--Select Employee--</option>');
                                        for(var i=0;i<data.emp_roster.length;i++){
                                            $('#search_employee').append('<option value="'+data.emp_roster[i].employee+'">'+data.emp_roster[i].employee_id+' - '+data.emp_roster[i].employee_name+'</option>');
                                        }

                                    }
                                },
                                error:function(){

                                }
                            });
                        });

                        function filter_roster(){

                            $.ajax({

                                url:"<?php echo base_url(); ?>roster/roster_con/get_absent_summary",
                                dataType:"HTML",
                                type:"POST",
                                data:$('#search_form').serialize()+"&<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>",
                                success:function(data){

                                    $('#load_table').html(data);
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

