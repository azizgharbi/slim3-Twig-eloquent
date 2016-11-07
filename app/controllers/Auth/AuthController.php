<?php

namespace App\controllers\Auth ;

use App\controllers\Controller ;
use Respect\Validation\Validator as validate;
use Slim\Views\Twig as View;

use App\Models\User;

class AuthController extends Controller
{
/*
* singin
*
*/

     // get
     public function getSingin($request,$response)
     {
       return $this->view->render($response, 'Auth/singin.twig');
     }
     // Post
     public function postSingin($request,$response)
      {
         $auth=$this->Auth->userExiste($request->getParam('email'),$request->getParam('password'));
          if(!$auth){
          return $response->withRedirect($this->router->pathFor('login'));
          }
          else{
            return $response->withRedirect($this->router->pathFor('home'));

          }
      }
/*
* Register
*
*/

 // get
    public function getRegister($request,$response)
    {
      return $this->view->render($response, 'Auth/singup.twig');
    }

// post
    public function postRegister($request,$response)
    {

      $validation=$this->Validator->validate($request,[
         'email'=>validate::noWhitespace()->NotEmpty()->Email(),
         'name'=>validate::noWhitespace()->NotEmpty()->Alpha(),
         'password'=>validate::noWhitespace()->NotEmpty(),
      ]);

      if($validation->failed()){
        return $response->withRedirect($this->router->pathFor('register'));
      }

     User::create([
       'name' => $request->getParam('name'),
       'email' =>$request->getParam('email'),
       'password'=>password_hash($request->getParam('password'),PASSWORD_DEFAULT),
     ]);
     return $response->withRedirect($this->router->pathFor('home'));
    }

    // logout
    public function logout($request,$response)
     {
        $auth=$this->Auth->logout();
        return $response->withRedirect($this->router->pathFor('login'));
     }

}
