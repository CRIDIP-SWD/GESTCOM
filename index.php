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
if($view === "collab"){header("Location: view/collab/index.php");}


$content = ob_get_clean();
$router->get("/", require "view/start.php");
$router->get("/collab", header("Location: view/collab/index.php"));

if($view === 'login'){
    require "view/login.php";
}else{
    require "view/default.php";
}
