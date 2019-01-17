<?php 
require_once 'operation.php';

function option($op, $current)
{
	switch ($op) {
		/*** Categoria ***/
		case 1:
			loadCategory($current);
			break;
		case 2:
			newCategory($current);
			break;
		case 3:
			updateCategory($current);
			break;
		case 4:
			deleteCategory($current);
			break;
		/*** Produto ***/
		case 5:
			newProduct($current);
			break;
		case 6:
			updateProduct($current);
			break;
		case 7:
			deleteProduct($current);
			break;
		/*** Detalhe ***/
		case 8:
			newProductDetail($current);
			break;
		case 9:
			updateProductDetail($current);
			break;
		case 10:
			deleteProductDetail($current);
			break;
	}
}