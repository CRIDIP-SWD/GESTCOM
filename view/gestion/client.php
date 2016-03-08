<?php if(!isset($_GET['sub'])): ?>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <h1><i class="fa fa-users"></i> CLIENT</h1>
                </div>
                <div class="col-md-6">
                    <a class="btn btn-rounded btn-lg btn-primary pull-right" data-toggle="modal" data-target="#add-client"><i class="fa fa-plus-circle fa-2x"></i> Nouveau Client</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-header">
                    <h3>Liste des Clients</h3>
                </div>
                <div class="panel-content">
                    <div class="table-responsive">
                        <table class="table table-hover dataTable" id="client">
                            <thead>
                                <tr>
                                    <th>Numéro Client</th>
                                    <th>Identité</th>
                                    <th>Adresse</th>
                                    <th>Coordonnée</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $sql_client = $DB->query("SELECT * FROM client ORDER BY nom_client ASC");
                            foreach($sql_client as $client):
                            ?>
                                <tr>
                                    <td><?= $client->num_client; ?></td>
                                    <td><?= $client->nom_client; ?> <?= $client->prenom_client; ?></td>
                                    <td>
                                        <?= html_entity_decode($client->adresse_client); ?><br>
                                        <?= $client->code_postal; ?> <?= html_entity_decode($client->ville_client); ?>
                                    </td>
                                    <td>
                                        <strong><i class="fa fa-phone-square"></i></strong>: 0<?= $client->tel_client; ?><br>
                                        <strong><i class="fa fa-envelope"></i></strong>: <?= $client->mail_client; ?>
                                    </td>
                                    <td>

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
<?php endif; ?>


<script src="<?= $constante->getUrl(array('plugins/')); ?>datatables/jquery.dataTables.min.js"></script>
<script src="<?= $constante->getUrl(array('plugins/')); ?>custom/js/pages/gestion/client.js"></script>