<?php
if(isset($_POST['action']) && $_POST['action'] == 'connexion')
{
    if(!isset($_POST['username']) && empty($_POST['username']) || !isset($_POST['password']) && empty($_POST['password']))
    {
        $text = "Au mois un des champs requis n'est pas compléter !";
        header("Location: ../../index.php?view=login&warning=connexion&text=$text");
    }else{
        require "../../app/classe.php";
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sha_pass = sha1($username."_".$password);

        $user_v = $DB->count("SELECT count(iduser) FROM users WHERE username = :username AND password = :password", array(
            "username" => $username,
            "password" => $sha_pass
        ));

        if($user_v[0] == 1)
        {
            session_start();
            $_SESSION['user']['connect'] = 1;
            $_SESSION['user']['username'] = $username;

            $user_q = $DB->query("SELECT * FROM users WHERE username = :username", array("username" => $_SESSION['user']['username']));

            $user_u = $DB->execute("UPDATE users SET connect = :connect, last_connect = :last_connect WHERE iduser = :iduser", array(
                "connect"       => 2,
                "last_connect"  => $date_format->date_jour_strt(),
                "iduser"        => $user_q[0]->iduser
            ));

            if($user_q[0]->groupe != 4){
                header("Location: ../../index.php?view=start");
            }else{
                header("Location: ../../view/client/index.php");
            }
        }elseif($user_v[0] == 0)
        {
            $text = "Vérifier vos identifiants !!!";
            header("Location: ../../index.php?view=login&error=connexion&text=$text");
        }else{
            $text = "Erreur Dans la base de donnée!<br>Veuillez contacter un administrateur !";
            $push_cls->post("pushed", $text);
            header("Location: ../../index.php?view=login&error=connexion&text=$text");
        }
    }
}