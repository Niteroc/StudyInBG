<?php

require "controller/mainController.php";

$requestedUrl = $_SERVER['REQUEST_URI'];

if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
    switch ($_GET['api']) {
        case 'rubriqueall':
            getAllRubrique();
            break;
        case 'rubriquenotempty':
            getAllRubriqueNotEmpty();
            break;
        case 'element':
            getAllElementById($_GET['id']);
            break;
        case 'create':
            createPropositionElement();

            if($_SERVER["REQUEST_METHOD"] == "POST") {
            }
            break;
        default:
            // Gérer d'autres cas d'API
            break;
    }
} else {
    afficherPageAccueil();
}