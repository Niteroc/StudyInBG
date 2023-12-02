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

    $rubrique_result = $rubrique->findAll();

    echo json_encode($rubrique_result);
}

function getAllRubriqueNotEmpty()
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
    // Récupérer les données du formulaire
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $activity = isset($_POST['otherActivityInput']) && $_POST['otherActivityInput'] != "" ? $_POST['otherActivityInput'] : $_POST['activity'];
    $message = isset($_POST['message']) ? $_POST['message'] : '';
    $price = isset($_POST['price']) ? $_POST['price'] : '';
    $address = isset($_POST['address']) ? $_POST['address'] : '';

    // Pour le champ de type fichier (input file)
    $image = isset($_FILES['image']) ? $_FILES['image'] : '';

    // Chemin temporaire du fichier téléchargé
    $filePath = isset($image['tmp_name']) ? $image['tmp_name'] : '';

    // Lecture du contenu du fichier en tant que chaîne binaire
    $imageData = $filePath !== '' ? file_get_contents($filePath) : '';

    $element = new Element();
    $element->createPropositionElement($activity, $name, $price, $message, $address, $imageData);
}
