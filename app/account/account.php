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

    public function logoff($identifiant)
    {
       $data = $this->execute("UPDATE user SET statut = :statut WHERE identifiant = :identifiant", array(
           "statut"         => 0,
           "identifiant"    => $identifiant
       ));
        $error = "Impossible de ce déconnecter";
        if($data == 1)
        {
            session_start();
            session_unset();
            session_destroy();
            header("Location: ../../login.php");
        }else{
            header("Location: ../../index.php?view=home&error=critical&data=$error");
        }
    }

    public function lock($identifiant)
    {
        $data = $this->execute("UPDATE user SET statut = :statut WHERE identifiant = :identifiant", array(
            "statut"            => 1,
            "identifiant"       => $identifiant
        ));
        $error = "Impossible de Bloquer votre accès";
        if($data == 1)
        {
            session_start();
            $info_user = $this->info($identifiant);
            session_unset();
            header("Location: ../../lock.php?identifiant=$identifiant&email=$info_user[0]->email_support&");
        }else{
            header("Location: ../../index.php?view=home&error=critical&data=$error");
        }
    }
}