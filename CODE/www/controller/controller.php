<?php
    require_once('./model/OffreManager.php');
    require_once('./model/PDManager.php');
    require_once('./model/entrepriseManager.php');
    require_once('./model/ConnectUserManager.php');
    require_once('functions.php');


    function listOffre(){
        $OffreManager = new OffreManager();
        $offre = $OffreManager->getAllOffres();
        $entreprise = $OffreManager->getAllEntreprise();

        if (isset($_POST['domaine']) || isset($_POST['ville']) || isset($_POST['date']) || isset($_POST['nivetudes']) || isset($_POST['dureemin']) || isset($_POST['dureemax']) || isset($_POST['salaire'])){
            $domaine = $_POST['domaine'];
            $ville = $_POST['ville'];
            $date = $_POST['date'];
            $dureemin = verif("dureemin");
            $dureemax = verif("dureemax");
            $salaire = verif("salaire");
            $entreprisechoisie = verif("entreprise");

            $nivetudes = '';
            $i = 0;
            if (isset($_POST['nivetudes'])){
                foreach($_POST['nivetudes'] as $selected){
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

        $connectStatus ='';
        if (isset($_POST['buttonConnect'])){
            $connectStatus = connectUser($_POST['userName'], $_POST['password']);
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
            $mdp = password_hash($_POST['mdp_pil'], PASSWORD_DEFAULT);
            
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
        $entreprise = $entrepriseManager->getAllEntreprise();
        
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

        if (isset($_POST['entreprise']) || isset($_POST['ville'])){
            $nomEntreprise = $_POST['entreprise'];
            $nomVille = verif("ville");
            $nomSecteur = verif("secteur");


            $entreprise = $entrepriseManager->getEntreprise($nomEntreprise, $nomVille, $nomSecteur);
        }

        require_once('./view/listEntrepriseView.php');
    }
?>