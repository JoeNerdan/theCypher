<?php if (!defined('S')) die ("What are you doing?"); 

t('Events'); 

class siteWithFunction {

	public $content = "";

	function index() {
		$content = "index of events";
		$this->write();
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

