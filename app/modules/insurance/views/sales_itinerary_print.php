<?php
/**
 * Created by PhpStorm.
 * User: kasun.demel
 * Date: 10/21/2021
 * Time: 8:21 AM
 */
?>

<style>

    input,select{
        width: 80% !important;
    }
    label{
        width: 100% !important;
    }
    .input-medium {
        width: 70% !important;
    }

</style>

<div class="page-content">
<!-- BEGIN BREADCRUMBS -->
<div class="breadcrumbs">
    <div style="border-bottom:2px solid #1469ff; font-size:12pt; padding: 5px 20px; margin-bottom: 10px">
        <button class="btn btn-success bt-add-v2 pull-right"  onClick="PrintDiv();" id="add_btn"><i class="glyphicon glyphicon-print"></i> Print</button>
        <ol class="breadcrumb">
            <li class="active" style="font-size: 14px">SALES ITINERARY - <?php echo $epf_no." - ".$month;?></li>
        </ol>
    </div>
</div>

<div class="row" id="invoice_div" style="width: 595px;height: 842px;margin-bottom: 10px !important;background-color: white !important;">

<style media="screen">
    td {
        font-family: 'Open Sans', sans-serif;
    }

    th {
        background-color: #3DA4DD;
        border-bottom-width: 1px;
        background-repeat: repeat-x;
        background-position-y: center;
        color:#010204;
    }

    body{
        background-color: #fff !important;
    }

</style>

<style>
</style>

<!-- Header -->
<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" >
<tr>
    <td height="20"></td>
</tr>
<tr>
    <td>
        <table border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" style="border-radius: 10px 10px 0 0;width: 595px;height: 421px">
            <tr>
                <td style="text-align: center;border:0px solid white">
                    <table style="width: 100% !important;" border="0">
                        <tr>
                            <td style="text-align: left"><b style="font-weight: 600">NAME :</b></td>
                            <td style="text-align: left"><?php echo $user->title." ".$user->name." - ".$user->epf_no; ?></td>
                            <td style="width: 40%">&nbsp;</td>
                            <td style="text-align: left"><b style="font-weight: 600">EPF NO :</b></td>
                            <td style="text-align: left"><?php echo $epf_no; ?></td>
                        </tr>
                        <tr>
                            <td style="text-align: left"><b style="font-weight: 600">MONTH :</b></td>
                            <td style="text-align: left"><?php echo $month; ?></td>
                            <td style="width: 40%">&nbsp;</td>
                            <td style="text-align: left"></td>
                            <td style="text-align: left"></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table width="960" style="margin-top: 10px" border="1" cellpadding="0" cellspacing="0" align="center" class="fullPadding">
                        <thead>
                        <tr style="background-color: #0b6a91">
                            <td colspan="1" style="font-size: 11px;color: #ffffff;word-wrap: break-word;width: 10%;text-align: center;height: 30px"><b>MONTH</b></td>
                            <td colspan="1" style="font-size: 11px;color: #ffffff;word-wrap: break-word;width: 10%;text-align: center;height: 30px"><b>DATE</b></td>
                            <td colspan="1" style="font-size: 11px;color: #ffffff;word-wrap: break-word;width: 55%;text-align: center;height: 30px"><b>ROUTE</b></td>
                            <td colspan="1" style="font-size: 11px;color: #ffffff;word-wrap: break-word;width: 25%;text-align: center;height: 30px"><b>NIGHT OUTS</b></td>
                       </tr>
                        </thead>
                        <tbody>
                        <?php for($i=1;$i <= $days;$i++){ ?>
                        <tr>
                            <td style="text-align: center;"><?php echo $month; ?></td>
                            <td style="text-align: center;"><?php echo $i; ?></td>
                            <td style="text-align: left;"><?php echo rtrim($routes[$i],","); ?></td>
                            <td style="text-align: left;">&nbsp;</td>
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table width="480" style="margin-top: 30px" border="0" cellpadding="0" cellspacing="0" align="center" class="fullPadding">
                        <tbody>
                        <tr>
                            <td colspan="2" style="font-size: 08px;color: darkslategrey;word-wrap: break-word;width: 25%;text-align: center">.......................................................</td>
                            <td colspan="6" style="font-size: 08px;color: darkslategrey;word-wrap: break-word;width: 10%;text-align: center">&nbsp;</td>
                            <td colspan="2" style="font-size: 08px;color: darkslategrey;word-wrap: break-word;width: 25%;text-align: center">.......................................................</td>
                            <td colspan="6" style="font-size: 08px;color: darkslategrey;word-wrap: break-word;width: 10%;text-align: center">&nbsp;</td>
                            <td colspan="2" style="font-size: 08px;color: darkslategrey;word-wrap: break-word;width: 25%;text-align: center">.......................................................</td>
                            <td colspan="6" style="font-size: 08px;color: darkslategrey;word-wrap: break-word;width: 5%;text-align: center">&nbsp;</td>

                        </tr>
                        <tr>
                            <td colspan="2" style="font-size: 08px;color: darkslategrey;word-wrap: break-word;width: 25%;text-align: center">PREPARED BY</td>
                            <td colspan="6" style="font-size: 08px;color: darkslategrey;word-wrap: break-word;width: 10%;text-align: center"></td>
                            <td colspan="2" style="font-size: 08px;color: darkslategrey;word-wrap: break-word;width: 25%;text-align: center">APPROVED BY</td>
                            <td colspan="6" style="font-size: 08px;color: darkslategrey;word-wrap: break-word;width: 10%;text-align: center"></td>
                            <td colspan="2" style="font-size: 08px;color: darkslategrey;word-wrap: break-word;width: 25%;text-align: center">CHECKED BY</td>
                            <td colspan="6" style="font-size: 08px;color: darkslategrey;word-wrap: break-word;width: 5%;text-align: center"></td>

                        </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td><hr style="margin-left:10px;margin-right: 10px"></td>
            </tr>
            <tr>
                <td>
                    <table width="480" style="margin-top: 10px" border="0" cellpadding="0" cellspacing="0" align="center" class="fullPadding">
                        <tbody>
                        <tr>
                            <td colspan="4" style="font-size: 08px;color: darkslategrey;word-wrap: break-word;width: 60%;text-align: left">Ceat Sri Lanka</td>
                            <td colspan="4" style="font-size: 08px;color: darkslategrey;word-wrap: break-word;width: 60%;text-align: right">@CEAT IT</td>
                        </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    &nbsp;
                </td>
            </tr>
        </table>
    </td>
</tr>
</table>
</div>
</div>


<script>
    function PrintDiv() {
        var divToPrint = document.getElementById('invoice_div');
        var popupWin = window.open('', '_blank', 'width=800,height=1000');
        popupWin.document.open();
        popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
    }
</script>
