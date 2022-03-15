const mymap = L.map('map').setView([2.2180, 115.6628], 3.5);
const attribution =
  '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors';

const tileUrl = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
const tiles = L.tileLayer(tileUrl, { attribution });

tiles.addTo(mymap); 
mymap.addControl(new L.Control.Fullscreen());  
// // const shipIcon = L.icon({
// //   iconUrl: 'images/ship-marker.png',
// //   iconSize: [23, 20],
// //   iconAnchor: [25, 16]
// // });

// var heat = L.heatLayer([
// 	[4.6626, 99.5451, 1.0], // lat, lng, intensity
// 	[50.6, 30.4, 0.6],
// ], {radius: 25}).addTo(mymap);

var allHeats = [
    [23.703161, 90.414101, 1],
    [23.722657, 90.412525, 0.6],
    [23.701936, 90.415782, 0.5],
    [23.722099, 90.413981, 0.9],
    [23.703582, 90.414536, 0.3],
    [23.699689, 90.421493, 0.1], 
    [23.705727, 90.412281, 0.8],
    [23.720692, 90.414056, 0.2],
    [23.706133, 90.412448, 0.8],
    [23.704677, 90.41166, 0.7],
    [23.703912, 90.413993, 0.4],
    [4.6626, 99.5451, 1.0],
    [4.8, 100, 1.0],
  ];
  
var heatmap = L.heatLayer(allHeats, {
    radius: 30,
    max: 1.0,
    blur: 15,              
    gradient: {
        0.0: 'green',
        0.5: 'yellow',
        1.0: 'red'
    },
    minOpacity: 0.7
}).addTo(mymap);


// var myData = {
//     max: 1000,
//     data: [
//       {lat: 50.32638, lng: 9.81727, count: 1},
//       {lat: 50.31009, lng: 9.57019, count: 1},
//       {lat: 50.31257, lng: 9.44102, count: 1},
//       ]
//   };

// var baseLayer = L.tileLayer(
//     'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',{
//       attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://cloudmade.com">CloudMade</a>',
//       maxZoom: 18,
//       minZoom: 7
//     }
//   );
//   var cfg = {
//     "radius": .1,
//     "maxOpacity": 1,
//     "scaleRadius": true,
//     "useLocalExtrema": true,
//     latField: 'lat',
//     lngField: 'lng',
//     valueField: 'count'
//   };
//   var heatmapLayer = new HeatmapOverlay(cfg);
  
// //   var map = new L.Map('map', {
// //     center: new L.LatLng(50.339247, 9.902947),
// //     zoom: 8,
// //     layers: [baseLayer, heatmapLayer]
// //   });
//   heatmapLayer.setData(myData);
//   layer = heatmapLayer;
  heatmapLayer.addTo(mymap);











