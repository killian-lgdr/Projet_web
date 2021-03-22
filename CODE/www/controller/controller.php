<?php
    require_once('./model/OffreManager.php');
    require_once('./model/PDManager.php');

    function listOffre($domaine, $ville){
        $OffreManager = new OffreManager();
        $offre = $OffreManager->getAllOffres();
        $entreprise = $OffreManager->getAllEntreprise();

        if(isset($domaine)){
            $offre = $OffreManager->getOffre($domaine, $ville);
        }

        require_once('./view/listOffreView.php');
    }

    function listPD($nomdel,$prenomdel,$nompil,$prenompil){
        
        $PDManager = new PDManager();

        if ($nomdel != null && $prenomdel != null) {
            $delegue = $PDManager->getDelegue($nomdel, $prenomdel);
        }

        if ($nompil != null && $prenompil != null) {
            $pilote = $PDManager->getPilote($nompil, $prenompil);
        }
            
        require_once('./view/PDview.php');
    }
?>