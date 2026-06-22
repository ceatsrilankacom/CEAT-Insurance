<?php
/**
 * Created by PhpStorm.
 * User: kasun.demel
 * Date: 7/27/2021
 * Time: 12:47 PM
 */
?>

<b> Expense Detail Report for - <?php echo $from_date; ?> | <?php echo $to_date; ?> - <?php echo $rep;
    ?></b>

<table id="report_1" class="" style="border-collapse: collapse; text-align:center" width="100%" cellspacing="0" bordercolor="#000000" border="1">
    <thead>
    <tr>
        <th height="25" rowspan="2">#</th>
        <th rowspan="2">EXPENSE CODE</th>
        <th rowspan="2" style="width: auto">MONTH</th>
        <th rowspan="2" style="width: auto">DATE</th>
        <th rowspan="2" style="width: auto">RECEIPT NO</th>
        <th rowspan="2" style="width: auto">DESCRIPTION</th>
        <th rowspan="2" style="width: auto">OPENING KM</th>
        <th rowspan="2" style="width: auto">CLOSING KM</th>
        <th style="width: auto" colspan="<?php echo count($expense_type); ?>">EXPENSE TYPE</th>
    </tr>
    <tr>
        <?php foreach($expense_type as $expense1){ ?>
            <th style="width: auto"><?php echo $expense1->code."-".$expense1->name; ?></th>
        <?php } ?>
    </tr>
    </thead>
    <tbody>
    <?php
    $i = 1;
    $total_opening_km=0;
    $total_amount=array();
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
            <td style="text-align:left"><?php echo $summary->receipt_no; ?></td>
            <td style="text-align:left"><?php echo $summary->description; ?></td>
            <td style="text-align: right"><?php echo $summary->opening_km; ?></td>
            <td style="text-align: right"><?php echo $summary->closing_km; ?></td>
            <?php foreach($expense_type as $expense1){
                if($expense1->code == $summary->expense_type){
                    ?>
                    <td style="text-align: right"><?php echo number_format((float)$summary->amount, 2, '.', ','); $total_amount[$summary->expense_type] +=$summary->amount; ?></td>
                <?php
                }else{
                    ?>
                    <td style="text-align: right">-<?php  $total_amount[$summary->expense_type] +=0; ?></td>
                <?php
                }
                ?>

            <?php } ?>
        </tr>
        <?php $i++; } ?>
    <tr>
        <td colspan="6" style="text-align: center">TOTAL</td>
        <td style="text-align: right;font-weight: bold"><?php echo number_format((float)$total_opening_km , 2, '.', ','); ?></td>
        <td style="text-align: right;font-weight: bold"><?php echo number_format((float)$array_closing["closing_km"] , 2, '.', ','); ?></td>
        <?php foreach($expense_type as $expense1){
            if($expense1->code == $summary->expense_type){
                ?>
                <td style="text-align: right"><?php echo number_format((float)$total_amount[$expense1->code], 2, '.', ','); ?></td>
            <?php
            }else{
                ?>
                <td style="text-align: right">-</td>
            <?php
            }
            ?>

        <?php } ?>
    </tr>
    </tbody>
</table>