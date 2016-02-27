<?php
if(isset($_GET['action']) && $_GET['action'] == 'connector')
{
    session_start();
    require "../application/classe.php";
    $connect = $_GET['connect'];
    $username = $user->username;

    var_dump($connect, $username);
    die();
}
