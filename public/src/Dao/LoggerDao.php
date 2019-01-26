<?php 
require_once '../Model/Logger.php';

class LoggerDao
{
	private $log;

	public function __construct($user_id, $login, $logout = null)
	{
		$this->log = new Logger($user_id, $login, $logout);
	}

	public function out($logout)
	{
		$query = "INSERT INTO logger (login, logout, user_id) VALUES (:login, :logout, :user_id)";
		$conn = Connection::getConn();
		$stmt = $conn->prepare($query);
		$stmt->bindValue(':login', $this->log->getLogin());
		$stmt->bindValue(':logout', $logout);
		$stmt->bindValue(':user_id', $this->log->getUserId());
		$result = $stmt->execute();
		return $result;
	}

	public function getLogger()
	{
		return $this->log;
	}
}