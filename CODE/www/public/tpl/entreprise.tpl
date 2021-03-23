                        <!-- AFFICHER ENTREPRISE-->
                        <div class="row littleMarge" id="division{$id}">
                        <div class="col-12 container brd blue">
                            <div class="row justify-content-center">
                                <div class="col-auto"><h2>{$entreprise}</h2></div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <p>Secteur d'activité : {$Secteur}</p>
                                </div>
                                <div class="col">
                                    <p>Nombre de stagiaire CESI : {$nbstage}</p>
                                </div>
                                <div class="col">
                                    <p>Siege Social : {$adresse}</p>
                                </div>
                            </div>

                            <!-- HOOVER AFFICHER LES NOTES ETUDIANTE-->
                            <div class="row" id="buttonsHover{$id}">
                                <div class="rating">
                                <p class = "textnote">Note Etudiante<p>
                                	<div class="stars">
	                                	<i class="fa fa-star gold"></i>
		                                <i class="fa fa-star gold"></i>
		                                <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </div>
                                
                            <!--AFFICHER LES NOTES PILOTE-->
                                <div class="rating">
                                <p class = "textnote">Note Pilote<p>
                                	<div class="stars">
	                                	<i class="fa fa-star"></i>
		                                <i class="fa fa-star"></i>
		                                <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </div>
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