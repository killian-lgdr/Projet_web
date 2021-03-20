<?php
    include_once('../public/vendors/libs/Smarty.class.php');
    $obj = new smarty; 
?>

<!doctype html>
    <html lang="fr">

        <?php
            $obj->assign('titre','Accueil');
            $obj->display('../public/tpl/head.tpl');
        ?>


        <body>

            <?php  
                $obj->display('../public/tpl/header.tpl');
            ?>

            <main class="row">
                <div class="col container-fluid">

                <?php $obj->display('../public/tpl/carroussel.tpl') ?>

                <!-- debut recherche d'une offre -->
                <div class="row">
                <div class="col-auto">
                    <label for="domaine">domaine</label>
                    <input type="text" id="domaine">
                </div>
                <div class="col-auto">
                    <label for="ville">ville</label>
                    <input type="text" id="ville">
                </div>
                <div class="col-auto">
                    <button type="submit">rechercher</button>
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
                            <input type="checkbox" id="a1">
                            <label for="a1">A1</label>
                        </div>
                        </div>
                        <div class="row justify-content-center">
                        <div class="col-auto">
                            <input type="checkbox" id="a2">
                            <label for="a2">A2</label>
                        </div>
                        </div>
                        <div class="row justify-content-center">
                        <div class="col-auto">
                            <input type="checkbox" id="a3">
                            <label for="a3">A3</label>
                        </div>
                        </div>
                        <div class="row justify-content-center">
                        <div class="col-auto">
                            <input type="checkbox" id="a4">
                            <label for="a4">A4</label>
                        </div>
                        </div>
                        <div class="row justify-content-center">
                        <div class="col-auto">
                            <input type="checkbox" id="a5">
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
                            <input type="checkbox" id="1mois">
                            <label for="1mois">-1mois</label>
                        </div>
                        </div>
                        <div class="row justify-content-center">
                        <div class="col-auto">
                            <input type="checkbox" id="3mois">
                            <label for="3mois">1-3 mois</label>
                        </div>
                        </div>
                        <div class="row justify-content-center">
                        <div class="col-auto">
                            <input type="checkbox" id="6mois">
                            <label for="6mois">3-6 mois</label>
                        </div>
                        </div>
                        <div class="row justify-content-center">
                        <div class="col-auto">
                            <input type="checkbox" id="maxmois">
                            <label for="maxmois">+6 mois</label>
                        </div>
                        </div>
                        <div class="row justify-content-center">
                        <div class="col-auto"><h2>Date de Début</h2></div>
                        </div>
                        <div class="row justify-content-center">
                        <div class="col-auto">
                            <input type="date" id="date" min="2021-01-01" max="2025-12-30">
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
                            <input type="checkbox" id="0€">
                            <label for="0€">0€</label>
                        </div>
                        </div>
                        <div class="row justify-content-center">
                        <div class="col-auto">
                            <input type="checkbox" id="200€">
                            <label for="200€">0-200€</label>
                        </div>
                        </div>
                        <div class="row justify-content-center">
                        <div class="col-auto">
                            <input type="checkbox" id="500€">
                            <label for="500€">200-500€</label>
                        </div>
                        </div>
                        <div class="row justify-content-center">
                        <div class="col-auto">
                            <input type="checkbox" id="max€">
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
                    </div>
                    </div>
                </div>
                <!-- fin choix filtres -->
                <div class="container col-9 littleMarge">
                <!-- AFFICHER LES OFFRES -->
                    <div class="row">
                        <div class="col-12 container brd">
                            <div class="row justify-content-center">
                                <div class="col-auto"><h2>Titre de l'Offre</h2></div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <p>Entreprise : aaaaa</p>
                                </div>
                                <div class="col">
                                    <p>Domaine : aaaaa</p>
                                </div>
                                <div class="col">
                                    <p>Niveau Etudes min : aaaaa</p>
                                </div>
                                <div class="col">
                                    <p>Duree : aaaaa</p>
                                </div>
                                <div class="col">
                                    <p>Date de Debut : aaaaa</p>
                                </div>
                                <div class="col">
                                    <p>Adresse : aaaaa</p>
                                </div>
                                <div class="col">
                                    <p>Salaire : aaaaa</p>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-auto"><button>Ajouter à la wish-list</button></div>
                                <div class="col-auto"><button>J'ai postulé</button></div>
                            </div>
                        </div>
                    </div>
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