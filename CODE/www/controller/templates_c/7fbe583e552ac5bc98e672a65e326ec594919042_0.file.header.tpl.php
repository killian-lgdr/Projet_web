<?php
/* Smarty version 3.1.39, created on 2021-03-20 18:42:39
  from 'D:\Ordinateur\CESI\A2\4_WEB\Projet\Projet_web\CODE\www\public\tpl\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6056340f560ab3_55608543',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7fbe583e552ac5bc98e672a65e326ec594919042' => 
    array (
      0 => 'D:\\Ordinateur\\CESI\\A2\\4_WEB\\Projet\\Projet_web\\CODE\\www\\public\\tpl\\header.tpl',
      1 => 1616168027,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6056340f560ab3_55608543 (Smarty_Internal_Template $_smarty_tpl) {
?>    <header class="row">
      <div class="col">
          <div id="navbar" class="container-fluid brd">
            <div class="row">
                <div class="col-lg-1 col-sm-2 align-self-center"><img src="../public/img/logo.PNG" alt="logo"></div>
                <div class="col-lg-3 col-sm-2 align-self-center">
                    <a class="active" href="#home">Accueil</a>
                    <a href="#contact">Entreprises</a>
                    <a href="#about">Etudiants</a>
                </div>
                <div class="col-lg-4 col-sm-4  align-self-center"><h1 id="titre">Le Bon Stage</h1></div>
                <div class="col-lg-3 col-sm-2 align-self-center" id="navbar-right">
                    <a id="connexionButton" class="active" href="#h">Connexion</a>
                    <a href="#contact">Pilote/Délegué</a>
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
