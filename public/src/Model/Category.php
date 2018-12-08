<?php 

class Category
{
	private $id;
	private $name;

	public function __construct($name, $id = null)
	{
		$this->name = $name;
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
}