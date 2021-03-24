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
            $nom = $_POST['nom_del'];
            $prenom = $_POST['prenom_del'];
            $delegue = $PDManager->getDelegue($nom, $prenom);
        }

        if (isset($_POST['rechercher_pil'])) {
            $nom = $_POST['nom_pil'];
            $prenom = $_POST['prenom_pil'];
            $pilote = $PDManager->getPilote($nom, $prenom);
        }
        
        if (isset($_POST['creer_pil'])&& isset($_POST['nom_pil']) && isset($_POST['prenom_pil']) && isset($_POST['ville_pil']) && isset($_POST['mdp_pil'])&& isset($_POST['confmdp_pil']) && $_POST['mdp_pil'] == $_POST['confmdp_pil']) {
            $nom = $_POST['nom_pil'];
            $prenom = $_POST['prenom_pil'];
            $ville = $_POST['ville_pil'];
            $identifiant =  $_POST['nom_pil'] . "." . $_POST['prenom_pil'];
            $mdp = $_POST['mdp_pil'];
            
            $i = 0;
            if (isset($_POST['promotion_pil'])){
                foreach($_POST['promotion_pil'] as $selected){
                    if($i==0){
                        $promotion = $selected;
                    }
                    else{
                        $promotion = $promotion . $selected;
                    }
                    $i++;
                }
            }
            
            $pilote = $PDManager->addPilote($nom, $prenom, $ville, $identifiant, $mdp, $promotion);
        }
        require_once('./view/PDview.php');
    }

    function listEntreprise(){
        $entrepriseManager = new EntrepriseManager();
        $ville = $entrepriseManager->getAllville();
        $secteurAct = $entrepriseManager->getAllSecteurAct();
        $Entreprise = $entrepriseManager->getAllEntreprise();
        
        function createTabNote($note){
            switch ($note){
                case 1: 
                    return array("gold", "", "", "", "");
                    break;
                case 2:
                    return array("gold", "gold", "", "", "");
                    break;
                case 3:
                    return array("gold", "gold", "gold", "", "");
                    break;
                case 4:
                    return array("gold", "gold", "gold", "gold", "");
                    break;
                case 5:
                    return array("gold", "gold", "gold", "gold", "gold");
                    break;
            }     
        }

        require_once('./view/listEntrepriseView.php');
    }
?>