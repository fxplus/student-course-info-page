<?php

// GET index route
$app->get('/', function () use ($app) {
    
    $hello = "Hello!";
    $app->render('index.html', array('hello' => $hello));
});