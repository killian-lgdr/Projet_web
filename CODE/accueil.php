<?php
include_once('./assets/libs/Smarty.class.php');

$obj = new smarty; 
$obj->display('./templates/header.tpl');
$obj->display('./templates/footer.tpl');
?>