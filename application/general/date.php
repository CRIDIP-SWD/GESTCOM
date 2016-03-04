<?php
/**
 * Created by PhpStorm.
 * User: Maxime
 * Date: 29/02/2016
 * Time: 23:20
 */

namespace App\general;


use DateTime;

class date
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
    public function formatage_sequenciel_no_str($format)
    {
        if($format == "d"){
            $d = date("N");
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
            $m = date("n");
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

    public function semaine($annee, $semaine)
    {
        $date_format = new date();
        $lundi = new DateTime();
        $lundi->setISODate($annee, $semaine);

        $dimanche = new DateTime();
        $dimanche->setISODate($annee, $semaine);
        date_modify($dimanche, '+6 days');

        return "Du".$lundi->format("'".$date_format->formatage_sequenciel_no_str('d')." d ".$date_format->formatage_sequenciel_no_str('m'));

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