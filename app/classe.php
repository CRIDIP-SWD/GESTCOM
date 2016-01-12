<?php
require dirname(__DIR__)."/app/autoloader.php";
\App\autoloader::register();

//Vendor Composer
require dirname(__DIR__)."/vendor/autoload.php";

use App\app;
use \Ovh\Api;

$ak = "nhAYhfWMnOobopN1";
$as = "quLnpFyrJO6fiOhBgsKMeHCAhr6Krdji";
$endpoint = "https://eu.api.ovh.com/";
$ck = "Vtc5O30QOJtL5MoJK2iXjRCfxnXU5yLU";
$ovh = new Api($ak, $as, $endpoint, $ck);
var_dump($ovh->get("/me"));

$app = new app();




