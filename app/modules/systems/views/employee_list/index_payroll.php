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
                <li class="breadcrumb-item active">Employee Details</li>
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
                <h4 class="page-head-title card-title  text-white" style="display: inline-block"> Employee Master Maintenance</h4>
                <?php $groups=array('hr_manager'); if ($this->ion_auth->in_group($groups)) { ?>
                <button type="button" class="btn btn-success pull-right" onclick="add_emp()" ><i class="fa fa-plus-circle"></i> Add New Employee</button>
           <?php } ?>
            </div>
            <div class="element-box">

                <div id="external_filter_container_wrapper" style="background: #eaeaea;padding: 2px 10px;">
                    <div class="row">
                        <label class="col-md-3">Filters:</label>
                        <div class="col-md-3">
                            <div id="external_filter_container"></div>
                        </div>
                        <div class="col-md-3">
                            <div id="external_filter_container_2"></div>
                        </div>
                        <div class="col-md-3">
                            <div id="external_filter_container_3"></div>
                        </div>
                    </div>

                </div>

                <table id="employee_datatable" class="table" cellspacing="0" width="100%">
                    <thead style="background-color: #0e7eff;color: white;">
                    <tr>
                        <th>#</th>
                        <th>EMP ID</th>
                        <th>TITLE</th>
                        <th>INITIALS</th>
                        <th>FIRST NAME</th>
                        <th>MIDDLE NAME</th>
                        <th>LAST NAME</th>
                        <th>MOBILE</th>
                        <th>OFFICE Ext.</th>
                        <th>CATEGORY</th>
                        <th>DEPARTMENT</th>
                        <th>JOB TITLE</th>
                        <th style="width:200px">Action</th>
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


<!--#################################################### Documents Mangement ##################################-->
<!-- Document modal -->
<!-- Document Upload modal -->
<div class="modal fade" id="file_upload_modal" role="dialog" style="z-index: 9999999;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-blue-steel bg-font-blue-steel">
                <h3 class="file-upload-title">Upload File</h3>
            </div>
            <div class="modal-body form">
                <div id="file_upload_div">
                    <form action="" id="file-upload-form" class="form-horizontal" enctype="multipart/form-data">
                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label col-md-4" for="document_type">Document Type</label>
                                <div class="col-md-6">
                                    <select name="document_type" id="document_type" class="form-control nOselect2">
                                        <option> </option>
                                        <?php
                                        foreach($emp_doc_types as $emp_doc_type){
                                            echo '<option value="'.$emp_doc_type->id.'">'.$emp_doc_type->type_name.'</option>';
                                        }
                                        ?>
                                    </select>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4" for="valid_until">Valid Until</label>
                                <div class="col-md-6">
                                    <input type="text" name="valid_until" id="valid_until" class="form-control form-control-inline input-medium date-pick" size="16" data-date-format="yyyy-mm-dd">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4" for="document_status">Status</label>
                                <div class="col-md-6">
                                    <select name="document_status" id="document_status" class="form-control nOselect2">
                                        <option value="Active">Active</option>
                                        <option value="Draft">Draft</option>
                                        <option value="Inactive">Inactive</option>
                                    </select>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4" for="details">Details</label>
                                <div class="col-md-6">
                                    <textarea name="details" id="details" class="form-control"></textarea>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group" id="selectDocument">
                                <label class="control-label col-md-4" for="file">Select Document</label><br/>
                                <div class="col-md-6" id="fileInput">
                                    <input type="file" name="file" id="empFile" class="form-control">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div id="attachment_preview"></div>
                </div>
                <div id="alert-message"></div>
            </div>
            <div class="modal-footer custom-modal-footer">
                <button type="button" id="btnSaveFile" class="btn btn-success">Save</button>
                <button type="button" id="btnExitFileUploadModal" class="btn btn-danger" data-dismiss="modal">Skip</button>
            </div>
        </div>
    </div>
</div><!--#################################################### Qulification Mangement ##################################-->
<!-- Certi modal -->
<div class="modal  fade" id="certi_modal" role="dialog" style="z-index: 9999999;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-blue-steel bg-font-blue-steel">
                <h3 class="certi-title">Certifications</h3>
            </div>
            <div class="modal-body form">
                <div id="certi_div">
                    <form action="" id="certi-form" class="form-horizontal">
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                        <input type="hidden" id="emp_id_certi" name="emp_id_certi" value="" />
                        <input type="hidden" id="certi_id" name="certi_id" value="" />
                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label col-md-4" for="certi_type">Certification</label>
                                <div class="col-md-6">
                                    <select name="certi_type" id="certi_type" class="form-control nOselect2">
                                        <option> </option>
                                        <?php
                                        foreach($emp_certi_types as $emp_certi_type){
                                            echo '<option value="'.$emp_certi_type->id.'">'.$emp_certi_type->name.'</option>';
                                        }
                                        ?>
                                    </select>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4" for="institute">Institute / University</label>
                                <div class="col-md-6">
                                    <input type="text" name="institute_certi" id="institute_certi" class="form-control form-control-inline input-medium" size="16">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4" for="granted_on">Granted On</label>
                                <div class="col-md-6">
                                    <input type="text" name="granted_on" id="granted_on" class="form-control form-control-inline input-medium date-pick" size="16" data-date-format="yyyy-mm-dd">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4" for="valid_until">Valid Until</label>
                                <div class="col-md-6">
                                    <input type="text" name="valid_until_certi" id="valid_until_certi" class="form-control form-control-inline input-medium date-pick" size="16" data-date-format="yyyy-mm-dd">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="alert-message-certi"></div>
            </div>
            <div class="modal-footer custom-modal-footer">
                <button type="button" id="btnSaveCerti" class="btn btn-success">Save</button>
                <button type="button" id="btnExitCertiUploadModal" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Skills modal -->
<div class="modal fade" id="skill_modal" role="dialog" style="z-index: 9999999;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-blue-steel bg-font-blue-steel">
                <h3 class="skill-title">Skills</h3>
            </div>
            <div class="modal-body form">
                <div id="skill_div">
                    <form action="" id="skill-form" class="form-horizontal">
                        <input type="hidden" id="emp_id_skill" name="emp_id_skill" value="" />
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                        <input type="hidden" id="skill_id" name="skill_id" value="" />
                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label col-md-4" for="skill_type">Skill</label>
                                <div class="col-md-6">
                                    <select name="skill_type" id="skill_type" class="form-control nOselect2">
                                        <option> </option>
                                        <?php
                                        foreach($emp_skill_types as $emp_skill_type){
                                            echo '<option value="'.$emp_skill_type->id.'">'.$emp_skill_type->name.'</option>';
                                        }
                                        ?>
                                    </select>
                                    <span class="help-block"></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-4" for="skill_level">Skill Level</label>
                                <div class="col-md-6">

                                    <section class='rating-widget'>

                                        <!-- Rating Stars Box -->
                                        <div class='rating-stars text-center'>
                                            <ul id='stars'>
                                                <li class='star' title='Beginner' data-value='1'>
                                                    <i class='fa fa-star fa-fw'></i>
                                                </li>
                                                <li class='star' title='Familiar' data-value='2'>
                                                    <i class='fa fa-star fa-fw'></i>
                                                </li>
                                                <li class='star' title='Proficient' data-value='3'>
                                                    <i class='fa fa-star fa-fw'></i>
                                                </li>
                                                <li class='star' title='Expert' data-value='4'>
                                                    <i class='fa fa-star fa-fw'></i>
                                                </li>
                                                <li class='star' title='Master' data-value='5'>
                                                    <i class='fa fa-star fa-fw'></i>
                                                </li>
                                            </ul>
                                        </div>

                                    </section>


                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4" for="s_exp">Experience</label>
                                <div class="col-md-6">
                                    <select name="s_exp" id="s_exp" class="form-control nOselect2">
                                        <option> </option>
                                        <?php
                                        foreach($skill_ex as $s_exp){
                                            echo '<option value="'.$s_exp->id.'">'.$s_exp->name.'</option>';
                                        }
                                        ?>
                                    </select>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4" for="skill_details">Details</label>
                                <div class="col-md-6">
                                    <textarea name="skill_details" id="skill_details" class="form-control"></textarea>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="alert-message-skill"></div>
            </div>
            <div class="modal-footer custom-modal-footer">
                <button type="button" id="btnSaveSkill" class="btn btn-success">Save</button>
                <button type="button" id="btnExitSkillUploadModal" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Edu modal -->
<div class="modal fade" id="edu_modal" role="dialog" style="z-index: 9999999;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-blue-steel bg-font-blue-steel">
                <h3 class="edu-title">Educations</h3>
            </div>
            <div class="modal-body form">
                <div id="edu_div">
                    <form action="" id="edu-form" class="form-horizontal">
                        <input type="hidden" id="emp_id_edu" name="emp_id_edu" value="" />
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                        <input type="hidden" id="edu_id" name="edu_id" value="" />
                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label col-md-4" for="edu_type">Qualification</label>
                                <div class="col-md-6">
                                    <select name="edu_type" id="edu_type" class="form-control nOselect2">
                                        <option> </option>
                                        <?php
                                        foreach($emp_edu_types as $emp_edu_type){
                                            echo '<option value="'.$emp_edu_type->id.'">'.$emp_edu_type->name.'</option>';
                                        }
                                        ?>
                                    </select>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4" for="institute">Institute / University</label>
                                <div class="col-md-6">
                                    <input type="text" name="institute_edu" id="institute_edu" class="form-control form-control-inline input-medium" size="16">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4" for="start_date">Start Date</label>
                                <div class="col-md-6">
                                    <input type="text" name="start_date" id="start_date" class="form-control form-control-inline input-medium date-pick" size="16" data-date-format="yyyy-mm-dd">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4" for="completed_date">Completed Date</label>
                                <div class="col-md-6">
                                    <input type="text" name="completed_date" id="completed_date" class="form-control form-control-inline input-medium date-pick" size="16" data-date-format="yyyy-mm-dd">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="alert-message-edu"></div>
            </div>
            <div class="modal-footer custom-modal-footer">
                <button type="button" id="btnSaveEdu" class="btn btn-success">Save</button>
                <button type="button" id="btnExitEduUploadModal" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!----Sports --------------------->

<div class="modal fade" id="sport_modal" role="dialog" style="z-index: 9999999;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-blue-steel bg-font-blue-steel">
                <h3 class="exp-title">Sports</h3>
            </div>
            <div class="modal-body form">
                <div id="sport_div">
                    <form action="" id="sport-form" class="form-horizontal">
                        <input type="hidden" id="emp_id_sport" name="emp_id_sport" value="" />
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                        <input type="hidden" id="sport_id" name="sport_id" value="" />
                        <div class="form-body">

                            <div class="form-group">
                                <label class="control-label col-md-4" for="exp_type">Sport</label>
                                <div class="col-md-6">
                                    <select name="sport_type" id="sport_type" class="form-control nOselect2">
                                        <option> </option>
                                        <?php
                                        foreach($emp_sport_types as $sport_type){
                                            echo '<option value="'.$sport_type->id.'">'.$sport_type->name.'</option>';
                                        }
                                        ?>
                                    </select>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4" for="level">Level</label>
                                <div class="col-md-6">
                                    <input type="text" name="level_sport" id="level_sport" class="form-control form-control-inline input-medium" size="16">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <!--                            <div class="form-group">-->
                            <!--                                <label class="control-label col-md-4" for="start_date">Start Date</label>-->
                            <!--                                <div class="col-md-6">-->
                            <!--                                    <input type="text" name="start_date" id="start_date" class="form-control form-control-inline input-medium date-pick" size="16" data-date-format="yyyy-mm-dd">-->
                            <!--                                    <span class="help-block"></span>-->
                            <!--                                </div>-->
                            <!--                            </div>-->
                            <!--                            <div class="form-group">-->
                            <!--                                <label class="control-label col-md-4" for="end_date">End Date</label>-->
                            <!--                                <div class="col-md-6">-->
                            <!--                                    <input type="text" name="end_date" id="end_date" class="form-control form-control-inline input-medium date-pick" size="16" data-date-format="yyyy-mm-dd">-->
                            <!--                                    <span class="help-block"></span>-->
                            <!--                                </div>-->
                            <!--                            </div>-->
                        </div>
                    </form>
                </div>
                <div id="alert-message-sport"></div>
            </div>
            <div class="modal-footer custom-modal-footer">
                <button type="button" id="btnSaveSport" class="btn btn-success">Save</button>
                <button type="button" id="btnExitSportUploadModal" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!--- Experience modal ---->
<div class="modal fade" id="exp_modal" role="dialog" style="z-index: 9999999;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-blue-steel bg-font-blue-steel">
                <h3 class="exp-title">Experiences</h3>
            </div>
            <div class="modal-body form">
                <div id="exp_div">
                    <form action="" id="exp-form" class="form-horizontal">
                        <input type="hidden" id="emp_id_exp" name="emp_id_exp" value="" />
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                        <input type="hidden" id="exp_id" name="exp_id" value="" />
                        <div class="form-body">

                            <div class="form-group">
                                <label class="control-label col-md-4" for="company">Company</label>
                                <div class="col-md-6">
                                    <input type="text" name="company_exp" id="company_exp" class="form-control form-control-inline input-medium" size="16">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4" for="exp_type">Experience</label>
                                <div class="col-md-6">
                                    <select name="exp_type" id="exp_type" class="form-control nOselect2">
                                        <option> </option>
                                        <?php
                                        foreach($emp_exp_types as $emp_exp_type){
                                            echo '<option value="'.$emp_exp_type->id.'">'.$emp_exp_type->name.'</option>';
                                        }
                                        ?>
                                    </select>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4" for="description">Description</label>
                                <div class="col-md-6">
                                    <textarea name="description" id="description" class="form-control"></textarea>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4" for="start_date">Start Date</label>
                                <div class="col-md-6">
                                    <input type="text" name="start_date" id="start_date_exp" class="form-control form-control-inline input-medium date-pick" size="16" data-date-format="yyyy-mm-dd">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-4" for="end_date">End Date</label>
                                <div class="col-md-6">
                                    <input type="text" name="end_date" id="end_date" class="form-control form-control-inline input-medium date-pick" size="16" data-date-format="yyyy-mm-dd">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="alert-message-exp"></div>
            </div>
            <div class="modal-footer custom-modal-footer">
                <button type="button" id="btnSaveExp" class="btn btn-success">Save</button>
                <button type="button" id="btnExitExpUploadModal" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!--- review question form modal
<!-- Bootstrap modal -->
<div class="modal fade" id="review_quiz_modal" role="dialog">
    <div class="modal-dialog modal-lg" >
        <div class="modal-content">
            <div class="modal-header bg-blue-steel bg-font-blue-steel">
                <h4 class="modal-title bold uppercase" style="height:10px">Add New Review</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body form">
                <form action="#" id="review_quiz_form" class="form-horizontal">
                    <div class="form-body" style="padding: 0px 10px;">
                        <input type="hidden" id="review_quiz_id" name="review_quiz_id"/>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" >Employee</label>
                                    <div id="lbl-employee"></div>
                                    <span class="error-block"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" >Coordinator</label>
                                    <div id="lbl-coordinator"></div>
                                    <span class="error-block"></span>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div id="load_quiz_form_data"></div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSaveRQuiz" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

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
                                    <h5 class="form-title" style="display: block; background: #838c94;color: #fff; padding: 3px 5px;">Salary Info</h5>
                                    <div class="row">
                                        <div class="col-md-3 col-xs-6 b-r"><strong class="text-muted">Basic Salary</strong>
                                            <br>
                                            <h6 id="emp_view_emp_category"  class="text-info-hr"></h6>
                                        </div>
                                        <div class="col-md-3 col-xs-6 b-r"><strong class="text-muted">Salary Advance</strong>
                                            <br>
                                            <h6 id="emp_view_department"  class="text-info-hr"></h6>
                                        </div>
                                        <div class="col-md-3 col-xs-6"><strong class="text-muted">Salary Advance Req. Amount</strong>
                                            <br>
                                            <h6 id="emp_view_job_title" class="text-info-hr" ></h6>
                                        </div>
                                        <div class="col-md-3 col-xs-6 b-r"><strong class="text-muted">Festival Bonus</strong>
                                            <br>
                                            <h6 id="emp_view_emp_status" class="text-info-hr" ></h6>
                                        </div>
                                        <div class="col-md-3 col-xs-6 b-r"><strong class="text-muted">Other Deduction</strong>
                                            <br>
                                            <h6 id="emp_view_leave_cat" class="text-info-hr" ></h6>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-3 col-xs-6 b-r"><strong class="text-muted">EPF</strong>
                                            <br>
                                            <h6 id="emp_view_supervisor" class="text-info-hr" ></h6>
                                        </div>
                                        <div class="col-md-3 col-xs-6 b-r"><strong class="text-muted">ETF</strong>
                                            <br>
                                            <h6 id="emp_view_joined_date" class="text-info-hr" ></h6>
                                        </div>
                                        <div class="col-md-3 col-xs-6 b-r"><strong class="text-muted">B/Card</strong>
                                            <br>
                                            <h6 id="emp_view_confirmed_date"  class="text-info-hr"></h6>
                                        </div>
                                        <div class="col-md-3 col-xs-6"><strong class="text-muted">Payee</strong>
                                            <br>
                                            <h6 id="emp_view_branch"  class="text-info-hr"></h6>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-3 col-xs-6 b-r"><strong class="text-muted">Payee Releife</strong>
                                            <br>
                                            <h6 id="emp_view_supervisor" class="text-info-hr" ></h6>
                                        </div>
                                        <div class="col-md-3 col-xs-6 b-r"><strong class="text-muted">Coin Balance</strong>
                                            <br>
                                            <h6 id="emp_view_joined_date" class="text-info-hr" ></h6>
                                        </div>
                                        <div class="col-md-3 col-xs-6 b-r"><strong class="text-muted">Group For Aniversary Bonus</strong>
                                            <br>
                                            <h6 id="emp_view_confirmed_date"  class="text-info-hr"></h6>
                                        </div>
                                        <div class="col-md-3 col-xs-6"><strong class="text-muted">Salary Hold</strong>
                                            <br>
                                            <h6 id="emp_view_branch"  class="text-info-hr"></h6>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-3 col-xs-6 b-r"><strong class="text-muted">Service Year</strong>
                                            <br>
                                            <h6 id="emp_view_supervisor" class="text-info-hr" ></h6>
                                        </div>
                                        <div class="col-md-3 col-xs-6 b-r"><strong class="text-muted">Pay Slip Display No.(N)</strong>
                                            <br>
                                            <h6 id="emp_view_joined_date" class="text-info-hr" ></h6>
                                        </div>
                                        <div class="col-md-3 col-xs-6 b-r"><strong class="text-muted">Increment Apply.(N)</strong>
                                            <br>
                                            <h6 id="emp_view_confirmed_date"  class="text-info-hr"></h6>
                                        </div>
                                        <div class="col-md-3 col-xs-6"><strong class="text-muted">Annivesary Bonus Apply.(N) 	</strong>
                                            <br>
                                            <h6 id="emp_view_branch"  class="text-info-hr"></h6>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-3 col-xs-6 b-r"><strong class="text-muted">Annivesary Gift Apply No.(N)</strong>
                                            <br>
                                            <h6 id="emp_view_supervisor" class="text-info-hr" ></h6>
                                        </div>
                                        <div class="col-md-3 col-xs-6 b-r"><strong class="text-muted">Festival Bonus Apply No.(N)</strong>
                                            <br>
                                            <h6 id="emp_view_joined_date" class="text-info-hr" ></h6>
                                        </div>
                                        <div class="col-md-3 col-xs-6 b-r"><strong class="text-muted">Gratuity Report Apply No.(N)</strong>
                                            <br>
                                            <h6 id="emp_view_confirmed_date"  class="text-info-hr"></h6>
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
    <div class="modal-dialog modal-full"  style="max-width: 1350px!important;">
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
                                            <?php $groups=array('hr_manager'); if ($this->ion_auth->in_group($groups)) { ?>
                                            <li class="nav-item"><a class="nav-link" role="tab" href="#contact_info_tab" data-toggle="tab"> Contact Info </a></li>
                                            <?php  } ?>

                                            <li class="nav-item"><a class="nav-link" role="tab" href="#job_info_tab" data-toggle="tab"> Job Info </a></li>

                                            <?php $groups=array('admin','payroll'); if ($this->ion_auth->in_group($groups)) { ?>
                                            <li class="nav-item"><a class="nav-link" role="tab" href="#salary_info_tab" data-toggle="tab"> Salary Info </a></li>

                                            <li class="nav-item"><a class="nav-link" role="tab" href="#accounts_info_tab" data-toggle="tab"> Accounts Info </a></li>
                                            <li class="nav-item"><a class="nav-link" role="tab" href="#other_info_tab" data-toggle="tab"> Other </a></li>
                                            <?php }?>
                                        </ul>
                                        <!-- Tab panes -->
                                        <div class="tab-content tabcontent-border">
                                            <div class="tab-pane p-20 active" role="tabpanel" id="personal_info_tab">
                                                <table  class="df col-md-12" style="margin-top: 10px;width: 1000px !important;">
                                                    <tbody>
                                                    <tr>
                                                        <th class="title_head">Game # <span style="color: red">*</span></th>
                                                        <th>
                                                            <input type="hidden" name="emp_id" id="emp_id">
                                                            <input type="text" name="emp_no" id="emp_no" class="form-control" placeholder="Employee ID" readonly>
                                                            <span class="error-block"></span>
                                                        </th>
                                                        <th class="title_head">EPF No</th>
                                                        <th>
                                                            <input type="text" name="epf_no" id="epf_no" class="form-control" placeholder="EPF Number" readonly>
                                                            <span class="error-block"></span>
                                                        </th>
                                                        <!-- Kreston~~only~~~code~~KRELV001~~~~~-->
<!--                                                        <th>-->
<!--                                                            <input type="text" name="etf_no" id="etf_no" class="form-control" placeholder="ETF Number">-->
<!--                                                            <span class="error-block"></span>-->
<!--                                                        </th>-->
                                                        <!-- Kreston~~only~~~code~~-->
                                                    </tr>
                                                    <tr>
                                                        <th class="title_head">Gender</th>
                                                        <th>
                                                            <select name="gender" id="gender" class="form-control nOselect2"  readonly>
                                                                <option value=""></option>
                                                                <option value="Male">Male</option>
                                                                <option value="Female">Female</option>
                                                            </select>
                                                            <span class="error-block"></span>
                                                        </th>
                                                        <th class="title_head">Title</th>
                                                        <th>
                                                            <select name="title" id="title" class="form-control nOselect2" readonly>
                                                                <option value=""></option>
                                                                <option value="Mr">Mr.</option>
                                                                <option value="Mrs">Mrs.</option>
                                                                <option value="Ms">Ms.</option>
                                                            </select>
                                                            <span class="error-block"></span>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th class="title_head">Initials</th>
                                                        <th>
                                                            <input type="text" name="initials" id="initials" class="form-control" placeholder="Name With Initials" readonly>
                                                            <span class="error-block"></span>
                                                        </th>
                                                        <th class="title_head">First Name  <span style="color: red">*</span></th>
                                                        <th>
                                                            <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name"  readonly>
                                                            <span class="error-block"></span>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th class="title_head">Middle Name</th>
                                                        <th>
                                                            <input type="text" name="middle_name" id="middle_name" class="form-control" placeholder="Middle Name"  readonly>
                                                            <span class="error-block"></span>
                                                        </th>
                                                        <th class="title_head">Last Name  <span style="color: red">*</span></th>
                                                        <th>
                                                            <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last Name"  readonly>
                                                            <span class="error-block"></span>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th class="title_head">Full Name  <span style="color: red">*</span></th>
                                                        <th colspan="3">
                                                            <input type="text" name="full_name" id="full_name" class="form-control" placeholder="Full Name"  readonly>
                                                            <span class="error-block"></span>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th class="title_head">Birthday</th>
                                                        <th>
                                                            <input type="text" name="birthday" id="birthday" class="form-control date date-pick" data-date-format="yyyy-mm-dd" autocomplete="off" placeholder="Birthday"  readonly>
                                                            <span class="error-block"></span>
                                                        </th>
                                                        <th class="title_head">NIC No  <span style="color: red">*</span></th>
                                                        <th>
                                                            <input type="text" name="nic_num" id="nic_num" class="form-control" placeholder="NIC No"  readonly>
                                                            <span class="error-block"></span>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th class="title_head">Driving License No</th>
                                                        <th>
                                                            <input type="text" name="driving_license" id="driving_license" class="form-control" placeholder="Driving License No"  readonly>
                                                            <span class="error-block"></span>
                                                        </th>
                                                        <th class="title_head">Other ID</th>
                                                        <th>
                                                            <input type="text" name="other_id" id="other_id" class="form-control" placeholder="Other ID"  readonly>
                                                            <span class="error-block"></span>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th class="title_head">Blood Group</th>
                                                        <th>
                                                            <select name="blood_group" id="blood_group" class="form-control nOselect2"  readonly>
                                                                <option value=""></option>
                                                                <option value="A">A</option>
                                                                <option value="B">B</option>
                                                                <option value="AB">AB</option>
                                                                <option value="O">O</option>
                                                            </select>
                                                            <span class="error-block"></span>
                                                        </th>
                                                        <th class="title_head">Religion</th>
                                                        <th>
                                                            <select name="religion" id="religion" class="form-control nOselect2"  readonly>
                                                                <option value=""></option>
                                                                <?php
                                                                foreach($religions as $religion){
                                                                    echo '<option value="'.$religion->id.'">'.$religion->name.'</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                            <span class="error-block"></span>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th class="title_head">Nationality</th>
                                                        <th>
                                                            <select name="nationality" id="nationality" class="form-control nOselect2"  readonly>
                                                                <option value=""></option>
                                                                <?php
                                                                foreach($nationalities as $nationality){
                                                                    echo '<option value="'.$nationality->id.'">'.$nationality->name.'</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                            <span class="error-block"></span>
                                                        </th>
                                                        <th class="title_head">Marital Status</th>
                                                        <th>
                                                            <select name="marital_status" id="marital_status" class="form-control nOselect2"  readonly>
                                                                <option value=""></option>
                                                                <option value="Married">Married</option>
                                                                <option value="Single">Single</option>
                                                            </select>
                                                            <span class="error-block"></span>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th class="title_head">Finger Print</th>
                                                        <th>
                                                            <select name="finger_print" id="finger_print" class="form-control nOselect2" readonly>
                                                                <option value=""></option>
                                                                <option value="">Yes</option>
                                                                <option value="">No</option>
                                                            </select>
                                                            <span class="error-block"></span>
                                                        </th>
                                                        <th class="title_head">Report Active</th>
                                                        <th>
                                                            <select name="report_active" id="report_active" class="form-control nOselect2" readonly>
                                                                <option value=""></option>
                                                                <option value="">Yes</option>
                                                                <option value="">No</option>
                                                            </select>
                                                            <span class="error-block"></span>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th class="title_head">Left Date</th>
                                                        <th>
                                                            <input type="text" name="left_date" id="left_date" class="form-control date date-pick" data-date-format="yyyy-mm-dd" autocomplete="off" placeholder="Left Date" readonly>
                                                            <span class="error-block"></span>
                                                        </th>

                                                        <th class="title_head">Status</th>
                                                        <th>
                                                            <select name="emp_status" id="emp_status" class="form-control nOselect2" readonly>
                                                                <option value=""></option>
                                                                <option value="">Yes</option>
                                                                <option value="">No</option>
                                                            </select>
                                                            <span class="error-block"></span>
                                                        </th>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <table class="df col-md-12" style="margin-top: 5px;width: 1000px !important;">
                                                    <tbody>
                                                    <tr id="marital_status_info">

                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <?php $groups=array('hr_manager'); if ($this->ion_auth->in_group($groups)) { ?>
                                            <div class="tab-pane p-20" role="tabpanel" id="contact_info_tab">
                                                <table  class="df col-md-12" style="margin-top: 10px;width: 1000px !important;">
                                                    <tbody>
                                                    <tr>
                                                        <th class="title_head">Permanent Address <span style="color: red">*</span></th>
                                                        <th>
                                                            <input type="text" name="permanent_address" id="permanent_address" class="form-control" placeholder="Permanent Address" readonly>
                                                            <span class="error-block"></span>
                                                        </th>
                                                        <th class="title_head">Postal Address</th>
                                                        <th>
                                                            <input type="text" name="postal_address" id="postal_address" class="form-control" placeholder="Postal Address" readonly>
                                                            <span class="error-block"></span>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th class="title_head">Personal Mobile <span style="color: red">*</span></th>
                                                        <th>
                                                            <input type="text" name="mobile_phone" id="mobile_phone" class="form-control" size="10" placeholder="Personal Mobile" readonly>
                                                            <span class="error-block"></span>
                                                        </th>
                                                        <th class="title_head">Mobile 2</th>
                                                        <th>
                                                            <input type="text" name="mobile_phone_2" id="mobile_phone_2" class="form-control" size="10" placeholder="Personal Mobile" readonly>
                                                            <span class="error-block"></span>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th class="title_head">Home Phone</th>
                                                        <th>
                                                            <input type="text" name="home_phone" id="home_phone" class="form-control" size="10" placeholder="Home Phone" readonly>
                                                            <span class="error-block"></span>
                                                        </th>
                                                        <th class="title_head">Personal Email</th>
                                                        <th>
                                                            <input type="email" name="personal_email" id="personal_email" class="form-control" placeholder="Personal Email" readonly>
                                                            <span class="error-block"></span>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th class="title_head">Office Phone</th>
                                                        <th>
                                                            <input type="text" size="10" name="office_phone" id="office_phone" class="form-control" placeholder="Office Phone" readonly>
                                                            <span class="error-block"></span>
                                                        </th>
                                                                                       <!--        Techpack~~only~~~code~~ELV002~~~~~-->
                                                                                                                <th class="title_head">Office Phone Max Limit</th>
                                                                                                                <th>
                                                                                                                    <input type="text" size="10" name="max_limit" id="max_limit" class="form-control" placeholder="Office Phone Max Limit" readonly>
                                                                                                                    <span class="error-block"></span>
                                                                                                                </th>
                                                                                   <!--         Techpack~~only~~~code~~-->
                                                        <th class="title_head">Office Email</th>
                                                        <th>
                                                            <input type="email" size="10" name="office_email" id="office_email" class="form-control" placeholder="Office Email" readonly>
                                                            <span class="error-block"></span>
                                                        </th>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <?php } ?>
                                            <div class="tab-pane p-20" role="tabpanel" id="job_info_tab">
                                                <table  class="df col-md-12" style="margin-top: 10px;width: 1000px !important;">
                                                    <tbody>
                                                    <tr>
                                                        <th class="title_head">Employee Category  <span style="color: red">*</span></th>
                                                        <th>
                                                            <select name="emp_category" id="emp_category" class="form-control nOselect2"  readonly>
                                                                <option value=" "></option>
                                                                <?php
                                                                foreach($category as $categories){
                                                                    echo '<option value="'.$categories->id.'">'.$categories->desc.'</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                            <span class="error-block"></span>
                                                        </th>
                                                        <th class="title_head">Department  <span style="color: red">*</span></th>
                                                        <th>
                                                            <select name="department" id="department" class="form-control nOselect2" readonly>
                                                                <option value=" "></option>
                                                                <?php
                                                                foreach($department as $departments){
                                                                    echo '<option value="'.$departments->id.'">'.$departments->desc.'</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                            <span class="error-block"></span>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th class="title_head">Designation<span style="color: red">*</span></th>
                                                        <th>
                                                            <select name="job_title" id="job_title" class="form-control nOselect2" readonly>
                                                                <option value=" "></option>
                                                                <?php
                                                                foreach($job_title as $job_titles){
                                                                    echo '<option value="'.$job_titles->id.'">'.$job_titles->desc.'</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                            <span class="error-block"></span>
                                                        </th>
                                                        <th class="title_head">Branch</th>
                                                        <th>
                                                            <select name="branch" id="branch" class="form-control nOselect2" readonly>
                                                                <option value=" "></option>
                                                                <?php
                                                                foreach($branch as $branches){
                                                                    echo '<option value="'.$branches->id.'">'.$branches->code.'</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                            <span class="error-block"></span>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th class="title_head">Date Of Joined  <span style="color: red">*</span></th>
                                                        <th>
                                                            <input type="text" name="joined_date" id="joined_date" class="form-control date date-pick" data-date-format="yyyy-mm-dd" autocomplete="off" placeholder="Date Of Joined" readonly>
                                                            <span class="error-block"></span>
                                                        </th>
                                                        <th class="title_head">Date Of Confirmation</th>
                                                        <th>
                                                            <input type="text" name="confirmed_date" id="confirmed_date" class="form-control date date-pick" data-date-format="yyyy-mm-dd" autocomplete="off" placeholder="Date Of Confirmation" readonly>
                                                            <span class="error-block"></span>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th class="title_head">Employment Status  <span style="color: red">*</span></th>
                                                        <th>
                                                            <select name="emp_status" id="emp_status" class="form-control nOselect2" readonly>
                                                                <option value=" "></option>
                                                                <?php
                                                                foreach($employment_status as $emp_status){
                                                                    echo '<option value="'.$emp_status->id.'">'.$emp_status->name.'</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                            <span class="error-block"></span>
                                                        </th>
                                                        <th class="title_head">Supervisor</th>
                                                        <th>
                                                            <select name="supervisor" id="supervisor" class="form-control nOselect2" readonly>
                                                                <option value=""></option>
                                                                <?php
                                                                foreach($employees as $empp){
                                                                    echo "<option value='".$empp->id."'>".$empp->employee_id." - ".$empp->first_name." ".$empp->last_name."</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                            <span class="error-block"></span>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th class="title_head">Leave Act<span style="color: red">*</span></th>
                                                        <th>
                                                            <select name="leave_category" id="leave_category" class="form-control nOselect2" >
                                                                <option value=" "></option>
                                                                <option value="1">Shop and Office</option>
                                                                <option value="2">Wages Control Boards</option>
                                                            </select>
                                                            <span class="error-block"></span>
                                                        </th>
                                                        <th class="title_head">Day Off</th>
                                                        <th>
                                                            <input type="text" name="day_off" id="day_off" class="form-control" autocomplete="off" placeholder="Day Off">
                                                        </th>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <?php $groups=array('admin','payroll'); if ($this->ion_auth->in_group($groups)) { ?>
                                                <div class="tab-pane p-20" role="tabpanel" id="salary_info_tab">
                                                    <table  class="df col-md-12" style="margin-top: 10px;width: 1000px !important;">
                                                        <tbody>
                                                        <tr>
                                                            <th>Basic Salary</th>
                                                            <th><input name="basic_salary" id="basic_salary" class="form-control" placeholder="Basic Salary" type="text"></th>
                                                            <th>Salary Advance</th>
                                                            <th>
                                                                <select class="form-control" name="salary_advance_state" id="salary_advance_state">
                                                                    <option></option>
                                                                    <option>Yes</option>
                                                                    <option>No</option>
                                                                </select>
                                                            </th>
                                                            <th>Salary Advance Req. Amount</th>
                                                            <th><input name="advance_amount" id="advance_amount" class="form-control" placeholder="Advance Amount" type="text" readonly></th>
                                                        </tr>
                                                        <tr>

                                                            <th>Festival Bonus</th>
                                                            <th>
                                                                <select class="form-control" name="festival_bonus" id="festival_bonus">
                                                                    <option></option>
                                                                    <option>Service</option>
                                                                    <option>Full Salary Calculation</option>
                                                                </select>
                                                            </th>
                                                            <th>Other Deduction</th>
                                                            <th><input name="other_deduction" id="other_deduction" class="form-control" placeholder="Other Deduction" type="text" readonly></th>
                                                        </tr>
                                                        <tr>
                                                            <th>EPF</th>
                                                            <th>
                                                                <select class="form-control" name="epf_eligibility" id="epf_eligibility">
                                                                    <option></option>
                                                                    <option>Yes</option>
                                                                    <option>No</option>
                                                                </select>
                                                            </th>
                                                            <th>ETF</th>
                                                            <th>
                                                                <select class="form-control" name="etf_eligibility" id="etf_eligibility">
                                                                    <option></option>
                                                                    <option>Yes</option>
                                                                    <option>No</option>
                                                                </select>
                                                            </th>
                                                            <th>B/Card</th>
                                                            <th>
                                                                <select class="form-control" name="b_card_eligibility" id="etf_eligibility">
                                                                    <option></option>
                                                                    <option>Yes</option>
                                                                    <option>No</option>
                                                                </select>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th>Payee</th>
                                                            <th>
                                                                <select class="form-control" name="payee_state" id="payee">
                                                                    <option></option>
                                                                    <option>Yes</option>
                                                                    <option>No</option>
                                                                </select>
                                                            </th>
                                                            <th>Payee Releife</th>
                                                            <th><input name="payee_releif" id="payee_releif" class="form-control" placeholder="Payee Releife" type="text"></th>
                                                            <th>Coin Balance</th>

                                                            <th><input name="coin_balance" id="coin_balance" class="form-control" placeholder="Coin Balance" type="text"></th>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th>Group For Aniversary Bonus</th>
                                                            <th>
                                                                <select class="form-control" name="anniversary_bonus" id="anniversary_bonus">
                                                                    <option></option>
                                                                    <option>003</option>
                                                                    <option>004</option>
                                                                    <option>005</option>
                                                                    <option>006</option>
                                                                </select>
                                                            </th>
                                                            <th>Salary Hold</th>
                                                            <th>
                                                                <select class="form-control" name="salary_hold" id="salary_hold">
                                                                    <option></option>
                                                                    <option>Yes</option>
                                                                    <option>No</option>
                                                                </select>
                                                            </th>

                                                        </tr>
                                                    </tbody>
                                                    </table>

                                                    <table  class="df col-md-12" style="margin-top: 10px;width: 1000px !important;">
                                                        <tbody>
                                                        <tr>
                                                            <th>Payroll Category</th>
                                                            <th>
                                                                <select class="form-control" name="salary_hold" id="salary_hold">
                                                                    <option></option>
                                                                    <option value="Staff">Staff</option>
                                                                    <option value="Manager">Manager</option>
                                                                    <option value="Foreign">Foreign</option>
                                                                    <option value="Director">Director</option>
                                                                </select>
                                                            </th>
                                                            <th>Add.Service Year</th>

                                                            <th><input name="service_year" id="service_year" class="form-control" placeholder="" type="text"></th>
                                                            <th>Pay Slip Display No.(N)</th>
                                                            <th>
                                                                <select class="form-control" name="pay_slip_state" id="pay_slip_state">
                                                                    <option></option>
                                                                    <option>Y</option>
                                                                    <option>N</option>
                                                                </select>
                                                            </th>
                                                            <th>Increment Apply.(N)</th>
                                                            <th>
                                                                <select class="form-control" name="increment_state" id="increment_state">
                                                                    <option></option>
                                                                    <option>Y</option>
                                                                    <option>N</option>
                                                                </select>
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th>Annivesary Bonus Apply.(N)</th>
                                                            <th>
                                                                <select class="form-control" name="anni_bonus_state" id="anni_bonus_state">
                                                                    <option></option>
                                                                    <option>Y</option>
                                                                    <option>N</option>
                                                                </select>
                                                            </th>
                                                            <th>Annivesary Gift Apply No.(N)</th>
                                                            <th>
                                                                <select class="form-control" name="anni_gift_state" id="anni_gift_state">
                                                                    <option></option>
                                                                    <option>Y</option>
                                                                    <option>N</option>
                                                                </select>
                                                            </th>
                                                            <th>Festival Bonus Apply No.(N)</th>
                                                            <th>
                                                                <select class="form-control" name="festival_bonus_state" id="festival_bonus_state">
                                                                    <option></option>
                                                                    <option>Y</option>
                                                                    <option>N</option>
                                                                </select>
                                                            </th>
                                                            <th>Gratuity Report Apply No.(N)</th>
                                                            <th>
                                                                <select class="form-control" name="gratuity_rep_state" id="gratuity_rep_state">
                                                                    <option></option>
                                                                    <option>Y</option>
                                                                    <option>N</option>
                                                                </select>
                                                            </th>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                    <a  id="addButton" name="add_row" class="btn btn-success d-none d-lg-block m-l-15 pull-right" style="color: #fff"><i class="fa fa-plus-circle"></i> Add Allowance</a>
                                                    <table id="dyTable" class="table items table-striped table-bordered table-condensed table-hover">
                                                        <thead>
                                                        <tr>
                                                            <th style="width: 20px;"></th>
                                                            <th class="">Allowance</th>
                                                            <th class="">Rate</th>
                                                            <th>Status ( Active / Inactive )</th>
                                                            <th style="width: 20px;"></th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            <?php } ?>

                                            <div class="tab-pane p-20" role="tabpanel" id="accounts_info_tab">
                                                <table class="df col-md-12" style="margin-top: 10px;width: 1000px !important;">
                                                    <tbody>
                                                    <tr>
                                                        <th class="title_head">Account No</th>
                                                        <th>
                                                            <input name="account_no_1" id="account_no_1" class="form-control" placeholder="Account No">
                                                        </th>
                                                        <th class="title_head">Bank</th>
                                                        <th>
                                                            <input name="filter_account_bank" id="filter_account_bank" class="form-control" placeholder="Search Bank...">
                                                            <input type="hidden" name="account_bn_1" id="account_bn_1" class="form-control" placeholder="Bank">
                                                        </th>
                                                        <th class="title_head">Branch</th>
                                                        <th>
                                                            <input name="filter_bank_branch" id="filter_bank_branch" class="form-control" placeholder="Search Branch...">
                                                            <input type="hidden" name="account_br_1" id="account_br_1" class="form-control" placeholder="Branch">
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th class="title_head">Income Tax File No</th>
                                                        <th>
                                                            <input name="incometax" id="incometax" class="form-control" placeholder="Income Tax File No">
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th class="title_head">Up to Date Gross Earnings (Tax)</th>
                                                        <th>
                                                            <input name="gross_up" id="gross_up" class="form-control" placeholder="Gross Earning">
                                                        </th>

                                                        <th class="title_head">Up To Date Tax Amount</th>
                                                        <th>
                                                            <input name="date_tax" id="date_tax" class="form-control" placeholder="Tax Amount">
                                                        </th>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane p-20" role="tabpanel" id="other_info_tab">
                                                <table  class="df col-md-12">
                                                    <tbody>
                                                    <tr id="system_user_div">
                                                        <th class="title_head">Is System User ?</th>
                                                        <th style="width:10px">
                                                            <input type="checkbox" name="system_user" value="systemuser" id="system_user" class="form-control">
                                                        </th>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <table class="df col-md-12" style="margin-top: 5px;width: 1000px !important;">
                                                    <tbody>
                                                    <tr>
                                                        <th class="password_div"  style="display: none">Password</th>
                                                        <th class="password_div"  style="display: none">
                                                            <input type="password" name="password" id="password" class="form-control">
                                                            <span class="error-block"></span>
                                                        </th>
                                                        <th class="password_div"  style="display: none">Confirm Password</th>
                                                        <th class="password_div"  style="display: none">
                                                            <input type="password" name="confirm_password" id="confirm_password" class="form-control">
                                                            <span class="error-block"></span>
                                                        </th>
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
            <div id="pswd_info">
                <p style="margin-left: 20px;">Password must meet the following requirements:</p>
                <ul>
                    <li id="letter" class="invalid">At least <strong>one letter</strong></li>
                    <li id="capital" class="invalid">At least <strong>one capital letter</strong></li>
                    <li id="number" class="invalid">At least <strong>one number</strong></li>
                    <li id="length" class="invalid">Be at least <strong>8 characters</strong></li>
                </ul>
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
                "url": "<?php echo base_url()?>systems/employee_list/get_all_employees",
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
            },{
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
            },{
                filter_type: "text",
                filter_delay: 100,
                column_number: 8
            },{
                column_number: 9,
                filter_container_id: "external_filter_container",
                filter_default_label: "By Category"
            },{
                filter_type: "select",
                column_number: 10,
                filter_container_id: "external_filter_container_2",
                filter_default_label: "By Department"
            },{
                filter_type: "select",
                column_number: 11,
                filter_container_id: "external_filter_container_3",
                filter_default_label: "By Job Title"
            }],
            {
                cumulative_filtering: false
            });


        $('#emp_view_modal').on('hidden.bs.modal', function() {
            $('#profile_picture').attr("src","<?php echo base_url('uploads/employee_photos/noprofile-pic.jpg')?>");
            file_table.destroy();
            certi_table.destroy();
            edu_table.destroy();
            sport_table.destroy();
            exp_table.destroy();
            skills_table.destroy();
            review_datatable.destroy();

        });

        var chlength = 0;
        var letter = 0;
        var capital = 0;
        var number = 0;
        var istrue = false;

        $('#password').keyup(function() {
            var pswd = $(this).val();

            //validate the length
            if ( pswd.length < 8 ) {
                $('#length').removeClass('valid').addClass('invalid');
                chlength = 0;
            } else {
                chlength = 1;
                $('#length').removeClass('invalid').addClass('valid');
            }

            //validate letter
            if ( pswd.match(/[A-z]/) ) {
                letter = 1;
                $('#letter').removeClass('invalid').addClass('valid');
            } else {
                letter = 0;
                $('#letter').removeClass('valid').addClass('invalid');
            }

            //validate capital letter
            if ( pswd.match(/[A-Z]/) ) {
                capital=1;
                $('#capital').removeClass('invalid').addClass('valid');
            } else {
                capital=0;
                $('#capital').removeClass('valid').addClass('invalid');
            }

            //validate number
            if ( pswd.match(/\d/) ) {
                number=1;
                $('#number').removeClass('invalid').addClass('valid');
            } else {
                number=0;
                $('#number').removeClass('valid').addClass('invalid');
            }

        });

        $("#btnSaveEmp").off('click');
        $("#btnSaveEmp").on('click', function(e){

            e.preventDefault();
            if( $('#password').val()!='' && $('#password_confirm').val()!=''){

                if (chlength == 1 && number == 1 && capital == 1 && letter == 1) {
                    save(save_method);
                }
            }else {
                save(save_method);
            }
        });

        $("#user_form :input").change(function(){
            $(this).siblings("span.error-block").html("").hide();
            $("span.help-inline").hide();
        });

        $('#user_modal').on('hidden.bs.modal', function() {
            $("#user_form :input").siblings("span.error-block").html("").hide();
            $("span.help-inline").hide();
        });

//            $('input[type=password]').focus(function() {
//                // focus code here
//            });
//            $('input[type=password]').blur(function() {
//                // blur code here
//            });
//
//            $('input[type=password]').keyup(function() {
//                // keyup code here
//            }).focus(function() {
//                // focus code here
//            }).blur(function() {
//                // blur code here
//            });

        $('input[type=password]').keyup(function() {
            // keyup code here
        }).focus(function() {
            $('#pswd_info').show();
        }).blur(function() {
            $('#pswd_info').hide();
        });



        /* 1. Visualizing things on Hover - See next part for action on click */
        $('#stars li').on('mouseover', function(){
            var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on

            // Now highlight all the stars that's not after the current hovered star
            $(this).parent().children('li.star').each(function(e){
                if (e < onStar) {
                    $(this).addClass('hover');
                }
                else {
                    $(this).removeClass('hover');
                }
            });

        }).on('mouseout', function(){
            $(this).parent().children('li.star').each(function(e){
                $(this).removeClass('hover');
            });
        });


        /* 2. Action to perform on click */
        $('#stars li').on('click', function(){
            var onStar = parseInt($(this).data('value'), 10); // The star currently selected

            var stars = $(this).parent().children('li.star');

            for (i = 0; i < stars.length; i++) {

                $(stars[i]).removeClass('selected');
            }

            for (i = 0; i < onStar; i++) {

                $(stars[i]).addClass('selected');
            }

            // JUST RESPONSE (Not needed)
            var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);

            // alert(ratingValue)
            var msg = "";
            if (ratingValue > 1) {
                msg = "Thanks! You rated this " + ratingValue + " stars.";
            }
            else {
                msg = "We will improve ourselves. You rated this " + ratingValue + " stars.";
            }
            responseMessage(msg);

        });

        //call function for get master banks
        get_banks();

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
        $('#system_user_div').show();
        $(".password_div").hide();
        $("#validation_div").hide();
        $('#more_work').html('');
        $('#more_promotion').html('');
        $('#more_period').html('');
        $('#more_probation').html('');
        $(".row_dyn").remove();
        save_method = 'add';
        $('#emp_form')[0].reset();
        $('#emp_form_modal').modal({backdrop: 'static', keyboard: false});
        $('#emp_form_modal .modal-title').text('Add Employee');
        $("#system_user").click(function(){
            if ($('#system_user').is(":checked"))
            {
                $(".password_div").show();
                password_check=$('#system_user').val();
            }
            else{
                $(".password_div").hide();
            }
        });

    }

    function edit_emp(id)
    {
        $('#marital_status_info').html('');
        $('#emp_form')[0].reset();
        $(".row_dyn").remove();
        save_method = 'update';
        $('.error-block').empty();
        $.ajax({
            url : "<?php echo site_url('systems/employee_list/edit_employee/')?>/" + id,
            type: "GET",
            "data": {
                "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
            },
            dataType: "JSON",
            success: function(data)
            {
                //$('.select2').select2('destroy');
                $('[name="emp_id"]').val(data.emp_info.id);
                $('[name="emp_no"]').val(data.emp_info.employee_id);
                $('[name="epf_no"]').val(data.emp_info.epf_no);
                //TODO ~~~~~Kreston~~only~~~code~~KRELV001~~~~~
                // $('[name="etf_no"]').val(data.emp_info.etf_no);
                //TODO ~~~~~Kreston~~only~~~~~~~~~~~~~~~~~~~
                $('[name="title"]').val(data.emp_info.title);
                $('[name="initials"]').val(data.emp_info.initials);
                $('[name="first_name"]').val(data.emp_info.first_name);
                $('[name="full_name"]').val(data.emp_info.full_name);
                $('[name="middle_name"]').val(data.emp_info.middle_name);
                $('[name="last_name"]').val(data.emp_info.last_name);
                $('[name="birthday"]').val(data.emp_info.birthday);
                $('[name="gender"]').val(data.emp_info.gender);
                $('[name="leave_category"]').val(data.emp_info.leave_category);
                $('[name="marital_status"]').val(data.emp_info.marital_status);
                $('[name="nic_num"]').val(data.emp_info.nic_num);
                $('[name="driving_license"]').val(data.emp_info.driving_license);
                $('[name="other_id"]').val(data.emp_info.other_id);
                $('[name="blood_group"]').val(data.emp_info.blood_group);
                $('[name="religion"]').val(data.emp_info.religion);
                $('[name="nationality"]').val(data.emp_info.nationality);
                $('[name="permanent_address"]').val(data.emp_info.permanent_address);
                $('[name="postal_address"]').val(data.emp_info.postal_address);
                $('[name="mobile_phone"]').val(data.emp_info.mobile_phone);
                $('[name="office_phone"]').val(data.emp_info.office_phone);
                //TODO ~~~~~Techpack~~only~~~code~~ELV001~~~~~
               $('[name="max_limit"]').val(data.emp_info.max_limit);
                //TODO ~~~~~Techpack~~only~~~~~~~~~~~~~~~~~~~
                $('[name="home_phone"]').val(data.emp_info.home_phone);
                $('[name="mobile_phone_2"]').val(data.emp_info.mobile_phone_2);
                $('[name="personal_email"]').val(data.emp_info.personal_email);
                $('[name="office_email"]').val(data.emp_info.office_email);
                $('[name="department"]').val(data.emp_info.department);
                $('[name="job_title"]').val(data.emp_info.job_title);
                $('[name="branch"]').val(data.emp_info.branch);
                $('[name="emp_category"]').val(data.emp_info.emp_category);
                $('[name="emp_status"]').val(data.emp_info.emp_status);
                $('[name="supervisor"]').val(data.emp_info.supervisor);
                $('[name="joined_date"]').val(data.emp_info.joined_date);
                $('[name="confirmed_date"]').val(data.emp_info.confirmed_date);
                $('[name="basic_salary"]').val(data.emp_info.basic_salary);

                var i;
                var html_data = "";
                if(data.allowance_data !== null && data.allowance_main_data !== null){
                    for (i= 0; i< data.allowance_data.length; ++i) {
                        html_data += '<tr id="row_' + counter +'" class="row_dyn">' +
                            '<td></td>' + '' +
                            '<td style="width:300px"><select name="allowance[' + counter + ']" id="allowance' + counter + '" class="main_items select2"><option value="">...</option>';

                        //html_data += '<option value='+ data.main_data[i].a_id +' selected>'+ data.main_data[i].allowance +'</option>';
                        var j;
                        for (j= 0; j< data.allowance_main_data.length; ++j) {
                            if(data.allowance_main_data[j].id==data.allowance_data[i].allowance_id){
                                html_data += '<option value='+ data.allowance_main_data[j].id +' selected>'+ data.allowance_main_data[j].allowance +'</option>';
                            } else {
                                html_data += '<option value='+ data.allowance_main_data[j].id +'>'+ data.allowance_main_data[j].allowance +'</option>';
                            }
                        }
                        html_data += '</select></td><td><input class="amount form-control" type="text" name="amount[' + counter + ']" id="amount[' + counter + ']" value="'+ data.allowance_data[i].amount +'" style="width:120px" /></td>';
                        if(data.allowance_data[i].status==1){
                            html_data += '<td><input id="a_status' + counter + '" name="a_status[' + counter + ']" value="1" type="checkbox" checked></td>';
                        } else {
                            html_data += '<td><input id="a_status' + counter + '" name="a_status[' + counter + ']" value="1" type="checkbox"></td>';
                        }
                        html_data += '<input id="allow_hide' + counter + '" name="allow_hide[' + counter + ']" value="'+ data.allowance_data[i].id +'" type="hidden">';
                        html_data += '<td></td></tr>';
                        counter++;
                    }
                    $("#dyTable tbody").html(html_data);
                }

                if(data.bank){
                    $('[name="account_no_1"]').val(data.bank.account_no);

                    $('[name="account_bn_1"]').val(data.bank.bank_name);
                    $('[name="account_br_1"]').val(data.bank.branch_id);

                    $('[name="filter_account_bank"]').val(data.bank.bank_code+" - "+data.bank.name);
                    $('[name="filter_bank_branch"]').val(data.bank.branch_code+" - "+data.bank.branch_name);
                }
                if(data.emp_info.marital_status == 'Married'){

                    if(data.marital.spouse_name!="undefined") {

                        $('#marital_status_info').html('' +
                            '<th style="text-align: center">Full Name<br>Spouse & Children</th>' +
                            '<th>' +
                            '<input type="text" name="spouse_name" id="spouse_name" class="form-control" placeholder="Spouse Name" value="' + data.marital.spouse_name + '"  readonly>' +
                            '<input type="text" name="child_name1" id="child_name1" class="form-control" placeholder="Child Name" value="' + data.marital.child_name1 + '" readonly>' +
                            '<input type="text" name="child_name2" id="child_name2" class="form-control" placeholder="Child Name" value="' + data.marital.child_name2 + '" readonly>' +
                            '</th>' +
                            '<th>Birthdays</th>' +
                            '<th>' +
                            '<input type="text" name="spouse_birthday" id="spouse_birthday" class="form-control date date-pickz" data-date-format="yyyy-mm-dd" autocomplete="off" placeholder="Spouse Birthday" value="' + data.marital.spouse_birthday + '" readonly>' +
                            '<input type="text" name="child_birthday1" id="child_birthday1" class="form-control date date-pickz" data-date-format="yyyy-mm-dd" autocomplete="off" placeholder="Child Birthday" value="' + data.marital.child_birthday1 + '" readonly>' +
                            '<input type="text" name="child_birthday2" id="child_birthday2" class="form-control date date-pickz" data-date-format="yyyy-mm-dd" autocomplete="off" placeholder="Child Birthday" value="' + data.marital.child_birthday2 + '" readonly>' +
                            '</th>' +
                            '<th>NICs</th>' +
                            '<th>' +
                            '<input type="text" name="spouse_nic" id="spouse_nic" class="form-control" placeholder="Spouse NIC" value="' + data.marital.spouse_nic + '" readonly>' +
                            '<input type="text" name="child_nic1" id="child_nic1" class="form-control" placeholder="Child NIC" value="' + data.marital.child_nic1 + '" readonly>' +
                            '<input type="text" name="child_nic2" id="child_nic2" class="form-control" placeholder="Child NIC" value="' + data.marital.child_nic2 + '" readonly>' +
                            '</th>' +
                            '');
                    }

                    $('.date-pickz').datepicker();
                }
                else if(data.emp_info.marital_status=='Single'){

                    if(data.marital.parent_name1 !="undefined"){

                        $('#marital_status_info').html('' +
                            '<th style="text-align: center">Full Name Of Parents</th>' +
                            '<th>' +
                            '<input type="text" name="parent_name1" id="parent_name1" class="form-control" placeholder="Parent Name" value="'+ data.marital.parent_name1 +'">'+
                            '<input type="text" name="parent_name2" id="parent_name2" class="form-control" placeholder="Parent Name" value="'+ data.marital.parent_name2 +'">'+
                            '</th>' +
                            '<th style="text-align: center">Parents Birthdays</th>' +
                            '<th>' +
                            '<input type="text" name="parent_birthday1" id="parent_birthday1" class="form-control date date-picky" data-date-format="yyyy-mm-dd" autocomplete="off" value="'+ data.marital.parent_birthday1 +'">' +
                            '<input type="text" name="parent_birthday2" id="parent_birthday2" class="form-control date date-picky" data-date-format="yyyy-mm-dd" autocomplete="off" value="'+ data.marital.parent_birthday2 +'">' +
                            '</th>' +
                            '<th style="text-align: center">Parents NICs</th>' +
                            '<th>' +
                            '<input type="text" name="parent_nic1" id="parent_nic1" class="form-control" placeholder="Parent NIC" value="'+ data.marital.parent_nic1 +'">' +
                            '<input type="text" name="parent_nic2" id="parent_nic2" class="form-control" placeholder="Parent NIC" value="'+ data.marital.parent_nic2 +'">' +
                            '</th>' +
                            '');
                    }
                    $('.date-picky').datepicker();
                }

                $('#system_user_div').hide();
                $('#emp_form_modal').modal({backdrop: 'static', keyboard: false});
                $('#emp_form_modal .modal-title').text('Edit Employee: #' + data.emp_info.employee_id);
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
        //$('#btnSaveEmp').text('saving...');
        //$('#btnSaveEmp').attr('disabled', true);
        var url = "<?php echo site_url('systems/employee_list/save_employee_payroll'); ?>/" + save_method;
        $.ajax({
            url: url,
            type: "POST",
            data: $('#emp_form').serialize(),
            dataType: "JSON",
            success: function (data) {
                if (data.status) {
                    $('#emp_form_modal').modal('hide');
                    $('#emp_form')[0].reset();
                    $('#more_period').empty();
                    counter = 1;
                    reload_table(employee_table);
                    open_photo_upload_modal(true);

                    $('#emp_id').val(data.emp_id);
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
                            /*$('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error');
                            $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); */
                            $('[name="'+data.inputerror[i]+'"]').siblings("span.error-block").html(data.error_string[i]).show();
                        }
                        $("#" + $('[name="'+data.inputerror[0]+'"]').prop('id')).focus();
                        var err_tab_id = $('[name="'+data.inputerror[0]+'"]').parents("[role='tabpanel']").prop('id');
                        $("a[href='#"+ err_tab_id +"']").click();
                    }
                }
                /*$('#btnSaveEmp').text('save');
                $('#btnSaveEmp').attr('disabled', false);*/
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


    function view_submitted_form(id)
    {
        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo site_url('systems/performance_review/get_quiz_form_data_by_id/')?>/" + id,
            type: "GET",
            "data": {
                "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
            },
            dataType: "JSON",
            success: function(data)
            {

                $('#lbl-employee_view').html(data.employee);
                $('#lbl-coordinator_view').html(data.coordinator);

                /*$('#template_name').val(data.main_data.name);
                 $('#description').val(data.main_data.description);*/


                $('#load_view_quiz_form_data').html('');
                for(var i=0;i<data.QuizTemplateData.length;i++) {
                    // if (data.QuizTemplateData[i].code) {
                    $('#load_view_quiz_form_data').append('' +
                        '<div class="form-group">' +
                        '<label class="control-label col-md-12" for="question' + (i + 1) + '">' + data.QuizTemplateData[i].question + '</label>' +
                        '<div class="col-md-12">' +
                        '' + data.QuizTemplateData[i].answer + '' +
                        '<span class="help-block"></span>' +
                        '</div>' +
                        '</div>' +
                        '');
                    //}
                }

                //$('.select2').select2({dropdownParent: $("#template_modal")});
            },
            error: function ()
            {
                console.log('Error get Quiz data');
            }
        });

        $('#review_quiz_view_modal').modal({backdrop: 'static', keyboard: false});
        $('#review_quiz_view_modal .modal-title').text('View Review ' + id);
    }

    //TODO ~~~~~~~~~~~~~~~~~~~~~start~~modified~~b~~kasun~~~~~~

    function get_bank_branches(id){

        $('#filter_bank_branch').val('');
        $('#account_br_1').val(0);

        $.ajax({

            url: "<?php echo base_url('systems/employee_list/get_bank_branches'); ?>/"+id,
            type: "POST",
            dataType: "JSON",
            data: {
                "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
            },
            success: function (data) {

                //AutoComplete Function
                $("#filter_bank_branch").autocomplete({
                    source: data.branch,
                    select: function (event, k) {

                        // Set selection
                        $('#filter_bank_branch').val(k.item.label); // display the selected text
                        $('#account_br_1').val(k.item.value); // save selected id to input
                        return false;

                    }
                });
                //End AutoComplete Function
            },
            error: function (jqXHR, textStatus, errorThrown) {
                bootbox.alert(textStatus + " : " + errorThrown);
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
            }
        });

    }

    function get_banks(){

        $.ajax({

            url: "<?php echo base_url('systems/employee_list/get_banks'); ?>",
            type: "POST",
            dataType: "JSON",
            data: {
                "<?php echo $this->security->get_csrf_token_name(); ?>": "<?php echo $this->security->get_csrf_hash(); ?>"
            },
            success: function (data) {

                //AutoComplete Function
                $("#filter_account_bank").autocomplete({
                    source: data.bank,
                    select: function (event, k) {

                        // Set selection
                        $('#filter_account_bank').val(k.item.label); // display the selected text
                        $('#account_bn_1').val(k.item.value); // save selected id to input
                        get_bank_branches(k.item.value);
                        return false;
                    }
                });
                //End AutoComplete Function
            },
            error: function (jqXHR, textStatus, errorThrown) {
                bootbox.alert(textStatus + " : " + errorThrown);
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
            }

        });
    }


    $('#filter_account_bank').mouseleave(function(){

        if(!$(this).val()){
            $('#account_bn_1').val(0);
        }
    });

    $('#filter_bank_branch').mouseleave(function(){

        if(!$(this).val()){
            $('#account_br_1').val(0);
        }
    });

    //TODO ~~~~~~~~~~~~~~~~~~~~~end~~modified~~b~~kasun~~~~~~

</script>

