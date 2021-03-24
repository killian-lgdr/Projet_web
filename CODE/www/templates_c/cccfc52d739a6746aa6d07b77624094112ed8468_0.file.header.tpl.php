<?php
/* Smarty version 3.1.39, created on 2021-03-24 16:43:14
  from 'C:\Users\killi\Desktop\A2\4- developpement Web\Projet_web\CODE\www\public\tpl\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_605b5e1284fa14_67227189',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cccfc52d739a6746aa6d07b77624094112ed8468' => 
    array (
      0 => 'C:\\Users\\killi\\Desktop\\A2\\4- developpement Web\\Projet_web\\CODE\\www\\public\\tpl\\header.tpl',
      1 => 1616600242,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_605b5e1284fa14_67227189 (Smarty_Internal_Template $_smarty_tpl) {
?>    <header class="row">
      <div class="col">
          <div id="navbar" class="container-fluid brd">
            <div class="row">
                <div class="col-lg-1 col-sm-2 align-self-center"><img src="../public/img/logo.PNG" alt="logo"></div>
                <div class="col-lg-3 col-sm-2 align-self-center">
                    <a class="active" href="index.php">Accueil</a>
                    <a href="?action=listEntrepriseView">Entreprises</a>
                    <a href="#about">Etudiants</a>
                </div>
                <div class="col-lg-4 col-sm-4  align-self-center"><h1 id="titre">Le Bon Stage</h1></div>
                <div class="col-lg-3 col-sm-2 align-self-center" id="navbar-right">
                    <a id="connexionButton" class="active" href="#h">Connexion</a>
                    <a href="?action=PDView">Pilote/Délegué</a>
                </div>
                <div class="col-1 align-self-center">
                    <a href=""><i id="logo" class="fas fa-user"></i></a>
                </div>
            </div>
          </div>
        </div>
    </header>
<?php }
}
