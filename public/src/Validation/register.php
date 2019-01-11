<?php 
require_once 'validate-user.php';
require_once 'validate-category.php';
require_once 'validate-product.php';
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

function validateUpdateProduct($op, $current, $old)
{
	validateProductOldIsValid($op, $current, $old);
}