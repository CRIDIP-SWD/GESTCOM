<?php
$info_user = $account_cls->info($_SESSION['identifiant']);
?>
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Tableau de Bord</h2>

        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="index.php?view=home">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Tableau de Bord</span></li>
            </ol>

            <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
        </div>
    </header>
    <div class="row">
        <div class="col-md-4">
            <div class="panel">
                <header class="panel-heading bg-primary">
                    <div class="widget-profile-info">
                        <div class="profile-picture">
                            <img src="<?= $constante->getUrl(array(), false, true); ?>avatar/<?= $info_user[0]->identifiant; ?>.jpg" />
                        </div>
                        <div class="profile-info">
                            <h4 class="name text-weight-semibold"><?= $info_user[0]->nom_user; ?> <?= $info_user[0]->prenom_user; ?></h4>
                            <h5 class="role"><?= $info_user[0]->poste; ?></h5>
                            <div class="profile-footer">
                                <a href="#">Editer le Profil</a>
                            </div>
                        </div>
                    </div>
                </header>
                <div class="panel-body">
                    <div class="list-group">
                        <a class="list-group-item" href="index.php?view=calendar">
                            MON CALENDRIER
                            <span class="badge">3</span>
                        </a>
                        <a class="list-group-item" href="index.php?view=messagerie">
                            MA MESSAGERIE
                            <span class="badge">1</span>
                        </a>
                        <a class="list-group-item" href="index.php?view=task">
                            MES TACHES
                        </a>
                    </div>
                    <hr class="solid short"/>
                    <div class="list-group">
                        <a class="list-group-item" href="">
                            <i class="fa fa-user"></i> MON PROFIL
                        </a>
                        <a class="list-group-item" href="">
                            <i class="fa fa-power-off"></i> DECONNEXION
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-9">
                    <div class="panel">
                        <div class="panel-body bg-primary">
                            <div class="clock"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <section class="panel-group mb-xlg">
                        <div class="widget-twitter-profile">
                            <div class="top-image">
                                <img alt="" src="assets/images/widget-twitter-profile.jpg">
                            </div>
                            <div class="profile-info">
                                <div class="profile-picture">
                                    <img alt="" src="assets/images/!logged-user.jpg">
                                </div>
                                <div class="profile-account">
                                    <h3 class="name text-weight-semibold">John Doe</h3>
                                    <a class="account" href="#">@oklerthemes</a>
                                </div>
                                <ul class="profile-stats">
                                    <li>
                                        <h5 class="stat text-uppercase">Tweets</h5>
                                        <h4 class="count">60</h4>
                                    </li>
                                    <li>
                                        <h5 class="stat text-uppercase">Following</h5>
                                        <h4 class="count">139</h4>
                                    </li>
                                    <li>
                                        <h5 class="stat text-uppercase">Followers</h5>
                                        <h4 class="count">38</h4>
                                    </li>
                                </ul>
                            </div>
                            <div class="profile-quote">
                                <blockquote>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dapibus consectetur aliquet. Curabitur tincidunt convallis mi, ac elementum purus bibendum vitae.
                                    </p>
                                </blockquote>
                                <div class="quote-footer">
                                    <span class="datetime">4:27 PM - 15 Jul 2014</span>
                                    -
                                    <a href="#">Details</a>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>

</section>
