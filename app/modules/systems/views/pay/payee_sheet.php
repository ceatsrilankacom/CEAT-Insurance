<div  style="float: left;font-size: small;" >

    <div class="container1">

        <div class="col-lg-10">
            <div style="float: right"><input type="submit" id="save" value="Print" class="btn btn-primary btn-sm" onclick="PrintDiv()">
            </div>
            <hr style="margin-top: 40px;margin-bottom: 20px;">
        </div>
        <!--//JE End-->
        <div class="col-lg-12"  id="print_btn_1">
            <div  class="table-responsive">
            <h5>PAYEE TAX SUMMARY FOR THE MONTH OF : <?php echo date('Y',strtotime($month)).'-'.date("F", strtotime($month)); ?></h5>

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
                        <td class="xl87" colspan="2" style="mso-ignore:colspan">PAYEE TAX SUMMARY REPORT</td>
                        <td class="xl89">&nbsp;</td>
                        <td class="xl90">&nbsp;</td>
                        <td class="xl66"></td>
                        <td class="xl66"></td>
                        <td class="xl66"></td>
                        <td class="xl66"></td>
                    </tr>
<!--                    <tr style="height:16.5pt" height="22">-->
<!--                        <td class="xl66" style="height:16.5pt" height="22"></td>-->
<!--                        <td class="xl104">&nbsp;</td>-->
<!--                        <td class="xl65"></td>-->
<!--                        <td class="xl65"></td>-->
<!--                        <td class="xl65"></td>-->
<!--                        <td class="xl91"></td>-->
<!--                        <td class="xl66"></td>-->
<!--                        <td class="xl67"></td>-->
<!--                        <td class="xl92">&nbsp;</td>-->
<!--                        <td class="xl66"></td>-->
<!--                        <td class="xl66"></td>-->
<!--                        <td class="xl66"></td>-->
<!--                        <td class="xl66"></td>-->
<!--                    </tr>-->
<!--                    <tr style="height:16.5pt" height="22">-->
<!--                        <td class="xl66" style="height:16.5pt" height="22"></td>-->
<!--                        <td class="xl93" colspan="4" style="mso-ignore:colspan">Company Name:--><?php //echo COMPANY_NAME; ?><!--</td>-->
<!--                        <td class="xl66"></td>-->
<!--                        <td class="xl94" colspan="3" style="mso-ignore:colspan;border-right:1.0pt solid black"><span style="mso-spacerun:yes">&nbsp;</td>-->
<!--                        <td class="xl66"></td>-->
<!--                        <td class="xl66"></td>-->
<!--                        <td class="xl66"></td>-->
<!--                        <td class="xl66"></td>-->
<!--                    </tr>-->
<!--                    <tr style="height:16.5pt" height="22">-->
<!--                        <td class="xl66" style="height:16.5pt" height="22"></td>-->
<!--                        <td class="xl93" colspan="4" style="mso-ignore:colspan">Company Address:--><?php //echo COMPANY_ADDRESS; ?><!--</td>-->
<!--                        <td class="xl66"></td>-->
<!--                        <td class="xl96" colspan="3" style="mso-ignore:colspan;border-right:1.0pt solid black"><span style="mso-spacerun:yes">&nbsp;</span>Month : --><?php //echo $month; ?><!--<span style="mso-spacerun:yes">&nbsp;</span></td>-->
<!--                        <td class="xl66"></td>-->
<!--                        <td class="xl66"></td>-->
<!--                        <td class="xl66"></td>-->
<!--                        <td class="xl66"></td>-->
<!--                    </tr>-->
<!--                    <tr style="height:16.5pt" height="22">-->
<!--                        <td class="xl66" style="height:16.5pt" height="22"></td>-->
<!--                        <td class="xl104">&nbsp;</td>-->
<!--                        <td class="xl101"></td>-->
<!--                        <td class="xl65"></td>-->
<!--                        <td class="xl65"></td>-->
<!--                        <td class="xl66"></td>-->
<!--                        <td class="xl96" colspan="3" style="mso-ignore:colspan;border-right:1.0pt solid black"><span style="mso-spacerun:yes">&nbsp;</span>Chq No:……………………….<span style="mso-spacerun:yes">&nbsp;</span></td>-->
<!--                        <td class="xl66"></td>-->
<!--                        <td class="xl66"></td>-->
<!--                        <td class="xl66"></td>-->
<!--                        <td class="xl66"></td>-->
<!--                    </tr>-->
<!--                    <tr style="height:16.5pt" height="22">-->
<!--                        <td class="xl66" style="height:16.5pt" height="22"></td>-->
<!--                        <td class="xl104">&nbsp;</td>-->
<!--                        <td class="xl102"></td>-->
<!--                        <td class="xl65"></td>-->
<!--                        <td class="xl65"></td>-->
<!--                        <td class="xl66"></td>-->
<!--                        <td class="xl96" colspan="3" style="mso-ignore:colspan;border-right:1.0pt solid black"><span style="mso-spacerun:yes">&nbsp;</span>Total Remittance :………………<span style="mso-spacerun:yes">&nbsp;</span></td>-->
<!--                        <td class="xl66"></td>-->
<!--                        <td class="xl66"></td>-->
<!--                        <td class="xl66"></td>-->
<!--                        <td class="xl66"></td>-->
<!--                    </tr>-->
<!--                    <tr style="height:16.5pt" height="22">-->
<!--                        <td class="xl66" style="height:16.5pt" height="22"></td>-->
<!--                        <td class="xl104">&nbsp;</td>-->
<!--                        <td class="xl65"></td>-->
<!--                        <td class="xl65"></td>-->
<!--                        <td class="xl65"></td>-->
<!--                        <td class="xl66"></td>-->
<!--                        <td class="xl96" colspan="3" style="mso-ignore:colspan;border-right:1.0pt solid black"><span style="mso-spacerun:yes">&nbsp;</span>Bank &amp; Branch:………………<span style="mso-spacerun:yes">&nbsp;</span></td>-->
<!--                        <td class="xl66"></td>-->
<!--                        <td class="xl66"></td>-->
<!--                        <td class="xl66"></td>-->
<!--                        <td class="xl66"></td>-->
<!--                    </tr>-->
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
                    <th class="w20" style="text-align: center">Department</th>
                    <th class="w20" style="text-align: center">Category</th>
                    <th class="w15"  style="text-align: center">Tax Amount</th>

                </tr>
                </thead>
            <?php
            $counter = 1;
                   foreach ($sheet_data as $sheet => $data) {
                                ?>
                                <tr>
                                    <td><?php echo $counter; ?></td>
                                    <td><?php echo $data['epf_no'] ?></td>
                                    <td><?php echo $data['nic'] ?></td>
                                    <td><?php echo $data['name'] ?></td>
                                    <td><?php echo $data['dep'] ?></td>
                                    <td><?php echo $data['cat'] ?></td>

                                    <td style="text-align: right"><?php echo ($data['payee'] != 0) ? number_format((float)$data['payee'], 2, '.', ',') : '-'; ?></td>

                                </tr>

                                <?php

                                $payee += $data['payee'];

                       $counter++;
                                }
                            ?>

                        <tr class="total">
                            <th class="l" colspan="6" style="text-align: center">Total</th>
                            <th style="text-align: right"><?php echo number_format($payee, 2, '.', ','); ?></th>
                        </tr>
                <!--//JE Add End-->
            </table>

                <hr>

                <table>
                    <tbody>
                    <tr height=22 style='height:16.5pt'>
                        <td height=22 class=xl66 style='height:16.5pt'></td>
                        <td class=xl120 colspan=3 style='mso-ignore:colspan'></td>
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
<!--                    <tr height=22 style='height:16.5pt'>-->
<!--                        <td height=22 class=xl66 style='height:16.5pt'></td>-->
<!--                        <td class=xl120 colspan=3 style='mso-ignore:colspan'>…………………………………………</td>-->
<!--                        <td class=xl66></td>-->
<!--                        <td class=xl66></td>-->
<!--                        <td class=xl66></td>-->
<!--                        <td class=xl66></td>-->
<!--                        <td class=xl66></td>-->
<!--                        <td class=xl66></td>-->
<!--                        <td class=xl66></td>-->
<!--                        <td class=xl66></td>-->
<!--                        <td class=xl66></td>-->
<!--                        <td class=xl66></td>-->
<!--                        <td class=xl66></td>-->
<!--                        <td class=xl66></td>-->
<!--                        <td class=xl66></td>-->
<!--                        <td class=xl66></td>-->
<!--                        <td class=xl66></td>-->
<!--                    </tr>-->
<!--                    <tr height=22 style='height:16.5pt'>-->
<!--                        <td height=22 class=xl66 style='height:16.5pt'></td>-->
<!--                        <td class=xl120 colspan=3 style='mso-ignore:colspan'>Signature of Employer.</td>-->
<!--                        <td class=xl66></td>-->
<!--                        <td class=xl66></td>-->
<!--                        <td class=xl66></td>-->
<!--                        <td class=xl66></td>-->
<!--                        <td class=xl66></td>-->
<!--                        <td class=xl66></td>-->
<!--                        <td class=xl66></td>-->
<!--                        <td class=xl66></td>-->
<!--                        <td class=xl66></td>-->
<!--                        <td class=xl66></td>-->
<!--                        <td class=xl66></td>-->
<!--                        <td class=xl66></td>-->
<!--                        <td class=xl66></td>-->
<!--                        <td class=xl66></td>-->
<!--                        <td class=xl66></td>-->
<!--                    </tr>-->
<!--                    <tr height=22 style='height:16.5pt'>-->
<!--                        <td height=22 class=xl66 style='height:16.5pt'></td>-->
<!--                        <td class=xl120 colspan=4 style='mso-ignore:colspan'>Telephone:-->
<!--                            ………………………………..</td>-->
<!--                        <td class=xl66></td>-->
<!--                        <td class=xl66></td>-->
<!--                        <td class=xl66></td>-->
<!--                        <td class=xl66></td>-->
<!--                        <td class=xl66></td>-->
<!--                        <td class=xl66></td>-->
<!--                        <td class=xl66></td>-->
<!--                        <td class=xl66></td>-->
<!--                        <td class=xl66></td>-->
<!--                        <td class=xl66></td>-->
<!--                        <td class=xl66></td>-->
<!--                        <td class=xl66></td>-->
<!--                        <td class=xl66></td>-->
<!--                        <td class=xl66></td>-->
<!--                    </tr>-->
<!--                    <tr height=22 style='height:16.5pt'>-->
<!--                        <td height=22 class=xl66 style='height:16.5pt'></td>-->
<!--                        <td class=xl120 colspan=3 style='mso-ignore:colspan'>Fax: ………………………………..</td>-->
<!--                        <td class=xl66></td>-->
<!--                        <td class=xl66></td>-->
<!--                        <td class=xl66></td>-->
<!--                        <td class=xl66></td>-->
<!--                        <td class=xl66></td>-->
<!--                        <td class=xl66></td>-->
<!--                        <td class=xl66></td>-->
<!--                        <td class=xl66></td>-->
<!--                        <td class=xl66></td>-->
<!--                        <td class=xl66></td>-->
<!--                        <td class=xl66></td>-->
<!--                        <td class=xl66></td>-->
<!--                        <td class=xl66></td>-->
<!--                        <td class=xl66></td>-->
<!--                        <td class=xl66></td>-->
<!--                    </tr>-->
<!--                    <tr height=22 style='height:16.5pt'>-->
<!--                        <td height=22 class=xl66 style='height:16.5pt'></td>-->
<!--                        <td class=xl120 colspan=4 style='mso-ignore:colspan'>E-mail: ……………………………………</td>-->
<!--                        <td class=xl66></td>-->
<!--                        <td class=xl66></td>-->
<!--                        <td class=xl66></td>-->
<!--                        <td class=xl66></td>-->
<!--                        <td class=xl66></td>-->
<!--                        <td class=xl66></td>-->
<!--                        <td class=xl66></td>-->
<!--                        <td class=xl66></td>-->
<!--                        <td class=xl66></td>-->
<!--                        <td class=xl66></td>-->
<!--                        <td class=xl66></td>-->
<!--                        <td class=xl66></td>-->
<!--                        <td class=xl66></td>-->
<!--                        <td class=xl66></td>-->
<!--                    </tr>-->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>

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
