<?php 

namespace models;

class User {

  public $moodleUser;
  public $id;
  public $firstname;
  public $lastname;
  public $fullname;

  public function __construct ($moodle) {

    // get student from moodle session (or optionally from moodle student id) 
    if ($moodleUser = $moodle->getuser($_COOKIE['MoodleSession'])) { 
      $this->moodleUser = $moodle->getuser($_COOKIE['MoodleSession']);
    } else {
      echo '<p>No moodle user/session was found.</p>';
      echo '<p>Are you logged into moodle?</p>';
    }

    $this->id = $this->moodleUser->id;
    $this->firstname = $this->moodleUser->firstname;
    $this->lastname = $this->moodleUser->lastname;
    $this->fullname = $this->firstname .' '. $this->lastname;
  }

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