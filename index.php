<?php
session_start();
require "application/classe.php";
App\autoloader::register();

if(isset($_GET['view']))
{
    $view = $_GET['view'];
}else{
    $view = "index";
}

ob_start();
if($view === 'dashboard'){include "view/index.php";}

$content = ob_get_clean();
if($view === 'login'){
    require "view/login.php";
}else{
    require "view/default.php";
}


