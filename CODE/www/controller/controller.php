<?php
    require_once('./model/OffreManager.php');
    require_once('./model/PDManager.php');
    require_once('./model/entrepriseManager.php');

    function verif($val){
        if (isset($_GET[$val])){
            return $_GET[$val];
        }
        else{
            return '';
        }
    }


    function listOffre(){
        $OffreManager = new OffreManager();
        $offre = $OffreManager->getAllOffres();
        $entreprise = $OffreManager->getAllEntreprise();

        if (isset($_GET['domaine']) || isset($_GET['ville']) || isset($_GET['date']) || isset($_GET['nivetudes']) || isset($_GET['dureemin']) || isset($_GET['dureemax']) || isset($_GET['salaire'])){
            $domaine = $_GET['domaine'];
            $ville = $_GET['ville'];
            $date = $_GET['date'];
            $dureemin = verif("dureemin");
            $dureemax = verif("dureemax");
            $salaire = verif("salaire");
            $entreprisechoisie = verif("entreprise");

            $nivetudes = '';
            $i = 0;
            if (isset($_GET['nivetudes'])){
                foreach($_GET['nivetudes'] as $selected){
                    if($i==0){
                        $nivetudes = $selected;
                    }
                    else{
                        $nivetudes = $nivetudes . ',' . $selected;
                    }
                    $i++;
                }
            }

            $offre = $OffreManager->getOffre($domaine, $ville, $date, $nivetudes, $dureemin, $dureemax, $salaire, $entreprisechoisie);
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
        
        if (isset($_POST['creer_del'])) {
            $delegue = $PDManager->addDelegue($_POST['nom_del'], $_POST['prenom_del'], $_POST['ville_del'], $_POST['mdp_del'], $_POST['confmdp_del']);
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