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

}

function finalDestinationAutoComplete() {
    var input = document.getElementById('destinationsName');
    var options = {
        componentRestrictions: {country: "za"}
       };
    var autocomplete = new google.maps.places.Autocomplete(input, options);
    autocomplete.setFields(['adr_address', 'geometry']);
}



document.addEventListener("DOMContentLoaded", function(event) {
    bookingAutocomplete();
    finalDestinationAutoComplete();
});