<?php

require_once '../../vendor/autoload.php';

use Src\Config\Erro;
use Src\Dao\CategoryDao;
use Src\Helpers\Convert;

try {
	$object = new CategoryDao(Convert::afterFirst($_POST['name']));
	// Setando Usuário que está atualizando
	$object->category->setCreatedBy($_SESSION['user_id']);
	$name = Convert::customString($_POST['name'], 25);
	registerNewCategory(6, $object);
} catch (PDOException $e) {
	// Erro::handler($e);
	header("Location: ../../app/view/category.php");
	$_SESSION['danger'] = "<span>{$name}</span> não foi cadastrado";
}