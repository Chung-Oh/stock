<?php 
require_once '../Dao/CategoryDao.php';
require_once '../Helpers/user-session.php';

try {
	
} catch (PDOException $e) {
	Erro::handler($e);
	$_SESSION['danger'] = "Categoria <span>{$_GET['id']}</span> vazia";
	header("Location: ../View/category.php");
}