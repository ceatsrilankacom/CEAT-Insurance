<div style="float: left;font-size: small;">
    <div class="col-lg-12">
        <div style="float: right"><input type="submit" id="save" value="Print" class="btn btn-primary btn-sm" onclick="PrintDiv()">
        </div>
        <hr style="margin-top: 40px;margin-bottom: 20px;">
    </div>
    <div id="print_btn_1" width="1000px">
        <h4>Six Month Report - Part I</h4>
        <h4><?php echo $year; ?> </h4>
        <?php
        $count = 0;

        $full_contribution     = 0;
        $full_month_gross_0        = 0;
        $full_month_gross_1        = 0;
        $full_month_gross_2        = 0;
        $full_month_gross_3        = 0;
        $full_month_gross_4        = 0;
        $full_month_gross_5        = 0;
        $full_month_contribution_0 = 0;
        $full_month_contribution_1 = 0;
        $full_month_contribution_2 = 0;
        $full_month_contribution_3 = 0;
        $full_month_contribution_4 = 0;
        $full_month_contribution_5 = 0;
        foreach ($all_sixmonth_sheet as $sixmonth_sheet) {
            ?>
            <table border='1' class="pay-sheet horizontal r"  >
                <thead>
                <tr>
                    <th colspan="4"></th>
                    <th colspan="2">January</th>
                    <th colspan="2">February</th>
                    <th colspan="2">March</th>
                    <th colspan="2">April</th>
                    <th colspan="2">May</th>
                    <th colspan="2">June</th>
                </tr>
                <tr>
                    <th>Name</th>
                    <th>Emp No</th>
                    <th>NIC</th>
                    <th>Total Contribution</th>
                    <th>Total Earning</th>
                    <th>Contribution</th>
<!--                    <th>Gross</th>-->

                    <th>Total Earning</th>
                    <th>Contribution</th>
<!--                    <th>Gross</th>-->

                    <th>Total Earning</th>
                    <th>Contribution</th>
<!--                    <th>Gross</th>-->

                    <th>Total Earning</th>
                    <th>Contribution</th>
<!--                    <th>Gross</th>-->

                    <th>Total Earning</th>
                    <th>Contribution</th>
<!--                    <th>Gross</th>-->

                    <th>Total Earning</th>
                    <th>Contribution</th>
<!--                    <th>Gross</th>-->

                </tr>
                </thead>
                <tbody>
                <?php
                $tol_contribution     = 0;
                $month_gross_0        = 0;
                $month_gross_1        = 0;
                $month_gross_2        = 0;
                $month_gross_3        = 0;
                $month_gross_4        = 0;
                $month_gross_5        = 0;
                $month_contribution_0 = 0;
                $month_contribution_1 = 0;
                $month_contribution_2 = 0;
                $month_contribution_3 = 0;
                $month_contribution_4 = 0;
                $month_contribution_5 = 0;


                foreach ($sixmonth_sheet as $sheet) {
                    ?>
                    <tr>
                        <td><?php echo $sheet['name']; ?></td>
                        <td><?php echo $sheet['epfno']; ?></td>
                        <td><?php echo $sheet['nic']; ?></td>
                        <td><?php echo $sheet['total_contribution']; ?></td>
                        <td><?php echo $sheet['month_gross'][0]; ?></td>
                        <td><?php echo $sheet['month_contribution'][0]; ?></td>
                        <td><?php echo $sheet['month_gross'][1]; ?></td>
                        <td><?php echo $sheet['month_contribution'][1]; ?></td>
                        <td><?php echo $sheet['month_gross'][2]; ?></td>
                        <td><?php echo $sheet['month_contribution'][2]; ?></td>
                        <td><?php echo $sheet['month_gross'][3]; ?></td>
                        <td><?php echo $sheet['month_contribution'][3]; ?></td>
                        <td><?php echo $sheet['month_gross'][4]; ?></td>
                        <td><?php echo $sheet['month_contribution'][4]; ?></td>
                        <td><?php echo $sheet['month_gross'][5]; ?></td>
                        <td><?php echo $sheet['month_contribution'][5]; ?></td>
                    </tr>

                    <?php

                    $tol_contribution     = $tol_contribution + (str_replace(",", "", $sheet['total_contribution']));
                    $month_gross_0        = $month_gross_0 + (str_replace(",", "", $sheet['month_gross'][0]));
                    $month_gross_1        = $month_gross_1 + (str_replace(",", "", $sheet['month_gross'][1]));
                    $month_gross_2        = $month_gross_2 + (str_replace(",", "", $sheet['month_gross'][2]));
                    $month_gross_3        = $month_gross_3 + (str_replace(",", "", $sheet['month_gross'][3]));
                    $month_gross_4        = $month_gross_4 + (str_replace(",", "", $sheet['month_gross'][4]));
                    $month_gross_5        = $month_gross_5 + (str_replace(",", "", $sheet['month_gross'][5]));
                    $month_contribution_0 = $month_contribution_0 + (str_replace(",", "", $sheet['month_contribution'][0]));
                    $month_contribution_1 = $month_contribution_1 + (str_replace(",", "", $sheet['month_contribution'][1]));
                    $month_contribution_2 = $month_contribution_2 + (str_replace(",", "", $sheet['month_contribution'][2]));
                    $month_contribution_3 = $month_contribution_3 + (str_replace(",", "", $sheet['month_contribution'][3]));
                    $month_contribution_4 = $month_contribution_4 + (str_replace(",", "", $sheet['month_contribution'][4]));
                    $month_contribution_5 = $month_contribution_5 + (str_replace(",", "", $sheet['month_contribution'][5]));
                }
                ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td><strong>Page Total</strong></td>
                    <td><?php echo number_format($tol_contribution,2); ?></td>
                    <td><?php echo number_format($month_gross_0,2); ?></td>
                    <td><?php echo number_format($month_contribution_0,2); ?></td>
                    <td><?php echo number_format($month_gross_1,2); ?></td>
                    <td><?php echo number_format($month_contribution_1,2); ?></td>
                    <td><?php echo number_format($month_gross_2); ?></td>
                    <td><?php echo number_format($month_contribution_2,2); ?></td>
                    <td><?php echo number_format($month_gross_3,2); ?></td>
                    <td><?php echo number_format($month_contribution_3,2); ?></td>
                    <td><?php echo number_format($month_gross_4,2); ?></td>
                    <td><?php echo number_format($month_contribution_4,2); ?></td>
                    <td><?php echo number_format($month_gross_5,2); ?></td>
                    <td><?php echo number_format($month_contribution_5,2); ?></td>
                </tr>
                </tbody>
            </table>
            <?php $count++;

            $full_tol_contribution     = $full_tol_contribution + $tol_contribution;
            $full_month_gross_0        = $full_month_gross_0 + $month_gross_0;
            $full_month_gross_1        = $full_month_gross_1 + $month_contribution_1;
            $full_month_gross_2        = $full_month_gross_2 + $month_contribution_2;
            $full_month_gross_3        = $full_month_gross_3 + $month_contribution_3;
            $full_month_gross_4        = $full_month_gross_4 + $month_contribution_4;
            $full_month_gross_5        = $full_month_gross_5 + $month_contribution_5;
            $full_month_contribution_0 = $full_month_contribution_0 + $month_contribution_0;
            $full_month_contribution_1 = $full_month_contribution_1 + $month_contribution_1;
            $full_month_contribution_2 = $full_month_contribution_2 + $month_contribution_2;
            $full_month_contribution_3 = $full_month_contribution_3 + $month_contribution_3;
            $full_month_contribution_4 = $full_month_contribution_4 + $month_contribution_4;
            $full_month_contribution_5 = $full_month_contribution_5 + $month_contribution_5;
        }
        ?>

        <table border='1' class="pay-sheet horizontal r"  >
            <thead>
            <tr>
                <th colspan="4"></th>
                <th colspan="2">January</th>
                <th colspan="2">February</th>
                <th colspan="2">March</th>
                <th colspan="2">April</th>
                <th colspan="2">May</th>
                <th colspan="2">June</th>
            </tr>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th>Total Contribution</th>
                <th>Total Earning</th>
                <th>Contribution</th>


                <th>Total Earning</th>
                <th>Contribution</th>


                <th>Total Earning</th>
                <th>Contribution</th>


                <th>Total Earning</th>
                <th>Contribution</th>


                <th>Total Earning</th>
                <th>Contribution</th>


                <th>Total Earning</th>
                <th>Contribution</th>


            </tr>
            </thead>
        <tbody>
        <tr>
            <td style="width: 125px"></td>
            <td style="width: 50px"></td>
            <td><strong>Full Total</strong></td>
            <td><?php echo number_format($full_tol_contribution,2); ?></td>
            <td><?php echo number_format($full_month_gross_0,2); ?></td>
            <td><?php echo number_format($full_month_contribution_0,2); ?></td>
            <td><?php echo number_format($full_month_gross_1,2); ?></td>
            <td><?php echo number_format($full_month_contribution_1,2); ?></td>
            <td><?php echo number_format($full_month_gross_2); ?></td>
            <td><?php echo number_format($full_month_contribution_2,2); ?></td>
            <td><?php echo number_format($full_month_gross_3,2); ?></td>
            <td><?php echo number_format($full_month_contribution_3,2); ?></td>
            <td><?php echo number_format($full_month_gross_4,2); ?></td>
            <td><?php echo number_format($full_month_contribution_4,2); ?></td>
            <td><?php echo number_format($full_month_gross_5,2); ?></td>
            <td><?php echo number_format($full_month_contribution_5,2); ?></td>
        </tr>
        </tbody>
        </table>

        <hr>

        <table>
            <tbody>
            <tr height=22 style='height:16.5pt'>
                <td height=22 class=xl66 style='height:16.5pt'></td>
                <td class=xl120 colspan=3 style='mso-ignore:colspan'>…………………………………………</td>
                <td class=xl66></td>
                <td class=xl66></td>
                <td class=xl66></td>
                <td class=xl66></td>
                <td class=xl66></td>
                <td class=xl66></td>
                <td class=xl66></td>
                <td class=xl66></td>
                <td class=xl66></td>
                <td class=xl66></td>
                <td class=xl66></td>
                <td class=xl66></td>
                <td class=xl66></td>
                <td class=xl66></td>
                <td class=xl66></td>
            </tr>
            <tr height=22 style='height:16.5pt'>
                <td height=22 class=xl66 style='height:16.5pt'></td>
                <td class=xl120 colspan=3 style='mso-ignore:colspan'>Signature of Employer.</td>
                <td class=xl66></td>
                <td class=xl66></td>
                <td class=xl66></td>
                <td class=xl66></td>
                <td class=xl66></td>
                <td class=xl66></td>
                <td class=xl66></td>
                <td class=xl66></td>
                <td class=xl66></td>
                <td class=xl66></td>
                <td class=xl66></td>
                <td class=xl66></td>
                <td class=xl66></td>
                <td class=xl66></td>
                <td class=xl66></td>
            </tr>
            <tr height=22 style='height:16.5pt'>
                <td height=22 class=xl66 style='height:16.5pt'></td>
                <td class=xl120 colspan=4 style='mso-ignore:colspan'>Telephone:
                    ………………………………..</td>
                <td class=xl66></td>
                <td class=xl66></td>
                <td class=xl66></td>
                <td class=xl66></td>
                <td class=xl66></td>
                <td class=xl66></td>
                <td class=xl66></td>
                <td class=xl66></td>
                <td class=xl66></td>
                <td class=xl66></td>
                <td class=xl66></td>
                <td class=xl66></td>
                <td class=xl66></td>
                <td class=xl66></td>
            </tr>
            <tr height=22 style='height:16.5pt'>
                <td height=22 class=xl66 style='height:16.5pt'></td>
                <td class=xl120 colspan=3 style='mso-ignore:colspan'>Fax: ………………………………..</td>
                <td class=xl66></td>
                <td class=xl66></td>
                <td class=xl66></td>
                <td class=xl66></td>
                <td class=xl66></td>
                <td class=xl66></td>
                <td class=xl66></td>
                <td class=xl66></td>
                <td class=xl66></td>
                <td class=xl66></td>
                <td class=xl66></td>
                <td class=xl66></td>
                <td class=xl66></td>
                <td class=xl66></td>
                <td class=xl66></td>
            </tr>
            <tr height=22 style='height:16.5pt'>
                <td height=22 class=xl66 style='height:16.5pt'></td>
                <td class=xl120 colspan=4 style='mso-ignore:colspan'>E-mail: ……………………………………</td>
                <td class=xl66></td>
                <td class=xl66></td>
                <td class=xl66></td>
                <td class=xl66></td>
                <td class=xl66></td>
                <td class=xl66></td>
                <td class=xl66></td>
                <td class=xl66></td>
                <td class=xl66></td>
                <td class=xl66></td>
                <td class=xl66></td>
                <td class=xl66></td>
                <td class=xl66></td>
                <td class=xl66></td>
            </tr>
            </tbody>
        </table>

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
