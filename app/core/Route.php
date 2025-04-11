	<?php
	class Route
	{
		private $routes = [];

		public function __construct()
		{
			$this->add('/', 'NewsController', 'index');
		}

		public function add($url, $controller, $method)
		{
			$this->routes[$url] = [
				'controller' => $controller,
				'method' => $method
			];
		}


		public function start()
		{
			$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

			foreach ($this->routes as $route => $params) {
				if ($route === $url) {
					$controllerFile = './app/controllers/' . $params['controller'] . '.php';

					require_once $controllerFile;
					$controller = new $params['controller']();
					$controller->{$params['method']}();
					return;
				}
			}
		}
	}
	?>