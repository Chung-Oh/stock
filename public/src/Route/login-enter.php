<?php
require_once '../global.php';
require_once '../Dao/UserDao.php';
require_once '../Dao/LoggerDao.php';
require_once '../Validation/register.php';

try {
	$consult = new UserDao($_POST['name'], $_POST['password']);
	// Validação do Usuário
	registerLogUser(1, $consult);
} catch (PDOException $e) {
	Erro::handler($e);
}