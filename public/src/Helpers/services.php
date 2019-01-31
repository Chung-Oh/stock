<?php 
require_once 'convert.php';

function testPath($path, $msg)
{
	if ($path == "index.php") {
		header("Location: ../../index.php");
		$_SESSION['danger'] = $msg;
	} elseif ($path == "product.php") {
		header("Location: ../View/product.php");
		$_SESSION['danger'] = $msg;
	} elseif ($path == "detail.php") {
		header("Location: ../View/detail.php");
		$_SESSION['danger'] = $msg;
	} elseif ($path == "user.php") {
		header("Location: ../View/user.php");
		$_SESSION['danger'] = $msg;
	} elseif ($path == "redefine.php") {
		header("Location: ../View/user.php");
		$_SESSION['danger'] = $msg;
	}
}

function countProduct($name, $id)
{
	$category = new CategoryDao($name, $id);
	$list = $category->loadDetails();
	return count($list->products);
}

function percentage($name, $id, $total)
{
	// Verifica se Array está vazio
	if (count($total) == 0) {
		return 0;
	} else {
		$quantity = countProduct($name, $id);
		$products = count($total);
		$result = ($quantity / $products) * 100;
		return customNumber($result, 3);		
	}
}