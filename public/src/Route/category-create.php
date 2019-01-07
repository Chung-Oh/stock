<?php 
require_once '../global.php';
require_once '../Dao/CategoryDao.php';
require_once '../Helpers/user-session.php';
require_once '../Validation/register.php';

try {
	$category = new CategoryDao($_POST['name']);
	validateNewCategory(1, $category, $_POST['name']);
} catch (PDOException $e) {
	Erro::handler($e);
	$_SESSION['danger'] = "<span>{$_POST['name']}</span> não foi cadastrado";
	header("Location: ../View/category.php");
}