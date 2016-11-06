<?php
/*
*  WEB ROUTES
*
*/

$app->get('/','HomeController:index')->setName('home');;
$app->get('/register','AuthController:getRegister')->setName('register');
$app->post('/register','AuthController:postRegister');
$app->get('/login','AuthController:getSingin')->setName('login');
$app->post('/login','AuthController:postSingin');
