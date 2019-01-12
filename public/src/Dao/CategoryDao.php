<?php 
require_once '../Model/Category.php';
require_once '../Helpers/user-session.php';

class CategoryDao
{
	private $category;

	public function __construct($name, $id = null)
	{
		$this->category = new Category($name, $id);
	}

	public static function list()
	{
		$query = "SELECT id, name FROM categorys ORDER BY id";
		$conn = Connection::getConn();
		$result = $conn->query($query);
		$list = array();
		foreach ($result->fetchAll() as $category_array) {
			$category = new Category($category_array['name'], $category_array['id']);
			array_push($list, $category);
		}
		return $list;
	}
	
 	public function load($id)
	{
		$query = "SELECT id, name FROM categorys WHERE id = :id";
		$conn = Connection::getConn();
		$stmt = $conn->prepare($query);
		$stmt->bindValue(':id', $id);
		$stmt->execute();
		$result = $stmt->fetch();
		return $result;
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
		$query = "INSERT INTO categorys (name) VALUES (:name)";
		$conn = Connection::getConn();
		$stmt = $conn->prepare($query);
		$stmt->bindValue(':name', $this->category->getName());
		$stmt->execute();
		return true;
	}

	public function update()
	{
		$query = "UPDATE categorys SET name = :name WHERE id = :id";
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
		$stmt->execute();
		return true;
	}
}