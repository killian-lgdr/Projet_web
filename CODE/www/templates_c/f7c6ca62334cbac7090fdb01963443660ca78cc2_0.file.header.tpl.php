<?php
/* Smarty version 3.1.39, created on 2021-03-22 11:36:30
  from 'D:\Ordinateur\CESI\A2\4_WEB\Projet\Projet_web\CODE\www\public\tpl\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6058732edde2f6_32507402',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f7c6ca62334cbac7090fdb01963443660ca78cc2' => 
    array (
      0 => 'D:\\Ordinateur\\CESI\\A2\\4_WEB\\Projet\\Projet_web\\CODE\\www\\public\\tpl\\header.tpl',
      1 => 1616409355,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6058732edde2f6_32507402 (Smarty_Internal_Template $_smarty_tpl) {
?>    <header class="row">
      <div class="col">
          <div id="navbar" class="container-fluid brd">
            <div class="row">
                <div class="col-lg-1 col-sm-2 align-self-center"><img src="../public/img/logo.PNG" alt="logo"></div>
                <div class="col-lg-3 col-sm-2 align-self-center">
                    <a class="active" href="index.php">Accueil</a>
                    <a href="#contact">Entreprises</a>
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

    <div class="row justify-content-center">
        <div class="col-1.8 brd" id="connexionPage">
            <div>
                <label for="pseudo">Nom Utilisateur</label>
                <input type="text" id="pseudo">
            </div>
            <div>
                <label for="password">Mot de Passe</label>
                <input type="password" id="password">
            </div>
            <button type="submit">connexion</button>
        </div>
    </div><?php }
}
