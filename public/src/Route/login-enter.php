<?php
require_once '../global.php';
require_once '../Dao/UserDao.php';
require_once '../Validation/register.php';

try {
	$consult = new UserDao($_POST['name'], $_POST['password']);
	validateLogIn($consult, $_POST['name'], $_POST['password']);
} catch (PDOException $e) {
	Erro::handler($e);
}