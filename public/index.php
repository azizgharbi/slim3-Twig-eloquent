<?php

require 'config.php';

$app->get('/', function ($request, $response) {
  $user=$this->db->table('users')->find(1);
  var_dump($user);
});

// testing twig render 
$app->get('/test', function ($request, $response, $args) {
  return $this->view->render($response, 'home.twig', [
          'name' => "mohsen"
      ]);})->setName('home');

$app->run();
