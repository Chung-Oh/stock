<?php 
require_once '../../src/global.php';
require_once '../../src/Dao/CategoryDao.php';
require_once '../../src/Dao/ProductDao.php';
require_once '../../src/Helpers/convert.php';
require_once '../../src/Helpers/show-alert.php';
require_once '../../src/Session/user-session.php';
require_once '../../src/Session/category-session.php';

try {
	// Session abaixo serve para redirecionar os Form criação e edição
	$_SESSION['path'] = basename(__FILE__);
	// Verifica tempo da Sessão
	sessionExist();
	// Destruindo authorized para redefinir nova senha
	unset($_SESSION['authorized']);
	$categorys = CategoryDao::list();
	$products = ProductDao::list();
} catch (PDOException $e) {
	Erro::handler($e);
}

if (userIsLogged()) : ?>

	<?php require_once 'templates/header.php' ?>
	<?php require_once 'product/form-create.php' ?>
	<main>
		<!-- Verifica se tem Categoria -->
		<?php if (count($categorys) > 0) : ?>
			<?php require_once 'product/main-top.php' ?>
			<!-- Verifica se tem Produto -->
			<?php if (count($products) > 0) : ?>
				<?php require_once 'product/form-edit.php' ?>
				<?php require_once 'product/form-delete.php' ?>
				<?php require_once 'product/main-table.php' ?>
			<?php else : ?>
				<?php require_once 'product/main-product-empty.php' ?>
			<?php endif ?>
			<!-- Fim Produto -->
		<?php else : ?>
			<?php require_once 'product/main-category-empty.php' ?>
		<?php endif ?>
		<!-- Fim Categoria -->
	</main>
	<?php require_once 'templates/button-go-top.php' ?>
	<?php require_once 'templates/footer.php' ?>

<?php else : header("Location: ../../index.php") ?>
<?php endif ?>