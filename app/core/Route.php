	<?php
	class Route
	{
		private $routes = [];

		public function __construct()
		{
			$this->add('/', 'NewsController', 'index');
			$this->add('/page/(\d+)', 'NewsController', 'index');
			$this->add('/news/(\d+)', 'NewsController', 'show');
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
				if (preg_match('#^' . $route . '$#', $url, $matches)) {
					$controllerFile = './app/controllers/' . $params['controller'] . '.php';

					require_once $controllerFile;
					$controller = new $params['controller']();
					if (isset($matches[1]))
						$controller->{$params['method']}($matches[1]);
					else
						$controller->{$params['method']}();

					return;
				}
			}

			header("HTTP/1.0 404 Not Found");
			echo '404 Page Not Found';
			exit;
		}
	}
	?>