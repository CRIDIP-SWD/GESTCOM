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
    if(isset($_POST['action']) && $_POST['action'] == 'add_courrier')
    {
        session_start();
        require "../../application/classe.php";
        $idclient = $_POST['idclient'];
        $iduser = $_POST['iduser'];
        $sujet = htmlentities(addslashes($_POST['sujet']));
        $message = htmlentities(addslashes($_POST['message']));
        $date_message = strtotime(date("d-m-Y h:i:s"));

        $courrier_i = $DB->execute("INSERT INTO client_communication(idclientmessage, idclient, objet, message, iduser, date_expedition) VALUES (NULL, :idclient, :objet, :message, :iduser, :date_expedition)", array(
            "idclient"          => $idclient,
            "objet"             => $sujet,
            "message"           => $message,
            "iduser"            => $iduser,
            "date_expedition"   => $date_message
        ));

        if($courrier_i == 1){
            $courrier = $DB->query("SELECT * FROM clientf_communication, users WHERE client_communication.iduser = users.iduser ORDER BY idclientmessage DESC LIMIT 1");
            ?>
            <tr>
                <td><?= html_entity_decode($sujet); ?></td>
                <td><?= $courrier[0]->nom_user; ?> <?= $courrier[0]->prenom_user; ?></td>
                <td><?= $date_format->formatage("d-m-Y à H:i:s", $date_message); ?></td>
                <td>
                    <a href="controller/gestion/client.ajax.php?action=supp-comm&idclientmessage=<?= $courrier[0]->idclientmessage; ?>" class="btn btn-icon bg-red"><i class="icon-trash"></i></a>
                </td>
            </tr>
            <?php
        }else{
            header("500 Internal Server Error", true, "500");
            die("Erreur SQL déclarer !!");
        }
    }
}