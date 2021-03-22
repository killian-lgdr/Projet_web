<?php
    require_once("./controller/controller.php");

    if (isset($_GET['action'])) {
        switch ($_GET['action']){
            case 'PDView':
                listPD($_GET['nom_del'], $_GET['prenom_del'], $_GET['nom_pil'], $_GET['prenom_pil']);
                break;
        }
    }

    else {
        listOffre($_POST['domaine'], $_POST['ville']);
    }
?>