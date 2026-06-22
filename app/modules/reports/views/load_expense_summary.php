<?php
/**
 * Created by PhpStorm.
 * User: kasun.demel
 * Date: 2/17/2021
 * Time: 10:37 AM
 */
?>


<b> Expense Summary for - <?php echo $from_date; ?> | <?php echo $to_date; ?> - <?php echo $rep;
    ?></b>

<table id="report_1" class="" style="border-collapse: collapse; text-align:center" width="100%" cellspacing="0" bordercolor="#000000" border="1">
    <thead>
    <tr>
        <th height="25">#</th>
        <th>EXPENSE CODE</th>
        <th style="width: auto">MONTH</th>
        <th style="width: auto">DATE</th>
        <th style="width: auto">EXPENSE TYPE</th>
        <th style="width: auto">RECEIPT NO</th>
        <th style="width: auto">DESCRIPTION</th>
        <th style="width: auto">OPENING KM</th>
        <th style="width: auto">CLOSING KM</th>
        <th style="width: auto">AMOUNT</th>
        <th style="width: auto">COST PER KM</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $i = 1;
    $total_opening_km=0;
    $total_amount=0;
    foreach ($summary_report as $summary) {

        if($i==1){
            $total_opening_km = $summary->opening_km;
        }
        $array_closing=array(
            "closing_km"=> $summary->closing_km
        );
        ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td style="text-align:left"><?php echo $summary->expense_code; ?></td>
            <td><?php echo $summary->month; ?></td>
            <td><?php echo $summary->date; ?></td>
            <td style="text-align:left"><?php echo $summary->expense_name; ?></td>
            <td style="text-align:left"><?php echo $summary->receipt_no; ?></td>
            <td style="text-align:left"><?php echo $summary->description; ?></td>
            <td style="text-align: right"><?php echo $summary->opening_km; ?></td>
            <td style="text-align: right"><?php echo $summary->closing_km; ?></td>
            <td style="text-align: right"><?php echo $summary->amount; $total_amount +=$summary->amount; ?></td>
            <td style="text-align: right"><?php echo $summary->cost_per_km; ?></td>
        </tr>
    <?php $i++; } ?>
    <tr>
        <td colspan="7" style="text-align: center">TOTAL</td>
        <td style="text-align: right;font-weight: bold"><?php echo number_format((float)$total_opening_km , 2, '.', ','); ?></td>
        <td style="text-align: right;font-weight: bold"><?php echo number_format((float)$array_closing["closing_km"] , 2, '.', ','); ?></td>
        <td style="text-align: right;font-weight: bold"><?php echo number_format((float)$total_amount , 2, '.', ','); ?></td>
        <td style="text-align: right;font-weight: bold"><?php echo number_format((float)$total_amount/($array_closing["closing_km"] - $total_opening_km) , 2, '.', ','); ?></td>
    </tr>
    </tbody>
</table>