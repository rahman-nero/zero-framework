<?php 

namespace Zero\base;

/**
 * 
 */
class Controller
{
	public $route = [];
	public $controller;

	public $action;

	public $layout;
	public $view;

	public $vars = [];

	
	public function __construct($route)
	{
		$this->route = $route;
		$this->controller = $route['controller'];
		$this->action = $route['action'];
		$this->view = $route['action'];
		$this->layout = LAYOUT;
	}

	public function render() {
		$view = new View($this->route, $this->view, $this->layout);
		$view->run($this->vars);
	}

	public function vars(array $vars) {
		$this->vars = $vars;
	}

}

