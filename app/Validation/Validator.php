<?php



namespace App\Validation;

use Respect\Validation\Validator as Respect;

use Respect\Validation\Exceptions\NestedValidationException;

class Validator

{
     protected $errors ;

     public function validate($request,array $rules)
     {

    foreach ($rules as $champ => $rule) {

          try {

         $rule->setName(ucfirst($champ))->assert($request->getParam($champ));

          } catch (NestedValidationException $e) {

           $this->errors[$champ] =$e->getFullMessage();

          }

       }

       $_SESSION["errors"]=$this->errors;
       return $this;

     }

   public function failed()
   {
    return !empty($this->errors);
   }

}
