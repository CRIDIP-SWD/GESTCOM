<?php if(!isset($_GET['sub'])): ?>
    <section class="app">
        <div class="row">
            <div class="col-md-12">
                <div class="well text-right">
                    <a class="btn btn-rounded btn-primary"><i class="fa fa-plus"></i> Nouveau Mail</a>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<script src="<?= $constante->getUrl(array('plugins/')); ?>charts-morris/raphael.min.js"></script> <!-- Morris Charts -->
<script src="<?= $constante->getUrl(array('plugins/')); ?>charts-morris/morris.min.js"></script> <!-- Morris Charts -->
<script src="<?= $constante->getUrl(array('plugins/')); ?>summernote/summernote.min.js"></script>
<script src="<?= $constante->getUrl(array('plugins/')); ?>custom/js/pages/mailbox.js"></script>