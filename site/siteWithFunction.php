<?php if (!defined('S')) die ("What are you doing?"); 

t('siteWithFunction'); 

class siteWithFunction {

  public $content = "";//

  function index() {
    echo "index";
  }

  function foo() {
    //get DB data
    $this->content = "Db data recieved";
    $this->write();
  }
  function write()
  {
    echo $this->content;
  }

}

?>

