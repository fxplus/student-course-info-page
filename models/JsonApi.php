<?php 

namespace models;
// use lib\Core;
// use PDO;

class JsonApi {

  public function __construct (  ) {
    
  }

  public function getJSON($url){
    $curlSession = curl_init($url);
    curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
    curl_setopt($curlSession, CURLOPT_SSL_VERIFYPEER, FALSE);
    $r = json_decode(curl_exec($curlSession), true);
    curl_close($curlSession); 
    return $r;
  }
} 
?>