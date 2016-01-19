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
                                <a href="#">Editer le Profil <?= $info_user[0]->iduser; ?></a>
                            </div>
                        </div>
                    </div>
                </header>
            </div>
        </div>
    </div>

</section>