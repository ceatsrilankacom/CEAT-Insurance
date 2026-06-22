<div  style="float: left;font-size: small;" >
    <div class="container1">
        <div class="col-lg-12">
            <div style="float: right"><input type="submit" id="save" value="Print" class="btn btn-primary btn-sm" onclick="PrintDiv()">
            </div>
            <hr style="margin-top: 40px;margin-bottom: 20px;">
        </div>
        <!--//JE End-->
        <div class="col-lg-12"  id="print_btn_1">
            <style>
                table.horizontal .full_total th {
                    background: #404062 !important; color: #fff !important;
                    border-color: #fff !important;
                }
            </style>
            <div  class="table-responsive">
            <h5><?php echo $main_data->month; ?> -  Salary Details : From <?php echo $main_data->from; ?> :: Up-to <?php echo $main_data->upto; ?> </h5>
            <table id="pay-sheet-one" class="pay-sheet horizontal r"  style="font-size: 12px; border: 1px solid" border="1">
                <thead>
                <tr class="c">
                    <th class="w2" rowspan="2" style="text-align: center">#</th>
                    <th class="w6" rowspan="2" style="text-align: center">Code</th>
                    <th class="w20" rowspan="2" style="text-align: center">Title / Name</th>
                    <th class="w15" rowspan="2" style="text-align: center">Designation</th>
                    <th class="w6" rowspan="2" style="text-align: center">No. of W/Days</th>
                    <th class="w6" rowspan="2" style="text-align: center">No Pay Days</th>
                    <th class="w6" rowspan="2" style="text-align: center">Basic</th>
                        <?php
                        $AllAllowDataEPF = $this->payroll->getAllAllowanceTypeswithEPF();
                        foreach($AllAllowDataEPF as $Allowdt){
                                ?>
                                <th rowspan="2" ><?php echo $Allowdt->allowance; ?></th>
                                <?php
                        }
                        ?>
                    <th class="w6" rowspan="2"  style="text-align: center">No Pay Amount</th>
                    <th class="w6" rowspan="2"  style="text-align: center">Total for EPF</th>
                    <th class="w6" rowspan="2"  style="text-align: center">OT</th>
                    <?php
                    $AllAllowData = $this->payroll->getAllAllowanceTypeswithoutEPF();
                    foreach($AllAllowData as $AllowData){
                        ?>
                        <th rowspan="2" ><?php echo $AllowData->allowance; ?></th>
                        <?php
                    }
                    ?>
                    <th class="w6" rowspan="2"  style="text-align: center">Gross</th>

                    <th class="w6" colspan="5"  style="text-align: center">Deductions</th>
                    <th class="w6" rowspan="2"  style="text-align: center">Net</th>
                    <th class="w6" colspan="2"  style="text-align: center">Employer Contribution</th>
                    <th class="w6" rowspan="2"   style="text-align: center">Amount Payable</th>
                </tr>
                <tr class="c">
                    <th class="w6" colspan="" style="text-align: center">E.P.F. 8%</th>
                    <th class="w6" colspan="" style="text-align: center">Advance</th>
                    <th class="w6" colspan="" style="text-align: center">Loan</th>
                    <th class="w6" colspan="" style="text-align: center">PAYE</th>
                    <th class="w6" colspan="" style="text-align: center">TOTAL DEDUCTIONS</th>
                    <th class="w6" colspan="" style="text-align: center">E.T.F. 3%</th>
                    <th class="w6" colspan="" style="text-align: center">E.P.F. 12%</th>
                </tr>
                </thead>
            <?php
                foreach ($dep_type as $department) {
                    if($dep_mod==0) { ?>
                        <tr>
                            <td colspan="37" style="text-align: left"><b><?php echo 'Department of ' . $department->desc ?></b></td>
                        </tr>
                   <?php }
                    $tot_wd =0;
                    $tot_nopay_day = 0;
                    $tot_basic = 0;
                    $tot_nopay_amount = 0;
                    $tot_sal_for_epf = 0;
                    $tot_ot_amount = 0;
                    $tot_gross = 0;
                    $tot_loan_ins = 0;
                    $tot_festival_adv = 0;
                    $tot_advance = 0;
                    $tot_tot_deduction = 0;
                    $tot_sal_mgr_ded = 0;
                    $tot_payee = 0;
                    $tot_epf = 0;
                    $tot_total_deduction = 0;
                    $tot_net = 0;
                    $tot_amt_payee = 0;
                    $tot_etf = 0;
                    $tot_epf12 = 0;
                    $totalfull = 0;

                    $variables = $this->payroll->get_formula();
                    //Define variables
                    foreach($variables as $variable) {
                        //${$total."_".$variable->id} = 0;
                        ${$totalfull."_".$variable->id} = 0;
                    }


                    foreach ($sheet_data as $sheet => $data) {
                       $emp_sal = json_decode($data['emp_all_Data'], true);
                        if($department->id == $data['dep']){
                            $dep_id =$department->id;
                                ?>
                                <tr>
                                    <td></td>
                                    <td><?php echo $data['employee_id'] ?></td>
                                    <td><?php echo $data['initials']." ".$data['last_name']; ?></td>
                                    <td><?php echo $data['designation'] ?></td>
                                    <td style="text-align: right"><?php echo number_format((float)$data['work_day'], 2, '.', ','); ?></td>
                                    <td style="text-align: right"><?php echo ($data['nopay_day'] != 0) ? $data['nopay_day'] : '-'; ?></td>
                                    <td style="text-align: right"><?php echo ($data['basic'] != 0) ? number_format((float)$data['basic'], 2, '.', ',') : ''; ?></td>
                                    <?php
                                    //With EPF - value
                                        $AllAllowDataEPF = $this->payroll->getAllAllowanceTypeswithEPF();
                                         foreach($AllAllowDataEPF as $Allowdt){
                                            if($listData = $this->payroll->get_salary_month_end_allowances_with_epf($main_data->month,$Allowdt->id,$data['ref_id'])){
                                        ?>
                                                    <td><?php echo $listData->amount; ?></td>
                                        <?php
                                            } else {
                                                     echo "<td>-</td>";
                                            }
                                         }
                                    ?>
                                    <td style="text-align: right"><?php echo ($data['nopay_amount'] != 0) ? number_format((float)$data['nopay_amount'], 2, '.', ',') : '-'; ?></td>
                                    <td style="text-align: right"><?php echo ($data['sal_for_epf'] != 0) ? number_format((float)$data['sal_for_epf'], 2, '.', ',') : '-'; ?></td>
                                    <td style="text-align: right"><?php echo ($data['ot_amount'] != 0) ? number_format((float)$data['ot_amount'], 2, '.', ',') : ''; ?></td>
                                    <?php
                                    //Without EPF - value
                                    $AllAllowDataEPF = $this->payroll->getAllAllowanceTypeswithoutEPF();
                                    foreach($AllAllowDataEPF as $Allowdt){
                                        if($listData = $this->payroll->get_salary_month_end_allowances_without_epf($main_data->month,$Allowdt->id,$data['ref_id'])){
                                            ?>
                                            <td><?php echo $listData->amount; ?></td>
                                            <?php
                                        } else {
                                            echo "<td>-</td>";
                                        }
                                    }
                                    ?>
                                    <td class="PY2048" style="text-align: right"><?php echo ($data['gross'] != 0) ? number_format((float)$data['gross'], 2, '.', ',') : '-'; ?></td>

                                    <td style="text-align: right"><?php echo ($data['epf'] != 0) ? number_format((float)$data['epf'], 2, '.', ',') : '-'; ?></td>

                                    <td style="text-align: right"><?php echo ($data['advance'] != 0) ? number_format((float)$data['advance'], 2, '.', ',') : '-'; ?></td>
                                    <td style="text-align: right"><?php echo ($data['loan_ins'] != 0) ? number_format((float)$data['loan_ins'], 2, '.', ',') : '-'; ?></td>
                                    <td style="text-align: right"><?php echo ($data['payee'] != 0) ? number_format((float)$data['payee'], 2, '.', ',') : '-'; ?></td>
                                    <td class="PY2048" style="text-align: right"><?php echo ($data['total_deduction'] != 0) ? number_format((float)$data['total_deduction'], 2, '.', ',') : '-'; ?></td>

                                    <td class="PY2048" style="text-align: right"><?php echo ($data['net'] != 0) ? number_format((float)$data['net'], 2, '.', ',') : '-'; ?></td>
                                    <td style="text-align: right"><?php echo ($data['etf'] != 0) ? number_format((float)$data['etf'], 2, '.', ',') : '-'; ?></td>
                                    <td style="text-align: right"><?php echo ($data['epf12'] != 0) ? number_format((float)$data['epf12'], 2, '.', ',') : '-'; ?></td>
                                    <td class="PY2048" style="text-align: right"><?php echo ($data['amt_payee'] != 0) ? number_format((float)$data['amt_payee'], 2, '.', ',') : '-'; ?></td>
                                </tr>
                                <?php
                                $work_day += $data['work_day'];
                                $nopay_day += $data['nopay_day'];
                                $basic += $data['basic'];
                                $nopay_amount += $data['nopay_amount'];
                                $sal_for_epf += $data['sal_for_epf'];
                                $ot_amount += $data['ot_amount'];
                                $statutory += $data['statutory'];
                                $ex_work += $data['ex_work'];
                                $fuel += $data['fuel'];
                                $subsistence += $data['subsistence'];
                                $ex_allow += $data['ex_allow'];
                                $sal_mgr_add += $data['sal_mgr_add'];
                                $gross += $data['gross'];
                                $loan_ins += $data['loan_ins'];
                                $festival_adv += $data['festival_adv'];
                                $advance += $data['advance'];
                                $tot_deduction += $data['tot_deduction'];
                                $sal_mgr_ded += $data['sal_mgr_ded'];
                                $pettycash += $data['pettycash'];
                                $payee += $data['payee'];
                                $epf += $data['epf'];
                                $total_deduction += $data['total_deduction'];
                                $net += $data['net'];
                                $amt_payee += $data['amt_payee'];
                                $etf += $data['etf'];
                                $epf12 += $data['epf12'];

                            //With EPF Define Variable SUB TOTALS
                            $AllAllowDataEPF = $this->payroll->getAllAllowanceTypeswithEPF();
                            foreach($AllAllowDataEPF as $Allowdt){
                                if($listData = $this->payroll->get_salary_month_end_allowances_with_epf($main_data->month,$Allowdt->id,$data['ref_id'])){
                                    ${$total."_".$listData->f_id} += $listData->amount;
                                }
                            }
                            //Without EPF Define Variable
                            $AllAllowDataEPF = $this->payroll->getAllAllowanceTypeswithoutEPF();
                            foreach($AllAllowDataEPF as $Allowdt){
                                if($listData = $this->payroll->get_salary_month_end_allowances_without_epf($main_data->month,$Allowdt->id,$data['ref_id'])){
                                    ${$total."_".$listData->f_id} += $listData->amount;
                                }
                            }
                            //END ALLOW

                        }

                       $tot_wd = $tot_wd + $data['work_day'];
                       $tot_nopay_day = $tot_nopay_day + $data['nopay_day'];
                       $tot_basic = $tot_basic + $data['basic'];
                       $tot_nopay_amount = $tot_nopay_amount + $data['nopay_amount'];
                       $tot_sal_for_epf = $tot_sal_for_epf + $data['sal_for_epf'];
                       $tot_ot_amount = $tot_ot_amount + $data['ot_amount'];
                       $tot_gross = $tot_gross + $data['gross'];
                       $tot_loan_ins = $tot_loan_ins +  $data['loan_ins'];
                       $tot_festival_adv = $tot_festival_adv +  $data['festival_adv'];
                       $tot_advance = $tot_advance +  $data['advance'];
                       $tot_tot_deduction = $tot_tot_deduction +  $data['tot_deduction'];
                       $tot_sal_mgr_ded = $tot_sal_mgr_ded +  $data['sal_mgr_ded'];
                       $tot_payee = $tot_payee +  $data['payee'];
                       $tot_epf = $tot_epf +  $data['epf'];
                       $tot_total_deduction = $tot_total_deduction +  $data['total_deduction'];
                       $tot_net = $tot_net +  $data['net'];
                       $tot_amt_payee = $tot_amt_payee +  $data['amt_payee'];
                       $tot_etf = $tot_etf +  $data['etf'];
                       $tot_epf12 = $tot_epf12 +  $data['epf12'];

                        //With EPF Define Variable FULL TOTALS
                        $AllAllowDataEPF = $this->payroll->getAllAllowanceTypes();
                        foreach($AllAllowDataEPF as $Allowdt){
                                ${$totalfull."_".$listData->f_id} += $listData->amount;
                        }
                   }

                   //SUB TOTAL
                   if($dep_mod==0) { ?>
                        <tr class="total">
                            <th class="l" colspan="4" style="text-align: center">Sub Total</th>
                            <th style="text-align: right"><?php echo number_format((float)$work_day, 2, '.', ',');
                            ?></th>
                            <th style="text-align: right"><?php echo $nopay_day; ?></th>
                            <th style="text-align: right"><?php echo number_format(($basic), 2, '.', ','); ?></th>

                            <?php
                            //With EPF
                            $ALL_T = 0;
                            $AllAllowDataEPF = $this->payroll->getAllAllowanceTypeswithEPF();
                            foreach($AllAllowDataEPF as $Allowdt){
                                echo "<th>";
                                //if($listData = $this->payroll->get_salary_month_end_allowances($main_data->month,$Allowdt->id)){
                                    $ALL_T = ${$total."_".$Allowdt->f_id};
                                    echo number_format((float)$ALL_T, 2, '.', ',');
                                //}
                                echo "</th>";
                            }
                            ?>

                            <th style="text-align: right"><?php echo number_format(($nopay_amount), 2, '.', ','); ?></th>
                            <th style="text-align: right"><?php echo number_format(($sal_for_epf), 2, '.', ','); ?></th>
                            <th style="text-align: right"><?php echo number_format(($ot_amount), 2, '.', ','); ?></th>

                            <?php
                            //Without EPF
                            $ALL_TC = 0;
                            $AllAllowDataEPF = $this->payroll->getAllAllowanceTypeswithoutEPF();
                            foreach($AllAllowDataEPF as $Allowdt){
                                echo "<th>";
                                //if($listData = $this->payroll->get_salary_month_end_allowances_without_epf($main_data->month,$Allowdt->id)){
                                    $ALL_TC = ${$total."_".$Allowdt->f_id};
                                    echo number_format((float)$ALL_TC, 2, '.', ',');
                                //}
                                echo "</th>";
                            }
                            ?>

                            <th class="PY1024" style="text-align: right"><?php echo number_format(($gross), 2, '.', ','); ?></th>
                            <th style="text-align: right"><?php echo number_format(($epf), 2, '.', ','); ?></th>
                            <th style="text-align: right"><?php echo number_format(($advance), 2, '.', ','); ?></th>
                            <th style="text-align: right"><?php echo number_format(($loan_ins), 2, '.', ','); ?></th>
                            <th style="text-align: right"><?php echo number_format(($payee), 2, '.', ','); ?></th>

                            <th class="PY2048" style="text-align: right"><?php echo number_format(($total_deduction), 2, '.', ','); ?></th>
                            <th style="text-align: right"><?php echo number_format(($etf), 2, '.', ','); ?></th>
                            <th class="PY2048" style="text-align: right"><?php echo number_format(($net), 2, '.', ','); ?></th>
                            <th style="text-align: right"><?php echo number_format(($epf12), 2, '.', ','); ?></th>
                            <th class="PY2048" style="text-align: right"><?php echo number_format(($amt_payee), 2, '.', ','); ?></th>
                        </tr>
                <?php }
                //END SUB TOTALS
                ?>
                <?php
                            //UNSET SUB TOTALS
                            $AllAllowDataEPF = $this->payroll->getAllAllowanceTypeswithEPF();
                            foreach($AllAllowDataEPF as $Allowdt){
                                ${$total."_".$Allowdt->f_id} = 0;
                                unset(${$total."_".$Allowdt->f_id});
                                unset($ALL_T);
                            }

                            $AllAllowDataEPF = $this->payroll->getAllAllowanceTypeswithoutEPF();
                            foreach($AllAllowDataEPF as $Allowdt){
                                ${$total."_".$Allowdt->f_id} = 0;
                                unset(${$total."_".$Allowdt->f_id});
                                unset($ALL_TC);
                            }

                    ///////////////////END UNSET
                unset($sub_tot_total1,$sub_tot_rate2,$sub_tot_total2,$sub_tot_staff_trans,$sub_tot_mail_trans,$sub_tot_total3,$work_day,$basic,$gross,$loan_ins,$festival_adv,$advance,$nopay_day,$nopay_amount,$tot_deduction,$payee,$epf,$total_deduction,$net,$amt_payee,$etf,$epf12,$late_amount,$ot_amount,$sal_for_epf);
                } ?>

                <tr class="total full_total" style="background: #8e94a8 !important; color: #fff !important;">
                    <th class="l" colspan="4" style="text-align: center">Total</th>
                    <th style="text-align: right"><?php echo number_format((float)$tot_wd, 2, '.', ','); ?></th>
                    <th style="text-align: right"><?php echo $tot_nopay_day; ?></th>
                    <th style="text-align: right"><?php echo number_format(($tot_basic), 2, '.', ','); ?></th>
                    <?php
                    //With EPF
                    $ALL_TT = 0;
                    $AllAllowDataEPF = $this->payroll->getAllAllowanceTypeswithEPF();
                    foreach($AllAllowDataEPF as $Allowdt){
                        echo "<th>";
                        //if($listData = $this->payroll->get_salary_month_end_allowances($main_data->month,$Allowdt->id)){
                        $ALL_TT = ${$totalfull."_".$Allowdt->f_id};
                        echo number_format((float)$ALL_T, 2, '.', ',');
                        //}
                        echo "</th>";
                    }
                    ?>
                    <th style="text-align: right"><?php echo number_format(($tot_nopay_amount), 2, '.', ','); ?></th>
                    <th style="text-align: right"><?php echo number_format(($tot_sal_for_epf), 2, '.', ','); ?></th>
                    <th style="text-align: right"><?php echo number_format(($tot_ot_amount), 2, '.', ','); ?></th>
                    <?php
                    //Without EPF
                    $ALL_TOT = 0;
                    $AllAllowDataEPF = $this->payroll->getAllAllowanceTypeswithoutEPF();
                    foreach($AllAllowDataEPF as $Allowdt){
                        echo "<th>";
                        //if($listData = $this->payroll->get_salary_month_end_allowances_without_epf($main_data->month,$Allowdt->id)){
                        $ALL_TOT = ${$totalfull."_".$Allowdt->f_id};
                        echo number_format((float)$ALL_TC, 2, '.', ',');
                        //}
                        echo "</th>";
                    }
                    ?>
                    <th class="PY1024" style="text-align: right"><?php echo number_format(($tot_gross), 2, '.', ','); ?></th>
                    <th style="text-align: right"><?php echo number_format(($tot_epf), 2, '.', ','); ?></th>
                    <th style="text-align: right"><?php echo number_format(($tot_advance), 2, '.', ','); ?></th>

                    <th style="text-align: right"><?php echo number_format(($tot_loan_ins), 2, '.', ','); ?></th>
                    <th style="text-align: right"><?php echo number_format(($tot_payee), 2, '.', ','); ?></th>
                    <th class="PY2048" style="text-align: right"><?php echo number_format(($tot_total_deduction), 2, '.', ','); ?></th>
                    <th class="PY2048" style="text-align: right"><?php echo number_format(($tot_net), 2, '.', ','); ?></th>
                    <th style="text-align: right"><?php echo number_format(($tot_etf), 2, '.', ','); ?></th>
                    <th style="text-align: right"><?php echo number_format(($tot_epf12), 2, '.', ','); ?></th>
                    <th class="PY2048" style="text-align: right"><?php echo number_format(($tot_amt_payee), 2, '.', ','); ?></th>
                </tr>


                <?php
                //UNSET TOTALS
                /*$AllAllowDataEPF = $this->payroll->getAllAllowanceTypeswithEPF();
                foreach($AllAllowDataEPF as $Allowdt){
                    unset(${$totalfull."_".$Allowdt->f_id});
                    unset($ALL_T);
                }

                $AllAllowDataEPF = $this->payroll->getAllAllowanceTypeswithoutEPF();
                foreach($AllAllowDataEPF as $Allowdt){
                    unset(${$totalfull."_".$Allowdt->f_id});
                    unset($ALL_TC);
                }*/
                //unset($tot_wd);
                ?>

            </table>
            </div>
            <p style="font-size: 11px;">Printed By: <?php echo USER_NAME; ?>  / <?php echo date("Y-m-d H:i:s"); ?> | Salary Lock: <?php if($main_data->status==2){echo "Locked";} else { echo "Open"; } ?> | Final Lock: <?php if($main_data->main_lock==1){echo "Locked";} else { echo "Open"; } ?> | Authorized By:</p>
        </div>
    </div>
</div>
<script>
    function PrintDiv() {
        var divToPrint = document.getElementById('print_btn_1');
        var popupWin = window.open('', '_blank', 'width=1500,height=600');
        popupWin.document.open();
        popupWin.document.write('<html><head><link href="<?php echo base_url('assets/css/default_print.css'); ?>" rel="stylesheet" type="text/css" /></head><body onload="window.print()">');
        popupWin.document.write('');
        popupWin.document.write(divToPrint.innerHTML );
        popupWin.document.write('</html>');
        popupWin.document.close();
    }
</script>
