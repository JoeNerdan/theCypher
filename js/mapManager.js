
function initialize() {
	// start at the middle of germany
	var mapOptions = {
		center: new google.maps.LatLng(50.9, 10.26),
		zoom: 6,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	};
	var map = new google.maps.Map(document.getElementById("map-canvas"),
		mapOptions);
	var geocoder = new google.maps.Geocoder();


	//this is testdata, later this will be defined in a global variable which is created in the php
	var data = [

		{
    "name" : "The Cypher",
    "location" : "undergorund",
    "city" : "cologne",
    "address" : "cologne",
    "price" : "for free",
    "date" : "-", // TODO calculate next date according to week day the event reoccours on
    "time" : "22:00",
    "everyWeek" : "Thursday",
    "email" : "foo@boo.com",
    "submitter_name" : "burnt",
    "website" : "thecypher"
	},
	{
    "name" : "Another freestyle event",
    "location" : "In the park",
    "city" : "hamburg",
    "address" : "hamburg",
    "price" : "4 bucks",
    "date" : "-", // TODO calculate next date according to week day the event reoccours on
    "time" : "22:00",
    "everyWeek" : "Thursday",
    "email" : "foo@boo.com",
    "submitter_name" : "joe",
    "website" : "free.yo"
	}

];

	function createMarker(data){


		geocoder.geocode({
				'address': data.address
			}, 
			function(results, status) {
				console.log(results);
				if(status == google.maps.GeocoderStatus.OK) {
					var infowindow = new google.maps.InfoWindow();
					var marker = new google.maps.Marker({
							position: results[0].geometry.location,
							map: map,
							title: data.name
						});
					//here we need to prepare the infos to look nice in the bubble
					bindInfoW(marker, 
						"Name: " + data.name + "Location: " + data.location
						, infowindow);
				}
			});

	}

	var i = 0;
	for (i = data.length; i--;) {
		console.log(data[i]);
	createMarker( data[i]);
	}



	function bindInfoW(marker, contentString, infowindow)
	{
		google.maps.event.addListener(marker, 'click', function() {
				infowindow.setContent(contentString);
				infowindow.open(map, marker);
			});
	}

}
google.maps.event.addDomListener(window, 'load', initialize);


