<?php

class db {

  private $db_host = 'localhost';
  private $db_user = 'root';   
  private $db_pass = 'joeking';   
  private $db_name = 'theCypher';   
  private $db_conn = '';


  function connect(){
    echo "connect";
    $dsn = 'mysql:dbname='.$this->db_name.';host='.$this->db_host;

    try{

      $this->db_conn = new PDO($dsn, $this->db_user, $this->db_pass);

    } catch(PDOException $e) {  
      echo $e->getMessage();  
      echo "DB ERROR!";
    }  


  }

  function saveEvent($data){
    //var_dump($this->db_conn);

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

return "succ";
  }

  public function readAllEvents()
  {
    return "faaoo";
  }



}


?>
