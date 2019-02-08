<?php

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
			verifyCurrentUser($current);
			break;
		case 4:
			redefineUser($current);
			break;
		/*** Categoria ***/
		case 5:
			loadCategory($current);
			break;
		case 6:
			newCategory($current);
			break;
		case 7:
			updateCategory($current);
			break;
		case 8:
			deleteCategory($current);
			break;
		/*** Produto ***/
		case 9:
			newProduct($current);
			break;
		case 10:
			updateProduct($current);
			break;
		case 11:
			deleteProduct($current);
			break;
		/*** Detalhe ***/
		case 12:
			newProductDetail($current);
			break;
		case 13:
			updateProductDetail($current);
			break;
		case 14:
			deleteProductDetail($current);
			break;
	}
}