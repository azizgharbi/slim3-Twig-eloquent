<?php

require 'config.php';
Use App\Models\User;

$app->get('/', function ($request, $response) {
  $user=User::find(1);
  $this->view->render($response, 'home.twig', [
              'user' => $user
          ]);

        });

$app->get('/test', function ($request, $response) {
$user = User::find(1);
$user->name="Sami";
$user->save();
$this->view->render($response, 'test.twig', [
            'user' => $user
        ]);
});

$app->run();
//https://akrabat.com/using-testing-eloquent-in-slim-framework/
