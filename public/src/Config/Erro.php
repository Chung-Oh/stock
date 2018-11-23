<?php 

class Erro
{
	public static function handler(Exception $e)
	{
		if (DEBUG) {
			//Para desenvolvimento
			echo '<pre>';
			print_r($e);
			echo '<pre>';
		} else {
			//Para produção-usuário
			include '../View/erro.php';
		}
		exit;
	}
}