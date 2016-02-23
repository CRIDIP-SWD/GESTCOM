<?php
/**
 * Created by PhpStorm.
 * User: Maxime
 * Date: 13/02/2016
 * Time: 03:30
 */

namespace App\api;



class push
{
    private $endpoint = "https://api.pushbullet.com/v2/";
    private $keyapp = "o.OL3bueBjvRCNFz0RZWPBrPQbeLogO733";


    public function get($method)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_HTTPHEADER => array(
                "Content-Type:application/json",
                "Access-Token:".$this->keyapp
            ),
            CURLOPT_URL => $this->endpoint.$method
        ));
        $result = curl_exec($curl);
        return json_decode($result);
    }

    public function post($method, $text)
    {
        $postfield = array(
            "type" => 'note',
            "title" => "ERREUR BLUEJET SYSTEM CRIDIP",
            "body"  => $text."Veuillez consulter les log serveur pour le logiciel de gestion"
        );
        $postfield = json_encode($postfield);
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_HTTPHEADER => array(
                "Content-Type:application/json",
                "Access-Token:".$this->keyapp,
                "request POST "."\""
            ),
            CURLOPT_URL => $this->endpoint.$method,
            CURLOPT_POST => 1,
            CURLOPT_POSTFIELDS => $postfield
        ));
        $result = curl_exec($curl);
        return json_decode($result);
    }
}