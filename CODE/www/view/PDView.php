<?php
    include_once('./public/vendors/libs/Smarty.class.php');
    $obj = new smarty; 
?>

<!doctype html>
    <html lang="fr">

        <?php
            $obj->assign('titre','gestion pilote et délegué');
            $obj->display('./public/tpl/head.tpl');
        ?>


        <body class="container-fluid">

            <?php  
                $obj->display('./public/tpl/header.tpl');
            ?>
<!--===============main================== -->
            <main class="row marge">
                <div class="col container-fluid">
                    <div class="col container-fluid brd">
                        <form action="gestion_del" class="">

                            <h1 class="row justify-content-center ">Gestion Délegué</h1>

                            <label for="nom_del">Nom : </label>
                            <input type="text" id="nom_del">

                            <label for="prenom_del">Prénom : </label>
                            <input type="text" id="prenom_del">
                            
                            <button type="">Rechercher</button>
                        </form>
                    </div>

                    <div class="col container-fluid brd marge">
                        <form action="gestion_del" class="">

                            <h1 class="row justify-content-center ">Gestion Pilote</h1>

                            <label for="nom_pil">Nom : </label>
                            <input type="text" id="nom_pil">

                            <label for="prenom_pil">Prénom : </label>
                            <input type="text" id="prenom_pil">

                            <button type="">Rechercher</button>
                        </form>
                    </div>
                </div>
            </main>

            <?php
                $obj->display('./public/tpl/footer.tpl');
                $obj->display('./public/tpl/script.tpl');
            ?>
        </body>
    </html>