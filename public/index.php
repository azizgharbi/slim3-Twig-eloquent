<?php

require 'config.php';

$app->get('/', function ($request, $response) {
  $user=$this->db->table('users')->find(1);

  $this->view->render($response, 'home.twig', [
              'user' => $user
          ]);

        });

$app->run();
