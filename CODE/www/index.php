<?php
    require_once("./controller/controller.php");

    if (isset($_GET['action'])) {
        switch ($_GET['action']){
            case 'PDView':
                listPD();
                break;
        }
    }

    else {
        listOffre($_POST['domaine'], $_POST['ville']);
    }
?>