<?php
function is_ajax(){
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}
if(is_ajax()){
    if(isset($_GET['action']) && $_GET['action'] == 'supp-event')
    {
        session_start();
        require "../application/classe.php";
        $iduser = $user->iduser;
        $idevent = $_GET['idevent'];

        $event_u = $DB->execute("DELETE FROM collab_event WHERE idevent = :idevent", array("idevent" => $idevent));

        if($event_u == 1)
        {
            echo json_encode(200);
        }else{
            echo json_encode(500);
        }
    }
    if(isset($_POST['action']) && $_POST['action'] == 'add-event')
    {
        session_start();
        require "../application/classe.php";
        $iduser = $_POST['iduser'];
        $titre_event = htmlentities(addslashes($_POST['titre_event']));
        $lieu_event = htmlentities(addslashes($_POST['lieu_event']));
        $desc_event = htmlentities(addslashes($_POST['desc_event']));
        $start_event = strtotime($_POST['start_event']);
        $end_event = strtotime($_POST['end_event']);

        if($iduser === 'all'){

        }else{
            $user_i = $DB->execute("INSERT INTO collab_event(idevent, iduser, titre_event, lieu_event, desc_event, start_event, end_event) VALUES (NULL, :iduser, :titre_event, :lieu_event, :desc_event, :start_event, :end_event)", array(
                "iduser"        => $iduser,
                "titre_event"   => $titre_event,
                "lieu_event"    => $lieu_event,
                "desc_event"    => $desc_event,
                "start_event"   => $start_event,
                "end_event"     => $end_event
            ));
            if($user_i == 1) {
                echo json_encode(200);
            }else{
                echo json_encode(500);
            }
        }
    }
}