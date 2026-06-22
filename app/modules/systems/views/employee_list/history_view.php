<?php
$this->load->model('employee_list_model','employees');

foreach($type as $t){?>

    <tr>
        <td style="width:100px">
            <?php echo $t->type_name ?>
        </td>

        <?php $details =$this->employees->get_emp_history($t->type_name,$t->employee);
        $i=1;
        foreach($details as $d) { ?>
            <td style="width:120px">
                <span style="color:dodgerblue"><?php echo $d->val?></span><br>
                <?php echo $d->user ?> <br>
                <?php echo $d->date ?>
            </td>

            <?php if(sizeof($details)!=$i){?>
                <td style="width:50px">
                    <img style="text-align: center" id="previewing" src="<?php echo base_url('assets/images/icon/arrow.jpg')?>" class="img-responsive img-thumbnail" width="40px" />
                </td>
            <?php } $i++; }
        ?>

    </tr>
<?php } ?>