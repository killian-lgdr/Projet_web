<?php
/* Smarty version 3.1.39, created on 2021-03-23 16:36:17
  from 'D:\Ordinateur\CESI\A2\4_WEB\Projet\Projet_web\CODE\www\public\tpl\entreprise.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_605a0af19fed60_12439702',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5c16042d5063af99d8240ec513f42c6d8a91bae0' => 
    array (
      0 => 'D:\\Ordinateur\\CESI\\A2\\4_WEB\\Projet\\Projet_web\\CODE\\www\\public\\tpl\\entreprise.tpl',
      1 => 1616513699,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_605a0af19fed60_12439702 (Smarty_Internal_Template $_smarty_tpl) {
?>                        <!-- AFFICHER ENTREPRISE-->
                        <div class="row littleMarge" id="division<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
                        <div class="col-12 container brd blue">
                            <div class="row justify-content-center">
                                <div class="col-auto"><h2><?php echo $_smarty_tpl->tpl_vars['entreprise']->value;?>
</h2></div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <p>Secteur d'activité : <?php echo $_smarty_tpl->tpl_vars['Secteur']->value;?>
</p>
                                </div>
                                <div class="col">
                                    <p>Nombre de stagiaire CESI : <?php echo $_smarty_tpl->tpl_vars['nbstage']->value;?>
</p>
                                </div>
                                <div class="col">
                                    <p>Siege Social : <?php echo $_smarty_tpl->tpl_vars['adresse']->value;?>
</p>
                                </div>
                            </div>

                            <!-- HOOVER AFFICHER LES NOTES ETUDIANTE-->
                            <div id="buttonsHover<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
                            <div class = "row">
                                <div class="afficherating col-auto">
                                <p class = "textnote">Note Etudiante<p>
                                	<div class="stars">
	                                	<i class="fa fa-star <?php echo $_smarty_tpl->tpl_vars['noteE']->value[0];?>
"></i>
		                                <i class="fa fa-star <?php echo $_smarty_tpl->tpl_vars['noteE']->value[1];?>
"></i>
		                                <i class="fa fa-star <?php echo $_smarty_tpl->tpl_vars['noteE']->value[2];?>
"></i>
                                        <i class="fa fa-star <?php echo $_smarty_tpl->tpl_vars['noteE']->value[3];?>
"></i>
                                        <i class="fa fa-star <?php echo $_smarty_tpl->tpl_vars['noteE']->value[4];?>
"></i>
                                    </div>
                                </div>
                            </div>
                            <div class = "row">
                            <!--AFFICHER LES NOTES PILOTE-->
                                <div class="afficherating col-8">
                                <p class = "textnote">Note Pilote<p>
                                	<div class="stars">
	                                	<i class="fa fa-star <?php echo $_smarty_tpl->tpl_vars['noteP']->value[0];?>
"></i>
		                                <i class="fa fa-star <?php echo $_smarty_tpl->tpl_vars['noteP']->value[1];?>
"></i>
		                                <i class="fa fa-star <?php echo $_smarty_tpl->tpl_vars['noteP']->value[2];?>
"></i>
                                        <i class="fa fa-star <?php echo $_smarty_tpl->tpl_vars['noteP']->value[3];?>
"></i>
                                        <i class="fa fa-star <?php echo $_smarty_tpl->tpl_vars['noteP']->value[4];?>
"></i>
                                    </div>
                                </div>
                            <!--AFFICHER LE SYSTEME DE NOTATION-->
                                <div class="rating col-4">
                                <p class = "textnote">Notez cette entreprise<p>
                                	<div class="starsnote">
	                                	<i class="fa fa-star gold"></i>
		                                <i class="fa fa-star gold"></i>
		                                <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </div>
                            </div>
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
><?php }
}
