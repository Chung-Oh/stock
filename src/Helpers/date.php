<?php

function testArg($arg)
{
	if ($arg) {
		return true;
	} else {
		return false;
	}
}

function messageDefault()
{
	echo "N/D";
}
// Converte para Data
function manipulateDate($arg)
{
	if (testArg($arg)) {
		$year = substr($arg, 0, 4);
		$month = substr($arg, 5, 2);
		$day = substr($arg, 8, 2);
		$char = '/';
		$date = $day . $char . $month . $char . $year;
		return $date;
	} else {
		messageDefault();
	}
}
// Converte para Horas
function manipulateTime($arg)
{
	if (testArg($arg)) {
		$time = substr($arg, 11, 8) . " hrs";
		return $time;
	} else {
		messageDefault();
	}
}
// Converte para Data completa
function dateFull($arg)
{
	if (testArg($arg)) {
		$time = manipulateTime($arg);
		$date = manipulateDate($arg);
		$full = $date . " - " . $time;
		return $full;
	} else {
		messageDefault();
	}
}
// Retorna Início da Sessão
function initAccess($arg)
{
	$index = count($arg) - 1;
	$log = $arg[$index];
	$result = manipulateTime($log->getLogin());
	return $result;
}
// Verifica se está vazio
function isEmpty($arg)
{
	// 1º Cond. para primeiro acesso
	if (empty($arg->getLogin()) && empty($arg->getLogout())) {
		echo "N/D";
	} elseif (!empty($arg->getLogout())) {
		echo dateFull($arg->getLogout());
	} else {
		// Caso não tenha gravado último logout pega login
		echo dateFull($arg->getLogin());
	}
}
// Retorna Último acesso
function lastAccess($arg)
{
	if (count($arg) == 1) {
		$index = count($arg) - 1;
		$log = $arg[$index];
		isEmpty($log);
	} else {
		$index = count($arg) - 2;
		$log = $arg[$index];
		isEmpty($log);
	}
}