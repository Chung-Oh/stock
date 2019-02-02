<?php 
require_once '../global.php';
require_once '../Dao/CategoryDao.php';
require_once '../Helpers/convert.php';
require_once '../Validation/register.php';

try {
	$object = new CategoryDao(afterFirst($_POST['name']));
	// Setando Usuário que está atualizando
	$object->category->setCreatedBy($_SESSION['user_id']);
	$name = customString($_POST['name'], 25);
	registerNewCategory(6, $object);
} catch (PDOException $e) {
	// Erro::handler($e);
	header("Location: ../View/category.php");
	$_SESSION['danger'] = "<span>{$name}</span> não foi cadastrado";
}