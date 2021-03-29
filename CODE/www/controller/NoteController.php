<?php

require_once('../model/entrepriseManager.php');

if($_SERVER['REQUEST_METHOD']=="GET") {
    $function = $_GET['function'];
    $note = $_GET['note'];
    $entreprise = $_GET['entreprise'];

    if(function_exists($function)) {        
        call_user_func($function, $note, $entreprise);
    } else {
        echo 'Function Not Exists!!';
    }
}

function noteEntreprise($note, $entreprise){
    $entrepriseManager = new EntrepriseManager();
    if ($entrepriseManager->testEtudiant() != null){
        $entrepriseManager->noteEtudiantEntreprise($note, $entreprise);
    }
    else{
        $entrepriseManager->notePiloteEntreprise($note, $entreprise);
    }

    echo $entreprise . ' a reçu un ' . $note . '/5';
}