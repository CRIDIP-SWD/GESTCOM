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
                    <div class="panel-header panel-controls">
                        <h3>Colored  <strong>version</strong></h3>
                    </div>
                    <div class="panel-content">
                        <ul class="nav nav-tabs nav-primary">
                            <li class=""><a href="#tab2_1" data-toggle="tab"><i class="icon-home"></i> Home</a></li>
                            <li class="active"><a href="#tab2_2" data-toggle="tab"><i class="icon-user"></i> Profile</a></li>
                            <li><a href="#tab2_3" data-toggle="tab"><i class="icon-cloud-download"></i> Other Tab</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade" id="tab2_1">
                                <div class="row column-seperation">
                                    <div class="col-md-6 line-separator">
                                        <h3><strong>Big</strong> Title for your tab</h3>
                                        <h4>Customize your tab as you want easily</h4>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="light">default, the textarea element comes with a vertical scrollbar (and maybe even a horizontal scrollbar). This vertical scrollbar enables the user to continue entering and reviewing their text (by scrolling up and down).</p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade active in" id="tab2_2">
                                <h3>"Sooner or later, those who win are those who think they <strong>can</strong>."</h3>
                                <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial.</p>
                            </div>
                            <div class="tab-pane fade" id="tab2_3">
                                <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh mi whatever gluten-free, carles pitchfork biodiesel fixie etsy retro mlkshk vice blog. Scenester cred you probably haven't heard of them, vinyl craft beer blog stumptown. Pitchfork sustainable tofu synth chambray yr.</p>
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
<!-- END PAGE SCRIPT -->