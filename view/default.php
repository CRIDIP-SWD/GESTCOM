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
    <link rel="stylesheet" href="<?= $constante->getUrl(array('vendor', 'chartist/'), true, false); ?>chartist.css" />

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
                                $sql = $DB->query("SELECT * FROM user_inbox, user WHERE user_inbox.expediteur = user.iduser AND destinataire = :idusercase ORDER BY date_message ASC LIMIT 5", array(
                                    "idusercase" => $iduser
                                ));
                                foreach($sql as $message):
                                ?>
                                <li>
                                    <a href="index.php?view=messagerie&sub=view-message-inbox&idmessageinbox=<?= $message->idmessageinbox; ?>" class="clearfix">
                                        <figure class="image">
                                            <img src="<?= $constante->getUrl(array(), false, true); ?>avatar/<?= $message->identifiant; ?>.jpg" alt="<?= $message->identifiant; ?>" class="img-circle img-responsive" width="32px" />
                                        </figure>
                                        <span class="title"><?= $message->nom_user; ?> <?= $message->prenom_user; ?></span>
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
                    <?= \App\constante::NOM_SITE; ?>
                </div>
                <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
                    <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                </div>
            </div>

            <div class="nano">
                <div class="nano-content">
                    <nav id="menu" class="nav-main" role="navigation">
                        <ul class="nav nav-main">
                            <li class="<?php if(isset($_GET['view']) && $view = $_GET['view']){echo 'nav-active';} ?>">
                                <a href="index.php?view=home">
                                    <i class="fa fa-home" aria-hidden="true"></i>
                                    <span>Tableau de Bord</span>
                                </a>
                            </li>
                            <li class="<?php if(isset($_GET['view']) && $view = $_GET['view']){echo 'nav-active';} ?>">
                                <a href="index.php?view=client">
                                    <i class="fa fa-users" aria-hidden="true"></i>
                                    <span>Client</span>
                                </a>
                            </li>
                            <li class="<?php if(isset($_GET['view']) && $view = $_GET['view']){echo 'nav-active';} ?>">
                                <a href="index.php?view=article">
                                    <i class="fa fa-cubes" aria-hidden="true"></i>
                                    <span>Articles</span>
                                </a>
                            </li>
                            <li class="nav-parent">
                                <a>
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    <span>Facturation</span>
                                </a>
                                <ul class="nav nav-children">
                                    <li <?php if(isset($_GET['view']) && $view = $_GET['view']){echo 'nav-active';} ?>>
                                        <a href="index.php?view=devis">
                                            <span>Devis</span>
                                        </a>
                                    </li>
                                    <li <?php if(isset($_GET['view']) && $view = $_GET['view']){echo 'nav-active';} ?>>
                                        <a href="index.php?view=commandes">
                                            <span>Commandes</span>
                                        </a>
                                    </li>
                                    <li <?php if(isset($_GET['view']) && $view = $_GET['view']){echo 'nav-active';} ?>>
                                        <a href="index.php?view=factures">
                                            <span>Factures</span>
                                        </a>
                                    </li>
                                    <li <?php if(isset($_GET['view']) && $view = $_GET['view']){echo 'nav-active';} ?>>
                                        <a href="index.php?view=avoirs">
                                            <span>Avoirs</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
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
<script src="<?= $constante->getUrl(array('javascripts/'), true, false); ?>ui-elements/examples.charts.js"></script>

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



<!-- AUTRE -->
<script type="text/javascript" src="<?= $constante->getUrl(array('vendor', 'flipclock', 'js/'), true, false); ?>flipclock.js"></script>
<link rel="stylesheet" href="<?= $constante->getUrl(array('vendor', 'flipclock', 'css/'), true, false); ?>flipclock.css">
<script type="text/javascript">
    var clock;
    $(document).ready(function(){
        clock = $('.clock').FlipClock({
            clockFace: 'TwelveHourClock'
        });
    });
</script>
</body>
</html>