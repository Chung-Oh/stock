<?php 
require_once '../global.php';
require_once '../Dao/CategoryDao.php';
require_once '../Helpers/convert.php';
require_once '../Helpers/user-session.php';
require_once '../Validation/register.php';

try {
	$category = new CategoryDao(afterFirst($_POST['name']));
	registerNewCategory(2, $category);
} catch (PDOException $e) {
	Erro::handler($e);
	$_SESSION['danger'] = "<span>{$_POST['name']}</span> não foi cadastrado";
	header("Location: ../View/category.php");
}