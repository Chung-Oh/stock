<?php 
require_once '../../src/global.php';
require_once '../../src/Dao/UserDao.php';
require_once '../../src/Dao/LoggerDao.php';
require_once '../../src/Helpers/date.php';
require_once '../../src/Helpers/convert.php';
require_once '../../src/Helpers/show-alert.php';
require_once '../../src/Session/user-session.php';

try {
	// Verifica tempo da Sessão
	sessionExist();
	// Destruindo authorized para redefinir nova senha
	unset($_SESSION['authorized']);
	// Setando o caminho para pegar as sessions
	$_SESSION['path'] = basename(__FILE__);
	$user = UserDao::load($_SESSION['user_id']);
	// Quantidade de Categoria criado pelo usuário
	$categorysCreate = UserDao::countCategoryCreate($_SESSION['user_id']);
	// Quantidade de Categoria atualizado pelo usuário
	$categorysUpdate = UserDao::countCategoryUpdate($_SESSION['user_id']);
	// Quantidade de Produto criado pelo usuário
	$productsCreate = UserDao::countProductCreate($_SESSION['user_id']);
	// Quantidade de Produto atualizado pelo usuário
	$productsUpdate = UserDao::countProductUpdate($_SESSION['user_id']);
	// Informações dos acessos
	$logList = LoggerDao::load($_SESSION['user_id']);
} catch (PDOException $e) {
	Erro::handler($e);
}

if (userLogged()) : ?>

	<?php require_once 'templates/header.php' ?>
	<?php require_once 'user/form-user.php' ?>
	<main>
		<?php require_once 'user/main-top.php' ?>
		<?php require_once 'user/main-info-head.php' ?>	
		<?php require_once 'user/main-button.php' ?>	
	</main>
	<?php require_once 'templates/button-go-top.php' ?>
	<?php require_once 'templates/footer.php' ?>

<?php else : header("Location: ../../index.php") ?>
<?php endif ?>