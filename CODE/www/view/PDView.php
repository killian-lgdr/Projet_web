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
                            <?php 
                                if (isset($_POST['rechercher_del'])) {
                                    $donnee=$delegue->fetch(PDO::FETCH_LAZY);
                                }
                            ?>
                            <div class="col container-fluid">
                                <div class="row justify-content-center">
                                    <div class="col-auto">
                                        <h1>Gestion Délegué</h1>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-auto align-self-center">
                                        <label for="nom_del">Nom : </label>
                                        <input type="text" name="nom_del" id="nom_del" value="<?php if (isset($_POST['rechercher_del']) && $donnee){echo $donnee['nom_Delegue'];}?>">
                                        
                                        <label for="prenom_del">Prénom : </label>
                                        <input type="text" name="prenom_del" id="prenom_del" value="<?php if (isset($_POST['rechercher_del']) && $donnee){echo $donnee['prenom_Delegue'];}?>">                                
                                        
                                        <input type="submit" name="rechercher_del" value="Rechercher" ></input>
                                    </div>
                                    <div class="col-auto align-self-center">
                                        <label for="mdp_del">Mot de passe : </label>
                                        <input type="text" name="mdp_del" id="mdp_del">
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-auto align-self-center">
                                        <label for="ville_del">Centre : </label>
                                        <input type="text" id="ville_del" value="<?php if (isset($_POST['rechercher_del']) && $donnee){echo $donnee['nom_localisation'];}?>">
                                    </div>
                                    <div class="col-auto align-self-center">
                                        <label for="confmdp_del">Confirmer mot de passe : </label>
                                        <input type="text" name="confmdp_del" id="confmdp_del">
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
                                <div class="row justify-content-center littleMarge">
                                    <div class="col-auto">
                                        <input type="submit" name="creer_del" value="Créer délegué"></input>
                                    </div>
                                    <div class="col-auto">
                                        <input type="submit" name="modifier_del" value="Modifier délegué"></input>
                                    </div>
                                    <div class="col-auto">
                                        <input type="submit" name="supprimer_del" value="Supprimer délegué"></input>
                                    </div>
                                </div>
                            </div>  
                        </div>
                    </form>
                    <form action="?action=PDView" method="post">
                        <div class="row justify-content-center littleMarge brd">
                            <?php 
                                if (isset($_POST['rechercher_pil'])) {
                                    $donnee=$pilote->fetch(PDO::FETCH_LAZY);
                                }
                            ?>
                            <div class="col container-fluid">
                                <div class="row justify-content-center">
                                    <div class="col-auto">
                                        <h1>Gestion Pilote</h1>
                                    </div>
                                </div>

                                <div class="row justify-content-center littleMarge">
                                    <div class="col-auto align-self-center">
                                        <label for="nom_pil">Nom : </label>
                                        <input type="text" name="nom_pil" id="nom_pil" value="<?php if (isset($_POST['rechercher_pil']) && $donnee){echo $donnee['nom_Pilote'];}?>">

                                        <label for="prenom_pil">Prénom : </label>
                                        <input type="text" name="prenom_pil" id="prenom_pil" value="<?php if(isset($_POST['rechercher_pil']) && $donnee){echo $donnee['prenom_Pilote'];}?>"> 

                                        <input type="submit" name="rechercher_pil" value="Rechercher"></input>
                                    </div>
                                    <div class="col-auto align-self-center">
                                        <label for="mdp_pil">Mot de passe : </label>
                                        <input type="text" name ="mdp_pil" id="mdp_pil">
                                    </div>
                                </div>

                                <div class="row justify-content-center littleMarge">
                                    <div class="col-auto align-self-center">
                                        <label for="ville_pil">Centre : </label>
                                        <input type="text" name="ville_pil" id="ville_pil" value="<?php if(isset($_POST['rechercher_pil']) && $donnee){echo $donnee['nom_localisation'];}?>">           
                                    </div>

                                    <div class="col-auto align-self-center">
                                        <label for="confmdp_pil">Confirmer mot de passe : </label>
                                        <input type="text" name ="confmdp_pil" id="confmdp_pil">
                                    </div>
                                </div>

                                <div class="row justify-content-center littleMarge">
                                    <div class="col-auto">
                                        <label for="ville_pil">Promotion : </label>
                                    </div>
                                    <div class="col-auto">
                                        <input type="checkbox" name="promotion_pil[]" value="A1" id="A1_pil" <?php if(isset($_POST['rechercher_pil']) && $donnee && substr_count($donnee['promotion'],"A1")){echo "checked";}?>>
                                        <label for="A1_pil">1ère Année</label>
                                    </div>
                                    <div class="col-auto">
                                        <input type="checkbox" name="promotion_pil[]" value="A2" id="A2_pil" <?php if(isset($_POST['rechercher_pil']) && $donnee && substr_count($donnee['promotion'],"A2")){echo "checked";}?>>
                                        <label for="A2_pil">2ème Année</label>
                                    </div>
                                    <div class="col-auto">
                                        <input type="checkbox" name="promotion_pil[]" value="A3" id="A3_pil" <?php if(isset($_POST['rechercher_pil']) && $donnee && substr_count($donnee['promotion'],"A3")){echo "checked";}?>>
                                        <label for="A3_pil">3ème Année</label>
                                    </div>
                                    <div class="col-auto">
                                        <input type="checkbox" name="promotion_pil[]" value="A4" id="A4_pil" <?php if(isset($_POST['rechercher_pil']) && $donnee && substr_count($donnee['promotion'],"A4")){echo "checked";}?>>
                                        <label for="A4_pil">4ème Année</label>
                                    </div>
                                    <div class="col-auto">
                                        <input type="checkbox" name="promotion_pil[]" value="A5" id="A5_pil" <?php if(isset($_POST['rechercher_pil']) && $donnee && substr_count($donnee['promotion'],"A5")){echo "checked";}?>>
                                        <label for="A5_pil">5ème Année</label>
                                    </div>
                                </div>
                                <div class="row justify-content-center littleMarge">
                                    <div class="col-auto">
                                        <input type="submit" name="creer_pil" value="Créer pilote"></input>
                                    </div>
                                    <div class="col-auto">
                                        <input type="submit" name="modifier_pil" value="Modifier pilote"></input>
                                    </div>
                                    <div class="col-auto">
                                        <input type="submit" name="supprimer_pil" value="Supprimer pilote"></input>
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