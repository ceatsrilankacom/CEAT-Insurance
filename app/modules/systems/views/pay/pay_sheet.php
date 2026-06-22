<div  style="float: left;font-size: small;" >
    <div class="container1">
        <!--<div class="col-lg-12">
            <hr style="margin-top: 40px;margin-bottom: 20px;">
        </div>-->
        <!--//JE End-->     <div style="width:100%; margin-top: 10px;margin-bottom: 10px; padding-bottom: 20px; height: 30px; border-bottom: 2px solid #000;">

<!---->
<!--            <input type="submit" id="word" value="Word" class="btn btn-primary btn-sm pull-right" onclick="word_generator()">-->
<!--            <input type="submit" id="test" value="Excel" class="btn btn-primary btn-sm pull-right" onclick="fnExcelReport()">-->
<!--            <input type="submit" id="save" value="Print" class="btn btn-primary btn-sm pull-right" onclick="PrintDiv()">-->

            <a href="#" id="test1" class="btn btn-primary btn-sm pull-right" style="color:#FFFFFF;margin-right: 10px;background: #3385b6 !important;border-color: #3385b6" onClick="javascript:PrintDiv();">Print</a>
            <a href="#" id="test" class="btn btn-primary btn-sm pull-right" style="color:#FFFFFF;margin-right: 10px;background: #3385b6 !important;border-color: #3385b6" onClick="javascript:fnExcelReport();">Excel</a>
            <a href="#" id="export" class="btn btn-primary btn-sm pull-right" style="color:#FFFFFF;margin-right: 10px;background: #3385b6 !important;border-color: #3385b6" onClick="javascript:word_generator();">Word</a>

        </div>
        <div class="col-lg-12"  id="print_btn_1">
            <style>
                table.horizontal .full_total th {
                    background: #404062 !important; color: #fff !important;
                    border-color: #fff !important;
                }
                .pay-sheet td {
                    font-size: 10px !important;
                    font-weight: 400;
                }
                .pay-sheet th {
                    font-size: 10px !important;
                    font-weight: 500;
                }
                table thead > tr > th {
                    padding: 1px !important;
                }
            </style>

            <div  class="table-responsive">
            <h5><?php echo $main_data->month; ?> -  Salary Details : From <?php echo $main_data->from; ?> :: Up-to <?php echo $main_data->upto; ?> </h5>
            <?php
            //With EPF Allowances
            $AllAllowDataEPF_COUNT = 0;
            $AllAllowDataEPF = $this->payroll->getAllAllowanceTypeswithEPF();
            $AllAllowDataEPF_COUNT = count($AllAllowDataEPF);

            //Without EPF Allowances
            $AllAllowData_COUNT = 0;
            $AllAllowDataNOEPF = $this->payroll->getAllAllowanceTypeswithoutEPF();
            $AllAllowData_COUNT = count($AllAllowDataNOEPF);

            //Advances
            ?>
            <table id="pay-sheet-one" class="pay-sheet horizontal r"  style="font-size: 12px; border: 1px solid" border="1">
                <thead>
                <tr class="c">
                    <th class="w2" rowspan="2" style="text-align: center">#</th>
                    <th class="w6" rowspan="2" style="text-align: center">EPF NO</th>
                    <th class="w20" rowspan="2" style="text-align: center">TITLE / NAME</th>
                    <th class="w15" rowspan="2" style="text-align: center">DESIGNATION</th>
                    <th class="w6" rowspan="2" style="text-align: center">No. OF W/DAYS</th>
                    <th class="w6" rowspan="2" style="text-align: center">NO PAY DAYS</th>
                    <th class="w6" rowspan="2" style="text-align: center">BASIC</th>
                    <th class="w6" colspan="<?php echo $AllAllowDataEPF_COUNT; ?>" style="text-align: center">ALLOWANCES</th>
<!--                <th class="w6" rowspan="2"  style="text-align: center">NO PAY AMOUNT</th>-->
                    <th class="w6" rowspan="2"  style="text-align: center">TOTAL FOR EPF</th>
                    <th class="w6" rowspan="2"  style="text-align: center">OT</th>
                    <th class="w6" rowspan="2"  style="text-align: center">MONTHLY PAYMENTS</th>
                    <th class="w6" colspan="<?php echo $AllAllowData_COUNT; ?>" style="text-align: center">OTHER ALLOWANCES</th>
                    <th class="w6" rowspan="2"  style="text-align: center">GROSS</th>
                    <th class="w6" colspan="8"  style="text-align: center">DEDUCTIONS</th>
                    <th class="w6" rowspan="2" style="text-align: center">TOTAL DEDUCTIONS</th>
                    <th class="w6" rowspan="2"  style="text-align: center">NET</th>
                    <th class="w6" colspan="2"  style="text-align: center">EMPLOYER CONTRIBUTION</th>
<!--                    <th class="w6" rowspan="2"   style="text-align: center">AMOUNT PAYABLE</th>-->
                </tr>
                <tr class="c">
                    <?php
                    foreach($AllAllowDataEPF as $Allowdt){
                        ?>
                        <th class="w6" colspan="" style="text-align: center"><?php echo $Allowdt->allowance; ?></th>
                        <?php
                    }
                    ?>
                    <?php
                    foreach($AllAllowDataNOEPF as $AllowData){
                        ?>
                        <th class="w6" colspan="" style="text-align: center" ><?php echo $AllowData->allowance; ?></th>
                        <?php
                    }
                    ?>
                    <th class="w6" colspan="" style="text-align: center">E.P.F. 8%</th>
                    <th class="w6" colspan="" style="text-align: center">TOTAL ADVANCES</th>
                    <th class="w6" colspan="" style="text-align: center">LOAN</th>
                    <th class="w6" colspan="" style="text-align: center">PAYE</th>
                    <th class="w6" colspan="" style="text-align: center">MONTHLY DEDUCTIONS</th>
                    <th class="w6" colspan="" style="text-align: center">NOPAY AMOUNT</th>
                    <th class="w6" colspan="" style="text-align: center">Mobile Bill</th>
                    <th class="w6" colspan="" style="text-align: center">Stamp Duty</th>

                    <th class="w6" colspan="" style="text-align: center">E.T.F. 3%</th>
                    <th class="w6" colspan="" style="text-align: center">E.P.F. 12%</th>
                </tr>
                </thead>
            <?php
//                foreach ($dep_type as $department) {
//                    if($dep_mod==0) { ?>
<!--                        <tr>-->
<!--                            <td colspan="37" style="text-align: left"><b>--><?php //echo 'Department of ' . $department->desc ?><!--</b></td>-->
<!--                        </tr>-->
<!--                   --><?php //}
                    $tot_wd =0;
                    $tot_nopay_day = 0;
                    $tot_basic = 0;
                    $tot_nopay_amount = 0;
                    $tot_sal_for_epf = 0;
                    $tot_ot_amount = 0;
                    $tot_monthly_payments = 0;
                    $tot_gross = 0;
                    $tot_loan_ins = 0;
                    $tot_festival_adv = 0;
                    $tot_advance = 0;
                    $tot_tot_deduction = 0;
                    $tot_monthly_deductions = 0;
                    $tot_sal_mgr_ded = 0;
                    $tot_payee = 0;
                    $tot_epf = 0;
                    $tot_total_stamp = 0;
                    $tot_total_mobile = 0;
                    $tot_total_nopay = 0;
                    $tot_total_deduction = 0;
                    $tot_net = 0;
                    $tot_amt_payee = 0;
                    $tot_etf = 0;
                    $tot_epf12 = 0;
                    $tot_mobile = 0;
                    $totalfull = 0;

                    $variables = $this->payroll->get_formula();
                    //Define variables
                    foreach($variables as $variable) {
                        //${$total."_".$variable->id} = 0;
                        ${$totalfull."_".$variable->id} = 0;
                    }

                    $id_count = 1;

                    foreach ($sheet_data as $sheet => $data) {
                       $emp_sal = json_decode($data['emp_all_Data'], true);
//                        if($department->id == $data['dep']){
                            $dep_id =$department->id;
                                ?>
                                <tr>
                                    <td><?php echo $id_count; ?></td>
                                    <td><?php echo 'A-043923-'.str_pad($data['epf_no'],6,"0",STR_PAD_LEFT); ?></td>
                                    <td><?php echo $data['initials']." ".$data['last_name']; ?></td>
                                    <td><?php echo $data['designation'] ?></td>
                                    <td style="text-align: right"><?php echo number_format((float)$data['work_day'], 2, '.', ','); ?></td>
                                    <td style="text-align: right"><?php echo ($data['nopay_day'] != 0) ? $data['nopay_day'] : '-'; ?></td>
                                    <td style="text-align: right"><?php echo ($data['basic'] != 0) ? number_format((float)$data['basic'], 2, '.', ',') : '-'; ?></td>
                                    <?php
                                    //With EPF - value
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
<!--                                    <td style="text-align: right">--><?php //echo ($data['nopay_amount'] != 0) ? number_format((float)$data['nopay_amount'], 2, '.', ',') : '-'; ?><!--</td>-->
                                    <td style="text-align: right"><?php echo ($data['sal_for_epf'] != 0) ? number_format((float)$data['sal_for_epf'], 2, '.', ',') : '-'; ?></td>
                                    <td style="text-align: right"><?php echo ($data['ot_amount'] != 0) ? number_format((float)$data['ot_amount'], 2, '.', ',') : '-'; ?></td>
                                    <td style="text-align: right"><?php echo ($data['monthly_payments'] != 0) ? number_format((float)$data['monthly_payments'], 2, '.', ',') : '-'; ?></td>
                                    <?php
                                    //Without EPF - value
                                    foreach($AllAllowDataNOEPF as $Allowdata){
                                        if($listData = $this->payroll->get_salary_month_end_allowances_without_epf($main_data->month,$Allowdata->id,$data['ref_id'])){
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
                                    <td style="text-align: right"><?php echo ($data['monthly_deductions'] != 0) ? number_format((float)$data['monthly_deductions'], 2, '.', ',') : '-'; ?></td>
                                    <td style="text-align: right"><?php echo ($data['nopay_amount'] != 0) ? number_format((float)$data['nopay_amount'], 2, '.', ',') : '-'; ?></td>
                                    <td style="text-align: right"><?php echo ($data['mobile'] != 0) ? number_format((float)$data['mobile'], 2, '.', ',') : '-'; ?></td>
                                    <td style="text-align: right"><?php echo ($data['stamp'] != 0) ? number_format((float)$data['stamp'], 2, '.', ',') : '-'; ?></td>
                                    <td class="PY2048" style="text-align: right"><?php echo ($data['total_deduction'] != 0) ? number_format((float)$data['total_deduction'], 2, '.', ',') : '-'; ?></td>

                                    <td class="PY2048" style="text-align: right"><?php echo ($data['net'] != 0) ? number_format((float)$data['net'], 2, '.', ',') : '-'; ?></td>
                                    <td style="text-align: right"><?php echo ($data['etf'] != 0) ? number_format((float)$data['etf'], 2, '.', ',') : '-'; ?></td>
                                    <td style="text-align: right"><?php echo ($data['epf12'] != 0) ? number_format((float)$data['epf12'], 2, '.', ',') : '-'; ?></td>
<!--                                    <td class="PY2048" style="text-align: right">--><?php //echo ($data['amt_payee'] != 0) ? number_format((float)$data['amt_payee'], 2, '.', ',') : '-'; ?><!--</td>-->
                                </tr>
                                <?php
                                $work_day += $data['work_day'];
                                $nopay_day += $data['nopay_day'];
                                $basic += $data['basic'];
                                $sal_for_epf += $data['sal_for_epf'];
                                $ot_amount += $data['ot_amount'];
                                $monthly_payments += $data['monthly_payments'];
                                $monthly_deductions += $data['monthly_deductions'];
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
                                $total_nopay += $data['nopay_amount'];
                                $total_stamp += $data['stamp'];
                                $total_mobile += $data['mobile'];
                                $total_deduction += $data['total_deduction'];
                                $net += $data['net'];
                                $amt_payee += $data['amt_payee'];
                                $etf += $data['etf'];
                                $epf12 += $data['epf12'];

                            //With EPF Define Variable SUB TOTALS
                            foreach($AllAllowDataEPF as $Allowdt){
                                if($listData = $this->payroll->get_salary_month_end_allowances_with_epf($main_data->month,$Allowdt->id,$data['ref_id'])){
                                    ${$total."_".$listData->f_id} += $listData->amount;
                                }
                            }
                            //Without EPF Define Variable
                            foreach($AllAllowDataNOEPF as $Allowdt){
                                if($listData = $this->payroll->get_salary_month_end_allowances_without_epf($main_data->month,$Allowdt->id,$data['ref_id'])){
                                    ${$total."_".$listData->f_id} += $listData->amount;
                                }
                            }
                            //END ALLOW

//                        }

                       $tot_wd = $tot_wd + $data['work_day'];
                       $tot_nopay_day = $tot_nopay_day + $data['nopay_day'];
                       $tot_basic = $tot_basic + $data['basic'];
                       $tot_sal_for_epf = $tot_sal_for_epf + $data['sal_for_epf'];
                       $tot_ot_amount = $tot_ot_amount + $data['ot_amount'];
                       $tot_monthly_payments = $tot_monthly_payments + $data['monthly_payments'];
                       $tot_gross = $tot_gross + $data['gross'];
                       $tot_loan_ins = $tot_loan_ins +  $data['loan_ins'];
                       $tot_festival_adv = $tot_festival_adv +  $data['festival_adv'];
                       $tot_advance = $tot_advance +  $data['advance'];
                       $tot_tot_deduction = $tot_tot_deduction +  $data['tot_deduction'];
                       $tot_monthly_deductions = $tot_monthly_deductions +  $data['monthly_deductions'];
                       $tot_sal_mgr_ded = $tot_sal_mgr_ded +  $data['sal_mgr_ded'];
                       $tot_payee = $tot_payee +  $data['payee'];
                       $tot_epf = $tot_epf +  $data['epf'];
                       $tot_total_nopay = $tot_total_nopay +  $data['nopay_amount'];
                       $tot_total_stamp = $tot_total_stamp +  $data['stamp'];
                       $tot_total_mobile = $tot_total_mobile +  $data['mobile'];
                       $tot_total_deduction = $tot_total_deduction +  $data['total_deduction'];
                       $tot_net = $tot_net +  $data['net'];
                       $tot_amt_payee = $tot_amt_payee +  $data['amt_payee'];
                       $tot_etf = $tot_etf +  $data['etf'];
                       $tot_epf12 = $tot_epf12 +  $data['epf12'];

                        //With EPF Define Variable FULL TOTALS
                        /*$AllAllowDataEPF = $this->payroll->getAllAllowanceTypes();
                        foreach($AllAllowDataEPF as $Allowdt){
                                ${$totalfull."_".$listData->f_id} += $listData->amount;
                        }*/
                        $id_count++;
                   }

                   //SUB TOTAL
//                   if($dep_mod==0) { ?>
<!--                        <tr class="total">-->
<!--                            <th class="l" colspan="4" style="text-align: center">Sub Total</th>-->
<!--                            <th style="text-align: right">--><?php //echo number_format((float)$work_day, 2, '.', ',');
//                            ?><!--</th>-->
<!--                            <th style="text-align: right">--><?php //echo $nopay_day; ?><!--</th>-->
<!--                            <th style="text-align: right">--><?php //echo number_format(($basic), 2, '.', ','); ?><!--</th>-->
<!---->
<!--                            --><?php
//                            //With EPF
//                            $ALL_T = 0;
//                            foreach($AllAllowDataEPF as $Allowdt){
//                                echo "<th>";
//                                //if($listData = $this->payroll->get_salary_month_end_allowances($main_data->month,$Allowdt->id)){
//                                    $ALL_T = ${$total."_".$Allowdt->f_id};
//                                    echo number_format((float)$ALL_T, 2, '.', ',');
//                                //}
//                                echo "</th>";
//                            }
//                            ?>
<!---->
<!--<!--                            <th style="text-align: right">--><?php ////echo number_format(($nopay_amount), 2, '.', ','); ?><!--<!--</th>-->
<!--                            <th style="text-align: right">--><?php //echo number_format(($sal_for_epf), 2, '.', ','); ?><!--</th>-->
<!--                            <th style="text-align: right">--><?php //echo number_format(($ot_amount), 2, '.', ','); ?><!--</th>-->
<!---->
<!--                            <th style="text-align: right">--><?php //echo number_format(($monthly_payments), 2, '.', ','); ?><!--</th>-->
<!---->
<!--                            --><?php
//                            //Without EPF
//                            $ALL_TC = 0;
//                            foreach($AllAllowDataNOEPF as $Allowdt){
//                                echo "<th>";
//                                //if($listData = $this->payroll->get_salary_month_end_allowances_without_epf($main_data->month,$Allowdt->id)){
//                                    $ALL_TC = ${$total."_".$Allowdt->f_id};
//                                    echo number_format((float)$ALL_TC, 2, '.', ',');
//                                //}
//                                echo "</th>";
//                            }
//                            ?>
<!---->
<!--                            <th class="PY1024" style="text-align: right">--><?php //echo number_format(($gross), 2, '.', ','); ?><!--</th>-->
<!--                            <th style="text-align: right">--><?php //echo number_format(($epf), 2, '.', ','); ?><!--</th>-->
<!--                            <th style="text-align: right">--><?php //echo number_format(($advance), 2, '.', ','); ?><!--</th>-->
<!--                            <th style="text-align: right">--><?php //echo number_format(($loan_ins), 2, '.', ','); ?><!--</th>-->
<!--                            <th style="text-align: right">--><?php //echo number_format(($payee), 2, '.', ','); ?><!--</th>-->
<!---->
<!--                            <th style="text-align: right">--><?php //echo number_format(($monthly_deductions), 2, '.', ','); ?><!--</th>-->
<!--                            <th class="PY2048" style="text-align: right">--><?php //echo number_format(($total_nopay), 2, '.', ','); ?><!--</th>-->
<!--                            <th class="PY2048" style="text-align: right">--><?php //echo number_format(($total_mobile), 2, '.', ','); ?><!--</th>-->
<!--                            <th class="PY2048" style="text-align: right">--><?php //echo number_format(($total_stamp), 2, '.', ','); ?><!--</th>-->
<!--                            <th class="PY2048" style="text-align: right">--><?php //echo number_format(($total_deduction), 2, '.', ','); ?><!--</th>-->
<!--                            <th style="text-align: right">--><?php //echo number_format(($net), 2, '.', ','); ?><!--</th>-->
<!--                            <th class="PY2048" style="text-align: right">--><?php //echo number_format(($etf), 2, '.', ','); ?><!--</th>-->
<!--                            <th style="text-align: right">--><?php //echo number_format(($epf12), 2, '.', ','); ?><!--</th>-->
<!--<!--                            <th class="PY2048" style="text-align: right">--><?php ////echo number_format(($amt_payee), 2, '.', ','); ?><!--<!--</th>-->
<!--                        </tr>-->
<!--                --><?php //}
                //END SUB TOTALS
                ?>
                <?php
                            //UNSET SUB TOTALS
                            foreach($AllAllowDataEPF as $Allowdt){
                                ${$total."_".$Allowdt->f_id} = 0;
                                unset(${$total."_".$Allowdt->f_id});
                                unset($ALL_T);
                            }
                            foreach($AllAllowDataNOEPF as $Allowdt){
                                ${$total."_".$Allowdt->f_id} = 0;
                                unset(${$total."_".$Allowdt->f_id});
                                unset($ALL_TC);
                            }

                    ///////////////////END UNSET
                unset($sub_tot_total1,$sub_tot_rate2,$sub_tot_total2,$sub_tot_staff_trans,$sub_tot_mail_trans,$sub_tot_total3,$work_day,$basic,$gross,$loan_ins,$festival_adv,$advance,$nopay_day,$tot_deduction,$monthly_deductions,$payee,$epf,$total_deduction,$total_stamp,$total_mobile,$net,$total_nopay,$amt_payee,$etf,$epf12,$late_amount,$ot_amount,$monthly_payments,$sal_for_epf);
//                } ?>

                <tr class="total full_total" style="background: #8e94a8 !important; color: #fff !important;">
                    <th class="l" colspan="4" style="text-align: center">Total</th>
                    <th style="text-align: right"><?php echo number_format((float)$tot_wd, 2, '.', ','); ?></th>
                    <th style="text-align: right"><?php echo $tot_nopay_day; ?></th>
                    <th style="text-align: right"><?php echo number_format(($tot_basic), 2, '.', ','); ?></th>
                    <?php
                    //With EPF
                    $ALL_TT = 0;
                    foreach($AllAllowDataEPF as $Allowdt){
                        echo "<th>";
                        //if($listData = $this->payroll->get_salary_month_end_allowances($main_data->month,$Allowdt->id)){
                        $ALL_TT = ${$totalfull."_".$Allowdt->f_id};
                        echo number_format((float)$ALL_T, 2, '.', ',');
                        //}
                        echo "</th>";
                    }
                    ?>
<!--                    <th style="text-align: right">--><?php //echo number_format(($tot_nopay_amount), 2, '.', ','); ?><!--</th>-->
                    <th style="text-align: right"><?php echo number_format(($tot_sal_for_epf), 2, '.', ','); ?></th>
                    <th style="text-align: right"><?php echo number_format(($tot_ot_amount), 2, '.', ','); ?></th>
                    <th style="text-align: right"><?php echo number_format(($tot_monthly_payments), 2, '.', ','); ?></th>
                    <?php
                    //Without EPF
                    $ALL_TOT = 0;
                    foreach($AllAllowDataNOEPF as $Allowdt){
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

                    <th style="text-align: right"><?php echo number_format(($tot_monthly_deductions), 2, '.', ','); ?></th>
                    <th class="PY2048" style="text-align: right"><?php echo number_format(($tot_total_nopay), 2, '.', ','); ?></th>
                    <th class="PY2048" style="text-align: right"><?php echo number_format(($tot_total_mobile), 2, '.', ','); ?></th>
                    <th class="PY2048" style="text-align: right"><?php echo number_format(($tot_total_stamp), 2, '.', ','); ?></th>
                    <th class="PY2048" style="text-align: right"><?php echo number_format(($tot_total_deduction), 2, '.', ','); ?></th>
                    <th class="PY2048" style="text-align: right"><?php echo number_format(($tot_net), 2, '.', ','); ?></th>
                    <th style="text-align: right"><?php echo number_format(($tot_etf), 2, '.', ','); ?></th>
                    <th style="text-align: right"><?php echo number_format(($tot_epf12), 2, '.', ','); ?></th>
<!--                    <th class="PY2048" style="text-align: right">--><?php //echo number_format(($tot_amt_payee), 2, '.', ','); ?><!--</th>-->
                </tr>


                <?php
                //UNSET TOTALS
                /*
                foreach($AllAllowDataEPF as $Allowdt){
                    unset(${$totalfull."_".$Allowdt->f_id});
                    unset($ALL_T);
                }

                foreach($AllAllowDataNOEPF as $Allowdt){
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


    function word_generator() {

        var month_nw = '<?php echo $main_data->month; ?>';

        var file_type_word = month_nw+'-Pay Sheet';

        if (!window.Blob) {
            alert('Your legacy browser does not support this action.');
            return;
        }

        var html, link, blob, url, css;

        // EU A4 use: size: 841.95pt 595.35pt;
        // US Letter use: size:11.0in 8.5in;

        css = (
            '<style>' +
            '@page WordSection1{size: 841.95pt 595.35pt;mso-page-orientation: landscape;}' +
            'div.WordSection1 {page: WordSection1;}' +
            'table{border-collapse:collapse;}td{border:1px gray solid;width:5em;padding:2px;}'+
            '</style>'
        );

        html = window.print_btn_1.innerHTML;
        blob = new Blob(['\ufeff', css + html], {
            type: 'application/msword'
        });
        url = URL.createObjectURL(blob);
        link = document.createElement('A');
        link.href = url;
        // Set default file name.
        // Word will append file extension - do not add an extension here.
        link.download = file_type_word;
        document.body.appendChild(link);
        if (navigator.msSaveOrOpenBlob ) navigator.msSaveOrOpenBlob( blob, ''+file_type_word+'.doc'); // IE10-11
        else link.click();  // other browsers
        document.body.removeChild(link);
    }

    function fnExcelReport() {

        var month_nw = '<?php echo $main_data->month; ?>';

        var file_type = month_nw+'-Pay Sheet';

        var tab_text = '<html xmlns:x="urn:schemas-microsoft-com:office:excel">';
        tab_text = tab_text + '<head><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet>';
        tab_text = tab_text + '<link href="<?php echo base_url('assets/global/css/default_print.css'); ?>" rel="stylesheet" type="text/css" />';

        tab_text = tab_text + '<x:Name>EPF REPORT</x:Name>';

        tab_text = tab_text + '<x:WorksheetOptions><x:Panes></x:Panes></x:WorksheetOptions></x:ExcelWorksheet>';
        tab_text = tab_text + '</x:ExcelWorksheets></x:ExcelWorkbook></xml></head><body>';

        tab_text = tab_text + "<table border='1px'>";
        tab_text = tab_text + $('#print_btn_1').html();
        tab_text = tab_text + '</table></body></html>';

        var data_type = 'data:application/vnd.ms-excel';

        var ua = window.navigator.userAgent;
        var msie = ua.indexOf("MSIE ");

        if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) {
            if (window.navigator.msSaveBlob) {
                var blob = new Blob([tab_text], {
                    type: "application/csv;charset=utf-8;"
                });
                navigator.msSaveBlob(blob, ''+file_type+'.xls');
            }
        } else {
            $('#test').attr('href', data_type + ', ' + encodeURIComponent(tab_text));
            $('#test').attr('download',''+file_type+'.xls');
        }

    }

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
