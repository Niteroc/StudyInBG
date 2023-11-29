<?php

namespace back\models;
use PDO;
use PDOException;

class DataBase
{
    public $conn;

    function __construct()
    {
        $this->conn = new PDO('mysql:host=localhost;dbname=studyinbg;charset=utf8', 'root', ''); //connection à la base de données
    }

    //exécution de la requête préparée (avec paramètres)
    function requete($sql, $params)
    {
        $req = $this->conn->prepare($sql);
        $req->execute($params);
        return $req;
    }
}