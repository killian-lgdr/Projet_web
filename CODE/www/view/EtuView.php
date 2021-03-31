<?php
    include_once('./public/vendors/libs/SmartyBC.class.php');
    $obj = new smartyBC;
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
<!--===============main================== -->
            <main class="row  justify-content-center marge">
                <div class="col container-fluid">

<!--Gestion Etudiant -->
                    <?php
                        if (substr_count($_COOKIE['droits'], 'Créer un compte étudiant') == 1 || substr_count($_COOKIE['droits'], 'Modifier un compte étudiant') == 1 || substr_count($_COOKIE['droits'], 'Supprimer un compte étudiant') == 1){
                    ?>
                    <form action="?action=EtuView" method="post">
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
                                        <input type="text" name="nom_etu" id="nom_etu" value="<?php if (isset($_POST['rechercher_etu']) && $donneeetudiant){echo $donneeetudiant['nom_Etudiant'];}?>">
                                    </div>
                                    <div class="col-auto align-self-center">
                                        <label for="prenom_del">Prénom : </label>
                                        <input type="text" name="prenom_etu" id="prenom_etu" value="<?php if (isset($_POST['rechercher_etu']) && $donneeetudiant){echo $donneeetudiant['prenom_Etudiant'];}?>">                                
                                    </div>
                                    <div class="col-auto align-self-center">
                                        <input type="submit" name="rechercher_etu" value="Rechercher" ></input>
                                    </div>
                                </div>

                                <div class="row justify-content-center littleMarge">

                                    <div class="col-auto align-self-center">
                                        <label for="ville_del">Centre : </label>
                                        <input type="text" name="ville_etu" id="ville_etu" value="<?php if (isset($_POST['rechercher_etu']) && $donneeetudiant){echo $donneeetudiant['nom_localisation'];}?>">
                                    </div>
                                    <div class="col-auto align-self-center">
                                    <label for="promotion">Promotion :</label>
                                        <select name="promotion" id="promotion">
                                            <option value="A1" <?php if (isset($_POST['rechercher_etu']) && $donneeetudiant && substr_count($donneeetudiant['promotion'],"A1")){echo "selected";}?>>A1</option>
                                            <option value="A2" <?php if (isset($_POST['rechercher_etu']) && $donneeetudiant && substr_count($donneeetudiant['promotion'],"A2")){echo "selected";}?>>A2</option>
                                            <option value="A3" <?php if (isset($_POST['rechercher_etu']) && $donneeetudiant && substr_count($donneeetudiant['promotion'],"A3")){echo "selected";}?>>A3</option>
                                            <option value="A4" <?php if (isset($_POST['rechercher_etu']) && $donneeetudiant && substr_count($donneeetudiant['promotion'],"A4")){echo "selected";}?>>A4</option>
                                            <option value="A5" <?php if (isset($_POST['rechercher_etu']) && $donneeetudiant && substr_count($donneeetudiant['promotion'],"A5")){echo "selected";}?>>A5</option>
                                        </select>
                                    </div>
                                    <div class="col-auto align-self-center">
                                        <label for="mdp_del">Mot de passe : </label>
                                        <input type="password" name="mdp_etu" id="mdp_etu" title="Entre 8 et 16 caractères, 1 chiffre, 1 Majuscule et 1 minuscule" required pattern="(?=^.{8,16}$)((?=.*[0-9])|(?=.*W+))(?![.n])(?=.*[A-Z])(?=.*[a-z]).*">
                                    </div>
                                    <div class="col-auto align-self-center">
                                        <label for="confmdp_etu">Confirmer mot de passe : </label>
                                        <input type="password" name="confmdp_etu" id="confmdp_etu" title="Entre 8 et 16 caractères, 1 chiffre, 1 Majuscule et 1 minuscule" required pattern="(?=^.{8,16}$)((?=.*[0-9])|(?=.*W+))(?![.n])(?=.*[A-Z])(?=.*[a-z]).*">
                                    </div>
                                </div>

                                <div class="row justify-content-center littleMarge">
                                <?php
                                    if (substr_count($_COOKIE['droits'], 'Créer un compte étudiant') == 1){
                                ?>
                                    <div class="col-auto">
                                        <input type="submit" name="creer_etu" value="Créer étudiant"></input>
                                    </div>
                                <?php
                                    }
                                    if (substr_count($_COOKIE['droits'], 'Modifier un compte étudiant') == 1){
                                ?>
                                    <div class="col-auto">
                                        <input type="submit" name="modifier_etu" value="Modifier étudiant"></input>
                                    </div>
                                <?php
                                    }
                                    if (substr_count($_COOKIE['droits'], 'Supprimer un compte étudiant') == 1){
                                ?>
                                    <div class="col-auto">
                                        <input type="submit" name="supprimer_etu" value="Supprimer étudiant"></input>
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
<!--FIN Gestion Etudiant -->
                    <?php
                        if (substr_count($_COOKIE['droits'], 'Consulter les stats des étudiants') == 1 || substr_count($_COOKIE['droits'], 'Ajouter une offre à la wish-list') == 1){
                    ?>
                <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!--Afficher Postuler -->
                <div class="container brd">
                <?php
                if($voirPostule)
                {
                    echo "<div class=\"row justify-content-center\"><div class=\"col-auto\"><h2>Liste Candidatures</h2></div></div>";
                    while ($donnees = $postule->fetch(PDO::FETCH_LAZY))
                    {
                        $obj->assign('id', $donnees['ID_Offre']);
                        $obj->assign('titre', $donnees['nom_Offre']);
                        $obj->assign('entreprise', $donnees['nom_Entreprise']);
                        $obj->assign('domaine', $donnees['nom_Competence']);
                        $obj->assign('nivetudes', $donnees['promotion']);
                        $obj->assign('duree', $donnees['duree']);
                        $obj->assign('date', $donnees['date']);
                        $obj->assign('adresse', $donnees['nom_Localisation']);
                        $obj->assign('salaire', $donnees['salaire']);
                        $obj->assign('places', $donnees['nombrePlace']);
                        $obj->assign('avancement', $donnees['Etat']);
                        $obj->display('./public/tpl/postule.tpl');
                    }
                }
                ?>
                </div>
<!--FIN Afficher Postuler -->
<!--Afficher WL -->
                <div class="container brd">
                <?php
                if($voirWishList)
                {
                    echo "<div class=\"row justify-content-center\"><div class=\"col-auto\"><h2>Wish-List</h2></div></div>";
                    while ($donnees = $wishList->fetch(PDO::FETCH_LAZY))
                    {
                        $obj->assign('id', $donnees['ID_Offre']);
                        $obj->assign('titre', $donnees['nom_Offre']);
                        $obj->assign('entreprise', $donnees['nom_Entreprise']);
                        $obj->assign('domaine', $donnees['nom_Competence']);
                        $obj->assign('nivetudes', $donnees['promotion']);
                        $obj->assign('duree', $donnees['duree']);
                        $obj->assign('date', $donnees['date']);
                        $obj->assign('adresse', $donnees['nom_Localisation']);
                        $obj->assign('salaire', $donnees['salaire']);
                        $obj->assign('places', $donnees['nombrePlace']);
                        $obj->display('./public/tpl/wish-list.tpl');
                    }
                }
                ?>
                </div>
                <?php
                    }
                ?>
<!--FIN Afficher WL -->
                </div>
            </main>

            <?php
                $obj->display('./public/tpl/footer.tpl');
                $obj->display('./public/tpl/script.tpl');
            ?>
        </body>
    </html>