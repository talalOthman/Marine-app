 const mymap = L.map('map').setView([2.2180, 115.6628], 3.5);
      const attribution =
        '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors';

      const tileUrl = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
      const tiles = L.tileLayer(tileUrl, { attribution });
      
      tiles.addTo(mymap); 
      mymap.addControl(new L.Control.Fullscreen());  
      const shipIcon = L.icon({
        iconUrl: 'images/ship-marker.png',
        iconSize: [23, 20],
        iconAnchor: [25, 16]
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


   