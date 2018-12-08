<?php 

class Product
{
	private $id;
	private $name;
	private $description;
	private $weight;
	private $dimension;
	private $category_id;

	public function __construct($name, $description, $weight, $dimension, $category_id)
	{
		$this->name = $name;
		$this->description = $description;
		$this->weight = $weight;
		$this->dimension = $dimension;
		$this->category_id = $category_id;
	}

	public function getId()
	{
		return $this->id;
	}

	public function setId($id)
	{
		$this->id = $id;
	}


}