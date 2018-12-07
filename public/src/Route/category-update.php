<?php 
require_once '../global.php';
require_once '../Dao/CategoryDao.php';
require_once '../Helpers/user-session.php';
/*
$x = new CategoryDao(33);
echo '<pre>';
print_r($x);
die();
*/
try {
	$category = new CategoryDao($_POST['name']);
	if ($category->update($_POST['id'])) {
		$_SESSION['success'] = "<span>{$_POST['name']}</span> alterado com sucesso ";
		header("Location: ../View/category.php");
	}
	die();
} catch (PDOException $e) {
	//Erro::handler($e);
	$_SESSION['danger'] = "<span>{$_POST['name']}</span> não foi atualizado";
	header("Location: ../View/category.php");
}