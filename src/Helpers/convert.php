<?php 

function allLower($target)
{
	return strtolower($target);
}

function afterFirst($target)
{
	if (!empty($target)) {
		$first = ucfirst(substr($target, 0, 1));
		$afterFirst = mb_strtolower(substr($target, 1));
		return $first .= $afterFirst;
	} else {
		echo 'N/D';
	}
}

function customString($target, $length)
{
	if (strlen($target) > $length) {
		$current = substr($target, 0, $length);
		$current .= "...";
		return $current;
	} else {
		return $target;
	}
}

function customNumber($target, $length)
{
	if (strlen($target) > $length) {
		$current = substr($target, 0, $length);
		return $current;
	} else {
		return $target;
	}
}