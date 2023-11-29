<?php

require_once('./../back/models/DataBase.php');
require_once('./../back/models/Element.php');
require_once('./../back/models/Rubrique.php');

function afficherPageAccueil()
{
    include __DIR__ . '/../../index.html';
}

function getAllRubrique()
{

    $rubrique = new Rubrique();

    $rubrique_result = $rubrique->findAll();
    echo json_encode($rubrique_result);
}

function getAllElementById($id)
{

    $element = new Element();

    $element_result = $element->findAllByRubriqueId($id);
    echo json_encode($element_result);
}