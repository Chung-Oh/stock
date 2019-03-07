<?php

function setCategory($id, $name)
{
	$_SESSION['id'] = $id;
	$_SESSION['name'] = $name;
}

function haveSessionCategory()
{
	return isset($_SESSION['id']);
}

function cleanSessionCategory()
{
	unset($_SESSION['id'], $_SESSION['name']);
}