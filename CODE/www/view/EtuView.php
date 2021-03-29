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
                    <form action="?action=PDView" method="post">
                        <div class="row justify-content-center littleMarge brd">
                            <div class="col container-fluid">



                                <div class="row justify-content-center littleMarge">
                                    <div class="col-auto">
                                        <h1>Gestion Etudiant</h1>
                                    </div>
                                </div>



                                <div class="row justify-content-left littleMarge">
                                    
                                    <div class="col-auto align-self-center">
                                        <label for="nom_etu">Nom : </label>
                                        <input type="text" name="nom_etu" id="nom_etu" value="<?php if (isset($_POST['rechercher_etu']) && $donneetudiant){echo $donneeetudiant['nom_Etudiant'];}?>">
                                    </div>

                                    <div class="col-auto align-self-center">
                                        <label for="prenom_del">Prénom : </label>
                                        <input type="text" name="prenom_etu" id="prenom_etu" value="<?php if (isset($_POST['rechercher_etu']) && $donneeetudiant){echo $donneeetudiant['prenom_Etudiant'];}?>">                                
                                    </div>

                                    <div class="col-auto align-self-center">
                                        <input type="submit" name="rechercher_etu" value="Rechercher" ></input>
                                    </div>

                                </div>



                                <div class="row justify-content-left littleMarge">

                                    <div class="col-auto align-self-center">
                                        <label for="ville_del">Centre : </label>
                                        <input type="text" name="ville_etu" id="ville_etu" value="<?php if (isset($_POST['rechercher_etu']) && $donneedelegue){echo $donneedelegue['nom_localisation'];}?>">
                                    </div>

                                    <div class="col-auto align-self-center">
                                        <label for="prenom_pil">Prénom Pilote : </label>
                                        <input type="text" name="prenom_pil" id="prenom_pil" value="<?php if(isset($_POST['rechercher_pil']) && $donneepilote){echo $donneepilote['prenom_Pilote'];}?>"> 
                                        </div>
                                    </div>

                                    <div class="col-auto align-self-center">
                                        <label for="mdp_del">Mot de passe : </label>
                                        <input type="text" name="mdp_etu" id="mdp_etu">
                                    </div>

                                </div>



                                <div class="row justify-content-center littleMarge">

                                    <div class="col-auto align-self-center">
                                    <label for="promotion">Promotion :</label>
                                        <select name="promotion" id="promotion">
                                            <option value="A1">A1</option>
                                            <option value="A2">A2</option>
                                            <option value="A3">A3</option>
                                            <option value="A4">A4</option>
                                            <option value="A5">A5</option>
                                        </select>
                                    </div>

                                    <div class="col-auto align-self-center">
                                        <label for="nom_pil">Nom Pilote : </label>
                                        <input type="text" name="nom_pil" id="nom_pil" value="<?php if (isset($_POST['rechercher_etu']) && $donneepilote){echo $donneepilote['nom_Pilote'];}?>">
                                    </div>

                                    <div class="col-auto align-self-center">
                                        <label for="confmdp_etu">Confirmer mot de passe : </label>
                                        <input type="text" name="confmdp_etu" id="confmdp_etu">
                                    </div>
                                </div>

                                <div class="row justify-content-center littleMarge">
                                    <div class="col-auto">
                                        <input type="submit" name="creer_etu" value="Créer délegué"></input>
                                    </div>
                                    <div class="col-auto">
                                        <input type="submit" name="modifier_etu" value="Modifier délegué"></input>
                                    </div>
                                    <div class="col-auto">
                                        <input type="submit" name="supprimer_etu" value="Supprimer délegué"></input>
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