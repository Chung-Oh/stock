<?php

namespace Src\Helpers;

use Src\Helpers\Services;

class Convert
{
	public static function allLower($target)
	{
		return strtolower($target);
	}

	public static function afterFirst($target)
	{
		if (!empty($target)) {
			$first = ucfirst(substr($target, 0, 1));
			$afterFirst = mb_strtolower(substr($target, 1));
			return $first .= $afterFirst;
		} else {
			echo 'N/D';
		}
	}

	public static function customString($target, $length)
	{
		if (strlen($target) > $length) {
			$current = substr($target, 0, $length);
			$current .= "...";
			return $current;
		} else {
			return $target;
		}
	}

	public static function customNumber($target, $length)
	{
		if (strlen($target) > $length) {
			$current = substr($target, 0, $length);
			return $current;
		} else {
			return $target;
		}
	}

	public static function percentage($name, $id, $total)
	{
	// Verifica se Array está vazio
		if (count($total) == 0) {
			return 0;
		} else {
			$quantity = Services::countProduct($name, $id);
			$products = count($total);
			$result = ($quantity / $products) * 100;
		return Convert::customNumber($result, 3);
		}
	}
}
