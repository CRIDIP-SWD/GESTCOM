<?php
session_start();
require "application/classe.php";

if(isset($_GET['view']))
{
    $view = $_GET['view'];
}else{
    $view = "dashboard";
}

ob_start();
if($view === 'dashboard'){require "view/index.php";}
if($view === 'error'){require "view/error.php";}
if($view === 'notification'){require "view/notification.php";}

if($view === 'collab'){require "view/collab/index.php";}

$content = ob_get_clean();
if($view === 'login'){
    require "view/login.php";
}elseif($view === 'lockscreen'){
    require "view/lockscreen.php";
}else{
    require "view/default.php";
}


