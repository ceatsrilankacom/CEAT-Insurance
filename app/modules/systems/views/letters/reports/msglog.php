<?php 
include_once( dirname(dirname(__FILE__)) . '/classes/check.class.php');
protect("1");

if(empty($_POST))
include_once('../header.php');
?>







    <!-- page header -->
    <div class="pageheader">


        <h2><i class="fa fa-upload"></i> Bill Dispatch Data
            <span>Mail Log</span></h2>


        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li>You are here</li>
                <li><a href="<?php echo $server_link; ?>home.php">Home</a></li>
                <li class="active">Mail Log</li>
            </ol>
        </div>

    </div>
    <!-- /page header -->

    <!-- content main container -->
    <div class="main">

        <div id="container" style="background: #fff">


            <?php
            set_include_path('https://ebill.dialog.lk/eReminder/reports/');
            require_once('../reports/reportico.php');
            $q = new reportico();

            // Jquery already included?
            $q->jquery_preloaded = false;

            // Bootstrap Features
            // Set bootstrap_styles to false for reportico classic styles, or "3" for bootstrap 3 look and feel and 2 for bootstrap 2
            // If you are embedding reportico and you have already loaded bootstrap then set bootstrap_preloaded equals true so reportico
            // doestnt load it again.

            $q->bootstrap_styles = "3";
            $q->bootstrap_preloaded = true;
            $q->force_reportico_mini_maintains = true;

            $q->initial_project = "eReminder";
            $q->initial_project_password = "HTjv8@wcMzM";
            $q->initial_report = "message_log.xml";
            $q->initial_execute_mode = "PREPARE";
            $q->initial_output_format = "HTML";
            $q->access_mode = "PREPARE";
            $q->embedded_report = true;
            $q->session_namespace = "BillTracReportmessagelog";
            $q->reportico_ajax_mode = true;



            $q->show_refresh_button = true;
            $q->initial_show_criteria = "show";
            $q->output_template_parameters["show_hide_prepare_section_boxes"] = "hide";
            $q->output_template_parameters["show_hide_prepare_print_html_button"] = "show";
            $q->output_template_parameters["show_hide_prepare_page_style"] = "hide";

            $q->execute();


            ?>


        </div>

    </div>
 


<?php include_once('../footer.php'); ?>