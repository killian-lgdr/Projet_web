<?php
/* Smarty version 3.1.39, created on 2021-03-22 11:16:25
  from 'C:\Users\33610\Desktop\CESI\Cours CESI\A2\4. Web\Projet\Projet Git\Projet_web\CODE\www\public\tpl\carroussel.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60586e7932b888_85144893',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8c0f2a7083b90fbb898795868a822db2180b9f6a' => 
    array (
      0 => 'C:\\Users\\33610\\Desktop\\CESI\\Cours CESI\\A2\\4. Web\\Projet\\Projet Git\\Projet_web\\CODE\\www\\public\\tpl\\carroussel.tpl',
      1 => 1616330827,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60586e7932b888_85144893 (Smarty_Internal_Template $_smarty_tpl) {
?>        <div class="row justify-content-center marge" id="carousel">
            <div class="col-10">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img class="d-block w-100" src="https://images8.alphacoders.com/926/926492.jpg">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="https://images8.alphacoders.com/926/926492.jpg" alt="Second slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="https://images8.alphacoders.com/926/926492.jpg" alt="Third slide">
                  </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            </div>
        </div><?php }
}
