<?php include_once('./public/vendors/libs/Smarty.class.php');
    $obj = new smarty; ?>

<!doctype html>
    <html lang="fr">

        <?php $obj->assign('titre','LeBonStage - Entreprise');
            $obj->display('./public/tpl/head.tpl'); ?>
<body>
            <?php 
                $obj->assign('con', $_COOKIE['userName']);
                $obj->assign('id', '');
                $obj->display('./public/tpl/header.tpl');
            ?>
<div class="containter">
<main>
<!-- debut recherche d'une offre -->
<form action="?action=listEntrepriseView" method="post">
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
                            <div class="col-auto">
                                <input type="radio" name="ville" id="<?= $donnees[0]?>" value="<?= $donnees[0]?>"></input>
                                <label for="<?= $donnees[0]?>"><?= $donnees[0]?></label>
                            </div>
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
                            <div class="col-auto"><h2>Secteur</h2></div>
                        </div>
                        <?php
                            while ($donnees = $secteurAct->fetch(PDO::FETCH_LAZY))
                            {
                        ?>
                        <div class="row justify-content-center">
                            <div class="col-auto">
                                <input type="radio" name="secteur" id="<?= $donnees[0]?>" value="<?= $donnees[0]?>"></input>
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
                <!-- AFFICHER LES ENTREPRISES -->
                <?php
                    while ($donnees = $entreprise->fetch(PDO::FETCH_LAZY))
                    {
                        $obj->assign('noteP', createTabNote($donnees['noteP']));
                        $obj->assign('noteE', createTabNote($donnees['noteE']));
                        $obj->assign('id',$donnees['ID_Entreprise']);
                        $obj->assign('entreprise', $donnees['nom_Entreprise']);
                        $obj->assign('Secteur', $donnees['SecteurActivité']);
                        $obj->assign('adresse', $donnees['nom_Localisation']);
                        $obj->assign('nbstage', $donnees['nbStagiaireCesi']);
                        $obj->display('./public/tpl/entreprise.tpl');
                    }
                ?>
                <!-- fin afficher ENTREPRISE -->
                </div>
                </div>
                <!-- fin resultats -->

                <!-- Création des entreprises -->
<div class="container littleMarge brd">
<form action="?action=listEntrepriseView" method="post">
                <div class="row justify-content-center">
                <div class="col-auto">
                <label for="Entreprise">Nom de l'entreprise : </label>
                <input type="text" id="entreprise" name="entreprise" placeholder="Nom de l'entreprise">
                <input type="submit" name="rechercher_ent" value="Rechercher" ></input>
                </div>
                <div class="col-auto">
                <label for="secteur">Secteur d'activité : </label>
                <input type="text" id="secteur" name="secteur" placeholder="Secteur d'activité">
                </div>
                </div>
                <div class="row justify-content-center">
                <div class="col-auto">
                <label for="ville">Localisation : </label>
                <input type="text" id="ville" name="ville" placeholder="Localisation">
                </div>
                <div class="col-auto">
                <label for="nbstage">Nombre de stagiaire CESI : </label>
                <input type="text" id="nbStage" name="nbStage" placeholder="Nombre de stagiaire CESI" >
                </div>
                </div>
                <div class="row justify-content-center">
                <div class="col-auto">
                <input type="submit" name="creer_ent" value="Créer" ></input>
                </div>
                <div class="col-auto">
                <input type="submit" name="modifier_ent" value="modifier" ></input>
                </div>
                <div class="col-auto">
                <input type="submit" name="supprimer_ent" value="supprimer" ></input>
                </div>
                </div>
</form>
</div>
</main>
                <?php $obj->display('../public/tpl/footer.tpl');
                $obj->display('../public/tpl/script.tpl'); ?>
</div>

<script> 
function setInputFilter(textbox, inputFilter) 
{
  ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) 
  {
    textbox.addEventListener(event, function() 
    {
      if (inputFilter(this.value)) 
      {
        this.oldValue = this.value;
        this.oldSelectionStart = this.selectionStart;
        this.oldSelectionEnd = this.selectionEnd;
      } else if (this.hasOwnProperty("oldValue")) 
      {
        this.value = this.oldValue;
        this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
      } else 
      {
        this.value = "";
      }
    });
  });
}
setInputFilter(document.getElementById("nbStage"), function(value) 
{
  return /^\d*\.?\d*$/.test(value); 
});
</script>
                <!-- Fin création des entreprises -->
        </body>
</html>
