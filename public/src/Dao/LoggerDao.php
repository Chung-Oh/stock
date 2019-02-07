<?php 
require_once '../../src/Model/Logger.php';

class LoggerDao
{
	private $log;

	public function __construct($user_id, $login, $logout = null)
	{
		$this->log = new Logger($user_id, $login, $logout);
	}
	// Entrar no sistema
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
	// Sair do sistema
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
	// Page Usuário / Redefinição
	public static function load($user_id)
	{
		$query = "SELECT id, login, logout, user_id FROM logger WHERE user_id = :user_id";
		$conn = Connection::getConn();
		$stmt = $conn->prepare($query);
		$stmt->bindValue(':user_id', $user_id);
		$stmt->execute();
		$result = $stmt->fetchAll();
		$list = array();
		foreach($result as $log) {
			$temp = new Logger(
				$log['user_id'],
				$log['login'],
				$log['logout']
			);
			$temp->setId($log['id']);
			array_push($list, $temp);
		}
		return $list;
	}
	// Acessar propriedade do Dao
	public function getLogger()
	{
		return $this->log;
	}
}