// マップの作成 ///////////////////////////////////////////////////////////////////////
var mymap = new L.map('map', {
    fullscreenControl: true,
    fullscreenControlOptions: {
        position: 'topleft',
        title: 'フルスクリーン表示',
        titleCancel: '通常表示に戻す',
    },
    drawControl: true
}).setView([37.508106, 139.930239], 13);
/////////////////////////////////////////////////////////////////////////////////////


// 地点検索コントローラー ///////////////////////////////////////////////////////////////
var osmGeocoder = new L.Control.OSMGeocoder({
    collapsed: false,
    text: '検索',
    placeholder: '地点名、住所で検索',
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
////////////////////////////////////////////////////////////////////////////////////


// タイルレイヤー ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
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
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


// 林道のアイコン //////////////////////////////////////////////////////////////////////////////////////////////////////////
var icon = L.icon({
    iconUrl: '../../storage/img/icon.svg',
    iconSize: [38, 38]
});
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


// // マップ上の林道をなぞるのに必要な機能
// ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// // 線・図形描画機能の追加
// var drawnItems = new L.FeatureGroup();
// mymap.addLayer(drawnItems);
// var drawControl = new L.Control.Draw({
//     edit: {
//         featureGroup: drawnItems
//     }
// });
// mymap.addControl(drawControl);

// // 図形を新規作成した時
// mymap.on(L.Draw.Event.CREATED, function (e) {
//     drawnItems.addLayer(e.layer);
//     e.layer.feature = e.layer.feature || {};
//     e.layer.feature.properties = e.layer.feature.properties || {};
//     e.layer.feature.type = "Feature";
//     popup = e.layer.bindPopup("");
//     setFeatureProperties(e.layer);
// });

// // 図形を編集した時
// mymap.on(L.Draw.Event.EDITED, function (e) {
//     e.layers.eachLayer(function (layer) {
//         setFeatureProperties(layer);
//     });
// });

// const setFeatureProperties = function (layer) {
//     // 線と多角形と四角形
//     if (layer instanceof L.Polyline) {
//         var latlngs = layer._defaultShape ? layer._defaultShape() : layer.getLatLngs();
//         if (latlngs.length >= 2) {
//         var distance = 0;
//         layer.feature.properties.latlng = [];
//         for (var i = 0; i < latlngs.length - 1; i++) {
//             distance += latlngs[i].distanceTo(latlngs[i + 1]);
//         }
//         layer.feature.properties.distance = distance.toFixed(2) + " m"; // ex. distance 3728.81 m

//         // 緯度経度を取得
//         latlngs.forEach((latlng, index) => {
//             layer.feature.properties.latlng[index] = [latlng.lat, latlng.lng];
//         });
//     }
//     layer.feature.properties.drawtype = L.Draw.Polyline.TYPE;
//     }
//     // 多角形と四角形
//     if (layer instanceof L.Polygon) {
//         var latlngs = layer._defaultShape ? layer._defaultShape() : layer.getLatLngs();
//         var area = L.GeometryUtil.geodesicArea(latlngs);
//         layer.feature.properties.area = L.GeometryUtil.readableArea(area, true); // ex. area 174.19 ha
//         layer.feature.properties.drawtype = L.Draw.Polygon.TYPE;
//         delete layer.feature.properties.distance;
//     }
//     // 四角形
//     if (layer instanceof L.Rectangle) {
//         layer.feature.properties.drawtype = L.Draw.Rectangle.TYPE;
//         delete layer.feature.properties.distance;
//     }
//     // 円
//     if (layer instanceof L.Circle) {
//         layer.feature.properties.radius = layer.getRadius().toFixed(2) + " m"; // ex. radius 1097.02 m
//         layer.feature.properties.latlng = [layer.toGeoJSON().geometry.coordinates[1], layer.toGeoJSON().geometry.coordinates[0]];
//         layer.feature.properties.drawtype = L.Draw.Circle.TYPE;
//     }
//     // マーカー
//     if (layer instanceof L.Marker) {
//         layer.feature.properties.latlng = [layer.toGeoJSON().geometry.coordinates[1], layer.toGeoJSON().geometry.coordinates[0]];
//         layer.feature.properties.drawtype = L.Draw.Marker.TYPE;
//     }

//     // popup 時の表示内容の差し替え
//     var contents = "";
//     for (var key in layer.feature.properties) {
//     if (key != 'note' && key != 'drawtype' && key != 'latlng') {
//         contents = contents + key + " " + layer.feature.properties[key] + "<br />";
//     }
//     if (key == 'latlng') {
//         contents = contents + key + " " + JSON.stringify(layer.feature.properties[key]) + "<br />";
//     }
// }
// layer.setPopupContent(contents);
// };

// /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


// マップ上に林道のマーカーを表示 ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
var cluster = L.markerClusterGroup();
for(var i = 0; i < markers.length; i++) {

    // マーカーをクリックした時にそのマーカーに対応するpolylineをマップ上に描画する関数 ////////////////////////////
    function setClickEvent(marker, $points, pointName) {
        marker.on('click', function(){
            $points = JSON.parse($points);
            var latlngs = [$points];
            var polyline = L.polyline(latlngs, {color: 'red'}).bindPopup(pointName, {autoClose: false}).openPopup().addTo(mymap);
            mymap.fitBounds(polyline.getBounds());
        });
    };
    ////////////////////////////////////////////////////////////////////////////////////////////////////

    marker = L.marker(
        [markers[i].lat, markers[i].lng],
        {icon: icon}
    )
    .bindPopup(markers[i].name);
    cluster.addLayer(marker);


    $points = markers[i].polyline_latlngs;
    var pointName = markers[i].name;

    setClickEvent(marker, $points, pointName);
}
mymap.addLayer(cluster);
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


// Locate 現在地表示機能 /////////////////////////////////////////////////////////////////////////////////////////////////////
var option = {
    position: 'topright',
    strings: {
        title: '現在地を表示',
        popup: '現在地',
    },
    locateOptions: {
        maxZoom: 9,
    }
}

var lc = L.control.locate(option).addTo(mymap);

// 初期状態で現在地を表示
lc.start();
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


// 林道名で検索機能 /////////////////////////////////////////////////////////////////////////////////////////////////////
var index = document.getElementById('index_button');
index.addEventListener('click', function(){
    let element = document.getElementById('rindou_name');
    let value = element.value;
    var arrayPoint = [];
    for(var i = 0; i < markers.length; i++) {
        let rindouName = markers[i].name;
        if(rindouName.indexOf(value) > -1) {
            var valuePoint = mymap.setView([markers[i].lat, markers[i].lng], 18);
            arrayPoint.push(valuePoint);
        }
    }
    if(!arrayPoint.includes(valuePoint)) {
        alert('検索条件に一致する林道がありませんでした。');
    }
});
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
