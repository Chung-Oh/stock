<?php

namespace Src\Helpers;

use Src\Dao\CategoryDao;

class Services
{
	public static function testPath($path, $msg)
	{
		if ($path == "index.php") {

			header("Location: ../../index.php");
			$_SESSION['danger'] = $msg;

		} elseif ($path == "product.php") {

			header("Location: ../../app/view/product.php");
			$_SESSION['danger'] = $msg;

		} elseif ($path == "detail.php") {

			header("Location: ../../app/view/detail.php");
			$_SESSION['danger'] = $msg;

		} elseif ($path == "user.php") {

			header("Location: ../../app/view/user.php");
			$_SESSION['danger'] = $msg;

		} elseif ($path == "redefine.php") {

			header("Location: ../../app/view/user.php");
			$_SESSION['danger'] = $msg;

		}
	}

	public static function countProduct($name, $id)
	{
		$category = new CategoryDao($name, $id);
		$list = $category->loadDetails();

		return count($list->products);
	}
}
