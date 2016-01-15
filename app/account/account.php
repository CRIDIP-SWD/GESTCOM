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
        $date_jour = strtotime(date("d-m-Y"));
        $data = $this->count("SELECT count(*) FROM user_calendar WHERE  iduser = :iduser AND date_debut = :date_debut", array(
            "iduser" => $iduser,
            "date_debut" => $date_jour
        ));
        return $data;
    }
}