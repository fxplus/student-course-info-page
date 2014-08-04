<?php

$router->get('/', function () {
    echo "Hi there";
});

$router->get('/hello/:name', function ($name) {
    echo "Hello, $name";
});

$router->get('/ba-film', function () {
    echo "You have been redirected to a SCIP";
});

$router->get('/ba-music', function () {
    echo "You have been redirected to Learning Space";
});

$router->get('/am144296', function () use ($router) {    
    $router->redirect('http://localhost:8888/scip/');
});

?>
