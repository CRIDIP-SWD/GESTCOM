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
                                    <table class="table dataTable" id="today">
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
                                    <h3>Semaine <?= date("W"); ?> | Du 29 Février au 6 Mars 2016</h3>
                                </div>
                                <div class="panel-content">
                                    <table class="table dataTable" id="week">
                                        <thead>
                                        <tr>
                                            <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width: 279px;">
                                                Jours
                                            </th>
                                            <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width: 350px;">
                                                Heure
                                            </th>
                                            <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width: 350px;">
                                                Evenement
                                            </th>
                                            <th tabindex="0" rowspan="1" colspan="1">
                                                Action
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody role="alert" aria-live="polite" aria-relevant="all">
                                        <?php
                                        $lundi = new DateTime();
                                        $lundi->setISODate(date("Y"), date("W"));

                                        $vendredi = new DateTime();
                                        $vendredi->setISODate(date("Y"), date("W"));
                                        date_modify($vendredi, '+4 days');

                                        $format_lundi = $lundi->format("d-m-Y");
                                        $format_vendredi = $vendredi->format("d-m-Y");

                                        $strt_lundi = $date_format->format_strt($format_lundi);
                                        $strt_vendredi = $date_format->format_strt($format_vendredi);

                                        var_dump($strt_lundi, $strt_vendredi);
                                        die();
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
                    <div class="tab-pane fade" id="tab1_3">
                        <p>Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh mi whatever gluten-free, carles pitchfork biodiesel fixie etsy retro mlkshk vice blog. Scenester cred you probably haven't heard of them, vinyl craft beer blog stumptown. Pitchfork sustainable tofu synth chambray yr.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/custom/js/pages/calendar.js"></script>