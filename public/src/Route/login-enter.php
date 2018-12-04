<?php 
require_once '../global.php';
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
} catch (PDOException $e) {
	Erro::handler($e);
}