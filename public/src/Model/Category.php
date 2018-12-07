<?php 

class Category
{
	private $id;
	private $name;

	public function __construct($name)
	{
		$this->name = $name;
	}

	public function getId()
	{
		return $this->id;
	}

	public function setId($newId)
	{
		$this->id = $newId;
	}

	public function getName()
	{
		return $this->name;
	}

	public function setName($newName)
	{
		$this->name = $newName;
	}
}