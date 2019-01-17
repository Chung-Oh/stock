<?php 
require_once '../Helpers/convert.php';
require_once '../Helpers/category-session.php';
/*** Categoria ***/
function loadCategory($current)
{
	$category = CategoryDao::load($current);
	// Personalizando retorno do nome na Session com 25 caracteres
	$name = customString($category->getName(), 25);
	// Setando id e nome na session, abaixo
	setCategory($category->getId(), $category->getName());
	$_SESSION['success'] = "Segue abaixo lista detalhada de <span>{$name}</span>";
	header("Location: ../../View/category-details.php");
}

function newCategory($current)
{
	if ($current->new()) {
		$name = customString($_POST['name'], 25);
		$_SESSION['success'] = "<span>{$name}</span> cadastrado com sucesso";
		header("Location: ../View/category.php");
	} 	
}

function updateCategory($current)
{
	if ($current->update()) {
		$name = customString($_POST['name'], 25);
		$_SESSION['success'] = "<span>{$name}</span> alterado com sucesso";
		header("Location: ../View/category.php");
	}
}

function deleteCategory($current)
{
	if ($current->delete()) {
		$name = customString($_POST['name'], 25);
		$_SESSION['success'] = "<span>{$name}</span> removido com sucesso";
		header("Location: ../View/category.php");
	}	
}
/*** Produto ***/
function newProduct($current)
{
	if ($current->new()) {
		$name = customString($_POST['name'], 25);
		$_SESSION['success'] = "<span>{$name}</span> cadastrado com sucesso";
		header("Location: ../View/product.php");
	}
}

function updateProduct($current)
{
	if ($current->update()) {
		$name = customString($_POST['name'], 25);
		$_SESSION['success'] = "<span>{$name}</span> alterado com sucesso";
		header("Location: ../View/product.php");
	}
}

function deleteProduct($current)
{
	if ($current->delete()) {
		$name = customString($_POST['name'], 25);
		$_SESSION['success'] = "<span>{$name}</span> removido com sucesso";
		header("Location: ../View/product.php");
	}
}
/*** Detalhe ***/
function newProductDetail($current)
{
	$category = CategoryDao::load($_POST['category_id']);
	if ($current->new()) {
		setCategory($category->getId(), $category->getName());
		$name = customString($_POST['name'], 25);
		$_SESSION['success'] = "<span>{$name}</span> cadastrado com sucesso";
		header("Location: ../View/category-details.php");
	}
}
function updateProductDetail($current)
{
	$category = CategoryDao::load($_POST['category_id']);
	if ($current->update()) {
		setCategory($category->getId(), $category->getName());
		$name = customString($_POST['name'], 25);
		$_SESSION['success'] = "<span>{$name}</span> alterado com sucesso";
		header("Location: ../View/category-details.php");	
	}
}

function deleteProductDetail($current)
{
	$category = CategoryDao::load($_POST['category_id']);
	if ($current->delete()) {
		setCategory($category->getId(), $category->getName());
		$name = customString($_POST['name'], 25);
		$_SESSION['success'] = "<span>{$name}</span> removido com sucesso";
		header("Location: ../View/category-details.php");
	}
}