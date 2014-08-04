<?php

// require slim and register autoloader
require 'Slim/Slim.php';
\Slim\Slim::registerAutoloader();

// Instantiate a new slim app ("In this case called router")
$app = new \Slim\Slim();

// Load the routes
require 'routes/routes.php';

// Run the app
// This should always come last.
$app->run();
?>