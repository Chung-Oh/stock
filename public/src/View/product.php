<?php 
require_once '../global.php';
require_once '../Dao/CategoryDao.php';
require_once '../Dao/ProductDao.php';
require_once '../Helpers/convert.php';
require_once '../Helpers/show-alert.php';
require_once '../Session/user-session.php';
require_once '../Session/category-session.php';

try {
	// Session abaixo serve para redirecionar os Form criação e edição
	$_SESSION['path'] = basename(__FILE__);
	$categorys = CategoryDao::list();
	$products = ProductDao::list();
} catch (PDOException $e) {
	Erro::handler($e);
}

if (userIsLogged()) : ?>

	<?php require_once 'Templates/header.php' ?>
	<?php require_once 'Product/form-create.php' ?>
	<main>
		<!-- Verifica se tem Categoria -->
		<?php if (count($categorys) > 0) : ?>
			<?php require_once 'Product/main-top.php' ?>
			<!-- Verifica se tem Produto -->
			<?php if (count($products) > 0) : ?>
				<?php require_once 'Product/form-edit.php' ?>
				<?php require_once 'Product/form-delete.php' ?>
				<?php require_once 'Product/main-table.php' ?>
			<?php else : ?>
				<?php require_once 'Product/main-product-empty.php' ?>
			<?php endif ?>
			<!-- Fim Produto -->
		<?php else : ?>
			<?php require_once 'Product/main-category-empty.php' ?>
		<?php endif ?>
		<!-- Fim Categoria -->
	</main>
	<?php require_once 'Templates/button-go-top.php' ?>
	<?php require_once 'Templates/footer.php' ?>

<?php else : header("Location: ../../index.php") ?>
<?php endif ?>