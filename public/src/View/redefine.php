<?php 
require_once '../global.php';
require_once '../Dao/UserDao.php';
require_once '../Dao/LoggerDao.php';
require_once '../Helpers/date.php';
require_once '../Helpers/show-alert.php';
require_once '../Session/user-session.php';

try {
	// Verifica tempo da Sessão
	sessionExist();
	// Setando o caminho para pegar as sessions
	$_SESSION['path'] = basename(__FILE__);
	$user = UserDao::load($_SESSION['user_id']);
	$logList = LoggerDao::load($_SESSION['user_id']);
	/************************************************************/
	// echo '<pre>';
	// print_r($_SESSION);
	// die();
	/************************************************************/
} catch (PDOException $e) {
	Erro::handler($e);
}

if (isset($_SESSION['authorized'])) : ?>

	<?php require_once 'Templates/header.php' ?>
	<main>
		<?php require_once 'Redefine/main-top.php' ?>
		<?php require_once 'User/main-info-head.php' ?>
		<?php require_once 'Redefine/form-redefine.php' ?>
	</main>
	<?php require_once 'Templates/button-go-top.php' ?>
	<?php require_once 'Templates/footer.php' ?>

<?php else : header("Location: ../../index.php") ?>
<?php endif ?>