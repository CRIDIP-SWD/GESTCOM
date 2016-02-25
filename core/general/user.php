<?php
/*
 * INTERFACE GENERAL
 */
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
if(isset($_GET['action']) && $_GET['action'] == 'logout')
{
    session_start();
    require "../../app/classe.php";
    $iduser = $_GET['iduser'];

    $user_u = $DB->execute("UPDATE users SET connect = :connect WHERE iduser = :iduser", array(
        "connect"   => 0,
        "iduser"    => $iduser
    ));

    if($user_u == 1)
    {
        session_unset();
        session_destroy();
        $text = "Vous avez été déconnecter du service.";
        header("Location: ../../index.php?view=login&error=login&text=$text");
    }else{
        $text = "Impossible de vous déconnecter";
        header("Location: ../../index.php?view=start&error=logout&text=$text");
    }
}

/*
 * INTERFACE COLLABORATIVE
 */

if(isset($_POST['action']) && $_POST['action'] == 'edit-profil')
{
    require "../../app/classe.php";
    $iduser = $_POST['iduser'];
    $nom_user = $_POST['nom_user'];
    $prenom_user = $_POST['prenom_user'];

    $user_u = $DB->execute("UPDATE users SET nom_user = :nom_user, prenom_user = :prenom_user WHERE iduser = :iduser", array(
        "iduser"        => $iduser,
        "nom_user"      => $nom_user,
        "prenom_user"   => $prenom_user
    ));

    if($user_u == 1)
    {
        $text = "L'utilisateur <strong>".$nom_user." ".$prenom_user." </strong> à bien été modifier !";
        header("Location: ../../view/collab/index.php?view=profil&success=edit-profil&text=$text");
    }else{
        $text = "Une erreur à eu lieu lors de la modification de l'utilisateur!<br>Veuillez contacter l'administrateur";
        $push_cls->post("pushes", $text);
        header("Location: ../../view/collab/index.php?view=profil&error=edit-profil&text=$text");
    }
}
if(isset($_POST['action']) && $_POST['action'] == 'edit-password')
{
    require "../../app/classe.php";
    $iduser = $_POST['iduser'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $new_pass = $_POST['new_pass'];
    $confirm_new_pass = $_POST['confirm_new_pass'];

    $sha_pass = sha1($username."_".$password);
    $new_sha_pass = sha1($username."_".$new_pass);

    if($new_pass != $confirm_new_pass){
        $text = "Les mot de Passe ne corresponde pas !";
        header("Location: ../../view/collab/index.php?view=profil&warning=edit-password&text=$text");
    }

    $user_q = $DB->query("SELECT * FROM users WHERE iduser = :iduser", array("iduser" => $iduser));

    if($user_q[0]->password == $sha_pass){
        if($new_pass == $confirm_new_pass){
            $text = "Le nouveau mot de passe est pareille que l'ancien.<br>Veuillez entrez un mot de passe Valide";
            header("Location: ../../view/collab/index.php?view=profil&warning=edit-password&text=$text");
        }
    }

    $user_u = $DB->execute("UPDATE userss SET password = :password WHERE iduser = :iduser", array(
        "iduser"    => $iduser,
        "password"  => $new_sha_pass
    ));

    if($user_u == 1)
    {
        session_start();
        session_unset();
        session_destroy();
        $text = "Votre mot de Passe à été modifier<br>Veuillez vous reconnecter.";
        header("Location ../../index.php?view=login&success=edit-password&text=$text");
    }else{
        var_dump($error->getError("COLLAB002", "Warning"));
        die();
    }






}