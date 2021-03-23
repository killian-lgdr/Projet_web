<?php
/* Smarty version 3.1.39, created on 2021-03-23 11:14:28
  from 'D:\Ordinateur\CESI\A2\4_WEB\Projet\Projet_web\CODE\www\public\tpl\offre.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6059bf84affab8_79510201',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a9c03650cd4e99d7118f35bff5b3ba0cfe292336' => 
    array (
      0 => 'D:\\Ordinateur\\CESI\\A2\\4_WEB\\Projet\\Projet_web\\CODE\\www\\public\\tpl\\offre.tpl',
      1 => 1616494465,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6059bf84affab8_79510201 (Smarty_Internal_Template $_smarty_tpl) {
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
                                    <p>Niveau Etudes min : A<?php echo $_smarty_tpl->tpl_vars['nivetudes']->value;?>
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
                            </div>
                            <div class="row justify-content-center" id="buttonsHover<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
                                <div class="col-auto"><button>Ajouter à la wish-list</button></div>
                                <div class="col-auto"><button>J'ai postulé</button></div>
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
