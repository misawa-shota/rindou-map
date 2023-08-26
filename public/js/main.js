var mymap = L.map('map');

L.tileLayer('https://cyberjapandata.gsi.go.jp/xyz/std/{z}/{x}/{y}.png', {
    maxZoom: 18,
    attribution: '<a href="https://cyberjapandata.gsi.go.jp/development/ichiran.html" target="_blank">国土地理院</a>',
}).addTo(mymap);

var gsi = L.tileLayer('https://cyberjapandata.gsi.go.jp/xyz/std/{z}/{x}/{y}.png', {
    minZoom: 2,
    maxZoom: 18,
    attribution: '<a href="https://maps.gsi.go.jp/development/ichiran.html" target="_blank">地理院タイル</a>',
});

var gsiphoto = L.tileLayer('https://cyberjapandata.gsi.go.jp/xyz/seamlessphoto/{z}/{x}/{y}.jpg', {
    minZoom: 2,
    maxZoom: 18,
    attribution: '<a href="http://portal.cyberjapan.jp/help/termsofuse.html" target="_blank">地理院タイル</a>',
});

var osm = L.tileLayer('http://tile.openstreetmap.jp/{z}/{x}/{y}.png', {
    attribution: '<a href="http://osm.org/copyright" target="_blank">OpenStreetMap</a>contributors',
});

var baseMaps = {
    "地理院地図": gsi,
    "地理院写真": gsiphoto,
    "O.S.Map": osm,
};

L.control.layers(baseMaps).addTo(mymap);
gsi.addTo(mymap);

mymap.setView([37.508106, 139.930239], 13);
