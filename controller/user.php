<?php
if(isset($_POST['action']) && $_POST['action'] == 'login')
{
    require "../application/classe.php";


    if(isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $encrypt = new \App\noctus\encrypt($username, $password);
        $pass_en = $encrypt->encrypt();
        $decrypt = new \App\noctus\decrypt($pass_en, $username, $password);
        $pass_de = $decrypt->decrypt();

        $user_co = $DB->count("SELECT COUNT(iduser) FROM users WHERE username = :username AND password = :password", array(
            "username" => $username,
            "password" => $pass_de
        ));


        if($user_co == 1){
            session_start();
            $_SESSION['account']['active'] = 1;
            $_SESSION['account']['username'] = $username;

            $user_u = $DB->execute("UPDATE users SET connect = 2, last_connect = :last_connect WHERE username = :username", array(
                "username"      => $username,
                "last_connect"  => $date_format->format_strt(date("d-m-Y H:i:s"))
            ));

            if($user_u == 1){
                $fonction->redirect("dashboard");
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
if(isset($_GET['action']) && $_GET['action'] == 'lock')
{
    session_start();
    require "../application/classe.php";
    $iduser = $user->iduser;

    $user_u = $DB->execute("UPDATE users SET connect = 1 WHERE iduser = :iduser", array("iduser" => $iduser));
    $_SESSION['account']['connect'] = 0;

    $_SESSION['account']['away']['username'] = $user->username;
    $_SESSION['account']['away']['prenom_user'] = $user->prenom_user;

    if($user_u == 1){
        $fonction->redirect("lockscreen");
    }else{
        $fonction->redirect("error", "", "", "code", "USR2", "");
    }


}
if(isset($_POST['action']) && $_POST['action'] == 'deverrouille')
{
    session_start();
    require "../application/classe.php";
    $username = $_POST['username'];
    $password = $_POST['password'];
    $encrypt = new \App\noctus\encrypt($username, $password);
    $pass_en = $encrypt->encrypt();
    $decrypt = new \App\noctus\decrypt($pass_en, $username, $password);
    $pass_de = $decrypt->decrypt();

    var_dump($pass_en, $pass_de);
    die();


    $user_co = $DB->count("SELECT COUNT(iduser) FROM users WHERE username = :username AND password = :password", array(
        "username" => $username,
        "password" => $pass_de
    ));

    if($user_co == 1)
    {
        $_SESSION['account']['connect'] = 1;
        $_SESSION['account']['away']['username'] = $user->username;
        $user_u = $DB->execute("UPDATE users SET connect = 2, last_connect = :last_connect WHERE username = :username", array(
            "username"      => $username,
            "last_connect"  => $date_format->format_strt(date("d-m-Y H:i:s"))
        ));
        if($user_u == 1){
            $fonction->redirect("dashboard");
        }

    }elseif($user_co == 0){
        $text = "Aucun couple Nom d'utilisateur / Mot de Passe correspondant.";
        $fonction->redirect("lockscreen", "","","error", "deverouille", $text);
    }else{
        $fonction->redirect("error", "","","code", "USR3", "");
    }

}