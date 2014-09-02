<?php

use lib\Config;
use moodlequery\MoodleQuery;
use moodlequery\AspireAPI;

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

echo "Porridge";

require_once('moodlequery/config.php');
require_once('moodlequery/class.moodlequery.php');
require_once('moodlequery/class.aspireapi.php'); 

// Get user
$app->get('/student', function () use ($app) {  

    ///////////////////////////
    // Get course list per user
    ///////////////////////////

    // Get moodle config, i.e. $CFG
    $cfg = Config::read('moodle.config');

    // get site baseurl
    $base = Config::read('site.root');

    // Get instance of MoodleQuery, i.e. $CFG
    $moodle = new MoodleQuery($cfg);

    // Try to load user
    // if fails, redirect to Login
    try {

      // get a user
      $user = new models\User($moodle);

      // if getting a user fails, chances are 
      // user needs to log in.
    } catch (Exception $e){

      // we will redirect to 500, so
      // create the view params
      $params = [
        "base" => $base
      ];

      // render 500 page, passing in params
      $app->render('500.html', $params);
      
      // stop any further code from being run
      exit();

    }

    $userFirstName = $user->getFirstName();

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

      // if the module has an id number
      if ($module->idnumber){
        
        // if there is a reading list for the module
        if( (array) $aspire->modulelists($module)[0] != FALSE ){
          
          // get the reading list object from aspire and cast as array
          $readinglists = (array) $aspire->modulelists($module);
         
          // store readinglist in lists array using module name as key
          $aspireLists[$module->fullname] = $readinglists;
        }
      }
    }
  
    ////////////////////////////////////////////////////
    // Get Json from Sharepoint API (Fake url @ present)
    ////////////////////////////////////////////////////

    $jsonUrl = 'https://webservices.fxplus.ac.uk/thelearningspace/bafinaff.json';

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
        "readingLists" => $aspireLists,
        "userFirstName" => $userFirstName,
    ];

    $app->render('course-page.html', $params);

});