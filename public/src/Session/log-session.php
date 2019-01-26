<?php 
// Registra entrada
function beginAccess()
{
	$_SESSION['log_in'] = date("Y-m-d H:i:s");
}
// Registra saída
function endAccess()
{
	$_SESSION['log_out'] = date("Y-m-d H:i:s");
}