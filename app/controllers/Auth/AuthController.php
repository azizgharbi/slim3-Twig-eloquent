<?php

namespace App\controllers\Auth ;

use App\controllers\Controller ;

use Slim\Views\Twig as View;

class AuthController extends Controller
{

 // get
    public function getRegister($resquest,$response)
    {
      return $this->view->render($response, 'Auth/singup.twig');
    }

// post
    public function postRegister($resquest,$response)
    {
     echo " success";
    }

}
