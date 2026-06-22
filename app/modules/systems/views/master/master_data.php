<div class="page-content-wrapper"  id="oooooo">
    <div class="page-content">
        <div class="page-bar">
            <div class="page-toolbar">
                <div class="btn-group pull-right">
                    <ul class="dropdown-menu pull-right" role="menu">
                        <li>
                            <a href="#">
                                <i class="icon-bell"></i></a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="icon-shield"></i> </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="icon-user"></i></a>
                        </li>
                        <li class="divider"> </li>
                        <li>
                            <a href="#">
                                <i class="icon-bag"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <h3 class="page-title"><?php echo lang('index_heading');?>

        </h3>
        <small><?php echo lang('index_subheading');?></small>

<div class="col-lg-8">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Working Hourse</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($admin_value as $value){ ?>
            <tr>
                <td><?php echo $value->work_hours; ?></td>
                <td> <a href="<?php echo site_url('systems/master_data_con/edit_master_data?id=').$value->id;?>"><i class="fa fa-pencil-square-o"></i></a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

    </div>
</div>



