<?php
/**
 * Created by PhpStorm.
 * User: SWD
 * Date: 10/03/2016
 * Time: 14:47
 */

namespace App\gestion;


use App\general\db;

class client
{
    public function total_facture($idclient)
    {
        $DB = new db();

        $sm = $DB->query("SELECT SUM(total_facture) FROM facture WHERE idclient = :idclient", array("idclient" => $idclient));

        return $sm[0];
    }
}