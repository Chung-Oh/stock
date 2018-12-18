<?php 

class Product
{
	private $id;
	private $name;
	private $description;
	private $weight;
	private $dimension;
	private $category_id;

	public function __construct($name, $description, $weight, $dimension, $category_id, $id = null)
	{
		$this->name = $name;
		$this->description = $description;
		$this->weight = $weight;
		$this->dimension = $dimension;
		$this->category_id = $category_id;
		$this->id = $id;
	}

	public function getId()
	{
		return $this->id;
	}

	public function setId($id)
	{
		$this->id = $id;
	}

	public function getName()
	{
		return $this->name;
	}

	public function setName($newName)
	{
		$this->name = $newName;
	}

	public function getDesc()
	{
		return $this->description;
	}

	public function setDesc($newDescription)
	{
		$this->description = $newDescription;
	}

	public function getWeight()
	{
		return $this->weight;
	}

	public function setWeight($newWeight)
	{
		$this->weight = $newWeight;
	}

	public function getDimension()
	{
		return $this->dimension;
	}

	public function setDimension($newDimension)
	{
		$this->dimension = $newDimension;
	}

	public function getCategoryId()
	{
		return $this->category_id;
	}

	public function setCategoryId($newCategory)
	{
		$this->category_id = $newCategory;
	}
}