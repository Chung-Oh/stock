<?php

require_once '../../vendor/autoload.php';

use Src\Config\Erro;
use Src\Dao\ProductDao;

try {
	$object = new ProductDao(
		$_POST['name'],
		$_POST['description'],
		allLower($_POST['weight']),
		afterFirst($_POST['color']),
		$_POST['category_id']
	);
	// Setando Usuário que está atualizando
	$object->product->setCreatedBy($_SESSION['user_id']);
	registerNewProduct(9, $object);
} catch (PDOException $e) {
	// Erro::handler($e);
	header("Location: ../../app/view/product.php");
	$_SESSION['danger'] = "<span>{$_POST['name']}</span> não foi cadastrado";
}