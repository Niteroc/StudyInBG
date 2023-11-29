<?php

use back\models\DataBase;

class Element extends DataBase
{
    // On retourne un tableau de toutes les rubriques
    public function findAllByRubriqueId($id)
    {
        return $this->requete("SELECT * from element where idrubrique = :id", array('id' => $id))->fetchAll(PDO::FETCH_ASSOC);
    }
}
