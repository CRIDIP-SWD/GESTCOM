<?php
$code = $_GET['code'];
$msg = $_GET['msg'];
$type = $_GET['type'];
?>
    <div class="row">
        <div class="col-md-12">
            <div class="text-center">
                <?php if($type == "ERROR"): ?>
                    <i class="fa fa-remove text-danger fa-5x"></i>
                    <h2 class="text-danger">ERREUR</h2>
                <?php else: ?>
                    <i class="fa fa-warning text-warning fa-5x"></i>
                    <h2 class="text-warning">ATTENTION</h2>
                <?php endif; ?>
            </div>
            <div class="well">
                <table style="width: 100%;">
                    <tr>
                        <td style="font-weight: bold;width: 50%;">Code:</td>
                        <td style="width: 50%;"><?= $code; ?></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;width: 50%;">Message:</td>
                        <td style="width: 50%;"><?= html_entity_decode($msg); ?></td>
                    </tr>
                </table>
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