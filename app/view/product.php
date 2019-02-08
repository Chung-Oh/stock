<?php

require_once '../../vendor/autoload.php';

use Src\Config\Erro;
use Src\Dao\CategoryDao;
use Src\Dao\ProductDao;

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