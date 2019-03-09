<?php

require_once '../../vendor/autoload.php';

use Src\Config\Erro;
use Src\Dao\CategoryDao;
use Src\Session\CategorySession;

try {
	CategorySession::cleanSessionCategory();
	// Verifica tempo da Sessão
	sessionExist();
	// Destruindo authorized para redefinir nova senha
	unset($_SESSION['authorized']);
	$categorys = CategoryDao::list();
} catch (PDOException $e) {
	Erro::handler($e);
}

if (userIsLogged()) : ?>

	<?php require_once 'templates/header.php' ?>
	<?php require_once 'category/form-create.php' ?>
	<main>
		<?php require_once 'category/main-top.php' ?>
		<!-- Verifica se tem Categoria -->
		<?php if (count($categorys) > 0) : ?>
			<?php require_once 'category/form-edit.php' ?>
			<?php require_once 'category/form-delete.php' ?>
			<?php require_once 'category/main-table.php' ?>
		<?php else : ?>
			<?php require_once 'category/main-empty.php' ?>
		<?php endif ?>
		<!-- Fim -->
	</main>
	<?php require_once 'templates/button-go-top.php' ?>
	<?php require_once 'templates/footer.php' ?>

<?php else : header("Location: ../../index.php") ?>
<?php endif ?>