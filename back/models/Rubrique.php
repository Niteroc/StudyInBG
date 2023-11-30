<?php

use back\models\DataBase;

class Rubrique extends DataBase
{
    // On retourne un tableau de toutes les rubriques
    public function findAll()
    {
        return $this->requete("SELECT * from rubrique", null)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findAllNotEmpty() {
        return $this->requete("SELECT DISTINCT r.* from rubrique r 
                                    INNER JOIN element e ON r.id = e.idrubrique
                                    where e.valide = 1", null)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createRubrique($nom, $description) {
        return $this->requete("INSERT INTO rubrique (nom, description) VALUES(:nom, :description)",
                                    array('nom' => $nom, 'description' => $description)
        );
    }
}
