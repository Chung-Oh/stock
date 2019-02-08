<?php

require_once '../../vendor/autoload.php';

use Src\Config\Erro;
use Src\Dao\UserDao;

try {
	$consult = new UserDao($_POST['name'], $_POST['password']);
	registerVerifyUser(4, $consult);
} catch (PDOException $e) {
	// Erro::handler($e);
	header("Location: ../../app/view/User.php");
	$_SESSION['danger'] = "Não foi possível fazer <span>redefinição</span> do usuário.";
}