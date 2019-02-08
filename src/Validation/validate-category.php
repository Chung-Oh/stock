<?php

use Src\Dao\ProductDao;
// Abaixo para adição e edição
function validateCategoryIfExist($op, $current, $old)
{
	if ($old->verifyCategoryExist() && is_numeric($_POST['id'])) {
		validateCategorySpecialChars($op, $current);
	} else {
		header("Location: ../../app/view/category.php");
		$_SESSION['danger'] = "Formulário <span>violado,</span> categoria não conrresponde com o sistema";
	}
}
// Filtrar caracteres epeciais
function validateCategorySpecialChars($op, $current)
{
	if (filter_var($_POST['name'], 
				FILTER_VALIDATE_REGEXP, array("options" => 
					array("regexp" => "/^([\w\s\dáâãéêíóõôúç].{0,50})/")))) {
						validateCategoryIsNull($op, $current);	
	} else {
		header("Location: ../../app/view/category.php");
		$_SESSION['danger'] = "<span>Categoria</span> não conrresponde como exigido";
	}
}

function validateCategoryIsNull($op, $current)
{
	if (!$_POST['name'] == null) {
		validateCategoryNameLength($op, $current);
	} else {
		header("Location: ../../app/view/category.php");
		$_SESSION['danger'] = "Não foi possível, nome <span>vazio</span>";
	}
}

function validateCategoryNameLength($op, $current)
{
	if (strlen($_POST['name']) <= 50) {
		validateCategoryName($op, $current);
	} else {
		header("Location: ../../app/view/category.php");
		$_SESSION['danger'] = "Categoria inválida, máximo exigido <span>50 caracteres</span>";
	}
}

function validateCategoryName($op, $current)
{
	if (!$current->verifyNameExist()) {
		option($op, $current);
	} else {
		header("Location: ../../app/view/category.php");
		$_SESSION['danger'] = "<span>{$_POST['name']}</span> já existe";
	}
}
// Abaixo para seleção
function validateCategoryIdSelect($op, $current)
{
	if (is_numeric($_GET['id'])) {
		validateCategoryIfDependency($op, $current);
	} else {
		header("Location: ../../app/view/category.php");
		$_SESSION['danger'] = "Formulário <span>violado,</span> categoria não conrresponde com o sistema";
	}
}

function validateCategoryIfDependency($op, $current)
{
	if (empty(ProductDao::load($current)) != 1) {
		option($op, $current);
	} else {
		header("Location: ../../../app/view/detail.php");
	}
}
// Abaixo para Remoção
function validateCategoryId($op, $current)
{
	if (is_numeric($_POST['id'])) {
		validateCategoryRemoving($op, $current);		
	} else {
		header("Location: ../../app/view/category.php");
		$_SESSION['danger'] = "Formulário violado, ID: <span>{$_POST['id']}</span> não existe";
	}
}

function validateCategoryRemoving($op, $current)
{
	if ($current->verifyCategoryExist()) {
		option($op, $current);
	} else {
		header("Location: ../../app/view/category.php");
		$_SESSION['danger'] = "Formulário violado, <span>{$_POST['name']}</span> não foi removido";
	}
}