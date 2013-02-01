var map;
var initialize;

initialize = function(coords){
  var latLng = new google.maps.LatLng(coords[0].lat, coords[0].lng); // Correspond au premier
  
  var myOptions = {
    zoom      : 14, // Zoom par défaut
    center    : latLng, // Coordonnées de départ de la carte de type latLng 
    mapTypeId : google.maps.MapTypeId.TERRAIN, // Type de carte, différentes valeurs possible HYBRID, ROADMAP, SATELLITE, TERRAIN
    maxZoom   : 20
  };
  
  map      = new google.maps.Map(document.getElementById('map'), myOptions);
  var marker = new Array();
  for (var i = 0; i < coords.length; i++) {

    marker[i] = new google.maps.Marker({
      position : new google.maps.LatLng(coords[i].lat, coords[i].lng),
      map      : map,
      title    : coords[i].title
      //icon     : "marker_lille.gif" // Chemin de l'image du marqueur pour surcharger celui par défaut
    });
    var newLineCoordinates =
    [
      new google.maps.LatLng(coords[i].lat, coords[i].lng),
      new google.maps.LatLng(coords[i+1].lat, coords[i+1].lng)
    ];
         
    var newLine = new google.maps.Polyline({
      path: newLineCoordinates,        
      strokeColor: "#FF0000",
      strokeOpacity: 1.0,
      strokeWeight: 2
    });
    newLine.setMap(map);

  };//fin du for


};
