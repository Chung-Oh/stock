<?php 
require_once '../global.php';
require_once '../Dao/CategoryDao.php';
require_once '../Helpers/user-session.php';
/*
echo '<pre>';
print_r($_POST);
die();
*/
try {
	$category = new CategoryDao($_POST['name']);
	if ($category->delete($_POST['id'])) {
		$_SESSION['success'] = "<span>{$_POST['name']}</span> removido com sucesso";
		header("Location: ../View/category.php");
	}
	die();	
} catch (PDOException $e) {
	Erro::handler($e);
	$_SESSION['danger'] = "<span>{$_POST['name']}</span> não foi removido";
	header("Location: ../View/category.php");
}