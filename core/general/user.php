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
        "password"  => $sha_pass
    ));

    $t = array();
    $t['error'] = "Formulaire Incorrect";

    if($fonction->isAjax())
    {
        if($user[0] == 1)
        {
            session_start();
            $user_db = $DB->query("SELECT * FROM users WHERE username = :username", array("username" => $username));
            $_SESSION['user']['connect'] = 1;
            $_SESSION['user']['username'] = $username;
            $t['error'] = "no";

            switch($user_db[0]->groupe)
            {
                case 1:
                    $t['retour'] = "../../index.php?view=start";
                    break;
                case 2:
                    $t['retour'] = "../../index.php?view=start";
                    break;
                case 3:
                    $t['retour'] = "../../index.php?view=start";
                    break;
                case 4:
                    $t['retour'] = "../../view/client/index.php";
                    break;
            }

        }else{
            $t['errorLoginPass'] = "Connexion Echoué: Mauvais utilisateur ou mot de passe !!";
        }
    }else{
        $t['errorChamps'] = "Veuillez saisir tout les champs requis !";
    }
    echo json_encode($t);

}