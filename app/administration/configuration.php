<?php
/**
 * Created by PhpStorm.
 * User: Maxime
 * Date: 21/02/2016
 * Time: 17:10
 */

namespace App\administration;


use App\DB;

class configuration extends DB
{

    public function conf_annuaire_cat_client()
    {
        return $this->query("SELECT * FROM conf_annuaire_cat_client ORDER BY idcatclient ASC");
    }

    public function conf_annuaire_groupe()
    {
        return $this->query("SELECT * FROM conf_annuaire_groupe ORDER BY idgroupe ASC");
    }

    public function conf_catalogue()
    {
        return $this->query("SELECT * FROM conf_catalogue WHERE idconf = 1");
    }

    public function conf_entreprise_activite()
    {
        return $this->query("SELECT * FROM conf_entreprise_activite WHERE idconf = 1");
    }

    public function conf_entreprise_doc()
    {
        return $this->query("SELECT * FROM conf_entreprise_doc_general WHERE idconf = 1");
    }
    public function conf_entreprise_gen()
    {
        return $this->query("SELECT * FROM conf_entreprise_general WHERE idconf = 1");
    }

}