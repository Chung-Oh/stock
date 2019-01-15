<?php 
require_once '../global.php';
require_once '../Dao/CategoryDao.php';
require_once '../Validation/register.php';

try {
	$category = new CategoryDao($_POST['name'], $_POST['id']);
	registerDeleteCategory(4, $category);
} catch (PDOException $e) {
	// Erro::handler($e);
	$_SESSION['danger'] = "Para essa operação, remova produtos <span>relacionados</span> a categoria";
	header("Location: ../View/category.php");
}