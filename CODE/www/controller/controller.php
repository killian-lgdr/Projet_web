<?php
    require_once('./model/OffreManager.php');
    require_once('./model/PDManager.php');
    require_once('./model/entrepriseManager.php');

    function listOffre(){
        $OffreManager = new OffreManager();
        $offre = $OffreManager->getAllOffres();
        $entreprise = $OffreManager->getAllEntreprise();

        if (isset($_GET['domaine']) || isset($_GET['ville']) || isset($_GET['date']) || isset($_GET['nivetudes'])){
            $domaine = $_GET['domaine'];
            $ville = $_GET['ville'];
            $date = $_GET['date'];
            
            $nivetudes = '';
            $i = 0;
            foreach($_GET['nivetudes'] as $selected){
                if($i==0){
                    $nivetudes = $selected;
                }
                else{
                    $nivetudes = $nivetudes . ',' . $selected;
                }
                $i++;
            }
            
            $offre = $OffreManager->getOffre($domaine, $ville, $date, $nivetudes);
        }
        
        require_once('./view/listOffreView.php');
    }

    function listPD(){
        
        $PDManager = new PDManager();
        
        if (isset($_POST['rechercher_del'])) {
            $delegue = $PDManager->getDelegue($_POST['nom_del'], $_POST['prenom_del']);
        }

        if (isset($_POST['rechercher_pil'])) {
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