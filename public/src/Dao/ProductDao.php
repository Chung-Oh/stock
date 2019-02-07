<?php 
require_once '../../src/Model/Product.php';

class ProductDao
{
	public $product;

	public function __construct($name, $description, $weight, $color, $category_id, $id = null)
	{
		$this->product = new Product($name, $description, $weight, $color, $category_id, $id);
	}
	// Page Produtos
	public static function list()
	{
		$query = "SELECT p.id, p.name, p.description, p.weight, p.color, p.category_id, c.name AS category_name, p.created_at, p.updated_at, p.created_by, p.updated_by FROM products AS p JOIN categorys AS c ON p.category_id = c.id ORDER BY p.id";
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
			$product->setCreatedBy($product_array['created_by']);
			$product->setUpdatedBy($product_array['updated_by']);
			array_push($list, $product);	
		}
		return $list;
	}
	// Page Detalhes
	public static function load($category_id)
	{
		$query = "SELECT p.id, p.name, p.description, p.weight, p.color, p.category_id, c.name AS category_name, p.created_at, p.updated_at, u1.name AS created_by, u2.name AS updated_by FROM products AS p LEFT JOIN categorys AS c ON c.id = p.category_id LEFT JOIN users AS u1 ON u1.id = p.created_by LEFT JOIN users AS u2 ON u2.id = p.updated_by WHERE p.category_id = :category_id ORDER BY id";
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
			$product->setCreatedBy($product_array['created_by']);
			$product->setUpdatedBy($product_array['updated_by']);
			array_push($list, $product);
		}
		return $list;
	}
	// Validação
	public function verifyProductExist()
	{
		$query = "SELECT p.id, p.name, p.description, p.weight, p.color, c.name AS category_name FROM products AS p JOIN categorys AS c ON p.category_id = c.id WHERE p.name = :name AND p.description = :description AND p.weight = :weight AND p.color = :color AND p.category_id = :category_id";
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
	// Page Detalhes / Produtos
	public function new()
	{
		$query = "INSERT INTO products (name, description, weight, color, category_id, created_at, created_by) VALUES (:name, :description, :weight, :color, :category_id, current_timestamp(), :created_by)";
		$conn = Connection::getConn();
		$stmt = $conn->prepare($query);
		$stmt->bindValue(':name', $this->product->getName());
		$stmt->bindValue(':description', $this->product->getDesc());
		$stmt->bindValue(':weight', $this->product->getWeight());
		$stmt->bindValue(':color', $this->product->getColor());
		$stmt->bindValue(':category_id', $this->product->getCategoryId());
		$stmt->bindValue(':created_by', $this->product->getCreatedBy());
		$result = $stmt->execute();
		return $result;
	}
	// Page Detalhes / Produtos
	public function update()
	{
		$query = "UPDATE products SET name = :name, description = :description, weight = :weight, color = :color, category_id = :category_id, updated_at = current_timestamp(), updated_by = :updated_by WHERE id = :id";
		$conn = Connection::getConn();
		$stmt = $conn->prepare($query);
		$stmt->bindValue(':id', $this->product->getId());
		$stmt->bindValue(':name', $this->product->getName());
		$stmt->bindValue(':description', $this->product->getDesc());
		$stmt->bindValue(':weight', $this->product->getWeight());
		$stmt->bindValue(':color', $this->product->getColor());
		$stmt->bindValue(':category_id', $this->product->getCategoryId());
		$stmt->bindValue(':updated_by', $this->product->getUpdatedBy());
		$result = $stmt->execute();
		return $result;
	}
	// Page Detalhes / Produtos
	public function delete()
	{
		$query = "DELETE FROM products WHERE id = :id AND name = :name AND description = :description AND weight = :weight AND color = :color AND category_id = :category_id";
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