<?php
    require_once("./controller/controller.php");

    if (isset($_GET['action'])) {
        switch ($_GET['action']){
            case 'PDView':
                listPD();
                echo "mabite";
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