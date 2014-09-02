<?php 

namespace models;

use lib\Config;

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

class User {

  public $moodleUser;
  public $id;
  public $firstname;
  public $lastname;
  public $fullname;

  public function __construct ($moodle, $userIsSet = false) {

  // if there is a Moodle Session, i.e. logged into Moodle
  if ( isset($_COOKIE['MoodleSession']) ){

    if($this->moodleUser = $moodle->getuser($_COOKIE['MoodleSession'])){
      
      // Set this Moodle user to user in session cookie
      $this->moodleUser = $moodle->getuser($_COOKIE['MoodleSession']);
    
      // grab the uid from user
      $this->id = $this->moodleUser->id;

      // grab the first name
      $this->firstname = $this->moodleUser->firstname;

      // grab the last name
      $this->lastname = $this->moodleUser->lastname;

      // Create fullname var
      $this->fullname = $this->firstname .' '. $this->lastname;

      $userIsSet = true;
    } else {
      throw new \Exception('No session found, redirecting to login.');
    }

    // else, if no session found, not logged in
    } else {
      // throw new \Exception('No user set');
    } 
  } // end of constructor

  public function getMoodleuser(){
    return $this->moodleUser;
  }

  public function getFirstname(){
    return $this->firstname;
  }

  public function getLastname(){
    return $this->lastname;
  }

  public function getFullname(){
    return $this->fullname;
  }

} // End class definition
?>