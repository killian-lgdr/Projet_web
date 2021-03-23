<?php include_once('./public/vendors/libs/Smarty.class.php');
    $obj = new smarty; ?>

<!doctype html>
    <html lang="fr">

        <?php $obj->assign('titre','Entreprise');
            $obj->display('./public/tpl/head.tpl'); ?>
        <body>
            <?php $obj->display('./public/tpl/header.tpl');?>
<main>

<!-- debut recherche d'une offre -->
<form action="index.php" method="get">
                <div class="row marge">
                <div class="col-auto">
                    <label for="Entreprise">Nom de l'entreprise</label>
                    <input type="text" id="entreprise" name="entreprise">
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
                    <!-- choix Ville -->
                    <div class="row">
                    <div class="container col brd orange">
                        <div class="row justify-content-center">
                            <div class="col-auto"><h2>Ville</h2></div>
                        </div>
                        <?php
                            while ($donnees = $ville->fetch(PDO::FETCH_LAZY))
                            {
                        ?>
                        <div class="row justify-content-center">
                            <div class="col-auto"><input type="checkbox" name="Ville" value="<?= $donnees[0]?>"><?= $donnees[0]?></input></div>
                        </div>
                        <?php
                            }
                        ?>
                    </div>
                    </div>
                   <!-- choix Secteur d'activité -->
                   <div class="row">
                    <div class="container col brd orange">
                        <div class="row justify-content-center">
                            <div class="col-auto"><h2>Secteur d'activité</h2></div>
                        </div>
                        <?php
                            while ($donnees = $secteurAct->fetch(PDO::FETCH_LAZY))
                            {
                        ?>
                        <div class="row justify-content-center">
                            <div class="col-auto"><input type="checkbox" name="SecteurAct" value="<?= $donnees[0]?>"><?= $donnees[0]?></input></div>
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
                <!-- AFFICHER LES ENTREPRISES -->
                <?php
                    while ($donnees = $Entreprise->fetch(PDO::FETCH_LAZY))
                    {
                ?>
                    <div class="row littleMarge" id="division{$id}">
                        <div class="col-12 container brd blue">
                            <div class="row justify-content-center">
                                <div class="col-auto"><h2><?$donnees['nom_Entreprise']?></h2></div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <p>Secteur D'activité : <?$donnees['Secteur Activité']?></p>
                                </div>
                                <div class="col">
                                    <p>Nombre de stagiaire Cesi: <?$donnees['nbstagiaireCesi']?></p>
                                </div>
                                <div class="col">
                                    <p>Adresse : <?$donnees['nom_Localisation']?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                    }
                ?>
                <!-- fin afficher ENTREPRISE -->
                </div>
                </div>
                <!-- fin resultats -->
                </div>


</main>
                <?php $obj->display('../public/tpl/footer.tpl');
                $obj->display('../public/tpl/script.tpl'); ?>
        </body>
</html>
