<?php
session_start();
require dirname(__DIR__)."../application/classe.php";

if(isset($_GET['view']))
{
    $view = $_GET['view'];
}else{
    $view = "dashboard";
}

ob_start();

if($view === 'dashboard'){require "dashboard.php";}

$content = ob_get_contents();
if($view === 'login')
{
    require "../login.php";
}else{
    require "../default.php";
}