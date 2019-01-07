<?php 
require_once 'user-validate.php';
require_once 'category-validate.php';

function validateLogIn($consult, $name, $password)
{
	validateNameLength($consult, $name, $password);
}

function validateNewCategory($op, $current, $name) 
{
	validateLength($op, $current, $name);
}

function validateUpdateCategory($op, $current, $old, $name, $id)
{
	validateIfExist($op, $current, $old, $name, $id);
}

function validateDeleteCategory($op, $current, $name, $id)
{
	validateId($op, $current, $name, $id);
}