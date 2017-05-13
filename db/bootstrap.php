<?php

use VELOFin\Application;
use VELOFin\Plugins\AuthPlugin;
use VELOFin\Plugins\DbPlugin;
use VELOFin\ServiceContainer;

$serviceContainer = new ServiceContainer();
$app = new Application($serviceContainer);

$app->plugin(new DbPlugin());
$app->plugin(new AuthPlugin());

return $app;