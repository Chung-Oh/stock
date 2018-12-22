<?php 
require_once '../global.php';
require_once '../Dao/CategoryDao.php';
require_once '../Helpers/user-session.php';

try {
	$category = new CategoryDao($_POST['name']);
	if (strlen($_POST['name']) <= 50) {
		if (!$category->verifyNameExist()) {
			if ($category->new()) {
				$_SESSION['success'] = "<span>{$_POST['name']}</span> cadastrado com sucesso";
				header("Location: ../View/category.php");
			} 		
		} else {
			$_SESSION['danger'] = "<span>{$_POST['name']}</span> já existe no sistema";
			header("Location: ../View/category.php");
		}			
	} else {
		$_SESSION['danger'] = "Categoria inválida, tamanho máximo exigido <span>50 caracteres</span>";
		header("Location: ../View/category.php");
	}
} catch (PDOException $e) {
	Erro::handler($e);
	$_SESSION['danger'] = "<span>{$_POST['name']}</span> não foi cadastrado";
	header("Location: ../View/category.php");
}