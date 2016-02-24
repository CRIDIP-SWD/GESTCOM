<?php
use App\constante;

ini_set("display_errors", 1);
if(constante::HTTP == "https://")
{
    header(constante::URL . "Location: https://" ."/index.php");
}
if(!isset($_SESSION['user']['connect']) && $_SESSION['user']['connect'] == 0)
{
    $text = "Vous avez été déconnecter du service.";
    header("Location: index.php?view=login&error=login&text=$text");
}
?>
<!DOCTYPE html>
<!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.6
Version: 4.5.4
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
    <title><?= App\constante::NOM_SITE; ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- BEGIN LAYOUT FIRST STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Oswald:400,300,700" rel="stylesheet" type="text/css" />
    <!-- END LAYOUT FIRST STYLES -->
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
    <link href="../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="../assets/global/css/components-md.min.css" rel="stylesheet" id="style_components" type="text/css" />
    <link href="../assets/global/css/plugins-md.min.css" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="../assets/layouts/layout6/css/layout.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/layouts/layout6/css/custom.min.css" rel="stylesheet" type="text/css" />
    <!-- END THEME LAYOUT STYLES -->
    <!-- OTHER CSS -->
    <link href="../assets/global/plugins/bootstrap-toastr/toastr.min.css" rel="stylesheet" type="text/css" />
    <!-- END OTHER CSS -->
    <link rel="shortcut icon" href="favicon.ico" /> </head>
<!-- END HEAD -->

<body class="page-md">
<?= $content; ?>

<?php if(isset($_GET['success']) && $_GET['success'] == $_GET['success']){ ?>
    <script type="text/javascript">
        $(document).ready(function(){
            toastr.success("<?= $_GET['text']; ?>", "SUCCES", {
                showDuration: 1000,
                hideDuration: 1000,
                timeOut: 5000,
                closeButton: true
            });
        });
    </script>
<?php } ?>
<?php if(isset($_GET['warning']) && $_GET['warning'] == $_GET['warning']){ ?>
    <script type="text/javascript">
        $(document).ready(function(){
            toastr.warning("<?= $_GET['text']; ?>", "ATTENTION", {
                showDuration: 1000,
                hideDuration: 1000,
                timeOut: 5000,
                closeButton: true
            });
        });
    </script>
<?php } ?>
<?php if(isset($_GET['error']) && $_GET['error'] == $_GET['error']){ ?>
    <script type="text/javascript">
        $(document).ready(function(){
            toastr.error("<?= $_GET['text']; ?>", "ERREUR", {
                showDuration: 1000,
                hideDuration: 1000,
                timeOut: 5000,
                closeButton: true
            });
        });
    </script>
<?php } ?>


 
</body>

</html>