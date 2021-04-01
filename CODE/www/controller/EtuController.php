<?php

require_once('./model/EtuManager.php');

function listEtu(){

    $EtuManager = new EtuManager();

    $voirPostule = false;
    $voirWishList = false;
    //Affichage de la wish list et des candidatures
    if($EtuManager->testEtudiant() != null)
    {
        $wishList = $EtuManager->getWishlist(substr(strrchr($_COOKIE['userName'], "."), 1), strtok($_COOKIE['userName'], '.'));
        $postule = $EtuManager->getPostule(substr(strrchr($_COOKIE['userName'], "."), 1), strtok($_COOKIE['userName'], '.'));
        $voirWishList = true;
        $voirPostule = true;
    }
    else if(isset($_POST['rechercher_etu']) && isset($_POST['prenom_etu']) && isset($_POST['nom_etu']) && $_POST['prenom_etu'] != null && $_POST['nom_etu'] != null)
    {
        $postule = $EtuManager->getPostule($_POST['prenom_etu'], $_POST['nom_etu']);
        $voirPostule = true;
    }
    //recherche d'un etudiant
    if (isset($_POST['rechercher_etu'])) {
        $nom = $_POST['nom_etu'];
        $prenom = $_POST['prenom_etu'];
        $rechetudiant = $EtuManager->getetudiant($nom, $prenom);
        $donneeetudiant = $rechetudiant->fetch(PDO::FETCH_LAZY);
    }
    //créer un étudiant
    if (isset($_POST['creer_etu']) && isset($_POST['nom_etu']) && isset($_POST['prenom_etu']) && isset($_POST['ville_etu']) && isset($_POST['mdp_etu'])&& isset($_POST['confmdp_etu']) && $_POST['mdp_etu'] == $_POST['confmdp_etu']) {
        $nom = $_POST['nom_etu'];
        $prenom = $_POST['prenom_etu'];
        $ville = $_POST['ville_etu'];
        $identifiant =  $_POST['nom_etu'] . "." . $_POST['prenom_etu'];
        $mdp = password_hash($_POST['mdp_etu'], PASSWORD_DEFAULT);
        $promotion =$_POST['promotion'];

        $ajoutetudiant = $EtuManager->addEtudiant($nom, $prenom, $ville, $identifiant, $mdp, $promotion);

    }
    //supprimer un étudiant
    if(isset($_POST['supprimer_etu']) && isset($_POST['nom_etu']) && isset($_POST['prenom_etu']))
    {
        $sNom=$_POST['nom_etu'];
        $sPrenom=$_POST['prenom_etu'];
        $sIdentifiant =  $_POST['nom_etu'] . "." . $_POST['prenom_etu'];
        echo $sIdentifiant;
        $supprimerEtu = $EtuManager->deleteEtudiant($sNom, $sPrenom, $sIdentifiant);
    }
    //modifier un étudiant
    if(isset($_POST['modifier_etu']) && isset($_POST['nom_etu']) && isset($_POST['prenom_etu']) && isset($_POST['ville_etu']) && isset($_POST['promotion']))
    {
        $mNom=$_POST['nom_etu'];
        $mPrenom=$_POST['nom_etu'];
        $mVille=$_POST['ville_etu'];
        $mNEtudes=$_POST['promotion'];
        $modifierEtu = $EtuManager->updateEtudiant($mNom, $mPrenom, $mVille, $mNEtudes);
    }
    

    require_once('./view/EtuView.php');
}
?>