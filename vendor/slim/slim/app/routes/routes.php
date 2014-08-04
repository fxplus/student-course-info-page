<?php

$app->get('/', function () {
    echo "Hi there";
});

$app->get('/hello/:name', function ($name) {
    echo "Hello, $name";
});

$app->get('/ba-film', function () {
    echo "You have been redirected to a SCIP";
});

$app->get('/ba-music', function () {
    echo "You have been redirected to Learning Space";
});

$app->get('/am144296', function () use ($app) {    
    $app->redirect('http://localhost:8888/scip/');
});

?>
