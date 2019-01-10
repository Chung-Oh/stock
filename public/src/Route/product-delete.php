<?php 
require_once '../global.php';
require_once '../Dao/ProductDao.php';
require_once '../Helpers/user-session.php';
require_once '../Validation/register.php';

try {
	$product = new ProductDao($_POST['name'], $_POST['description'], $_POST['weight'], $_POST['color'], $_POST['category_id'], $_POST['id']);

	echo '<pre>';
	print_r($product);
	die();
	if ($product->delete()) {
		$_SESSION['success'] = "<span>{$_POST['name']}</span> removido com sucesso";
		header("Location: ../View/product.php");
	}
} catch (PDOException $e) {
	Erro::handler($e);
	$_SESSION['danger'] = "<span>{$_POST['name']}</span> não foi removido";
	header("Location: ../View/product.php");
}