<?php
/**
 * Created by PhpStorm.
 * User: MAX
 * Date: 12/12/2015
 * Time: 00:00
 */

namespace App;
use PDO;
use PDOException;

/**
 * Class app
 * @package App
 *
 * Définie la base du projet
 *
 */
class app
{

}

/**
 * Class constante
 * @package App
 *
 * Définie un ensemble de constante à modifié à chaque début de projet
 *
 */
class constante extends app{

    const HTTP              = "https://";
    const URL               = "gc.cridip.com/";
    const ASSETS            = "assets/";
    const NOM_SITE          = "GESTCOM";
    const SOURCES           = "http://ns342142.ip-5-196-76.eu/sources/gc/";
    const MAINTENANCE       = 0;
    const IP_MAIN           = "109.190.224.161";
    /*
     * ADRESSE BUREAU = 109.190.224.161
     * ADRESSE MAISON = 109.190.65.252
     */
    /**
     * @param $dos array Permet de parser sous forme string le tableau array=$dos
     * @return string retourne un format standard de link HTML
     */
    private static function parseArray($dos)
    {
        return implode("/", $dos);
    }

    /**
     * @param array $dos Il permet d'envoyer à la fonction la liste des dossiers à parcourir sous forme de tableau
     * @param bool|true $assets Permet d'insérer de manière automatique le dossier 'assets'
     * @param bool $sources Renvoie les informations vers le fichiers DataSources de CRIDIP
     * @return string Suivant le bool $assets, il retourne la redirection sous format de lien(string)
     */
    public static function getUrl($dos = array(), $assets = true, $sources = true)
    {
        if($assets === true)
        {
            return static::HTTP.static::URL.static::ASSETS.static::parseArray($dos);
        }elseif($sources === true){
            return static::SOURCES;
        }else{
            return static::HTTP.static::URL.static::parseArray($dos);
        }

    }

    public function maintenance($ip)
    {
        if(static::MAINTENANCE == 1){
            if($ip != static::IP_MAIN)
            {
                return true;
            }else{
                return false;
            }
        }
    }




}

class date_format extends app
{
    public function jour_semaine($jour)
    {
        switch($jour)
        {
            case 1: return "Lundi"; break;
            case 2: return "Mardi"; break;
            case 3: return "Mercredi"; break;
            case 4: return "Jeudi"; break;
            case 5: return "Vendredi"; break;
            case 6: return "Samedi"; break;
            case 7: return "Dimanche"; break;
        }
    }
    public function mois($mois)
    {
        switch($mois)
        {
            case 1: return "Janvier"; break;
            case 2: return "Février"; break;
            case 3: return "Mars"; break;
            case 4: return "Avril"; break;
            case 5: return "Mai"; break;
            case 6: return "Juin"; break;
            case 7: return "Juillet"; break;
            case 8: return "Aout"; break;
            case 9: return "Septembre"; break;
            case 10: return "Octobre"; break;
            case 11: return "Novembre"; break;
            case 12: return "Décembre"; break;
        }
    }
    public function formatage($date_format)
    {
        $jour = date("d", $date_format);
        $mois = date("m", $date_format);
        $year = date("Y", $date_format);

        $formatage = $jour." ".$this->mois($mois)." ".$year;
        return $formatage;
    }
    public function convert_strtotime($date)
    {
        $formatage = strtotime($date);
        return $formatage;
    }
    public function format($datetime)
    {
        $now = time();
        $created = $datetime;

        //Calcul de la différence
        $diff = $now-$created;
        $m = ($diff)/(60); // Minutes
        $h = ($diff)/(60*60); // Heures
        $j = ($diff)/(60*60*24); // jours
        $s = ($diff)/(60*60*24*7);

        if($diff < 60) {
            return $diff." Secondes";
        }elseif ($m < 60) { // "il y a x minutes"
            $minute = (floor($m) == 1) ? 'minute' : 'minutes';
            return floor($m).' '.$minute;
        }
        elseif ($h < 24) { // " il y a x heures, x minutes"
            $heure = (floor($h) <= 1) ? 'heure' : 'heures';
            $dateFormated = floor($h).' '.$heure;
            if (floor($m-(floor($h))*60) != 0) {
                $minute = (floor($m) == 1) ? 'minute' : 'minutes';
                $dateFormated .= ' et '.floor($m-(floor($h))*60).' '.$minute;
            }
            return $dateFormated;
        }
        elseif ($j < 7) { // " il y a x jours, x heures"
            $jour = (floor($j) <= 1) ? 'jour' : 'jours';
            $dateFormated = floor($j).' '.$jour;
            if (floor($h-(floor($j))*24) != 0) {
                $heure = (floor($h) <= 1) ? 'heure' : 'heures';
                $dateFormated .= ' et '.floor($h-(floor($j))*24).' '.$heure;
            }
            return $dateFormated;
        }
        elseif ($s < 5) { // " il y a x semaines, x jours"
            $semaine = (floor($s) <= 1) ? 'semaine' : 'semaines';
            $dateFormated = floor($s).' '.$semaine;
            if (floor($j-(floor($s))*7) != 0) {
                $jour = (floor($j) <= 1) ? 'jour' : 'jours';
                $dateFormated .= ' et '.floor($j-(floor($s))*7).' '.$jour;
            }
            return $dateFormated;
        }
        else { // on affiche la date normalement
            return strftime("%d %B %Y à %H:%M", $created);
        }
    }
    public function week2str($annee, $no_semaine)
    {
        // Récup jour début et fin de la semaine
        $timeStart = strtotime("First Thursday January {$annee} + ".($no_semaine - 1)." Week");
        $timeEnd   = strtotime("First Thursday January {$annee} + {$no_semaine} Week -1 day");

        // Récup année et mois début
        $anneeStart = date("Y", $timeStart);
        $anneeEnd   = date("Y", $timeEnd);
        $moisStart  = date("m", $timeStart);
        $moisEnd    = date("m", $timeEnd);

        // Gestion des différents cas de figure
        if( $anneeStart != $anneeEnd ){
            // à cheval entre 2 années
            $retour = "du ".strftime("%d %B %Y", $timeStart)." au ".strftime("%d %B %Y", $timeEnd);
        } elseif( $moisStart != $moisEnd ){
            // à cheval entre 2 mois
            $retour = "du ".strftime("%d %B", $timeStart)." au ".strftime("%d %B %Y", $timeEnd);
        } else {
            // même mois
            $retour = "du ".strftime("%d", $timeStart)." au ".strftime("%d %B %Y", $timeEnd);
        }
        return $retour;
    }


}

class fonction extends app
{
    public function gen_token($idclient)
    {
        $ip_client = sha1($_SERVER['REMOTE_ADDR']);
        $heure = strtotime(date("H:i"));
        $salt = "_";
        $caractere = "azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN0123456789";
        $shuffle = str_shuffle($caractere);
        $lenght = substr($shuffle, 0, 10);
        $gen = $heure.$salt.sha1($lenght).$salt.$ip_client.$salt.$idclient;
        return $gen;

    }

    public function gen_password()
    {
        $caractere = "AZERTUIOPQSDFGHJLMWXCVBNazertyuiopqsdfghjklmwxcvbn0123456789";
        $shuffle = str_shuffle($caractere);
        $lenght = substr($shuffle, 0, 6);
        return $lenght;
    }
}

class DB extends app{

    private $host = "localhost";
    private $username = "gc";
    private $password = "1992maxime";
    private $database = "gc";
    private $db;

    public function __construct($host = null, $username = null, $password = null, $database = null)
    {
        if($host != null)
        {
            $this->host = $host;
            $this->username = $username;
            $this->password = $password;
            $this->database = $database;
        }

        try{
            $this->db = new PDO('mysql:host='.$this->host.';dbname='.$this->database, $this->username, $this->password, array(
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8',
                PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
            ));
        }catch(PDOException $e)
        {
            echo $e->getCode().": ".$e->getMessage();
        }
    }

    public function query($sql, $data = null)
    {
        $req = $this->db->prepare($sql);
        $req->execute($data);
        return $req->fetchAll(PDO::FETCH_OBJ);
    }

    public function count($sql, $data = null)
    {
        $req = $this->db->prepare($sql);
        $req->execute($data);
        return $req->fetchColumn();
    }
}