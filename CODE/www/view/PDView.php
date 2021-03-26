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
                $obj->assign('con', $_COOKIE['userName']);
                $obj->assign('id', '');
                //$obj->display('./public/tpl/header.tpl');
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
                                <div class="row justify-content-center littleMarge">
                                    <div class="col-auto">
                                        <h1>Gestion Délegué</h1>
                                    </div>
                                </div>
                                <div class="row justify-content-center littleMarge">
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
                                <div class="row justify-content-center littleMarge">
                                    <div class="col-auto align-self-center">
                                        <label for="ville_del">Centre : </label>
                                        <input type="text" id="ville_del" value="<?php if (isset($_POST['rechercher_del']) && $donnee){echo $donnee['nom_localisation'];}?>">
                                    </div>
                                    <div class="col-auto align-se   lf-center">
                                        <label for="confmdp_del">Confirmer mot de passe : </label>
                                        <input type="text" name="confmdp_del" id="confmdp_del">
                                    </div>
                                </div>
                                <div class="row justify-content-center littleMarge">
                                    <div class="col-auto align-self-center">
                                        <label for="ges_entre">Gestion des entreprises :</label>
                                    </div>
                                    <div class="col-auto align-self-center">
                                        <select name="ges_droit[]" id="ges_entre" multiple  size="7">
                                            <option value="00," selected>Aucun</option>
                                            <option value="01," <?php if(isset($_POST['rechercher_del']) && $donnee && substr_count($donnee['ges_droit'],"1")){echo "selected";}?>>Rechercher une entreprise</option>
                                            <option value="02," <?php if(isset($_POST['rechercher_del']) && $donnee && substr_count($donnee['ges_droit'],"2")){echo "selected";}?>>Créer une entreprise</option>
                                            <option value="03," <?php if(isset($_POST['rechercher_del']) && $donnee && substr_count($donnee['ges_droit'],"3")){echo "selected";}?>>Modifier une entreprise</option>
                                            <option value="04," <?php if(isset($_POST['rechercher_del']) && $donnee && substr_count($donnee['ges_droit'],"4")){echo "selected";}?>>Evaluer une entreprise</option>
                                            <option value="05," <?php if(isset($_POST['rechercher_del']) && $donnee && substr_count($donnee['ges_droit'],"5")){echo "selected";}?>>Supprimer une entreprise</option>
                                            <option value="06," <?php if(isset($_POST['rechercher_del']) && $donnee && substr_count($donnee['ges_droit'],"6")){echo "selected";}?>>Consulter les stats des entreprises</option>
                                        </select>
                                    </div>
                                    <div class="col-auto align-self-center">
                                        <label for="ges_offre">Gestion des offres de stages :</label>
                                    </div>
                                    <div class="col-auto align-self-center">
                                        <select name="ges_droit[]" id="ges_offre" multiple  size="6">
                                            <option value="00," selected>Aucun</option>
                                            <option value="07," <?php if(isset($_POST['rechercher_del']) && $donnee && substr_count($donnee['ges_droit'],"07")){echo "selected";}?>>Rechercher une offre</option>
                                            <option value="08," <?php if(isset($_POST['rechercher_del']) && $donnee && substr_count($donnee['ges_droit'],"08")){echo "selected";}?>>Créer une offre</option>
                                            <option value="09," <?php if(isset($_POST['rechercher_del']) && $donnee && substr_count($donnee['ges_droit'],"09")){echo "selected";}?>>Modifier une offre</option>
                                            <option value="10," <?php if(isset($_POST['rechercher_del']) && $donnee && substr_count($donnee['ges_droit'],"10")){echo "selected";}?>>Supprimer une offre</option>
                                            <option value="11," <?php if(isset($_POST['rechercher_del']) && $donnee && substr_count($donnee['ges_droit'],"11")){echo "selected";}?>>Consulter les stats des offre</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row justify-content-center littleMarge">
                                    <div class="col-auto align-self-center">
                                        <label for="ges_pil">Gestion des pilotes :</label>
                                    </div>
                                    <div class="col-auto align-self-center">
                                        <select name="ges_droit[]" id="ges_pil" multiple size="5">
                                            <option value="00," selected>Aucun</option>
                                            <option value="12," <?php if(isset($_POST['rechercher_del']) && $donnee && substr_count($donnee['ges_droit'],"12")){echo "selected";}?>>Rechercher un compte pilote</option>
                                            <option value="13," <?php if(isset($_POST['rechercher_del']) && $donnee && substr_count($donnee['ges_droit'],"13")){echo "selected";}?>>Créer un compte pilote</option>
                                            <option value="14," <?php if(isset($_POST['rechercher_del']) && $donnee && substr_count($donnee['ges_droit'],"14")){echo "selected";}?>>Modifier un compte pilote</option>
                                            <option value="15," <?php if(isset($_POST['rechercher_del']) && $donnee && substr_count($donnee['ges_droit'],"15")){echo "selected";}?>>Supprimer un compte pilote</option>
                                        </select>
                                    </div>
                                    <div class="col-auto align-self-center">
                                        <label for="ges_del">Gestion des délégués :</label>
                                    </div>
                                    <div class="col-auto align-self-center">
                                        <select name="ges_droit[]" id="ges_del" multiple size="5">
                                            <option value="00," selected>Aucun</option>
                                            <option value="16," <?php if(isset($_POST['rechercher_del']) && $donnee && substr_count($donnee['ges_droit'],"16")){echo "selected";}?>>Rechercher un compte délégué</option>
                                            <option value="17," <?php if(isset($_POST['rechercher_del']) && $donnee && substr_count($donnee['ges_droit'],"17")){echo "selected";}?>>Créer un compte délégué</option>
                                            <option value="18," <?php if(isset($_POST['rechercher_del']) && $donnee && substr_count($donnee['ges_droit'],"18")){echo "selected";}?>>Modifier un compte délégué</option>
                                            <option value="19," <?php if(isset($_POST['rechercher_del']) && $donnee && substr_count($donnee['ges_droit'],"19")){echo "selected";}?>>Supprimer un compte délégué</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row justify-content-center littleMarge">
                                    <div class="col-auto align-self-center">
                                        <label for="ges_etu">Gestion des étudiants :</label>
                                    </div>
                                    <div class="col-auto align-self-center">
                                        <select name="ges_droit[]" id="ges_etu" multiple  size="6">
                                            <option value="00," selected>Aucun</option>
                                            <option value="20," <?php if(isset($_POST['rechercher_del']) && $donnee && substr_count($donnee['ges_droit'],"20")){echo "selected";}?>>Rechercher un compte étudiant</option>
                                            <option value="21," <?php if(isset($_POST['rechercher_del']) && $donnee && substr_count($donnee['ges_droit'],"21")){echo "selected";}?>>Créer un compte étudiant</option>
                                            <option value="22," <?php if(isset($_POST['rechercher_del']) && $donnee && substr_count($donnee['ges_droit'],"22")){echo "selected";}?>>Modifier un compte étudiant</option>
                                            <option value="23," <?php if(isset($_POST['rechercher_del']) && $donnee && substr_count($donnee['ges_droit'],"23")){echo "selected";}?>>Supprimer un compte étudiant</option>
                                            <option value="24," <?php if(isset($_POST['rechercher_del']) && $donnee && substr_count($donnee['ges_droit'],"24")){echo "selected";}?>>Consulter les stats des étudiants</option>
                                        </select>
                                    </div>
                                    <div class="col-auto align-self-center">
                                        <label for="ges_can">Gestion des candidatures :</label>
                                    </div>
                                    <div class="col-auto align-self-center">
                                        <select name="ges_droit[]" id="ges_can" multiple  size="10">
                                            <option value="00," selected>Aucun</option>
                                            <option value="25," <?php if(isset($_POST['rechercher_del']) && $donnee && substr_count($donnee['ges_droit'],"25")){echo "selected";}?>>Ajouter une offre à la wish-list</option>
                                            <option value="26," <?php if(isset($_POST['rechercher_del']) && $donnee && substr_count($donnee['ges_droit'],"26")){echo "selected";}?>>Retirer une offre à la wish-list</option>
                                            <option value="27," <?php if(isset($_POST['rechercher_del']) && $donnee && substr_count($donnee['ges_droit'],"27")){echo "selected";}?>>Postuler à une offre</option>
                                            <option value="28," <?php if(isset($_POST['rechercher_del']) && $donnee && substr_count($donnee['ges_droit'],"28")){echo "selected";}?>>Informer le système de l'avancement de la candidature step 1</option>
                                            <option value="29," <?php if(isset($_POST['rechercher_del']) && $donnee && substr_count($donnee['ges_droit'],"29")){echo "selected";}?>>Informer le système de l'avancement de la candidature step 2</option>
                                            <option value="30," <?php if(isset($_POST['rechercher_del']) && $donnee && substr_count($donnee['ges_droit'],"30")){echo "selected";}?>>Informer le système de l'avancement de la candidature step 3</option>
                                            <option value="31," <?php if(isset($_POST['rechercher_del']) && $donnee && substr_count($donnee['ges_droit'],"31")){echo "selected";}?>>Informer le système de l'avancement de la candidature step 4</option>
                                            <option value="32," <?php if(isset($_POST['rechercher_del']) && $donnee && substr_count($donnee['ges_droit'],"32")){echo "selected";}?>>Informer le système de l'avancement de la candidature step 5</option>
                                            <option value="33," <?php if(isset($_POST['rechercher_del']) && $donnee && substr_count($donnee['ges_droit'],"33")){echo "selected";}?>>Informer le système de l'avancement de la candidature step 6</option>
                                        </select>
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
                                        <input type="password" name ="mdp_pil" id="mdp_pil">
                                    </div>
                                </div>

                                <div class="row justify-content-center littleMarge">
                                    <div class="col-auto align-self-center">
                                        <label for="ville_pil">Centre : </label>
                                        <input type="text" name="ville_pil" id="ville_pil" value="<?php if(isset($_POST['rechercher_pil']) && $donnee){echo $donnee['nom_localisation'];}?>">           
                                    </div>

                                    <div class="col-auto align-self-center">
                                        <label for="confmdp_pil">Confirmer mot de passe : </label>
                                        <input type="password" name ="confmdp_pil" id="confmdp_pil">
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