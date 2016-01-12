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

$app = new app();
$constante = new constante();
$fonction = new fonction();
$DB = new DB();
$date_format = new date_format();



//---------------------------------//

$gi = geoip_open($constante->getUrl(array(), false, true)."GeoIP.dat", GEOIP_STANDARD);





