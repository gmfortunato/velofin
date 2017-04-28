<?php

use VELOFin\Application;
use VELOFin\Plugins\RoutePlugin;
use VELOFin\ServiceContainer;

require_once __DIR__ . '/../vendor/autoload.php';

$serviceContainer = new ServiceContainer();
$app = new Application($serviceContainer);

$app->plugin(new RoutePlugin());

$app->get('/', function(){
    echo "Hello World";
});

$app->start();