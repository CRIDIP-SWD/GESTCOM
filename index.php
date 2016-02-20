<?php
session_start();
require "app/classe.php";
App\autoloader::register();

if(isset($_GET['view']))
{
    $view = $_GET['view'];
}else{
    $view = "start";
}

ob_start();

if($view === "start"){require "view/start.php";}

$content = ob_get_clean();
require "view/default.php";
