<?php
/**
 * Created by PhpStorm.
 * User: kasun
 * Date: 8/23/2021
 * Time: 4:22 PM
 */
?>

<style>
    #datatable1 tbody td {
        padding: 2px 5px;
    }
    #datatable1 .btn {
        margin-left: 0;
        margin-right: 5px;
        padding: 2px 5px;
    }
    .dataTables_filter{
        text-align: right;
        margin-top: 5px;
    }
    .btn-sm {
        padding: 2px !important;
    }

    .new-react-version {
        padding: 20px 20px;
        border: 1px solid #eee;
        border-radius: 20px;
        box-shadow: 0 2px 12px 0 rgba(0,0,0,0.1);

        text-align: center;
        font-size: 14px;
        line-height: 1.7;
    }

    .new-react-version .react-svg-logo {
        text-align: center;
        max-width: 60px;
        margin: 20px auto;
        margin-top: 0;
    }


    /* Rating Star Widgets Style */
    .rating-stars ul {
        list-style-type:none;
        padding:0;

        -moz-user-select:none;
        -webkit-user-select:none;
    }
    .rating-stars ul > li.star {
        display:inline-block;

    }

    /* Idle State of the stars */
    .rating-stars ul > li.star > i.fa {
        font-size:2.0em; /* Change the size of the stars */
        color:#ccc; /* Color on idle state */
    }

    /* Hover state of the stars */
    .rating-stars ul > li.star.hover > i.fa {
        color:#FFCC36;
    }

    /* Selected state of the stars */
    .rating-stars ul > li.star.selected > i.fa {
        color: #0a0a0a;
    }

    .nav-tabs .nav-link.active{

    }

</style>

<style>

    ul, li {
        margin:0;
        padding:0;
        list-style-type:none;
    }

    form ul li {
        margin:10px 20px;

    }


    .invalid {
        background:url(<?php echo base_url('assets/images/cross.jpg') ?>) no-repeat 0 50%;
        padding-left:22px;
        line-height:24px;
        color:#ec3f41;
    }
    .valid {
        background:url(<?php echo base_url('assets/images/right.jpg') ?>) no-repeat 0 50%;
        padding-left:22px;
        line-height:24px;
        color:#3a7d34;
    }
    #pswd_info {
        display:none;
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
                <li class="breadcrumb-item active">Employee Claim Limit</li>
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
                <h4 class="page-head-title card-title  text-white" style="display: inline-block"> Employee Claim Limit</h4>
<!--                <button type="button" class="btn btn-success pull-right" onclick="add_emp()" ><i class="fa fa-plus-circle"></i> Add New Employee</button>-->
            </div>
            <div class="element-box">

                <table id="employee_datatable" class="table" cellspacing="0" width="100%">
                    <thead style="background-color: #0e7eff;color: white;">
                    <tr>
                        <th>#</th>
                        <th>EMP CODE</th>
                        <th>NAME</th>
                        <th>MEDICAl YEAR</th>
                        <th>FROM DATE</th>
                        <th>TO DATE</th>
                        <th>MAX AMOUNT</th>
                        <th>SCHEME</th>
                                           </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>


            </div>
        </div>
    </div>
</div>

<hr>



<!-- Bootstrap modal -->
<div class="modal fade" id="review_quiz_view_modal" role="dialog">
    <div class="modal-dialog modal-lg" >
        <div class="modal-content">
            <div class="modal-header bg-blue-steel bg-font-blue-steel">
                <h4 class="modal-title bold uppercase" style="height:10px">Review Summary</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body form">
                <div class="form-body" style="padding: 0px 10px;">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" >Employee</label>
                                <div id="lbl-employee_view"></div>
                                <span class="error-block"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" >Coordinator</label>
                                <div id="lbl-coordinator_view"></div>
                                <span class="error-block"></span>
                            </div>
                        </div>
                        <hr>
                        <div class="col-md-12">
                            <div id="load_view_quiz_form_data"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<!--#################################################### Salary Mangement##################################-->
<!-- Salary modal -->
<div class="modal fade" id="emp_sal_modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel"></h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="background-color: #000000">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form id="emp_sal_form" method="post">
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                        <input name="emp_sal_id" id="emp_sal_id" class="" type="hidden">
                        <table class="df" style="width: auto; margin-left: 20px">

                        </table>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save_salary()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<!-- #################################################### Employee Mangement ################################## -->
<!-- Photo Upload modal -->
<div class="modal fade" id="photo_upload_modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-blue-steel bg-font-blue-steel">
                <h3 class="photo-upload-title">Upload Photo</h3>
            </div>
            <div class="modal-body form">
                <div id="photo_upload_div" style="display: none">
                    <div class="alert alert-success fade in col-md-12">
                        <p class="success_message"></p>
                    </div>
                    <form action="" id="photo-upload-form" class="form-horizontal" enctype="multipart/form-data">
                        <div class="row">
                            <div id="image_preview" class="col-md-offset-2 col-md-6">
                                <img style="text-align: center" id="previewing" src="<?php echo base_url('uploads/employee_photos/noprofile-pic.jpg')?>" class="img-responsive img-thumbnail" width="140px" />
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-body">
                                <div class="form-group" id="selectImage">
                                    <label class="col-md-12 col-md-offset-1">Select Employee's photo</label>
                                    <div class="col-md-6" id="photoInput">
                                        <input name="photo" id="stuPhoto" class="form-control input-optional" type="file">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="photo_message"></div>
            </div>
            <div class="modal-footer custom-modal-footer">
                <button type="button" id="btnUploadPhoto" class="btn btn-success">Upload</button>
                <button type="button" id="btnExitModal" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- Emp View modal -->
<div class="modal fade " id="emp_view_modal" role="dialog">
    <div class="modal-dialog modal-lg" style="max-width: 1350px!important;">
        <div class="modal-content">
            <div class="modal-header bg-blue-steel bg-font-blue-steel">
                <h3 id="view_title" class="modal-title bold uppercase">Employee Info</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-2" style="">

                        <!--                        <form action="" enctype="multipart/form-data" method="post">-->
                        <div id="profile_picture_preview" class="thumbnail" style="width: 200px;">
                            <div id="profile_picture_div"></div>
                            <img id="profile_picture" class="img-responsive img-thumbnail" src="" style="width: 200px;"/>
                            <input type="hidden" id="stu_profile_picture_id" value="">
                        </div>
                        <!--                            <input type="file" name="file"><br/>-->
                        <input type="button" value="Change Profile Picture" style="color: white;background-color: #8686b6;border: none;padding: 2px;margin-top: 4px;" onclick="open_photo_upload_modal(true)"> <br/>
                        <!--                        </form>-->
                        <div class="card">
                            <div class="card-body">
                                <input type="hidden" name="emp_id" id="emp_id">
                                <small class="text-muted">Employee ID</small>
                                <h6 id='emp_view_id' class="text-info-hr"></h6>
                                <small class="text-muted">EPF Number</small>
                                <h6 id='emp_view_epf_no' class="text-info-hr"></h6>
                                <small class="text-muted">Full Name</small>
                                <h6 id="emp_view_fullname" class="text-info-hr"></h6>
                                <small class="text-muted p-t-30 db">Birthday</small>
                                <h6 id="emp_view_birthday" class="text-info-hr"></h6>
                                <small class="text-muted p-t-30 db">Gender</small>
                                <h6 id="emp_view_gender" class="text-info-hr"></h6>
                                <small class="text-muted p-t-30 db">Marital Status</small>
                                <h6 id="emp_view_marital_status" class="text-info-hr"></h6>
                                <small class="text-muted p-t-30 db">NIC Number</small>
                                <h6 id="emp_view_nic_num" class="text-info-hr"></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-10" style="">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item"><a class="nav-link active" role="tab" href="#basic_info" data-toggle="tab"> Information </a></li>
                            <li class="nav-item"><a class="nav-link" role="tab" href="#qulification_info" data-toggle="tab"> Qualifications </a></li>
                            <li class="nav-item"><a class="nav-link" role="tab" href="#docs_info" data-toggle="tab"> Documents </a></li>
                            <li class="nav-item"><a class="nav-link" role="tab" href="#emp_history" data-toggle="tab"> Employee History </a></li>
                            <li class="nav-item"><a class="nav-link" role="tab" href="#perform" data-toggle="tab"> Performance Review </a></li>

                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content tabcontent-border">
                            <div class="tab-pane p-20 active" role="tabpanel" id="basic_info">
                                <div class="card-body">
                                    <h5 class="form-title" style="display: block; background: #838c94;color: #fff; padding: 3px 5px;">Basic Info</h5>
                                    <div class="row">
                                        <div class="col-md-3 col-xs-6 b-r"><strong class="text-muted">Driving License ID</strong>
                                            <br>
                                            <h6 id="emp_view_driving_license"  class="text-info-hr"></h6>
                                        </div>
                                        <div class="col-md-3 col-xs-6 b-r"><strong class="text-muted">Other ID</strong>
                                            <br>
                                            <h6 id="emp_view_other_id"  class="text-info-hr"></h6>
                                        </div>
                                        <div class="col-md-3 col-xs-6 b-r"><strong class="text-muted">Religion</strong>
                                            <br>
                                            <h6 id="emp_view_religion"  class="text-info-hr"></h6>
                                        </div>
                                        <div class="col-md-3 col-xs-6"><strong class="text-muted">Nationality</strong>
                                            <br>
                                            <h6 id="emp_view_nationality"  class="text-info-hr"></h6>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-3 col-xs-6 b-r"><strong class="text-muted">Blood Group</strong>
                                            <br>
                                            <h6 id="emp_view_blood_group"  class="text-info-hr"></h6>
                                        </div>
                                    </div>
                                    <hr>
                                    <h5 class="form-title" style="display: block; background: #838c94;color: #fff; padding: 3px 5px;">Contact Info</h5>
                                    <div class="row">
                                        <div class="col-md-3 col-xs-6 b-r"><strong class="text-muted">Permanent Address</strong>
                                            <br>
                                            <h6 id="emp_view_permanent_address" class="text-info-hr"></h6>
                                        </div>
                                        <div class="col-md-3 col-xs-6 b-r"><strong class="text-muted">Postal Address</strong>
                                            <br>
                                            <h6 id="emp_view_postal_address" class="text-info-hr"></h6>
                                        </div>
                                        <div class="col-md-3 col-xs-6 b-r"><strong class="text-muted">Personal Mobile</strong>
                                            <br>
                                            <h6 id="emp_view_mobile_phone" class="text-info-hr"></h6>
                                        </div>
                                        <div class="col-md-3 col-xs-6"><strong class="text-muted">Home Phone</strong>
                                            <br>
                                            <h6 id="emp_view_home_phone"  class="text-info-hr"></h6>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-3 col-xs-6 b-r"><strong class="text-muted">Personal Email</strong>
                                            <br>
                                            <h6 id="emp_view_personal_email"  class="text-info-hr"></h6>
                                        </div>
                                        <div class="col-md-3 col-xs-6 b-r"><strong class="text-muted">Office Email</strong>
                                            <br>
                                            <h6 id="emp_view_office_email"  class="text-info-hr"></h6>
                                        </div>
                                        <div class="col-md-3 col-xs-6 b-r"><strong class="text-muted">Mobile 2</strong>
                                            <br>
                                            <h6 id="emp_view_mobile_phone_2" class="text-info-hr"></h6>
                                        </div>
                                        <div class="col-md-3 col-xs-6 b-r"><strong class="text-muted">Office Phone</strong>
                                            <br>
                                            <h6 id="emp_view_office_phone" class="text-info-hr" ></h6>
                                        </div>
                                    </div>
                                    <hr>
                                    <h5 class="form-title" style="display: block; background: #838c94;color: #fff; padding: 3px 5px;">Job Info</h5>
                                    <div class="row">
                                        <div class="col-md-3 col-xs-6 b-r"><strong class="text-muted">Employee Category</strong>
                                            <br>
                                            <h6 id="emp_view_emp_category"  class="text-info-hr"></h6>
                                        </div>
                                        <div class="col-md-3 col-xs-6 b-r"><strong class="text-muted">Department</strong>
                                            <br>
                                            <h6 id="emp_view_department"  class="text-info-hr"></h6>
                                        </div>
                                        <div class="col-md-3 col-xs-6"><strong class="text-muted">Job Title Designation</strong>
                                            <br>
                                            <h6 id="emp_view_job_title" class="text-info-hr" ></h6>
                                        </div>
                                        <div class="col-md-3 col-xs-6 b-r"><strong class="text-muted">Employment Status</strong>
                                            <br>
                                            <h6 id="emp_view_emp_status" class="text-info-hr" ></h6>
                                        </div>
                                        <div class="col-md-3 col-xs-6 b-r"><strong class="text-muted">Leave Act</strong>
                                            <br>
                                            <h6 id="emp_view_leave_cat" class="text-info-hr" ></h6>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-3 col-xs-6 b-r"><strong class="text-muted">Supervisor</strong>
                                            <br>
                                            <h6 id="emp_view_supervisor" class="text-info-hr" ></h6>
                                        </div>
                                        <div class="col-md-3 col-xs-6 b-r"><strong class="text-muted">Date Of Joined</strong>
                                            <br>
                                            <h6 id="emp_view_joined_date" class="text-info-hr" ></h6>
                                        </div>
                                        <div class="col-md-3 col-xs-6 b-r"><strong class="text-muted">Confirmation Date</strong>
                                            <br>
                                            <h6 id="emp_view_confirmed_date"  class="text-info-hr"></h6>
                                        </div>
                                        <div class="col-md-3 col-xs-6"><strong class="text-muted">Branch</strong>
                                            <br>
                                            <h6 id="emp_view_branch"  class="text-info-hr"></h6>
                                        </div>

                                    </div>
                                    <hr>
                                </div>
                            </div>
                            <div class="tab-pane p-20" role="tabpanel" id="qulification_info">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item"><a class="nav-link" role="tab" href="#skill" data-toggle="tab"> Skills </a></li>
                                    <li class="nav-item"><a class="nav-link" role="tab" href="#education" data-toggle="tab"> Educations </a></li>
                                    <li class="nav-item"><a class="nav-link" role="tab" href="#certification" data-toggle="tab"> Certifications </a></li>
                                    <li class="nav-item"><a class="nav-link" role="tab" href="#sport" data-toggle="tab"> Sports </a></li>
                                    <li class="nav-item"><a class="nav-link" role="tab" href="#experience" data-toggle="tab"> Experiences </a></li>
                                </ul>
                                <div class="tab-content tabcontent-border">
                                    <div class="tab-pane p-20 active" role="tabpanel" id="skill">
                                        <div class="portlet box green">
                                            <div class="portlet-body">
                                                <div class="card border-primary">
                                                    <div class="card-header" style="background-color: #694774 !important">
                                                        <h4 class="m-b-0 text-white">Skills</h4></div>
                                                    <div class="card-body">
                                                        <button class="btn-sm btn-success" onclick="add_skill()"><i class="fa fa-plus"></i> Add</button>
                                                        <button class="btn-sm btn-default" onclick="reload_table(skills_table)"><i class="fa fa-refresh"></i> Reload</button>
                                                        <div class="tools"> </div>
                                                        <table class="table table-striped table-bordered table-hover table-header-fixed dt-responsive" id="skills_table" cellspacing="0" width="100%">
                                                            <thead>
                                                            <tr>
                                                                <th class="all">Skill</th>
                                                                <th class="all">Details</th>
                                                                <th class="all">Experience</th>
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
                                    <div class="tab-pane p-20" role="tabpanel" id="education">
                                        <div class="portlet box green">
                                            <div class="portlet-body">
                                                <div class="card border-primary" >
                                                    <div class="card-header" style="background-color: #694774 !important">
                                                        <h4 class="m-b-0 text-white">Education</h4></div>
                                                    <div class="card-body">
                                                        <button class="btn-sm btn-success" onclick="add_edu()"><i class="fa fa-plus"></i> Add</button>
                                                        <button class="btn-sm btn-default" onclick="reload_table(edu_table)"><i class="fa fa-refresh"></i> Reload</button>
                                                        <div class="tools"> </div>
                                                        <table class="table table-striped table-bordered table-hover table-header-fixed dt-responsive" id="edu_table" cellspacing="0" width="100%">
                                                            <thead>
                                                            <tr>
                                                                <th class="all">Name</th>
                                                                <th class="all">Institute</th>
                                                                <th class="all">Start Date</th>
                                                                <th class="all">Completed Date</th>
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
                                    <div class="tab-pane p-20" role="tabpanel" id="certification">
                                        <div class="portlet box green">
                                            <div class="portlet-body">
                                                <div class="card border-primary">
                                                    <div class="card-header" style="background-color: #694774 !important">
                                                        <h4 class="m-b-0 text-white">Certifications</h4></div>
                                                    <div class="card-body">
                                                        <button class="btn-sm btn-success" onclick="add_certi()"><i class="fa fa-plus"></i> Add</button>
                                                        <button class="btn-sm btn-default" onclick="reload_table(certi_table)"><i class="fa fa-refresh"></i> Reload</button>
                                                        <div class="tools"> </div>
                                                        <table class="table table-striped table-bordered table-hover table-header-fixed dt-responsive" id="certi_table" cellspacing="0" width="100%">
                                                            <thead>
                                                            <tr>
                                                                <th class="all">Name</th>
                                                                <th class="all">Institute</th>
                                                                <th class="all">Granted On</th>
                                                                <th class="all">Valid Thru</th>
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
                                    <div class="tab-pane p-20" role="tabpanel" id="sport">
                                        <div class="portlet box green">
                                            <div class="portlet-body">
                                                <div class="card border-primary">
                                                    <div class="card-header" style="background-color: #694774 !important">
                                                        <h4 class="m-b-0 text-white">Sports</h4></div>
                                                    <div class="card-body">
                                                        <button class="btn-sm btn-success" onclick="add_sport()"><i class="fa fa-plus"></i> Add</button>
                                                        <button class="btn-sm btn-default" onclick="reload_table(sport_table)"><i class="fa fa-refresh"></i> Reload</button>
                                                        <div class="tools"> </div>
                                                        <table class="table table-striped table-bordered table-hover table-header-fixed dt-responsive" id="sport_table" cellspacing="0" width="100%">
                                                            <thead>
                                                            <tr>
                                                                <th class="all">Name</th>
                                                                <th class="all">Level</th>
                                                                <!--                                                            <th class="all">Granted On</th>-->
                                                                <!--                                                            <th class="all">Valid Thru</th>-->
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
                                    <div class="tab-pane p-20" role="tabpanel" id="experience">
                                        <!-- BEGIN TABLE PORTLET-->
                                        <div class="portlet box green">
                                            <div class="portlet-body">
                                                <div class="card border-primary">
                                                    <div class="card-header" style="background-color: #694774 !important">
                                                        <h4 class="m-b-0 text-white">Experiences</h4></div>
                                                    <div class="card-body">
                                                        <button class="btn-sm btn-success" onclick="add_exp()"><i class="fa fa-plus"></i> Add</button>
                                                        <button class="btn-sm btn-default" onclick="reload_table(exp_table)"><i class="fa fa-refresh"></i> Reload</button>
                                                        <div class="tools"> </div>

                                                        <table class="table table-striped table-bordered table-hover table-header-fixed dt-responsive" id="exp_table" cellspacing="0" width="100%">
                                                            <thead>
                                                            <tr>
                                                                <th class="all">Experience</th>
                                                                <th class="desktop">Company</th>
                                                                <th class="desktop">Description</th>
                                                                <th class="none">Period</th>
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
                                        <!-- END TABLE PORTLET-->
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane p-20" role="tabpanel" id="docs_info">
                                <!-- BEGIN TABLE PORTLET-->
                                <div class="portlet box green">
                                    <div class="portlet-body">
                                        <button class="btn btm-sm btn-success" onclick="add_file()"><i class="glyphicon glyphicon-plus"></i> Add Document</button>
                                        <button class="btn btn-default" onclick="reload_table(file_table)"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
                                        <div class="tools"> </div>
                                        <table class="table table-striped table-bordered table-hover table-header-fixed dt-responsive" id="file_table" cellspacing="0" width="100%">
                                            <thead>
                                            <tr>
                                                <th class="all">Document Name</th>
                                                <th class="desktop">Document Type</th>
                                                <th class="none">File Size</th>
                                                <th class="desktop">Valid Until</th>
                                                <th class="all">Status</th>
                                                <th class="desktop">Details</th>
                                                <th class="desktop">Date Added</th>
                                                <th class="desktop">Date Modified</th>
                                                <th class="all text-center">Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- END TABLE PORTLET-->
                            </div>

                            <div class="tab-pane p-20" role="tabpanel" id="emp_history">
                                <!-- BEGIN TABLE PORTLET-->
                                <div class="portlet box green">
                                    <div class="portlet-body">
                                        <div class="tools"> </div>
                                        <br>
                                        <h4>Employee History</h4>
                                        <table class="table table-striped table-bordered table-hover table-header-fixed dt-responsive" id="history_table" cellspacing="0" width="100%">
                                            <thead>
                                            <!--                                            <tr>-->
                                            <!--                                                <th colspan="2" class="desktop">Employee History</th>-->
                                            <!---->
                                            <!--                                            </tr>-->
                                            </thead>
                                            <tbody id="hist">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- END TABLE PORTLET-->
                            </div>
                            <div class="tab-pane p-20" role="tabpanel" id="perform">
                                <!-- BEGIN TABLE PORTLET-->
                                <div class="portlet box green">
                                    <div class="portlet-body">
                                        <div class="tools"> </div>
                                        <table id="review_datatable" class="table" cellspacing="0" width="100%">
                                            <thead style="background-color: #0e7eff;color: white;">
                                            <tr>
                                                <th>#</th>
                                                <th>Employee</th>
                                                <th>Coordinator</th>
                                                <th>Template</th>
                                                <th>Status</th>
                                                <th>Review Date</th>
                                                <th>Review Period Start Date</th>
                                                <th>Review Period End Date</th>
                                                <th>Self Assessment Due Date</th>
                                                <th>Note</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- END TABLE PORTLET-->
                            </div>

                        </div>


                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!--Employee Add/Edit modal -->
<div class="modal fade" id="emp_form_modal" role="dialog">
    <div class="modal-dialog modal-full"  style="max-width: 850px!important;">
        <div class="modal-content">
            <div class="modal-header bg-blue-steel bg-font-blue-steel">
                <h4 class="modal-title bold uppercase"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body form">
                <form id="emp_form" class="form-material" >
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <p>The fields marked with <span style="color: red"> * </span> are required</p>
                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li class="nav-item"><a class="nav-link active" role="tab" href="#personal_info_tab" data-toggle="tab"> Personal Info </a></li>
                                        </ul>
                                        <!-- Tab panes -->
                                        <div class="tab-content tabcontent-border">
                                            <div class="tab-pane p-20 active" role="tabpanel" id="personal_info_tab">
                                                <table  class="df col-md-12" style="margin-top: 10px;width: 1000px !important;">
                                                    <tbody>
                                                    <tr>
                                                        <th class="title_head">EMP CODE<span style="color: red"> * </span></th>
                                                        <th>
                                                            <input type="hidden" name="emp_id" id="emp_id">
                                                            <input type="text" name="emp_code" id="emp_code" class="form-control" placeholder="Emp Code">
                                                            <span class="error-block"></span>
                                                        </th>

                                                    </tr>
                                                    <tr>
                                                        <th class="title_head">Title<span style="color: red"> * </span></th>
                                                        <th>
                                                            <select name="title" id="title" class="form-control nOselect2">
                                                                <option value="Mr">Mr.</option>
                                                                <option value="Mrs">Mrs.</option>
                                                                <option value="Ms">Ms.</option>
                                                            </select>
                                                            <span class="error-block"></span>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th class="title_head">INITIALS<span style="color: red"> * </span></th>
                                                        <th>
                                                            <input type="text" name="initials" id="initials" class="form-control" placeholder="Initials">
                                                            <span class="error-block"></span>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th class="title_head">NAME<span style="color: red"> * </span></th>
                                                        <th>
                                                            <input type="text" name="name" id="name" class="form-control" placeholder="Name">
                                                            <span class="error-block"></span>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th class="title_head">DESIGNATION<span style="color: red"> * </span></th>
                                                        <th>
                                                            <select class="form-control" name="designation" id="designation">
                                                                <option></option>
                                                            </select>
                                                            <span class="error-block"></span>
                                                        </th>

                                                    </tr>
                                                    <tr>
                                                        <th class="title_head">DIVISION<span style="color: red"> * </span></th>
                                                        <th>
                                                            <select class="form-control" name="division" id="division">
                                                                <option></option>
                                                            </select>
                                                            <span class="error-block"></span>
                                                        </th>

                                                    </tr>
                                                    <tr>
                                                        <th class="title_head">ORGANIZATION<span style="color: red"> * </span></th>
                                                        <th>
                                                            <select class="form-control" name="organization" id="organization">
                                                                <option></option>
                                                            </select>
                                                            <span class="error-block"></span>
                                                        </th>

                                                    </tr>
                                                    <tr>
                                                        <th class="title_head">EMPLOYEE SCHEME<span style="color: red"> * </span></th>
                                                        <th>
                                                            <select class="form-control" name="emp_scheme" id="emp_scheme">
                                                                <option></option>
                                                            </select>
                                                            <span class="error-block"></span>
                                                        </th>

                                                    </tr>
                                                    <tr>
                                                        <th class="title_head">EMPLOYEE STATUS<span style="color: red"> * </span></th>
                                                        <th>
                                                            <select class="form-control" name="status" id="status">
                                                                <option value="Active">Active</option>
                                                                <option value="Terminated">Terminated</option>
                                                            </select>
                                                            <span class="error-block"></span>
                                                        </th>

                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li class="nav-item"><a class="nav-link active" role="tab" href="#family_info_tab" data-toggle="tab"> Family Info </a></li>
                                        </ul>
                                        <!-- Tab panes -->
                                        <div class="tab-content tabcontent-border">
                                            <div class="tab-pane p-20 active" role="tabpanel" id="personal_info_tab">
                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                    <tbody>
                                                    <tr>
                                                        <td>
                                                            <table id="dyTable" class="table items table-striped table-bordered table-condensed table-hover">
                                                                <thead>
                                                                <th style="width: 20px;"><a  id="addButton" name="add_row"><i class="icon-plus" style="color:#ff9c20; background-color:#fff"></i></a></th>
                                                                <th style="text-align:center;" align="center" scope="col">FULL NAME</th>
                                                                <th style="text-align:center;" align="center" scope="col">STATUS</th>
                                                                <th></th>

                                                                </thead>

                                                                <tbody id="dyTable_tbody">

                                                                </tbody>

                                                            </table>

                                                        </td>

                                                    </tr>

                                                    </tbody>

                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSaveEmp" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">

    function responseMessage(msg) {
        $('.success-box').fadeIn(200);
        $('.success-box div.text-message').html("<span>" + msg + "</span>");
    }

    $(document).on('show.bs.modal', '.modal', function (event) {
        var zIndex = 1040 + (10 * $('.modal:visible').length);
        $(this).css('z-index', zIndex);
        setTimeout(function() {
            $('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass('modal-stack');
        }, 0);
    });

    var save_method;
    var employee_table;
    var file_table;
    var edu_table;
    var skills_table;
    var certi_table;
    var sport_table;
    var emp_id_for_file;
    var password_check;

    $(document).ready(function() {

        employee_table = $('#employee_datatable').DataTable({
            "processing": true,
            "serverSide": true,
            "colReorder": true,
            "ajax": {
                "data": {
                    "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
                },
                "url": "<?php echo base_url()?>index.php/employee/employee_limit/employee_limit_info",
                "type": "POST"
            },

            "columnDefs": [
                {
                    "targets": [ -1 ],
                    "orderable": false
                }
            ],

            rowCallback: function(row, data, index) {

                if(data[8] == "Active") {
                    $(row).find('td:eq(8)').html('<span style="background-color: #036b53;color: white;border-radius: 5px">&nbsp;&nbsp;Active&nbsp;&nbsp;</span>');
                }
                else if (data[8] == "Inactive") {
                    $(row).find('td:eq(8)').html('<span style="background-color: red;color: white;border-radius: 5px">&nbsp;&nbsp;Inactive&nbsp;&nbsp;</span>');
                }
            },

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
            "buttons": [
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
                [3, 'desc']
            ],
            "lengthMenu": [
                [5, 10, 15, 20, -1],
                [5, 10, 15, 20, "All"]
            ],

            "pageLength": 20,
            "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>" // horizobtal scrollable datatable
        });

        employee_table.on('order.dt search.dt', function () {
            employee_table.column(0, {search: 'applied', order: 'applied'}).nodes().each(function (cell, i) {
                cell.innerHTML = i + 1;
            });
        }).draw();

        yadcf.init(employee_table, [{
                filter_type: "text",
                filter_delay: 100,
                column_number: 0
            }, {
                filter_type: "text",
                filter_delay: 100,
                column_number: 1
            },{
                filter_type: "text",
                filter_delay: 100,
                column_number: 2
            }, {
                filter_type: "text",
                filter_delay: 100,
                column_number: 3
            },{
                filter_type: "text",
                filter_delay: 100,
                column_number: 4
            },{
                filter_type: "text",
                filter_delay: 100,
                column_number: 5
            },{
                filter_type: "text",
                filter_delay: 100,
                column_number: 6
            },{
                filter_type: "text",
                filter_delay: 100,
                column_number: 7
            }],
            {
                cumulative_filtering: false
            });


        $("#btnSaveEmp").off('click');
        $("#btnSaveEmp").on('click', function(e){

            e.preventDefault();

            save(save_method);
        });



        //get master data
        $.ajax({
            async: false,
            url: "<?php echo site_url('index.php/employee/employee_limit/get_master_data'); ?>",
            type: "POST",
            data: {
                "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash() ?>"
            },
            dataType: "JSON",
            success: function(data)
            {
                $("#designation").html('');
                $("#division").html('');
                $("#organization").html('');
                $("#emp_scheme").html('');

                for(var i=0;i<data.designation.length;i++){
                    $("#designation").append('<option value="'+data.designation[i].id+'">'+data.designation[i].name+'</option>');
                }

                for(var i=0;i<data.division.length;i++){
                    $("#division").append('<option value="'+data.division[i].id+'">'+data.division[i].name+'</option>');
                }

                for(var i=0;i<data.organization.length;i++){
                    $("#organization").append('<option value="'+data.organization[i].id+'">'+data.organization[i].name+'</option>');
                }

                for(var i=0;i<data.emp_scheme.length;i++){
                    $("#emp_scheme").append('<option value="'+data.emp_scheme[i].scheme_code+'">'+data.emp_scheme[i].scheme_code+' - '+data.emp_scheme[i].max_amount+'</option>');
                }

            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data');
            }
        });

    });


    function reload_table(table)
    {
        if(typeof table !== "undefined")
        {
            table.ajax.reload(null,false);
        }
    }

    function add_emp()
    {
        save_method = 'add';
        $('#emp_form')[0].reset();
        $('#emp_form_modal').modal({backdrop: 'static', keyboard: false});
        $('#emp_form_modal .modal-title').text('Add Employee');

    }

    var edit_counter=0;

    function edit_emp(id)
    {

        save_method = 'update';
        $('.error-block').empty();
        $.ajax({
            url : "<?php echo site_url('index.php/employee/employee_limit/edit_employee/')?>/" + id,
            type: "POST",
            "data": {
                "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
            },
            dataType: "JSON",
            success: function(data)
            {

                $('[name="emp_id"]').val(id);
                $('[name="emp_code"]').val(data.employee.emp_code);
                $('[name="title"]').val(data.employee.title);
                $('[name="initials"]').val(data.employee.initials);
                $('[name="name"]').val(data.employee.name);
                $('[name="designation"]').val(data.employee.designation);
                $('[name="division"]').val(data.employee.division);
                $('[name="organization"]').val(data.employee.organization);
                $('[name="emp_scheme"]').val(data.employee.emp_scheme);
                $('[name="status"]').val(data.employee.status);

                var html_data='';

                if(data.family_info){

                    for (var i= 0; i< data.family_info.length; ++i){

                        html_data += '<tr id="row_' + edit_counter +'" class="row_dyn">'+
                            '<td style="width:20px">'+
                            '<a href="javascript:;" style="text-align: center"><i class="fa fa-plus-circle" title="Add Family Member" style="widows:5% !important;"></i></a>'+
                            '</td>' +
                            '<td style="width:300px !important;">' +
                            '<input class="form-control" style="height: 40px !important;" type="text" name="member[' + edit_counter + ']" id="member' + edit_counter + '" value="'+data.family_info[i].member+'">' +
                            '</td>' +
                            '<td>' +
                            '<select class="form-control" name="member_status[' + edit_counter + ']" id="member_status' + edit_counter + '">';

                        if(data.family_info[i].status == "SPOUSE"){
                            html_data +='' +
                                '<option value="SPOUSE" selected>SPOUSE</option>' +
                                '<option value="CHILD">CHILD</option>';
                        }
                        else{
                            html_data +='' +
                                '<option value="SPOUSE">SPOUSE</option>' +
                                '<option value="CHILD" selected>CHILD</option>';
                        }

                        html_data +='</select>'+
                            '</td>'+
                            '<td style="text-align: center">' +
                            '<i class="fa fa-trash tip del" id="' + edit_counter + '" title="Remove Family Member" style="cursor:pointer;" data-placement="right"></i>' +
                            '</td>' +
                            '</tr>';

                        $("table#dyTable").on("click", '.del', function()
                        {

                            var delID = $(this).attr('id');
                            row_id = $("#row_" + edit_counter);
                            row_id.remove();
                        });

                        edit_counter++;

                    }
                    $("#dyTable_tbody").html(html_data);
                }

                $('#emp_form_modal').modal({backdrop: 'static', keyboard: false});
                $('#emp_form_modal .modal-title').text('Edit Employee: #' + data.employee.initials+" "+data.employee.name);
            },
            error: function ()
            {
                console.log('Error get Edit EMP Data');
            }
        });

    }

    function view_emp(id){

        $('.text-info-hr').html("");
        $('#photo-upload-form input[type=file]').val("");
        $('#profile_picture').attr('src', '');

        $("#stuEditWizard ul li").first().children("a").click();
        $('.form-group').removeClass('has-error');
        $('.help-block').empty();
        $('#profile_picture').attr('src', '');
        $('#profile_picture').attr("src","<?php echo base_url('uploads/employee_photos/noprofile-pic.jpg')?>");
        $.ajax({
            url : "<?php echo site_url('systems/employee_list/ajax_get_emp_info')?>/" + id,
            type: "POST",
            "data": {
                "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
            },
            dataType: "JSON",
            success: function(data)
            {

                $('a[href="#basic_info"]').tab('show');

                $.ajax({
                    url:"<?php echo site_url('systems/employee_list/image_available')?>",
                    dataType:"JSON",
                    type:"POST",
                    data:{
                        id:id,
                        "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
                    },
                    success:function(data){
                        var d = new Date();
                        var n = d.getTime();

                        if(data.photo)
                        {
                            $('#profile_picture').attr("src","<?php echo base_url('uploads/employee_photos'); ?>" + "/" + data.photo + "?" + n);
                        }
                        else
                        {
                            $('#profile_picture').attr("src","<?php echo base_url('uploads/employee_photos/noprofile-pic.jpg')?>");
                        }
                    },
                    error:function(){
                        $('#profile_picture').attr('src', '');
                        console.log("error retrieve image");
                    }
                });

                $('#emp_id').val(data.emp_info.id);
                $('#emp_view_id').html(data.emp_info.employee_id);
                $('#emp_view_epf_no').html(data.emp_info.epf_no);
                $('#emp_view_fullname').html(data.emp_info.full_name);
                $('#emp_view_name').html(data.emp_info.initials+" "+data.emp_info.last_name);
                $('#emp_view_birthday').html(data.emp_info.birthday);
                $('#emp_view_gender').html(data.emp_info.gender);
                $('#emp_view_marital_status').html(data.emp_info.marital_status);
                $('#emp_view_nic_num').html(data.emp_info.nic_num);
                $('#emp_view_driving_license').html(data.emp_info.driving_license);
                $('#emp_view_other_id').html(data.emp_info.other_id);
                $('#emp_view_blood_group').html(data.emp_info.blood_group);
                $('#emp_view_religion').html(data.data_religion.name);
                $('#emp_view_nationality').html(data.data_nationality.name);
                $('#emp_view_permanent_address').html(data.emp_info.permanent_address);
                $('#emp_view_postal_address').html(data.emp_info.postal_address);
                $('#emp_view_mobile_phone').html(data.emp_info.mobile_phone);
                $('#emp_view_mobile_phone_2').html(data.emp_info.mobile_phone_2);
                $('#emp_view_home_phone').html(data.emp_info.home_phone);
                $('#emp_view_office_phone').html(data.emp_info.office_phone);
                $('#emp_view_personal_email').html(data.emp_info.personal_email);
                $('#emp_view_emp_status').html(data.data_employment_status.description);
                $('#emp_view_office_email').html(data.emp_info.office_email);
                $('#emp_view_emp_category').html(data.data_employee_category.desc);
                if(data.data_supervisor!=""){
                    $('#emp_view_supervisor').html(data.data_supervisor.first_name+' '+data.data_supervisor.last_name);
                }
                if(data.data_leave_cat!=""){
                    if(data.data_leave_cat[0]==1){
                        $('#emp_view_leave_cat').html('Shop and Office');
                    }else if(data.data_leave_cat[0]==2){
                        $('#emp_view_leave_cat').html('Wages Boards');
                    }
                }
                $('#emp_view_joined_date').html(data.emp_info.joined_date);
                $('#emp_view_confirmed_date').html(data.emp_info.confirmed_date);
                $('#emp_view_department').html(data.data_department.desc);
                $('#emp_view_job_title').html(data.data_job_title.desc);
                $('#emp_view_branch').html(data.data_branch.name);

                emp_id_for_file = data.emp_info.id;
                //datatables
                file_table = $('#file_table').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "order": [],

                    "ajax": {
                        "url": "<?php echo site_url('systems/employee_list/ajax_list_employee_documents')?>/"+data.emp_info.id,
                        "data": {
                            "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
                        },
                        "type": "POST"
                    },
                    "columnDefs": [
                        {
                            "targets": [ -1 ],
                            "orderable": false
                        }
                    ]
                });
                certi_table = $('#certi_table').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "order": [],

                    "ajax": {
                        "url": "<?php echo site_url('systems/employee_list/ajax_list_employee_certi')?>/"+data.emp_info.id,
                        "data": {
                            "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
                        },
                        "type": "POST"
                    },
                    "columnDefs": [
                        {
                            "targets": [ -1 ],
                            "orderable": false
                        }
                    ]
                });
                edu_table = $('#edu_table').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "order": [],

                    "ajax": {
                        "url": "<?php echo site_url('systems/employee_list/ajax_list_employee_edus')?>/"+data.emp_info.id,
                        "data": {
                            "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
                        },
                        "type": "POST"
                    },
                    "columnDefs": [
                        {
                            "targets": [ -1 ],
                            "orderable": false
                        }
                    ]
                });
                skills_table = $('#skills_table').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "order": [],

                    "ajax": {
                        "url": "<?php echo site_url('systems/employee_list/ajax_list_employee_skills')?>/"+data.emp_info.id,
                        "data": {
                            "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
                        },
                        "type": "POST"
                    },
                    "columnDefs": [
                        {
                            "targets": [ -1 ],
                            "orderable": false
                        }
                    ]
                });
                exp_table = $('#exp_table').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "order": [],

                    "ajax": {
                        "url": "<?php echo site_url('systems/employee_list/ajax_list_employee_exp')?>/"+data.emp_info.id,
                        "data": {
                            "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
                        },
                        "type": "POST"
                    },
                    "columnDefs": [
                        {
                            "targets": [ -1 ],
                            "orderable": false
                        }
                    ]
                });
                sport_table = $('#sport_table').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "order": [],

                    "ajax": {
                        "url": "<?php echo site_url('systems/employee_list/ajax_list_employee_sport')?>/"+data.emp_info.id,
                        "data": {
                            "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
                        },
                        "type": "POST"
                    },
                    "columnDefs": [
                        {
                            "targets": [ -1 ],
                            "orderable": false
                        }
                    ]

                });

                review_datatable = $('#review_datatable').DataTable({
                    "processing": true,
                    "serverSide": true,

                    "ajax": {
                        "data": {
                            "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
                        },
                        "url": "<?=base_url()?>systems/employee_list/get_review_data/"+data.emp_info.id,
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
                        "allowancetyTable": "No data available in table",
                        "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                        "infoallowancety": "No entries found",
                        "infoFiltered": "(filtered1 from _MAX_ total entries)",
                        "lengthMenu": "_MENU_ entries",
                        "search": "Search:",
                        "zeroRecords": "No matching records found"
                    },
                    "buttons": [
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


                $.ajax({

                    url:"<?php echo site_url('systems/employee_list/employee_history')?>/"+data.emp_info.id,
                    dataType:"HTML",
                    type:"POST",
                    data:{
                        "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
                    },
                    success:function(data){

                        $('#hist').html(data);

                    },
                    error:function(){

                        console.log("error retrieve data");
                    }
                });


            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                console.log('Error retrieve data from ajax');
            }
        });

        $('#view_title').html('Employee Info');
        $('#emp_view_modal').modal({backdrop: 'static', keyboard: false});

//    $('#upload_image').on('click',function(){
//        $('#photo_upload_modal').modal({backdrop: 'static', keyboard: false});
//    });
    }

    function get_html_for_view_modal_rows(label, key, value)
    {
        return "<div class='row static-info'>" +
            "<div class='col-md-5 name uppercase'>" + label + ": </div>" +
            "<div class='col-md-7 value' id='view-" + key + "'>" +
            value +
            "</div>" +
            "</div>";
    }

    function open_photo_upload_modal(showSuccessMsg,id)
    {

        var id= $('#emp_id').val();
        $.ajax({
            url: "<?php echo site_url('systems/employee_list/ajax_get_employee_photo')?>/"+id,
            type: "POST",
            data: {
                "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
            },
            dataType: "JSON",
            success: function (data) {
                var d = new Date();
                var n = d.getTime();
                if(data.length == 0)
                {
                    $('#previewing').attr("src","<?php echo base_url('uploads/employee_photos/noprofile-pic.jpg')?>");
                }
                else
                {
                    $('#previewing').attr("src","<?php echo base_url('uploads/employee_photos'); ?>" + "/" + data.photo + "?" + n);
                }
            },
            error: function () {
                console.log('Error getting photo');
            }
        });

//    var url = "<?php //echo site_url('systems/employee_list/ajax_add_photo')?>///"+id;

        $('#photo-upload-form')[0].reset();
        $("#photo_upload_div").show();
        $("#photo_message").empty().hide();

        $("#btnUploadPhoto").show().attr('disabled',false).text('Upload');
        $("#btnExitModal").show().attr('disabled',false).text("Skip");

        if(showSuccessMsg)
        {
            $('.success_message').text("Employee details have been saved successfully. It is recommended to upload Employee's photo.");
            $('.success_message').parent().show();
        }
        else
        {
            $('.success_message').parent().hide();
        }

        $('#photo_upload_modal').modal({backdrop: 'static', keyboard: false});
        $('#btnUploadPhoto').off('click.btnUploadPhoto');

        $('#btnUploadPhoto').on('click', function(){

            var formData = new FormData();
            var photo = $('#photo-upload-form input[type=file]')[0].files[0];

            if(photo == undefined)
            {
                $("#photo_message").show().html("No photo is selected!");
                $("#photo_message").removeClass('alert-success').addClass('alert alert-danger fade in');
            }
            else
            {
                formData.append("photo", photo);
                formData.append("<?php echo $this->security->get_csrf_token_name(); ?>", "<?php echo $this->security->get_csrf_hash(); ?>");
                var d = new Date();
                var n = d.getTime();

                var idd= $('#emp_id').val();
                var url = "<?php echo site_url('systems/employee_list/ajax_add_photo')?>/"+idd;

                $.ajax({
                    url: url,
                    type: "POST",
                    data: formData,
                    dataType: "JSON",
                    contentType: false,
                    cache: false,
                    processData:false,
                    beforeSend: function()
                    {
                        $("#btnUploadPhoto").attr('disabled',true).text('Uploading...');
                        $("#btnExitModal").attr('disabled',true);
                    },
                    success: function(data)
                    {
                        $("#photo_message").show().html(data.message);

                        if(data.status)
                        {
                            $("#photo_upload_div").hide();
                            $("#btnUploadPhoto").attr('disabled',false).text('Upload');
                            $("#btnExitModal").attr('disabled',false).text("Close");
                            $("#btnUploadPhoto").hide();
                            $("#photo_message").removeClass('alert-danger').addClass('alert alert-success fade in');
                            $('#profile_picture').attr("src","<?php echo base_url('uploads/employee_photos/noprofile-pic.jpg'); ?>");
                            $('#profile_picture').attr("src","<?php echo base_url('uploads/employee_photos'); ?>" + "/" + data.photo + "?" + n);
                        }
                        else
                        {
                            $("#btnExitModal").show().attr('disabled',false).text("Skip");
                            $("#btnUploadPhoto").attr('disabled',false).text('Upload');
                            $("#photo_message").removeClass('alert-success').addClass('alert alert-danger fade in');
                        }

//                        $('#photo_upload_modal').modal('hide');
//                    window.location = "<?php //echo base_url('systems/employee_list/index')?>//";
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        console.log('Error uploading data: ' + textStatus + " - " + errorThrown);
                        $("#btnExitModal").text("Skip");
                        $("#btnUploadPhoto").attr('disabled',false).text('Upload');
                    }
                });
            }

        });
    }

    function save(save_method)
    {
        var url = "<?php echo site_url('index.php/employee/employee_limit/save_employee'); ?>/" + save_method;
        $.ajax({
            url: url,
            type: "POST",
            data: $('#emp_form').serialize(),
            dataType: "JSON",
            success: function (data) {
                if (data.status) {
                    $('#emp_form_modal').modal('hide');
                    counter = 1;
                    reload_table(employee_table);
                }
                else
                {
                    if(data.message)
                    {
                        bootbox.alert(data.message);
                    }
                    if(data.inputerror)
                    {
                        for (var i = 0; i < data.inputerror.length; i++)
                        {
                            $('[name="'+data.inputerror[i]+'"]').siblings("span.error-block").html(data.error_string[i]).show();
                        }
                        $("#" + $('[name="'+data.inputerror[0]+'"]').prop('id')).focus();
                        var err_tab_id = $('[name="'+data.inputerror[0]+'"]').parents("[role='tabpanel']").prop('id');
                        $("a[href='#"+ err_tab_id +"']").click();
                    }
                }
            },
            error: function (jqXHR, textStatus, errorThrown){
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
                $('#btnSave').text('save');
                $('#btnSave').attr('disabled', false);
            }
        });

//    }
    }

    //set input/textarea/select event when change value, remove class error and remove text help block
    $("input").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("textarea").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("select").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });


    function add_file()
    {
        save_method = 'add_file';
        $('#file-upload-form')[0].reset();
        $("#file_upload_div").show();
        $("#alert-message").empty().hide();
        $("#existingFile").remove();
        $("#override_file").remove();
        $("#btnSaveFile").show().attr('disabled', false).text('Save');
        $("#btnExitFileUploadModal").show().attr('disabled', false).text("Skip");
        $('#file_upload_modal').modal({backdrop: 'static', keyboard: false});
        $('#btnSaveFile').off('click.btnSaveFile');
        $('#btnSaveFile').on('click.btnSaveFile', function(){
            var override_file = false;
            if($("#override_file").length)
            {
                override_file = $("#override_file").is(":checked");
            }
            save_file(override_file);
        });
    }

    function edit_file(document_id)
    {
        save_method = 'edit_file';
        $('#file-upload-form')[0].reset();
        $("#file_upload_div").show();
        $("#alert-message").empty().hide();
        $("#existingFile").remove();
        $("#override_file").remove();
        $("#btnSaveFile").show().attr('disabled', false).text('Save');
        $("#btnExitFileUploadModal").show().attr('disabled', false).text("Skip");

        $.ajax({
            url: "<?php echo base_url()?>employee_list/ajax_get_employee_file_by_file_id/" + document_id,
            type: "POST",
            data: {
                "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
            },
            dataType: "JSON",
            success: function (data) {

                $("#document_type").val(data.document_type_id);
                $("#valid_until").val(data.valid_until);
                $("#status").val(data.status);
                $("#details").val(data.details);
                $("#selectDocument").prepend("" +
                    "<div id='existingFile'>" +
                    "<label class='control-label col-md-4' for='existingFileName'>Document</label>" +
                    "<div class='col-md-6' style='margin-top: 8px;'>" +
                    "<span id='existingFileName' style='font-weight: bold;'>" + data.document_name + "</span>" +
                    "<p style='color: #b9166f;'>If you wish to replace the document, select below. Otherwise leave it blank. <br> <strong>Note:</strong> Replacing a new document will permanently remove the existing file and cannot be recovered. </p>" +
                    "</div>" +
                    "</div>");
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log (jqXHR);
                console.log (textStatus);
                console.log (errorThrown);
                console.log('Error getting file data: ' + textStatus + " - " + errorThrown);
            }
        });

        $('#file_upload_modal').modal({backdrop:'static', keyboard: false}); // show bootstrap modal
        $('#btnSaveFile').off('click.btnSaveFile');
        $('#btnSaveFile').on('click.btnSaveFile', function(){
            var override_file = true;
            save_file(override_file, document_id);
        });
    }

    function delete_file(document_id) {
        if (confirm('Are you sure to permanently delete this document and related information? \n NOTE: This cannot be recovered again.')) {
            // ajax delete data to database
            $.ajax({
                url: "<?php echo base_url()?>systems/employee_list/ajax_delete_file/" + document_id,
                type: "POST",
                data: {
                    "emp_id": emp_id_for_file,
                    "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
                },
                dataType: "JSON",
                success: function (data) {
                    bootbox.alert(data.message);
                    reload_table(file_table);
                    data.status ? console.log("Deletion successful!") : console.log("Deletion failed!");
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);
                    console.log('Error deleting file');
                }
            });
        }
    }


    function BootboxContent() {

        var frm_str = 'Are you sure, that you want to terminate this employee? <form id="some-form">'
            + '<div class="form-group">'
            + '<label for="date">Terminate Date</label>'
            + '<input id="termi_date" class="date span2 form-control input-sm" size="16" placeholder="dd-mm-yy" type="text" required>'
            + '</div>'
            + '<div class="form-group">'
            + '<label for="reason">Terminate reason</label>'
            + '<select name="reason" id="reason" class="form-control nOselect2">'
            + '<option value=""></option>'
            <?php
            foreach($t_reason as $tr){ ?>
            + '<option value="<?php echo $tr->id ?>"><?php echo $tr->reason ?></option>'
            <?php  } ?>
            + '</select>'
            + '</div>'
            + '</form>';

        var object = $('<div/>').html(frm_str).contents();

        object.find('.date').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true
        }).on('changeDate', function (ev) {
            $(this).blur();
            $(this).datepicker('hide');
        });

        return object
    }

    function terminate_emp(id)
    {
        bootbox.dialog({
            message: BootboxContent,
            title: "Alert!",
            buttons: {
                ok: {
                    label: "Yes",
                    className: "btn-primary",
                    callback: function () {
                        if ($('#termi_date').val()==""){
                            bootbox.alert("Date is Required");
                            return false;
                        }
                        if ($('#reason').val()==""){
                            bootbox.alert("Reason is Required");
                            return false;
                        }
                        $.ajax({
                            url : "<?php echo base_url()?>systems/employee_list/ajax_terminate_employee",
                            type: "POST",
                            data: {
                                "emp_id": id,
                                "date": $('#termi_date').val(),
                                "reason": $('#reason').val(),
                                "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
                            },
                            dataType: "JSON",
                            success: function(data)
                            {
                                reload_table(employee_table);
                                bootbox.alert(data.message);
                                data.status ? console.log("Employee Resign successful!") : console.log("Resign failed!");
                            },
                            error: function (jqXHR, textStatus, errorThrown)
                            {
                                console.log(jqXHR);
                                console.log(textStatus);
                                console.log(errorThrown);
                                console.log('Error while Resign');
                            }
                        });
                    }
                },
                cancel: {
                    label: "No",
                    className: "btn-default"
                }
            }
        });
    }

    function save_file(override_file, document_id)
    {
        $("#alert-message").html("").hide();
        var url = "<?=base_url()?>systems/employee_list/ajax_save_file/" + emp_id_for_file;
        var formData = new FormData();
        var file = $('#file-upload-form input[type=file]')[0].files[0];

        if (save_method != 'edit_file') {
            if (file == undefined) {
                $("#alert-message").removeClass('alert-success').addClass('alert alert-danger fade in');
                $("#alert-message").show().html("No file is selected!");
                return false;
            }
        }

        if (save_method == 'edit_file') {
            formData.append("document_id", document_id);
        }
        formData.append("file", file);
        formData.append("<?php echo $this->security->get_csrf_token_name(); ?>", "<?php echo $this->security->get_csrf_hash(); ?>");
        var other_data = $("#file-upload-form").serializeArray();
        $.each(other_data,function(key,input){
            formData.append(input.name,input.value);
        });
        formData.append("override_file", override_file);
        formData.append("save_method", save_method);
        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            dataType: "JSON",
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function () {
                $("#btnSaveFile").attr('disabled', true).text('Saving...'); //set button disable, change button text
                $("#btnExitFileUploadModal").attr('disabled', true); //set button disable
            },
            success: function (data) {
                $("#override_file").remove();
                $("#alert-message").show().html(data.message);
                if (data.status) {
                    $("#file_upload_div").hide();
                    $("#btnSaveFile").attr('disabled', false).text('Save'); //set button enable, change button text
                    $("#btnExitFileUploadModal").attr('disabled', false).text("Close"); //set button enable, change button text
                    $("#btnSaveFile").hide();
                    $("#alert-message").removeClass('alert-danger').addClass('alert alert-success fade in');
                    reload_table(file_table);
                }
                else {
                    if(data.type && data.type == 'file_exist')
                    {
                        $("#alert-message").append("<br>Existing file details are: <br>");
                        $.each(data.existing_file_detail, function(key, val)
                        {
                            $("#alert-message").append("<br>" + key + ": " + val);
                        });
                        if(save_method == 'add_file')
                        {
                            $("#alert-message").append("<br><br>If you wish to override the file and related information, please confirm below and save again. Otherwise choose another file and save.<br><br> <strong>Note:</strong> Overriding will permanently remove the existing file and cannot be recovered.");
                            $("#alert-message").append("<div class='md-checkbox'>" +
                                "<input type='checkbox' id='override_file' class='md-check' value='true'>" +
                                "<label for='override_file' style='font-weight: bold;'>" +
                                "<span></span>" +
                                "<span class='check'></span>" +
                                "<span class='box'></span> I wish to override the file and related details </label>" +
                                "</div>");
                        }
                        if(save_method == 'edit_file')
                        {
                            $("#alert-message").append("<br><br>Please rename the file and try again.<br>");
                        }
                    }
                    if(data.inputerror)
                    {
                        for (var i = 0; i < data.inputerror.length; i++)
                        {
                            $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                            $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                        }
                        $("#alert-message").html("Required fields are empty.");
                    }
                    $("#btnExitFileUploadModal").show().attr('disabled', false).text("Skip");
                    $("#btnSaveFile").attr('disabled', false).text('Save'); //set button enable, change button text
                    $("#alert-message").removeClass('alert-success').addClass('alert alert-danger fade in');
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $("#override_file").remove();
                console.log (jqXHR);
                console.log (textStatus);
                console.log (errorThrown);
                console.log('Error uploading data: ' + textStatus + " - " + errorThrown);
                $("#btnExitFileUploadModal").text("Skip");
                $("#btnSaveFile").attr('disabled', false).text('Save'); //set button enable, change button text
            }

        });

    }



    $('#marital_status').change(function(){

        if($('#marital_status').val() == 'Married'){

            $('#marital_status_info').html('' +
                '<th style="text-align: center">Full Name <br>Spouse & Children</th>' +
                '<th>' +
                '<input type="text" name="spouse_name" id="spouse_name" class="form-control" placeholder="Spouse Name" >'+
                '<input type="text" name="child_name1" id="child_name1" class="form-control" placeholder="Child Name" >'+
                '<input type="text" name="child_name2" id="child_name2" class="form-control" placeholder="Child Name" >'+
                '</th>' +
                '<th style="text-align: center">Birthdays</th>' +
                '<th>' +
                '<input type="text" name="spouse_birthday" id="spouse_birthday" class="form-control date date-pickz" data-date-format="yyyy-mm-dd" autocomplete="off" placeholder="Spouse Birthday" >' +
                '<input type="text" name="child_birthday1" id="child_birthday1" class="form-control date date-pickz" data-date-format="yyyy-mm-dd" autocomplete="off" placeholder="Child Birthday" >' +
                '<input type="text" name="child_birthday2" id="child_birthday2" class="form-control date date-pickz" data-date-format="yyyy-mm-dd" autocomplete="off" placeholder="Child Birthday" >' +
                '</th>' +
                '<th style="text-align: center">NICs</th>' +
                '<th>' +
                '<input type="text" name="spouse_nic" id="spouse_nic" class="form-control" placeholder="Spouse NIC" >' +
                '<input type="text" name="child_nic1" id="child_nic1" class="form-control" placeholder="Child NIC" >' +
                '<input type="text" name="child_nic2" id="child_nic2" class="form-control" placeholder="Child NIC" >' +
                '</th>' +
                '');
        }
        else if($('#marital_status').val()=='Single'){

            $('#marital_status_info').html('' +
                '<th style="text-align: center">Full Name Of Parents</th>' +'<th style="text-align: center">Full Name Of Parents</th>' +
                '<th>' +
                '<input type="text" name="parent_name1" id="parent_name1" class="form-control" placeholder="Parent Name">'+
                '<input type="text" name="parent_name2" id="parent_name2" class="form-control" placeholder="Parent Name">'+
                '</th>' +
                '<th style="text-align: center">Parents Birthdays</th>' +
                '<th>' +
                '<input type="text" name="parent_birthday1" id="parent_birthday1" class="form-control date date-pickz" data-date-format="yyyy-mm-dd" autocomplete="off">' +
                '<input type="text" name="parent_birthday2" id="parent_birthday2" class="form-control date date-pickz" data-date-format="yyyy-mm-dd" autocomplete="off">' +
                '</th>' +
                '<th style="text-align: center">Parents NICs</th>' +
                '<th>' +
                '<input type="text" name="parent_nic1" id="parent_nic1" class="form-control" placeholder="Parent NIC" >' +
                '<input type="text" name="parent_nic2" id="parent_nic2" class="form-control" placeholder="Parent NIC" >' +
                '</th>' +
                '');

        }

        $('.date-pickz').datepicker();
    });


    function imageIsLoaded(e) {
        $("#empPhoto").css("color", "green");
        $('#image_preview').css("display", "block");
        $('#previewing').attr('src', e.target.result);
        $('#previewing').attr('width', '250px');
        $('#previewing').attr('height', '230px');
    }



    //Employee Qulifications
    function add_certi()
    {
        save_method = 'add_certi';
        $('#certi-form')[0].reset();
        $("#certi_div").show();
        $("#alert-message").empty().hide();
        $("#emp_id_certi").val(emp_id_for_file);
        $("#btnSaveCerti").show().attr('disabled', false).text('Save');
        $('#certi_modal').modal({backdrop: 'static', keyboard: false});
        $('#btnSaveCerti').off('click.btnSaveCerti');
        $('#btnSaveCerti').on('click.btnSaveCerti', function(){
            save_certi(save_method);
        });
    }

    function edit_certi(id)
    {
        $('#certi-form')[0].reset();
        save_method = 'edit_certi';
        $('.help-block').empty();
        $("#emp_id_certi").val(emp_id_for_file);
        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo site_url('systems/employee_list/get_certi_data/')?>/" + id,
            type: "GET",
            "data": {
                "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
            },
            dataType: "JSON",
            success: function(data)
            {
                $('#certi_id').val(data[0].id);
                $('#certi_type').val(data[0].certification_id);
                $('#institute_certi').val(data[0].institute);
                $('#granted_on').val(data[0].date_start);
                $('#valid_until_certi').val(data[0].date_end);

                $('#certi_modal').modal({backdrop: 'static', keyboard: false});
                $('#certi_modal .modal-title').text('Edit Certification: #' + data[0].id);
                $('#btnSaveCerti').off('click.btnSaveCerti');
                $('#btnSaveCerti').on('click.btnSaveCerti', function(){
                    save_certi(save_method);
                });
            },
            error: function ()
            {
                console.log('Error get edit certification data');
            }
        });

    }

    function save_certi(save_method)
    {
        var is_valid = true;
        if(!is_valid){return false;}
        var url = "<?php echo site_url('systems/employee_list/save_certi'); ?>/" + save_method;
        $.ajax({
            url: url,
            data: $("#certi-form").serialize(),
            type: "POST",
            dataType: "JSON",
            cache: false,
            success: function(data){
                if(data.status)
                {
                    alert(data.message);
                    $("#certi_modal").modal('hide');
                    reload_table(certi_table);
                }
                else
                {
                    if(data.error)
                    {
                        for (var l = 0; l < data.inputerror.length; l++)
                        {
                            $('[name="'+data.inputerror[l]+'"]').siblings("span.error-block").html(data.error_string[l]).show();
                        }
                    }
                }
            },
            error: function(jqXHR, textStatus, errorThrown ){
                bootbox.alert(textStatus + " : " + errorThrown);
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
            }
        });
    }



    function add_skill()
    {
        save_method = 'add_skill';
        $("#stars li").removeClass('selected');
        $('#skill-form')[0].reset();
        $("#skill_div").show();
        $("#alert-message").empty().hide();
        $("#emp_id_skill").val(emp_id_for_file);
        $("#btnSaveSkill").show().attr('disabled', false).text('Save');
        $('#skill_modal').modal({backdrop: 'static', keyboard: false});
        $('#btnSaveSkill').off('click.btnSaveSkill');
        $('#btnSaveSkill').on('click.btnSaveSkill', function(){
            save_skill(save_method);
        });
    }


    function edit_skill(id)
    {
        $("#stars li").removeClass('selected');
        $('#skill-form')[0].reset();

        save_method = 'edit_skill';
        $('.help-block').empty();
        $("#emp_id_skill").val(emp_id_for_file);
        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo site_url('systems/employee_list/get_skill_data/')?>/" + id,
            type: "GET",
            "data": {
                "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
            },
            dataType: "JSON",
            success: function(data)
            {
                $('#skill_id').val(data[0].id);
                $('#skill_type').val(data[0].skill_id);
                // $('#skill_level').val(data[0].skill_level);
                var stars = $('#stars li').parent().children('li.star');
                var onStar=data[0].skill_level;

                for (i = 0; i < onStar; i++) {

                    $(stars[i]).addClass('selected');
                }
                $('#skill_details').val(data[0].details);
                $(".stars").remove();
                $('#skill_modal').modal({backdrop: 'static', keyboard: false});
                $('#skill_modal .modal-title').text('Edit Skill: #' + data[0].id);
                $('#btnSaveSkill').off('click.btnSaveSkill');
                $('#btnSaveSkill').on('click.btnSaveSkill', function(){
                    save_skill(save_method);
                });
            },
            error: function ()
            {
                console.log('Error get edit skill data');
            }
        });

    }

    function save_skill(save_method)
    {
        var is_valid = true;
        if(!is_valid){return false;}
        var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);


        var url = "<?php echo site_url('systems/employee_list/save_skill'); ?>/" + save_method;
        $.ajax({
            url: url,
            data: $("#skill-form").serialize()+ "&ratingValue=" + ratingValue,
            type: "POST",
            dataType: "JSON",
            cache: false,
            success: function(data){
                if(data.status)
                {
                    alert(data.message);
                    $("#skill_modal").modal('hide');
                    reload_table(skills_table);
                }
                else
                {
                    if(data.error)
                    {
                        for (var l = 0; l < data.inputerror.length; l++)
                        {
                            $('[name="'+data.inputerror[l]+'"]').siblings("span.error-block").html(data.error_string[l]).show();
                        }
                    }
                }
            },
            error: function(jqXHR, textStatus, errorThrown ){
                bootbox.alert(textStatus + " : " + errorThrown);
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
            }
        });
    }


    function add_edu()
    {
        save_method = 'add_edu';
        $('#edu-form')[0].reset();
        $("#edu_div").show();
        $("#alert-message").empty().hide();
        $("#emp_id_edu").val(emp_id_for_file);
        $("#btnSaveEdu").show().attr('disabled', false).text('Save');
        $('#edu_modal').modal({backdrop: 'static', keyboard: false});
        $('#btnSaveEdu').off('click.btnSaveEdu');
        $('#btnSaveEdu').on('click.btnSaveEdu', function(){
            save_edu(save_method);
        });
    }

    function edit_edu(id)
    {
        $('#edu-form')[0].reset();
        save_method = 'edit_edu';
        $('.help-block').empty();
        $("#emp_id_edu").val(emp_id_for_file);
        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo site_url('systems/employee_list/get_edu_data/')?>/" + id,
            type: "GET",
            "data": {
                "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
            },
            dataType: "JSON",
            success: function(data)
            {
                $('#edu_id').val(data[0].id);
                $('#edu_type').val(data[0].education_id);
                $('#institute_edu').val(data[0].institute);
                $('#start_date').val(data[0].date_start);
                $('#completed_date').val(data[0].date_end);
                $('#edu_modal').modal({backdrop: 'static', keyboard: false});
                $('#edu_modal .modal-title').text('Edit Education: #' + data[0].id);
                $('#btnSaveEdu').off('click.btnSaveEdu');
                $('#btnSaveEdu').on('click.btnSaveEdu', function(){
                    save_edu(save_method);
                });
            },
            error: function ()
            {
                console.log('Error get edit edu data');
            }
        });

    }

    function save_edu(save_method)
    {
        var is_valid = true;
        if(!is_valid){return false;}
        var url = "<?php echo site_url('systems/employee_list/save_edu'); ?>/" + save_method;
        $.ajax({
            url: url,
            data: $("#edu-form").serialize(),
            type: "POST",
            dataType: "JSON",
            cache: false,
            success: function(data){
                if(data.status)
                {
                    alert(data.message);
                    $("#edu_modal").modal('hide');
                    reload_table(edu_table);
                }
                else
                {
                    if(data.error)
                    {
                        for (var l = 0; l < data.inputerror.length; l++)
                        {
                            $('[name="'+data.inputerror[l]+'"]').siblings("span.error-block").html(data.error_string[l]).show();
                        }
                    }
                }
            },
            error: function(jqXHR, textStatus, errorThrown ){
                bootbox.alert(textStatus + " : " + errorThrown);
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
            }
        });
    }

    function add_sport()
    {
        save_method = 'add_sport';
        $('#sport-form')[0].reset();
        $("#sport_div").show();
        $("#alert-message").empty().hide();
        $("#emp_id_sport").val(emp_id_for_file);
        $("#btnSaveSport").show().attr('disabled', false).text('Save');
        $('#sport_modal').modal({backdrop: 'static', keyboard: false});
        $('#btnSaveSport').off('click.btnSaveSport');
        $('#btnSaveSport').on('click.btnSaveSport', function(){
            save_sport(save_method);
        });
    }

    function edit_sport(id)
    {
        $('#sport-form')[0].reset();
        save_method = 'edit_sport';
        $('.help-block').empty();
        $("#emp_id_sport").val(emp_id_for_file);
        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo site_url('systems/employee_list/get_sport_data/')?>/" + id,
            type: "GET",
            "data": {
                "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
            },
            dataType: "JSON",
            success: function(data)
            {
                $('#sport_id').val(data[0].id);
                $('#sport_type').val(data[0].sport_id);
                $('#level_sport').val(data[0].level);
//            $('#start_date').val(data[0].date_start);
//            $('#end_date').val(data[0].date_end);

                $('#sport_modal').modal({backdrop: 'static', keyboard: false});
                $('#sport_modal .modal-title').text('Edit Sports: #' + data[0].id);
                $('#btnSaveSport').off('click.btnSaveSport');
                $('#btnSaveSport').on('click.btnSaveSport', function(){
                    save_sport(save_method);
                });
            },
            error: function ()
            {
                console.log('Error get edit Sport data');
            }
        });

    }

    function save_sport(save_method)
    {
        var is_valid = true;
        if(!is_valid){return false;}
        var url = "<?php echo site_url('systems/employee_list/save_sport'); ?>/" + save_method;
        $.ajax({
            url: url,
            data: $("#sport-form").serialize(),
            type: "POST",
            dataType: "JSON",
            cache: false,
            success: function(data){
                if(data.status)
                {
                    alert(data.message);
                    $("#sport_modal").modal('hide');
                    reload_table(sport_table);
                }
                else
                {
                    if(data.error)
                    {
                        for (var l = 0; l < data.inputerror.length; l++)
                        {
                            $('[name="'+data.inputerror[l]+'"]').siblings("span.error-block").html(data.error_string[l]).show();
                        }
                    }
                }
            },
            error: function(jqXHR, textStatus, errorThrown ){
                bootbox.alert(textStatus + " : " + errorThrown);
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
            }
        });
    }

    function add_exp()
    {
        save_method = 'add_exp';
        $('#exp-form')[0].reset();
        $("#exp_div").show();
        $("#alert-message").empty().hide();
        $("#emp_id_exp").val(emp_id_for_file);
        $("#btnSaveExp").show().attr('disabled', false).text('Save');
        $('#exp_modal').modal({backdrop: 'static', keyboard: false});
        $('#btnSaveExp').off('click.btnSaveExp');
        $('#btnSaveExp').on('click.btnSaveExp', function(){
            save_exp(save_method);
        });
    }

    function edit_exp(id)
    {
        $('#exp-form')[0].reset();
        save_method = 'edit_exp';
        $('.help-block').empty();
        $("#emp_id_exp").val(emp_id_for_file);
        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo site_url('systems/employee_list/get_exp_data/')?>/" + id,
            type: "GET",
            "data": {
                "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
            },
            dataType: "JSON",
            success: function(data)
            {

                $('#exp_id').val(data[0].id);
                $('#exp_type').val(data[0].exp_id);
                $('#company_exp').val(data[0].company);
                $('#description').val(data[0].description);
                $('#start_date_exp').val(data[0].date_start);
                $('#end_date').val(data[0].date_end);

                $('#exp_modal').modal({backdrop: 'static', keyboard: false});
                $('#exp_modal .modal-title').text('Edit Experiences: #' + data[0].id);
                $('#btnSaveExp').off('click.btnSaveExp');
                $('#btnSaveExp').on('click.btnSaveExp', function(){
                    save_exp(save_method);
                });
            },
            error: function ()
            {
                console.log('Error get edit exp data');
            }
        });

    }

    function save_exp(save_method)
    {
        var is_valid = true;
        if(!is_valid){return false;}
        var url = "<?php echo site_url('systems/employee_list/save_exp'); ?>/" + save_method;
        $.ajax({
            url: url,
            data: $("#exp-form").serialize(),
            type: "POST",
            dataType: "JSON",
            cache: false,
            success: function(data){
                if(data.status)
                {
                    alert(data.message);
                    $("#exp_modal").modal('hide');
                    reload_table(exp_table);
                }
                else
                {
                    if(data.error)
                    {
                        for (var l = 0; l < data.inputerror.length; l++)
                        {
                            $('[name="'+data.inputerror[l]+'"]').siblings("span.error-block").html(data.error_string[l]).show();
                        }
                    }
                }
            },
            error: function(jqXHR, textStatus, errorThrown ){
                bootbox.alert(textStatus + " : " + errorThrown);
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
            }
        });
    }

    var counter = 1;

    $(document).ready(function() {

        $("#addButton").click(function () {
            if(counter>50){
                alert("Only 50 textboxes allowed");
                return false;
            }
            $.ajax({
                async: false,
                url: "<?php echo site_url('systems/employee_list/get_allowance_list'); ?>",
                type: "POST",
                data: {<?php echo $this->security->get_csrf_token_name(); ?>:"<?php echo $this->security->get_csrf_hash() ?>"},
            dataType: "JSON",
                success: function(data)
            {
                /*if ($('select.select2').data('select2')) {
                 $('select.select2').select2('destroy');
                 }*/

                var dyTable = $(document.createElement('tr')).attr("id", 'row_' + counter).attr("class", 'row_dyn');

                dyTable.after().html('<td></td>' + '<td style="width:300px"><select name="allowance[' + counter + ']" id="allowance' + counter + '" class="main_items select2"><option value="">...</option></select></td><td><input class="amount form-control " type="text" name="amount[' + counter + ']" id="amount' + counter + '" style="width:120px" /></td><td><i class="fa fa-trash tip del" id="' + counter + '" title="Remove This Item" style="cursor:pointer;" data-placement="right"></i></td>');

                dyTable.appendTo("#dyTable");
                $.each(data, function(id,name)
                {
                    var opt = $('<option />');
                    opt.val(id);
                    opt.text(name);
                    $('#allowance'+counter).append(opt);
                });

                /*$('.select2').select2({dropdownParent: $("#allowance_emp_cat_assign_modal")});*/
            },
            error:function (jqXHR, textStatus, errorThrown)
            {
                console.log('Error get data');
            }
        });
            counter++;
        });

        $("table#dyTable").on("click", '.del', function()
        {
            var delID = $(this).attr('id');
            row_id = $("#row_" + delID);
            row_id.remove();
        });
    });

    function upload(){

        $.ajax({
            url: "<?php echo site_url('systems/employee_list/upload_profile')?>",
            type: "POST",
            data: {
                "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
            },
            dataType: "JSON",
            success: function (data) {

                $('#previewing').attr("src","<?php echo base_url('uploads/employee_photos'); ?>" + "/" + data.photo + "?" + n);

            },
            error: function () {
                console.log('Error getting photo');
            }
        });

    }

    function show_quiz(id) {

        $.ajax({
            url : "<?php echo site_url('systems/performance_review/get_review_quiz_data_by_id/')?>/" + id,
            type: "GET",
            "data": {
                "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
            },
            dataType: "JSON",
            success: function(data)
            {

                $('#review_quiz_id').val(data.review_data.id)
                $('#lbl-employee').html(data.employee);
                $('#lbl-coordinator').html(data.coordinator);

                $('#load_quiz_form_data').html('');
                quiz_string='';
                for(var i=0;i<data.QuizTemplateData.length;i++) {

                    //  if (data.QuizTemplateData[i].code) {

                    /*if(data.QuizTemplateData[i].min_val > 0 && data.QuizTemplateData[i].max_val > 0){
                     quiz_string='( '+data.QuizTemplateData[i].min_val+'km - '+data.QuizTemplateData[i].max_val+'km )';
                     }*/
                    if (data.QuizTemplateData[i].field_type == "text") {

                        $('#load_quiz_form_data').append('' +
                            '<div class="form-group">' +
                            '<label class="control-label col-md-12" for="question' + (i + 1) + '">' + data.QuizTemplateData[i].question + '</label>' +
                            '<div class="col-md-12">' +
                            '<input type="hidden" name="question[' + (i + 1) + ']" id="question' + (i + 1) + '" class="form-control" value="' + data.QuizTemplateData[i].id + '" >' +
                            '<input type="text" name="field_type[' + (i + 1) + ']" id="field_type' + (i + 1) + '" class="form-control" value="" >' +
                            '<span class="help-block"></span>' +
                            '</div>' +
                            '</div>' +
                            '');
                    } else if (data.QuizTemplateData[i].field_type == "textarea") {
                        $('#load_quiz_form_data').append('' +
                            '<div class="form-group">' +
                            '<label class="control-label col-md-12" for="question' + (i + 1) + '">' + data.QuizTemplateData[i].question + '</label>' +
                            '<div class="col-md-12">' +
                            '<input type="hidden" name="question[' + (i + 1) + ']" id="question' + (i + 1) + '" class="form-control" value="' + data.QuizTemplateData[i].id + '" >' +
                            '<textarea name="field_type[' + (i + 1) + ']" id="field_type' + (i + 1) + '"  class=" form-control"></textarea>' +
                            '<span class="help-block"></span>' +
                            '</div>' +
                            '</div>' +
                            '');
                    } else if (data.QuizTemplateData[i].field_type == "date") {
                        $('#load_quiz_form_data').append('' +
                            '<div class="form-group">' +
                            '<label class="control-label col-md-12" for="question' + (i + 1) + '">' + data.QuizTemplateData[i].question + '</label>' +
                            '<div class="col-md-12">' +
                            '<input type="hidden" name="question[' + (i + 1) + ']" id="question' + (i + 1) + '" class="form-control" value="' + data.QuizTemplateData[i].id + '" >' +
                            '<input type="text" name="field_type[' + (i + 1) + ']" id="field_type' + (i + 1) + '" class="form-control date-pick" value="" >' +
                            '<span class="help-block"></span>' +
                            '</div>' +
                            '</div>' +
                            '');
                    } else if (data.QuizTemplateData[i].field_type == "select") {
                        var myarr = data.QuizTemplateData[i].options.split(",");
                        var selectdt = "<option value=''>--</option>";
                        for (var j = 0; j < myarr.length; j++) {
                            selectdt += '<option value=' + myarr[j] + '>' + myarr[j] + '</option>';
                        }

                        $('#load_quiz_form_data').append('' +
                            '<div class="form-group">' +
                            '<label class="control-label col-md-12" for="question' + (i + 1) + '">' + data.QuizTemplateData[i].question + '</label>' +
                            '<div class="col-md-12">' +
                            '<input type="hidden" name="question[' + (i + 1) + ']" id="question' + (i + 1) + '" class="form-control" value="' + data.QuizTemplateData[i].id + '" >' +
                            '<select name="field_type[' + (i + 1) + ']" id="field_type' + (i + 1) + '" class=" form-control select2">' + selectdt + '</select>' +
                            '<span class="help-block"></span>' +
                            '</div>' +
                            '</div>' +
                            '');
                    } else if (data.QuizTemplateData[i].field_type == "select2multi") {
                        var myarr2 = data.QuizTemplateData[i].options.split(",");
                        var selectdt2 = "<option value=''>--</option>";
                        for (var q = 0; q < myarr2.length; q++) {
                            selectdt2 += '<option value=' + myarr2[j] + '>' + myarr2[j] + '</option>';
                        }

                        $('#load_quiz_form_data').append('' +
                            '<div class="form-group">' +
                            '<label class="control-label col-md-12" for="question' + (i + 1) + '">' + data.QuizTemplateData[i].question + '</label>' +
                            '<div class="col-md-12">' +
                            '<input type="hidden" name="question[' + (i + 1) + ']" id="question' + (i + 1) + '" class="form-control" value="' + data.QuizTemplateData[i].id + '" >' +
                            '<select name="field_type[' + (i + 1) + ']" id="field_type' + (i + 1) + '" class=" form-control select2" multiple>' + selectdt2 + '</select>' +
                            '<span class="help-block"></span>' +
                            '</div>' +
                            '</div>' +
                            '');
                    } else if (data.QuizTemplateData[i].field_type == "radio") {
                        var myarr3 = data.QuizTemplateData[i].options.split(",");
                        var selectdt3 = "";
                        for (var w = 0; w < myarr3.length; w++) {
                            selectdt3 += '<input type="radio" name="field_type[' + (i + 1) + ']" value=' + myarr3[w] + '>' +'       '+ myarr3[w] +'       '+ '';
                        }
                        $('#load_quiz_form_data').append('' +
                            '<div class="form-group">' +
                            '<label class="control-label col-md-12" for="question' + (i + 1) + '">' + data.QuizTemplateData[i].question + '</label>' +
                            '<div class="col-md-12">' +
                            '<input type="hidden" name="question[' + (i + 1) + ']" id="question' + (i + 1) + '" class="form-control" value="' + data.QuizTemplateData[i].id + '" >' +
                            '' + selectdt3 + '<span class="help-block"></span>' +
                            '</div>' +
                            '</div>' +
                            '');
                    }else if (data.QuizTemplateData[i].field_type == "checkbox") {
                        var myarr3 = data.QuizTemplateData[i].options.split(",");
                        var selectdt3 = "";
                        for (var w = 0; w < myarr3.length; w++) {
                            selectdt3 += '<input type="checkbox" name="field_type[' + (i + 1) + ']" value=' + myarr3[w] + '>' +'        '+myarr3[w] +'        '+ '';
                        }
                        $('#load_quiz_form_data').append('' +
                            '<div class="form-group">' +
                            '<label class="control-label col-md-12" for="question' + (i + 1) + '">' + data.QuizTemplateData[i].question + '</label>' +
                            '<div class="col-md-12">' +
                            '<input type="hidden" name="question[' + (i + 1) + ']" id="question' + (i + 1) + '" class="form-control" value="' + data.QuizTemplateData[i].id + '" >' +
                            '' + selectdt3 + '<span class="help-block"></span>' +
                            '</div>' +
                            '</div>' +
                            '');
                    }
                    //  }
                    $('.select2').select2({dropdownParent: $("#review_quiz_modal")});
                }

                $('#review_quiz_modal').modal({backdrop: 'static', keyboard: false});
                $('#review_quiz_modal .modal-title').text('Review Quiz ' + id);

            },
            error: function ()
            {
                console.log('Error get Quiz data');
            }
        });
    }

</script>

<script>

    $("#addButton").click(function (){

        if(counter>500){
            alert("Only 5000 textboxes allowed");
            return false;
        }

        if(save_method == "update"){
            counter = edit_counter;
        }

        var dyTable = $(document.createElement('tr')).attr("id", 'row_' + counter).attr("class", 'row_dyn');

        dyTable.after().html(''+
            '<td style="width:20px">'+
            '<a href="javascript:;" style="text-align: center"><i class="fa fa-plus-circle" title="Add Family Member" style="widows:5% !important;"></i></a>'+
            '</td>' +

            '<td style="width:300px !important;">' +
            '<input class="form-control" style="height: 40px !important;" type="text" name="member[' + counter + ']" id="member' + counter + '">' +
            '</td>' +
            '<td>' +
            '<select class="form-control" name="member_status[' + counter + ']" id="member_status' + counter + '">' +
            '<option value="SPOUSE">SPOUSE</option>' +
            '<option value="CHILD">CHILD</option>' +
            '</select>'+
            '</td>' +
            '<td style="text-align: center">' +
            '<i class="fa fa-trash tip del" id="' + counter + '" title="Remove Family Member" style="cursor:pointer;" data-placement="right"></i>' +
            '</td>' +
            '');

        dyTable.appendTo("#dyTable");



        $(".numeric").on("keypress keyup blur",function (event){

            $(this).val($(this).val().replace(/[^0-9\.]/g,''));

            if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57) && event.which !=8) {

                event.preventDefault();

            }

        });



        counter++;



    });



    $("table#dyTable").on("click", '.del', function()

    {

        var delID = $(this).attr('id');

        row_id = $("#row_" + delID);

        row_id.remove();

    });
</script>


