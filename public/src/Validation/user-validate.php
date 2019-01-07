<?php 
// require_once 'option.php';
require_once '../Helpers/user-session.php';

function validateUserNameLength($consult)
{
	if (strlen($_POST['name']) <= 50) {
		validatePasswordLength($consult);
	} else {
		$_SESSION['danger'] = 'Nome inválido, acima do exigido. Máximo 50 letras.';
		header("Location: ../../index.php");
	}
}

function validatePasswordLength($consult)
{
	if (strlen($_POST['password']) <= 50) {
		validateUserExist($consult);
	} else {
		$_SESSION['danger'] = 'Senha inválida, acima do exigido. Máximo 50 letras.';
		header("Location: ../../index.php");
	}
}

function validateUserExist($consult)
{
	$user = $consult->verifyUser();
	if ($user->getUser()->getId() == null) {
		$_SESSION['danger'] = 'Usuário ou senha inválida.';
		header("Location: ../../index.php");
	} else {
		$_SESSION['success'] = 'Usuário logado com sucesso.';
		logUser($user->getUser()->getName());
		header("Location: ../View/home.php");
	}
}