<?php
    require_once('./model/OffreManager.php');

    function listOffre(){
        $OffreManager = new OffreManager();
        $offre = $OffreManager->getAllOffres();
        $entreprise = $OffreManager->getAllEntreprise();

        require_once('./view/listOffreView.php');
    }
?>