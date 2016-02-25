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
if($view === "error"){require "view/error.php";}
if($view === "collab"){header("Location: view/collab/index.php");}
if($view === "gestion"){header("Location: view/gestion/index.php");}
if($view === "compta"){header("Location: view/compta/index.php");}
if($view === "ovh"){header("Location: view/ovh/index.php");}
if($view === "prog"){header("Location: view/prog/index.php");}
if($view === "client"){header("Location: view/client/index.php");}


$content = ob_get_clean();
if($view === 'login'){
    require "view/login.php";
}else{
    require "view/default.php";
}
