<?php

require_once '../../vendor/autoload.php';

use Src\Config\Erro;
use Src\Dao\LoggerDao;

try {
	$logger = new LoggerDao(
		$_SESSION['user_id'],
		$_SESSION['log_in']
	);
	registerLogOutUser(2, $logger);
} catch (Exception $e) {
	Erro::handler($e);
}