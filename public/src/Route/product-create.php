<?php 
require_once '../global.php';
require_once '../Dao/ProductDao.php';
require_once '../Helpers/user-session.php';

try {
	$product = new ProductDao();
} catch (PDOException $e) {
	Erro::handler($e);
	$_SESSION['danger'] = "<span>{$_POST['name']}</span> não foi cadastrado";
	header("Location: ../View/product.php");
}