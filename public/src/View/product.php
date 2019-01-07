<?php 
require_once '../global.php';
require_once '../Dao/CategoryDao.php';
require_once '../Dao/ProductDao.php';
require_once '../Helpers/user-session.php';
require_once '../Helpers/show-alert.php';

try {
	$categorys = CategoryDao::list();
	$products = ProductDao::list();
} catch (PDOException $e) {
	Erro::handler($e);
}

if (userIsLogged()) : ?>

	<?php require_once 'Templates/header.php' ?>
	<?php require_once 'Product/product-form-create.php' ?>
	<?php require_once 'Product/product-form-edit.php' ?>
	<!-- Aqui Formulários -->
	<main>
		<?php showAlert('success'); showAlert('danger') ?>
		<?php require_once 'Product/main-product-top.php' ?>
		<?php if (count($products) > 0) : ?>
			<?php require_once 'Product/main-product-table.php' ?>
		<?php else : ?>
			<?php require_once 'Product/main-product-empty.php' ?>
		<?php endif ?>
	</main>
	<?php require_once 'Templates/footer.php' ?>

<?php else : header("Location: ../../index.php") ?>
<?php endif ?>