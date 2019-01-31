<?php 
require_once '../global.php';
require_once '../Dao/ProductDao.php';
require_once '../Validation/register.php';

try {
	$product = new ProductDao(
		$_POST['name'], 
		$_POST['description'], 
		$_POST['weight'], 
		$_POST['color'], 
		$_POST['category_id'], 
		$_POST['id']
	);
	registerDeleteProduct(11, $product);
} catch (PDOException $e) {
	// Erro::handler($e);
	header("Location: ../View/product.php");
	$_SESSION['danger'] = "<span>{$_POST['name']}</span> não foi removido";
}