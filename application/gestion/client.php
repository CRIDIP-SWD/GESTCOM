<?php
/**
 * Created by PhpStorm.
 * User: SWD
 * Date: 10/03/2016
 * Time: 14:47
 */

namespace App\gestion;


use App\general\db;
use App\general\fonction;

class client
{
    public function total_facture($idclient)
    {
        $DB = new db();
        $fonction = new fonction();

        return $fonction->number_decimal($DB->query("SELECT SUM(total_facture) FROM facture WHERE idclient = :idclient", array("idclient" => $idclient)));
    }
}