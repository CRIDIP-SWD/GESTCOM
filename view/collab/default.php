<?php
ini_set("display_errors", 1);
if(!isset($_SESSION['user']['connect']) && $_SESSION['user']['connect'] == 0)
{
    $text = "Vous avez été déconnecter du service.";
    header("Location: index.php?view=login&error=login&text=$text");
}
?>
<!DOCTYPE html>
<!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.6
Version: 4.5.4
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
    <title><?= \App\constante::NOM_SITE; ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- BEGIN LAYOUT FIRST STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Oswald:400,300,700" rel="stylesheet" type="text/css" />
    <!-- END LAYOUT FIRST STYLES -->
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="<?= $constante->getUrl(array('global/')); ?>plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= $constante->getUrl(array('global/')); ?>plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= $constante->getUrl(array('global/')); ?>plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= $constante->getUrl(array('global/')); ?>plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
    <link href="<?= $constante->getUrl(array('global/')); ?>plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="<?= $constante->getUrl(array('global/')); ?>css/components-md.min.css" rel="stylesheet" id="style_components" type="text/css" />
    <link href="<?= $constante->getUrl(array('global/')); ?>css/plugins-md.min.css" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="<?= $constante->getUrl(array('layouts/')); ?>layout6/css/layout.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= $constante->getUrl(array('layouts/')); ?>layout6/css/custom.min.css" rel="stylesheet" type="text/css" />
    <!-- END THEME LAYOUT STYLES -->
<!-- END HEAD -->

<body class="page-md">
<!-- BEGIN HEADER -->
<header class="page-header">
    <nav class="navbar" role="navigation">
        <div class="container-fluid">
            <div class="havbar-header">
                <!-- BEGIN LOGO -->
                <a id="index" class="navbar-brand" href="<?= $constante->getUrl(array(), false, false); ?>">
                    <img src="<?= $constante->getUrl(array('layouts/')); ?>layout6/img/logo.png" alt="Logo"> </a>
                <!-- END LOGO -->
                <!-- BEGIN TOPBAR ACTIONS -->
                <div class="topbar-actions">
                    <!-- DOC: Apply "search-form-expanded" right after the "search-form" class to have half expanded search box -->
                    <form class="search-form" action="extra_search.html" method="GET">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search here" name="query">
                                    <span class="input-group-btn">
                                        <a href="javascript:;" class="btn md-skip submit">
                                            <i class="fa fa-search"></i>
                                        </a>
                                    </span>
                        </div>
                    </form>
                    <!-- END HEADER SEARCH BOX -->
                    <!-- BEGIN GROUP NOTIFICATION -->
                    <div class="btn-group-notification btn-group" id="header_notification_bar">
                        <button type="button" class="btn md-skip dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <span class="badge">9</span>
                        </button>
                        <ul class="dropdown-menu-v2">
                            <li class="external">
                                <h3>
                                    <span class="bold">12 pending</span> notifications</h3>
                                <a href="#">view all</a>
                            </li>
                            <li>
                                <ul class="dropdown-menu-list scroller" style="height: 250px; padding: 0;" data-handle-color="#637283">
                                    <li>
                                        <a href="javascript:;">
                                                    <span class="details">
                                                        <span class="label label-sm label-icon label-success">
                                                            <i class="fa fa-plus"></i>
                                                        </span> New user registered. </span>
                                            <span class="time">just now</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                                    <span class="details">
                                                        <span class="label label-sm label-icon label-danger">
                                                            <i class="fa fa-bolt"></i>
                                                        </span> Server #12 overloaded. </span>
                                            <span class="time">3 mins</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                                    <span class="details">
                                                        <span class="label label-sm label-icon label-warning">
                                                            <i class="fa fa-bell-o"></i>
                                                        </span> Server #2 not responding. </span>
                                            <span class="time">10 mins</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                                    <span class="details">
                                                        <span class="label label-sm label-icon label-info">
                                                            <i class="fa fa-bullhorn"></i>
                                                        </span> Application error. </span>
                                            <span class="time">14 hrs</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                                    <span class="details">
                                                        <span class="label label-sm label-icon label-danger">
                                                            <i class="fa fa-bolt"></i>
                                                        </span> Database overloaded 68%. </span>
                                            <span class="time">2 days</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                                    <span class="details">
                                                        <span class="label label-sm label-icon label-danger">
                                                            <i class="fa fa-bolt"></i>
                                                        </span> A user IP blocked. </span>
                                            <span class="time">3 days</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                                    <span class="details">
                                                        <span class="label label-sm label-icon label-warning">
                                                            <i class="fa fa-bell-o"></i>
                                                        </span> Storage Server #4 not responding dfdfdfd. </span>
                                            <span class="time">4 days</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                                    <span class="details">
                                                        <span class="label label-sm label-icon label-info">
                                                            <i class="fa fa-bullhorn"></i>
                                                        </span> System Error. </span>
                                            <span class="time">5 days</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                                    <span class="details">
                                                        <span class="label label-sm label-icon label-danger">
                                                            <i class="fa fa-bolt"></i>
                                                        </span> Storage server failed. </span>
                                            <span class="time">9 days</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- END GROUP NOTIFICATION -->
                    <!-- BEGIN USER PROFILE -->
                    <div class="btn-group-img btn-group">
                        <button type="button" class="btn btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <img src="../assets/layouts/layout5/img/avatar1.jpg" alt=""> </button>
                        <ul class="dropdown-menu-v2" role="menu">
                            <li>
                                <a href="page_user_profile_1.html">
                                    <i class="icon-user"></i> My Profile
                                    <span class="badge badge-danger">1</span>
                                </a>
                            </li>
                            <li>
                                <a href="app_calendar.html">
                                    <i class="icon-calendar"></i> My Calendar </a>
                            </li>
                            <li>
                                <a href="app_inbox.html">
                                    <i class="icon-envelope-open"></i> My Inbox
                                    <span class="badge badge-danger"> 3 </span>
                                </a>
                            </li>
                            <li>
                                <a href="app_todo_2.html">
                                    <i class="icon-rocket"></i> My Tasks
                                    <span class="badge badge-success"> 7 </span>
                                </a>
                            </li>
                            <li class="divider"> </li>
                            <li>
                                <a href="page_user_lock_1.html">
                                    <i class="icon-lock"></i> Lock Screen </a>
                            </li>
                            <li>
                                <a href="page_user_login_1.html">
                                    <i class="icon-key"></i> Log Out </a>
                            </li>
                        </ul>
                    </div>
                    <!-- END USER PROFILE -->
                </div>
                <!-- END TOPBAR ACTIONS -->
            </div>
        </div>
        <!--/container-->
    </nav>
</header>
<!-- END HEADER -->
<!-- BEGIN CONTAINER -->
<div class="container-fluid">
    <div class="page-content page-content-popup">
        <div class="page-content-fixed-header">
            <!-- BEGIN BREADCRUMBS -->
            <ul class="page-breadcrumb">
                <li>
                    <a href="#">Blank Page</a>
                </li>
                <li>
                    <a href="#">Page Layouts</a>
                </li>
                <li>Blank Page Layout</li>
            </ul>
            <!-- END BREADCRUMBS -->
            <div class="content-header-menu">
                <!-- BEGIN DROPDOWN AJAX MENU -->
                <div class="dropdown-ajax-menu btn-group">
                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <i class="fa fa-circle"></i>
                        <i class="fa fa-circle"></i>
                        <i class="fa fa-circle"></i>
                    </button>
                    <ul class="dropdown-menu-v2">
                        <li>
                            <a href="start.html">Application</a>
                        </li>
                        <li>
                            <a href="start.html">Reports</a>
                        </li>
                        <li>
                            <a href="start.html">Templates</a>
                        </li>
                        <li>
                            <a href="start.html">Settings</a>
                        </li>
                    </ul>
                </div>
                <!-- END DROPDOWN AJAX MENU -->
                <!-- BEGIN MENU TOGGLER -->
                <button type="button" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="toggle-icon">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </span>
                </button>
                <!-- END MENU TOGGLER -->
            </div>
        </div>
        <div class="page-sidebar-wrapper">
            <!-- BEGIN SIDEBAR -->
            <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
            <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
            <div class="page-sidebar navbar-collapse collapse">
                <!-- BEGIN SIDEBAR MENU -->
                <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                    <li class="nav-item start ">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="icon-home"></i>
                            <span class="title">Dashboard</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item start ">
                                <a href="index.html" class="nav-link ">
                                    <i class="icon-bar-chart"></i>
                                    <span class="title">Dashboard 1</span>
                                </a>
                            </li>
                            <li class="nav-item start ">
                                <a href="dashboard_2.html" class="nav-link ">
                                    <i class="icon-bulb"></i>
                                    <span class="title">Dashboard 2</span>
                                    <span class="badge badge-success">1</span>
                                </a>
                            </li>
                            <li class="nav-item start ">
                                <a href="dashboard_3.html" class="nav-link ">
                                    <i class="icon-graph"></i>
                                    <span class="title">Dashboard 3</span>
                                    <span class="badge badge-danger">5</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="heading">
                        <h3 class="uppercase">Features</h3>
                    </li>
                    <li class="nav-item  ">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="icon-diamond"></i>
                            <span class="title">UI Features</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item  ">
                                <a href="ui_colors.html" class="nav-link ">
                                    <span class="title">Color Library</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="ui_general.html" class="nav-link ">
                                    <span class="title">General Components</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="ui_buttons.html" class="nav-link ">
                                    <span class="title">Buttons</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="ui_confirmations.html" class="nav-link ">
                                    <span class="title">Popover Confirmations</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="ui_icons.html" class="nav-link ">
                                    <span class="title">Font Icons</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="ui_socicons.html" class="nav-link ">
                                    <span class="title">Social Icons</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="ui_typography.html" class="nav-link ">
                                    <span class="title">Typography</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="ui_tabs_accordions_navs.html" class="nav-link ">
                                    <span class="title">Tabs, Accordions & Navs</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="ui_timeline.html" class="nav-link ">
                                    <span class="title">Timeline</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="ui_tree.html" class="nav-link ">
                                    <span class="title">Tree View</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <span class="title">Page Progress Bar</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item ">
                                        <a href="ui_page_progress_style_1.html" class="nav-link "> Flash </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="ui_page_progress_style_2.html" class="nav-link "> Big Counter </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item  ">
                                <a href="ui_blockui.html" class="nav-link ">
                                    <span class="title">Block UI</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="ui_bootstrap_growl.html" class="nav-link ">
                                    <span class="title">Bootstrap Growl Notifications</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="ui_notific8.html" class="nav-link ">
                                    <span class="title">Notific8 Notifications</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="ui_toastr.html" class="nav-link ">
                                    <span class="title">Toastr Notifications</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="ui_bootbox.html" class="nav-link ">
                                    <span class="title">Bootbox Dialogs</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="ui_alerts_api.html" class="nav-link ">
                                    <span class="title">Metronic Alerts API</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="ui_session_timeout.html" class="nav-link ">
                                    <span class="title">Session Timeout</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="ui_idle_timeout.html" class="nav-link ">
                                    <span class="title">User Idle Timeout</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="ui_modals.html" class="nav-link ">
                                    <span class="title">Modals</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="ui_extended_modals.html" class="nav-link ">
                                    <span class="title">Extended Modals</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="ui_tiles.html" class="nav-link ">
                                    <span class="title">Tiles</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="ui_datepaginator.html" class="nav-link ">
                                    <span class="title">Date Paginator</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="ui_nestable.html" class="nav-link ">
                                    <span class="title">Nestable List</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item  ">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="icon-puzzle"></i>
                            <span class="title">Components</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item  ">
                                <a href="components_date_time_pickers.html" class="nav-link ">
                                    <span class="title">Date & Time Pickers</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="components_color_pickers.html" class="nav-link ">
                                    <span class="title">Color Pickers</span>
                                    <span class="badge badge-danger">2</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="components_select2.html" class="nav-link ">
                                    <span class="title">Select2 Dropdowns</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="components_bootstrap_select.html" class="nav-link ">
                                    <span class="title">Bootstrap Select</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="components_multi_select.html" class="nav-link ">
                                    <span class="title">Multi Select</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="components_bootstrap_select_splitter.html" class="nav-link ">
                                    <span class="title">Select Splitter</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="components_typeahead.html" class="nav-link ">
                                    <span class="title">Typeahead Autocomplete</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="components_bootstrap_tagsinput.html" class="nav-link ">
                                    <span class="title">Bootstrap Tagsinput</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="components_bootstrap_switch.html" class="nav-link ">
                                    <span class="title">Bootstrap Switch</span>
                                    <span class="badge badge-success">6</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="components_bootstrap_maxlength.html" class="nav-link ">
                                    <span class="title">Bootstrap Maxlength</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="components_bootstrap_fileinput.html" class="nav-link ">
                                    <span class="title">Bootstrap File Input</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="components_bootstrap_touchspin.html" class="nav-link ">
                                    <span class="title">Bootstrap Touchspin</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="components_form_tools.html" class="nav-link ">
                                    <span class="title">Form Widgets & Tools</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="components_context_menu.html" class="nav-link ">
                                    <span class="title">Context Menu</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="components_editors.html" class="nav-link ">
                                    <span class="title">Markdown & WYSIWYG Editors</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="components_code_editors.html" class="nav-link ">
                                    <span class="title">Code Editors</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="components_ion_sliders.html" class="nav-link ">
                                    <span class="title">Ion Range Sliders</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="components_noui_sliders.html" class="nav-link ">
                                    <span class="title">NoUI Range Sliders</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="components_knob_dials.html" class="nav-link ">
                                    <span class="title">Knob Circle Dials</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item  ">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="icon-settings"></i>
                            <span class="title">Form Stuff</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item  ">
                                <a href="form_controls.html" class="nav-link ">
                                            <span class="title">Bootstrap Form
                                                <br>Controls</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="form_controls_md.html" class="nav-link ">
                                            <span class="title">Material Design
                                                <br>Form Controls</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="form_validation.html" class="nav-link ">
                                    <span class="title">Form Validation</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="form_validation_states_md.html" class="nav-link ">
                                            <span class="title">Material Design
                                                <br>Form Validation States</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="form_validation_md.html" class="nav-link ">
                                            <span class="title">Material Design
                                                <br>Form Validation</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="form_layouts.html" class="nav-link ">
                                    <span class="title">Form Layouts</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="form_input_mask.html" class="nav-link ">
                                    <span class="title">Form Input Mask</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="form_editable.html" class="nav-link ">
                                    <span class="title">Form X-editable</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="form_wizard.html" class="nav-link ">
                                    <span class="title">Form Wizard</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="form_icheck.html" class="nav-link ">
                                    <span class="title">iCheck Controls</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="form_image_crop.html" class="nav-link ">
                                    <span class="title">Image Cropping</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="form_fileupload.html" class="nav-link ">
                                    <span class="title">Multiple File Upload</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="form_dropzone.html" class="nav-link ">
                                    <span class="title">Dropzone File Upload</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item  ">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="icon-bulb"></i>
                            <span class="title">Elements</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item  ">
                                <a href="elements_steps.html" class="nav-link ">
                                    <span class="title">Steps</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="elements_lists.html" class="nav-link ">
                                    <span class="title">Lists</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="elements_ribbons.html" class="nav-link ">
                                    <span class="title">Ribbons</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="elements_overlay.html" class="nav-link ">
                                    <span class="title">Overlays</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="elements_cards.html" class="nav-link ">
                                    <span class="title">User Cards</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item  ">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="icon-briefcase"></i>
                            <span class="title">Tables</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item  ">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <span class="title">Static Tables</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item ">
                                        <a href="table_static_basic.html" class="nav-link "> Basic Tables </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="table_static_responsive.html" class="nav-link "> Responsive Tables </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="table_bootstrap_master.html" class="nav-link "> Bootstrap Table </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item  ">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <span class="title">Datatables</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item ">
                                        <a href="table_datatables_managed.html" class="nav-link "> Managed Datatables </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="table_datatables_buttons.html" class="nav-link "> Buttons Extension </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="table_datatables_colreorder.html" class="nav-link "> Colreorder Extension </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="table_datatables_rowreorder.html" class="nav-link "> Rowreorder Extension </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="table_datatables_scroller.html" class="nav-link "> Scroller Extension </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="table_datatables_fixedheader.html" class="nav-link "> FixedHeader Extension </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="table_datatables_responsive.html" class="nav-link "> Responsive Extension </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="table_datatables_editable.html" class="nav-link "> Editable Datatables </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="table_datatables_ajax.html" class="nav-link "> Ajax Datatables </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item  ">
                        <a href="?p=" class="nav-link nav-toggle">
                            <i class="icon-wallet"></i>
                            <span class="title">Portlets</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item  ">
                                <a href="portlet_boxed.html" class="nav-link ">
                                    <span class="title">Boxed Portlets</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="portlet_light.html" class="nav-link ">
                                    <span class="title">Light Portlets</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="portlet_solid.html" class="nav-link ">
                                    <span class="title">Solid Portlets</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="portlet_ajax.html" class="nav-link ">
                                    <span class="title">Ajax Portlets</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="portlet_draggable.html" class="nav-link ">
                                    <span class="title">Draggable Portlets</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item  ">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="icon-bar-chart"></i>
                            <span class="title">Charts</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item  ">
                                <a href="charts_amcharts.html" class="nav-link ">
                                    <span class="title">amChart</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="charts_flotcharts.html" class="nav-link ">
                                    <span class="title">Flot Charts</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="charts_flowchart.html" class="nav-link ">
                                    <span class="title">Flow Charts</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="charts_google.html" class="nav-link ">
                                    <span class="title">Google Charts</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="charts_echarts.html" class="nav-link ">
                                    <span class="title">eCharts</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="charts_morris.html" class="nav-link ">
                                    <span class="title">Morris Charts</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <span class="title">HighCharts</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item ">
                                        <a href="charts_highcharts.html" class="nav-link "> HighCharts </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="charts_highstock.html" class="nav-link "> HighStock </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="charts_highmaps.html" class="nav-link "> HighMaps </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item  ">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="icon-pointer"></i>
                            <span class="title">Maps</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item  ">
                                <a href="maps_google.html" class="nav-link ">
                                    <span class="title">Google Maps</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="maps_vector.html" class="nav-link ">
                                    <span class="title">Vector Maps</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="heading">
                        <h3 class="uppercase">Layouts</h3>
                    </li>
                    <li class="nav-item  active open">
                        <a href="layout_blank_page.html" class="nav-link ">
                            <i class="icon-layers"></i>
                            <span class="title">Blank Page</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    <li class="heading">
                        <h3 class="uppercase">Pages</h3>
                    </li>
                    <li class="nav-item  ">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="icon-basket"></i>
                            <span class="title">eCommerce</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item  ">
                                <a href="ecommerce_index.html" class="nav-link ">
                                    <i class="icon-home"></i>
                                    <span class="title">Dashboard</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="ecommerce_orders.html" class="nav-link ">
                                    <i class="icon-basket"></i>
                                    <span class="title">Orders</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="ecommerce_orders_view.html" class="nav-link ">
                                    <i class="icon-tag"></i>
                                    <span class="title">Order View</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="ecommerce_products.html" class="nav-link ">
                                    <i class="icon-graph"></i>
                                    <span class="title">Products</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="ecommerce_products_edit.html" class="nav-link ">
                                    <i class="icon-graph"></i>
                                    <span class="title">Product Edit</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item  ">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="icon-docs"></i>
                            <span class="title">Apps</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item  ">
                                <a href="app_todo.html" class="nav-link ">
                                    <i class="icon-clock"></i>
                                    <span class="title">Todo 1</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="app_todo_2.html" class="nav-link ">
                                    <i class="icon-check"></i>
                                    <span class="title">Todo 2</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="app_inbox.html" class="nav-link ">
                                    <i class="icon-envelope"></i>
                                    <span class="title">Inbox</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="app_calendar.html" class="nav-link ">
                                    <i class="icon-calendar"></i>
                                    <span class="title">Calendar</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="app_ticket.html" class="nav-link ">
                                    <i class="icon-notebook"></i>
                                    <span class="title">Support</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item  ">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="icon-user"></i>
                            <span class="title">User</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item  ">
                                <a href="page_user_profile_1.html" class="nav-link ">
                                    <i class="icon-user"></i>
                                    <span class="title">Profile 1</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="page_user_profile_1_account.html" class="nav-link ">
                                    <i class="icon-user-female"></i>
                                    <span class="title">Profile 1 Account</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="page_user_profile_1_help.html" class="nav-link ">
                                    <i class="icon-user-following"></i>
                                    <span class="title">Profile 1 Help</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="page_user_profile_2.html" class="nav-link ">
                                    <i class="icon-users"></i>
                                    <span class="title">Profile 2</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-notebook"></i>
                                    <span class="title">Login</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item ">
                                        <a href="page_user_login_1.html" class="nav-link " target="_blank"> Login Page 1 </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="page_user_login_2.html" class="nav-link " target="_blank"> Login Page 2 </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="page_user_login_3.html" class="nav-link " target="_blank"> Login Page 3 </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="page_user_login_4.html" class="nav-link " target="_blank"> Login Page 4 </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="page_user_login_5.html" class="nav-link " target="_blank"> Login Page 5 </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="page_user_login_6.html" class="nav-link " target="_blank"> Login Page 6 </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item  ">
                                <a href="page_user_lock_1.html" class="nav-link " target="_blank">
                                    <i class="icon-lock"></i>
                                    <span class="title">Lock Screen 1</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="page_user_lock_2.html" class="nav-link " target="_blank">
                                    <i class="icon-lock-open"></i>
                                    <span class="title">Lock Screen 2</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item  ">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="icon-social-dribbble"></i>
                            <span class="title">General</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item  ">
                                <a href="page_general_about.html" class="nav-link ">
                                    <i class="icon-info"></i>
                                    <span class="title">About</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="page_general_contact.html" class="nav-link ">
                                    <i class="icon-call-end"></i>
                                    <span class="title">Contact</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-notebook"></i>
                                    <span class="title">Portfolio</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item ">
                                        <a href="page_general_portfolio_1.html" class="nav-link "> Portfolio 1 </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="page_general_portfolio_2.html" class="nav-link "> Portfolio 2 </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="page_general_portfolio_3.html" class="nav-link "> Portfolio 3 </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="page_general_portfolio_4.html" class="nav-link "> Portfolio 4 </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item  ">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-magnifier"></i>
                                    <span class="title">Search</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item ">
                                        <a href="page_general_search.html" class="nav-link "> Search 1 </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="page_general_search_2.html" class="nav-link "> Search 2 </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="page_general_search_3.html" class="nav-link "> Search 3 </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="page_general_search_4.html" class="nav-link "> Search 4 </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a href="page_general_search_5.html" class="nav-link "> Search 5 </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item  ">
                                <a href="page_general_pricing.html" class="nav-link ">
                                    <i class="icon-tag"></i>
                                    <span class="title">Pricing</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="page_general_faq.html" class="nav-link ">
                                    <i class="icon-wrench"></i>
                                    <span class="title">FAQ</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="page_general_blog.html" class="nav-link ">
                                    <i class="icon-pencil"></i>
                                    <span class="title">Blog</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="page_general_blog_post.html" class="nav-link ">
                                    <i class="icon-note"></i>
                                    <span class="title">Blog Post</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="page_general_invoice.html" class="nav-link ">
                                    <i class="icon-envelope"></i>
                                    <span class="title">Invoice</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="page_general_invoice_2.html" class="nav-link ">
                                    <i class="icon-envelope"></i>
                                    <span class="title">Invoice 2</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item  ">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="icon-settings"></i>
                            <span class="title">System</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item  ">
                                <a href="page_system_coming_soon.html" class="nav-link " target="_blank">
                                    <span class="title">Coming Soon</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="page_system_404_1.html" class="nav-link ">
                                    <span class="title">404 Page 1</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="page_system_404_2.html" class="nav-link " target="_blank">
                                    <span class="title">404 Page 2</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="page_system_404_3.html" class="nav-link " target="_blank">
                                    <span class="title">404 Page 3</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="page_system_500_1.html" class="nav-link ">
                                    <span class="title">500 Page 1</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="page_system_500_2.html" class="nav-link " target="_blank">
                                    <span class="title">500 Page 2</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="icon-folder"></i>
                            <span class="title">Multi Level Menu</span>
                            <span class="arrow "></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-settings"></i> Item 1
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item">
                                        <a href="?p=dashboard-2" target="_blank" class="nav-link">
                                            <i class="icon-user"></i> Arrow Toggle
                                            <span class="arrow nav-toggle"></span>
                                        </a>
                                        <ul class="sub-menu">
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                    <i class="icon-power"></i> Sample Link 1</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                    <i class="icon-paper-plane"></i> Sample Link 1</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                    <i class="icon-star"></i> Sample Link 1</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="icon-camera"></i> Sample Link 1</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="icon-link"></i> Sample Link 2</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="icon-pointer"></i> Sample Link 3</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="?p=dashboard-2" target="_blank" class="nav-link">
                                    <i class="icon-globe"></i> Arrow Toggle
                                    <span class="arrow nav-toggle"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="icon-tag"></i> Sample Link 1</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="icon-pencil"></i> Sample Link 1</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="icon-graph"></i> Sample Link 1</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="icon-bar-chart"></i> Item 3 </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- END SIDEBAR MENU -->
            </div>
            <!-- END SIDEBAR -->
        </div>
        <div class="page-fixed-main-content">
            <!-- BEGIN PAGE BASE CONTENT -->
            <div class="note note-info">
                <p> A black page template with a minimal dependency assets to use as a base for any custom page you create </p>
            </div>
            <!-- END PAGE BASE CONTENT -->
        </div>
        <!-- BEGIN FOOTER -->
        <p class="copyright-v2">2015 © Metronic by keenthemes.
            <a href="http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes" title="Purchase Metronic just for 27$ and get lifetime updates for free" target="_blank">Purchase Metronic!</a>
        </p>
        <!-- BEGIN QUICK SIDEBAR TOGGLER -->
        <button type="button" class="quick-sidebar-toggler" data-toggle="collapse">
            <span class="sr-only">Toggle Quick Sidebar</span>
            <i class="icon-logout"></i>
            <div class="quick-sidebar-notification">
                <span class="badge badge-danger">7</span>
            </div>
        </button>
        <!-- END QUICK SIDEBAR TOGGLER -->
        <a href="#index" class="go2top">
            <i class="icon-arrow-up"></i>
        </a>
        <!-- END FOOTER -->
    </div>
</div>
<!-- END CONTAINER -->
<!-- BEGIN QUICK SIDEBAR -->
<a href="javascript:;" class="page-quick-sidebar-toggler">
    <i class="icon-login"></i>
</a>
<div class="page-quick-sidebar-wrapper" data-close-on-body-click="false">
    <div class="page-quick-sidebar">
        <ul class="nav nav-tabs">
            <li class="active">
                <a href="javascript:;" data-target="#quick_sidebar_tab_1" data-toggle="tab"> Users
                    <span class="badge badge-danger">2</span>
                </a>
            </li>
            <li>
                <a href="javascript:;" data-target="#quick_sidebar_tab_2" data-toggle="tab"> Alerts
                    <span class="badge badge-success">7</span>
                </a>
            </li>
            <li class="dropdown">
                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> More
                    <i class="fa fa-angle-down"></i>
                </a>
                <ul class="dropdown-menu pull-right">
                    <li>
                        <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                            <i class="icon-bell"></i> Alerts </a>
                    </li>
                    <li>
                        <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                            <i class="icon-info"></i> Notifications </a>
                    </li>
                    <li>
                        <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                            <i class="icon-speech"></i> Activities </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                            <i class="icon-settings"></i> Settings </a>
                    </li>
                </ul>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active page-quick-sidebar-chat" id="quick_sidebar_tab_1">
                <div class="page-quick-sidebar-chat-users" data-rail-color="#ddd" data-wrapper-class="page-quick-sidebar-list">
                    <h3 class="list-heading">Staff</h3>
                    <ul class="media-list list-items">
                        <li class="media">
                            <div class="media-status">
                                <span class="badge badge-success">8</span>
                            </div>
                            <img class="media-object" src="../assets/layouts/layout/img/avatar3.jpg" alt="...">
                            <div class="media-body">
                                <h4 class="media-heading">Bob Nilson</h4>
                                <div class="media-heading-sub"> Project Manager </div>
                            </div>
                        </li>
                        <li class="media">
                            <img class="media-object" src="../assets/layouts/layout/img/avatar1.jpg" alt="...">
                            <div class="media-body">
                                <h4 class="media-heading">Nick Larson</h4>
                                <div class="media-heading-sub"> Art Director </div>
                            </div>
                        </li>
                        <li class="media">
                            <div class="media-status">
                                <span class="badge badge-danger">3</span>
                            </div>
                            <img class="media-object" src="../assets/layouts/layout/img/avatar4.jpg" alt="...">
                            <div class="media-body">
                                <h4 class="media-heading">Deon Hubert</h4>
                                <div class="media-heading-sub"> CTO </div>
                            </div>
                        </li>
                        <li class="media">
                            <img class="media-object" src="../assets/layouts/layout/img/avatar2.jpg" alt="...">
                            <div class="media-body">
                                <h4 class="media-heading">Ella Wong</h4>
                                <div class="media-heading-sub"> CEO </div>
                            </div>
                        </li>
                    </ul>
                    <h3 class="list-heading">Customers</h3>
                    <ul class="media-list list-items">
                        <li class="media">
                            <div class="media-status">
                                <span class="badge badge-warning">2</span>
                            </div>
                            <img class="media-object" src="../assets/layouts/layout/img/avatar6.jpg" alt="...">
                            <div class="media-body">
                                <h4 class="media-heading">Lara Kunis</h4>
                                <div class="media-heading-sub"> CEO, Loop Inc </div>
                                <div class="media-heading-small"> Last seen 03:10 AM </div>
                            </div>
                        </li>
                        <li class="media">
                            <div class="media-status">
                                <span class="label label-sm label-success">new</span>
                            </div>
                            <img class="media-object" src="../assets/layouts/layout/img/avatar7.jpg" alt="...">
                            <div class="media-body">
                                <h4 class="media-heading">Ernie Kyllonen</h4>
                                <div class="media-heading-sub"> Project Manager,
                                    <br> SmartBizz PTL </div>
                            </div>
                        </li>
                        <li class="media">
                            <img class="media-object" src="../assets/layouts/layout/img/avatar8.jpg" alt="...">
                            <div class="media-body">
                                <h4 class="media-heading">Lisa Stone</h4>
                                <div class="media-heading-sub"> CTO, Keort Inc </div>
                                <div class="media-heading-small"> Last seen 13:10 PM </div>
                            </div>
                        </li>
                        <li class="media">
                            <div class="media-status">
                                <span class="badge badge-success">7</span>
                            </div>
                            <img class="media-object" src="../assets/layouts/layout/img/avatar9.jpg" alt="...">
                            <div class="media-body">
                                <h4 class="media-heading">Deon Portalatin</h4>
                                <div class="media-heading-sub"> CFO, H&D LTD </div>
                            </div>
                        </li>
                        <li class="media">
                            <img class="media-object" src="../assets/layouts/layout/img/avatar10.jpg" alt="...">
                            <div class="media-body">
                                <h4 class="media-heading">Irina Savikova</h4>
                                <div class="media-heading-sub"> CEO, Tizda Motors Inc </div>
                            </div>
                        </li>
                        <li class="media">
                            <div class="media-status">
                                <span class="badge badge-danger">4</span>
                            </div>
                            <img class="media-object" src="../assets/layouts/layout/img/avatar11.jpg" alt="...">
                            <div class="media-body">
                                <h4 class="media-heading">Maria Gomez</h4>
                                <div class="media-heading-sub"> Manager, Infomatic Inc </div>
                                <div class="media-heading-small"> Last seen 03:10 AM </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="page-quick-sidebar-item">
                    <div class="page-quick-sidebar-chat-user">
                        <div class="page-quick-sidebar-nav">
                            <a href="javascript:;" class="page-quick-sidebar-back-to-list">
                                <i class="icon-arrow-left"></i>Back</a>
                        </div>
                        <div class="page-quick-sidebar-chat-user-messages">
                            <div class="post out">
                                <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar3.jpg" />
                                <div class="message">
                                    <span class="arrow"></span>
                                    <a href="javascript:;" class="name">Bob Nilson</a>
                                    <span class="datetime">20:15</span>
                                    <span class="body"> When could you send me the report ? </span>
                                </div>
                            </div>
                            <div class="post in">
                                <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar2.jpg" />
                                <div class="message">
                                    <span class="arrow"></span>
                                    <a href="javascript:;" class="name">Ella Wong</a>
                                    <span class="datetime">20:15</span>
                                    <span class="body"> Its almost done. I will be sending it shortly </span>
                                </div>
                            </div>
                            <div class="post out">
                                <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar3.jpg" />
                                <div class="message">
                                    <span class="arrow"></span>
                                    <a href="javascript:;" class="name">Bob Nilson</a>
                                    <span class="datetime">20:15</span>
                                    <span class="body"> Alright. Thanks! :) </span>
                                </div>
                            </div>
                            <div class="post in">
                                <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar2.jpg" />
                                <div class="message">
                                    <span class="arrow"></span>
                                    <a href="javascript:;" class="name">Ella Wong</a>
                                    <span class="datetime">20:16</span>
                                    <span class="body"> You are most welcome. Sorry for the delay. </span>
                                </div>
                            </div>
                            <div class="post out">
                                <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar3.jpg" />
                                <div class="message">
                                    <span class="arrow"></span>
                                    <a href="javascript:;" class="name">Bob Nilson</a>
                                    <span class="datetime">20:17</span>
                                    <span class="body"> No probs. Just take your time :) </span>
                                </div>
                            </div>
                            <div class="post in">
                                <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar2.jpg" />
                                <div class="message">
                                    <span class="arrow"></span>
                                    <a href="javascript:;" class="name">Ella Wong</a>
                                    <span class="datetime">20:40</span>
                                    <span class="body"> Alright. I just emailed it to you. </span>
                                </div>
                            </div>
                            <div class="post out">
                                <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar3.jpg" />
                                <div class="message">
                                    <span class="arrow"></span>
                                    <a href="javascript:;" class="name">Bob Nilson</a>
                                    <span class="datetime">20:17</span>
                                    <span class="body"> Great! Thanks. Will check it right away. </span>
                                </div>
                            </div>
                            <div class="post in">
                                <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar2.jpg" />
                                <div class="message">
                                    <span class="arrow"></span>
                                    <a href="javascript:;" class="name">Ella Wong</a>
                                    <span class="datetime">20:40</span>
                                    <span class="body"> Please let me know if you have any comment. </span>
                                </div>
                            </div>
                            <div class="post out">
                                <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar3.jpg" />
                                <div class="message">
                                    <span class="arrow"></span>
                                    <a href="javascript:;" class="name">Bob Nilson</a>
                                    <span class="datetime">20:17</span>
                                    <span class="body"> Sure. I will check and buzz you if anything needs to be corrected. </span>
                                </div>
                            </div>
                        </div>
                        <div class="page-quick-sidebar-chat-user-form">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Type a message here...">
                                <div class="input-group-btn">
                                    <button type="button" class="btn green">
                                        <i class="icon-paper-clip"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane page-quick-sidebar-alerts" id="quick_sidebar_tab_2">
                <div class="page-quick-sidebar-alerts-list">
                    <h3 class="list-heading">General</h3>
                    <ul class="feeds list-items">
                        <li>
                            <div class="col1">
                                <div class="cont">
                                    <div class="cont-col1">
                                        <div class="label label-sm label-info">
                                            <i class="fa fa-check"></i>
                                        </div>
                                    </div>
                                    <div class="cont-col2">
                                        <div class="desc"> You have 4 pending tasks.
                                                    <span class="label label-sm label-warning "> Take action
                                                        <i class="fa fa-share"></i>
                                                    </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col2">
                                <div class="date"> Just now </div>
                            </div>
                        </li>
                        <li>
                            <a href="javascript:;">
                                <div class="col1">
                                    <div class="cont">
                                        <div class="cont-col1">
                                            <div class="label label-sm label-success">
                                                <i class="fa fa-bar-chart-o"></i>
                                            </div>
                                        </div>
                                        <div class="cont-col2">
                                            <div class="desc"> Finance Report for year 2013 has been released. </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col2">
                                    <div class="date"> 20 mins </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <div class="col1">
                                <div class="cont">
                                    <div class="cont-col1">
                                        <div class="label label-sm label-danger">
                                            <i class="fa fa-user"></i>
                                        </div>
                                    </div>
                                    <div class="cont-col2">
                                        <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col2">
                                <div class="date"> 24 mins </div>
                            </div>
                        </li>
                        <li>
                            <div class="col1">
                                <div class="cont">
                                    <div class="cont-col1">
                                        <div class="label label-sm label-info">
                                            <i class="fa fa-shopping-cart"></i>
                                        </div>
                                    </div>
                                    <div class="cont-col2">
                                        <div class="desc"> New order received with
                                            <span class="label label-sm label-success"> Reference Number: DR23923 </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col2">
                                <div class="date"> 30 mins </div>
                            </div>
                        </li>
                        <li>
                            <div class="col1">
                                <div class="cont">
                                    <div class="cont-col1">
                                        <div class="label label-sm label-success">
                                            <i class="fa fa-user"></i>
                                        </div>
                                    </div>
                                    <div class="cont-col2">
                                        <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col2">
                                <div class="date"> 24 mins </div>
                            </div>
                        </li>
                        <li>
                            <div class="col1">
                                <div class="cont">
                                    <div class="cont-col1">
                                        <div class="label label-sm label-info">
                                            <i class="fa fa-bell-o"></i>
                                        </div>
                                    </div>
                                    <div class="cont-col2">
                                        <div class="desc"> Web server hardware needs to be upgraded.
                                            <span class="label label-sm label-warning"> Overdue </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col2">
                                <div class="date"> 2 hours </div>
                            </div>
                        </li>
                        <li>
                            <a href="javascript:;">
                                <div class="col1">
                                    <div class="cont">
                                        <div class="cont-col1">
                                            <div class="label label-sm label-default">
                                                <i class="fa fa-briefcase"></i>
                                            </div>
                                        </div>
                                        <div class="cont-col2">
                                            <div class="desc"> IPO Report for year 2013 has been released. </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col2">
                                    <div class="date"> 20 mins </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <h3 class="list-heading">System</h3>
                    <ul class="feeds list-items">
                        <li>
                            <div class="col1">
                                <div class="cont">
                                    <div class="cont-col1">
                                        <div class="label label-sm label-info">
                                            <i class="fa fa-check"></i>
                                        </div>
                                    </div>
                                    <div class="cont-col2">
                                        <div class="desc"> You have 4 pending tasks.
                                                    <span class="label label-sm label-warning "> Take action
                                                        <i class="fa fa-share"></i>
                                                    </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col2">
                                <div class="date"> Just now </div>
                            </div>
                        </li>
                        <li>
                            <a href="javascript:;">
                                <div class="col1">
                                    <div class="cont">
                                        <div class="cont-col1">
                                            <div class="label label-sm label-danger">
                                                <i class="fa fa-bar-chart-o"></i>
                                            </div>
                                        </div>
                                        <div class="cont-col2">
                                            <div class="desc"> Finance Report for year 2013 has been released. </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col2">
                                    <div class="date"> 20 mins </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <div class="col1">
                                <div class="cont">
                                    <div class="cont-col1">
                                        <div class="label label-sm label-default">
                                            <i class="fa fa-user"></i>
                                        </div>
                                    </div>
                                    <div class="cont-col2">
                                        <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col2">
                                <div class="date"> 24 mins </div>
                            </div>
                        </li>
                        <li>
                            <div class="col1">
                                <div class="cont">
                                    <div class="cont-col1">
                                        <div class="label label-sm label-info">
                                            <i class="fa fa-shopping-cart"></i>
                                        </div>
                                    </div>
                                    <div class="cont-col2">
                                        <div class="desc"> New order received with
                                            <span class="label label-sm label-success"> Reference Number: DR23923 </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col2">
                                <div class="date"> 30 mins </div>
                            </div>
                        </li>
                        <li>
                            <div class="col1">
                                <div class="cont">
                                    <div class="cont-col1">
                                        <div class="label label-sm label-success">
                                            <i class="fa fa-user"></i>
                                        </div>
                                    </div>
                                    <div class="cont-col2">
                                        <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col2">
                                <div class="date"> 24 mins </div>
                            </div>
                        </li>
                        <li>
                            <div class="col1">
                                <div class="cont">
                                    <div class="cont-col1">
                                        <div class="label label-sm label-warning">
                                            <i class="fa fa-bell-o"></i>
                                        </div>
                                    </div>
                                    <div class="cont-col2">
                                        <div class="desc"> Web server hardware needs to be upgraded.
                                            <span class="label label-sm label-default "> Overdue </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col2">
                                <div class="date"> 2 hours </div>
                            </div>
                        </li>
                        <li>
                            <a href="javascript:;">
                                <div class="col1">
                                    <div class="cont">
                                        <div class="cont-col1">
                                            <div class="label label-sm label-info">
                                                <i class="fa fa-briefcase"></i>
                                            </div>
                                        </div>
                                        <div class="cont-col2">
                                            <div class="desc"> IPO Report for year 2013 has been released. </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col2">
                                    <div class="date"> 20 mins </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tab-pane page-quick-sidebar-settings" id="quick_sidebar_tab_3">
                <div class="page-quick-sidebar-settings-list">
                    <h3 class="list-heading">General Settings</h3>
                    <ul class="list-items borderless">
                        <li> Enable Notifications
                            <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="success" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                        <li> Allow Tracking
                            <input type="checkbox" class="make-switch" data-size="small" data-on-color="info" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                        <li> Log Errors
                            <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="danger" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                        <li> Auto Sumbit Issues
                            <input type="checkbox" class="make-switch" data-size="small" data-on-color="warning" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                        <li> Enable SMS Alerts
                            <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="success" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                    </ul>
                    <h3 class="list-heading">System Settings</h3>
                    <ul class="list-items borderless">
                        <li> Security Level
                            <select class="form-control input-inline input-sm input-small">
                                <option value="1">Normal</option>
                                <option value="2" selected>Medium</option>
                                <option value="e">High</option>
                            </select>
                        </li>
                        <li> Failed Email Attempts
                            <input class="form-control input-inline input-sm input-small" value="5" /> </li>
                        <li> Secondary SMTP Port
                            <input class="form-control input-inline input-sm input-small" value="3560" /> </li>
                        <li> Notify On System Error
                            <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="danger" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                        <li> Notify On SMTP Error
                            <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="warning" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                    </ul>
                    <div class="inner-content">
                        <button class="btn btn-success">
                            <i class="icon-settings"></i> Save Changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END QUICK SIDEBAR -->
<!--[if lt IE 9]>
<script src="<?= $constante->getUrl(array('global/')); ?>plugins/respond.min.js"></script>
<script src="<?= $constante->getUrl(array('global/')); ?>plugins/excanvas.min.js"></script>
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
<script src="<?= $constante->getUrl(array('global/')); ?>plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?= $constante->getUrl(array('global/')); ?>plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?= $constante->getUrl(array('global/')); ?>plugins/js.cookie.min.js" type="text/javascript"></script>
<script src="<?= $constante->getUrl(array('global/')); ?>plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="<?= $constante->getUrl(array('global/')); ?>plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?= $constante->getUrl(array('global/')); ?>plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?= $constante->getUrl(array('global/')); ?>plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="<?= $constante->getUrl(array('global/')); ?>plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="<?= $constante->getUrl(array('global/')); ?>scripts/app.min.js" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="<?= $constante->getUrl(array('layouts/')); ?>layout6/scripts/layout.min.js" type="text/javascript"></script>
<script src="<?= $constante->getUrl(array('layouts/')); ?>global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
<!-- END THEME LAYOUT SCRIPTS -->
</body>

</html>