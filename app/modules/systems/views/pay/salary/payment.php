
<?php

$this->load->model('payroll_process_mod','payroll');
$emp_type_code = $this->payroll->get_emp_type_code($emp_type);
$group = 8;
?>

<div class="row" style="border-bottom:2px solid #FF6600; font-size:12pt; padding: 5px 20px; margin-bottom: 10px" id="heading">

    <b>Monthly Payments : <?php echo $emp_type_code->name; ?> - <?php echo $month; ?></b>
</div>

<div id="print_btn_1" class="table-responsive">
    <table class="dg" style="width:100%; font-size:8pt" border="1"><thead>
        <tr class="c">
            <th class="w2" rowspan="2">#</th>
            <th class="w2" rowspan="2" style="text-align: center">Dep.</th>
            <th class="w6" rowspan="2" style="text-align: center">Code</th>
            <th class="w20" rowspan="2" colspan="2" style="text-align: center">Name</th>
            <th class="w6" colspan="<?php echo count($column_name) ?>" rowspan="" style="text-align: center">Payment Type</th>
            <th class="w6" colspan="1" rowspan="2" style="text-align: center">Full Amount</th>
        </tr>
        <tr class="c">
            <?php foreach ($column_name as $column){ ?>
                <th class="w6" colspan="" style="text-align: center"><?php echo $column['name'] ?></th>
            <?php }?>
        </tr>
        </thead>
        <tbody>
        <input type="hidden" name="wo_cat" value="<?php echo $emp_type; ?>">
        <?php
        $count = 1;
        foreach ($advanced_data as $advanced){ ?>
            <tr>
                <input type="hidden" name="row_id<?php echo $count; ?>" value="<?php echo $advanced['row_id']; ?>">
                <input type="hidden" name="employee_id<?php echo $count; ?>" value="<?php echo $advanced['employee_id']; ?>">
                <input type="hidden" name="emp_type<?php echo $count; ?>" value="<?php echo $advanced['emp_type']; ?>">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                <td class="c"><?php echo $count; ?></td>
                <td class="c"><?php echo $emp_type_code->code; ?></td>
                <td class="c"><?php echo $advanced['employee_id']; ?></td>
                <td class="l"><?php echo $advanced['employee_fname']; ?></td>
                <td class="l"><?php echo $advanced['employee_lname']; ?></td>
                <?php foreach ($data_column as $column_data){
                    if($this->payroll->get_code_availability($column_data['Field'],$group,$emp_type)) { ?>
                        <td style="text-align: right"><input name="<?php echo $column_data['Field'] . $count ?>" value="<?php echo number_format($advanced[$column_data['Field']], 2, ".", ""); ?>" maxlength="150" class="currency" type="text"></td>
                        <?php
                        $total[$column_data['Field']] += $advanced[$column_data['Field']];
                        $total3[$column_data['Field']] += $advanced[$column_data['Field']];
                    }
                }
                $total2 = $total;
                unset($total);
                ?>
                <td class="l" style="text-align: right"><?php echo number_format(array_sum($total2),2,".",","); ?></td>
            </tr>
            <?php
            $full_tot += array_sum($total2);
            $count++;
        }

        ?>
        <tr style="font-weight:bold" class="r">
            <td class="l" colspan="5">Total</td>
            <?php foreach ($total3 as $total_new){ ?>
                <td><?php echo number_format($total_new,2,".",","); ?></td>
            <?php }?>
            <td style="text-align: right"><?php echo number_format($full_tot,2,".",","); ?></td>
            <input type="hidden" name="count" value="<?php echo $count;?>">
        </tr>
        </tbody>
    </table>
</div>
