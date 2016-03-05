<?php
function is_ajax(){
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}
if(is_ajax()){
    if(isset($_GET['action']) && $_GET['action'] == 'count_new_mail')
    {
        session_start();
        require "../application/classe.php";
        $iduser = $user->iduser;

        $user_q = $DB->count("SELECT COUNT(idinbox) FROM collab_inbox WHERE destinataire = :iduser AND lu = 0", array("iduser" => $iduser));

        echo json_encode($user_q);
    }
}