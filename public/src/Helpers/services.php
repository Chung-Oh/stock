<?php 
require_once 'convert.php';

function testPath($path, $msg)
{
	if ($path == "product.php") {
		$_SESSION['danger'] = $msg;
		header("Location: ../View/product.php");
	} else {
		$_SESSION['danger'] = $msg;
		header("Location: ../View/detail.php");
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