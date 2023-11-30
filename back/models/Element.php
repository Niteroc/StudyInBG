<?php

use back\models\DataBase;

class Element extends DataBase
{
    // On retourne un tableau de toutes les rubriques
    public function findAllByRubriqueId($id)
    {
        return $this->requete("SELECT * from element where idrubrique = :id and valide = 1", array('id' => $id))->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createPropositionElement($rubrique, $nom, $prix, $description, $adresse)
    {
        // try to find the rubrique by name, if not find create one
        $rub = new Rubrique();
        $allRubriques = $rub->findAll();

        $idrubrique = -1;

        $res = array_search($rubrique, array_column($allRubriques, 'nom'));
        if ($res) {
            $idrubrique = $res;
        } else {
            $rub->createRubrique($rubrique, "");
            $idrubrique = $rub->conn->lastInsertId();
        }

        return $this->requete("INSERT INTO element (idrubrique, nom, prix, description, adresse, valide) 
                                    VALUES (:idrubrique, :nom, :prix, :description, :adresse, :valide)",
            array('idrubrique' => $idrubrique, 'nom' => $nom, 'prix' => $prix, 'description' => $description, 'adresse' => $adresse, 'valide' => 0)
        );
    }
}
