<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title><?php if (isset($page_title)) { echo $page_title;} ?> | Arrow HRMS - Admin</title>
    <meta http-equiv="X-UA-Compatible" content="IE=10; IE=9; IE=8; IE=7; IE=EDGE" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />

    <!--V1-->
    <!--<link href="<?php /*echo base_url(); */?>assets/css/pages/dashboard1.css" rel="stylesheet">-->
    <link href="<?php echo base_url('assets/css/custom.css'); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/node_modules/clockpicker/dist/jquery-clockpicker.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/node_modules/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/node_modules/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/node_modules/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/node_modules/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/node_modules/bootstrap-duallistbox-4/dist/bootstrap-duallistbox.min.css" rel="stylesheet" type="text/css" />
    <!--V2-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/plugins/dropzone/dist/dropzone.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/plugins/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/plugins/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/plugins/perfect-scrollbar/css/perfect-scrollbar.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/plugins/slick-carousel/slick/slick.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/icon_fonts_assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/icon_fonts_assets/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/icon_fonts_assets/dripicons/webfont.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/icon_fonts_assets/picons-thin/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/main.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- ============================================================== -->
    <!--<script src="<?php /*echo base_url(); */?>assets/node_modules/jquery/jquery-3.2.1.min.js"></script>-->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery/dist/jquery.min.js"></script>
    <?php

    ?>
    <!--<style>
        <?php /*if(COLOR_THEME!=""){ */?>
        .skin-megna .topbar {
            background: <?php /*echo COLOR_THEME; */?> !important;
        }
        .skin-megna .sidebar-nav ul li a.active i, .skin-megna .sidebar-nav ul li a:hover i {
            color: <?php /*echo COLOR_THEME; */?> !important; }
        /*.skin-megna .sidebar-nav > ul > li.active > a {
            color: <?php /*echo COLOR_THEME; */?> !important;
            border-color: <?php /*echo COLOR_THEME; */?> !important !important; }
        .skin-megna .sidebar-nav > ul > li.active > a i {
            color: <?php /*echo COLOR_THEME; */?> !important; }*/

        .skin-megna .sidebar-nav > ul > li.active > a {
            color: #fff !important;
        }
        .topbar .top-navbar .profile-pic span {
            color: #fff;
        }
        .skin-megna .sidebar-nav > ul > li.active > a i {
            color: #fff !important; }

        .skin-megna .page-titles .breadcrumb .breadcrumb-item.active {
            color: <?php /*echo COLOR_THEME; */?> !important; }
        .form-control {
            border: 1px solid <?php /*echo COLOR_THEME; */?>  !important;
        }
        input[type="text"], select, textarea {
            border: 1px solid <?php /*echo COLOR_THEME; */?>  !important;
        }
        <?php /*} */?>

        <?php /*if(BT_COLOR!=""){ */?>
        .skin-megna .dt-buttons .dt-button {
            background: <?php /*echo BT_COLOR; */?> !important;
        }

        <?php /*} */?>

        <?php /*if(MENU_H_COLOR!=""){ */?>
        .horizontal-nav .sidebar-nav #sidebarnav > li > ul{
            background: <?php /*echo MENU_H_COLOR; */?> !important;
        }
        .skin-megna .dataTables_wrapper .dataTables_paginate .paginate_button.current,    .skin-megna .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
            background-color:  <?php /*echo MENU_H_COLOR; */?> !important;
        }
        <?php /*} */?>
    </style>-->
</head>
<body class="menu-position-top full-screen with-content-panel"   onload="startTime()">
<div class="preloader">
    <div class="loader">
        <div class="loader__figure"></div>
        <p class="loader__label">Arrow HRMS</p>
    </div>
</div>
<div class="all-wrapper with-side-panel solid-bg-all">
    <div class="layout-w">
        <div class="top-bar color-scheme-dark">
            <div class="logo-w">
                <a class="logo" href="#">
                    <?php
                    if(COMPANY_LOGO!="") {
                        $logo = "uploads/logo/".COMPANY_LOGO;
                    } else {
                        $logo = "assets/images/logo.png";
                    }
                    ?>
                    <img src="<?php echo base_url().$logo; ?>" class="light-logo" alt="homepage" style="height: 55px" />
                </a>
            </div>
            <div class="top-menu-controls">

<!--                <div id="clockdate">-->
<!--                    <div class="clockdate-wrapper" style="color: #fff">-->
<!--                        <div id="clock-head"></div>-->
<!--                        <div id="date-head"></div>-->
<!--                    </div>-->
<!--                </div>-->

                <div id="clockdate">
                    <div class="clockdate-wrapper" style="color: #fff">
                        <div id="clock-head"></div>
                        <div id="date-head"></div>
                        <?php $groups_emp = array('payroll');
                        if($this->ion_auth->in_group($groups_emp)){

                            if($this->session->userdata('payroll_name')){
                                echo $this->session->userdata('payroll_name');
                            }
                            else{
                                echo 'Main Payroll';
                            }
                        }
                        ?>
                    </div>
                </div>
                <?php if(PROJECTS!=0) { ?>
                    <div class="messages-notifications os-dropdown-trigger os-dropdown-position-left">
                        <i class="os-icon os-icon-mail-14"></i>
                        <div class="new-messages-count">
                            0
                        </div>
                        <a class="os-dropdown light message-list">
                            <ul>
                                <?php
                                $this->load->model('reports/project_reports_mod');
                                $groups_emp = array('employee_user');
                                if ($this->ion_auth->in_group($groups_emp)) { ?>
                                    <li>
                                        <a href="#">
                                            <?php
                                            $ProjData = $this->project_reports_mod->Get_All_Projects_Data_BY_Login_Emp();
                                            $i = 1;
                                            foreach ($ProjData as $edata) {

                                                if ((strtotime(date("Y-m-d")) >= strtotime($edata['expected_date'])) && ($edata['completed_date'] == "0000-00-00")) {
                                                    ?>
                                                    <div class="message-content">
                                                        <h6 class="message-from">
                                                            <?php echo $edata['project_name'] ?>
                                                        </h6>
                                                        <h6 class="message-title">
                                                            <?php echo $edata['expected_date'] ?>
                                                        </h6>
                                                    </div>
                                                    <?php
                                                }
                                                $i++;
                                            }
                                            ?>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </a>
                    </div>
                <?php } ?>
                <!--<div class="top-icon top-settings os-dropdown-trigger os-dropdown-position-left">
                    <i class="os-icon os-icon-ui-46"></i>
                    <div class="os-dropdown">
                        <div class="icon-w">
                            <i class="os-icon os-icon-ui-46"></i>
                        </div>
                        <ul>
                            <li>
                                <a href="#"><i class="os-icon os-icon-ui-49"></i><span></span></a>
                            </li>
                        </ul>
                    </div>
                </div>-->
                <div class="logged-user-w">
                    <div class="logged-user-i">
                        <div class="avatar-w">
                            <img alt="" src="<?php echo base_url(''); ?>assets/img/avatar1.jpg"><span style="color: #fff"> <?php echo USER_NAME; ?></span>
                        </div>
                        <div class="logged-user-menu color-style-bright">
                            <div class="logged-user-avatar-info">
                                <div class="avatar-w">
                                    <img alt="" src="<?php echo base_url(''); ?>assets/img/avatar1.jpg">
                                </div>
                                <div class="logged-user-info-w">
                                    <div class="logged-user-name">
                                        <?php echo USER_NAME; ?>
                                    </div>
                                    <div class="logged-user-role" style="min-width: 100px">

                                    </div>
                                </div>
                            </div>
                            <div class="bg-icon">
                                <i class="os-icon os-icon-wallet-loaded"></i>
                            </div>
                            <?php $groups_emp = array('payroll');
                            if ($this->ion_auth->in_group($groups_emp)) { ?>
                                <ul id="payroll_types"></ul>
                            <?php } ?>
                            <ul>
                                <li>
                                    <a href="<?php echo base_url(''); ?>auth/change_password"><i class="os-icon os-icon-user-male-circle2"></i><span style="font-size: 12px;">Change Password</span></a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(''); ?>auth/logout"><i class="os-icon os-icon-signs-11"></i><span>Logout</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="menu-mobile menu-activated-on-click color-scheme-dark">
            <div class="mm-logo-buttons-w">
                <?php
                if(COMPANY_LOGO!="") {
                    $logo = "uploads/logo/".COMPANY_LOGO;
                } else {
                    $logo = "assets/images/logo.png";
                }
                ?>


                <a class="mm-logo" href="#"><img src="<?php echo base_url().$logo; ?>" alt="homepage" style="height: 55px" /></a>
                <div class="mm-buttons">
                    <div class="mobile-menu-trigger">
                        <div class="os-icon os-icon-hamburger-menu-1"></div>
                    </div>
                </div>
            </div>
            <div class="menu-and-user">
                <div class="logged-user-w">
                    <div class="avatar-w">
                        <img alt="" src="<?php echo base_url(''); ?>assets/img/avatar1.jpg">
                    </div>
                    <div class="logged-user-info-w">
                        <div class="logged-user-name">
                            <?php echo USER_NAME; ?>
                        </div>
                        <div class="logged-user-role">
                             Administrator
                        </div>
                    </div>
                </div>
                <?php include 'main_menu.php'?>
            </div>
        </div>
        <div class="menu-w color-scheme-light color-style-default menu-position-top menu-layout-compact sub-menu-style-over sub-menu-color-bright selected-menu-color-bright menu-activated-on-hover menu-has-selected-link">
            <?php include 'main_menu.php'?>
        </div>
        <div class="content-w">
            <div class="content-i">
                <div class="content-box">