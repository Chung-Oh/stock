<?php 

require_once '../Config/conf.php';
require_once '../Config/Connection.php';
require_once '../Config/Erro.php';
require_once '../Dao/UserDao.php';
require_once '../Helpers/user-session.php';

try {
	$consult = new UserDao($_POST['name'], $_POST['password']);
	$login = $consult->verifyUser();

	if ($login->getUser()->getId() == null) {
		$_SESSION['danger'] = 'Usuário ou senha inválida.';
		header("Location: ../../index.php");
		die();
	} else {
		$_SESSION['success'] = 'Usuário logado com sucesso.';
		logUser($login->getUser()->getName());
		header("Location: ../View/home.php");
		die();
	}
} catch (Exception $e) {
	Erro::handler($e);
}