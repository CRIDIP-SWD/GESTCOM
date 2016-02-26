<?php
use App\app;
use App\constante;
use App\date_format;
use App\DB;
use App\fonction;
use App\ssh2;


require dirname(__DIR__)."/application/autoloader.php";
\App\autoloader::register();

//VENDOR COMPOSER
//include dirname(__DIR__)."/vendor/autoload.php";


//NAMESPACE APP
$app = new app();
$constante = new constante();
$date_format = new date_format();
$fonction = new fonction();
$DB = new DB();
$ssh2 = new ssh2();


//COMPOSER




