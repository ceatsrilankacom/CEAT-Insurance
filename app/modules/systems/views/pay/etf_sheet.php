<div  style="float: left;font-size: small;" >

    <div class="container1">

        <div class="col-lg-10">
            <a href="#" id="test1" class="btn btn-primary btn-sm pull-right" style="color:#FFFFFF;margin-right: 10px;background: #3385b6 !important;border-color: #3385b6" onClick="javascript:PrintDiv();">Print</a>
            <a href="#" id="test" class="btn btn-primary btn-sm pull-right" style="color:#FFFFFF;margin-right: 10px;background: #3385b6 !important;border-color: #3385b6" onClick="javascript:fnExcelReport();">Excel</a>
            <a href="#" id="export" class="btn btn-primary btn-sm pull-right" style="color:#FFFFFF;margin-right: 10px;background: #3385b6 !important;border-color: #3385b6" onClick="javascript:word_generator();">Word</a>
            </div>
            <hr style="margin-top: 40px;margin-bottom: 20px;">
        </div>
        <!--//JE End-->
        <div class="col-lg-12"  id="print_btn_1">
            <div  class="table-responsive">
            <h5>ETF REPORT : <?php echo $emp_type; ?> :: <?php echo $branch; ?> <?php echo ($dep_mod!=0)?' :: '.$dep_name:''; ?></h5>


                <table style="border-collapse:
 collapse;table-layout:fixed;width:957pt" width="1276" cellspacing="0" cellpadding="0" border="0">
                    <colgroup><col class="xl66" style="width:48pt" span="2" width="64">
                        <col class="xl65" style="mso-width-source:userset;mso-width-alt:2889;
 width:59pt" width="79">
                        <col class="xl65" style="mso-width-source:userset;mso-width-alt:3108;
 width:64pt" width="85">
                        <col class="xl65" style="mso-width-source:userset;mso-width-alt:3328;
 width:68pt" width="91">
                        <col class="xl66" style="mso-width-source:userset;mso-width-alt:9545;
 width:196pt" width="261">
                        <col class="xl67" style="mso-width-source:userset;mso-width-alt:3364;
 width:69pt" width="92">
                        <col class="xl67" style="mso-width-source:userset;mso-width-alt:3474;
 width:71pt" width="95">
                        <col class="xl66" style="width:48pt" width="64">
                        <col class="xl66" style="mso-width-source:userset;mso-width-alt:6912;
 width:142pt" width="189">
                        <col class="xl66" style="width:48pt" span="3" width="64">
                    </colgroup><tbody><tr style="height:17.25pt" height="23">
                        <td class="xl66" style="height:17.25pt;width:48pt" width="64" height="23"></td>
                        <td class="xl66" style="width:48pt" width="64"></td>
                        <td class="xl65" style="width:59pt" width="79"></td>
                        <td class="xl65" style="width:64pt" width="85"></td>
                        <td class="xl65" style="width:68pt" width="91"></td>
                        <td class="xl66" style="width:196pt" width="261"></td>
                        <td class="xl67" style="width:69pt" width="92"></td>
                        <td class="xl67" style="width:71pt" width="95"></td>
                        <td class="xl66" style="width:48pt" width="64"></td>
                        <td class="xl66" style="width:142pt" width="189"></td>
                        <td class="xl66" style="width:48pt" width="64"></td>
                        <td class="xl66" style="width:48pt" width="64"></td>
                        <td class="xl66" style="width:48pt" width="64"></td>
                    </tr>
                    <tr style="height:16.5pt" height="22">
                        <td class="xl66" style="height:16.5pt" height="22"></td>
                        <td class="xl103">&nbsp;</td>
                        <td class="xl86"><a name="Print_Area">&nbsp;</a></td>
                        <td class="xl86">&nbsp;</td>
                        <td class="xl86">&nbsp;</td>
                        <td class="xl87" colspan="2" style="mso-ignore:colspan"> 	EMPLOYEES TRUST FUND BOARD</td>
                        <td class="xl89">&nbsp;</td>
                        <td class="xl90">&nbsp;</td>
                        <td class="xl66"></td>
                        <td class="xl66"></td>
                        <td class="xl66"></td>
                        <td class="xl66"></td>
                    </tr>
                    <tr style="height:16.5pt" height="22">
                        <td class="xl66" style="height:16.5pt" height="22"></td>
                        <td class="xl104">&nbsp;</td>
                        <td class="xl65"></td>
                        <td class="xl65"></td>
                        <td class="xl65"></td>
                        <td class="xl91"></td>
                        <td class="xl66"></td>
                        <td class="xl67"></td>
                        <td class="xl92">&nbsp;</td>
                        <td class="xl66"></td>
                        <td class="xl66"></td>
                        <td class="xl66"></td>
                        <td class="xl66"></td>
                    </tr>
                    <tr style="height:16.5pt" height="22">
                        <td class="xl66" style="height:16.5pt" height="22"></td>
                        <td class="xl93" colspan="4" style="mso-ignore:colspan">Company Name:<?php echo COMPANY_NAME; ?></td>
                        <td class="xl66"></td>
                        <td class="xl94" colspan="3" style="mso-ignore:colspan;border-right:1.0pt solid black"><span style="mso-spacerun:yes">&nbsp;</span>ETF Register Number:……………<span style="mso-spacerun:yes">&nbsp;</span></td>
                        <td class="xl66"></td>
                        <td class="xl66"></td>
                        <td class="xl66"></td>
                        <td class="xl66"></td>
                    </tr>
                    <tr style="height:16.5pt" height="22">
                        <td class="xl66" style="height:16.5pt" height="22"></td>
                        <td class="xl93" colspan="4" style="mso-ignore:colspan">Company Address:<?php echo COMPANY_ADDRESS; ?></td>
                        <td class="xl66"></td>
                        <td class="xl96" colspan="3" style="mso-ignore:colspan;border-right:1.0pt solid black"><span style="mso-spacerun:yes">&nbsp;</span>Month : <?php echo $month; ?><span style="mso-spacerun:yes">&nbsp;</span></td>
                        <td class="xl66"></td>
                        <td class="xl66"></td>
                        <td class="xl66"></td>
                        <td class="xl66"></td>
                    </tr>
                    <tr style="height:16.5pt" height="22">
                        <td class="xl66" style="height:16.5pt" height="22"></td>
                        <td class="xl104">&nbsp;</td>
                        <td class="xl101"></td>
                        <td class="xl65"></td>
                        <td class="xl65"></td>
                        <td class="xl66"></td>
                        <td class="xl96" colspan="3" style="mso-ignore:colspan;border-right:1.0pt solid black"><span style="mso-spacerun:yes">&nbsp;</span>Chq No:……………………….<span style="mso-spacerun:yes">&nbsp;</span></td>
                        <td class="xl66"></td>
                        <td class="xl66"></td>
                        <td class="xl66"></td>
                        <td class="xl66"></td>
                    </tr>
                    <tr style="height:16.5pt" height="22">
                        <td class="xl66" style="height:16.5pt" height="22"></td>
                        <td class="xl104">&nbsp;</td>
                        <td class="xl102"></td>
                        <td class="xl65"></td>
                        <td class="xl65"></td>
                        <td class="xl66"></td>
                        <td class="xl96" colspan="3" style="mso-ignore:colspan;border-right:1.0pt solid black"><span style="mso-spacerun:yes">&nbsp;</span>Total Remittance :………………<span style="mso-spacerun:yes">&nbsp;</span></td>
                        <td class="xl66"></td>
                        <td class="xl66"></td>
                        <td class="xl66"></td>
                        <td class="xl66"></td>
                    </tr>
                    <tr style="height:16.5pt" height="22">
                        <td class="xl66" style="height:16.5pt" height="22"></td>
                        <td class="xl104">&nbsp;</td>
                        <td class="xl65"></td>
                        <td class="xl65"></td>
                        <td class="xl65"></td>
                        <td class="xl66"></td>
                        <td class="xl96" colspan="3" style="mso-ignore:colspan;border-right:1.0pt solid black"><span style="mso-spacerun:yes">&nbsp;</span>Bank &amp; Branch:………………<span style="mso-spacerun:yes">&nbsp;</span></td>
                        <td class="xl66"></td>
                        <td class="xl66"></td>
                        <td class="xl66"></td>
                        <td class="xl66"></td>
                    </tr>
                    <tr style="height:17.25pt" height="23">
                        <td class="xl66" style="height:17.25pt" height="23"></td>
                        <td class="xl104">&nbsp;</td>
                        <td class="xl65"></td>
                        <td class="xl65"></td>
                        <td class="xl65"></td>
                        <td class="xl66"></td>
                        <td class="xl67"></td>
                        <td class="xl67"></td>
                        <td class="xl92">&nbsp;</td>
                        <td class="xl66"></td>
                        <td class="xl66"></td>
                        <td class="xl66"></td>
                        <td class="xl66"></td>
                    </tr>

                    </tbody>
                </table>

            <table id="pay-sheet-one" class="pay-sheet"  style="font-size: 12px;" border="1">
<!--               --><?php //if($emp_type_id=='1'){ ?>
                <thead>
                <tr class="c"><th class="w2"  style="text-align: center">#</th>
                    <th class="w6"  style="text-align: center">EPF Number</th>
                    <th class="w6"  style="text-align: center">NIC Number</th>
                    <th class="w20" style="text-align: center">Name</th>
                    <th class="w15"  style="text-align: center">Salary For The Fund </th>
                    <th class="w6"  style="text-align: center">ETF (3%)</th>
                </tr>
                </thead>
            <?php
            $counter = 1;
                   foreach ($sheet_data as $sheet => $data) {
                                ?>
                                <tr>
                                    <td><?php echo $counter; ?></td>
                                    <td><?php echo 'A-043923-'.str_pad($data['epf_no'],6,"0",STR_PAD_LEFT); ?></td>
                                    <td><?php echo $data['nic'] ?></td>
                                    <td><?php echo $data['name'] ?></td>
                                    <td style="text-align: right"><?php echo ($data['gross'] != 0) ? number_format((float)$data['gross'], 2, '.', ',') : '-'; ?></td>
                                    <td style="text-align: right"><?php echo ($data['etf'] != 0) ? number_format((float)$data['etf'], 2, '.', ',') : '-'; ?></td>
                                    <!--<td style="text-align: right"><?php /*echo number_format((float)($data['epf']+$data['epf12']), 2, '.', ','); */?></td>-->
                                </tr>

                                <?php

                                $gross += $data['gross'];
                                $epf += $data['epf'];
                                $etf += $data['etf'];
                                $epf12 += $data['epf12'];
                       $counter++;
                                }
                            ?>

                        <tr class="total">
                            <th class="l" colspan="4" style="text-align: center">Total</th>
                            <th style="text-align: right"><?php echo number_format(($gross), 2, '.', ','); ?></th>
                            <!--<th style="text-align: right"><?php /*echo number_format(round($epf), 2, '.', ','); */?></th>-->
                            <th style="text-align: right"><?php echo number_format(($etf), 2, '.', ','); ?></th>
                            <!--<th style="text-align: right"><?php /*echo number_format(round($epf12), 2, '.', ','); */?></th>-->
                        </tr>
                <!--//JE Add End-->
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

        var file_type_word = month_nw+'-ETF Sheet';

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

        var file_type = month_nw+'-ETF Sheet';

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
        popupWin.document.write('<html><body onload="window.print()">');
        popupWin.document.write('');
        popupWin.document.write(divToPrint.innerHTML );
        popupWin.document.write('</html>');
        popupWin.document.close();
//        window.location="<?php //echo base_url('invt_supplies/pur_order')?>//";
    }

</script>
