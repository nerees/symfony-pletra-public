let map; //Will contain map object.
let marker = false; ////Has the user plotted their location marker?
let country = "Lithuania";

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


// for ( const a of lats.dataset) {
//     document.write(a);
// }
// for ( const b of lngs.dataset) {
//     document.write(b);
// }


//Function called to initialize / create the map.
//This is called when the page has loaded.
function initMap() {

    //The center location of our map.
    const centerOfMap = new google.maps.LatLng(55.19, 23.54);

    //Map options.
    const options = {
        center: centerOfMap, //Set center.
        zoom: 7 //The zoom value.
    };

    //Create the map object.
    map = new google.maps.Map(document.getElementById('map'), options);
    //create user markers
    for (let i = 0; i < lats_array.length; i++) {
        new google.maps.Marker({
            position: { lat: parseFloat(lats_array[i]), lng: parseFloat(lngs_array[i])},
            icon: "https://pletra.ciamarket.lt/registered.png",
            map,
            title: "Registruotas",
        });
        //console.log("kakaka");
    }
}

// // Removes the markers from the map, but keeps them in the array.
// function clearMarkers() {
//     setMapOnAll(null);
// }
//
// // Shows any markers currently in the array.
// function showMarkers() {
//     setMapOnAll(map);
// }
//
// // Deletes all markers in the array by removing references to them.
// function deleteMarkers() {
//     clearMarkers();
//     markers = [];
// }

//Load the map when the page has finished loading.
google.maps.event.addDomListener(window, 'load', initMap);