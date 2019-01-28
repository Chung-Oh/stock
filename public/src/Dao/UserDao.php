<?php 
require_once '../Model/User.php';

class UserDao
{
	private $user;

	public function __construct($name, $password)
	{
		$this->user = new User($name, md5($password));
	}

	public function verifyUser()
	{
		$query = "SELECT id, name, password FROM users WHERE name = :name AND password = :password";
		$conn = Connection::getConn();
		$stmt = $conn->prepare($query);
		$stmt->bindValue(':name', $this->user->getName());
		$stmt->bindValue(':password', $this->user->getPassword());
		$stmt->execute();
		$result = $stmt->fetch();
		$this->user->setId($result['id']);
		$this->user->setName($result['name']);
		$this->user->setPassword($result['password']);
		return $this;
	}

	public static function load($id)
	{
		$query = "SELECT id, name, password, created_at, updated_at FROM users WHERE id = :id";
		$conn = Connection::getConn();
		$stmt = $conn->prepare($query);
		$stmt->bindValue(':id', $id);
		$stmt->execute();
		$result = $stmt->fetch();
		$user = new User($result['name'], $result['password']);
		$user->setId($result['id']);
		$user->setCreatedAt($result['created_at']);
		$user->setUpdatedAt($result['updated_at']);
		return $user;
	}

	public function getUser()
	{
		return $this->user;
	}
}