<?php
    include_once('./public/vendors/libs/Smarty.class.php');
    $obj = new smarty; 
?>

<!doctype html>
    <html lang="fr">

        <?php
            $obj->assign('titre','gestion étudiant');
            $obj->display('./public/tpl/head.tpl');
        ?>


        <body class="container-fluid">

            <?php  
                $obj->assign('con', $_COOKIE['userName']);
                $obj->assign('id', '');
                $obj->display('./public/tpl/header.tpl');
            ?>

            <main class="row  justify-content-center marge">
                <div class="col container-fluid">

                </div>
            </main>

            <?php
                $obj->display('./public/tpl/footer.tpl');
                $obj->display('./public/tpl/script.tpl');
            ?>
        </body>
    </html>