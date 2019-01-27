<?php 
require_once '../Model/Logger.php';

class LoggerDao
{
	private $log;

	public function __construct($user_id, $login, $logout = null)
	{
		$this->log = new Logger($user_id, $login, $logout);
	}

	public function in()
	{
		$query = "INSERT INTO logger (login, user_id) VALUES (:login, :user_id)";
		$conn = Connection::getConn();
		$stmt = $conn->prepare($query);
		$stmt->bindValue(':login', $this->log->getLogin());
		$stmt->bindValue(':user_id', $this->log->getUserId());
		$result = $stmt->execute();
		return $result;
	}

	public function out($logout)
	{
		$query = "UPDATE logger SET logout = :logout WHERE login = :login AND user_id = :user_id";
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