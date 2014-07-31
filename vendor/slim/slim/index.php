<?php

// require slim and register autoloader
require 'Slim/Slim.php';
\Slim\Slim::registerAutoloader();

// Instantiate a new slim app ("In this case called router")
$router = new \Slim\Slim();

$router->get('/hello/:name', function ($name) {
    echo "Hello, $name";
});

$router->get('/ba-film', function () {
    echo "You have been redirected to a SCIP";
});

$router->get('/ba-music', function () {
    echo "You have been redirected to Learning Space";
});

// Run the app
// This should always come last.
$router->run();
