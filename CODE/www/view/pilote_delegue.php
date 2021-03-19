<?php
    include_once('../public/vendors/libs/Smarty.class.php');
    $obj = new smarty; 
?>

<!doctype html>
    <html lang="fr">

        <?php
            $obj->assign('titre','gestion pilote et délegué');
            $obj->display('../public/tpl/head.tpl');
        ?>


        <body class="container-fluid">

            <?php  
                $obj->display('../public/tpl/header.tpl');
            ?>
<!--===============main================== -->
            <main class="">


            <?php
                $obj->display('../public/tpl/footer.tpl');
                $obj->display('../public/tpl/script.tpl');
            ?>
        </body>
    </html>