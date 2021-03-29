<?php
/* Smarty version 3.1.39, created on 2021-03-29 17:12:22
  from 'D:\Ordinateur\CESI\A2\4_WEB\Projet\Projet_web\CODE\www\public\tpl\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6061ee56d73308_28515169',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f7c6ca62334cbac7090fdb01963443660ca78cc2' => 
    array (
      0 => 'D:\\Ordinateur\\CESI\\A2\\4_WEB\\Projet\\Projet_web\\CODE\\www\\public\\tpl\\header.tpl',
      1 => 1617030706,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6061ee56d73308_28515169 (Smarty_Internal_Template $_smarty_tpl) {
?>    <header class="row">
      <div class="col">
          <div id="navbar" class="container-fluid brd">
            <div class="row">
                <div class="col-lg-1 col-sm-2 align-self-center"><img src="../public/img/lbs.svg" alt="logo"></div>
                <div class="col-lg-3 col-sm-2 align-self-center">
                    <a class="active" href="index.php">Accueil</a>
                    <a href="?action=listEntrepriseView">Entreprises</a>
                    <a href="?action=EtuView">Etudiants</a>
                </div>
                <div class="col-lg-4 col-sm-4  align-self-center"><h1 id="titre">Le Bon Stage</h1></div>
                <div class="col-lg-3 col-sm-2 align-self-center" id="navbar-right">
                    <a href="?action=PDView">Pilote/Délegué</a>
                    <a id="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="active" href="#h"><?php echo $_smarty_tpl->tpl_vars['con']->value;?>
</a>
                </div>
                <div class="col-1 align-self-center">
                    <form method="post" action="index.php"><input type="submit" value="exit" name="exit"></form>
                </div>
            </div>
          </div>
        </div>
    </header>
<?php }
}
