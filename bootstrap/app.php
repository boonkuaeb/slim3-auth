<?php
session_start();

require __DIR__ . '/../vendor/autoload.php';


$app = new \Slim\App([
    'settings' => [
        'displayErrorDetails' => true
    ]
]);


$container = $app->getContainer();
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


$container['HomeController'] = function ($container)
{
    return new \Slim3Auth\Controllers\HomeController;
};

require __DIR__ . '/../app/routes.php';
