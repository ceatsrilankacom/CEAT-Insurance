<div class="col-lg-12">
    <div style="">
        <a href="#" id="test1" class="btn btn-primary btn-sm pull-right" style="color:#FFFFFF;margin-right: 10px;background: #3385b6 !important;border-color: #3385b6" onClick="javascript:PrintDiv();">Print</a>
        <a href="#" id="test" class="btn btn-primary btn-sm pull-right" style="color:#FFFFFF;margin-right: 10px;background: #3385b6 !important;border-color: #3385b6" onClick="javascript:fnExcelReport();">Excel</a>
        <a href="#" id="export" class="btn btn-primary btn-sm pull-right" style="color:#FFFFFF;margin-right: 10px;background: #3385b6 !important;border-color: #3385b6" onClick="javascript:word_generator();">Word</a>
        </div>
    </div>
    <hr style="margin-top: 40px;margin-bottom: 20px;">
</div>
<div class="col-lg-12"  id="print_btn_1">
<?php
$this->load->model('payroll_process_mod');
$count = count($month_range);
$page_count = 0;

foreach ($all_data_epf as $data_epf){
    $page_count++;
?>
    <table style="width: 100%; font-size:8pt; page-break-inside: avoid;margin-bottom: 40px;margin-top: 30px;">
        <tbody><tr><td class="w15" rowspan="3" style="width:150px"><img alt="" src="<?php echo base_url('assets/images/etfb.jpg') ?>"></td><td colspan="2" style="font-size: large; font-weight: 700" rowspan="2" valign="top">EMPLOYEES TRUST FUND BOARD</td><td class="w15" valign="top">Total No. of Employees</td><td class="dots w15" valign="top"><?php echo $employee_count; ?></td></tr>
        <tr><td valign="top">Page Number</td><td class="dots w15" valign="top"><?php echo $page_count;?></td></tr> <tr><td>FORM II RETURN</td><td valign="top">Return for the Period: <?php echo $date_range; ?></td><td valign="top">&nbsp;</td><td valign="top">&nbsp;</td></tr>
        </tbody></table>
<table style="width: 100%; font-size:70%" class="horizontal" border="1">
            <thead>
            <tr>
                <th rowspan="3" style="width:250px">Name of Member</th>
                <th class="w6" rowspan="3">Member's Number</th>
                <th class="w8" rowspan="3">National Identity Card No.</th>
                <th class="w8" rowspan="3">Total Contributions</th>
                <th colspan="<?php echo $count*2; ?>">Total Gross Wages and Contribution</th>
            </tr>
            <tr>
                <?php
                foreach($month_range as $range){
                $month = explode('-',$range);
                ?>
                <th colspan="2"><?php echo $month[0].' '.date("F", strtotime($range)); ?></th>
                    <?php
                }
                ?>
            </tr>
            <tr>
                <?php
                foreach($month_range as $range){
                $month = explode('-',$range);
                ?>
                <th class="w7">Earnings</th>
                <th class="w7">Cont.</th>
                    <?php
                }
                ?>
            </tr>
            </thead>
            <tbody>
            <?php
            $total_contribution = 0;
            foreach ($data_epf as $epf){ ?>
            <tr class="r">
                <td class="l" style="text-align: left"><?php echo $epf['name']; ?></td>
                <td class="c" style="text-align: right"><?php echo $epf['code']; ?></td>
                <td class="c" style="text-align: right"><?php echo $epf['nic']; ?></td>
                <td class="c" style="text-align: right;">
                    <?php
                    echo ($epf['total_cont']>0)?number_format((float)$epf['total_cont'], 2, '.', ','):'-';
                    $total_contribution += $epf['total_cont'];

                    $page_total[$page_count] =  $total_contribution;
                    ?>
                </td>

                <?php
                foreach($month_range as $range){
                ?>
                <td style="text-align: right;">
                    <?php echo ($epf['amount'][$range][0]>0)? number_format((float)$epf['amount'][$range][0], 2, '.', ','):'-';  ?></td>
                    <td>
                        <?php echo ($epf['amount'][$range][1]>0)?  number_format((float)$epf['amount'][$range][1], 2, '.', ','):'-'; ?></td>

                <?php
                    $total_amount[$range][0]+=$epf['amount'][$range][0];
                    $total_amount[$range][1]+=$epf['amount'][$range][1];
                }
                ?>
            </tr>
            <?php }?>
            <tr class="total2 r">
                <td colspan="3">Page Total</td>
                <td> <?php echo ($total_contribution>0)? number_format((float)$total_contribution, 2, '.', ','):'-';  ?></td>
                <?php
                foreach($month_range as $range){
                ?>
                <td><?php echo ($total_amount[$range][0]>0)? number_format((float)$total_amount[$range][0], 2, '.', ','):'-';  ?></td>
                <td><?php echo ($total_amount[$range][1]>0)? number_format((float)$total_amount[$range][1], 2, '.', ','):'-';  ?></td>
                <?php
                    $sub_total[$range][$page_count] = $total_amount[$range][1];
                }

                ?>

            </tr>
            </tbody>
        </table>
    <table style="width: 100%; font-size:8pt; page-break-inside: avoid;margin-top: 20px; margin-bottom: 50px;" cellspacing="10">
        <tbody>
        <tr>
            <td style="width: 200px">Employers Registration No.</td>
            <td class="w200">D 018257</td>
            <td class="w10" rowspan="3">
                <hr style="color: #FFFFFF" width="150px" noshade="noshade">
            </td>
            <td rowspan="3" valign="top">I certify that all the particulars given above are correct and that no part of the contributions that should be paid by us has been deducted from any employee's earnings;</td>
        </tr>

        <?php
            $employer_details = $this->payroll_process_mod->get_employer_details();
        ?>
        <tr>
            <td>Name &amp; Address of the Employer</td>
            <td><?php echo $employer_details->name, $employer_details->address,$employer_details->address_2; ?></td>
        </tr>
        <tr>
            <td>Telephone No.</td>
            <td><?php echo $employer_details->phone; ?></td>
        </tr>
        <tr>
            <td>Fax No.</td>
            <td><?php echo $employer_details->fax; ?></td>
            <td class="dots1">Date</td>
            <td class="dots1">Director</td>
        </tr>
        </tbody>
    </table>

    <hr>
<?php

unset($total_amount);
} ?>

<div><h3 style="page-break-before:always;text-align: center;margin-top: 30px;"><b>EMPLOYEE'S TRUST FUND BOARD<br>RETURN FOR THE HALF YEAR <?php echo $date_range; ?><br>SUMMERY</b></h3></div>

<table style="width: 100%; font-size:70%" class="horizontal" border="1">
    <thead>
    <tr>
        <th>Page No.</th>
        <th class="p12" style="text-align: center">Page Total</th>
        <?php
        foreach($month_range as $range){
            $month = explode('-',$range);
            ?>
            <th class="p12" style="text-align: center"><?php echo $month[0].' '.date("F", strtotime($range)); ?></th>
            <?php
        }
        ?>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($all_data_epf as $data_epf){
    $new_page_count++;
    ?>
    <tr class="r">
        <td class="c"><?php echo $new_page_count; ?></td>
        <td class="c" style="text-align: right;">
            <?php echo ($page_total[$new_page_count]>0)? number_format((float)$page_total[$new_page_count], 2, '.', ','):'-'; ?>
        </td>
        <?php
        foreach($month_range as $range){
            ?>
            <td class="c" style="text-align: right;">
                <?php echo ($sub_total[$range][$new_page_count]>0)? number_format((float)$sub_total[$range][$new_page_count], 2, '.', ','):'-'; ?></td>
            <?php

            $grand_total[$range] += $sub_total[$range][$new_page_count];
        }
        ?>
    </tr>
    <?php
    $sub_page_total +=$page_total[$new_page_count];
    } ?>
    <tr class="total2 r" style="text-align: center">
        <td><b>Grand Total</b></td>
        <td><?php echo ($sub_page_total>0)? number_format((float)$sub_page_total, 2, '.', ','):'-'; ?></td>
        <?php
        foreach($month_range as $range){
            ?>
            <td style="text-align: right;"><?php echo ($grand_total[$range]>0)? number_format((float)$grand_total[$range], 2, '.', ','):'-'; ?></td>
            <?php
        }
        ?>
    </tr>
    </tbody> </table>

<div style="margin-top: 50px;margin-bottom: 30px;text-align: center">
    <h3 style="page-break-before:always"><b>EMPLOYEE'S TRUST FUND BOARD<br>RETURN FOR THE HALF YEAR <?php echo $date_range; ?><br>CONTRIBUTOR'S RECONCILIATION STATEMENT</b></h3>
</div>
<div><h4>01. DETAILS OF PAYMENTS</h4></div>

<table style="width: 100%" class="horizontal">
    <thead>
    <tr>
        <th class="w15">Month</th>
        <th class="w10">Total Monthly Contributions Payable as per Form II Return</th>
        <th class="w10">Amount Remitted Monthly</th>
        <th class="w10">Over/Under</th>
        <th class="w10">Cheque No.</th>
        <th class="w10">Cheque Amount</th>
        <th>Name &amp; Branch of Bank WHERE Payment was Made<br>(If Paid by Cash)</th>
        <th class="w10">Date of Payment</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach($month_range as $range){
        $month = explode('-',$range);
        ?>
        <tr class="r">
            <td class="c"><?php echo $month[0].' '.date("F", strtotime($range)); ?></td>
            <td style="text-align: right"><?php echo ($grand_total[$range]>0)? number_format((float)$grand_total[$range], 2, '.', ','):'-'; ?></td>
            <td style="text-align: right"><?php echo ($grand_total[$range]>0)? number_format((float)$grand_total[$range], 2, '.', ','):'-'; ?></td>
            <td></td>
            <td></td>
            <td style="text-align: right"><?php echo ($grand_total[$range]>0)? number_format((float)$grand_total[$range], 2, '.', ','):'-'; ?></td>
            <td></td>
            <td></td>
        </tr>
        <?php
        $total_month_cont +=$grand_total[$range];
        $total_remitance +=$grand_total[$range];
        $total_cheque +=$grand_total[$range];
    }
    ?>

    <tr class="total2 r">
        <td class="c">Total</td>
        <td><?php echo ($total_month_cont>0)? number_format((float)$total_month_cont, 2, '.', ','):'-'; ?></td>
        <td><?php echo ($total_remitance>0)? number_format((float)$total_remitance, 2, '.', ','):'-'; ?></td>
        <td></td>
        <td></td>
        <td><?php echo ($total_cheque>0)? number_format((float)$total_cheque, 2, '.', ','):'-'; ?></td>
        <td></td>
        <td></td>
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
<script>

    function word_generator() {

        var file_type_word ='ETF Report';

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


        var file_type = 'ETF Report';

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
        var popupWin = window.open('', '_blank', 'width=1400,height=1200');
        popupWin.document.open();
        popupWin.document.write('<html><head><link href="<?php echo base_url('assets/css/default_print.css'); ?>" rel="stylesheet" type="text/css" /></head><body onload="window.print()">');
        popupWin.document.write('');
        popupWin.document.write(divToPrint.innerHTML );
        popupWin.document.write('</html>');
        popupWin.document.close();
    }
</script>