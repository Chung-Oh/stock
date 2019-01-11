<?php 

function allLower($target)
{
	return strtolower($target);
}

function afterFirst($target)
{
	$first = ucfirst(substr($target, 0, 1));
	$afterFirst = strtolower(substr($target, 1));
	return $first .= $afterFirst;
}