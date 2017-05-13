<?php

use VELOFin\Application;
use VELOFin\Plugins\AuthPlugin;
use VELOFin\Plugins\DbPlugin;
use VELOFin\Plugins\RoutePlugin;
use VELOFin\Plugins\ViewPlugin;
use VELOFin\ServiceContainer;

require_once __DIR__ . '/../vendor/autoload.php';

$serviceContainer = new ServiceContainer();
$app = new Application($serviceContainer);

$app->plugin(new RoutePlugin());
$app->plugin(new ViewPlugin());
$app->plugin(new DbPlugin());
$app->plugin(new AuthPlugin());

$app->get('/home/{name}/{id}', function(ServerRequestInterface $request){
    $response = new \Zend\Diactoros\Response();
    $response->getBody()->write("response com emitter do diactoros");
    return $response;
});

require_once __DIR__ . '/../src/controllers/auth.php';
require_once __DIR__ . '/../src/controllers/category-costs.php';
require_once __DIR__ . '/../src/controllers/users.php';


$app->start();