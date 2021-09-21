//Set up some of our variables.
var map; //Will contain map object.
var marker = false; ////Has the user plotted their location marker? 
var country = "Lithuania";
var geocoder = new google.maps.Geocoder();

let lats = document.querySelector('#lats');
let lngs = document.querySelector('#lngs');

lats = lats.dataset.cord;
lats = lats.replace('["','');
lats = lats.replace('"]','');
lats = lats.replaceAll('"','');
lats_array = lats.split(',');

lngs = lngs.dataset.cord;
lngs = lngs.replace('["','');
lngs = lngs.replace('"]','');
lngs = lngs.replaceAll('"','');
lngs_array = lngs.split(',');
        
//Function called to initialize / create the map.
//This is called when the page has loaded.
function initMap() {

    //The center location of our map.
    let centerOfMap = new google.maps.LatLng(55.99, 22.23);

    //Map options.
    let options = {
      center: centerOfMap, //Set center.
      zoom: 7 //The zoom value.
    };

    //Create the map object.
    map = new google.maps.Map(document.getElementById('map'), options);

    //parodom jau registruotus taskus
    for (let i = 0; i < lats_array.length; i++) {
        new google.maps.Marker({
            position: { lat: parseFloat(lats_array[i]), lng: parseFloat(lngs_array[i])},
            icon: "https://pletra.ciamarket.lt/registered.png",
            map,
            title: "Registruotas",
        });
        //console.log("kakaka");
    }

    // bandom autonustatymą
    infoWindow = new google.maps.InfoWindow();
    const locationButton = document.createElement("button");
    locationButton.textContent = "Pabandyti nustatyti mano vietovę";
    locationButton.classList.add("custom-map-control-button");
    map.controls[google.maps.ControlPosition.TOP_CENTER].push(locationButton);
    locationButton.addEventListener("click", () => {
        // Try HTML5 geolocation.
        if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
            (position) => {
            const pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude,
            };
            infoWindow.setPosition(pos);
            infoWindow.setContent("Rasta vietovė.");
            infoWindow.open(map);
            map.setCenter(pos);
            },
            () => {
            handleLocationError(true, infoWindow, map.getCenter());
            }
        );
        } else {
        // Browser doesn't support Geolocation
        handleLocationError(false, infoWindow, map.getCenter());
        }
    });
    // end bandom autonustatymą

    //Listen for any clicks on the map.
    google.maps.event.addListener(map, 'click', function(event) {
        //Get the location that the user clicked.
        let clickedLocation = event.latLng;
        //If the marker hasn't been added.
        if(marker === false){
            //Create the marker.
            marker = new google.maps.Marker({
                position: clickedLocation,
                map: map,
                draggable: true //make it draggable
            });
            //Listen for drag events!
            google.maps.event.addListener(marker, 'dragend', function(event){
                markerLocation();
            });
        } else{
            //Marker has already been added, so just change its location.
            marker.setPosition(clickedLocation);
        }
        //Get the marker's location.
        markerLocation();
    });
}

function lalala(){
    alert("yra");
}

//paieška pagal adresą
function codeAddress() {
    var address = document.getElementById('address').value;
    geocoder.geocode( { 'address': address}, function(results, status) {
      if (status == 'OK') {
        if (marker != false){
            marker.setMap(null);
        }
        map.setCenter(results[0].geometry.location);
        marker = new google.maps.Marker({
            map: map,
            position: results[0].geometry.location,
            draggable: true
        });
        google.maps.event.addListener(marker, 'dragend', function(event){
            markerLocation();
        });
        markerLocation();
      } else {
        alert('Nepavyko rasti vietos pagal adresą dėl sekančios priežąsties: ' + status);
      }
    });
}
//end paieška pagal adresą

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
    infoWindow.setPosition(pos);
    infoWindow.setContent(
      browserHasGeolocation
        ? "Klaida: Nepavyko nustatyti lokacijos."
        : "Klaida: Jūsų naršyklė neleidžia automatiškai nustatyti lokacijos."
    );
    infoWindow.open(map);
}
        
//This function will get the marker's current location and then add the lat/long
//values to our textfields so that we can save the location.
function markerLocation(){
    //Get location.
    let currentLocation = marker.getPosition();
    //Add lat and lng values to a field that we can save.
    document.getElementById('lat').value = currentLocation.lat(); //latitude
    document.getElementById('lng').value = currentLocation.lng(); //longitude
    document.getElementById('latitude').innerHTML = currentLocation.lat(); //latitude
    document.getElementById('longitude').innerHTML = currentLocation.lng(); //longitude
}
// Removes the markers from the map, but keeps them in the array.
function clearMarkers() {
    setMapOnAll(null);
}

// Shows any markers currently in the array.
function showMarkers() {
    setMapOnAll(map);
}

// Deletes all markers in the array by removing references to them.
function deleteMarkers() {
    clearMarkers();
    markers = [];
}
        
//Load the map when the page has finished loading.
google.maps.event.addDomListener(window, 'load', initMap);