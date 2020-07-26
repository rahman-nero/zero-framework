<?php 

namespace Zero\base;
use Zero\Route\Router;
use Zero\Registry;
use Zero\Db;

/**
 * Main-class which started, if user on site
 */
class App
{
	public $registry; // object : Registry class

	public function __construct()
	{
		session_start();
		$query = rtrim($_SERVER['QUERY_STRING'], '/');
		Router::dispatch($query);
		$this->registry = Registry::instance(); // Оbject Registry class
	}

	// work with Registry class - get properties 
	public function getProperty($name) 
	{
		return $this->registry->getProperty($name);
	}

	// set properties in Registry class 
	public function setProperty($name, $value) 
	{
		return $this->registry->setProperty($name, $value);
	}

}

