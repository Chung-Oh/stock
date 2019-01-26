<?php 
require_once '../global.php';
require_once '../Dao/CategoryDao.php';
require_once '../Validation/register.php';

try {
	registerSelectCategory(4, $_GET['id']);
} catch (PDOException $e) {
	// Erro::handler($e);
	$_SESSION['danger'] = "Categoria <span>{$_GET['id']}</span> vazia";
	header("Location: ../View/category.php");
}