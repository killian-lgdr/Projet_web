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

                            {php}
                                if (substr_count($_COOKIE['droits'], 'Ajouter une offre à la wish-list') == 1){
                            {/php}

                            <div class="row justify-content-center" id="buttonsHover{$id}">
                                <div class="col-auto"><div class="boutton" id="wishList{$id}">Ajouter à la wish-list</div></div>
                                <div class="col-auto"><div class="boutton" id="postule{$id}">J'ai postulé</div></div>
                            </div>

                            {php}
                                }
                            {/php}
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

                    {php}
                        if (substr_count($_COOKIE['droits'], 'Ajouter une offre à la wish-list') == 1){
                    {/php}

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
                            
                            $("#wishList{$id}").click(function(){
                                console.log('test');
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
                    {php}
                        }
                    {/php}