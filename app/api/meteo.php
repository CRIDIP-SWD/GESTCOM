<?php

/**
 * Created by PhpStorm.
 * User: SWD
 * Date: 20/01/2016
 * Time: 11:46
 */
class meteo
{
    private $key         = "2de143494c0b295cca9337e1e96b00e0";
    private $zip         = "";
    private $pays        = "fr";
    private $endpoint    = "http://api.openweathermap.org/data/2.5/weather?";

    public function __construct($zip, $pays)
    {
        $this->zip = $zip;
        $this->pays = $pays;
    }

    public function call()
    {
        $ch = curl_init($this->endpoint.'zip='.$this->zip.','.$this->pays.'&appid='.$this->key);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        return json_decode($response);
    }
}