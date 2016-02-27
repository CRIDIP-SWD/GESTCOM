<?php
if(isset($_GET['action']) && $_GET['action'] == 'connector')
{
    session_start();
    require "../application/classe.php";
    $connect = $_GET['connect'];
    $username = $user->username;

    $user_u = $DB->execute("UPDATE users SET connect = :connect WHERE username = :username", array(
        "connect"   => $connect,
        "username"  => $username
    ));
    if($fonction->is_ajax()){
        $json_get = array(
            "connect" => $connect
        );

        return json_encode($json_get);
    }else{
        $fonction->redirect("dashboard", "","", "info", "connector", "Changement du Statut !");
    }
}
?>
