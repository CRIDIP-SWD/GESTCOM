<?php
if(!isset($_POST['username']) || empty($_POST['username']) || !isset($_POST['password']) || empty($_POST['password']))
{

}else{
    require "../../app/classe.php";
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sha_pass = sha1($username."_".$password);

    $user = $DB->count("SELECT count(iduser) FROM users WHERE username = :username AND password = :password", array(
        "username"  => $username,
        "password"  => $password
    ));

    if($fonction->isAjax())
    {
        if($user[0] = 1)
        {
            var_dump($user);
            die();
        }else{
            echo "ERROR !!!";
        }
    }else{
        echo "Not Ajax embedded";
    }

}