    <header class="row">
      <div class="col">
          <div id="navbar" class="container-fluid brd">
            <div class="row">
                <div class="col-lg-1 col-sm-2 align-self-center"><img src="../public/img/lbs.svg" alt="logo"></div>
                <div class="col-lg-3 col-sm-2 align-self-center">
                    <a class="active" href="index.php">Accueil</a>
                    <a href="?action=listEntrepriseView">Entreprises</a>
                    <a href="?action=EtuView">Etudiants</a>
                </div>
                <div class="col-lg-4 col-sm-4  align-self-center"><h1 id="titre">Le Bon Stage</h1></div>
                <div class="col-lg-3 col-sm-2 align-self-center" id="navbar-right">
                    <a href="?action=PDView">Pilote/Délegué</a>
                    <a id="{$id}" class="active" href="#h">{$con}</a>
                </div>
                <div class="col-1 align-self-center">
                    <form method="post" action="index.php"><input type="submit" value="exit" name="exit"></form>
                </div>
            </div>
          </div>
        </div>
    </header>
