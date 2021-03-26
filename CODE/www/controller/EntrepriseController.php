<?php

require_once('./model/entrepriseManager.php');

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