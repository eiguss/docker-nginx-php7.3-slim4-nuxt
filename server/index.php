<?php
use Slim\Factory\AppFactory;
use App\Exceptions\Handler;

require __DIR__ . '/vendor/autoload.php';

//Create container
$container = new DI\Container();
// Create slim application
AppFactory::setContainer($container);
$app = AppFactory::create();

// Routes
require __DIR__.'/app/Routes/api.php';
require __DIR__.'/app/Routes/web.php';

// Add Routing Middleware
$app->addRoutingMiddleware();

// Add error handler
$errorMiddleware = $app->addErrorMiddleware(true, true, true);
$errorMiddleware->setDefaultErrorHandler(new Handler());

// Run the app
$app->run();