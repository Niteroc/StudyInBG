<?php

use back\models\DataBase;

class Element extends DataBase
{

    public function findAll()
    {
        return $this->requete("SELECT * from element", null)->fetchAll(PDO::FETCH_ASSOC);
    }

    // On retourne un tableau de toutes les rubriques
    public function findAllByRubriqueId($id)
    {
        return $this->requete("SELECT * from element where idrubrique = :id and valide = 1", array('id' => $id))->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createPropositionElement($rubrique, $nom, $description, $adresse, $image)
    {
        // try to find the rubrique by name, if not find create one
        $rub = new Rubrique();
        $allRubriques = $rub->findAll();

        $res = array_search($rubrique, array_column($allRubriques, 'nom'));

        if ($res !== false) {
            $idrubrique = $allRubriques[$res]['id'];
        } else {
            $rub->createRubrique($rubrique, "");
            $idrubrique = $rub->conn->lastInsertId();
        }

        // Obtenez le plus grand identifiant actuellement utilisé dans la table
        $result = $this->requete("SELECT MAX(id) AS max_id FROM element", null)->fetch(PDO::FETCH_ASSOC);

        if ($result && isset($result['max_id'])) {
            $maxId = $result['max_id'];

            // Convertir maxId en entier
            $maxIdPlusOne = (int)$maxId + 1;

            $this->requete("ALTER TABLE element AUTO_INCREMENT = " . $maxIdPlusOne, null);
        }

        // Insérez les données avec le nouvel identifiant auto-incrémenté
        return $this->requete("INSERT INTO element (idrubrique, nom, description, adresse, image, valide) 
                                    VALUES (:idrubrique, :nom, :description, :adresse, :image, :valide)",
            array('idrubrique' => $idrubrique, 'nom' => $nom, 'description' => $description, 'adresse' => $adresse, 'image' => $image, 'valide' => 0)
        );
    }

    // On supprime un élément selon son id
    public function delete($id)
    {
        return $this->requete("DELETE FROM element WHERE id = :id", array("id" => $id));
    }

    // On valide un élément selon son id
    public function valid($id)
    {
        return $this->requete("UPDATE element SET valide = 1 WHERE id = :id", array("id" => $id));
    }

    // On invalide un élément selon son id
    public function invalid($id)
    {
        return $this->requete("UPDATE element SET valide = 0 WHERE id = :id", array("id" => $id));
    }
}
