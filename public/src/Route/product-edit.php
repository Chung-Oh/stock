<?php 
require_once '../global.php';
require_once '../Dao/ProductDao.php';
require_once '../Helpers/user-session.php';
require_once '../Validation/register.php';

try {
	$product = new ProductDao($_POST['name'], $_POST['description'], $_POST['weight'], $_POST['color'], $_POST['category_id'], $_POST['id']);
	$old = new ProductDao($_POST['oldName'], $_POST['oldDesc'], $_POST['oldWeight'], $_POST['oldColor'], $_POST['oldCategoryId'], $_POST['id']);

	echo '<pre>';
	echo 'Novo<br>';
	print_r($product);
	echo '<br>============================================================================<br>';
	echo 'Velho<br>';
	print_r($old);
	die();

	// validateUpdateProduct(2, $category, $old);
} catch (PDOException $e) {
	Erro::handler($e);
	$_SESSION['danger'] = "<span>{$_POST['name']}</span> não foi atualizado";
	header("Location: ../View/product.php");
}