<?php

require_once('./../back/models/DataBase.php');
require_once('./../back/models/Element.php');
require_once('./../back/models/Rubrique.php');

function afficherPageAccueil()
{
    include __DIR__ . '/../../front/index.html';
}

function getAllRubrique()
{

    $rubrique = new Rubrique();

    $rubrique_result = $rubrique->findAllNotEmpty();

    echo json_encode($rubrique_result);
}

function getAllElementById($id)
{

    $element = new Element();

    $element_result = $element->findAllByRubriqueId($id);

    for ($i = 0; $i < count($element_result); $i++) {
        $element_result[$i]['image'] = base64_encode($element_result[$i]['image']);
    }
    echo json_encode($element_result);
}

function createPropositionElement()
{
    $element = new Element();
    $element->createPropositionElement("Cookie", "ola", "2", "desc", "5 rue qqc");
}