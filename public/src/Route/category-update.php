<?php 
require_once '../global.php';
require_once '../Dao/CategoryDao.php';
require_once '../Helpers/user-session.php';
require_once '../Validation/register.php';

try {
	$category = new CategoryDao($_POST['name'], $_POST['id']);
	$old = new CategoryDao($_POST['oldName'], $_POST['id']);
	validateUpdateCategory(2, $category, $old, $_POST['name'], $_POST['id']);
} catch (PDOException $e) {
	Erro::handler($e);
	$_SESSION['danger'] = "<span>{$_POST['name']}</span> não foi atualizado";
	header("Location: ../View/category.php");
}