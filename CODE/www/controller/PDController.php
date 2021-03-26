<?php

require_once('./model/PDManager.php');

function listPD(){
        
    $PDManager = new PDManager();

    if (isset($_POST['rechercher_del'])) {
        $nom = $_POST['nom_del'];
        $prenom = $_POST['prenom_del'];
        $delegue = $PDManager->getDelegue($nom, $prenom);
    }
    if (isset($_POST['creer_del'])&& isset($_POST['nom_del']) && isset($_POST['prenom_del']) && isset($_POST['ville_del']) && isset($_POST['mdp_del'])&& isset($_POST['confmdp_del']) && $_POST['mdp_del'] == $_POST['confmdp_del']) {
        $nom = $_POST['nom_del'];
        $prenom = $_POST['prenom_del'];
        $ville = $_POST['ville_del'];
        $identifiant =  $_POST['nom_del'] . "." . $_POST['prenom_del'];
        $mdp = password_hash($_POST['mdp_del'], PASSWORD_DEFAULT);

        $i = 0;
        if (isset($_POST['ges_droit'])){
            foreach($_POST['ges_droit'] as $selected){
                if($i==0){
                    $droit = $selected;
                }
                else{
                    $droit = $droit . $selected;
                }
                $i++;
            }
        }
        echo "droit : ";
        echo $droit;
        $delegue = $PDManager->addDelegue($nom, $prenom, $ville, $identifiant, $mdp, $droit);
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

    function CompareAucun($debut, $fin, $var)
    {
        if (isset($_POST['rechercher_del'])) {
            for ($i=$debut; $i<=$fin  ; $i++) { 
                if(substr_count($var['ges_droit'],$i) !=0){
                    return "";
                    break
                }
                if ($i == $fin && substr_count($var['ges_droit'],$i) ==0) {
                    return "selected";
                }
            }
        }
    }
    require_once('./view/PDview.php');
    
}