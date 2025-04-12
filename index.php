
<?php
require_once './Database.php';
require_once './app/core/View.php';
require_once './app/core/Route.php';
require_once './app/core/Controller.php';

$route = new Route();
$route->start();
?>