<?php
require dirname(__DIR__)."/app/autoloader.php";
\App\autoloader::register();

//Vendor Composer
require dirname(__DIR__)."/vendor/autoload.php";

use App\app;
use App\constante;
use App\date_format;
use App\DB;
use App\fonction;
use \Ovh\Api;

$ak = "nhAYhfWMnOobopN1";
$as = "quLnpFyrJO6fiOhBgsKMeHCAhr6Krdji";
$endpoint = "https://eu.api.ovh.com/";
$ck = "Vtc5O30QOJtL5MoJK2iXjRCfxnXU5yLU";
$ovh = new Api($ak, $as, $endpoint, $ck);
//-------------------------------------//
$app = new app();
$constante = new constante();
$fonction = new fonction();
$DB = new DB();
$date_format = new date_format();









