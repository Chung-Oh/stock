<?php 
require_once '../global.php';
require_once '../Dao/CategoryDao.php';
require_once '../Helpers/user-session.php';

try {
	$category = new CategoryDao($_POST['name'], $_POST['id']);
	if (is_numeric($_POST['id']) && $category->verifyCategoryExist()) {
		if ($category->delete()) {
			$_SESSION['success'] = "<span>{$_POST['name']}</span> removido com sucesso";
			header("Location: ../View/category.php");
		}		
	} else {
		$_SESSION['danger'] = "<span>{$_POST['name']}</span> não foi removido, ID  <span>{$_POST['id']}</span> inválido";
		header("Location: ../View/category.php");
	}
} catch (PDOException $e) {
	Erro::handler($e);
	$_SESSION['danger'] = "<span>{$_POST['name']}</span> não foi removido";
	header("Location: ../View/category.php");
}