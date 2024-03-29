<?php
    include_once('./public/vendors/libs/SmartyBC.class.php');
    $obj = new smartyBC; 
?>

<!doctype html>
    <html lang="fr">

<!-- Génération du head -->
        <?php
            $obj->assign('titre','gestion pilote et délegué');
            $obj->display('./public/tpl/head.tpl');
        ?>


        <body class="container-fluid">
<!-- Génération du header -->
            <?php  
                $obj->assign('con', $_COOKIE['userName']);
                $obj->assign('id', '');
                $obj->display('./public/tpl/header.tpl');
            ?>
            
            <main class="row  justify-content-center marge">
                <div class="col container-fluid">
                <?php
                    if (substr_count($_COOKIE['droits'], 'Créer un compte délégué') == 1 || substr_count($_COOKIE['droits'], 'Modifier un compte délégué') == 1 || substr_count($_COOKIE['droits'], 'Supprimer un compte délégué') == 1 || substr_count($_COOKIE['droits'], 'Rechercher un compte délégué') == 1){
                ?>
<!-- Création du formulaire de gestion Délégué -->
                    <form action="?action=PDView" method="post">
                        <div class="row justify-content-center littleMarge brd">
                            <div class="col container-fluid">
                                <div class="row justify-content-center littleMarge">
                                    <div class="col-auto">
                                        <h1>Gestion Délegué</h1>
                                    </div>
                                </div>
            <!-- Création des principales données de gestion Délégué -->
                                <div class="row justify-content-center littleMarge">
                                    <div class="col-auto align-self-center">
                                        <label for="nom_del">Nom : </label>
                                        <input type="text" name="nom_del" id="nom_del" value="<?php if (isset($_POST['rechercher_del']) && $donneedelegue){echo $donneedelegue['nom_Delegue'];}?>">
                                        
                                        <label for="prenom_del">Prénom : </label>
                                        <input type="text" name="prenom_del" id="prenom_del" value="<?php if (isset($_POST['rechercher_del']) && $donneedelegue){echo $donneedelegue['prenom_Delegue'];}?>">                                
                                        <?php
                                            if (substr_count($_COOKIE['droits'], 'Rechercher un compte délégué') == 1){
                                        ?>
                                        <input type="submit" name="rechercher_del" value="Rechercher" ></input>
                                        <?php
                                            }
                                        ?>
                                    </div>
                                    <div class="col-auto align-self-center">
                                        <label for="mdp_del">Mot de passe : </label>
                                        <input type="password" name="mdp_del" id="mdp_del" title="Entre 8 et 16 caractères, 1 chiffre, 1 Majuscule et 1 minuscule" pattern="(?=^.{8,16}$)((?=.*[0-9])|(?=.*W+))(?![.n])(?=.*[A-Z])(?=.*[a-z]).*">
                                    </div>
                                </div>
                                <div class="row justify-content-center littleMarge">
                                    <div class="col-auto align-self-center">
                                        <label for="ville_del">Centre : </label>
                                        <input type="text" name="ville_del" id="ville_del" value="<?php if (isset($_POST['rechercher_del']) && $donneedelegue){echo $donneedelegue['nom_localisation'];}?>">
                                    </div>
                                    <div class="col-auto align-self-center">
                                        <label for="confmdp_del">Confirmer mot de passe : </label>
                                        <input type="password" name="confmdp_del" id="confmdp_del" title="Entre 8 et 16 caractères, 1 chiffre, 1 Majuscule et 1 minuscule" pattern="(?=^.{8,16}$)((?=.*[0-9])|(?=.*W+))(?![.n])(?=.*[A-Z])(?=.*[a-z]).*">
                                    </div>
                                </div>
                <!-- Création des droits de gestion Délégué -->
                                <?php
                                    if (substr_count($_COOKIE['droits'], 'Assigner des droits à un délégué') == 1){
                                ?>
                                    <div class="row justify-content-center littleMarge">
                                    <div class="col-auto align-self-center">
                                        <label for="ges_entre">Gestion des entreprises :</label>
                                    </div>
                                    <div class="col-auto align-self-center">
                                        <select name="ges_droit[]" id="ges_entre" multiple  size="7">
                                            <option value="" <?php if(isset($_POST['rechercher_del']) && $donneedelegue){ if (CompareAucun(1,6,$donneedelegue['ges_droit'])){}else {echo "selected";}}else {echo "selected";}?>>Aucun</option>
                                            <option value="01," <?php if(isset($_POST['rechercher_del']) && $donneedelegue && substr_count($donneedelegue['ges_droit'],"01")){echo "selected";}?>>Rechercher une entreprise</option>
                                            <option value="02," <?php if(isset($_POST['rechercher_del']) && $donneedelegue && substr_count($donneedelegue['ges_droit'],"02")){echo "selected";}?>>Créer une entreprise</option>
                                            <option value="03," <?php if(isset($_POST['rechercher_del']) && $donneedelegue && substr_count($donneedelegue['ges_droit'],"03")){echo "selected";}?>>Modifier une entreprise</option>
                                            <option value="04," <?php if(isset($_POST['rechercher_del']) && $donneedelegue && substr_count($donneedelegue['ges_droit'],"04")){echo "selected";}?>>Evaluer une entreprise</option>
                                            <option value="05," <?php if(isset($_POST['rechercher_del']) && $donneedelegue && substr_count($donneedelegue['ges_droit'],"05")){echo "selected";}?>>Supprimer une entreprise</option>
                                            <option value="06," <?php if(isset($_POST['rechercher_del']) && $donneedelegue && substr_count($donneedelegue['ges_droit'],"06")){echo "selected";}?>>Consulter les stats des entreprises</option>
                                        </select>
                                    </div>
                                    <div class="col-auto align-self-center">
                                        <label for="ges_offre">Gestion des offres de stages :</label>
                                    </div>
                                    <div class="col-auto align-self-center">
                                        <select name="ges_droit[]" id="ges_offre" multiple  size="6">
                                            <option value="" <?php if(isset($_POST['rechercher_del']) && $donneedelegue){ if (CompareAucun(7,11,$donneedelegue['ges_droit'])){}else {echo "selected";}}else {echo "selected";}?>>Aucun</option>
                                            <option value="07," <?php if(isset($_POST['rechercher_del']) && $donneedelegue && substr_count($donneedelegue['ges_droit'],"07")){echo "selected";}?>>Rechercher une offre</option>
                                            <option value="08," <?php if(isset($_POST['rechercher_del']) && $donneedelegue && substr_count($donneedelegue['ges_droit'],"08")){echo "selected";}?>>Créer une offre</option>
                                            <option value="09," <?php if(isset($_POST['rechercher_del']) && $donneedelegue && substr_count($donneedelegue['ges_droit'],"09")){echo "selected";}?>>Modifier une offre</option>
                                            <option value="10," <?php if(isset($_POST['rechercher_del']) && $donneedelegue && substr_count($donneedelegue['ges_droit'],"10")){echo "selected";}?>>Supprimer une offre</option>
                                            <option value="11," <?php if(isset($_POST['rechercher_del']) && $donneedelegue && substr_count($donneedelegue['ges_droit'],"11")){echo "selected";}?>>Consulter les stats des offre</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row justify-content-center littleMarge">
                                    <?php
                                        if (substr_count($_COOKIE['droits'], 'Créer un compte pilote') == 1 || substr_count($_COOKIE['droits'], 'Modifier un compte pilote') == 1 || substr_count($_COOKIE['droits'], 'Supprimer un compte pilote') == 1 || substr_count($_COOKIE['droits'], 'Rechercher un compte pilote') == 1){
                                    ?>
                                    <div class="col-auto align-self-center">
                                        <label for="ges_pil">Gestion des pilotes :</label>
                                    </div>
                                    <div class="col-auto align-self-center">
                                        <select name="ges_droit[]" id="ges_pil" multiple size="5">
                                            <option value="" <?php if(isset($_POST['rechercher_del']) && $donneedelegue){ if (CompareAucun(12,15,$donneedelegue['ges_droit'])){}else {echo "selected";}}else {echo "selected";}?>>Aucun</option>
                                            <option value="12," <?php if(isset($_POST['rechercher_del']) && $donneedelegue && substr_count($donneedelegue['ges_droit'],"12")){echo "selected";}?>>Rechercher un compte pilote</option>
                                            <option value="13," <?php if(isset($_POST['rechercher_del']) && $donneedelegue && substr_count($donneedelegue['ges_droit'],"13")){echo "selected";}?>>Créer un compte pilote</option>
                                            <option value="14," <?php if(isset($_POST['rechercher_del']) && $donneedelegue && substr_count($donneedelegue['ges_droit'],"14")){echo "selected";}?>>Modifier un compte pilote</option>
                                            <option value="15," <?php if(isset($_POST['rechercher_del']) && $donneedelegue && substr_count($donneedelegue['ges_droit'],"15")){echo "selected";}?>>Supprimer un compte pilote</option>
                                        </select>
                                    </div>
                                    <?php
                                        }
                                    ?>
                                    <div class="col-auto align-self-center">
                                        <label for="ges_del">Gestion des délégués :</label>
                                    </div>
                                    <div class="col-auto align-self-center">
                                        <select name="ges_droit[]" id="ges_del" multiple size="5">
                                            <option value="" <?php if(isset($_POST['rechercher_del']) && $donneedelegue){ if (CompareAucun(16,19,$donneedelegue['ges_droit'])){}else {echo "selected";}}else {echo "selected";}?>>Aucun</option>
                                            <option value="16," <?php if(isset($_POST['rechercher_del']) && $donneedelegue && substr_count($donneedelegue['ges_droit'],"16")){echo "selected";}?>>Rechercher un compte délégué</option>
                                            <option value="17," <?php if(isset($_POST['rechercher_del']) && $donneedelegue && substr_count($donneedelegue['ges_droit'],"17")){echo "selected";}?>>Créer un compte délégué</option>
                                            <option value="18," <?php if(isset($_POST['rechercher_del']) && $donneedelegue && substr_count($donneedelegue['ges_droit'],"18")){echo "selected";}?>>Modifier un compte délégué</option>
                                            <option value="19," <?php if(isset($_POST['rechercher_del']) && $donneedelegue && substr_count($donneedelegue['ges_droit'],"19")){echo "selected";}?>>Supprimer un compte délégué</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row justify-content-center littleMarge">
                                    <div class="col-auto align-self-center">
                                        <label for="ges_etu">Gestion des étudiants :</label>
                                    </div>
                                    <div class="col-auto align-self-center">
                                        <select name="ges_droit[]" id="ges_etu" multiple  size="6">
                                            <option value="" <?php if(isset($_POST['rechercher_del']) && $donneedelegue){ if (CompareAucun(20,24,$donneedelegue['ges_droit'])){}else {echo "selected";}}else {echo "selected";}?>>Aucun</option>
                                            <option value="20," <?php if(isset($_POST['rechercher_del']) && $donneedelegue && substr_count($donneedelegue['ges_droit'],"20")){echo "selected";}?>>Rechercher un compte étudiant</option>
                                            <option value="21," <?php if(isset($_POST['rechercher_del']) && $donneedelegue && substr_count($donneedelegue['ges_droit'],"21")){echo "selected";}?>>Créer un compte étudiant</option>
                                            <option value="22," <?php if(isset($_POST['rechercher_del']) && $donneedelegue && substr_count($donneedelegue['ges_droit'],"22")){echo "selected";}?>>Modifier un compte étudiant</option>
                                            <option value="23," <?php if(isset($_POST['rechercher_del']) && $donneedelegue && substr_count($donneedelegue['ges_droit'],"23")){echo "selected";}?>>Supprimer un compte étudiant</option>
                                            <option value="24," <?php if(isset($_POST['rechercher_del']) && $donneedelegue && substr_count($donneedelegue['ges_droit'],"24")){echo "selected";}?>>Consulter les stats des étudiants</option>
                                        </select>
                                    </div>
                                    <div class="col-auto align-self-center">
                                        <label for="ges_can">Gestion des candidatures :</label>
                                    </div>
                                    <div class="col-auto align-self-center">
                                        <select name="ges_droit[]" id="ges_can" multiple  size="5">
                                            <option value="" <?php if(isset($_POST['rechercher_del']) && $donneedelegue){ if (CompareAucun(25,33,$donneedelegue['ges_droit'])){}else {echo "selected";}}else {echo "selected";}?>>Aucun</option>
                                            <option value="30," <?php if(isset($_POST['rechercher_del']) && $donneedelegue && substr_count($donneedelegue['ges_droit'],"30")){echo "selected";}?>>Informer le système de l'avancement de la candidature step 3</option>
                                            <option value="31," <?php if(isset($_POST['rechercher_del']) && $donneedelegue && substr_count($donneedelegue['ges_droit'],"31")){echo "selected";}?>>Informer le système de l'avancement de la candidature step 4</option>
                                            <option value="32," <?php if(isset($_POST['rechercher_del']) && $donneedelegue && substr_count($donneedelegue['ges_droit'],"32")){echo "selected";}?>>Informer le système de l'avancement de la candidature step 5</option>
                                            <option value="33," <?php if(isset($_POST['rechercher_del']) && $donneedelegue && substr_count($donneedelegue['ges_droit'],"33")){echo "selected";}?>>Informer le système de l'avancement de la candidature step 6</option>
                                        </select>
                                    </div>
                                </div>
                                <?php
                                    }
                                ?>
                <!-- Création des boutons de gestion Délégué -->
                                <div class="row justify-content-center littleMarge">
                                <?php
                                    if (substr_count($_COOKIE['droits'], 'Créer un compte délégué') == 1){
                                ?>
                                    <div class="col-auto">
                                        <input type="submit" name="creer_del" value="Créer délégué"></input>
                                    </div>
                                <?php
                                    }
                                    if (substr_count($_COOKIE['droits'], 'Modifier un compte délégué') == 1){
                                ?>
                                    <div class="col-auto">
                                        <input type="submit" name="modifier_del" value="Modifier délégué"></input>
                                    </div>
                                <?php
                                    }
                                    if (substr_count($_COOKIE['droits'], 'Supprimer un compte délégué') == 1){
                                ?>
                                    <div class="col-auto">
                                        <input type="submit" name="supprimer_del" value="Supprimer délégué"></input>
                                    </div>
                                <?php
                                    }
                                ?>
                                </div>
                            </div>  
                        </div>
                    </form>
                    <?php
                        }
                        if (substr_count($_COOKIE['droits'], 'Créer un compte pilote') == 1 || substr_count($_COOKIE['droits'], 'Modifier un compte pilote') == 1 || substr_count($_COOKIE['droits'], 'Supprimer un compte pilote') == 1 || substr_count($_COOKIE['droits'], 'Rechercher un compte pilote') == 1){
                    ?>
<!-- Création du formulaire de gestion Pilote -->
                    <form action="?action=PDView" method="post">
                        <div class="row justify-content-center littleMarge brd">
                            <div class="col container-fluid">
                                <div class="row justify-content-center">
                                    <div class="col-auto">
                                        <h1>Gestion Pilote</h1>
                                    </div>
                                </div>
            <!-- Création des principales données de gestion Pilote -->
                                <div class="row justify-content-center littleMarge">
                                    <div class="col-auto align-self-center">
                                        <label for="nom_pil">Nom : </label>
                                        <input type="text" name="nom_pil" id="nom_pil" value="<?php if (isset($_POST['rechercher_pil']) && $donneepilote){echo $donneepilote['nom_Pilote'];}?>">

                                        <label for="prenom_pil">Prénom : </label>
                                        <input type="text" name="prenom_pil" id="prenom_pil" value="<?php if(isset($_POST['rechercher_pil']) && $donneepilote){echo $donneepilote['prenom_Pilote'];}?>"> 
                                        <?php
                                            if (substr_count($_COOKIE['droits'], 'Rechercher un compte pilote') == 1){
                                        ?>
                                        <input type="submit" name="rechercher_pil" value="Rechercher"></input>
                                        <?php
                                            }
                                        ?>
                                    </div>
                                    <div class="col-auto align-self-center">
                                        <label for="mdp_pil">Mot de passe : </label>
                                        <input type="password" name ="mdp_pil" id="mdp_pil" title="Entre 8 et 16 caractères, 1 chiffre, 1 Majuscule et 1 minuscule" pattern="(?=^.{8,16}$)((?=.*[0-9])|(?=.*W+))(?![.n])(?=.*[A-Z])(?=.*[a-z]).*">
                                    </div>
                                </div>

                                <div class="row justify-content-center littleMarge">
                                    <div class="col-auto align-self-center">
                                        <label for="ville_pil">Centre : </label>
                                        <input type="text" name="ville_pil" id="ville_pil" value="<?php if(isset($_POST['rechercher_pil']) && $donneepilote){echo $donneepilote['nom_localisation'];}?>">           
                                    </div>

                                    <div class="col-auto align-self-center">
                                        <label for="confmdp_pil">Confirmer mot de passe : </label>
                                        <input type="password" name ="confmdp_pil" id="confmdp_pil" title="Entre 8 et 16 caractères, 1 chiffre, 1 Majuscule et 1 minuscule" pattern="(?=^.{8,16}$)((?=.*[0-9])|(?=.*W+))(?![.n])(?=.*[A-Z])(?=.*[a-z]).*">
                                    </div>
                                </div>

                                <div class="row justify-content-center littleMarge">
                                    <div class="col-auto">
                                        <label for="ville_pil">Promotion : </label>
                                    </div>
                                    <div class="col-auto">
                                        <input type="checkbox" name="promotion_pil[]" value="A1" id="A1_pil" <?php if(isset($_POST['rechercher_pil']) && $donneepilote && substr_count($donneepilote['promotion'],"A1")){echo "checked";}?>>
                                        <label for="A1_pil">1ère Année</label>
                                    </div>
                                    <div class="col-auto">
                                        <input type="checkbox" name="promotion_pil[]" value="A2" id="A2_pil" <?php if(isset($_POST['rechercher_pil']) && $donneepilote && substr_count($donneepilote['promotion'],"A2")){echo "checked";}?>>
                                        <label for="A2_pil">2ème Année</label>
                                    </div>
                                    <div class="col-auto">
                                        <input type="checkbox" name="promotion_pil[]" value="A3" id="A3_pil" <?php if(isset($_POST['rechercher_pil']) && $donneepilote && substr_count($donneepilote['promotion'],"A3")){echo "checked";}?>>
                                        <label for="A3_pil">3ème Année</label>
                                    </div>
                                    <div class="col-auto">
                                        <input type="checkbox" name="promotion_pil[]" value="A4" id="A4_pil" <?php if(isset($_POST['rechercher_pil']) && $donneepilote && substr_count($donneepilote['promotion'],"A4")){echo "checked";}?>>
                                        <label for="A4_pil">4ème Année</label>
                                    </div>
                                    <div class="col-auto">
                                        <input type="checkbox" name="promotion_pil[]" value="A5" id="A5_pil" <?php if(isset($_POST['rechercher_pil']) && $donneepilote && substr_count($donneepilote['promotion'],"A5")){echo "checked";}?>>
                                        <label for="A5_pil">5ème Année</label>
                                    </div>
                                </div>
            <!-- Création des boutons de gestion Pilote -->
                                <div class="row justify-content-center littleMarge">
                                    <?php
                                        if (substr_count($_COOKIE['droits'], 'Créer un compte pilote') == 1){
                                    ?>
                                    <div class="col-auto">
                                        <input type="submit" name="creer_pil" value="Créer pilote"></input>
                                    </div>
                                    <?php
                                        }
                                        if (substr_count($_COOKIE['droits'], 'Modifier un compte pilote') == 1){
                                    ?>
                                    <div class="col-auto">
                                        <input type="submit" name="modifier_pil" value="Modifier pilote"></input>
                                    </div>
                                    <?php
                                        }
                                        if (substr_count($_COOKIE['droits'], 'Supprimer un compte pilote') == 1){
                                    ?>
                                    <div class="col-auto">
                                        <input type="submit" name="supprimer_pil" value="Supprimer pilote"></input>
                                    </div>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                
                    </form>
                    <?php
                        }
                    ?>
                </div>
            </main>
<!-- Génération du footer -->
            <?php
                $obj->display('./public/tpl/footer.tpl');
                $obj->display('./public/tpl/script.tpl');
            ?>
        </body>
    </html>