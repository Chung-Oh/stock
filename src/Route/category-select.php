<?php

require_once '../../vendor/autoload.php';

use Src\Config\Erro;

try {
	registerSelectCategory(5, $_GET['id']);
} catch (PDOException $e) {
	// Erro::handler($e);
	header("Location: ../../app/view/category.php");
	$_SESSION['danger'] = "Categoria <span>{$_GET['id']}</span> vazia";
}