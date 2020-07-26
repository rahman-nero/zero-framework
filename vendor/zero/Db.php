<?php 

namespace Zero;

/**
 * Class for work with Db
 */
class Db
{
	public $pdo;

	use TSingeltone;	

	protected function __construct() { // Connect with MYSQL
		$config = require CONF . '/db_connect.php';
    	$dsn = "mysql:host={$config['host']};dbname={$config['dbname']}";
		$this->pdo = new \PDO($dsn, $config['user'], $config['password'], $config['options']);
	}

	public  function query($sql, $params = []) {
		$request = $this->pdo->prepare($sql);
		$request->execute($params);
		$result = $request->fetchAll();
		return $result ?? false;
	}

	public  function execute($sql, $params = []) {
		$request = $this->pdo->prepare($sql);
		return $request->execute($params);
	}

}

