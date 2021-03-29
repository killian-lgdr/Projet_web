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

    require_once('./view/EtuView.php');
}
?>