<?php

namespace App\Middleware ;

class AuthMiddleware extends Middleware
{

     public function __invoke($request,$response,$next)
     {
        if(! $this->container->Auth->userCheck()){
          return $response->withRedirect($this->container->router->pathFor('register'));

        }
        $response = $next($request, $response);
        return $response;
     }

}
