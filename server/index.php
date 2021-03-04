<?php
use Slim\Factory\AppFactory;

require __DIR__ . '/vendor/autoload.php';

//Create container
$container = new DI\Container();
// Create slim application
AppFactory::setContainer($container);
$app = AppFactory::create();

// Add dependecies
require __DIR__.'/api/dependencies.php';

// Routes
require __DIR__.'/api/Routes/api.php';
require __DIR__.'/api/Routes/web.php';

// Add Routing Middleware
$app->addRoutingMiddleware();
// Run the app
$app->run();