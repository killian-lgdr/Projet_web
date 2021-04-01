<?php

require_once('./model/entrepriseManager.php');


function listEntreprise(){

    $entrepriseManager = new EntrepriseManager();

    //pagination
    $EntreParPage = 5;
    $EntreTotalReq =  $entrepriseManager->totalEntre();
    $EntreTotal = $EntreTotalReq->rowCount();
    $PagesTotal = ceil($EntreTotal/$EntreParPage);

    if(isset($_GET['page']) AND !empty($_GET['page'])){
        $_GET['page'] = intval($_GET['page']);
        $pageCourante = $_GET['page'];
    }
    else {
        $pageCourante = 1;
    }
    $depart = ($pageCourante-1)*$EntreParPage;

    //affichage entreprises

    $ville = $entrepriseManager->getAllville();
    $secteurAct = $entrepriseManager->getAllSecteurAct();
    $entreprise = $entrepriseManager->getAllEntreprise($depart, $EntreParPage);

    // créer une entreprise
    if(isset($_POST['creer_ent'])&& isset($_POST['nameEntreprise'])&& isset($_POST['nameSecteur'])&& isset($_POST['nameVille'])&& isset($_POST['nameNbStage']))
    {
        $cVille = $_POST['nameVille'];
        $cEntreprise = $_POST['nameEntreprise'];
        $cSecteur = $_POST['nameSecteur'];
        $cNbstage = $_POST['nameNbStage'];
        $createEnt = $entrepriseManager->createEntreprise($cVille, $cEntreprise, $cSecteur, $cNbstage);
    }
    //supprimer une entreprise
    if(isset($_POST['supprimer_ent'])&& isset($_POST['nameEntreprise']))
    {
        $sEntreprise = $_POST['nameEntreprise'];
        $supprEnt = $entrepriseManager->supprimerEntreprise($sEntreprise);
    }
    // rechercher une entreprise
    $rechercheResultat = NULL;
    if(isset($_POST['rechercher_ent'])&& isset($_POST['nameEntreprise']))
    { 
        $rEntreprise = $_POST['nameEntreprise'];
        $rechercheEnt = $entrepriseManager->rechercherEntreprise($rEntreprise);
        $rechercheResultat = $rechercheEnt->fetch(PDO::FETCH_LAZY);
    }
    
    //afficher note des entreprises
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
    // afficher une entreprise selon filtres
    if (isset($_POST['entreprise']) || isset($_POST['ville']) || isset($_POST['secteur'])){
        $nomEntreprise = $_POST['entreprise'];
        $nomVille = verif("ville");
        $nomSecteur = verif("secteur");
        $entreprise = $entrepriseManager->getEntreprise($nomEntreprise, $nomVille, $nomSecteur);

    }
    //modifier une entreprise
    if(isset($_POST['modifier_ent'])&& isset($_POST['nameEntreprise'])&& isset($_POST['nameSecteur'])&& isset($_POST['nameVille'])&& isset($_POST['nameNbStage']))
    {
        $mVille = $_POST['nameVille'];
        $mEntreprise = $_POST['nameEntreprise'];
        $mSecteur = $_POST['nameSecteur'];
        $mNbstage = $_POST['nameNbStage'];
        $modifierEnt = $entrepriseManager->modifierEntreprise($mEntreprise, $mVille, $mSecteur, $mNbstage);
    }

    require_once('./view/listEntrepriseView.php');
}
