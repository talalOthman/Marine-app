url2 = 'http://localhost/api/heatmap';





function getHeatMap() {
    $('#cover-2').show();

    fetch('http://localhost/api/heatmap')
        .then(response => response.json())
        .then(data => {
            $('#cover-2').hide();

            const mymap = L.map('map', {
                minZoom: 2,
            }).setView([data[0].long, data[0].lat], 10.5);
            const attribution =
                'Tiles &copy; Esri &mdash; National Geographic';
            
            const tileUrl = 'https://{s}.basemaps.cartocdn.com/rastertiles/voyager/{z}/{x}/{y}{r}.png';
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

            var allHeats = [];
            for (let i = 0; i < data.length; i++) {
                allHeats.push([data[i].long, data[i].lat]);
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












