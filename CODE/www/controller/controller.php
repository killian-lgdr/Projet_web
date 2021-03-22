<?php
    require_once('./model/OffreManager.php');
    require_once('./model/PDManager.php');

    function listOffre($domaine, $ville){
        $OffreManager = new OffreManager();
        $offre = $OffreManager->getAllOffres();
        $entreprise = $OffreManager->getAllEntreprise();

        if(($domaine != null) || ($ville != null) ){
            
            $offre = $OffreManager->getOffre($domaine, $ville);
        }

        require_once('./view/listOffreView.php');
    }

    function listPD(){
        
        $PDManager = new PDManager();

        $nomdel = $_GET['nom_del'];
        $prenomdel = $_GET['prenom_del'];
        $nompil = $_GET['nom_pil'];
        $prenompil = $_GET['prenom_pil'];

        if ($nomdel != null && $prenomdel != null) {
            $delegue = $PDManager->getDelegue($nomdel, $prenomdel);
        }

        if ($nompil != null && $prenompil != null) {
            $pilote = $PDManager->getPilote($nompil, $prenompil);
        }
            
        require_once('./view/PDview.php');
    }
?>