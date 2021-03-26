<?php
require_once('./model/OffreManager.php');
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

    if (isset($_POST['exit'])){
        foreach($_COOKIE as $cookie_name => $cookie_value){
            unset($_COOKIE[$cookie_name]);
            setcookie($cookie_name, '', time() - 4200, '/');
         }
    }
    
    
    require_once('./view/listOffreView.php');
}