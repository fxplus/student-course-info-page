<?php

//$app->get('/', function () {
//    echo "Hi there";
//});

$app->get('/', function () use ($app) {
    $app->render('home.php');
});

$app->get('/course_list', function () use ($app) {
    $app->render('course_list.php');
});

$app->get('/hello/:name', function ($name) {
    echo "Hello, $name";
});

$app->get('/am144296', function () use ($app) {  

    // TODO: Need to look at those curl session calls.
    // looks like some bits are duplicated and not needed.
	
	// Fake the API call
    $url = 'https://gist.githubusercontent.com/aaronmarruk/b116956eaf7254532c99/raw/be640546d647f0ae9b7041c23901e21e0fdbb008/json-response.json';
    $curlSession = curl_init();
    curl_setopt($curlSession, CURLOPT_URL, $url);
    curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
    curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);
    $jsonData = curl_exec($curlSession);
    curl_close($curlSession);

    // Fake the API call
    $url2 = 'http://library.fxplus.ac.uk/rest/views/course_all?name=architecture';
    $curlSession = curl_init();
    curl_setopt($curlSession, CURLOPT_URL, $url);
    curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
    curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);
    $jsonData = curl_exec($curlSession);

    curl_setopt($curlSession, CURLOPT_URL, $url2);
    curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
    curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);
    $liaisonUrl = curl_exec($curlSession);
    curl_close($curlSession);
   
    $app->render('index.php', array(    
        'json' => $jsonData,
        'liaisonUrl' => $liaisonUrl
    ));

});

?>
