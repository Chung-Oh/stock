<?php 
require_once '../global.php';
require_once '../Dao/CategoryDao.php';
require_once '../Helpers/user-session.php';

try {
	$category = new CategoryDao($_POST['name']);
	if (!$category->verifyNameExist()) {
		if ($category->new()) {
			$_SESSION['success'] = "<span>{$_POST['name']}</span> cadastrado com sucesso";
			header("Location: ../View/category.php");
		} 		
	} else {
		$_SESSION['danger'] = "<span>{$_POST['name']}</span> já existe em nosso sistema";
		header("Location: ../View/category.php");
	}	
} catch (PDOException $e) {
	// Classe Erro debugar
	Erro::handler($e);
	$_SESSION['danger'] = "<span>{$_POST['name']}</span> não foi cadastrado";
	header("Location: ../View/category.php");
}