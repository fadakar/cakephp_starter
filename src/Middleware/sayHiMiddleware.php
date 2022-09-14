<?php

namespace App\Middleware;

use Cake\Http\Cookie\Cookie;
use Cake\Http\Response;
use Cake\Http\Runner;
use Cake\Http\ServerRequest;

class sayHiMiddleware
{
    public function __invoke(ServerRequest $request, Response $response, $next)
    {
//        exit(var_dump($response, $request));
//        exit(var_dump($next));

//        $response = $response->withHeader('Authorization' , 'fadakar');

        $response = $next($request, $response);
//        $response = $response->withStringBody('middleware ');
//        $response = $response->withCookie(new Cookie(
//            'test_cookie',
//            $request->getRequestTarget(),
//            500000
//        ));

        return $response;
    }
}
