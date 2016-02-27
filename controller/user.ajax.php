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
        $return = $connect;

        return json_encode($return);
    }else{
        $fonction->redirect("dashboard", "","", "info", "connector", "Changement du Statut !");
    }
}
?>
