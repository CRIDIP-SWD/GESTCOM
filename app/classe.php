<?php
require dirname(__DIR__)."/app/autoloader.php";
\App\autoloader::register();

//Vendor Composer
require dirname(__DIR__)."/vendor/autoload.php";

use App\administration\configuration;
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
//---------------------------------//
$config = new configuration();
$cat_client = $config->conf_annuaire_cat_client();
$groupe_user = $config->conf_annuaire_groupe();

var_dump($cat_client, $groupe_user);
die("END");








