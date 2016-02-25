<?php
/**
 * Created by PhpStorm.
 * User: Maxime
 * Date: 25/02/2016
 * Time: 20:55
 */

namespace App\administration;


use App\DB;

class ErreurContext
{

    public function getError($errorCode, $type)
    {
        $DB = new DB();
        $query = $DB->query("SELECT * FROM error WHERE code = :code", array("code" => $errorCode));
        $msg = $query[0]->msg;
        header("Location: ../../index.php?view=error&code=$errorCode&msg=msg&type=$type");
    }

}