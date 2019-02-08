<?php

require_once '../../vendor/autoload.php';

use Src\Config\Erro;
use Src\Dao\CategoryDao;

try {
	$object = new CategoryDao(afterFirst($_POST['name']), $_POST['id']);
	// Setando Usuário que está atualizando
	$object->category->setUpdatedBy($_SESSION['user_id']);
	$old = new CategoryDao($_POST['oldName'], $_POST['id']);
	$name = customString($_POST['name'], 25);
	registerUpdateCategory(7, $object, $old);
} catch (PDOException $e) {
	// Erro::handler($e);
	header("Location: ../../app/view/category.php");
	$_SESSION['danger'] = "<span>{$name}</span> não foi atualizado";
}