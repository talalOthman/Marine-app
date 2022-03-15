const mymap = L.map('map',{
    minZoom: 2,
}).setView([2.2180, 115.6628], 3.5);
const attribution =
    'Tiles &copy; Esri &mdash; National Geographic';

const tileUrl = 'https://server.arcgisonline.com/ArcGIS/rest/services/NatGeo_World_Map/MapServer/tile/{z}/{y}/{x}';
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
    mymap.panInsideBounds(bounds, { animate: false });
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
        mymap.setView([latitude, longitude], 2);
        firstTime = false;
    }
}

getLocation();

setInterval(getLocation, 1000);


