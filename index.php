
<?php
require __DIR__ . '/vendor/autoload.php';

use App\Core\Route;

$routesConfig = require __DIR__ . '/config/routes.php';
$route = new Route($routesConfig);
$route->start();
