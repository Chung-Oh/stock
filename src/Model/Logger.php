<?php

namespace Src\Model;

class Logger
{
	private $id;
	private $login;
	private $logout;
	private $user_id;

	public function __construct($user_id, $login, $logout = null)
	{
		$this->login = $login;
		$this->logout = $logout;
		$this->user_id = $user_id;
	}

	public function getId()
	{
		return $this->id;
	}

	public function setId($id)
	{
		$this->id = $id;
	}

	public function getLogin()
	{
		return $this->login;
	}

	public function setLogin($login)
	{
		$this->login = $login;
	}

	public function getLogout()
	{
		return $this->logout;
	}

	public function setLogout($logout)
	{
		$this->logout = $logout;
	}

	public function getUserId()
	{
		return $this->user_id;
	}

	public function setUserId($user)
	{
		$this->user_id = $user;
	}
}