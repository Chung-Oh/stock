<?php 
require_once '../global.php';
require_once '../Dao/CategoryDao.php';
require_once '../Helpers/convert.php';
require_once '../Validation/register.php';

try {
	$category = new CategoryDao(afterFirst($_POST['name']), $_POST['id']);
	$old = new CategoryDao($_POST['oldName'], $_POST['id']);
	$name = customString($_POST['name'], 25);
	registerUpdateCategory(6, $category, $old);
} catch (PDOException $e) {
	// Erro::handler($e);
	$_SESSION['danger'] = "<span>{$name}</span> não foi atualizado";
	header("Location: ../View/category.php");
}