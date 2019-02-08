<?php

require_once '../../vendor/autoload.php';

use Src\Config\Erro;
use Src\Dao\ProductDao;

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
	header("Location: ../../app/view/product.php");
	$_SESSION['danger'] = "<span>{$_POST['name']}</span> não foi removido";
}