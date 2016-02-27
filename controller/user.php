<?php
if(isset($_POST['action']) && $_POST['action'] == 'login')
{
    require "../application/classe.php";


    if(isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sha_pass = sha1($username."_".$password);

        $user_co = $DB->count("SELECT COUNT(iduser) FROM userss WHERE username = :username AND password = :password", array(
            "username" => $username,
            "password" => $sha_pass
        ));

        var_dump($user_co);
        die();

        if($user_co == 1){
            session_start();
            $_SESSION['account']['active'] = 1;
            $_SESSION['account']['username'] = $username;

            $user_u = $DB->execute("UPDATE users SET connect = 2, last_connect = :last_connect WHERE username = :username", array(
                "username"      => $username,
                "last_connect"  => $date_format->format_strt(date("d-m-Y H:i:s"))
            ));

            if($user_u == 1){
                $fonction->redirect("dashboard", "", "","", "","");
            }
        }elseif($user_co == 0){
            $text = "Aucun couple Nom d'utilisateur / Mot de Passe correspondant.";
            $fonction->redirect("login", "","","error", "login", $text);
        }else{
            $fonction->redirect("error", "","","code", "USR1", "");
        }
    }else{
        $text = "Au moins un des champs requis n'est pas remplie !";
        $fonction->redirect("login", "", "", "warning", "login", $text);
    }
}