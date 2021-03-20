<?php
    require_once("./controller/controller.php");

    if (isset($_GET['action'])) {
        switch ($_GET['action']){
            case 'listEntreprise':
                //listEntreprise();
                break;
        }
    }

    else {
        listOffre();
    }
?>