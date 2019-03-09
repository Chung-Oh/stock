<?php

namespace Src\Session;

class CategorySession
{
	public static function setCategory($id, $name)
	{
		$_SESSION['id'] = $id;
		$_SESSION['name'] = $name;
	}

	public static function haveSessionCategory()
	{
		return isset($_SESSION['id']);
	}

	public static function cleanSessionCategory()
	{
		unset($_SESSION['id'], $_SESSION['name']);
	}
}
