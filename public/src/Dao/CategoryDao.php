<?php 
require_once 'ProductDao.php';
require_once '../Model/Category.php';

class CategoryDao
{
	public $category;
	public $products;

	public function __construct($name, $id = null)
	{
		if ($this->load($id)) {
			$this->category = $this->load($id);
		} else {
			$this->category = new Category($name, $id);			
		}
	}

	public static function list()
	{
		$query = "SELECT id, name, created_at, updated_at FROM categorys ORDER BY id";
		$conn = Connection::getConn();
		$result = $conn->query($query);
		$list = array();
		foreach ($result->fetchAll() as $category_array) {
			$category = new Category($category_array['name'], $category_array['id']);
			$category->setCreatedAt($category_array['created_at']);
			$category->setUpdatedAt($category_array['updated_at']);
			array_push($list, $category);
		}
		return $list;
	}
	
 	public static function load($id)
	{
		$query = "SELECT id, name, created_at, updated_at FROM categorys WHERE id = :id";
		$conn = Connection::getConn();
		$stmt = $conn->prepare($query);
		$stmt->bindValue(':id', $id);
		$stmt->execute();
		$result = $stmt->fetch();
		$category = new Category($result['name'], $result['id']);
		$category->setCreatedAt($result['created_at']);
		$category->setUpdatedAt($result['updated_at']);
		return $category;
	}

	public function loadDetails()
	{
		$this->products = ProductDao::load($this->category->getId());
		return $this;
	}

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

	public function new()
	{
		$query = "INSERT INTO categorys (name, created_at) VALUES (:name, current_timestamp())";
		$conn = Connection::getConn();
		$stmt = $conn->prepare($query);
		$stmt->bindValue(':name', $this->category->getName());
		$result = $stmt->execute();
		return $result;
	}

	public function update()
	{
		$query = "UPDATE categorys SET name = :name, updated_at = current_timestamp() WHERE id = :id";
		$conn = Connection::getConn();
		$stmt = $conn->prepare($query);
		$stmt->bindValue(':id', $this->category->getId());
		$stmt->bindValue(':name', $this->category->getName());
		$newName = $stmt->execute();
		return $newName;			
	}

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