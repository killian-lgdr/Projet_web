<?php
    require_once("./controller/controller.php");

    if (isset($_GET['action'])) {
        switch ($_GET['action']){
            case 'PDView':
                if(isset($_GET['nom_del']) && isset($_GET['prenom_del']) && !isset($_GET['nom_pil']) && !isset($_GET['prenom_pil']))
                {
                    listPD($_GET['nom_del'], $_GET['prenom_del'], null,null);
                }
                else if(!isset($_GET['nom_del']) && !isset($_GET['prenom_del']) && isset($_GET['nom_pil']) && isset($_GET['prenom_pil']))
                {
                    listPD(null, null, $_GET['nom_pil'], $_GET['prenom_pil']);
                }
                else
                {
                    listPD(null, null, null, null);
                }
                break;
        }
    }

    else {
        listOffre();
    }
?>