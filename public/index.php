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
  //Übersicht
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
  '/toolliste' => [
    'controller' => 'toolController',
    'method' => 'toolList'
  ],
  '/material' => [
    'controller' => 'postAdminController',
    'method' => 'materialOverview'
  ],
  '/material-decision' => [
    'controller' => 'postAdminController',
    'method' => 'decision'
  ],
  //Item genau anzeigen
  '/show-item' => [
    'controller' => 'postAdminController',
    'method' => 'showItem'
  ],
  '/show-tool' => [
    'controller' => 'toolController',
    'method' => 'showTool'
  ],
  //Änderungen
  '/posts-edit' => [
    'controller' => 'postAdminController',
    'method' => 'edit'
  ],
  '/storage-edit' => [
    'controller' => 'postAdminController',
    'method' => 'storageEdit'
  ],
  '/tool-edit' => [
    'controller' => 'toolController',
    'method' => 'toolEdit'
  ],
  '/tool-storage-edit' => [
    'controller' => 'toolController',
    'method' => 'storageEdit'
  ],
//Lieferscheine
  '/lieferschein' => [
    'controller' => 'deliverynoteController',
    'method' => 'show'
  ],
  '/status' => [
    'controller' => 'deliveryStatusController',
    'method' => 'status'
  ],
  '/status-show' => [
    'controller' => 'deliveryStatusController',
    'method' => 'show'
  ],
  '/shipping' => [
    'controller' => 'loginController',
    'method' => 'shipping'
  ],
  //Suche
  '/item-result' => [
    'controller' => 'postAdminController',
    'method' => 'result'
  ],
  '/search' => [
    'controller' => 'searchController',
    'method' => 'search'
  ],
  '/search-result' => [
    'controller' => 'searchController',
    'method' => 'searchResult'
  ],
  '/show-result' => [
    'controller' => 'searchController',
    'method' => 'detailView'
  ],
  //Einfügen von neuen Elementen
  '/insert-item' => [
    'controller' => 'insertController',
    'method' => 'start'
  ],
  '/insert-add' => [
    'controller' => 'insertController',
    'method' => 'insertItem'
  ],
  '/insert-add-tool' => [
    'controller' => 'insertController',
    'method' => 'insertTool'
  ],
  '/insert-tool' => [
    'controller' => 'insertController',
    'method' => 'startTool'
  ],
  //Löschen
  '/delete' => [
    'controller' => 'postAdminController',
    'method' => 'deleteItem'
  ],
  '/tool-delete' => [
    'controller' => 'toolController',
    'method' => 'deleteTool'
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
