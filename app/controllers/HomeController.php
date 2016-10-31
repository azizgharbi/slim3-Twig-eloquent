<?php

namespace App\controllers ;

use Slim\Views\Twig as View;
use App\Models\User;


class HomeController extends Controller
{

    public function index ($request,$response)
    {
      $user= User::find(1);
      return $this->view->render($response, 'home.twig', [
        'user' => $user
    ]);
    }

}
