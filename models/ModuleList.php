<?php 

namespace models;
use lib\Core;
use moodlequery\MoodleQuery;
use PDO;

class ModuleList {

  protected $core;
  public $moduleList;
  protected $moodle;

  public function __construct ( $user ) {
    
    $this->core = Core::getInstance();

    if (isset($_COOKIE['MoodleSession'])) {
      $this->moodle = new MoodleQuery();
    } else {
      echo '<p><em>Moodle session id <strong>not found</strong></em</p>';
    }

    // get student from moodle session (or optionally from moodle student id) 
    if ($student = $this->moodle->getuser($_COOKIE['MoodleSession'])) { 
      $this->moodleUser = $this->moodle->getuser($_COOKIE['MoodleSession']);
    } else {
      echo '<p>No moodle user/session was found.</p>';
      echo '<p>Are you logged into moodle?</p>';
    }

    $this->moduleList = $this->moodle->getenrolments($user);
  }

  public function getModuleList(){
    return $this->moduleList;
  }
} 
?>