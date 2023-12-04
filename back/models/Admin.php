<?php

use back\models\DataBase;

class Admin extends DataBase
{

    // On retourne un tableau de tous les utilisateurs selon le pseudo
    public function findAdminByName($pseudo)
    {
        return $this->requete("SELECT * FROM admin WHERE pseudo = :pseudo", array('pseudo' => $pseudo))->fetchAll(PDO::FETCH_ASSOC);
    }

}