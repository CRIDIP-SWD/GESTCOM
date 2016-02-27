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
}
?>

