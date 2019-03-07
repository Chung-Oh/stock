<?php

session_start();
//Verifica se é usuário
function isUser()
{
	if (!userLogged()) {
		header("Location: index.php");
		$_SESSION['danger'] = 'Você não tem acesso.';
		die();
	}
}
//Verifica se suário está logado
function userIsLogged()
{
	return isset($_SESSION['user_logged']);
}
//Retorna sessão do usuário
function userLogged()
{
	return $_SESSION['user_logged'];
}
//Loga usuário
function logUser($id, $name)
{
	$_SESSION['user_id'] = $id;
	$_SESSION['user_logged'] = $name;
}

function userLogOut()
{
	session_destroy();
	session_start();
}