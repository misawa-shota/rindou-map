var mymap = new L.map('map', {
    fullscreenControl: true,
    fullscreenControlOptions: {
        position: 'topleft',
        title: 'フルスクリーン表示',
        titleCancel: '通常表示に戻す',
    }
}).setView([37.508106, 139.930239], 13);

// 地点検索コントローラー
var osmGeocoder = new L.Control.OSMGeocoder({
    collapsed: false,
    text: '検索',
    placeholder: '地点名、住所を入力',
    position: 'topright',
    callback: function(results) {
        var coords = L.latLng(results[0].lat, results[0].lon);
        var foundIcon = L.divIcon({
            className: 'found-icon',
            iconAnchor: [8, 8],
        });
        L.marker(coords, {icon: foundIcon}).addTo(mymap);
        mymap.setView(coords, 17);
    }
});

mymap.addControl(osmGeocoder);

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

// Locate
var option = {
    position: 'topright',
    strings: {
        title: '現在地を表示',
        popup: '現在地',
    },
    locateOptions: {
        maxZoom: 16,
    }
}

var lc = L.control.locate(option).addTo(mymap);

// 初期状態で現在地を表示
lc.start();

// 林道のアイコン
var myIcon = L.icon({
    iconUrl: '../img/marker-icon.svg',
    iconSize: [38, 38]
});

// マップ上に林道のマーカーを表示
for(var i = 0; i < markers.length; i++) {
    marker = L.marker([markers[i].lat, markers[i].lng], {icon: myIcon}).addTo(mymap);
    marker.bindPopup(markers[i].name).openPopup();
}
