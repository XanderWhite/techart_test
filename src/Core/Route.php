<?php

namespace App\Core;

use App\Controllers\NotFoundController;


class Route
{
	private $routes = [];

	public function __construct($routesConfig)
	{
		$this->routes = $routesConfig;
	}

	public function start()
	{
		$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

		foreach ($this->routes as $route => $params) {
			if (preg_match('#^' . $route . '$#', $url, $matches)) {
				$controllerClass = 'App\\Controllers\\' . $params['controller'];

				$controller = new $controllerClass();
				if (isset($matches[1])) {
					$controller->{$params['method']}($matches[1]);
				} else {
					$controller->{$params['method']}();
				}

				return;
			}
		}

		self::load404();
	}


	public static function load404()
	{
		header("HTTP/1.0 404 Not Found");
		$controller = new NotFoundController();
		$controller->index();
		exit;
	}
}
