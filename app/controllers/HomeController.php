<?php

namespace App\controllers ;

use Slim\Views\Twig as View;
use App\Models\User;


class HomeController extends Controller
{

    public function index ($request,$response)
    {
      $user= User::find(15);
      $x=$_SESSION['Auth'];
      return $this->view->render($response, 'home.twig', [
        'user' => $user,
        'session'=>$x
    ]);
    }

}
