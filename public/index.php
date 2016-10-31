<?php

require 'config.php';

// routes

$app->get('/','HomeController:index')->setName('home');;
$app->get('/register','AuthController:getRegister')->setName('register');;


// run the application
$app->run();
