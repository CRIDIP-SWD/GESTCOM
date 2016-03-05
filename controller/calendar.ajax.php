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
            if($user_i == 1){
                $event = $DB->query("SELECT * FROM collab_event ORDER BY idevent DESC LIMIT 1");
            ?>
                <tr class="<?php if($event[0]->start_event < time() AND $event[0]->end_event < time()){echo 'danger';} ?> <?php if($event[0]->start_event <= time()-900){echo 'info';} ?>">
                    <td class=""><?= $date_format->formatage("H:i", $event[0]->start_event); ?> / <?= $date_format->formatage("H:i", $event[0]->end_event); ?></td>
                    <td class=""><?= html_entity_decode($event[0]->titre_event); ?></td>
                    <td class="">
                        <a class="btn btn-sm btn-rounded btn-danger" href="controller/calendar.ajax.php?action=supp-event&idevent=<?= $event[0]->idevent; ?>"><i class="fa fa-trash-o"></i></a>
                    </td>
                </tr>
            <?php
            }
        }
    }
}