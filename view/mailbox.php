<?php if(!isset($_GET['sub'])): ?>
    <section class="app">
        <div class="row">
            <div class="col-md-12">
                <div class="well text-right">
                    <a class="btn btn-rounded btn-primary"><i class="fa fa-plus"></i> Nouveau Mail</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-content">
                        <h1 id="titre_mailbox"><strong>BOITE DE RECEPTION (1)</strong></h1>
                        <div class="table-responsive">
                            <table class="table dataTable" id="mailbox">
                                <thead>
                                    <tr>
                                        <th>Expéditeur</th>
                                        <th>Sujet</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $sql_mail = $DB->query("SELECT * FROM collab_inbox, users WHERE collab_inbox.expediteur = users.iduser AND destinataire = :iduser", array("iduser" => $user->iduser));
                                foreach($sql_mail as $mail):
                                ?>
                                    <tr>
                                        <td style="display: inline-flex;"><img src="<?= $constante->getUrl(array(), false, true); ?>avatar/<?= $mail->username; ?>.png" class="img-responsive img-circle" width="25"/>  &nbsp;<?= $mail->nom_user; ?> <?= $mail->prenom_user; ?></td>
                                        <td><?= html_entity_decode($mail->sujet); ?></td>
                                        <td>
                                            <?= $date_format->format($mail->date_message); ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<script src="<?= $constante->getUrl(array('plugins/')); ?>charts-morris/raphael.min.js"></script> <!-- Morris Charts -->
<script src="<?= $constante->getUrl(array('plugins/')); ?>charts-morris/morris.min.js"></script> <!-- Morris Charts -->
<script src="<?= $constante->getUrl(array('plugins/')); ?>summernote/summernote.min.js"></script>
<script src="<?= $constante->getUrl(array('plugins/')); ?>datatables/jquery.dataTables.min.js"></script>
<script src="<?= $constante->getUrl(array('plugins/')); ?>custom/js/pages/mailbox.js"></script>