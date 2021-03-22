<?php
    require_once('./model/OffreManager.php');
    require_once('./model/PDManager.php');

    function listOffre(){
        $OffreManager = new OffreManager();

        $offre = $OffreManager->getAllOffres();
        $entreprise = $OffreManager->getAllEntreprise();

        require_once('./view/listOffreView.php');
    }

    function listPD(){
        
        $OffreManager = new PDManager();

        $delegue = $PDManager->getDelegue($nom,$prenom);
        $pilote = $PDManager->getPilote($nom,$prenom);

        require_once('./view/pilote_delegue.php');
    }
?>