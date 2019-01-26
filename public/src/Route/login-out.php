<?php
require_once '../global.php';
require_once '../Dao/LoggerDao.php';
require_once '../Validation/register.php';

try {
	$logger = new LoggerDao(
		$_SESSION['user_id'],
		$_SESSION['log_in']
	);
	registerLogOutUser(2, $logger);
} catch (Exception $e) {
	Erro::handler($e);
}