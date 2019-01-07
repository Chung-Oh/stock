<?php
require_once 'option.php';

function validateCategoryIfExist($op, $current, $old)
{
	if ($old->verifyCategoryExist() && is_numeric($_POST['id'])) {
		validateCategoryIsNull($op, $current);
	} else {
		$_SESSION['danger'] = "Formulário <span>violado</span>, categoria não conrresponde com o sistema";
		header("Location: ../View/category.php");
	}
}

function validateCategoryIsNull($op, $current)
{
	if (!$_POST['name'] == null) {
		validateCategoryNameLength($op, $current);
	} else {
		$_SESSION['danger'] = "Não foi possível, nome <span>vazio</span>";
		header("Location: ../View/category.php");
	}
}

function validateCategoryNameLength($op, $current)
{
	if (strlen($_POST['name']) <= 50) {
		validateCategoryName($op, $current);
	} else {
		$_SESSION['danger'] = "Categoria inválida, máximo exigido <span>50 caracteres</span>";
		header("Location: ../View/category.php");
	}
}

function validateCategoryName($op, $current)
{
	if (!$current->verifyNameExist()) {
		option($op, $current);
	} else {
		$_SESSION['danger'] = "<span>{$_POST['name']}</span> já existe no sistema";
		header("Location: ../View/category.php");
	}
}
// Abaixo para Remoção
function validateCategoryId($op, $current)
{
	if (is_numeric($_POST['id'])) {
		validateCategoryRemoving($op, $current);		
	} else {
		$_SESSION['danger'] = "Formulário violado, ID: <span>{$_POST['id']}</span> não existe";
		header("Location: ../View/category.php");
	}
}

function validateCategoryRemoving($op, $current)
{
	if ($current->verifyCategoryExist()) {
		option($op, $current);
	} else {
		$_SESSION['danger'] = "Formulário violado, <span>{$_POST['name']}</span> não foi removido";
		header("Location: ../View/category.php");
	}
}