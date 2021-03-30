<?php
/* Smarty version 3.1.39, created on 2021-03-30 18:02:02
  from 'D:\Ordinateur\CESI\A2\4_WEB\Projet\Projet_web\CODE\www\public\tpl\postule.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_60634b7ae84c01_28034318',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd2a2cb1a3962a8c77ae341aacaccce58bc1ae2af' => 
    array (
      0 => 'D:\\Ordinateur\\CESI\\A2\\4_WEB\\Projet\\Projet_web\\CODE\\www\\public\\tpl\\postule.tpl',
      1 => 1617120118,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60634b7ae84c01_28034318 (Smarty_Internal_Template $_smarty_tpl) {
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


                            <div class="row justify-content-center" >
                                <div class="col-auto"><div class="boutton" id="etatSuivant<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">Etape <?php echo $_smarty_tpl->tpl_vars['avancement']->value;?>
 terminée</div></div>
                            </div>
                        </div>
                        
                    </div>

                    <?php 
                        if (substr_count($_COOKIE['droits'], 'Informer le système de l\'avancement de la candidature step 1') == 1){
                    ?>
                    <?php echo '<script'; ?>
>
                            
                            $("#etatSuivant<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
").click(function(){
                            
                                $.ajax({
                                url: "./controller/CandidatureController.php",
                                type:"GET",
                                data: "function=avancerCandidature&offre=" + <?php echo $_smarty_tpl->tpl_vars['id']->value;?>
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
                    <?php 
                        }
}
}
