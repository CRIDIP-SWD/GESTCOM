<?php
if(isset($_POST['action']) && $_POST['action'] == 'connexion')
{
    require "../app/classe.php";
    if((isset($_POST['email']) && !empty($_POST['email'])) && (isset($_POST['password']) && !empty($_POST['password'])))
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
            $client = $DB->query("SELECT * FROM user WHERE identifiant = :identifiant", array(
                "identifiant" => $identifiant
            ));
            $_SESSION['identifiant'] = $identifiant;
            $heure_connexion = strtotime(date("H:i:s"));
            $ip_connexion = $_SERVER['REMOTE_ADDR'];
            $emplacement = geoip_country_name_by_addr($gi, $ip_connexion);

        }
    }
}