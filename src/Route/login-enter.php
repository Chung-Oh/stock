<?php

require_once '../../vendor/autoload.php';

use Src\Config\Erro;
use Src\Dao\UserDao;

try {
	$consult = new UserDao($_POST['name'], $_POST['password']);
	// Validação do Usuário
	registerVerifyUser(1, $consult);
} catch (PDOException $e) {
	Erro::handler($e);
}