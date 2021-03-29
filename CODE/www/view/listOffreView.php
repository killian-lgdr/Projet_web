<?php
    include_once('./public/vendors/libs/Smarty.class.php');
    $obj = new smarty; 
?>

<!doctype html>
    <html lang="fr">

        <?php
            $obj->assign('titre','Accueil');
            $obj->display('./public/tpl/head.tpl');
        ?>


        <body>

            <?php
                if(isset($_COOKIE['userName']))
                {
                    $obj->assign('con', $_COOKIE['userName']);
                    $obj->assign('id', '');
                }
                else{
                    $obj->assign('con','Connexion');
                    $obj->assign('id', 'connexionButton');
                }
                $obj->display('./public/tpl/header.tpl');
            ?>

            <div class="row justify-content-center">
                <div class="col-1.8 brd" id="connexionPage">
                    <form action="index.php" method="post">
                        <div>
                            <label for="pseudo">Nom Utilisateur</label>
                            <input type="text" id="pseudo" name="userName">
                        </div>
                        <div>
                            <label for="password">Mot de Passe</label>
                            <input type="password" id="password" name="password">
                        </div>
                        <input type="submit" value="connexion" name="buttonConnect">
                    </form>
                </div>
                <?php
                    if ($connectStatus != ''){
                ?>
                        <script>window.alert('<?= $connectStatus ?>')</script>
                <?php
                    }
                ?>
                
            </div>

            <main class="row">
                <div class="col container-fluid">

                <?php $obj->display('./public/tpl/carroussel.tpl') ?>

            <?php
                if (isset($_COOKIE['droits']) && substr_count($_COOKIE['droits'], 'Rechercher une offre') == 1){
            ?>
                <!-- debut recherche d'une offre -->
                <form action="index.php" method="post">
                <div class="row">
                <div class="col-auto">
                    <label for="domaine">domaine</label>
                    <input type="text" id="domaine" name="domaine">
                </div>
                <div class="col-auto">
                    <label for="ville">ville</label>
                    <input type="text" id="ville" name="ville">
                </div>
                <div class="col-auto">
                    <input type="submit" value="Rechercher">
                </div>
                </div>
                <!-- fin recherche d'une offre -->
                <!-- debut resultats -->
                <div class="row">
                <!-- debut choix filtres -->
                <div class="container col-2">
                    <!-- choix niveau etudes -->
                    <div class="row"> 
                    <div class="container col brd orange">
                        <div class="row justify-content-center">
                        <div class="col-auto"><h2>Niveau Etudes</h2></div>
                        </div>
                        <div class="row justify-content-center">
                        <div class="col-auto">
                            <input type="checkbox" id="a1" name="nivetudes[]" value="A1">
                            <label for="a1">A1</label>
                        </div>
                        </div>
                        <div class="row justify-content-center">
                        <div class="col-auto">
                            <input type="checkbox" id="a2" name="nivetudes[]" value="A2">
                            <label for="a2">A2</label>
                        </div>
                        </div>
                        <div class="row justify-content-center">
                        <div class="col-auto">
                            <input type="checkbox" id="a3" name="nivetudes[]" value="A3">
                            <label for="a3">A3</label>
                        </div>
                        </div>
                        <div class="row justify-content-center">
                        <div class="col-auto">
                            <input type="checkbox" id="a4" name="nivetudes[]" value="A4">
                            <label for="a4">A4</label>
                        </div>
                        </div>
                        <div class="row justify-content-center">
                        <div class="col-auto">
                            <input type="checkbox" id="a5" name="nivetudes[]" value="A5">
                            <label for="a5">A5</label>
                        </div>
                        </div>
                    </div>
                    </div>
                    <!-- choix temporalité -->
                    <div class="row"> 
                    <div class="container col brd orange">
                        <div class="row justify-content-center">
                        <div class="col-auto"><h2>Durée min</h2></div>
                        </div>
                        <div class="row justify-content-center">
                        <div class="col-auto">
                            <input type="radio" id="1moismin" name="dureemin" value="1">
                            <label for="1moismin">1 mois</label>
                        </div>
                        </div>
                        <div class="row justify-content-center">
                        <div class="col-auto">
                            <input type="radio" id="3moismin" name="dureemin" value="3">
                            <label for="3moismin">3 mois</label>
                        </div>
                        </div>
                        <div class="row justify-content-center">
                        <div class="col-auto">
                            <input type="radio" id="6moismin" name="dureemin" value="6">
                            <label for="6moismin">6 mois</label>
                        </div>
                        </div>
                        <div class="row justify-content-center">
                        <div class="col-auto">
                            <input type="radio" id="9moismin" name="dureemin" value="9">
                            <label for="9moismin">9 mois</label>
                        </div>
                        </div>
                        <div class="row justify-content-center">
                        <div class="col-auto"><h2>Durée max</h2></div>
                        </div>
                        <div class="row justify-content-center">
                        <div class="col-auto">
                            <input type="radio" id="1moismax" name="dureemax" value="1">
                            <label for="1moismax">1 mois</label>
                        </div>
                        </div>
                        <div class="row justify-content-center">
                        <div class="col-auto">
                            <input type="radio" id="3moismax" name="dureemax" value="3">
                            <label for="3moismax">3 mois</label>
                        </div>
                        </div>
                        <div class="row justify-content-center">
                        <div class="col-auto">
                            <input type="radio" id="6moismax" name="dureemax" value="6">
                            <label for="6moismax">6 mois</label>
                        </div>
                        </div>
                        <div class="row justify-content-center">
                        <div class="col-auto">
                            <input type="radio" id="9moismax" name="dureemax" value="9">
                            <label for="9moismax">9 mois</label>
                        </div>
                        </div>
                        <div class="row justify-content-center">
                        <div class="col-auto"><h2>Date de Début</h2></div>
                        </div>
                        <div class="row justify-content-center">
                        <div class="col-auto">
                            <input type="date" id="date" min="2021-01-01" max="2025-12-30" name="date">
                        </div>
                        </div>
                    </div>
                    </div>
                    <!-- choix remunération -->
                    <div class="row"> 
                    <div class="container col brd orange">
                        <div class="row justify-content-center">
                        <div class="col-auto"><h2>Salaire min</h2></div>
                        </div>
                        <div class="row justify-content-center">
                        <div class="col-auto">
                            <input type="radio" id="300€" name="salaire" value="300">
                            <label for="300€">300€</label>
                        </div>
                        </div>
                        <div class="row justify-content-center">
                        <div class="col-auto">
                            <input type="radio" id="200€" name="salaire" value="600">
                            <label for="200€">600€</label>
                        </div>
                        </div>
                        <div class="row justify-content-center">
                        <div class="col-auto">
                            <input type="radio" id="500€" name="salaire" value="900">
                            <label for="500€">900€</label>
                        </div>
                        </div>
                        <div class="row justify-content-center">
                        <div class="col-auto">
                            <input type="radio" id="max€" name="salaire" value="1200">
                            <label for="max€">1200€</label>
                        </div>
                        </div>
                    </div>
                    </div>
                    <!-- choix Entreprises -->
                    <div class="row">
                    <div class="container col brd orange">
                        <div class="row justify-content-center">
                            <div class="col-auto"><h2>Entreprise</h2></div>
                        </div>
                        <?php
                            while ($donnees = $entreprise->fetch(PDO::FETCH_LAZY))
                            {
                        ?>
                        <div class="row justify-content-center">
                            <div class="col-auto">
                                <input type="radio" name="entreprise" id="<?= $donnees[0]?>" value="<?= $donnees[0]?>"></input>
                                <label for="<?= $donnees[0]?>"><?= $donnees[0]?></label>
                            </div>
                        </div>
                        <?php
                            }
                        ?>
                    </div>
                    </div>
                    </form>
                </div>
                
                <!-- fin choix filtres -->
                <div class="container col-9 littleMarge">
                <!-- AFFICHER LES OFFRES -->
                <?php
                    while ($donnees = $offre->fetch(PDO::FETCH_LAZY))
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
                        $obj->assign('places', $donnees['nombreplace']);
                        $obj->display('./public/tpl/offre.tpl');
                    }
                ?>
                


                    
                    <!-- fin afficher offre -->
                </div>
                </div>
                
                <?php
                    }
                ?>
                <!-- fin resultats -->
                <!-- debut gestion -->
                    <div class="row justify-content-center">
                        <div class="col-auto container brd">
                            <form action="index.php" method='post'>
                                <div class="row justify-content-center">
                                    <div class="col-auto"><h2>Gestion Offres</h2></div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-auto">
                                        <label for="nameGestion">Nom de l'Offre</label>
                                        <input type="text" id="nameGestion" name="nameGestion" value="<?php if(isset($_POST['rechercherGestion']) && $resultatOffre){echo $resultatOffre['nom_Offre'];}?>">
                                        <input type="submit" value="Rechercher" name="rechercherGestion">
                                    </div>
                                </div>
                                <div class="row justify-content-between">
                                    <div class="col-auto">
                                        <label for="domaineGestion">Domaine</label>
                                        <input type="text" id="domaineGestion" name="domaineGestion" value="<?php if(isset($_POST['rechercherGestion']) && $resultatOffre){echo $resultatOffre['nom_Competence'];}?>">
                                    </div>
                                    <div class="col-auto">
                                        <label for="dureeGestion">Durée du Stage</label>
                                        <input type="text" id="dureeGestion" name="dureeGestion" value="<?php if(isset($_POST['rechercherGestion']) && $resultatOffre){echo $resultatOffre['duree'];}?>">
                                    </div>
                                </div>
                                <div class="row justify-content-between">
                                    <div class="col-auto">
                                        <label for="adresseGestion">Adresse</label>
                                        <input type="text" id="adresseGestion" name="adresseGestion" value="<?php if(isset($_POST['rechercherGestion']) && $resultatOffre){echo $resultatOffre['nom_Localisation'];}?>">
                                    </div>
                                    <div class="col-auto">
                                        <label for="salaireGestion">Salaire /mois</label>
                                        <input type="text" id="salaireGestion" name="salaireGestion" value="<?php if(isset($_POST['rechercherGestion']) && $resultatOffre){echo $resultatOffre['salaire'];}?>">
                                    </div>
                                </div>
                                <div class="row justify-content-between">
                                    <div class="col-auto">
                                        <label for="nivEtudesGestion">Niveau Etudes requis</label>
                                        <select name="nivEtudesGestion" id="nivEtudesGestion">
                                            <option value="A1" <?php if($resultatOffre['promotion'] == "A1"){echo "selected"} ?>>A1</option>
                                            <option value="A2" <?php if($resultatOffre['promotion'] == "A2"){echo "selected"} ?>>A2</option>
                                            <option value="A3" <?php if($resultatOffre['promotion'] == "A3"){echo "selected"} ?>>A3</option>
                                            <option value="A4" <?php if($resultatOffre['promotion'] == "A4"){echo "selected"} ?>>A4</option>
                                            <option value="A5" <?php if($resultatOffre['promotion'] == "A5"){echo "selected"} ?>>A5</option>
                                        </select>
                                    </div>
                                    <div class="col-auto">
                                        <label for="dateGestion">Date de Debut</label>
                                        <input type="date" name="dateGestion" id="dateGestion" value="<?php if(isset($_POST['rechercherGestion']) && $resultatOffre){echo $resultatOffre['date'];}?>">
                                    </div>
                                </div>
                                <div class="row justify-content-between">
                                    <div class="col-auto">
                                        <label for="placesGestion">Nombre de places</label>
                                        <input type="text" id="placesGestion" name="placesGestion" value="<?php if(isset($_POST['rechercherGestion']) && $resultatOffre){echo $resultatOffre['nombrePlace'];}?>">
                                    </div>
                                    <div class="col-auto">
                                        <label for="entrepriseGestion">Entreprise</label>
                                        <select name="entrepriseGestion" id="entrepriseGestion">
                                        <?php
                                            while ($donnees = $entrepriseSelect->fetch(PDO::FETCH_LAZY))
                                            {
                                                if($donnees[0]==$resultatOffre['nom_Entreprise']){
                                                    echo "<option value=\"" . $donnees[0] . "\" selected>" . $donnees[0] . "</option>";
                                                } 
                                                else{
                                                    echo "<option value=\"" . $donnees[0] . "\">" . $donnees[0] . "</option>"; 
                                                }
                                        
                                            }
                                        ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row justify-content-around littleMarge">
                                    <div class="col-auto">
                                        <input type="submit" value="Créer" name="creerGestion">
                                    </div>
                                    <div class="col-auto">
                                        <input type="submit" value="Modifier" name="modifierGestion">
                                    </div>
                                    <div class="col-auto">
                                        <input type="submit" value="Supprimer" name="supprimerGestion">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php
                        if ($infoGestion != ''){
                    ?>
                            <script>window.alert('<?= $infoGestion ?>')</script>
                    <?php
                        }
                    ?>
                    <!-- fin gestion -->
                </div>
            </main>

            <?php
                $obj->display('../public/tpl/footer.tpl');
                $obj->display('../public/tpl/script.tpl');
            ?>
            <script>
                //Connect Button
                var conButton = document.getElementById("connexionButton");
                var conPage = document.getElementById("connexionPage");
                function afficherConPage(){
                if(conPage.style.display=="none")
                {
                    conPage.style.display="block";
                }
                else{
                    conPage.style.display="none";
                }
                }
                conButton.addEventListener('click', function(){afficherConPage()});
            </script>
        </body>
    </html>