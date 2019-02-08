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

function getOut()
{
	header("Location: ../Route/login-out.php");
}

function getTime()
{
	$_SESSION['session_time'] = time() + 3600;
}

function timeOver()
{
	if ($_SESSION['session_time'] < time()) {
		getOut();		
	} else {
		getTime();
	}
}

function sessionExist()
{
	if (isset($_SESSION['session_time'])) {
		timeOver();
	} else {
		getOut();
	}
}