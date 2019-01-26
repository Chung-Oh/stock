<?php 

class Category
{
	private $id;
	private $name;
	private $created_at;
	private $updated_at;

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
}