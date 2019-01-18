<?php 

function testPath($path, $msg)
{
	if ($path == "product.php") {
		$_SESSION['danger'] = $msg;
		header("Location: ../View/product.php");
	} else {
		$_SESSION['danger'] = $msg;
		header("Location: ../View/detail.php");
	}
}