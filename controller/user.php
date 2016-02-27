<?php
if(isset($_POST['action']) && $_POST['action'] == 'login')
{
    require "../application/classe.php";
    $username = $_GET['username'];
    $password = $_GET['password'];

    if(!isset($username) || empty($username) && !isset($password) || empty($password)){
        $text = "Au moins un des champs requis n'est pas remplie !";
        $fonction->redirect("login", "", "", "warning", "login", "$text");
    }else{
        $user_co = $DB->count("SELECT COUNT(iduser) FROM users WHERE username = :username", array("username" => $username));

        var_dump($user_co);
    }
}