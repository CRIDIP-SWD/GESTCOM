<?php
/**
 * Created by PhpStorm.
 * User: SWD
 * Date: 23/02/2016
 * Time: 12:20
 */

namespace App\administration;


use App\DB;

class users extends DB
{

    public function info_user($username)
    {
        return $this->query("SELECT * FROM users WHERE username = :username", array("username" => $username));
    }
}