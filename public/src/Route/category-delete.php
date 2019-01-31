<?php 
require_once '../global.php';
require_once '../Dao/CategoryDao.php';
require_once '../Validation/register.php';

try {
	$category = new CategoryDao($_POST['name'], $_POST['id']);
	registerDeleteCategory(8, $category);
} catch (PDOException $e) {
	// Erro::handler($e);
	header("Location: ../View/category.php");
	$_SESSION['danger'] = "Essa operação exige que remova produtos <span>relacionados</span> a categoria";
}