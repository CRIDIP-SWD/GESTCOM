<div class="header">
    <h2>Votre <strong>Calendrier</strong></h2>
    <?= $insert->breadcumb("Calendier", "test", "test"); ?>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-content">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#today" data-toggle="tab">Aujoud'hui</a></li>
                    <li class=""><a href="#week" data-toggle="tab">Semaine</a></li>
                    <li><a href="#month" data-toggle="tab">Mois</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade active in" id="today">
                        <div class="table-responsive">
                            <div class="panel">
                                <div class="panel-header">
                                    <h3><?= $date_format->formatage_long(time()); ?></h3>
                                </div>
                                <div class="panel-content">
                                    <table class="table dataTable" id="today2">
                                        <thead>
                                            <tr>
                                                <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width: 279px;">
                                                    Heure
                                                </th>
                                                <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width: 350px;">
                                                    Evénement
                                                </th>
                                                <th tabindex="0" rowspan="1" colspan="1">
                                                    Action
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody role="alert" aria-live="polite" aria-relevant="all">
                                        <?php
                                        $sql_event = $DB->query("SELECT * FROM collab_event WHERE iduser = :iduser AND start_event >= :start_event AND end_event <= :end_event", array(
                                            "iduser"        => $user->iduser,
                                            "start_event"   => $date_format->format_strt(date("d-m-Y 00:00:00")),
                                            "end_event"     => $date_format->format_strt(date("d-m-Y 23:59:59"))
                                        ));
                                        foreach($sql_event as $event):
                                        ?>
                                            <tr class="<?php if($event->start_event < time() AND $event->end_event < time()){echo 'danger';} ?> <?php if($event->start_event <= time()-900){echo 'info';} ?>">
                                                <td class=""><?= $date_format->formatage("H:i", $event->start_event); ?> / <?= $date_format->formatage("H:i", $event->end_event); ?></td>
                                                <td class=""><?= html_entity_decode($event->titre_event); ?></td>
                                                <td class=""></td>
                                            </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="week">
                        <div class="table-responsive">
                            <div class="panel">
                                <div class="panel-header">
                                    <h3>Semaine <?= date("W"); ?> | <?= $date_format->semaine(date("Y"), date("W")); ?></h3>
                                </div>
                                <div class="panel-content">
                                    <table class="table dataTable" id="week2">
                                        <thead>
                                        <tr>
                                            <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width: 10%">
                                                Jours
                                            </th>
                                            <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width: 10%">
                                                Heure
                                            </th>
                                            <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width: 70%">
                                                Evenement
                                            </th>
                                            <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;">
                                                Action
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody role="alert" aria-live="polite" aria-relevant="all">
                                        <?php
                                        $strt = $date_format->semaine_strt(date("Y"), date("W"));
                                        $sql_event = $DB->query("SELECT * FROM collab_event WHERE iduser = :iduser AND start_event >= :start_event AND end_event <= :end_event", array(
                                            "iduser"        => $user->iduser,
                                            "start_event"   => $strt['strt_lundi'],
                                            "end_event"     => $strt['strt_vendredi']
                                        ));
                                        foreach($sql_event as $event):
                                            ?>
                                            <tr class="<?php if($event->start_event < time() AND $event->end_event < time()){echo 'danger';} ?> <?php if($event->start_event <= time()-900){echo 'info';} ?>">
                                                <td><?= $date_format->formatage_sequenciel("d", $event->start_event); ?> <?= date("d", $event->start_event); ?></td>
                                                <td><?= $date_format->formatage("H:i", $event->start_event); ?> / <?= $date_format->formatage("H:i", $event->end_event); ?></td>
                                                <td><?= html_entity_decode($event->titre_event); ?></td>
                                                <td></td>
                                            </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="month">
                        <div class="table-responsive">
                            <div class="panel">
                                <div class="panel-header">
                                    <h3>Mois de <?= $date_format->formatage_sequenciel_no_str("m")." ".date("Y"); ?> </h3>
                                </div>
                                <div class="panel-content">
                                    <table class="table dataTable" id="week2">
                                        <thead>
                                        <tr>
                                            <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width: 10%">
                                                Jours
                                            </th>
                                            <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width: 10%">
                                                Heure
                                            </th>
                                            <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width: 70%">
                                                Evenement
                                            </th>
                                            <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;">
                                                Action
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody role="alert" aria-live="polite" aria-relevant="all">
                                        <?php
                                        $strt = $date_format->month_strt();
                                        $sql_event = $DB->query("SELECT * FROM collab_event WHERE iduser = :iduser AND start_event >= :start_event AND end_event <= :end_event", array(
                                            "iduser"        => $user->iduser,
                                            "start_event"   => $strt['debut_mois'],
                                            "end_event"     => $strt['fin_mois']
                                        ));
                                        foreach($sql_event as $event):
                                            ?>
                                            <tr class="<?php if($event->start_event < time() AND $event->end_event < time()){echo 'danger';} ?> <?php if($event->start_event <= time()-900){echo 'info';} ?>">
                                                <td><?= $date_format->formatage_sequenciel("d", $event->start_event); ?> <?= date("d", $event->start_event); ?></td>
                                                <td><?= $date_format->formatage("H:i", $event->start_event); ?> / <?= $date_format->formatage("H:i", $event->end_event); ?></td>
                                                <td><?= html_entity_decode($event->titre_event); ?></td>
                                                <td></td>
                                            </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/custom/js/pages/calendar.js"></script>