<?php 

namespace Zero\Helper;

/**
 * 
 */
class User
{
	public $table;
	public $login_field;
	public $password_field;

	function __construct($table, $login_field, $password_field)
	{
		$this->table = $table;
		$this->login_field;
		$this->password_field;
	}

	public function login($login, $password) {
		$login = trim($login) ?? null;
		$password = trim($password) ?? null;
	}
}

