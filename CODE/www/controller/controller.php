<?php
    require_once('./model/OffreManager.php');
    require_once('./model/PDManager.php');

    function listOffre(){
        $OffreManager = new OffreManager();
        $offre = $OffreManager->getAllOffres();
        $entreprise = $OffreManager->getAllEntreprise();

        if(($_GET['domaine'] != null) || ($_GET['ville'] != null) ){
            
            $offre = $OffreManager->getOffre($_GET['domaine'], $_GET['ville']);
        }

        require_once('./view/listOffreView.php');
    }

    function listPD(){
        
        $PDManager = new PDManager();

        if (isset($_GET['nom_del']) && isset($_GET['prenom_del'])) {
            $delegue = $PDManager->getDelegue($nomdel, $prenomdel);
        }

        if (isset($_GET['nom_pil']) && isset($_GET['prenom_pil'])) {
            $pilote = $PDManager->getPilote($nompil, $prenompil);
        }
            
        require_once('./view/PDview.php');
    }
?>