<?php

//if (!require_once(dirname(dirname(__FILE__)).'/lib/cough/load.inc.php')) die ("A dwarf brought as a mountain..."); 
if (!require_once(dirname(dirname(__FILE__)).'/lib/coughphp/load.inc.php')) die ("A dwarf brought as a mountain..."); 
if (!require_once(dirname(dirname(__FILE__)).'/lib/coughphp/as_database2/load.inc.php')) die ("A dwarf brought as a mountain..."); 


  CoughDatabaseFactory::addConfig(array(
    // db_name_hash is a hash of alias name => actual db name (in the default
    //     // case, db_name_used_during_generation => environment_db_name). For example,
    //         // if you generate on `*_dev` databases and are setting up your test config,
    //             // then the hash might look like this:
    'db_name_hash' => array(
      'app_db_dev' => 'app_db_test',
      'reports_dev' => 'reports_test'
    ),
    'driver' => 'mysql',
    'host' => 'localhost',
    'user' => 'root',
    'pass' => 'joeking',
    'port' => 3306
  ));



class db {

  private $db_host = ‘localhost’;   
  private $db_user = ‘root’;   
  private $db_pass = ‘root’;   
  private $db_name = ‘theCypher’;   


  function connect(){
    try{

      $myconn = @mysql_connect($this->db_host,$this->db_user,$this->db_pass);  
      echo "connect";
    } catch (Exception $e){
      var_dump($e);
    }
    echo "connect";
    var_dump($myconn);
    if($myconn)  {  
      $seldb = @mysql_select_db($this->db_name,$myconn);  
    } else {
      return "db error!!!";
    }
  }

  public function readAllEvents()
  {
    return "faaoo";
  }



}


?>
