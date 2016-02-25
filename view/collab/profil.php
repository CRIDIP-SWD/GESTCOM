<div class="page-fixed-main-content">
    <div class="row">
        <div class="col-md-12" id="warn"></div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="portlet light">
                <div class="portlet-body">
                    <div style="margin:0 auto; border-radius: 50% !important; float: none; height: 50%; width: 50%">
                        <img src="<?= $constante->getUrl(array(), false, true); ?>avatar/mmockelyn.jpg" class="img-responsive img-circle img" />
                    </div>
                    <div class="text-center" style="font-weight: bold;color: #0b4d3f; font-size: 15px; padding-top: 5px;"><?= $info_user[0]->nom_user; ?> <?= $info_user[0]->prenom_user; ?></div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="well text-right">
                <a class="btn btn-circle btn-icon-only blue" data-toggle="modal" href="#edit-profil"><i class="fa fa-edit"></i></a>
                <a class="btn btn-circle btn-icon-only blue" data-toggle="modal" href="#edit-password"><i class="fa fa-key"></i></a>
            </div>
        </div>
    </div>
</div>
<div class="modal fade bs-modal-lg" id="edit-profil" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-blue">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title"><i class="fa fa-edit"></i> Edition du profil</h4>
            </div>
            <form id="form-edit-profil" class="form-horizontal" action="<?= $constante->getUrl(array(), false, false); ?>core/general/user.php" method="post">
                <input type="hidden" name="iduser" value="<?= $info_user[0]->iduser; ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="profil">Nom</label>
                        <div class="col-md-9">
                            <input type="text" id="profil" class="form-control" name="nom_user" value="<?= $info_user[0]->nom_user; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="profil">Prénom</label>
                        <div class="col-md-9">
                            <input type="text" id="profil" class="form-control" name="prenom_user" value="<?= $info_user[0]->prenom_user; ?>">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn green" name="action" value="edit-profil">Save changes</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal fade bs-modal-lg" id="edit-password" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-blue">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title"><i class="fa fa-key"></i> Edition du mot de Passe</h4>
            </div>
            <form id="form-edit-password" class="form-horizontal" action="<?= $constante->getUrl(array(), false, false); ?>core/general/user.php" method="post">
                <input type="hidden" name="iduser" value="<?= $info_user[0]->iduser; ?>">
                <input type="hidden" name="username" value="<?= $info_user[0]->username; ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="profil">Ancien Mot de Passe<span class="required"> * </span></label>
                        <div class="col-md-9">
                            <input type="password" id="profil" class="form-control" name="password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="password">Nouveau Mot de Passe<span class="required"> * </span></label>
                        <div class="col-md-9">
                            <input type="password" id="password" class="form-control" name="new_pass">
                            <span class="help-block"> Nouveau mot de Passe. </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="rpassword">Confirmation Mot de Passe<span class="required"> * </span></label>
                        <div class="col-md-9">
                            <input type="password" id="rpassword" class="form-control" name="confirm_new_pass">
                            <span class="help-block"> Veuillez le confirmer. </span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn green" name="action" value="edit-password">Save changes</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
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

<!-- END VARIABLE JS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="<?= $constante->getUrl(array('global/')); ?>scripts/app.min.js" type="text/javascript"></script>

<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="<?= $constante->getUrl(array('layouts/')); ?>layout6/scripts/layout.min.js" type="text/javascript"></script>
<script src="<?= $constante->getUrl(array('layouts/')); ?>global/scripts/quick-sidebar.min.js" type="text/javascript"></script>

<script src="<?= $constante->getUrl(array('global/')); ?>plugins/bootstrap-toastr/toastr.min.js" type="text/javascript"></script>
<script src="<?= $constante->getUrl(array('global/')); ?>plugins/jquery-validation/js/jquery.validate.js" type="text/javascript"></script>
<script src="<?= $constante->getUrl(array('global/')); ?>plugins/jquery-validation/js/additional-methods.js" type="text/javascript"></script>
<!--<script src="<?= $constante->getUrl(array('pages/')); ?>scripts/form-validation.js" type="text/javascript"></script>-->
<script src="<?= $constante->getUrl(array('pages/')); ?>scripts/ui-toastr.min.js" type="text/javascript"></script>

<?php if(isset($_GET['success']) && $_GET['success'] == $_GET['success']){ ?>
    <script type="text/javascript">
        $(document).ready(function(){
            toastr.success("<?= $_GET['text']; ?>", "SUCCES", {
                showDuration: 1000,
                hideDuration: 1000,
                timeOut: 5000,
                closeButton: true
            });
        });
    </script>
<?php } ?>
<?php if(isset($_GET['warning']) && $_GET['warning'] == 'edit-password'){ ?>
    <script type="text/javascript">
        $('#warn').ready(function(){
            var error = $(this);
            error.html("<div class='alert alert-warning alert-dismissable'>" +
                "<button class='close' aria-hidden='true' data-dismiss='alert' type='button'></button>" +
                "<strong><i class='fa fa-warning'></i> Attention</strong>" +
                "<?= $_GET['text']; ?>" +
                "</div>");
            error.fadeIn();
        });
    </script>
<?php } ?>

<?php if(isset($_GET['warning']) && $_GET['warning'] == $_GET['warning']){ ?>
    <script type="text/javascript">
        $(document).ready(function(){
            toastr.warning("<?= $_GET['text']; ?>", "ATTENTION", {
                showDuration: 1000,
                hideDuration: 1000,
                timeOut: 5000,
                closeButton: true
            });
        });
    </script>
<?php } ?>
<?php if(isset($_GET['error']) && $_GET['error'] == $_GET['error']){ ?>
    <script type="text/javascript">
        $(document).ready(function(){
            toastr.error("<?= $_GET['text']; ?>", "ERREUR", {
                showDuration: 1000,
                hideDuration: 1000,
                timeOut: 5000,
                closeButton: true
            });
        });
    </script>
<?php } ?>
<?php if(isset($_GET['info']) && $_GET['info'] == $_GET['info']){ ?>
    <script type="text/javascript">
        $(document).ready(function(){
            toastr.info("<?= $_GET['text']; ?>", "INFORMATION", {
                showDuration: 1000,
                hideDuration: 1000,
                timeOut: 5000,
                closeButton: true
            });
        });
    </script>
<?php } ?>



<!-- END THEME LAYOUT SCRIPTS -->