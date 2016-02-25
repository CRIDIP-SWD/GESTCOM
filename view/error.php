<?php
$code = $_GET['code'];
$msg = $_GET['msg'];
$type = $_GET['type'];
?>
<div class="page-content">
    <div class="container">
        <!-- BEGIN PAGE BASE CONTENT -->
        <!-- Center Wrap BEGIN -->
        <div class="center-wrap">
            <div class="center-align">
                <div class="center-body">
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
                </div>
            </div>
        </div>
        <!-- Center Wrap END -->
        <!-- END PAGE BASE CONTENT -->
        <!-- BEGIN FOOTER -->
        <p class="copyright">2016 © BLUJET SYSTEM.</p>
        <!-- END FOOTER -->
    </div>
</div>