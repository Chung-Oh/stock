<?php 
require_once '../global.php';
require_once '../Dao/UserDao.php';
require_once '../Dao/LoggerDao.php';
require_once '../Validation/register.php';

try {
	$consult = new UserDao($_POST['name'], $_POST['password']);
	registerVerifyUser(4, $consult);
} catch (PDOException $e) {
	// Erro::handler($e);
	header("Location: ../View/User.php");
	$_SESSION['danger'] = "Não foi possível fazer <span>redefinição</span> do usuário.";
}