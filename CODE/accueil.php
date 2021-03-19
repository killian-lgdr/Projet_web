<!doctype html>
    <html lang="fr">

    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">        
        <link rel="stylesheet" href="./assets/vendors/fontawesome-free-5.15.1-web/css/all.min.css">
        <link rel="stylesheet" href="./assets/css/style.css">
        <title>LeBonStage</title>
    </head>

<script>
        window.onscroll = function() {scrollFunction()};

        function scrollFunction() {
        if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
            document.getElementById("navbar").style.padding = "5px 10px";
        } else {
            document.getElementById("navbar").style.padding = "40px 10px";
        }
        }

        var conButton = document.getElementById("connexionButton");
        var conPage = document.getElementById("connexionPage");
        function afficherConPage(){
        if(conPage.style.display=="none")
        {
            conPage.style.display="block";
        }
        else{
            conPage.style.display="none";
        }
        }
        conButton.addEventListener('click', function(){afficherConPage()});
    </script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script src="./assets/js/code.index.js"></script>

<?php
    include_once('./assets/libs/Smarty.class.php');

    $obj = new smarty; 
    $obj->display('./tpl/header.tpl');
    $obj->display('./tpl/footer.tpl');
?>