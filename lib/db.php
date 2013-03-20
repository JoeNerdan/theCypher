<?php

//if (!require_once(dirname(dirname(__FILE__)).'/lib/cough/load.inc.php')) die ("A dwarf brought as a mountain..."); 
//if (!require_once(dirname(dirname(__FILE__)).'/lib/cough/as_database/load.inc.php')) die ("A dwarf brought as a mountain..."); 

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
    $this->connect();
    return "faaoo";
  }



}


?>
