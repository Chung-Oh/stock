<?php 
require_once '../global.php';
require_once '../Dao/CategoryDao.php';
require_once '../Helpers/user-session.php';

try {
	$category = new CategoryDao($_POST['name']);
	if (!$category->newCategory()) {
		$_SESSION['success'] = "<span>{$_POST['name']}</span> cadastrado com sucesso";
		header("Location: ../View/category.php");
		die();		
	} else {
		$_SESSION['danger'] = "<span>{$_POST['name']}</span> não foi cadastrado";
		header("Location: ../View/category.php");
		die();
	}
} catch (PDOException $e) {
	// Classe Erro debugar
	// Erro::handler($e);
	
	$_SESSION['danger'] = "<span>{$_POST['name']}</span> não foi cadastrado";
	header("Location: ../View/category.php");
}