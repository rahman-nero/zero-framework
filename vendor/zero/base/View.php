<?php 

namespace Zero\base;

/**
 * 
 */
class View
{
	public $layout;
	public $view;
	
	public function __construct($route, $view, $layout)
	{
		$this->route = $route;
		$this->view = $view;
		if ($layout === false) {
			$this->layout = false;
		} else {
			$this->layout = $layout;
		}
	}

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
}

