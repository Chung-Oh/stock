<?php
/*** Usuário ***/
function registerVerifyUser($op, $current)
{
	validateUserNameLength($op, $current);
}

function registerLogOutUser($op, $current)
{
	validateLogOut($op, $current);
}
/*** Categoria ***/
function registerSelectCategory($op, $current)
{
	validateCategoryIdSelect($op, $current);
}

function registerNewCategory($op, $current)
{
	validateCategoryIsNull($op, $current);
}

function registerUpdateCategory($op, $current, $old)
{
	validateCategoryIfExist($op, $current, $old);
}

function registerDeleteCategory($op, $current)
{
	validateCategoryId($op, $current);
}
/*** Produto ***/
function registerNewProduct($op, $current)
{
	validateProductIfExist($op, $current);
}

function registerUpdateProduct($op, $current, $old)
{
	validateProductOldIsValid($op, $current, $old);
}

function registerDeleteProduct($op, $current)
{
	validateProductToRemove($op, $current);
}