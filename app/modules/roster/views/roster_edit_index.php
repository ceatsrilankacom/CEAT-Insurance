
<div class="row">
    <div class="col-md-12">
        <table border="0">
            <tr>
                <td><span style='color:#fff; background: #ffad33; padding: 2px; border-radius: 5px; display: block;padding:10px'></span></td>
                <td> - A Roster</td>
                <td>&nbsp;</td>
                <td><span style='color:#fff; background: #2ecc71; padding: 2px; border-radius: 5px; display: block;padding:10px'></span></td>
                <td> - B Roster</td>
                <td>&nbsp;</td>
                <td><span style='color:#fff; background: #1d8af7; padding: 2px; border-radius: 5px; display: block;padding:10px'></span></td>
                <td> - C Roster</td>
                <td>&nbsp;</td>
                <td><span style='color:#fff; background: #f73bf2; padding: 2px; border-radius: 5px; display: block;padding:10px'></span></td>
                <td> - D Roster</td>
                <td>&nbsp;</td>
                <td><span style='color:#fff; background: #f7202b; padding: 2px; border-radius: 5px; display: block;padding:10px'></span></td>
                <td> - Day Offs</td>
                <td>&nbsp;</td>
                <td><span style='color:#ffffff; background: #070a24; padding: 2px; border-radius: 5px; display: block;padding:10px'></span></td>
                <td> - Not Assigned</td>
                <td>&nbsp;</td>
                <td><span style='background: #ececb4; padding: 2px; border-radius: 5px; display: block;padding:10px'></span></td>
                <td> - Poya Day</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td style="width: 400px;text-align: right"><b style="font-weight:500">Press "S" Key to Save</b></td>
            </tr>
        </table>
    </div>
</div>
<div class="box-body box-bordered col-md-12" style="margin-left: 10px;margin-right: 10px;" id="barcode_div">
    <h6 style="text-align: center;margin-top: 10px;"><b>Bellagio Limited</b></h6>

    <div style="text-align: center;">
        Name : <b><?php echo $arrangements->name;?></b> | Description : <b><?php echo $arrangements->description; ?></b> | Month : <b><?php echo $arrangements->month; ?></b> | Department : <b><?php echo $arrangements->department_name; ?></b> | Designation : <b><?php echo $arrangements->designation_name; ?></b>
    </div>
    <div class="table-responsive col-md-12" style="overflow-x:auto;width: 90%">
        <form id="roster-form">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
            <table id="roster_table" border="2" class="table table-striped table-bordered table-hover table-header-fixed dt-responsive dataTable no-footer" cellspacing="0" width="100%" height="100%">
                <thead>
                <tr>
                    <th style="text-align: center;" rowspan="2">#</th>
                    <th style="text-align: center;" rowspan="2">GAMING NO</th>
                    <th style="text-align: center;" rowspan="2">NAME</th>
                    <th style="text-align: center;" rowspan="2">DESIGNATION</th>

                    <?php for($i=1;$i<=$day_counts;$i++){ ?>
                        <th style="text-align: center;">
                            <?php echo date("D",strtotime($arrangements->month.'-'.$i)); ?>
                        </th>
                    <?php } ?>
                    <th colspan="4" style="text-align: center">Rosters</th>
                    <th rowspan="2" style="text-align: center">Day Offs</th>
                    <th rowspan="2" style="text-align: center">Not Assigned</th>
                </tr>
                <tr>
                    <?php for($i=1;$i<=$day_counts;$i++){?>
                        <th style="text-align: center;">
                            <?php echo date("d",strtotime($arrangements->month.'-'.$i)); ?>
                        </th>
                    <?php } ?>
                    <th style="text-align: center">&nbsp;A&nbsp;</th>
                    <th style="text-align: center">&nbsp;B&nbsp;</th>
                    <th style="text-align: center">&nbsp;C&nbsp;</th>
                    <th style="text-align: center">&nbsp;D&nbsp;</th>
                </tr>
                </thead>
                <tbody class="context-menu-one">
                <?php
                $x=1;$EmpA=array();$EmpB=array();$EmpC=array();$EmpD=array();$EmpX=array();$EmpNO=array();
                foreach($rosters as $roster1){
                    ?>
                    <tr>
                        <td style="background-color:"><?php echo $x; ?></td>
                        <input type="hidden" value="<?php echo $arrangements->id; ?>" name="arrange_id">
                        <td><?php echo $roster1->employee_id; ?></td>
                        <td><?php echo $roster1->employee_name; ?></td>
                        <td><?php echo $arrangements->designation_name; ?></td>
                        <?php for($i=1;$i<=$day_counts;$i++){ $D='D'.$i; ?>
                            <td style="text-align: center;<?php if($poya_days[$i] == "POYA"){?>background-color:#ececb4;<?php } ?>" id="TD-<?php echo $roster1->employee."-".$i;?>">
                                <a href="javascript:;" onclick="openPopupMenu(<?php echo $roster1->employee; ?>,<?php echo $i; ?>,'<?php echo $arrangements->month; ?>')">
                                    <input type="hidden" value="<?php echo $roster1->$D; ?>" name="roster[<?php echo $roster1->employee; ?>][<?php echo $i; ?>]" id="roster-<?php echo $roster1->employee; ?>-<?php echo $i; ?>">
                                    <?php if($roster1->$D == "A"){ $EmpA[$roster1->employee] +=1;?>
                                        <span title="A Roster" style='color:#fff; background: #ffad33; padding: 2px; border-radius: 5px; display: block'>A</span>
                                    <?php }else if($roster1->$D == "B"){ $EmpB[$roster1->employee] +=1;?>
                                        <span title="B Roster" style='color:#fff; background: #2ecc71; padding: 2px; border-radius: 5px; display: block'>B</span>
                                    <?php }else if($roster1->$D == "C"){ $EmpC[$roster1->employee] +=1;?>
                                        <span title="C Roster" style='color:#fff; background: #1d8af7; padding: 2px; border-radius: 5px; display: block'>C</span>
                                    <?php }else if($roster1->$D == "D"){ $EmpD[$roster1->employee] +=1;?>
                                        <span title="D Roster" style='color:#fff; background: #f73bf2; padding: 2px; border-radius: 5px; display: block'>D</span>
                                    <?php }else if($roster1->$D == "X"){ $EmpX[$roster1->employee] +=1;?>
                                        <span title="Day Off" style='color:#fff; background: #f7202b; padding: 2px; border-radius: 5px; display: block'>X</span>
                                    <?php }else{ $EmpNO[$roster1->employee] +=1; ?>
                                        <span title="Not Assigned" style='color:#ffffff; background: #070a24; padding: 2px; border-radius: 5px; display: block'>NO</span>
                                    <?php } ?>
                                </a>
                            </td>
                        <?php } ?>
                        <td style="text-align:center"><?php echo $EmpA[$roster1->employee] ? $EmpA[$roster1->employee]:"-"; ?></td>
                        <td style="text-align:center"><?php echo $EmpB[$roster1->employee] ? $EmpB[$roster1->employee]:"-"; ?></td>
                        <td style="text-align:center"><?php echo $EmpC[$roster1->employee] ? $EmpC[$roster1->employee]:"-"; ?></td>
                        <td style="text-align:center"><?php echo $EmpD[$roster1->employee] ? $EmpD[$roster1->employee]:"-"; ?></td>
                        <td style="text-align:center"><?php echo $EmpX[$roster1->employee] ? $EmpX[$roster1->employee]:"-"; ?></td>
                        <td style="text-align:center"><?php echo $EmpNO[$roster1->employee] ? $EmpNO[$roster1->employee]:"-"; ?></td>
                    </tr>
                    <?php $x++; } ?>
                </tbody>
                <tbody>
                <tr style="border-top: #999 2px solid;">
                    <td style="text-align: center;" colspan="4">Day (Head Counts)</td>
                    <?php for($i=1;$i<=$day_counts;$i++){ ?>
                        <td style="text-align: center"><?php echo $Day[$i]; ?></td>
                    <?php } ?>
                    <td style="background:#ffff;border: 0px solid transparent">&nbsp;</td>
                    <td style="background:#ffff;border: 0px solid transparent">&nbsp;</td>
                    <td style="background:#ffff;border: 0px solid transparent">&nbsp;</td>
                    <td style="background:#ffff;border: 0px solid transparent">&nbsp;</td>
                    <td style="background:#ffff;border: 0px solid transparent">&nbsp;</td>
                    <td style="background:#ffff;border: 0px solid transparent">&nbsp;</td>
                </tr>
                <tr>
                    <td style="text-align: center;border-top: #999 2px solid;" colspan="4">Night (Head Counts)</td>
                    <?php for($i=1;$i<=$day_counts;$i++){ ?>
                        <td style="text-align: center;border-top: #999 2px solid;"><?php echo $Night[$i]; ?></td>
                    <?php } ?>
                    <td style="background:#ffff;border: 0px solid transparent">&nbsp;</td>
                    <td style="background:#ffff;border: 0px solid transparent">&nbsp;</td>
                    <td style="background:#ffff;border: 0px solid transparent">&nbsp;</td>
                    <td style="background:#ffff;border: 0px solid transparent">&nbsp;</td>
                    <td style="background:#ffff;border: 0px solid transparent">&nbsp;</td>
                    <td style="background:#ffff;border: 0px solid transparent">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="3" rowspan="4" style="text-align: center;border-top: #999 2px solid;">Rosters (Head Counts)</td>
                    <td style="text-align: center;border-top: #999 2px solid;">&nbsp;A&nbsp;</td>
                    <?php for($i=1;$i<=$day_counts;$i++){ ?>
                        <td style="text-align: center;text-align: center;border-top: #999 2px solid;"><?php echo $RA[$i]; ?></td>
                    <?php } ?>
                    <td style="background:#ffff;border: 0px solid transparent">&nbsp;</td>
                    <td style="background:#ffff;border: 0px solid transparent">&nbsp;</td>
                    <td style="background:#ffff;border: 0px solid transparent">&nbsp;</td>
                    <td style="background:#ffff;border: 0px solid transparent">&nbsp;</td>
                    <td style="background:#ffff;border: 0px solid transparent">&nbsp;</td>
                    <td style="background:#ffff;border: 0px solid transparent">&nbsp;</td>
                </tr>
                <tr>
                    <td style="text-align: center">&nbsp;B&nbsp;</td>
                    <?php for($i=1;$i<=$day_counts;$i++){ ?>
                        <td style="text-align: center;text-align: center"><?php echo $RB[$i]; ?></td>
                    <?php } ?>
                    <td style="background:#ffff;border: 0px solid transparent">&nbsp;</td>
                    <td style="background:#ffff;border: 0px solid transparent">&nbsp;</td>
                    <td style="background:#ffff;border: 0px solid transparent">&nbsp;</td>
                    <td style="background:#ffff;border: 0px solid transparent">&nbsp;</td>
                    <td style="background:#ffff;border: 0px solid transparent">&nbsp;</td>
                    <td style="background:#ffff;border: 0px solid transparent">&nbsp;</td>
                </tr>
                <tr>
                    <td style="text-align: center">&nbsp;C&nbsp;</td>
                    <?php for($i=1;$i<=$day_counts;$i++){ ?>
                        <td style="text-align: center;text-align: center"><?php echo $RC[$i]; ?></td>
                    <?php } ?>
                    <td style="background:#ffff;border: 0px solid transparent">&nbsp;</td>
                    <td style="background:#ffff;border: 0px solid transparent">&nbsp;</td>
                    <td style="background:#ffff;border: 0px solid transparent">&nbsp;</td>
                    <td style="background:#ffff;border: 0px solid transparent">&nbsp;</td>
                    <td style="background:#ffff;border: 0px solid transparent">&nbsp;</td>
                    <td style="background:#ffff;border: 0px solid transparent">&nbsp;</td>
                </tr>
                <tr>
                    <td style="text-align: center">&nbsp;D&nbsp;</td>
                    <?php for($i=1;$i<=$day_counts;$i++){ ?>
                        <td style="text-align: center;text-align: center"><?php echo $RD[$i]; ?></td>
                    <?php } ?>
                    <td style="background:#ffff;border: 0px solid transparent">&nbsp;</td>
                    <td style="background:#ffff;border: 0px solid transparent">&nbsp;</td>
                    <td style="background:#ffff;border: 0px solid transparent">&nbsp;</td>
                    <td style="background:#ffff;border: 0px solid transparent">&nbsp;</td>
                    <td style="background:#ffff;border: 0px solid transparent">&nbsp;</td>
                    <td style="background:#ffff;border: 0px solid transparent">&nbsp;</td>
                </tr>
                </tbody>
                <tbody>
                <tr>
                    <td style="text-align: center;border-top: #999 2px solid;" colspan="4">Day (%)</td>
                    <?php for($i=1;$i<=$day_counts;$i++){ ?>
                        <td style="text-align: center;border-top: #999 2px solid;"><?php echo number_format($PercentDay[$i],1,".",""); ?></td>
                    <?php } ?>
                    <td style="background:#ffff;border: 0px solid transparent">&nbsp;</td>
                    <td style="background:#ffff;border: 0px solid transparent">&nbsp;</td>
                    <td style="background:#ffff;border: 0px solid transparent">&nbsp;</td>
                    <td style="background:#ffff;border: 0px solid transparent">&nbsp;</td>
                    <td style="background:#ffff;border: 0px solid transparent">&nbsp;</td>
                    <td style="background:#ffff;border: 0px solid transparent">&nbsp;</td>
                </tr>
                <tr>
                    <td style="text-align: center;border-top: #999 2px solid;" colspan="4">Night (%)</td>
                    <?php for($i=1;$i<=$day_counts;$i++){ ?>
                        <td style="text-align: center;border-top: #999 2px solid;"><?php echo number_format($PercentNight[$i],1,".",""); ?></td>
                    <?php } ?>
                    <td style="background:#ffff;border: 0px solid transparent">&nbsp;</td>
                    <td style="background:#ffff;border: 0px solid transparent">&nbsp;</td>
                    <td style="background:#ffff;border: 0px solid transparent">&nbsp;</td>
                    <td style="background:#ffff;border: 0px solid transparent">&nbsp;</td>
                    <td style="background:#ffff;border: 0px solid transparent">&nbsp;</td>
                    <td style="background:#ffff;border: 0px solid transparent">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="3" rowspan="4" style="text-align: center;border-top: #999 2px solid;">Rosters (%)</td>
                    <td style="text-align: center;border-top: #999 2px solid;">&nbsp;A&nbsp;</td>
                    <?php for($i=1;$i<=$day_counts;$i++){ ?>
                        <td style="text-align: center;text-align: center;border-top: #999 2px solid;"><?php echo number_format($PercentA[$i],1,".",""); ?></td>
                    <?php } ?>
                    <td style="background:#ffff;border: 0px solid transparent">&nbsp;</td>
                    <td style="background:#ffff;border: 0px solid transparent">&nbsp;</td>
                    <td style="background:#ffff;border: 0px solid transparent">&nbsp;</td>
                    <td style="background:#ffff;border: 0px solid transparent">&nbsp;</td>
                    <td style="background:#ffff;border: 0px solid transparent">&nbsp;</td>
                    <td style="background:#ffff;border: 0px solid transparent">&nbsp;</td>
                </tr>
                <tr>
                    <td style="text-align: center">&nbsp;B&nbsp;</td>
                    <?php for($i=1;$i<=$day_counts;$i++){ ?>
                        <td style="text-align: center;text-align: center"><?php echo number_format($PercentB[$i],1,".",""); ?></td>
                    <?php } ?>
                    <td style="background:#ffff;border: 0px solid transparent">&nbsp;</td>
                    <td style="background:#ffff;border: 0px solid transparent">&nbsp;</td>
                    <td style="background:#ffff;border: 0px solid transparent">&nbsp;</td>
                    <td style="background:#ffff;border: 0px solid transparent">&nbsp;</td>
                    <td style="background:#ffff;border: 0px solid transparent">&nbsp;</td>
                    <td style="background:#ffff;border: 0px solid transparent">&nbsp;</td>
                </tr>
                <tr>
                    <td style="text-align: center">&nbsp;C&nbsp;</td>
                    <?php for($i=1;$i<=$day_counts;$i++){ ?>
                        <td style="text-align: center;text-align: center"><?php echo number_format($PercentC[$i],1,".",""); ?></td>
                    <?php } ?>
                    <td style="background:#ffff;border: 0px solid transparent">&nbsp;</td>
                    <td style="background:#ffff;border: 0px solid transparent">&nbsp;</td>
                    <td style="background:#ffff;border: 0px solid transparent">&nbsp;</td>
                    <td style="background:#ffff;border: 0px solid transparent">&nbsp;</td>
                    <td style="background:#ffff;border: 0px solid transparent">&nbsp;</td>
                    <td style="background:#ffff;border: 0px solid transparent">&nbsp;</td>
                </tr>
                <tr>
                    <td style="text-align: center">&nbsp;D&nbsp;</td>
                    <?php for($i=1;$i<=$day_counts;$i++){ ?>
                        <td style="text-align: center;text-align: center"><?php echo number_format($PercentD[$i],1,".",""); ?></td>
                    <?php } ?>
                    <td style="background:#ffff;border: 0px solid transparent">&nbsp;</td>
                    <td style="background:#ffff;border: 0px solid transparent">&nbsp;</td>
                    <td style="background:#ffff;border: 0px solid transparent">&nbsp;</td>
                    <td style="background:#ffff;border: 0px solid transparent">&nbsp;</td>
                    <td style="background:#ffff;border: 0px solid transparent">&nbsp;</td>
                    <td style="background:#ffff;border-top: 0px solid transparent">&nbsp;</td>
                </tr>
                </tbody>
            </table>
        </form>
    </div>
</div>

<input type="hidden" id="browser_status" value="0">



<div class="modal fade bs-example-modal-lg in" id="history_modal" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg"  style="min-width: 100px; max-width: 800px;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="udModalLabel">Roster History</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="vendor_form" class="form-horizontal" role="form">
                    <div class="row" style="margin-right:5px;margin-left: 5px;margin-top: 10px">
                        <h4  class="sub-head">Roster History</h4>
                        <div class="col-md-12 col-sm-12">
                            <table style="width:100%" class="st-lumi-table" cellspacing="2" cellpadding="5" border="0" id="view_roster">
                            </table>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer" style="margin-top: 20px;margin:5px">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-contextmenu/2.7.1/jquery.contextMenu.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-contextmenu/2.7.1/jquery.contextMenu.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-contextmenu/2.7.1/jquery.ui.position.js"></script>

<script>

    var employee;
    var click_day;
    var click_month;

    function openPopupMenu(emp_id,day,month){

        employee=0;
        click_day=0;
        click_month='';

        employee=emp_id;
        click_day=day;
        click_month=month;

        $.contextMenu({

            selector: '.context-menu-one',
            trigger: 'left',
            callback: function (key, options){

                $("#browser_status").val(1);

                if(key == "A"){
                    $("#TD-"+employee+"-"+click_day).html("" +
                        "<a href='javascript:;' onclick='openPopupMenu("+employee+","+click_day+","+click_month+")'>" +
                        "<span style='color:#fff; background: #ffad33; padding: 2px; border-radius: 5px; display: block'>A</span>" +
                        "<input type='hidden' value='"+key+"' name='roster["+employee+"]["+click_day+"]' id='roster-"+employee+"-"+click_day+"'>" +
                        "</a>");
                }
                else if(key == "B"){
                    $("#TD-"+employee+"-"+click_day).html("" +
                        "<a href='javascript:;' onclick='openPopupMenu("+employee+","+click_day+","+click_month+")'>" +
                        "<span style='color:#fff; background: #2ecc71; padding: 2px; border-radius: 5px; display: block'>B</span>" +
                        "<input type='hidden' value='"+key+"' name='roster["+employee+"]["+click_day+"]' id='roster-"+employee+"-"+click_day+"'>" +
                        "</a>");
                }
                else if(key == "C"){
                    $("#TD-"+employee+"-"+click_day).html("" +
                        "<a href='javascript:;' onclick='openPopupMenu("+employee+","+click_day+","+click_month+")'>" +
                        "<span style='color:#fff; background: #1d8af7; padding: 2px; border-radius: 5px; display: block'>C</span>" +
                        "<input type='hidden' value='"+key+"' name='roster["+employee+"]["+click_day+"]' id='roster-"+employee+"-"+click_day+"'>" +
                        "</a>");
                }
                else if(key == "D"){
                    $("#TD-"+employee+"-"+click_day).html("" +
                        "<a href='javascript:;' onclick='openPopupMenu("+employee+","+click_day+","+click_month+")'>" +
                        "<span style='color:#fff; background: #f73bf2; padding: 2px; border-radius: 5px; display: block'>D</span>" +
                        "<input type='hidden' value='"+key+"' name='roster["+employee+"]["+click_day+"]' id='roster-"+employee+"-"+click_day+"'>" +
                        "</a>");
                }
                else if(key == "X"){
                    $("#TD-"+employee+"-"+click_day).html("" +
                        "<a href='javascript:;' onclick='openPopupMenu("+employee+","+click_day+","+click_month+")'>" +
                        "<span style='color:#fff; background: #f7202b; padding: 2px; border-radius: 5px; display: block'>X</span>" +
                        "<input type='hidden' value='"+key+"' name='roster["+employee+"]["+click_day+"]' id='roster-"+employee+"-"+click_day+"'>" +
                        "</a>");
                }
                else if(key == "NO"){
                    $("#TD-"+employee+"-"+click_day).html("" +
                        "<a href='javascript:;' onclick='openPopupMenu("+employee+","+click_day+","+click_month+")'>" +
                        "<span style='color:#ffffff; background: #070a24; padding: 2px; border-radius: 5px; display: block'>NO</span>" +
                        "<input type='hidden' value='"+key+"' name='roster["+employee+"]["+click_day+"]' id='roster-"+employee+"-"+click_day+"'>" +
                        "</a>");
                }

                employee=0;
                click_day=0;
                click_month='';
            },
            items:{
                "A": {name: "A Roster", icon: "A"},
                "B": {name: "B Roster", icon: "B"},
                "C": {name: "C Roster", icon: "C"},
                "D": {name: "D Roster", icon: "D"},
                "X": {name: "Day Off", icon: "X"},
                "NO": {name: "NO Roster", icon: "NO"}
            }
        });

    }

    // $(function() {
    //     $( "#barcode_div span" ).draggable();
    //     $( "#barcode_div td" ).droppable();
    // });
</script>

<script src="<?php echo base_url(); ?>assets/js/jquery.floatThead.js"></script>
<!--<script type="text/javascript">-->
<!--    $(document).ready(function(){-->
<!---->
<!--        $('#roster_table').floatThead({-->
<!--            position: 'fixed'-->
<!--        });-->
<!--    });-->
<!--</script>-->

<!--Browser Save Function-->
<script>

    $(window).keypress(function(event) {

        if(!(event.which == 115 && event.ctrlKey) && !(event.which == 19)){
            return true;
            alert("Ctrl+S pressed");
        }
        else{
            return false;
        }

    });

</script>


<!--Browser Leave Function-->
<script>
    window.onbeforeunload=closeIt;


    function closeIt()
    {
        if($('#browser_status').val() == 1){
            return "";
        }
    }

</script>

<!--save-->
<script>
    document.addEventListener("keydown",function(event){

        //save function link to click listing for "S"
        if(event.which == 83){

            bootbox.confirm({
                title: "<h6>Save Arrangement</h6>",
                message: "" +
                "<b>Do you want save this arrangement ?</b>",
                buttons: {
                    cancel:{
                        label:'<i class="fa fa-times"></i> Cancel'
                    },
                    confirm:{
                        label:'<i class="fa fa-check"></i> Confirm'
                    }
                },
                callback: function (result){

                    if(result == true){

                        $('#loading_modal').modal({backdrop:'static',keyboard:false});

                        $.ajax({

                            url: "<?php echo base_url('roster/roster_con/change_roster'); ?>",
                            type: "POST",
                            dataType: "JSON",
                            data:$("#roster-form").serialize(),
                            success:function(data){

                                $("#browser_status").val(0);
                                $('#loading_modal').modal('hide');

                                if(data.status == true){
                                    window.location.reload();
                                }
                                else{
                                    bootbox.alert(data.message);
                                }

                            },
                            error: function(jqXHR, textStatus, errorThrown){
                                bootbox.alert(data.message);
                            }

                        });
                    }
                }
            });
        }

        if(event.which == 17 && event.which == 66){

            alert();
        }
    });

    $(document).keypress("b",function(e) {

        if(e.ctrlKey){
            $('#history_modal').modal({backdrop:'static',keyboard:false});
        }

    });
</script>










