<?php 

require_once '../Model/Category.php';

class CategoryDao
{
	private $category;

	public function __construct($name)
	{
		$this->category = new Category($name);
	}

	public static function list()
	{
		$query = "SELECT id, name FROM category";
		$conn = Connection::getConn();
		$result = $conn->query($query);
		return $result->fetchAll();
	}

	public function newCategory()
	{
		$query = "INSERT INTO category (name) VALUES (:name)";
		$conn = Connection::getConn();
		$stmt = $conn->prepare($query);
		$stmt->bindValue(':name', $this->category->getName());
		$stmt->execute();
		return true;
	}
}