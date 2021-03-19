<?php
    require_once('model/OffreManager.php');

    function listOffre(){
        $OffreManager = new OffreManager();
        $offre = $OffreManager->getAllOffres();

        require_once('view/listOffreView.php');
    }
?>