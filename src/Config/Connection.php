<?php

namespace Src\Config;

use \PDO;

class Connection
{
	public static function getConn()
	{
		$conn = new PDO(DB_DRIVER . ':host=' . HOSTNAME . ';dbname=' . DB_NAME, USERNAME, PASSWORD);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $conn;
	}
}