<?php 

class User 
{
	private $id;
	private $name;
	private $password;

	public function __construct($name, $password)
	{
		$this->name = $name;
		$this->password = $password;
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

	public function getPassword()
	{
		return $this->password;
	}

	public function setPassword($newPassword)
	{
		$this->password = $newPassword;
	}
}