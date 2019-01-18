<?php 
require_once '../global.php';
require_once '../Dao/CategoryDao.php';
require_once '../Helpers/convert.php';
require_once '../Validation/register.php';

try {
	$category = new CategoryDao(afterFirst($_POST['name']));
	$name = customString($_POST['name'], 25);
	registerNewCategory(2, $category);
} catch (PDOException $e) {
	// Erro::handler($e);
	$_SESSION['danger'] = "<span>{$name}</span> não foi cadastrado";
	header("Location: ../View/category.php");
}