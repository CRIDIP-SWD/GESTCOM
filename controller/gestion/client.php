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
    <table cellspacing="0" cellpadding="0" width="600" class="w320" style="border-radius: 4px;overflow: hidden;">
        <tr>
            <td align="center" valign="top">
                <table cellspacing="0" cellpadding="0" class="force-full-width">
                    <tr>
                        <td class="bg bg1" style="background-color:#F1F2F5;">
                            <table cellspacing="0" cellpadding="0" class="force-full-width">
                                <tr>
                                    <td style="font-size:24px; font-weight: 600; color: #121212; text-align:center;" class="mobile-spacing">
                                        <div class="mobile-br">&nbsp;</div>
                                        <span319db5>Welcome to Themes Lab</span>
                                            <br>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size:17px; text-align:center; padding: 10px 75px 0; color:#6E6E6E;" class="w320 mobile-spacing mobile-padding">
                                        <span319db5>We are happy to meet you and hope you have an amazing time with us.</span><br><br>
                                    </td>
                                </tr>
                            </table>
                            <table cellspacing="0" cellpadding="0" width="100%" style="background-color:#F1F2F5">
                                <tr>
                                    <td>
                                        <img src="images/phone-mockup2.png" style="max-width:100%; display:block;">
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <table cellspacing="0" cellpadding="0" class="force-full-width">
                    <tr>
                        <td class="bg bg1" style="background-color:#F1F2F5;">
                            <center>
                                <table style="margin: 0 auto" cellpadding="0" cellspacing="0" class="force-width-80">
                                    <tr>
                                        <br><br>
                                        <td class="mobile-resize" style="color:#172838; font-size: 20px; font-weight: 600; text-align: left; vertical-align: top;">
                                            <span319db5>Activate your account now</span>
                                        </td>
                                    </tr>
                                </table>
                                <table style="margin: 0 auto;" cellspacing="0" cellpadding="0" class="force-width-80">
                                    <tr>
                                        <td style="text-align:left; color: #6f6f6f;">
                                            <br>
                                            <p319db5>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.<br>Sed do eiusmod tempor ullamco laboris.
                                                Quis nostrud exercitation nisi ut aliquip ex ea commodo!
                                                </p>
                                    </tr>
                                </table>
                            </center>
                            <table style="margin:0 auto;" cellspacing="0" cellpadding="10" width="100%">
                                <tr>
                                    <td style="text-align:center; margin:0 auto;">
                                        <br>
                                        <div>
                                            <!--[if mso]>
                                            <v:rect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="http://" style="height:45px;v-text-anchor:middle;width:240px;" stroke="f" fillcolor="#f5774e">
                                                <w:anchorlock/>
                                                <center>
                                            <![endif]-->
                                            <a class="btn" href="#"
                                               style="background-color:#172838;color:#ffffff;display:inline-block;font-family:'Source Sans Pro', Helvetica, Arial, sans-serif;font-size:18px;font-weight:400;line-height:45px;text-align:center;text-decoration:none;width:240px;-webkit-text-size-adjust:none;
                                    -webkit-border-radius:3px;-moz-border-radius:3px;border-radius:3px;">Confirm Email Address</a>
                                            <!--[if mso]>
                                            </center>
                                            </v:rect>
                                            <![endif]-->
                                        </div>
                                        <br>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
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