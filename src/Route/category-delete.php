<?php

require_once '../../vendor/autoload.php';

use Src\Config\Erro;
use Src\Dao\CategoryDao;

try {
	$category = new CategoryDao($_POST['name'], $_POST['id']);
	registerDeleteCategory(8, $category);
} catch (PDOException $e) {
	// Erro::handler($e);
	header("Location: ../../app/view/category.php");
	$_SESSION['danger'] = "Essa operação exige que remova produtos <span>relacionados</span>";
}