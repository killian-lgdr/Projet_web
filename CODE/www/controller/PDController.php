<?php

require_once('./model/PDManager.php');

function listPD(){
        
    $PDManager = new PDManager();
//===============Délegué===============
//recherche
    if (isset($_POST['rechercher_del'])) {
        $nom = $_POST['nom_del'];
        $prenom = $_POST['prenom_del'];
        $rechdelegue = $PDManager->getDelegue($nom, $prenom);
        $donneedelegue =$rechdelegue->fetch(PDO::FETCH_LAZY);
    }
//creation
    if (isset($_POST['creer_del']) && isset($_POST['nom_del']) && isset($_POST['prenom_del']) && isset($_POST['ville_del']) && isset($_POST['mdp_del'])&& isset($_POST['confmdp_del']) && $_POST['mdp_del'] == $_POST['confmdp_del']) {
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
        $ajoutdelegue = $PDManager->addDelegue($nom, $prenom, $ville, $identifiant, $mdp, $droit);
    }
//modification
if (isset($_POST['modifier_del']) && isset($_POST['nom_del']) && isset($_POST['prenom_del']) && isset($_POST['ville_del'])) {
    $nom = $_POST['nom_del'];
    $prenom = $_POST['prenom_del'];
    $identifiant =  $_POST['nom_del'] . "." . $_POST['prenom_del'];
    $ville = $_POST['ville_del'];

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
    $modifdelegue = $PDManager->updateDelegue($nom, $prenom, $identifiant, $ville, $droit);
}
//suppression
    if (isset($_POST['supprimer_del'])&& isset($_POST['nom_del']) && isset($_POST['prenom_del'])) {
        $nom = $_POST['nom_del'];
        $prenom = $_POST['prenom_del'];
        $identifiant =  $_POST['nom_del'] . "." . $_POST['prenom_del'];
        $supprdelegue = $PDManager->deleteDelegue($nom, $prenom, $identifiant);
    }
//===============Pilote===============
//recherche
    if (isset($_POST['rechercher_pil'])) {
        $nom = $_POST['nom_pil'];
        $prenom = $_POST['prenom_pil'];
        $rechpilote = $PDManager->getPilote($nom, $prenom);
        $donneepilote=$rechpilote->fetch(PDO::FETCH_LAZY);
    }
//creation
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
        $ajoutpilote = $PDManager->addPilote($nom, $prenom, $ville, $identifiant, $mdp, $promotion);
    }
//modification
    if (isset($_POST['modifier_pil'])&& isset($_POST['nom_pil']) && isset($_POST['prenom_pil']) && isset($_POST['ville_pil'])) {
        $nom = $_POST['nom_pil'];
        $prenom = $_POST['prenom_pil'];
        $ville = $_POST['ville_pil'];

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
        $modifpilote = $PDManager->updatePilote($nom, $prenom, $ville, $promotion);
    }
//suppression
    if (isset($_POST['supprimer_pil'])&& isset($_POST['nom_pil']) && isset($_POST['prenom_pil'])) {
        $nom = $_POST['nom_pil'];
        $prenom = $_POST['prenom_pil'];
        $identifiant =  $_POST['nom_pil'] . "." . $_POST['prenom_pil'];
        $supprpilote = $PDManager->deletePilote($nom, $prenom, $identifiant);
    }

//recherche des droits
    function CompareAucun($debut, $fin, $listdroit)
    {
            for ($i= $debut; $i <= $fin ; $i++) { 
                if (substr_count($listdroit,"0".$i.",")){
                    return TRUE;
                }
                return FALSE;
            }
    }





    require_once('./view/PDview.php');
}