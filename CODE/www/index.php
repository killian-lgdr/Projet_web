<?php
    require_once("./controller/controller.php");

    if (isset($_GET['action'])) {
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