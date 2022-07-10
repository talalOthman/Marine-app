// const mymap = L.map('map',{
//     minZoom: 2,
// }).setView([2.2180, 115.6628], 3.5);
// const attribution =
//     'Tiles &copy; Esri &mdash; National Geographic';

// const tileUrl = 'https://server.arcgisonline.com/ArcGIS/rest/services/NatGeo_World_Map/MapServer/tile/{z}/{y}/{x}';
// const tiles = L.tileLayer(tileUrl, { attribution, });

// tiles.addTo(mymap);
// mymap.addControl(new L.Control.Fullscreen());
// const shipIcon = L.icon({
//     iconUrl: 'images/ship-marker.png',
//     iconSize: [23, 20],
//     iconAnchor: [25, 16]
// });
// var southWest = L.latLng(-89.98155760646617, -180),
//     northEast = L.latLng(89.99346179538875, 180);
// var bounds = L.latLngBounds(southWest, northEast);

// mymap.setMaxBounds(bounds);
// mymap.on('drag', function () {
//     mymap.panInsideBounds(bounds, { animate: false });
// });
// let marker = new L.marker([0, 0], { icon: shipIcon }).addTo(mymap);
// let marker2 = new L.marker([4.6626, 99.5451], { icon: shipIcon }).addTo(mymap);

// const api_url = 'https://api.wheretheiss.at/v1/satellites/25544';

// let firstTime = true;

// async function getLocation() {
//     const response = await fetch(api_url);
//     const data = await response.json();
//     const { latitude, longitude } = data;

//     marker.setLatLng([latitude, longitude]);
//     if (firstTime) {
//         mymap.setView([latitude, longitude], 2);
//         firstTime = false;
//     }
// }

// getLocation();

// setInterval(getLocation, 1000);



const mymap = L.map('map', {
    minZoom: 2,
}).setView([1.2744383, 103.7826467], 10.5);
const attribution =
    'Tiles &copy; Esri &mdash; National Geographic';

const tileUrl = 'https://{s}.basemaps.cartocdn.com/rastertiles/voyager/{z}/{x}/{y}{r}.png';
const tiles = L.tileLayer(tileUrl, { attribution, });

tiles.addTo(mymap);
mymap.addControl(new L.Control.Fullscreen());
const shipIcon = L.icon({
    iconUrl: 'images/ship-marker.png',
    iconSize: [23, 20],
    iconAnchor: [25, 16]
});
var southWest = L.latLng(-89.98155760646617, -180),
    northEast = L.latLng(89.99346179538875, 180);
var bounds = L.latLngBounds(southWest, northEast);

mymap.setMaxBounds(bounds);
mymap.on('drag', function () {
    mymap.panInsideBounds(bounds, { animate: true });
});
let marker = new L.marker([0, 0], { icon: shipIcon }).addTo(mymap);
let marker2 = new L.marker([4.6626, 99.5451], { icon: shipIcon }).addTo(mymap);

const api_url = 'https://api.wheretheiss.at/v1/satellites/25544';

let firstTime = true;

async function getLocation() {
    const response = await fetch(api_url);
    const data = await response.json();
    const { latitude, longitude } = data;

    marker.setLatLng([latitude, longitude]);
    if (firstTime) {
        // mymap.setView([latitude, longitude], 2);
        firstTime = false;
    }
}

getLocation();

// var locations = [
//     ["Locations 1", 6.625117, 39.145004],
//     ["Locations 2", -6.5767859, 39.1304557],
//     ["Locations 3", -6.8667841, 39.2530337],
//     ["Locations 4", -6.7787336, 39.2273218],
//     ["Locations 5", -6.7576158, 39.2768276],
// ];

// for (var i = 0; i < locations.length; i++) {
//  marker = new L.marker([locations[i][1], locations[i][2]],{ icon: shipIcon })
//           .bindPopup(locations[i][0])
//           .addTo(mymap);
// }

setInterval(getLocation, 1000);


function getPublicDashboard() {
    $('#cover-2').show();
    // const response = await fetch('http://localhost/api/heatmap');
    // const data = await response.json();

    fetch('http://localhost/api/public_dashboard')
        .then(response => response.json())
        .then(data => {
            $('#cover-2').hide();
            let geoCounter = 0;
            let vesselCounter = data[geoCounter].vessel_id;
            let marker = [];
            do {
                marker[vesselCounter] = new L.marker([data[geoCounter].long, data[geoCounter].lat], { icon: shipIcon }
                ).addTo(mymap);
                while (data[geoCounter].vessel_id == vesselCounter) {
                    marker[vesselCounter].setLatLng([data[geoCounter].long, data[geoCounter].lat]);
                    geoCounter++;
                }
                vesselCounter++;
            } while (geoCounter != data.length);
            console.log(data.length);
        })
}

getPublicDashboard()


