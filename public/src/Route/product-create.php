<?php 
require_once '../global.php';
require_once '../Dao/ProductDao.php';
require_once '../Helpers/convert.php';
require_once '../Validation/register.php';

try {
	$product = new ProductDao(
		$_POST['name'], 
		$_POST['description'], 
		allLower($_POST['weight']), 
		afterFirst($_POST['color']), 
		$_POST['category_id']
	);
	registerNewProduct(5, $product);
} catch (PDOException $e) {
	// Erro::handler($e);
	$_SESSION['danger'] = "<span>{$_POST['name']}</span> não foi cadastrado";
	header("Location: ../View/product.php");
}