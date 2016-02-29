<?php
use App\general\constante;
use App\general\date;
use App\general\db;
use App\general\ErrorContext;
use App\general\fonction;
use App\general\ssh;
use App\general\users;


require dirname(__DIR__)."/application/autoloader.php";
\App\autoloader::register();

//VENDOR COMPOSER
//include dirname(__DIR__)."/vendor/autoload.php";


//NAMESPACE APP
$constante = new constante();
$date_format = new date();
$fonction = new fonction();
$DB = new db();
$ssh2 = new ssh();
$errorContext = new ErrorContext();

/*
 * APP\GENERAL
 */
if(isset($_SESSION['account']['active']) && $_SESSION['account']['active'] == 1)
{
    $user_cls = new users($_SESSION['account']['username']);
    $user = $user_cls->info_user();
}


//COMPOSER




