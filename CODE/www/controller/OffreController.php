<?php
require_once('./model/OffreManager.php');
require_once('./model/ConnectUserManager.php');
require_once('functions.php');

function listOffre(){
    $OffreManager = new OffreManager();

    //gestion de l'affichage
    $offre = $OffreManager->getAllOffres();
    $entreprise = $OffreManager->getAllEntreprise();
    $entrepriseSelect = $OffreManager->getAllEntreprise();

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

    //gestion de la connexion
    $connectStatus ='';
    if (isset($_POST['buttonConnect'])){
        $connectStatus = connectUser($_POST['userName'], $_POST['password']);
    }

    if (isset($_POST['exit'])){
        foreach($_COOKIE as $cookie_name => $cookie_value){
            unset($_COOKIE[$cookie_name]);
            setcookie($cookie_name, '', time() - 4200, '/');
         }
    }

    //Gestion des offres
    $infoGestion = '';
    if (isset($_POST['creerGestion'])){
        if(isset($_POST['nameGestion']) && isset($_POST['domaineGestion']) && isset($_POST['dureeGestion']) && isset($_POST['adresseGestion']) && isset($_POST['entrepriseGestion']) && isset($_POST['salaireGestion']) && isset($_POST['nivEtudesGestion']) && isset($_POST['dateGestion']) && isset($_POST['placesGestion']) &&
        $_POST['nameGestion'] != null && $_POST['domaineGestion'] != null && $_POST['dureeGestion'] != null && $_POST['adresseGestion'] != null && $_POST['entrepriseGestion'] != null && $_POST['salaireGestion'] != null && $_POST['nivEtudesGestion'] != null && $_POST['dateGestion'] != null && $_POST['placesGestion'] != null){

            $OffreManager->createOffre($_POST['nameGestion'], $_POST['domaineGestion'], $_POST['dureeGestion'], $_POST['adresseGestion'], $_POST['salaireGestion'], $_POST['nivEtudesGestion'], $_POST['dateGestion'], $_POST['placesGestion'], $_POST['entrepriseGestion']);
            $infoGestion = 'L\'offre est en ligne !';
          }
        else{
            $infoGestion = 'Veuillez compléter tout les champs';
        }
    }
    
    
    require_once('./view/listOffreView.php');
}