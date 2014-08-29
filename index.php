<?php

echo "Index";

require 'vendor/autoload.php';
require 'config.php';
// require 'moodlequery/class.moodlequery.php';

// require_once('moodlequery/class.aspireapi.php');


// View_Twig::$twigExtensions = array(new Twig_Extension_Debug());
// View_Twig::$twigOptions = array('debug' => true);

// Setup custom Twig view
$twigView = new \Slim\Views\Twig();

// Create the app
$app = new \Slim\Slim(array(
    'debug' => true,
    'view' => $twigView,
    'templates.path' => 'templates/',
));

// Automatically load router files
$routers = glob('routers/*.router.php');
foreach ($routers as $router) {
    require $router;
}

// Run the app
$app->run();
