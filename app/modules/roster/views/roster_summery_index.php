<?php

/**
 * Created by Earrow.
 * User:Kasun De Mel
 * Email:kasun@earrow.net
 * Date: 11/13/2019
 * Time: 12:23 PM
 */

?>

<div class="row">
    <div class="box-body box-bordered col-md-12" style="margin-left: 10px;margin-right: 10px;margin-bottom: 10px">
        <h6 style="text-align: center;margin-top: 10px;"><b>Bellagio Limited | Roster Summery</b></h6>

        <div style="text-align:center;" class="col-md-12">
            Name : <b><?php echo $arrangements->name;?></b> | Description : <b><?php echo $arrangements->description; ?></b> | Month : <b><?php echo $arrangements->month; ?></b> | Department : <b><?php echo $arrangements->department_name; ?></b> | Designation : <b><?php echo $arrangements->designation_name; ?></b>
        </div>
    </div>
    <div class="table-responsive col-md-12" style="overflow-x:auto;width: 800px">
        <table border="2" class="table table-striped table-bordered table-hover no-footer" cellspacing="0" width="100%" style="border-collapse: collapse;">
            <thead>
            <tr>
                <th style="text-align:center;" rowspan="2">ROSTER</th>
                <?php for($i=1;$i<=$day_counts;$i++){ ?>
                    <th style="text-align: center;border-right:2px solid #999" colspan="2">
                        <?php echo date("D",strtotime($arrangements->month.'-'.$i)); ?>
                    </th>
                <?php } ?>
            </tr>
            <tr>
                <?php for($i=1;$i<=$day_counts;$i++){?>
                    <th style="text-align: center;border-right:2px solid #999" colspan="2">
                        <?php echo date("d",strtotime($arrangements->month.'-'.$i)); ?>
                    </th>
                <?php } ?>
            </tr>
            </thead>
            <tbody class="context-menu-one" style="border-left: #999 2px solid;">
            <tr>
                <td style="text-align: center;">All Employees</td>
                <?php for($i=1;$i<=$day_counts;$i++){ ?>
                    <td style="border-right: #999 2px solid;text-align: center" colspan="2"><?php echo $All[$i]; ?></td>
                <?php } ?>
            </tr>
            <tr>
                <td style="text-align: center;">Day Offs</td>
                <?php for($i=1;$i<=$day_counts;$i++){ ?>
                    <td style="border-right: #999 2px solid;text-align: center" colspan="2"><?php echo $RX[$i]; ?></td>
                <?php } ?>
            </tr>
            <tr>
                <td style="text-align: center;">Assigned</td>
                <?php for($i=1;$i<=$day_counts;$i++){ ?>
                    <td style="border-right: #999 2px solid;text-align: center" colspan="2"><?php echo $Assigned[$i]; ?></td>
                <?php } ?>
            </tr>
            <tr>
                <td style="text-align: center;">Pending</td>
                <?php for($i=1;$i<=$day_counts;$i++){ ?>
                    <td style="border-right: #999 2px solid;text-align: center" colspan="2"><?php echo $NO[$i]; ?></td>
                <?php } ?>
            </tr>
            </tbody>
            <thead>
            <tr style="border-top: #999 2px solid;">
                <th style="text-align: center;">&nbsp;</th>
                <?php for($i=1;$i<=$day_counts;$i++){ ?>
                    <th style="text-align: center">COUNT</th>
                    <th style="text-align: center">PER</th>
                <?php } ?>
            </tr>
            </thead>
            <tbody style="border-left: #999 2px solid;">
            <tr style="border-top: #999 2px solid;">
                <td style="text-align: center;">Day</td>
                <?php for($i=1;$i<=$day_counts;$i++){ ?>
                    <td style="text-align: center"><?php echo $Day[$i]; ?></td>
                    <td style="border-right: #999 2px solid;text-align: center" width="50%"><?php echo number_format($PercentDay[$i],1,".",""); ?></td>
                <?php } ?>
            </tr>
            <tr style="border-top: #999 2px solid;">
                <td style="text-align: center;">A</td>
                <?php for($i=1;$i<=$day_counts;$i++){ ?>
                    <td style="text-align: center;text-align: center" width="50%"><?php echo $RA[$i]; ?></td>
                    <td style="border-right: #999 2px solid;text-align: center" width="50%"><?php echo number_format($PercentA[$i],1,".",""); ?></td>
                <?php } ?>
            </tr>
            <tr>
                <td style="text-align: center;">B</td>
                <?php for($i=1;$i<=$day_counts;$i++){ ?>
                    <td style="text-align: center;text-align: center"><?php echo $RB[$i]; ?></td>
                    <td style="border-right: #999 2px solid;text-align: center"><?php echo number_format($PercentB[$i],1,".",""); ?></td>
                <?php } ?>
            </tr>
            <tr style="border-top: #999 2px solid;">
                <td style="text-align: center;">Night</td>
                <?php for($i=1;$i<=$day_counts;$i++){ ?>
                    <td style="text-align: center"><?php echo $Night[$i]; ?></td>
                    <td style="border-right: #999 2px solid;text-align: center" width="50%"><?php echo number_format($PercentNight[$i],1,".",""); ?></td>
                <?php } ?>
            </tr>
            <tr style="border-top: #999 2px solid;">
                <td style="text-align: center;">C</td>
                <?php for($i=1;$i<=$day_counts;$i++){ ?>
                    <td style="text-align: center;text-align: center"><?php echo $RC[$i]; ?></td>
                    <td style="border-right: #999 2px solid;text-align: center"><?php echo number_format($PercentC[$i],1,".",""); ?></td>
                <?php } ?>
            </tr>
            <tr style="border-bottom: #999 2px solid;">
                <td style="text-align: center;">D</td>
                <?php for($i=1;$i<=$day_counts;$i++){ ?>
                    <td style="text-align: center;text-align: center"><?php echo $RD[$i]; ?></td>
                    <td style="border-right: #999 2px solid;text-align: center"><?php echo number_format($PercentD[$i],1,".",""); ?></td>
                <?php } ?>
            </tr>
            </tbody>
        </table>
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

        employee=emp_id;
        click_day=day;
        click_month=month;

        $.contextMenu({
            selector: '.context-menu-one',
            trigger: 'left',
            callback: function (key, options){

                $.ajax({

                    url: "<?php echo base_url('roster/roster_con/change_roster'); ?>",
                    type: "POST",
                    dataType: "JSON",
                    data:{
                        employee:employee,
                        month:click_month,
                        day:click_day,
                        roster:key,
                        '<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>'
                    },
                    success:function(data){

                        if(data.roster == "A"){
                            $("#TD"+employee+""+click_day).html("" +
                                "<a href='javascript:;' onclick='openPopupMenu("+employee+","+click_day+","+click_month+")'>" +
                                "<span style='color:#fff; background: #ffad33; padding: 2px; border-radius: 5px; display: block'>A</span>" +
                                "</a>");
                        }
                        else if(data.roster == "B"){
                            $("#TD"+employee+""+click_day).html("" +
                                "<a href='javascript:;' onclick='openPopupMenu("+employee+","+click_day+","+click_month+")'>" +
                                "<span style='color:#fff; background: #2ecc71; padding: 2px; border-radius: 5px; display: block'>B</span>" +
                                "</a>");
                        }
                        else if(data.roster == "C"){
                            $("#TD"+employee+""+click_day).html("" +
                                "<a href='javascript:;' onclick='openPopupMenu("+employee+","+click_day+","+click_month+")'>" +
                                "<span style='color:#fff; background: #1d8af7; padding: 2px; border-radius: 5px; display: block'>C</span>" +
                                "</a>");
                        }
                        else if(data.roster == "D"){
                            $("#TD"+employee+""+click_day).html("" +
                                "<a href='javascript:;' onclick='openPopupMenu("+employee+","+click_day+","+click_month+")'>" +
                                "<span style='color:#fff; background: #f73bf2; padding: 2px; border-radius: 5px; display: block'>D</span>" +
                                "</a>");
                        }
                        else if(data.roster == "X"){
                            $("#TD"+employee+""+click_day).html("" +
                                "<a href='javascript:;' onclick='openPopupMenu("+employee+","+click_day+","+click_month+")'>" +
                                "<span style='color:#fff; background: #f7202b; padding: 2px; border-radius: 5px; display: block'>X</span>" +
                                "</a>");
                        }
                        else if(data.roster == "NO"){
                            $("#TD"+employee+""+click_day).html("" +
                                "<a href='javascript:;' onclick='openPopupMenu("+employee+","+click_day+","+click_month+")'>" +
                                "<span style='color:#000; background: #c7ebf7; padding: 2px; border-radius: 5px; display: block'>NO</span>" +
                                "</a>");
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown){
                        bootbox.alert("Roster Arrangement is Locked");
                    }

                });
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


