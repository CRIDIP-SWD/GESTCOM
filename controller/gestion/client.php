<?php
use App\noctus\encrypt;

if(isset($_POST['action']) && $_POST['action'] == 'add_client')
{
    session_start();
    require "../../application/classe.php";
    $iduser = $user->iduser;

    $nom_client = htmlentities(addslashes($_POST['nom_client']));
    $prenom_client = htmlentities(addslashes($_POST['prenom_client']));
    $adresse_client = htmlentities(addslashes($_POST['adresse_client']));
    $code_postal = $_POST['code_postal'];
    $ville_client = htmlentities(addslashes($_POST['ville_client']));
    $tel_client = substr($_POST['tel_client'], 5);
    $mail_client = $_POST['mail_client'];
    $num_client = "CLS".rand(1000000,9999999);

    $client_i = $DB->execute("INSERT INTO client(idclient, nom_client, prenom_client, adresse_client, code_postal, ville_client, tel_client, mail_client, num_client) VALUES
                            (NULL, :nom_client, :prenom_client, :adresse_client, :code_postal, :ville_client, :tel_client, :mail_client, :num_client)", array(
        "nom_client"    => $nom_client,
        "prenom_client" => $prenom_client,
        "adresse_client"=> $adresse_client,
        "code_postal"   => $code_postal,
        "ville_client"  => $ville_client,
        "tel_client"    => $tel_client,
        "mail_client"   => $mail_client,
        "num_client"    => $num_client
    ));

    $user_q = $DB->query("SELECT * FROM client WHERE num_client = :num_client", array("num_client" => $num_client));

    $username = $fonction->gen_username($nom_client, $prenom_client);
    $pass = $fonction->gen_password();
    $encrypt = new encrypt($username, $pass);
    $pass_crypt = $encrypt->encrypt();
    $idclient = $user_q[0]->idclient;


    $user_client_insert = $DB->execute("INSERT INTO users(iduser, groupe, username, password, nom_user, prenom_user, connect, last_connect, poste_user, date_naissance, num_tel_poste, commentaire, totp, totp_token, idclient) VALUES
        (NULL, :groupe, :username, :password, :nom_user, :prenom_user, '0', '', 'Client', '', '', '', '0', NULL, :idclient)", array(
        "groupe"        => 4,
        "username"      => $username,
        "password"      => $pass_crypt,
        "nom_user"      => $nom_client,
        "prenom_user"   => $prenom_client,
        "idclient"      => $idclient
    ));

    // ENVOIE MAIL
    $to = $mail_client;
    $sujet = "Création de votre Espace - CRIDIP";

    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
    $headers .= 'From: CRIDIP <contact@cridip.com>' . "\r\n";

    ob_start();
    ?>
    <!doctype html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
    </head>
    <body style="background-color: #1c94c4; color: #fff;">
        <div style="text-align: center; font-size: 25px;">SAS CRIDIP</div>
        <div style="text-align: center; font-size: 18px; padding-bottom: 25px;">Votre Espace à été créer !</div>
        <div style="">
            Bonjour,<br>
            Voici vos identifiant de connexion à l'espace GESTCOM - CRIDIP:<br><br>
            <strong>Login:</strong> <?= $username; ?><br>
            <strong>Mot de Passe:</strong> <?= $pass; ?>
        </div>
        <div style="text-align: center; padding-top: 100px;">
            <a href="" style="background-color:#172838;color:#ffffff;display:inline-block;font-family:'Source Sans Pro', Helvetica, Arial, sans-serif;font-size:18px;font-weight:400;line-height:45px;text-align:center;text-decoration:none;width:240px;-webkit-text-size-adjust:none;
                                    -webkit-border-radius:3px;-moz-border-radius:3px;border-radius:3px;">Votre Compte</a>
        </div>
    </body>
    </html>

    <?php

    $message = ob_get_clean();
    $mail = mail($to, $sujet, $message, $headers);

    if($client_i == 1 AND $user_client_insert == 1){
        $text = "Le client à été créer avec succès !";
        header("Location: ../../view/gestion/index.php?view=client&sub=view&num_client=$num_client&success=add_client&text=$text");
    }elseif($client_i == 1 AND $user_client_insert == 0){
        $text = "Le client <strong>$nom_client $prenom_client</strong> à bien été créer mais son groupement de login/password n'à pas été définie !";
        header("Location: ../../view/gestion/index.php?view=client&sub=view&num_client=$num_client&warning=add_client&text=$text");
    }elseif($client_i == 0 AND $user_client_insert == 1){
        $text = "Le client <strong>$nom_client $prenom_client</strong> n'à pas été créer mais sont groupement login/password à été définie !";
        header("Location: ../../view/gestion/index.php?view=client&sub=view&num_client=$num_client&warning=add_client&text=$text");
    }else{
        var_dump($client_i, $user_client_insert);
    }

}