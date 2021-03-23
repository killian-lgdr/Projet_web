                        <div class="row littleMarge" id="division{$id}">
                        <div class="col-12 container brd blue">
                            <div class="row justify-content-center">
                                <div class="col-auto"><h2>{$titre}</h2></div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <p>Entreprise : {$entreprise}</p>
                                </div>
                                <div class="col">
                                    <p>Domaine : {$domaine}</p>
                                </div>
                                <div class="col">
                                    <p>Niveau Etudes min : A{$nivetudes}</p>
                                </div>
                                <div class="col">
                                    <p>Duree : {$duree} mois</p>
                                </div>
                                <div class="col">
                                    <p>Date de Debut : {$date}</p>
                                </div>
                                <div class="col">
                                    <p>Adresse : {$adresse}</p>
                                </div>
                                <div class="col">
                                    <p>Salaire : {$salaire} €</p>
                                </div>
                            </div>
                            <div class="row justify-content-center" id="buttonsHover{$id}">
                                <div class="col-auto"><button>Ajouter à la wish-list</button></div>
                                <div class="col-auto"><button>J'ai postulé</button></div>
                            </div>
                        </div>
                    </div>
                    <script>
                        var division{$id} = document.getElementById("division{$id}");
                        var buttons{$id} = document.getElementById("buttonsHover{$id}");
                        buttons{$id}.style.display = "none";
                        division{$id}.addEventListener('mouseover', function(){
                        buttons{$id}.style.display = "block";
                        });
                        division{$id}.addEventListener('mouseleave', function(){
                        buttons{$id}.style.display = "none";
                        });
                    </script>