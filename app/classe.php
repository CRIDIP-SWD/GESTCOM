<?php
require dirname(__DIR__)."/app/autoloader.php";
\App\autoloader::register();

//Vendor Composer
require dirname(__DIR__)."/vendor/autoload.php";

use App\administration\configuration;
use App\administration\users;
use App\api\push;
use App\app;
use App\constante;
use App\date_format;
use App\DB;
use App\fonction;
use App\IP_API;
use \Ovh\Api;

$app = new app();
$constante = new constante();
$fonction = new fonction();
$DB = new DB();
$date_format = new date_format();
$ip_api = new IP_API($_SERVER['REMOTE_ADDR']);
$show_ip = $ip_api->get();

if(constante::HTTP == "https://" )
{
    //header("Location: https://".constante::URL."/index.php");
}
//---------------------------------//

$push_cls = new push();

//----------CLASS CONFIG-----------//
$config = new configuration();
$cat_client     = $config->conf_annuaire_cat_client();
$groupe_user    = $config->conf_annuaire_groupe();
$catalogue      = $config->conf_catalogue();
$ent_activite   = $config->conf_entreprise_activite();
$ent_doc        = $config->conf_entreprise_doc();
$ent_gen        = $config->conf_entreprise_gen();

//----------CLASS ADMINISTRATION-----------//
$user_cls = new users();

if(isset($_SESSION['user']['connect']) && $_SESSION['user']['connect'] == 1)
{
    $info_user = $user_cls->info_user($_SESSION['user']['username']);
}











