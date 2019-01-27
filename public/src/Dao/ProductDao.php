<?php 
require_once '../Model/Product.php';

class ProductDao
{
	private $product;

	public function __construct($name, $description, $weight, $color, $category_id, $id = null)
	{
		$this->product = new Product($name, $description, $weight, $color, $category_id, $id);
	}

	public static function list()
	{
		$query = "SELECT p.id, p.name, p.description, p.weight, p.color, p.category_id, c.name 
			AS category_name, p.created_at, p.updated_at FROM products AS p JOIN categorys AS c 
			ON p.category_id = c.id ORDER BY id";
		$conn = Connection::getConn();
		$result = $conn->query($query);
		$list = array();
		foreach ($result->fetchAll() as $product_array) {
			$product = new Product(
				$product_array['name'], 
				$product_array['description'], 
				$product_array['weight'], 
				$product_array['color'], 
				$product_array['category_id'], 
				$product_array['id']
			);
			$product->setCategoryName($product_array['category_name']);
			$product->setCreatedAt($product_array['created_at']);
			$product->setUpdatedAt($product_array['updated_at']);
			array_push($list, $product);	
		}
		return $list;
	}

	public static function load($category_id)
	{
		$query = "SELECT p.id, p.name, p.description, p.weight, p.color, p.category_id, c.name AS category_name, 
			p.created_at, p.updated_at FROM products AS p JOIN categorys AS c ON p.category_id = c.id 
			WHERE c.id = :category_id ORDER BY p.id";
		$conn = Connection::getConn();
		$stmt = $conn->prepare($query);
		$stmt->bindValue(':category_id', $category_id);
		$stmt->execute();
		$result = $stmt->fetchAll();
		$list = array();
		foreach($result as $product_array) {
			$product = new Product(
				$product_array['name'], 
				$product_array['description'], 
				$product_array['weight'], 
				$product_array['color'], 
				$product_array['category_id'], 
				$product_array['id']
			);
			$product->setCategoryName($product_array['category_name']);
			$product->setCreatedAt($product_array['created_at']);
			$product->setUpdatedAt($product_array['updated_at']);
			array_push($list, $product);
		}
		return $list;
	}

	public function verifyProductExist()
	{
		$query = "SELECT p.id, p.name, p.description, p.weight, p.color, c.name AS category_name
			FROM products AS p JOIN categorys AS c ON p.category_id = c.id 
			WHERE p.name = :name AND p.description = :description AND p.weight = :weight
			AND p.color = :color AND p.category_id = :category_id";
		$conn = Connection::getConn();
		$stmt = $conn->prepare($query);
		$stmt->bindValue(':name', $this->product->getName());
		$stmt->bindValue(':description', $this->product->getDesc());
		$stmt->bindValue(':weight', $this->product->getWeight());
		$stmt->bindValue(':color', $this->product->getColor());
		$stmt->bindValue(':category_id', $this->product->getCategoryId());
		$stmt->execute();
		$result = $stmt->fetchAll();
		return $result;
	}

	public function new()
	{
		$query = "INSERT INTO products (name, description, weight, color, category_id, created_at) 
			VALUES (:name, :description, :weight, :color, :category_id, current_timestamp())";
		$conn = Connection::getConn();
		$stmt = $conn->prepare($query);
		$stmt->bindValue(':name', $this->product->getName());
		$stmt->bindValue(':description', $this->product->getDesc());
		$stmt->bindValue(':weight', $this->product->getWeight());
		$stmt->bindValue(':color', $this->product->getColor());
		$stmt->bindValue(':category_id', $this->product->getCategoryId());
		$result = $stmt->execute();
		return $result;
	}

	public function update()
	{
		$query = "UPDATE products SET name = :name, description = :description, weight = :weight, 
			color = :color, category_id = :category_id, updated_at = current_timestamp() WHERE id = :id";
		$conn = Connection::getConn();
		$stmt = $conn->prepare($query);
		$stmt->bindValue(':id', $this->product->getId());
		$stmt->bindValue(':name', $this->product->getName());
		$stmt->bindValue(':description', $this->product->getDesc());
		$stmt->bindValue(':weight', $this->product->getWeight());
		$stmt->bindValue(':color', $this->product->getColor());
		$stmt->bindValue(':category_id', $this->product->getCategoryId());
		$result = $stmt->execute();
		return $result;
	}

	public function delete()
	{
		$query = "DELETE FROM products WHERE id = :id AND name = :name AND description = :description
			AND weight = :weight AND color = :color AND category_id = :category_id";
		$conn = Connection::getConn();
		$stmt = $conn->prepare($query);
		$stmt->bindValue(':id', $this->product->getId());
		$stmt->bindValue(':name', $this->product->getName());
		$stmt->bindValue(':description', $this->product->getDesc());
		$stmt->bindValue(':weight', $this->product->getWeight());
		$stmt->bindValue(':color', $this->product->getColor());
		$stmt->bindValue(':category_id', $this->product->getCategoryId());
		$result = $stmt->execute();
		return $result;
	}
}