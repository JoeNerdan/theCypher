<div id="eventMenu">
<a href="/events/add">add event</a>
<a href="/events/">list all events</a>

</div>

<?php if (!defined('S')) die ("What are you doing?"); 
// include lib/db.php
if (!require_once(dirname(dirname(__FILE__)).'/lib/db.php')) die ("A giant man stole the clouds..."); 

t('Events'); 

/*
 *this is the class needed by shortphp
 it contains the actions which can be called via url
 * */

class events {

  public $content = "";


  //shows the map and the list of events
  function index() {

    //the events should be in json, we will act like it right now, this is a FIXME
    $db = new db();
    $events = $db->getEvents();
    //$eventsHtml = $this->convertEventsTo($events, 'html');
    $eventsHtml = "";
    //var_dump($eventsHtml);

    $eventsJSON = $this->convertEventsTo($events, 'json');

    $this->content = <<<HTML
    here should be a list of events... and a map
<a href="/events/add/">Add an event</a>
HTML;

    $this->content .= <<<HTML
<div id="mapContainer"> 


    <div id="map-canvas">asd</div>

</div>

<style type="text/css">
      html { height: 100% }
      body { height: 100%; margin: 0; padding: 0 }
      #map-canvas { height: 100%; width:100%; position:fixed; }
      #mapContainer {
      height: 600px;
      width: 500px;
      }
    </style>
<!-- FIXME find a way to store that api key somewhere-->
    <script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?key=&sensor=false">
    </script>
    <script type="text/javascript" id="theEventsJson">
{$eventsJSON}
</script>
    <script type="text/javascript" src="/js/mapManager.js"></script>


HTML
    .$eventsHtml;

    $this->write();
  }

  /*
   *this needs to be refactored somehow.
   the structure of the event-list should not be in some php file but in a html document. FIXME

   TODO refactor so the for each can be used in both cases
   * */
  function convertEventsTo($events, $returnType){
    $res = "";

    if ($returnType == 'html') {
      $conStart = "<div class='event'>";
      $conEnd = "</div>";
      $keyConStart = "<div class='event_";
      $keyConEnd = "'>";
      $valConStart = "";
      $valConEnd = "</div>";

      foreach ($events as $event) {
        $res .= $conStart;

        foreach($event as $key=>$value){
          $res .= $keyConStart.$key.$keyConEnd.$valConStart.$value.$valConEnd;
        }

        $res .= $conEnd;

      }
    } else if ($returnType == 'json'){
      $conStart = "events = {";
      $conEnd = "};";
      $keyConStart = "'";
      $keyConEnd = "' : ";
      $valConStart = "'";
      $valConEnd = "',";


      $res .= $conStart;
    foreach ($events as $event) {

        foreach($event as $key=>$value){
          $res .= $keyConStart.$key.$keyConEnd.$valConStart.$value.$valConEnd;
        }
    }

      $res .= $conEnd;

    }else{
      return "something went wrong while transforming the db-data into ".$returnType;
    };



    return $res;
  }


  function add() {
    //   var_dump($_POST);


    $wasSaved = false;
    if (isset($_POST['verified'])) {
      $wasSaved = true;
    }


    if ($wasSaved) {
      $db = new db();
      //   $db->connect();

      $data4db = $_POST;
      unset($data4db['verified']);
      unset($data4db['submit']);
      $data4db['visible'] = 0;

      $res = $db->saveEvent($data4db);

      $this->content .= <<<HTML
<span>Your event was saved. Go back <a href="/">home</a></span>.
HTML;
    } else {
      $this->content = <<<HTML
<form action="add" method="post" name="inputForm">
<input type="text" name="name" placeholder="name" value=""></input><br/>
<input type="text" name="location" placeholder="location" value=""></input><br/>
<input type="text" name="address" placeholder="address" value=""></input><br/>
<input type="text" name="city" placeholder="city" value=""></input><br/>
<input type="text" name="price" placeholder="price" value=""></input><br/>
<input type="text" name="date" placeholder="date" value=""></input><br/>
<input type="text" name="time" placeholder="time" value=""></input><br/>
<input type="text" name="everyWeek" placeholder="everyWeek" value=""></input><br/>
<input type="text" name="email" placeholder="email" value=""></input><br/>
<input type="text" name="submitter" placeholder="name" value=""></input><br/>
<input type="text" name="homepage" placeholder="website" value=""></input><br/>
<input type="textarea" name="description" placeholder="description" value=""></input><br/>
<input type="submit" name="submit" value="Submit"></input><br/>
<input type="text" checked="true" name="verified" value="" style="display:none!important;"></input><br/>
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


/*



  $testData = array(
    "name" => "The Cypher",
    "location" => "undergorund",
    "address" => "undergorund",
    "city" => "cologne",
    "price" => "for free",
    "date" => "-", // TODO calculate next date according to week day the event reoccours on
    "time" => "22:00",
    "everyWeek" => "Thursday",
    "email" => "foo@boo.com",
    "submitter" => "burnt",
    "visible" => 0,
    "homepage" => "thecypher",
    "description" => "more oldschool than you"
  );

 */

?>
