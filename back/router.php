<?php

require "controller/mainController.php";

$requestedUrl = $_SERVER['REQUEST_URI'];

if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
    switch ($_GET['api']) {
        case 'rubrique':
            getAllRubrique();
            break;
        case 'element':
            getAllElementById($_GET['id']);
            break;
        default:
            // Gérer d'autres cas d'API
            break;
    }
} else {
    afficherPageAccueil();
}