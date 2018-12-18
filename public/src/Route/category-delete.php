<?php 
require_once '../global.php';
require_once '../Dao/CategoryDao.php';
require_once '../Helpers/user-session.php';

try {
	$category = new CategoryDao($_POST['name'], $_POST['id']);
	if ($category->delete()) {
		$_SESSION['success'] = "<span>{$_POST['name']}</span> removido com sucesso";
		header("Location: ../View/category.php");
	}
	die();	
} catch (PDOException $e) {
	Erro::handler($e);
	$_SESSION['danger'] = "<span>{$_POST['name']}</span> não foi removido";
	header("Location: ../View/category.php");
}