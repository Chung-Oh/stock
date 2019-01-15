<?php 
require_once '../Helpers/convert.php';
require_once '../Helpers/category-session.php';
/*** Categoria ***/
function loadCategory($current)
{
	$category = CategoryDao::load($current);
	setCategory($category->getId(), $category->getName());
	$_SESSION['success'] = "Segue abaixo lista detalhada de <span>{$category->getName()}</span>";
	header("Location: ../../View/category-details.php"); 	
}

function newCategory($current)
{
	if ($current->new()) {
		$name = customString($_POST['name'], 20);
		$_SESSION['success'] = "<span>{$name}</span> cadastrado com sucesso";
		header("Location: ../View/category.php");
	} 	
}

function updateCategory($current)
{
	if ($current->update()) {
		$name = customString($_POST['name'], 20);
		$_SESSION['success'] = "<span>{$name}</span> alterado com sucesso";
		header("Location: ../View/category.php");
	}
}

function deleteCategory($current)
{
	if ($current->delete()) {
		$name = customString($_POST['name'], 20);
		$_SESSION['success'] = "<span>{$name}</span> removido com sucesso";
		header("Location: ../View/category.php");
	}	
}
/*** Produto ***/
function newProduct($current)
{
	if ($current->new()) {
		$name = customString($_POST['name'], 20);
		$_SESSION['success'] = "<span>{$name}</span> cadastrado com sucesso";
		header("Location: ../View/product.php");	
	}
}

function updateProduct($current)
{
	if ($current->update()) {
		$name = customString($_POST['name'], 20);
		$_SESSION['success'] = "<span>{$name}</span> alterado com sucesso";
		header("Location: ../View/product.php");	
	}	
}

function deleteProduct($current)
{
	if ($current->delete()) {
		$name = customString($_POST['name'], 20);
		$_SESSION['success'] = "<span>{$name}</span> removido com sucesso";
		header("Location: ../View/product.php");	
	}
}