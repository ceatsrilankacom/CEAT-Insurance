<?php
/**
 * Created by Earrow.
 * User:Kasun De Mel
 * Email:kasun@earrow.net
 * Date: 12/2/2019
 * Time: 12:19 PM
 */

?>

<?php $this->load->library('kcrud'); ?>

<?php $count=0; foreach($rosters as $roster1){
    $count++;
}

?>

<style>
    .label-primary {
        background-color: #000000;
    }
    .label-info {
        background-color: #ff6f32;
    }
    .label-danger {
        background-color: #ff150c;
    }
</style>

<tbody>
<tr>
    <td>
        <table width="60%">
            <tr>
                <td colspan="5"><h6 style="text-align: center;margin-top: 10px;">&nbsp;</h6></td>
            </tr>
        </table>
    </td>
</tr>
<tr>
    <td>
        <table id="roster_table" border="2" class="table table-striped table-bordered table-hover table-header-fixed dt-responsive dataTable no-footer roster-table" cellspacing="0" width="100%" height="100%" border="1">
            <thead>
            <tr>
                <th style="text-align: center" rowspan="2">#</th>
                <th style="text-align: center" rowspan="2">Roster Name</th>
                <th style="text-align: center" rowspan="2">Description</th>
                <th style="text-align: center" colspan="5">Approvals</th>
            </tr>
            <tr>
                <th style="text-align: center;">Marking Day Offs</th>
                <th style="text-align: center;">Roster Department</th>
                <th style="text-align: center;">Roster Department Head</th>
                <th style="text-align: center;">HR Department</th>
                <th style="text-align: center;">HR Department Head</th>
            </tr>
            </thead>
            <tbody class="context-menu-one">
            <?php $x=1; foreach($rosters as $roster1){ ?>
                <tr>
                    <td><?php echo $x; ?></td>
                    <td><?php echo $roster1->name; ?></td>
                    <td><?php echo $roster1->description; ?></td>

                    <!--Permission For High Ranking User-->
                    <?php if(USER_ID == 1){ ?>

                        <td style="text-align: center" id="td_<?php echo $roster1->id; ?>_1">
                            <?php if($approval[$roster1->id][1] == 1){ ?>
                                <a href="javascript:;" style="cursor: pointer" class="label label-info" onclick="unlock_roster(<?php echo $roster1->id ?>,1)">UNLOCK</a>
                            <?php }else{ ?>
                                <a href="javascript:;" style="cursor: pointer" class="label label-success" onclick="edit_roster(<?php echo $roster1->id ?>,1)">LOCK</a>
                            <?php } ?>
                        </td>
                        <td style="text-align: center" id="td_<?php echo $roster1->id; ?>_2">
                            <?php if($approval[$roster1->id][2] == 1){ ?>
                                <a href="javascript:;" style="cursor: pointer" class="label label-info" onclick="unlock_roster(<?php echo $roster1->id ?>,2)">UNLOCK</a>
                            <?php }else{ ?>
                                <a href="javascript:;" style="cursor: pointer" class="label label-success" onclick="edit_roster(<?php echo $roster1->id ?>,2)">LOCK</a>
                            <?php } ?>
                        </td>
                        <td style="text-align: center" id="td_<?php echo $roster1->id; ?>_3">
                            <?php if($approval[$roster1->id][3] == 1){ ?>
                                <a href="javascript:;" style="cursor: pointer" class="label label-info" onclick="unlock_roster(<?php echo $roster1->id ?>,3)">UNLOCK</a>
                            <?php }else{ ?>
                                <a href="javascript:;" style="cursor: pointer" class="label label-success" onclick="edit_roster(<?php echo $roster1->id ?>,3)">LOCK</a>
                            <?php } ?>
                        </td>
                        <td style="text-align: center" id="td_<?php echo $roster1->id; ?>_4">
                            <?php if($approval[$roster1->id][4] == 1){ ?>
                                <a href="javascript:;" style="cursor: pointer" class="label label-info" onclick="unlock_roster(<?php echo $roster1->id ?>,4)">UNLOCK</a>
                            <?php }else{ ?>
                                <a href="javascript:;" style="cursor: pointer" class="label label-success" onclick="edit_roster(<?php echo $roster1->id ?>,4)">LOCK</a>
                            <?php } ?>
                        </td>
                        <td style="text-align: center" id="td_<?php echo $roster1->id; ?>_5">
                            <?php if($approval[$roster1->id][5] == 1){ ?>
                                <a href="javascript:;" style="cursor: pointer" class="label label-info" onclick="unlock_roster(<?php echo $roster1->id ?>,5)">UNLOCK</a>
                            <?php }else{ ?>
                                <a href="javascript:;" style="cursor: pointer" class="label label-success" onclick="edit_roster(<?php echo $roster1->id ?>,5)">LOCK</a>
                            <?php } ?>
                        </td>

                        <!-- Check Day Offs / Roster Department -->
                    <?php }else if($this->kcrud->getValueAll("auth_users_groups","user_id,group_id","WHERE user_id=".USER_ID." AND group_id=5",null,null,null,null)){ ?>

                        <td style="text-align: center" id="td_<?php echo $roster1->id; ?>_1">
                            <?php if($approval[$roster1->id][1] == 1 && $approval[$roster1->id][3] == 1){ ?>
                                <span class="label label-danger">LOCKED</span>
                            <?php }else if($approval[$roster1->id][1] == 1 && $approval[$roster1->id][3] == 0){ ?>
                                <a href="javascript:;" style="cursor: pointer" class="label label-info" onclick="unlock_roster(<?php echo $roster1->id ?>,1)">UNLOCK</a>
                            <?php }else{ ?>
                                <a href="javascript:;" style="cursor: pointer" class="label label-success" onclick="edit_roster(<?php echo $roster1->id ?>,1)">LOCK</a>
                            <?php } ?>
                        </td>
                        <td style="text-align: center" id="td_<?php echo $roster1->id; ?>_2">
                            <?php if($approval[$roster1->id][2] == 1 && $approval[$roster1->id][3] == 1){ ?>
                                <span class="label label-danger">LOCKED</span>
                            <?php }else if($approval[$roster1->id][2] == 1 && $approval[$roster1->id][3] == 0){ ?>
                                <a href="javascript:;" style="cursor: pointer" class="label label-info" onclick="unlock_roster(<?php echo $roster1->id ?>,2)">UNLOCK</a>
                            <?php }else if($approval[$roster1->id][1] == 0){ ?>
                                <span class="label label-primary">PENDING</span>
                            <?php }else{ ?>
                                <a href="javascript:;" style="cursor: pointer" class="label label-success" onclick="edit_roster(<?php echo $roster1->id ?>,2)">LOCK</a>
                            <?php } ?>
                        </td>
                        <td style="text-align: center" id="td_<?php echo $roster1->id; ?>_3">
                            <?php if($approval[$roster1->id][3] == 1){ ?>
                                <span class="label label-danger">LOCKED</span>
                            <?php }else{ ?>
                                <span class="label label-primary">PENDING</span>
                            <?php } ?>
                        </td>
                        <td style="text-align: center" id="td_<?php echo $roster1->id; ?>_4">
                            <?php if($approval[$roster1->id][4] == 1){ ?>
                                <span class="label label-danger">LOCKED</span>
                            <?php }else{ ?>
                                <span class="label label-primary">PENDING</span>
                            <?php } ?>
                        </td>
                        <td style="text-align: center" id="td_<?php echo $roster1->id; ?>_5">
                            <?php if($approval[$roster1->id][5] == 1){ ?>
                                <span class="label label-danger">LOCKED</span>
                            <?php }else{ ?>
                                <span class="label label-primary">PENDING</span>
                            <?php } ?>
                        </td>
                        <!-- Roster Department Head -->
                    <?php }else if($this->kcrud->getValueAll("auth_users_groups","user_id,group_id","WHERE user_id=".USER_ID." AND group_id=6",null,null,null,null)){ ?>

                        <td style="text-align: center" id="td_<?php echo $roster1->id; ?>_1">
                            <?php if($approval[$roster1->id][1] == 1){ ?>
                                <span class="label label-danger">LOCKED</span>
                            <?php }else{ ?>
                                <span class="label label-primary">PENDING</span>
                            <?php } ?>
                        </td>
                        <td style="text-align: center" id="td_<?php echo $roster1->id; ?>_2">
                            <?php if($approval[$roster1->id][2] == 1){ ?>
                                <span class="label label-danger">LOCKED</span>
                            <?php }else{ ?>
                                <span class="label label-primary">PENDING</span>
                            <?php } ?>
                        </td>
                        <td style="text-align: center" id="td_<?php echo $roster1->id; ?>_3">
                            <?php if($approval[$roster1->id][3] == 1 && $approval[$roster1->id][4] == 1){ ?>
                                <span class="label label-danger">LOCKED</span>
                            <?php }else if($approval[$roster1->id][3] == 1 && $approval[$roster1->id][4] == 0){ ?>
                                <a href="javascript:;" style="cursor: pointer" class="label label-info" onclick="unlock_roster(<?php echo $roster1->id ?>,3)">UNLOCK</a>
                            <?php }else if($approval[$roster1->id][2] == 0){ ?>
                                <span class="label label-primary">PENDING</span>
                            <?php }else{ ?>
                                <a href="javascript:;" style="cursor: pointer" class="label label-success" onclick="edit_roster(<?php echo $roster1->id ?>,3)">LOCK</a>
                            <?php } ?>
                        </td>
                        <td style="text-align: center" id="td_<?php echo $roster1->id; ?>_4">
                            <?php if($approval[$roster1->id][4] == 1){ ?>
                                <span class="label label-danger">LOCKED</span>
                            <?php }else{ ?>
                                <span class="label label-primary">PENDING</span>
                            <?php } ?>
                        </td>
                        <td style="text-align: center" id="td_<?php echo $roster1->id; ?>_5">
                            <?php if($approval[$roster1->id][5] == 1){ ?>
                                <span class="label label-danger">LOCKED</span>
                            <?php }else{ ?>
                                <span class="label label-primary">PENDING</span>
                            <?php } ?>
                        </td>

                        <!--HR Department-->
                    <?php }else if($this->kcrud->getValueAll("auth_users_groups","user_id,group_id","WHERE user_id=".USER_ID." AND group_id=3",null,null,null,null)){ ?>

                        <td style="text-align: center" id="td_<?php echo $roster1->id; ?>_1">
                            <?php if($approval[$roster1->id][1] == 1){ ?>
                                <span class="label label-danger">LOCKED</span>
                            <?php }else{ ?>
                                <span class="label label-primary">PENDING</span>
                            <?php } ?>
                        </td>
                        <td style="text-align: center" id="td_<?php echo $roster1->id; ?>_2">
                            <?php if($approval[$roster1->id][2] == 1){ ?>
                                <span class="label label-danger">LOCKED</span>
                            <?php }else{ ?>
                                <span class="label label-primary">PENDING</span>
                            <?php } ?>
                        </td>
                        <td style="text-align: center" id="td_<?php echo $roster1->id; ?>_3">
                            <?php if($approval[$roster1->id][3] == 1){ ?>
                                <span class="label label-danger">LOCKED</span>
                            <?php }else{ ?>
                                <span class="label label-primary">PENDING</span>
                            <?php } ?>
                        </td>
                        <td style="text-align: center" id="td_<?php echo $roster1->id; ?>_4">
                            <?php if($approval[$roster1->id][4] == 1 && $approval[$roster1->id][5] == 1){ ?>
                                <span class="label label-danger">LOCKED</span>
                            <?php }else if($approval[$roster1->id][4] == 1 && $approval[$roster1->id][5] == 0){ ?>
                                <a href="javascript:;" style="cursor: pointer" class="label label-info" onclick="unlock_roster(<?php echo $roster1->id ?>,4)">UNLOCK</a>
                            <?php }else if($approval[$roster1->id][3] == 0){ ?>
                                <span class="label label-primary">PENDING</span>
                            <?php }else{ ?>
                                <a href="javascript:;" style="cursor: pointer" class="label label-success" onclick="edit_roster(<?php echo $roster1->id ?>,4)">LOCK</a>
                            <?php } ?>
                        </td>
                        <td style="text-align: center" id="td_<?php echo $roster1->id; ?>_5">
                            <?php if($approval[$roster1->id][5] == 1){ ?>
                                <span class="label label-danger">LOCKED</span>
                            <?php }else{ ?>
                                <span class="label label-primary">PENDING</span>
                            <?php } ?>
                        </td>

                        <!--HR Department Head-->
                    <?php }else if($this->kcrud->getValueAll("auth_users_groups","user_id,group_id","WHERE user_id=".USER_ID." AND group_id=4",null,null,null,null)){ ?>
                        ssddsdssdsd
                        <td style="text-align: center" id="td_<?php echo $roster1->id; ?>_1">
                            <?php if($approval[$roster1->id][1] == 1){ ?>
                                <span class="label label-danger">LOCKED</span>
                            <?php }else{ ?>
                                <span class="label label-primary">PENDING</span>
                            <?php } ?>
                        </td>
                        <td style="text-align: center" id="td_<?php echo $roster1->id; ?>_2">
                            <?php if($approval[$roster1->id][2] == 1){ ?>
                                <span class="label label-danger">LOCKED</span>
                            <?php }else{ ?>
                                <span class="label label-primary">PENDING</span>
                            <?php } ?>
                        </td>
                        <td style="text-align: center" id="td_<?php echo $roster1->id; ?>_3">
                            <?php if($approval[$roster1->id][3] == 1){ ?>
                                <span class="label label-danger">LOCKED</span>
                            <?php }else{ ?>
                                <span class="label label-primary">PENDING</span>
                            <?php } ?>
                        </td>
                        <td style="text-align: center" id="td_<?php echo $roster1->id; ?>_4">
                            <?php if($approval[$roster1->id][4] == 1){ ?>
                                <span class="label label-danger">LOCKED</span>
                            <?php }else{ ?>
                                <span class="label label-primary">PENDING</span>
                            <?php } ?>
                        </td>
                        <td style="text-align: center" id="td_<?php echo $roster1->id; ?>_5">
                            <?php if($approval[$roster1->id][5] == 1){ ?>
                                <span class="label label-danger">LOCKED</span>
                            <?php }else{ ?>
                                <a href="javascript:;" style="cursor: pointer" class="label label-success" onclick="edit_roster(<?php echo $roster1->id ?>,5)">LOCK</a>
                            <?php } ?>
                        </td>
                    <?php } ?>
                </tr>
                <?php $x++; } ?>
            </tbody>
        </table>
    </td>
</tr>
</tbody>


<script>

    function edit_roster(roster_id,approval_id){

        bootbox.confirm({
            title: "<h6>Lock Roster</h6>",
            message: "" +
            "<b style='columns: red;'>You Want Lock this Roster ?</b>",
            buttons: {
                cancel: {
                    label: '<i class="fa fa-times"></i> Cancel'
                },
                confirm: {
                    label: '<i class="fa fa-check"></i> Confirm'
                }
            },
            callback: function (result) {

                if(result == true){

                    $.ajax({

                        url: "<?php echo base_url('roster/roster_approval_con/update'); ?>",
                        type: "POST",
                        dataType: "JSON",
                        data:{
                            roster_id:roster_id,
                            approval_id:approval_id,
                            '<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>'
                        },
                        success:function(data){

                            if(data.status == true){
                                $('#td_'+roster_id+'_'+approval_id).html('<span class="label label-danger">LOCKED</span>');
                                bootbox.alert("Roster Locked successfully !");
                            }
                            else{
                                bootbox.alert("<b style='color: red'>Roster Locking Changes Fails !</b>");
                            }

                        },
                        error: function(jqXHR, textStatus, errorThrown){

                            bootbox.alert("<b style='color: red'>Roster Locking Changes Fails</b>");

                        }

                    });
                }
            }
        });

    }

    function unlock_roster(roster_id,approval_id){

        bootbox.confirm({
            title: "<h6>Unlock Roster</h6>",
            message: "" +
            "<b style='columns: red;'>You Want Unlock this Roster ?</b>",
            buttons: {
                cancel: {
                    label: '<i class="fa fa-times"></i> Cancel'
                },
                confirm: {
                    label: '<i class="fa fa-check"></i> Confirm'
                }
            },
            callback: function (result) {

                if(result == true){

                    $.ajax({

                        url: "<?php echo base_url('roster/roster_approval_con/unlock'); ?>",
                        type: "POST",
                        dataType: "JSON",
                        data:{
                            roster_id:roster_id,
                            approval_id:approval_id,
                            '<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>'
                        },
                        success:function(data){

                            if(data.status == true){
                                $('#td_'+roster_id+'_'+approval_id).html('<span class="label label-success" onclick="edit_roster('+roster_id+','+approval_id+')">LOCK</span>');
                                bootbox.alert("Roster Unlocked successfully !");
                            }
                            else{
                                bootbox.alert("<b style='color: red'>Roster Unlocking Changes Fails !</b>");
                            }
                        },
                        error: function(jqXHR, textStatus, errorThrown){

                            bootbox.alert("<b style='color: red'>Roster Unlocking Changes Fails</b>");

                        }
                    });
                }
            }
        });

    }
</script>



