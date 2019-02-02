<?php 
require_once '../Model/User.php';

class UserDao
{
	private $user;
	private $copy;

	public function __construct($name, $password)
	{
		$this->user = new User($name, md5($password));
		$this->copy = new User($name, md5($password));
	}
	// Page Index, verificação de usuário
	public function verifyUser()
	{
		$query = "SELECT id, name, password, created_at, updated_at FROM users WHERE name = :name AND password = :password";
		$conn = Connection::getConn();
		$stmt = $conn->prepare($query);
		$stmt->bindValue(':name', $this->user->getName());
		$stmt->bindValue(':password', $this->user->getPassword());
		$stmt->execute();
		$result = $stmt->fetch();
		$this->user->setId($result['id']);
		$this->user->setName($result['name']);
		$this->user->setPassword($result['password']);
		$this->user->setCreatedAt($result['created_at']);
		$this->user->setUpdatedAt($result['updated_at']);
		return $this;
	}
	// Validação
	public function confirmUser($id)
	{
		$query = "SELECT id, name, password, created_at, updated_at FROM users WHERE id = :id AND name = :name AND password = :password";
		$conn = Connection::getConn();
		$stmt = $conn->prepare($query);
		$stmt->bindValue(':id', $id);
		$stmt->bindValue(':name', $this->user->getName());
		$stmt->bindValue(':password', $this->user->getPassword());
		$stmt->execute();
		$result = $stmt->fetch();
		$this->user->setId($result['id']);
		$this->user->setName($result['name']);
		$this->user->setPassword($result['password']);
		$this->user->setCreatedAt($result['created_at']);
		$this->user->setUpdatedAt($result['updated_at']);
		return $this;
	}
	// Page Usuário / Redefinição
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
	// Operação após validação
	public function update($id)
	{
		$query = "UPDATE users SET name = :name, password = :password, updated_at = current_timestamp() WHERE id = :id";
		$conn = Connection::getConn();
		$stmt = $conn->prepare($query);
		$stmt->bindValue(':id', $id);
		$stmt->bindValue(':name', $this->copy->getName());
		$stmt->bindValue(':password', $this->copy->getPassword());
		$result = $stmt->execute();
		return $result;
	}
	// Pegar contagem de Categorias criado pelo Usuário
	public static function countCategoryCreate($userId)
	{
		$query = "SELECT COUNT(name) AS categorys FROM categorys WHERE created_by = :created_by";
		$conn = Connection::getConn();
		$stmt = $conn->prepare($query);
		$stmt->bindValue(':created_by', $userId);
		$stmt->execute();
		$result = $stmt->fetch();
		return $result['categorys'];
	}
	// Pegar contagem de Categorias atualizado pelo Usuário
	public static function countCategoryUpdate($userId)
	{
		$query = "SELECT COUNT(name) AS categorys FROM categorys WHERE updated_by = :updated_by";
		$conn = Connection::getConn();
		$stmt = $conn->prepare($query);
		$stmt->bindValue(':updated_by', $userId);
		$stmt->execute();
		$result = $stmt->fetch();
		return $result['categorys'];
	}
	// Pegar contagem de Produtos criado pelo Usuário
	public static function countProductCreate($userId)
	{
		$query = "SELECT COUNT(name) AS products FROM products WHERE created_by = :created_by";
		$conn = Connection::getConn();
		$stmt = $conn->prepare($query);
		$stmt->bindValue(':created_by', $userId);
		$stmt->execute();
		$result = $stmt->fetch();
		return $result['products'];
	}
	// Pegar contagem de Produtos atualizado pelo Usuário
	public static function countProductUpdate($userId)
	{
		$query = "SELECT COUNT(name) AS products FROM products WHERE updated_by = :updated_by";
		$conn = Connection::getConn();
		$stmt = $conn->prepare($query);
		$stmt->bindValue(':updated_by', $userId);
		$stmt->execute();
		$result = $stmt->fetch();
		return $result['products'];
	}
	// Acessar propriedade do Dao nas validações
	public function getUser()
	{
		return $this->user;
	}
}