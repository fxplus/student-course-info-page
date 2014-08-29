<?php

use lib\Config;
use moodlequery\MoodleQuery;
use moodlequery\AspireAPI;

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

require_once('moodlequery/config.php');
require_once('moodlequery/class.moodlequery.php');
require_once('moodlequery/class.aspireapi.php'); 

// Get user
$app->get('/am144296', function () use ($app) {  

    ///////////////////////////
    // Get course list per user
    ///////////////////////////

    // Get moodle config, i.e. $CFG
    $cfg = Config::read('moodle.config');

    // get site baseurl
    $base = Config::read('site.root');

    // Get instance of MoodleQuery, i.e. $CFG
    $moodle = new MoodleQuery($cfg);

    // Get the current Moodle user
    $user = new models\User($moodle);
    
    // Get the module list for the given user
    $moduleList = new models\ModuleList($user);

    ///////////////
    // Aspire lists
    ///////////////

    // Get the aspire config from Moodle object
    $aspireconfig = $moodle->getaspireconfig();

    $aspire = new AspireAPI($aspireconfig);

    // Create an array for storing our lists per course
    $aspireLists = array();

    // for each course in the courselist
    foreach($moduleList->getModuleList() as $module) {

      // grab the reading list form aspire
      $readinglists = $aspire->modulelists($module);
      
      // store in lists array using module name as key
      $aspireLists[$module->fullname] = $readinglists;

    }

    k($aspireLists);

    ////////////////////////////////////////////////////
    // Get Json from Sharepoint API (Fake url @ present)
    ////////////////////////////////////////////////////

    $jsonUrl = 'https://gist.githubusercontent.com/aaronmarruk/b116956eaf7254532c99/raw/f285121797603cb771d15967db489b2041a709bf/json-response.json';

    // Get a JSON API
    $jsonApi = new models\JsonApi();

    // Get json data by passing in url
    $jsonData = $jsonApi->getJson($jsonUrl);

    // get the contacts from returned array
    $contacts = $jsonData["contacts"];

    // get the files also
    $files = $jsonData["files"];

    ////////////////////////////////////////////////////////
    // Create the params array and pass into view and render
    ////////////////////////////////////////////////////////

    // Create params array to pass into view
    $params = [
        "modules" => $moduleList->getModuleList(),
        "base" => $base,
        "contacts" => $contacts,
        "files" => $files,
    ];

    $app->render('course-page.html', $params);

});