<?php 
require_once 'option.php';
require_once '../Helpers/user-session.php';

function validateNameLength($consult, $name, $password)
{
	if (strlen($name) <= 50) {
		validatePasswordLength($consult, $password);
	} else {
		$_SESSION['danger'] = 'Nome inválido, acima do exigido. Máximo 50 letras.';
		header("Location: ../../index.php");
	}
}

function validatePasswordLength($consult, $password)
{
	if (strlen($password) <= 50) {
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