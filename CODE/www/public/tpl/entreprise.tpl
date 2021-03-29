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
                            <div id="buttonsHover{$id}">
                            <div class = "row">
                                <div class="afficherating col-auto">
                                <p class = "textnote">Note Etudiante<p>
                                	<div class="stars">
	                                	<i class="fa fa-star {$noteE[0]}"></i>
		                                <i class="fa fa-star {$noteE[1]}"></i>
		                                <i class="fa fa-star {$noteE[2]}"></i>
                                        <i class="fa fa-star {$noteE[3]}"></i>
                                        <i class="fa fa-star {$noteE[4]}"></i>
                                    </div>
                                </div>
                            </div>
                            <div class = "row">
                            <!--AFFICHER LES NOTES PILOTE-->
                                <div class="afficherating col-8">
                                <p class = "textnote">Note Pilote<p>
                                	<div class="stars">
	                                	<i class="fa fa-star {$noteP[0]}"></i>
		                                <i class="fa fa-star {$noteP[1]}"></i>
		                                <i class="fa fa-star {$noteP[2]}"></i>
                                        <i class="fa fa-star {$noteP[3]}"></i>
                                        <i class="fa fa-star {$noteP[4]}"></i>
                                    </div>
                                </div>
                            <!--AFFICHER LE SYSTEME DE NOTATION-->
                                <div class="rating col-4">
                                <p class = "textnote">Notez cette entreprise<p>
                                	<div id="note{$id}" class="starsnote">
	                                	<i id="star1{$id}" class="fa fa-star gold"></i>
		                                <i id="star2{$id}" class="fa fa-star gold"></i>
		                                <i id="star3{$id}" class="fa fa-star"></i>
                                        <i id="star4{$id}" class="fa fa-star"></i>
                                        <i id="star5{$id}" class="fa fa-star"></i>
                                    </div>
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

                    <script>
                        $("#star5{$id}").click(function(){
                            $("#note{$id}").val("5");});
                        $("#star4{$id}").click(function(){
                            $("#note{$id}").val("4");});
                        $("#star3{$id}").click(function(){
                            $("#note{$id}").val("3");});
                        $("#star2{$id}").click(function(){
                            $("#note{$id}").val("2");});
                        $("#star1{$id}").click(function(){
                            $("#note{$id}").val("1");});
                    </script>

                    <script>
                            
                            $("#note{$id}").click(function(){
                            
                                $.ajax({
                                url: "./controller/NoteController.php",
                                type:"GET",
                                data: "function=noteEntreprise&note="+ $("#note{$id}").val() +"&entreprise={$entreprise}",
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