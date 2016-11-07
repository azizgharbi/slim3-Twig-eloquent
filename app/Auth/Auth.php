<?php

namespace App\Auth;
use App\Models\User;

class Auth
{

    public function user()
   {
     $user=User::find($_SESSION["Auth"]);
     return $user;
   }

   public function logout()
  {
    unset($_SESSION["Auth"]);
  }

    public function userExiste($email, $password)
    {
        $user = User::where('email', $email)->first();
        if (!$user) {
            return false;
        }
        if (password_verify($password, $user->password)) {
            $_SESSION["Auth"] = $user->id;
            return true;
        }
    }

    public function userCheck()
    {
       return isset($_SESSION["Auth"]);
    }


}
