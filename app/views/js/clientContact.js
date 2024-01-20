const map = L.map("map").setView([-11.960597, -77.069713], 16);

L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
  maxZoom: 18,
  attribution:
    '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
}).addTo(map);

const icon = L.icon({
  iconUrl: "./app/views/img/icon_marker.png",
  iconSize: [32, 32],
  riseOnHover: true,
});

L.marker([-11.960597, -77.069713], { icon })
  .bindPopup("Foodlicious")
  .addTo(map);
