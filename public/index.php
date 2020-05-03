<?php
//Speicherung der Nutzerdaten
session_start();
require __DIR__. "/../init.php";

$pathInfo = $_SERVER['PATH_INFO'];

//Speicherung der wichtigen Dinge in einem array
$routes = [
  '/login' => [
    'controller' => 'loginController',
    'method' => 'login'
  ],
  '/dashbord' => [
    'controller' => 'loginController',
    'method' => 'dashbord'
  ],
  '/logout' => [
    'controller' => 'loginController',
    'method' => 'logout'
  ],
  '/itemliste' => [
    'controller' => 'postAdminController',
    'method' => 'index'
  ],
  '/posts-edit' => [
    'controller' => 'postAdminController',
    'method' => 'edit'
  ],
  '/lieferschein' => [
    'controller' => 'deliverynoteController',
    'method' => 'show'
  ],
  '/status' => [
    'controller' => 'deliveryStatusController',
    'method' => 'status'
  ]
];

//Wenn die $pathInfo gesetzt ist dann läuft die IF-Abfrage
if (isset($routes[$pathInfo])) {
  $route = $routes[$pathInfo];
  $controller = $container->make($route['controller']);
  $method = $route['method'];

  $controller->$method();
}

/*
if ($pathInfo == "/index")
{
  $postsController = $container->make('postsController');
  $postsController -> index();
} elseif ($pathInfo == "/post") {
  $postsController = $container->make('postsController');
  $postsController->indexNumber();
}
*/
?>
