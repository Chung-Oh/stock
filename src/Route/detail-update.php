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
		$_POST['category_id'],
		$_POST['id']
	);
	// Setando Usuário que está atualizando
	$object->product->setUpdatedBy($_SESSION['user_id']);
	$old = new ProductDao(
		$_POST['oldName'],
		$_POST['oldDesc'],
		$_POST['oldWeight'],
		$_POST['oldColor'],
		$_POST['oldCategoryId'],
		$_POST['id']
	);
	registerUpdateProduct(13, $object, $old);
} catch (PDOException $e) {
	// Erro::handler($e);
	header("Location: ../../app/view/product.php");
	$_SESSION['danger'] = "<span>{$_POST['name']}</span> não foi atualizado";
}