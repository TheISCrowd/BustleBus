function initAutocomplete() {
    var map = new google.maps.Map(document.getElementById('map'), {
      center: {
        lat: -33,
        lng: 26
      },
      zoom: 6,
      disableDefaultUI: true
    });
  
    // Create the search box and link it to the UI element.
    var input = document.getElementById('address');
    var autocomplete = new google.maps.places.Autocomplete(input);
    map.controls[google.maps.ControlPosition.TOP_CENTER].push(input);
    var marker = new google.maps.Marker({
      map: map
    });
  
    // Bias the SearchBox results towards current map's viewport.
    autocomplete.bindTo('bounds', map);
    // Set the data fields to return when the user selects a place.
    autocomplete.setFields(
      ['address_components', 'geometry', 'name']);
  
    // Listen for the event fired when the user selects a prediction and retrieve
    // more details for that place.
    autocomplete.addListener('place_changed', function() {
      var place = autocomplete.getPlace();
      if (!place.geometry) {
        console.log("Returned place contains no geometry");
        return;
      }
      var bounds = new google.maps.LatLngBounds();
      document.getElementById('initalCollectionPoint').value = place; 
      marker.setPosition(place.geometry.location);
  
      if (place.geometry.viewport) {
        // Only geocodes have viewport.
        bounds.union(place.geometry.viewport);
      } else {
        bounds.extend(place.geometry.location);
      }
      map.fitBounds(bounds);
    });
  }
  document.addEventListener("DOMContentLoaded", function(event) {
    initAutocomplete();
  });