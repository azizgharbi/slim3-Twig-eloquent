<?php

require 'config.php';
// routes
$app->get('/','HomeController:index')->setName('home');;
$app->get('/register','AuthController:getRegister')->setName('register');
$app->post('/register','AuthController:postRegister');

// run the application
$app->run();
