<?php if (!defined('S')) die ("What are you doing?"); 

t('Events'); 

class events {

	public $content = "";

	//shows the map and the list of events
	function index() {
		$this->content = <<<HTML
		here should be a list of events... and a map
<a href="events/add/">Add an event</a>
HTML;
		$this->write();
	}

	function add() {
	//	var_dump($_POST);

		$wasSaved = false;

		if ($wasSaved) {
			$this->content = <<<HTML
<span>Your event was saved. Go back <a href="/">home</a></span>.
HTML;
		} else {
		$this->content = <<<HTML
<form action="." method="post">
<input type="text" name="location" placeholder="location" value=""></input><br/>
<input type="text" name="city" placeholder="city" value=""></input><br/>
<input type="text" name="price" placeholder="price" value=""></input><br/>
<input type="text" name="date" placeholder="date" value=""></input><br/>
<input type="text" name="time" placeholder="time" value=""></input><br/>
<input type="text" name="everyWeek" placeholder="everyWeek" value=""></input><br/>
<input type="text" name="email" placeholder="email" value=""></input><br/>
<input type="text" name="name" placeholder="name" value=""></input><br/>
<input type="text" name="website" placeholder="website" value=""></input><br/>
<input type="submit" name="submit" value="Submit"></input><br/>
</form>
HTML;
		}

		$this->write();
	}

	function write()
	{
		echo $this->content;
	}

}

?>
