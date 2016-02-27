<?php
session_start();
require dirname(__DIR__)."/../application/classe.php";
App\autoloader::register();

if(isset($_GET['view']))
{
    $view = $_GET['view'];
}else{
    $view = "dashboard";
}

ob_start();
if($view === 'dashboard'){require "dashboard.php";}

$content = ob_get_clean();
if($view === 'login'){
    require "../login.php";
}else{
    require "../default.php";
}


