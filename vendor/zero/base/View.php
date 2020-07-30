<?php 

namespace Zero\base;

/**
 * 
 */
class View
{
	public $layout; // Layout
	public $view; // view
	public $meta = []; // view
	
	public function __construct($route, $view, $layout, $meta = [])
	{
		$this->route = $route;
		$this->view = $view;
		if ($layout === false) {
			$this->layout = false;
		} else {
			$this->layout = $layout;
		}
		$this->meta = $meta;
	}

	/*
	* connects the view and the template, according to the data received from the controller
	* $vars - vars get from controller for work in view
	*/
	public function run(array $vars) {
		extract($vars);
		if ($this->layout !== false) {
			$layout = APP . '/views/layouts/' . $this->layout . '.php';
			$view = APP . "/views/{$this->route['controller']}/{$this->view}" . '.php';

			if (file_exists($view)) {
				ob_start();
				require $view;
				$content = ob_get_clean();
			} else {
				echo '<br>Такой вид не найден ' . $view;
			}

			if (file_exists($layout)) {
				require $layout;
			} else {
				echo '<br>Такой шаблон не найден ' . $layout;
			}

		}
	}

	// Inserts meta tags in layout - if to call this method 
	public function getMeta() {
		if (!empty($this->meta)) {
			echo "<title>{$this->meta['title']}</title>" . PHP_EOL . "\t";
			echo "<meta name='description' content='{$this->meta['desc']}'>" . PHP_EOL . "\t";
			echo "<meta name='keywords' content='{$this->meta['keywords']}'>";
		}
	}


}

