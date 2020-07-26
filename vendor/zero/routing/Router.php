<?php 

namespace Zero\Route;

/**
 * 
 */
abstract class Router 
{	
	protected static $routes = []; // здесь хранятся все пути, то есть правила маршрутизации
	protected static $route  = []; // а здесь текущое правило
		
	public static function add($route, $options = [])
	{
		self::$routes[$route] = $options;
	}


	protected static function match($url) {
    	foreach (self::$routes as $pattern => $options) {
    		if (preg_match("#{$pattern}#", $url, $match)) {
    				foreach ($match as $k => $v) {
    					if (is_string($k)) 
    						$route[$k] = $v; 
    				}

    				$route['controller'] = $options['controller'] ?? $route['controller'];

    				if (!isset($route['action'])) 
	    				$route['action'] = $options['action'] ?? 'index';

    				self::$route = $route;
    				return true;
    		}
    	}
    	return false;
	} 


	public static function dispatch($url) 
	{
		$url = self::removeQueryString($url);
		if (self::match($url)) {
			$controller = "App\\controllers\\" . self::$route['controller'] . 'Controller';
			$action = self::$route['action'] . 'Action';

			if (class_exists($controller)) {
				$cObj = new $controller(self::$route);

				if (method_exists($cObj, $action)) {
					$cObj->$action();
					$cObj->render();
				} else {
					echo 'Не существует такого метода - ' . $action;
				}

			} else {
				echo "Такой контроллер не найден {$url}";
			}
		} else {
			echo 'Страница не найдена';
		}
	}


	protected static function removeQueryString($url) {
		if($url){
            $params = explode('&', $url, 2);
            if(false === strpos($params[0], '=')){
                return rtrim($params[0], '/');
            }else{
                return '';
            }
        }
	}

} 



