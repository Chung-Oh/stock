<?php

require_once '../../vendor/autoload.php';

use Src\Config\Erro;
use Src\Dao\CategoryDao;
use Src\Dao\ProductDao;

try {
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
	<main>
		<?php require_once 'home/main-top.php' ?>
		<?php if ($categorys) : ?>
			<?php require_once 'home/main-dash-top.php' ?>
			<?php require_once 'home/main-dash-body.php' ?>
		<?php endif ?>
	</main>
	<?php require_once 'templates/button-go-top.php' ?>
	<?php require_once 'templates/footer.php' ?>

<?php else : header("Location: ../../index.php") ?>
<?php endif ?>