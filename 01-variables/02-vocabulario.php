<?php

class User {
	private $id;
	private $name;
	private $age;

	public function __construct($id, $name, $age)
	{
		$this->id = $id;
		$this->name = $name;
		$this->age = $age;
	}

	public function getUserID(){
		return $this->id;
	}

	public function getUserName(){
		return $this->name;
	}

	public function getUserage(){
		return $this->age;
	}
}

$user = new User(10, 'Juan', 30);

echo "User ID: {$user->getUserID()}, User Name: {$user->getUserName()}. User Age: {$user->getUserAge()}";