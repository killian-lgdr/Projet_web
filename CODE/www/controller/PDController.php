<?php

require_once('./model/PDManager.php');

function listPD(){
        
    $PDManager = new PDManager();
//===============Délegué===============
//rechercher
    if (isset($_POST['rechercher_del'])) {
        $nom = $_POST['nom_del'];
        $prenom = $_POST['prenom_del'];
        $delegue = $PDManager->getDelegue($nom, $prenom);
    }
//creer
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
        echo "droit : ";
        echo $droit;
        $delegue = $PDManager->addDelegue($nom, $prenom, $ville, $identifiant, $mdp, $droit);
    }
//suppression
    if (isset($_POST['supprimer_del'])&& isset($_POST['nom_del']) && isset($_POST['prenom_del'])) {
        $nom = $_POST['nom_del'];
        $prenom = $_POST['prenom_del'];
        $identifiant =  $_POST['nom_del'] . "." . $_POST['prenom_del'];
        $pilote = $PDManager->deleteDelegue($nom, $prenom, $identifiant);
    }
//===============Pïlote===============
//rechercher
    if (isset($_POST['rechercher_pil'])) {
        $nom = $_POST['nom_pil'];
        $prenom = $_POST['prenom_pil'];
        $pilote = $PDManager->getPilote($nom, $prenom);
    }
//creer
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
    }
//suppression
    if (isset($_POST['supprimer_pil'])&& isset($_POST['nom_pil']) && isset($_POST['prenom_pil'])) {
        $nom = $_POST['nom_pil'];
        $prenom = $_POST['prenom_pil'];
        $identifiant =  $_POST['nom_pil'] . "." . $_POST['prenom_pil'];
        $pilote = $PDManager->deletePilote($nom, $prenom, $identifiant);
    }
//recherche des droits
    function CompareAucun($test, $var)
    {
        if (isset($_POST['rechercher_del'])) {
            for ($i=0; $i < strlen($var['ges_droit'])-1; $i+=3) { 
                if ($listdroit[$i].$listdroit[$i+1]== $test){
                    return "selected";
                }
            }
            return "";
        }
        else{
            return 'selected';
        }
    }

    require_once('./view/PDview.php');
}