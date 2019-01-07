<?php 
require_once 'operation.php';

function option($op, $current)
{
	switch ($op) {
		case '1':
			newCategory($current);
			break;
		case '2':
			updateCategory($current);
			break;
		case '3':
			deleteCategory($current);
			break;
	}
}