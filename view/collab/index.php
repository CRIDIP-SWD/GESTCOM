<?php
session_start();
require "../../app/classe.php";
App\autoloader::register();

if(isset($_GET['view']))
{
    $view = $_GET['view'];
}else{
    $view = "start";
}

ob_start();

if($view === "index"){require "dashboard.php";}


$content = ob_get_clean();
require "default.php";