<?php

require 'config.php';

// routes

$app->get('/','HomeController:index');


// run the application
$app->run();
