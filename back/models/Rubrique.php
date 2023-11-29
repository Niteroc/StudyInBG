<?php

use back\models\DataBase;

class Rubrique extends DataBase
{
    // On retourne un tableau de toutes les rubriques
    public function findAll()
    {
        return $this->requete("SELECT * from rubrique", null)->fetchAll(PDO::FETCH_ASSOC);
    }
}
