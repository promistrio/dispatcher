'use strict';

var googlemap = function () {

  var map;
	
	
	var icon = {
    url: "images/plane.png", // url
	rotation: 45.0
    /*scaledSize: new google.maps.Size(32, 32), // scaled size
    origin: new google.maps.Point(0, 0), // origin
    anchor: new google.maps.Point(32, 32) // anchor*/
};

  return {
    init: function () {
      map = new GMaps({
        div: '#map',
        lat: 55.927166,
        lng: 37.523772
      });
		
		
      map.addMarker({
        lat: 55.927166,
        lng: 37.523772,
        title: 'Marker with InfoWindow',
        infoWindow: {
          content: '<p>HTML Content</p>'
        },
		icon: {
	        path: google.maps.SymbolPath.FORWARD_CLOSED_ARROW,
	        scale: 6,
	        fillColor: "red",
	        fillOpacity: 0.8,
	        strokeWeight: 2,
	        rotation: 40 //this is how to rotate the pointer
	    } 
     });
		
		var flightPlanCoordinates = [
          {lat: 37.772, lng: -122.214},
          {lat: 21.291, lng: -157.821},
          {lat: -18.142, lng: 178.431},
          {lat: -27.467, lng: 153.027}
        ];
		
        var flightPath = new google.maps.Polyline({
          path: flightPlanCoordinates,
          geodesic: true,
          strokeColor: '#FF0000',
          strokeOpacity: 1.0,
          strokeWeight: 2
        });

        flightPath.setMap(map);
    }
  };
}();

$(function () {
  googlemap.init();
});
