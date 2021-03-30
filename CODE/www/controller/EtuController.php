<?php

require_once('./model/EtuManager.php');

function listEtu(){

    $EtuManager = new EtuManager();

    if (isset($_POST['rechercher_etu'])) {
        $nom = $_POST['nom_etu'];
        $prenom = $_POST['prenom_etu'];
        $rechetudiant = $EtuManager->getetudiant($nom, $prenom);
        $donneeetudiant = $rechetudiant->fetch(PDO::FETCH_LAZY);
    }

    if (isset($_POST['creer_etu']) && isset($_POST['nom_etu']) && isset($_POST['prenom_etu']) && isset($_POST['ville_etu']) && isset($_POST['mdp_etu'])&& isset($_POST['confmdp_etu']) && $_POST['mdp_etu'] == $_POST['confmdp_etu']) {
        $nom = $_POST['nom_etu'];
        $prenom = $_POST['prenom_etu'];
        $ville = $_POST['ville_etu'];
        $identifiant =  $_POST['nom_etu'] . "." . $_POST['prenom_etu'];
        $mdp = password_hash($_POST['mdp_etu'], PASSWORD_DEFAULT);
        $promotion =$_POST['promotion'];

        $ajoutetudiant = $EtuManager->addEtudiant($nom, $prenom, $ville, $identifiant, $mdp, $promotion);

    }

    if(isset($_POST['supprimer_etu']) && isset($_POST['nom_etu']) && isset($_POST['prenom_etu']))
    {
        $sNom=$_POST['nom_etu'];
        $sPrenom=$_POST['nom_etu'];
        $supprimerEtu = $EtuManager->deleteEtudiant($sNom, $sPrenom);
    }

    if(isset($_POST['modifier_etu']) && isset($_POST['nom_etu']) && isset($_POST['prenom_etu']) && isset($_POST['ville_etu']) && isset($_POST['promotion']))
    {
        $mNom=$_POST['nom_etu'];
        $mPrenom=$_POST['nom_etu'];
        $mVille=$_POST['ville_etu'];
        $mNEtudes=$_POST['promotion'];
        $supprimerEtu = $EtuManager->updateEtudiant($mNom, $mPrenom, $mVille, $mNEtudes);
    }
    

    require_once('./view/EtuView.php');
}
?>