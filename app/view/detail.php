<?php

require_once '../../vendor/autoload.php';

use Src\Config\Erro;
use Src\Dao\CategoryDao;

try {
	// Session abaixo serve para redirecionar os Form criação e edição
	$_SESSION['path'] = basename(__FILE__);
	// Verifica tempo da Sessão
	sessionExist();
	// Destruindo authorized para redefinir nova senha
	unset($_SESSION['authorized']);
	$categorys = CategoryDao::list();
	if (haveSessionCategory()) {
		$catList = new CategoryDao($_SESSION['name'], $_SESSION['id']);
		$catList->loadDetails();
	} else {
		$catList = array(array());
	}
} catch (PDOException $e) {
	Erro::handler($e);
}

if (userIsLogged()) : ?>

	<?php require_once 'templates/header.php' ?>
	<main>
		<!-- Verifica se tem Categoria -->
		<?php if (count($categorys) > 0) : ?>
			<?php require_once 'detail/main-top.php' ?>
			<!-- Verifica se tem Produto -->
			<?php if (empty($catList->products)) : ?>
				<?php require_once 'detail/form-create.php' ?>
				<?php require_once 'detail/main-create.php' ?>
				<?php require_once 'product/main-product-empty.php' ?>
			<?php else : ?>
				<?php require_once 'detail/form-edit.php' ?>
				<?php require_once 'detail/form-delete.php' ?>
				<?php require_once 'detail/main-info-head.php' ?>
				<?php require_once 'detail/main-info-button.php' ?>
				<?php require_once 'detail/main-info-body.php' ?>
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