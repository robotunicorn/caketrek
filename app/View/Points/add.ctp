<div class="points form">
<?php echo $this->Form->create('Point'); ?>
	<fieldset>
		<legend><?php echo __('Add Point'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('lat');
		echo $this->Form->input('lng');
	//	echo $this->Form->input('map_id', array('default' => $this->data));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
<li><?php echo $this->Html->link(__('Retour carte'), array('controller' => 'maps', 'action' => 'view', $this->request->data['Point']['map_id'])); ?> </li>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Points'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Maps'), array('controller' => 'maps', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Map'), array('controller' => 'maps', 'action' => 'add')); ?> </li>
	</ul>
</div>
 <table  bgcolor="#FFFFCC" width="300">

  </table>
  
<br/>
  <div align="center" id="map" style="width: 700px; height: 500px;margin:auto"><br/></div>
<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAAgrj58PbXr2YriiRDqbnL1RSqrCjdkglBijPNIIYrqkVvD1R4QxRl47Yh2D_0C1l5KXQJGrbkSDvXFA"
      type="text/javascript"></script>

<script type="text/javascript">

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
        document.getElementById("PointLat").value = center.lat().toFixed(7);
        document.getElementById("PointLng").value = center.lng().toFixed(7);

	  GEvent.addListener(marker, "dragend", function() {
       var point = marker.getPoint();
	      map.panTo(point);
       document.getElementById("PointLat").value = point.lat().toFixed(7);
       document.getElementById("PointLng").value = point.lng().toFixed(7);

        });


	 GEvent.addListener(map, "moveend", function() {
		  map.clearOverlays();
    var center = map.getCenter();
		  var marker = new GMarker(center, {draggable: true});
		  map.addOverlay(marker);
		  document.getElementById("PointLat").value = center.lat().toFixed(7);
	   document.getElementById("PointLng").value = center.lng().toFixed(7);


	 GEvent.addListener(marker, "dragend", function() {
      var point =marker.getPoint();
	     map.panTo(point);
      document.getElementById("PointLat").value = point.lat().toFixed(7);
	     document.getElementById("PointLng").value = point.lng().toFixed(7);

        });
 
        });

      }
    }
    window.onload = load()
    </script>