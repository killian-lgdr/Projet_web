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


                            <div class="row justify-content-center" >
                                <div class="col-auto"><div class="boutton" id="postule{$id}">J'ai postulé</div></div>
                                <div class="col-auto"><div class="boutton" id="supprimer{$id}">Supprimer</div></div>
                            </div>
                        </div>
                        
                    </div>

                    <script>
                            
                            $("#postule{$id}").click(function(){
                            
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
                    <script>
                            
                            $("#supprimer{$id}").click(function(){
                            
                                $.ajax({
                                url: "./controller/CandidatureController.php",
                                type:"GET",
                                data: "function=supprimerWishList&offre=" + {$id},
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