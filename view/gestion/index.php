<?php
//session_start();
require "../../application/classe.php";

if(isset($_GET['view']))
{
    $view = $_GET['view'];
}else{
    $view = "dashboard";
}

ob_start();
if($view === 'error'){require "../error.php";}
if($view === 'notification'){require "../notification.php";}
if($view === 'profil'){require "../profil.php";}
if($view === 'calendar'){require "../calendar.php";}
if($view === 'mailbox'){require "../mailbox.php";}

if($view === 'test'){require "../test.php";}

if($view === 'dashboard'){require "dashboard.php";}

$content = ob_get_clean();
if($view === 'login'){
    require "../login.php";
}elseif($view === 'lockscreen'){
    require "../lockscreen.php";
}else{
    require "default.php";
}


