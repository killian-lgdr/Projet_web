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
                                    <p>Niveau Etudes min : {$nivetudes}</p>
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
                                <div class="col">
                                    <p>Nombre de Places : {$places}</p>
                                </div>
                            </div>
                            <div class="row justify-content-center" id="buttonsHover{$id}">
                                <div class="col-auto"><button id="wishList{$id}">Ajouter à la wish-list</button></div>
                                <div class="col-auto"><button id="postule{$id}">J'ai postulé</button></div>
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

                    <script>
                            
                            $("#postule{$id}").click(function(){
                            
                                $.ajax({
                                url: "./controller/CandidatureController.php",
                                type:"GET",
                                data: "function=wishListOffre&offre=" + {$id},
                                success: function(response, textStatus, xhr){
                                    if( xhr.status == 200 ){
                                        window.alert(xhr.responseText)
                                    }
                                
                                
                                },
                                error: function (xhr, ajaxOptions, thrownError){
                                console.log('Error: ' + xhr.status);
                                console.log('error'+thrownError);}});
                            });
                    </script>

                    <script>
                            
                            $("#wishList{$id}").click(function(){
                            
                                $.ajax({
                                url: "./controller/CandidatureController.php",
                                type:"GET",
                                data: "function=postulerOffre&offre=" + {$id},
                                success: function(response, textStatus, xhr){
                                    if( xhr.status == 200 ){
                                        window.alert(xhr.responseText)
                                    }
                                
                                
                                },
                                error: function (xhr, ajaxOptions, thrownError){
                                console.log('Error: ' + xhr.status);
                                console.log('error'+thrownError);}});
                            });
                    </script>