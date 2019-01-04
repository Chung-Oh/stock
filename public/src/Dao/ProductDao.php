<?php 
require_once '../Model/Product.php';
require_once '../Helpers/user-session.php';

class ProductDao
{
	private $product;

	public function __construct($name, $description, $weight, $color, $category_id, $id = null)
	{
		$this->product = new Product($name, $description, $weight, $color, $category_id, $id);
	}

	public static function list()
	{
		$query = "SELECT p.id, p.name, p.description, p.weight, p.color, c.name AS category_name
					FROM products AS p JOIN categorys AS c ON p.category_id = c.id";
		$conn = Connection::getConn();
		$result = $conn->query($query);
		$list = array();

		foreach ($result->fetchAll() as $product_array) {
			$product = new Product($product_array['name'], $product_array['description'], 
				$product_array['weight'], $product_array['color'], 
					$product_array['category_name'], $product_array['id']);
			array_push($list, $product);	
		}
		return $list;
	}
}