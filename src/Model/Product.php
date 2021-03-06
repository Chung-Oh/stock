<?php

namespace Src\Model;

class Product
{
	private $id;
	private $name;
	private $description;
	private $weight;
	private $color;
	private $category_id;
	private $category_name;
	private $created_at;
	private $updated_at;
	private $created_by;
	private $updated_by;

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

	public function getCreatedAt()
	{
		return $this->created_at;
	}

	public function setCreatedAt($create)
	{
		$this->created_at = $create;
	}

	public function getUpdatedAt()
	{
		return $this->updated_at;
	}

	public function setUpdatedAt($update)
	{
		$this->updated_at = $update;
	}

	public function getCreatedBy()
	{
		return $this->created_by;
	}

	public function setCreatedBy($created_by)
	{
		$this->created_by = $created_by;
	}

	public function getUpdatedBy()
	{
		return $this->updated_by;
	}

	public function setUpdatedBy($updated_by)
	{
		$this->updated_by = $updated_by;
	}
}