<?
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$app->get('/[{path:.*}]', function (Request $request, Response $response, $args) {
    $page = @file_get_contents(__DIR__."/../../public/index.html");
    if(!$page){
        $page = @file_get_contents(__DIR__."/../../public/200.html");
    }
    $response->getBody()->write($page);

    return $response;
});