<?php 
require_once 'ProductDao.php';
require_once '../../src/Model/Category.php';

class CategoryDao
{
	public $category;
	public $products;

	public function __construct($name, $id = null)
	{
		$this->category = new Category($name, $id);
	}
	// Page Categorias
	public static function list()
	{
		$query = "SELECT id, name, created_at, updated_at, created_by, updated_by FROM categorys ORDER BY id";
		$conn = Connection::getConn();
		$result = $conn->query($query);
		$list = array();
		foreach ($result->fetchAll() as $category_array) {
			$category = new Category($category_array['name'], $category_array['id']);
			$category->setCreatedAt($category_array['created_at']);
			$category->setUpdatedAt($category_array['updated_at']);
			$category->setCreatedBy($category_array['created_by']);
			$category->setUpdatedBy($category_array['updated_by']);
			array_push($list, $category);
		}
		return $list;
	}
	// Page Detalhes / Home
 	public static function load($id)
	{
		$query = "SELECT c.id, c.name, c.created_at, c.updated_at, (SELECT u.name FROM users AS u JOIN categorys AS c ON u.id = c.created_by WHERE c.id = :id) AS created_by, (SELECT u.name FROM users AS u JOIN categorys AS c ON u.id = c.updated_by WHERE c.id = :id) AS updated_by FROM categorys AS c WHERE c.id = :id ORDER BY id";
		$conn = Connection::getConn();
		$stmt = $conn->prepare($query);
		$stmt->bindValue(':id', $id);
		$stmt->execute();
		$result = $stmt->fetch();
		$category = new Category($result['name'], $result['id']);
		$category->setCreatedAt($result['created_at']);
		$category->setUpdatedAt($result['updated_at']);
		$category->setCreatedBy($result['created_by']);
		$category->setUpdatedBy($result['updated_by']);
		return $category;
	}
	// Page Detalhes
	public function loadDetails()
	{
		$this->category = $this->load($this->category->getId());
		$this->products = ProductDao::load($this->category->getId());
		return $this;
	}
	// Tela de login, usado na validação
	public function verifyNameExist()
	{
		$query = "SELECT id, name FROM categorys WHERE name = :name";
		$conn = Connection::getConn();
		$stmt = $conn->prepare($query);
		$stmt->bindValue(':name', $this->category->getName());
		$stmt->execute();
		$result = $stmt->fetch();
		return $result;
	}
	// Validação
	public function verifyCategoryExist()
	{
		$query = "SELECT id, name FROM categorys WHERE id = :id AND name = :name";
		$conn = Connection::getConn();
		$stmt = $conn->prepare($query);
		$stmt->bindValue(':id', $this->category->getId());
		$stmt->bindValue(':name', $this->category->getName());
		$stmt->execute();
		$result = $stmt->fetch();
		return $result;
	}
	// Page Categorias
	public function new()
	{
		$query = "INSERT INTO categorys (name, created_at, created_by) VALUES (:name, current_timestamp(), :created_by)";
		$conn = Connection::getConn();
		$stmt = $conn->prepare($query);
		$stmt->bindValue(':name', $this->category->getName());
		$stmt->bindValue(':created_by', $this->category->getCreatedBy());
		$result = $stmt->execute();
		return $result;
	}
	// Page Categorias
	public function update()
	{
		$query = "UPDATE categorys SET name = :name, updated_at = current_timestamp(), updated_by = :updated_by 
			WHERE id = :id";
		$conn = Connection::getConn();
		$stmt = $conn->prepare($query);
		$stmt->bindValue(':id', $this->category->getId());
		$stmt->bindValue(':name', $this->category->getName());
		$stmt->bindValue(':updated_by', $this->category->getUpdatedBy());
		$newName = $stmt->execute();
		return $newName;
	}
	// Page Categorias
	public function delete()
	{
		$query = "DELETE FROM categorys WHERE id = :id AND name = :name";
		$conn = Connection::getConn();
		$stmt = $conn->prepare($query);
		$stmt->bindValue(':id', $this->category->getId());
		$stmt->bindValue(':name', $this->category->getName());
		$result = $stmt->execute();
		return $result;
	}
}