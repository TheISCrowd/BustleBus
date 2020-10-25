// Adam Purdon 
// 20/10/2020
// Google Maps Api autocomplete and maps service implementation


function bookingAutocomplete() {
    // setup autcomplete to input fields and set location search/return values
    var input = document.getElementById('initalCollectionPoint');
    var options = {
        componentRestrictions: {country: "za"}
       };
    var autocomplete = new google.maps.places.Autocomplete(input, options);
    autocomplete.setFields(['adr_address', 'geometry']);

    autocomplete.addListener('place_changed', function() {
        var place = autocomplete.getPlace();
        document.getElementById('bookingLatLong').value = place.geometry.location;
    });
}

function finalDestinationAutoComplete() {
    var input = document.getElementById('destination');
    var options = {
        componentRestrictions: {country: "za"}
       };
    var autocomplete = new google.maps.places.Autocomplete(input, options);
    autocomplete.setFields(['adr_address', 'geometry']);

    autocomplete.addListener('place_changed', function() {
        var place = autocomplete.getPlace();
        document.getElementById('destinationLatLong').value = place.geometry.location;
    });
}

function daytripAutoComplete() {
    var input = document.getElementById('daytrip');
    var options = {
        componentRestrictions: {country: "za"}
       };
    var autocomplete = new google.maps.places.Autocomplete(input, options);
    autocomplete.setFields(['adr_address', 'geometry']);

    autocomplete.addListener('place_changed', function() {
        var place = autocomplete.getPlace();
        document.getElementById('daytripLatLong').value = place.geometry.location;
    });
}

document.addEventListener("DOMContentLoaded", function(event) {
    bookingAutocomplete();
    finalDestinationAutoComplete();
    daytripAutoComplete();
});