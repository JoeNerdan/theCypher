<?php

class db {

  private $db_host = ‘localhost’;   
  private $db_user = ‘root’;   
  private $db_pass = ‘root’;   
  private $db_name = ‘theCypher’;   


  function connect(){
    echo "connect";
    $dsn = 'mysql:dbname=theCypher;host=127.0.0.1';
    $dbuser = 'root';
    $dbpass = 'joeking';
    $db = new PDO($dsn, $dbuser, $dbpass);

    if (!$db) {
      echo "DB ERROR!";
    } else {

      var_dump($db);

    }
    
  }

  public function readAllEvents()
  {
    return "faaoo";
  }



}


?>
