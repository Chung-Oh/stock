<?php 
require_once '../global.php';
require_once '../Dao/CategoryDao.php';
require_once '../Dao/ProductDao.php';
require_once '../Helpers/convert.php';
require_once '../Helpers/show-alert.php';
require_once '../Helpers/user-session.php';
require_once '../Helpers/category-session.php';

try {
	$_SESSION['path'] = basename(__FILE__);
	cleanSessionCategory();
	$categorys = CategoryDao::list();
	$products = ProductDao::list();
} catch (PDOException $e) {
	Erro::handler($e);
}

if (userIsLogged()) : ?>

	<?php require_once 'Templates/header.php' ?>
	<?php require_once 'Product/form-create.php' ?>
	<main>
		<?php require_once 'Product/main-top.php' ?>
		<?php if (count($products) > 0) : ?>
			<?php require_once 'Product/form-edit.php' ?>
			<?php require_once 'Product/form-delete.php' ?>
			<?php require_once 'Product/main-table.php' ?>
		<?php else : ?>
			<?php require_once 'Product/main-empty.php' ?>
		<?php endif ?>
	</main>
	<?php require_once 'Templates/button-go-top.php' ?>
	<?php require_once 'Templates/footer.php' ?>

<?php else : header("Location: ../../index.php") ?>
<?php endif ?>