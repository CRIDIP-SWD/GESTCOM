<div class="page-fixed-main-content">
    <div class="row">
        <div class="col-md-4">
            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                <h4 class="widget-thumb-heading">Evènement du Jour</h4>
                <div class="widget-thumb-wrap">
                    <i class="widget-thumb-icon bg-green icon-calendar"></i>
                    <div class="widget-thumb-body">
                        <span data-value="0" data-counter="counterup" class="widget-thumb-body-stat">0</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                <h4 class="widget-thumb-heading">Boite Mail</h4>
                <div class="widget-thumb-wrap">
                    <i class="widget-thumb-icon bg-red icon-envelope"></i>
                    <div class="widget-thumb-body">
                        <span data-value="0" data-counter="counterup" class="widget-thumb-body-stat">0</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                <h4 class="widget-thumb-heading">Tache à Effectuer</h4>
                <div class="widget-thumb-wrap">
                    <i class="widget-thumb-icon bg-yellow icon-list"></i>
                    <div class="widget-thumb-body">
                        <span data-value="0" data-counter="counterup" class="widget-thumb-body-stat">0</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include $constante->getUrl(array(''), false, false)."view/footer.php"; ?>
</div>
</div>
<!-- END CONTAINER -->
<?php include $constante->getUrl(array(''), false, false)."view/sidebar_left.php"; ?>
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
<!-- VARIABLE JS -->
<script type="text/javascript">
    var $iduser = <?= $info_user[0]->iduser; ?>;
</script>
<!-- END VARIABLE JS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="<?= $constante->getUrl(array('global/')); ?>scripts/app.min.js" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="<?= $constante->getUrl(array('layouts/')); ?>layout6/scripts/layout.min.js" type="text/javascript"></script>
<script src="<?= $constante->getUrl(array('layouts/')); ?>global/scripts/quick-sidebar.min.js" type="text/javascript"></script>

<script src="<?= $constante->getUrl(array('global/')); ?>plugins/bootstrap-toastr/toastr.min.js" type="text/javascript"></script>
<script src="<?= $constante->getUrl(array('pages/')); ?>scripts/ui-toastr.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?= $constante->getUrl(array('script/')); ?>collab/general.js"></script>


<!-- END THEME LAYOUT SCRIPTS -->