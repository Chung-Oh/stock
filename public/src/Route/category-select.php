<?php 
require_once '../global.php';
require_once '../Dao/CategoryDao.php';
require_once '../Validation/register.php';

try {
	registerSelectCategory(5, $_GET['id']);
} catch (PDOException $e) {
	// Erro::handler($e);
	header("Location: ../../app/view/category.php");
	$_SESSION['danger'] = "Categoria <span>{$_GET['id']}</span> vazia";
}