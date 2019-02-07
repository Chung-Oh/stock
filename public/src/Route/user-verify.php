<?php 
require_once '../global.php';
require_once '../Dao/UserDao.php';
require_once '../Validation/register.php';

try {
	$consult = new UserDao($_POST['name'], $_POST['password']);
	registerVerifyUser(3, $consult);
} catch (PDOException $e) {
	// Erro::handler($e);
	header("Location: ../../app/view/User.php");
	$_SESSION['danger'] = "Usuário e senha inválido";
}