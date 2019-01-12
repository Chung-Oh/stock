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

function customName($target)
{
	if (strlen($target) > 50) {
		$current = substr($target, 0, 50);
		$current .= "...";
		return $current;
	} else {
		return $target;
	}
}