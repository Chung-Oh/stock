<?php 
require_once '../global.php';
require_once '../Dao/ProductDao.php';
require_once '../Helpers/convert.php';
require_once '../Validation/register.php';

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
	header("Location: ../View/product.php");
	$_SESSION['danger'] = "<span>{$_POST['name']}</span> não foi cadastrado";
}