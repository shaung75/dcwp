<?php get_header(); ?>

<?php
	//Function for Google Map;
	
	$zip = 'Daddy Cools Chilli Sauce,Oakwood Cottage,50 Woodhead Road,Glossop, Derbyshire SK13 1JX';
	
	$url = "http://maps.googleapis.com/maps/api/geocode/json?address=".urlencode($zip)."&sensor=true";
	
	$ch = curl_init();
	curl_setopt ($ch, CURLOPT_URL, $url);
	curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 5);
	curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
	$contents = curl_exec($ch);
	if (curl_errno($ch)) {
	  $contents = '';
	} else {
	  curl_close($ch);
	}
	
	if (!is_string($contents) || !strlen($contents)) {
		//echo "Failed to get contents.";
		$contents = '';
	}
	
	$result = json_decode($contents, true);
	
	$result1[]=$result['results'][0];
	$result2[]=$result1[0]['geometry'];
	$result3[]=$result2[0]['location'];
	$val = $result3[0];

	$Latitude = $val['lat'];
	$Longitude = $val['lng'];
	$mapContent="<b>Daddy Cools Chilli Sauce</b><br>Oakwood Cottage<br>50 Woodhead Road<br>Glossop, Derbyshire<br>SK13 1JX<br>";

?>

<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<script type="text/javascript">
	var markers = [];
	var map;
	function initialize() {        
		var mapOptions = {
			zoom: 10,
			center: new google.maps.LatLng(<?php echo $Latitude; ?>, <?php echo $Longitude; ?>),
			mapTypeId: google.maps.MapTypeId.ROADMAP
		}
		 map = new google.maps.Map(document.getElementById("googleMap"), mapOptions);        
		var locations = [
			['<?php echo $mapContent; ?>', <?php echo $Latitude; ?>, <?php echo $Longitude; ?>,  'http://www.google.com/intl/en_us/mapfiles/ms/micons/green-dot.png']
		];            
		var marker, i;
		var infowindow = new google.maps.InfoWindow();        
		google.maps.event.addListener(map, 'click', function() {            
			infowindow.close();    
		});           
		for (i = 0; i < locations.length; i++) {
			marker = new google.maps.Marker({
				position: new google.maps.LatLng(locations[i][1], locations[i][2]),
				map: map,
				icon: locations[i][3]
			});    
			google.maps.event.addListener(marker, 'click', (function(marker, i) {
				return function() {
					infowindow.setContent(locations[i][0]);
					infowindow.open(map, marker);      
				}
			})(marker, i));        
			markers.push(marker);
		}   
//clearMarkers();  //this function is used to clear marker initially
	}
	google.maps.event.addDomListener(window, 'load', initialize);
  //Extra function from google map
  // Add a marker to the map and push to the array.
  function addMarker(location) {
    var marker = new google.maps.Marker({
   position: location,
   map: map
    });
    markers.push(marker);
  }
  
  // Sets the map on all markers in the array.
  function setAllMap(map) {
    for (var i = 0; i < markers.length; i++) {
   markers[i].setMap(map);
    }
  }
  
  // Removes the markers from the map, but keeps them in the array.
  function clearMarkers() {
    setAllMap(null);
  }
  
  // Shows any markers currently in the array.
  function showMarkers() {
    setAllMap(map);
  }
</script>

<section class="banner flexslider">

</section>
<div class="subpage-contener clear-fx">
    <div class="contact-address">
        <ul>
            <li>
            	Daddy Cools Chilli Sauce<br>
							Oakwood Cottage,<br>
							50 Woodhead Road<br>
							Tintwistle, Glossop,<br>
							Derbyshire, SK13 1JX.<br>
							<br>
						</li>
            <li class="_email">info@daddycoolschillisauce.co.uk</li>
            <li class="_ph">07583 403560</li>
        </ul>
    </div>
    <div class="contact-map"  id="googleMap">
   
    </div>
    <div id="msg" style="color:#900; text-align:center"></div>
    <div class="contact-form">
    	<h3>Our contact form will be back online shortly...</h3>
    </div>
</div>

<?php get_footer(); ?>