<?
use Slim\Routing\RouteCollectorProxy;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$app->group('/api', function (RouteCollectorProxy $app) {
    $app->get('/[{path:.*}]', function (Request $request, Response $response, $args) {
        throw new \Exception('Api routes not defined.');
    });
});