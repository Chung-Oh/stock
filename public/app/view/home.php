<?php 
require_once '../../src/global.php';
require_once '../../src/Dao/CategoryDao.php';
require_once '../../src/Dao/ProductDao.php';
require_once '../../src/Helpers/show-alert.php';
require_once '../../src/Helpers/services.php';
require_once '../../src/Session/user-session.php';

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