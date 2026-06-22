<?php
/**
 * Created by Earrow.
 * User:Kasun De Mel
 * Email:kasun@earrow.net
 * Date: 11/28/2019
 * Time: 9:35 AM
 */
?>
<link href="<?php echo base_url('assets/css/custom.css'); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/node_modules/clockpicker/dist/jquery-clockpicker.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/node_modules/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/node_modules/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/node_modules/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/node_modules/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/node_modules/bootstrap-duallistbox-4/dist/bootstrap-duallistbox.min.css" rel="stylesheet" type="text/css" />
<!--V2-->
<link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/plugins/dropzone/dist/dropzone.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/plugins/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/plugins/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/plugins/perfect-scrollbar/css/perfect-scrollbar.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/plugins/slick-carousel/slick/slick.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/icon_fonts_assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/icon_fonts_assets/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/icon_fonts_assets/dripicons/webfont.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/icon_fonts_assets/picons-thin/style.css" rel="stylesheet">

<tbody>
<tr>
    <td>
        <table width="100%">
            <tr>
                <td colspan="10"><h6 style="text-align: center;margin-top: 10px;"><b>Bellagio Limited</b></h6></td>
            </tr>
            <tr>
                <td>Name | <b><?php echo $arrangements->name;?></b></td>
                <td>&nbsp;</td>
                <td>Description | <b><?php echo $arrangements->description; ?></b></b></td>
                <td>&nbsp;</td>
                <td>Month | <b><?php echo $arrangements->month; ?></b></td>
                <td>&nbsp;</td>
                <td>Department | <b><?php echo $arrangements->department_name; ?></b></td>
                <td>&nbsp;</td>
                <td>Designation | <b><?php echo $arrangements->designation_name; ?></b></td>
                <td>&nbsp;</td>
            </tr>
        </table>
    </td>
</tr>
<tr>
    <td>
        <table id="roster_table" border="2" class="table table-striped table-bordered table-hover table-header-fixed dt-responsive dataTable no-footer roster-table" cellspacing="0" width="100%" height="100%">
            <thead>
            <tr>
                <th style="text-align: center;font-size: 8px;" rowspan="2" valign="middle">#</th>
                <th style="text-align: center;font-size: 8px;" rowspan="2" valign="middle">GAMNO</th>
                <th style="text-align: center;font-size: 8px;" rowspan="2" valign="middle">EPF</th>
                <th style="text-align: center;font-size: 8px;" rowspan="2" valign="middle">NAME</th>

                <?php for($i=1;$i<=$day_counts;$i++){ ?>
                    <th style="text-align: center;">
                        <?php echo date("D",strtotime($arrangements->month.'-'.$i)); ?>
                    </th>
                <?php } ?>
                <th rowspan="2" style="text-align: center;font-size: 8px;" title="Day Offs">DO</th>
                <th rowspan="2" style="text-align: center;font-size: 8px;" title="Absent">AB</th>
                <th rowspan="2" style="text-align: center;font-size: 8px;" title="Leave">LE</th>
                <th rowspan="2" style="text-align: center;font-size: 8px;" width="200px" title="Remarks">Remarks</th>
            </tr>
            <tr>
                <?php for($i=1;$i<=$day_counts;$i++){?>
                    <th style="text-align: center;font-size: 8px;">
                        <?php echo date("d",strtotime($arrangements->month.'-'.$i)); ?>
                    </th>
                <?php } ?>
            </tr>
            </thead>
            <tbody class="context-menu-one">
            <?php
            $x=1;$EmpX=array();$EmpAB=array();$EmpL=array();
            foreach($rosters as $roster1){
                ?>
                <tr>
                    <td style="color:black;font-size: 8px;"><?php echo $x; ?></td>
                    <td style="color:black;font-size: 8px;"><?php echo $roster1->employee_id; ?></td>
                    <td style="color:black;font-size: 8px;"><?php echo $roster1->epf_no; ?></td>
                    <td style="color:black;font-size: 8px;"><?php echo $roster1->employee_name; ?></td>
                    <?php for($i=1;$i<=$day_counts;$i++){ $D='D'.$i; ?>
                        <td style="text-align: center;<?php if($poya_days[$i] == "POYA"){?>background-color:#ffffa4;<?php } ?>;font-size: 8px;">
                            <?php if($emp_leave[$roster1->employee][$i] == "L"){ $EmpL[$roster1->employee] +=1; ?>
                                <span title="Leave" style='background:#03a9f3;color:#070a24;padding: 2px; border-radius: 5px; display: block'>&nbsp;L&nbsp;</span>
                            <?php }else if($emp_absent[$roster1->employee][$i] == "AB" && $roster1->$D != "X" && $emp_leave[$roster1->employee][$i] != "L"){ $EmpAB[$roster1->employee] +=1; ?>
                                <span title="Absent" style='background:#00c292;color:#070a24;padding: 3px; border-radius: 5px; display: block'>AB</span>
                            <?php }else if($roster1->$D == "0"){  ?>
                                <span title="Not Assigned" style='color:black;padding: 2px; border-radius: 5px; display: block'>NO</span>
                            <?php }else{ if($roster1->$D =="X"){ $EmpX[$roster1->employee] +=1; } ?>
                                <span title="<?php echo $roster1->$D; ?> Roster" style='color:black;padding: 2px; border-radius: 5px; display: block'><?php echo $roster1->$D; ?></span>
                            <?php } ?>
                        </td>
                    <?php } ?>
                    <td style="text-align:center;font-size: 8px;"><?php echo $EmpX[$roster1->employee] ? $EmpX[$roster1->employee]:"-"; ?></td>
                    <td style="text-align:center;font-size: 8px;"><?php echo $EmpAB[$roster1->employee] ? $EmpAB[$roster1->employee]:"-"; ?></td>
                    <td style="text-align:center;font-size: 8px;"><?php echo $EmpL[$roster1->employee] ? $EmpL[$roster1->employee]:"-"; ?></td>
                    <td style="text-align:left;font-size: 8px;">&nbsp;<?php echo $remarks[$roster1->employee] ? $remarks[$roster1->employee]:""; ?></td>
                </tr>
                <?php $x++; } ?>
            </tbody>
        </table>
    </td>
</tr>
</tbody>



