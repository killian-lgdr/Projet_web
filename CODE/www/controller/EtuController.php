<?php

require_once('./model/EtuManager.php');

function listEtu(){

    $EtuManager = new EtuManager();


    require_once('./view/EtuView.php');
}
?>