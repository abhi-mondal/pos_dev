
<style>
	 #map {
  		height: 100%;
       	/*width:50%;*/
}

/* Optional: Makes the sample page fill the window. */
html,
body {
  height: 100%;
  margin: 0;
  padding: 0;
}


</style>
	<div id="map"></div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBeiiuh36xam8ctZGverKpGer3JX5NZM5U&callback=initMap&v=weekly" async></script>

<script>
// Initialize and add the map
function initMap() {
  // The location of Uluru
  const uluru = { lat: 23.5378239, lng: 87.3115434 };
  // The map, centered at Uluru
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 18,
    center: uluru,
  });
  // The marker, positioned at Uluru
  const marker = new google.maps.Marker({
    position: uluru,
    map: map,
  });
}
</script>

