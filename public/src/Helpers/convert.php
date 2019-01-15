<?php 

function allLower($target)
{
	return strtolower($target);
}

function afterFirst($target)
{
	$first = ucfirst(substr($target, 0, 1));
	$afterFirst = mb_strtolower(substr($target, 1));
	return $first .= $afterFirst;
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