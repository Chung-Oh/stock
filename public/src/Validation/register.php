<?php 
require_once 'user-validate.php';
require_once 'category-validate.php';
require_once 'product-validate.php';
/*** Usuário ***/
function validateLogIn($consult)
{
	validateUserNameLength($consult);
}
/*** Categoria ***/
function validateNewCategory($op, $current) 
{
	validateCategoryIsNull($op, $current);
}

function validateUpdateCategory($op, $current, $old)
{
	validateCategoryIfExist($op, $current, $old);
}

function validateDeleteCategory($op, $current)
{
	validateCategoryId($op, $current);
}
/*** Produto ***/
function validateNewProduct($op, $current)
{
	validateProductIfExist($op, $current);
}