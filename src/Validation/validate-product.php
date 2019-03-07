<?php

function validateProductOldIsValid($op, $current, $old)
{
	if ($old->verifyProductExist() && is_numeric($_POST['id'])) {
		validateProductIfExist($op, $current);
	} else {
		testPath(
			$_SESSION['path'],
			"Formulário <span>violado,</span> produto não existe no sistema"
		);
	}
}

function validateProductIfExist($op, $current)
{
	if (!$current->verifyProductExist()) {
		validateProductNameIsNull($op, $current);
	} else {
		testPath(
			$_SESSION['path'],
			"Esse <span>produto</span> já existe no sistema"
		);
	}
}
// Verificar nome vazio
function validateProductNameIsNull($op, $current)
{
	if (!$_POST['name'] == null) {
		validateProductSpecialChars($op, $current);
	} else {
		testPath(
			$_SESSION['path'],
			"Não foi possível, campo <span>nome</span> vazio"
		);
	}
}
// Filtrar caracteres epeciais
function validateProductSpecialChars($op, $current)
{
	if (filter_var($_POST['name'], FILTER_VALIDATE_REGEXP, array("options" =>
		array("regexp" => "/^([\w\s\dáâãéêíóõôúç].{0,50})/")))) {
		validateProductColorIsNumber($op, $current);
	} else {
		testPath(
			$_SESSION['path'],
			"<span>Produto</span> não conrresponde como exigido"
		);
	}
}
// Verifica se Cor não é numérico
function validateProductColorIsNumber($op, $current)
{
	if(!is_numeric($_POST['color'])) {
		validateProductDescIsNull($op, $current);
	} else {
		testPath(
			$_SESSION['path'],
			"Campo <span>cor</span> não pode ser numérico"
		);
	}
}
// Verificar campo vazio
function validateProductDescIsNull($op, $current)
{
	if (!$_POST['description'] == null) {
		validateProductWeightIsNull($op, $current);
	} else {
		testPath(
			$_SESSION['path'],
			"Não foi possível, campo <span>descrição</span> vazio"
		);
	}
}

function validateProductWeightIsNull($op, $current)
{
	if (!$_POST['weight'] == null) {
		validateProductColorIsNull($op, $current);
	} else {
		testPath(
			$_SESSION['path'],
			"Não foi possível, campo <span>peso</span> vazio"
		);
	}
}

function validateProductColorIsNull($op, $current)
{
	if (!$_POST['color'] == null) {
		validateProductCategoryIsNull($op, $current);
	} else {
		testPath(
			$_SESSION['path'],
			"Não foi possível, campo <span>cor</span> vazio"
		);
	}
}

function validateProductCategoryIsNull($op, $current)
{
	if (!$_POST['category_id'] == null) {
		validateProductNameLength($op, $current);
	} else {
		testPath(
			$_SESSION['path'],
			"Não foi possível, campo <span>categoria</span> vazio"
		);
	}
}
// Verificar tamanho
function validateProductNameLength($op, $current)
{
	if (strlen($_POST['name']) <= 50) {
		validateProductDescLength($op, $current);
	} else {
		testPath(
			$_SESSION['path'],
			"<span>Nome</span> acima do exigido, máximo 50 caracteres"
		);
	}
}

function validateProductDescLength($op, $current)
{
	if (strlen($_POST['description']) <= 255) {
		validateProductWeightLength($op, $current);
	} else {
		testPath(
			$_SESSION['path'],
			"<span>Descrição</span> acima do exigido, máximo 250 caracteres"
		);
	}
}

function validateProductWeightLength($op, $current)
{
	if (strlen($_POST['weight']) <= 50) {
		validateProductColorLength($op, $current);
	} else {
		testPath(
			$_SESSION['path'],
			"<span>Peso</span> acima do exigido, máximo 100 caracteres"
		);
	}
}

function validateProductColorLength($op, $current)
{
	if (strlen($_POST['color']) <= 25) {
		validateProductCategoryId($op, $current);
	} else {
		testPath(
			$_SESSION['path'],
			"<span>Cor</span> acima do exigido, máximo 25 caracteres"
		);
	}
}
// Verifica se Categoria é numérico
function validateProductCategoryId($op, $current)
{
	if (is_numeric($_POST['category_id'])) {
		option($op, $current);
	} else {
		testPath(
			$_SESSION['path'],
			"<span>Categoria</span> não conrresponde. Formulário <span>violado</span>"
		);
	}
}
// Remover
function validateProductToRemove($op, $current)
{
	if ($current->verifyProductExist()) {
		validateProductCategoryId($op, $current);
	} else {
		testPath(
			$_SESSION['path'],
			"Formulário <span>violado,</span> não foi possível remover"
		);
	}
}