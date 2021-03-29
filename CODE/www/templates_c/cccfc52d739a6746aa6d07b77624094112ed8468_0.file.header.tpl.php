<?php
/* Smarty version 3.1.39, created on 2021-03-29 16:10:23
  from 'C:\Users\killi\Desktop\A2\4- developpement Web\Projet_web\CODE\www\public\tpl\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6061dfcfac1943_51680903',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cccfc52d739a6746aa6d07b77624094112ed8468' => 
    array (
      0 => 'C:\\Users\\killi\\Desktop\\A2\\4- developpement Web\\Projet_web\\CODE\\www\\public\\tpl\\header.tpl',
      1 => 1617027017,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6061dfcfac1943_51680903 (Smarty_Internal_Template $_smarty_tpl) {
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
