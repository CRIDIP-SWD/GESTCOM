<?php
session_start();
require "application/classe.php";
App\autoloader::register();

if(isset($_GET['view']))
{
    $view = $_GET['view'];
}else{
    $view = "dashboard";
}

ob_start();
if($view === 'dashboard'){require "view/index.php";}
if($view === 'error'){require "view/error.php";}

$content = ob_get_clean();
if($view === 'login'){
    require "view/login.php";
}else{
    require "view/default.php";
}


