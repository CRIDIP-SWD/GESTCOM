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
if($view === "profil"){require "profil.php";}
if($view === "calendar"){require "calendar.php";}
if($view === "inbox"){require "inbox.php";}
if($view === "task"){require "task.php";}
if($view === "exchange"){require "exchange.php";}


$content = ob_get_clean();
require "default.php";