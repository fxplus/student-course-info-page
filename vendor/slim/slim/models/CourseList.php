<?php 

namespace models;
use lib\Core;
use PDO;

class CourseList {

  protected $core;

  public function __construct (  ) {
    $this->core = Core::getInstance();
  }

  public function getCourseList(){
    
    $r = array();  

    $sql = "SELECT u.username, ue.userid, ue.enrolid, e.enrol, e.courseid, c.fullname, c.shortname 
      FROM mdl_user as u
      RIGHT JOIN mdl_user_enrolments as ue 
      ON u.id = ue.userid 
      JOIN mdl_enrol as e 
      ON ue.enrolid = e.id 
      JOIN mdl_course as c 
      ON e.courseid = c.id
      WHERE u.username = 'am144296'";

    $stmt = $this->core->dbh->prepare($sql);

    if ($stmt->execute()) {
      $r = $stmt->fetchAll(PDO::FETCH_ASSOC);       
    } else {
      $r = 0;
    }   
    return $r;
  }

  // public function getCourseList(){
  //   return $this->courseList;
  // }
} // End class definition
?>