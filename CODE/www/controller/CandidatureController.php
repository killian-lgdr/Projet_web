<?php

require_once('../model/OffreManager.php');

if($_SERVER['REQUEST_METHOD']=="GET") {
    $function = $_GET['function'];
    $offre = $_GET['offre'];

    if(function_exists($function)) {
        call_user_func($function, $offre);
    } else {
        echo 'Function Not Exists!!';
    }
}

function wishListOffre($offre){
    $offreManager = new OffreManager();
    $offreManager->wishlistOffre($offre);

    echo 'offre ajoutée à la wish-list !';
}