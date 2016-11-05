<?php

session_start();

require '../vendor/autoload.php';
$app = new \Slim\App([
    'settings' => [
        // Slim Settings
        'determineRouteBeforeAppMiddleware' => false,
        'displayErrorDetails' => true,
        'db' => [
            'driver' => 'mysql',
            'host' => 'localhost',
            'database' => 'economie',
            'username' => 'root',
            'password' => 'aziz',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ]
    ],
]);

$container = $app->getContainer();

//elquent config
$capsule = new \Illuminate\Database\Capsule\Manager;
$capsule->addConnection($container['settings']['db']);
$capsule->setAsGlobal();
$capsule->bootEloquent();

$container['db'] = function ($container) {
    return $capsule;
};

// twig config
$container['view'] = function ($c) {
    $view = new \Slim\Views\Twig('../resources/views', [
        'cache' => false
    ]);
    $basePath = rtrim(str_ireplace('index.php', '', $c['request']->getUri()->getBasePath()), '/');
    $view->addExtension(new Slim\Views\TwigExtension($c['router'], $basePath));

    return $view;
};
//csrf
$container['csrf'] = function ($container) {
    return new \Slim\Csrf\Guard;
};
// Middleware
$app->add(new \App\Middleware\ValidationMiddleware($container));
$app->add(new \App\Middleware\CorrectRequestMiddleware($container));
$app->add(new \App\Middleware\CsrfMiddleware($container));
$app->add($container->csrf);
// controllers
$container['Validator']= function($container){
  return new \App\Validation\Validator($container);
};
$container['HomeController']= function($container){
  return new \App\controllers\HomeController($container);
};
$container['AuthController']= function($container){
  return new \App\controllers\Auth\AuthController($container);
};
