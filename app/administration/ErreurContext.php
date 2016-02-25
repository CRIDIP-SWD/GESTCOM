<?php
/**
 * Created by PhpStorm.
 * User: Maxime
 * Date: 25/02/2016
 * Time: 20:55
 */

namespace App\administration;


class ErreurContext extends ErreurCode
{

    public function getError($errorCode, $type)
    {
        array_search($errorCode, $this->errorCode);
        return $this->errorCode->$errorCode;
    }

}