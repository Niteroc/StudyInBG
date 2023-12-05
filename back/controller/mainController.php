<?php

require_once('back/models/DataBase.php');
require_once('back/models/Element.php');
require_once('back/models/Rubrique.php');
require_once('back/models/Admin.php');

function afficherPageAccueil()
{
    include 'front/index.html';
}

function logout()
{
    $_SESSION['groups'] = null;
    header("Location: " . "index.php");
}

function afficherPageLogin(){

    if (isset($_POST['formlogin'])) {

        $admin = new Admin();

        $response = $admin->findAdminByName($_POST['pseudoconnect']);

        if (count($response) == 1 and password_verify($_POST['mdpconnect'], $response[0]['password'])) {

            $_SESSION['groups'] = "admin";
            header("Location: " . "index.php?page=admin");

        } else {
            ?>
            <script>alert("Mauvais identifiant et/ou mot de passe")</script><?php
        }
    }

    include 'front/authentification/login.html';

}

function afficherPageAdmin()
{

    if(isAdmin()){
        echo "<div id='all_content'>";
        include 'front/admin/mainPage.php';

        if (isset($_POST['buttonTableGestion'])) {
            include __DIR__ . '/../../front/admin/tableGestion.php';
            displayTableGestion((new $_POST['buttonTableGestion']())->findAll(), $_POST['buttonTableGestion']);
        }
        echo "</div>";

        echo "<footer id='footer'> <p class='copyright'>&copy; Tous droits réservés - 12/2023 - <a href='index.php'>Accueil</a> - <a href='index.php?page=logout'>Déconnexion</a></p> </footer>";
    }else{
        afficherPageLogin();
    }
}

function isAdmin() //return true si l'utilisateur est connecté au site
{
    if (isset($_SESSION['groups']) && $_SESSION['groups'] == 'admin') {
        return true;
    }
    return false;
}

function supprInput($type, $id){

    $req = (new $type())->delete($id);
    echo $req;
}

function validInput($id){

    $req = (new Element())->valid($id);
    echo $req;
}

function invalidInput($id){

    $req = (new Element())->invalid($id);
    echo $req;
}

/*function modifyInput($type, $id){

    $req = (new $type())->modify($id);

}*/

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
    $address = isset($_POST['address']) ? $_POST['address'] : '';

    // Pour le champ de type fichier (input file)
    $image = isset($_FILES['image']) ? $_FILES['image'] : '';

    // Chemin temporaire du fichier téléchargé
    $filePath = isset($image['tmp_name']) ? $image['tmp_name'] : '';

    // Lecture du contenu du fichier en tant que chaîne binaire
    $imageData = $filePath !== '' ? file_get_contents($filePath) : '';

    $element = new Element();
    $element->createPropositionElement($activity, $name, $message, $address, $imageData);
}
