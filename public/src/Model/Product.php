<?php 

class Product
{
	private $id;
	private $name;
	private $description;
	private $weight;
	private $color;
	private $category_id;
	private $category_name;

	public function __construct($name, $description, $weight, $color, $category_id, $id = null)
	{
		$this->name = $name;
		$this->description = $description;
		$this->weight = $weight;
		$this->color = $color;
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

	public function getColor()
	{
		return $this->color;
	}

	public function setColor($newColor)
	{
		$this->color = $newColor;
	}

	public function getCategoryId()
	{
		return $this->category_id;
	}

	public function setCategoryId($newCategoryId)
	{
		$this->category_id = $newCategoryId;
	}

	public function getCategoryName()
	{
		return $this->category_name;
	}

	public function setCategoryName($newCategoryName)
	{
		$this->category_name = $newCategoryName;
	}
}