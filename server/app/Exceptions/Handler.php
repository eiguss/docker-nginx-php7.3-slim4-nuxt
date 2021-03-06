<?
namespace App\Exceptions;

use Slim\Psr7\Request;
use Slim\Psr7\Response;
use App\Exceptions\NuxtBuildMissingException;

class Handler
{
    public function __invoke(
        Request $request,
        \Throwable $e,
        bool $displayErrorDetails,
        bool $logErrors,
        bool $logErrorDetails,
        ?LoggerInterface $logger = null
    )
    {
        $payload = ['error' => $e->getMessage()];

        $response = new Response();

        if($e instanceof NuxtBuildMissingException){
            $response->getBody()->write("
                <div>
                    <h1 style='text-align: center;'>Nuxt build missing</h1>
                    <h3 style='text-align: center;'>Execute make node-build</h3>
                </div>
            ");
        }else {
            $response->getBody()->write(
                json_encode([
                    "error" => $e->getMessage()
                ])
            );
        }
        
        $response->withStatus(500);


        return $response;
    }
}