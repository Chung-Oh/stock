<?php 
/*** Categoria ***/
function newCategory($current)
{
	if ($current->new()) {
		$_SESSION['success'] = "<span>{$_POST['name']}</span> cadastrado com sucesso";
		header("Location: ../View/category.php");
	} 	
}

function updateCategory($current)
{
	if ($current->update()) {
		$_SESSION['success'] = "<span>{$_POST['name']}</span> alterado com sucesso";
		header("Location: ../View/category.php");
	}
}

function deleteCategory($current)
{
	if ($current->delete()) {
		$_SESSION['success'] = "<span>{$_POST['name']}</span> removido com sucesso";
		header("Location: ../View/category.php");
	}	
}
/*** Produto ***/
function newProduct($current)
{
	if ($current->new()) {
		$_SESSION['success'] = "<span>{$_POST['name']}</span> cadastrado com sucesso";
		header("Location: ../View/product.php");	
	}
}