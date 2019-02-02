<?php 
require_once '../global.php';
require_once '../Dao/UserDao.php';
require_once '../Dao/LoggerDao.php';
require_once '../Helpers/date.php';
require_once '../Helpers/convert.php';
require_once '../Helpers/show-alert.php';
require_once '../Session/user-session.php';

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

	<?php require_once 'Templates/header.php' ?>
	<?php require_once 'User/form-user.php' ?>
	<main>
		<?php require_once 'User/main-top.php' ?>
		<?php require_once 'User/main-info-head.php' ?>	
		<?php require_once 'User/main-button.php' ?>	
	</main>
	<?php require_once 'Templates/button-go-top.php' ?>
	<?php require_once 'Templates/footer.php' ?>

<?php else : header("Location: ../../index.php") ?>
<?php endif ?>