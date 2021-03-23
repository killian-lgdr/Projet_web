<?php
/* Smarty version 3.1.39, created on 2021-03-23 11:12:56
  from 'C:\Users\33610\Desktop\CESI\Cours CESI\A2\4. Web\Projet\Projet Git\Projet_web\CODE\www\public\tpl\entreprise.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6059bf28993633_27173342',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5e4d9a27613e3011e5ef78e7bd1daa484aa021d8' => 
    array (
      0 => 'C:\\Users\\33610\\Desktop\\CESI\\Cours CESI\\A2\\4. Web\\Projet\\Projet Git\\Projet_web\\CODE\\www\\public\\tpl\\entreprise.tpl',
      1 => 1616494369,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6059bf28993633_27173342 (Smarty_Internal_Template $_smarty_tpl) {
?>                        <div class="row littleMarge" id="division<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
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
                            <div class="row justify-content-center" id="buttonsHover<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
                                <div class="rating">
                                	<div class="stars">
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
