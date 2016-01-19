<?php
session_start();
require "app/classe.php";
App\autoloader::register();

if(isset($_GET['view']))
{
    $view = $_GET['view'];
}else{
    $view = "home";
}

ob_start();

if($view === "home"){require "view/home.php";}

$content = ob_get_clean();
require "view/default.php";
