<?php

use Respect\Validation\Validator as v;

session_start();

require __DIR__ . '/../vendor/autoload.php';


$app = new \Slim\App([
    'settings' => [
        'displayErrorDetails' => true,
        'determineRouteBeforeAppMiddleware' => true,
        'addContentLengthHeader' => false,
        'db'=> [
            'driver' => 'mysql',
            'host' => 'laradock_mysql_1',
            'database' => 'slim3_auth_db',
            'username' => 'root',
            'password' => 'root',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => ''
        ]
    ]
]);


$container = $app->getContainer();
$capsule = new Illuminate\Database\Capsule\Manager;
$capsule->addConnection($container['settings']['db']);
$capsule->setAsGlobal();
$capsule->bootEloquent();

$container['db'] = function($container) use ($capsule)
{
    return $capsule;
};

$container['view'] = function ($container) {
    $view = new \Slim\Views\Twig(__DIR__ . '/../resources/views', [
        'cache' => false // production set true
    ]);

    $view->addExtension(new \Slim\Views\TwigExtension(
        $container->router,
        $container->request->getUri()
    ));

    return $view;
};

$container['validator'] = function ($container)
{
    return new Slim3Auth\Validation\Validator;
};


$container['HomeController'] = function ($container)
{
    return new \Slim3Auth\Controllers\HomeController($container);
};

$container['AuthController'] = function ($container)
{
    return new \Slim3Auth\Controllers\Auth\AuthController($container);
};

$container['csrf'] = function($container){
    return new \Slim\Csrf\Guard();
};

$app->add(new \Slim3Auth\Middleware\ValidationErrorMiddleware($container));
$app->add(new \Slim3Auth\Middleware\OldInputMiddleware($container));


$app->add($container->csrf);

v::with('Slim3Auth\Validation\Rules\\');

require __DIR__ . '/../app/routes.php';
