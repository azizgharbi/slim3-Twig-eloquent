<?php

namespace App\controllers\Auth ;

use App\controllers\Controller ;

use Slim\Views\Twig as View;
use App\Models\User;

class AuthController extends Controller
{

 // get
    public function getRegister($request,$response)
    {
      return $this->view->render($response, 'Auth/singup.twig');
    }

// post
    public function postRegister($request,$response)
    {
     User::create([
       'name' => $request->getParam('name'),
       'email' =>$request->getParam('email'),
       'password'=>password_hash($request->getParam('password'),PASSWORD_DEFAULT),
     ]);
     return $response->withRedirect($this->router->pathFor('home'));
    }

}
