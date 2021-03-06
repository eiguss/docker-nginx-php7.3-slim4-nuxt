<?
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Exceptions\NuxtBuildMissingException;

$app->get('/[{path:.*}]', function (Request $request, Response $response, $args) {
    $page = @file_get_contents(__DIR__."/../../public/index.html") ? : @file_get_contents(__DIR__."/../../public/200.html");
    if(!$page){
        throw new NuxtBuildMissingException('Nuxt build missing.');
    }
    $response->getBody()->write($page);

    return $response;
});