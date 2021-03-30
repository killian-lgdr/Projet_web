<?php
/* Smarty version 3.1.39, created on 2021-03-30 14:45:11
  from 'C:\Users\33610\Desktop\CESI\Cours CESI\A2\4. Web\Projet\Projet Git\Projet_web\CODE\www\public\tpl\offre.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60631d57d26739_31232762',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '723dc51ca7c67eb07ccd0fc8937ed9acdfec6bf7' => 
    array (
      0 => 'C:\\Users\\33610\\Desktop\\CESI\\Cours CESI\\A2\\4. Web\\Projet\\Projet Git\\Projet_web\\CODE\\www\\public\\tpl\\offre.tpl',
      1 => 1617102342,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60631d57d26739_31232762 (Smarty_Internal_Template $_smarty_tpl) {
?>                        <div class="row littleMarge" id="division<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
                        <div class="col-12 container brd blue">
                            <div class="row justify-content-center">
                                <div class="col-auto"><h2><?php echo $_smarty_tpl->tpl_vars['titre']->value;?>
</h2></div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <p>Entreprise : <?php echo $_smarty_tpl->tpl_vars['entreprise']->value;?>
</p>
                                </div>
                                <div class="col">
                                    <p>Domaine : <?php echo $_smarty_tpl->tpl_vars['domaine']->value;?>
</p>
                                </div>
                                <div class="col">
                                    <p>Niveau Etudes min : <?php echo $_smarty_tpl->tpl_vars['nivetudes']->value;?>
</p>
                                </div>
                                <div class="col">
                                    <p>Duree : <?php echo $_smarty_tpl->tpl_vars['duree']->value;?>
 mois</p>
                                </div>
                                <div class="col">
                                    <p>Date de Debut : <?php echo $_smarty_tpl->tpl_vars['date']->value;?>
</p>
                                </div>
                                <div class="col">
                                    <p>Adresse : <?php echo $_smarty_tpl->tpl_vars['adresse']->value;?>
</p>
                                </div>
                                <div class="col">
                                    <p>Salaire : <?php echo $_smarty_tpl->tpl_vars['salaire']->value;?>
 €</p>
                                </div>
                                <div class="col">
                                    <p>Nombre de Places : <?php echo $_smarty_tpl->tpl_vars['places']->value;?>
</p>
                                </div>
                            </div>

                            <?php 
                                if (substr_count($_COOKIE['droits'], 'Ajouter une offre à la wish-list') == 1){
                            ?>

                            <div class="row justify-content-center" id="buttonsHover<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
                                <div class="col-auto"><div class="boutton" id="wishList<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">Ajouter à la wish-list</div></div>
                                <div class="col-auto"><div class="boutton" id="postule<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">J'ai postulé</div></div>
                            </div>

                            <?php 
                                }
                            ?>
                        </div>
                        
                    </div>
                    <?php echo '<script'; ?>
>
                        var division<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
 = document.getElementById("division<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
");
                        var buttons<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
 = document.getElementById("buttonsHover<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
");
                        buttons<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
.style.display = "none";
                        division<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
.addEventListener('mouseover', function(){
                        buttons<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
.style.display = "block";
                        });
                        division<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
.addEventListener('mouseleave', function(){
                        buttons<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
.style.display = "none";
                        });
                    <?php echo '</script'; ?>
>

                    <?php 
                        if (substr_count($_COOKIE['droits'], 'Ajouter une offre à la wish-list') == 1){
                    ?>

                    <?php echo '<script'; ?>
>
                            
                            $("#postule<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
").click(function(){
                            
                                $.ajax({
                                url: "./controller/CandidatureController.php",
                                type:"GET",
                                data: "function=postulerOffre&offre=" + <?php echo $_smarty_tpl->tpl_vars['id']->value;?>
,
                                success: function(response, textStatus, xhr){
                                    if( xhr.status == 200 ){
                                        window.alert(xhr.responseText)
                                    }
                                
                                
                                },
                                error: function (xhr, ajaxOptions, thrownError){
                                console.log('Error: ' + xhr.status);
                                console.log('error'+thrownError);}});
                            });
                    <?php echo '</script'; ?>
>

                    <?php echo '<script'; ?>
>
                            
                            $("#wishList<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
").click(function(){
                                console.log('test');
                                $.ajax({
                                url: "./controller/CandidatureController.php",
                                type:"GET",
                                data: "function=wishListOffre&offre=" + <?php echo $_smarty_tpl->tpl_vars['id']->value;?>
,
                                success: function(response, textStatus, xhr){
                                    if( xhr.status == 200 ){
                                        window.alert(xhr.responseText)
                                    }
                                
                                
                                },
                                error: function (xhr, ajaxOptions, thrownError){
                                console.log('Error: ' + xhr.status);
                                console.log('error'+thrownError);}});
                            });
                    <?php echo '</script'; ?>
>
                    <?php 
                        }
}
}
