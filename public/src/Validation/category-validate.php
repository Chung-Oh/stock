<?php
require_once 'option.php';

function validateIfExist($op, $current, $old, $name, $id)
{
	if ($old->verifyCategoryExist() && is_numeric($id)) {
		validateLength($op, $current, $name);
	} else {
		$_SESSION['danger'] = "Formulário <span>violado</span>, categoria não conrresponde com o sistema";
		header("Location: ../View/category.php");
	}
}

function validateLength($op, $current, $name)
{
	if (strlen($name) <= 50) {
		validateName($op, $current);
	} else {
		$_SESSION['danger'] = "Categoria inválida, tamanho máximo exigido <span>50 caracteres</span>";
		header("Location: ../View/category.php");
	}
}

function validateName($op, $current)
{
	if (!$current->verifyNameExist()) {
		option($op, $current);
	} else {
		$_SESSION['danger'] = "<span>{$_POST['name']}</span> já existe no sistema";
		header("Location: ../View/category.php");
	}
}

function validateId($op, $current, $name, $id)
{
	if (is_numeric($id)) {
		validateRemoving($op, $current, $name);		
	} else {
		$_SESSION['danger'] = "Formulário violado, ID: <span>{$id}</span> não existe";
		header("Location: ../View/category.php");
	}
}

function validateRemoving($op, $current, $name)
{
	if ($current->verifyCategoryExist()) {
		option($op, $current);
	} else {
		$_SESSION['danger'] = "Formulário violado, <span>{$name}</span> não foi removido";
		header("Location: ../View/category.php");
	}
}