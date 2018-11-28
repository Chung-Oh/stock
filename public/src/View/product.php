<?php 
require_once '../Helpers/user-session.php';

if (userIsLogged()) : ?>

<?php require_once 'Templates/header.php' ?>
	<h1>Página Home Produtos.</h1>
<?php require_once 'Templates/footer.php' ?>

<?php else : header("Location: ../../index.php") ?>
<?php endif ?>