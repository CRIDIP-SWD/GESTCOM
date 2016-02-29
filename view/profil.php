<div class="col-lg-10 col-md-9">
    <div class="row profil-header" >
        <div class="col-lg-12 col-md-12">
            <div class="row">
                <div class="col-xs-4 profil-img">
                    <img src="<?= $constante->getUrl(array(), false, true); ?>avatar/<?= $user->username; ?>.jpg" alt="profil">
                </div>
                <div class="col-xs-8 p-l-0 col-map">
                    <div class="map" id="profil-map"></div>
                </div>
            </div>
            <div class="row header-name">
                <div class="col-xs-12">
                    <div class="name"><?= $user->nom_user; ?> <?= $user->prenom_user; ?>
                        <?php if($user->connect == 0): ?>
                            <i class="fa fa-circle text-danger"></i>
                        <?php elseif($user->connect == 1): ?>
                            <i class="fa fa-circle text-warning"></i>
                        <?php else: ?>
                            <i class="fa fa-circle text-success"></i>
                        <?php endif; ?>
                    </div>
                    <div class="profil-info"><i class="icon-present"></i><?= $date_format->formatage_long($user->date_naissance); ?></div>
                    <div class="profil-info"><i class="icon-call-end"></i><?= $user->num_tel_poste; ?></div>
                </div>
            </div>
        </div>
    </div>
    <div class="profil-content">
        <div class="row">
            <div class="col-md-12 portlets">
                <div class="panel">
                    <div class="panel-content">
                        <ul class="nav nav-tabs nav-primary">
                            <li class="active"><a href="#mytimeline" data-toggle="tab"><i class="fa fa-clock-o"></i> Ma TimeLine</a></li>
                            <li><a href="#info" data-toggle="tab"><i class="fa fa-user"></i> Changer mes informations</a></li>
                            <li><a href="#password" data-toggle="tab"><i class="fa fa-key"></i> Changer mon mot de passe</a></li>
                            <li><a href="#plugins" data-toggle="tab"><i class="fa fa-cogs"></i> Plugins</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade active in" id="mytimeline">

                            </div>
                            <div class="tab-pane fade" id="info">
                                <form class="form-validation" action="controller/user.php" method="post" role="form">
                                    <div class="form-group">
                                        <label class="control-label" for="nom_user">Votre nom</label>
                                        <input id="nom_user" type="text" name="nom_user" class="form-control" value="<?= $user->nom_user; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="prenom_user">Votre Prénom</label>
                                        <input id="prenom_user" type="text" name="prenom_user" class="form-control" value="<?= $user->prenom_user; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="poste_user">Votre poste</label>
                                        <input id="poste_user" type="text" name="poste_user" class="form-control" value="<?= $user->poste_user; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Votre date de naissance</label>
                                        <div class="prepend-icon">
                                            <input type="text" name="date_naissance" class="b-datepicker form-control" placeholder="Select a date...">
                                            <i class="icon-calendar"></i>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="num_tel_poste">Votre Numéro de Poste</label>
                                        <input id="num_tel_poste" data-mask="+0033 9 99 99 99 99" type="text" name="num_tel_poste" class="form-control" value="<?= $user->num_tel_poste; ?>">
                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-success btn-embossed pull-right" name="action" value="edit-profil"><i class="fa fa-check"></i> Valider</button>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="password">

                            </div>
                            <div class="tab-pane fade" id="plugins">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-2 col-md-3 hidden-sm hidden-xs profil-right">
    <div class="profil-sidebar-element">
        <h3><strong>A Propos de moi</strong></h3>
        <?= html_entity_decode($user->commentaire); ?>
    </div>
    <div class="profil-sidebar-element m-t-20">
        <h3><strong>Statistique Personnel</strong></h3>
        <?php if($user->connect == 0): ?>
        <p class="c-gray m-t-0"><i>Dernière Connexion: <?= $date_format->format(date("d-m-Y H:i:s", $user->last_connect)); ?></i></p>
        <?php elseif($user->connect == 1): ?>
        <p class="c-gray m-t-0"><i class="away"></i> Absent</p>
        <?php else: ?>
        <p class="c-gray m-t-0"><i class="online"></i> En Ligne</p>
        <?php endif; ?>
    </div>
    <div class="m-t-60" style="width:100%">
        <canvas id="profil-chart" height="450"></canvas>
    </div>
</div>
<div class="footer">
    <div class="copyright">
        <p class="pull-left sm-pull-reset">
            <span>Copyright <span class="copyright">©</span> 2015 </span>
            <span>THEMES LAB</span>.
            <span>All rights reserved. </span>
        </p>
        <p class="pull-right sm-pull-reset">
            <span><a href="#" class="m-r-10">Support</a> | <a href="#" class="m-l-10 m-r-10">Terms of use</a> | <a href="#" class="m-l-10">Privacy Policy</a></span>
        </p>
    </div>
</div>

<!-- BEGIN PAGE SCRIPT -->
<script src="assets/plugins/gsap/main-gsap.min.js"></script> <!-- HTML Animations -->
<script src="assets/plugins/slick/slick.min.js"></script> <!-- Slider -->
<script src="assets/plugins/countup/countUp.min.js"></script> <!-- Animated Counter Number -->
<script src="assets/plugins/autosize/autosize.min.js"></script> <!-- Textarea autoresize -->
<script src="//maps.google.com/maps/api/js?sensor=true"></script> <!-- Google Maps -->
<script src="assets/plugins/google-maps/gmaps.min.js"></script>  <!-- Google Maps Easy -->
<script src="assets/js/pages/profil.js"></script>

<script src="assets/plugins/custom/js/pages/profil.js"></script>
<script src="assets/plugins/jquery-validation/jquery.validate.js"></script> <!-- Form Validation -->
<script src="assets/plugins/jquery-validation/additional-methods.min.js"></script> <!-- Form Validation Additional Methods - OPTIONAL -->

<script src="assets/plugins/touchspin/jquery.bootstrap-touchspin.min.js"></script> <!-- A mobile and touch friendly input spinner component for Bootstrap -->
<script src="assets/plugins/timepicker/jquery-ui-timepicker-addon.min.js"></script> <!-- Time Picker -->
<script src="assets/plugins/multidatepicker/multidatespicker.min.js"></script> <!-- Multi dates Picker -->
<script src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script> <!-- >Bootstrap Date Picker -->
<script src="assets/plugins/bootstrap-datepicker/locales/bootstrap-datepicker.fr.min.js"></script> <!-- >Bootstrap Date Picker in Spanish (can be removed if not use) -->
<script src="assets/plugins/colorpicker/spectrum.min.js"></script> <!-- Color Picker -->
<script src="assets/plugins/rateit/jquery.rateit.min.js"></script> <!-- Rating star plugin -->
<script src="assets/js/pages/form_plugins.js"></script>

<script src="assets/plugins/bootstrap/js/jasny-bootstrap.min.js"></script>
<!-- END PAGE SCRIPT -->