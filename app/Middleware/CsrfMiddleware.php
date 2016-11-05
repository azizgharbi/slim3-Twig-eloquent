<?php

namespace App\Middleware ;

class CsrfMiddleware extends Middleware
{

     public function __invoke($request,$response,$next)
     {
       $this->container->view->getEnvironment()->addGlobal("csrf",[
         'TokenNameKey' =>$this->container->csrf->getTokenNameKey(),
         'TokenName' =>$this->container->csrf->getTokenName(),
         'TokenValueKey'=>$this->container->csrf->getTokenValueKey(),
         'TokenValue'=>$this->container->csrf->getTokenValue(),

       ]);
        $response = $next($request, $response);
        return $response;
     }

}
