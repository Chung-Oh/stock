<?php
require_once 'option.php';
require_once '../Helpers/services.php';

function validateUserNameLength($op, $consult)
{
	if (strlen($_POST['name']) <= 50) {
		validatePasswordLength($op, $consult);
	} else {
		testPath(
			$_SESSION['path'],
			"Nome inválido, acima do exigido. Máximo 50 letras."
		);
	}
}

function validatePasswordLength($op, $consult)
{
	if (strlen($_POST['password']) <= 50) {
		verifyDirectory($op, $consult);
	} else {
		testPath(
			$_SESSION['path'],
			"Senha inválida, acima do exigido. Máximo 50 caracteres."
		);
	}
}

function verifyDirectory($op, $consult)
{
	if ($_SESSION['path'] == "index.php") {
		validateIsUser($op, $consult);
	} elseif ($_SESSION['path'] == "user.php") {
		validateUserExist($op, $consult);
	} elseif ($_SESSION['path'] == "redefine.php") {
		validateNewUserData($op, $consult);
	}
}
// Tela Login
function validateIsUser($op, $consult)
{
	$user = $consult->verifyUser();
	if ($user->getUser()->getId() == null) {
		testPath(
			$_SESSION['path'],
			"Usuário ou senha inválido."
		);
	} else {
		option($op, $consult);
	}
}
// Verificar se é realmente Usuário para redefinir Dados
function validateUserExist($op, $consult)
{
	$user = $consult->confirmUser($_SESSION['user_id']);
	if (empty($user->getUser()->getId())) {
		testPath(
			$_SESSION['path'],
			"Usuário ou senha inválido."
		);
	} else {
		option($op, $consult);
	}
}
// Redefinir novo Nome e Senha
function validateNewUserData($op, $consult)
{
	$user = $consult->verifyUser();
	if (!empty($user->getUser()->getId())) {
		testPath(
			$_SESSION['path'],
			"Usuário e senha já existe."
		);
	} else {
		option($op, $consult);
	}
}

function validateLogOut($op, $current)
{
	option($op, $current);
}