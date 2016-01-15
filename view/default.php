<?php
if(!isset($_SESSION['identifiant']))
{
    header("Location: ".$constante->getUrl(array(), false, false)."login.php?warning=no-connect");
}
ini_set('display_errors', 1);
$info_user = $account_cls->info($_SESSION['identifiant']);
$iduser = $info_user[0]->iduser;
?>
<!doctype html>
<html class="fixed">
<head>

    <!-- Basic -->
    <meta charset="UTF-8">

    <title><?= \App\constante::NOM_SITE; ?></title>
    <meta name="keywords" content="HTML5 Admin Template" />
    <meta name="description" content="Porto Admin - Responsive HTML5 Template">
    <meta name="author" content="okler.net">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- Web Fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="<?= $constante->getUrl(array('vendor', 'bootstrap', 'css/'), true, false); ?>bootstrap.css" />

    <link rel="stylesheet" href="<?= $constante->getUrl(array('vendor', 'font-awesome', 'css/'), true, false); ?>font-awesome.css" />
    <link rel="stylesheet" href="<?= $constante->getUrl(array('vendor', 'magnific-popup/'), true, false); ?>magnific-popup.css" />
    <link rel="stylesheet" href="<?= $constante->getUrl(array('vendor', 'bootstrap-datepicker', 'css/'), true, false); ?>datepicker3.css" />

    <!-- Specific Page Vendor CSS -->
    <link rel="stylesheet" href="<?= $constante->getUrl(array('vendor', 'jquery-ui', 'css', 'ui-lightness/'), true, false); ?>jquery-ui-1.10.4.custom.css" />
    <link rel="stylesheet" href="<?= $constante->getUrl(array('vendor', 'bootstrap-multiselect/'), true, false); ?>bootstrap-multiselect.css" />
    <link rel="stylesheet" href="<?= $constante->getUrl(array('vendor', 'morris/'), true, false); ?>morris.css" />
    <link rel="stylesheet" href="<?= $constante->getUrl(array('vendor', 'pnotify/'), true, false); ?>pnotify.custom.css" />

    <!-- Theme CSS -->
    <link rel="stylesheet" href="<?= $constante->getUrl(array('stylesheets/'), true, false); ?>theme.css" />

    <!-- Skin CSS -->
    <link rel="stylesheet" href="<?= $constante->getUrl(array('stylesheets', 'skins/'), true, false); ?>default.css" />

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="<?= $constante->getUrl(array('stylesheets/'), true, false); ?>theme-custom.css">

    <!-- Head Libs -->
    <script src="<?= $constante->getUrl(array('vendor', 'modernizr/'), true, false); ?>modernizr.js"></script>
</head>
<body>
<section class="body">

    <!-- start: header -->
    <header class="header">
        <div class="logo-container">
            <a href="index.php?view=home" class="logo">
                <img src="<?= $constante->getUrl(array('images/'), true, false); ?>logo.png" height="35" alt="<?= \App\constante::NOM_SITE; ?>" />
            </a>
            <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
                <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
            </div>
        </div>

        <!-- start: search & user box -->
        <div class="header-right">

            <form action="pages-search-results.html" class="search nav-form">
                <div class="input-group input-search">
                    <input type="text" class="form-control" name="q" id="q" placeholder="Search...">
							<span class="input-group-btn">
								<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
							</span>
                </div>
            </form>

            <span class="separator"></span>

            <ul class="notifications">
                <li>
                    <a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
                        <i class="fa fa-calendar"></i>
                        <?php if($account_cls->count_event_day($iduser) > 0){ ?>
                            <span class="badge hvr-pulse"><?= $account_cls->count_event_day($iduser); ?></span>
                        <?php } ?>
                    </a>

                    <div class="dropdown-menu notification-menu large">
                        <div class="notification-title">
                            <?php if($account_cls->count_event_day($iduser) > 0){ ?>
                                <span class="pull-right label label-default"><?= $account_cls->count_event_day($iduser); ?> Rendez-vous Aujourd'hui</span>
                            <?php } ?>
                            Rendez-vous
                        </div>

                        <div class="content">
                            <ul>
                                <?php
                                $event = $DB->query("SELECT * FROM user_calendar WHERE iduser = :iduser AND date_debut >= :date_debut AND date_fin <= :date_fin ORDER BY heure_debut ASC LIMIT 3", array(
                                    "iduser" => $iduser,
                                    "date_debut" => strtotime(date("d-m-Y 00:00:00")),
                                    "date_fin"  => strtotime(date("d-m-Y 23:59:59"))
                                ));
                                foreach($event as $data):
                                ?>
                                <li>
                                    <a href="index.php?view=calendar&sub=event&ref_event=<?= $data->ref_event; ?>" class="clearfix">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <span class="title"><?= $data->titre; ?></span>
                                                <span class="message">
                                                    <?php
                                                    if($data->emplacement === 0){echo "Bureau";}
                                                    if($data->emplacement === 1){echo "Extérieur<br><i>".$data->adresse."</i>";}
                                                    ?>
                                                </span>
                                            </div>
                                            <div class="col-md-3">
                                                <span class="label label-default"><?= date("H:i", $data->heure_debut); ?></span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
                        <i class="fa fa-envelope"></i>
                        <?php if($account_cls->count_message_nonlu($iduser) > 0){ ?>
                            <span class="badge hvr-pulse"><?= $account_cls->count_message_nonlu($iduser); ?></span>
                        <?php } ?>
                    </a>

                    <div class="dropdown-menu notification-menu">
                        <div class="notification-title">
                            <span class="pull-right label label-default"><?= $account_cls->count_message($iduser); ?></span>
                            Messages
                        </div>

                        <div class="content">
                            <ul>
                                <?php
                                $sql = $DB->query("SELECT * FROM user_inbox, user WHERE user_inbox.expediteur = user.iduser AND destinataire = :idusercase", array(
                                    "idusercase" => $iduser
                                ));
                                foreach($sql as $message):
                                ?>
                                <li>
                                    <a href="#" class="clearfix">
                                        <figure class="image">
                                            <img src="<?= $constante->getUrl(array(), false, true); ?>avatar/<?= $info_user[0]->identifiant; ?>.jpg" alt="<?= $info_user[0]->identifiant; ?>" class="img-circle img-responsive" width="32px" />
                                        </figure>
                                        <span class="title"><?= $info_user[0]->nom_user; ?> <?= $info_user[0]->prenom_user; ?></span>
                                        <span class="message"><?= substr(html_entity_decode($message->message), 0, 50); ?>...</span>
                                    </a>
                                </li>
                                <?php endforeach; ?>
                            </ul>

                            <hr />

                            <div class="text-right">
                                <a href="#" class="view-more">Voir tout</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
                        <i class="fa fa-bell"></i>
                        <span class="badge">3</span>
                    </a>

                    <div class="dropdown-menu notification-menu">
                        <div class="notification-title">
                            <span class="pull-right label label-default">3</span>
                            Alerts
                        </div>

                        <div class="content">
                            <ul>
                                <li>
                                    <a href="#" class="clearfix">
                                        <div class="image">
                                            <i class="fa fa-thumbs-down bg-danger"></i>
                                        </div>
                                        <span class="title">Server is Down!</span>
                                        <span class="message">Just now</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="clearfix">
                                        <div class="image">
                                            <i class="fa fa-lock bg-warning"></i>
                                        </div>
                                        <span class="title">User Locked</span>
                                        <span class="message">15 minutes ago</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="clearfix">
                                        <div class="image">
                                            <i class="fa fa-signal bg-success"></i>
                                        </div>
                                        <span class="title">Connection Restaured</span>
                                        <span class="message">10/10/2014</span>
                                    </a>
                                </li>
                            </ul>

                            <hr />

                            <div class="text-right">
                                <a href="#" class="view-more">View All</a>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>

            <span class="separator"></span>

            <div id="userbox" class="userbox">
                <a href="#" data-toggle="dropdown">
                    <figure class="profile-picture">
                        <img src="<?= $constante->getUrl(array(), false, true); ?>avatar/<?= $info_user[0]->identifiant; ?>.jpg" alt="<?= $info_user[0]->nom_user; ?> <?= $info_user[0]->prenom_user; ?>" class="img-circle" data-lock-picture="<?= $constante->getUrl(array(), false, true); ?>avatar/<?= $info_user[0]->identifiant; ?>.jpg" />
                    </figure>
                    <div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@okler.com">
                        <span class="name"><?= $info_user[0]->nom_user; ?> <?= $info_user[0]->prenom_user; ?></span>
                        <span class="role"><?= $info_user[0]->poste; ?></span>
                    </div>

                    <i class="fa custom-caret"></i>
                </a>

                <div class="dropdown-menu">
                    <ul class="list-unstyled">
                        <li class="divider"></li>
                        <li>
                            <a role="menuitem" tabindex="-1" href="index.php?view=profil"><i class="fa fa-user"></i> Mon profil</a>
                        </li>
                        <li>
                            <a role="menuitem" tabindex="-1" href="index.php?view=calendar"><i class="fa fa-calendar"></i> Mon Calendrier</a>
                        </li>
                        <li>
                            <a role="menuitem" tabindex="-1" href="index.php?view=messagerie"><i class="fa fa-envelope-square"></i> Ma Boite Mail</a>
                        </li>
                        <li>
                            <a role="menuitem" tabindex="-1" href="index.php?view=profil"><i class="fa fa-tasks"></i> Mes Taches</a>
                        </li>
                        <li>
                            <a role="menuitem" tabindex="-1" href="core/user.php?action=logoff&identifiant=<?= $info_user[0]->identifiant; ?>"><i class="fa fa-power-off"></i> Déconnexion</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- end: search & user box -->
    </header>
    <!-- end: header -->

    <div class="inner-wrapper">
        <!-- start: sidebar -->
        <aside id="sidebar-left" class="sidebar-left">

            <div class="sidebar-header">
                <div class="sidebar-title">
                    Navigation
                </div>
                <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
                    <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                </div>
            </div>

            <div class="nano">
                <div class="nano-content">
                    <nav id="menu" class="nav-main" role="navigation">
                        <ul class="nav nav-main">
                            <li class="nav-active">
                                <a href="index.html">
                                    <i class="fa fa-home" aria-hidden="true"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>
                            <li>
                                <a href="mailbox-folder.html">
                                    <span class="pull-right label label-primary">182</span>
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                    <span>Mailbox</span>
                                </a>
                            </li>
                            <li class="nav-parent">
                                <a>
                                    <i class="fa fa-copy" aria-hidden="true"></i>
                                    <span>Pages</span>
                                </a>
                                <ul class="nav nav-children">
                                    <li>
                                        <a href="pages-signup.html">
                                            Sign Up
                                        </a>
                                    </li>
                                    <li>
                                        <a href="pages-signin.html">
                                            Sign In
                                        </a>
                                    </li>
                                    <li>
                                        <a href="pages-recover-password.html">
                                            Recover Password
                                        </a>
                                    </li>
                                    <li>
                                        <a href="pages-lock-screen.html">
                                            Locked Screen
                                        </a>
                                    </li>
                                    <li>
                                        <a href="pages-user-profile.html">
                                            User Profile
                                        </a>
                                    </li>
                                    <li>
                                        <a href="pages-session-timeout.html">
                                            Session Timeout
                                        </a>
                                    </li>
                                    <li>
                                        <a href="pages-calendar.html">
                                            Calendar
                                        </a>
                                    </li>
                                    <li>
                                        <a href="pages-timeline.html">
                                            Timeline
                                        </a>
                                    </li>
                                    <li>
                                        <a href="pages-media-gallery.html">
                                            Media Gallery
                                        </a>
                                    </li>
                                    <li>
                                        <a href="pages-invoice.html">
                                            Invoice
                                        </a>
                                    </li>
                                    <li>
                                        <a href="pages-blank.html">
                                            Blank Page
                                        </a>
                                    </li>
                                    <li>
                                        <a href="pages-404.html">
                                            404
                                        </a>
                                    </li>
                                    <li>
                                        <a href="pages-500.html">
                                            500
                                        </a>
                                    </li>
                                    <li>
                                        <a href="pages-log-viewer.html">
                                            Log Viewer
                                        </a>
                                    </li>
                                    <li>
                                        <a href="pages-search-results.html">
                                            Search Results
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-parent">
                                <a>
                                    <i class="fa fa-tasks" aria-hidden="true"></i>
                                    <span>UI Elements</span>
                                </a>
                                <ul class="nav nav-children">
                                    <li>
                                        <a href="ui-elements-typography.html">
                                            Typography
                                        </a>
                                    </li>
                                    <li class="nav-parent">
                                        <a>
                                            Icons
                                        </a>
                                        <ul class="nav nav-children">
                                            <li>
                                                <a href="ui-elements-icons-elusive.html">
                                                    Elusive
                                                </a>
                                            </li>
                                            <li>
                                                <a href="ui-elements-icons-font-awesome.html">
                                                    Font Awesome
                                                </a>
                                            </li>
                                            <li>
                                                <a href="ui-elements-icons-glyphicons.html">
                                                    Glyphicons
                                                </a>
                                            </li>
                                            <li>
                                                <a href="ui-elements-icons-line-icons.html">
                                                    Line Icons
                                                </a>
                                            </li>
                                            <li>
                                                <a href="ui-elements-icons-meteocons.html">
                                                    Meteocons
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="ui-elements-tabs.html">
                                            Tabs
                                        </a>
                                    </li>
                                    <li>
                                        <a href="ui-elements-panels.html">
                                            Panels
                                        </a>
                                    </li>
                                    <li>
                                        <a href="ui-elements-widgets.html">
                                            Widgets
                                        </a>
                                    </li>
                                    <li>
                                        <a href="ui-elements-portlets.html">
                                            Portlets
                                        </a>
                                    </li>
                                    <li>
                                        <a href="ui-elements-buttons.html">
                                            Buttons
                                        </a>
                                    </li>
                                    <li>
                                        <a href="ui-elements-alerts.html">
                                            Alerts
                                        </a>
                                    </li>
                                    <li>
                                        <a href="ui-elements-notifications.html">
                                            Notifications
                                        </a>
                                    </li>
                                    <li>
                                        <a href="ui-elements-modals.html">
                                            Modals
                                        </a>
                                    </li>
                                    <li>
                                        <a href="ui-elements-lightbox.html">
                                            Lightbox
                                        </a>
                                    </li>
                                    <li>
                                        <a href="ui-elements-progressbars.html">
                                            Progress Bars
                                        </a>
                                    </li>
                                    <li>
                                        <a href="ui-elements-sliders.html">
                                            Sliders
                                        </a>
                                    </li>
                                    <li>
                                        <a href="ui-elements-carousels.html">
                                            Carousels
                                        </a>
                                    </li>
                                    <li>
                                        <a href="ui-elements-accordions.html">
                                            Accordions
                                        </a>
                                    </li>
                                    <li>
                                        <a href="ui-elements-nestable.html">
                                            Nestable
                                        </a>
                                    </li>
                                    <li>
                                        <a href="ui-elements-tree-view.html">
                                            Tree View
                                        </a>
                                    </li>
                                    <li>
                                        <a href="ui-elements-scrollable.html">
                                            Scrollable
                                        </a>
                                    </li>
                                    <li>
                                        <a href="ui-elements-grid-system.html">
                                            Grid System
                                        </a>
                                    </li>
                                    <li>
                                        <a href="ui-elements-charts.html">
                                            Charts
                                        </a>
                                    </li>
                                    <li class="nav-parent">
                                        <a>
                                            Animations
                                        </a>
                                        <ul class="nav nav-children">
                                            <li>
                                                <a href="ui-elements-animations-appear.html">
                                                    Appear
                                                </a>
                                            </li>
                                            <li>
                                                <a href="ui-elements-animations-hover.html">
                                                    Hover
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-parent">
                                        <a>
                                            Loading
                                        </a>
                                        <ul class="nav nav-children">
                                            <li>
                                                <a href="ui-elements-loading-overlay.html">
                                                    Overlay
                                                </a>
                                            </li>
                                            <li>
                                                <a href="ui-elements-loading-progress.html">
                                                    Progress
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="ui-elements-extra.html">
                                            Extra
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-parent">
                                <a>
                                    <i class="fa fa-list-alt" aria-hidden="true"></i>
                                    <span>Forms</span>
                                </a>
                                <ul class="nav nav-children">
                                    <li>
                                        <a href="forms-basic.html">
                                            Basic
                                        </a>
                                    </li>
                                    <li>
                                        <a href="forms-advanced.html">
                                            Advanced
                                        </a>
                                    </li>
                                    <li>
                                        <a href="forms-validation.html">
                                            Validation
                                        </a>
                                    </li>
                                    <li>
                                        <a href="forms-layouts.html">
                                            Layouts
                                        </a>
                                    </li>
                                    <li>
                                        <a href="forms-wizard.html">
                                            Wizard
                                        </a>
                                    </li>
                                    <li>
                                        <a href="forms-code-editor.html">
                                            Code Editor
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-parent">
                                <a>
                                    <i class="fa fa-table" aria-hidden="true"></i>
                                    <span>Tables</span>
                                </a>
                                <ul class="nav nav-children">
                                    <li>
                                        <a href="tables-basic.html">
                                            Basic
                                        </a>
                                    </li>
                                    <li>
                                        <a href="tables-advanced.html">
                                            Advanced
                                        </a>
                                    </li>
                                    <li>
                                        <a href="tables-responsive.html">
                                            Responsive
                                        </a>
                                    </li>
                                    <li>
                                        <a href="tables-editable.html">
                                            Editable
                                        </a>
                                    </li>
                                    <li>
                                        <a href="tables-ajax.html">
                                            Ajax
                                        </a>
                                    </li>
                                    <li>
                                        <a href="tables-pricing.html">
                                            Pricing
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-parent">
                                <a>
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                    <span>Maps</span>
                                </a>
                                <ul class="nav nav-children">
                                    <li>
                                        <a href="maps-google-maps.html">
                                            Basic
                                        </a>
                                    </li>
                                    <li>
                                        <a href="maps-google-maps-builder.html">
                                            Map Builder
                                        </a>
                                    </li>
                                    <li>
                                        <a href="maps-vector.html">
                                            Vector
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-parent">
                                <a>
                                    <i class="fa fa-columns" aria-hidden="true"></i>
                                    <span>Layouts</span>
                                </a>
                                <ul class="nav nav-children">
                                    <li>
                                        <a href="layouts-default.html">
                                            Default
                                        </a>
                                    </li>
                                    <li>
                                        <a href="layouts-boxed.html">
                                            Boxed
                                        </a>
                                    </li>
                                    <li>
                                        <a href="layouts-menu-collapsed.html">
                                            Menu Collapsed
                                        </a>
                                    </li>
                                    <li>
                                        <a href="layouts-scroll.html">
                                            Scroll
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-parent">
                                <a>
                                    <i class="fa fa-asterisk" aria-hidden="true"></i>
                                    <span>Extra</span>
                                </a>
                                <ul class="nav nav-children">
                                    <li>
                                        <a href="extra-changelog.html">
                                            Changelog
                                        </a>
                                    </li>
                                    <li>
                                        <a href="extra-ajax-made-easy.html">
                                            Ajax Made Easy
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="http://themeforest.net/item/porto-responsive-html5-template/4106987?ref=Okler" target="_blank">
                                    <i class="fa fa-external-link" aria-hidden="true"></i>
                                    <span>Front-End <em class="not-included">(Not Included)</em></span>
                                </a>
                            </li>
                            <li class="nav-parent">
                                <a>
                                    <i class="fa fa-align-left" aria-hidden="true"></i>
                                    <span>Menu Levels</span>
                                </a>
                                <ul class="nav nav-children">
                                    <li>
                                        <a>First Level</a>
                                    </li>
                                    <li class="nav-parent">
                                        <a>Second Level</a>
                                        <ul class="nav nav-children">
                                            <li class="nav-parent">
                                                <a>Third Level</a>
                                                <ul class="nav nav-children">
                                                    <li>
                                                        <a>Third Level Link #1</a>
                                                    </li>
                                                    <li>
                                                        <a>Third Level Link #2</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a>Second Level Link #1</a>
                                            </li>
                                            <li>
                                                <a>Second Level Link #2</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>

                    <hr class="separator" />

                    <div class="sidebar-widget widget-tasks">
                        <div class="widget-header">
                            <h6>Projects</h6>
                            <div class="widget-toggle">+</div>
                        </div>
                        <div class="widget-content">
                            <ul class="list-unstyled m-none">
                                <li><a href="#">Porto HTML5 Template</a></li>
                                <li><a href="#">Tucson Template</a></li>
                                <li><a href="#">Porto Admin</a></li>
                            </ul>
                        </div>
                    </div>

                    <hr class="separator" />

                    <div class="sidebar-widget widget-stats">
                        <div class="widget-header">
                            <h6>Company Stats</h6>
                            <div class="widget-toggle">+</div>
                        </div>
                        <div class="widget-content">
                            <ul>
                                <li>
                                    <span class="stats-title">Stat 1</span>
                                    <span class="stats-complete">85%</span>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-primary progress-without-number" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%;">
                                            <span class="sr-only">85% Complete</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <span class="stats-title">Stat 2</span>
                                    <span class="stats-complete">70%</span>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-primary progress-without-number" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%;">
                                            <span class="sr-only">70% Complete</span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <span class="stats-title">Stat 3</span>
                                    <span class="stats-complete">2%</span>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-primary progress-without-number" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100" style="width: 2%;">
                                            <span class="sr-only">2% Complete</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>

        </aside>
        <!-- end: sidebar -->

        <?= $content; ?>
    </div>

    <aside id="sidebar-right" class="sidebar-right">
        <div class="nano">
            <div class="nano-content">
                <a href="#" class="mobile-close visible-xs">
                    Collapse <i class="fa fa-chevron-right"></i>
                </a>

                <div class="sidebar-right-wrapper">

                    <div class="sidebar-widget widget-calendar">
                        <h6>Upcoming Tasks</h6>
                        <div data-plugin-datepicker data-plugin-skin="dark" ></div>

                        <ul>
                            <li>
                                <time datetime="2014-04-19T00:00+00:00">04/19/2014</time>
                                <span>Company Meeting</span>
                            </li>
                        </ul>
                    </div>

                    <div class="sidebar-widget widget-friends">
                        <h6>Friends</h6>
                        <ul>
                            <li class="status-online">
                                <figure class="profile-picture">
                                    <img src="assets/images/!sample-user.jpg" alt="Joseph Doe" class="img-circle">
                                </figure>
                                <div class="profile-info">
                                    <span class="name">Joseph Doe Junior</span>
                                    <span class="title">Hey, how are you?</span>
                                </div>
                            </li>
                            <li class="status-online">
                                <figure class="profile-picture">
                                    <img src="assets/images/!sample-user.jpg" alt="Joseph Doe" class="img-circle">
                                </figure>
                                <div class="profile-info">
                                    <span class="name">Joseph Doe Junior</span>
                                    <span class="title">Hey, how are you?</span>
                                </div>
                            </li>
                            <li class="status-offline">
                                <figure class="profile-picture">
                                    <img src="assets/images/!sample-user.jpg" alt="Joseph Doe" class="img-circle">
                                </figure>
                                <div class="profile-info">
                                    <span class="name">Joseph Doe Junior</span>
                                    <span class="title">Hey, how are you?</span>
                                </div>
                            </li>
                            <li class="status-offline">
                                <figure class="profile-picture">
                                    <img src="assets/images/!sample-user.jpg" alt="Joseph Doe" class="img-circle">
                                </figure>
                                <div class="profile-info">
                                    <span class="name">Joseph Doe Junior</span>
                                    <span class="title">Hey, how are you?</span>
                                </div>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </aside>
</section>

<!-- Vendor -->
<script src="<?= $constante->getUrl(array('vendor', 'jquery/'), true, false); ?>jquery.js"></script>
<script src="<?= $constante->getUrl(array('vendor', 'jquery-browser-mobile/'), true, false); ?>jquery.browser.mobile.js"></script>
<script src="<?= $constante->getUrl(array('vendor', 'bootstrap', 'js/'), true, false); ?>bootstrap.js"></script>
<script src="<?= $constante->getUrl(array('vendor', 'nanoscroller/'), true, false); ?>nanoscroller.js"></script>
<script src="<?= $constante->getUrl(array('vendor', 'bootstrap-datepicker', 'js/'), true, false); ?>bootstrap-datepicker.js"></script>
<script src="<?= $constante->getUrl(array('vendor', 'magnific-popup/'), true, false); ?>magnific-popup.js"></script>
<script src="<?= $constante->getUrl(array('vendor', 'jquery-placeholder/'), true, false); ?>jquery.placeholder.js"></script>

<!-- Specific Page Vendor -->
<script src="<?= $constante->getUrl(array('vendor/'), true, false); ?>jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
<script src="<?= $constante->getUrl(array('vendor/'), true, false); ?>jquery-ui-touch-punch/jquery.ui.touch-punch.js"></script>
<script src="<?= $constante->getUrl(array('vendor/'), true, false); ?>jquery-appear/jquery.appear.js"></script>
<script src="<?= $constante->getUrl(array('vendor/'), true, false); ?>bootstrap-multiselect/bootstrap-multiselect.js"></script>
<script src="<?= $constante->getUrl(array('vendor/'), true, false); ?>jquery-easypiechart/jquery.easypiechart.js"></script>
<script src="<?= $constante->getUrl(array('vendor/'), true, false); ?>flot/jquery.flot.js"></script>
<script src="<?= $constante->getUrl(array('vendor/'), true, false); ?>flot-tooltip/jquery.flot.tooltip.js"></script>
<script src="<?= $constante->getUrl(array('vendor/'), true, false); ?>flot/jquery.flot.pie.js"></script>
<script src="<?= $constante->getUrl(array('vendor/'), true, false); ?>flot/jquery.flot.categories.js"></script>
<script src="<?= $constante->getUrl(array('vendor/'), true, false); ?>flot/jquery.flot.resize.js"></script>
<script src="<?= $constante->getUrl(array('vendor/'), true, false); ?>jquery-sparkline/jquery.sparkline.js"></script>
<script src="<?= $constante->getUrl(array('vendor/'), true, false); ?>raphael/raphael.js"></script>
<script src="<?= $constante->getUrl(array('vendor/'), true, false); ?>morris/morris.js"></script>
<script src="<?= $constante->getUrl(array('vendor/'), true, false); ?>gauge/gauge.js"></script>
<script src="<?= $constante->getUrl(array('vendor/'), true, false); ?>snap-svg/snap.svg.js"></script>
<script src="<?= $constante->getUrl(array('vendor/'), true, false); ?>liquid-meter/liquid.meter.js"></script>
<script src="<?= $constante->getUrl(array('vendor/'), true, false); ?>jqvmap/jquery.vmap.js"></script>
<script src="<?= $constante->getUrl(array('vendor/'), true, false); ?>jqvmap/data/jquery.vmap.sampledata.js"></script>
<script src="<?= $constante->getUrl(array('vendor/'), true, false); ?>jqvmap/maps/jquery.vmap.world.js"></script>
<script src="<?= $constante->getUrl(array('vendor/'), true, false); ?>jqvmap/maps/continents/jquery.vmap.africa.js"></script>
<script src="<?= $constante->getUrl(array('vendor/'), true, false); ?>jqvmap/maps/continents/jquery.vmap.asia.js"></script>
<script src="<?= $constante->getUrl(array('vendor/'), true, false); ?>jqvmap/maps/continents/jquery.vmap.australia.js"></script>
<script src="<?= $constante->getUrl(array('vendor/'), true, false); ?>jqvmap/maps/continents/jquery.vmap.europe.js"></script>
<script src="<?= $constante->getUrl(array('vendor/'), true, false); ?>jqvmap/maps/continents/jquery.vmap.north-america.js"></script>
<script src="<?= $constante->getUrl(array('vendor/'), true, false); ?>jqvmap/maps/continents/jquery.vmap.south-america.js"></script>
<script src="<?= $constante->getUrl(array('vendor/'), true, false); ?>pnotify/pnotify.custom.js"></script>


<script src="<?= $constante->getUrl(array('javascripts/'), true, false); ?>theme.js"></script>
<script src="<?= $constante->getUrl(array('javascripts/'), true, false); ?>theme.custom.js"></script>
<script src="<?= $constante->getUrl(array('javascripts/'), true, false); ?>theme.init.js"></script>


<!-- Examples -->
<script src="<?= $constante->getUrl(array('javascripts/'), true, false); ?>dashboard/examples.dashboard.js"></script>
<script src="<?= $constante->getUrl(array('javascripts/'), true, false); ?>ui-elements/examples.notifications.js"></script>

<?php if(isset($_GET['error']) && $_GET['error'] == 'critical'){ ?>
    <script type="text/javascript">
        $(document).ready(function(){
            new PNotify({
                title: 'Erreur',
                text: "<strong>Erreur Critique:</strong> <?= html_entity_decode($_GET['data']); ?>",
                type: 'error',
                icon: 'fa fa-times'
		    });
        })
    </script>
<?php } ?>

</body>
</html>