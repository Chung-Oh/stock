<?php 
require_once 'operation.php';

function option($op, $current)
{
	switch ($op) {
		/*** Categoria ***/
		case '1':
			newCategory($current);
			break;
		case '2':
			updateCategory($current);
			break;
		case '3':
			deleteCategory($current);
			break;
		/*** Produto ***/
		case '4':
			newProduct($current);
			break;
	}
}