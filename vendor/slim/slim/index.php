<?php

// require slim and register autoloader
require 'Slim/Slim.php';
\Slim\Slim::registerAutoloader();
require 'config.php';

// Setup custom Twig view
$twigView = new \Slim\Views\Twig();

$app = new \Slim\Slim(array(
    'debug' => true,
    'view' => $twigView
));

// Automatically load router files
$routers = glob('routers/*.router.php');
foreach ($routers as $router) {
    require $router;
}

// Run the app
// This should always come last.
$app->run();
?>