<?php 
require_once '../Helpers/user-session.php';

try {
	logout();
	$_SESSION['success'] = 'Deslogado com sucesso.';
	header("Location: ../../index.php");
} catch (Exception $e) {
	Erro::handler($e);
}