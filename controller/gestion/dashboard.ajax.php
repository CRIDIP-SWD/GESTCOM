<?php
function is_ajax(){
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}
if(is_ajax()){
    if(isset($_GET['action']) && $_GET['action'] == 'count_client')
    {
        session_start();
        require "../../application/classe.php";

        $count_c = $DB->count("SELECT COUNT(idclient) FROM client");

        echo json_encode($count_c);
    }
}