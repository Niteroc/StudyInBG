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

        // Obtenez le plus grand identifiant actuellement utilisé dans la table
        $result = $this->requete("SELECT MAX(id) AS max_id FROM rubrique", null)->fetch(PDO::FETCH_ASSOC);

        if ($result && isset($result['max_id'])) {
            $maxId = $result['max_id'];

            // Convertir maxId en entier
            $maxIdPlusOne = (int)$maxId + 1;

            $this->requete("ALTER TABLE rubrique AUTO_INCREMENT = " . $maxIdPlusOne, null);
        }

        // Insérez les données avec le nouvel identifiant auto-incrémenté
        return $this->requete("INSERT INTO rubrique (nom, description) VALUES(:nom, :description)",
            array('nom' => $nom, 'description' => $description)
        );
    }
}
