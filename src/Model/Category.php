<?php

namespace Src\Model;

class Category
{
	private $id;
	private $name;
	private $created_at;
	private $updated_at;
	private $created_by;
	private $updated_by;

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

	public function setCreatedAt($create_at)
	{
		$this->created_at = $create_at;
	}

	public function getUpdatedAt()
	{
		return $this->updated_at;
	}

	public function setUpdatedAt($update_at)
	{
		$this->updated_at = $update_at;
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