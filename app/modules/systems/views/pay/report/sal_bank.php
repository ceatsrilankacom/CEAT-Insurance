<div  style="float: left;" >

    <div class="container1">

        <div class="col-lg-12">
            <div style="">
                <a href="#" id="test1" class="btn btn-primary btn-sm pull-right" style="color:#FFFFFF;margin-right: 10px;background: #3385b6 !important;border-color: #3385b6" onClick="javascript:PrintDiv();">Print</a>
                <a href="#" id="test" class="btn btn-primary btn-sm pull-right" style="color:#FFFFFF;margin-right: 10px;background: #3385b6 !important;border-color: #3385b6" onClick="javascript:fnExcelReport();">Excel</a>
                <a href="#" id="export" class="btn btn-primary btn-sm pull-right" style="color:#FFFFFF;margin-right: 10px;background: #3385b6 !important;border-color: #3385b6" onClick="javascript:word_generator();">Word</a>
                </div>
            </div>
            <hr style="margin-top: 40px;margin-bottom: 20px;">
        </div>

        <hr style="margin-top: 40px;margin-bottom: 20px;">
        <!--//JE End-->
        <div class="col-lg-12"  id="print_btn_1">

            <div  class="" >
                <h5><b>Bank Details List for Salary : <?echo $month ?></b></h5>
                <table id="pay-sheet-one"  class="verticle r" border="1" style="width: 100%; font-size:12px">
                    <thead>
                    <tr><th   style="text-align: center">NO.</th>
                        <th   style="text-align: center">EPF NO</th>
                        <th   style="text-align: center">NAME</th>
                        <th  style="text-align: center">ACCOUNT NUMBER</th>
                        <th  style="text-align: center">AMOUNT</th>
                        <th  rowspan="" style="text-align: center">BANK CODE</th>
                        <th  rowspan="" style="text-align: center">BRANCH CODE</th>
                        <th  rowspan="" style="text-align: center">Cheque</th>
                    </tr>
                    </thead>
                    <?php

                    $count =1 ;
                    foreach ($sheet_data_2 as $sheet => $data) {
                        ?>
                        <tr>
                            <td><?php echo $count; ?></td>
                            <td style="text-align: left"><?php echo 'A-043923-'.str_pad($data['epf_no'],6,"0",STR_PAD_LEFT); ?></td>
                            <td style="text-align: left"><?php echo $data['name'] ?></td>

                            <td><?php echo $data['account_no'] ?></td>
                            <td style="text-align: right"><?php echo ($data['amount_payable'] != 0) ? number_format((float)$data['amount_payable'], 2, '.', ',') : '-'; ?></td>
                            <td><?php echo $data['bank_name'] ?></td>
                            <td><?php echo $data['branch_name'] ?></td>
                            <td>&nbsp;</td>
                        </tr>
                        <?php

                        $amount_payable_2 += $data['amount_payable'];

                        $count++;

                    } ?>

                    <tr class="total">
                        <th class="l" colspan="4" style="text-align: center">Total</th>
                        <th style="text-align: right"><?php echo number_format(round($amount_payable_2), 2, '.', ','); ?></th>                            <th colspan="3" style="text-align: right"></th>

                    </tr>

                </table>
            </div>




            <div  class="" >
                <h5><b>Totals for Salary : </b></h5>
                <table id="pay-sheet-one"  class="verticle r" border="1" style="width: 100%; font-size:12px">
                    <thead>
                    <tr><th   style="text-align: center">DETAILS</th>
                        <th  style="text-align: center">AMOUNT</th>
                    </tr>
                    </thead>
                    <tr class="total">
                        <th class="l" style="text-align: center">Total</th>
                        <th style="text-align: right"><?php echo number_format(round($amount_payable_1+$amount_payable_2+$amount_payable_3+$amount_payable_4), 2, '.', ','); ?></th>

                    </tr>

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
    </div>
</div>

<script>

    function word_generator() {

        var month_nw = '<?php echo $month; ?>';

        var file_type_word = month_nw+'-Bank Details';

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

        var month_nw = '<?php echo $month; ?>';

        var file_type = month_nw+'-Bank Details';

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
        var popupWin = window.open('', '_blank', 'width=500,height=600');
        popupWin.document.open();
        popupWin.document.write('<html><head><link href="<?php echo base_url('assets/css/default_print.css'); ?>" rel="stylesheet" type="text/css" /></head><body onload="window.print()">');
        popupWin.document.write('');
        popupWin.document.write(divToPrint.innerHTML );
        popupWin.document.write('</html>');
        popupWin.document.close();
    }
</script>