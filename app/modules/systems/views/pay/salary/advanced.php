<?php
$this->load->model('payroll_process_mod','payroll');
$emp_type_code = $this->payroll->get_emp_type_code($emp_type);
$group= 6;
?>
<div class="row" style="border-bottom:2px solid #FF6600; font-size:12pt; padding: 5px 20px; margin-bottom: 10px" id="heading">
    <b>Monthly Advances : <?php echo $emp_type_code->name; ?> - <?php echo $month; ?></b>
</div>
<div id="print_btn_1" class="table-responsive">
    <table class="dg" style="width:100%; font-size:8pt" border="1"><thead>
        <tr class="c">
            <th class="w2" >#</th>
            <th class="w2" style="text-align: center">Dep.</th>
            <th class="w6" style="text-align: center">Code</th>
            <th class="w6" style="text-align: center">Name</th>
            <th class="w6" style="text-align: center">Amount</th>
        </tr>
        </thead>
        <tbody>
        <input type="hidden" name="wo_cat" value="<?php echo $emp_type; ?>">
        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
            <?php
            $count = 1;
            foreach ($employees as $emp){
                ?>
                <tr>
                           <!--<input type="hidden" name="row_id<?php /*echo $count; */?>" value="<?php /*echo $emp['row_id']; */?>">-->
                           <input type="hidden" name="employee_id<?php echo $count; ?>" value="<?php echo $emp->employee_id; ?>">
                           <input type="hidden" name="emp_type<?php echo $count; ?>" value="<?php echo $emp->emp_type; ?>">

                           <td><?php echo $count; ?></td>
                           <td><?php echo $emp_type_code->code; ?></td>
                           <td><?php echo $emp->employee_id; ?></td>
                           <td><?php echo $emp->first_name; ?> <?php echo $emp->last_name; ?></td>
                           <td style="text-align: right"><input name="amount" value="" maxlength="150" class="currency" type="text"></td>
                </tr>
            <?php
                $count++;
            }
        ?>
               <tr style="font-weight:bold" class="r">
                            <td class="l">Total</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <input type="hidden" name="count" value="<?php echo $count;?>">
               </tr>
        </tbody>
    </table>
</div>
