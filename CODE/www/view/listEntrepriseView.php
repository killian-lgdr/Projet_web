<?php include_once('./public/vendors/libs/Smarty.class.php');
    $obj = new smarty; ?>

<!doctype html>
    <html lang="fr">

        <?php $obj->assign('titre','Entreprise');
            $obj->display('./public/tpl/head.tpl'); ?>
        <body>
            <?php $obj->display('./public/tpl/header.tpl');?>
<main>

<p>bite</p>

</main>
                <?php $obj->display('../public/tpl/footer.tpl');
                $obj->display('../public/tpl/script.tpl'); ?>
        </body>
</html>
