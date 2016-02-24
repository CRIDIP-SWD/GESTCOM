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
    const SOURCES           = "https://ns342142.ip-5-196-76.eu/sources/gc/";
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

    /**
     * @param $date // Prend en Parametre la date au format d-m-Y
     * @return int // retourne le resultat en format entier time()
     */
    public function format_strt($date)
    {
        return strtotime($date);
    }

    /**
     * @param $format // Prend en paramêtre la date au format choisie |ex: d-m-Y H:i ou d/m/Y
     * @param $strtotime // Prend en paramêtre la date au format strtotime entier time()
     * @return bool|string // Retourne la date au format choisie en paramêtre
     */
    public function formatage($format, $strtotime)
    {
        return date($format, $strtotime);
    }

    /**
     * @param $jour // Prend le jour au format time()
     * @param $mois // Prend le mois au format time()
     * @param $annee // Prend l'année au format time()
     * @return string // Retourne la date au format j d m y | ex: Lundi 04 Janvier 2016
     */
    public function formatage_long($strtotime)
    {
        $j = date("N", $strtotime);
        $m = date("n", $strtotime);
        $y = date("Y", $strtotime);

        $dj = date("d", $strtotime);

        switch($j)
        {
            case 1: $data_jour = "Lundi"; break;
            case 2: $data_jour = "Mardi"; break;
            case 3: $data_jour = "Mercredi"; break;
            case 4: $data_jour = "Jeudi"; break;
            case 5: $data_jour = "Vendredi"; break;
            case 6: $data_jour = "Samedi"; break;
            case 7: $data_jour = "Dimanche"; break;
        }

        switch($m)
        {
            case 1: $data_mois = "Janvier"; break;
            case 2: $data_mois = "Février"; break;
            case 3: $data_mois = "Mars"; break;
            case 4: $data_mois = "Avril"; break;
            case 5: $data_mois = "Mai"; break;
            case 6: $data_mois = "Juin"; break;
            case 7: $data_mois = "Juillet"; break;
            case 8: $data_mois = "Aout"; break;
            case 9: $data_mois = "Septembre"; break;
            case 10: $data_mois = "Octobre"; break;
            case 11: $data_mois = "Novembre"; break;
            case 12: $data_mois = "Décembre"; break;
        }

        return $data_jour." ".$dj." ".$data_mois." ".$y;
    }

    public function format($date)
    {
        $date_a_comparer = new DateTime($date);
        $date_actuelle = new DateTime("now");

        $intervalle = $date_a_comparer->diff($date_actuelle);

        if ($date_a_comparer > $date_actuelle)
        {
            $prefixe = 'dans ';
        }
        else
        {
            $prefixe = 'il y a ';
        }

        $ans = $intervalle->format('%y');
        $mois = $intervalle->format('%m');
        $jours = $intervalle->format('%d');
        $heures = $intervalle->format('%h');
        $minutes = $intervalle->format('%i');
        $secondes = $intervalle->format('%s');

        if ($ans != 0)
        {
            $relative_date = $prefixe . $ans . ' an' . (($ans > 1) ? 's' : '');
            if ($mois >= 6) $relative_date .= ' et demi';
        }
        elseif ($mois != 0)
        {
            $relative_date = $prefixe . $mois . ' mois';
            if ($jours >= 15) $relative_date .= ' et demi';
        }
        elseif ($jours != 0)
        {
            $relative_date = $prefixe . $jours . ' jour' . (($jours > 1) ? 's' : '');
        }
        elseif ($heures != 0)
        {
            $relative_date = $prefixe . $heures . ' heure' . (($heures > 1) ? 's' : '');
        }
        elseif ($minutes != 0)
        {
            $relative_date = $prefixe . $minutes . ' minute' . (($minutes > 1) ? 's' : '');
        }
        else
        {
            $relative_date = $prefixe . ' quelques secondes';
        }

        return $relative_date;
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

    public function date_jour_strt()
    {
        return strtotime(date("d-m-Y"));
    }

    public function reste($strtotime)
    {
        $diff = $strtotime - time();
        return round($diff / 86400, 0);
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

    public function getOs($ua = null)
    {
        if(!$ua) $ua = $_SERVER['HTTP_USER_AGENT'];
        $os = "OS Inconnu";

        $os_arr = array(
            'Windows NT 10.0'      => 'Windows 10',
            'Windows NT 8.1'       => 'Windows 8',
            'Windows NT 6.1'       => 'Windows 7',
            'Windows NT 6.0'       => 'Windows Vista',
            'Windows NT 5.2'       => 'Windows Server 2003',
            'Windows NT 5.1'       => 'Windows XP',
            'Windows NT 5.0'       => 'Windows 2000',
            'Windows 2000'         => 'Windows 2000',
            'Windows CE'           => 'Windows Mobile',
            'Win 9x 4.90'          => 'Windows Me.',
            'Windows 98'           => 'Windows 98',
            'Windows 95'           => 'Windows 95',
            'Win95'                => 'Windows 95',
            'Windows NT'           => 'Windows NT',
            'Ubuntu'               => 'Linux Ubuntu',
            'Fedora'               => 'Linux Fedora',
            'Linux'                => 'Linux',
            'Macintosh'            => 'Mac',
            'Mac OS X'             => 'Mac OS X',
            'Mac_PowerPC'          => 'Mac OS X',
            'FreeBSD'              => 'FreeBSD',
            'Unix'                 => 'Unix',
            'Playstation portable' => 'PSP',
            'OpenSolaris'          => 'SunOS',
            'SunOS'                => 'SunOS',
            'Nintendo Wii'         => 'Nintendo Wii',
            'Mac'                  => 'Mac'
        );
        $ua = strtolower($ua);
        foreach($os_arr as $k => $v):
            if(ereg(strtolower($k), $ua))
            {
                $os = $v;
                break;
            }
        endforeach;
        return $os;
    }
    public function getNav()
    {
        $navigateur = array(
            "firefox"   => "Mozilla Firefox",
            "opera"     => "Opéra",
            "safari"    => "Safari",
            "netscape"  => "Netscape",
            "msie"      => "Internet Explorer"
        );
        $erreur = "Navigateur non reconnu";

        $useragent = $_SERVER['HTTP_USER_AGENT'];
        $useragent = strtolower($useragent);

        foreach($navigateur as $key => $value):
            if(strpos($useragent, $key) !== false):
                return $value;
            endif;
            return $erreur;
        endforeach;
    }

    public function isAjax()
    {
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
    }
}

class DB extends app{

    private $host = "localhost";
    private $username = "root";
    private $password = "1992maxime";
    private $database = "gestcom";
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
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ));
        }catch(PDOException $e)
        {
            echo $e->getCode().": ".$e->getMessage();
        }
    }

    public function query($sql, $data = null)
    {
        try {
            $req = $this->db->prepare($sql);
            $req->execute($data);
            return $req->fetchAll(PDO::FETCH_OBJ);
        }catch(PDOException $e)
        {
            return $e->getCode().": ".$e->getMessage();
        }
    }

    public function count($sql, $data = null)
    {
        try {
            $req = $this->db->prepare($sql);
            $req->execute($data);
            return $req->fetchColumn();
        }catch(PDOException $e)
        {
            return $e->getCode().": ".$e->getMessage();
        }
    }

    public function execute($sql, $data = null)
    {
        try {
            $req = $this->db->prepare($sql);
            $res = $req->execute($data);
            return $res;
        }catch(PDOException $e)
        {
            return $e->getCode().": ".$e->getMessage();
        }

    }
}

class IP_API
{
    private $ip = "";
    private $endpoint = "http://ip-api.com/json/";

    public function __construct($adresse_ip)
    {
        $this->ip = $adresse_ip;

    }

    public function get()
    {
        $curl = curl_init($this->endpoint.$this->ip);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $head = curl_exec($curl);
        $data = json_decode($head);
        return $data;
    }
}

