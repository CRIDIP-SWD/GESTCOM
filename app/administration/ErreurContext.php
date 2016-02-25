<?php
/**
 * Created by PhpStorm.
 * User: Maxime
 * Date: 25/02/2016
 * Time: 20:55
 */

namespace App\administration;


class ErreurContext extends \HttpResponse
{
    protected $errorCode = array(
        //collaborative
        "CODE" => array(
            "COLLAB001",
            "COLLAB002"
        ),
        "MESSAGE" => array(
            "Impossible de modifier l'utilisateur. Problème dans la base de donnée. Consulter les logs Serveur",
            "Impossible de Modifier le mot de passe. Problème base de donnée Execute. Consulter les logs Serveur"
        )
    );

    public function getError($errorCode, $type)
    {
        $errorMessage = array_search($errorCode, $this->errorCode);
        \HttpResponse::redirect(dirname(__DIR__)."index.php",array(
            "view" => "error",
            "code" => $errorCode,
            "msg"  => $errorMessage,
            "type" => $type
        ));
    }

}