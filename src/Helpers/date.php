<?php

namespace Src\Helpers;

class Date
{
	public static function testArg($arg)
	{
		if ($arg) {
			return true;
		} else {
			return false;
		}
	}

	public static function messageDefault()
	{
		echo "N/D";
	}
	// Converte para Data
	public static function manipulateDate($arg)
	{
		if (Date::testArg($arg)) {
			$year = substr($arg, 0, 4);
			$month = substr($arg, 5, 2);
			$day = substr($arg, 8, 2);
			$char = '/';
			$date = $day . $char . $month . $char . $year;
			return $date;
		} else {
			Date::messageDefault();
		}
	}
	// Converte para Horas
	public static function manipulateTime($arg)
	{
		if (Date::testArg($arg)) {
			$time = substr($arg, 11, 8) . " hrs";
			return $time;
		} else {
			Date::messageDefault();
		}
	}
	// Converte para Data completa
	public static function dateFull($arg)
	{
		if (Date::testArg($arg)) {
			$time = Date::manipulateTime($arg);
			$date = Date::manipulateDate($arg);
			$full = $date . " - " . $time;
			return $full;
		} else {
			Date::messageDefault();
		}
	}
	// Retorna Início da Sessão
	public static function initAccess($arg)
	{
		$index = count($arg) - 1;
		$log = $arg[$index];
		$result = Date::manipulateTime($log->getLogin());
		return $result;
	}
	// Verifica se está vazio
	public static function isEmpty($arg)
	{
		// 1º Cond. para primeiro acesso
		if (empty($arg->getLogin()) && empty($arg->getLogout())) {
			echo "N/D";
		} elseif (!empty($arg->getLogout())) {
			echo Date::dateFull($arg->getLogout());
		} else {
			// Caso não tenha gravado último logout pega login
			echo Date::dateFull($arg->getLogin());
		}
	}
	// Retorna Último acesso
	public static function lastAccess($arg)
	{
		if (count($arg) == 1) {
			$index = count($arg) - 1;
			$log = $arg[$index];
			Date::isEmpty($log);
		} else {
			$index = count($arg) - 2;
			$log = $arg[$index];
			Date::isEmpty($log);
		}
	}
}
