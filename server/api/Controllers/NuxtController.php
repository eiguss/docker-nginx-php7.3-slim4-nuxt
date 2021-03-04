<?php
namespace App\Controllers;

use Slim\Psr7\Request;
use Slim\Psr7\Response;

use Inbenta\Workspace\Helpers\SessionManager;

class NuxtController
{
    const  __DIR__."/public";

    public function getNuxtSessionToken(Request $request, Response $response, array $args)
    {
        $session['session'] = [
            'token' => $this->session->getId(),
        ];
        if(getenv('INBENTA_ENV')!=='production'){
            $session['info'] = $this->session->getAll();
        }
        $response->getBody()->write(json_encode($session));
        return $response->withHeader('Content-type', 'application/json');
    }

    public function renderNuxtPage(Request $request, Response $response, array $args)
    {
        $page = @file_get_contents($this->nuxtPath."/index.html");
        if(!$page){
            $page = @file_get_contents($this->nuxtPath."/200.html");
        }
        
        $response->getBody()->write($page);
        return $response;
    }

    public function getFavicon(Request $request, Response $response, array $args)
    {
        $file = file_get_contents(__DIR__."/../../nuxt/styles/images/favicon.png");
        $response->getBody()->write($file);

        return $response->withHeader('Content-Type', 'image/png');
    }

    public function getNuxtAsset(Request $request, Response $response, array $args)
    {
        $realPath = realpath($this->nuxtPath."/_nuxt/".$args['path']);
        $nuxtRealPath = realpath($this->nuxtPath."/_nuxt/");
        if(substr($realPath, 0, strlen($nuxtRealPath)) !== $nuxtRealPath){
            throw new \Exception("Invalid path", 500);
        }
        $file = file_get_contents($realPath);
        $cacheExpiration = 60*60*24*7; // 7 days
        $response = $response->withHeader('cache-control', 'max-age='.$cacheExpiration);
        $response = $response->withHeader('pragma', 'none');
        $response = $response->withHeader('Expires', gmdate('D, d M Y H:i:s \G\M\T', time() + $cacheExpiration));
        if(strpos($args['path'], '.js')!==false){
            $response = $response->withHeader('Content-Type', 'application/javascript');
        }
        if(strpos($args['path'], '.svg')!==false){
            $response = $response->withHeader('Content-Type', 'image/svg+xml');
        }
        $response->getBody()->write($file);

        return $response;
    }
}