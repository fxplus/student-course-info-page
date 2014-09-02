<?php

use lib\Config;

// GET index route
$app->get('/', function () use ($app) {

  $hello = "Hello!";
  $app->render('index.html', array('hello' => $hello));
});

$app->get('/login', function () use ($app) {

  $hello = "Hello!";
  $app->render('index.html', array('hello' => $hello));
});

$app->get('/404', function () use ($app) {

  // get site baseurl
  $base = Config::read('site.root');

  // Render 404 template
  $app->render('404.html', array('base' => $base));
});