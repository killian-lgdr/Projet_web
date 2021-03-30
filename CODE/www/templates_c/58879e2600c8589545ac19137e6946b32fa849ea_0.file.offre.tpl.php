<?php
/* Smarty version 3.1.39, created on 2021-03-30 11:00:42
  from 'C:\Users\killi\Desktop\A2\4- developpement Web\Projet_web\CODE\www\public\tpl\offre.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6062e8baa8d296_34784999',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '58879e2600c8589545ac19137e6946b32fa849ea' => 
    array (
      0 => 'C:\\Users\\killi\\Desktop\\A2\\4- developpement Web\\Projet_web\\CODE\\www\\public\\tpl\\offre.tpl',
      1 => 1617094402,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6062e8baa8d296_34784999 (Smarty_Internal_Template $_smarty_tpl) {
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
                            <div class="row justify-content-center" id="buttonsHover<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
                                <div class="col-auto"><button id="wishList<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">Ajouter à la wish-list</button></div>
                                <div class="col-auto"><button id="postule<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">J'ai postulé</button></div>
                            </div>
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

                    <?php echo '<script'; ?>
>
                            
                            $("#postule<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
").click(function(){
                            
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

                    <?php echo '<script'; ?>
>
                            
                            $("#wishList<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
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
><?php }
}
