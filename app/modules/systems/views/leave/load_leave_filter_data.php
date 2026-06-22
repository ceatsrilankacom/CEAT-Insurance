<?php
?>
<table id="report_1" class="" style="border-collapse: collapse; text-align:center" width="100%" cellspacing="0" bordercolor="#000000" border="1">
    <thead>
        <tr>
            <th class="all" style="width: 30px">Leave Application ID</th>
            <th class="all">Employee FNAME</th>
            <th class="all">Employee LNAME</th>
            <th class="all">Employee ID</th>
            <th class="all">Leave Reason</th>
            <th class="all">Leave Type</th>
            <th class="all">Leave Start Date</th>
            <th class="all">Leave End Date</th>
            <th class="all">Days</th>
            <th class="all">Reason :</th>
            <th class="all">Leave Status</th>

        </tr>
    </thead>
    <tbody>
    <?php
    $t_days = 0;
    foreach ($Leave_data as $data){ ?>
        <tr>
            <td><?php echo $data->leave_application_id; ?></td>
            <td><?php echo $data->first_name; ?></td>
            <td><?php echo $data->last_name; ?></td>
            <td><?php echo $data->employee_id; ?></td>
            <td><?php echo $data->leave_reason; ?></td>
            <td><?php echo $data->leave_type_name; ?></td>
            <td><?php echo $data->start_date; ?></td>
            <td><?php echo $data->end_date; ?></td>
            <td>
                <?php
                $t_days = $t_days + $data->Days;
                echo $data->Days;
                ?>
            </td>
            <td><?php echo $data->reason; ?></td>
            <td><?php echo $data->status; ?></td>
        </tr>
    <?php } ?>
    </tbody>
    <tfoot>
    <tr>
        <th></th>
        <th>TOTALS</th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th><?php echo $t_days; ?> Days</th>
        <th></th>
        <th></th>
    </tr>
    </tfoot>
</table>
<hr>