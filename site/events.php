<div id="eventMenu">
<a href="/events/add">add event</a>
<a href="/events/">list all events</a>

</div>

<?php if (!defined('S')) die ("What are you doing?"); 
// include lib/xml.php
if (!require_once(dirname(dirname(__FILE__)).'/lib/xml.php')) die ("A giant man stole the clouds..."); 

t('Events'); 

/*
 *this is the class needed by shortphp
 it contains the actions which can be called via url
 * */
class events {

  public $content = "";




  //shows the map and the list of events
  function index() {

    $eventHandler = new eventHandler();
    //the events should be in json, we will act like it right now, this is a FIXME
    //
    $this->content = <<<HTML
    here should be a list of events... and a map
<a href="/events/add/">Add an event</a>
HTML;

    $theEvents = <<<HTML
<div>
HTML
    .$eventHandler->readEvents() .<<<HTML
</div>
HTML
    ;

    $this->content .= $theEvents. <<<HTML
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
    <script type="text/javascript">
      function initialize() {
        //middle of germany
        var mapOptions = {
          center: new google.maps.LatLng(50.9, 10.26),
          zoom: 6,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById("map-canvas"),
            mapOptions);


   var address = 'Cologne';

   var geocoder = new google.maps.Geocoder();

   geocoder.geocode({
      'address': address
   }, 
   function(results, status) {
      if(status == google.maps.GeocoderStatus.OK) {
         new google.maps.Marker({
            position: results[0].geometry.location,
            map: map,
            title: "foo",

         });
      }
   });

   var address = 'berlin';
   geocoder.geocode({
      'address': address
   }, 
   function(results, status) {
      if(status == google.maps.GeocoderStatus.OK) {
         new google.maps.Marker({
            position: results[0].geometry.location,
            map: map
         });
      }
   });

var marker = new google.maps.Marker({

  position: new google.maps.LatLng(50.9, 10.26),
    map: map,
              title: "title",
              });

      var contentString = "Hello!!!";
      var infowindow = new google.maps.InfoWindow;

      bindInfoW(marker, contentString, infowindow);


      function bindInfoW(marker, contentString, infowindow)
      {
                google.maps.event.addListener(marker, 'click', function() {
                              infowindow.setContent(contentString);
                                          infowindow.open(map, marker);
                                      });
      }

      }
      google.maps.event.addDomListener(window, 'load', initialize);

    </script>


HTML;

    $this->write();
}




//fixme is this right here? should it be callable by url?
function save(){
  $foo = new eventHandler();
  $testData = array(
    "location" => "undergorund",
    "city" => "cologne",
    "price" => "for free",
    "date" => "-", // TODO calculate next date according to week day the event reoccours on
    "time" => "22:00",
    "everyWeek" => "Thursday",
    "email" => "foo@boo.com",
    "name" => "burnt",
    "website" => "thecypher"
  );
  $foo->saveEvent($testData);
}

function add() {
  //  var_dump($_POST);

  $wasSaved = false;
  if (isset($_POST['verified'])) {
    $wasSaved = true;
  }


  if ($wasSaved) {
    $this->content = <<<HTML
<span>Your event was saved. Go back <a href="/">home</a></span>.
HTML;
  } else {
    $this->content = <<<HTML
<form action="." method="post">
<input type="text" name="name" placeholder="name" value=""></input><br/>
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

class eventHandler {


  public function saveEvent($eventData)
  {
    echo "in saveEvent";
    print_r($eventData);
  }

  //todo maybe implement a kind of filter here?
  public function readEvents(){

    $doc = new DOMDocument();
    $doc->load(dirname(dirname(__FILE__)).'/data/events.xml');
    var_dump($doc);

    $events = $doc->getElementsByTagName( "event" );
    foreach( $events as $event )
    {


      $foo = array(
        "name" => $event->getElementsByTagName("name")->item(0)->nodeValue,
        "location" => $event->getElementsByTagName("location")->item(0)->nodeValue,
        "city" => $event->getElementsByTagName("city")->item(0)->nodeValue,
        "price" => $event->getElementsByTagName("price")->item(0)->nodeValue,
        "date" => $event->getElementsByTagName("date")->item(0)->nodeValue,
        "time" => $event->getElementsByTagName("time")->item(0)->nodeValue,
        "everyWeek" => $event->getElementsByTagName("everyWeek")->item(0)->nodeValue,
        "email" => $event->getElementsByTagName("email")->item(0)->nodeValue,
        "name" => $event->getElementsByTagName("name")->item(0)->nodeValue,
        "website" => $event->getElementsByTagName("website")->item(0)->nodeValue
      );


      var_dump($foo);

    }

    return $foo;
  }


}

?>
