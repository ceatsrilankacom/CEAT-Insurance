<?php
/**
 * Created by PhpStorm.
 * User: kasun.demel
 * Date: 7/30/2021
 * Time: 8:35 AM
 */
?>

<table width="100%">
    <tbody>
    <tr>
        <td style="text-align: center">
            <b style="text-align: center;font-size: 15px"> WEEKLY EXPENSES  FROM <?php echo $from_date; ?> TO <?php echo $to_date; ?></b>
        </td>
    </tr>
    </tbody>
</table>
<br<br><br<br>

<table id="report_1" class="" style="border-collapse: collapse; text-align:center" width="100%" cellspacing="0" bordercolor="#000000" border="1">
    <thead>
    <tr>
        <th height="25">#</th>
        <th height="25">EPF NO</th>
        <th>SALES OFFICER / EXECUTIVE / MANAGER</th>
        <th>DESIGNATION</th>
        <th style="width: auto">FUEL</th>
        <th style="width: auto">OTHERS</th>
        <th style="width: auto">TOTAL AMOUNT</th>
        <th style="width: auto">SIGNATURE</th>
        <th style="width: auto">DATE</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $i = 1;
    $total_fuel_amount=0;
    $total_other_amount=0;
    $total_amount=array();
    foreach ($expense_list as $key1 => $expense1){ ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td style="text-align:left"><?php echo $epf_no[$expense1]; ?></td>
            <td style="text-align: left"><?php echo $emp_name[$expense1]; ?></td>
            <td></td>
            <td style="text-align:right"><?php echo number_format($fuel_total[$expense1] , 2, '.', ','); $total_fuel_amount += $fuel_total[$expense1]; ?></td>
            <td style="text-align:right"><?php echo number_format($other_total[$expense1] , 2, '.', ','); $total_other_amount += $other_total[$expense1]; ?></td>
            <td style="text-align:right"><?php echo number_format(($fuel_total[$expense1]+$other_total[$expense1]) , 2, '.', ','); ?></td>
            <td style="text-align: right"></td>
            <td style="text-align: center"><?php echo $date[$expense1]; ?></td>
        </tr>
        <?php $i++; } ?>
    <tr>
        <td colspan="4" style="text-align: center">TOTAL</td>
        <td style="text-align: right;font-weight: bold"><?php echo number_format((float)$total_fuel_amount , 2, '.', ','); ?></td>
        <td style="text-align: right;font-weight: bold"><?php echo number_format((float)$total_other_amount, 2, '.', ','); ?></td>
        <td style="text-align: right;font-weight: bold"><?php echo number_format((float)$total_other_amount+$total_fuel_amount, 2, '.', ','); ?></td>
    </tr>
    </tbody>
</table>