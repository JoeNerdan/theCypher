<?php

class db {

  private $db_host = 'localhost';
  private $db_user = 'root';   
  private $db_pass = 'joeking';   
  private $db_name = 'theCypher';   
  private $db_conn = '';


  function connect(){
 //   echo "connect";
    $dsn = 'mysql:dbname='.$this->db_name.';host='.$this->db_host;

    try{

      $this->db_conn = new PDO($dsn, $this->db_user, $this->db_pass);

    } catch(PDOException $e) {  
      echo $e->getMessage();  
      echo "DB ERROR!";
    }  


  }

  function saveEvent($data){
    $this->connect();
    //var_dump($this->db_conn);
  //  echo "<br/><br/>";
  //  var_dump($data);
   // echo "<br/><br/>";

    $sth = $this->db_conn->prepare("insert into events ( 
      name, 
      location, 
       address,      
       city,        
       price,       
       date,        
       time,        
       everyWeek,   
       email,       
       homepage,    
       visible,
       submitter,   
       description 
    ) values (
      :name, 
      :location, 
       :address,      
       :city,        
       :price,       
       :date,        
       :time,        
       :everyWeek,   
       :email,       
       :homepage,    
       :visible,
       :submitter,   
       :description
);");

      $sth->execute($data);

    return true;
  }

  public function getEvents()
  {
    $res = array();
    $this->connect();
    $sth = $this->db_conn->query('select * from events;');
 //   $sth->setFetchMode(PDO::FETCH_OBJ);
    $sth->setFetchMode(PDO::FETCH_ASSOC);

      while($row = $sth->fetch()){
       // var_dump($row);
        array_push($res, $row);
      };
    return $res;
  }



}


?>
