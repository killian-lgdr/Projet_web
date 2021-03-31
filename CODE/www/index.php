
<!doctype html> 
<html lang="fr"> 
   <head> 
   <link rel="manifest" href="./manifest.JSON">
   <link
        rel="apple-touch-icon"
        sizes="180x180"
        href="https://www.idphoto.app/apple-touch-icon-180x180.png"
    />
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
        <script src="./app.JS"></script>
   </body>
</html> 
