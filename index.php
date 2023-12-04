<?php

require "back/controller/mainController.php";

session_start();


function console_log($output, $with_script_tags = true)
{
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) .
        ');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}

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
            break;
        case 'suppr':
            if(isset($_GET['type']) && isset($_GET['id'])){
                supprInput($_GET['type'], $_GET['id']);
            }
            break;
        case 'valid':
            if(isset($_GET['id'])){
                validInput($_GET['id']);
            }
            break;
        case 'invalid':
            if(isset($_GET['id'])){
                invalidInput($_GET['id']);
            }
            break;
        /*case 'modify':
            if(isset($_GET['type']) && isset($_GET['id'])){
                modifyInput($_GET['type'], $_GET['id']);
            }
            break;*/

    }
}else{
    if(isset($_GET['page']) && $_GET['page'] == "admin"){
        afficherPageAdmin();
    } else if (isset($_GET['page']) && $_GET['page'] == "login")
        afficherPageLogin();
    else if (isset($_GET['page']) && $_GET['page'] == "logout")
        logout();
    else {
        afficherPageAccueil();
    }
}