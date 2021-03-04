<?
use Slim\Routing\RouteCollectorProxy;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$app->group('/api', function (RouteCollectorProxy $app) {
    $app->get('', function (Request $request, Response $response, $args) {
        $response->getBody()->write("Hello world api!");
        return $response;
    });
});