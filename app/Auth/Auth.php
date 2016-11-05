<?php


namespace App\Auth ;

use App\Models\User;
/**
 *
 */
class Auth
{

public function userExiste($email,$password)
{
  $user=User::where('email',$email)->first();
  if(!$user){
    return false ;
  }
  if(password_verify($password,$user->password)){
    $_SESSION["Auth"]=$user;
    return true ;
  }
}

}
