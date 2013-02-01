function create_champ(i) {

          var i2 = i + 1;
          document.getElementById('leschamps_'+i).innerHTML = 'Etape '+i+' <input type="text" id="lat_'+i+'" name="fichier_'+i+'" value=""/>';
          document.getElementById('leschamps_'+i).innerHTML += (i <= 10) ? '<br /><span id="leschamps_'+i2+'"><a href="javascript:create_champ('+i2+')">Ajouter une étape</a></span>' : '';
        }

function load() {
      

      if (GBrowserIsCompatible()) {
        
        var map = new GMap2(document.getElementById("map"));
        map.addControl(new GSmallMapControl());
        map.addControl(new GMapTypeControl());
        var center = new GLatLng(46.2276380, 2.2137490);
        map.setCenter(center, 5);
        geocoder = new GClientGeocoder();
        var marker = new GMarker(center, {draggable: true});  
        map.addOverlay(marker);
        document.getElementById("lat_1").value = center.lat().toFixed(7) + ", " + center.lng().toFixed(7);
       // test focus document.input.onFocus.value = center.lat().toFixed(7) + ", " + center.lng().toFixed(7);
       // document.getElementById("lng").value = center.lng().toFixed(7);

    	  GEvent.addListener(marker, "dragend", function() {
           var point = marker.getPoint();
    	      map.panTo(point);
           document.getElementById("lat_1").value = point.lat().toFixed(7) + ", " + point.lng().toFixed(7);
           //document.getElementById("lng").value = point.lng().toFixed(7);

        }); //fin "dragend"

        GEvent.addListener(map, "moveend", function() {
      		map.clearOverlays();
          var center = map.getCenter();
      		var marker = new GMarker(center, {draggable: true});
      		map.addOverlay(marker);
      		document.getElementById("lat_1").value = center.lat().toFixed(7)+ ", " + center.lng().toFixed(7);
      	   //document.getElementById("lng").value = center.lng().toFixed(7);


          	GEvent.addListener(marker, "dragend", function() {
                var point =marker.getPoint();
          	     map.panTo(point);
                document.getElementById("lat_1").value = point.lat().toFixed(7)+ ", " + point.lng().toFixed(7);
          	   //document.getElementById("lng").value = point.lng().toFixed(7);
            });//fin "dragend"
        });//fin "moveend"

      } //fin if (GBrowserIsCompatible())
    } // fin load()
