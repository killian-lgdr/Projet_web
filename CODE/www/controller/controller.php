<?php
    require_once('./model/OffreManager.php');
    require_once('./model/PDManager.php');
    require_once('./model/entrepriseManager.php');

    function listOffre(){
        $OffreManager = new OffreManager();
        $offre = $OffreManager->getAllOffres();
        $entreprise = $OffreManager->getAllEntreprise();

        if (isset($_GET['domaine']) || isset($_GET['ville'])){
            $domaine = $_GET['domaine'];
            $ville = $_GET['ville'];
            
            $offre = $OffreManager->getOffre($domaine, $ville);
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
        $entrepriseManager = new EntrepriseManager();
        $ville = $entrepriseManager->getAllville();
        $secteurAct = $entrepriseManager->getAllSecteurAct();
        $Entreprise = $entrepriseManager->getAllEntreprise();
        
        require_once('./view/listEntrepriseView.php');
    }
?>