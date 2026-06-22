<?php
$this->load->model('payroll_process_mod', 'payroll');
?>

<div style="width:100%; margin-top: 10px;margin-bottom: 10px; padding-bottom: 20px; height: 30px; border-bottom: 2px solid #000;">
    <input type="submit" id="save" value="Print" class="btn btn-primary btn-sm pull-right" onclick="PrintDiv()">
</div>


<div id="pay_slips">
    <style type="text/css">
        @media print {
            body {
                background-color: #FFFFFF;
                background-image: none;
                color: #000000
            }

            #ad {
                display: none;
            }

            #leftbar {
                display: none;
            }

            #contentarea {
                width: 100%;
            }


            #pay-slip-container {
                width: 340px;
                /*float: left;*/
                /*margin-bottom: 60px;*/
            }

            .title-h4 {
                font-weight: bold;
                font-size: 14px;
                text-transform: uppercase;
            }

            hr {
                height: 2px;
                background-color: #000000;
                margin: 10px 0;
            }
        }

        hr {
            height: 2px;
            background-color: #000000;
            margin: 10px 0;
        }
        .t_align_r {
            text-align: right;
        }

        .pagebreak {
            page-break-before: auto;
            page-break-after: auto;
            height: 0;
            display: block !important;
            clear: both;
        }
    </style>
    <style>
        .slip-contrain{
            -webkit-box-flex: 0;
            -ms-flex: 0 0 25%;
            flex: 0 0 24%;
            max-width: 40%;
            float: left;
            padding: 5px 5px;
            height: 100% !important;
            margin-right: 60px;
        }
        .w_30_r {
            width: 30%;
        }
        .w_70_l {
            width: 70%;
        }

    </style>
<div style="col-lg-12">
<div style="max-width: 100%">
<?php
$count = 0;
foreach ($sheet_data as $sheet => $emp_data) {?>
    <div class="col-lg-6">
<div id="pay-slip-container" style="font-size: x-small; " class="slip-contrain" >
    <input type="hidden" id="status">
    <div>
        <?php

//        $groups_emp = array('manager');
//        if($this->ion_auth->in_group($groups_emp)){
//
//            if($this->session->userdata('COMPANY2_LOGO')) {
//                $logo = "uploads/logo/company/".$this->session->userdata('COMPANY2_LOGO');
//            }
//            else{
//                $logo = "uploads/logo/company/".COMPANY1_LOGO;
//            }
//
//        }
//        else{
            if(COMPANY_LOGO!="") {
                $logo = "uploads/logo/".COMPANY_LOGO;
            }
            else {
                $logo = "assets/images/logo.png";
            }
//        }
        ?>

        <div style="text-align: center;margin-bottom: -30px;">
        <img src="<?php echo base_url().$logo; ?>" alt="Logo" style="width: 40%" />
        </div>
        <br>
        <h5 class="title-h4" style="font-size: 12px; word-wrap: normal;text-align: center">
            <br>
            <span style="font-size: 16px"><?php echo COMPANY_NAME; ?></span>
            <br>
            <?php echo COMPANY_ADDRESS; ?>
        </h5>
        <h5 class="title-h4" style="font-size: 12px;text-align: center">PAY SLIP <?php echo date('Y-F', strtotime( $month )); ?> </h5>
        <hr style="height: 1px;background-color: #000000;"/>
        <table style="width: 100%">
            <tr >
                <td style="font-size: 12px;">Employee Name</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td class="t_align_r"><?php echo $emp_data['initials']." ".$emp_data['last_name']; ?></td>
            </tr>
            <tr>
                <td style="font-size: 12px;">EPF NO</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td class="t_align_r"><?php echo 'A-043923-'.str_pad($emp_data['epf_no'],6,"0",STR_PAD_LEFT); ?></td>
            </tr>
            <tr>
                <td style="font-size: 12px;">Designation</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td class="t_align_r"><?php echo  $emp_data['designation']; ?></td>
            </tr>
<!--            <tr>-->
<!--                <td style="font-size: 12px;">Department </td>-->
<!--                <td>&nbsp;</td>-->
<!--                <td>&nbsp;</td>-->
<!--                <td class="t_align_r">--><?php //echo  $emp_data['department']; ?><!--</td>-->
<!--            </tr>-->
<!--            <tr>-->
<!--                <td style="font-size: 12px;">Gender</td>-->
<!--                <td>&nbsp;</td>-->
<!--                <td>&nbsp;</td>-->
<!--                <td class="t_align_r">--><?php //echo $emp_data['sex']; ?><!--</td>-->
<!--            </tr>-->
<!--            <tr>-->
<!--                <td style="font-size: 12px;">Bank & Account No</td>-->
<!--                <td>&nbsp;</td>-->
<!--                <td>&nbsp;</td>-->
<!--                <td  class="t_align_r">--><?php //echo $emp_data['bank']. " - ".$emp_data['account']; ?><!--</td>-->
<!--            </tr>-->
<!--            <tr>-->
<!--                <td style="font-size: 12px;">No. of W/Days</td>-->
<!--                <td>&nbsp;</td>-->
<!--                <td>&nbsp;</td>-->
<!--                <td class="t_align_r">--><?php //echo $emp_data['work_day']; ?><!--</td>-->
<!--            </tr>-->
<!--            <tr>-->
<!--                <td>Age</td>-->
<!--                <td>&nbsp;</td>-->
<!--                <td>&nbsp;</td>-->
<!--                <td>--><?php
//                    $birthDate = $emp_data->birthday;
//                    $birthDate = explode("-", $birthDate);
//                    $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
//                        ? ((date("Y") - $birthDate[0]) - 1)
//                        : (date("Y") - $birthDate[0]));
//                    echo $age;
//                    ?>
<!--                </td>-->
<!--            </tr>-->

            <!--<tr>
                        <td>Annuals</td>
                        <td><?php /*echo $monthempannualcount; */ ?></td>
                    </tr>-->
        </table>

        <table style="width: 100%">
            <hr>
            <tr>
                <td style="font-size: 12px;">Basic Salary </td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td class="t_align_r"><?php echo number_format((float)$emp_data['basic'], 2, '.', ','); ?></td>
            </tr>
            <tr>
                <td style="font-size: 12px;">Budgetary Allowance</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td class="t_align_r"><?php echo number_format((float)$emp_data['budget_allowance'], 2, '.', ','); ?></td>
            </tr>
            <tr  class="PY2048" >
                <td style="font-size: 12px;">Total Basic Salary</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td class="t_align_r"><?php echo number_format((float)$emp_data['total_basic'], 2, '.', ','); ?></td>
            </tr>

        </table>

        <table style="width: 100%">
<!--            <tr>-->
<!--                <td style="font-size: 12px;">No Pay Deduction</td>-->
<!--                <td>&nbsp;</td>-->
<!--                <td>&nbsp;</td>-->
<!--                <td class="t_align_r">--><?php //echo number_format((float)$emp_data['nopay_amount'], 2, '.', ','); ?><!--</td>-->
<!--            </tr>-->

            <tr  class="PY2048" >
                <td style="font-size: 12px;">Total Basic for EPF</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td class="t_align_r"><?php echo number_format((float)$emp_data['total_basic_epf'], 2, '.', ','); ?></td>
            </tr>

        </table>
        <?php
        if($empcatdt = $this->payroll->getEmpCatDatabyEmp($emp_data['emp_Cat'])) {
            if ($emp_data['ot_amount'] != "" || $emp_data['ot_amount'] != 0) {
                if ($empcatdt->ot_applicable == "YES") {
                    ?>
        <table style="width: 100%">
                    <tr>
                        <td class="w_70_l"  style="font-size: 12px;"><strong><span style="border-bottom: 1px solid #000; text-transform: uppercase">OT</span></strong></td>
                        <td class="t_align_r w_30_r"></td>
                    </tr>
                    <tr>
                        <td class="w_70_l" style="font-size: 12px;">OT HOURS NORMAL</td>
                        <td class="t_align_r w_30_r"><?php echo $emp_data['ot_h']; ?></td>
                    </tr>
                    <tr>
                        <td class="w_70_l" style="font-size: 12px;">OT RATE NORMAL</td>
                        <td class="t_align_r w_30_r"><?php echo number_format((float)$emp_data['ot_r'], 2, '.', ','); ?></td>
                    </tr>
                    <tr class="PY2048" >
                        <td class="w_70_l" style="font-size: 12px;">OT AMOUNT</td>
                        <td class="t_align_r w_30_r"><?php echo number_format((float)$emp_data['ot_amount'], 2, '.', ','); ?></td>
                    </tr>
        </table>
                <?php }
            }
        }
        ?>

        <?php
        $emp_sal = json_decode($emp_data['emp_all_Data'], true);
        if($emp_sal['9']!=""||$emp_sal['9']!=0){ ?>
            <table style="width: 100%">
                <tr>
                    <td class="w_70_l" style="font-size: 12px;><strong><span style="border-bottom: 1px solid #000; text-transform: uppercase">Monthly Payments</span></strong></td>
                    <td class="t_align_r w_30_r"></td>
                </tr>

                <?php
                foreach($listData as $listdt) {
                    if ($listdt->type == "PAY" && $listdt->employee_id == $emp_data['ref_id'] ) {
                        ?>
                        <tr>
                            <td class="w_70_l" style="font-size: 12px;"><?php echo $listdt->name; ?></td>
                            <td class="t_align_r w_30_r"><?php echo number_format((float)$listdt->amount, 2, '.', ',');; ?></td>
                        </tr>
                        <?php
                    }
                }
                ?>
                <tr class="PY2048" >
                    <td class="w_70_l" style="font-size: 12px;"><strong>Total Monthly Payments</strong></td>
                    <td class="t_align_r w_30_r"><?php echo number_format((float)$emp_sal['9'], 2, '.', ','); ?></td>
                </tr>

            </table>

        <?php } ?>

        <?php
        $emp_sal = json_decode($emp_data['emp_all_Data'], true);
        if($emp_sal['10']!=""||$emp_sal['10']!=0){ ?>

            <table style="width: 100%">
                <tr>
                    <td  class="w_70_l" style="font-size: 12px;"><strong><span style="border-bottom: 1px solid #000; text-transform: uppercase">Allowances</span></strong></td>
                    <td class="t_align_r w_30_r"></td>
                </tr>
                <?php
                foreach($listData as $listdt) {
                    //need to chk $listdt->epf == "YES" &&
                    if ($listdt->type == "ALL" && $listdt->employee_id == $emp_data['ref_id'] && $listdt->master_ref_id!=1) {
                        ?>
                        <tr>
                            <td class="w_70_l" style="font-size: 12px;"><?php echo $listdt->name; ?></td>
                            <!--<td class="t_align_r"><?php /*echo number_format((float)$emp_sal['' . $listdt->amount . ''], 2, '.', ',');; */?></td>-->
                            <td class="t_align_r w_30_r"><?php echo number_format((float)$listdt->amount, 2, '.', ',');; ?></td>
                        </tr>
                        <?php
                    }
                }
                ?>
                <tr class="PY2048" >
                    <td class="w_70_l" style="font-size: 12px;"><strong>Total Allowances </strong></td>
                    <td class="t_align_r w_30_r"><?php
                        $tot_allow = $emp_data['all_allowance'];
                        echo number_format((float)$tot_allow, 2, '.', ','); ?></td>
                </tr>

            </table>
        <?php } ?>


        <table style="width: 100%">
<!--            <tr class="PY2048" >-->
<!--                <td class="w_70_l" style="font-size: 12px;"><strong>Gross Salary </strong></td>-->
<!--                <td class="t_align_r w_30_r">--><?php //echo number_format((float)$emp_data['gross'], 2, '.', ','); ?><!--</td>-->
<!--            </tr>-->
            <tr>
                <td class="w_70_l" style="font-size: 12px;"><strong><span style="border-bottom: 1px solid #000; text-transform: uppercase">Deduction</span></strong></td>
                <td class="t_align_r w_30_r"></td>
            </tr>

            <tr>
                <td class="w_70_l" style="font-size: 12px;">EPF 8%</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td class="t_align_r w_30_r"><?php echo number_format((float)$emp_data['epf_8'], 2, '.', ','); ?></td>
            </tr>

            <?php if($emp_data['nopay_amount']!=0){ ?>
                <tr>
                    <td style="font-size: 12px;">No Pay Amount </td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td class="t_align_r"><?php echo number_format((float)$emp_data['nopay_amount'], 2, '.', ','); ?></td>
                </tr>
            <?php } ?>

            <?php if($emp_data['payee']!=0){ ?>
                <tr>
                    <td style="font-size: 12px;">Payee</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td class="t_align_r w_30_r"><?php echo number_format((float)$emp_data['payee'], 2, '.', ','); ?></td>
                </tr>
            <?php } ?>

            <?php if($emp_data['mobile']!=0){ ?>
                <tr>
                    <td class="w_70_l" style="font-size: 12px;">Mobile Deduction </td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td class="t_align_r w_30_r"><?php echo number_format((float)$emp_data['mobile'], 2, '.', ','); ?></td>
                </tr>
            <?php } ?>

            <?php if($emp_data['loan_ins']!=0){ ?>
                <tr>
                    <td class="w_70_l" style="font-size: 12px;">Staff Loan</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td class="t_align_r w_30_r"><?php echo number_format((float)$emp_data['loan_ins'], 2, '.', ','); ?></td>
                </tr>
            <?php } ?>

            <?php
            $emp_sal = json_decode($emp_data['emp_all_Data'], true);
            if($emp_sal['3']!=""||$emp_sal['3']!=0){ ?>
                    <?php
                    foreach($listData as $listdt) {
                        if ($listdt->type == "ADV" && $listdt->employee_id == $emp_data['ref_id'] ) {
                            ?>
                            <tr>
                                <td class="w_70_l" style="font-size: 12px;"><?php echo $listdt->name; ?></td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td class="t_align_r w_30_r"><?php echo number_format((float)$listdt->amount, 2, '.', ',');; ?></td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
            <?php } ?>
            <?php if($emp_sal['13']!=""||$emp_sal['13']!=0){ ?>
                    <?php
                    foreach($listData as $listdt) {
                        if ($listdt->type == "DED" && $listdt->employee_id == $emp_data['ref_id'] ) {
                            ?>
                            <tr>
                                <td class="w_70_l" style="font-size: 12px;"><?php echo $listdt->name; ?></td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td class="t_align_r w_30_r"><?php echo number_format((float)$listdt->amount, 2, '.', ',');; ?></td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
            <?php } ?>
<!--            --><?php //if($emp_data['monthly_advances']!=0){ ?>
<!--                <tr>-->
<!--                    <td class="w_70_l" style="font-size: 12px;">Monthly Advances</td>-->
<!--                    <td>&nbsp;</td>-->
<!--                    <td>&nbsp;</td>-->
<!--                    <td class="t_align_r w_30_r">--><?php //echo number_format((float)$emp_data['monthly_advances'], 2, '.', ','); ?><!--</td>-->
<!--                </tr>-->
<!--            --><?php //} ?>
<!--            --><?php //if($emp_data['monthly_deductions']!=0){ ?>
<!--                <tr>-->
<!--                    <td class="w_70_l" style="font-size: 12px;">Monthly Deductions</td>-->
<!--                    <td>&nbsp;</td>-->
<!--                    <td>&nbsp;</td>-->
<!--                    <td class="t_align_r w_30_r">--><?php //echo number_format((float)$emp_data['monthly_deductions'], 2, '.', ','); ?><!--</td>-->
<!--                </tr>-->
<!--            --><?php //} ?>



            <?php if($emp_data['stamp']!=0){ ?>
                <tr>
                    <td class="w_70_l" style="font-size: 12px;">Stamp Duty </td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td class="t_align_r w_30_r"><?php echo number_format((float)$emp_data['stamp'], 2, '.', ','); ?></td>
                </tr>
            <?php } ?>
            <tr class="PY2048" >
                <td class="w_70_l" style="font-size: 12px;"><strong>TOTAL DEDUCTIONS</strong></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td class="t_align_r w_30_r"><?php echo number_format((float)$emp_data['total_deduction'], 2, '.', ','); ?></td>
            </tr>
        </table>

        <table style="width: 100%">

            <tr class="PY2048" >
                <td class="w_70_l" style="font-size: 12px;"><strong>Net Salary</strong></td>
                <td class="t_align_r w_30_r"><?php echo number_format((float)$emp_data['net'], 2, '.', ','); ?></td>
            </tr>

            <tr class="PY2048" >
                <td class="w_70_l" style="font-size: 12px;"><strong>Total Remuneration</strong></td>
                <td class="t_align_r w_30_r"><?php echo number_format((float)$emp_data['amt_payee'], 2, '.', ','); ?></td>
            </tr>
        </table>

            <table style="width: 100%">
                <tr>
                    <td class="w_70_l" style="font-size: 12px;><strong><span style="border-bottom: 1px solid #000; text-transform: uppercase">Company Contributions</span></strong></td>
                    <td class="t_align_r w_30_r"></td>
                </tr>
                <tr>
                    <td style="font-size: 12px;">EPF 12% </td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td class="t_align_r"><?php echo number_format((float)$emp_data['epf12'], 2, '.', ','); ?></td>
                </tr>
                <tr>
                    <td style="font-size: 12px;">ETF 3%</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td class="t_align_r"><?php echo number_format((float)$emp_data['etf'], 2, '.', ','); ?></td>
                </tr>
            </table>

        <table  style="width: 100%">
<hr>
            <tr>
                <td class="w_70_l">&nbsp;</td>
                <td class="t_align_r w_30_r">&nbsp;</td>
            </tr>
            <tr>
                <td class="w_70_l">.......................................</td>
                <td class="t_align_r w_30_r">......................</td>
            </tr>
            <tr>
                <td class="w_70_l">Signature</td>
                <td class="t_align_r w_30_r">Date</td>
            </tr>
            <tr>
                <td class="w_70_l">&nbsp;</td>
                <td class="t_align_r w_30_r">&nbsp;</td>
            </tr>
        </table>
    </div>
</div>
</div>

<?php
    $count++;

    if($count%2==0){
        ?>
        <div style="margin: 10px 0px;"></div>
        <div class="pagebreak"> </div>
        <?php
    }
}
?>

</div>
</div>

    <p style="font-size: 11px;display: inline-block; width: 100%">Printed By: <?php echo USER_NAME; ?>  / <?php echo date("Y-m-d H:i:s"); ?> | Salary Lock: <?php if($main_data->status==2){echo "Locked";} else { echo "Open"; } ?> | Final Lock: <?php if($main_data->main_lock==1){echo "Locked";} else { echo "Open"; } ?> | Authorized By:</p>
</div>

<script>
    function PrintDiv() {
        var divToPrint = document.getElementById('pay_slips');
        var popupWin = window.open('', '_blank', 'width=1350,height=1000');
        popupWin.document.open();
        popupWin.document.write('<html><head><link href="<?php echo base_url('assets/css/default_print.css'); ?>" rel="stylesheet" type="text/css" /></head><body onload="window.print()">');
        popupWin.document.write('');
        popupWin.document.write(divToPrint.innerHTML );
        popupWin.document.write('</html>');
        popupWin.document.close();
    }
</script>
