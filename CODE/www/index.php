
<!doctype html> 
<html lang="fr"> 
   <head> 
   <link rel="manifest" href="/pwa/manifest.JSON">
   <script src="./pwa/app.JS"></script>
   </head> 

   <body> 
   <?php
    require_once("./controller/OffreController.php");
    require_once("./controller/PDController.php");
    require_once("./controller/EntrepriseController.php");
    require_once("./controller/EtuController.php");

    if (isset($_GET['action']) && isset($_COOKIE['droits'])) {
        switch ($_GET['action']){
            case 'PDView':
                listPD();
                break;  
            case 'listEntrepriseView':
                listEntreprise();
                break;
            case 'EtuView':
                listEtu();
                break;
        }
    }

    else {
        listOffre();
    }
?>
   </body>
</html> 
