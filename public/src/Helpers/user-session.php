<?php 
session_start();
//Verifica se é usuário
function isUser()
{
	if (!userLogged()) {
		$_SESSION['danger'] = 'Você não tem acesso.';
		header("Location: index.php");
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
function logUser($name)
{
	$_SESSION['user_logged'] = $name;
}

function logout()
{
	session_destroy();
	session_start();
}