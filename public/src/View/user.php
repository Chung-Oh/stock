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
	$user = UserDao::load($_SESSION['user_id']);
	$logList = LoggerDao::load($_SESSION['user_id']);
	/************************************************************/
	// echo '<pre>';
	// print_r($logList);
	// die();
	/************************************************************/
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