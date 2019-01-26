<?php 
require_once 'operation.php';

function option($op, $current = null)
{
	switch ($op) {
		/*** Usuário ***/
		case 1:
			logInUser($current);
			break;
		case 2:
			logOutUser($current);
			break;
		case 3:
			redefineUser($current);
			break;
		/*** Categoria ***/
		case 4:
			loadCategory($current);
			break;
		case 5:
			newCategory($current);
			break;
		case 6:
			updateCategory($current);
			break;
		case 7:
			deleteCategory($current);
			break;
		/*** Produto ***/
		case 8:
			newProduct($current);
			break;
		case 9:
			updateProduct($current);
			break;
		case 10:
			deleteProduct($current);
			break;
		/*** Detalhe ***/
		case 11:
			newProductDetail($current);
			break;
		case 12:
			updateProductDetail($current);
			break;
		case 13:
			deleteProductDetail($current);
			break;
	}
}