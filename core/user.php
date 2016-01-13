<?php
if(isset($_POST['action']) && $_POST['action'] == 'connexion')
{
    require "../app/classe.php";
    if((isset($_POST['identifiant']) && !empty($_POST['identifiant'])) && (isset($_POST['password']) && !empty($_POST['password'])))
    {
        $identifiant = $_POST['identifiant'];
        $password = $_POST['password'];
        $pass_crypt = sha1($identifiant."_".$password);

        $data = $DB->count("SELECT count(*) FROM user WHERE identifiant = :identifiant AND password = :password", array(
            "identifiant" => $identifiant,
            "password"    => $pass_crypt
        ));

        if($data[0] == 1)
        {
            session_start();
            $user = $DB->query("SELECT * FROM user WHERE identifiant = :identifiant", array(
                "identifiant" => $identifiant
            ));
            $_SESSION['identifiant'] = $identifiant;
            $heure_connexion = strtotime(date("H:i:s"));
            $ip_connexion = $_SERVER['REMOTE_ADDR'];
            $emplacement = $show_ip->country;
            $navigateur = $fonction->getNav();
            $os = $fonction->getOs();

            $user = $DB->execute("INSERT INTO connect_histo(id, identite, heure_connexion, ip_connexion, emplacement, navigateur, os, statut) VALUES (:id, :identite, :heure_connexion, :ip_connexion, :emplacement, :navigateur, :os, :statut)", array(
                "id"                => NULL,
                "identite"          => $user[0]->nom_user." ".$user[0]->prenom_user,
                "heure_connexion"   => $heure_connexion,
                "ip_connexion"      => $ip_connexion,
                "emplacement"       => $emplacement,
                "navigateur"        => $navigateur,
                "os"                => $os,
                "statut"            => 1
            ));


            if($user == 1)
            {
                $update = $DB->execute("UPDATE user SET statut = :statut WHERE iduser = :iduser", array(
                   "statut" => 2,
                   "iduser" => $user[0]->iduser
                ));
                header("Location: ../index.php?view=home");
            }else{
                header("Location: ../login.php?error=critical&data='Erreur de mise à jour'");
            }

        }elseif($data[0] == 0)
        {
            $heure_connexion = strtotime(date("H:i:s"));
            $ip_connexion = $_SERVER['REMOTE_ADDR'];
            $emplacement = $show_ip->country;
            $navigateur = $fonction->getNav();
            $os = $fonction->getOs();
            $user = $DB->execute("INSERT INTO connect_histo(id, identite, heure_connexion, ip_connexion, emplacement, navigateur, os, statut) VALUES (:id, :identite, :heure_connexion, :ip_connexion, :emplacement, :navigateur, :os, :statut)", array(
                "id"                => NULL,
                "identite"          => $identifiant,
                "heure_connexion"   => $heure_connexion,
                "ip_connexion"      => $ip_connexion,
                "emplacement"       => $emplacement,
                "navigateur"        => $navigateur,
                "os"                => $os,
                "statut"            => 0
            ));
            header("Location: ../login.php?warning=no-compte");
        }else{
            $heure_connexion = strtotime(date("H:i:s"));
            $ip_connexion = $_SERVER['REMOTE_ADDR'];
            $emplacement = $show_ip->country;
            $navigateur = $fonction->getNav();
            $os = $fonction->getOs();
            $user = $DB->execute("INSERT INTO connect_histo(id, identite, heure_connexion, ip_connexion, emplacement, navigateur, os, statut) VALUES (:id, :identite, :heure_connexion, :ip_connexion, :emplacement, :navigateur, :os, :statut)", array(
                "id"                => NULL,
                "identite"          => $identifiant,
                "heure_connexion"   => $heure_connexion,
                "ip_connexion"      => $ip_connexion,
                "emplacement"       => $emplacement,
                "navigateur"        => $navigateur,
                "os"                => $os,
                "statut"            => 0
            ));
            header("Location: ../login.php?error=critical&data='Erreur dans la base de donnee'");
        }
    }else{

        header("Location: ../login.php?warning=champs");
    }
}
if(isset($_GET['action']) && $_GET['action'] == 'logoff')
{
    require "../app/classe.php";
    $identifiant = $_GET['identifiant'];

    $update = $DB->execute("UPDATE user SET statut = :statut WHERE identifiant = :identifiant", array(
        "statut"      => 0,
        "identifiant" => $identifiant
    ));
    $error = "Impossible de ce déconnecter car le serveur de base de donnée n'à pas pus identifier l'utilisateur.";
    if($update[0] == 1)
    {
        session_start();
        session_unset();
        session_destroy();
        header("Location: ../../login.php?success=disconnect");
    }else{
        header("Location: ../../index.php?view=home&error=critical&data=$error");
    }
}