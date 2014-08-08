<?php

// require slim and register autoloader
require 'Slim/Slim.php';
\Slim\Slim::registerAutoloader();

// Instantiate a new slim app ("In this case called router")
$app = new \Slim\Slim();

// Setting Twig up as a singleton like this means the definition
// will remain after each request
$app->container->singleton('twig', function ($c) {
    $twig = new \Slim\Views\Twig();

    /* Option */
    $twig->parserOptions = array(
        'debug' => true,
        'cache' => dirname(__FILE__) . '/cache'
    );

    /* Extensions */
    $twig->parserExtensions = array(
        new \Slim\Views\TwigExtension(),
    );

    $templatesPath = $c['settings']['templates.path'];
    $twig->setTemplatesDirectory($templatesPath);

    return $twig;
});

// Load the routes
require 'routes/routes.php';

// Run the app
// This should always come last.
$app->run();
?>