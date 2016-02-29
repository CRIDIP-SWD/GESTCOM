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
                    <div class="name"><?= $user->nom_user; ?> <?= $user->prenom_user; ?> <i class="fa fa-check-circle"></i></div>
                    <div class="profil-info"><i class="icon-present"></i><?= $date_format->formatage_long($user->date_naissance); ?></div>
                    <div class="profil-info"><i class="icon-call-end"></i><?= $user->num_tel_poste; ?></div>
                </div>
            </div>
        </div>
    </div>
    <div class="profil-content">

    </div>
</div>
<div class="col-lg-2 col-md-3 hidden-sm hidden-xs profil-right">
    <div class="profil-sidebar-element">
        <h3><strong>A Propos de moi</strong></h3>
        <?= html_entity_decode($user->commentaire); ?>
    </div>
    <div class="profil-sidebar-element m-t-20">
        <h3><strong>Statistique Personnel</strong></h3>
        <p class="c-gray m-t-0"><i>Dernière Connexion: <?= $date_format->format(date("d-m-Y H:i:s", $user->last_connect)); ?></i>
        </p>
        <h3><strong>AVERAGE RATING</strong></h3>
        <div id="stars" class="stars pull-left">
            <span class="fa fa-star c-primary"></span>
            <span class="fa fa-star c-primary"></span>
            <span class="fa fa-star c-primary"></span>
            <span class="fa fa-star c-primary"></span>
            <span class="fa fa-star-o c-primary"></span>
        </div>
        <div class="sidebar-number pull-right">4/5</div>
        <div class="clearfix"></div>
        <h3><strong>MY SHARING</strong></h3>
        <p class="m-t-0"><span class="c-primary"><strong>15</strong></span> Replies</p>
        <p class="m-t-0"><span class="c-primary"><strong>8</strong></span> Messages</p>
        <p class="m-t-0"><span class="c-primary"><strong>24</strong></span> Questions</p>
    </div>
    <div class="m-t-20">
        <p>You and Bryan are not friend yet</p>
        <button type="button" class="btn btn-block btn-primary bd-0 no-bd"><i class="icon-user"></i> Add to my friends</button>
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