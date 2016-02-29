<?php
/**
 * Created by PhpStorm.
 * User: MAX
 * Date: 12/12/2015
 * Time: 00:00
 */

namespace App;
use DateTime;
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
    const URL               = "gestcom.cridip.com/";
    const ASSETS            = "assets/";
    const NOM_SITE          = "GESTCOM";
    const SOURCES           = "https://ns342142.ip-5-196-76.eu/sources/gc/";
    const MAINTENANCE       = 0;
    const IP_MAIN           = "109.190.224.161";
    const IP_SRC            = "ns342142.ip-5-196-76.eu";
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
    public static function getUrl($dos = array(), $assets = true, $sources = false)
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

    /**
     * @param $format // Formatage de la date au format soouhaiter| d ou m
     * @param $strtotime // Date au format strtotime
     * @return bool|string // Retourne la date au formatage général
     */
    public function formatage_sequenciel($format, $strtotime)
    {
        if($format == "d"){
            $d = date("N", $strtotime);
            switch($d)
            {
                case 1: $data_jour = "Lundi"; break;
                case 2: $data_jour = "Mardi"; break;
                case 3: $data_jour = "Mercredi"; break;
                case 4: $data_jour = "Jeudi"; break;
                case 5: $data_jour = "Vendredi"; break;
                case 6: $data_jour = "Samedi"; break;
                case 7: $data_jour = "Dimanche"; break;
            }
            return $data_jour;
        }elseif($format == "m"){
            $m = date("n", $strtotime);
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
            return $data_mois;
        }else{
            return false;
        }
    }

    /**
     * @param $date // Date au format standard de date (d-m-Y) ou autre
     * @return string // Il retourne le moment décompter par différence (il y a...)
     */
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

    /**
     * @return int //Cette fonction retourne la date au format strtotime (jour d'appel)
     */
    public function date_jour_strt()
    {
        return strtotime(date("d-m-Y"));
    }

    /**
     * @param $strtotime //Date au format strtotime
     * @return float // Retourne la valeur différentielle de jour restant en format strtotime
     */
    public function reste($strtotime)
    {
        $diff = $strtotime - time();
        return round($diff / 86400, 0);
    }


}

class fonction extends app
{
    /**
     * @param $idclient // identifiant du client appeler
     * @return string // Retourne une clé [TOKEN] permettant l'identification d'une action
     */
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

    /**
     * @return string // Génère un mot de passe aléatoire sur 6 caractères alphanumérique
     */
    public function gen_password()
    {
        $caractere = "AZERTUIOPQSDFGHJLMWXCVBNazertyuiopqsdfghjklmwxcvbn0123456789";
        $shuffle = str_shuffle($caractere);
        $lenght = substr($shuffle, 0, 6);
        return $lenght;
    }

    /**
     * @param $chiffre // chiffre au format standard (0.00)
     * @return string // Retourne le montant au formatage number_format (0,00 €)
     */
    public function number_decimal($chiffre)
    {
        return number_format($chiffre, 2, ',', ' ')." €";
    }

    /**
     * @param $nom // Nom du fichier à télécharger
     * @param $read_file // lien direct vers le fichier
     */
    public function download_file($nom, $read_file)
    {
        header("Content-Type: application/octet-stream");
        header("Content-disposition: attachment; filename=".$nom);
        header('Pragma: no-cache');
        header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        header('Expires: 0');
        readfile($read_file);
        exit();
    }

    /**
     * @param $view // premiere Incrémentation (view/)
     * @param $sub // Deuxième Incrémentation (view->sub)
     * @param $data // Troisème Incrémentation (sub->data)
     * @param $type // Type Possible: success, warning, error, info
     * @param $service // Service appeler exemple: add-user
     * @param $text // Le texte renvoyer par la fonction
     */
    public function redirect($view = null, $sub = null, $data = null, $type = null, $service = null, $text = null){
        $constante = new constante();

        if(!empty($view)){$redirect = "?view=".$view;}
        if(!empty($sub)){$redirect = "&sub=".$sub;}
        if(!empty($data)){$redirect = "&data=".$data;}
        if(!empty($type)){$redirect = "&".$type."=".$service."&text".$text;}

        header("Location: ".$constante->getUrl(array(), false).$redirect);

    }

    public function is_ajax(){
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
    }
}

class DB extends app{

    protected $host = "localhost";
    protected $username = "gc";
    protected $password = "1992maxime";
    protected $database = "gc";
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

    /**
     * @param $sql // Requete demander au système (UNIQUEMENT SELECT FROM)
     * @param null $data // Tableau des variables à rechercher avec la requete demander
     * @return array // Retourne Tableau de la requete (OBJECT)
     */
    public function query($sql, $data = null)
    {
        $req = $this->db->prepare($sql);
        $req->execute($data);
        return $req->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * @param $sql // Requete demander au système (UNIQUEMENT SELECT Count() FROM)
     * @param null $data // Tableau des variables à rechercher avec la requete demander
     * @return string // Retourne un nombre associatif à la requete
     */
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

    /**
     * @param $sql // Requete demander au systeme (UPDATE, DELETE, INSERT)
     * @param null $data // Tableau des variables à inserer avec la requete demander
     * @return int|string retourne le nombre de ligne affecter par la requte
     */
    public function execute($sql, $data = null)
    {
        try {
            $req = $this->db->prepare($sql);
            $req->execute($data);
            return $req->rowCount();
        }catch(PDOException $e)
        {
            return $e->getCode().": ".$e->getMessage();
        }

    }

}

class ssh2 extends app
{
    protected $server   = "vps221243.ovh.net";
    protected $port     = "5678";
    protected $user     = "sysdev";
    protected $pass     = "sysdev";
    public $connect     = "";

    protected $error_connect = "Système de Connexion SSH2 inopérant !<br>Impossible de ce connecter au serveur distant.";

    /**
     * @param null $server -> Serveur SSH
     * @param null $port -> Port de connexion
     * @param null $user -> Nom d'utilisateur
     * @param null $pass -> Mot de Passe
     * @param bool $external -> Utilisation du systeme Externe par systeme de connexion par pont
     * @return resource
     */
    public function connexion($server = null, $port = null, $user = null, $pass = null, $external = false)
    {
        if($external == false)
        {
            $connect = ssh2_connect($this->server, $this->port);
            $login = ssh2_auth_password($connect, $this->user, $this->pass);

            if(!$login)
            {
                $text = "Erreur SSH2: Connexion echoué, veuillez vérifier les paramêtre de l'application app/app.php <i>(CLASS)</i>.";
                header("Location: ../index.php?view=admin_sha&sub=error&text=$text");
            }else{
                return $connect;
            }
        }else{
            $connect = ssh2_connect($server, $port);
            $login = ssh2_auth_password($connect, $user, $pass);

            if(!$login)
            {
                $text = "Erreur SSH2: Connexion echoué, veuillez vérifier les paramêtre de l'application app/app.php <i>(CLASS)</i>.";
                header("Location: ../index.php?view=admin_sha&sub=error&text=$text");
            }else{
                return $connect;
            }
        }
    }

}
