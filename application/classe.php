<?php
use App\general\constante;
use App\general\date;
use App\general\db;
use App\general\ErrorContext;
use App\general\fonction;
use App\general\insert;
use App\general\ssh;
use App\general\users;
use App\gestion\client;


require dirname(__DIR__)."/application/autoloader.php";
\App\autoloader::register();

//VENDOR COMPOSER
include dirname(__DIR__)."/vendor/autoload.php";


//NAMESPACE APP
$constante = new constante();
$date_format = new date();
$fonction = new fonction();
$DB = new db();
$ssh2 = new ssh();
$errorContext = new ErrorContext();
$insert = new insert();

/*
 * APP\GENERAL
 */
if(isset($_SESSION['account']['active']) && $_SESSION['account']['active'] == 1)
{
    $user_cls = new users($_SESSION['account']['username']);
    $user = $user_cls->info_user();
}

/*
 * APP GESTION
 */

$client_cls = new client();

//COMPOSER


/*
 * TEST UNITAIRE
 */

$total_reglement = $client_cls->total_reglement(28);
var_dump($total_reglement);
echo number_format($total_reglement->total_reglement, 2, ",", " ")." €";
die();



