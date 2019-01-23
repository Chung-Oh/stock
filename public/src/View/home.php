<?php 
require_once '../global.php';
require_once '../Dao/CategoryDao.php';
require_once '../Dao/ProductDao.php';
require_once '../Helpers/show-alert.php';
require_once '../Helpers/user-session.php';

try {
	$categorys = CategoryDao::list();
	$products = ProductDao::list();
	// echo '<pre>';
	// print_r($categorys);
	// echo '<br>=====================================================<br>';
	// print_r($_SESSION);
	// die();
} catch (PDOException $e) {
	Erro::handler($e);
}

if (userIsLogged()) : ?>

	<?php require_once 'Templates/header.php' ?>
	<main>
		<?php require_once 'Home/main-top.php' ?>
		<?php if ($categorys) : ?>
			<?php require_once 'Home/main-dash-top.php' ?>
			<?php require_once 'Home/main-dash-body.php' ?>
		<?php endif ?>
	</main>
	<?php require_once 'Templates/button-go-top.php' ?>
	<?php require_once 'Templates/footer.php' ?>

<?php else : header("Location: ../../index.php") ?>
<?php endif ?>