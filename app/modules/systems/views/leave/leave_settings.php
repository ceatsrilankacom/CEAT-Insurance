<style>
    form label {
        width: 100%;
    }
</style>
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"></h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Leave Settings</li>
            </ol>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">

        <div class="element-wrapper">
            <div class="element-actions">
            </div>
            <!--<h6 class="element-header">

            </h6>-->
            <div class="card-header bg-info page-head-title-wrap">
                <h4 class="page-head-title card-title  text-white" style="display: inline-block"> Leave Settings</h4>
            </div>
            <div class="element-box">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item"><a class="nav-link active" role="tab" href="#leaveTypes" data-toggle="tab"> Leave Types </a></li>
                    <li class="nav-item"><a class="nav-link" role="tab" href="#leaveRules" data-toggle="tab"> Leave Rules </a></li>
                    <li class="nav-item"><a class="nav-link" role="tab" href="#leavePeriod" data-toggle="tab"> Leave Period </a></li>
                    <li class="nav-item"><a class="nav-link" role="tab" href="#workWeek" data-toggle="tab"> Work Week </a></li>
                    <li class="nav-item"><a class="nav-link" role="tab" href="#holidays" data-toggle="tab"> Holidays </a></li>
                    <li class="nav-item"><a class="nav-link" role="tab" href="#leave_options" data-toggle="tab"> Leave General Options </a></li>
                    <!-- <li class="nav-item"><a class="nav-link" role="tab" href="#paidTimeOff" data-toggle="tab"> Paid Time Off </a></li>-->
                    <li class="nav-item"><a class="nav-link" role="tab" href="#employeeLeaveList" data-toggle="tab"> Employee Leave List </a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content tabcontent-border">
                    <div class="tab-pane p-20 active" role="tabpanel" id="leaveTypes">
                        <button class="btn btn-success pull-right" onclick="add_leave_type()"><i class="fa fa-plus-circle"></i> Add Leave Type</button>
                        <!--<button class="btn btn-info" onclick="reload_table(leaveTypesDataTable)"><i class="glyphicon glyphicon-refresh"></i> Reload</button>-->
                        <div class="tools"> </div>
                        <table class="table table-striped table-bordered table-hover table-header-fixed dt-responsive" id="leaveTypesTable" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th class="all">Leave Type</th>
                                <th class="desktop">Leaves Per Period</th>
                                <th class="desktop">Employee Can Apply</th>
                                <th class="all text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane p-20" role="tabpanel" id="leavePeriod">
                        <button class="btn btn-success pull-right" onclick="add_leave_period()"><i class="fa fa-plus-circle"></i> Add Period</button>
                        <!--<button class="btn btn-default" onclick="reload_table(periodsDataTable)"><i class="glyphicon glyphicon-refresh"></i> Reload</button>-->
                        <div class="tools"></div>
                        <table class="table table-striped table-bordered table-hover table-header-fixed dt-responsive" id="periodsTable" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th class="all">#</th>
                                <th class="all">Period Name</th>
                                <th class="min-tablet">Period Start</th>
                                <th class="min-tablet">Period End</th>
                                <th class="all text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane p-20" role="tabpanel" id="workWeek">
                       <!-- <button class="btn btn-success pull-right" onclick="add_work_week()"><i class="fa fa-plus-circle"></i> Add Work Week</button>-->
                        <!--<button class="btn btn-default" onclick="reload_table(workWeekDataTable)"><i class="glyphicon glyphicon-refresh"></i> Reload</button>-->
                        <div class="tools"> </div>
                        <table class="table table-striped table-bordered table-hover table-header-fixed dt-responsive" id="workWeekTable" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th class="all">Day</th>
                                <th class="min-tablet">Status</th>
                                <th class="min-tablet">Country</th>
                                <th class="all text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane p-20" role="tabpanel" id="holidays">
                        <button class="btn btn-success pull-right" onclick="add_holiday()"><i class="fa fa-plus-circle"></i> Add Holiday</button>
                        <!--<button class="btn btn-default" onclick="reload_table(holidaysDataTable)"><i class="glyphicon glyphicon-refresh"></i> Reload</button>-->
                        <div class="tools"> </div>
                        <table class="table table-striped table-bordered table-hover table-header-fixed dt-responsive" id="holidaysTable" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th class="all">#</th>
                                <th class="all">Holiday Name</th>
                                <th class="min-tablet">Date</th>
                                <th class="min-tablet">Status</th>
                                <th class="min-tablet">Country</th>
                                <th class="all text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane p-20" role="tabpanel" id="leave_options">
                        <button class="btn btn-success pull-right" onclick="save_leave_options();"><i class="fa fa-save"></i> Save </button>
                        <form action="#" id="leave_settings_form" class="form-horizontal" role="form">
                            <div class="card">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-6">Max Monthly Late</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="settings[max_late]" id="max_late" class="form-control" placeholder="" value="<?php echo $this->administration_mod->setting('max_late'); ?>" >
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-6">Max Monthly Short Leave</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="settings[max_short_leave]" id="max_short_leave" class="form-control" placeholder="" value="<?php echo $this->administration_mod->setting('max_short_leave'); ?>" >
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-6">Max Leave</label>
                                                <div class="col-md-6">
                                                    <input type="text" name="settings[max_leave]" id="max_leave" class="form-control" placeholder="" value="<?php echo $this->administration_mod->setting('max_leave'); ?>" >
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane p-20" role="tabpanel" id="leaveRules">
                        <button class="btn btn-success pull-right" onclick="add_leave_rule()"><i class="fa fa-plus-circle"></i> Add Leave Rule</button>
                        <!--<button class="btn btn-default" onclick="reload_table(leaveRulesDataTable)"><i class="glyphicon glyphicon-refresh"></i> Reload</button>-->
                        <div class="tools"> </div>
                        <table class="table table-striped table-bordered table-hover table-header-fixed dt-responsive" id="leaveRulesTable" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th class="all">Leave Type</th>
                                <th class="min-tablet">Employee Category</th>
                                <th class="min-tablet">Employment Status</th>
                                <th class="desktop">Leaves per Period</th>
                                <th class="desktop">Leave_accrue</th>
                                <th class="desktop">Propotionate onJoined Date</th>
                                <th class="all text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <!--<div class="tab-pane p-20" role="tabpanel" id="paidTimeOff">
                        <div class="portlet box green">
                            <div class="portlet-body">
                                <button class="btn btn-success" onclick="add_paid_time_off()"><i class="glyphicon glyphicon-plus"></i> Add Paid Time Off</button>
                                <button class="btn btn-default" onclick="reload_table(paidTimeOffDataTable)"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
                                <div class="tools"> </div>
                                <table class="table table-striped table-bordered table-hover table-header-fixed dt-responsive" id="paidTimeOffTable" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th class="all">Leave Type</th>
                                        <th class="min-tablet">Employee FName</th>
                                        <th class="min-tablet">Employee LName</th>
                                        <th class="min-tablet">Leave Period</th>
                                        <th class="desktop">Leave Amount</th>
                                        <th class="desktop">Note</th>
                                        <th class="all text-center">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>-->

                    <div class="tab-pane p-20" role="tabpanel" id="employeeLeaveList">
                        <!--                                        <button class="btn btn-success" onclick="apply_leave()"><i class="glyphicon glyphicon-plus"></i> Apply Leave</button>-->
                        <!--<button class="btn btn-default" onclick="reload_table(allLeavesDataTable)"><i class="glyphicon glyphicon-refresh"></i> Reload</button>-->
                        <div class="tools"> </div>
                        <table class="table table-striped table-bordered table-hover table-header-fixed dt-responsive" id="allLeavesTable" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th class="all">Leave ID</th>
                                <th class="min-tablet">Employee FName</th>
                                <th class="min-tablet">Employee LName</th>
                                <th class="none">Employee ID</th>
                                <th class="none">Reason</th>
                                <th class="all">Leave Type</th>
                                <th class="desktop">Leave Start Date</th>
                                <th class="desktop">Leave End Date</th>
                                <th class="desktop">Days</th>
                                <th class="desktop">Reason</th>
                                <th class="desktop">Leave Status</th>
                                <th class="all text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap modal -->
<div class="modal fade" id="leave_type_modal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 id="leave_type_modal_title">Leave Type</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body form">
                <form action="#" id="leave_type_form" class="form">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-6">
                                <?php foreach($form['leave_types'] as $leave_type)
                                {
                                    //echo $leave_type['hidden_field'];
                                    ?>
                                    <div class="form-group">
                                        <label class="control-label"><?php echo $leave_type['label'] ?></label>
                                        <?php echo $leave_type['form_field'] ?>
                                        <span class="help-block"></span>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSaveLeaveType" onclick="save('#btnSaveLeaveType','#leave_type_form','#leave_type_modal')" class="btn btn-success">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->
<!-- Bootstrap modal -->
<div class="modal fade" id="leave_period_modal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 id="leave_period_modal_title">Leave Period</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body form">
                <form action="#" id="leave_period_form" class="form">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-6">
                                <?php foreach($form['leave_periods'] as $leave_period)
                                {
                                    ?>
                                    <div class="form-group">
                                        <label class="control-label"><?php echo $leave_period['label'] ?></label>
                                        <?php echo $leave_period['form_field'] ?>
                                        <span class="help-block"></span>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSaveLeavePeriod" onclick="save('#btnSaveLeavePeriod','#leave_period_form','#leave_period_modal')" class="btn btn-success">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->
<!-- Bootstrap modal -->
<div class="modal fade" id="work_week_modal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 id="work_week_modal_title">Work Week</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body form">
                <form action="#" id="work_week_form" class="form">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-6">
                                <?php foreach($form['work_week'] as $work_week)
                                {
                                    ?>
                                    <div class="form-group">
                                        <label class="control-label"><?php echo $work_week['label'] ?></label>
                                        <?php echo $work_week['form_field'] ?>
                                        <span class="help-block"></span>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSaveWorkWeek" onclick="save('#btnSaveWorkWeek','#work_week_form','#work_week_modal')" class="btn btn-success">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->
<!-- Bootstrap modal -->
<div class="modal fade" id="holiday_modal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 id="holiday_modal_title">Holiday</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

            </div>
            <div class="modal-body form">
                <form action="#" id="holiday_form" class="form">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-6">
                                <?php foreach($form['holidays'] as $holiday)
                                {
                                    ?>
                                    <div class="form-group">
                                        <label class="control-label"><?php echo $holiday['label'] ?></label>
                                        <?php echo $holiday['form_field'] ?>
                                        <span class="help-block"></span>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSaveHoliday" onclick="save('#btnSaveHoliday','#holiday_form','#holiday_modal')" class="btn btn-success">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->
<!-- Bootstrap modal -->
<div class="modal fade" id="leave_rule_modal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 id="leave_rule_modal_title">Leave Rule</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body form">
                <form action="#" id="leave_rule_form" class="form">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-6">
                                <?php foreach($form['leave_rules'] as $leave_rule)
                                {
                                    ?>
                                    <div class="form-group">
                                        <label class="control-label"><?php echo $leave_rule['label'] ?></label>
                                        <?php echo $leave_rule['form_field'] ?>
                                        <span class="help-block"></span>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSaveLeaveRule" onclick="save('#btnSaveLeaveRule','#leave_rule_form','#leave_rule_modal')" class="btn btn-success">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->
<!-- Bootstrap modal -->
<div class="modal fade" id="paid_time_off_modal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 id="paid_time_off_modal_title">Paid Time Off</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

            </div>
            <div class="modal-body form">
                <form action="#" id="paid_time_off_form" class="form">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-6">
                                <?php foreach($form['paid_time_off'] as $paid_time_off)
                                {
                                    ?>
                                    <div class="form-group">
                                        <label class="control-label"><?php echo $paid_time_off['label'] ?></label>
                                        <?php echo $paid_time_off['form_field'] ?>
                                        <span class="help-block"></span>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSavePTO" onclick="save('#btnSavePTO','#paid_time_off_form','#paid_time_off_modal')" class="btn btn-success">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->
<!-- Bootstrap modal -->
<div class="modal fade" id="leave_apply_modal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-blue-steel bg-font-blue-steel">
                <h3 class="modal_title" id="leave_apply_modal_title">Apply Leave</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

            </div>
            <div class="modal-body">
                <div class="row" id="leave_form_1">
                    <div class="col-md-12">
                        <form action="#" id="leave_apply_form" class="form-horizontal">
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="employee_id">Employee</label>
                                    <div class="col-md-6">
                                        <select name="employee" id="employee_id" class="form-control noSelect2">
                                        </select>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="type_of_leave">Leave Type</label>
                                    <div class="col-md-6">
                                        <select name="leave_type" id="type_of_leave" class="form-control noSelect2">
                                        </select>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="leave_start_date">Leave Start Date</label>
                                    <div class="col-md-6">
                                        <input type="text" name="start_date" id="leave_start_date" class="form-control form-control-inline input-medium" size="16" data-date-format="yyyy-mm-dd">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="leave_end_date">Leave End Date</label>
                                    <div class="col-md-6">
                                        <input type="text" name="end_date" id="leave_end_date" class="form-control form-control-inline input-medium" size="16" data-date-format="yyyy-mm-dd">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4" for="leave_reason">Reason for Leave</label>
                                    <div class="col-md-6">
                                        <textarea name="leave_reason" id="leave_reason" class="form-control"></textarea>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group" id="selectAttachment">
                                    <label class="control-label col-md-4" for="leave_attachment">Attachment<br>(If you wish to submit any document related to your leave, attach it here.<br>If not leave blank.)</label>
                                    <div class="col-md-6" id="attachment">
                                        <input type="file" name="attachment" id="leave_attachment" class="form-control input-optional">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row" id="leave_form_2" style="display: none;">
                    <div class="col-md-8">
                        <div class="form-body">
                            <div id="leave_summary_detail">
                                <h4>Leave Summary</h4>
                                <div id="leave_summary"></div>
                            </div>
                            <div id="selected_leave_dates">
                                <h4>Selected Leave Dates</h4>
                                <form action="#" id="leave_day_types_form" class="form-horizontal">
                                    <table class="table table-striped table-bordered table-advance table-hover">
                                        <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Leave Type of Day</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSaveLeave" class="btn btn-success">Continue</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->
<!-- Bootstrap modal -->
<div class="modal fade" id="show_leave_days_modal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-blue-steel bg-font-blue-steel">
                <h3 class="modal_title" id="show_leave_days_modal_title">Leave Days</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <table id="leave_days" class="table table-striped table-bordered table-advance table-hover">
                            <thead>
                            <tr>
                                <th>Leave Date</th>
                                <th>Leave Day Type</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->

<script>
var leaveTypesDataTable,
    periodsDataTable,
    workWeekDataTable,
    holidaysDataTable,
    leaveRulesDataTable,
    paidTimeOffDataTable,
    allLeavesDataTable,
    save_method,
    current_data_table,
    form_validation = true,
    file_validation = true;

$(document).ready(function(){


    leaveTypesDataTable = $('#leaveTypesTable').DataTable({

        "processing": true,
        "serverSide": true,

        "ajax": {
            "data": {
                "<?php echo $this->security->get_csrf_token_name(); ?>":"<?php echo $this->security->get_csrf_hash(); ?>"
            },
//            "url": "<?php //echo site_url('systems/leave_settings_con/ajax_list_leave_types_data')?>//",
            "url": "<?php echo base_url()?>systems/leave_settings_con/ajax_list_leave_types_data",
            "type": "POST"
        },

        "columnDefs": [
            {
                "targets": [ -1 ],
                "orderable": false
            }
        ],
        "language": {
            "aria": {
                "sortAscending": ": activate to sort column ascending",
                "sortDescending": ": activate to sort column descending"
            },
            "emptyTable": "No data available in table",
            "info": "Showing _START_ to _END_ of _TOTAL_ entries",
            "infoEmpty": "No entries found",
            "infoFiltered": "(filtered1 from _MAX_ total entries)",
            "lengthMenu": "_MENU_ entries",
            "search": "Search:",
            "zeroRecords": "No matching records found"
        },
        buttons: [
            { extend: 'print', text:      '<i class="fa fa-print"></i>',
                titleAttr: 'Print' },
            {
                extend:    'copyHtml5',
                text:      '<i class="fa fa-files-o"></i>',
                titleAttr: 'Copy'
            },
            {
                extend:    'excelHtml5',
                text:      '<i class="fa fa-file-excel-o"></i>',
                titleAttr: 'Excel'
            },
            {
                extend:    'csvHtml5',
                text:      '<i class="fa fa-file-text-o"></i>',
                titleAttr: 'CSV'
            },
            {
                extend:    'pdfHtml5',
                text:      '<i class="fa fa-file-pdf-o"></i>',
                titleAttr: 'PDF'
            }
        ],

        responsive: false,
        "order": [
            [0, 'asc']
        ],
        "lengthMenu": [
            [5, 10, 15, 20, -1],
            [5, 10, 15, 20, "All"]
        ],

        "pageLength": 20,
        "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>" // horizobtal scrollable datatable
    });



    periodsDataTable = $('#periodsTable').DataTable({

        "processing": true,
        "serverSide": true,

        "ajax": {
            "data": {
                "<?php echo $this->security->get_csrf_token_name(); ?>":"<?php echo $this->security->get_csrf_hash(); ?>"
            },
            "url": "<?php echo site_url('systems/leave_settings_con/ajax_list_leave_periods_data')?>",
            "type": "POST"
        },

        "columnDefs": [
            {
                "targets": [ -1 ],
                "orderable": false
            }
        ],
        "language": {
            "aria": {
                "sortAscending": ": activate to sort column ascending",
                "sortDescending": ": activate to sort column descending"
            },
            "emptyTable": "No data available in table",
            "info": "Showing _START_ to _END_ of _TOTAL_ entries",
            "infoEmpty": "No entries found",
            "infoFiltered": "(filtered1 from _MAX_ total entries)",
            "lengthMenu": "_MENU_ entries",
            "search": "Search:",
            "zeroRecords": "No matching records found"
        },
        buttons: [
            { extend: 'print', text:      '<i class="fa fa-print"></i>',
                titleAttr: 'Print' },
            {
                extend:    'copyHtml5',
                text:      '<i class="fa fa-files-o"></i>',
                titleAttr: 'Copy'
            },
            {
                extend:    'excelHtml5',
                text:      '<i class="fa fa-file-excel-o"></i>',
                titleAttr: 'Excel'
            },
            {
                extend:    'csvHtml5',
                text:      '<i class="fa fa-file-text-o"></i>',
                titleAttr: 'CSV'
            },
            {
                extend:    'pdfHtml5',
                text:      '<i class="fa fa-file-pdf-o"></i>',
                titleAttr: 'PDF'
            }
        ],

        responsive: true,
        "order": [
            [2, 'asc']
        ],
        "lengthMenu": [
            [5, 10, 15, 20, -1],
            [5, 10, 15, 20, "All"]
        ],

        "pageLength": 20,
        "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>" // horizobtal scrollable datatable
    });




    workWeekDataTable = $('#workWeekTable').DataTable({
        "processing": true,
        "serverSide": true,

        "ajax": {
            "data": {
                "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
            },
            "url": "<?php echo base_url()?>systems/leave_settings_con/ajax_list_work_week_data",
            "type": "POST"
        },

        "columnDefs": [
            {
                "targets": [ -1 ],
                "orderable": false
            }
        ],

        "language": {
            "aria": {
                "sortAscending": ": activate to sort column ascending",
                "sortDescending": ": activate to sort column descending"
            },
            "emptyTable": "No data available in table",
            "info": "Showing _START_ to _END_ of _TOTAL_ entries",
            "infoEmpty": "No entries found",
            "infoFiltered": "(filtered1 from _MAX_ total entries)",
            "lengthMenu": "_MENU_ entries",
            "search": "Search:",
            "zeroRecords": "No matching records found"
        },
        buttons: [
            { extend: 'print', text:      '<i class="fa fa-print"></i>',
                titleAttr: 'Print' },
            {
                extend:    'copyHtml5',
                text:      '<i class="fa fa-files-o"></i>',
                titleAttr: 'Copy'
            },
            {
                extend:    'excelHtml5',
                text:      '<i class="fa fa-file-excel-o"></i>',
                titleAttr: 'Excel'
            },
            {
                extend:    'csvHtml5',
                text:      '<i class="fa fa-file-text-o"></i>',
                titleAttr: 'CSV'
            },
            {
                extend:    'pdfHtml5',
                text:      '<i class="fa fa-file-pdf-o"></i>',
                titleAttr: 'PDF'
            }
        ],

        responsive: true,

        "order": [
            [0, 'asc']
        ],
        "lengthMenu": [
            [5, 10, 15, 20, -1],
            [5, 10, 15, 20, "All"]
        ],

        "pageLength": 20,
        "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>" // horizobtal scrollable datatable
    });

    holidaysDataTable = $('#holidaysTable').DataTable({
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        // Load data for the table's content from an Ajax source
        "ajax": {
            "data": {
                "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
            },
            "url": "<?php echo base_url()?>systems/leave_settings_con/ajax_list_holidays_data",
            "type": "POST"
        },
        //Set column definition initialisation properties.
        "columnDefs": [
            {
                "targets": [ -1 ], //last column
                "orderable": false //set not orderable
            }
        ],"aoColumns": [
            null,
            null,
            null,
            null,
            null,
            { "bSortable": false,"bSearchable": false }
        ],
        // Internationalisation. For more info refer to http://datatables.net/manual/i18n
        "language": {
            "aria": {
                "sortAscending": ": activate to sort column ascending",
                "sortDescending": ": activate to sort column descending"
            },
            "emptyTable": "No data available in table",
            "info": "Showing _START_ to _END_ of _TOTAL_ entries",
            "infoEmpty": "No entries found",
            "infoFiltered": "(filtered1 from _MAX_ total entries)",
            "lengthMenu": "_MENU_ entries",
            "search": "Search:",
            "zeroRecords": "No matching records found"
        },
        buttons: [
            { extend: 'print', text:      '<i class="fa fa-print"></i>',
                titleAttr: 'Print' },
            {
                extend:    'copyHtml5',
                text:      '<i class="fa fa-files-o"></i>',
                titleAttr: 'Copy'
            },
            {
                extend:    'excelHtml5',
                text:      '<i class="fa fa-file-excel-o"></i>',
                titleAttr: 'Excel'
            },
            {
                extend:    'csvHtml5',
                text:      '<i class="fa fa-file-text-o"></i>',
                titleAttr: 'CSV'
            },
            {
                extend:    'pdfHtml5',
                text:      '<i class="fa fa-file-pdf-o"></i>',
                titleAttr: 'PDF'
            }
        ],
        // setup responsive extension: http://datatables.net/extensions/responsive/
        responsive: true,
        // setup rowreorder extension: http://datatables.net/extensions/fixedheader/

        "order": [
            [2, 'desc']
        ],
        "lengthMenu": [
            [5, 10, 15, 20, -1],
            [5, 10, 15, 20, "All"] // change per page values here
        ],
        // set the initial value
        "pageLength": 20,
        "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>" // horizobtal scrollable datatable
    });

    leaveRulesDataTable = $('#leaveRulesTable').DataTable({
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        // Load data for the table's content from an Ajax source
        "ajax": {
            "data": {
                "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
            },
            "url": "<?php echo base_url()?>systems/leave_settings_con/ajax_list_leave_rules_data",
            "type": "POST"
        },
        //Set column definition initialisation properties.
        "columnDefs": [
            {
                "targets": [ -1 ], //last column
                "orderable": false //set not orderable
            }
        ],
        // Internationalisation. For more info refer to http://datatables.net/manual/i18n
        "language": {
            "aria": {
                "sortAscending": ": activate to sort column ascending",
                "sortDescending": ": activate to sort column descending"
            },
            "emptyTable": "No data available in table",
            "info": "Showing _START_ to _END_ of _TOTAL_ entries",
            "infoEmpty": "No entries found",
            "infoFiltered": "(filtered1 from _MAX_ total entries)",
            "lengthMenu": "_MENU_ entries",
            "search": "Search:",
            "zeroRecords": "No matching records found"
        },
        buttons: [
            { extend: 'print', text:      '<i class="fa fa-print"></i>',
                titleAttr: 'Print' },
            {
                extend:    'copyHtml5',
                text:      '<i class="fa fa-files-o"></i>',
                titleAttr: 'Copy'
            },
            {
                extend:    'excelHtml5',
                text:      '<i class="fa fa-file-excel-o"></i>',
                titleAttr: 'Excel'
            },
            {
                extend:    'csvHtml5',
                text:      '<i class="fa fa-file-text-o"></i>',
                titleAttr: 'CSV'
            },
            {
                extend:    'pdfHtml5',
                text:      '<i class="fa fa-file-pdf-o"></i>',
                titleAttr: 'PDF'
            }
        ],
        // setup responsive extension: http://datatables.net/extensions/responsive/
        responsive: true,
        // setup rowreorder extension: http://datatables.net/extensions/fixedheader/

        "order": [
            [1, 'desc']
        ],
        "lengthMenu": [
            [5, 10, 15, 20, -1],
            [5, 10, 15, 20, "All"] // change per page values here
        ],
        // set the initial value
        "pageLength": 20,
        "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>" // horizobtal scrollable datatable
    });

    paidTimeOffDataTable = $('#paidTimeOffTable').DataTable({
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        // Load data for the table's content from an Ajax source
        "ajax": {
            "data": {
                "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
            },
            "url": "<?php echo base_url()?>systems/leave_settings_con/ajax_list_paid_time_off_data",
            "type": "POST"
        },
        //Set column definition initialisation properties.
        "columnDefs": [
            {
                "targets": [ -1 ], //last column
                "orderable": false //set not orderable
            }
        ],
        // Internationalisation. For more info refer to http://datatables.net/manual/i18n
        "language": {
            "aria": {
                "sortAscending": ": activate to sort column ascending",
                "sortDescending": ": activate to sort column descending"
            },
            "emptyTable": "No data available in table",
            "info": "Showing _START_ to _END_ of _TOTAL_ entries",
            "infoEmpty": "No entries found",
            "infoFiltered": "(filtered1 from _MAX_ total entries)",
            "lengthMenu": "_MENU_ entries",
            "search": "Search:",
            "zeroRecords": "No matching records found"
        },
        buttons: [
            { extend: 'print', text:      '<i class="fa fa-print"></i>',
                titleAttr: 'Print' },
            {
                extend:    'copyHtml5',
                text:      '<i class="fa fa-files-o"></i>',
                titleAttr: 'Copy'
            },
            {
                extend:    'excelHtml5',
                text:      '<i class="fa fa-file-excel-o"></i>',
                titleAttr: 'Excel'
            },
            {
                extend:    'csvHtml5',
                text:      '<i class="fa fa-file-text-o"></i>',
                titleAttr: 'CSV'
            },
            {
                extend:    'pdfHtml5',
                text:      '<i class="fa fa-file-pdf-o"></i>',
                titleAttr: 'PDF'
            }
        ],
        // setup responsive extension: http://datatables.net/extensions/responsive/
        responsive: true,
        // setup rowreorder extension: http://datatables.net/extensions/fixedheader/
        "order": [
            [1, 'desc']
        ],
        "lengthMenu": [
            [5, 10, 15, 20, -1],
            [5, 10, 15, 20, "All"] // change per page values here
        ],
        // set the initial value
        "pageLength": 20,
        "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>" // horizobtal scrollable datatable
    });

    allLeavesDataTable = $('#allLeavesTable').DataTable({
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        // Load data for the table's content from an Ajax source
        "ajax": {
            "data": {
                "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
            },
            "url": "<?php echo base_url()?>systems/leave_settings_con/ajax_list_all_leaves/0", //pass false as parameter. 0 = false
            "type": "POST"
        },
        //Set column definition initialisation properties.
        "columnDefs": [
            {
                "targets": [ -1 ], //last column
                "orderable": true //set not orderable
            }
        ],"aoColumns": [
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            { "bSortable": false,"bSearchable": false }
        ],
        // Internationalisation. For more info refer to http://datatables.net/manual/i18n
        "language": {
            "aria": {
                "sortAscending": ": activate to sort column ascending",
                "sortDescending": ": activate to sort column descending"
            },
            "emptyTable": "No data available in table",
            "info": "Showing _START_ to _END_ of _TOTAL_ entries",
            "infoEmpty": "No entries found",
            "infoFiltered": "(filtered1 from _MAX_ total entries)",
            "lengthMenu": "_MENU_ entries",
            "search": "Search:",
            "zeroRecords": "No matching records found"
        },
        buttons: [
            { extend: 'print', text:      '<i class="fa fa-print"></i>',
                titleAttr: 'Print' },
            {
                extend:    'copyHtml5',
                text:      '<i class="fa fa-files-o"></i>',
                titleAttr: 'Copy'
            },
            {
                extend:    'excelHtml5',
                text:      '<i class="fa fa-file-excel-o"></i>',
                titleAttr: 'Excel'
            },
            {
                extend:    'csvHtml5',
                text:      '<i class="fa fa-file-text-o"></i>',
                titleAttr: 'CSV'
            },
            {
                extend:    'pdfHtml5',
                text:      '<i class="fa fa-file-pdf-o"></i>',
                titleAttr: 'PDF'
            }
        ],
        // setup responsive extension: http://datatables.net/extensions/responsive/
        responsive: true,
        // setup rowreorder extension: http://datatables.net/extensions/fixedheader/
        "order": [
            [1, 'desc']
        ],
        "lengthMenu": [
            [5, 10, 15, 20, -1],
            [5, 10, 15, 20, "All"] // change per page values here
        ],
        // set the initial value
        "pageLength": 20,
        "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>" // horizobtal scrollable datatable
    });

    yadcf.init(allLeavesDataTable, [{
            filter_type: "text",
            filter_delay: 500,
            column_number: 0
        }, {
            filter_type: "text",
            filter_delay: 500,
            column_number: 1
        },{
            filter_type: "text",
            filter_delay: 500,
            column_number: 2
        },{
            filter_type: "text",
            filter_delay: 500,
            column_number: 3
        },{
            filter_type: "text",
            filter_delay: 500,
            column_number: 4
        },{
            filter_type: "text",
            filter_delay: 500,
            column_number: 5
        },{
            filter_type: "text",
            filter_delay: 500,
            column_number: 6
        },{
            filter_type: "text",
            filter_delay: 500,
            column_number: 7
        },{
            filter_type: "text",
            filter_delay: 500,
            column_number: 8
        },{
            filter_type: "text",
            filter_delay: 500,
            column_number: 9
        },{
            filter_type: "text",
            filter_delay: 500,
            column_number: 10
        }],
        {
            cumulative_filtering: false
        });



    //load_leave_types_list
    $.ajax({
        url: "<?php echo site_url('systems/leave_management_con/load_leave_type_list'); ?>",
        type: "POST",
        data: {
            "<?php echo $this->security->get_csrf_token_name(); ?>":"<?php echo $this->security->get_csrf_hash() ?>"
        },
        dataType: "JSON",
        success: function(data)
        {
            console.log(data);
            $('#type_of_leave').html("<option value=''></option>");
            $.each(data, function(id,name)
            {
                var opt = $('<option />');
                opt.val(id);
                opt.text(name);
                $('#type_of_leave').append(opt);
            });
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from Leave Types Names');
        }
    });


    //load_employees_list
    $.ajax({
        async: false,
        url: "<?php echo site_url('systems/employee_list/get_all_employees'); ?>",
        type: "POST",
        data: {
            "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash() ?>"
        },
        dataType: "JSON",
        success: function(data)
        {
            $('#employee_id').html("<option value=''></option>");
            $.each(data, function(id,name)
            {
                var opt = $('<option />');
                opt.val(id);
                opt.text(name);
                $('#employee_id').append(opt);
            });
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from Employees');
        }
    });
    //set input/textarea/select event when change value, remove class error and remove text help block
    $("input").change(function(){
        $(this).closest('div.has-error').removeClass('has-error');
        $(this).next("span").empty();
    });
    $("textarea").change(function(){
        $(this).closest('div.has-error').removeClass('has-error');
        $(this).next("span").empty();
    });
    $("select").change(function(){
        $(this).closest('div.has-error').removeClass('has-error');
        $(this).next("span").empty();
    });

    $("form :input:not(.input-optional, .input-hidden)").each(function(){
        $(this).siblings('label').append("<span class='required-mark' style='color: #c90054;'>*</span>");
    });
    $("#leave_apply_form :input:not(.input-optional, .input-hidden)").each(function(){
        $(this).parent().siblings('label').append("<span class='required-mark' style='color: #c90054;'>*</span>");
    });

    $("form.form").each(function(){
        var form_id = $(this).prop('id');
        if($("#" + form_id + " div.form-group").length > 4)
        {
            var divide_after = Math.ceil(($("#" + form_id + " div.form-group").length - 1)/2);
            var html = "</div><div class='col-md-6'>";
            $("#" + form_id + " div.form-group:gt(" + divide_after + ")").detach().wrapAll("<div class='col-md-6'></div>").parent().insertAfter($("#" + form_id + " div.form-group:eq(" + divide_after + ")").parent());
        }
        $("#" + form_id + " input.input-hidden").parent().hide();
        $("#" + form_id + " input.date-input").datepicker({
            format: "yyyy-mm-dd"
        });
    });

    $("#leave_color").prop("type", "color");
    if($("#overtime_compensation option:selected").val() == "TRUE")
    {
        $("#leaves_per_period").val(0).prop('readonly', true);
    }
    else
    {
        $("#leaves_per_period").val("").prop('readonly', false);
    }
    $("#overtime_compensation").on("change", function(){
        if($(this).val() == "TRUE")
        {
            $("#leaves_per_period").val(0).prop('readonly', true);
        }
        else
        {
            $("#leaves_per_period").val("").prop('readonly', false);
        }
    });

    $('.modal').on('hidden.bs.modal', function (e) {
        if($(this).find("form")[0])
        {
            $(this).find("form")[0].reset();
        }
        if($('.modal').hasClass('in')) {
            $('body').addClass('modal-open');
        }
    });
    $('#leave_apply_modal').on('click', '#backButton', function (e) {
        $("#backButton").remove();
        $("#leave_form_2").hide();
        $("#leave_day_types_form table tbody").html("");
        $("#leave_form_1").show();
    });
    $('#leave_apply_modal').on('hidden.bs.modal', function (e) {
        $("#backButton").remove();
        $("#leave_form_2").hide();
        $("#leave_day_types_form table tbody").html("");
        $("#leave_form_1").show();
    });

    $(".portlet.box .dataTables_wrapper .dt-buttons").css({"margin-top": "-78px"});

    $("#leave_attachment").on('change', function() {
        $("#leave_attachment").siblings('span').html(""); // To remove the previous error message
        $("#leave_attachment").siblings('span').removeClass('alert alert-success alert-danger fade in');
        file_validation = true;
        var file = this.files[0];
        if(this.value == "")
        {
            $("#leave_attachment").siblings('span').html("");
            $("#leave_attachment").siblings('span').removeClass('alert alert-success alert-danger fade in');
            file_validation = true;
        }
        else
        {
            $.fn.hasExtension = function(exts) {
                return (new RegExp('(' + exts.join('|').replace(/\./g, '\\.') + ')$', "i")).test($(this).val());
            };
            var allowedExts = [".jpeg", ".jpg", ".png", ".bmp", ".pdf", ".doc", ".docx", ".txt", ".zip"];
            if (!$("#leave_attachment").hasExtension(allowedExts) || this.files[0].size > 5242880)
            {
                $("#leave_attachment").siblings('span').html("Invalid file type or file size. <br> " + allowedExts.join(", ") + " file types only are allowed. <br> Also, maximum file size allowed is " + 5242880 / 1024 / 1024 + " MB.");
                $("#leave_attachment").siblings('span').addClass('alert alert-danger fade in');
                file_validation = false;
            }
        }
    });

    $('#leave_start_date').datepicker();
    $('#leave_end_date').datepicker();
    $("#leave_start_date").on("changeDate", function (e) {
        $('#leave_end_date').datepicker('setStartDate', e.date);
    });
    $("#leave_end_date").on("changeDate", function (e) {
        $('#leave_start_date').datepicker('setEndDate', e.date);
    });

    $("#btnSaveLeave").on('click', function(){
        save_leave_application('#btnSaveLeave','#leave_apply_form','#leave_apply_modal');
    })
});

function reload_table(table_name)
{
    if(typeof table_name !== "undefined")
    {
        table_name.ajax.reload(null,false); //reload datatable ajax
    }
    /*else
     {
     table.ajax.reload(null, false); //reload datatable ajax
     }*/
}

function add_leave_type()
{
    save_method = 'add_leave_type';
    current_data_table = leaveTypesDataTable;
    $('#leave_type_form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#leave_type_modal').modal('show'); // show bootstrap modal
    $('#leave_type_modal_title').text('Add New Leave Type'); // Set Title to Bootstrap modal title
}


function add_leave_period()
{
    save_method = 'add_leave_period';
    current_data_table = periodsDataTable;
    $('#leave_period_form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#leave_period_modal').modal('show'); // show bootstrap modal
    $('#leave_period_modal_title').text('Add New Leave period'); // Set Title to Bootstrap modal title
}
function edit_leave_period(id)
{
    save_method = 'edit_leave_period';
    current_data_table = periodsDataTable;
    $('#leave_period_form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo base_url()?>systems/leave_settings_con/ajax_get_leave_period/" + id,
        type: "POST",
        dataType: "JSON",
        data: {
            "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
        },
        success: function(data)
        {
            for(var key in data)
            {
                if( data.hasOwnProperty( key ) ) {
                    $('[name="' + key + '"]').val(data[key]);
                }
            }
            $('#leave_period_modal').modal('show'); // show bootstrap modal when complete loaded
            $('#leave_period_modal_title').text('Edit Period Type: Leave Period ID: ' + data.period_id); // Set title to Bootstrap basic modal title
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

function add_work_week()
{
    save_method = 'add_work_week';
    current_data_table = workWeekDataTable;
    $('#work_week_form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#work_week_modal').modal('show'); // show bootstrap modal
    $('#work_week_modal_title').text('Add New Work Week'); // Set Title to Bootstrap modal title
}
function edit_work_week(id)
{
    save_method = 'edit_work_week';
    current_data_table = workWeekDataTable;
    $('#work_week_form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo base_url()?>systems/leave_settings_con/ajax_get_work_week/" + id,
        type: "POST",
        dataType: "JSON",
        data: {
            "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
        },
        success: function(data)
        {
            for(var key in data)
            {
                console.log(key + ": " + data[key]);
                if( data.hasOwnProperty( key ) ) {
                    console.log(key + ": " + data[key]);
                    $('[name="' + key + '"]').val(data[key]);
                }
            }
            $('#work_week_modal').modal('show'); // show bootstrap modal when complete loaded
            $('#work_week_modal_title').text('Edit Work Week: Work Week ID: ' + data.work_week_id); // Set title to Bootstrap basic modal title
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

function add_holiday()
{
    save_method = 'add_holiday';
    current_data_table = holidaysDataTable;
    $('#holiday_form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#holiday_modal').modal('show'); // show bootstrap modal
    $('#holiday_modal_title').text('Add New Holiday'); // Set Title to Bootstrap modal title
}

function edit_holiday(id)
{
    save_method = 'edit_holiday';
    current_data_table = holidaysDataTable;
    $('#holiday_form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo base_url()?>systems/leave_settings_con/ajax_get_holiday/" + id,
        type: "POST",
        dataType: "JSON",
        data: {
            "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
        },
        success: function(data)
        {
            for(var key in data)
            {
                if( data.hasOwnProperty( key ) ) {
                    $('[name="' + key + '"]').val(data[key]);
                }
            }
            $('#holiday_modal').modal('show'); // show bootstrap modal when complete loaded
            $('#holiday_modal_title').text('Edit Holiday: Holiday ID: ' + data.holiday_id); // Set title to Bootstrap basic modal title
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

function add_leave_rule()
{
    save_method = 'add_leave_rule';
    current_data_table = leaveRulesDataTable;
    $('#leave_rule_form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#leave_rule_modal').modal('show'); // show bootstrap modal
    $('#leave_rule_modal_title').text('Add New Leave Rule'); // Set Title to Bootstrap modal title
}

function edit_leave_rule(id)
{
    save_method = 'edit_leave_rule';
    current_data_table = leaveRulesDataTable;
    $('#leave_rule_form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo base_url()?>systems/leave_settings_con/ajax_get_leave_rule/" + id,
        type: "POST",
        dataType: "JSON",
        data: {
            "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
        },
        success: function(data)
        {
            for(var key in data)
            {
                $('[name="' + key + '"]').val(data[key]);
            }
            $('#leave_rule_modal').modal('show'); // show bootstrap modal when complete loaded
            $('#leave_rule_modal_title').text('Edit Leave Rule: Leave Rule ID: ' + data.leave_rule_id); // Set title to Bootstrap basic modal title
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

function edit_leave_type(id)
{
    save_method = 'edit_leave_type';
    current_data_table = leaveTypesDataTable;
    $('#leave_type_form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo base_url()?>systems/leave_settings_con/ajax_get_leave_type/" + id,
        type: "POST",
        data: {
            "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
        },
        dataType: "JSON",
        success: function(data)
        {
            for(var key in data)
            {
                if($('[name="' + key + '"]').length)
                {
                    $('[name="' + key + '"]').val(data[key]);
                }
            }

            if($("#overtime_compensation option:selected").val() == "TRUE")
            {
                $("#leaves_per_period").val(0).prop('readonly', true);
            }
            else
            {
                if(data['leaves_per_period'])
                {
                    $("#leaves_per_period").val(data['leaves_per_period']).prop('readonly', false);
                }
                else
                {
                    $("#leaves_per_period").val("").prop('readonly', false);
                }
            }
            $('#leave_type_modal').modal('show'); // show bootstrap modal when complete loaded
            $('#leave_type_modal_title').text('Edit Leave Type: Leave Type ID: ' + data.leave_type_id); // Set title to Bootstrap basic modal title
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

function add_paid_time_off()
{
    save_method = 'add_paid_time_off';
    current_data_table = paidTimeOffDataTable;
    $('#paid_time_off_form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#paid_time_off_modal').modal('show'); // show bootstrap modal
    $('#paid_time_off_modal_title').text('Add New Paid Time Off'); // Set Title to Bootstrap modal title
}
function edit_paid_time_off(id)
{
    save_method = 'edit_paid_time_off';
    current_data_table = paidTimeOffDataTable;
    $('#paid_time_off_form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo base_url()?>systems/leave_settings_con/ajax_get_paid_time_off/" + id,
        type: "POST",
        dataType: "JSON",
        data: {
            "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
        },
        success: function(data)
        {
            for(var key in data)
            {
                if( data.hasOwnProperty( key ) ) {
                    $('[name="' + key + '"]').val(data[key]);
                }
            }
            $('#paid_time_off_modal').modal('show'); // show bootstrap modal when complete loaded
            $('#paid_time_off_modal_title').text('Edit Paid Time Off: ID: ' + data.paid_time_off_id); // Set title to Bootstrap basic modal title
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}



function save(button, form_data, modal)
{
    $(button).text('Saving...'); //change button text
    $(button).attr('disabled',true); //set button disable
    var arr = save_method.split(/_(.+)/);
    var php_function = "ajax_save_" + arr[1] + "/" + arr[0];
    var url = "<?php echo base_url()?>systems/leave_settings_con/" + php_function + "/";
    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $(form_data).serialize() + "&<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>",
        dataType: "JSON",
        success: function(data)
        {
            console.log(data);
            if(data.status) //if success close modal and reload ajax table
            {
                $(modal).modal('hide');
                reload_table(current_data_table);
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++)
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $(button).text('Save'); //change button text
            $(button).attr('disabled',false); //set button enable
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error saving data');
            $(button).text('Save'); //change button text
            $(button).attr('disabled',false); //set button enable
        }
    });
}

function apply_leave()
{
    current_data_table = allLeavesDataTable;
    $('#leave_apply_form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#leave_apply_modal').modal('show'); // show bootstrap modal
    $('#leave_apply_modal_title').text('Apply Leave'); // Set Title to Bootstrap modal title
}

function validate(form) {
    $(form + " :input:not(.input-optional, :disabled)").each(function () {
        if ($(this).val() == "") {
            $(this).parent().parent().addClass('has-error');
            $(this).next("span.help-block").text("Please fill this field");
            form_validation = false; // Must be false
        }
        else
        {
            form_validation = true;
        }
    });
}

function save_leave_application(button, form_data, modal)
{
    validate(form_data);
    if(file_validation && form_validation)
    {
        $(button).text('Saving...'); //change button text
        $(button).attr('disabled',true); //set button disable
        var url = "<?php echo base_url()?>systems/leave_management_con/ajax_apply_leave/";
        var formData = new FormData();
        var file = $('#leave_apply_form input[type=file]')[0].files[0];
        formData.append("<?php echo $this->security->get_csrf_token_name(); ?>", "<?php echo $this->security->get_csrf_hash(); ?>");
        var basic_data = $("#leave_apply_form").serializeArray();
        $.each(basic_data,function(key,input){
            formData.append(input.name,input.value);
        });
        var leave_day_types_data = $("#leave_day_types_form").serializeArray();
        leave_day_types_data != undefined ? formData.append("leave_day_types",JSON.stringify(leave_day_types_data)) : formData.append("leave_day_types","");
        formData.append("applicant", "admin_or_hrm"); // To state employee himself applies leave

        // ajax adding data to database
        $.ajax({
            url : url,
            type: "POST",
            data: formData,
            dataType: "JSON",
            contentType: false,
            cache: false,
            processData: false,
            success: function(data)
            {
                if(data.status) //if success close modal and reload ajax table
                {
                    $(modal).modal('hide');
                    reload_table(current_data_table);
                }
                else if(data.result)
                {
                    if($("#backButton").length == 0)
                    {
                        $("#leave_apply_modal .modal-footer").prepend("<button type='button' id='backButton' class='btn btn-default'>Back</button>");
                    }
                    var html = "";
                    for(var z=0; z<data.result.length; z++)
                    {
                        var leave_day_type = "";
                        if(data.result[z].day_status != "Full Day")
                        {
                            leave_day_type = "<input type='hidden' name='" + data.result[z].date + "' id='" + data.result[z].date + "' value=''>" +
                            "<span class='label label-info'>" + data.result[z].day_status + "</span>";
                        }
                        else
                        {
                            leave_day_type = "<select name='" + data.result[z].date + "' id='" + data.result[z].date + "'>" +
                            "<option value='Full Day'>Full Day</option>" +
                            "<option value='Half Day - Morning'>Half Day - Morning</option>" +
                            "<option value='Half Day - Afternoon'>Half Day - Afternoon</option>" +
                            "</select>";
                        }

                        html += "<tr>" +
                        "<td>" + data.result[z].date + " (" + data.result[z].day_name + ") " + "</td>" +
                        "<td>" + leave_day_type + "</td>" +
                        "</tr>";
                    }
                    $("#leave_day_types_form table tbody").html(html);
                    $("#leave_form_2").show();
                    $("#leave_form_1").hide();
                }
                else if(data.inputerror)
                {
                    for (var i = 0; i < data.inputerror.length; i++)
                    {
                        $('[name="'+data.inputerror[i]+'"]').parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                        $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                    }
                }
                else if(data.eligibility_error)
                {
                    bootbox.dialog({
                        message: data.eligibility_error,
                        title: "Sorry!",
                        buttons: {
                            danger: {
                                label: "Back",
                                className: "btn-danger",
                                callback: function() {
                                    $("#backButton").click();
                                }
                            }
                        }
                    });
                }
                $(button).text('Continue'); //change button text
                $(button).attr('disabled',false); //set button enable
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error saving data');
                $(button).text('Continue'); //change button text
                $(button).attr('disabled',false); //set button enable
            }
        });
    }
}
function show_leave_days(id)
{
    current_data_table = allLeavesDataTable;
    $('.form-group').removeClass('has-error'); // clear error class
    $("#show_leave_days_modal_title").html("Leave Days");
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo base_url()?>systems/leave_management_con/ajax_get_leave_days_by_leave_application_id/" + id,
        type: "POST",
        data: {
            "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
        },
        dataType: "JSON",
        success: function(data)
        {
            var leave_days_html = "";
            $.each(data.leave_days, function(key, leave_day){
                leave_days_html+= "<tr>";
                leave_days_html+= "<td>" + leave_day.leave_date + "</td>";
                leave_days_html+= "<td>" + leave_day.leave_day_type + "</td>";
                leave_days_html+= "</tr>";
            });
            $("#leave_days tbody").html(leave_days_html);
            $("#show_leave_days_modal_title").html("Leave Days of Leave Application ID: " + data.leave_application_id);
            $("#show_leave_days_modal").modal('show');
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}
function change_leave_status(id)
{
    console.log(id);
    $.ajax({
        url: "<?php echo base_url()?>systems/leave_management_con/ajax_get_leave_application/" + id,
        type: "POST",
        data: {
            "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
        },
        dataType: "JSON",
        success: function(data)
        {
            var html = "<select name='approval_status' id='approval_status' class='form-control'>" +
                "<option value='Approved'";
            html += data.status == 'Approved' ? " selected='selected'" : "";
            html += ">Approved</option>" +
            "<option value='Rejected'";
            html += data.status == 'Rejected' ? " selected='selected'" : "";
            html += ">Rejected</option>" +
            "<option value='Cancelled'";
            html += data.status == 'Cancelled' ? " selected='selected'" : "";
            html += ">Cancelled</option>" +
            "</select>" +
            "<br>" +
            "<label for='reason'>Reason:</label> " +
            "<input type='text' id='reason' class='form-control'>";

            bootbox.dialog({
                message: html,
                title: "Employee ID: " + data.employee_epf_no +  "<br>" +
                "Leave ID: " + data.leave_application_id +  "<br>" +
                "Change Leave Status to,",
                buttons: {
                    OK: {
                        label: "Submit!",
                        className: "green",
                        callback: function() {
                            var approval_status = $("#approval_status").val();
                            var reason = $("#reason").val();
                            $.ajax({
                                url: "<?php echo base_url()?>systems/leave_management_con/process_leave_approval/" + id,
                                type: "POST",
                                data: {
                                    approval_status: approval_status,
                                    reason: reason,
                                    "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
                                },
                                dataType: "JSON",
                                success: function (data)
                                {
                                    console.log(data);
                                    bootbox.alert(data.message);
                                    if(data.status)
                                    {
                                        reload_table(allLeavesDataTable);
                                    }
                                },
                                error: function (jqXHR, textStatus, errorThrown)
                                {
                                    console.log(jqXHR);
                                    console.log(textStatus);
                                    console.log(errorThrown);
                                }
                            });
                        }
                    },
                    Cancel: {
                        label: "Cancel",
                        className: "red"
                    }
                }
            });
        },
        error: function(jqXHR, textStatus, errorThrown)
        {
            console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);
        }
    });
}
</script>

<script>

    $(document).ready(function(){
        //set input/textarea/select event when change value, remove class error and remove text help block
        $("input").change(function(){
            $(this).parent().removeClass('has-error');
            $(this).next("span").empty();
        });
        $("textarea").change(function(){
            $(this).parent().removeClass('has-error');
            $(this).next("span").empty();
        });
        $("select").change(function(){
            $(this).parent().removeClass('has-error');
            $(this).next("span").empty();
        });

        $("form :input:not(.input-optional, .input-hidden)").each(function(){
            $(this).siblings('label').append("<span class='required-mark' style='color: #c90054;'>*</span>");
        });
    });

    function save_leave_options()
    {
        var url = "<?php echo site_url('systems/administration/save_leave_settings')?>";
        $.ajax({
            url: url,
            type: "POST",
            data: $('#leave_settings_form').serialize() + "&<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>",
            dataType: "JSON",
            success: function (data) {
                if (data.status) {

                    if (data.message) {
                        bootbox.alert(data.message);
                    }

                    //reload_table(allowance_datatable);
                    //window.location = "<?php echo base_url('systems/leave_settings_con/')?>";

                    var block_ele = $('#leave_settings_form').closest('.form-group');
                    // Block Element
                    block_ele.block({
                        message: '<div class="ft-refresh-cw icon-spin font-medium-2"><i class="fa fa-circle-o-notch fa-2x"></i></div>',
                        timeout: 2000, //unblock after 2 seconds
                        overlayCSS: {
                            backgroundColor: '#FFF',
                            cursor: 'wait'
                        },
                        css: {
                            border: 0,
                            padding: 0,
                            backgroundColor: 'none'
                        }
                    });

                    //$('.nav-tabs a[href="#' + tab + '"]').tab('show');
                }
                else {
                    if (data.message) {
                        bootbox.alert(data.message);
                    }
                    if(data.error)
                    {
                        for (var l = 0; l < data.inputerror.length; l++)
                        {
                            $('[name="'+data.inputerror[l]+'"]').siblings("span.error-block").html(data.error_string[l]).show();
                        }
                    }
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
            }
        });
    }

</script>