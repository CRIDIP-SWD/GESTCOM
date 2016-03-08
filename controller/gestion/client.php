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

    $client_i = $DB->query("INSERT INTO client(idclient, nom_client, prenom_client, adresse_client, code_postal, ville_client, tel_client, mail_client, num_client) VALUES
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

    $users = $user_q[0];

    $username = $fonction->gen_username($nom_client, $prenom_client);
    $pass = $fonction->gen_password();
    $encrypt = new encrypt($username, $pass);
    $pass_crypt = $encrypt->encrypt();
    $idclient = $users->idclient;


    $user_client_insert = $DB->execute("INSERT INTO users(iduser, groupe, username, password, nom_user, prenom_user, connect, last_connect, poste_user, date_naissance, num_tel_poste, commentaire, totp, totp_token, idclient) VALUES
        (NULL, :groupe, :username, :password, :nom_user, :prenom_user, '0', '', 'Client', '', '', '', '0', '0', :idclient)", array(
        "groupe"        => 4,
        "username"      => $username,
        "password"      => $pass_crypt,
        "nom_user"      => $nom_client,
        "prenom_user"   => $prenom_client,
        "idclient"      => $idclient
    ));

    if($client_i == 1 AND $user_client_insert == 1){
        $fonction->redirect("client", "", "", "success", "add_user", "Le client <strong>$nom_client $prenom_client</strong> à bien été créer");
    }elseif($client_i == 1 AND $user_client_insert == 0){
        $fonction->redirect("client", "", "", "warning", "add_user", "Le client <strong>$nom_client $prenom_client</strong> à bien été créer mais son groupement de login/password n'à pas été définie !");
    }elseif($client_i == 0 AND $user_client_insert == 1){
        $fonction->redirect("client", "", "", "warning", "add_user", "Le client <strong>$nom_client $prenom_client</strong> n'à pas été créer mais sont groupement login/password à été définie !");
    }else{
        var_dump($client_i, $user_client_insert);
    }

}