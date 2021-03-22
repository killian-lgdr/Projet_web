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
            <main class="row  justify-content-center marge">
                <div class="col container-fluid">
                   
                    <form action="?action=PDView" method="post">

                        <div class="row justify-content-center littleMarge brd">
                            <div class="col container-fluid">
                                <div class="row justify-content-center">
                                    <div class="col-auto">
                                        <h1>Gestion Délegué</h1>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col">
                                        <label for="nom_del">Nom : </label>
                                        <input type="text" id="nom_del">
                                        <label for="prenom_del">Prénom : </label>
                                        <input type="text" id="prenom_del">                                
                                        <input type="submit" value="Rechercher" ></input>
                                    </div>
                                    <div class="col">
                                        <label for="mdp_del">Mot de passe : </label>
                                        <input type="text" id="mdp_del">
                                    </div>
                                </div>
                                <div class="row justify-content-between">
                                    <div class="col">
                                        <label for="ville_del">Centre : </label>
                                        <input type="text" id="ville_del">
                                    </div>
                                    <div class="col">
                                        <label for="confmdp_del">Confirmer mot de passe : </label>
                                        <input type="text" id="confmdp_del">
                                    </div>
                                </div>
                                <div class="row justify-content-between">
                                    <div class="col-auto">
                                        <!--droit-->
                                    </div>
                                    <div class="col-auto">
                                        <!--droit-->
                                    </div>
                                    <div class="col-auto">
                                        <!--droit-->
                                    </div>
                                    <div class="col-auto">
                                        <!--droit-->
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-auto">
                                        <input type="submit" value="Créer délegué"></input>
                                    </div>
                                    <div class="col-auto">
                                        <input type="submit" value="Modifier délegué"></input>
                                    </div>
                                    <div class="col-auto">
                                        <input type="submit" value="Supprimer délegué"></input>
                                    </div>
                                </div>
                            </div>  
                        </div>
                    </form>
                    <form action="?action=PDView" method="get">
                        <div class="row justify-content-center littleMarge brd">
                            <div class="col container-fluid">
                                <div class="row justify-content-center">
                                    <div class="col-auto">
                                        <h1>Gestion Pilote</h1>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col">
                                        <label for="nom_pil">Nom : </label>
                                        <input type="text" id="nom_pil">
                                        <label for="prenom_pil">Prénom : </label>
                                        <input type="text" id="prenom_pil">                                
                                        <input type="submit" value="Rechercher"></input>
                                    </div>
                                    <div class="col">
                                        <label for="mdp_pil">Mot de passe : </label>
                                        <input type="text" id="mdp_pil">
                                    </div>
                                </div>
                                <div class="row justify-content-between">
                                    <div class="col">
                                        <label for="ville_pil">Centre : </label>
                                        <input type="text" id="ville_pil">
                                    </div>
                                    <div class="col">
                                        <label for="confmdp_pil">Confirmer mot de passe : </label>
                                        <input type="text" id="confmdp_pil">
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-auto">
                                        <input type="submit" value="Créer pilote"></input>
                                    </div>
                                    <div class="col-auto">
                                        <input type="submit" value="Modifier pilote"></input>
                                    </div>
                                    <div class="col-auto">
                                        <input type="submit" value="Supprimer pilote"></input>
                                    </div>
                                </div>
                            </div>  
                        </div>
 
                    </form>
                </div>
            </main>

            <?php
                $obj->display('./public/tpl/footer.tpl');
                $obj->display('./public/tpl/script.tpl');
            ?>
        </body>
    </html>