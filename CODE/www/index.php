<?php
    require_once("./controller/OffreController.php");
    require_once("./controller/PDController.php");
    require_once("./controller/EntrepriseController.php");

    if (isset($_GET['action']) && isset($_COOKIE['droits'])) {
        switch ($_GET['action']){
            case 'PDView':
                listPD();
                break;  
            case 'listEntrepriseView':
                listEntreprise();
                break;
        }
    }

    else {
        listOffre();
    }
?>