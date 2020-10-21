// Adam Purdon 
// 20/10/2020
// Google Maps Api autocomplete and maps service implementation

function initAutocomplete() {
    // setup autcomplete to input fields and set location search/return values
    var input = document.getElementById('destinationsName');
    var autocomplete = google.maps.places.autocomplete(input);
    autocomplete.setComponentRestrictions('za');
    autocomplete.setFields(['adr_address', 'geometry']);

    autocomplete.addEventListener('place_changed', function() {
        var place = autocomplete.getPlace();
        document.getElementById('');
    });
}

document.addEventListener("DOMContentLoaded", function(event) {
    initAutocomplete();
});