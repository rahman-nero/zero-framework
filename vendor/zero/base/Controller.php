<?php 

namespace Zero\base;

/**
 * 
 */
class Controller
{
	public $route = []; // data - ['controller'] and ['action']
	public $controller; // $route['controller']
	public $action; // $route['action']

	public $layout; // if layout not indicated in controller, will use DEFAUL - layout 
	public $view; // $route['action']

	public $vars = []; // vars for transmission in view-layout

	public $meta = []; // meta-data, for page - <meta name='keyfords'.....>.. etc

	public function __construct($route)
	{
		$this->route = $route;
		$this->controller = $route['controller'];
		$this->action = $route['action'];
		$this->view = $route['action'];
		$this->layout = LAYOUT;
	}

	// transfers data to the class VIEW, and tries to connect the template and the view if they are
	public function render() {
		$view = new View($this->route, $this->view, $this->layout, $this->meta);

		$view->run($this->vars);
	}

	// vars for transmission in view-layout
	public function vars(array $vars) {
		$this->vars = $vars;
	}

	// prepares meta tags for insert in layout
	public function setMeta($title, $desc = '', $keywords = '') {
		$title = trim($title);
		$desc = trim($desc);
		$keywords = trim($keywords);
		$this->meta['title'] = $title;
		$this->meta['desc'] = $desc;
		$this->meta['keywords'] = $keywords;
	}

}

