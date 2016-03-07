<?php if(!isset($_GET['sub'])): ?>
    <section class="app">
        <div class="row">
            <div class="col-md-12">
                <div class="well text-right">
                    <a class="btn btn-rounded btn-primary" href="index.php?view=mailbox&sub=compose"><i class="fa fa-plus"></i> Nouveau Mail</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-content">
                        <h1 id="titre_mailbox"><strong>BOITE DE RECEPTION (1)</strong></h1>
                        <div class="table-responsive">
                            <table class="table dataTable table-hover" id="mailbox">
                                <thead>
                                    <tr>
                                        <th>Expéditeur</th>
                                        <th>Sujet</th>
                                        <th>Date</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $sql_mail = $DB->query("SELECT * FROM collab_inbox, users WHERE collab_inbox.expediteur = users.iduser AND destinataire = :iduser", array("iduser" => $user->iduser));
                                foreach($sql_mail as $mail):
                                ?>
                                    <tr <?php if($mail->lu == 0){echo 'style="font-weight: bolder;"';}?> id="message">
                                        <td style="display: inline-flex;"><img src="<?= $constante->getUrl(array(), false, true); ?>avatar/<?= $mail->username; ?>.png" class="img-responsive img-circle" width="25"/>  &nbsp;<?= $mail->nom_user; ?> <?= $mail->prenom_user; ?></td>
                                        <td onclick="window.location='index.php?view=mailbox&sub=message&idinbox=<?= $mail->idinbox; ?>'"><?= html_entity_decode($mail->sujet); ?></td>
                                        <td>
                                            <?php
                                            $date = $date_format->formatage("d-m-Y H:i:s", $mail->date_message);
                                            echo $date_format->format($date);
                                            ?>
                                        </td>
                                        <td>
                                            <a class="btn btn-sm btn-rounded btn-danger" id="supp-mail" href="controller/mailbox.ajax.php?action=supp-mail&idinbox=<?= $mail->idinbox; ?>"><i class="fa fa-trash-o"></i></a>
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
<?php if(isset($_GET['sub']) && $_GET['sub'] == 'compose'): ?>
<div class="row">
    <div class="col-md-12">
        <div class="well">
            <div class="row">
                <div class="col-md-6">
                    <h1>NOUVEAU MESSAGE</h1>
                </div>
                <div class="col-md-6 pull-right">
                    <a class="btn btn-rounded btn-primary" href="index.php?view=mailbox&sub=compose"><i class="fa fa-plus"></i> Nouveau Mail</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
<script src="<?= $constante->getUrl(array('plugins/')); ?>charts-morris/raphael.min.js"></script> <!-- Morris Charts -->
<script src="<?= $constante->getUrl(array('plugins/')); ?>charts-morris/morris.min.js"></script> <!-- Morris Charts -->
<script src="<?= $constante->getUrl(array('plugins/')); ?>summernote/summernote.min.js"></script>
<script src="<?= $constante->getUrl(array('plugins/')); ?>datatables/jquery.dataTables.min.js"></script>
<script src="<?= $constante->getUrl(array('plugins/')); ?>custom/js/pages/mailbox.js"></script>