<?php 
require_once '../Helpers/user-session.php';

if (userIsLogged()) : ?>

<?php require_once 'Templates/header.php' ?>
<?php require_once 'Templates/main-category.php' ?>
<?php require_once 'Templates/footer.php' ?>

<?php else : header("Location: ../../index.php") ?>
<?php endif ?>