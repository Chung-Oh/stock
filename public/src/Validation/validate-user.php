<?php
require_once 'option.php';
// require_once '../Session/user-session.php';

function validateUserNameLength($op, $consult)
{
	if (strlen($_POST['name']) <= 50) {
		validatePasswordLength($op, $consult);
	} else {
		$_SESSION['danger'] = "Nome inválido, acima do exigido. Máximo 50 letras.";
		header("Location: ../../index.php");
	}
}

function validatePasswordLength($op, $consult)
{
	if (strlen($_POST['password']) <= 50) {
		validateUserExist($op, $consult);
	} else {
		$_SESSION['danger'] = "Senha inválida, acima do exigido. Máximo 50 letras.";
		header("Location: ../../index.php");
	}
}

function validateUserExist($op, $consult)
{
	$user = $consult->verifyUser();
	if ($user->getUser()->getId() == null) {
		$_SESSION['danger'] = "Usuário ou senha inválida.";
		header("Location: ../../index.php");
	} else {
		option($op, $consult);
	}
}

function validateLogOut($op, $current)
{
	option($op, $current);
}