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
                                    <table class="table dataTable" id="calendar">
                                        <thead>
                                            <tr>
                                                <th class="no_sort" tabindex="0" rowspan="1" colspan="1" style="width: 42px;"></th>
                                                <th class="sorting_asc" tabindex="0" rowspan="1" colspan="1" style="width: 279px;">
                                                    Heure
                                                </th>
                                                <th class="sorting" tabindex="0" rowspan="1" colspan="1" style="width: 350px;">
                                                    Evénement
                                                </th>
                                                <th tabindex="0" rowspan="1" colspan="1">
                                                    Action
                                                </th>
                                                <th style="visibility: hidden"></th>
                                                <th style="visibility: hidden"></th>
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
                                            <tr class="gradeA odd <?php if($event->start_event < time()){echo 'danger';}">
                                                <td class="center "></td>
                                                <td class=" sorting_1"><?= $date_format->formatage("H:i", $event->start_event); ?> / <?= $date_format->formatage("H:i", $event->end_event); ?></td>
                                                <td class=" "><?= html_entity_decode($event->titre_event); ?></td>
                                                <td class=" "></td>
                                                <td style="visibility: hidden"><?= html_entity_decode($event->lieu_event); ?></td>
                                                <td style="visibility: hidden"><?= html_entity_decode($event->desc_event); ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab1_2">
                        <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial. Keytar helvetica VHS salvia yr, vero magna velit sapiente labore stumptown. Vegan fanny pack odio cillum wes anderson 8-bit, sustainable jean shorts beard ut DIY ethical culpa terry richardson biodiesel. Art party scenester stumptown, tumblr butcher vero sint qui sapiente accusamus tattooed echo park.</p>
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