<?php 
require_once '../global.php';
require_once '../Dao/ProductDao.php';
require_once '../Helpers/user-session.php';

try {
	$product = new ProductDao($_POST['name'], $_POST['description'], $_POST['weight'], $_POST['color'], $_POST['category_id']);
	if (!$product->verifyProductExist()) {
		if (strlen($_POST['name']) <= 50) {
			$product->new();
			$_SESSION['success'] = "<span>{$_POST['name']}</span> cadastrado com sucesso";
			header("Location: ../View/product.php");		
		} else {
			$_SESSION['danger'] = "<span>Nome</span> do produto acima do exigido, máximo 50 caracteres";
			header("Location: ../View/product.php");
		}		
	} else {
		$_SESSION['danger'] = "Esse <span>produto</span> já existe no sistema";
		header("Location: ../View/product.php");
	}
} catch (PDOException $e) {
	Erro::handler($e);
	$_SESSION['danger'] = "<span>{$_POST['name']}</span> não foi cadastrado";
	header("Location: ../View/product.php");
}