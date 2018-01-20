var inputCity;
var cityName;
var optionsCity;
var autocompleteCity;

function initMap() {
    optionsCity = {
        types: ['(cities)']
    };
    inputCity = document.getElementById('location');//
    autocompleteCity = new google.maps.places.Autocomplete(inputCity , optionsCity);
    autocompleteCity.addListener('place_changed', function() {
        var place = autocompleteCity.getPlace();
        $('#location').val(place.address_components[0].long_name);
        cityName = place.address_components[0].long_name;
    });
}