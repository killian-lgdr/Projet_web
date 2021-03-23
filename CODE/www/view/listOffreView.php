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
                        <div class="col-auto"><h2>Durée</h2></div>
                        </div>
                        <div class="row justify-content-center">
                        <div class="col-auto">
                            <input type="checkbox" id="1mois" name="duree">
                            <label for="1mois">-1mois</label>
                        </div>
                        </div>
                        <div class="row justify-content-center">
                        <div class="col-auto">
                            <input type="checkbox" id="3mois" name="duree">
                            <label for="3mois">1-3 mois</label>
                        </div>
                        </div>
                        <div class="row justify-content-center">
                        <div class="col-auto">
                            <input type="checkbox" id="6mois" name="duree">
                            <label for="6mois">3-6 mois</label>
                        </div>
                        </div>
                        <div class="row justify-content-center">
                        <div class="col-auto">
                            <input type="checkbox" id="maxmois" name="duree">
                            <label for="maxmois">+6 mois</label>
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
                        <div class="col-auto"><h2>Salaire</h2></div>
                        </div>
                        <div class="row justify-content-center">
                        <div class="col-auto">
                            <input type="checkbox" id="0€" name="salaire">
                            <label for="0€">0€</label>
                        </div>
                        </div>
                        <div class="row justify-content-center">
                        <div class="col-auto">
                            <input type="checkbox" id="200€" name="salaire">
                            <label for="200€">0-200€</label>
                        </div>
                        </div>
                        <div class="row justify-content-center">
                        <div class="col-auto">
                            <input type="checkbox" id="500€" name="salaire">
                            <label for="500€">200-500€</label>
                        </div>
                        </div>
                        <div class="row justify-content-center">
                        <div class="col-auto">
                            <input type="checkbox" id="max€" name="salaire">
                            <label for="max€">+500€</label>
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
                            <div class="col-auto"><input type="checkbox" name="entreprise" value="<?= $donnees[0]?>"><?= $donnees[0]?></input></div>
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