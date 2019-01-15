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
		$_POST['category_id'], 
		$_POST['id']
	);
	$old = new ProductDao(
		$_POST['oldName'], 
		$_POST['oldDesc'], 
		$_POST['oldWeight'], 
		$_POST['oldColor'], 
		$_POST['oldCategoryId'], 
		$_POST['id']
	);
	registerUpdateProduct(6, $product, $old);
} catch (PDOException $e) {
	// Erro::handler($e);
	$_SESSION['danger'] = "<span>{$_POST['name']}</span> não foi atualizado";
	header("Location: ../View/product.php");
}