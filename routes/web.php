<?php

 use App\Middleware\AuthMiddleware;

/*
*  WEB ROUTES
*
*/
$app->group('',function(){

  $this->get('/','HomeController:index')->setName('home');

})->add(new AuthMiddleware($container));

$app->get('/register','AuthController:getRegister')->setName('register');
$app->post('/register','AuthController:postRegister');
$app->get('/login','AuthController:getSingin')->setName('login');
$app->get('/logout','AuthController:logout')->setName('logout');
$app->post('/login','AuthController:postSingin');
