// const mymap = L.map('map', {
//     minZoom: 2,
// }).setView([2.2180, 115.6628], 3.5);
// const attribution =
//     'Tiles &copy; Esri &mdash; National Geographic';

// const tileUrl = 'https://server.arcgisonline.com/ArcGIS/rest/services/NatGeo_World_Map/MapServer/tile/{z}/{y}/{x}';
// const tiles = L.tileLayer(tileUrl, { attribution, });

// tiles.addTo(mymap);
// mymap.addControl(new L.Control.Fullscreen());

// var southWest = L.latLng(-89.98155760646617, -180),
//     northEast = L.latLng(89.99346179538875, 180);
// var bounds = L.latLngBounds(southWest, northEast);

// mymap.setMaxBounds(bounds);
// mymap.on('drag', function () {
//     mymap.panInsideBounds(bounds, { animate: false });
// });

// // const shipIcon = L.icon({
// //   iconUrl: 'images/ship-marker.png',
// //   iconSize: [23, 20],
// //   iconAnchor: [25, 16]
// // });

// var heat = L.heatLayer([
// 	[4.6626, 99.5451, 1.0], // lat, lng, intensity
// 	[50.6, 30.4, 0.6],
// ], {radius: 25}).addTo(mymap);



// var allHeats = [
//     [23.703161, 90.414101],
//     // [23.722657, 90.412525],
//     // [23.701936, 90.415782],
//     // [23.722099, 90.413981],
//     // [23.703582, 90.414536],
//     // [23.699689, 90.421493], 
//     // [23.705727, 90.412281],
//     // [23.720692, 90.414056],
//     // [23.706133, 90.412448],
//     // [23.704677, 90.41166],
//     // [23.703912, 90.413993],
//     // [4.6626, 99.5451],
//     // [4.8, 100],
//   ];

url2 = 'http://localhost/api/heatmap';
// var allHeats = [];

// allHeats.push([23.703912, 90.413993]);

// function saveData(lat, long){
//     allHeats.push([lat, long]);
// }

// fetch('http://localhost/api/heatmap')
// .then(res => res.json())
// .then(data => {
//     const mymap = L.map('map', {
//         minZoom: 2,
//     }).setView([2.2180, 115.6628], 3.5);
//     const attribution =
//         'Tiles &copy; Esri &mdash; National Geographic';

//     const tileUrl = 'https://server.arcgisonline.com/ArcGIS/rest/services/NatGeo_World_Map/MapServer/tile/{z}/{y}/{x}';
//     const tiles = L.tileLayer(tileUrl, { attribution, });

//     tiles.addTo(mymap);
//     mymap.addControl(new L.Control.Fullscreen());

//     var southWest = L.latLng(-89.98155760646617, -180),
//         northEast = L.latLng(89.99346179538875, 180);
//     var bounds = L.latLngBounds(southWest, northEast);

//     mymap.setMaxBounds(bounds);
//     mymap.on('drag', function () {
//         mymap.panInsideBounds(bounds, { animate: false });
//     });

//     var allHeats = [];
//     allHeats.push([data.lat, data.long])
//     console.log(data.long)
//     // allHeats.push([23.703912, 90.413993]);

//     var heatmap = L.heatLayer(allHeats, {
//         radius: 30,
//         max: 1.0,
//         blur: 15,
//         gradient: {
//             0.0: 'green',
//             0.5: 'yellow',
//             1.0: 'red'
//         },
//         minOpacity: 0.7
//     }).addTo(mymap);
// })
// .catch(e => console.log(e));

const mymap = L.map('map', {
    minZoom: 2,
}).setView([103.7826467, 1.2744383], 10.5);
const attribution =
    'Tiles &copy; Esri &mdash; National Geographic';

const tileUrl = 'https://server.arcgisonline.com/ArcGIS/rest/services/NatGeo_World_Map/MapServer/tile/{z}/{y}/{x}';
const tiles = L.tileLayer(tileUrl, { attribution, });

tiles.addTo(mymap);
mymap.addControl(new L.Control.Fullscreen());

var southWest = L.latLng(-89.98155760646617, -180),
    northEast = L.latLng(89.99346179538875, 180);
var bounds = L.latLngBounds(southWest, northEast);

mymap.setMaxBounds(bounds);
mymap.on('drag', function () {
    mymap.panInsideBounds(bounds, { animate: false });
});



function getHeatMap() {
    $('#cover-2').show();
    // const response = await fetch('http://localhost/api/heatmap');
    // const data = await response.json();

    fetch('http://localhost/api/heatmap')
        .then(response => response.json())
        .then(data => {
            $('#cover-2').hide();
            var allHeats = [];
            for (let i = 0; i < data.length; i++) {
                allHeats.push([data[i].lat, data[i].long]);
            }
            console.log(data.length)
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
        })


}

getHeatMap()



// data2.forEach(function(vessel) {
//     allHeats.push([23.703912, 90.413993]);
// });





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
// heatmapLayer.addTo(mymap);












