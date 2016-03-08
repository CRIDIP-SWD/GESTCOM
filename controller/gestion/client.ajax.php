<?php
function is_ajax(){
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}
if(is_ajax()){
    if(isset($_GET['action']) && $_GET['action'] == 'supp-client')
    {
        session_start();
        require "../../application/classe.php";
        $idclient = $_GET['idclient'];

        $client_d = $DB->execute("DELETE FROM client WHERE idclient = :idclient", array("idclient" => $idclient));
        $user_d = $DB->execute("DELETE FROM users WHERE idclient = :idclient", array("idclient" => $idclient));

        if($client_d == 1 AND $user_d == 1){
            echo json_encode(1);
        }elseif($client_d == 1 AND $user_d == 0){
            echo json_encode(2);
        }elseif($client_d == 0 AND $user_d == 1){
            echo json_encode(3);
        }else{
            echo json_encode(4);
        }
    }
}