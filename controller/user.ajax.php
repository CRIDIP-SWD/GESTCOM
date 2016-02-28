<?php
function is_ajax(){
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}
if(is_ajax()){
    if(isset($_GET['action']) && $_GET['action'] == 'connector')
    {
        session_start();
        require "../application/classe.php";
        $connect = $_GET['connect'];
        $username = $user->username;

        $sql_update = $DB->execute("UPDATE users SET connect = :connect WHERE username = :username", array(
            "username"  => $username,
            "connect"   => $connect
        ));

        echo json_encode($connect, $sql_update);
    }
    if(isset($_GET['action']) && $_GET['action'] == 'check-message')
    {
        session_start();
        require "../application/classe.php";
        $username = $user->username;

        $nb_message = $DB->count("SELECT COUNT(idinbox) FROM collab_inbox WHERE destinataire = :destinataire AND lu = 0", array("destinataire" => $username));

        echo json_encode($nb_message);
    }
    if(isset($_GET['action']) && $_GET['action'] == 'check-notif')
    {
        session_start();
        require "../application/classe.php";
        $iduser = $user->iduser;

        $nb_notif = $DB->count("SELECT COUNT(idnotif) FROM notif WHERE iduser = :iduser AND vu = 0", array("iduser" => $iduser));

        echo json_encode($nb_notif);
    }
    if(isset($_POST['action']) && $_POST['action'] == 'deverrouille')
    {
        session_start();
        require "../application/classe.php";
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sha_pass = sha1($username."_".$password);

        $user_qu = $DB->count("SELECT COUNT(iduser) FROM users WHERE username = :username AND password = :sha_pass", array(
            "username"      => $username,
            "sha_pass"      => $sha_pass
        ));

        if($user_qu == 1){
            echo json_encode($user_qu);
        }else{
            echo json_encode($user_qu);
        }
    }
}
?>

