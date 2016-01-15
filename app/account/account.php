<?php
/**
 * Created by PhpStorm.
 * User: SWD
 * Date: 12/01/2016
 * Time: 17:12
 */

namespace App\account;


use App\DB;

class account extends DB
{
    public function info($identifiant)
    {
        return $data = $this->query("SELECT * FROM user WHERE identifiant = :identifiant", array(
            "identifiant"   => $identifiant
        ));
    }

    //COUNT ELEMENT
    public function count_event_day($iduser)
    {
        $date_debut = strtotime(date("d-m-Y 00:00:00"));
        $date_fin = strtotime(date("d-m-Y 23:59:59"));
        $data = $this->count("SELECT count(*) FROM user_calendar WHERE  iduser = :iduser AND date_debut >= :date_debut AND user_calendar.date_fin <= :date_fin", array(
            "iduser" => $iduser,
            "date_debut" => $date_debut,
            "date_fin" => $date_fin
        ));
        return $data;
    }

    public function count_message_nonlu($iduser)
    {
        $data = $this->count("SELECT COUNT(*) FROM user_inbox WHERE destinataire = :iduser AND lu = :lu", array(
            "iduser" => $iduser,
            "lu" => 0
        ));
        return $data;
    }

    public function count_message($iduser)
    {
        $data = $this->count("SELECT COUNT(*) FROM user_inbox WHERE destinataire = :iduser", array(
            "iduser" => $iduser
        ));
        return $data;
    }
}