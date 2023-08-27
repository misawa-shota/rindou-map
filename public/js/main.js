var mymap = L.map('map');

// 地理院タイル
var gsi = L.tileLayer('https://cyberjapandata.gsi.go.jp/xyz/std/{z}/{x}/{y}.png', {
    minZoom: 2,
    maxZoom: 18,
    attribution: '<a href="https://maps.gsi.go.jp/development/ichiran.html" target="_blank">地理院タイル</a>',
});

// 地理院写真
var gsiphoto = L.tileLayer('https://cyberjapandata.gsi.go.jp/xyz/seamlessphoto/{z}/{x}/{y}.jpg', {
    minZoom: 2,
    maxZoom: 18,
    attribution: '<a href="http://portal.cyberjapan.jp/help/termsofuse.html" target="_blank">地理院写真</a>',
});

// OpenStreetMap
var osm = L.tileLayer('http://tile.openstreetmap.jp/{z}/{x}/{y}.png', {
    attribution: '<a href="http://osm.org/copyright" target="_blank">OpenStreetMap</a>contributors',
});

// google航空写真
var GmapsHYB = L.gridLayer.googleMutant({
    minZoom: 5,
    type: 'hybrid',
});

// google地形地図
var GmapsTER = L.gridLayer.googleMutant({
    minZoom: 5,
    type: 'terrain',
});

// タイル切り替えボタン
var baseMaps = {
    "地理院地図": gsi,
    "地理院写真": gsiphoto,
    "O.S.Map": osm,
    "Google航空写真": GmapsHYB,
    "Google地形地図": GmapsTER,
};

L.control.layers(baseMaps).addTo(mymap);
gsi.addTo(mymap);

// 初期表示の中心座標とズームレベル
mymap.setView([37.508106, 139.930239], 13);
