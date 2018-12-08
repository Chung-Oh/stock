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
		$query = "SELECT id, name FROM category";
		$conn = Connection::getConn();
		$result = $conn->query($query);
		$list = array();
		
		foreach ($result->fetchAll() as $category_array) {
			$category = new Category($category_array['name']);
			$category->setId($category_array['id']);	
			array_push($list, $category);
		}
		return $list;
	}
	
 	public function load($id)
	{
		$query = "SELECT id, name FROM category WHERE id = :id";
		$conn = Connection::getConn();
		$stmt = $conn->prepare($query);
		$stmt->bindValue(':id', $id);
		$stmt->execute();
		$this->category = $stmt->fetch();
	}

	public function new()
	{
		if (filter_var($this->category->getName(), 
				FILTER_VALIDATE_REGEXP, array("options" => 
					array("regexp" => "/([A-Za-z]{2,50})/")))) {
						$query = "INSERT INTO category (name) VALUES (:name)";
						$conn = Connection::getConn();
						$stmt = $conn->prepare($query);
						$stmt->bindValue(':name', $this->category->getName());
						$stmt->execute();
						return true;			
		} else {
			$_SESSION['danger'] = "<span>Categoria</span> não conrresponde como exigido";
			header("Location: ../View/category.php");
		}
	}

	public function delete($id)
	{
		if (filter_var($id, FILTER_VALIDATE_REGEXP, 
				array("options" => array("regexp" => "/(\d)/")))) {
					$query = "DELETE FROM category WHERE id = :id";
					$conn = Connection::getConn();
					$stmt = $conn->prepare($query);
					$stmt->bindValue(':id', $id);
					$stmt->execute();
					return true;			
		} else {
			$_SESSION['danger'] = "<span>Categoria</span> não pode ser removida";
			header("Location: ../View/category.php");
		}
	}

	public function update($id)
	{
		if (filter_var($this->category->getName(), 
				FILTER_VALIDATE_REGEXP, 
					array("options" => array("regexp" => "/[A-Za-z]{2,50}/")))) {
						$query = "UPDATE category SET name = :name WHERE id = :id";
						$conn = Connection::getConn();
						$stmt = $conn->prepare($query);
						$stmt->bindValue(':id', $id);
						$stmt->bindValue(':name', $this->category->getName());
						$newName = $stmt->execute();
						return $newName;			
		} else {
			$_SESSION['danger'] = "<span>Categoria</span> não pode ser alterada";
			header("Location: ../View/category.php");
		}
	}
}