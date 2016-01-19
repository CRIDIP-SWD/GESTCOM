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
                    </div>
                </header>
            </div>
        </div>
    </div>

</section>