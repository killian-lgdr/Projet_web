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

        if (isset($_POST['nom_del']) && isset($_POST['prenom_del'])) {
            $delegue = $PDManager->getDelegue($$_POST['nom_del'], $_POST['prenom_del']);
        }

        if (isset($_POST['nom_pil']) && isset($_POST['prenom_pil'])) {
            $pilote = $PDManager->getPilote($_POST['nom_pil'], $_POST['prenom_pil']);
        }
            
        require_once('./view/PDview.php');
    }

    function listEntreprise(){

        require_once('./view/listEntrepriseView.php');
    }
?>