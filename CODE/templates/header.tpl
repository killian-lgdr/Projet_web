    <header class="row">
      <div class="col">
          <div id="navbar" class="container-fluid brd">
            <div class="row">
                <div class="col-lg-1 col-sm-2 align-self-center"><img src="./assets/logo.PNG" alt="logo"></div>
                <div class="col-lg-3 col-sm-2 align-self-center">
                    <a class="active" href="#home">Accueil</a>
                    <a href="#contact">Entreprises</a>
                    <a href="#about">Etudiants</a>
                </div>
                <div class="col-lg-4 col-sm-4  align-self-center"><h1 id="titre">Le Bon Stage</h1></div>
                <div class="col-lg-3 col-sm-2 align-self-center" id="navbar-right">
                    <a id="connexionButton" class="active" href="#h">Connexion</a>
                    <a href="#contact">Pilote/Délegué</a>
                </div>
                <div class="col-1 align-self-center">
                    <a href=""><i id="logo" class="fas fa-user"></i></a>
                </div>
            </div>
          </div>
        </div>

    </header>

    <script>
        window.onscroll = function() {scrollFunction()};

        function scrollFunction() {
        if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
            document.getElementById("navbar").style.padding = "5px 10px";
        } else {
            document.getElementById("navbar").style.padding = "40px 10px";
        }
        }

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