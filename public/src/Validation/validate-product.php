<?php 
require_once 'option.php';

function validateProductOldIsValid($op, $current, $old)
{
	if ($old->verifyProductExist() && is_numeric($_POST['id'])) {
		validateProductIfExist($op, $current);
	} else {
		$_SESSION['danger'] = "Formulário <span>violado,</span> produto não existe no sistema";
		header("Location: ../View/product.php");		
	}
}

function validateProductIfExist($op, $current)
{
	if (!$current->verifyProductExist()) {
		validateProductSpecialChars($op, $current);
	} else {
		$_SESSION['danger'] = "Esse <span>produto</span> já existe no sistema";
		header("Location: ../View/product.php");		
	}
}
// Filtrar caracteres epeciais
function validateProductSpecialChars($op, $current)
{
	if (filter_var($_POST['name'], 
				FILTER_VALIDATE_REGEXP, array("options" => 
					array("regexp" => "/^([\w\s\dáâãéêíóõôúç].{0,50})/")))) {
						validateProductNameIsNull($op, $current);	
		} else {
			$_SESSION['danger'] = "<span>Produto</span> não conrresponde como exigido";
			header("Location: ../View/product.php");
		}
}
// Verificar campo vazio
function validateProductNameIsNull($op, $current)
{
	if (!$_POST['name'] == null) {
		validateProductDescIsNull($op, $current);
	} else {
		$_SESSION['danger'] = "Não foi possível, campo <span>nome</span> vazio";
		header("Location: ../View/product.php");
	}
}

function validateProductDescIsNull($op, $current)
{
	if (!$_POST['description'] == null) {
		validateProductWeightIsNull($op, $current);
	} else {
		$_SESSION['danger'] = "Não foi possível, campo <span>descrição</span> vazio";
		header("Location: ../View/product.php");
	}
}

function validateProductWeightIsNull($op, $current)
{
	if (!$_POST['weight'] == null) {
		validateProductColorIsNull($op, $current);
	} else {
		$_SESSION['danger'] = "Não foi possível, campo <span>peso</span> vazio";
		header("Location: ../View/product.php");
	}
}

function validateProductColorIsNull($op, $current)
{
	if (!$_POST['color'] == null) {
		validateProductCategoryIsNull($op, $current);
	} else {
		$_SESSION['danger'] = "Não foi possível, campo <span>cor</span> vazio";
		header("Location: ../View/product.php");
	}
}

function validateProductCategoryIsNull($op, $current)
{
	if (!$_POST['category_id'] == null) {
		validateProductNameLength($op, $current);
	} else {
		$_SESSION['danger'] = "Não foi possível, campo <span>categoria</span> vazio";
		header("Location: ../View/product.php");
	}
}
// Verificar tamanho
function validateProductNameLength($op, $current)
{
	if (strlen($_POST['name']) <= 50) {
		validateProductDescLength($op, $current);
	} else {
		$_SESSION['danger'] = "<span>Nome</span> acima do exigido, máximo 50 caracteres";
		header("Location: ../View/product.php");
	}
}

function validateProductDescLength($op, $current)
{
	if (strlen($_POST['description']) <= 250) {
		validateProductWeightLength($op, $current);
	} else {
		$_SESSION['danger'] = "<span>Descrição</span> acima do exigido, máximo 250 caracteres";
		header("Location: ../View/product.php");
	}
}

function validateProductWeightLength($op, $current)
{
	if (strlen($_POST['weight']) <= 50) {
		validateProductColorLength($op, $current);
	} else {
		$_SESSION['danger'] = "<span>Peso</span> acima do exigido, máximo 100 caracteres";
		header("Location: ../View/product.php");
	}
}

function validateProductColorLength($op, $current)
{
	if (strlen($_POST['color']) <= 25) {
		validateProductCategoryId($op, $current);
	} else {
		$_SESSION['danger'] = "<span>Cor</span> acima do exigido, máximo 25 caracteres";
		header("Location: ../View/product.php");	
	}
}
// Verifica se Categoria é numérico
function validateProductCategoryId($op, $current)
{
	if (is_numeric($_POST['category_id'])) {
		option($op, $current);
	} else {
		$_SESSION['danger'] = "<span>Categoria</span> não conrresponde. Formulário <span>violado</span>";
		header("Location: ../View/product.php");
	}
}
// Remoção
function validateProductToRemove($op, $current)
{
	if ($current->verifyProductExist()) {
		validateProductCategoryId($op, $current);
	} else {
		$_SESSION['danger'] = "Formulário <span>violado,</span> não foi possível remover";
		header("Location: ../View/product.php");		
	}
}