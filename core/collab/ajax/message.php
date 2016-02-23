<?php
require "../../../app/classe.php";

$iduser = $_GET['iduser'];

$count = $DB->count("SELECT count(idinbox) FROM collab_inbox WHERE destinataire = :iduser AND lu = 0", array("iduser" => $iduser));
$t = array();
$t['count'] = $count;

json_encode($t);