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
                $obj->display('./public/tpl/header.tpl');
            ?>

            <main class="row">
                <div class="col container-fluid">

                <?php $obj->display('./public/tpl/carroussel.tpl') ?>

                <!-- debut recherche d'une offre -->
                <form action="index.php" method="get">
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
                            <input type="checkbox" id="a1" name="nivetudes[]" value="1">
                            <label for="a1">A1</label>
                        </div>
                        </div>
                        <div class="row justify-content-center">
                        <div class="col-auto">
                            <input type="checkbox" id="a2" name="nivetudes[]" value="2">
                            <label for="a2">A2</label>
                        </div>
                        </div>
                        <div class="row justify-content-center">
                        <div class="col-auto">
                            <input type="checkbox" id="a3" name="nivetudes[]" value="3">
                            <label for="a3">A3</label>
                        </div>
                        </div>
                        <div class="row justify-content-center">
                        <div class="col-auto">
                            <input type="checkbox" id="a4" name="nivetudes[]" value="4">
                            <label for="a4">A4</label>
                        </div>
                        </div>
                        <div class="row justify-content-center">
                        <div class="col-auto">
                            <input type="checkbox" id="a5" name="nivetudes[]" value="5">
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
                        $obj->display('./public/tpl/offre.tpl');
                    }
                ?>
                


                    
                    <!-- fin afficher offre -->
                </div>
                </div>
                <!-- fin resultats -->
                </div>
            </main>

            <?php
                $obj->display('../public/tpl/footer.tpl');
                $obj->display('../public/tpl/script.tpl');
            ?>
        </body>
    </html>